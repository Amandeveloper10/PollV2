<?php
/**
 * insurance_policies Model Class. Handles all the datatypes and methodes required for handling insurance_policies
 */
class InsuranceModel extends CI_Model {

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
     * Used for loading functionality of insurance_policies for an admin
     *
     * <p>Description</p>
     *
     * <p>This function loads all the insurance_policies that has been added by current admin [Table: insurance_policies]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_all_data() {
        $this->db->select('t1.*');
        $this->db->from(tablename('insurance_policies') . ' as t1');
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
     * <p>This function Used for add/edit insurance_policies</p>
     *
     * @access  public
     * @param   id
     * @return string
     */

     public function modify($id) {  
      //echo "<pre>"; print_r($_POST); die;
      
        $policy_name= $this->input->post('policy_name');
        $policy_for= $this->input->post('policy_for');
        $renewal_date= date('y-m-d',strtotime($this->input->post('renewal_date')));
        $expiry_date= date('y-m-d',strtotime($this->input->post('expiry_date')));
        $coverage= $this->input->post('coverage');
        $note= $this->input->post('note');
        $type= $this->input->post('type');
        $date = date("Y-m-d H:i:s");

        if (!empty($id)) {
                $data = array(
                    'policy_name' => $policy_name,
                     'insurence_for' => $policy_for,
                    'type' => $type,
                    'renewal_date' => $renewal_date,
                    'expiry_date' => $expiry_date,
                    'coverage' => $coverage,
                    'note' => $note,
                    'modified_date' => $date
                );
           
            $this->db->where('id', $id)->update(tablename('insurance_policies'), $data);
            $this->session->set_flashdata('successmessage', 'Policy modified successfully');
            redirect(base_url('page/49/1'));
        } else {
         
                $data = array(
                    'policy_name' => $policy_name,
                    'insurence_for' => $policy_for,
                     'type' => $type,
                    'renewal_date' => $renewal_date,
                    'expiry_date' => $expiry_date,
                    'coverage' => $coverage,
                    'note' => $note,
                    'entry_date' => $date
                );
            
            $this->db->insert(tablename('insurance_policies'), $data);
            
             $this->session->set_flashdata('successmessage', 'Policy added successfully');
            redirect(base_url('page/49/1'));
        }
    }



    /**
     * Used for get insurance_policies by id
     *
     * <p>Description</p>
     *
     * <p>This function get insurance_policies by id from table [Table: insurance_policies]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_single_data($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('insurance_policies'));
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
     * Used for delete insurance_policies
     *
     * <p>Description</p>
     *
     * <p>This function delete insurance_policies [Table: insurance_policies]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function delete_this($id) {
        $this->db->select('*');
        $this->db->from(tablename('insurance_policies'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result)) {            
            $update_faq = array('is_active' => 'N','delete_flag'=> 'Y');
            $this->db->where('id', $id);
            if ($this->db->update('insurance_policies', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'Policy Deleted successfully');
            redirect(base_url('page/49/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/49/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Policy not matched');
            redirect(base_url('page/49/1'));
        }
    }
	
	 public function check_policy($policy_name = "",$id = "") {
        $this->db->select('t1.*'); 
        $this->db->from(tablename('insurance_policies') . ' as t1');
        $this->db->where('t1.delete_flag', 'N');
        $this->db->where('t1.is_active', 'Y');
        $this->db->where('t1.policy_name', $policy_name);
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
 
}
/* End of file InsuranceModel.php */
/* Location: ./application/modules/insurance_policies/models/admin/InsuranceModel.php */