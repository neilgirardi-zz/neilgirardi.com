$(document).ready(function() {
	$('#logo').hide();
	$('#homeNav').hide();
	$('#homeNav ul').css({width:0, height:0, overflow:'hidden'});
	$('#celsiusLayer1').hide();
	$('#celsiusLayer2').hide();
	$('.jp-single-player').hide();
	
	function introAnimation(){
	
		setTimeout(function(){
			$('#logo').fadeIn(3000);
			$('.jp-single-player').fadeIn(3000);
		}, 1500);
		
		setTimeout(function(){
		$('#homeNav').slideDown(750);
		}, 3700);
		
		setTimeout(function(){
			$('#celsiusLayer1').fadeIn(3000);
			$('#celsiusLayer2').fadeIn(3000);
			$('#homeNav ul').animate({width:'100%', height:'13px'}, 500).fadeIn();
		}, 4700);
		
	}
	
	$(window).load(function(){
		introAnimation();
	});
});