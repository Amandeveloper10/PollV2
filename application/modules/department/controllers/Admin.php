<?php

/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class for department [HMVC]. Handles all the datatypes and methodes required
 * for department section of future
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
        $this->load->model('admin/DeptModel');
    }

    /**
     * Index Page for this department controller.
     *
     * @access  public
     * @param   $id = is used to check index is load after add/edit or directly
     * @return  string
     */
    public function index($id=NULL) {
        $all_data = $this->DeptModel->load_all_data();
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
       // echo "<pre>"; print_r($all_data); //die;
        if($id){
            $this->load->view('department/admin/list',$this->data);
        }else{
            $this->middle = 'department/admin/list';
        $this->layout();
        }
    }

    /**
     * add/edit save for this department controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */

     public function form($id = NULL) {        
        if (isset($_POST['submit'])) {
        //echo "<pre>"; print_r($_POST); die;           
        $flg = $this->DeptModel->modify($id);            
        }        
    }


    /**
     * edit Page load for this department controller.
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
            $this->data['data_single'] = $this->DeptModel->load_single_data($id);
            $this->data['id'] = $id;  
        }  
        //echo "<pre>"; print_r($this->data['data_single']); //die;
		$this->data['all_deparment'] = $this->DeptModel->get_result_data('master_department', array('delete_flag' => 'N', 'is_active' => 'Y'));
		$this->data['load_all_overtime'] = $this->DeptModel->load_all_overtime();
        $view = $this->load->view('department/admin/form',$this->data, TRUE);
        echo $view; exit();         
    }


    /**
     * status department controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function status($id) {
        $this->DeptModel->status_change($id);
    }


    /**
     * delete membership controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function delete($id) {
        $this->DeptModel->delete_this($id);
    }

    public function check_dept() {
        $department_name = $_POST['department_name'];  
        $id = $_POST['id'];


        if(empty($id)){
            $check_dept = $this->DeptModel->get_row_data('master_department',array('department_name'=>$department_name,'delete_flag'=>'N','is_active'=>'Y'));
        }else{
            $check_dept = $this->DeptModel->check_dept($department_name,$id);
        }


        if(!empty($check_dept)){
            echo 'This Department Name already exist.';
        }else{
            echo 'done';
        }

        exit();         
    }
}
/* End of file admin.php */
/* Location: ./application/modules/department/controllers/admin.php */
