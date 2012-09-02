<?php 

$page_title = "Contact Celsius";
	
require_once("php_includes/header.inc.php");
	
require_once("php_includes/nav.inc.php");
	
// PHP Validation for e-mail.
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$errors = array();
	
	// Sanitize the form data.
	$scrubbed = array_map('spam_scrubber', $_POST);
	
	if (empty($scrubbed['email_address'])) {
		$errors[] = '<li class="error">You forgot to write your e-mail address.</li>';
	} else {
		$email_address = strip_tags($scrubbed['email_address']);
	}
	
	if (empty($scrubbed['email_subject'])) {
		$errors[] = '<li class="error">You forgot to write the subject.</li>';
	} else {
		$email_subject = strip_tags($scrubbed['email_subject']);
	}
	
	if (empty($scrubbed['email_body'])) {
		$errors[] = '<li class="error">You forgot to write your message!</li>';
	} else {
		$email_body = $scrubbed['email_body'];
	}
	
	if (empty($errors)) {
			
		// Include the Rmail library.
		require_once('Rmail/Rmail.php');	
		
		$body = $email_body;
			
		$body = wordwrap($body, 70);
	
		$to = 'celsius@celsius911.net' ;
	
		$subject = $email_subject;
	
		$mail = new Rmail ();
		$mail->setFrom("$email_address");
		$mail->setSubject("$subject");
		$mail->setPriority('normal');
		$mail->setText("$body");
		$mail->send(array("$to"));
			
		// Free up Rmail overhead
		unset($mail);
			
		// Clear $_POST so that form info does not "stick" for next user.
		$_POST = array();
		
	} else {	// If there were errors;
		
		echo '<div id="emailErrors">';
					
		echo "<h2>Oops! Something wasn't filled out properly</h2>";
					
		echo '<ul>';
		
		foreach ($errors as $error) {	// Print each individual error in the array.
			echo $error;
		}
		echo '</ul></div>';	//	END OF #emailErrors
	}
	// Clear $_POST so that form infor does not "stick" for next user.
	$_POST = array();
}
?>

<div id="contactPageContainer">
	
	<div id="emailConf">
    	<a href="#" id="closeConf">CLOSE</a>
    	<p>Your e-mail Message has been Sent to Celsius!</p><p>Thank You</p>
    </div>
   


	<div id="contactForm">
		<form enctype="multipart/form-data" id="contact_form" method="post" action="contact" accept-charset="UTF-8" class="contact">  
    
		<h1 class="formH1">SEND AN E-MAIL TO CELSIUS</h1>
      		
		<div class="labelAndInput">
			<label>Your e-mail address</label>
			<input type="text" name="email_address" class="emailSubject"/>
		</div>	<!--	END OF .labelAndInput	-->
          
		<div class="labelAndInput">
			<label>Subject</label>
			<input type="text" name="email_subject" class="emailSubject"/>
		</div>	<!--	END OF .labelAndInput	-->
          
		
		<label class="textInputLabel">Message</label>
		<textarea id="email_body" cols="10" rows="10" name="email_body"></textarea>
		
              
			<div class="buttonarea">
			<input type="submit" value="SEND EMAIL" />
			</div>	<!--	End of .buttonarea	-->
			<input type="hidden" name="submitted" value="true" />

	</form>   
	</div>
	
	 
    <div id="twitter1" class="twitter">
	</div>
	
	<script type="text/javascript">
	$('#twitter1').twitterSearch({
	term: 'celsius911',
	bird: false,
	colorExterior: '#1F8FDD',
	colorInterior: '#fff',
	});
	</script>
	</div>
	</div>	<!-- End of .content	-->
	</body>
	</html>
