<?php 
if (! defined('BASEPATH')) exit('No direct script access');

// open class
class Base extends MY_Controller {

	//php 5 constructor
	function __construct() 
 	{
		parent::__construct();
	}
	
	function index($page = null)
	{
		$language = $this->config->item('languages');
		$language = index_array($language['array'],'abbr');
		$this->lang->load('text', $language[config('lang_abbr')]['name']);
		$data = $this->data;
		// get posts
		$post_data = index_array(get_db_data(config('prefix').config('db_entries'), array('where' => array('type' => '2'), 'select' => '*')), 'language', TRUE);
		// get current lang posts by channel
		$posts = index_array($post_data[config('lang_id')], 'channel', TRUE);	
		// reset variables
		$data['header'] = null;
		$data['page'] = "";
		
		// special cases
		if( $this->navigation->current('path') === '/kontakt/jobs' )
		{
			if(isset($posts[1]))
			{
				$posts = index_array($posts[1], 'date');
				ksort($posts);
				foreach($posts as $key => $post)
				{
					$content[] = $this->load->view('custom/entry', $post, true);
				}
				$data['page'] = '<div class="with-teaser">'.implode($content, '').'</div>';
			}
			$data['page'] .= $this->load->view('custom/job-teaser', '', TRUE);
			$this->config->set_item('title', 'Jobs');
			// get header image
			$data['header'] = "kontakt.jpg";
			$news = 'true';
		}
		elseif( $this->navigation->current('path') === '/kontakt' )
		{
			$data['page'] = $this->load->view('custom/kontakt', '', TRUE);
			$data['header'] = "kontakt.jpg";
			$this->config->set_item('title', 'Kontakt');
		}
		elseif( $this->navigation->current('path') === '/contact' )
		{
			$data['page'] = $this->load->view('custom/kontakt_en', '', TRUE);
			$data['header'] = "kontakt.jpg";
			$this->config->set_item('title', 'Contact');
		}

		// default case
		if(!isset($data['page']) || $data['page'] == null)
		{
			$data['page'] = '<div class="entry">'.$this->entries->get($this->navigation->current('id'), $this->data, TRUE).'</div>';
			// set description
			if($desc = $this->entries->get_element('description', $this->navigation->current('id')))
			{
			 	$this->config->set_item('description', $desc);		
			}
			$this->config->set_item('title', $this->entries->get_element('title', $this->navigation->current('id')));
			
			if($header = $this->entries->get_element('header', $this->navigation->current('id')))
			{
			 	$data['header'] = $header;
			}
		}
		
		// load view
		view('', $data);
	}
//
}	
/* End of file Base.php */
/* Location: ./application/controllers/Base.php */