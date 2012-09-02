<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Resume extends CI_Controller 
{
        
    function __construct() 
    {
        parent::__construct();
        
        $this->meta_tag = new Meta_tag;
        $this->meta_tag->title = "Neil Girardi's Resume";
        $this->meta_tag->description = "See Neil Girardi's Resume.";
        $this->meta_tag->author = 'Neil Girardi';
        $this->meta_tag->page = 'resume';
        
        $this->load->helper('download');
    }
    
    function Index()
    {
        $this->parser->parse('includes/html_head',$this->meta_tag);
        $this->load->view('includes/nav');
        $this->load->view('resume');
        $this->load->view( 'includes/footer');
        $this->load->view( 'includes/header');
        $this->load->view('includes/end_of_page');
    }
    
    function download()
    {
        $data = file_get_contents("http://d2anjul3ixu9f5.cloudfront.net/resume/neil-girardi-resume-august-2012.pdf"); // Read the file's contents
        $name = 'Neil-Girardi-Resume.pdf';

        force_download($name, $data);    
    }
    
    
    
}