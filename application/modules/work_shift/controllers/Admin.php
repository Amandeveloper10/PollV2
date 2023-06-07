<?php

/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class for work_shift [HMVC]. Handles all the datatypes and methodes required
 * for work_shift section of future
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
        $this->load->model('admin/WorkShiftModel');
    }

    /**
     * Index Page for this work_shift controller.
     *
     * @access  public
     * @param   $id = is used to check index is load after add/edit or directly
     * @return  string
     */
    public function index($id=NULL) {
        $all_data = $this->WorkShiftModel->load_all_data();
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
       // echo "<pre>"; print_r($all_data); //die;
        if($id){
            $this->load->view('work_shift/admin/list',$this->data);
        }else{
            $this->middle = 'work_shift/admin/list';
        $this->layout();
        }
    }

    /**
     * add/edit save for this work_shift controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */

     public function form($id = NULL) {        
        if (isset($_POST['submit'])) {
        //echo "<pre>"; print_r($_POST); die;           
        $flg = $this->WorkShiftModel->modify($id);            
        }        
    }


    /**
     * edit Page load for this work_shift controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */
    public function get_form() {
        $this->data = array();
       // echo "<pre>"; print_r($_POST); die;
        $id = $_POST['id'];  
        $weekname = array();
        $weekvalue = array();
        if (!empty($id)) {
            $this->data['data_single'] = $this->WorkShiftModel->load_single_data($id);
             $offday = $this->WorkShiftModel->get_result_data('master_work_shift_off_day',array('work_shift_id'=>$id));
            // echo '<pre>'; print_r($offday); die;
            if(!empty($offday)){
                foreach ($offday as $value) {
                   $vaal =  $value->weekvalue.'@'.$value->weekname.'@'.$value->week_no;
                    array_push($weekname, $vaal);
                    //array_push($weekvalue, $value->weekvalue);
                }
                //$val = implode(',', $weekname); 
                //echo  $val; die;
                $this->data['offdays'] = $weekname;
                //$this->data['weekvalue'] = $weekvalue;
            }

            $this->data['id'] = $id;  
        }  
        //echo "<pre>"; print_r($this->data['data_single']); //die;
        $view = $this->load->view('work_shift/admin/form',$this->data, TRUE);
        echo $view; exit();         
    }


    /**
     * status work_shift controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function status($id) {
        $this->WorkShiftModel->status_change($id);
    }


    /**
     * delete membership controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function delete($id) {
        $this->WorkShiftModel->delete_this($id);
    }
}
/* End of file admin.php */
/* Location: ./application/modules/work_shift/controllers/admin.php */
