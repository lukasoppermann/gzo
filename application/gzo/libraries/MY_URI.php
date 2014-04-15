<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_URI extends CI_URI {

	/**
	 * analyse
	 *
	 * analyse whether the uri is missing parameters if so, redirect
	 *
	 * @access	private	 
	 */
	function analyse()
	{
		$this->CI = & get_instance();
		
		$array = implode('',$this->segment_array());
		$lang = $this->config->item('lang_uri');
		$url = base_url().$this->config->item('language_abbr').$this->config->item('index_menu');
		
		$uri = $this->uri_string();
		$this->CI->db->select('id');
		$this->CI->db->where('path', $uri);
		// $this->CI->db->where('status', $this->CI->config['status']);
		// $this->CI->db->like('lang', $this->CI->config->item('language_abbr'));
		$this->CI->db->from('pages');

		$query = $this->CI->db->get();
		
		if($query->num_rows() <= 0 ||  empty($array) || empty($lang) )
		{
			redirect($url,'refresh');
		}
	}
	/**
	 * contains
	 *
	 * checks if uri contains string
	 *
	 * @access	public
	 * @param	string
	 * @param	boolean
	 * @return	boolean
	 */
	function contains($string)
	{
		return in_array(trim($string), $this->segment_array()) ? TRUE : FALSE;
	}


// END of MY_URI Class
}
/* End of file MY_URI.php */
/* Location: ./application/libraries/MY_URI.php */