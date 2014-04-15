<?php 
if (! defined('BASEPATH')) exit('No direct script access');

// open class
class System extends Controller {

	//php 5 constructor
	function __construct() 
 	{
		parent::Controller();
	}
	
	//php 4 constructor
	function System() 
	{
		parent::Controller();
	}
	
	// system 
	function index()
	{
		// load libraries (preferred is autoload)
		// $this->load->library('database'); // database functions
		// $this->load->library('session'); // session functions
		// $this->load->library('navigation'); // navigation functions
		// $this->load->library('page'); // page functions
		// $this->load->library('stylesheet'); // css functions
		// $this->load->library('javascript'); // js functions
		// $this->load->library('data'); // data handling functions
		// $this->load->library('auth'); // authentification functions
		// $this->load->library('microformats'); // microformats functions
		// ------------------------------------------------------------------------
		// load helpers (preferred is autoload)
		// $this->load->helper('url');
		// $this->load->helper('meta');
		// $this->load->helper('language');
		// $this->load->helper('array');
		// $this->load->helper('utility');
		// ------------------------------------------------------------------------
		// load plugins (preferred is autoload)
		// $this->load->plugin('logo');
		// $this->load->helper('slogan');
		// $this->load->helper('encrypt_email');
		// ------------------------------------------------------------------------
		// load config (preferred is autoload)
		// $this->load->plugin('meta_data');
		// $this->load->helper('data');
		// $this->load->helper('resources');
		// ------------------------------------------------------------------------
		// load language files (preferred is autoload)
		// $this->CI->lang->load('system', $this->CI->config->item('language'));
		// ------------------------------------------------------------------------
		$this->uri->analyse();
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
						'levels' => array(0,1,2),
						'active' => '',
						'db_table' => 'menu'
					),
					'meta' => array(
						'wrapper' => 'ul',
						'nav_id' => 'meta',
						'nav_class' => 'meta',
						'menu' => 'meta',
						'levels' => array(0),
						'active' => '',
						'db_table' => 'menu'
					),
					'footer' => array(
						'wrapper' => 'ul',
						'nav_id' => 'footer_menu',
						'nav_class' => 'footer_menu',
						'menu' => 'footer',
						'levels' => array(0),
						'active' => '',
						'db_table' => 'menu'
					),
					'sitemap' => array(
						'wrapper' => 'ul',
						'nav_id' => 'sitemap',
						'nav_class' => '',
						'menu' => 'main',
						'levels' => array(0,1,2),
						'active' => '',
						'db_table' => 'menu'
					)
				);
				$this->navigation->set_options($option['nav']);
				// ******************************************
					
				$data['navigation'] = $this->navigation->build('main');
				// $data['meta'] = $this->navigation->build('meta');
				$data['meta'] = NULL;
				$data['footer'] = $this->navigation->build('footer');

				$this->page->add_data($data);

				$this->page->load();

	}

// close system controller	
}
	
/* End of file System.php */
/* Location: ./application/web_site_name/controllers/System.php */