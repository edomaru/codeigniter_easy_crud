<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
    protected $the_container = "includes/container";

    /**
     * view content
     * by default, it would be used current_class/method_name.php 
     * @var string
     */
    protected $the_content = "";

    /**
     * widget to be used
     * @var string
     */
    protected $the_widget = "";

    /**
     * form validation rules
     * @var array
     */
    protected $form_rules = array();

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
        
        // if no title defined, use class name as title
        if (! $this->the_title) {
            $this->set_title( ucwords($this->class_name) );
        }

        // set default container
        $class_container = $this->class_name . "/container.php";
        if (file_exists(FCPATH . APPPATH . $class_container)) {
            $this->the_container = $class_container;            
        }
        $this->data->the_container = $this->the_container;

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

        // set default content view
        $this->set_content();      
    }    

    protected function set_content($content = null)
    {
        $this->the_content = $this->class_name;
        if (! $content) {
            $this->the_content .= "/" . $this->router->method;
        }
        else {
            $this->the_content .= "/" . $content;
        }

        $this->data->the_content = $this->the_content;  
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
     * @param type $model
     * @param type $the_title
     * @param type $limit
     */
    protected function set_module($model, $the_title = "", $limit = 0, $form_rules = array()) {        
        $this->set_title($the_title);        
        $this->limit = $limit > 0 ? $limit : $this->limit;
        $this->model = $model;
        $this->load->model($this->model, "cmodel");
        $this->set_form_rules($form_rules);        
    }

    public function index($keywords = "none", $offset = 0)
    {
        $config['total_rows'] = $this->cmodel->record_count();
        $config['per_page'] = $this->limit;
        $config['base_url'] = site_url($this->class_name . "/index");

        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $this->data->pagination = $this->pagination->create_links();
        $this->data->query = $this->cmodel->get_all($keywords, $this->limit, $offset);        
        $this->load->view($this->layout, $this->data);
    }

    /**
     * check data validations
     *
     * @return boolean
     */
    protected function is_valid()
    {
        if ( count($_POST) ) {
        
            if (! count($this->form_rules) || !isset($this->form_rules[$this->router->method])) {
                return TRUE;    
            }

            $this->load->library("form_validation");
            $this->form_validation->set_rules( $this->form_rules[$this->router->method] );

            if ($this->form_validation->run()) {
                return TRUE;
            }

        }

        return FALSE;
    }

    /**
     * set form rules
     * @param array $rules the form rules
     * @return void
     */
    protected function set_form_rules($rules = array())
    {        
        if (count($rules)) {
            // loop rules each method
            foreach ($rules as $key => $values) {   
                $key_rules = array();
                // form validation rule per field
                foreach ($values as $field => $attr) {
                    $key_rules[] = $this->_set_rules($field, $attr);
                }
                $this->form_rules[$key] = $key_rules;         
            }            
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
        list($label, $rules) = $values;
        return array('field' => $field, 'label' => $label, 'rules' => $rules);
    }

    /**
     * add new data
     * if no data posted, show the form,
     * if any, insert new data into table
     * @return void
     */
    public function add()
    {
        if ($this->is_valid()) {
            $status = $this->cmodel->post_data()->save();

            if ($status) {
                set_message("success", "Data has been saved");
            }
            else {
                set_message("error", "Failed to save data");
            }

            redirect($this->class_name);
        }

        $this->set_content("form");
        $this->load->view($this->layout, $this->data);
    }

    /**
     * edit selected data
     */
    public function edit($id = false)
    {
        $this->data->row = $this->cmodel->get_one($id);
        $this->load->view($this->layout, $this->data);    
    }

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