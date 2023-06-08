<?php

/**
 * employees Model Class. Handles all the datatypes and methodes required for handling employees
 */
class EmployeesModel extends CI_Model {

    /**
     * The constructor method of this class.
     *
     * @access  public
     * @param none
     * @return  Loads all the method, helper, library etc. required throughout this class
     */
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library("session");
        $this->load->helper('string');
    }

    /**
     * Used for loading functionality of employees for an admin
     *
     * <p>Description</p>
     *
     * <p>This function loads all the employees that has been added by current admin [Table: employee]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_all_data() {
        $this->db->select('t1.*');
        $this->db->from(tablename('employee') . ' as t1');
        $this->db->where('t1.delete_flag', 'N');
        $this->db->where('t1.is_active', 'Y');
        $query = $this->db->get();
        $result = $query->result();
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

     public function load_all_data_archive() {
        $this->db->select('t1.*');
        $this->db->from(tablename('employee') . ' as t1');
        $this->db->where('t1.delete_flag', 'N');
        $this->db->where('t1.is_active', 'N');
        $query = $this->db->get();
        $result = $query->result();
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
    
     public function load_all_leave_type() {
        $this->db->select('t1.*');
        $this->db->from(tablename('master_leave_rules') . ' as t1');
        $this->db->where('t1.delete_flag', 'N');
         $this->db->where('t1.is_active', 'Y');
        $query = $this->db->get();
        $result = $query->result();
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    /**
     * Used for fetching rows from a table
     *
     * <p>Description</p>
     *
     * <p>This function fetches rows from any table depending upon condition</p>
     *
     * @access  public
     * @param   {string} table - the table name whose data will be fetched
     * @param   {array[]} where - the where clause parameter for the sql
     * @return array
     */
    public function get_result_data($table, $where = "1=1") {
        $query = $this->db->get_where(tablename($table), $where);
        return $query->result();
    }
	
	public function get_result_data_with_order_by($table, $where = "1=1") {
		
		$this->db->order_by("first_name", "asc");
        $query = $this->db->get_where(tablename($table), $where);
        return $query->result();
    }

    /**
     * Used for fetching row from a table
     *
     * <p>Description</p>
     *
     * <p>This function Used for fetching row</p>
     *
     * @access  public
     * @param   {string} table - the table name whose data will be fetched
     * @param   {array[]} where - the where clause parameter for the sql
     * @return  array
     */
    public function get_row_data($table, $where) {
        $query = $this->db->get_where(tablename($table), $where);
        return $query->row();
    }

    public function get_existing_salary_details($table, $where) {
        $this->db->order_by('id', 'desc');
        $query = $this->db->get_where(tablename($table), $where);
        // echo $this->db->last_query(); die;
        return $query->row();
    }

    /**
     * Used for add/edit rows from a table
     *
     * <p>Description</p>
     *
     * <p>This function Used for add/edit employees</p>
     *
     * @access  public
     * @param   id
     * @return string
     */
   
    public function modify($id) {
        //echo "<pre>"; print_r($_FILES); die;
//$id=base64_decode($id);
//echo $id;exit;
        $employee_no = $this->input->post('employee_no');
        $file_no = $this->input->post('file_no');
       // $insurence_id = $this->input->post('insurence_id');
        $employee_category = $this->input->post('employee_category');
        $employee_title = $this->input->post('employee_title');
        $first_name = $this->input->post('first_name');
        $middle_name = $this->input->post('middle_name');
        $last_name = $this->input->post('last_name');
        $department = $this->input->post('department');
        $designation = $this->input->post('designation');
        $hire_date = date('Y-m-d',strtotime($this->input->post('hire_date')));
        $status = $this->input->post('status');
        $discontinued_date = date('Y-m-d',strtotime($this->input->post('discontinued_date')));
        $gratuity_start_date = date('Y-m-d',strtotime($this->input->post('gratuity_start_date')));
        $gratuity_amount = $this->input->post('gratuity_amount');
        $pro_name = $this->input->post('pro_name');
        $leave_per_month = $this->input->post('leave_per_month');
        $marital_status = $this->input->post('marital_status');
        $next_leave_due_date = $this->input->post('next_leave_due_date');
        $password = $this->input->post('password');
        $dob = date('Y-m-d',strtotime($this->input->post('dob')));
        $increment_due_date = date('Y-m-d',strtotime($this->input->post('increment_due_date')));
		$perma_addr = $this->input->post('perma_addr');

         $voter_image  = $this->input->post('voter_image');
		  $pan_image  = $this->input->post('pan_image'); 
		  $aadhar_image  = $this->input->post('aadhar_image');
		  
		  $access_permission  = $this->input->post('access_permission');
		  //echo $access_permission; die;

        $contact_address = $this->input->post('contact_address');
		 $contact_address1 = $this->input->post('contact_address1');
        $contact_phone = $this->input->post('contact_phone');
        $contact_mobile = $this->input->post('contact_mobile');
        $contact_email = $this->input->post('contact_email');
		$contact_city = $this->input->post('contact_city');
		$contact_state = $this->input->post('contact_state');
		$contact_pin = $this->input->post('contact_pin');
       $contact_country = $this->input->post('contact_country');
        //$home_address = $this->input->post('home_address');
        //$home_city = $this->input->post('home_city');
        //$home_country = $this->input->post('home_country');
		//$home_address1 = $this->input->post('home_address1');
		//$home_state = $this->input->post('home_state');
       // $home_pin = $this->input->post('home_pin');

        $home_phone = $this->input->post('home_phone');
        $home_mobile = $this->input->post('home_mobile');
        $home_email = $this->input->post('home_email');
		
		if($perma_addr == '1'){
		$home_address = $contact_address;
		$home_address1 =  $contact_address1;
		$home_city = $contact_city;
		$home_country = $contact_country;
		
		$home_state = $contact_state;
		$home_pin = $contact_pin;
		}else{
			$home_address = $this->input->post('home_address');
        $home_city = $this->input->post('home_city');
        $home_country = $this->input->post('home_country');
		$home_address1 = $this->input->post('home_address1');
		$home_state = $this->input->post('home_state');
        $home_pin = $this->input->post('home_pin');
		}

        $note = $this->input->post('note');
        

        $father_name = $this->input->post('father_name');
        $mother_name = $this->input->post('mother_name');
        $spouse_name = $this->input->post('spouse_name');
        $no_of_children = $this->input->post('no_of_children');
        $gender = $this->input->post('gender');
        $religion = $this->input->post('religion');
        $highest_qualification = $this->input->post('highest_qualification');
        $skill_details = ($this->input->post('skill_details')) ? implode(',', $this->input->post('skill_details')) :'' ;
        $cv = $_FILES['cv'];
        $personal_image = $this->input->post('imagenew');
        $grade = $this->input->post('grade');
        $reporting_manager = $this->input->post('reporting_manager');
        $subordinate = (!empty($this->input->post('subordinate'))) ? implode(',', $this->input->post('subordinate')) : '';
        $work_shift_id = $this->input->post('work_shift_id');
		$office_email = $this->input->post('office_email');

        $leavetype = $this->input->post('leavetype');
        $opening_balance = $this->input->post('opening_balance');

        $voter_card = $this->input->post('voter_card');
        $aadhar_card = $this->input->post('aadhar_card');
        $pan_card = $this->input->post('pan_card');
        $enable_wfh = $this->input->post('enable_wfh');
		$enable_overtime = $this->input->post('enable_overtime');
        $rf_no = trim($this->input->post('rf_no'));
		
       $branch_name = $this->input->post('branch_name');
        $bank_name = $this->input->post('bank_name');
        $account_no = $this->input->post('account_no');
        $agent_rtn_code = $this->input->post('agent_rtn_code');
        $default = $this->input->post('default');

        $date = date("Y-m-d H:i:s");

         $this->db->select('t1.*');
        $this->db->from(tablename('closure') . ' as t1');
        $this->db->where('t1.employee_id',base64_decode($id));
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result->attachment)) {
            $allattach = $result->attachment;
        } else {
            $allattach = '';
        }  
      
      //$closure_type=$_POST['closure_type'];
      $note        =$_POST['note'];
      //$last_day_of_work =$_POST['last_day_of_work'];

      $attachmentfileall = '';
      $attachmentfile = '';
      //$attachment=$_FILES['closure_documents'] ;
