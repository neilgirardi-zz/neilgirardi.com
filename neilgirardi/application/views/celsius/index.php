<?php
// enter a unique page title below
$page_title = 'Celsius 911';

//include the config file

// add the header file to the page
require_once('php_includes/header.inc.php');

?>

<div id="homeImageContainer">
	<div id="homeNav">
		<ul>
			<li><a href="">HOME</a></li>
			<li><a href="videos">VIDEOS</a></li>
			<li><a href="contact">CONTACT</a></li>
			<!--	<li><a href="/blog/index.php">BLOG</a></li>	-->
			<li><a href="mailinglist">MAILING LIST</a></li>
		</ul>
	</div>
	<div id="celsiusLayer1">
		<img src="<?php echo CDN; ?>/images/celsius/celsius_layer_1.png" width="237" height="390"  alt="Welcome to Celsius911.net, the official web site of Brooklyn born rapper Celsius." />	
	</div>
 		
	<div id="celsiusLayer2">
		<img src="<?php echo CDN; ?>/images/celsius/celsius_layer_2_rev.png" width="520" height="334"  alt="Welcome to Celsius911.net, the official web site of Brooklyn born rapper Celsius." />	
	</div>

<!--	start jPlayer	-->

<div id="playerContainer">

<div id="jquery_jplayer"></div>



<div class="jp-single-player">
	<div class="jp-interface">
		<ul class="jp-controls">
			<li><a href="#" id="jplayer_play" class="jp-play" tabindex="1">play</a></li>
			<li><a href="#" id="jplayer_pause" class="jp-pause" tabindex="1">pause</a></li>
			<li><a href="#" id="jplayer_stop" class="jp-stop" tabindex="1">stop</a></li>
			<li><a href="#" id="jplayer_volume_min" class="jp-volume-min" tabindex="1">min volume</a></li>
			<li><a href="#" id="jplayer_volume_max" class="jp-volume-max" tabindex="1">max volume</a></li>
			<li><a href="http://twitter.com/share?count=none&amp;via=celsius911" class="twitter-share-button">Tweet</a></li>
		</ul>
		<div class="jp-progress">
			<div id="jplayer_load_bar" class="jp-load-bar">
				<div id="jplayer_play_bar" class="jp-play-bar"></div>
			</div>
		</div>
		<div id="jplayer_volume_bar" class="jp-volume-bar">
			<div id="jplayer_volume_bar_value" class="jp-volume-bar-value"></div>
		</div>
		<div id="jplayer_play_time" class="jp-play-time"></div>
		<div id="jplayer_total_time" class="jp-total-time"></div>
	</div>
	<div id="jplayer_playlist" class="jp-playlist">
		<ul>
			<li>Celsius 911</li>
		</ul>
	</div>
</div>
</div>
</div>

</div>	<!--	ENF OF #site_container	-->
</body>
</html>