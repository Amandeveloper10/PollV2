<?php

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
    public function index($id=NULL) {
        $all_data = $this->EmployeesModel->load_all_data();
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
       // echo "<pre>"; print_r($all_data); //die;
        if($id){
            $this->load->view('employees/admin/list',$this->data);
        }else{
            $this->middle = 'employees/admin/list';
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
        if (isset($_POST['submit'])) {
        //echo "<pre>"; print_r($_POST); die;           
        $flg = $this->EmployeesModel->modify($id);            
        }        
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
        $id = $_POST['id'];  

        if (!empty($id)) {
            $this->data['data_single'] = $this->EmployeesModel->load_single_data($id);
            $this->data['id'] = $id;  
        }  
        $this->data['all_job'] = $this->EmployeesModel->get_result_data('master_req_job_opening',array('delete_flag'=>'N','is_active'=>'Y'));
        
        //echo "<pre>"; print_r($this->data['data_single']); //die;
        
        $view = $this->load->view('employees/admin/form',$this->data, TRUE);
        echo $view; exit();         
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
        $all_candidate = $this->EmployeesModel->get_result_data('master_req_candidates',array('job_opening_no'=>$_POST['job_id'],'delete_flag'=>'N','is_active'=>'Y'));
        //echo "<pre>"; print_r($all_candidate); die;

        $html = '<label>Candidate</label>
            <select class="form-control"  name="candidate_id" id="candidate_id" required>
                <option value="">Select</option>';

        if(!empty($all_candidate)){
            foreach ($all_candidate as $value) {
                $html .= '<option value="'.$value->id.'" >'.$value->candidate_name.'</option>';
            }
        }
        $html .= '</select>';

        echo $html; die;


    }
}
/* End of file admin.php */
/* Location: ./application/modules/employees/controllers/admin.php */
