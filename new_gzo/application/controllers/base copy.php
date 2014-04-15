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
		// if blog is selected
		if( ($this->navigation->current('id') == 29 || $this->navigation->current('id') == 9) )
		{
			$variable = $this->navigation->active('variables');
			if( isset($variable) && $variable != null )
			{
				// get post
				$post = index_array($posts[2], 'permalink');
				$post = $post[$variable];
				// set content
				$back = '<a class="back-link" href="'.lang_url(false).$this->navigation->current('path').'">'.lang('back_blog').'</a>';
				$data['page'] = $back.'<h1>'.$post['title'].'</h1><div class="blog_text">'.$post['text'].'<span class="author">Dirk Gather</span></div>
					<div class="blog_img"><img alt="'.$post['image'].'" src="'.base_url(TRUE).'media/images/'.$post['image'].'"></div>';
				// set title
				$this->config->set_item('title', $post['title']);
			}
			else
			{			
				if(isset($posts[2]))
				{
					foreach($posts[2] as $key => $post)
					{
						if( empty($post['excerpt']) )
						{
							$post['excerpt'] = trim_text($post['text'], 300, array('end' => '...'));
						}
						$content[] = $this->load->view('custom/blog_preview', $post, true);
						unset($post);
					}
					$data['page'] = implode($content, '');
				}
				else
				{
					$data['page'] = "";
				}
				$this->config->set_item('title', 'Good Vibrations');
			}
			$news = 'true';
			// get header image
			$data['header'] = null;
		}
		// if news is selected
		if( ($this->navigation->current('id') == 16 || $this->navigation->current('id') == 24) )
		{
			$data['header'] = null;
			$variable = $this->navigation->active('variables');
			if( isset($variable) && $variable != null )
			{
				// get post
				$post = index_array($posts[1], 'permalink');
				$post = $post[$variable];
				// set header
				if( isset($post['header']) && $post['header'] != null )
				{
					$data['header'] = $post['header'];
				}
				// set content
				$back = '<a class="back-link" href="'.lang_url(false).$this->navigation->current('path').'">'.lang('back_news').'</a>';
				$data['page'] = $back.'<h1>'.$post['title'].'</h1>'.$post['text'];
				// set title
				$this->config->set_item('title', $post['title']);
			}
			else
			{
				if(isset($posts[1]))
				{
					foreach($posts[1] as $key => $post)
					{
						if( empty($post['excerpt']) )
						{
							$post['excerpt'] = trim_text($post['text'], 300, array('end' => '...', 'strip_tags' => 'false'));
						}
						$content[] = $this->load->view('custom/blog_preview', $post, true);
						unset($post);
					}
					$data['page'] = implode($content, '');
				}
				else
				{
					$data['page'] = "";
				}
				$this->config->set_item('title', 'News');
			}
			// get header image
			$news = 'true';
		}
		//
		if(!isset($news) || $news == 'false' )
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
			// set tags
			if($tags = $this->entries->get_element('tags', $this->navigation->current('id')))
			{
			 	$this->config->set_item('tags', $tags);		
			}
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
		}
		// load view
		view('', $data);
	}
//
}	
/* End of file Base.php */
/* Location: ./application/controllers/Base.php */