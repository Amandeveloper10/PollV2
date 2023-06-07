<?php

/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class for vehicles [HMVC]. Handles all the datatypes and methodes required
 * for vehicles section of future
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
        $this->load->model('admin/VehiclesModel');
    }

    /**
     * Index Page for this vehicles controller.
     *
     * @access  public
     * @param   $id = is used to check index is load after add/edit or directly
     * @return  string
     */
    public function index($id=NULL) {
        $all_data = $this->VehiclesModel->load_all_data();
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
       // echo "<pre>"; print_r($all_data); //die;
        if($id){
            $this->load->view('vehicles/admin/list',$this->data);
        }else{
            $this->middle = 'vehicles/admin/list';
        $this->layout();
        }
    }
    
    
    

    /**
     * add/edit save for this vehicles controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */

     public function form($id = NULL) {        
        if (isset($_POST['submit'])) {
        //echo "<pre>"; print_r($_POST); die;           
        $flg = $this->VehiclesModel->modify($id);            
        }        
    }


    /**
     * edit Page load for this vehicles controller.
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
            $this->data['data_single'] = $this->VehiclesModel->load_single_data($id);
            $this->data['id'] = $id;  
        }  
        //echo "<pre>"; print_r($this->data['data_single']); //die;
        $this->data['all_employee'] = $this->VehiclesModel->get_result_data('employee',array('delete_flag'=>'N','is_active'=>'Y'));
        $this->data['all_insurence'] = $this->VehiclesModel->get_result_data('insurance_policies',array('delete_flag'=>'N','is_active'=>'Y','insurence_for'=>'vehicle'));
        $view = $this->load->view('vehicles/admin/form',$this->data, TRUE);
        echo $view; exit();         
    }

    /**
     * delete membership controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function delete($id) {
        $this->VehiclesModel->delete_this($id);
    }
    
     public function vehicle_maintenance($id=NULL) {
         //echo 'hello';exit;
        $all_data = $this->VehiclesModel->load_all_data_vehicle();
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
       // echo "<pre>"; print_r($all_data); //die;
        if($id){
            $this->load->view('vehicles/admin/vehicle_maintenance_list',$this->data);
        }else{
            $this->middle = 'vehicles/admin/vehicle_maintenance_list';
        $this->layout();
        }
    }
    
     public function vehicle_maintenance_form() {
        $this->data = array();
       // echo "<pre>"; print_r($_POST); die;
        $id = @$_POST['id'];  

        if (!empty($id)) {
            $this->data['data_single'] = $this->VehiclesModel->load_single_vehicle_maintenance($id);
            $this->data['id'] = $id;  
        }  
        //echo "<pre>"; print_r($this->data['data_single']); //die;
        $this->data['all_vehicles'] = $this->VehiclesModel->get_result_data('vehicles',array('delete_flag'=>'N','is_active'=>'Y'));
        $view = $this->load->view('vehicles/admin/vehicle_maintenance_form',$this->data, TRUE);
        echo $view; exit();         
    }
     public function vehicle_maintenance_add($id = NULL) {        
        if (isset($_POST['submit'])) {
        //echo "<pre>"; print_r($_POST); die;           
        $flg = $this->VehiclesModel->modify_maintenance($id);            
        }
       
    }
 public function maintenance_delete($id) {
        $this->VehiclesModel->maintenance_delete($id);
    }
    
       public function vehicle_asignment($id=NULL) {
         //echo 'hello';exit;
        $all_data = $this->VehiclesModel->load_all_data_vehicle_asignment();
        
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
       
        $this->data['all_data'] = $all_data;
      //  echo "<pre>"; print_r($this->data['all_employee']); die;
        if($id){
            $this->load->view('vehicles/admin/vehicle_asignment_list',$this->data);
        }else{
            $this->middle = 'vehicles/admin/vehicle_asignment_list';
        $this->layout();
        }
    }
    
     public function vehicle_asignment_form() {
        $this->data = array();
       // echo "<pre>"; print_r($_POST); die;
        $id = @$_POST['id'];  
 $this->data['all_employee'] = $this->VehiclesModel->load_all_employee();
        if (!empty($id)) {
            $this->data['data_single'] = $this->VehiclesModel->load_single_vehicle_asignment($id);
            $this->data['id'] = $id;  
        }  
        //echo "<pre>"; print_r($this->data['data_single']); //die;
        $this->data['all_vehicles'] = $this->VehiclesModel->get_result_data('vehicles',array('delete_flag'=>'N','is_active'=>'Y'));
        $view = $this->load->view('vehicles/admin/vehicle_asignment_form',$this->data, TRUE);
       // $this->middle = 'vehicles/admin/vehicle_asignment_form';
       // $this->layout();
        echo $view; exit();         
    }
     public function vehicle_asignment_add($id = NULL) {        
        if (isset($_POST['submit'])) {
        //echo "<pre>"; print_r($_POST); die;           
        $flg = $this->VehiclesModel->modify_asignment($id);            
        }
       
    }
 public function asignment_delete($id) {
        $this->VehiclesModel->asignment_delete($id);
    }
}
/* End of file admin.php */
/* Location: ./application/modules/vehicles/controllers/admin.php */
