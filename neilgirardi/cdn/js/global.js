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
                $('#siteContainer').toggleClass('dev-grid');
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
        // check for existing #modal-container 
        if (!$('#modal-container').length) {
            // create the modal container if it doesn't exist and prepend it to body
            var $container = $('<div id="modal-container"/>');
            $('body').prepend($container);
            $($container).html('<iframe  src="' + path + '"></iframe>').dialog({modal: true});
        } else {
            $('#modal-container').html('<iframe src="' + path + '"></iframe>').dialog({modal: true});
        }
        // add modal view capability to all links on the target page 
        $($container).find('a').addClass('portfolio-link');
    }
    
    
    alignPortfolioText = function() {
        var tHeight = $("#portfolio-slideshow .wrapper").height();
        var tMargin = (460 - tHeight)  / 5.5 + "px";
        $("#portfolio-slideshow .wrapper").css("marginTop", tMargin);
    }
    
    
}) (jQuery);


// DOM loaded

$(function() {
    
    toggleGrid();
    
    linkIndicator();
    
    alignPortfolioText();
    
    // Bind portfolio links to doModal() 
    $('.portfolio-link').on('click', function(event) {
        event.preventDefault();
        var path = $(this).attr('href');
        doModal(path);
    });
    
    // Activate slideshow 
   $('#portfolio-slideshow').cycle({fx: 'turnDown', delay: -4000});
    
    // Clicking portfolio copy triggers doModal() 
    $('#portfolio-slideshow p, #portfolio-slideshow h2').click(function() {
       $(this).closest('.wrapper').siblings('a').click(); 
    });
    
    // Hovering anywhere inside the sllideshow container pauses the slideshow
    $('#portfolio-slideshow a, #portfolio-slideshow p, #portfolio-slideshow h2').hover(
        function() {
             $('#portfolio-slideshow').cycle('pause');
         },
        function() {
             $('#portfolio-slideshow').cycle('resume');
        });
        
        
        $("#portfolio-slideshow .wrapper").tooltip({ 
            track: true, 
            delay: 0, 
            showURL: false, 
            opacity: 1, 
            fixPNG: true, 
            showBody: " - ", 
            extraClass: "speech-bubble-right", 
            top: -180, 
            left: 5 
    }); 
    
    
     $("a.portfolio-link").tooltip({ 
            track: true, 
            delay: 0, 
            showURL: false, 
            opacity: 1, 
            fixPNG: true, 
            showBody: " - ", 
            extraClass: "speech-bubble-left", 
            top: -180, 
            left: -260 
    }); 
    
    
    
});