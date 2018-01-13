/**
 * Created by fpena on 12/22/15.
 */

function get_url_params() {
    var params = {};

    if (window.location.search) {
        var parts = window.location.search.substring(1).split('&');

        for (var i = 0; i < parts.length; i++) {
            var nv = parts[i].split('=');
            if (!nv[0] || !nv[1]) continue;

            var uri_decoded_value = decodeURIComponent(nv[1]);
            if (params.hasOwnProperty(nv[0])) {
                params[nv[0]].push(uri_decoded_value);
            }
            else {
                params[nv[0]] = [uri_decoded_value];
            }
        }
    }
    return params;
}

function generate_success_box(message) {
    var success_box = "<div class='container-fluid'><div class='row-fluid'><br/><div class='alert alert-success'><a class='close' data-dismiss='alert'><span class='sr-only'>close success message</span><i class='fa fa-close'></i></a>";
    success_box += message + '</div></div></div>';
    return success_box
}

function generate_alert_box(errors){
    var alertbox = "<div class='container-fluid'><div class='row-fluid'><br/><div class='alert alert-danger'><a class='close' data-dismiss='alert'><span class='sr-only'>close error message</span><i class='fa fa-close'></i></a><strong>Sorry!</strong> Please check the issues below and try again.";
    if(errors.length > 0){
        alertbox += "<ul>";
        for(i = 0; i < errors.length; i++) {
            alertbox += "<li>";
            alertbox += errors[i];
            alertbox += "</li>";
        }
        alertbox += "</ul>";
    }
    alertbox += "</div></div></div>";
    return alertbox;
}

// using html 5 validation regex pattern
function validate_email_address(email){
    var pattern = /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,253}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,253}[a-zA-Z0-9])?)*$/
    return pattern.test(email)
}
function insertParam(url, param, value){
    var hash       = {};
    var parser     = document.createElement('a');

    parser.href    = url;

    var parameters = parser.search.split(/\?|&/);

    for(var i=0; i < parameters.length; i++) {
        if(!parameters[i])
            continue;

        var ary      = parameters[i].split('=');
        hash[ary[0]] = ary[1];
    }

    hash[param] = value;

    var list = [];
    Object.keys(hash).forEach(function (key) {
        if(hash[key])
            list.push(key + '=' + hash[key]);
    });

    parser.search = '?' + list.join('&');
    return parser.href;
}

function trackConnectConv() {
    goog_report_conversion();
}

goog_snippet_vars = function() {
    var w = window;
    w.google_conversion_id = 1017473072;
    w.google_conversion_label = "tAY9CIy7oGgQsNCV5QM";
    w.google_remarketing_only = false;
};
// DO NOT CHANGE THE CODE BELOW.
goog_report_conversion = function(url) {
    goog_snippet_vars();
    window.google_conversion_format = "3";
    var opt = new Object();
    opt.onload_callback = function() {
        if (typeof(url) != 'undefined') {
            window.location = url;
        }
    };
    var conv_handler = window['google_trackConversion'];
    if (typeof(conv_handler) == 'function') {
        conv_handler(opt);
    }
};