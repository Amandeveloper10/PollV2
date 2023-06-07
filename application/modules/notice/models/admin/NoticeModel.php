<?php
/**
 * department Model Class. Handles all the datatypes and methodes required for handling department
 */
class NoticeModel extends CI_Model {

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
		$this->load->model('Adminauthmodel');
    }

    /**
     * Used for loading functionality of department for an admin
     *
     * <p>Description</p>
     *
     * <p>This function loads all the department that has been added by current admin [Table: master_department]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_all_data() {
        $this->db->select('t1.*,t2.first_name,t2.middle_name,t2.last_name,t2.employee_no');
        $this->db->from(tablename('notice') . ' as t1');
         $this->db->join(tablename('employee'). ' as t2', 't1.employee_id = t2.id');
        $this->db->where('t1.delete_flag', 'N'); 
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



  /**
     * Used for add/edit rows from a table
     *
     * <p>Description</p>
     *
     * <p>This function Used for add/edit department</p>
     *
     * @access  public
     * @param   id
     * @return string
     */

     public function modify($id) {  
	
       //echo "<pre>"; print_r($_POST); die;
        $employeeid= $this->input->post('employee');
		$employee = ($this->input->post('employee')) ? implode(',', $this->input->post('employee')) :'' ;
        $subject= $this->input->post('subject');
        $content= $this->input->post('content');
        $date = date("Y-m-d H:i:s");
		
		foreach($employeeid as $key => $value){
			$this->db->select('*');
				$this->db->from(tablename('admin'));
				$this->db->where('employee_id', $value);
				$query_userid = $this->db->get();
				$result_userid = $query_userid->row();
				if(!empty($result_userid)){
					$useids[] = $result_userid->id;
				}
				
		}
		
		$this->db->select('*');
		$this->db->from(tablename('user_tokens'));
		$this->db->where_in('user_id', $useids);
		$query = $this->db->get();
		$result = $query->result();
		
		if(!empty($result)){
				$SERVER_API_KEY = 'AAAAgOm36Ho:APA91bEd26HnlE4zgSjR1EMt9Ez80kdWiCP_0j5yq7NJCPCJrEUlmd64uEO5jTTilcp_6hAWxuqDAWr2CsK6pzJt7lGqk9bGRSMG5mYjCJe1bRyaN5YRNGMzkd-wJjnJuS2U0nu-VJMI';
			//$tokens = ['cL2p6WfhuXk:APA91bEsl-ngRjhUxRnkQBPT-FeCSmmVD210Gs-ncBOb1UXJYFRfcSSZdeQHhLoCv-25YzZn8QWVRs_f8zmTRYVEs8p-hh3hfx4Vpy-8OOElVI2bF4X9Kz30C9mYWK-5Cg4vKbPSJxAd'];
			
			foreach ($result as $token) {
			$registrationIds[] = $token->token;
			}
			
			$header = [
			'Authorization: Key=' . $SERVER_API_KEY,
			'Content-Type: Application/json'
			];
			
			
			$logo=  $this->Adminauthmodel->georganizationdetails();
			
			if(@$logo->image != ''){
				$logoimage = base_url().'uploads/'.@$logo->image;
			}else{
				$logoimage = base_url().'assets/img/avatars/placeholders/ava-128.png';
			}

			$msg = [
			'title' => $subject,
			'body' => $content,
			'icon' => $logoimage,
			'image' => '',
			];

			$payload = [
			'registration_ids' 	=> $registrationIds,
			'data'				=> $msg
			];

			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => json_encode( $payload ),
			CURLOPT_HTTPHEADER => $header
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			echo "cURL Error #:" . $err;
			} else {
			echo $response;
			}
			}
			
		
		
        //echo "<pre>"; print_r($employeeid); die;
		

        if (!empty($id)) {
                $data = array(
                    'employee_id' => $employee,
                    'subject' =>  $subject,
                    'content' => $content,
                    'modified_date' => $date
                );
           
            $this->db->where('id', $id)->update(tablename('notice'), $data);
            $this->session->set_flashdata('successmessage', 'notice modified successfully');
            redirect(base_url('page/83/1'));
        } else {
         
                $data = array(
                     'employee_id' => $employee,
                     'subject' =>  $subject,
                    'content' => $content,
                    'entry_date' => $date,
                );
            
            $this->db->insert(tablename('notice'), $data);
			
			/*$this->db->select('*');
			$this->db->from(tablename('user_tokens'));
			$query = $this->db->get();
			$result = $query->result();
			
			if(!empty($result)){
				$SERVER_API_KEY = 'AAAAgOm36Ho:APA91bEd26HnlE4zgSjR1EMt9Ez80kdWiCP_0j5yq7NJCPCJrEUlmd64uEO5jTTilcp_6hAWxuqDAWr2CsK6pzJt7lGqk9bGRSMG5mYjCJe1bRyaN5YRNGMzkd-wJjnJuS2U0nu-VJMI';
			//$tokens = ['cL2p6WfhuXk:APA91bEsl-ngRjhUxRnkQBPT-FeCSmmVD210Gs-ncBOb1UXJYFRfcSSZdeQHhLoCv-25YzZn8QWVRs_f8zmTRYVEs8p-hh3hfx4Vpy-8OOElVI2bF4X9Kz30C9mYWK-5Cg4vKbPSJxAd'];
			
			foreach ($result as $token) {
			$registrationIds[] = $token->token;
			}
			
			$header = [
			'Authorization: Key=' . $SERVER_API_KEY,
			'Content-Type: Application/json'
			];

			$msg = [
			'title' => $subject,
			'body' => $content,
			'icon' => 'https://alpha.hrpayrollsoft.com/uploads/15890092161482946116.png',
			'image' => 'https://alpha.hrpayrollsoft.com/uploads/15890092161482946116.png',
			];

			$payload = [
			'registration_ids' 	=> $registrationIds,
			'data'				=> $msg
			];

			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => json_encode( $payload ),
			CURLOPT_HTTPHEADER => $header
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			echo "cURL Error #:" . $err;
			} else {
			echo $response;
			}
			}*/
			
			
            
             $this->session->set_flashdata('successmessage', 'notice added successfully');
            redirect(base_url('page/83/1'));
			
			
        }
    }



    /**
     * Used for get department by id
     *
     * <p>Description</p>
     *
     * <p>This function get department by id from table [Table: master_department]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_single_data($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('notice'));
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {           
            return $result;
        } else {
            return array();
        }
    }
 /**
     * Used for status department
     *
     * <p>Description</p>
     *
     * <p>This function status department [Table: master_department]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function status_change($id) {
        $this->db->select('*');
        $this->db->from(tablename('notice'));
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
            if ($this->db->update('notice', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'notice Status changed successfully');
            redirect(base_url('page/83/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/83/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'notice not matched');
            redirect(base_url('page/83/1'));
        }
    }

    /**
     * Used for delete department
     *
     * <p>Description</p>
     *
     * <p>This function delete department [Table: master_department]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function delete_this($id) {
        $this->db->select('*');
        $this->db->from(tablename('notice'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result)) {            
            $update_faq = array('is_active' => 'N','delete_flag'=> 'Y');
            $this->db->where('id', $id);
            if ($this->db->update('notice', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'notice Deleted successfully');
            redirect(base_url('page/83/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/83/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'notice not matched');
            redirect(base_url('page/83/1'));
        }
    }
 

 public function load_all_employee(){

        $this->db->select('t1.*');
        $this->db->from(tablename('employee') . ' as t1');
		$this->db->where('t1.is_active', 'Y'); 
        $this->db->where('t1.delete_flag', 'N'); 
		$this->db->order_by('t1.first_name', 'asc');
        $query = $this->db->get();
        $result = $query->result();
        //echo $this->db->last_query() ; die;
        //echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }

    }
}
/* End of file DeptModel.php */
/* Location: ./application/modules/department/models/admin/DeptModel.php */