<?php

/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class for certificate [HMVC]. Handles all the datatypes and methodes required
 * for certificate section of future
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
        $this->load->model('admin/AssignedworkshiftModel');
    }

    /**
     * Index Page for this certificate controller.
     *
     * @access  public
     * @param   $id = is used to check index is load after add/edit or directly
     * @return  string
     */
    public function index($id=NULL) {
        //$all_data = $this->AssignedworkshiftModel->load_all_data($id,date('m'),date('Y'));
		$all_data = $this->AssignedworkshiftModel->get_result_data_with_order_by('employee', array('delete_flag' => 'N', 'is_active' => 'Y'));
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
        $this->data['employee_id']=$id;
       // $this->data['all_calender_data'] = $this->get_taskdetails($id='');
        //$this->middle = 'assigned_location/admin/list';
       // $this->layout();
        //echo "<pre>"; print_r($this->data); die;
        if($id){
            $this->load->view('assigned_workshift/admin/list',$this->data);
        }else{
            $this->middle = 'assigned_workshift/admin/list';
        $this->layout();
        }
    }

public function index_ajax() {
        //print_r($_POST); die;
        //$all_data = $this->AssignedworkshiftModel->load_all_data($id ='',$_POST['month'],$_POST['year']);
		$all_data = $this->AssignedworkshiftModel->get_result_data_with_order_by('employee', array('delete_flag' => 'N', 'is_active' => 'Y'));
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
        //$this->data['employee_id']=$id;
        $this->data['month']=$_POST['month'];
        $this->data['year']=$_POST['year'];

       // $this->data['all_calender_data'] = $this->get_taskdetails($id='');
        //$this->middle = 'assigned_location/admin/list';
       // $this->layout();
        //echo "<pre>"; print_r($this->data); die;
        $view = $this->load->view('assigned_workshift/admin/list_ajax',$this->data, TRUE);
        echo $view; exit(); 
    }

    /**
     * add/edit save for this certificate controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */

     public function form($id = NULL) {        
        if (isset($_POST['submit'])) {
        //echo "<pre>"; print_r($_POST); die;           
        $flg = $this->AssignedworkshiftModel->modify($id);  

        }        
    }


    /**
     * edit Page load for this certificate controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */
    public function get_form() {
        $this->data = array();
       //echo "<pre>"; print_r($_POST); die;
         
        $id = $_POST['id']; 

        $load_all_workshift = $this->AssignedworkshiftModel->load_all_workshift();

        $load_all_employee = $this->AssignedworkshiftModel->load_all_employee();

        $this->data['load_all_workshift'] = $load_all_workshift;

        $this->data['load_all_employee'] = $load_all_employee;
        $this->data['id']='';
        if (!empty($id)) {

            $this->data['data_single'] = $this->AssignedworkshiftModel->load_single_data($id);
            $this->data['id'] = $id;  
        }  
       // echo "<pre>"; print_r($this->data['load_all_equipment']); die;
        $view = $this->load->view('assigned_workshift/admin/form',$this->data, TRUE);
        echo $view; exit();         
    }


    /**
     * status certificate controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function status($id) {
        $this->AssignedworkshiftModel->status_change($id);
    }


    /**
     * delete membership controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function delete($id) {
       $delete= $this->AssignedworkshiftModel->delete_this($id);
    }
}
/* End of file admin.php */
/* Location: ./application/modules/certificate/controllers/admin.php */
