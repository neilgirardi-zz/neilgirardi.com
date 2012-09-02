<?php 
	if (isset($_GET['file'])) {
		$file = $_GET['file'];

		if (file_exists($file) && is_readable($file) && preg_match('/\.pdf$/',$file)) {
			header('Content-type: application/pdf');
			header("Content-Disposition: attachment; filename=\"$file\"");
		
			} elseif (file_exists($file) && is_readable($file) && preg_match('/\.mp3$/',$file)) {
				header('Content-type: audio/mpeg');
				header("Content-Disposition: attachment; filename=\"$file\"");
			
			} elseif (file_exists($file) && is_readable($file) && preg_match('/\.m4a$/',$file)) {
				header('Content-type: audio/x-m4a');
				header("Content-Disposition: attachment; filename=\"$file\"");
			
			} elseif (file_exists($file) && is_readable($file) && preg_match('/\.jpg$/',$file)) {
				header('Content-type: image/jpeg');
				header("Content-Disposition: attachment; filename=\"$file\"");
		}
	
	readfile($file);

	} else {
	header("HTTP/1.0 404 Not Found");
	echo "<h1>Error 404: File Not Found: <br /><em>$file</em></h1>";
	}
													
?>