<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		parent::set_module(
			array("users_model", "groups_model"), "Users", 0,
			array(
				'add' => array(
					'username' => array('Username', 'trim|required|is_unique[users.username]'),
					'name' => array('Name', 'trim|required'),
					'email' => array('Email', 'trim|required|valid_email'),
					'password' => array('Password', 'trim|required|sha1'),
					'password_confirm' => array('Password', 'trim|required|matches[password]|sha1')
				),
				'edit' => array(
					'username' => array('Username', 'trim|required'),
					'name' => array('Name', 'trim|required'),
					'email' => array('Email', 'trim|required|valid_email'),
					'password' => array('Password', 'trim|required|sha1'),
					'password_confirm' => array('Password', 'trim|required|matches[password]|sha1')
				)			
			)
		);
		parent::set_data('group_options', $this->groups_model->group_options());
	}

}