$attachment = '';
        if (!empty($attachment)) {
            for ($i = 0; $i <= count($attachment['name']); $i++) {

                if (!empty($attachment['name'][$i])) {

                    $attachment_doc = $this->upload_files_new($attachment['name'][$i], $attachment['tmp_name'][$i]);
                    $attachmentfile.=$attachment_doc . ',';
                }
                //  $data['dubai_civil_defence_card_back'] = $dubai_civil_defence_card_back_image;
            }
            $attachmentfile = $attachmentfile . $allattach;
            if (!empty($attachmentfile)) {
                $attachmentfileall = rtrim($attachmentfile, ',');
            }
            // echo $attachmentfileall;
        }
         if (!empty($id)) {
        $this->db->select('t1.*');
        $this->db->from(tablename('employee_passport_visa') . ' as t1');
        $this->db->where('t1.employee_id', base64_decode($id));
        $query = $this->db->get();
        $result = $query->row();
        }

        $passport_no = $this->input->post('passport_no');
        $passport_place_of_issue = $this->input->post('passport_place_of_issue');
        $passport_country = $this->input->post('passport_country');
        $passport_issue_date = $this->input->post('passport_issue_date');
        $passport_expiry_date = $this->input->post('passport_expiry_date');
        $retained_with_company = $this->input->post('retained_with_company');
        
        
        
        
         if (!empty($result->passport_image)) {
            $allpassport_image = $result->passport_image;
        } else {
            $allpassport_image = '';
        }

        $passport_imagefileall = '';
        $passport_imagefile = '';
        $passport_image = $_FILES['passport_image'];

        if (!empty($passport_image)) {
            for ($i = 0; $i <= count($passport_image['name']); $i++) {

                if (!empty($passport_image['name'][$i])) {

                    $passport_image_doc = $this->upload_files_new($passport_image['name'][$i], $passport_image['tmp_name'][$i]);
                    $passport_imagefile.=$passport_image_doc . ',';
                }
            }
            $passport_imagefile = $passport_imagefile . $allpassport_image;
            if (!empty($passport_imagefile)) {
                //1111//
                $passport_imagefileall = rtrim($passport_imagefile, ',');
            }
        }

        if (!empty($id)) {
            $data = array(
                'employee_no' => $employee_no,
                'rf_no' => $rf_no,
                'file_no' => $file_no,
                //'insurence_id' => $insurence_id,
                'employee_category' => $employee_category,
                'employee_title' => $employee_title,
                'first_name' => $first_name,
                'middle_name' => $middle_name,
                'last_name' => $last_name,
                'department' => $department,
                'designation' => $designation,
                'hire_date' => $hire_date,
                'discontinued_date' => $discontinued_date,
                'gratuity_start_date' => $gratuity_start_date,
                'gratuity_amount' => $gratuity_amount,
                'pro_name' => $pro_name,
                'leave_per_month' => $leave_per_month,
                'marital_status' => $marital_status,
                'status' => $status,
                'next_leave_due_date' => $next_leave_due_date,
                'password' => md5($password),
                'original_password' => $password,
                'increment_due_date' => $increment_due_date,
                'contact_address' => $contact_address,
				'contact_address1' => $contact_address1,
				'contact_state' => $contact_state,
				'contact_pin' => $contact_pin,
                'contact_phone' => $contact_phone,
                'contact_mobile' => $contact_mobile,
                'contact_email' => $contact_email,
                'contact_city' => $contact_city,
                'home_address' => $home_address,
				'home_address1' => $home_address1,
				'home_state' => $home_state,
				'home_pin' => $home_pin,
                'home_city' => $home_city,
                'home_country' => $home_country,
                'home_phone' => $home_phone,
                'home_mobile' => $home_mobile,
				'perma_addr' => $perma_addr,
                'dob' => $dob,
                'note' => $note,
                'contact_country' => $contact_country,
                'father_name' => $father_name,
                'mother_name' => $mother_name,
                'spouse_name' => $spouse_name,
                'no_of_children' => $no_of_children,
                'gender' => $gender,
                'religion' => $religion,
               
                'personal_image' => $personal_image,
                'modified_date' => $date,
                //'overtime' => $overtime,
                //'work_shift' => $work_shift,
                'grade' => $grade,
                'reporting_manager' => $reporting_manager,
                'subordinate' => $subordinate,
                'work_shift_id' => $work_shift_id,
				'office_email' => $office_email,
                 'voter_card' => $voter_card,
                'aadhar_card' => $aadhar_card,
                'pan_card' => $pan_card,
                'wfh' => $enable_wfh,
				 'overtime' => $enable_overtime,
				 'voter_image' => $voter_image,
				 'pan_image' => $pan_image,
				 'aadhar_image' => $aadhar_image,
				  'access_permission' => $access_permission


            );
//echo '<pre>';print_r($data);exit;
            $this->db->where('id', base64_decode($id))->update(tablename('employee'), $data);

            if(!empty($leavetype) && !empty($opening_balance)){
            $this->db->delete('HR_employee_opening_leave', array('employee_id' => base64_decode($id))); 
            foreach ($leavetype as $key => $value) {
            $dataleave['employee_id'] =  base64_decode($id);
            $dataleave['leave_id'] =  $value;
            $dataleave['opening_balance'] =  $opening_balance[$key];
            $dataleave['entry_date'] =  date('Y-m-d');
            $this->db->insert(tablename('employee_opening_leave'), $dataleave);
            # code...
            }
            //echo '<pre>'; print_r($dataleave); die;
            }

//echo $this->db->last_query();exit;
            /*if(!empty($highest_qualification)){
                $dataexp = array(
                'employee_id' => base64_decode($id),
                'highest_qualification' => $_POST['highest_qualification'],
                'skill_details' => $skill_details,
                'modified_date' => $date
                );
                 if (!empty($cv)) {
                $cv_image = $this->upload_files($cv);
                // echo $cv_image;exit;
                $dataexp['cv'] = $cv_image;
            }

                 $this->db->where('employee_id', base64_decode($id))->update(tablename('employee_qualification_experience'), $dataexp);
            }*/

            $all_experience= $this->EmployeesModel->get_result_data('employee_experience_temp', array());
            if(!empty($all_experience)){
            foreach ($all_experience as $value) {
             $dataexp = array(
            'employee_id' =>  base64_decode($id),
            'company' => $value->company,
             'job_title' => $value->job_title,
            'from_date' => $value->from_date,
             'to_date' => $value->to_date,
              'cv' => $value->cv,
            );
             $this->db->insert(tablename('employee_experience'), $dataexp);
            }
            }

             $all_education= $this->EmployeesModel->get_result_data('employee_education_temp', array());
        if(!empty($all_education)){
            foreach ($all_education as $value1) {
                 $dataedu = array(
                'employee_id' =>  base64_decode($id),
                'level' => $value1->level,
                 'institute' => $value1->institute,
                'year' => $value1->year,
                 'marks' => $value1->marks,
                  'cv' => $value->cv,
                );
                 $this->db->insert(tablename('employee_education'), $dataedu);
            }
        }
  
            if(!empty($passport_no)){
           $passport_exist = $this->EmployeesModel->get_row_data('employee_passport_visa',array('employee_id'=> base64_decode($id)));
		   
                $datapassport['passport_no'] = $passport_no;
                $datapassport['passport_place_of_issue'] = $passport_place_of_issue;
                $datapassport['passport_country'] = $passport_country;
                $datapassport['passport_issue_date'] = date('y-m-d',strtotime($passport_issue_date));
                $datapassport['passport_expiry_date'] = date('y-m-d',strtotime($passport_expiry_date));
                $datapassport['retained_with_company'] = $retained_with_company;
                if (!empty($passport_imagefileall)) {
                $datapassport['passport_image'] = $passport_imagefileall;
                }
				if(!empty($passport_exist)){
					$this->db->where('employee_id', base64_decode($id))->update(tablename('employee_passport_visa'), $datapassport);
				}else{
					$this->db->insert(tablename('employee_passport_visa'), $datapassport); 
				}
                
        }


        if(!empty($bank_name)){
            $databank['bank_name'] = $bank_name;
			$data['branch_name'] = $branch_name;
            $databank['account_no'] = $account_no;
            $databank['agent_rtn_code'] = $agent_rtn_code;
            $databank['default_bank'] = $default;
        $bank_exist = $this->EmployeesModel->get_row_data('employee_bank_details',array('employee_id'=> base64_decode($id)));
		if(!empty($bank_exist)){
			$this->db->where('employee_id', base64_decode($id))->update(tablename('employee_bank_details'), $databank);
		}else{
			$this->db->insert(tablename('employee_bank_details'), $databank); 
		}
            
        }
if(!empty($closure_type)){
    $dataclosure = array(
            'type'  =>$closure_type,
            'note' =>$note ,
            'entry_date'=>$last_day_of_work,
        );
        if (!empty($attachmentfileall)) {
            $dataclosure['document'] = $attachmentfileall;
        }

        $this->db->where('employee_id',base64_decode($id))->update(tablename('closure'), $dataclosure);
}

            if(!empty($_POST['pf_checkbox']) && $_POST['pf_checkbox'] == '1'){
                $datapf = array(
                'employee_id' => base64_decode($id),
                'employee_pf_no' => $_POST['employee_pf_no'],
                'uan_no' => $_POST['uan_no'],
                'no' => $_POST['emp_no'],
                'modified_date' => $date
                );

                 $pf_exist = $this->EmployeesModel->get_row_data('employee_pf',array('employee_id'=> base64_decode($id)));
                 if(!empty($pf_exist)){
                    $this->db->where('employee_id', base64_decode($id))->update(tablename('employee_pf'), $datapf);
                 }else{
                    $datapf['entry_date']= $date;
                    $this->db->insert(tablename('employee_pf'), $datapf); 
                 }
            }

            if(!empty($_POST['esi_checkbox']) && $_POST['esi_checkbox'] == '1'){
                $dataesi = array(
                'employee_id' => base64_decode($id),
                'esi_no' => $_POST['esi_no'],
                'modified_date' => $date
                );
                $this->db->where('employee_id', base64_decode($id))->update(tablename('employee_esi'), $dataesi);

                $esi_exist = $this->EmployeesModel->get_row_data('employee_esi',array('employee_id'=> base64_decode($id)));
                 if(!empty($esi_exist)){
                    $this->db->where('employee_id', base64_decode($id))->update(tablename('employee_esi'), $dataesi);
                 }else{
                    $dataesi['entry_date']= $date;
                    $this->db->insert(tablename('employee_esi'), $dataesi); 
                 }
            }

            if(!empty($_POST['ptax_checkbox']) && $_POST['ptax_checkbox'] == '1'){
                $dataptax = array(
                'employee_id' => base64_decode($id),
                'ptax_no' => $_POST['ptax_no'],
                'modified_date' => $date
                );
                 $this->db->where('employee_id', base64_decode($id))->update(tablename('employee_ptax'), $dataptax);

                  $ptax_exist = $this->EmployeesModel->get_row_data('employee_ptax',array('employee_id'=> base64_decode($id)));
                 if(!empty($ptax_exist)){
                     $this->db->where('employee_id', base64_decode($id))->update(tablename('employee_ptax'), $dataptax);
                 }else{
                    $dataptax['entry_date']= $date;
                    $this->db->insert(tablename('employee_ptax'), $dataptax); 
                 }
            }
			
			
			if(!empty($_POST['access_permission']) && $_POST['access_permission'] == '1'){
               
				
				 $dataaccess = array(
				   'employee_id' => base64_decode($id),
                    'name' => $first_name.' '.$middle_name,
                    'family_name' => $last_name,
                    'emailid' => $contact_email,
                    'password' => md5('123456'),
                    'image' => $personal_image,
                    'modified_date' => $date,
					'delete_flag' => 'N',
					'is_active' => 'Y',
					'menu' => '188'
                );
                 //$this->db->where('employee_id', base64_decode($id))->update(tablename('admin'), $dataaccess);

                  $access_exist = $this->EmployeesModel->get_row_data('admin',array('employee_id'=> base64_decode($id)));
                 if(!empty($access_exist)){
                     $this->db->where('employee_id', base64_decode($id))->update(tablename('admin'), $dataaccess);
                 }else{
                    $dataaccess['entry_date']= $date;
                    $this->db->insert(tablename('admin'), $dataaccess); 
                 }
            }else{
				$access_exist = $this->EmployeesModel->get_row_data('admin',array('employee_id'=> base64_decode($id)));
				$dataaccess = array(
                    'delete_flag' => 'Y'
                );
				 $this->db->where('employee_id', base64_decode($id))->update(tablename('admin'), $dataaccess);
			}


//echo $this->db->last_query();exit;
             $this->db->truncate('employee_experience_temp'); 
              $this->db->truncate('employee_education_temp'); 
            $this->session->set_flashdata('successmessage', 'Employees modified successfully');
            redirect(base_url('edit_employees_details/' . $id));
        } else {

            $data = array(
                'employee_no' => $employee_no,
                'rf_no' => $rf_no,
                'file_no' => $file_no,
                // 'insurence_id' => $insurence_id,
                'dob' => $dob,
                'employee_category' => $employee_category,
                'employee_title' => $employee_title,
                'first_name' => $first_name,
                'middle_name' => $middle_name,
                'last_name' => $last_name,
                'department' => $department,
                'designation' => $designation,
                'hire_date' => $hire_date,
                'discontinued_date' => $discontinued_date,
                'gratuity_start_date' => $gratuity_start_date,
                'gratuity_amount' => $gratuity_amount,
                'pro_name' => $pro_name,
                'status' => $status,
                'leave_per_month' => $leave_per_month,
                'marital_status' => $marital_status,
                'next_leave_due_date' => $next_leave_due_date,
                 'password' => md5($password),
                'original_password' => $password,
                'increment_due_date' => $increment_due_date,
                'contact_address' => $contact_address,
				 'contact_address1' => $contact_address1,
				'contact_state' => $contact_state,
				'contact_pin' => $contact_pin,
                'contact_phone' => $contact_phone,
                'contact_mobile' => $contact_mobile,
                'contact_email' => $contact_email,
                'contact_city' => $contact_city,
                'home_address' => $home_address,
				'home_address1' => $home_address1,
				'home_state' => $home_state,
				'home_pin' => $home_pin,
                'home_city' => $home_city,
                'home_country' => $home_country,
                'home_phone' => $home_phone,
                'home_mobile' => $home_mobile,
				'perma_addr' => $perma_addr,
                'note' => $note,
                'contact_country' => $contact_country,
                'father_name' => $father_name,
                'mother_name' => $mother_name,
                'spouse_name' => $spouse_name,
                'no_of_children' => $no_of_children,
                'gender' => $gender,
                'religion' => $religion,
                 'religion' => $religion,
                'highest_qualification' => $highest_qualification,
                'personal_image' => $personal_image,
                'entry_date' => $date,
                'modified_date' => $date,
                //'overtime' => $overtime,
                //'work_shift' => $work_shift,
                'grade' => $grade,
                'reporting_manager' => $reporting_manager,
                'subordinate' => $subordinate,
                 'work_shift_id' => $work_shift_id,
				 'office_email' => $office_email,
                   'voter_card' => $voter_card,
                'aadhar_card' => $aadhar_card,
                 'pan_card' => $pan_card,
                 'wfh' => $enable_wfh,
				 'overtime' => $enable_overtime,
				  'voter_image' => $voter_image,
				  'pan_image' => $pan_image,
				  'aadhar_image' => $aadhar_image,
				   'access_permission' => $access_permission
            );

            $this->db->insert(tablename('employee'), $data);
            $insert_id = $this->db->insert_id();

            if(date('Y',strtotime($hire_date)) == date('Y')){
              $leave_type = $this->EmployeesModel->get_row_data('master_grade',array('id'=>$grade));
              //echo ; die;
              if(!empty($leave_type)){
                $leaveids = explode(',', $leave_type->leave_rule_id);
                foreach ($leaveids as $key => $value) {
                  $leave_details = $this->EmployeesModel->get_row_data('master_leave_rules',array('id'=>$value));
                  //echo '<pre>'; print_r($leave_details); //die;
                  if($leave_details->credit_month == 'Yearly'){
                    $SysConfigauthenticaton = checkConfig1();
                    //echo '<pre>'; print_r($SysConfigauthenticaton->financial_year_start_month);
                    $timeStart = strtotime(date('Y-m-d',strtotime($hire_date)));
                    $timeEnd = strtotime(date('Y-m-d',strtotime('2021-'.$SysConfigauthenticaton->financial_year_start_month.'-01')));
                    // Adding current month + all months in each passed year
                    $numMonths = 1 + (date("Y",$timeEnd)-date("Y",$timeStart))*12;
                    // Add/subtract month difference
                    $numMonths += date("m",$timeEnd)-date("m",$timeStart);
                    //echo date('F'); die;
                    //echo $numMonths; die;
                    //echo date('m',strtotime($hire_date)); die;
                    $permonth_leave = $leave_details->unit/12;
                    //echo $permonth_leave; die;
                    $dataleave['employee_id'] =  $insert_id;
                    $dataleave['leave_id'] =  $value;
                    $dataleave['credited_month'] =  date('F',strtotime($hire_date));
                    $dataleave['type'] =  'opening leave';
                    $dataleave['opening_balance'] =  $numMonths - 1;
                    $dataleave['closing_balance'] =  $numMonths - 1;
                    $dataleave['entry_date'] =  date('Y-m-d');
                    $dataleave['date'] =  date('Y-m-d');
                    $this->db->insert(tablename('employee_leaves'), $dataleave);
                  }

                  if($leave_details->credit_month == 'Monthly'){
                    $SysConfigauthenticaton = checkConfig1();

                    if(date('d',strtotime($hire_date)) <= $leave_details->period_day){
                      
                    
                    $dataleave['employee_id'] =  $insert_id;
                    $dataleave['leave_id'] =  $value;
                    $dataleave['credited_month'] =  date('F',strtotime($hire_date));
                    $dataleave['type'] =  'opening leave';
                    $dataleave['opening_balance'] =  $leave_details->unit;
                    $dataleave['closing_balance'] = $leave_details->unit;
                    $dataleave['entry_date'] =  date('Y-m-d');
                    $dataleave['date'] =  date('Y-m-d');
                    $this->db->insert(tablename('employee_leaves'), $dataleave);
                    }else{
                    $forOdNextMonth= date('Y-m-d', strtotime("+1 month", strtotime($hire_date)));
                    $dataleave['employee_id'] =  $insert_id;
                    $dataleave['leave_id'] =  $value;
                    $dataleave['credited_month'] =  date('F',strtotime($forOdNextMonth));
                    $dataleave['type'] =  'opening leave';
                    $dataleave['opening_balance'] =  $leave_details->unit;
                    $dataleave['closing_balance'] = $leave_details->unit;
                    $dataleave['entry_date'] =  $forOdNextMonth;
                     $dataleave['date'] =  $forOdNextMonth;
                    $this->db->insert(tablename('employee_leaves'), $dataleave);
                    }
                  }
                }
              }
              
            }

        if(!empty($leavetype) && !empty($opening_balance)){
          foreach ($leavetype as $key => $value) {
            $dataleave['employee_id'] =  $insert_id;
            $dataleave['leave_id'] =  $value;
            $dataleave['opening_balance'] =  $opening_balance[$key];
            $dataleave['entry_date'] =  date('Y-m-d');
            $this->db->insert(tablename('employee_opening_leave'), $dataleave);
            # code...
          }
          //echo '<pre>'; print_r($dataleave); die;
        }

            if(!empty($passport_no)){
                $datapassport['employee_id'] = $insert_id;
                $datapassport['passport_no'] = $passport_no;
                $datapassport['passport_place_of_issue'] = $passport_place_of_issue;
                $datapassport['passport_country'] = $passport_country;
                $datapassport['passport_issue_date'] = date('y-m-d',strtotime($passport_issue_date));
                $datapassport['passport_expiry_date'] = date('y-m-d',strtotime($passport_expiry_date));
                $datapassport['retained_with_company'] = $retained_with_company;
                if (!empty($passport_imagefileall)) {
                $datapassport['passport_image'] = $passport_imagefileall;
                }
                 $this->db->insert(tablename('employee_passport_visa'), $datapassport);
        }

        if(!empty($closure_type)){
              $dataclosure = array(
            'document'=>$documentPath,
            'type'  =>$closure_type,
            'note' =>$note ,
            'entry_date'=>$last_day_of_work,
            'employee_id'=>$insert_id
        );
        
        if (!empty($attachmentfileall)) {
            $dataclosure['document'] = $attachmentfileall;
        }

        $this->db->insert(tablename('closure'), $dataclosure);
        }

         if(!empty($bank_name)){
            $databank['employee_id'] = $insert_id;
            $databank['bank_name'] = $bank_name;
			$data['branch_name'] = $branch_name;
            $databank['account_no'] = $account_no;
            $databank['agent_rtn_code'] = $agent_rtn_code;
            $databank['default_bank'] = $default;
          $this->db->insert(tablename('employee_bank_details'), $databank);
        }

        $all_experience= $this->EmployeesModel->get_result_data('employee_experience_temp', array());
        if(!empty($all_experience)){
            foreach ($all_experience as $value) {
                 $dataexp = array(
                'employee_id' => $insert_id,
                'company' => $value->company,
                 'job_title' => $value->job_title,
                'from_date' => $value->from_date,
                 'to_date' => $value->to_date,
                  'cv' => $value->cv,
                );
                 $this->db->insert(tablename('employee_experience'), $dataexp);
            }
        }

         $all_education= $this->EmployeesModel->get_result_data('employee_education_temp', array());
        if(!empty($all_education)){
            foreach ($all_education as $value1) {
                 $dataedu = array(
                'employee_id' => $insert_id,
                'level' => $value1->level,
                 'institute' => $value1->institute,
                'year' => $value1->year,
                 'marks' => $value1->marks,
                  'cv' => $value->cv,
                );
                 $this->db->insert(tablename('employee_education'), $dataedu);
            }
        }

            /* if(!empty($highest_qualification)){
                $dataexp = array(
                'employee_id' => $insert_id,
                'highest_qualification' => $_POST['highest_qualification'],
                'skill_details' => $skill_details,
                'entry_date' => date('Y-m-d')
                );
                 if (!empty($cv)) {
                $cv_image = $this->upload_files($cv);
                // echo $cv_image;exit;
                $dataexp['cv'] = $cv_image;
            }

                $this->db->insert(tablename('employee_qualification_experience'), $dataexp);
            }*/

            if(!empty($_POST['pf_checkbox']) && $_POST['pf_checkbox'] == '1'){
                $datapf = array(
                'employee_id' => $insert_id,
                'employee_pf_no' => $_POST['employee_pf_no'],
                'uan_no' => $_POST['uan_no'],
                'no' => $_POST['emp_no'],
                'entry_date' => $date
                );
                $this->db->insert(tablename('employee_pf'), $datapf);
            }

            if(!empty($_POST['esi_checkbox']) && $_POST['esi_checkbox'] == '1'){
                $dataesi = array(
                'employee_id' => $insert_id,
                'esi_no' => $_POST['esi_no'],
                'entry_date' => $date
                );
                $this->db->insert(tablename('employee_esi'), $dataesi);
            }

            if(!empty($_POST['ptax_checkbox']) && $_POST['ptax_checkbox'] == '1'){
                $dataptax = array(
                'employee_id' => $insert_id,
                'ptax_no' => $_POST['ptax_no'],
                'entry_date' => $date
                );
                $this->db->insert(tablename('employee_ptax'), $dataptax);
            }
			
			 if(!empty($_POST['access_permission']) && $_POST['access_permission'] == '1'){
               $dataaccess = array(
			        'employee_id' => $insert_id,
                    'name' => $first_name.' '.$middle_name,
                    'family_name' => $last_name,
                    'emailid' => $contact_email,
                    'password' => md5('123456'),
                    'image' => $personal_image,
                    'entry_date' => $date,
					'menu' => '188'
                );
                $this->db->insert(tablename('admin'), $dataaccess);
            }
             $this->db->truncate('employee_experience_temp'); 
             $this->db->truncate('employee_education_temp'); 
            $this->session->set_flashdata('successmessage', 'Employees added successfully');
            redirect(base_url('edit_employees_details/' . base64_encode($insert_id)));
        }
    }

    public function upload_files($divid) {
        // echo $divid;
        //  echo "<pre>"; print_r($_FILES); die;
        $newName = str_replace(' ', '_', $divid['name']);
        $newImageName = time() . '_file_' . $newName;
        $fileUpload = move_uploaded_file($divid['tmp_name'], 'uploads/' . $newImageName);
        if ($fileUpload) {
            $file = $newImageName;
        } else {
            $file = '';
        }
        return $file;

        // echo $file; die;
    }

    public function upload_files_new($name = NULL, $temp = NULL) {
        // echo $divid;
        //  echo "<pre>"; print_r($_FILES); die;


        $newImageName = str_replace(' ', '_', $name);
        $fileUpload = move_uploaded_file($temp, 'uploads/' . $newImageName);
        if ($fileUpload) {
            $file = $newImageName;
        } else {
            $file = '';
        }
        return $file;

        // echo $file; die;
    }

    public function modify_qualification($id) {
        //echo "<pre>"; print_r($_FILES); die;
        // echo '<pre>';
        // print_r($this->input->post());
        // exit;

        $employee_id = $id;
        $basic_category = $this->input->post('basic_category');
        $university_name = $this->input->post('university_name');
        $certificate_name = $this->input->post('certificate_name');
        $year_graduation = $this->input->post('year_graduation');
        $no_of_year_experience = $this->input->post('no_of_year_experience');
        $no_of_project = $this->input->post('no_of_project');
        $society_of_engineers = $this->input->post('society_of_engineers');
        $society_expiry_date = $this->input->post('society_expiry_date');
        $society_id_front = $_FILES['society_id_front'];
        $society_id_back = $_FILES['society_id_back'];
        $uploaded_date = $this->input->post('uploaded_date');
        $society_reminder_date = $this->input->post('society_reminder_date');

        $dubai_municipality = $this->input->post('dubai_municipality');
        $dubai_municipality_category = $this->input->post('dubai_municipality_category');
        $dubai_municipality_expiry_date = $this->input->post('dubai_municipality_expiry_date');
        $dubai_municipality_id_front = $_FILES['dubai_municipality_id_front'];
        $dubai_municipality_id_back = $_FILES['dubai_municipality_id_back'];
        $dubai_municipality_uploded_date = $this->input->post('dubai_municipality_uploded_date');
        $dubai_municipality_reminder_date = $this->input->post('dubai_municipality_reminder_date');

        $trakhees = $this->input->post('trakhees');
        $trakhees_no_of_card = $this->input->post('trakhees_no_of_card');

        $trakhees_1st_card_color = $this->input->post('trakhees_1st_card_color');
        $trakhees_1st_card_expiry_date = $this->input->post('trakhees_1st_card_expiry_date');
        $trakhees_1st_card_front = $_FILES['trakhees_1st_card_front'];
        $trakhees_1st_card_back = $_FILES['trakhees_1st_card_back'];

        $trakhees_1st_card_uplodaed_date = $this->input->post('trakhees_1st_card_uplodaed_date');

        $trakhees_2nd_card_color = $this->input->post('trakhees_2nd_card_color');
        $trakhees_2nd_card_expiry_date = $this->input->post('trakhees_2nd_card_expiry_date');
        $trakhees_2nd_card_front = $_FILES['trakhees_2nd_card_front'];

        $trakhees_2nd_card_back = $_FILES['trakhees_2nd_card_back'];
        $trakhees_2nd_card_uplodaed_date = $this->input->post('trakhees_2nd_card_uplodaed_date');
        $trakhees_reminder_date = $this->input->post('trakhees_reminder_date');
        $minstry_labor_card = $this->input->post('minstry_labor_card');
        $minstry_labor_card_front = $_FILES['minstry_labor_card_front'];
        $minstry_labor_card_back = $_FILES['minstry_labor_card_back'];

        $minstry_labor_card_expire_date = $this->input->post('minstry_labor_card_expire_date');
        $minstry_labor_card_uploaded_date = $this->input->post('minstry_labor_card_uploaded_date');
        $minstry_labor_card_renewal_date = $this->input->post('minstry_labor_card_renewal_date');
        $minstry_labor_card_reminder_date = $this->input->post('minstry_labor_card_reminder_date');

        $immigration_card = $this->input->post('immigration_card');
        $immigration_card_front = $_FILES['immigration_card_front'];
        $immigration_card_back = $_FILES['immigration_card_back'];

        $immigration_card_expire_date = $this->input->post('immigration_card_expire_date');
        $immigration_card_uploaded_date = $this->input->post('immigration_card_uploaded_date');
        $immigration_card_renewal_date = $this->input->post('immigration_card_renewal_date');
        $immigration_card_reminder_date = $this->input->post('immigration_card_reminder_date');

        $dubai_civil_defence_card = $this->input->post('dubai_civil_defence_card');
        $dubai_civil_defence_card_front = $_FILES['dubai_civil_defence_card_front'];
        $dubai_civil_defence_card_back = $_FILES['dubai_civil_defence_card_back'];

        $dubai_civil_defence_card_expire_date = $this->input->post('dubai_civil_defence_card_expire_date');
        $dubai_civil_defence_card_uploaded_date = $this->input->post('dubai_civil_defence_card_uploaded_date');
        $dubai_civil_defence_card_renewal_date = $this->input->post('dubai_civil_defence_card_renewal_date');

        $dubai_civil_defence_card_reminder_date = $this->input->post('dubai_civil_defence_card_reminder_date');

        $safety_certificate = $_FILES['safety_certificate'];
        $safety_card_front = $_FILES['safety_card_front'];
        $safety_card_back = $_FILES['safety_card_back'];
        $safety_card_expire_date = $this->input->post('safety_card_expire_date');

$highest_qualification = $this->input->post('highest_qualification');

        $skill_details =  implode(',', $this->input->post('skill_details')) ;


        $cv = $_FILES['cv'];
        //  echo '<pre>';
        //   print_r($cv);
        //   exit;
        $date = date("Y-m-d H:i:s");

        $this->db->select('t1.*');
        $this->db->from(tablename('employee_qualification_experience') . ' as t1');
        $this->db->where('t1.employee_id', $id);
        $query = $this->db->get();
        $result = $query->result();
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;
//        if (!empty($result)) {
//            return $result;
//        }

        if (!empty($result)) {


            $data['basic_category'] = $basic_category;
            $data['university_name'] = $university_name;
            $data['certificate_name'] = $certificate_name;
            $data['year_graduation'] = $year_graduation;
            $data['no_of_year_experience'] = $no_of_year_experience;
            $data['no_of_project'] = $no_of_project;
            $data['society_of_engineers'] = $society_of_engineers;
            $data['society_expiry_date'] = $society_expiry_date;
             $data['highest_qualification'] = $highest_qualification;
                $data['skill_details'] = $skill_details;
            if (!empty($society_id_front)) {

                $society_id_back_image = $this->upload_files($society_id_front);
                $data['society_id_front'] = $society_id_back_image;
            }
            if (!empty($society_id_back)) {
                $society_id_back_image = $this->upload_files($society_id_back);
                $data['society_id_back'] = $society_id_back_image;
            }

            $data['uploaded_date'] = $uploaded_date;
            $data['society_reminder_date'] = $society_reminder_date;

            $data['dubai_municipality'] = $dubai_municipality;
            $data['dubai_municipality_category'] = $dubai_municipality_category;
            $data['dubai_municipality_expiry_date'] = $dubai_municipality_expiry_date;
            if (!empty($dubai_municipality_id_front)) {
                $dubai_municipality_id_front_image = $this->upload_files($dubai_municipality_id_front);
                $data['dubai_municipality_id_front'] = $dubai_municipality_id_front_image;
            }
            if (!empty($dubai_municipality_id_back)) {
                $dubai_municipality_id_back_image = $this->upload_files($dubai_municipality_id_back);
                $data['dubai_municipality_id_back'] = $dubai_municipality_id_back_image;
            }
            $data['dubai_municipality_uploded_date'] = $dubai_municipality_uploded_date;
            $data['dubai_municipality_reminder_date'] = $dubai_municipality_reminder_date;
            $data['trakhees'] = $trakhees;
            $data['trakhees_no_of_card'] = $trakhees_no_of_card;
            $data['trakhees_1st_card_color'] = $trakhees_1st_card_color;
            $data['trakhees_1st_card_expiry_date'] = $trakhees_1st_card_expiry_date;
            if (!empty($trakhees_1st_card_front)) {
                $trakhees_1st_card_front_image = $this->upload_files($trakhees_1st_card_front);
                $data['trakhees_1st_card_front'] = $trakhees_1st_card_front_image;
            }
            if (!empty($trakhees_1st_card_back)) {
                $trakhees_1st_card_back_image = $this->upload_files($trakhees_1st_card_back);
                $data['trakhees_1st_card_back'] = $trakhees_1st_card_back_image;
            }
            $data['trakhees_1st_card_uplodaed_date'] = $trakhees_1st_card_uplodaed_date;
            $data['trakhees_2nd_card_color'] = $trakhees_2nd_card_color;
            $data['trakhees_2nd_card_expiry_date'] = $trakhees_2nd_card_expiry_date;
            if (!empty($trakhees_2nd_card_front)) {
                $trakhees_2nd_card_front_image = $this->upload_files($trakhees_2nd_card_front);
                $data['trakhees_2nd_card_front'] = $trakhees_2nd_card_front_image;
            }
            if (!empty($trakhees_2nd_card_back)) {
                $trakhees_2nd_card_back_image = $this->upload_files($trakhees_2nd_card_back);
                $data['trakhees_2nd_card_back'] = $trakhees_2nd_card_back_image;
            }
            $data['trakhees_2nd_card_uplodaed_date'] = $trakhees_2nd_card_uplodaed_date;
            $data['trakhees_reminder_date'] = $trakhees_reminder_date;
            if (!empty($cv)) {
                $cv_image = $this->upload_files($cv);
                // echo $cv_image;exit;
                $data['cv'] = $cv_image;
            }

//exit;
            $data['minstry_labor_card'] = $minstry_labor_card;
            $data['minstry_labor_card_expire_date'] = $minstry_labor_card_expire_date;
            if (!empty($minstry_labor_card_front)) {

                $minstry_labor_card_front_image = $this->upload_files($minstry_labor_card_front);
                $data['minstry_labor_card_front'] = $minstry_labor_card_front_image;
            }
            if (!empty($minstry_labor_card_back)) {
                $minstry_labor_card_back_image = $this->upload_files($minstry_labor_card_back);
                $data['minstry_labor_card_back'] = $minstry_labor_card_back_image;
            }
            $data['minstry_labor_card_uploaded_date'] = $minstry_labor_card_uploaded_date;
            $data['minstry_labor_card_renewal_date'] = $minstry_labor_card_renewal_date;
            $data['minstry_labor_card_reminder_date'] = $minstry_labor_card_reminder_date;
            $data['immigration_card'] = $immigration_card;
            $data['immigration_card_expire_date'] = $immigration_card_expire_date;
            if (!empty($immigration_card_front)) {

                $immigration_card_front_image = $this->upload_files($immigration_card_front);
                $data['immigration_card_front'] = $immigration_card_front_image;
            }
            if (!empty($immigration_card_back)) {
                $immigration_card_back_image = $this->upload_files($immigration_card_back);
                $data['immigration_card_back'] = $immigration_card_back_image;
            }
            $data['immigration_card_uploaded_date'] = $immigration_card_uploaded_date;
            $data['immigration_card_renewal_date'] = $immigration_card_renewal_date;

            $data['immigration_card_reminder_date'] = $immigration_card_reminder_date;

            $data['dubai_civil_defence_card'] = $dubai_civil_defence_card;
            $data['dubai_civil_defence_card_expire_date'] = $dubai_civil_defence_card_expire_date;
            if (!empty($immigration_card_front)) {

                $dubai_civil_defence_card_front_image = $this->upload_files($dubai_civil_defence_card_front);
                $data['dubai_civil_defence_card_front'] = $dubai_civil_defence_card_front_image;
            }
            if (!empty($dubai_civil_defence_card_back)) {
                $dubai_civil_defence_card_back_image = $this->upload_files($dubai_civil_defence_card_back);
                $data['dubai_civil_defence_card_back'] = $dubai_civil_defence_card_back_image;
            }
            $data['dubai_civil_defence_card_uploaded_date'] = $dubai_civil_defence_card_uploaded_date;
            $data['dubai_civil_defence_card_renewal_date'] = $dubai_civil_defence_card_renewal_date;

            $data['dubai_civil_defence_card_reminder_date'] = $dubai_civil_defence_card_reminder_date;



            if (!empty($safety_certificate)) {

                $safety_certificate_image = $this->upload_files($safety_certificate);
                $data['safety_certificate'] = $safety_certificate_image;
            }

            $data['safety_card_expire_date'] = $safety_card_expire_date;
            if (!empty($safety_card_front)) {

                $safety_card_front_image = $this->upload_files($safety_card_front);
                $data['safety_card_front'] = $safety_card_front_image;
            }
            if (!empty($safety_card_back)) {
                $safety_card_back_image = $this->upload_files($safety_card_back);
                $data['safety_card_back'] = $safety_card_back_image;
            }


            $data['modified_date'] = $date;

            //  echo '<pre>';
            //   print_r($data);
            //  exit;
//echo $id;exit;
            $this->db->where('employee_id', base64_decode($id))->update(tablename('employee_qualification_experience'), $data);

            $this->session->set_flashdata('successmessage', 'Employees modified successfully');
            redirect(base_url('edit_employees_details/' . $id));
        } else {

            $data['employee_id'] = base64_decode($id);
            $data['basic_category'] = $basic_category;
            $data['university_name'] = $university_name;
            $data['certificate_name'] = $certificate_name;
            $data['year_graduation'] = $year_graduation;
            $data['no_of_year_experience'] = $no_of_year_experience;
            $data['no_of_project'] = $no_of_project;
            $data['society_of_engineers'] = $society_of_engineers;
            $data['society_expiry_date'] = $society_expiry_date;
             $data['highest_qualification'] = $highest_qualification;
                $data['skill_details'] = $skill_details;
            if (!empty($society_id_front)) {

                $society_id_back_image = $this->upload_files($society_id_front);
                $data['society_id_front'] = $society_id_back_image;
            }
            if (!empty($society_id_back)) {
                $society_id_back_image = $this->upload_files($society_id_back);
                $data['society_id_back'] = $society_id_back_image;
            }

            $data['uploaded_date'] = $uploaded_date;
            $data['society_reminder_date'] = $society_reminder_date;
            $data['dubai_municipality'] = $dubai_municipality;
            $data['dubai_municipality_category'] = $dubai_municipality_category;
            $data['dubai_municipality_expiry_date'] = $dubai_municipality_expiry_date;
            if (!empty($dubai_municipality_id_front)) {
                $dubai_municipality_id_front_image = $this->upload_files($dubai_municipality_id_front);
                $data['dubai_municipality_id_front'] = $dubai_municipality_id_front_image;
            }
            if (!empty($dubai_municipality_id_back)) {
                $dubai_municipality_id_back_image = $this->upload_files($dubai_municipality_id_back);
                $data['dubai_municipality_id_back'] = $dubai_municipality_id_back_image;
            }
            $data['dubai_municipality_uploded_date'] = $dubai_municipality_uploded_date;
            $data['dubai_municipality_reminder_date'] = $dubai_municipality_reminder_date;

            $data['trakhees'] = $trakhees;
            $data['trakhees_no_of_card'] = $trakhees_no_of_card;
            $data['trakhees_1st_card_color'] = $trakhees_1st_card_color;
            $data['trakhees_1st_card_expiry_date'] = $trakhees_1st_card_expiry_date;
            if (!empty($trakhees_1st_card_front)) {
                $trakhees_1st_card_front_image = $this->upload_files($trakhees_1st_card_front);
                $data['trakhees_1st_card_front'] = $trakhees_1st_card_front_image;
            }
            if (!empty($trakhees_1st_card_back)) {
                $trakhees_1st_card_back_image = $this->upload_files($trakhees_1st_card_back);
                $data['trakhees_1st_card_back'] = $trakhees_1st_card_back_image;
            }
            $data['trakhees_1st_card_uplodaed_date'] = $trakhees_1st_card_uplodaed_date;
            $data['trakhees_2nd_card_color'] = $trakhees_2nd_card_color;
            $data['trakhees_2nd_card_expiry_date'] = $trakhees_2nd_card_expiry_date;
            if (!empty($trakhees_2nd_card_front)) {
                $trakhees_2nd_card_front_image = $this->upload_files($trakhees_2nd_card_front);
                $data['trakhees_2nd_card_front'] = $trakhees_2nd_card_front_image;
            }
            if (!empty($trakhees_2nd_card_back)) {
                $trakhees_2nd_card_back_image = $this->upload_files($trakhees_2nd_card_back);
                $data['trakhees_2nd_card_back'] = $trakhees_2nd_card_back_image;
            }
            $data['trakhees_2nd_card_uplodaed_date'] = $trakhees_2nd_card_uplodaed_date;
            $data['trakhees_reminder_date'] = $trakhees_reminder_date;
            if (!empty($cv)) {
                $cv_image = $this->upload_files($cv);
                $data['cv'] = $cv_image;
            }

            $data['minstry_labor_card'] = $minstry_labor_card;
            $data['minstry_labor_card_expire_date'] = $minstry_labor_card_expire_date;
            if (!empty($minstry_labor_card_front)) {

                $minstry_labor_card_front_image = $this->upload_files($minstry_labor_card_front);
                $data['minstry_labor_card_front'] = $minstry_labor_card_front_image;
            }
            if (!empty($minstry_labor_card_back)) {
                $minstry_labor_card_back_image = $this->upload_files($minstry_labor_card_back);
                $data['minstry_labor_card_back'] = $minstry_labor_card_back_image;
            }
            $data['minstry_labor_card_uploaded_date'] = $minstry_labor_card_uploaded_date;
            $data['minstry_labor_card_renewal_date'] = $minstry_labor_card_renewal_date;
            $data['minstry_labor_card_reminder_date'] = $minstry_labor_card_reminder_date;
            $data['immigration_card'] = $immigration_card;
            $data['immigration_card_expire_date'] = $immigration_card_expire_date;
            if (!empty($immigration_card_front)) {

                $immigration_card_front_image = $this->upload_files($immigration_card_front);
                $data['immigration_card_front'] = $immigration_card_front_image;
            }
            if (!empty($immigration_card_back)) {
                $immigration_card_back_image = $this->upload_files($immigration_card_back);
                $data['immigration_card_back'] = $immigration_card_back_image;
            }
            $data['immigration_card_uploaded_date'] = $immigration_card_uploaded_date;
            $data['immigration_card_renewal_date'] = $immigration_card_renewal_date;
            $data['immigration_card_reminder_date'] = $immigration_card_reminder_date;

            $data['dubai_civil_defence_card'] = $dubai_civil_defence_card;
            $data['dubai_civil_defence_card_expire_date'] = $dubai_civil_defence_card_expire_date;
            if (!empty($immigration_card_front)) {

                $dubai_civil_defence_card_front_image = $this->upload_files($dubai_civil_defence_card_front);
                $data['dubai_civil_defence_card_front'] = $dubai_civil_defence_card_front_image;
            }
            if (!empty($dubai_civil_defence_card_back)) {
                $dubai_civil_defence_card_back_image = $this->upload_files($dubai_civil_defence_card_back);
                $data['dubai_civil_defence_card_back'] = $dubai_civil_defence_card_back_image;
            }
            $data['dubai_civil_defence_card_uploaded_date'] = $dubai_civil_defence_card_uploaded_date;
            $data['dubai_civil_defence_card_renewal_date'] = $dubai_civil_defence_card_renewal_date;
            $data['dubai_civil_defence_card_reminder_date'] = $dubai_civil_defence_card_reminder_date;
            $data['entry_date'] = date('Y-m-d');
            $data['modified_date'] = $date;


            $this->db->insert(tablename('employee_qualification_experience'), $data);
            $insert_id = $this->db->insert_id();
            $this->session->set_flashdata('successmessage', 'Employees added successfully');
            redirect(base_url('edit_employees_details/' . $id));
        }
    }

    /**
     * Used for get employees by id
     *
     * <p>Description</p>
     *
     * <p>This function get employees by id from table [Table: employee]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function modify_expenses($id) {
        //echo "<pre>"; print_r($_FILES); die;
        // echo '<pre>';
        // print_r($this->input->post());
        // exit;

        $employee_id = $id;
        $expenses_name = $this->input->post('expenses_name');
        $from_year = $this->input->post('from_year');
        $to_year = $this->input->post('to_year');
        $visa_cost = $this->input->post('visa_cost');
        $insurance_cost = $this->input->post('insurance_cost');
        $other_cost = $this->input->post('other_cost');


        $this->db->select('t1.*');
        $this->db->from(tablename('employee_expenses') . ' as t1');
        $this->db->where('t1.employee_id', $id);
        $query = $this->db->get();
        $result = $query->result();
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;
//        if (!empty($result)) {
//            return $result;
//        }



        if ($this->input->post('expenses_edit_id') != '') {


            $data['expenses_name'] = $expenses_name;
            $data['from_year'] = $from_year;
            $data['to_year'] = $to_year;
            $data['visa_cost'] = $visa_cost;
            $data['insurance_cost'] = $insurance_cost;
            $data['other_cost'] = $other_cost;
            //$data['society_of_engineers'] = $society_of_engineers;


            $this->db->where('id', $this->input->post('expenses_edit_id'))->update(tablename('employee_expenses'), $data);

            $this->session->set_flashdata('successmessage', 'Employees modified successfully');
            //  redirect(base_url('edit_employees_details/' . $id));
        } else {

            $data['employee_id'] = $id;
            $data['expenses_name'] = $expenses_name;
            $data['from_year'] = $from_year;
            $data['to_year'] = $to_year;
            $data['visa_cost'] = $visa_cost;
            $data['insurance_cost'] = $insurance_cost;
            $data['other_cost'] = $other_cost;



            $this->db->insert(tablename('employee_expenses'), $data);
            $insert_id = $this->db->insert_id();
            $this->session->set_flashdata('successmessage', 'Employees added successfully');
            // redirect(base_url('edit_employees_details/' . $id));
        }
    }
    
     public function modify_bank($id) {
        //echo "<pre>"; print_r($_FILES); die;
        // echo '<pre>';
        // print_r($this->input->post());
        // exit;

        $employee_id = $id;
        $bank_name = $this->input->post('bank_name');
        $account_no = $this->input->post('account_no');
        $agent_rtn_code = $this->input->post('agent_rtn_code');
        $default = $this->input->post('default');
       // $insurance_cost = $this->input->post('insurance_cost');
       // $other_cost = $this->input->post('other_cost');


        $this->db->select('t1.*');
        $this->db->from(tablename('employee_bank_details') . ' as t1');
        $this->db->where('t1.employee_id', $id);
        $query = $this->db->get();
        $result = $query->result();
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;
//        if (!empty($result)) {
//            return $result;
//        }



        if ($this->input->post('bank_edit_id') != '') {


            $data['bank_name'] = $bank_name;
			$data['branch_name'] = $branch_name;
            $data['account_no'] = $account_no;
            $data['agent_rtn_code'] = $agent_rtn_code;
            $data['default_bank'] = $default;
           // $data['insurance_cost'] = $insurance_cost;
          //  $data['other_cost'] = $other_cost;
            //$data['society_of_engineers'] = $society_of_engineers;


            $this->db->where('id', $this->input->post('bank_edit_id'))->update(tablename('employee_bank_details'), $data);

            $this->session->set_flashdata('successmessage', 'Bank Details modified successfully');
            //  redirect(base_url('edit_employees_details/' . $id));
        } else {

            $data['employee_id'] = $id;
            $data['bank_name'] = $bank_name;
			$data['branch_name'] = $branch_name;
			
            $data['account_no'] = $account_no;
            $data['agent_rtn_code'] = $agent_rtn_code;
            $data['default_bank'] = $default;



            $this->db->insert(tablename('employee_bank_details'), $data);
            $insert_id = $this->db->insert_id();
            $this->session->set_flashdata('successmessage', 'Bank Details added successfully');
            // redirect(base_url('edit_employees_details/' . $id));
        }
    }

    public function load_single_data($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('employee'));
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    public function load_single_data_pf($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('employee_pf'));
        $this->db->where('employee_id', $id);
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    public function load_single_data_esi($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('employee_esi'));
        $this->db->where('employee_id', $id);
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    public function load_single_data_ptax($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('employee_ptax'));
        $this->db->where('employee_id', $id);
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
    
     public function all_data_complaints($id = "") {
        $this->db->select('t1.*,HR_employee.employee_no,HR_employee.first_name,HR_employee.middle_name,HR_employee.last_name');
         $this->db->from(tablename('complaints') . ' as t1');
        $this->db->join('HR_employee', 'HR_employee.id = t1.employee_id');
        $this->db->where('employee_id', $id);
        $query = $this->db->get();
        $result = $query->result();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    public function load_data_qualification($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('employee_qualification_experience'));
        $this->db->where('employee_id', $id);
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    public function load_certificate_type() {
        $this->db->select('*');
        $this->db->from(tablename('certificate_type'));
       // $this->db->where('employee_id', $id);
        $query = $this->db->get();
        $result = $query->result();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
      public function load_data_benifit_single($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('employee_assign_policy'));
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    public function load_data_expenses_single($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('employee_expenses'));
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
    
     public function load_data_bank_single($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('employee_bank_details'));
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
    
    public function loan_payment_details($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('employee_bank_details'));
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    public function load_data_expenses($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('employee_expenses'));
        $this->db->where('employee_id', $id);
        $query = $this->db->get();
        $result = $query->result();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
    
      public function load_data_bank($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('employee_bank_details'));
        $this->db->where('employee_id', $id);
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    /**
     * Used for get employees exp/edu/att by id 
     *
     * <p>Description</p>
     *
     * <p>This function get employees exp/edu/attby id from table [Table: employee exp/edu/att]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_single_data_details($table = "", $id = "") {
        $this->db->select('*');
        $this->db->from(tablename($table));
        $this->db->where('rec_candidate_id', $id);
        $query = $this->db->get();
        $result = $query->result();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    /**
     * Used for status employees
     *
     * <p>Description</p>
     *
     * <p>This function status employees [Table: employee]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function status_change($id) {
        $this->db->select('*');
        $this->db->from(tablename('employee'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');

        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {
            $is_active = $result->is_active;

            if ($is_active == "N") {
                $new_is_active = "Y";
            } else {
                $new_is_active = "N";
            }
            $update_faq = array('is_active' => $new_is_active);
            $this->db->where('id', $id);
            if ($this->db->update('employee', $update_faq)) {
                $this->session->set_flashdata('successmessage', 'Employees Status changed successfully');
                redirect(base_url('page/43/1'));
            } else {
                $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
                redirect(base_url('page/43/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Employees not matched');
            redirect(base_url('page/43/1'));
        }
    }

    /**
     * Used for delete employees
     *
     * <p>Description</p>
     *
     * <p>This function delete employees [Table: employee]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function delete_this($id) {
        $this->db->select('*');
        $this->db->from(tablename('employee'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result)) {
            $update_faq = array('is_active' => 'N', 'delete_flag' => 'Y');
            $this->db->where('id', $id);
            if ($this->db->update('HR_employee', $update_faq)) {
                $this->session->set_flashdata('successmessage', 'Employees Deleted successfully');
                redirect(base_url('page/43/1'));
            } else {
                $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
                redirect(base_url('page/43/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Employees not matched');
            redirect(base_url('page/43/1'));
        }
    }

    public function load_data_loan_application_single($id = "") {
        $this->db->select('HR_employee_loan_application.*,HR_employee.first_name,HR_employee.middle_name,HR_employee.last_name,HR_employee.employee_no');
        $this->db->from(tablename('employee_loan_application'));
        $this->db->join('HR_employee', 'HR_employee_loan_application.employee_id = HR_employee.id');
        $this->db->where('HR_employee_loan_application.id', $id);
        $query = $this->db->get();
        $result = $query->row();
//echo $this->db->last_query();exit;
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
    
     public function load_all_policy() {
        $this->db->select('t1.*');
        $this->db->from(tablename('insurance_policies') . ' as t1');
        $this->db->where('t1.insurence_for', 'employee');
        $this->db->where('t1.delete_flag', 'N');
         $this->db->where('t1.is_active', 'Y');
        $query = $this->db->get();
        $result = $query->result();
//echo $this->db->last_query();exit;
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
    
     public function  load_passport_single($id = "") {
        $this->db->select('HR_employee_passport_visa.*,HR_employee.first_name,HR_employee.middle_name,HR_employee.last_name,HR_employee.employee_no');
        $this->db->from(tablename('employee_passport_visa'));
        $this->db->join('HR_employee', 'HR_employee_passport_visa.employee_id = HR_employee.id');
        $this->db->where('HR_employee_passport_visa.employee_id', $id);
        $query = $this->db->get();
        $result = $query->row();
//echo $this->db->last_query();exit;
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
    
      public function load_all_employee_policy($id = "") {
        $this->db->select('HR_employee_assign_policy.*,HR_insurance_policies.policy_name');
        $this->db->from(tablename('employee_assign_policy'));
        $this->db->join('HR_insurance_policies', 'HR_employee_assign_policy.policy_id = HR_insurance_policies.id');
        $this->db->where('HR_employee_assign_policy.employee_id', $id);
        $query = $this->db->get();
        $result = $query->result();
//echo $this->db->last_query();exit;
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
//     public function load_all_employee_policy($id = "") {
//        $this->db->select('HR_employee_leave_application.*');
//        $this->db->from(tablename('employee_leave_application'));
//       // $this->db->join('HR_insurance_policies', 'HR_employee_assign_policy.policy_id = HR_insurance_policies.id');
//        $this->db->where('HR_employee_leave_application.employee_id', $id);
//        $query = $this->db->get();
//        $result = $query->result();
////echo $this->db->last_query();exit;
//        if (!empty($result)) {
//            return $result;
//        } else {
//            return array();
//        }
//    }
    public function load_all_leave_application($id = "") {
        $this->db->select('HR_employee_leave_application.*');
        $this->db->from(tablename('employee_leave_application'));
       // $this->db->join('HR_insurance_policies', 'HR_employee_assign_policy.policy_id = HR_insurance_policies.id');
        $this->db->where('HR_employee_leave_application.employee_id', $id);
        $query = $this->db->get();
        $result = $query->result();
//echo $this->db->last_query();exit;
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    public function load_data_loan_application($id = "") {
        $this->db->select('HR_employee_loan_application.*,HR_employee.first_name,HR_employee.middle_name,HR_employee.last_name,HR_employee.employee_no');
        $this->db->from(tablename('employee_loan_application'));
        $this->db->join('HR_employee', 'HR_employee_loan_application.employee_id = HR_employee.id');
        $this->db->where('HR_employee_loan_application.employee_id', $id);
        $query = $this->db->get();
        $result = $query->result();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    public function modify_employees_loan_application($id) {
        // echo '<pre>';
        //  print_r($this->input->post());
        // exit;
        $this->db->select('t1.*');
        $this->db->from(tablename('employee_loan_application') . ' as t1');
        $this->db->where('t1.employee_id', $id);
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result->attachment)) {
            $allattach = $result->attachment;
        } else {
            $allattach = '';
        }
        $employee_id = $id;
        $reference_name = $this->input->post('reference_name');
        $request_amount = $this->input->post('request_amount');
        $loan_requirement_note = $this->input->post('loan_requirement_note');

        $attachmentfileall = '';
        $attachmentfile = '';
        $attachment = $_FILES['attachment'];
        // echo '<pre>';
        //   print_r($attachment);
        //   exit;
        if (!empty($attachment)) {
            for ($i = 0; $i <= count($attachment['name']); $i++) {

                if (!empty($attachment['name'][$i])) {

                    $attachment_doc = $this->upload_files_new($attachment['name'][$i], $attachment['tmp_name'][$i]);
                    $attachmentfile.=$attachment_doc . ',';
                }
                //  $data['dubai_civil_defence_card_back'] = $dubai_civil_defence_card_back_image;
            }
            $attachmentfile = $attachmentfile . $allattach;
            if (!empty($attachmentfile)) {
                $attachmentfileall = rtrim($attachmentfile, ',');
            }
            // echo $attachmentfileall;
        }
        //   exit;

        $loan_approved = $this->input->post('loan_approved');
        $loan_sanction_note = $this->input->post('loan_sanction_note');
        $sanction_amount = $this->input->post('sanction_amount');
        $installment_amount = $this->input->post('installment_amount');
        $installment_start_date = $this->input->post('installment_start_date');
        $deduction_from_salary = $this->input->post('deduction_from_salary');
        $loan_issue_date = $this->input->post('loan_issue_date');
        $tenure_in_months = $this->input->post('tenure_in_months');
        $loan_end_date = $this->input->post('loan_end_date');
        $loan_cancel_note = $this->input->post('loan_cancel_note');





        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;
//        if (!empty($result)) {
//            return $result;
//        }



        if ($this->input->post('loan_application_edit_id') != '') {

            //$data['employee_id'] = $id;
            $data['reference_name'] = $reference_name;
            $data['request_amount'] = $request_amount;
            $data['loan_requirement_note'] = $loan_requirement_note;
            if (!empty($attachmentfileall)) {
                $data['attachment'] = $attachmentfileall;
            }
            $data['loan_approved'] = $loan_approved;
            $data['loan_sanction_note'] = $loan_sanction_note;
            $data['sanction_amount'] = $sanction_amount;
            $data['installment_amount'] = $installment_amount;
            $data['installment_start_date'] = $installment_start_date;
            $data['deduction_from_salary'] = $deduction_from_salary;
            $data['loan_issue_date'] = $loan_issue_date;
            $data['tenure_in_months'] = $tenure_in_months;
            $data['loan_end_date'] = $loan_end_date;
            $data['loan_cancel_note'] = $loan_cancel_note;

            //$data['society_of_engineers'] = $society_of_engineers;


            $this->db->where('id', $this->input->post('loan_application_edit_id'))->update(tablename('employee_loan_application'), $data);
//echo $this->db->last_query();exit;
            $this->session->set_flashdata('successmessage', 'Employees modified successfully');
            //  redirect(base_url('edit_employees_details/' . $id));
        } else {

            $data['employee_id'] = $id;
            $data['reference_name'] = $reference_name;
            $data['request_amount'] = $request_amount;
            $data['loan_requirement_note'] = $loan_requirement_note;
            if (!empty($attachmentfileall)) {
                $data['attachment'] = $attachmentfileall;
            }
            $data['loan_approved'] = $loan_approved;
            $data['loan_sanction_note'] = $loan_sanction_note;
            $data['sanction_amount'] = $sanction_amount;
            $data['installment_amount'] = $installment_amount;
            $data['installment_start_date'] = $installment_start_date;
            $data['deduction_from_salary'] = $deduction_from_salary;
            $data['loan_issue_date'] = $loan_issue_date;
            $data['tenure_in_months'] = $tenure_in_months;
            $data['loan_end_date'] = $loan_end_date;
            $data['loan_cancel_note'] = $loan_cancel_note;



            $this->db->insert(tablename('employee_loan_application'), $data);
            $insert_id = $this->db->insert_id();
            $this->session->set_flashdata('successmessage', 'Employees added successfully');
             redirect(base_url('edit_employees_details/' . $id));
        }
    }

    public function modify_employees_loan_payment($id) {

        $employee_id = $id;
        $payment_date = $this->input->post('payment_date');
        $loan_id = $this->input->post('loan_id');
        $installment_amount_pay = $this->input->post('installment_amount_pay');

        $data['employee_id'] = $id;
        $data['payment_date'] = $payment_date;
        $data['loan_id'] = $loan_id;
        $data['amount'] = $installment_amount_pay;

        //  echo '<pre>';
        // print_r($data);
        // exit;

        $this->db->insert(tablename('employee_loan_payment'), $data);
        $insert_id = $this->db->insert_id();
        $this->session->set_flashdata('successmessage', 'Payment added successfully');
        return $insert_id;
        // redirect(base_url('edit_employees_details/' . $id));
    }
 public function load_data_loan_total_payment($id = "") {
        $this->db->select('sum(HR_employee_loan_payment.amount) as totalamount');
        $this->db->from(tablename('employee_loan_payment'));
        $this->db->where('loan_id', $id);
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
    public function load_data_loan_payment($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('employee_loan_payment'));
        $this->db->where('loan_id', $id);
        $query = $this->db->get();
        $result = $query->result();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    public function modify_passport_visa($id) {
         //echo '<pre>';
        // print_r($this->input->post());
         //exit;
        $this->db->select('t1.*');
        $this->db->from(tablename('employee_passport_visa') . ' as t1');
        $this->db->where('t1.employee_id', $id);
        $query = $this->db->get();
        $result = $query->row();
       

//echo $this->db->last_query();exit;


        $employee_id = $id;
        $passport_no = $this->input->post('passport_no');
        $passport_place_of_issue = $this->input->post('passport_place_of_issue');
        $passport_country = $this->input->post('passport_country');
        $passport_issue_date = $this->input->post('passport_issue_date');
        $passport_expiry_date = $this->input->post('passport_expiry_date');
        $retained_with_company = $this->input->post('retained_with_company');
        
        
        
        
         if (!empty($result->passport_image)) {
            $allpassport_image = $result->passport_image;
        } else {
            $allpassport_image = '';
        }

        $passport_imagefileall = '';
        $passport_imagefile = '';
        $passport_image = $_FILES['passport_image'];

        if (!empty($passport_image)) {
            for ($i = 0; $i <= count($passport_image['name']); $i++) {

                if (!empty($passport_image['name'][$i])) {

                    $passport_image_doc = $this->upload_files_new($passport_image['name'][$i], $passport_image['tmp_name'][$i]);
                    $passport_imagefile.=$passport_image_doc . ',';
                }
            }
            $passport_imagefile = $passport_imagefile . $allpassport_image;
            if (!empty($passport_imagefile)) {
                //1111//
                $passport_imagefileall = rtrim($passport_imagefile, ',');
            }
        }
       
        
       
        
        
          if (!empty($result->employment_offer_image)) {
            $allemployment_offer_image = $result->employment_offer_image;
        } else {
            $allemployment_offer_image = '';
        }

        $employment_offer_imagefileall = '';
        $employment_offer_imagefile = '';
        $employment_offer_image = $_FILES['employment_offer_image'];

        if (!empty($employment_offer_image)) {
            for ($i = 0; $i <= count($employment_offer_image['name']); $i++) {

                if (!empty($employment_offer_image['name'][$i])) {

                    $employment_offer_image_doc = $this->upload_files_new($employment_offer_image['name'][$i], $employment_offer_image['tmp_name'][$i]);
                    $employment_offer_imagefile.=$employment_offer_image_doc . ',';
                }
            }
            $employment_offer_imagefile = $employment_offer_imagefile . $allemployment_offer_image;
            if (!empty($employment_offer_imagefile)) {
                 //1111//
                $employment_offer_imagefileall = rtrim($employment_offer_imagefile, ',');
            }
        }
        
     
        
        $employment_offer_date = $this->input->post('employment_offer_date');
        $employment_offer_cost = $this->input->post('employment_offer_cost');
        
        
         if (!empty($result->work_permit_application_image)) {
            $allwork_permit_application_image = $result->work_permit_application_image;
        } else {
            $allwork_permit_application_image = '';
        }

        $work_permit_application_imagefileall = '';
        $work_permit_application_imagefile = '';
        $work_permit_application_image = $_FILES['work_permit_application_image'];

        if (!empty($work_permit_application_image)) {
            for ($i = 0; $i <= count($work_permit_application_image['name']); $i++) {

                if (!empty($work_permit_application_image['name'][$i])) {

                    $work_permit_application_image_doc = $this->upload_files_new($work_permit_application_image['name'][$i], $work_permit_application_image['tmp_name'][$i]);
                    $work_permit_application_imagefile.=$work_permit_application_image_doc . ',';
                }
            }
            $work_permit_application_imagefile = $work_permit_application_imagefile . $allwork_permit_application_image;
            if (!empty($work_permit_application_imagefile)) {
                 //1111//
                $work_permit_application_imagefileall = rtrim($work_permit_application_imagefile, ',');
            }
        }
        
       
        
        $work_permit_application_date = $this->input->post('work_permit_application_date');
        $work_permit_application_cost = $this->input->post('work_permit_application_cost');
        
        
        if (!empty($result->employment_contact_image)) {
            $allemployment_contact_image = $result->employment_contact_image;
        } else {
            $allemployment_contact_image = '';
        }

        $employment_contact_imagefileall = '';
        $employment_contact_imagefile = '';
        $employment_contact_image = $_FILES['employment_contact_image'];

        if (!empty($employment_contact_image)) {
            for ($i = 0; $i <= count($employment_contact_image['name']); $i++) {

                if (!empty($employment_contact_image['name'][$i])) {

                    $employment_contact_image_doc = $this->upload_files_new($employment_contact_image['name'][$i], $employment_contact_image['tmp_name'][$i]);
                    $employment_contact_imagefile.=$employment_contact_image_doc . ',';
                }
            }
            $employment_contact_imagefile = $employment_contact_imagefile . $allemployment_contact_image;
            if (!empty($employment_contact_imagefile)) {
                 //1111//
                $employment_contact_imagefileall = rtrim($employment_contact_imagefile, ',');
            }
        }
        
       
         
        $employment_contact_date = $this->input->post('employment_contact_date');
        $employment_contact_cost = $this->input->post('employment_contact_cost');
        $bank_gurantee_policy_no = $this->input->post('bank_gurantee_policy_no');
         $name_of_finance_institution = $this->input->post('name_of_finance_institution');
        $bank_gurantee_finance_amount = $this->input->post('bank_gurantee_finance_amount');
        
         if (!empty($result->electronic_work_permit)) {
            $allelectronic_work_permit = $result->electronic_work_permit;
        } else {
            $allelectronic_work_permit = '';
        }

        $electronic_work_permitfileall = '';
        $electronic_work_permitfile = '';
        $electronic_work_permit = $_FILES['electronic_work_permit'];

        if (!empty($electronic_work_permit)) {
            for ($i = 0; $i <= count($electronic_work_permit['name']); $i++) {

                if (!empty($electronic_work_permit['name'][$i])) {

                    $electronic_work_permit_doc = $this->upload_files_new($electronic_work_permit['name'][$i], $electronic_work_permit['tmp_name'][$i]);
                    $electronic_work_permitfile.=$electronic_work_permit_doc . ',';
                }
            }
            $electronic_work_permitfile = $electronic_work_permitfile . $allelectronic_work_permit;
            if (!empty($electronic_work_permitfile)) {
                 //1111//
                $electronic_work_permitfileall = rtrim($electronic_work_permitfile, ',');
            }
        }
        
        
         
        $electronic_work_permit_date = $this->input->post('electronic_work_permit_date');
         $electronic_work_permit_cost = $this->input->post('electronic_work_permit_cost');
        $ministry_card_no = $this->input->post('ministry_card_no');
         $personal_id = $this->input->post('personal_id');
        $ministry_card_issue_date = $this->input->post('ministry_card_issue_date');
         $ministry_card_expiry_date = $this->input->post('ministry_card_expiry_date');
        $labor_card_cost = $this->input->post('labor_card_cost');
        $labor_card_image=$_FILES['labor_card_image'];
         if (!empty($labor_card_image)) {
                $labor_card_image_file = $this->upload_files($labor_card_image);
              //  $data['dubai_civil_defence_card_back'] = $labor_card_image_file;
            }
            else{
                //1111//
                $labor_card_image_file='';
            }
    
         
        $employment_visa_in_country_issue_date = $this->input->post('employment_visa_in_country_issue_date');
         $employment_visa_in_country_expiry_date = $this->input->post('employment_visa_in_country_expiry_date');
        $employment_visa_in_country_cost = $this->input->post('employment_visa_in_country_cost');
        
         $employment_visa_in_country_image=$_FILES['employment_visa_in_country_image'];
         if (!empty($employment_visa_in_country_image)) {
                $employment_visa_in_country_image_file = $this->upload_files($employment_visa_in_country_image);
              //  $data['dubai_civil_defence_card_back'] = $labor_card_image_file;
            }
            else{
                //1111//
                $employment_visa_in_country_image_file='';
            }
      
         
        $employment_visa_out_country_issue_date = $this->input->post('employment_visa_out_country_issue_date');
         $employment_visa_out_country_expiry_date = $this->input->post('employment_visa_out_country_expiry_date');
        $employment_visa_out_country_cost = $this->input->post('employment_visa_out_country_cost');
        
         $employment_visa_out_country_image=$_FILES['employment_visa_out_country_image'];
         if (!empty($employment_visa_out_country_image)) {
               $employment_visa_out_country_image_file = $this->upload_files($employment_visa_out_country_image);
              //  $data['dubai_civil_defence_card_back'] = $labor_card_image_file;
            }
            else{
                //1111//
                $employment_visa_out_country_image_file='';
            }
        
      
         
        $employment_visa_out_country_entry_date = $this->input->post('employment_visa_out_country_entry_date');
        
          $medical_test_application_image=$_FILES['medical_test_application_image'];
         if (!empty($medical_test_application_image)) {
               $medical_test_application_image_file = $this->upload_files($medical_test_application_image);
              //  $data['dubai_civil_defence_card_back'] = $labor_card_image_file;
            }
            else{
                //1111//
                $medical_test_application_image_file='';
            }
        
      
         
        $medical_test_cost = $this->input->post('medical_test_cost');
        
          $employment_visa_out_country_entry_date = $this->input->post('employment_visa_out_country_entry_date');
        
          $medical_test_result_image=$_FILES['medical_test_result_image'];
         if (!empty($medical_test_result_image)) {
               $medical_test_result_image_file = $this->upload_files($medical_test_result_image);
              //  $data['dubai_civil_defence_card_back'] = $labor_card_image_file;
            }
            else{
                //1111//
                $medical_test_result_image_file='';
            }
        
       $emirates_id_application_image=$_FILES['emirates_id_application_image'];
         if (!empty($emirates_id_application_image)) {
               $emirates_id_application_image_file = $this->upload_files($emirates_id_application_image);
              //  $data['dubai_civil_defence_card_back'] = $labor_card_image_file;
            }
            else{
                //1111//
                $emirates_id_application_image_file='';
            }
         
       
        
         $emirates_id_application_cost = $this->input->post('emirates_id_application_cost');
        $emirates_id_no = $this->input->post('emirates_id_no');
         $emirates_id_application_issue_date = $this->input->post('emirates_id_application_issue_date');
        $mirates_id_application_expiry_date = $this->input->post('mirates_id_application_expiry_date');
         $eid_card_front_image=$_FILES['eid_card_front_image'];
         if (!empty($eid_card_front_image)) {
               $eid_card_front_image_file = $this->upload_files($eid_card_front_image);
              //  $data['dubai_civil_defence_card_back'] = $labor_card_image_file;
            }
            else{
                //1111//
                $eid_card_front_image_file='';
            }
        
       $eid_card_back_image=$_FILES['eid_card_back_image'];
         if (!empty($eid_card_back_image)) {
               $eid_card_back_image_file = $this->upload_files($eid_card_back_image);
              //  $data['dubai_civil_defence_card_back'] = $labor_card_image_file;
            }
            else{
                //1111//
                $eid_card_back_image_file='';
            }
         
        $permanent_visa_application=$_FILES['permanent_visa_application'];
         if (!empty($permanent_visa_application)) {
               $permanent_visa_application_file = $this->upload_files($permanent_visa_application);
              //  $data['dubai_civil_defence_card_back'] = $labor_card_image_file;
            }
            else{
                //1111//
                $permanent_visa_application_file='';
            }
        
      
         
        $permanent_visa_cost = $this->input->post('permanent_visa_cost');
         $permanent_uid_no= $this->input->post('permanent_uid_no');
        $permanent_visa_issue_date = $this->input->post('permanent_visa_issue_date');
         $permanent_visa_expiry_date = $this->input->post('permanent_visa_expiry_date');
         
            $permanent_visa_image=$_FILES['permanent_visa_image'];
         if (!empty($permanent_visa_image)) {
               $permanent_visa_image_file = $this->upload_files($permanent_visa_image);
              //  $data['dubai_civil_defence_card_back'] = $labor_card_image_file;
            }
            else{
                //1111//
                $permanent_visa_image_file='';
            }
            
              $permanent_visa_image=$_FILES['permanent_visa_image'];
         if (!empty($permanent_visa_image)) {
               $permanent_visa_image_file = $this->upload_files($permanent_visa_image);
              //  $data['dubai_civil_defence_card_back'] = $labor_card_image_file;
            }
            else{
                //1111//
                $permanent_visa_image_file='';
            }
     
         if (!empty($result->emplyment_in_country_contact_image)) {
            $allemplyment_in_country_contact_image = $result->emplyment_in_country_contact_image;
        } else {
            $allemplyment_in_country_contact_image = '';
        }

        $emplyment_in_country_contact_imagefileall = '';
        $emplyment_in_country_contact_imagefile = '';
        $emplyment_in_country_contact_image = $_FILES['emplyment_in_country_contact_image'];

        if (!empty($emplyment_in_country_contact_image)) {
            for ($i = 0; $i <= count($emplyment_in_country_contact_image['name']); $i++) {

                if (!empty($emplyment_in_country_contact_image['name'][$i])) {

                    $emplyment_in_country_contact_image_doc = $this->upload_files_new($emplyment_in_country_contact_image['name'][$i], $emplyment_in_country_contact_image['tmp_name'][$i]);
                    $emplyment_in_country_contact_imagefile.=$emplyment_in_country_contact_image_doc . ',';
                }
            }
            $emplyment_in_country_contact_imagefile = $emplyment_in_country_contact_imagefile . $allemplyment_in_country_contact_image;
            if (!empty($emplyment_in_country_contact_imagefile)) {
                 //1111//
                $emplyment_in_country_contact_imagefileall = rtrim($emplyment_in_country_contact_imagefile, ',');
            }
        }
       
         
        $date_submited = $this->input->post('date_submited');
           $employment_contact_cost = $this->input->post('employment_contact_cost');
        
        



        if (!empty($result)) {

            //$data['employee_id'] = $id;
            $data['passport_no'] = $passport_no;
            $data['passport_place_of_issue'] = $passport_place_of_issue;
            $data['passport_country'] = $passport_country;
            if (!empty($electronic_work_permitfileall)) {
                $data['electronic_work_permit'] = $electronic_work_permitfileall;
            }
              if (!empty($passport_imagefileall)) {
                $data['passport_image'] = $passport_imagefileall;
            }

             if (!empty($employment_offer_imagefileall)) {
                $data['employment_offer_image'] = $employment_offer_imagefileall;
            }
              if (!empty($work_permit_application_imagefileall)) {
                $data['work_permit_application_image'] = $work_permit_application_imagefileall;
            }
              if (!empty($employment_contact_imagefileall)) {
                $data['employment_contact_image'] = $employment_contact_imagefileall;
            }
              if (!empty($labor_card_image_file)) {
                $data['labor_card_image'] = $labor_card_image_file;
            }
              if (!empty($employment_visa_in_country_image_file)) {
                $data['employment_visa_in_country_image'] = $employment_visa_in_country_image_file;
            }
              if (!empty($employment_visa_out_country_image_file)) {
                $data['employment_visa_out_country_image'] = $employment_visa_out_country_image_file;
            }
              if (!empty($medical_test_result_image_file)) {
                $data['medical_test_result_image'] = $medical_test_result_image_file;
            }
            if (!empty($emirates_id_application_image_file)) {
                $data['emirates_id_application_image'] = $emirates_id_application_image_file;
            }
            if (!empty($eid_card_front_image_file)) {
                $data['eid_card_front_image'] = $eid_card_front_image_file;
            }
            if (!empty($eid_card_back_image_file)) {
                $data['eid_card_back_image'] = $eid_card_back_image_file;
            }
            if (!empty($permanent_visa_image_file)) {
                $data['permanent_visa_image'] = $permanent_visa_image_file;
            }
            if (!empty($emplyment_in_country_contact_imagefileall)) {
                $data['emplyment_in_country_contact_image'] = $emplyment_in_country_contact_imagefileall;
            }

            $data['passport_issue_date'] = $passport_issue_date;
            $data['passport_expiry_date'] = $passport_expiry_date;
            $data['retained_with_company'] = $retained_with_company;
            /*$data['employment_offer_date'] = $employment_offer_date;
            $data['employment_offer_cost'] = $employment_offer_cost;
            $data['work_permit_application_date'] = $work_permit_application_date;
            $data['work_permit_application_cost'] = $work_permit_application_cost;
            $data['employment_contact_date'] = $employment_contact_date;
            $data['employment_contact_cost'] = $employment_contact_cost;
            $data['bank_gurantee_policy_no'] = $bank_gurantee_policy_no;
             $data['name_of_finance_institution'] = $name_of_finance_institution;
            $data['bank_gurantee_finance_amount'] = $bank_gurantee_finance_amount;
            $data['electronic_work_permit_date'] = $electronic_work_permit_date;
             $data['electronic_work_permit_cost'] = $electronic_work_permit_cost;
            $data['ministry_card_no'] = $ministry_card_no;
            $data['personal_id'] = $personal_id;
             $data['ministry_card_issue_date'] = $ministry_card_issue_date;
            $data['ministry_card_expiry_date'] = $ministry_card_expiry_date;
            $data['labor_card_cost'] = $labor_card_cost;
             $data['employment_visa_in_country_issue_date'] = $employment_visa_in_country_issue_date;
            $data['employment_visa_in_country_expiry_date'] = $employment_visa_in_country_expiry_date;
            $data['employment_visa_in_country_cost'] = $employment_visa_in_country_cost;
             $data['employment_visa_out_country_issue_date'] = $employment_visa_out_country_issue_date;
            $data['employment_visa_out_country_expiry_date'] = $employment_visa_out_country_expiry_date;
            $data['employment_visa_out_country_cost'] = $employment_visa_out_country_cost;
             $data['employment_visa_out_country_entry_date'] = $employment_visa_out_country_entry_date;
            $data['medical_test_cost'] = $medical_test_cost;
            $data['emirates_id_application_cost'] = $emirates_id_application_cost;
             $data['emirates_id_no'] = $emirates_id_no;
            $data['emirates_id_application_issue_date'] = $emirates_id_application_issue_date;
            $data['mirates_id_application_expiry_date'] = $mirates_id_application_expiry_date;
             $data['permanent_visa_application'] = $permanent_visa_application_file;
            $data['permanent_visa_cost'] = $permanent_visa_cost;
            $data['permanent_uid_no'] = $permanent_uid_no;
             $data['permanent_visa_issue_date'] = $permanent_visa_issue_date;
            $data['permanent_visa_expiry_date'] = $permanent_visa_expiry_date;
            $data['date_submited'] = $date_submited;*/
            
 //echo '<pre>';
           // print_r($data);
          // exit;
            //$data['society_of_engineers'] = $society_of_engineers;


            $this->db->where('employee_id', $employee_id)->update(tablename('employee_passport_visa'), $data);
