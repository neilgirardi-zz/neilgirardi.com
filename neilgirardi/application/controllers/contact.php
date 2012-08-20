<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller 
{
    private $email_address;
    private $email_subject;
    private $email_message;
    private $errors = array();
        
    function __construct() 
    {
        parent::__construct();
        
        $this->load->library('email');
        
        $this->meta_tag = new Meta_tag;
        $this->meta_tag->title = "Neil Girardi's Web Portfolio";
        $this->meta_tag->description = 'Neil Girardi is a software engineer in New York City who specializes in object-oriented web programming, pixel-perfect front-end development, Ajax, and Android applications.';
        $this->meta_tag->author = 'Neil Girardi';
        $this->meta_tag->page = 'contact';
   
        $this->cdn = $this->config->item('cdn');
    }
    
    function Index()
    {
        $this->parser->parse('includes/html_head', $this->meta_tag);
        $this->load->view('includes/nav');
        $this->load->view('contact');
        $this->load->view( 'includes/footer');
        $this->load->view( 'includes/header');
        $this->load->view('includes/end_of_page');
    }
    
    function validate_email()
    {
        if (isset($_POST['email_address']) && !empty($_POST['email_address'])){
            $this->email_address = strip_tags($_POST['email_address']);
        } else {
            $this->errors[] = '<li>Email Address is a required field</li>';
        }
        
        if (isset($_POST['email_subject']) && !empty($_POST['email_subject'])){
            $this->email_subject = strip_tags($_POST['email_subject']);
        } else {
            $this->errors[] = '<li>Email subject is a required field</li>';
        }
        
        if (!empty($_POST['email_message']) && strlen($_POST['email_message']) > 0){
            $this->email_message = strip_tags($_POST['email_message']);
        } else {
            $this->errors[] = '<li>Email message is a required field.</li>';
        }
        if (empty($this->errors)) {
           $this->send_mail();
        }
    }
    
    function send_mail()
    {
        $this->email->from($this->email_address);
        $this->email->to('neil.girardi@gmail.com');
        $this->email->subject($this->email_subject);
        $this->email->message($this->email_message);
        $this->email->send();
    }
    
}
