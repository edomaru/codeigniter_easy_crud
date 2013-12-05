<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Groups_model extends MY_Model {

	function __construct()
	{
		parent::__construct();
		parent::set_model("groups", "id", null, array('group_name'));		
	}

	public function group_options($options = array())
	{
		$query = $this->_get();		

		foreach ($query->result() as $row) {
			$options[$row->id] = $row->group_name;
		}

		return $options;
	}

}