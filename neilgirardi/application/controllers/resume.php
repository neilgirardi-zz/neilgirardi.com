<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Resume extends CI_Controller 
{
        
    function __construct() 
    {
        parent::__construct();
        
        $this->meta_tag = new Meta_tag;
        $this->meta_tag->title = "Neil Girardi's Resume";
        $this->meta_tag->description = 'Neil Girardi is a software engineer in New York City who specializes in object-oriented web programming, pixel-perfect front-end development, Ajax, and Android applications.';
        $this->meta_tag->author = 'Neil Girardi';
  
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
    
    
    
}