$(".numeric").keydown(function (e) {
  $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || 65 === e.keyCode && (e.ctrlKey === !0 || e.metaKey === !0) || e.keyCode >= 35 && e.keyCode <= 40 || (e.shiftKey || e.altKey || e.keyCode < 48 || e.keyCode > 57) && (e.keyCode < 96 || e.keyCode > 105) && e.preventDefault()
});

function isPostalValid(postal) {
  if (!postal) {
    return true;
  }
  var len = postal.trim().length;
  return len === 0 || len === 5;
}

function isPostalFieldValid() {
  var postalField = $('#postal');
  var postalContainer = postalField.parents('.control-group');
  var isValid = isPostalValid(postalField.val());

  if (isValid) {
    postalContainer.removeClass('has-error');
  }
  else {
    postalContainer.addClass('has-error');
  }
  return isValid;
}

$('#postal').blur(isPostalFieldValid);

$('form').submit(function (e) {
  e.preventDefault();

  if (isPostalFieldValid()) {
    launchSearch();
  }
});

function getBaseUrl() {
    var search_info = $('#search-info');
    var website = search_info.data('website');

    if (website && website.length) {
        var lastChar = website.substring(website.length - 1);
        if (lastChar !== '/') {
            website += '/';
        }
        return website;
    }
    var subdomain = search_info.data('subdomain') || 'www';
    return 'https://' + subdomain + '.auntbertha.com/';
}

function launchSearch() {
  var $postal = $('#postal');
  var postal_value = getPostalFromText($postal.val().trim());
  var container = $postal.parents('.control-group');

  if (!postal_value || postal_value.length !== 5) {
    container.addClass('error');
    return;
  }
  container.removeClass('error');
  var url = getSearchUrl(postal_value);
  window.open(url, '_blank');
}

function getSearchUrl(postal) {
  var $search_params = $('#search-info');
  var $term = $('#term');
  var ref = $search_params.data('ref');
  var org = $search_params.data('org');
  var lang = $search_params.data('lang');
  var widget_name = $search_params.data('widget') || 'unknown';
  var top_level = '';
  var service_tag = '';
  var url = '';

  if ($term && $term.attr('value')) {
    // free text search
    $term.val($term.val().trim());
    url = getBaseUrl() + 'search/text?postal=' + postal + '&term=' + $term.attr('value') + '&';
  }
  else {
    top_level = $search_params.data('top-level');
    service_tag = $search_params.data('service-tag');

    if (top_level && service_tag) {
      // tag-specific directory search
      url = getBaseUrl() + top_level + '/' + service_tag + '?postal=' + postal + '&';
    }
    else {
      // basic postal search
      url = getBaseUrl() + 'search_results/' + postal + '?';
    }
  }

  url += 'widget=' + widget_name;

  if (ref && ref.length) {
    url += '&ref=' + ref;
  }
  if (org && org.length) {
    url += '&org=' + org;
  }
  if (lang && lang.length) {
    url += '&lang=' + lang;
  }

  return url;
}

function getPostalFromText(location) {
  if (/(^\d{5}$)/.test(location)) {
    // Already looks like a valid postal
    return location;
  }
  else {
    return postalFromCityState(location);
  }
}

function postalFromCityState(location) {
  var postal = null;

  $.ajax({
    url: "/validate_city_state?location=" + location,
    type: 'GET',
    dataType: "json",
    async: false,

    success: function (results) {
      if (results["success"]) {
        postal = results["postal"];
      }
      else {
        $('#error-msg').show();
      }
    },

    error: function (results) {
      $('#error-msg').show();
    },

    failure: function (results) {
      $('#error-msg').show();
    }
  });

  return postal;
}