<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class page_model extends Model {

	//php 5 constructor
	function __construct() 
	{
		parent::Model();
	}
	
	//php 4 constructor
	function page_model() 
	{
		parent::Model();
	}
	// function: fetch (cluster)
	function fetch($path, $option = array(NULL)) 
	{
		$this->db->where('path', $path);
		$query = $this->db->get('pages');
		
		foreach ($query->result() as $row)
		{
			$page[] = $row->entry_id;
		}
		
		if(empty($page))
		{
			return false;
		}
		else
		{
			$array = $this->fetch_entries($page, $option);
			return $array;
		}
	}
	
	//function: fetch_entries
	function fetch_entries($ids, $option = array(NULL))
	{
		$option = array_merge(
			array(
				'lang' => url_get_lang(current_url()),
				'keys' => array('tags','author','title')
			), 
			$option);
		
		$this->db->select('entries.id, entries.title, entries.content, entries.excerpt, entries.date, lang');
		$this->db->where('entries.status','published');
		$this->db->like('lang', $option['lang']);
		$this->db->where_in('entries.id', $ids);
		$this->db->from('entries');

		$query = $this->db->get();

		$this->db->select('id, entry_id, type, value');
		$this->db->where_in('entry_id', $ids);
		$this->db->from('entry_data');
		
		$query_data = $this->db->get();

		foreach ($query_data->result() as $row)
		{
			$entry_data[$row->entry_id][$row->type] = $row->value;
		}
	
		$i=0;		
		foreach ($query->result() as $row)
		{
			$entries[$row->id] = array(
				'id' => $row->id,
				'headline' => $row->title,
				'content' => $row->content,
				'excerpt' => $row->excerpt,
				'date' => $row->date
			);
			
			foreach( $option['keys'] as $key )
			{
				if(isset($entry_data[$row->id][$key]))
				{
					$entries[$row->id][$key] = $entry_data[$row->id][$key];
				}
				else
				{
					$entries[$row->id][$key] = NULL;
				}
			}
			$i++;
		}

		return $entries;
	}

}