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
    
    
    // display selected link content inside of modal
    doModal = function(path) {
       
         if (!$('#modal_container').length) {
             var $container = $('<div id="modal_container"/>')
            $('body').prepend($container);
            $($container).html('<iframe style="width: 100% !important; min-height: 800px !important;" src="' + path + '"></iframe>').dialog({modal: true});
        } else {
            $('#modal_container').html('<iframe style="width: 100% !important; min-height: 800px !important;" src="' + path + '"></iframe>').dialog({modal: true});
        }
    }
    
    
}) (jQuery);


// DOM loaded

$(function() {
    
    toggleGrid();
    
    linkIndicator();
    
    $('.portfolio_link').on('click', function(event) {
        event.preventDefault();
        var path = $(this).attr('href');
        doModal(path);
    });
    
    
});