<?php

/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class for PF [HMVC]. Handles all the datatypes and methodes required
 * for PF section of future
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
        $this->load->model('admin/PFModel');
    }

    /**
     * Index Page for this PF controller.
     *
     * @access  public
     * @param   $id = is used to check index is load after add/edit or directly
     * @return  string
     */
    public function index($id=NULL) {
        $all_data = $this->PFModel->load_all_data();
        $no_of_data= $this->db->SELECT('*')->where('delete_flag','N')->where('is_active','Y')->get('pf_admin')->num_rows();
        //echo "<pre>"; print_r($no_of_data); die;
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['no_of_data'] = $no_of_data;
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
       // echo "<pre>"; print_r($all_data); //die;
        if($id){
            $this->load->view('PF/admin/list',$this->data);
        }else{
            $this->middle = 'PF/admin/list';
        $this->layout();
        }
    }

    /**
     * add/edit save for this PF controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */

     public function form($id = NULL) {        
        if (isset($_POST['submit'])) {
       // echo "<pre>"; print_r($_POST);  echo '1'; die;  

        $flg = $this->PFModel->modify($id);            
        }        
    }


    /**
     * edit Page load for this PF controller.
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
            $this->data['data_single'] = $this->PFModel->load_single_data($id);
            $this->data['id'] = $id;  
            
        }  
        

        //echo "<pre>"; print_r($this->data); die;

        $view = $this->load->view('PF/admin/form',$this->data, TRUE);
        echo $view; exit();         
    }


    /**
     * status PF controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function status($id) {
        $this->PFModel->status_change($id);
    }


    /**
     * delete membership controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function delete($id) {
        $this->PFModel->delete_this($id);
    }
}
/* End of file admin.php */
/* Location: ./application/modules/PF/controllers/admin.php */
