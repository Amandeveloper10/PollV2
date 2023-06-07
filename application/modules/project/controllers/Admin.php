<?php

/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class for insurance_policies [HMVC]. Handles all the datatypes and methodes required
 * for insurance_policies section of future
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
        $this->load->model('admin/ProjectModel');
    }

    /**
     * Index Page for this insurance_policies controller.
     *
     * @access  public
     * @param   $id = is used to check index is load after add/edit or directly
     * @return  string
     */
    public function index($id=NULL) {
        $all_data = $this->ProjectModel->load_all_data();
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_employee'] = $this->ProjectModel->load_all_employee();
        $this->data['all_data'] = $all_data;
       // echo "<pre>"; print_r($all_data); //die;
        if($id){
            $this->load->view('project/admin/list',$this->data);
        }else{
            $this->middle = 'project/admin/list';
        $this->layout();
        }
    }
    
     public function projects_search_result() {
        $all_data = $this->ProjectModel->load_all_data_search();
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
         $this->load->view('project/admin/list',$this->data);
       // echo "<pre>"; print_r($all_data); //die;
//        if($id){
//            $this->load->view('project/admin/list',$this->data);
//        }else{
//            $this->middle = 'project/admin/list';
//        $this->layout();
//        }
    }

    /**
     * add/edit save for this insurance_policies controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */

     public function form($id = NULL) {        
        if (isset($_POST['submit'])) {
        //echo "<pre>"; print_r($_POST); die;           
        $flg = $this->ProjectModel->modify($id);            
        }        
    }


    /**
     * edit Page load for this insurance_policies controller.
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
            $this->data['data_single'] = $this->ProjectModel->load_single_data($id);
            $this->data['id'] = $id;  
        }  
        //echo "<pre>"; print_r($this->data['data_single']); //die;
        $this->data['all_employee'] = $this->ProjectModel->get_result_data('employee',array('delete_flag'=>'N','is_active'=>'Y'));
        $view = $this->load->view('project/admin/form',$this->data, TRUE);
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
        $this->ProjectModel->delete_this($id);
    }
     public function admin_add_employee_project() {
         $this->ProjectModel->update_employee_assign();
         
        $all_data = $this->ProjectModel->single_project_data($this->input->post('project_id'));
       // echo '<pre>';print_r($all_data);exit;
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['value'] = $all_data;
      echo $this->load->view('project/admin/ajax_list',$this->data,TRUE); exit;
      
    }
    
      public function admin_assigned_employee() {
        
         
        $this->data['assigned_employee']  = $this->ProjectModel->single_project_data($this->input->post('project_id'));
      $this->data['all_employee'] = $this->ProjectModel->load_all_employee();
      echo $this->load->view('project/admin/ajax_employed',$this->data,TRUE); exit;
      
    }
}
/* End of file admin.php */
/* Location: ./application/modules/insurance_policies/controllers/admin.php */
