	// Set up event handlers
	document.observe('dom:loaded', function() {
	$('emailConf').hide();	
	$('emailConf').onclick = hideConf;
	});
	
	function hideConf(){
		$('emailConf').toggle();
		return false;
	}
	
	function visConf(){
		$('emailConf').toggle();
	}
	
	function showConf(){
		$('emailConf').show();
	}

	function validate_email(my_form) {
		var email_errors = new Array();

		if (my_form.email_address.value == "") {
			email_errors.push('You forgot to write your e-mail address');
			my_form.email_address.style.backgroundColor = "#f6f905";
		}
		if (my_form.email_subject.value == "") {
			email_errors.push('You forgot to write the subject');
			my_form.email_subject.style.backgroundColor = "#f6f905";
		}
		if (my_form.email_body.value == "") {
			email_errors.push('You forgot to write the message');
			my_form.email_body.style.backgroundColor = "#f6f905";
		}
		if (email_errors.length > 0){
			var errorString = email_errors.join("\n");
			alert(errorString);
		
			if (my_form.email_address.value == "") {
				my_form.email_address.focus();
				return false;
			}
			if (my_form.email_subject.value == "") {
				my_form.email_subject.focus();
				return false;
			}
			if (my_form.email_body.value == "") {
				my_form.email_body.focus();
				return false;
			}
		}
		return true;
	}