<?php  
/**
* celsius.net
* by Neil Girardi
* header.php file
*/
header('Content-type: text/html; charset=utf-8');

// determine which page is loaded in the browser to change the nav link style for the loaded page
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $page_title; ?></title>

<!--
load YUI 3 CSS reset, font, and base	
promotes CSS consistency across a-grade browsers
-->
<link rel="stylesheet" type="text/css" href="<?php echo CDN; ?>/css/celsius/yui.css" />

<?php
/**	
*	attach the external CSS style sheets for the site
*	the JQuery dropdown nav menu styles are defined in /css/menus.css
*	the regular (non-dropdown) menu styles are defines in /css/styles.css
*/

echo '<link rel="stylesheet" type="text/css" href="' . CDN . '/css/celsius/styles.css" />' . "\n";

if ($current_page == 'contact' or $current_page == 'mailinglist'){
	echo '<link rel="stylesheet" type="text/css" href="' . CDN . '/css/celsius/celsius.css" />' . "\n";
}

if ($current_page == 'videos'){
	echo '<link rel="stylesheet" type="text/css" href="' . CDN . '/css/celsius/video_app.css" />' . "\n";
}

if ($current_page == 'celsius'){
	echo '<link href="' . CDN . '/css/celsius/jplayer.blue.monday.css" rel="stylesheet" type="text/css" />' . "\n";
}
?>


<!--	OPTIONAL ADDITIONAL CSS SHET FOR IE 6	-->
<!--[if IE 6]>
	<link rel="stylesheet" type="text/css" href="<?php echo CDN; ?>/css/celsius/ie6.css" />
<![endif]-->


<script type="text/javascript" src="https://www.google.com/jsapi?key=ABQIAAAA0EXTF8xf2DfkI3Fdu9dqjRRB-b3OrWoqF1BwF8qEk22-YLN04xRpOwpFFSX0m-4v9yn2jqJivqpWfg"></script>
<script type="text/javascript">google.load("jquery", "1");</script>
<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>


<?php
//redirect_url();


