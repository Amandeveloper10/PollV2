<?php
use Dompdf\Dompdf;
use Dompdf\Options;
/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class for employees [HMVC]. Handles all the datatypes and methodes required
 * for employees section of future
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
        $this->load->helper('common');
        admin_authenticate();
        $this->load->model('admin/EmployeesModel');
        

    }

    /**
     * Index Page for this employees controller.
     *
     * @access  public
     * @param   $id = is used to check index is load after add/edit or directly
     * @return  string
     */
    public function index($id = NULL) {
        $all_data = $this->EmployeesModel->load_all_data();
        $all_data_archive = $this->EmployeesModel->load_all_data_archive();
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
         $this->data['all_data_archive'] = $all_data_archive;
        // echo "<pre>"; print_r($all_data); //die;
        if ($id) {
            $this->load->view('employees_details/admin/list', $this->data);
        } else {
            $this->middle = 'employees_details/admin/list';
            $this->layout();
        }
    }

    /**
     * add/edit save for this employees controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */
    public function form($id = NULL) {
         //echo "<pre>"; print_r($_POST); die;
        //if (!empty($_POST)) {

        $flg = $this->EmployeesModel->modify($id);
        // }        
    }

    public function form_qualification($id = NULL) {
        // echo "<pre>"; print_r($_POST); die;
        //if (!empty($_POST)) {
        $this->data['id'] = $id;
        $flg = $this->EmployeesModel->modify_qualification($id);
        // }        
    }

    public function form_expenses($id1 = NULL) {
        // echo "<pre>"; print_r($_POST); die;
        //if (!empty($_POST)) {
       // echo $id;exit;
        $id=base64_decode($id1);
        $this->data['id'] = $id;
        $flg = $this->EmployeesModel->modify_expenses($id);
        $this->data['expenses'] = $this->EmployeesModel->load_data_expenses($id);
        $view = $this->load->view('employees_details/admin/ajax_expenses', $this->data, TRUE);
        echo $view;
        exit();
        // }        
    }

    public function employees_expenses_data($id = NULL) {


        $data = $this->data['bank'] = $this->EmployeesModel->load_data_bank_single($id);
        //$view = $this->load->view('employees_details/admin/ajax_expenses',$this->data, TRUE);

        echo json_encode($data);
        exit();
        // }        
    }
    
    
     public function form_bank($id1 = NULL) {
        // echo "<pre>"; print_r($_POST); die;
        //if (!empty($_POST)) {
       // echo $id;exit;
        $id=base64_decode($id1);
        $this->data['id'] = $id;
        $flg = $this->EmployeesModel->modify_bank($id);
        $this->data['bank'] = $this->EmployeesModel->load_data_bank($id);
        $view = $this->load->view('employees_details/admin/ajax_bank', $this->data, TRUE);
        echo $view;
        exit();
        // }        
    }

    public function employees_bank_data($id = NULL) {


        $data = $this->data['bank'] = $this->EmployeesModel->load_data_bank_single($id);
        //$view = $this->load->view('employees_details/admin/ajax_expenses',$this->data, TRUE);

        echo json_encode($data);
        exit();
        // }        
    }

    public function employees_benifit_data($id = NULL) {

//echo $id;exit;
        $data = $this->data['benifit'] = $this->EmployeesModel->load_data_benifit_single($id);
        //$view = $this->load->view('employees_details/admin/ajax_expenses',$this->data, TRUE);

        echo json_encode($data);
        exit();
        // }        
    }

    public function employees_expenses_delete($id = NULL) {
        $this->db->where('id', $id);
        $this->db->delete('HR_employee_expenses');

        echo 'done';
        exit;
    }
     public function employees_bank_delete($id = NULL) {
        $this->db->where('id', $id);
        $this->db->delete('HR_employee_bank_details');

        echo 'done';
        exit;
    }

    public function employees_leave_application_delete($id = NULL) {
        $this->db->where('id', $id);
        $this->db->delete('HR_employee_leave_application');

        echo 'done';
        exit;
    }

    public function employees_benifit_delete($id = NULL) {
        $this->db->where('id', $id);
        $this->db->delete('HR_employee_assign_policy');

        echo 'done';
        exit;
    }

    public function employees_loanapplication_delete($id = NULL) {
        $this->db->where('id', $id);
        $this->db->delete('HR_employee_loan_application');

        echo 'done';
        exit;
    }

    public function employees_loanpayment_delete($id = NULL) {
        $this->db->where('id', $id);
        $this->db->delete('HR_employee_loan_payment');

        echo 'done';
        exit;
    }

    /**
     * edit Page load for this employees controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */
    public function get_form() {
        $this->data = array();
        // echo "<pre>"; print_r($_POST); die;
//        $id = $_POST['id'];  
//
//        if (!empty($id)) {
//            $this->data['data_single'] = $this->EmployeesModel->load_single_data($id);
//            $this->data['id'] = $id;  
//        }  
        $this->data['all_overtime'] = $this->EmployeesModel->get_result_data('master_overtime_rules',array('is_active'=>'Y','delete_flag'=>'N'));

        $this->data['all_work_shift'] = $this->EmployeesModel->get_result_data('master_work_shift',array('is_active'=>'Y','delete_flag'=>'N'));

      
        $this->data['all_grade'] = $this->EmployeesModel->get_result_data('master_grade',array('is_active'=>'Y','delete_flag'=>'N'));
        $this->data['grade_wise_leave'] = $this->EmployeesModel->get_result_data('master_grade',array('is_active'=>'Y','delete_flag'=>'N'));

        $this->data['all_department'] = $this->EmployeesModel->get_result_data('master_department',array('is_active'=>'Y','delete_flag'=>'N'));

        $this->data['all_designation'] = $this->EmployeesModel->get_result_data('master_designation',array('is_active'=>'Y','delete_flag'=>'N'));
        $this->data['country'] = $this->EmployeesModel->get_result_data('countries');
       $this->data['all_job'] = $this->EmployeesModel->get_result_data('master_req_job_opening', array('delete_flag' => 'N', 'is_active' => 'Y'));

       $this->data['defaultshift'] = $this->EmployeesModel->get_result_data('master_work_shift',array('is_active'=>'Y','delete_flag'=>'N'));

        $this->data['all_skill'] = $this->EmployeesModel->load_all_skill();
        $this->data['all_qualification'] = $this->EmployeesModel->load_all_qualification();

         $this->data['all_leaves'] = $this->EmployeesModel->get_result_data('master_leave_rules', array('delete_flag' => 'N', 'is_active' => 'Y'));
          //$this->data['all_experience'] = $this->EmployeesModel->get_result_data('employee_experience_temp', array());
        //echo "<pre>"; print_r($this->data['all_leaves']); die;
		
		 $this->data['all_manager'] = $this->EmployeesModel->get_result_data_with_order_by('employee',array('is_active'=>'Y','delete_flag'=>'N'));
         $this->data['all_subordinate'] = $this->EmployeesModel->get_result_data_with_order_by('employee',array('is_active'=>'Y','delete_flag'=>'N'));
			   
        $this->db->truncate('employee_experience_temp'); 
        $this->db->truncate('employee_education_temp'); 

        $this->middle = 'employees_details/admin/form';
        $this->layout();


        //  $view = $this->load->view('employees_details/admin/form',$this->data, TRUE);
        // echo $view; exit();         
    }

    public function get_archive() {
        $this->data = array();
        $this->data['all_data_archive'] = $this->EmployeesModel->load_all_data_archive();
        echo '<pre>'; print_r($this->data['all_data_archive']); //die; 
        $this->middle = 'employees_details/admin/list_archive';
        $this->layout();


        //  $view = $this->load->view('employees_details/admin/form',$this->data, TRUE);
        // echo $view; exit();         
    }
 
    /**
     * status employees controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */
    public function status($id) {
        $this->EmployeesModel->status_change($id);
    }

    /**
     * delete employees controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */
    public function delete($id) {
        $this->EmployeesModel->delete_this($id);
    }

    /**
     * interview_candidate employees controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */
    public function interview_candidate() {
        //echo "<pre>"; print_r($_POST); //die;
        $all_candidate = $this->EmployeesModel->get_result_data('master_req_candidates', array('job_opening_no' => $_POST['job_id'], 'delete_flag' => 'N', 'is_active' => 'Y'));
        //echo "<pre>"; print_r($all_candidate); die;

        $html = '<label>Candidate</label>
            <select class="form-control"  name="candidate_id" id="candidate_id" required>
                <option value="">Select</option>';

        if (!empty($all_candidate)) {
            foreach ($all_candidate as $value) {
                $html .= '<option value="' . $value->id . '" >' . $value->candidate_name . '</option>';
            }
        }
        $html .= '</select>';

        echo $html;
        die;
    }

    public function get_profile($id1 = NULL) {
        $this->data = array();
        // echo "<pre>"; print_r($_POST); die;
//        $id = $_POST['id'];  
//
        $id=base64_decode($id1);
       // echo $id;exit;
        if (!empty($id)) {
            $this->db->truncate('employee_experience_temp'); 
             $this->db->truncate('employee_education_temp'); 

            $this->data['all_data_complaints'] = $this->EmployeesModel->all_data_complaints($id);
            $this->data['data_single'] = $this->EmployeesModel->load_single_data($id);

            $this->data['data_single_pf'] = $this->EmployeesModel->load_single_data_pf($id);
            $this->data['data_single_esi'] = $this->EmployeesModel->load_single_data_esi($id);
            $this->data['data_single_ptax'] = $this->EmployeesModel->load_single_data_ptax($id);
            

            $this->data['data_qualification'] = $this->EmployeesModel->load_data_qualification($id);
            $this->data['data_certificate_type'] = $this->EmployeesModel->load_certificate_type();
            //echo"<pre>"; print_r($this->data['data_certificate_type'] = $this->EmployeesModel->load_certificate_type()); exit();
            $this->data['expenses'] = $this->EmployeesModel->load_data_expenses($id);
            $this->data['loan_application'] = $this->EmployeesModel->load_data_loan_application($id);
            $this->data['passport_single'] = $this->EmployeesModel->load_passport_single($id);
            $this->data['employee'] = $this->EmployeesModel->load_all_data();
            $this->data['all_policy'] = $this->EmployeesModel->load_all_policy();
            $this->data['all_employee_policy'] = $this->EmployeesModel->load_all_employee_policy($id);
            $this->data['all_employee_leave_application'] = $this->EmployeesModel->load_all_leave_application($id);
            $this->data['all_leave_type'] = $this->EmployeesModel->load_all_leave_type($id);
            
            $this->data['all_skill'] = $this->EmployeesModel->load_all_skill();
            $this->data['all_qualification'] = $this->EmployeesModel->load_all_qualification();
            $this->data['all_employee_leave_total'] = $this->EmployeesModel->load_all_leave_total($id);
            $this->data['id'] = $id1;

            $this->data['att_january'] = $this->EmployeesModel->load_att_month(base64_encode($id),'01',date('Y'));
            $this->data['att_february'] = $this->EmployeesModel->load_att_month(base64_encode($id),'02',date('Y'));
            $this->data['att_march'] = $this->EmployeesModel->load_att_month(base64_encode($id),'03',date('Y'));
            $this->data['att_april'] = $this->EmployeesModel->load_att_month(base64_encode($id),'04',date('Y'));
            $this->data['att_may'] = $this->EmployeesModel->load_att_month(base64_encode($id),'05',date('Y'));
            $this->data['att_june'] = $this->EmployeesModel->load_att_month(base64_encode($id),'06',date('Y'));
            $this->data['att_july'] = $this->EmployeesModel->load_att_month(base64_encode($id),'07',date('Y'));
            $this->data['att_august'] = $this->EmployeesModel->load_att_month(base64_encode($id),'08',date('Y'));
            $this->data['att_september'] = $this->EmployeesModel->load_att_month(base64_encode($id),'09',date('Y'));
            $this->data['att_october'] = $this->EmployeesModel->load_att_month(base64_encode($id),'10',date('Y'));
            $this->data['att_november'] = $this->EmployeesModel->load_att_month(base64_encode($id),'11',date('Y'));
            $this->data['att_december'] = $this->EmployeesModel->load_att_month(base64_encode($id),'12',date('Y'));

            $offshift = $this->EmployeesModel->get_result_data('master_work_shift_off_day',array('work_shift_id'=>$this->data['data_single']->work_shift_id,'weekvalue'=>'Full'));
            $offSHIFTarr = array();
            foreach ($offshift as $value) {
                $offSHIFTarr[$value->week_no][$value->weekname] = $value->weekvalue;
             // $offSHIFTarr[$value->weekname] = $value->weekvalue;
            }
            $this->data['offshiftarr'] = $offSHIFTarr;
            //echo '<pre>'; print_r($offSHIFTarr); die;
            $this->data['att_full'] = $this->EmployeesModel->load_att_day($id,date('Y'),'full');
            $this->data['att_half'] = $this->EmployeesModel->load_att_day($id,date('Y'),'half');
            $this->data['att_overtime'] = $this->EmployeesModel->load_att_day($id,date('Y'),'overtime');
            
             $this->data['att_january_leave'] = $this->EmployeesModel->load_att_month_leave($id,date('m'),date('Y'));
             //echo '<pre>';print_r($this->data['att_january_leave']);exit;
             $this->data['all_payroll'] = $this->EmployeesModel->get_payroll($id);
             $this->data['emp_salary'] = $this->EmployeesModel->get_row_data_order_by_id('employee_salary', array('employee_id' => $id,'delete_flag'=>'N','is_active'=>'Y'));
              $this->data['emp_designation'] = $this->EmployeesModel->get_row_data('master_designation',array('id'=>$this->data['data_single']->designation));
           // echo "<pre>"; print_r($this->data['emp_designation']); die;

              $this->data['all_manager'] = $this->EmployeesModel->get_all_emp_except_current_emp($id);
               $this->data['all_subordinate'] = $this->EmployeesModel->get_all_emp_except_current_emp_and_manger($id,$this->data['data_single']->reporting_manager);
              $this->data['all_insurence'] = $this->EmployeesModel->get_all_insurence_employee($id);
             

              $this->data['subordinate_arr'] = (($this->data['data_single']->subordinate)!='') ? explode(',', $this->data['data_single']->subordinate) : array();
        
              $this->data['bank'] = $this->EmployeesModel->load_data_bank($id);
              //print_r($this->data['bank']); die;
              $this->data['all_leaves'] = $this->EmployeesModel->get_result_data('master_leave_rules', array('delete_flag' => 'N', 'is_active' => 'Y'));
               //$this->data['opening_leave'] = $this->EmployeesModel->get_result_data('employee_opening_leave', array('employee_id' => $id));
              $this->data['experience'] = $this->EmployeesModel->get_result_data('employee_experience', array('employee_id' => $id));
                $this->data['educaton'] = $this->EmployeesModel->get_result_data('employee_education', array('employee_id' => $id));

                $this->data['all_salary_history'] = $this->EmployeesModel->load_all_salary_history($id);
              
        }
       

        $this->data['all_overtime'] = $this->EmployeesModel->get_result_data('master_overtime_rules',array('is_active'=>'Y','delete_flag'=>'N'));

        $this->data['all_work_shift'] = $this->EmployeesModel->get_result_data('master_work_shift',array('is_active'=>'Y','delete_flag'=>'N'));

      
        $this->data['all_grade'] = $this->EmployeesModel->get_result_data('master_grade',array('is_active'=>'Y','delete_flag'=>'N'));
        $this->data['defaultshift'] = $this->EmployeesModel->get_result_data('master_work_shift',array('is_active'=>'Y','delete_flag'=>'N'));
        $this->data['grade_wise_leave'] = $this->EmployeesModel->get_result_data('master_grade',array('is_active'=>'Y','delete_flag'=>'N','id'=>$this->data['data_single']->grade));

        $this->data['all_department'] = $this->EmployeesModel->get_result_data('master_department',array('is_active'=>'Y','delete_flag'=>'N'));

        $this->data['all_designation'] = $this->EmployeesModel->get_result_data('master_designation',array('is_active'=>'Y','delete_flag'=>'N'));

        $this->data['salary_component'] = $this->EmployeesModel->get_result_data('master_salary_component',array('delete_flag' => 'N', 'is_active' => 'Y'));

        $this->data['country'] = $this->EmployeesModel->get_result_data('countries');

        $this->data['closure']=$this->EmployeesModel->closure($id);

        $this->data['warning_evaluation']=$this->EmployeesModel->warning_evaluation($id);

         $this->middle = 'employees_details/admin/edit_form';
         $this->layout();       
     
    }

    public function employees_loan_end_date_calculate($date = NULL, $value = NULL) {

        $effectiveDate = date('Y-m-d', strtotime("+$value months", strtotime($date)));
        echo $effectiveDate;
        exit;
    }

    public function modify_employees_loan_application($id1 = NULL) {
        // echo "<pre>"; print_r($_POST); die;
        //if (!empty($_POST)) {
        $id=base64_decode($id1);
        $this->data['id'] = $id;
        $flg = $this->EmployeesModel->modify_employees_loan_application($id);
        $this->data['loan_application'] = $this->EmployeesModel->load_data_loan_application($id);
        $view = $this->load->view('employees_details/admin/ajax_loan_application', $this->data, TRUE);
        echo $view;
        exit();
        // }        
    }

    public function employees_loan_application_data($id = NULL) {


        $data = $this->data['loan_application'] = $this->EmployeesModel->load_data_loan_application_single($id);
        //$view = $this->load->view('employees_details/admin/ajax_expenses',$this->data, TRUE);
        //  echo '<pre>';
        //   print_r($data);
        //  exit; 
        echo json_encode($data);
        exit();
        // }        
    }

    public function employees_loanapplication_doc_delete($id = NULL, $name = NULL) {
        $data = $this->EmployeesModel->load_data_loan_application_single($id);

        if (!empty($data->attachment)) {
            $attachment = explode(',', $data->attachment);

            if (($key = array_search($name, $attachment)) !== false) {
                unset($attachment[$key]);
            }
//echo '<pre>';
//print_r($attachment);
//exit;

            $updatedata['attachment'] = implode(',', $attachment);
            $this->db->where('id', $id)->update(tablename('employee_loan_application'), $updatedata);
            // $this -> db -> where('id', $id);
            // $this -> db -> update('HR_employee_loan_application', $updatedata);

            echo 'done';
            exit;
        }
    }

    public function employees_loanapplication_download($file) {

        $path = base_url() . "/uploads/"; // change the path to fit your websites document structure
        $fullPath = $file;

        $file_name = $path . $file;

        if (ini_get('zlib.output_compression')) {
            ini_set('zlib.output_compression', 'Off');
        }


        switch (strtolower(substr(strrchr($file_name, '.'), 1))) {
            case 'pdf': $mime = 'application/pdf';
                break;
            case 'zip': $mime = 'application/zip';
                break;
            case 'jpeg':
            case 'jpg': $mime = 'image/jpg';
                break;
            default: $mime = 'application/force-download';
        }
        header('Pragma: public');  // required
        header('Expires: 0');  // no cache
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        //header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime ($file_name)).' GMT');
        header('Cache-Control: private', false);
        header('Content-Type: ' . $mime);
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Content-Transfer-Encoding: binary');
        //header('Content-Length: '.filesize($file_name));	// provide file size
        header('Connection: close');
        readfile($file_name);  // push it out
        exit();
    }

    public function goforloanclose($id = NULL, $employeeid = NULL) {


        $updatedata['loan_close'] = 1;
        $this->db->where('id', $id)->update(tablename('employee_loan_application'), $updatedata);


        $this->data['loan_application'] = $this->EmployeesModel->load_data_loan_application($employeeid);
        $view = $this->load->view('employees_details/admin/ajax_loan_application', $this->data, TRUE);
        echo $view;
        exit();
    }

    public function loan_details($id = NULL) {



        $this->db->select('t1.*');
        $this->db->from(tablename('employee_loan_application') . ' as t1');
        $this->db->where('t1.id', $id);
        $query = $this->db->get();
        $loandmain = $query->row();


        $this->db->select('t1.*');
        $this->db->from(tablename('employee_loan_payment') . ' as t1');
        $this->db->where('t1.loan_id', $id);
        $query = $this->db->get();
        $loandetails = $query->result();
        $totalpaidamount = $this->EmployeesModel->load_data_loan_total_payment($id);
        if (empty($loandetails)) {
            $totalpay = 0.00;
            $totalmonth = 0;
        } else {
            $totalpay = count($loandetails) * $loandmain->installment_amount;
            $totalmonth = count($loandetails);
        }
        if ($loandmain->sanction_amount > $totalpay) {
            // $due=$loandmain->sanction_amount-$totalpay;
            $due = $loandmain->sanction_amount - $totalpaidamount->totalamount;
        } else {
            $due == 0.00;
        }

        if ($loandmain->tenure_in_months > $totalmonth) {
            $duemonth = $loandmain->tenure_in_months - $totalmonth;
        } else {
            $duemonth == 0;
        }




        $msg = "Due Amount: $due And  Due Month: $duemonth";
        $amount = $loandmain->installment_amount;
        $this->data['loan_payment'] = $this->EmployeesModel->load_data_loan_payment($id);
        $view = $this->load->view('employees_details/admin/ajax_loan_payment', $this->data, TRUE);
        //  echo $view;
        // exit();
        //$table=
        echo $msg . '@' . $amount . '@' . $view;
        exit();
    }

    public function policy_details($id = NULL) {



        $this->db->select('t1.*');
        $this->db->from(tablename('insurance_policies') . ' as t1');
        $this->db->where('t1.id', $id);
        $query = $this->db->get();
        $loandmain = $query->row();


        $msg = "<strong>Policy Type:</strong> $loandmain->type , <strong>Renewal Date:</strong> $loandmain->renewal_date , <strong>Exire Date:</strong> $loandmain->expiry_date, <strong>Coverage:</strong> $loandmain->coverage , <strong>Note:</strong> $loandmain->note";

        echo $msg;
        exit();
    }

    public function modify_employees_loan_payment($id = NULL) {

        $this->data['id'] = $id;
        $flg = $this->EmployeesModel->modify_employees_loan_payment($id);
        // $this->data['loan_payment'] = $this->EmployeesModel->load_data_loan_payment($this->input->post('loan_id'));
        // $view = $this->load->view('employees_details/admin/ajax_loan_payment', $this->data, TRUE);
        // echo $view;
        exit();
    }

    public function modify_passport_visa($id1 = NULL) {
        //echo $id;exit;
          $id = base64_decode($id1);
        $this->data['id'] = $id;
        $flg = $this->EmployeesModel->modify_passport_visa($id);
        $this->data['passport_single'] = $this->EmployeesModel->load_passport_single($id);
        $view = $this->load->view('employees_details/admin/ajax_passport', $this->data, TRUE);
        echo $view;
        exit();
    }

    public function modify_benifit($id1 = NULL) {
//echo $id;exit;
        $id = base64_decode($id1);
        $this->data['id'] = $id;
        
        $flg = $this->EmployeesModel->modify_benifit($id);
        $this->data['all_employee_policy'] = $this->EmployeesModel->load_all_employee_policy($id);
        $view = $this->load->view('employees_details/admin/ajax_benifit', $this->data, TRUE);
        echo $view;
        exit();
    }

    public function modify_leave_application($id1 = NULL) {
$id = base64_decode($id1);
        $this->data['id'] = $id;
        $flg = $this->EmployeesModel->modify_leave_application($id);
        $this->data['all_employee_leave_application'] = $this->EmployeesModel->load_all_leave_application($id);
        $view = $this->load->view('employees_details/admin/ajax_leave_application', $this->data, TRUE);
        $data = '';
        $all_leave_type = $this->EmployeesModel->load_all_leave_type();


        if (!empty($all_leave_type)) {
            foreach ($all_leave_type as $value) {

                $result = $this->EmployeesModel->leave_due_day($value->id, $id);
                $due = $value->unit - $result;


                $data.=' <option value="' . $value->id . '"> ' . $value->rule_name . ' ( Due: ' . $due . ' )</option>';
            }
        }
        echo $view . '`' . $data;
        exit();
    }

    public function employees_leave_application_data($id = NULL) {


        $data = $this->EmployeesModel->load_data_leave_application_single($id);
        //$view = $this->load->view('employees_details/admin/ajax_expenses',$this->data, TRUE);

        echo json_encode($data);
        exit();
        // }        
    }

    public function employees_leave_approval($id = NULL, $status = NULL, $employee_id = NULL) {


        $this->data['id'] = $employee_id;

        $datanew = $this->EmployeesModel->load_data_leave_application_single($id);

        $leave_type = $this->EmployeesModel->load_all_leave_type_single($datanew->leave_type_id);

       // $resultnew = $this->EmployeesModel->leave_due_day($leave_type->id, $employee_id);


        //$duenew = $leave_type->unit - $resultnew;
        $resultnew = $this->EmployeesModel->leave_due_day($leave_type->id, base64_decode($employee_id));
        //print_r($resultnew) ; die;

        $duenew = $resultnew;
        //  echo @$datanew->leave_type_id.'@'.@$leave_type->unit.'@'.@$resultnew; exit;
        // echo$status;exit;
        if ($status == 'Yes') {
            if ($duenew <= 0) {

                echo 'no';
                exit;
            } else {
                $data11['approved'] = $status;
                $this->db->where('id', $id);
                $this->db->update('HR_employee_leave_application', $data11);
                 $leave_application = $this->EmployeesModel->get_row_data('employee_leave_application',array('id'=>$id));
                if(!empty($leave_application)){
                    $data = array(
                        'leave_application_id' =>  $leave_application->id,
                        'employee_id' =>  $leave_application->employee_id,
                        'leave_id'  => $leave_application->leave_type_id,
                        'taken_leaves' =>$leave_application->leave_total_days,
                        'opening_balance' =>'-'.$leave_application->leave_total_days,
                        'entry_date' => $leave_application->leave_from,
                        'type' => 'approved',
                        'note' => $leave_application->leave_note,
                        );
                        $this->db->insert(tablename('employee_leaves'), $data);
                }

                $data = '';
                $all_leave_type = $this->EmployeesModel->load_all_leave_type();


                if (!empty($all_leave_type)) {
                    foreach ($all_leave_type as $value) {

                        $result = $this->EmployeesModel->leave_due_day($value->id, $employee_id);
                        //$due = $value->unit - $result;
                        $due = $value->unit - $result;

                        $data.=' <option value="' . $value->id . '"> ' . $value->rule_name . ' ( Due: ' . $due . ' )</option>';
                    }
                }
                $this->data['all_employee_leave_application'] = $this->EmployeesModel->load_all_leave_application($employee_id);
                $view = $this->load->view('employees_details/admin/ajax_leave_application', $this->data, TRUE);
                // echo $view;
                echo $view . '`' . $data;
            }
        } else {

            $data11['approved'] = $status;
            $this->db->where('id', $id);
            $this->db->update('HR_employee_leave_application', $data11);
            $leave_application = $this->EmployeesModel->get_row_data('employee_leave_application',array('id'=>$id));
                if(!empty($leave_application)){
                    $data = array(
                      'leave_application_id' =>  $leave_application->id,
                        'employee_id' =>  $leave_application->employee_id,
                        'leave_id'  => $leave_application->leave_type_id,
                        'opening_balance' =>'-'.$leave_application->leave_total_days,
                         'taken_leaves' =>$leave_application->leave_total_days,
                        'entry_date' => $leave_application->leave_from,
                        'type' => 'approved',
                        'note' => $leave_application->leave_note,
                        );
                        $this->db->insert(tablename('employee_leaves'), $data);
                }

            $data = '';
            $all_leave_type = $this->EmployeesModel->load_all_leave_type();


            if (!empty($all_leave_type)) {
                foreach ($all_leave_type as $value) {

                    $result = $this->EmployeesModel->leave_due_day($value->id, $employee_id);
                   // $due = $value->unit - $result;
                     $due = $result;

                    $data.=' <option value="' . $value->id . '"> ' . $value->rule_name . ' ( Due: ' . $due . ' )</option>';
                }
            }
            $this->data['all_employee_leave_application'] = $this->EmployeesModel->load_all_leave_application($employee_id);
            $view = $this->load->view('employees_details/admin/ajax_leave_application', $this->data, TRUE);
            // echo $view;
            echo $view . '`' . $data;
        }


        exit();
    }

    public function leave_type_ajax($id = NULL) {


        $this->data['all_leave_type'] = $this->EmployeesModel->load_all_leave_type($id);


        if (!empty($all_leave_type)) {
            foreach ($all_leave_type as $value) {

                $result = $this->EmployeesModel->leave_due_day($value->id, $id);
                $due = $value->unit - $result;


                $data = ' <option value="$value->id">< ' . $value->rule_name . ' ( Due: ' . $due . ' )</option>';
            }
        }

        echo $data;
        exit();
        // }        
    }

    public function employees_leave_application_duplicate_date($date = NULL,$employee_id=NULL,$id=NULL) {



        $this->db->select('t1.*');
        $this->db->from(tablename('employee_leave_application') . ' as t1');
      //  $this->db->where('t1.approved', 'Yes');
         $this->db->where('t1.employee_id', $employee_id);
        $where = "(t1.leave_from='$date' OR t1.leave_to='$date')";
        if(!empty($id)){
          $this->db->where('t1.id !=', $id);
        }
        $this->db->where($where);
        //  $this->db->where('(t1.leave_from='.$date.' or t1.leave_to = '.$date.')');
        $query = $this->db->get();
        $loandmain = $query->row();
        //echo $this->db->last_query(); die;
        if(!empty($loandmain))
        {
            echo 'have';
    }
    else{
        echo 'no'; 
    }
    }


    public function get_employee_attendance() {
      //print_r($_POST); die;
        $this->data = array();
        $id = $_POST['employee_id'];
        $year = $_POST['year'];

            $this->data['id'] = $id;
            $this->data['att_january'] = $this->EmployeesModel->load_att_month($id,'01',$year);
            $this->data['att_february'] = $this->EmployeesModel->load_att_month($id,'02',$year);
            $this->data['att_march'] = $this->EmployeesModel->load_att_month($id,'03',$year);
            $this->data['att_april'] = $this->EmployeesModel->load_att_month($id,'04',$year);
			//echo $this->data['att_april']; die;
            $this->data['att_may'] = $this->EmployeesModel->load_att_month($id,'05',$year);
            $this->data['att_june'] = $this->EmployeesModel->load_att_month($id,'06',$year);
            $this->data['att_july'] = $this->EmployeesModel->load_att_month($id,'07',$year);
            $this->data['att_august'] = $this->EmployeesModel->load_att_month($id,'08',$year);
            $this->data['att_september'] = $this->EmployeesModel->load_att_month($id,'09',$year);
            $this->data['att_october'] = $this->EmployeesModel->load_att_month($id,'10',$year);
            $this->data['att_november'] = $this->EmployeesModel->load_att_month($id,'11',$year);
            $this->data['att_december'] = $this->EmployeesModel->load_att_month($id,'12',$year);

            $this->data['year'] = $year;
          $view = $this->load->view('employees_details/admin/emp_attandence',$this->data, TRUE);
         echo $view; exit();         
    }

    public function get_net_salary_div() {
        // echo "<pre>"; print_r($_POST); die;
        
        $this->data['id'] = $_POST['id'];  
        $this->data['ctcVal'] = (float) $_POST['ctcVal'];      

        $this->data['data_single'] = $this->EmployeesModel->get_row_data('employee_salary',array('employee_id'=>$_POST['id']));
        //print_r($this->data['data_single']); die;

        $this->data['salary_structure_val'] = $_POST['salary_structure_val'];

        // $this->data['salary_component_Earning'] = $this->EmployeesModel->get_result_data('master_salary_component',array('delete_flag' => 'N', 'is_active' => 'Y','type'=>'Earning'));
        // $this->data['salary_component_Deduction'] = $this->EmployeesModel->get_result_data('master_salary_component',array('delete_flag' => 'N', 'is_active' => 'Y','type'=>'Deduction'));

        $this->data['salary_component_Earning'] = $this->EmployeesModel->get_salary_component_by_type($this->data['salary_structure_val'],'Earning','Monthly');
        //echo '<pre>';print_r($this->data['salary_component_Earning']); 
        $this->data['salary_component_Deduction'] = $this->EmployeesModel->get_salary_component_by_type($this->data['salary_structure_val'],'Deduction','Monthly');

         $this->data['salary_component_benefit'] = $this->EmployeesModel->get_salary_component_by_type($this->data['salary_structure_val'],'Earning','Annual');
          $this->data['all_component_incentive_reimbursement'] = $this->db->query("SELECT * FROM `HR_master_salary_component` WHERE `is_active` = 'Y' AND `delete_flag` = 'N' AND `type` = 'Reimbursement' || `type` = 'Incentive'")->result();

        $view = $this->load->view('employees_details/admin/net_salary', $this->data, TRUE);
        echo $view;
        exit();
    }

     public function get_all_salary_structure() {
        // echo "<pre>"; print_r($_POST); die;
        
       
        $this->data['ctcVal'] = (float) $_POST['ctcVal'];      

        $this->data['salary_structure_val'] = $_POST['salary_structure_val'];


        $this->data['salary_component_Earning'] = $this->EmployeesModel->get_salary_component_by_type($this->data['salary_structure_val'],'Earning','Monthly');
        //echo '<pre>';print_r($this->data['salary_component_Earning']); 
        $this->data['salary_component_Deduction'] = $this->EmployeesModel->get_salary_component_by_type($this->data['salary_structure_val'],'Deduction','Monthly');

         $this->data['salary_component_benefit'] = $this->EmployeesModel->get_salary_component_by_type($this->data['salary_structure_val'],'Earning','Annual');
          $this->data['all_component_incentive_reimbursement'] = $this->db->query("SELECT * FROM `HR_master_salary_component` WHERE `is_active` = 'Y' AND `delete_flag` = 'N' AND `type` = 'Reimbursement' || `type` = 'Incentive'")->result();

        $view = $this->load->view('employees_details/admin/structure_salary', $this->data, TRUE);
        echo $view;
        exit();
    }

    public function get_net_salary_div_edit() {
        $this->data['employee_id'] = $_POST['employee_id'];  
        $this->data['id'] = $_POST['id'];  
        $this->data['ctcVal'] = (float) $_POST['ctcVal'];      

        $this->data['data_single'] = $this->EmployeesModel->get_row_data('employee_salary',array('employee_id'=>$_POST['employee_id'],'id'=>$_POST['id']));
        //print_r($this->data['data_single']); die;

        $this->data['salary_structure_val'] = $_POST['salary_structure_val'];
        $this->data['all_salary_structure'] = $this->EmployeesModel->get_result_data('master_salary_structure',array('is_active'=>'Y','delete_flag'=>'N'));


        $this->data['salary_component_Earning'] = $this->EmployeesModel->get_salary_component_by_type_edit($_POST['id'],$this->data['salary_structure_val'],'Earning','Monthly');
        //echo '<pre>';print_r($this->data['salary_component_Earning']); 
        $this->data['salary_component_Deduction'] = $this->EmployeesModel->get_salary_component_by_type($this->data['salary_structure_val'],'Deduction','Monthly');

         $this->data['salary_component_benefit'] = $this->EmployeesModel->get_salary_component_by_type_edit($_POST['id'],$this->data['salary_structure_val'],'Earning','Annual');
          $this->data['all_component_incentive_reimbursement'] = $this->db->query("SELECT * FROM `HR_master_salary_component` WHERE `is_active` = 'Y' AND `delete_flag` = 'N' AND `type` = 'Reimbursement' || `type` = 'Incentive'")->result();

        $view = $this->load->view('employees_details/admin/edit_net_salary', $this->data, TRUE);
        echo $view;
        exit();
    }

     public function get_net_salary_div_view() {
        // echo "<pre>"; print_r($_POST); die;
      $this->data['id'] = $_POST['id']; 
      $this->data['employee_id'] = $_POST['employee_id'];  
      $this->data['salary_structure_val'] = $_POST['salary_structure_val'];  
      $this->data['ctcVal'] = (float) $_POST['ctcVal'];      

        $this->data['data_single'] = $this->EmployeesModel->get_row_data('employee_salary',array('employee_id'=>base64_decode($_POST['employee_id']),'id'=>$_POST['id']));
        //print_r($this->data['data_single']); die;

        $this->data['salary_structure_val'] = $_POST['salary_structure_val'];
        $this->data['all_salary_structure'] = $this->EmployeesModel->get_result_data('master_salary_structure',array('is_active'=>'Y','delete_flag'=>'N'));


        $this->data['salary_component_Earning'] = $this->EmployeesModel->get_salary_component_by_type_edit($_POST['id'],$this->data['salary_structure_val'],'Earning','Monthly');
        //echo '<pre>';print_r($this->data['salary_component_Earning']); 
        $this->data['salary_component_Deduction'] = $this->EmployeesModel->get_salary_component_by_type($this->data['salary_structure_val'],'Deduction','Monthly');

         $this->data['salary_component_benefit'] = $this->EmployeesModel->get_salary_component_by_type_edit($_POST['id'],$this->data['salary_structure_val'],'Earning','Annual');
        //  $this->data['all_component_incentive_reimbursement'] = $this->db->query("SELECT * FROM `HR_master_salary_component` WHERE `is_active` = 'Y' AND `delete_flag` = 'N' AND `type` = 'Reimbursement' || `type` = 'Incentive'")->result();

        $view = $this->load->view('employees_details/admin/view_net_salary', $this->data, TRUE);
        echo $view;
        exit();
    }

     public function save_emp_salary_structure() {
       //echo "<pre>"; print_r($_POST); die;
       $edit_id = $_POST['edit_id'];
        $mode = $_POST['mode'];

        $salary_structure_breakup = $_POST['salary_structure_breakup'];
        $id_arr = array();
        $val_arr = array();
        if(!empty($salary_structure_breakup)){
            foreach ($salary_structure_breakup as $breakup) {
                //echo $breakup; die;
                $bkup = explode('##', $breakup);
                array_push($id_arr, $bkup[0]);
                array_push($val_arr, $bkup[1]);

            }
        }
        //echo "<pre>"; print_r($_POST); die;
       //echo "<pre>"; print_r($salary_structure_breakup); die;
         // echo "<pre>"; print_r($val_arr); //die;
        //die("hsafdg");

        //$salary_structure_details = $this->EmployeesModel->get_result_data('master_salary_structure_formula',array('master_salary_structure_id'=>$_POST['salary_structure_val']));

        $salary_structure_details = $this->EmployeesModel->get_master_salary_structure_formula($_POST['salary_structure_val']);
        
        //echo "<pre>"; print_r($salary_structure_details); die;

        if(!empty($salary_structure_details)){
            foreach ($salary_structure_details as $details) {
                $kayy = array_search($details->id,$id_arr);
               // echo $kayy; die;
                if($details->amount == '0.00'){ 
                    $details->fixed_amount = $val_arr[$kayy];
                }

            }
        }




       

        
        
       //echo '<pre>';print_r($data_save);exit;
        if($mode == 'Add'){
          $data_save = array(
            'employee_id' => $_POST['id'],
            'ctc_amount'=>$_POST['ctcVal'],
            'salary_structure_id'=>$_POST['salary_structure_val'],
            'salary_structure_details'=>json_encode($salary_structure_details),
            'create_date'=>date("Y-m-d H:i:s"),
            'salary_structure_breakup'=>json_encode(@$_POST['salary_structure_breakup']),
            'application_date'=>date('Y-m-d',strtotime($_POST['application_date'])),
            'note'=>$_POST['note'],
            
             'state'=>$_POST['ptax_state'],
             'not_part_ctc_component_id'=>!empty($_POST['not_part_ctc_component_id'])?$_POST['not_part_ctc_component_id']:'',

        );
      // echo '<pre>'; print_r($data_save); die;
        if($_POST['pfcheck'] == '1'){
            $data_save['pf']=$_POST['pfcheck'];
            $data_save['employeemothlypf']=$_POST['employeemothlypf'];
            $data_save['employeeyearlypf']=$_POST['employeeyearlypf'];
            $data_save['pf_based_on']=$_POST['pf_based_on'];

             $data_save['employermothlypf']=$_POST['employermothlypf'];
            $data_save['employeryearlypf']=$_POST['employeryearlypf'];
            }
        if($_POST['esicheck'] == '1'){
            $data_save['esi']=$_POST['esicheck'];
            $data_save['employeemothlyesi']=$_POST['employeemothlyesi'];
            $data_save['employeeyearlyesi']=$_POST['employeeyearlyesi'];
            $data_save['esi_per_employee']=$_POST['esi_per_employee'];

            $data_save['employermothlyesi']=$_POST['employermothlyesi'];
            $data_save['employeryearlyesi']=$_POST['employeryearlyesi'];
            $data_save['esi_per_employer']=$_POST['esi_per_employer'];
            }  
         if($_POST['ptaxcheck'] == '1'){
            $data_save['ptax']=$_POST['ptaxcheck'];
            $data_save['mothlyptax']=$_POST['mothlyptax'];
            $data_save['yearlyptax']=$_POST['yearlyptax'];
            }    
            
           // echo '<pre>'; print_r($data_save); die;
           $this->db->insert(tablename('employee_salary'), $data_save);
           $insertid = $this->db->insert_id();
           if (!empty($salary_structure_details)) {
                foreach ($salary_structure_details as $key => $value) {
                    $data1 = array(
                      'employee_salary_id' => $insertid,
                        'master_salary_structure_id' => $value->master_salary_structure_id,
                        'component_id' => $value->component_id,
                        'operator' => $value->operator,
                        'base_on' =>  $value->base_on,
                        'salary_type' => $value->salary_type,
                        'amount' => $value->amount,
                        'fixed_amount' => $value->fixed_amount,
                    );
                    $this->db->insert(tablename('employee_salary_details'), $data1);
                }
            }
        }else{
          if(!empty($edit_id)){
            $data_update = array(
            'employee_id' => $_POST['id'],
            'ctc_amount'=>$_POST['ctcVal'],
            'salary_structure_id'=>$_POST['salary_structure_val'],
            'salary_structure_details'=>json_encode($salary_structure_details),
            'create_date'=>date("Y-m-d H:i:s"),
            'salary_structure_breakup'=>json_encode(@$_POST['salary_structure_breakup']),
            'application_date'=>date('Y-m-d',strtotime($_POST['application_date'])),
            'note'=>$_POST['note'],
            'pf_based_on'=>$_POST['pf_based_on'],
             'state'=>$_POST['ptax_state'],
             'not_part_ctc_component_id'=>$_POST['not_part_ctc_component_id']

        );
       
        if($_POST['pfcheck'] == '1'){
            $data_update['pf']=$_POST['pfcheck'];
            $data_update['employeemothlypf']=$_POST['employeemothlypf'];
            $data_update['employeeyearlypf']=$_POST['employeeyearlypf'];

             $data_update['employermothlypf']=$_POST['employermothlypf'];
            $data_update['employeryearlypf']=$_POST['employeryearlypf'];
            }
        if($_POST['esicheck'] == '1'){
            $data_update['esi']=$_POST['esicheck'];
            $data_update['employeemothlyesi']=$_POST['employeemothlyesi'];
            $data_update['employeeyearlyesi']=$_POST['employeeyearlyesi'];
            $data_update['esi_per_employee']=$_POST['esi_per_employee'];

            $data_update['employermothlyesi']=$_POST['employermothlyesi'];
            $data_update['employeryearlyesi']=$_POST['employeryearlyesi'];
            $data_update['esi_per_employer']=$_POST['esi_per_employer'];
            }  
         if($_POST['ptaxcheck'] == '1'){
            $data_update['ptax']=$_POST['ptaxcheck'];
            $data_update['mothlyptax']=$_POST['mothlyptax'];
            $data_update['yearlyptax']=$_POST['yearlyptax'];
            }  
            //echo '<pre>';print_r($data_update);exit;
           $this->db->where('id', $edit_id)->update(tablename('employee_salary'), $data_update); 
           $this->db->delete('HR_employee_salary_details', array('employee_salary_id' => $edit_id)); 

            if (!empty($salary_structure_details)) {
                foreach ($salary_structure_details as $key => $value) {
                    $data1 = array(
                      'employee_salary_id' => $edit_id,
                        'master_salary_structure_id' => $value->master_salary_structure_id,
                        'component_id' => $value->component_id,
                        'operator' => $value->operator,
                        'base_on' =>  $value->base_on,
                        'salary_type' => $value->salary_type,
                        'amount' => $value->amount,
                        'fixed_amount' => $value->fixed_amount,
                    );
                    $this->db->insert(tablename('employee_salary_details'), $data1);
                }
            }
         }
        }
        //$this->db->where('id', $_POST['id'])->update(tablename('employee_salary'), $data_save);
       
        echo 'done';
        exit();
    }


     public function get_subordinate() {
        //echo "<pre>"; print_r($_POST); die;

        $all_subordinate = $this->EmployeesModel->get_all_emp_except_current_emp_and_manger($_POST['id'],$_POST['mid']);
        
       $html = '<label for="" class="form-control-label">Subordinate</label><select id="subordinate" name="subordinate[]" class="form-control js-example-basic-multiple" multiple><option>Select</option>';

        if (!empty($all_subordinate)) {
            foreach ($all_subordinate as $subordinate) {
                $html .= '<option value="' . $subordinate->id . '" >' . $subordinate->first_name.' '.$subordinate->middle_name.' '.$subordinate->last_name . '</option>';
            }
        }
        $html .= '</select>';

        echo $html;
        die;
    }

    /**
     * add/edit save for this  closure .
     *
     * @access  public
     * @param   id
     * @return  string
     */

    public function form_closure($id = NULL){
         $flg = $this->EmployeesModel->modify_closure($id);
    }
    public function form_evaluation($id){
        $flg = $this->EmployeesModel->modify_evaluation($id);
    }
     public function edit_warning_evaluation(){
        $id=$_POST['id'] ;
        $flg = $this->EmployeesModel->getWarningEvaluation($id);

        echo json_encode($flg);

    }
    public function delete_evaluation($id) {
       
        $this->EmployeesModel->delete_warning_evaluation($id);
    }
    
     public function loan_payment_details($id = NULL) {


        $data = $this->data['loan_payment_details'] = $this->EmployeesModel->load_loan_payment_details($id);
        //$view = $this->load->view('employees_details/admin/ajax_expenses',$this->data, TRUE);

       $view = $this->load->view('employees_details/admin/ajax_loan_payment_details', $this->data, TRUE);
       
       echo $view;exit;
        // }        
    }

    public function check_employee_no() {
        $employee_no = $_POST['employee_no'];  
        $id = $_POST['id'];


        if(empty($id)){
            $check_employee_no = $this->EmployeesModel->get_row_data('employee',array('employee_no'=>$employee_no,'delete_flag'=>'N'));
        }else{
            $check_employee_no = $this->EmployeesModel->check_employee_no($employee_no,$id);
        }


        if(!empty($check_employee_no)){
            echo 'This Employee No is already inserted.';
        }else{
            echo 'done';
        }

        exit();         
    }

    public function check_rf_no() {
        $rf_no = $_POST['rf_no'];  
        $id = $_POST['id'];


        if(empty($id)){
            $check_rf_no = $this->EmployeesModel->get_row_data('employee',array('rf_no'=>$rf_no,'delete_flag'=>'N'));
        }else{
            $check_rf_no = $this->EmployeesModel->check_rf_no($rf_no,$id);
        }


        if(!empty($check_rf_no)){
            echo 'This RF No is already exist.';
        }else{
            echo 'done';
        }

        exit();         
    }

     public function div_colon() {
       // $value=$_POST['value'];
      
        //echo '<pre>'; print_r($_POST); exit;
        $id = $_POST['leavetype'];  
        $div='';
        $all_leaves = $this->EmployeesModel->get_result_data('master_leave_rules', array('delete_flag' => 'N', 'is_active' => 'Y'));

        $div.='<tr id="exp_'.$id.'">
        <td><div class="form-group">
        <select name="leavetype[]" id="leavetype"  class="form-control sel">
        <option value="">Please select</option>';
        
        if(!empty($all_leaves))
        {
        foreach ($all_leaves as $value) {

        $div.= '<option value="'.$value->id.'">'.$value->rule_name.'</option>';
      
        }
        }
        
        $div.= '</select>
        </div>
        </td>
        <td><div class="form-group"> <input type="text" placeholder="Enter opening balance" class="form-control" value="" name="opening_balance[]" id="opening_balance"></div></td>
        <td></td>
        </tr>';
        echo $div; exit();         
    }


    public function add_work_experience() {
    //echo '<pre>'; print_r($_FILES); die;
	  
		
		
        $data['company'] = $_POST['Company'];  
        $data['job_title'] = $_POST['job_title'];
        $data['from_date'] = date('Y-m-d',strtotime($_POST['from_date']));  
        $data['to_date'] = date('Y-m-d',strtotime($_POST['to_date']));
        $cv = $_FILES['cv'];  
		
		$this->db->select('t1.*'); 
        $this->db->from(tablename('employee_experience_temp') . ' as t1');
        $this->db->where('t1.company', $_POST['Company']);
        $this->db->or_where('DATE(from_date) >=', date('Y-m-d',strtotime($_POST['from_date'])));
        $this->db->where('DATE(to_date) <=', date('Y-m-d',strtotime($_POST['to_date'])));
        $query = $this->db->get();
        $result1 = $query->row();
		//echo $this->db->last_query(); die;
		//print_r($result); die;
        //print_r($cv); die;
		//$div='';
		if(empty($result1)){
			$div='';
        if (!empty($cv)) {
                $cv_image = $this->EmployeesModel->upload_files($cv);
                $data['cv'] = $cv_image;
            }
        $this->db->insert(tablename('employee_experience_temp'), $data); 
        $SysConfigauthenticaton = checkConfig1();
        $all_experience = $this->EmployeesModel->get_result_data('employee_experience_temp', array());
       
                        foreach ($all_experience as $value) {
							if($value->cv != ''){
								$div.='<tr>
                            <td>'.$value->company.'</td>
                            <td>'.$value->job_title.'</td>
                            <td>'.date($SysConfigauthenticaton->date_format,strtotime($value->from_date)).'</td>
                            <td>'.date($SysConfigauthenticaton->date_format,strtotime($value->to_date)).'</td>
                            <td><a href="'.base_url().'uploads/'.$value->cv.'" target="_blank" tabindex="-1"><span class="ks-icon la la-la la-paperclip"></span></a></td>
							<td><a onclick="delete_exp('.$value->id.');">Remove</a></td>
						
							
                        </tr>';
							}else{
								$div.='<tr>
                            <td>'.$value->company.'</td>
                            <td>'.$value->job_title.'</td>
                            <td>'.date($SysConfigauthenticaton->date_format,strtotime($value->from_date)).'</td>
                            <td>'.date($SysConfigauthenticaton->date_format,strtotime($value->to_date)).'</td>
                            <td></td>
							<td><a onclick="delete_exp('.$value->id.');">Remove</a></td>
							
                        </tr>';
							}
                        

                    }
		}else{
			$div = 'exist';
		}
                    
        echo $div; exit();            
    }
	
	public function delete_experience(){
		$id = $_POST['id'];  
		$this->db->select('t1.*'); 
        $this->db->from(tablename('employee_experience_temp') . ' as t1');
        $this->db->where('t1.id', $id);
        $query = $this->db->get();
        $result = $query->row();
		if(!empty($result)){
			$this->db->delete('employee_experience_temp', array('id' => $id));
		}
		$div = '';
		$all_experience = $this->EmployeesModel->get_result_data('employee_experience_temp', array());
        $SysConfigauthenticaton = checkConfig1();
                        foreach ($all_experience as $value) {
							if($value->cv != ''){
								$div.='<tr>
                            <td>'.$value->company.'</td>
                            <td>'.$value->job_title.'</td>
                            <td>'.date($SysConfigauthenticaton->date_format,strtotime($value->from_date)).'</td>
                            <td>'.date($SysConfigauthenticaton->date_format,strtotime($value->to_date)).'</td>
                            <td><a href="'.base_url().'uploads/'.$value->cv.'" target="_blank" tabindex="-1"><span class="ks-icon la la-la la-paperclip"></span></a></td>
							<td><a onclick="delete_exp('.$value->id.');">Remove</a></td>
							
                        </tr>';
							}else{
								$div.='<tr>
                            <td>'.$value->company.'</td>
                            <td>'.$value->job_title.'</td>
                            <td>'.date($SysConfigauthenticaton->date_format,strtotime($value->from_date)).'</td>
                            <td>'.date($SysConfigauthenticaton->date_format,strtotime($value->to_date)).'</td>
                            <td></td>
							<td><a onclick="delete_exp('.$value->id.');">Remove</a></td>
							
                        </tr>';
							}
                        

                    }
					 echo $div; exit();  
	}

    public function add_education() {
      //echo '<pre>'; print_r($_FILES); die;
        $data['level'] = $_POST['Level'];  
        $data['institute'] = $_POST['Institute'];
        $data['year'] = $_POST['year'];  
        $data['marks'] = $_POST['marks'];
        $cv = $_FILES['document'];  
		
		$this->db->select('t1.*'); 
        $this->db->from(tablename('employee_education_temp') . ' as t1');
        $this->db->where('t1.level', $_POST['Level']);
        $this->db->or_where('t1.year', $_POST['year']);
        $query = $this->db->get();
        $result1 = $query->row();
if(empty($result1)){
        if (!empty($cv)) {
                $cv_image = $this->EmployeesModel->upload_files($cv);
                $data['cv'] = $cv_image;
            }
        $this->db->insert(tablename('employee_education_temp'), $data); 
        $div='';
        $all_education = $this->EmployeesModel->get_result_data('employee_education_temp', array());
       
                        foreach ($all_education as $value) {
							if($value->cv != ''){
								 $div.='<tr>
                            <td>'.$value->level.'</td>
                            <td>'.$value->institute.'</td>
                            <td>'.$value->year.'</td>
                            <td>'.$value->marks.'</td>
                            <td><a href="'.base_url().'uploads/'.$value->cv.'" target="_blank" tabindex="-1"><span class="ks-icon la la-la la-paperclip"></span></a></td>
							<td><a onclick="delete_edu('.$value->id.');">Remove</a></td>
                        </tr>';
							}else{
								 $div.='<tr>
                            <td>'.$value->level.'</td>
                            <td>'.$value->institute.'</td>
                            <td>'.$value->year.'</td>
                            <td>'.$value->marks.'</td>
                            <td></td>
							<td><a onclick="delete_edu('.$value->id.');">Remove</a></td>
                        </tr>';
							}
                       
                    }
}else{
	$div = 'exist';
}
                    
        echo $div; exit();            
    }
	
	public function delete_education(){
		$id = $_POST['id'];  
		$this->db->select('t1.*'); 
        $this->db->from(tablename('employee_education_temp') . ' as t1');
        $this->db->where('t1.id', $id);
        $query = $this->db->get();
        $result = $query->row();
		if(!empty($result)){
			$this->db->delete('employee_education_temp', array('id' => $id));
		}
		$div = '';
		$div='';
        $all_education = $this->EmployeesModel->get_result_data('employee_education_temp', array());
       
                        foreach ($all_education as $value) {
							if($value->cv != ''){
								 $div.='<tr>
                            <td>'.$value->level.'</td>
                            <td>'.$value->institute.'</td>
                            <td>'.$value->year.'</td>
                            <td>'.$value->marks.'</td>
                            <td><a href="'.base_url().'uploads/'.$value->cv.'" target="_blank" tabindex="-1"><span class="ks-icon la la-la la-paperclip"></span></a></td>
							<td><a onclick="delete_edu('.$value->id.');">Remove</a></td>
                        </tr>';
							}else{
								 $div.='<tr>
                            <td>'.$value->level.'</td>
                            <td>'.$value->institute.'</td>
                            <td>'.$value->year.'</td>
                            <td>'.$value->marks.'</td>
                            <td></td>
							<td><a onclick="delete_edu('.$value->id.');">Remove</a></td>
                        </tr>';
							}
                       
                    }
					 echo $div; exit();  
	}
	
	   public function template_choose() {
		   //echo '<pre>'; print_r($_POST); die;
        $this->data = array();
        $id = $_POST['id'];
		$this->data['all_templates'] = $this->EmployeesModel->get_result_data('templates',array('is_active'=>'Y','delete_flag'=>'N'));
		$this->data['emp_id'] = $id;
		//echo '<pre>'; print_r($this->data['all_templates']);  die;
        $view = $this->load->view('employees_details/admin/templates_choose',$this->data, TRUE);
        echo $view; exit();         
    }
	
	public function template_genarate() {
		// echo '<pre>'; print_r($_POST); die;
        $this->data = array();
        $templates_id = $_POST['templates_id'];
		 $emp_id = $_POST['emp_id'];
		// echo $emp_id; die;
		 $this->data['employee'] = $this->EmployeesModel->get_row_data('employee',array('id'=>$emp_id,'is_active'=>'Y','delete_flag'=>'N',));
		 //$this->data['employee'] = $this->EmployeesModel->load_employee_details($emp_id);
		 $this->data['organization_details'] = checkOrganization1();
		 $this->data['templates_id'] = $templates_id;
		$this->data['templates_view'] = $this->EmployeesModel->get_row_data('templates',array('id'=>$templates_id,'is_active'=>'Y','delete_flag'=>'N'));
		//echo '<pre>'; print_r($this->data['employee']);  die;
        $view = $this->load->view('employees_details/admin/templates_view',$this->data, TRUE);
        echo $view; exit();         
    }
	
	 public function down_slip($templates_id,$emp_id) {
 // echo $templates_id; echo $emp_id; die;
        $data['css']='<link rel="stylesheet" type="text/css" href="'.base_url().'assets/css/dompdf.css">';
        
		
		 $this->data['employee'] = $this->EmployeesModel->get_row_data('employee',array('id'=>$emp_id,'is_active'=>'Y','delete_flag'=>'N',));
		
		 $this->data['organization_details'] = checkOrganization1();
		 $this->data['templates_view'] = $this->EmployeesModel->get_row_data('templates',array('id'=>$templates_id,'is_active'=>'Y','delete_flag'=>'N'));
		//echo '<pre>'; print_r($this->data['templates_view']); die;
        $view = $this->load->view('employees_details/admin/templates_view',$this->data, TRUE);
		//echo $view  ; die;
         require 'vendor/autoload.php';
        // reference the Dompdf namespace
       $html =$view;


       

        // instantiate and use the dompdf class
        $options = new Options();
        $options->set('isRemoteEnabled', TRUE);
        $dompdf = new Dompdf($options);
       // $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('templates.pdf');
     }
	 
	 
	  public function send_email($templates_id,$emp_id) {
			//echo $templates_id; echo $emp_id; die;
        $data['css']='<link rel="stylesheet" type="text/css" href="'.base_url().'assets/css/dompdf.css">';
        
		
		 $this->data['employee'] = $this->EmployeesModel->get_row_data('employee',array('id'=>$emp_id,'is_active'=>'Y','delete_flag'=>'N',));
		
		 $this->data['organization_details'] = checkOrganization1();
		 $this->data['templates_view'] = $this->EmployeesModel->get_row_data('templates',array('id'=>$templates_id,'is_active'=>'Y','delete_flag'=>'N'));
		//echo '<pre>'; print_r($this->data['templates_view']); die;
        $view = $this->load->view('employees_details/admin/templates_view',$this->data, TRUE);
		//echo $view  ; die;
         require 'vendor/autoload.php';
        // reference the Dompdf namespace
       $html =$view;


       

        // instantiate and use the dompdf class
        $options = new Options();
        $options->set('isRemoteEnabled', TRUE);
        $dompdf = new Dompdf($options);
       // $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();
        $output = $dompdf->output();
		//echo $output; die;
        // Output the generated PDF to Browser
        //$dompdf->stream('templates.pdf');
		$this->load->library('email');
		//$this->email->initialize();

		$filename = $this->data['templates_view']->template_name. date("is");
		$email_from = 'sanchari.d@sketchwebsolutions.com';
		//$email_to = 'sanchari.d@sketchwebsolutions.com';
		$email_to = $this->data['employee']->contact_email;
		$form_name = $this->data['templates_view']->template_name;
		$email_subject = $this->data['templates_view']->email_subject;
		
		file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/P1164_SketchPayRoll/assets/img/' . $filename . '.pdf', $output);
		//print_r($_SERVER['DOCUMENT_ROOT'] . '/assets/img/' . $filename . '.pdf', $output); die;
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= "From: $email_from \r\n";
		$headers .= "Reply-To: $email_from \r\n";
		$this->email->from($email_from);
		$this->email->set_mailtype("html");
		$this->email->to($email_to);
		$this->email->subject($email_subject);
		$this->email->message('');
		$this->email->attach($_SERVER['DOCUMENT_ROOT'] . '/P1164_SketchPayRoll/assets/img/' . $filename . '.pdf', $output);
		$this->email->send();
		$this->email->clear(TRUE);
		echo 'success'; exit();
		
     }
	 
	 
	public function upload_crop_image() {
	//upload.php

	if(isset($_POST["image"]))
	{
	$data = $_POST["image"];
	//echo $data; die;
	$image_array_1 = explode(";", $data);
	$image_array_2 = explode(",", $image_array_1[1]);
	$data = base64_decode($image_array_2[1]);
	//echo $data; die;
	$imageName = time() . '.png';
	//file_put_contents($imageName, $data);
	$path = 'uploads/'.$imageName;
	file_put_contents($path, $data);
	
	echo '<img id="blah" class="ks-avatar" src="'.base_url().'uploads/'.$imageName.'" class="img-thumbnail"  width="100" height="100"/> <input type="hidden" name="imagenew" id="imagenew" value="'.$imageName.'">';
	
	}


	}
	
	
	public function upload_voter_crop_image() {
	//upload.php

	if(isset($_POST["image"]))
	{
	$data = $_POST["image"];
	$image_array_1 = explode(";", $data);
	$image_array_2 = explode(",", $image_array_1[1]);
	$data = base64_decode($image_array_2[1]);
	//echo $data; die;
	$imageName = time() . '.png';
	//file_put_contents($imageName, $data);
	$path = 'uploads/'.$imageName;
	file_put_contents($path, $data);
	
	echo '<a href="'.base_url().'uploads/'.$imageName.'" download><img id="blah1" class="ks-avatar" src="'.base_url().'uploads/'.$imageName.'" class="img-thumbnail"  width="100" height="100"/></a> <input type="hidden" name="voter_image" id="voter_image" value="'.$imageName.'">';
	
	}


	}
	
	public function upload_pan_crop_image() {
	//upload.php

	if(isset($_POST["image"]))
	{
	$data = $_POST["image"];
	$image_array_1 = explode(";", $data);
	$image_array_2 = explode(",", $image_array_1[1]);
	$data = base64_decode($image_array_2[1]);
	//echo $data; die;
	$imageName = time() . '.png';
	//file_put_contents($imageName, $data);
	$path = 'uploads/'.$imageName;
	file_put_contents($path, $data);
	
	echo '<a href="'.base_url().'uploads/'.$imageName.'" download><img id="blah2" class="ks-avatar" src="'.base_url().'uploads/'.$imageName.'" class="img-thumbnail"  width="100" height="100"/></a> <input type="hidden" name="pan_image" id="pan_image" value="'.$imageName.'">';
	
	}


	}
	
	public function upload_aadhar_crop_image() {
	//upload.php

	if(isset($_POST["image"]))
	{
	$data = $_POST["image"];
	$image_array_1 = explode(";", $data);
	$image_array_2 = explode(",", $image_array_1[1]);
	$data = base64_decode($image_array_2[1]);
	//echo $data; die;
	$imageName = time() . '.png';
	//file_put_contents($imageName, $data);
	$path = 'uploads/'.$imageName;
	file_put_contents($path, $data);
	
	echo '<a href="'.base_url().'uploads/'.$imageName.'" download><img id="blah3" class="ks-avatar" src="'.base_url().'uploads/'.$imageName.'" class="img-thumbnail"  width="100" height="100"/></a> <input type="hidden" name="aadhar_image" id="aadhar_image" value="'.$imageName.'">';
	
	}


	}
	
	  public function upload_excel() {
        $this->data = array();
        $id = '';
        $view = $this->load->view('employees_details/admin/uploadexcel',$this->data, TRUE);
        echo $view; exit();         
    }
	
	function uploadData()
    {
        $flg = $this->EmployeesModel->uploadData();
        //redirect('employees_details');
    }
	 
	 
	
	
}





/* End of file admin.php */
/* Location: ./application/modules/employees/controllers/admin.php */
