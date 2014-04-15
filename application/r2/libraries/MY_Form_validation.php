<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * MY_Form_validation Class
 *
 * Extends Form_Validation library
 *
 * Note that this update should be used with the
 * form_validation library introduced in CI 1.7.0
 */
class MY_Form_validation extends CI_Form_validation {

	var $CI;

	function MY_Form_validation()
	{
	    parent::CI_Form_validation();
		
		$this->CI =& get_instance();
	}

	// --------------------------------------------------------------------

	/**
	 * Unique
	 *
	 * @access	private
	 * @param	string
	 * @param	field
	 * @return	boolean
	 */
	function _unique($str, $field)
	{
		$CI =& get_instance();
		list($table, $column) = explode('.', $field, 2);
	
		$CI->form_validation->set_message('unique', 'The %s that you requested is unavailable.');
	
		$query = $CI->db->query("SELECT COUNT(*) AS count FROM $table WHERE $column = '$str'");
		$row = $query->row();
		return ($row->count > 0) ? FALSE : TRUE;
	
	}
	
	/**
	 * Exist
	 *
	 * checks if the entry exists in the database
	 * returns a boolean
	 *
	 * @access  private
	 * @param	string
	 * @param	string
	 * @return	boolean
	 */
	function _exist($str, $value)
	{
		$array = explode('/',$value);

		foreach($array as $item)
		{
			list($table, $column) = explode('.', $item, 2);
			$this->CI->db->or_where($column, $str);
		}
		$this->CI->db->select('id');	
		$this->CI->db->from($table);	
		$query = $this->CI->db->get();				
		
		return ($query->num_rows() > 0) ? TRUE : FALSE;

	}
	/**
	 * Exist Hash
	 *
	 * checks if the hashed and salted entry exists in the database
	 * returns a boolean
	 *
	 * @access  private
	 * @param	string
	 * @param	string
	 * @return	boolean
	 */
	function _exist_hash($str, $value)
	{
		$this->CI->load->plugin('salt');		
		$array = explode('/',$value);

		foreach($array as $tmp_item)
		{
			list($item, $salt) = explode(';', $tmp_item, 2);
			list($table, $column) = explode('.', $item, 2);
			$this->CI->db->or_where($column, hash($this->CI->config->item('auth_hash'), salt($str,$salt,'string')));
		}

		$this->CI->db->select('id');	
		$this->CI->db->from($table);	
		$query = $this->CI->db->get();				
		
		return ($query->num_rows() > 0) ? TRUE : FALSE;

	}
	/**
	 * Compare Hashed
	 *
	 * gets the entries and entry data from the database
	 * returns an array
	 *
	 * @access  private
	 * @param	string
	 * @param	string
	 * @return	boolean
	 */
	function _compare_hash($str, $value)
	{
		$this->CI->load->plugin('salt');		
		list($password, $salt, $hash_type) = explode('/', $value, 3);
		
		if( hash( $hash_type, salt($str,$salt,'string') ) == $password )
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}
?>
