<?php 
echo form_open('recaptchademo');
echo form_error('recaptcha_response_field');
echo $recaptcha;
echo form_submit('recaptchasubmit','Check Recaptcha');
echo form_close(); 
?>