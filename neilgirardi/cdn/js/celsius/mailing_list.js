 	// Set up event handlers
	document.observe('dom:loaded', function() {
	$('listConf').hide();
	$('guestBookPhoto').hide();
	$('closeConf').onclick = hideConf;
	guestBookFX();
	});
	
	function fadeGuestbook(){
		$('guestBookPhoto').appear({duration: 2.0});
	}
	
	function guestBookFX(){
		setTimeout('fadeGuestbook()', 2000);
	}
	
	
	function hideConf(){
		$('listConf').hide();
		return false;
	}
	
	function showConf(){
		$('listConf').show();
	}

	function validate_email_list(my_form) {
		var email_list_errors = new Array();

		if (my_form.name_first.value == "") {
			email_list_errors.push('You forgot to write your First Name.');
			my_form.name_first.style.backgroundColor = "#f6f905";
		}
		if (my_form.name_last.value == "") {
			email_list_errors.push('You forgot to write your Last Name');
			my_form.name_last.style.backgroundColor = "#f6f905";
		}
		if (my_form.email_address.value == "") {
			email_list_errors.push('You forgot to write your E-Mail Address' );
			my_form.email_address.style.backgroundColor = "#f6f905";
		}
		if (email_list_errors.length > 0){
			var errorString = email_list_errors.join("\n");
			alert(errorString);
		
			if (my_form.name_first.value == "") {
				my_form.name_first.focus();
				return false;
			}
			if (my_form.name_last.value == "") {
				my_form.name_last.focus();
				return false;
			}
			if (my_form.email_address.value == "") {
				my_form.email_address.focus();
				return false;
			}
		}
		return true;
	}