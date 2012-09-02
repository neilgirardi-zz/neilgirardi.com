<?php # config.php

	// Flag variable for site status:
	define('LIVE', TRUE);
	
	//	define a path for the php includes that are file dependencies of thi site's pages
	$includedFilePath = '/usr/www/users/neilcnd/neilgirardi/portfolio/application/views/portfolio_sites/celsius/php_includes';
	
	// add it php include_path() tio make it easier to call the includes
	$originalPath = set_include_path(get_include_path() . PATH_SEPARATOR . $includedFilePath);
	
	// Site URL (base for all redirections):
	//define ('BASE_URL', 'http://www.celsius911.net/');

	// Admin contact e-mail address:
	define('EMAIL' , 'admin@celsius911.net');

	// Localtion of MySQL connection script:
	define('MYSQL', '/usr/home/c4ll911/mysqli_connect.php');

	// Set the time zone:
	date_default_timezone_set ('US/Eastern');

	// Create the error handler:
	function my_error_handler ($e_number, $e_message, $e_file, $e_line, $e_vars) {

	// Build the error message:
	$message = "An error occurred in script '$e_file' on line $e_line: $e_message\n";
	
	// Append $e_vars to  $message:
	$message .= print_r ($e_vars, 1);

	if (!LIVE) { // Development (print the error).
		echo '<p class="error">' . $message . "\n";
		debug_print_backtrace();
		echo '</p>';
	} else { // Don't show the error.
	
		// e-mail the administrator:
		mail(EMAIL, 'Site Error!' , $message, 'From: celsius@celsius911.net');
	}
		
		// Ony print an error is the error is not a notice:
		
		if ($e_number !=E_NOTICE) {
		echo '<p class="error">Hmmm...Something went wrong here. The web site administrator has been notified of the problem via email. Sorry for the inconvenience!</p>';		
	}

} // End of !LIVE IF.

// Use my error handler:
set_error_handler ('my_error_handler');
?>