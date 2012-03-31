/*
 * global.js
 */

/*
 * Add custom functions to the jQuery object
 */
(function($) {
    
    /*
     * FOR DEV ONLY!
     * 
     * click the backtick key to view a grid chart
     */
     toggleGrid = function()  {
        $(window).keydown(function(e) {
            var key = e.which;

            if (key == 192) 
                $('#siteContainer').toggleClass('dev_grid');
        });
    }
    
    
    /*
     * Create a link indicator to show which page is currently loaded
     */
     linkIndicator = function () {
        var path = location.pathname.substring(1);
        var file = path.replace(/^.*\/|\.*$/g, '');
       
       // compare URL sub-string to current page name
        if (file) 
            $('#nav ul li a[href$="' + file + '"]') 
            .attr('class', 'activePage');
        
        // if default page does not match it's URL sub-string    
        if (location.pathname == '/')
            $('#nav ul li:first-child a')
             .attr('class', 'activePage');
    }
    
    
    // display selected link content inside of modal
    doModal = function(path) {     
        // check for existing #modal_container 
        if (!$('#modal_container').length) {
            // create the modal container if it doesn't exist and prepend it to body
            var $container = $('<div id="modal_container"/>');
            $('body').prepend($container);
            $($container).html('<iframe  src="' + path + '"></iframe>').dialog({modal: true});
        } else {
            $('#modal_container').html('<iframe src="' + path + '"></iframe>').dialog({modal: true});
        }
        // add modal view capability to all links on the target page 
        $($container).find('a').addClass('portfolio_link');
    }
    
    
    alignPortfolioText = function() {
        var tHeight = $("#portfolio_slideshow .wrapper").height();
        var tMargin = (460 - tHeight)  / 5.5 + "px";
        $("#portfolio_slideshow .wrapper").css("marginTop", tMargin);
    }
    
    
}) (jQuery);


// DOM loaded

$(function() {
    
    toggleGrid();
    
    linkIndicator();
    
    alignPortfolioText();
    
    // Bind portfolio links to doModal() 
    $('.portfolio_link').on('click', function(event) {
        event.preventDefault();
        var path = $(this).attr('href');
        doModal(path);
    });
    
    // Activate slideshow 
   $('#portfolio_slideshow').cycle({fx: 'turnDown', delay: -4000});
    
    // Clicking portfolio copy triggers doModal() 
    $('#portfolio_slideshow p, #portfolio_slideshow h2').click(function() {
       $(this).siblings('a').click(); 
    });
    
    // Hovering anywhere inside the sllideshow container pauses the slideshow
    $('#portfolio_slideshow a, #portfolio_slideshow p, #portfolio_slideshow h2').hover(
        function() {
             $('#portfolio_slideshow').cycle('pause');
         },
        function() {
             $('#portfolio_slideshow').cycle('resume');
        });
    
    
});