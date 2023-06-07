<?php

/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class. Handles all the datatypes and methodes required for Admin section of Future-system
 *
 * @author	<developer.wiz01@sketchwebsolutions.com>
 * @access  public
 * @since	Version 0.0.1
 */
class Admin extends MY_Controller {

    /**
     * The constructor method of this class.
     *
     * @access	public
     * @param	none
     * @return	Loads all the method, helper, library etc. required throughout this class
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('Adminauthmodel');
        $this->load->database();
    }

    /**
     * Index Page for this controller.
     *
     * @access	public
     * @param	none
     * @return	string
     */
    public function index() {
        if ($this->session->userdata('futureAdmin') != null) {
           // echo $this->session->userdata('type');exit;
             if($this->session->userdata('type')=='management')
            {
            redirect(base_url('dashboard'));
            }
            else{
              redirect(base_url('edit_employees_details/'.$this->session->userdata('futureAdmin')->detail->id));  
            }
        }

        if (isset($_POST['submit'])) {
            //echo "<pre>"; print_r($this->input->post()); die;
            $this->form_validation->set_rules('type', 'Choose Type', 'trim|required');
            $this->form_validation->set_rules('emailid', 'Email id', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                $this->Adminauthmodel->admin_login();
            }
        }

        $this->load->view('admin/index');
    }

    /**
     * dashboard of admin.
     *
     * @access  public
     * @param   none
     * @return  string
     */
    public function dashboard($idd = NULL) {
        admin_authenticate();

        $this->data = array();
        $this->data['data_single'] = $this->Adminauthmodel->get_row_data('admin', ['id' => backend_user_id()]);

        if ($idd) {
            $this->load->view('admin/dashboard', $this->data);
        } else {
            $this->load->view('admin/dashboard');
        }
    }

    /**
     * Used for logout of an admin
     *
     * @access  public
     * @param   none
     * @return  string. The success or failure of logout. 
     */
    public function logout() {
        admin_authenticate();
        $this->session->set_userdata('successmessage', 'You have logged out successfully');
        $this->session->unset_userdata('futureAdmin');
        redirect(base_url());
    }

    /**
     * change password of admin.
     *
     * @access  public
     * @param   none
     * @return  string
     */
    public function change_password($idd = NULL) {
        admin_authenticate();

        $this->data = array();
        $this->data['data_single'] = $this->Adminauthmodel->get_row_data('admin', ['id' => backend_user_id()]);

        if ($idd) {
            $this->load->view('admin/change-password', $this->data);
        } else {
            $this->middle = 'admin/change-password';
            $this->layout();
        }
    }

    public function has_match() {
        $password = $this->input->post('old_password');
        $data_user = $this->Adminauthmodel->get_row_data('admin', ['id' => backend_user_id()]);
        if ($data_user->password == md5($password)) {
            return true;
        } else {
            $this->form_validation->set_message('has_match', 'Incorrect Password');
            return false;
        }
    }

