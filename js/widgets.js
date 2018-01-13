jQuery(".numeric").keydown(function (e) {
    $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || 65 == e.keyCode && (e.ctrlKey === !0 || e.metaKey === !0) || e.keyCode >= 35 && e.keyCode <= 40 || (e.shiftKey || e.altKey || e.keyCode < 48 || e.keyCode > 57) && (e.keyCode < 96 || e.keyCode > 105) && e.preventDefault()
});

jQuery("#search-form").submit(function (e) {
  e.preventDefault();
  openDirectoryPage();
});

function getBaseUrl() {
  return 'https://www.auntbertha.com/';
}

function openDirectoryPage() {
  var postal = jQuery("#postal").val();
  // send Google Analytics event
  __gaTracker('send', 'event', 'Form', 'submit', 'Aunt Bertha Search: ' + postal);  
  if ((postal) && (postal.length == 5)) {
    url = getBaseUrl() + "search_results/" + postal;
    window.open(url, '_blank');
  } else {
    $postal.parents(".control-group").addClass("error");
  }
}

function get_postal(location) {
    var postal = null;
    $('#error-msg').hide();

    if (/(^\d{5}$)/.test(location))
        postal = location;
    else
        postal = validate_city_state(location);
    return postal;
}

function validate_city_state(location) {
    var postal = null;
    jQuery.ajax({
        url: "https://www.auntbertha.com/validate_city_state?location=" + location,
        type: 'GET',
        dataType: "json",
        async: false,
        success: function (results) {
            if (results["success"]) {
                postal = results["postal"];
            }
            else {
              jQuery('#error-msg').show();
            }
        },
        error: function (results) {
            jQuery('#error-msg').show();
        },
        failure: function (results) {
            jQuery('#error-msg').show();
        }
    });
    return postal;
}
