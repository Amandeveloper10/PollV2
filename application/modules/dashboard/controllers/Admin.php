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
        $this->load->model('admin/DashboardModel');
    }

    /**
     * Index Page for this vehicles controller.
     *
     * @access  public
     * @param   $id = is used to check index is load after add/edit or directly
     * @return  string
     */
    public function index($id=NULL) {
        $all_data = $this->DashboardModel->load_all_data();
		$all_data_male = $this->DashboardModel->load_all_data_male();
		$all_data_female = $this->DashboardModel->load_all_data_female();
		
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
		$this->data['all_data_male'] = $all_data_male;
		$this->data['all_data_female'] = $all_data_female;
        $this->data['today_employee_leave'] = $this->DashboardModel->get_today_employee_leave();
        $this->data['new_joining'] = $this->DashboardModel->get_new_joining();
        $this->data['leave_request'] = $this->DashboardModel->all_leave_request();
		
		$this->data['leave_request_emp'] = $this->DashboardModel->all_leave_request_emp();
		 
		$this->data['timeoff_request'] = $this->DashboardModel->all_timeoff_request();
		$this->data['timeoff_request_emp'] = $this->DashboardModel->all_timeoff_request_emp();
		$total_approval = 0;
		
		if(!empty($this->data['leave_request'])){
			$leave_count = count($this->data['leave_request']);
		}else{
			$leave_count = '0';
		}
		
		if(!empty($this->data['timeoff_request'])){
			$timeoff_count = count($this->data['timeoff_request']);
		}else{
			$timeoff_count = '0';
		}
		
		$total_approval = $leave_count + $timeoff_count;
		$this->data['total_approval'] = $total_approval;
		
        $this->data['month'] = date('m');
        $this->data['year'] =  date('Y');
        $this->data['upcoming_bday'] = $this->DashboardModel->get_upcoming_bday();
        $this->data['upcoming_work_anniversary'] = $this->DashboardModel->get_upcoming_work_anniversary();
        $this->data['upcoming_joining'] = $this->DashboardModel->get_upcoming_joining();
		$this->data['upcoming_joining_this_year'] = $this->DashboardModel->get_upcoming_joining_this_year();
		
        //echo "<pre>"; print_r($this->data['upcoming_joining']); die;
        if($id){
            $this->load->view('dashboard/admin/list',$this->data);
        }else{
            $this->middle = 'dashboard/admin/list';
        $this->layout();
        }
    }
	
	 public function get_leave_in_dashbord() {
        //echo 'sanchari'; die;
        $this->data['today_employee_leave'] = $this->DashboardModel->get_today_employee_leave();
        $this->data['leave_request'] = $this->DashboardModel->all_leave_request();
		$this->data['timeoff_request'] = $this->DashboardModel->all_timeoff_request();
		$total_approval = 0;
		
		if(!empty($this->data['leave_request'])){
			$leave_count = count($this->data['leave_request']);
		}else{
			$leave_count = '0';
		}
		
		if(!empty($this->data['timeoff_request'])){
			$timeoff_count = count($this->data['timeoff_request']);
		}else{
			$timeoff_count = '0';
		}
		
		$total_approval = $leave_count + $timeoff_count;
		$this->data['total_approval'] = $total_approval;
			 $view = $this->load->view('dashboard/admin/leave_ajax',$this->data, TRUE);
			echo $view; exit(); 
        
    }
	
	 public function get_attendance_in_dashbord() {
        //echo 'sanchari'; die;
        $employee_id = $_POST['employee_id'];  
		$view = $this->load->view('dashboard/admin/attendance_ajax',$this->data, TRUE);
		echo $view; exit(); 
        
    }
     
    
    public function new_index($id=NULL) {
        $all_data = $this->DashboardModel->load_all_data();
		$all_data_male = $this->DashboardModel->load_all_data_male();
		$all_data_female = $this->DashboardModel->load_all_data_female();
		
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
		$this->data['all_data_male'] = $all_data_male;
		$this->data['all_data_female'] = $all_data_female;
        $this->data['today_employee_leave'] = $this->DashboardModel->get_today_employee_leave();
        $this->data['new_joining'] = $this->DashboardModel->get_new_joining();
        $this->data['leave_request'] = $this->DashboardModel->all_leave_request();
		$this->data['timeoff_request'] = $this->DashboardModel->all_timeoff_request();
		$this->data['leave_request_emp'] = $this->DashboardModel->all_leave_request_emp();
		$this->data['timeoff_request_emp'] = $this->DashboardModel->all_timeoff_request_emp();
		$total_approval = 0;
		
		if(!empty($this->data['leave_request'])){
			$leave_count = count($this->data['leave_request']);
		}else{
			$leave_count = '0';
		}
		
		if(!empty($this->data['timeoff_request'])){
			$timeoff_count = count($this->data['timeoff_request']);
		}else{
			$timeoff_count = '0';
		}
		
		$total_approval = $leave_count + $timeoff_count;
		$this->data['total_approval'] = $total_approval;
		
        $this->data['month'] = date('m');
        $this->data['year'] =  date('Y');
        $this->data['upcoming_bday'] = $this->DashboardModel->get_upcoming_bday();
        $this->data['upcoming_work_anniversary'] = $this->DashboardModel->get_upcoming_work_anniversary();
        $this->data['upcoming_joining'] = $this->DashboardModel->get_upcoming_joining();
		$this->data['upcoming_joining_this_year'] = $this->DashboardModel->get_upcoming_joining_this_year();
        if($id){
            $this->load->view('dashboard/admin/list',$this->data);
        }else{
            $this->middle = 'dashboard/admin/list';
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
        $flg = $this->DashboardModel->modify($id);            
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
            $this->data['data_single'] = $this->DashboardModel->load_single_data($id);
            $this->data['id'] = $id;  
        }  
        //echo "<pre>"; print_r($this->data['data_single']); //die;
        $this->data['all_employee'] = $this->DashboardModel->get_result_data('employee',array('delete_flag'=>'N','is_active'=>'Y'));
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
        $this->DashboardModel->delete_this($id);
    }
    
     public function vehicle_maintenance($id=NULL) {
         //echo 'hello';exit;
        $all_data = $this->DashboardModel->load_all_data_vehicle();
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
            $this->data['data_single'] = $this->DashboardModel->load_single_vehicle_maintenance($id);
            $this->data['id'] = $id;  
        }  
        //echo "<pre>"; print_r($this->data['data_single']); //die;
        $this->data['all_vehicles'] = $this->DashboardModel->get_result_data('vehicles',array('delete_flag'=>'N','is_active'=>'Y'));
        $view = $this->load->view('vehicles/admin/vehicle_maintenance_form',$this->data, TRUE);
        echo $view; exit();         
    }
     public function vehicle_maintenance_add($id = NULL) {        
        if (isset($_POST['submit'])) {
        //echo "<pre>"; print_r($_POST); die;           
        $flg = $this->DashboardModel->modify_maintenance($id);            
        }
       
    }
 public function maintenance_delete($id) {
        $this->DashboardModel->maintenance_delete($id);
    }
    
       public function vehicle_asignment($id=NULL) {
         //echo 'hello';exit;
        $all_data = $this->DashboardModel->load_all_data_vehicle_asignment();
        
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
 $this->data['all_employee'] = $this->DashboardModel->load_all_employee();
        if (!empty($id)) {
            $this->data['data_single'] = $this->DashboardModel->load_single_vehicle_asignment($id);
            $this->data['id'] = $id;  
        }  
        //echo "<pre>"; print_r($this->data['data_single']); //die;
        $this->data['all_vehicles'] = $this->DashboardModel->get_result_data('vehicles',array('delete_flag'=>'N','is_active'=>'Y'));
        $view = $this->load->view('vehicles/admin/vehicle_asignment_form',$this->data, TRUE);
       // $this->middle = 'vehicles/admin/vehicle_asignment_form';
       // $this->layout();
        echo $view; exit();         
    }
     public function vehicle_asignment_add($id = NULL) {        
        if (isset($_POST['submit'])) {
        //echo "<pre>"; print_r($_POST); die;           
        $flg = $this->DashboardModel->modify_asignment($id);            
        }
       
    }
 public function asignment_delete($id) {
        $this->DashboardModel->asignment_delete($id);
    }
}
/* End of file admin.php */
/* Location: ./application/modules/vehicles/controllers/admin.php */
