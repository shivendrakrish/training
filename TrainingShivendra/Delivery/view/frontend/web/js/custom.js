	
define([
    "jquery",
    "jquery/ui"
], function($){
    "use strict";
 
    function main(config, element) {
        var $element = $(element);
        var AjaxUrl = config.AjaxUrl;         
        $(document).ready(function(){
            setTimeout(function(){
                $.ajax({
                    context: '#ajaxresponse',
                    url: AjaxUrl,
                    type: "POST",
                }).done(function (data) {
                   $('#msg').html(data.output);
                    return true;
                });
            },2000);
        });
 
 
    };
    return main;
});
