<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		parent::set_module(array("users_model", "groups_model"), "Users");
		parent::set_data('group_options', $this->groups_model->group_options());
	}

}