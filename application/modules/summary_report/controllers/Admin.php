<?php

/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class for designation [HMVC]. Handles all the datatypes and methodes required
 * for designation section of future
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
        $this->load->model('admin/SummaryModel');
    }

    /**
     * Index Page for this designation controller.
     *
     * @access  public
     * @param   $id = is used to check index is load after add/edit or directly
     * @return  string
     */
    public function index($id = NULL) {
        $all_employee = $this->SummaryModel->load_all_employee();
        $all_leave_type = $this->SummaryModel->get_result_data('master_leave_rules',array('delete_flag'=>'N','is_active'=>'Y'));
       

        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_employee'] = $all_employee;
        $this->data['all_leave_type'] = $all_leave_type;
        
        // echo "<pre>"; print_r($all_data); //die;
        if ($id) {
            $this->load->view('summary_report/admin/list', $this->data);
        } else {
            $this->middle = 'summary_report/admin/list';
            $this->layout();
        }
    }

    /**
     * add/edit save for this designation controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */
    public function form($id = NULL) {
        if (isset($_POST['submit'])) {
            //echo "<pre>"; print_r($_POST); die;           
            $flg = $this->SummaryModel->modify($id);
        }
    }

    /**
     * edit Page load for this designation controller.
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
            $this->data['data_single'] = $this->SummaryModel->load_single_data($id);
            $this->data['id'] = $id;
        }
        //echo "<pre>"; print_r($this->data['data_single']); //die;
        $view = $this->load->view('summary_report/admin/form', $this->data, TRUE);
        echo $view;
        exit();
    }

    public function admin_employee_att_report(){
        $employee = $_POST['employee'];
        $month_id = $_POST['month_id'];
        $this->data['data_single'] = $this->SummaryModel->load_single_data($employee);
        $this->data['att_report'] = $this->SummaryModel->load_att_month(base64_encode($employee),$month_id,date('Y'));
        $this->data['month_id'] = $month_id;
         $offshift = $this->SummaryModel->get_result_data('master_work_shift_off_day',array('work_shift_id'=>$this->data['data_single']->work_shift_id));
            $offSHIFTarr = array();
            foreach ($offshift as $value) {
               // $offSHIFTarr[$value->weekname] = $value->weekvalue;
                 $offSHIFTarr[$value->week_no][$value->weekname] = $value->weekvalue;
            }
            $this->data['offshiftarr'] = $offSHIFTarr;

         $view = $this->load->view('summary_report/admin/search_ajax', $this->data, TRUE);
        echo $view;
        exit();
    }

      public function admin_employee_report(){
        $month= $_POST['month'];
        $this->data['all_employee'] = $this->SummaryModel->load_all_employee();
         $this->data['all_leave_type'] = $this->SummaryModel->get_result_data('master_leave_rules',array('delete_flag'=>'N','is_active'=>'Y'));
        $this->data['month'] = $month;
      $view = $this->load->view('summary_report/admin/report_ajax', $this->data, TRUE);
     echo $view;
        exit();
    }

    /**
     * status designation controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */
    public function status($id) {
        $this->SummaryModel->status_change($id);
    }

    /**
     * delete membership controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */
    public function delete($id) {
        $this->SummaryModel->delete_this($id);
    }

}

/* End of file admin.php */
/* Location: ./application/modules/designation/controllers/admin.php */
