<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller 
{
        
    function __construct() 
    {
        parent::__construct();
        
        $this->seo = new Seo;
        $this->seo->title = "Neil Girardi's Web Portfolio";
        $this->seo->description = 'Neil Girardi is a software engineer in New York City who specializes in object-oriented web programming, pixel-perfect front-end development, Ajax, and Android applications.';
        $this->seo->author = 'Neil Girardi';
   
        $this->cdn = $this->config->item('cdn');
    }
    
    function Index()
    {
        $this->parser->parse('includes/html_head', array('cdn'=>$this->cdn, 'seo'=>$this->seo));
        $this->parser->parse('includes/nav');
        $this->parser->parse('contact', array('cdn'=>$this->cdn));
        $this->parser->parse( 'includes/footer');
        $this->parser->parse( 'includes/header');
        $this->parser->parse('includes/end_of_page', array('cdn'=>$this->cdn));
    }
    
    
    
}
