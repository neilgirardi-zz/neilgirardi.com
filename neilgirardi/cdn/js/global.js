/*
 * global.js
 */

// Add custom functions to the jQuery object
(function($) {
    
     toggleGrid = function() {
        $(window).keydown(function(e) {
            var key = e.which;

            if (key == 192) 
                $('#siteContainer').toggleClass('dev_grid');
        });
    }
    
}) (jQuery);


// DOM loaded

$(function() {
    
    toggleGrid();
    
});