if ($current_page == 'celsius'){
	echo '<script type="text/javascript" src="' . CDN . '/js/celsius/jquery.jplayer.min.js"></script>' . "\n";
	
	echo '<script type="text/javascript">
	//<![CDATA[
	$(document).ready(function(){

	var playItem = 0;

	var myPlayList = [
		{name:"Activate Feat",mp3:"' . CDN . '/music/celsius/activatefeat.mp3"},
		{name:"Hookah Pipe",mp3:"' . CDN . '/music/celsius/hookahpipe.mp3"},
		{name:"Sake" ,mp3:"' . CDN . '/music/celsius/sake.mp3"}
	];

	// Local copy of jQuery selectors, for performance.
	var jpPlayTime = $("#jplayer_play_time");
	var jpTotalTime = $("#jplayer_total_time");

	$("#jquery_jplayer").jPlayer({
		swfPath: "' . CDN . '/js/celsius",
		ready: function() {
			displayPlayList();
			playListInit(true); // Parameter is a boolean for autoplay.
		},
		oggSupport: false
	})
	.jPlayer("onProgressChange", function(loadPercent, playedPercentRelative, playedPercentAbsolute, playedTime, totalTime) {
		jpPlayTime.text($.jPlayer.convertTime(playedTime));
		jpTotalTime.text($.jPlayer.convertTime(totalTime));
	})
	.jPlayer("onSoundComplete", function() {
		playListNext();
	});

	$("#jplayer_previous").click( function() {
		playListPrev();
		$(this).blur();
		return false;
	});

	$("#jplayer_next").click( function() {
		playListNext();
		$(this).blur();
		return false;
	});

	function displayPlayList() {
		$("#jplayer_playlist ul").empty();
		for (i=0; i < myPlayList.length; i++) {
			var listItem = (i == myPlayList.length-1) ? "<li class=\'jplayer_playlist_item_last\'>" : "<li>";
			listItem += "<a href=\'#\' id=\'jplayer_playlist_item_"+i+"\' tabindex=\'1\'>"+ myPlayList[i].name +"</a>(<a id=\'jplayer_playlist_get_mp3_"+i+"\' href=\'" + myPlayList[i].mp3 + "\' tabindex=\'1\'>RIGHT-CLICK TO DOWNLOAD)</a></li>";
			$("#jplayer_playlist ul").append(listItem);
			$("#jplayer_playlist_item_"+i).data( "index", i ).click( function() {
				var index = $(this).data("index");
				if (playItem != index) {
					playListChange( index );
				} else {
					$("#jquery_jplayer").jPlayer("play");
				}
				$(this).blur();
				return false;
			});
			$("#jplayer_playlist_get_mp3_"+i).data( "index", i ).click( function() {
				var index = $(this).data("index");
				$("#jplayer_playlist_item_"+index).trigger("click");
				$(this).blur();
				return false;
			});
		}
	}

	function playListInit(autoplay) {
		if(autoplay) {
			playListChange( playItem );
		} else {
			playListConfig( playItem );
		}
	}

	function playListConfig( index ) {
		$("#jplayer_playlist_item_"+playItem).removeClass("jplayer_playlist_current").parent().removeClass("jplayer_playlist_current");
		$("#jplayer_playlist_item_"+index).addClass("jplayer_playlist_current").parent().addClass("jplayer_playlist_current");
		playItem = index;
		$("#jquery_jplayer").jPlayer("setFile", myPlayList[playItem].mp3, myPlayList[playItem].ogg);
	}

	function playListChange( index ) {
		playListConfig( index );
		$("#jquery_jplayer").jPlayer("play");
	}

	function playListNext() {
		var index = (playItem+1 < myPlayList.length) ? playItem+1 : 0;
		playListChange( index );
	}

	function playListPrev() {
		var index = (playItem-1 >= 0) ? playItem-1 : myPlayList.length-1;
		playListChange( index );
	}
})
//]]>
</script>';
}

echo '<script type="text/javascript" src="' . CDN . '/js/celsius/cufon.js"></script>' . "\n";

if ($current_page == 'contact' or $current_page == 'mailinglist'){
	echo '<script type="text/javascript" src="' . CDN . '/js/celsius/jquery.twitter.search.js"></script>';
}
?>

<script type="text/javascript">
	Cufon.replace('#homeNav ul li a');
	Cufon.replace('#nav ul li a');
	Cufon.replace('#contact_form');
	Cufon.replace('#emailErrors');
</script>

<script type="text/javascript" src="<?php echo CDN; ?>/js/celsius/Alte_Haas_Grotesk_400-Alte_Haas_Grotesk_700.font.js"></script>

<?php

if ($current_page == 'contact' or $current_page == 'mailinglist'){
	
	echo '<script type="text/javascript" src="' . CDN . '/js/celsius/jquery-validate/jquery.validate.js"></script>' . "\n" .
	'<script type="text/javascript" src="' . CDN . '/js/celsius/jquery.form.js"></script>' . "\n" . '<script type="text/javascript" src="' . CDN . '/js/celsius/validate_contact.js"></script>';
}


if ($current_page == 'mailinglist'){
	echo '<script type="text/javascript" src="' . CDN . '/js/celsius/validate_mailing_list.js"></script>';
}

/** 
* add /js/cufon.js and /js/replace_fonts.js if Cufon is selected
* this is NOT a default setting
*/

if ($current_page == 'celsius'){
	echo '<script type="text/javascript" src="' . CDN . '/js/celsius/intro-animation.js"></script>' . "\n";
}

if ($current_page == 'videos'){
	echo '<script type="text/javascript" src="' . CDN . '/js/celsius/video_app.js"></script>' . "\n";
}
?>
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
<div id="siteContainer">
<div id="logo"></div>
