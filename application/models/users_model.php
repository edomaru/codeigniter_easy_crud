<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends MY_Model {

	function __construct()
	{
		parent::__construct();
		parent::set_model("users", "id", null, array('name', 'username', 'email'));

		// set rules 1st way				
		# parent::validations('username', 'required|trim|is_unique[users.username]');

		// set rules 2nd way
		# parent::validations('username', array('Username', 'required|trim|is_unique[users.username]'));

		// set rules 3rd way
		parent::validations(array(
			'username' => array('Username', 'trim|required|is_unique[users.username]'),
			'name' => array('Name', 'trim|required'),
			'email' => array('Email', 'trim|required|valid_email'),
			'password' => array('Password', 'trim|required|sha1'),
			'password_confirm' => array('Password', 'trim|required|matches[password]')
		));
	}	

}