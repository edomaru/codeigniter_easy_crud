<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

	/**
	 * override is_unique, because it has problem when update data
	 * @author keithics, a little modified by edomaru
	 * @link   http://ellislab.com/forums/viewthread/211641/
	 * @param  string  $str
	 * @param  string  $field
	 * @return boolean
	 */
	public function is_unique($str, $field)
	{
		list($table, $field) = explode('.', $field);
		$q = $this->CI->db->query("SHOW KEYS FROM {$table} WHERE Key_name = 'PRIMARY'")->row();
		$primary_key = $q->Column_name;

		$input_post = $this->CI->input->post($primary_key);
		if ($input_post > 0) {
			$this->CI->db->where($primary_key . '!=', $input_post);
		}

		return $this->CI->db->where($field, $str)->get($table)->num_rows() === 0;
	}

}