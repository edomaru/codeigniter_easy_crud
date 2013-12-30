<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * MY_Model the CRUD Base Model class
 * Profide commonds method for SELECT, INSERT, UPDATE & DELETE
 *
 * @package     CodeIgniter
 * @subpackage  cores
 * @category    core
 * @author      Masaru Edo <masaruedogawa@gmail.com>
 */
class MY_Model extends CI_Model {

	/**
	 * table to be used
	 * @var string
	 */
	protected $_table = null;

	/**
	 * primary key field of table
	 * @var string
	 */
	protected $_pkey = null;

	/**
	 * data retrieved from submit form
	 * @var array
	 */
	private $_post = array();

	/**
	 * when update/insert data, make sure all data would be
	 * save, match with field in table
	 * @var boolean
	 */
	protected $_match_field = true;

	/**
	 * specify filed(s) to be retrieved
	 * @var string
	 */
	protected $_fields = null;

	/**
	 * define keys for searching purpose
	 * @var array
	 */
	protected $_search_keys = array();

	/**
     * form validation rules
     * @var array
     */
    protected $form_rules = array();

	/**
	 * Is data post passed is valid or not
	 * @var boolean
	 */
	private $is_valid = FALSE;

	/**
	 * get all data 
	 *
	 * @param string 		$keywords the keywords to be search
	 * @param int $limit 	how many data would be retrieved
	 * @param int $offset 	start from
	 * @return array
	 */
	public function get_all($keywords = "none", $limit = 20, $offset = 0)
	{
		$this->_search($keywords);
		$this->db->select($this->_fields);
		$this->db->limit($limit, $offset);
		return $this->_get();		
	}

	/**
	 * search filter
	 *
	 * @param string $keywords keyword to be serach
	 * @return void
	 */
	protected function _search($keywords = "none")
	{
		// make sure that keyword to be search not empty 
		// and not 'none' value
		if ($keywords && $keywords != "none") {
			// if no search keys defined
			// use all fields from table
			if ( ! count($this->_search_keys)) {
				$this->_search_keys = $this->db->list_fields($this->_table);
			}

			foreach ($this->_search_keys as $no => $key) {
				if ($key == $this->_pkey) {
					continue;
				}

				if ($no == 0) {
					$this->db->like($key, $keywords);
				}
				else {
					$this->db->or_like($key, $keywords);
				}
			}

			// save the keywords into session
			// the key of the session keywordd place with find_keywords key
			$kin = $this->config->item('default_search_keyword_input_name');
			$this->session->set_userdata("find_{$kin}", $keywords);
		}
	}

	/**
	 * count all record
	 *
	 * @return int
	 */
	public function record_count($keywords = "none")
	{		
		$this->_search($keywords);
		$r = $this->db->count_all_results($this->_table);		
		return $r;
	}

	/**
	 * get one record 
	 *
	 * @param mix $value 	the value
	 * @param int $limit 	field key, if empty, key would be primary key field	 
	 * @return object
	 */
	public function get_one($value, $key = null)
	{
		$this->db->limit(1);

		if (is_array($value)) {
			$this->db->where($value);
		}
		else {
			if (!$key) {
				$key = $this->_pkey;
			}
			$this->db->where($key, $value);
		}		

		return $this->_get()->row();			
	}

	/**
	 * return fields with empty value
	 * @return array
	 */
	public function empty_row()
	{
		$rows = array();
		$fields = $this->db->list_fields($this->_table);
		foreach ($fields as $field) {
			$rows[$field] = "";
		}
		return $rows;
	}

	/** 
	 * get all data from table
	 *
	 * @return object
	 */
	protected function _get()
	{
		return $this->db->get($this->_table);
	}

	/**
	 * retrieve data from global $_POST data
	 * and clean them
	 *
	 * @param boolean $clean option to active/nonactive xss_clean input post
	 * @return MY_Model
	 */
	protected function post_data($clean = TRUE)
	{
		if ( count($_POST) ) {
			foreach ($_POST as $key => $val) {
				$this->_post[$key] = $this->input->post($key, $clean);
			}
		}

		return $this;
	}

	public function before_save() {}

	public function after_save() {}	

	public function before_update($param = null) {}

	public function after_update($param = null) {}

