<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * MY_Controller the CRUD Base Controller class
 * Profide commonds method for basic SELECT, INSERT, UPDATE & DELETE
 *
 * @package     CodeIgniter
 * @subpackage  cores
 * @category    core
 * @author      Masaru Edo <masaruedogawa@gmail.com>
 */

class MY_Controller extends CI_Controller {

    /**
     * class data storage
     * @var type 
     */
    protected $data = null;

    /**
     * layout yang akan digunakan
     * @var type 
     */
    protected $layout = "layouts/main";

    /**
     * model used for current class
     * @var type 
     */
    protected $model = null;
    
    /**
     * set class name
     * @var string
     */
    protected $class_name = null;

    /**
     * title of the class
     * @var type 
     */
    protected $the_title = "";

    /**
     * template container to cover data 
     * by default, it would be used views/includes/container.php
     * it can be redirect to independent container by createing view/<class name>/container.php
     * @var string
     */
    protected $content = "includes/container";

    /**
     * view content
     * by default, it would be used <current_class>/<method_name>.php 
     * @var string
     */
    protected $current_content = "";

    /**
     * widget to be used
     * @var string
     */
    protected $the_widget = "";    

    /**
     * limit the record
     * @var type 
     */
    protected $limit = 20;
    

    public function __construct() {
        parent::__construct();        

        // catat nama class
        $this->class_name = strtolower(get_class($this));
        $this->data->class_name = $this->class_name;

        // current model named with 'cmodel'
        if ($this->model) {
            $this->load->model($this->model, "cmodel");
        }

        // load lang if any
        // $this->lang->load($this->class_name, $this->config->item('language'));
        
        // if no title defined, use class name as title
        if (! $this->the_title) {
            $this->set_title( ucwords($this->class_name) );
        }

        // set default container
        $class_container = $this->class_name . "/container.php";
        if (file_exists(FCPATH . APPPATH . $class_container)) {
            $this->content = $class_container;            
        }
        $this->data->content = $this->content;

        // default widget for index
        // check if any widget.php defined in view/<class name>/widget.php
        // if not defined, it would be use views/includes/widget.php        
        if ($this->router->method == 'index' && $this->the_widget !== FALSE) {
            $this->the_widget = $this->class_name . "/widget.php";
            if (! file_exists(FCPATH . APPPATH . $this->the_widget)) {
                $this->the_widget = "includes/widget";
            }
            $this->data->the_widget = $this->the_widget;   
        }    

        // clear search values when not in used
        if ( !$this->uri->segment(3) || $this->uri->segment(3) == 'none') {
            $keywords_handler = $this->config->item("default_search_keyword_input_name");
            $this->session->unset_userdata("find_{$keywords_handler}");
        }

        // set default content view
        $this->set_content();   
    }    

    /**
     * set content would be used.
     * @param string $content if no content defined, it would be used <class_name>/<method_name> as default content
     */
    protected function set_content($content = null)
    {
        $this->current_content = $this->class_name;
        if (! $content) {
            $this->current_content .= "/" . $this->router->method;
        }
        else {
            $this->current_content .= "/" . $content;
        }

        $this->data->current_content = $this->current_content;          
    }

    /**
     * Set content would be used as form and defined action
     * @param string $form   
     * @param string $action 
     */
    public function set_form($form = null, $action = null)
    {
        $this->set_content($form);
        $this->data->action = $this->class_name . "/" . (!$action ? "save" : $action);        
    }

    /**
     * set title for the class
     * @param string $title
     */
    protected function set_title($title="") {
        $this->the_title = $title;
        $this->data->the_title = $this->the_title;
    }


    /**
     * define what model would be used, what title shown for the class
     * and how much record shown per page      
     * 
     * @param type $models
     * @param type $the_title
     * @param type $limit
     */
    protected function set_module($models = array(), $the_title = "", $limit = 0) {        
        // set title for the controller class
        $this->set_title($the_title);    

        // set limitation of showing data
        $this->limit = $limit > 0 ? $limit : $this->limit;

        // load model(s)
        $this->_load_models($models);   
    }

