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
	 * data retrieve from submit form
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
	 * define keys for searching purpose
	 * @var array
	 */
	protected $_search_keys = array();


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
			$this->session->set_userdata("find_keywords", $keywords);
		}
	}

	/**
	 * count all record
	 *
	 * @return int
	 */
	public function record_count()
	{
		return $this->db->count_all_results($this->_table);
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
		if (is_array($value)) {
			$this->db->where($value);
		}
		else {
			if (!$key) {
				$key = $this->_pkey;
			}
			$this->db->where($key, $value)->limit(1);
		}		

		return $this->_get()->row();			
	}

	/** 
	 * get all data from table
	 *
	 * @return object
	 */
	private function _get()
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
	public function post_data($clean = TRUE)
	{
		if ( count($_POST) ) {
			foreach ($_POST as $key => $val) {
				$this->_post[$key] = $this->input->post($key, $clean);
			}
		}

		return $this;
	}

	/**
	 * save data to table
	 * @param array $post data would be save
	 */
	public function save($post = array())
	{		
		if (count($post)) {
			$this->_post = $post;
		}

		// if defined hd_{primary key name} in form and has value, them update
		$id = ( isset($this->_post["hd_{$this->_pkey}"]) && $this->_post["hd_{$this->_pkey}"] ) ? $this->_post[$this->_pkey] : FALSE;
		if ($id) {
			return $this->update($id);
		}


		$this->_prepare_data();
		$this->db->insert($this->_table);
		return $this->db->insert_id();
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
	public function update($id, $post = array())
	{
		if (count($post)) {
			$this->_post = $post;
		}

		$this->_prepare_data();
		$this->db->where($this->_pkey, $id);
		$this->db->update($this->_table);
		return $this->db->affected_rows();
	}

	/**
	 * delete a record
	 * @param int $id value of primary key field
	 * @return int
	 */
	public function delete($id = false)
	{
		if ( ! $this->_allow_deleted($id) ) {
			return -1;
		}

		$this->db->where($key, $id)->delete($this->_table);
        return $this->db->affected_rows();
	}

	/** 
	 * here you can defined
	 * what case data wether can be deleted or not
	 * @param int $id value of primary key field
	 * @return boolean
	 */
	protected _allow_deleted($id = false) {
		return true;
	}

}