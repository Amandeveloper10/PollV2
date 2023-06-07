<?php

/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class for gratuity_formula [HMVC]. Handles all the datatypes and methodes required
 * for gratuity_formula section of future
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
        $this->load->model('admin/LopModel');
    }

    /**
     * Index Page for this gratuity_formula controller.
     *
     * @access  public
     * @param   $id = is used to check index is load after add/edit or directly
     * @return  string
     */
    public function index($id=NULL) {
        $all_data = $this->LopModel->load_all_data();
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
       // echo "<pre>"; print_r($all_data); //die;
        if($id){
            $this->load->view('lop/admin/list',$this->data);
        }else{
            $this->middle = 'lop/admin/list';
        $this->layout();
        }
    }

    /**
     * add/edit save for this gratuity_formula controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */

     public function form($id = NULL) {        
        if (isset($_POST['submit'])) {
        //echo "<pre>"; print_r($_POST); die;           
        $flg = $this->LopModel->modify($id);            
        }        
    }


    /**
     * edit Page load for this gratuity_formula controller.
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
            $this->data['data_single'] = $this->LopModel->load_single_data($id);
            $this->data['id'] = $id;  
        } 
        $this->data['all_grade'] = $this->LopModel->get_result_data('master_grade',array('is_active'=>'Y','delete_flag'=>'N'));
        $this->data['all_component'] = $this->LopModel->get_result_data('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N'));
        //echo "<pre>"; print_r($this->data['data_single']); //die;
        $view = $this->load->view('lop/admin/form',$this->data, TRUE);
        echo $view; exit();         
    }


    /**
     * status gratuity_formula controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function status($id) {
        $this->LopModel->status_change($id);
    }


    /**
     * delete membership controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function delete($id) {
        $this->LopModel->delete_this($id);
    }
	
	public function check_lop_grade() {
        $grade_id = $_POST['grade_id'];  
        $id = $_POST['id'];


        if(empty($id)){
            $check_lopgrade = $this->LopModel->get_row_data('master_lop',array('grade_id'=>$grade_id,'delete_flag'=>'N','is_active'=>'Y'));
        }else{
            $check_lopgrade = $this->LopModel->check_lopgrade($grade_id,$id);
        }


        if(!empty($check_lopgrade)){
            echo 'This Grade is already exist.';
        }else{
            echo 'done';
        }

        exit();         
    }

}
/* End of file admin.php */
/* Location: ./application/modules/gratuity_formula/controllers/admin.php */