    /**
     * load module for the class
     * if more than one model loaded, the first model
     * will be used as current class modul and aliases with 'cmodel'
     * the other load as usual
     * @param mix $models model to be loaded
     * @return vaoid
     */
    protected function _load_models($models = array())
    {
        if (is_array($models) && count($models)) {
            $this->model = array_shift($models);   
            $this->load->model($models);
        }
        else {
            $this->model = $models;
        }
        $this->load->model($this->model, "cmodel");        
    }

    public function index($keywords = "none", $offset = 0)
    {
        $keywords = $this->search_handler($keywords);        
        $config = $this->config->item("pagination_bootstrap");
        $config['total_rows'] = $this->cmodel->record_count(decode_keywords($keywords));
        $config['per_page'] = $this->limit;
        $config['uri_segment'] = 4;
        $config['base_url'] = site_url($this->class_name . "/index/" . $keywords);

        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $this->data->pagination = $this->pagination->create_links();
        $this->data->query = $this->cmodel->get_all(decode_keywords($keywords), $this->limit, $offset);        
        $this->load->view($this->layout, $this->data);
    }

    protected function search_handler($keywords = "none")
    {
        if (count($_POST)) {
            $input_name = $this->config->item("default_search_keyword_input_name");
            $keywords = $this->input->post($input_name);

            $keywords = encode_keywords($keywords);
        }

        return $keywords;
    }    

    /**
     * set additional data to module     
     * @param mix $keys
     * @param array $values value
     * @param string $scope scope for data
     * @return void
     */
    public function set_data($keys = array(), $values = array(), $scope = null)
    {
        // if scope defined, set data would access in specific method
        if ($scope && $this->router->method != $scope) {
            return;
        }

        if (is_array($keys)) {
            foreach ($keys as $key => $value) {
                $this->data->{$key} = $value;
            }            
        }
        else {
            $this->data->{$keys} = $values;
        }
    }

    /**
     * add new data
     * if no data posted, show the form,
     * if any, insert new data into table
     * @return void
     */
    public function add()
    {
        $this->set_form("form");
        $this->set_values($this->cmodel->empty_row());
        $this->load->view($this->layout, $this->data);
    }

    public function save()
    {
        $status = $this->cmodel->save();

        if ($status) {
            set_message("success", "Data has been saved");
            redirect($this->class_name);
        }
        else {
            set_message("error", "Failed to save data");
            $this->add();
        }
    }

    /**
     * edit selected data
     */
    public function edit($id = false)
    {
        if (! $id) {
            show_404();
        }

        $this->set_form("form", "update/{$id}");
        $this->set_values($this->cmodel->get_one($id));
        $this->load->view($this->layout, $this->data);
    }

    public function update($id = false)
    {
        $status = $this->cmodel->update($id);

        if ($status) {
            set_message("success", "Data has been updated");
            redirect($this->class_name);
        }
        else {
            set_message("error", "Failed to update data");
            $this->edit($id);
        }
    }

    /**
     * set values for input form
     * usually we use set_value(field, default_field)
     * with this method, we just call: $field
     * @param mix $values values would be pass into form
     * @return void
     */
    protected function set_values($values = array())
    {
        if (count($values)) {
            foreach ($values as $key => $value) {
                $this->data->{$key} = set_value($key, $value);
            }
        }
    }

    /**
     * delete record
     * @param int $id primary key value field
     * @return void
     */
    public function delete($id = false)
    {
        $status = $this->cmodel->delete($id);
        if ($status == -1) {
            set_message("error", "You can't delete this data");
        }
        elseif ($status > 0) {
            set_message("success", "Data has been deleted");
        }
        else {
            set_message("error", "Failed deleting data");
        }

        redirect($this->class_name, "location");
    }
    
}