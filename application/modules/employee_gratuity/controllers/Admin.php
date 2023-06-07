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
        $this->load->model('admin/DesiModel');
    }

    /**
     * Index Page for this designation controller.
     *
     * @access  public
     * @param   $id = is used to check index is load after add/edit or directly
     * @return  string
     */
    public function index($id = NULL) {
        $all_data = $this->DesiModel->load_all_data();
        $all_employee = $this->DesiModel->load_all_employee();
        $today = date('Y-m-d');
        $today_year = date('Y', strtotime($today));
        $gratuity_amount = 0;
       
        $main_data = array();
        if (!empty($all_employee)) {
            foreach ($all_employee as $key => $value) {
               // $joining_year = date('Y', strtotime('2020-07-23'));
                 $joining_year = date('Y', strtotime($value->hire_date));
                //$salary_structure = json_decode($value->salary_structure_details);
				$all_salary = $this->DesiModel->load_all_employee_salary($value->id);
				//echo $all_salary->id; die;
				if(!empty($all_salary)){
					$salary_structure = $this->DesiModel->load_all_employee_salary_details($all_salary->id);
				}
				
               // echo '<pre>'; print_r($salary_structure);// die;
                if ($today_year > $joining_year) {
                    $working_year = $today_year - $joining_year;
//                echo $working_year;die();
                    $day = 0;
                    $base_on = '';
                    if (!empty($all_data)) {
                        foreach ($all_data as $key => $formula) {

                            if ($working_year == $formula->no_of_year) {

                                $day = $formula->day;
                                $base_on = $formula->based_on;
                                
                            }
                        }
                    }
                    
                    $key_value = $base_on;
                     $amount = 0;
					  $net_amt =  $basic_amt = 0;
					 if(!empty($salary_structure) && !empty($all_salary)){
						//echo '<pre>'; print_r($salary_structure);
						 foreach($salary_structure as $component_Earning){
							 $amt  = 0;

                                                   if($component_Earning->amount != '0.00'){
                                                         
                                                    $amount_per = (float) (!empty($component_Earning->amount)) ? ($component_Earning->amount/100) : 0;
                                                    if($component_Earning->base_on == 'CTC'){
                                                        if($component_Earning->operator == '*'){
                                                            $amt = (float) $all_salary->ctc_amount/12 * $amount_per;
                                                           
                                                        }
                                                    }else if($component_Earning->base_on == 'Basic Salary'){
                                                        if($component_Earning->operator == '*'){
                                                            $amt = (float) $basic_amt * $amount_per;
                                                            
                                                        }
													}
                                                }else{
                                                    $amt = $component_Earning->fixed_amount/12;
                                                    

                                                }

                                                if($component_Earning->component_id == '3'){
                                                        $basic_amt = $amt;
                                                        
                                                    }
													$net_amt += $amt;
						 }
						 
					 }
					 
					 //echo $net_amt; echo '<pre>'; 
                   /* if(!empty($salary_structure))
                    {
                       
                       $amount = (($value->ctc_amount / 12) / 30); 
                       
                   /* foreach ($salary_structure as $structure) {

                        if ($structure->base_on == $key_value) {


                            if ($structure->amount > 0) {
                                $amount = (($structure->amount / 12) / 30);
                                //echo $amount;exit;
                            } else {
                                $amount = (($structure->fixed_amount / 12) / 30);
                            }
                        }
                       // break;
                    }*/
                //}*/
                    //$gratuity_amount = $amount * $day;
					$gratuity_amount = $net_amt * $working_year * (15/26);

$main_data['employee_name'][] = $value->first_name . ' ' . $value->middle_name . ' ' . $value->last_name . ' ( ' . $value->employee_no . ' )';
$main_data['amount'][] =$gratuity_amount;
$main_data['working_year'][] =$working_year;
$main_data['joining'][] =$joining_year;

                }
            }
            //echo '<pre>';print_r($main_data);exit;
        }

        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $main_data;
        // echo "<pre>"; print_r($all_data); //die;
        if ($id) {
            $this->load->view('employee_gratuity/admin/list', $this->data);
        } else {
            $this->middle = 'employee_gratuity/admin/list';
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
            $flg = $this->DesiModel->modify($id);
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
            $this->data['data_single'] = $this->DesiModel->load_single_data($id);
            $this->data['id'] = $id;
        }
        //echo "<pre>"; print_r($this->data['data_single']); //die;
        $view = $this->load->view('employee_gratuity/admin/form', $this->data, TRUE);
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
        $this->DesiModel->status_change($id);
    }

    /**
     * delete membership controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */
    public function delete($id) {
        $this->DesiModel->delete_this($id);
    }

}

/* End of file admin.php */
/* Location: ./application/modules/designation/controllers/admin.php */
