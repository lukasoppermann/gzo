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
		// get menus, etc. to $data
		unset($data);
		$data = $this->data;
		// get posts
		$post_data = index_array(get_db_data(config('prefix').config('db_entries'), array('where' => array('type' => '2'), 'select' => '*')), 'language', TRUE);
		// get current lang posts by channel
		$posts = index_array($post_data[config('lang_id')], 'channel', TRUE);	

		
		// if news is selected
		if( $this->navigation->current('path') === '/kontakt/jobs' )
		{
			$data['page'] = "";
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
			$this->config->set_item('title', 'Kontakt');
		}
		elseif( $this->navigation->current('path') === '/contact' )
		{
			$data['page'] = $this->load->view('custom/kontakt_en', '', TRUE);
			$this->config->set_item('title', 'Contact');
		}
		
		// get teasers
		$data['teaser'] = '';
		foreach( $post_data[config('lang_id')] as $id => $tes )
		{
			// check for teaser
			if( isset($tes['teaser']) && $tes['teaser'] != NULL )
			{
				$data['teaser'] .= $this->load->view('teaser', $tes, TRUE);
			}
		}

		//
		if( (!isset($news) || $news == 'false') && $this->navigation->current('path') != '/kontakt' )
		{
			if( ($this->navigation->current('id') != 12 && $this->navigation->current('id') != 15) )
			{
				// get news teaser
				$teaser = index_array($post_data[config('lang_id')], 'teaser', TRUE);
				$teaser = $teaser['true'];
				// sort tesaer
				$subkey = 'date';
				foreach($teaser as $key => $value)
				{
					$arr[$key] = strtolower($value[$subkey]);
				}
				arsort($arr);
				foreach($arr as $k => $v) 
				{
					$sorted_array[$k] = $teaser[$k];
				}

				$teaser = $sorted_array;
						
				foreach($teaser as $tease)
				{
				 	$tease['text'] = trim_text($tease['text'], 200);
					$teasers[] = $this->load->view('custom/teaser', $tease, true);
				}
			}
			//
			$data['page'] = '<div class="entry">'.$this->entries->get($this->navigation->current('id'), $this->data, TRUE).'</div>'.implode($teasers, '');
			// set description
			if($desc = $this->entries->get_element('description', $this->navigation->current('id')))
			{
			 	$this->config->set_item('description', $desc);		
			}
			// get header image
			if($header = $this->entries->get_element('header', $this->navigation->current('id')))
			{
			 	$data['header'] = $header;
			}
			else
			{
				$data['header'] = null;
			}
			// set title 
			$this->config->set_item('title', $this->entries->get_element('title', $this->navigation->current('id')));
			// <div id="media_box">
			// get media
			$media = $this->entries->get_element('media', $this->navigation->current('id'));
			if( $media != NULL )
			{
				$data['teaser'] = $media.$data['teaser'];
			}
		}
		// load view
		view('', $data);
	}
//
}	
/* End of file Base.php */
/* Location: ./application/controllers/Base.php */