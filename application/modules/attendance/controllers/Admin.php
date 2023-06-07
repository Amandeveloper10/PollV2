<?php

/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class for attendance [HMVC]. Handles all the datatypes and methodes required
 * for attendance section of future
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
        $this->load->model('admin/AttendanceModel');
    }

    /**
     * Index Page for this attendance controller.
     *
     * @access  public
     * @param   $id = is used to check index is load after add/edit or directly
     * @return  string
     */
    public function index($id=NULL) {
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;

       // $this->data['all_data'] = $this->AttendanceModel->load_all_data();

       
       // echo "<pre>"; print_r($this->data['all_data']); //die;

        if(isset($_GET['start_date']) && $_GET['start_date']!=''){
            //echo "<pre>"; print_r('r'); die;

            $this->data['start_date'] = $_GET['start_date'];
            $this->data['data_month'] = date('m', strtotime($_GET['start_date']));
            $this->data['data_year'] = date('Y', strtotime($_GET['start_date']));

           // $this->data['all_data'] = $this->AttendanceModel->load_all_empp();
            $this->data['all_data'] = $this->AttendanceModel->get_result_data_with_order_by('employee',array('delete_flag'=>'N','is_active'=>'Y'));

        }else{
            //echo "<pre>"; print_r('g'); die;
            $this->data['start_date'] = date('Y-m-d');
            $this->data['data_month'] = date('m');
            $this->data['data_year'] = date('Y');

             $this->data['all_data'] = $this->AttendanceModel->get_result_data_with_order_by('employee',array('delete_flag'=>'N','is_active'=>'Y'));
            //$this->data['all_data'] = $this->AttendanceModel->load_all_empp();
        }

        //echo "<pre>"; print_r(date('Y-m-d')); die;

        if($id){
            $this->load->view('attendance/admin/list',$this->data);
        }else{
            $this->middle = 'attendance/admin/list';
        $this->layout();
        }
    }
    
    
    

    /**
     * add/edit save for this attendance controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */

     public function form($id = NULL) {        
        if (isset($_POST['submit'])) {
        //echo "<pre>"; print_r($_POST); die;           
        $flg = $this->AttendanceModel->modify($id);            
        }        
    }
	
	 public function form_dashboard() {        
        
        //echo "<pre>"; print_r($_POST); die;    
		$employee_id = $_POST['employee_id'];
        $datetime = $_POST['datetime']; 
		$time = $_POST['time'];
        $flg = $this->AttendanceModel->modify_from_dashbord($employee_id,$datetime,$time);            
              
    }
	
	public function form_dashboard_break_in() {        
        
        //echo "<pre>"; print_r($_POST); die;    
		$attendance_id = $_POST['attendance_id'];
		$employee_id = $_POST['employee_id'];
        $datetime = $_POST['datetime']; 
		$time = $_POST['time'];
        $flg = $this->AttendanceModel->modify_from_dashbord_break_in_time($attendance_id,$employee_id,$datetime,$time);            
              
    }
	
	public function form_dashboard_break_out() {        
        
        //echo "<pre>"; print_r($_POST); die;  
        $id = $_POST['id'];		
		$attendance_id = $_POST['attendance_id'];
		$employee_id = $_POST['employee_id'];
        $datetime = $_POST['datetime'];
		$entry_time = $_POST['entry_time'];
		$time = $_POST['time'];
		
        $flg = $this->AttendanceModel->modify_from_dashbord_break_out_time($id,$attendance_id,$employee_id,$datetime,$entry_time,$time);            
              
    }
	
	


    /**
     * edit Page load for this attendance controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */
    public function get_form() {
        $this->data = array();
       // echo "<pre>"; print_r($_POST); die;
        $id = $_POST['id'];
        $stDate = $_POST['stDate'];  

        if (!empty($id)) {
            $this->data['data_single'] = $this->AttendanceModel->load_single_data($id);
           //echo '<pre>'; print_r($id); die;
            $this->data['id'] = $id;  
        }  
        $this->data['stDate'] = $stDate;  
        //echo "<pre>"; print_r($this->data['data_single']); //die;
        $this->data['all_employee'] = $this->AttendanceModel->get_result_data_with_order_by('employee',array('delete_flag'=>'N','is_active'=>'Y'));
        // $this->data['all_Organization'] = $this->AttendanceModel->get_result_data('setting_organization',array('delete_flag'=>'N','is_active'=>'Y'));
        $view = $this->load->view('attendance/admin/form',$this->data, TRUE);
        echo $view; exit();         
    }
	
	 public function search_attendance() {
		 
		 $this->data = array();
        //echo "<pre>"; print_r($_POST); die;
    
        $stDate = $_POST['st_date'];  
		
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;

       // $this->data['all_data'] = $this->AttendanceModel->load_all_data();

       
       // echo "<pre>"; print_r($this->data['all_data']); //die;

        if($stDate!=''){
            //echo "<pre>"; print_r('r'); die;

            $this->data['start_date'] = date('Y-m-d',strtotime($stDate));
            $this->data['data_month'] = date('m', strtotime($stDate));
            $this->data['data_year'] = date('Y', strtotime($stDate));

           // $this->data['all_data'] = $this->AttendanceModel->load_all_empp();
            $this->data['all_data'] = $this->AttendanceModel->get_result_data_with_order_by('employee',array('delete_flag'=>'N','is_active'=>'Y'));

        }else{
            //echo "<pre>"; print_r('g'); die;
            $this->data['start_date'] = date('Y-m-d');
            $this->data['data_month'] = date('m');
            $this->data['data_year'] = date('Y');

             $this->data['all_data'] = $this->AttendanceModel->get_result_data_with_order_by('employee',array('delete_flag'=>'N','is_active'=>'Y'));
            //$this->data['all_data'] = $this->AttendanceModel->load_all_empp();
        }

         $view = $this->load->view('attendance/admin/list_ajax',$this->data, TRUE);
         echo $view; exit(); 
    }

    /**
     * check same date attendance controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function check_emp_attendance() {
        //echo "<pre>"; print_r($_POST); die;

        $chk_attendance = $this->AttendanceModel->get_row_data('attendance',array('delete_flag'=>'N','is_active'=>'Y','date'=>date('Y-m-d',strtotime($_POST['dateVal'])),'employee_id'=>$_POST['empVal']));

        if(!empty($chk_attendance) && $_POST['att_id']!=$chk_attendance->id){
            echo "Attendance already done for this date."; exit();
        }else{
             echo "no"; exit();
        }


    }


     public function employee_attendance() {
       // echo "<pre>"; print_r($_POST); die;
       
        $this->data['all_employee'] = $this->AttendanceModel->get_result_data('employee',array('is_active'=>'Y','delete_flag'=>'N'));
        $this->data['month'] = ($_POST['month']!='') ? $_POST['month'] : date('m');
        $this->data['year'] = ($_POST['year']!='') ? $_POST['year'] : date('Y');

        $view = $this->load->view('attendance/admin/attendance', $this->data, TRUE);
        echo $view;
        exit();


    }


    public function upload_excel() {
        $this->data = array();
        $id = '';
        $view = $this->load->view('attendance/admin/uploadexcel',$this->data, TRUE);
        echo $view; exit();         
    }

    function uploadData()
    {
        $flg = $this->AttendanceModel->uploadData();
        redirect('attendance');
    }
}
/* End of file admin.php */
/* Location: ./application/modules/attendance/controllers/admin.php */
