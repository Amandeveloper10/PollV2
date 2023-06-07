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
        $this->load->model('admin/AssignedModel');
    }

    /**
     * Index Page for this certificate controller.
     *
     * @access  public
     * @param   $id = is used to check index is load after add/edit or directly
     * @return  string
     */
    public function index($id=NULL) {
        $all_data = $this->AssignedModel->load_all_data();
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;


        //echo "<pre>"; print_r($this->data); die;
        if($id){
            $this->load->view('assigned_employee/admin/list',$this->data);
        }else{
            $this->middle = 'assigned_employee/admin/list';
        $this->layout();
        }
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
        $flg = $this->AssignedModel->modify($id);            
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
       // echo "<pre>"; print_r($_POST); die;
        $id = $_POST['id'];  


        $load_all_equipment = $this->AssignedModel->load_all_equipment();

        $load_all_employee = $this->AssignedModel->load_all_employee();

        $this->data['load_all_equipment'] = $load_all_equipment;

        $this->data['load_all_employee'] = $load_all_employee;

        if (!empty($id)) {
            $this->data['data_single'] = $this->AssignedModel->load_single_data($id);
            $this->data['id'] = $id;  
        }  
       // echo "<pre>"; print_r($this->data['load_all_equipment']); die;
        $view = $this->load->view('assigned_employee/admin/form',$this->data, TRUE);
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
        $this->AssignedModel->status_change($id);
    }


    /**
     * delete membership controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function delete($id) {
        $this->AssignedModel->delete_this($id);
    }
	
	public function check_equipment() {
		//echo '<pre>'; print_r($_POST); die;
        $equipment_id = $_POST['equipment'];  
        $val = $_POST['val'];


		$check_equipment = $this->AssignedModel->check_all_equipment($equipment_id);
		$available = $check_equipment->quantity - $check_equipment->assigned;
		if($val != '0' && $available >= $val){
		echo 'done';
		}else{
		echo 'Quantity is greater than available quantity';
		}
//echo '<pre>'; print_r($check_equipment); die;

        /*if(!empty($check_equipment)){
            echo 'This Grade is already exist.';
        }else{
            echo 'done';
        }*/

        exit();         
    }
}
/* End of file admin.php */
/* Location: ./application/modules/certificate/controllers/admin.php */
