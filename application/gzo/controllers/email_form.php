<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Email_form extends MY_Controller {
	
	var $to_email = NULL;
	//php 5 constructor
	function __construct() 
 	{
		parent::Controller();
	}
	
	//php 4 constructor
	function Email_form() 
	{
		parent::Controller();
	}
	
	function index($string = NULL) 
	{
		$data['content'] = "Contact Page";
		$this->form($data);
	}
	
	// display form
	function form($data = NULL, $template = 'templates/contact_form')
	{		
		$this->lang->load('form', $this->config->item('language'));
		$this->load->helper('form');
		
		$form = $this->load->view($template, $data, TRUE);
		
		$data['template'] = 'default';
		$data['form'] = $form;	
		$data['navigation'] = $this->navigation();
		
		$this->load->view('template', $data);	
	}
	
	// validate form data
	function validate()
	{
		$this->load->library('form_validation');	
		$this->lang->load('form', $this->config->item('language'));
		$this->lang->load('form_validation', $this->config->item('language'));				
					
		$this->form_validation->set_rules('email','lang:form_email','trim|required|valid_email');	
		$this->form_validation->set_rules('name','lang:form_name','trim|required');	
		$this->form_validation->set_rules('subject','lang:form_subject','trim|required');			
		$this->form_validation->set_rules('message','lang:form_message','trim|required');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');	
		
		if($this->form_validation->run('email') === TRUE)
		{
			$this->send();
			$this->success();
		}
		else
		{
			$this->form(array('content'=>'Lukas'));
		}
	}
	
	// send form
	function send()
	{
		$this->load->library('email');
		$this->load->library('parser');
		
		$data = array('message' => $this->input->post('message'));
		
		$htmlMessage = $this->parser->parse('email/contact_html', $data, true);
		$txtMessage = $this->parser->parse('email/contact_txt', $data, true);		
		
		$this->email->from($this->input->post('email'),$this->input->post('name'));
		$this->email->to($this->config->item('email_contact'));
		$this->email->subject($this->input->post('subject'));			
		$this->email->message($this->input->post('message'));
		$this->email->set_alt_message($this->input->post('message'));
		
		$this->email->send();
	}
	
	// success
	function success()
	{
		$data['template'] = 'templates/email_success';
		$this->load->view('template', $data);		
	}
}


/* End of file Email_form.php */
/* Location: ./application/web_site_name/controllers/Email_form.php */