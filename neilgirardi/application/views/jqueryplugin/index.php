<?php header('Content-type: text/html; charset=utf-8'); ?>
<!DOCTYPE html>
<head>
<title>Easy Expand jQuery Plugin</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Easy Expand is a jQuery Plugin for exapandble, collapsable regions. It gives you the look and feel of accordions without the limitation of being able to open only one region at a time." /> 
<meta name="keywords" content="Neil Girardi, Easy Expand jQuery, Easy Expand, jquery, jquery plugin, accordions, expandable regions, collapsable regions" /> 
<link rel="stylesheet" type="text/css" href="<?=jqueryplugin_static_url()?>css/style.css" />
<script type="text/javascript" src="<?=jqueryplugin_static_url()?>js/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="<?=jqueryplugin_static_url()?>js/jquery-easyexpand.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
	
		$('.closed').easyexpand();
		$('.open').easyexpand({'startClosed' : false });
		$('.ajax').easyexpand(myCallback);
		
		function myCallback() {
			$('.ajax').load('http://neilgirardi.com/portfolio/common_elements/portfolio_sites/jqueryplugin/ajaxcontent/ajax-content.html');
		}
		
	});
</script>
<?=redirect_url()?>
<script type="text/javascript">
//<![CDATA[
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-22867617-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
//]]>
</script>
</head>
<body>
	<div id="wrapper">
		
		<div class="row top">
			<div id="header">
				<h1><span class="logo">Easy Expand() </span><span class="tagline">a jQuery plug-in for expandable regions</span></h1>
			</div>
	
			<div class="column left">
				<div class="outer-container">
					<div class="button-container">
						<span>About the the Plug-in</span>
					</div>	<!--	END OF .button-container	-->
					<div class="open">
						<p>You just made an accordion for a client using jQuery UI. Her eyes light up when you show it to her. She tries it out and suddenly the smile changes to a look of confusion.</p>
							<blockquote style="font-weight: bold;"><p>"Wait, I can only  open one at a time?<span style="display: block;">Can you fix that?</span><span style="display: block">Also, I want these ones to start closed and these ones to start opened."</span></p></blockquote><p>Have you ever been there?</p><p>The 