	public function before_delete($param = null) {}

	public function after_delete($param = null) {}

	/**
	 * save data to table
	 * @param array $post data would be save
	 */
	public function save()
	{
		if (! $this->is_valid()) {
			return false;
		}		

		// get data post submited
		$this->post_data();
		
		// proses sebelum melakukan menyimpan data
		$this->before_save();		

		$this->_prepare_data();
		$this->db->insert($this->_table);
		$status = $this->db->insert_id();		

		// proses setelah  menyimpan data (jika diperlukan)
		$this->after_save();
		
		return $status;
	}

	/**
	 * prepare data to be insert/update to table
	 * by default, data to be store should match with table field definition
	 * @return void
	 */
	private function _prepare_data()
	{
		$fields = $this->db->list_fields($this->_table);

        foreach ($this->_post as $key => $val) {            
            if ($this->_match_field) {
                if ( in_array($key, $fields) ) {
                	// if found primary key, skip that
                    if ($this->_pkey == $key) {
                        continue;
                    }

                    $this->db->set($key, $val);
                }
            }
            else {
                $this->db->set($key, $val);
            }
        }
	}

	/**
	 * update data from table
	 * @param array $post data would be save
	 */
	public function update($id)
	{		
		if (! $this->is_valid()) {
			return false;
		}

		// get data post submited
		$this->post_data();

		// proses sebelum melakukan menyimpan data
		$this->before_update($id);	

		$this->_prepare_data();
		$this->db->where($this->_pkey, $id);
		$this->db->update($this->_table);
		$status = $this->db->affected_rows();

		// proses setelah  menyimpan data (jika diperlukan)
		$this->after_update($id);

		return $status;
	}

	/**
	 * delete a record
	 * @param int $id value of primary key field
	 * @return int
	 */
	public function delete($id = false)
	{
		$this->before_delete($id);

		$this->db->where($this->_pkey, $id)->delete($this->_table);
        $status = $this->db->affected_rows();

        $this->after_delete($id);
        return $status;
	}	

	/**
	 * define esencial attributes for model (table name, primary key, fields, search key)
	 *
	 * @param string $table table name
	 * @param string $pkey  primary key field
	 * @param string $field field to be retrieve
	 * @param string $search_key field(s) will be used for searching data
	 * @return void
	 */
	public function set_model($table, $pkey, $fields = null, $search_keys = array())
	{
		$this->_table = $table;
		$this->_pkey = $pkey;
		$this->_fields = (!$fields || $fields == '*') ? ('*') : (is_array($fields) ? implode(",", $fields) : $fields);
		$this->_search_keys = $search_keys;
	}

	public function is_valid()
	{		
		if ( count($_POST) ) {

			if (! count($this->form_rules) ) {
                return TRUE;    
            }

            $this->load->library("form_validation");
            $this->form_validation->set_rules( $this->form_rules );

            if ($this->form_validation->run()) {
                return TRUE;
            }

		}

		return FALSE;
	}

	public function validations($key = array(), $rules = array())
	{
		// jika array
		if (is_array($key) && count($key) > 0) {
			foreach ($key as $field => $values) {
				$this->form_rules[] = $this->_set_rules($field, $values);
			}
		}
		else {
			$this->form_rules[] = $this->_set_rules($key, $rules);
		}
	}

	 /**
     * set prefer form validation rule
     * @param string $field field name
     * @param array $values not good validation rules (label, rules)
     * @return array prefer validation rules array('field', 'label', 'rules')
     */
    private function _set_rules($field, $values = array())
    {        
    	if (is_array($values)) {
    		list($label, $rules) = $values;	
    	}
        else {
        	$rules = $values;
        	$label = ucwords(str_replace("_", " ", $field));
        	// $label = ( ($lang = lang($field)) ? $lang : ucwords(str_replace("_", " ", $field)) ) ;
        }

        if ($this->router->method == 'update') {        	
        	$arr_rules = explode('|', $rules);
    		$new_rules = array();
    		foreach ($arr_rules as $rule) {
    			if (strpos($rule, 'is_unique') !== false) continue;
    			$new_rules[] = $rule;
    		}
    		$rules = implode('|', $new_rules);
        }

        return array('field' => $field, 'label' => $label, 'rules' => $rules);
    }

}