<?php

/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class for increement [HMVC]. Handles all the datatypes and methodes required
 * for increement section of future
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
        $this->load->model('admin/increementModel');
    }

    /**
     * Index Page for this increement controller.
     *
     * @access  public
     * @param   $id = is used to check index is load after add/edit or directly
     * @return  string
     */
    public function index($id=NULL) {
        $all_data = $this->increementModel->load_all_data();
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        
        $this->data['all_data'] = $all_data;
        //echo "<pre>"; print_r($all_data); die;
        if($id){
            $this->load->view('increement/admin/list',$this->data);
        }else{
            $this->middle = 'increement/admin/list';
        $this->layout();
        }
    }
    
    
    

    /**
     * add/edit save for this increement controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */

     public function form($id = NULL) {        
        if (isset($_POST['submit'])) {
        //echo "<pre>"; print_r($_POST); die;           
        $flg = $this->increementModel->modify($id);            
        }        
    }


    /**
     * edit Page load for this increement controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */
    public function get_form() {
       //  $this->data = array();
        
        if(isset($_POST['id'])){

            $id = $_POST['id'];

            $this->data['increement_details']=$this->increementModel->increement_details($id);

            $this->data['load_all_employee'] = $this->increementModel->load_all_employee();
                    
            $this->data['load_all_component'] = $this->increementModel->load_all_component();
            
            //echo "<pre>"; print_r($_POST['id']); die;
            if($this->data['increement_details']){
                 $fixed=$this->data['increement_details'][0]->type;
                if($fixed=='Percentage'){
                   $this->data['percentage']=true; 
               }
            }
           
            

         

        }else{

            $this->data['load_all_employee'] = $this->increementModel->load_all_employee();
                    
            $this->data['load_all_component'] = $this->increementModel->load_all_component();

        }
        

        // //echo "<pre>"; print_r($this->data['data_single']); //die;
        // $this->data['all_employee'] = $this->increementModel->get_result_data('employee',array('delete_flag'=>'N','is_active'=>'Y'));
        $view = $this->load->view('increement/admin/form',$this->data, TRUE);
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
        $this->increementModel->delete_this($id);
    }
    
     public function vehicle_maintenance($id=NULL) {
         //echo 'hello';exit;
        $all_data = $this->increementModel->load_all_data_vehicle();
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
       // echo "<pre>"; print_r($all_data); //die;
        if($id){
            $this->load->view('increement/admin/vehicle_maintenance_list',$this->data);
        }else{
            $this->middle = 'increement/admin/vehicle_maintenance_list';
        $this->layout();
        }
    }
    
     public function vehicle_maintenance_form() {
        $this->data = array();
       // echo "<pre>"; print_r($_POST); die;
        $id = @$_POST['id'];  

        if (!empty($id)) {
            $this->data['data_single'] = $this->increementModel->load_single_vehicle_maintenance($id);
            $this->data['id'] = $id;  
        }  
        //echo "<pre>"; print_r($this->data['data_single']); //die;
        $this->data['all_increement'] = $this->increementModel->get_result_data('increement',array('delete_flag'=>'N','is_active'=>'Y'));
        $view = $this->load->view('increement/admin/vehicle_maintenance_form',$this->data, TRUE);
        echo $view; exit();         
    }
     public function vehicle_maintenance_add($id = NULL) {        
        if (isset($_POST['submit'])) {
        //echo "<pre>"; print_r($_POST); die;           
        $flg = $this->increementModel->modify_maintenance($id);            
        }
       
    }
 public function maintenance_delete($id) {
        $this->increementModel->maintenance_delete($id);
    }
    
       public function vehicle_asignment($id=NULL) {
         //echo 'hello';exit;
        $all_data = $this->increementModel->load_all_data_vehicle_asignment();
        
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
       
        $this->data['all_data'] = $all_data;
      //  echo "<pre>"; print_r($this->data['all_employee']); die;
        if($id){
            $this->load->view('increement/admin/vehicle_asignment_list',$this->data);
        }else{
            $this->middle = 'increement/admin/vehicle_asignment_list';
        $this->layout();
        }
    }
    
     public function vehicle_asignment_form() {
        $this->data = array();
       // echo "<pre>"; print_r($_POST); die;
        $id = @$_POST['id'];  
 $this->data['all_employee'] = $this->increementModel->load_all_employee();
        if (!empty($id)) {
            $this->data['data_single'] = $this->increementModel->load_single_vehicle_asignment($id);
            $this->data['id'] = $id;  
        }  
        //echo "<pre>"; print_r($this->data['data_single']); //die;
        $this->data['all_increement'] = $this->increementModel->get_result_data('increement',array('delete_flag'=>'N','is_active'=>'Y'));
        $view = $this->load->view('increement/admin/vehicle_asignment_form',$this->data, TRUE);
       // $this->middle = 'increement/admin/vehicle_asignment_form';
       // $this->layout();
        echo $view; exit();         
    }
     public function vehicle_asignment_add($id = NULL) {        
        if (isset($_POST['submit'])) {
        //echo "<pre>"; print_r($_POST); die;           
        $flg = $this->increementModel->modify_asignment($id);            
        }
       
    }
    public function asignment_delete($id) {
        $this->increementModel->asignment_delete($id);
    }
   


   public function increement_check_salary_stracture(){
         
         $component_id=$_POST['component_id'];
         $employee_id=$_POST['employee_id'] ;

         $results= $this->increementModel->component_Id_In_employee($component_id,$employee_id);
        echo $results;
   
    } 
}
/* End of file admin.php */
/* Location: ./application/modules/increement/controllers/admin.php */