problem is <a onclick="return ! window.open(this.href);" href="http://jqueryui.com/demos/accordion/#NOTE:_If_you_want_multiple_sections_open_at_once.2C_don.27t_use_an_accordion">accordions don't work that way</a>. Accordions only let you open one item at a time. That's why I wrote this plugin.<br /><br />Easy Expand jQuery plugin gives you the look and feel of accordions with the ability to open or close
your elements any way you like. You can preset each one individually. You can also use  load  content dynamically with Ajax.<br /><br /> It's light-weight and easy to use. The plug-in auto-generates the buttons and no image files are required! All you need is the basic jQuery library. The CSS is easy to customize and you can use your own class names if you want.<br /><br />Sound good? <strong>Let's get started!</strong></p>  											
					</div>	<!--	END OF .open	--> 
				</div>	<!--	END OF .outer-container	-->	
			</div>	<!--	END OF .leftColumn	-->
						
			<div class="column right">
				<div class="outer-container">
					<div class="button-container">
						<span>Plug-in Options</span>
					</div>	<!--	END OF .button-container	-->

					<div class="closed">
						<h4>Options:</h4>
						<p><span style="color:#FFB400; font-weight: bold;">startClosed</span><span>Determines whether or not the Easy Expand element defaults to a closed state at page load.<br /><br /> - boolean (default = true)</span>
							<span style="color:#FFB400; font-weight: bold;">outerContainer</span><span>Defines the CSS class selector of the Easy Expand outer containers<br /><br /> - string (CSS class name - default: 'outer-container')</span>
							<span style="color:#FFB400; font-weight: bold;">buttonContainer</span><span>Defines the CSS class selector of the Easy Expand button containers<br /><br /> - string (CSS class name - default: 'button-container')</span>
							<span style="color:#FFB400; font-weight: bold;">buttonClass</span><span>Sets the CSS class of the Easy Expand arrow toggle buttons.<br /><br /> - string (CSS class name - default: 'easyexpand')</span>
							<span style="color:#FFB400; font-weight: bold;">duration</span><span>Sets the duration of the slideToggle() effect in milliseconds.<br /><br /> - INT (default: 200)</span>
							<span style="color:#FFB400; font-weight: bold;">easing</span><span>Sets the easing option for the slideToggle()<br /><br /> - string (easing option name - default: 'swing')<br /><span style="color:#FFB400; font-weight: bold;">NOTE: </span>'swing' and 'linear' are the only easing methods available by default. Other easing options require the easing plugin.</span>
							<span style="color:#333; font-weight: bold;">Using Multiple Options</span><span>$('.myclass').easyexpand({'option' : 'value', 'option' : 'value'});</span>
							<span style="color:#333; font-weight: bold;">Using callbacks</span>
							To use a callback function, simply pass the name of the function:<br /><br />$('.content-container').easyexpand(myCallback);<br /><br/>If you're passing optional settings as well, pass the callback as the second argument.<br /><br />$('.content-container').easyexpand({'duration' : 250}, myCallback);
							</p>
					</div>	<!--	END OF .content-container	-->
				</div>	<!--	END OF .outer-container	-->
				
				<div class="outer-container">
					<div class="button-container">
						<span>Ajax Easy Expand Elements</span>
					</div>	<!--	END OF .button-container	-->

					<div class="ajax">
					</div>	<!--	END OF .content-container	-->
				</div>	<!--	END OF .outer-container	-->
				
				<div class="outer-container">
					<div class="button-container">
						<span>jQuery Demo code</span>
					</div>	<!--	END OF .button-container	-->

					<div class="closed">
						<p>In this demo, four of the Easy Expands elements are preset to closed and three others are preset to opened. One Easy Expand element uses a callback to load content dynamically via Ajax.</p>
						<p>As you can see below, the key to having multiple Easy Expand elements with differnt settings is to use separate instances of the function, targeting different classes.</p>
						
						<p>&#36;(document).ready(function() {</p>
						<p>
							<span style="text-indent: 10px; display: block; margin: 0;">&#36;('.closed').easyexpand();</span>
							<span style="text-indent: 10px; display: block; margin: 0;">&#36;('.open').easyexpand({'startClosed' : false });</span>
							<span style="text-indent: 10px; display: block; margin: 0;">&#36;('.callback').easyexpander(myCallback);</span>
						</p>
						<p>
							<span style="text-indent: 10px; display: block; margin: 0;">function myCallback() {</span>
							<span style="text-indent: 20px; display: block; margin: 0;">&#36;('.ajax').load('ajax-content.html');</span>
							<span style="text-indent: 10px; display: block; margin: 0;">}</span>
						</p>
						<p>
						});
						</p>
					</div>	<!--	END OF .closed	-->
				</div>	<!--	END OF .outer-container	-->
		
				<div class="outer-container">
					<div class="button-container">
						<span>Download Easy Expand jQuery Plugin</span>
					</div>	<!--	END OF .button-container	-->
				
					<div class="closed">
						<p>Download the Easy Expand jQuery plug-in <a href="<?=jqueryplugin_static_url()?>download/download.php?file=jquery.easyexpand.zip">HERE</a></p>
					</div>
					
				</div> <!--	END OF .outer-container	-->
			</div>	<!--	END OF .rightColumn	-->
		</div>	<!--	#END OF top-content	-->	
			
		<div class="row bottom">
			<div class="column left">
				<div class="outer-container">
					<div class="button-container">
						<span>Coding Basic Usage</span>
					</div>	<!--	END OF .button-container	-->
					<div class="open">
						<h3> The javascript:</h3>
						<p>$(document).ready(function() {<br />
						&nbsp;&nbsp;$('.content-container').easyexpand();<br />
						});</p>
						<h3>The HTML:</h3>
						<p>&lt;div class=<span style="font-weight: bold; color:#FFB400;">"outer-container"</span>&gt;<br /><br />
							&nbsp;&nbsp;&lt;div class=<span style="font-weight: bold; color:#FFB400;">"button-container"</span>&gt;<br />
								&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-weight: bold;">&lt;h2&gt;The header goes here&lt;h2&gt;</span><br />
								&nbsp;&nbsp;&nbsp;&nbsp;&lt;!-- the button goes here --!&gt;<br />
							&nbsp;&nbsp;&lt;/div&gt;<br /><br />
							&nbsp;&nbsp;&lt;div class="content-container"&gt;<br />
								&nbsp;&nbsp;&nbsp;&nbsp;<strong>&lt;p&gt;The content goes here&lt;/p&gt;</strong><br />
							&nbsp;&nbsp;&lt;/div&gt;<br /><br />
						&lt;/div&gt;&nbsp;&nbsp;&lt;!-- end of .outer-container --!&gt;</p>
						
						<p><strong>Please note:</strong></p>
						<ul>
							<li>You must use the basic HTML sctructure shown above</li>
							<li>The highlighted class names are the default class names used by the plug-in.</li>
							<li>You may use your own class names by passing optional parameters to the plug-in.</li>
						</ul>
					</div>	<!--	END OF .open	-->
				</div>	<!--	END OF .outer-container	-->
			</div>	<!--	END OF .leftColumn	-->	
				
			<div class="column right">
				<div class="outer-container">
					<div class="button-container">
						<span>Understanding Basic Usage</span>
					</div>	<!--	END OF .outer-container	-->

					<div class="open">
						<p>In this example, we're using the default class names. The div called '.content-container' is the element that will open and close when we click the button. This is where the content goes. This is the specific selector you must target when you call the function. You can use a different class name for this container if you want. However, if you do you must 
pass it to the function as an optional setting</p>
						<p>The '.content-container' needs a sibling div to act as the button container. The button will be automatically generated by easyexpand. The default class for 
this container is 'button-container.' Again, you can specify your own class name by passing an optional parameter. You can also put a header in this container.</p> 
						<p>Finally, '.content-container' and '.button-container' both need to be wrapped in a parent div, which is used for DOM traversal. Its default class name is 'outer-container'.
						As with the other containers, you can specify your own class name.</p>
						<p><strong>Please note:</strong><br /><br />For this demo I've chosen to use CSS 3 rounded corners and CSS 3 gradients as part of the design. Those styles do not work in all browsers. I'm using <a onclick="return ! window.open(this.href);" href="http://css3pie.com/">PIE</a> to enhance browser support for these styles.</p>
					</div>	<!--	END OF .open	-->
				</div>	<!--	END OF .outer-container	-->
			</div> <!--	END OF .rightColumn	-->
			
		</div>	<!--	END OF #bottom-content	-->
	</div> <!--	END OF #wrapper	-->
</body>
</html>