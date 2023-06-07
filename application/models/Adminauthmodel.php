<?php

class Adminauthmodel extends CI_Model {

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
     * Used for the log-in functionality of an admin
     *
     * <p>Description</p>
     *
     * <p>This function uses the Global Array POST, fetches the variables containing the credential of an admin
     * and validates them against the same [Table: HR_admin]. If validation is a success, 
     * the admin gets redirected to the member and the first hand details gets saved into session</p>
     *
     * @access  public
     * @param none
     * @return  int
     */
    public function admin_login() {
        //echo "<pre>"; print_r($this->input->post()); //die;
        $emailid = $this->input->post('emailid');
        $password = md5($this->input->post('password'));

        $type = $this->input->post('type');
        if($type=='management')
        {
        $this->db->select('*');
        $this->db->from(tablename('admin'));
        $this->db->where('emailid', $emailid);
        $this->db->where('password', $password);
         $this->db->where('delete_flag','N');
          $this->db->where('is_active', 'Y');
        }
        else{
            
          $this->db->select('*');
        $this->db->from(tablename('employee'));
        $this->db->where('contact_email', $emailid);
        $this->db->where('password', $password);  
         $this->db->where('delete_flag','N');
          $this->db->where('is_active', 'Y');
        }
        $auth_query = $this->db->get();
        $auth_result = $auth_query->row();
        //echo $this->db->last_query();exit;
        //echo "<pre>"; print_r($auth_result); die;

        if (!empty($auth_result)) {
                $_login_array_userdata = (object) ['uid' => $auth_result->id, 'detail' => $auth_result];
                $this->session->set_userdata('type', $type);
                $this->session->unset_userdata('futureAdmin');
                $this->session->set_userdata('futureAdmin', $_login_array_userdata); 
                $this->session->set_flashdata('successmessage', 'You have logged in successfully');
              if($this->session->userdata('type')=='management')
            {
            redirect(base_url('dashboard'));
            }
            else{
              redirect(base_url('edit_employees_details/'.base64_encode($this->session->userdata('futureAdmin')->detail->id)));  
            }  
        } else {
            $this->session->set_flashdata('errormessage', 'Invalid Email id or Password');
            redirect(base_url());
        }
    }

     /**
     * Used for updating one row in a table
     *
     * <p>Description</p>
     *
     * <p>This function fetches update one row in table depending upon condition</p>
     *
     * @access  public
     * @param none
     * @return array
     */
    public function update_row_data($table, $data, $where) {
        
        $query = $this->db->update(tablename($table), $data, $where);
        return true;
    }

    /**
     * Used for fetching one row from a table
     *
     * <p>Description</p>
     *
     * <p>This function fetches one row from any table depending upon condition</p>
     *
     * @access  public
     * @param none
     * @return array
     */
    public function get_row_data($table, $where) {
        $query = $this->db->get_where(tablename($table), $where);
        return $query->row();
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
    
    public function getmainactiveMenu() {
        //echo $_SESSION['userId'];exit;


        $sql = "select * from HR_admin_left_menu where  status=1 and main_menu_id=0  order by orderNo";

        $query = $this->db->query($sql);
        $row = $query->result();
        //echo $this->db->last_query();exit;
        if (!empty($row)) {
            return $row;
        } else {
            return '';
        }
    }
	
	public function getmainactiveMenuuserwise($user_menu_array) {
        //echo $_SESSION['userId'];exit;
        $strmenu = implode(',',$user_menu_array);

        $sql = "select * from HR_admin_left_menu where  status=1 and main_menu_id=0 and id in ($strmenu) order by orderNo";

        $query = $this->db->query($sql);
        $row = $query->result();
        //echo $this->db->last_query();exit;
        if (!empty($row)) {
            return $row;
        } else {
            return '';
        }
    }
    
    public function georganizationdetails() {
        //echo $_SESSION['userId'];exit;


        $sql = "select * from HR_setting_organization where  delete_flag='N' and is_active='Y'";

        $query = $this->db->query($sql);
        $row = $query->row();
        //echo $this->db->last_query();exit;
        if (!empty($row)) {
            return $row;
        } else {
            return '';
        }
    }

    public function getallactiveMenuforstaff() {
        $sql = "select * from HR_admin_login where id='" . $_SESSION['userId'] . "'";
        $query = $this->db->query($sql);
        $row = $query->row();
        if (!empty($row)) {
            return $row;
        } else {
            return '';
        }
    }

    public function getallactiveMenu($id) {


        $sql = "select * from HR_admin_left_menu where  status=1 and main_menu_id='$id' order by orderNo";

        $query = $this->db->query($sql);
        $row = $query->result();
        //echo $this->db->last_query();exit;
        if (!empty($row)) {
            return $row;
        } else {
            return '';
        }
    }
	
	
	
     public function update_employee_profile_picture($employee_id=NULL,$image=NULL) {
        $employee_id=base64_decode($employee_id);
         if (!empty($employee_id)) {
            $data = array(
                'personal_image' => $image
                
            );

            $this->db->where('id', $employee_id)->update(tablename('employee'), $data);
         }
    }
	
	public function save_user_tokens($post){
		$res = '';
		$this->db->select('* ');
		$this->db->from('user_tokens');
		$this->db->where("token",$post['token']);
		$this->db->where("user_id",$post['user_id']);
		$query = $this->db->get()->row();
		if(empty($query)){
			$res = $this->db->insert('user_tokens', $post);
		}
		return $this->db->last_query();
		//return $res;
	}
  
}

/* End of file Adminauthmodel.php */
/* Location: ./application/models/front/Adminauthmodel.php */