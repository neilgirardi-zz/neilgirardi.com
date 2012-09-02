$(document).ready(function() {
	
	var options = {resetForm: true, success: displayResult};
	
	function displayResult(){
		$('#emailConf').fadeIn(500);
	}
	
	$('#closeConf').click(function(){
		$('#emailConf').fadeOut(500);
	});
	
	
	
	$('#contact_form').validate({
			rules: {
			  
			   email_address: {
				   required: true,
				   email: true
			   },
			   email_subject: {
				   required: true,				  
			   },
			   email_body: {
				   required: false,
			   }			   
			},
			success: function(label) {
			   label.html('<img src="images/checkmark.png" width="20" height="19" alt="" />').addClass('valid');
			}
		});		
		
		$('#contact_form').ajaxForm(options);
});