    public function Password() {
        $Password = $this->input->post('new_password');
        if (!preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $Password)) {
            $this->form_validation->set_message('Password', 'The password must contain numbers, letters, and at least 6 characters total.');
            return false;
        } else {
            return true;
        }
    }

    public function check_old_password() {
        admin_authenticate();
        //echo "<pre>"; print_r($_POST); die;
        $passVal = '';
         if($this->session->userdata('type')=='management')
            {
              $passValArr = $this->Adminauthmodel->get_row_data('admin', ['password' => md5($_POST['passVal']), 'id' => backend_user_id()]);
            }
            else{
              $passValArr = $this->Adminauthmodel->get_row_data('admin', ['password' => md5($_POST['passVal']), 'id' => backend_user_id()]); 
            }
			//echo '<pre>'; print_r($passValArr); die;
            
        if (empty($passValArr)) {
            $passVal = 'Incorrect Password!';
        }
        echo $passVal;
        exit();
    }

    public function save_change_password($idd = NULL) {
        admin_authenticate();
        //echo "<pre>"; print_r($_POST); die;
        
         if($this->session->userdata('type')=='management')
            {
        $data = [
            'password' => md5($_POST['new_password'])
        ];
        //echo "<pre>"; print_r($data); //die;
        $flg = $this->Adminauthmodel->update_row_data('admin', $data, ['id' => backend_user_id()]);
            }
            else{
                
                 $data = [
            'password' => md5($_POST['new_password']),
            'original_password' =>$_POST['new_password']
        ];
        //echo "<pre>"; print_r($data); //die;
        $flg = $this->Adminauthmodel->update_row_data('employee', $data, ['id' => backend_user_id()]);
            }
        //echo $flg; die;
        if (!empty($flg)) {
            $this->session->set_flashdata('successmessage', 'Password changed successfully');
        } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
        }
        redirect(base_url('change_password/1'));
    }

    /**
     * upload image for this all controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */
    public function get_image() {
        //echo "<pre>"; print_r($_POST);
        //echo "<pre>"; print_r($_FILES); die;

        $file = $_FILES['image'];
        if (isset($file['name']) && $file['name'] != '') {
            $imagename = $file['name'];
            $imagearr = explode('.', $imagename);
            $ext = end($imagearr);
            $newimage = time() . rand() . "." . $ext;

            $this->load->library('image_lib');
            $config['image_library'] = 'gd2';
            $config['source_image'] = $file['tmp_name'];
            $config['new_image'] = "uploads/" . $newimage;
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['width'] = '';
            $config['height'] = '';
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            $image = $newimage;
        } else {
            $image = '';
        }
        echo $image;
        die;
    }
    
   
    
     public function get_image_new() {
        //echo "<pre>"; print_r($_POST);
        //echo "<pre>"; print_r($_FILES); die;

        $file = $_FILES['image'];
        if (isset($file['name']) && $file['name'] != '') {
            $imagename = $file['name'];
            $imagearr = explode('.', $imagename);
            $ext = end($imagearr);
            $newimage = time() . rand() . "." . $ext;

            $this->load->library('image_lib');
            $config['image_library'] = 'gd2';
            $config['source_image'] = $file['tmp_name'];
            $config['new_image'] = "uploads/" . $newimage;
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['width'] = '';
            $config['height'] = '';
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            $image = $newimage;
        } else {
            $image = '';
        }
        echo $image;
        die;
    }

    public function get_image_profile() {
        //echo "<pre>"; print_r($_POST);
       // echo "<pre>"; print_r($_FILES); die;
        //$this->load->model('employees_details/admin/EmployeesModel');
        $file = $_FILES['image'];
        if (isset($file['name']) && $file['name'] != '') {
            $imagename = $file['name'];
            $imagearr = explode('.', $imagename);
            $ext = end($imagearr);
            $newimage = time() . rand() . "." . $ext;

            $this->load->library('image_lib');
            $config['image_library'] = 'gd2';
            $config['source_image'] = $file['tmp_name'];
            $config['new_image'] = "uploads/" . $newimage;
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['width'] = '';
            $config['height'] = '';
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            $image = $newimage;

            $this->Adminauthmodel->update_employee_profile_picture($this->input->post('id'), $image);
        } else {
            $image = '';
        }
        echo $image;
        die;
    }

    /**
     * upload files for this all controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */
    public function upload_files($divid) {
        // echo $divid;
        //echo "<pre>"; print_r($_FILES); die;

        $newImageName = time() . '_file_' . $_FILES['att_file_' . $divid]['name'];
        $fileUpload = move_uploaded_file($_FILES['att_file_' . $divid]['tmp_name'], 'uploads/' . $newImageName);
        if ($fileUpload) {
            $file = $newImageName;
        } else {
            $file = '';
        }

        echo $file;
        die;
    }

    /**
     * upload image with dynamic name for this all controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */
    public function get_image_dynamic_name($dynamic_name = '') {
        //echo $dynamic_name;
        //echo "<pre>"; print_r($_POST);
        //echo "<pre>"; print_r($_FILES); die;

        $file = $_FILES[$dynamic_name];
        if (isset($file['name']) && $file['name'] != '') {
            $imagename = $file['name'];
            $imagearr = explode('.', $imagename);
            $ext = end($imagearr);
            $newimage = time() . rand() . "." . $ext;

            $this->load->library('image_lib');
            $config['image_library'] = 'gd2';
            $config['source_image'] = $file['tmp_name'];
            $config['new_image'] = "uploads/" . $newimage;
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['width'] = '';
            $config['height'] = '';
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            $image = $newimage;
        } else {
            $image = '';
        }
        echo $image;
        die;
    }

    /**
     * used to load pjax for all controllers
     *
     * @access  public
     * @param   id  and idd
     * @return  string
     */
    public function page($id = NULL, $idd = NULL) {
        switch ($id) {
            case 1:
                redirect('change_password/' . $idd);
                break;
            case 2:
                redirect('qualification-skill/' . $idd);
                break;
            case 3:
                redirect('qualification-education/' . $idd);
                break;
            case 4:
                redirect('qualification-licence/' . $idd);
                break;
            case 5:
                redirect('qualification-membership/' . $idd);
                break;
            case 6:
                redirect('department/' . $idd);
                break;
            case 7:
                redirect('designation/' . $idd);
                break;
            case 8:
                redirect('grade/' . $idd);
                break;
            case 9:
                redirect('work_shift/' . $idd);
                break;
            case 10:
                redirect('work_week/' . $idd);
                break;
            case 11:
                redirect('holidays/' . $idd);
                break;
            case 12:
                redirect('salary_component/' . $idd);
                break;
            case 13:
                redirect('salary_structure/' . $idd);
                break;
            case 14:
                redirect('benefits_insurance_policy/' . $idd);
                break;
            case 15:
                redirect('benefits_workman_compensation/' . $idd);
                break;
            case 16:
                redirect('benefits_project_insurance/' . $idd);
                break;
            case 17:
                redirect('benefits_vehicle_insurance/' . $idd);
                break;
            case 18:
                redirect('benefits_bonus_incentive/' . $idd);
                break;
            case 19:
                redirect('benefits_LTC/' . $idd);
                break;
            case 20:
                redirect('benefits_tenancy/' . $idd);
                break;
            case 21:
                redirect('benefits_vehicles/' . $idd);
                break;
            case 22:
                redirect('benefits_gratuity/' . $idd);
                break;
            case 23:
                redirect('late_rules/' . $idd);
                break;
            case 24:
                redirect('attendance_rules/' . $idd);
                break;
            case 25:
                redirect('leave_rules/' . $idd);
                break;
            case 26:
                redirect('employee_config/' . $idd);
                break;
            case 27:
                redirect('travel_rules/' . $idd);
                break;
            case 28:
                redirect('expenses_claim_rules/' . $idd);
                break;
            case 29:
                redirect('expenses_reimbursement_rules/' . $idd);
                break;
            case 30:
                redirect('warning_evaluations_rules/' . $idd);
                break;
            case 31:
                redirect('email_template/' . $idd);
                break;
            case 32:
                redirect('docs_template/' . $idd);
                break;
            case 33:
                redirect('req_job_opening/' . $idd);
                break;
            case 34:
                redirect('req_candidates/' . $idd);
                break;
            case 35:
                redirect('req_interviews/' . $idd);
                break;
            case 36:
                redirect('setting_organization/' . $idd);
                break;
            case 37:
                redirect('setting_organization_bank_details/' . $idd);
                break;
            case 38:
                redirect('setting_location/' . $idd);
                break;
            case 39:
                redirect('setting_system_config/' . $idd);
                break;
            case 40:
                redirect('employees/' . $idd);
                break;
            case 41:
                redirect('dashboard/' . $idd);
                break;
            case 42:
                redirect('admin_settings/' . $idd);
                break;
            case 43:
                redirect('employees_details/' . $idd);
                break;
            case 44:
                redirect('labour-list/' . $idd);
                break;
            case 45:
                redirect('attendance/' . $idd);
                break;
            case 46:
                redirect('payroll/' . $idd);
                break;
            case 47:
                redirect('tenancy/' . $idd);
                break;
            case 48:
                redirect('vehicles/' . $idd);
                break;
            case 49:
                redirect('insurance_policies/' . $idd);
                break;
            case 50:
                redirect('projects/' . $idd);
                break;
            case 51:
                redirect('payroll-wps/' . $idd);
                break;
            case 52:
                redirect('payroll-overtime/' . $idd);
                break;
            case 53:
                redirect('payroll-gratuity/' . $idd);
                break;
            case 54:
                redirect('add-labour/' . $idd);
                break;
            case 55:
                redirect('labour-profile/' . $idd);
                break;
            case 56:
                redirect('add_employees_details/' . $idd);
                break;
            case 57:
                redirect('employee-profile/' . $idd);
                break;
            case 58:
                redirect('vehicle_maintenance/' . $idd);
                break;
            case 59:
                redirect('vehicle_asignment/' . $idd);
                break;
            case 60:
                redirect('vehicle_assign_history/' . $idd);
                break;
            case 61:
                redirect('tenancy_contracts/' . $idd);
                break;
            case 62:
                redirect('overtime_rules/' . $idd);
                break;
            case 63:
                redirect('gratuity_formula/' . $idd);
                break;
            case 64:
                redirect('edit_employees_details/' . $idd);
                break;
            case 65:
                redirect('employee_leave/' . $idd);
                break;
            case 66:
                redirect('certificate/' . $idd);
                break;
               case 67:
                redirect('increement/' . $idd);
                break;
             case 68:
                redirect('complaints/' . $idd);
                break;
             case 69:
                redirect('complaints_details/' . $idd);
                break;
            case 70:
                redirect('employee_gratuity/' . $idd);
                break;
            case 71:
                redirect('leave_settlement/' . $idd);
                break;
            case 72:
                redirect('equipment/' . $idd);
                break;
            case 73:
                redirect('assigned_employee/' . $idd);
                break;
            case 74:
                redirect('employee_details/' . $idd);
                break;
            case 75:
                redirect('ptax/'.$idd);
                break;
            case 76:
                redirect('state_add/'.$idd);
                break;
            case 77:
                redirect('pf/'.$idd);
                break;
            case 78:
                redirect('assigned_location/'.$idd);
                break;
            case 79:
                redirect('pay_schedule/'.$idd);
                break;
            case 80:
                redirect('esi/'.$idd);
                break;
            case 81:
                redirect('statutory/'.$idd);
                break;
             case 82:
                redirect('assigned_work_shift/'.$idd);
                break;
            case 83:
                redirect('notice/'.$idd);
                break;
            case 84:
                redirect('lop/'.$idd);
                break;
            case 85:
                redirect('employee_loan/'.$idd);
                break;
            case 86:
                redirect('incentive_reimbursement_rule/'.$idd);
                break;
            case 87:
                redirect('timeoff/'.$idd);
                break;
            case 88:
                redirect('wfh/'.$idd);
                break;
             case 89:
                redirect('employee_attendance/'.$idd);
                break;
            case 90:
                redirect('employee_opening_leave/'.$idd);
                break;
            case 91:
                redirect('summary_report/'.$idd);
                break;   
			 case 92:
		redirect('templates/' . $idd);
		break;
        }
    }

    /**
     * employee-list of admin.
     *
     * @access  public
     * @param   none
     * @return  string
     */
    public function employee_list($idd = NULL) {
        admin_authenticate();

        $this->data = array();
        $this->data['data_single'] = $this->Adminauthmodel->get_row_data('admin', ['id' => backend_user_id()]);

        if ($idd) {
            $this->load->view('admin/employee-list', $this->data);
        } else {
            $this->middle = 'admin/employee-list';
            $this->layout();
        }
    }

    /**
     * labour-list of admin.
     *
     * @access  public
     * @param   none
     * @return  string
     */
    public function labour_list($idd = NULL) {
        admin_authenticate();

        $this->data = array();
        $this->data['data_single'] = $this->Adminauthmodel->get_row_data('admin', ['id' => backend_user_id()]);

        if ($idd) {
            $this->load->view('admin/labour-list', $this->data);
        } else {
            $this->middle = 'admin/labour-list';
            $this->layout();
        }
    }

    /**
     * attendance of admin.
     *
     * @access  public
     * @param   none
     * @return  string
     */
    public function attendance($idd = NULL) {
        admin_authenticate();

        $this->data = array();
        $this->data['data_single'] = $this->Adminauthmodel->get_row_data('admin', ['id' => backend_user_id()]);

        if ($idd) {
            $this->load->view('admin/attendance', $this->data);
        } else {
            $this->middle = 'admin/attendance';
            $this->layout();
        }
    }

    // /**
    //  * payroll of admin.
    //  *
    //  * @access  public
    //  * @param   none
    //  * @return  string
    //  */
    // public function payroll($idd = NULL) {
    //     admin_authenticate();

    //     $this->data = array();
    //     $this->data['data_single'] = $this->Adminauthmodel->get_row_data('admin', ['id' => backend_user_id()]);

    //     if ($idd) {
    //         $this->load->view('admin/payroll', $this->data);
    //     } else {
    //         $this->middle = 'admin/payroll';
    //         $this->layout();
    //     }
    // }

    /**
     * projects of admin.
     *
     * @access  public
     * @param   none
     * @return  string
     */
    public function projects($idd = NULL) {
        admin_authenticate();

        $this->data = array();
        $this->data['data_single'] = $this->Adminauthmodel->get_row_data('admin', ['id' => backend_user_id()]);

        if ($idd) {
            $this->load->view('admin/projects', $this->data);
        } else {
            $this->middle = 'admin/projects';
            $this->layout();
        }
    }

    /**
     * payroll-wps of admin.
     *
     * @access  public
     * @param   none
     * @return  string
     */
    public function payroll_wps($idd = NULL) {
        admin_authenticate();

        $this->data = array();
        $this->data['data_single'] = $this->Adminauthmodel->get_row_data('admin', ['id' => backend_user_id()]);

        if ($idd) {
            $this->load->view('admin/payroll-wps', $this->data);
        } else {
            $this->middle = 'admin/payroll-wps';
            $this->layout();
        }
    }

    /**
     * payroll-overtime of admin.
     *
     * @access  public
     * @param   none
     * @return  string
     */
    public function payroll_overtime($idd = NULL) {
        admin_authenticate();

        $this->data = array();
        $this->data['data_single'] = $this->Adminauthmodel->get_row_data('admin', ['id' => backend_user_id()]);

        if ($idd) {
            $this->load->view('admin/payroll-overtime', $this->data);
        } else {
            $this->middle = 'admin/payroll-overtime';
            $this->layout();
        }
    }

    /**
     * payroll-gratuity of admin.
     *
     * @access  public
     * @param   none
     * @return  string
     */
    public function payroll_gratuity($idd = NULL) {
        admin_authenticate();

        $this->data = array();
        $this->data['data_single'] = $this->Adminauthmodel->get_row_data('admin', ['id' => backend_user_id()]);

        if ($idd) {
            $this->load->view('admin/payroll-gratuity', $this->data);
        } else {
            $this->middle = 'admin/payroll-gratuity';
            $this->layout();
        }
    }

    /**
     * add-labour of admin.
     *
     * @access  public
     * @param   none
     * @return  string
     */
    public function add_labour($idd = NULL) {
        admin_authenticate();

        $this->data = array();
        $this->data['data_single'] = $this->Adminauthmodel->get_row_data('admin', ['id' => backend_user_id()]);

        if ($idd) {
            $this->load->view('admin/add-labour', $this->data);
        } else {
            $this->middle = 'admin/add-labour';
            $this->layout();
        }
    }

    /**
     * labour-profile of admin.
     *
     * @access  public
     * @param   none
     * @return  string
     */
    public function labour_profile($idd = NULL) {
        admin_authenticate();

        $this->data = array();
        $this->data['data_single'] = $this->Adminauthmodel->get_row_data('admin', ['id' => backend_user_id()]);

        if ($idd) {
            $this->load->view('admin/labour-profile', $this->data);
        } else {
            $this->middle = 'admin/labour-profile';
            $this->layout();
        }
    }

    /**
     * add-employee of admin.
     *
     * @access  public
     * @param   none
     * @return  string
     */
    public function add_employee($idd = NULL) {
        admin_authenticate();

        $this->data = array();
        $this->data['data_single'] = $this->Adminauthmodel->get_row_data('admin', ['id' => backend_user_id()]);

        if ($idd) {
            $this->load->view('admin/add-employee', $this->data);
        } else {
            $this->middle = 'admin/add-employee';
            $this->layout();
        }
    }

    /**
     * employee-profile of admin.
     *
     * @access  public
     * @param   none
     * @return  string
     */
    public function get_profile($idd = NULL) {
        admin_authenticate();

        $this->data = array();
        $this->data['data_single'] = $this->Adminauthmodel->get_row_data('admin', ['id' => backend_user_id()]);

        if ($idd) {
            $this->load->view('admin/employee-profile', $this->data);
        } else {
            $this->middle = 'admin/employee-profile';
            $this->layout();
        }
    }
	
	public function saveToken()
    {
		admin_authenticate();
		if($this->input->post()){
			$post['token'] = $this->input->post('token');
			$post['user_id'] = backend_user_id();		
			$res = $this->Adminauthmodel->save_user_tokens($post);
			return $res;
		}else{
			return 'Token Not Saved';
		}	
	}

}

/* End of file front.php */
/* Location: ./application/controllers/Admin.php */
