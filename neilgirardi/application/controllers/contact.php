<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller 
{
    // string
    private $email_address;
    // string
    private $email_subject;
    // string
    private $email_message;
    // array
    public $config;
        
    function __construct() 
    {
        // override CI's native constructor
        parent::__construct();
        
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('email', 'form_validation'));
        
        $this->meta_tag = new Meta_tag;
        $this->meta_tag->title = "Neil Girardi's Web Portfolio";
        $this->meta_tag->description = 'Neil Girardi is a software engineer in New York City who specializes in object-oriented web programming, pixel-perfect front-end development, Ajax, and Android applications.';
        $this->meta_tag->author = 'Neil Girardi';
        $this->meta_tag->page = 'contact';
    }
    
    
    /**
     * @Return void
     */
    function Index()
    {
        $config = array(
            array(
            'field' => 'email_address',
            'label' => 'Your e-amail address',
            'rules' => 'required|valid_email|trim|xss_clean|callback_set_email_address' 
            ),
            array(
            'field' => 'email_subject',
            'label' => 'Subject',
            'rules' => 'required|trim|xss_clean|callback_set_email_subject'
            ),
            array(
            'field' => 'email_message',
            'label' => 'Message',
            'rules' => 'required|trim|xss_clean|callback_set_email_message'
            )
        );
        
        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
        
        if ($this->form_validation->run() == FALSE) {
            $this->show_form();
        } else {
            $this->send_mail();
            $this->show_confirmation(); 
        }
    }


    /*
     * @Return void
     */
    function show_form()
    {
        if ($this->input->is_ajax_request()) {
             $this->load->view('contact_form');
        } else {
            $this->parser->parse('includes/html_head', $this->meta_tag);
            $this->load->view('includes/nav');
            $this->load->view('contact_form');
            $this->load->view( 'includes/footer');
            $this->load->view( 'includes/header');
            $this->load->view('includes/end_of_page');   
        }
    }
    
    
    /**
     * @Return void
     */
    function show_confirmation()
    {
        if ($this->input->is_ajax_request()) {
            $this->load->view('contact_confirmation');
        } else {
            $this->parser->parse('includes/html_head', $this->meta_tag);
            $this->load->view('includes/nav');
            $this->load->view('contact_confirmation');
            $this->load->view( 'includes/footer');
            $this->load->view( 'includes/header');
            $this->load->view('includes/end_of_page');   
        }
    }
    
    
    /**
     * @Return void
     */
    function show_error()
    {
        
    }
    
    
    /**
     * @Return void
     * @Param string $email_address (the message sender's return email address)
     */
    function set_email_address($email_address)
    {
        $this->email_address = $email_address;
    }
    
    
    /**
     * @Return void
     * @Param string $email_subject (the subject of the email message being sent)
     */
    function set_email_subject($email_subject)
    {
        $this->email_subject = $email_subject;
    }
    
    
    /**
     * @Return void
     * @Param string $email_message (the body of the email message)
     */
    function set_email_message($email_message)
    {
        $this->email_message = $email_message;
    }
  
  
    /**
     * @Return void 
     */
    function send_mail()
    {
        $this->email->from($this->email_address);
        $this->email->to('neil.girardi@gmail.com');
        $this->email->subject($this->email_subject);
        $this->email->message($this->email_message);
        $this->email->send();
    }
    
}