//echo $this->db->last_query();exit;
            $this->session->set_flashdata('successmessage', 'Employees modified successfully');
            //  redirect(base_url('edit_employees_details/' . $id));
        } else {

            $data['employee_id'] = $id;
            $data['passport_no'] = $passport_no;
            $data['passport_place_of_issue'] = $passport_place_of_issue;
            $data['passport_country'] = $passport_country;
             if (!empty($electronic_work_permitfileall)) {
                $data['electronic_work_permit'] = $electronic_work_permitfileall;
            }
              if (!empty($passport_imagefileall)) {
                $data['passport_image'] = $passport_imagefileall;
            }
            if (!empty($employment_offer_imagefileall)) {
                $data['employment_offer_image'] = $employment_offer_imagefileall;
            }
              if (!empty($work_permit_application_imagefileall)) {
                $data['work_permit_application_image'] = $work_permit_application_imagefileall;
            }
              if (!empty($employment_contact_imagefileall)) {
                $data['employment_contact_image'] = $employment_contact_imagefileall;
            }
              if (!empty($labor_card_image_file)) {
                $data['labor_card_image'] = $labor_card_image_file;
            }
              if (!empty($employment_visa_in_country_image_file)) {
                $data['employment_visa_in_country_image'] = $employment_visa_in_country_image_file;
            }
              if (!empty($employment_visa_out_country_image_file)) {
                $data['employment_visa_out_country_image'] = $employment_visa_out_country_image_file;
            }
              if (!empty($medical_test_result_image_file)) {
                $data['medical_test_result_image'] = $medical_test_result_image_file;
            }
            if (!empty($emirates_id_application_image_file)) {
                $data['emirates_id_application_image'] = $emirates_id_application_image_file;
            }
            if (!empty($eid_card_front_image_file)) {
                $data['eid_card_front_image'] = $eid_card_front_image_file;
            }
            if (!empty($eid_card_back_image_file)) {
                $data['eid_card_back_image'] = $eid_card_back_image_file;
            }
            if (!empty($permanent_visa_image_file)) {
                $data['permanent_visa_image'] = $permanent_visa_image_file;
            }
            if (!empty($emplyment_in_country_contact_imagefileall)) {
                $data['emplyment_in_country_contact_image'] = $emplyment_in_country_contact_imagefileall;
            }
            $data['passport_issue_date'] = $passport_issue_date;
            $data['passport_expiry_date'] = $passport_expiry_date;
            $data['retained_with_company'] = $retained_with_company;
           /* $data['employment_offer_date'] = $employment_offer_date;
            $data['employment_offer_cost'] = $employment_offer_cost;
            $data['work_permit_application_date'] = $work_permit_application_date;
            $data['work_permit_application_cost'] = $work_permit_application_cost;
            $data['employment_contact_date'] = $employment_contact_date;
            $data['employment_contact_cost'] = $employment_contact_cost;
            $data['bank_gurantee_policy_no'] = $bank_gurantee_policy_no;
             $data['name_of_finance_institution'] = $name_of_finance_institution;
            $data['bank_gurantee_finance_amount'] = $bank_gurantee_finance_amount;
            $data['electronic_work_permit_date'] = $electronic_work_permit_date;
             $data['electronic_work_permit_cost'] = $electronic_work_permit_cost;
            $data['ministry_card_no'] = $ministry_card_no;
            $data['personal_id'] = $personal_id;
             $data['ministry_card_issue_date'] = $ministry_card_issue_date;
            $data['ministry_card_expiry_date'] = $ministry_card_expiry_date;
            $data['labor_card_cost'] = $labor_card_cost;
             $data['employment_visa_in_country_issue_date'] = $employment_visa_in_country_issue_date;
            $data['employment_visa_in_country_expiry_date'] = $employment_visa_in_country_expiry_date;
            $data['employment_visa_in_country_cost'] = $employment_visa_in_country_cost;
             $data['employment_visa_out_country_issue_date'] = $employment_visa_out_country_issue_date;
            $data['employment_visa_out_country_expiry_date'] = $employment_visa_out_country_expiry_date;
            $data['employment_visa_out_country_cost'] = $employment_visa_out_country_cost;
             $data['employment_visa_out_country_entry_date'] = $employment_visa_out_country_entry_date;
            $data['medical_test_cost'] = $medical_test_cost;
            $data['emirates_id_application_cost'] = $emirates_id_application_cost;
             $data['emirates_id_no'] = $emirates_id_no;
            $data['emirates_id_application_issue_date'] = $emirates_id_application_issue_date;
            $data['mirates_id_application_expiry_date'] = $mirates_id_application_expiry_date;
             $data['permanent_visa_application'] = $permanent_visa_application_file;
            $data['permanent_visa_cost'] = $permanent_visa_cost;
            $data['permanent_uid_no'] = $permanent_uid_no;
             $data['permanent_visa_issue_date'] = $permanent_visa_issue_date;
            $data['permanent_visa_expiry_date'] = $permanent_visa_expiry_date;
            $data['date_submited'] = $date_submited;*/

          //  echo '<pre>';
         //   print_r($data);
        //   exit;

            $this->db->insert(tablename('employee_passport_visa'), $data);
      //  echo    $this->db->last_query();exit;
            $insert_id = $this->db->insert_id();
            $this->session->set_flashdata('successmessage', 'Employees added successfully');
            // redirect(base_url('edit_employees_details/' . $id));
        }
    }
    
      public function modify_benifit($id) {
       //  echo '<pre>';
       //  print_r($this->input->post());
        // exit;
        $this->db->select('t1.*');
        $this->db->from(tablename('employee_assign_policy') . ' as t1');
        $this->db->where('t1.employee_id', $id);
        $query = $this->db->get();
        $result = $query->row();
       
        $employee_id = $id;
        $policy_id = $this->input->post('policy_name');
        $date = date('Y-m-d');
       


        if ($this->input->post('benifit_edit_id') != '') {

            //$data['employee_id'] = $id;
            $data['policy_id'] = $policy_id;
          
            $data['created_date'] = $date;

            //$data['society_of_engineers'] = $society_of_engineers;


            $this->db->where('id', $this->input->post('benifit_edit_id'))->update(tablename('employee_assign_policy'), $data);
//echo $this->db->last_query();exit;
            $this->session->set_flashdata('successmessage', 'Employees modified successfully');
            //  redirect(base_url('edit_employees_details/' . $id));
        } else {

            $data['employee_id'] = $id;
            $data['policy_id'] = $policy_id;
          
            $data['created_date'] = $date;

            $this->db->insert(tablename('employee_assign_policy'), $data);
            $insert_id = $this->db->insert_id();
            $this->session->set_flashdata('successmessage', 'Employees added successfully');
            // redirect(base_url('edit_employees_details/' . $id));
        }
    }
    
    public function modify_leave_application($id) {
       //  echo '<pre>';
       //  print_r($this->input->post());
        // exit;
        $this->db->select('t1.*');
        $this->db->from(tablename('employee_leave_application') . ' as t1');
        $this->db->where('t1.employee_id', $id);
        $query = $this->db->get();
        $result = $query->row();
       
        $employee_id = $id;
       // $leave_from = $this->input->post('leave_from');
        // $leave_to = $this->input->post('leave_to');
		$leave_from = $this->input->post('leave_from');
		$Arrdate = explode(" ",$leave_from);
          $leave_total_days = $this->input->post('leave_total_days');
           $leave_ticket = $this->input->post('leave_ticket');
            $leave_ticket_amount = $this->input->post('leave_ticket_amount');
             $leave_type = $this->input->post('leave_type');
            $leave_note = $this->input->post('leave_note');
            $date = date('Y-m-d');
       


        if ($this->input->post('leave_application_edit_id') != '') {

            //$data['employee_id'] = $id;
            $data['leave_from'] = date('Y-m-d',strtotime($Arrdate[0]));
            $data['leave_to'] = date('Y-m-d',strtotime($Arrdate[2]));
            $data['leave_total_days'] = $leave_total_days;
            $data['leave_ticket'] = $leave_ticket;
            $data['leave_type_id'] = $leave_type;
            $data['leave_ticket_amount'] = $leave_ticket_amount;
            $data['leave_note'] = $leave_note;
			$data['date_range'] = $leave_from;
//            $data['policy_id'] = $policy_id;
//            $data['policy_id'] = $policy_id;
//            $data['policy_id'] = $policy_id;
          
            $data['create_date'] = $date;

            //$data['society_of_engineers'] = $society_of_engineers;


            $this->db->where('id', $this->input->post('leave_application_edit_id'))->update(tablename('employee_leave_application'), $data);
//echo $this->db->last_query();exit;
            $this->session->set_flashdata('successmessage', 'Employees modified successfully');
            //  redirect(base_url('edit_employees_details/' . $id));
        } else {

            $data['employee_id'] = $id;
         $data['leave_from'] = date('Y-m-d',strtotime($Arrdate[0]));
            $data['leave_to'] = date('Y-m-d',strtotime($Arrdate[2]));
            $data['leave_total_days'] = $leave_total_days;
            $data['leave_ticket'] = $leave_ticket;
             $data['leave_type_id'] = $leave_type;
            $data['leave_ticket_amount'] = $leave_ticket_amount;
            $data['leave_note'] = $leave_note;
			$data['date_range'] = $leave_from;
          //  echo '<pre>';
          //  print_r($data);
           // exit;
            $this->db->insert(tablename('employee_leave_application'), $data);
          //  echo $this->db->last_query();exit;
            $insert_id = $this->db->insert_id();
            $this->session->set_flashdata('successmessage', 'Employees added successfully');
            // redirect(base_url('edit_employees_details/' . $id));
        }
    }
  /*  public function leave_due_day($leave_id=NULL,$employee_id=NULL) {
        $this->db->select('sum(t1.leave_total_days) as totalday');
        $this->db->from(tablename('employee_leave_application') . ' as t1');
        $this->db->where('t1.leave_type_id', $leave_id);
        $this->db->where('t1.employee_id', base64_decode($employee_id));
        $this->db->where('t1.approved', 'Yes');
        $query = $this->db->get();
        $result = $query->row();
       // echo 'yyyy'. $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result->totalday;
        } else {
            return 0;
        }
    }*/

     public function leave_due_day($leave_id=NULL,$employee_id=NULL) {
        $this->db->select('sum(t1.opening_balance) as totalday');
        $this->db->from(tablename('employee_leaves') . ' as t1');
        $this->db->where('t1.leave_id', $leave_id);
        $this->db->where('t1.employee_id', $employee_id);
        //$this->db->where('t1.approved', 'Yes');
        $query = $this->db->get();
        $result = $query->row();
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result->totalday;
        } else {
            return 0;
        }
    }

    public function settlement_due_day($leave_id=NULL,$employee_id=NULL) {
        $this->db->select('sum(t1.settlement_leaves) as totalsettday');
        $this->db->from(tablename('leave_settlement') . ' as t1');
        $this->db->where('t1.leave_type_id', $leave_id);
        $this->db->where('t1.employee_id', base64_decode($employee_id));
        //$this->db->where('t1.approved', 'Yes');
        $query = $this->db->get();
        $result = $query->row();
       // echo 'yyyy'. $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result->totalsettday;
        } else {
            return 0;
        }
    }
      public function load_data_leave_application_single($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('employee_leave_application'));
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
     public function load_all_leave_type_single($id=NULL) {
        $this->db->select('t1.*');
        $this->db->from(tablename('master_leave_rules') . ' as t1');
        $this->db->where('t1.delete_flag', 'N');
         $this->db->where('t1.is_active', 'Y');
         $this->db->where('t1.id', $id);
        $query = $this->db->get();
        $result = $query->row();
     //   echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
     public function load_all_skill() {
        $this->db->select('t1.*');
        $this->db->from(tablename('master_quali_skill') . ' as t1');
        $this->db->where('t1.delete_flag', 'N');
         $this->db->where('t1.is_active', 'Y');
        $query = $this->db->get();
        $result = $query->result();
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
     public function load_all_qualification() {
        $this->db->select('t1.*');
        $this->db->from(tablename('master_quali_educations') . ' as t1');
        $this->db->where('t1.delete_flag', 'N');
         $this->db->where('t1.is_active', 'Y');
        $query = $this->db->get();
        $result = $query->result();
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
    
    public function skill_name($id=NULL) 
                {
        $this->db->select('t1.*');
        $this->db->from(tablename('master_quali_skill') . ' as t1');
        $this->db->where('t1.id', $id);
        $this->db->where('t1.delete_flag', 'N');
         $this->db->where('t1.is_active', 'Y');
        $query = $this->db->get();
        $result = $query->row();
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        }
        else {
            return array();
        }
    }
    
      public function load_all_leave_total($id = "") {
        $this->db->select('SUM(HR_employee_leave_application.leave_total_days) as total_leave, HR_master_leave_rules.rule_name');
        $this->db->from(tablename('employee_leave_application'));
        $this->db->join('HR_master_leave_rules', 'HR_employee_leave_application.leave_type_id = HR_master_leave_rules.id');
        $this->db->where('HR_employee_leave_application.employee_id', $id);
        $this->db->where('HR_employee_leave_application.approved', 'Yes');
        
        $this->db->group_by('HR_employee_leave_application.leave_type_id');
        $query = $this->db->get();
        $result = $query->result();
      //  echo '<pre>';
      //  print_r($result);  exit;
//echo $this->db->last_query();exit;
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }


     public function load_att_month($id = "",$month = "",$year="") {
		 $rVal = array();
        $from = $year.'-'.$month.'-01';
        $to = $year.'-'.$month.'-31';
        $where = "(date >= '".$from."' AND date <= '".$to."')";
        $this->db->select('*');
        $this->db->from(tablename('attendance'));
        $this->db->where('employee_id', base64_decode($id));
        
        $this->db->where("date BETWEEN '$from' AND '$to'");
        // $this->db->where("date BETWEEN $from AND $to");
        // SELECT * FROM `HR_attendance` WHERE `employee_id` = 29 AND `date` BETWEEN '2020-05-13' AND '2022-07-13' ORDER BY `date` DESC
        // SELECT * FROM `HR_attendance` WHERE `employee_id` = 29 AND `date` BETWEEN `2022-01-01` AND 2022-01-31 ORDER BY `date` ASC
        
        // $this->db->where($where);
        $this->db->order_by('date', 'asc');
        $query = $this->db->get();
        $result = $query->result();
		
		
		   $where_holly = "(HR_master_holidays.holiday_start_date >= '".$from."' AND HR_master_holidays.holiday_end_date <= '".$to."')";
		   
        $this->db->select('HR_master_holidays.*');
        $this->db->from(tablename('master_holidays'));
        // $this->db->join('HR_master_leave_rules', 'HR_employee_leave_application.leave_type_id = HR_master_leave_rules.id');
        $this->db->where('HR_master_holidays.delete_flag', 'N');
        $this->db->where('HR_master_holidays.is_active', 'Y');
        // $this->db->where($where_holly);
        $this->db->where("HR_master_holidays.holiday_start_date BETWEEN '$from' AND '$to'");
        $this->db->order_by('HR_master_holidays.holiday_start_date', 'asc');
        $query_holly = $this->db->get();
        $result_holly = $query_holly->result();
         // echo '<pre>';print_r($result_holly); die;
        //$rVal=0;
        $holidays = array();
        if (!empty($result_holly)) {
        foreach ($result_holly as $value_new) {
        $stop_date_new = date('Y-m-d H:i:s', strtotime($value_new->holiday_end_date . ' +1 day'));
        $periodnew = new DatePeriod(
        new DateTime($value_new->holiday_start_date),
        new DateInterval('P1D'),
        new DateTime($stop_date_new)
        );
        if(!empty($value_new->holiday_name) && !empty($periodnew))   
        {
          //  echo '<pre>';print_r($periodnew);exit;
        foreach ($periodnew as $key => $valuen) {
        // echo $valuen->format('Y-m-d');
             $dateVal_holly = explode('-', $valuen->format('Y-m-d'));
          //   echo '<pre>';print_r($dateVal_holly);$value_new->holiday_name
            //$rVal[$dateVal_holly[2]] = @$value_new->holiday_name;
            array_push($holidays, $dateVal_holly[2]);
        }
        }
        }
        // $rValnew=array_merge_recursive($rVal,$rVal_holly);
        }
		//print_r($holidays); die;
		
		 if(!empty($holidays)){
                $rVal['holidays'] = $holidays;
            }
			//print_r($rVal['holidays']); die;
       //echo '<pre>';
    //  print_r($result);  exit;
//echo $this->db->last_query();exit;
        $futuredate = array();
        if($year == date('Y') && ($month == date('m'))){
            //echo date('d')+1; die;
            for($k=date('d')+1; $k<=31;$k++){
                //$rVal['futuredate'] = $k;
                array_push($futuredate, $k);
            }
        }

        if (!empty($result)) {
            $rVal = array();

            foreach ($result as $value) {
                $dateVal = explode('-', $value->date);
                if($value->day_type == 'Full Day' || $value->day_type == 'Half Day'){
                    $rVal[$dateVal[2]] = $value->day_type.'_'.$value->late_type;  
                }else{
                    $rVal[$dateVal[2]] = $value->day_type;
                }
                
            }

        $Earlyleave = array();  
        $where_early_leave = "(date >= '".$from."' AND date <= '".$to."')";
        $this->db->select('*');
        $this->db->from(tablename('timeoff'));
        $this->db->where('approved', 'Yes');
        $this->db->where('type', 'Personal');
        $this->db->where('employee_id', base64_decode($id));
        $this->db->where($where_early_leave);
        $this->db->order_by('date', 'asc');
        $query_er = $this->db->get();
        $result_er = $query_er->result();
        
       
       foreach ($result_er as $value) {
                $dateVal_er = explode('-', $value->date);
                //$rVal[$dateVal_leave[2]] = 'Leave';
                array_push($Earlyleave, $dateVal_er[2]);
           }

        if(!empty($Earlyleave)){
                $rVal['early_leave'] = $Earlyleave;
            }


        
       

        $leaves  = array();
        $where_leave = "(HR_employee_leave_application.leave_from >= '".$from."' AND HR_employee_leave_application.leave_to <= '".$to."')";
        $this->db->select('HR_employee_leave_application.*,HR_master_leave_rules.rule_name');
        $this->db->from(tablename('employee_leave_application'));
         $this->db->join('HR_master_leave_rules', 'HR_employee_leave_application.leave_type_id = HR_master_leave_rules.id');
        $this->db->where('HR_employee_leave_application.approved', 'Yes');
        $this->db->where('HR_employee_leave_application.employee_id', base64_decode($id));
        $this->db->where($where_leave);
        $this->db->order_by('HR_employee_leave_application.leave_from', 'asc');
        $query_leave = $this->db->get();
        $result_leave = $query_leave->result();
        //   echo '<pre>';print_r($result_leave);
        // if (!empty($result_leave)) {
        foreach ($result_leave as $value) {
            $stop_date = date('Y-m-d H:i:s', strtotime($value->leave_to . ' +1 day'));
            $period = new DatePeriod(
        new DateTime($value->leave_from),
        new DateInterval('P1D'),
        new DateTime($stop_date)
        );
            
            foreach ($period as $key => $valuen) {
        //echo $valuen->format('Y-m-d');exit;
                 $dateVal_leave = explode('-', $valuen->format('Y-m-d'));
                //$rVal[$dateVal_leave[2]] = $value->rule_name;
                array_push($leaves, $dateVal_leave[2]);
        }

            }


      

            if(!empty($leaves)){
                $rVal['leaves'] = $leaves;
            }

            if(!empty($holidays)){
                $rVal['holidays'] = $holidays;
            }

            if(!empty($futuredate)){
                $rVal['futuredate'] = $futuredate;
            }
              //echo '<pre>';
       //print_r($rVal);  exit;
            return $rVal;
            
        } else {
			if (!empty($result_holly)) {
            return $rVal;
			}else{
				return array();
			}
        }
    }


    public function load_att_day($id = "",$year="",$day="") {
        $from = $year.'-01-01';
        $to = $year.'-12-31';
        $where = "(date >= '".$from."' AND date <= '".$to."')";
        $this->db->select('*');
        $this->db->from(tablename('attendance'));
        $this->db->where('employee_id', $id);
        $this->db->where($where);
        if($day=='full'){
            $this->db->where('day_type', 'Full Day');
            $this->db->or_where('day_type', 'Full Day + Over Time');
        }else if($day=='half'){
            $this->db->where('day_type', 'Half Day');
            $this->db->where('day_type', 'Full Day + Over Time');
        }else if($day=='overtime'){
            $this->db->where('day_type', 'Full Day + Over Time');
        }
        $this->db->order_by('date', 'asc');
        $query = $this->db->get();
        $result = $query->result();
     //   echo '<pre>';
      //  print_r($result);  exit;
//echo $this->db->last_query();exit;
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
    
     public function load_att_month_leave($id = "",$month = "",$year="") {
        $from = $year.'-'.$month.'-01';
        $to = $year.'-'.$month.'-31';
        $rVal=array();
        $where = "(date >= '".$from."' AND date <= '".$to."')";
//        $this->db->select('*');
//        $this->db->from(tablename('attendance'));
//        $this->db->where('employee_id', $id);
//        $this->db->where($where);
//        $this->db->order_by('date', 'asc');
//        $query = $this->db->get();
//        $result = $query->result();
     //   echo '<pre>';
      //  print_r($result);  exit;
//echo $this->db->last_query();exit;
//        if (!empty($result)) {
//            $rVal = array();
//
//            foreach ($result as $value) {
//                $dateVal = explode('-', $value->date);
//                $rVal[$dateVal[2]] = $value->type;
//            }


        $where_leave = "(HR_employee_leave_application.leave_from >= '".$from."' AND HR_employee_leave_application.leave_to <= '".$to."')";
        $this->db->select('HR_employee_leave_application.*,HR_master_leave_rules.rule_name');
        $this->db->from(tablename('employee_leave_application'));
         $this->db->join('HR_master_leave_rules', 'HR_employee_leave_application.leave_type_id = HR_master_leave_rules.id');
        $this->db->where('HR_employee_leave_application.approved', 'Yes');
        $this->db->where('HR_employee_leave_application.employee_id', $id);
        $this->db->where($where_leave);
        $this->db->order_by('HR_employee_leave_application.leave_from', 'asc');
        $query_leave = $this->db->get();
        $result_leave = $query_leave->result();
     //   echo '<pre>';print_r($result_leave);
       // if (!empty($result_leave)) {
        foreach ($result_leave as $value) {
            $stop_date = date('Y-m-d H:i:s', strtotime($value->leave_to . ' +1 day'));
            $period = new DatePeriod(
     new DateTime($value->leave_from),
     new DateInterval('P1D'),
     new DateTime($stop_date)
);
            
            foreach ($period as $key => $valuen) {
    //echo $valuen->format('Y-m-d');exit;
                 $dateVal_leave = explode('-', $valuen->format('Y-m-d'));
                $rVal[$dateVal_leave[2]] = $value->rule_name;
}
   
            }
      //  }
            
          // echo '<pre>';print_r($rVal); 
            
            
         $where_holly = "(HR_master_holidays.holiday_start_date >= '".$from."' AND HR_master_holidays.holiday_end_date <= '".$to."')";
        $this->db->select('HR_master_holidays.*');
        $this->db->from(tablename('master_holidays'));
        // $this->db->join('HR_master_leave_rules', 'HR_employee_leave_application.leave_type_id = HR_master_leave_rules.id');
        $this->db->where('HR_master_holidays.delete_flag', 'N');
        $this->db->where('HR_master_holidays.is_active', 'Y');
        $this->db->where($where_holly);
        $this->db->order_by('HR_master_holidays.holiday_start_date', 'asc');
        $query_holly = $this->db->get();
        $result_holly = $query_holly->result();
      //  echo '<pre>';print_r($result_holly);
        //$rVal=0;
        if (!empty($result_holly)) {
        foreach ($result_holly as $value_new) {
            $stop_date_new = date('Y-m-d H:i:s', strtotime($value_new->holiday_end_date . ' +1 day'));
            $periodnew = new DatePeriod(
     new DateTime($value_new->holiday_start_date),
     new DateInterval('P1D'),
     new DateTime($stop_date_new)
);
           if(!empty($value_new->holiday_name) && !empty($periodnew))   
        {
              //  echo '<pre>';print_r($periodnew);exit;
            foreach ($periodnew as $key => $valuen) {
   // echo $valuen->format('Y-m-d');
                 $dateVal_holly = explode('-', $valuen->format('Y-m-d'));
              //   echo '<pre>';print_r($dateVal_holly);
                $rVal[$dateVal_holly[2]] = @$value_new->holiday_name;
}
        }
            }
          // $rValnew=array_merge_recursive($rVal,$rVal_holly);
        }
 else {
     $rValnew=@$rVal;
 }
         //  echo '<pre>';print_r($rValnew); exit;
            return $rVal;
            
        
    }

       public function get_formula($id,$cid) {
        $this->db->select('t1.*');
        $this->db->from(tablename('master_salary_structure_formula') . ' as t1');
        $this->db->where('t1.master_salary_structure_id', $id);
        $this->db->where('t1.component_id', $cid);
        $query = $this->db->get();
        $result = $query->row();
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    public function get_salary_component_by_type($id = "",$type="",$mode = "") {
        $this->db->select('t1.*,t2.component,t2.alias,t2.type,t2.pf,t2.esi');
        $this->db->from(tablename('master_salary_structure_formula'). ' as t1');
        $this->db->join('HR_master_salary_component as t2', 't2.id = t1.component_id');
        $this->db->where('t1.master_salary_structure_id', $id);
        $this->db->where('t2.type', $type);
        $this->db->where('t2.mode', $mode);
        $query = $this->db->get();
        $result = $query->result();
//echo $this->db->last_query();exit;
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    

    public function get_salary_component_by_type_edit($id= "",$strid = "",$type="",$mode = "") {
        $this->db->select('t1.*,t2.component,t2.alias,t2.type,t2.pf,t2.esi');
        $this->db->from(tablename('employee_salary_details'). ' as t1');
        $this->db->join('HR_master_salary_component as t2', 't2.id = t1.component_id');
        $this->db->where('t1.master_salary_structure_id', $strid);
        $this->db->where('t1.employee_salary_id', $id);
        $this->db->where('t2.type', $type);
        $this->db->where('t2.mode', $mode);
        $query = $this->db->get();
        $result = $query->result();
//echo $this->db->last_query();exit;
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    public function get_payroll($id = "") {
        $this->db->select('t1.*');
        $this->db->from(tablename('employee_payroll'). ' as t1');
        $this->db->where('t1.employee_id', $id);
        $this->db->order_by('payroll_month', 'asc');
        $this->db->order_by('payroll_year', 'asc');
        $query = $this->db->get();
        $result = $query->result();
//echo $this->db->last_query();exit;
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }


     public function get_all_emp_except_current_emp($id = "") {
        $this->db->select('t1.*');
        $this->db->from(tablename('employee'). ' as t1');
        $this->db->where('t1.id<>', $id);
        $this->db->where('t1.delete_flag', 'N');
		$this->db->order_by('t1.first_name', 'asc');
        $query = $this->db->get();
        $result = $query->result();
//echo $this->db->last_query();exit;
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
    
     public function get_all_insurence_employee($id = "") {
        $this->db->select('t1.*');
        $this->db->from(tablename('insurance_policies'). ' as t1');
        //$this->db->where('t1.id<>', $id);
         $this->db->where('t1.insurence_for', 'employee');
        $this->db->where('t1.delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->result();
//echo $this->db->last_query();exit;
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    public function get_all_emp_except_current_emp_and_manger($id = "",$mid = "") {
        $this->db->select('t1.*');
        $this->db->from(tablename('employee'). ' as t1');
        $this->db->where('t1.id<>', $id);
        if($mid!=""){
            $this->db->where('t1.id<>', $mid);
        }
        $this->db->where('t1.delete_flag', 'N');
		$this->db->order_by('t1.first_name', 'asc');
        $query = $this->db->get();
        $result = $query->result();
//echo $this->db->last_query();exit;
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    public function modify_closure($id){

        $this->db->select('t1.*');
        $this->db->from(tablename('closure') . ' as t1');
        $this->db->where('t1.employee_id', $id);
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result->attachment)) {
            $allattach = $result->attachment;
        } else {
            $allattach = '';
        }  
      
      $closure_type=$_POST['closure_type'];
      $note        =$_POST['note'];
      $last_day_of_work =$_POST['last_day_of_work'];

      $attachmentfileall = '';
      $attachmentfile = '';
	  $attachment= '';
     //$attachment=$_FILES['closure_documents'] ;

      if (!empty($attachment)) {
            for ($i = 0; $i <= count($attachment['name']); $i++) {

                if (!empty($attachment['name'][$i])) {

                    $attachment_doc = $this->upload_files_new($attachment['name'][$i], $attachment['tmp_name'][$i]);
                    $attachmentfile.=$attachment_doc . ',';
                }
                //  $data['dubai_civil_defence_card_back'] = $dubai_civil_defence_card_back_image;
            }
            $attachmentfile = $attachmentfile . $allattach;
            if (!empty($attachmentfile)) {
                $attachmentfileall = rtrim($attachmentfile, ',');
            }
            // echo $attachmentfileall;
     }
     
      $employee_id=base64_decode($id);

    $this->db->select('t1.*');
    $this->db->from(tablename('closure') . ' as t1');
    $this->db->where('t1.employee_id', $employee_id);
    $query = $this->db->get();
    $result = $query->result();

    if($result[0]->id){

        $data = array(

           
            'type'  =>$closure_type,
            'note' =>$note ,
            'entry_date'=>$last_day_of_work,
            'employee_id'=>$employee_id
        );
        if (!empty($attachmentfileall)) {
            $data['document'] = $attachmentfileall;
        }

        $this->db->where('id',$result[0]->id)->update(tablename('closure'), $data);

            $this->session->set_flashdata('successmessage', 'Employees modified successfully');
            redirect(base_url('edit_employees_details/' . $id));
    }else{
        $data = array(
            'document'=>$documentPath,
            'type'  =>$closure_type,
            'note' =>$note ,
            'entry_date'=>$last_day_of_work,
            'employee_id'=>$employee_id
        );
        
        if (!empty($attachmentfileall)) {
            $data['document'] = $attachmentfileall;
        }

        $this->db->insert(tablename('closure'), $data);
        $this->session->set_flashdata('successmessage', 'Employees added successfully');
            redirect(base_url('edit_employees_details/' . $id));
    }

     echo $id;exit;

     

    }

    public  function modify_evaluation($id){
        
        $evaluation_type=$_POST['evaluation_type'];
        $date=$_POST['date'];
        $note=$_POST['note'];

        $evaluation_id=$_POST['evaluation_id'];

        $employee_id=base64_decode($id);

        if($evaluation_id){

            $data = array(
            'type'=>$evaluation_type,
            'employee_id'  =>$employee_id,
            'note' =>$note ,
            'warning_date'=>$date
            
            );
            $this->db->where('id',$evaluation_id)->update(tablename('warning_evaluation'), $data);

            $this->session->set_flashdata('successmessage', 'Employees modified successfully');
            redirect(base_url('edit_employees_details/' . $id));

        }else{
            
            $data = array(
            'type'=>$evaluation_type,
            'employee_id'  =>$employee_id,
            'note' =>$note ,
            'warning_date'=>$date
            
            );
              $this->db->insert(tablename('warning_evaluation'), $data);
              $this->session->set_flashdata('successmessage', 'Employees added successfully');
            redirect(base_url('edit_employees_details/' . $id));

        }


    }
     public function getWarningEvaluation($id){

        $this->db->select('t1.*');
        $this->db->from(tablename('warning_evaluation') . ' as t1');
        $this->db->where('t1.id', $id);
        $query = $this->db->get();
        $result = $query->result();

        return $result;

    }

    public function delete_warning_evaluation($id){

      
        $this->db->select('*');
        $this->db->from(tablename('warning_evaluation'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result)) {
            $update_faq = array('is_active' => 'N', 'delete_flag' => 'Y');
            $this->db->where('id', $id);
            if ($this->db->update('warning_evaluation', $update_faq)) {
                $this->session->set_flashdata('successmessage', 'Warnings & Evaluation Deleted successfully');
              redirect(base_url('page/43/1'));
            } else {
                $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
               redirect(base_url('page/43/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Warnings & Evaluation not matched');
            redirect(base_url('page/43/1'));
        }
          
    }

    public function closure($id){

            $this->db->select('t1.*');
            $this->db->from(tablename('closure') . ' as t1');
            $this->db->where('t1.employee_id', $id);
            $query = $this->db->get();
            $result = $query->result();

            return $result;

    } 

   function warning_evaluation($id){

    //   $this->db->select('t1.*');
     //   $this->db->from(tablename('warning_evaluation') . ' as t1');
     //  $this->db->where('t1.employee_id', $id);
      //   $this->db->where('t1.delete_flag', 'N');
    //    $query = $this->db->get();
    //    $result = $query->result();
     //   return $result;

    }
    
 function load_loan_payment_details($id){

        $this->db->select('t1.*,HR_employee_loan_payment.payment_date,HR_employee_loan_payment.amount');
        $this->db->from(tablename('employee_loan_application') . ' as t1');
        $this->db->join('HR_employee_loan_payment', 't1.id = HR_employee_loan_payment.loan_id');
        $this->db->where('t1.id', $id);
        
        $query = $this->db->get();
        $result = $query->result();

        return $result;

    }

    public function check_pf_exist($master_salary_structureid = "") {
        $this->db->select('*');
        $this->db->from(tablename('master_salary_structure'));
        $this->db->where('id', $master_salary_structureid);
        $this->db->where('delete_flag', 'N');
        $this->db->where('is_active', 'Y');
        $this->db->where('pf', '1');
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

     public function check_esi_exist($master_salary_structureid = "") {
        $this->db->select('*');
        $this->db->from(tablename('master_salary_structure'));
        $this->db->where('id', $master_salary_structureid);
        $this->db->where('delete_flag', 'N');
        $this->db->where('is_active', 'Y');
        $this->db->where('esi', '1');
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

     public function check_ptax_exist($master_salary_structureid = "") {
        $this->db->select('*');
        $this->db->from(tablename('master_salary_structure'));
        $this->db->where('id', $master_salary_structureid);
        $this->db->where('delete_flag', 'N');
        $this->db->where('is_active', 'Y');
        $this->db->where('ptax', '1');
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

     public function ptax_deduction($state,$total){

        $this->db->select('t1.*');
        $this->db->from(tablename('p_tax') . ' as t1');
        $this->db->where('t1.delete_flag', 'N');
        $this->db->where('t1.state', $state);
        $this->db->where('t1.amount_from <=',(int)$total);
        $this->db->where('t1.amount_to >=', (int)$total);
        $query = $this->db->get();
        $result = $query->row();

       
       //print_r( $this->db->last_query()); die;
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
      
    }


    public function get_master_salary_structure_formula($id = "") {
        $this->db->select('t1.*,t2.component,t2.alias,t2.type,t2.pf,t2.esi,t2.fixed');
        $this->db->from(tablename('master_salary_structure_formula'). ' as t1');
        $this->db->join('HR_master_salary_component as t2', 't2.id = t1.component_id');
        $this->db->where('t1.master_salary_structure_id', $id);
        $query = $this->db->get();
        $result = $query->result();
//echo $this->db->last_query();exit;
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

     public function check_employee_no($employee_no = "",$id = "") {
        $this->db->select('t1.*'); 
        $this->db->from(tablename('employee') . ' as t1');
        $this->db->where('t1.delete_flag', 'N');
        $this->db->where('t1.employee_no', $employee_no);
        $this->db->where('t1.id<>', $id);
        $query = $this->db->get();
        $result = $query->row();
       // echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

        public function check_rf_no($rf_no = "",$id = "") {
        $this->db->select('t1.*'); 
        $this->db->from(tablename('employee') . ' as t1');
        $this->db->where('t1.delete_flag', 'N');
        $this->db->where('t1.rf_no', $rf_no);
        $this->db->where('t1.id<>', $id);
        $query = $this->db->get();
        $result = $query->row();
       // echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    public function load_all_salary_history($id = "") {
        $this->db->select('HR_employee_salary.*,HR_master_salary_structure.structure_name');
        $this->db->from(tablename('employee_salary'));
        $this->db->join('HR_master_salary_structure', 'HR_master_salary_structure.id = HR_employee_salary.salary_structure_id');
        $this->db->where('HR_employee_salary.employee_id', $id);
        $this->db->order_by('HR_employee_salary.id','desc');
        $query = $this->db->get();
        $result = $query->result();
//echo $this->db->last_query();exit;
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
 public function check_non_ctc_component_exist($master_salary_structureid = "") {
        $this->db->select('*');
        $this->db->from(tablename('master_salary_structure'));
        $this->db->where('id', $master_salary_structureid);
        $this->db->where('delete_flag', 'N');
        $this->db->where('is_active', 'Y');
        $this->db->where('not_part_ctc_component_id !=', '');
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
	
	public function get_row_data_order_by_id($table, $where) {
		$this->db->order_by('id','desc');
        $query = $this->db->get_where(tablename($table), $where);
        return $query->row();
    }
	
	function uploadData() {
        $count = 0;
        $fp = fopen($_FILES['userfile']['tmp_name'], 'r') or die("can't open file");
        $samecode=array();
		
        //print_r($fp); die;
        while ($csv_line = fgetcsv($fp, 1024)) {
            $count++;
            if ($count == 1) {
                continue;
            }//keep this if condition if you want to remove the first row
            //echo '<pre>';print_r($csv_line); //exit;
			//echo '<pre>';print_r(count($csv_line)); //exit;
            for ($i = 0, $j = count($csv_line); $i < $j; $i++) {
				$errors=array();
                $insert_csv = array();
                //$insert_csv['member_type'] = $csv_line[0];//remove if you want to have primary key,
				$insert_csv['rf_no'] = $csv_line[1];
				$insert_csv['employee_no'] = $csv_line[2];
                $insert_csv['first_name'] = $csv_line[3];
                $insert_csv['middle_name'] = $csv_line[4];
                $insert_csv['last_name'] = $csv_line[5];
				 $insert_csv['department'] = $csv_line[6];
                $insert_csv['designation'] = $csv_line[7];
                $insert_csv['gender'] = $csv_line[8];
				$insert_csv['date_of_birth'] = $csv_line[9];
				$insert_csv['joining_date'] = $csv_line[10];
				$insert_csv['mobile_no'] = $csv_line[11];
				$insert_csv['email_id'] = $csv_line[12];
				$insert_csv['religion'] = $csv_line[13];
				$insert_csv['status'] = $csv_line[14];
				$insert_csv['grade'] = $csv_line[15];
				$insert_csv['workshift'] = $csv_line[16];
            }
            $i++;
			//echo '<pre>'; print_r($insert_csv);
			$date = date("Y-m-d H:i:s");
			if($insert_csv['mobile_no'] == ''){
				$error_txt = 'Please Enter Mobile No';
				array_push($errors,$error_txt);
			}else{
			$check_mobile = $this->EmployeesModel->get_row_data('employee',array('contact_mobile'=>$insert_csv['mobile_no']));
			if(!empty($check_mobile)){
				$error_txt = 'Mobile No already exists';
				array_push($errors,$error_txt);
			}
			}
			
			if($insert_csv['email_id'] == ''){
				$error_txt = 'Please Enter Email Id';
				array_push($errors,$error_txt);
			}else{
			$check_email = $this->EmployeesModel->get_row_data('employee',array('contact_email'=>$insert_csv['email_id']));
			if(!empty($check_email)){
				$error_txt = 'Email Id already exists';
				array_push($errors,$error_txt);
			}
			}
			
			if($insert_csv['employee_no'] == ''){
				$error_txt = 'Please Enter Employee No';
				array_push($errors,$error_txt);
			}else{
			$check_employee_no = $this->EmployeesModel->get_row_data('employee',array('employee_no'=>$insert_csv['employee_no']));
			if(!empty($check_employee_no)){
				$error_txt = 'Employee No already exists';
				array_push($errors,$error_txt);
			}
			} 
			
			if($insert_csv['rf_no'] == ''){
				$error_txt = 'Please Enter RF No';
				array_push($errors,$error_txt);
			}else{
				$check_rf_no = $this->EmployeesModel->get_row_data('employee',array('rf_no'=>$insert_csv['rf_no']));
			if(!empty($check_rf_no)){
				$error_txt = 'RF No already exists';
				array_push($errors,$error_txt);
			}
			}
			
			$grade_name = $this->EmployeesModel->get_row_data('master_grade',array('grade_name'=>$insert_csv['grade']));
			if(empty($grade_name)){
				$error_txt = 'Grade does not exists';
				array_push($errors,$error_txt);
			}
			//echo '<pre>'; print_r($grade_name); die;
			$worshift_name = $this->EmployeesModel->get_row_data('master_work_shift',array('work_shift_name'=>$insert_csv['workshift']));
			if(empty($worshift_name)){
				$error_txt = 'workshift does not exists';
				array_push($errors,$error_txt);
			}
			$dept_name = $this->EmployeesModel->get_row_data('master_department',array('department_name'=>$insert_csv['department']));
			if(empty($dept_name)){
				$error_txt = 'Department does not exists';
				array_push($errors,$error_txt);
			}
			$desg_name = $this->EmployeesModel->get_row_data('master_designation',array('designation_name'=>$insert_csv['designation']));
			if(empty($desg_name)){
				$error_txt = 'Designation does not exists';
				array_push($errors,$error_txt);
			}
			if($insert_csv['gender'] == 'Male'){
				$gender = 'Male';
			}elseif($insert_csv['gender'] == 'Female'){
				$gender = 'Female';
			}else{
				$gender = '';
				if($gender = ''){
				$error_txt = 'Gender can not be blank';
				array_push($errors,$error_txt);
			}
			}
			
			if($insert_csv['status'] == 'Trainee'){
				$status = 'Trainee';
			}elseif($insert_csv['status'] == 'Provisional'){
				$status = 'Provisional';
			}elseif($insert_csv['status'] == 'Contractual'){
				$status = 'Contractual';
			}elseif($insert_csv['status'] == 'Permanent'){
				$status = 'Permanent';
			}else{
				$status = '';
				if($status = ''){
				$error_txt = 'Status can not be blank';
				array_push($errors,$error_txt);
			}
			}
			
			if($status != '' && $insert_csv['employee_no'] != '' && $insert_csv['rf_no'] != '' && $insert_csv['email_id'] != '' && $insert_csv['mobile_no'] != '' && $gender != '' && !empty($grade_name) && !empty($worshift_name)  && !empty($dept_name) && !empty($desg_name)  &&  empty($check_rf_no) && empty($check_email) && empty($check_mobile) && empty($check_employee_no)){
			$data = array(
                'employee_no' => $insert_csv['employee_no'],
				'rf_no' => $insert_csv['rf_no'],
                'dob' => date('Y-m-d',strtotime($insert_csv['date_of_birth'])),
                //'employee_category' => $employee_category,
                'first_name' => $insert_csv['first_name'],
                'middle_name' => $insert_csv['middle_name'],
                'last_name' => $insert_csv['last_name'],
                'department' => $dept_name->id,
                'designation' => $desg_name->id,
				 'contact_mobile' => $insert_csv['mobile_no'],
                'contact_email' => $insert_csv['email_id'],
				'religion' => $insert_csv['religion'],
                'hire_date' => date('Y-m-d',strtotime($insert_csv['joining_date'])),
                'status' => $insert_csv['status'],
                'entry_date' => $date,
				'gender' =>  $gender,
                'modified_date' => $date,
                'grade' => $grade_name->id,
                'work_shift_id' => $worshift_name->id,
            );
			//print_r($data); die;

            $this->db->insert(tablename('employee'), $data);
            $insert_id = $this->db->insert_id();

            if(date('Y',strtotime($insert_csv['joining_date'])) == date('Y')){
              $leave_type = $this->EmployeesModel->get_row_data('master_grade',array('id'=>$grade_name->id));
              //echo ; die;
              if(!empty($leave_type)){
                $leaveids = explode(',', $leave_type->leave_rule_id);
                foreach ($leaveids as $key => $value) {
                  $leave_details = $this->EmployeesModel->get_row_data('master_leave_rules',array('id'=>$value));
                  //echo '<pre>'; print_r($leave_details); //die;
                  if($leave_details->credit_month == 'Yearly'){
                    $SysConfigauthenticaton = checkConfig1();
                    //echo '<pre>'; print_r($SysConfigauthenticaton->financial_year_start_month);
                    $timeStart = strtotime(date('Y-m-d',strtotime($insert_csv['joining_date'])));
                    $timeEnd = strtotime(date('Y-m-d',strtotime('2021-'.$SysConfigauthenticaton->financial_year_start_month.'-01')));
                    // Adding current month + all months in each passed year
                    $numMonths = 1 + (date("Y",$timeEnd)-date("Y",$timeStart))*12;
                    // Add/subtract month difference
                    $numMonths += date("m",$timeEnd)-date("m",$timeStart);
                    //echo date('F'); die;
                    //echo $numMonths; die;
                    //echo date('m',strtotime($hire_date)); die;
                    $permonth_leave = $leave_details->unit/12;
                    //echo $permonth_leave; die;
                    $dataleave['employee_id'] =  $insert_id;
                    $dataleave['leave_id'] =  $value;
                    $dataleave['credited_month'] =  date('F',strtotime($insert_csv['joining_date']));
                    $dataleave['type'] =  'opening leave';
                    $dataleave['opening_balance'] =  $numMonths - 1;
                    $dataleave['closing_balance'] =  $numMonths - 1;
                    $dataleave['entry_date'] =  date('Y-m-d');
                    $dataleave['date'] =  date('Y-m-d');
                    $this->db->insert(tablename('employee_leaves'), $dataleave);
                  }

                  if($leave_details->credit_month == 'Monthly'){
                    $SysConfigauthenticaton = checkConfig1();

                    if(date('d',strtotime($insert_csv['joining_date'])) <= $leave_details->period_day){
                      
                    
                    $dataleave['employee_id'] =  $insert_id;
                    $dataleave['leave_id'] =  $value;
                    $dataleave['credited_month'] =  date('F',strtotime($insert_csv['joining_date']));
                    $dataleave['type'] =  'opening leave';
                    $dataleave['opening_balance'] =  $leave_details->unit;
                    $dataleave['closing_balance'] = $leave_details->unit;
                    $dataleave['entry_date'] =  date('Y-m-d');
                    $dataleave['date'] =  date('Y-m-d');
                    $this->db->insert(tablename('employee_leaves'), $dataleave);
                    }else{
                    $forOdNextMonth= date('Y-m-d', strtotime("+1 month", strtotime($insert_csv['joining_date'])));
                    $dataleave['employee_id'] =  $insert_id;
                    $dataleave['leave_id'] =  $value;
                    $dataleave['credited_month'] =  date('F',strtotime($forOdNextMonth));
                    $dataleave['type'] =  'opening leave';
                    $dataleave['opening_balance'] =  $leave_details->unit;
                    $dataleave['closing_balance'] = $leave_details->unit;
                    $dataleave['entry_date'] =  $forOdNextMonth;
                     $dataleave['date'] =  $forOdNextMonth;
                    $this->db->insert(tablename('employee_leaves'), $dataleave);
                    }
                  }
                }
              }
              
            }
			
		}else{
			if(!empty($errors)){
				$error_text = implode(',',$errors);
			}
			$error_check = 'Employee Name: '.$insert_csv['first_name'].' '.$insert_csv['last_name'].' ( Errors : '.$error_text.' ) - In Line No : '.$count;
			array_push($samecode,$error_check);
		}
			

        }
		//echo '<pre>'; print_r($samecode); die; 
		//print_r($errors); die;
		if(!empty($samecode)){
			$error_names = implode(',',$samecode);
			$flg = $this->session->set_flashdata('errormessage', $error_names);

		}else{
			$flg = $this->session->set_flashdata('successmessage', 'Employees Details Uploaded');
		}
		
       
        redirect('employees_details');
		//redirect(base_url('page/43/1'));
        return $flg;
   
    }
	
	 /*function load_employee_details($id){
///echo $id ; die;
        $this->db->select('t1.*,HR_master_designation.designation_name,HR_master_department.department_name');
        $this->db->from(tablename('employee') . ' as t1');
        $this->db->join('HR_master_designation', 't1.designation = HR_master_designation.id');
		$this->db->join('HR_master_department', 't1.department = HR_master_department.id');
        $this->db->where('t1.id', $id);
        echo  $this->db->last_query(); die;
        $query = $this->db->get();
        $result = $query->row();

        return $result;

    }*/



}

/* End of file EmployeesModel.php */
/* Location: ./application/modules/employees/models/admin/EmployeesModel.php */