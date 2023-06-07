<?php

/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class for Pay_schedule [HMVC]. Handles all the datatypes and methodes required
 * for Pay_schedule section of future
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
        $this->load->model('admin/Pay_scheduleModel');
    }

    /**
     * Index Page for this Pay_schedule controller.
     *
     * @access  public
     * @param   $id = is used to check index is load after add/edit or directly
     * @return  string
     */
    public function index($id=NULL) {
        $all_data = $this->Pay_scheduleModel->load_all_data();
        $data_single = $this->Pay_scheduleModel->load_single_data(1);
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
        $this->data['data_single'] = $data_single;
       // echo "<pre>"; print_r($all_data); //die;
        if($id){
            $this->load->view('Pay_schedule/admin/list',$this->data);
        }else{
            $this->middle = 'Pay_schedule/admin/list';
        $this->layout();
        }
    }

    /**
     * add/edit save for this Pay_schedule controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */

     public function form($id = NULL) {        
        if (isset($_POST['submit'])) {
        //echo "<pre>"; print_r($_POST); die;  

        $flg = $this->Pay_scheduleModel->modify($id);            
        }        
    }


    /**
     * edit Page load for this Pay_schedule controller.
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
            $this->data['data_single'] = $this->Pay_scheduleModel->load_single_data($id);
            $this->data['id'] = $id;  
            
        }  
        

        //echo "<pre>"; print_r($this->data); die;

        $view = $this->load->view('Pay_schedule/admin/form',$this->data, TRUE);
        echo $view; exit();         
    }


    /**
     * status Pay_schedule controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function status($id) {
        $this->Pay_scheduleModel->status_change($id);
    }


    /**
     * delete membership controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function delete($id) {
        $this->Pay_scheduleModel->delete_this($id);
    }
}
/* End of file admin.php */
/* Location: ./application/modules/Pay_schedule/controllers/admin.php */
