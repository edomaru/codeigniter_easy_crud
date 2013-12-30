<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends MY_Model {

	function __construct()
	{
		parent::__construct();
		parent::set_model("users", "id", null, array('name', 'username', 'email'));		
		
		parent::validations(array(
			'username' => array('Username', 'trim|required|is_unique[users.username]'),
			'name' => array('Name', 'trim|required'),
			'email' => array('Email', 'trim|required|valid_email'),
			'password' => array('Password', 'trim|required|sha1'),
			'password_confirm' => array('Password', 'trim|required|matches[password]')
		));
	}	

}