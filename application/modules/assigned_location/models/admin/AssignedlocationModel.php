<?php
/**
 * department Model Class. Handles all the datatypes and methodes required for handling department
 */
class AssignedlocationModel extends CI_Model {

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
     * Used for loading functionality of department for an admin
     *
     * <p>Description</p>
     *
     * <p>This function loads all the department that has been added by current admin [Table: equipment]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_all_data($id) {
        if($id){
            $this->db->select('t1.*,t2.first_name,t2.middle_name,t2.last_name,t3.company_name,t2.employee_no');
            $this->db->from(tablename('assigned_location') . ' as t1');
            $this->db->join(tablename('employee'). ' as t2', 't1.employee_id = t2.id');
            $this->db->join(tablename('setting_organization'). ' as t3', 't1.organization_id = t3.id');
            $this->db->where('t1.delete_flag', 'N'); 
			$this->db->where('t2.is_active', 'Y'); 
			$this->db->where('t2.delete_flag', 'N'); 
            
            $query = $this->db->get();
            $result = $query->result();
        }else{
            $this->db->select('t1.*,t2.first_name,t2.middle_name,t2.last_name,t3.company_name,t2.employee_no');
            $this->db->from(tablename('assigned_location') . ' as t1');
            $this->db->join(tablename('employee'). ' as t2', 't1.employee_id = t2.id');
            $this->db->join(tablename('setting_organization'). ' as t3', 't1.organization_id = t3.id');
            $this->db->where('t1.delete_flag', 'N'); 
			$this->db->where('t2.is_active', 'Y'); 
			$this->db->where('t2.delete_flag', 'N'); 
            $query = $this->db->get();
            $result = $query->result();
        }
        
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
    public function load_all_location(){

        $this->db->select('t1.*');
        $this->db->from(tablename('setting_org_location') . ' as t1');
        $this->db->where('t1.delete_flag', 'N'); 
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
    public function load_all_employee(){

        $this->db->select('t1.*');
        $this->db->from(tablename('employee') . ' as t1');
        $this->db->where('t1.is_active', 'Y'); 
        $this->db->where('t1.delete_flag', 'N');  
		$this->db->order_by("t1.first_name", "asc");
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
        

        $location_id= $this->input->post('location_id');

        $employee_id= $this->input->post('employee');

        $effective_start_date= date('y-m-d',strtotime($this->input->post('effective_start_date')));
        $effective_end_date= date('y-m-d',strtotime($this->input->post('effective_end_date')));

        $date = date("Y-m-d H:i:s");
    
            if (!empty($id)) {

                  $data = array(
                    'organization_id' =>  $location_id,

                    'employee_id'  => $employee_id,
                    'effective_start_date' => $effective_start_date,
                   // 'effective_end_date' => $effective_end_date,

                    'modified_date' => $date
                  );
               
                    $this->db->where('id', $id)->update(tablename('assigned_location'), $data);
                     $this->session->set_flashdata('successmessage', 'Assign Location To Employee modified successfully');
                   redirect(base_url('page/78/1'));

                    
            } else {

                 $data = array(
                    'organization_id' =>  $location_id,

                    'employee_id'  => $employee_id,
                    'effective_start_date' => $effective_start_date,
                    //'effective_end_date' => $effective_end_date,

                    'entry_date' => $date,
                    );
                
                $this->db->insert(tablename('assigned_location'), $data);
                
                  $this->session->set_flashdata('successmessage', 'Assign Location To Employee added successfully');
                  redirect(base_url('page/78/1'));
               
            }
        
    }



    /**
     * Used for get department by id
     *
     * <p>Description</p>
     *
     * <p>This function get department by id from table [Table: equipment]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_single_data($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('assigned_location'));
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
     * <p>This function status department [Table: equipment]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function status_change($id) {
        $this->db->select('*');
        $this->db->from(tablename('equipment'));
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
            if ($this->db->update('equipment', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'Equipment Status changed successfully');
            redirect(base_url('page/78/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/78/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Equipment not matched');
            redirect(base_url('page/78/1'));
        }
    }

    /**
     * Used for delete department
     *
     * <p>Description</p>
     *
     * <p>This function delete department [Table: equipment]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function delete_this($id) {
        $this->db->select('*');
        $this->db->from(tablename('assigned_location'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result)) {   

            $update_faq = array('is_active' => 'N','delete_flag'=> 'Y');
            $this->db->where('id', $id);
            if ($this->db->update('assigned_location', $update_faq)) {

            $this->session->set_flashdata('successmessage', 'Assigned Location Deleted successfully');
            redirect(base_url('page/78/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/78/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Assigned Location not matched');
            redirect(base_url('page/78/1'));
        }
    }
 
}
/* End of file DeptModel.php */
/* Location: ./application/modules/department/models/admin/DeptModel.php */