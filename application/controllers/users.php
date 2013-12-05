<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		parent::set_module(
			"users_model", "Users", 0,
			array(
				'add' => array(
					'name' => array('Name', 'trim|required|is_unique[users.username]'),
					'email' => array('Email', 'trim|required|valid_email'),
					'password' => array('Password', 'trim|required'),
					'password_confirm' => array('Password', 'trim|required|matches[password]|sha1')
				),
				'edit' => array(
					'name' => array('Name', 'trim|required'),
					'email' => array('Email', 'trim|required|valid_email'),
					'password' => array('Password', 'trim|required'),
					'password_confirm' => array('Password', 'trim|required|matches[password]|sha1')
				)			
			)
		);
	}

}