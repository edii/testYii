/*
 * Display error massenge
 * @param {type} $_msg
 * @returns {undefined}
 */
function die( $_msg ) {
    console.log( $_msg );
}

/*
 * Ajax function.
 * return json result
 **/
function getAjaxForm(path, params, options) {
    if(!options) options = {};
    var settings = $.extend( {
        'dataType': 'json',
        'async': false,
        'crossDomain': false,
        'type': 'POST',
        'cache': true
    }, options || {});
    die( settings );
    if(!path) {
        die('enter url AJAX!');
        return null;
    }
    var res = $.ajax({
        url: path,
        dataType: settings.dataType,
        async: settings.async,
        crossDomain: settings.crossDomain,
        type: settings.type,
        cache: settings.cache,
//        success: function() {
//        },
//        complete: function(){
//        },
        data: {
            params: params
        }
    }).responseText;
    die(res);
    res = eval('['+res+']');
    var obj = res[0];
    return obj;
}

$(document).ready(function(){
    // scripts init
});