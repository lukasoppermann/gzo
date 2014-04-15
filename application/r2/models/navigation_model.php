<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class navigation_model extends Model {

	//php 5 constructor
	function __construct() 
	{
		parent::Model();
	}
	
	//php 4 constructor
	function navigation_model() 
	{
		parent::Model();
	}
	
	function fetch($option = array(NULL)) 
	{
		$option = array_merge(
			array(
				'lang' => url_get_lang(current_url()),
				'status' => 'published',
				'menu' => 'main',
				'sort' => true
			), 
			$option);
		
		$this->db->select('id, label, path, parent_id, position');
		$this->db->where('status',$option['status']);
		$this->db->where('menu',$option['menu']);
		$this->db->like('lang', $option['lang']);
		$this->db->from('menu');
		$this->db->order_by("position", "asc"); 

		$query = $this->db->get();		
		
		foreach ($query->result() as $row)
		{
			$nav[$row->id] = array(
				'id' => $row->id,
				'label' => $row->label,
				'path' => $row->path,
				'parent_id' => $row->parent_id,
				'position' => $row->position
			);
		}
		if($option['sort'] != true)
		{
			return $nav;
		}
		else
		{
			$array = array();
			foreach($nav as $key => $value)
			{
				$array[$value['parent_id']][$value['position']] = $value;
			}
			return $array;
		}
	}

}