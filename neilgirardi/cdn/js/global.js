/*
 * global.js
 */

// Add custom functions to the jQuery object
(function($) {
    
    
     toggleGrid = function()  {
        $(window).keydown(function(e) {
            var key = e.which;

            if (key == 192) 
                $('#siteContainer').toggleClass('dev_grid');
        });
    }
    
    
    // link indicator
     linkIndicator = function () {
        var path = location.pathname.substring(1);
        var file = path.replace(/^.*\/|\.*$/g, '');
       
        if (file) 
            $('#nav ul li a[href$="' + file + '"]') 
            .attr('class', 'activePage');
            
        if (location.pathname == '/')
            $('#nav ul li:first-child a')
             .attr('class', 'activePage');
    }
    
    
    doModal = function(path) {
        
       
        $('#modal_container').load(path).dialog({modal:true});
    }
    
    
}) (jQuery);


// DOM loaded

$(function() {
    
    toggleGrid();
    
    linkIndicator();
    
    $('.portfolio_link').click(function(event) {
        event.preventDefault();
        var path = $(this).attr('href');
        doModal(path);
    });
    
    
});