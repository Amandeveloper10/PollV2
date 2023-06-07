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
    public function index($id=NULL) {
        $all_data = $this->DesiModel->load_all_data();
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
       // echo "<pre>"; print_r($all_data); //die;
        if($id){
            $this->load->view('designation/admin/list',$this->data);
        }else{
            $this->middle = 'designation/admin/list';
        $this->layout();
        }
    }
	
	public function designation_skelitan($id=NULL) {
       //echo '<pre>'; print_r($_POST); die;
		if($_POST['limit']){
			$all_data = $this->DesiModel->load_all_data_limit($_POST['limit']);
		$output = '';

		foreach($all_data as $data)
		{
		$output .= '<tr>
                    <td><a class="pjaxcls" href="javascript:void(0)" onclick="openForm('.$data->id .');">'.$data->designation_name .'</a></td>
                    <td>'.$data->description .'</td>
                     <td class="table-action">
                        <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="la la-ellipsis-v"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="javascript:void(0)" onclick="openForm('.$data->id.');"><span class="la la-pencil icon text-info"></span> Edit</a>';
                                if ($data->is_active == "Y") {
                                    $output .= '<a class="dropdown-item" href="javascript:void(0)" onclick="change_status('. $data->id .');"><span class="ks-icon la la-close text-danger" aria-hidden="false"></span> De-activated</a>';
                                } else {
                                    $output .= '<a class="dropdown-item" href="javascript:void(0)" onclick="change_status(' . $data->id . ');"><span class="ks-icon la la-check text-success" aria-hidden="false"></span> Activate</a>';
                                }
                            
                            $output .= '<a class="dropdown-item" href="javascript:void(0)" onclick="delete_this('. $data->id .');"><span class="la la-trash icon text-danger"></span> Delete</a> 
                        </div>                                                
                    </td>                                
                  </tr>';
		}


		echo $output;
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
        $view = $this->load->view('designation/admin/form',$this->data, TRUE);
        echo $view; exit();         
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

    public function check_designation() {
        $designation_name = $_POST['designation_name'];  
        $id = $_POST['id'];


        if(empty($id)){
            $check_designation = $this->DesiModel->get_row_data('master_designation',array('designation_name'=>$designation_name,'delete_flag'=>'N','is_active'=>'Y'));
        }else{
            $check_designation = $this->DesiModel->check_designation($designation_name,$id);
        }


        if(!empty($check_designation)){
            echo 'This Designation Name already exist.';
        }else{
            echo 'done';
        }

        exit();         
    }
}
/* End of file admin.php */
/* Location: ./application/modules/designation/controllers/admin.php */
