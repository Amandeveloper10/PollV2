<?php

/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class for setting_location [HMVC]. Handles all the datatypes and methodes required
 * for setting_location section of future
 */
class Admin extends MX_Controller {

    /**
     * The constructor method of this class.
     *
     * @access  public
     * @param   none
     * @return  Loads all the method, helper, library etc. required throughout this class
     */
    public function __construct() {
        parent::__construct();
        admin_authenticate();
        $this->load->model('admin/LocationModel');
    }

    /**
     * Index Page for this setting_location controller.
     *
     * @access  public
     * @param   $id = is used to check index is load after add/edit or directly
     * @return  string
     */
    public function index($id=NULL) {
        $all_data = $this->LocationModel->load_all_data();
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
       // echo "<pre>"; print_r($all_data); //die;
        if($id){
            $this->load->view('setting_location/admin/list',$this->data);
        }else{
            $this->middle = 'setting_location/admin/list';
        $this->layout();
        }
    }

    /**
     * add/edit save for this setting_location controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */

     public function form($id = NULL) {        
        if (isset($_POST['submit'])) {
        //echo "<pre>"; print_r($_POST); die;           
        $flg = $this->LocationModel->modify($id);            
        }        
    }


    /**
     * edit Page load for this setting_location controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */
    public function get_form() {
        $this->data = array();
       // echo "<pre>"; print_r($_POST); die;
        $id = $_POST['id'];  

        if (!empty($id)) {
            $this->data['data_single'] = $this->LocationModel->load_single_data($id);
            $this->data['data_single_bank'] = $this->LocationModel->load_single_data_bank($this->data['data_single']->id);
            
            $this->data['data_single_location'] = $this->LocationModel->load_single_data_location($this->data['data_single']->id);
            
            $this->data['id'] = $id;  
        }  
        $this->data['all_job'] = $this->LocationModel->get_result_data('master_req_job_opening',array('delete_flag'=>'N','is_active'=>'Y'));
        //echo "<pre>"; print_r($this->data['data_single']); //die;
        
        $view = $this->load->view('setting_location/admin/form',$this->data, TRUE);
        echo $view; exit();         
    }


    /**
     * status setting_location controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function status($id) {
        $this->LocationModel->status_change($id);
    }


    /**
     * delete setting_location controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function delete($id) {
        $this->LocationModel->delete_this($id);
    }

    /**
     * check_org_location setting_location controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function check_org_location() {
        //echo "<pre>"; print_r($_POST); die;

        $location = $_POST['location'];
        $check_location = $this->LocationModel->check_location($location);

        if(($location=='Head Office') && count($check_location)>0){
            echo "Head Office Location already exsist."; die;
        }else{
            echo ""; die;
        }

    }
}
/* End of file admin.php */
/* Location: ./application/modules/setting_location/controllers/admin.php */
