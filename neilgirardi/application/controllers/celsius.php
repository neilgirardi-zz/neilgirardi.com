<?php	#define celsius class
class Celsius extends CI_controller{

	
	// Create function to block spam.
	public function spam_scrubber($value) {

		$spam_values = array('to:' , 'cc:' , 'bcc:' , 'content-type:' , 'mime-version:' , 'multipart-mixed:' , 'content-transfer-encoding:');
	
		foreach ($spam_values as $spam_value) {
			if (stripos($value, $spam_value) !== false) return ' ';
		}
		
		$value = str_replace(array( "\r" , "\n" , "%0a" , "%0d"), ' ', $value);
	
		return trim($value);
	} 


	// load index
	public function index(){
		$this->load->view('celsius/index');
	}


	// load mailing list
	function mailinglist(){
		$this->load->view('celsius/mailinglist');
	}
	
	
	// load contact	
	function contact(){
		$this->load->view('celsius/contact');
	}	
		
		
	// load videos
	function videos(){
		$this->load->view('celsius/videos');
	}

	
}