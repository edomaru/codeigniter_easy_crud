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
        $class_container = FCPATH . APPPATH . $this->class_name . "/container.php";
        if (file_exists($class_container)) {
            $this->the_container = $class_container;            
        }
        $this->data->the_container = $this->the_container;

        // set default content view
        $this->the_content = $this->class_name . "/" . $this->router->method;
        $this->data->the_content = $this->the_content;
    }    

    /**
     * set title for the class
     * @param string $title
     */
    protected function set_title($title) {
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
    protected function set_module($model, $the_title, $limit = 0) {        
        $this->set_title($the_title);        
        $this->limit = $limit > 0 ? $limit : $this->limit;
        $this->model = $model;
        $this->load->model($this->model, "cmodel");
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

    public function add()
    {
        $this->set_content()
        $this->load->view($this->layout, $this->data);
    }

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