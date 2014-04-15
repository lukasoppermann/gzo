<?php 

if (! defined('BASEPATH')) exit('No direct script access');
class Base extends Controller {
	
	var $loaded = NULL;
	
	//php 5 constructor
	function __construct() 
 	{
		parent::Controller();
	}
	
	//php 4 constructor
	function Base() 
	{
		parent::Controller();
	}
	
	function index() 
	{
		// ******************************************
		// load libraries
		// ------------------------------
		// load library for building pages
		// $this->load->library('page');
		// ------------------------------	
		// load library for building navigations	
		$this->load->library('navigation');
		// ------------------------------	
		// load library for using microfortmats	
		$this->load->library('microformats');
		// ******************************************
		// $this->load->library('auth');				
		// ******************************************
		// set options
		// ------------------------------
		// set options for navigations
		$option['nav'] = array(
			'main' => array(
				'wrapper' => 'ul',
				'nav_id' => 'nav',
				'nav_class' => '',
				'menu' => 'main',
				'levels' => array(0),
				'active' => '',
				'db_table' => 'menu'
			),
			'sub' => array(
				'wrapper' => 'ol',
				'nav_id' => 'nav',
				'nav_class' => '',
				'menu' => 'main',
				'levels' => array(1,2),
				'active' => '',
				'db_table' => 'menu'
			)
		);
		$this->navigation->set_options($option['nav']);
		// ******************************************
		// $this->auth->run();		
		// ******************************************
		// preparing data for display
		// ------------------------------	
		// set unique id if exists
		// if( !empty($data['unique_id']) )
		// {
		// 	$this->stylesheet->add_unique($data['unique_id']);
		// }

		// ------------------------------	
		// set unique page style sheet if exists		

		
		// ******************************************			
		// $address['work'] = array(
		// 	'type' =>'work',
		// 	'org' =>'veare',
		// 	'street'=>'Danziger Str. 12',
		// 	'city'=>'Berlin',
		// 	'zip'=>'13187',
		// 	'country'=>'Germany',
		// 	'region'=>'Berlin',
		// 	'mobile_phone'=>'+49 0157 714 96 644',
		// 	'fax' =>'+49 30 4 655 175',
		// 	'photo'=>'images/lukas_oppermann.jpg',
		// 	'photo_name' =>'Lukas Oppermann',
		// 	'website'=>'http://www.veare.net',
		// 	'website_name' =>'veare',
		// 	'email' =>'info@veare.net',
		// 	'lastname'=>'Oppermann',
		// 	'firstname'=>'Lukas'			
		// );
		
		$this->stylesheet->add(base_url().'libs/folder/lukas,elisa,  matze  ','screen');
		// $this->stylesheet->output();
		// $this->stylesheet->add_unique('lukas');
		$this->javascript->add('dialog','jquery.dialog.min',array('jquery','jquery.ui'));
		$this->javascript->script('analytics',array('code'=>'UA-7074034-10'));
				
		// $this->microformats->add('templates/vcard', 'work', $address['work']);	
// *********		
		$data['navigation'] = $this->navigation->build('main');
		$data['sub'] = $this->navigation->build('sub');
		
		$this->page->add_data($data);
		
		$this->page->load();
	}

}

/* End of file default.php */
/* Location: ./application/web_site_name/controllers/default.php */