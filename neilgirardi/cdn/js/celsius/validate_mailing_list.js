$(document).ready(function() {
	
	var options = {resetForm: true, success: displayResult};
	
	function displayResult(){
		$('#emailConf').fadeIn(500);
	}
	
	$('#closeConf').click(function(){
		$('#emailConf').fadeOut(500);
	});
	
	
	
	$('#mailing_list').validate({
			rules: {
			  
			   email_address: {
				   required: true,
				   email: true
			   },
			   name_first: {
				   required: true,				  
			   },
			   name_last: {
				   required: true,
			   },
			   country_residence: {
			   	required: false
			   },
			   city_residence: {
			   required: false
			   },
			   state_residence: {
			   required: false
			   }
			},
			success: function(label) {
			   label.html('<img src="images/checkmark.png" width="20" height="19" alt="" />').addClass('valid');
			}
		});		
		
		$('#mailing_list').ajaxForm(options);
});