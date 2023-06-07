<?php

/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class for salary_component [HMVC]. Handles all the datatypes and methodes required
 * for salary_component section of future
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
        $this->load->model('admin/SalaryCompModel');
    }

    /**
     * Index Page for this salary_component controller.
     *
     * @access  public
     * @param   $id = is used to check index is load after add/edit or directly
     * @return  string
     */
    public function index($id=NULL) {
        $all_data = $this->SalaryCompModel->load_all_data();
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
       // echo "<pre>"; print_r($all_data); //die;
        if($id){
            $this->load->view('salary_component/admin/list',$this->data);
        }else{
            $this->middle = 'salary_component/admin/list';
        $this->layout();
        }
    }

    /**
     * add/edit save for this salary_component controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */

     public function form($id = NULL) {        
        if (isset($_POST['submit'])) {
        //echo "<pre>"; print_r($_POST); die;           
        $flg = $this->SalaryCompModel->modify($id);            
        }        
    }


    /**
     * edit Page load for this salary_component controller.
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
            $this->data['data_single'] = $this->SalaryCompModel->load_single_data($id);
            $this->data['data_single_formula'] = $this->SalaryCompModel->get_row_data('master_salary_component_formula',array('component_id'=>$id));
            $this->data['id'] = $id;  
        }  
        $this->data['all_component'] = $this->SalaryCompModel->get_result_data('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N','mode'=>'Monthly','type'=>'Earning'));
        //echo "<pre>"; print_r($this->data['data_single']); //die;
        $view = $this->load->view('salary_component/admin/form',$this->data, TRUE);
        echo $view; exit();         
    }


    /**
     * status salary_component controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function status($id) {
        $this->SalaryCompModel->status_change($id);
    }


    /**
     * delete membership controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function delete($id) {
        $this->SalaryCompModel->delete_this($id);
    }

    public function get_component_type() {
    $id=   $this->input->post('id');
    
        $this->data['all_component_type'] = $this->SalaryCompModel->get_row_data('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N','type'=>'Earning','mode'=>'Monthly','id'=>$id));
     //echo $this->db->last_query();exit;

       // print_r($this->data['all_component_type']);
        echo $this->data['all_component_type']->type.', '.$this->data['all_component_type']->mode.', '.$this->data['all_component_type']->fixed.','.$this->data['all_component_type']->component.','.$this->data['all_component_type']->pf.','.$this->data['all_component_type']->esi;exit;
        
        
       
    }

      public function div_colon() {
        $id = $_POST['id'];  

        
        $div='';
        $all_component = $this->SalaryCompModel->get_result_data_for_salary();
         $div.= '<tr id="exp_'.$id.'"><td>
                 <select onchange="fortype(this.value)" id="component" name="componentformula[]" class="form-control sel addcomp">
                    <option>Select</option>';
                    
                  if (!empty($all_component)) {
                    foreach ($all_component as $component) {
                        if($component->id!='3')
                        {
                 
              $div.=    '<option value="'.$component->id.'" >'.$component->component.'</option>';
                  } } }
                   
              $div.=  '</select>
            </td>
       
        <td>  <select name="operator[]" id="operator'.$id.'" class="form-control addoperator" onchange="add_component_operator();">
              <option>Select</option>
              <option value="+">+</option>
              <option value="-">-</option>
              <option value="*">*</option>
              <option value="/">/</option>
            </select></td>
        </tr>';
        
        echo $div; exit();         
    }

    public function component_operator() {
        $components = $_POST['components'];  
        $operators = !empty($_POST['operators'])? $_POST['operators'] : ''; 
        $component_operator = '';
        //echo '<pre>'; print_r($_POST); die; 
        foreach ($components as $key => $value) {
            if(!empty($operators)){
                $component_operator .= $value.' '.$operators[$key];
            }else{
               $component_operator .= $value; 
            }
          
        }
        echo $component_operator; exit();         
    }

      public function check_component() {
        $components = $_POST['components'];  
        $id = $_POST['id'];


        if(empty($id)){
            $check_components = $this->SalaryCompModel->get_row_data('master_salary_component',array('component'=>$components,'delete_flag'=>'N','is_active'=>'Y'));
        }else{
            $check_components = $this->SalaryCompModel->check_component($components,$id);
        }


        if(!empty($check_components)){
            echo 'This Component is already exist.';
        }else{
            echo 'done';
        }

        exit();         
    }
}
/* End of file admin.php */
/* Location: ./application/modules/salary_component/controllers/admin.php */
