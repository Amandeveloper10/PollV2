<?php
/**
 * pf_admin Model Class. Handles all the datatypes and methodes required for handling pf_admin
 */
class PFModel extends CI_Model {

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
     * Used for loading functionality of pf_admin for an admin
     *
     * <p>Description</p>
     *
     * <p>This function loads all the pf_admin that has been added by current admin [Table: pf_admin]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_all_data() {
        $this->db->select('t1.*');
        $this->db->from(tablename('pf_admin') . ' as t1');
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
     * <p>This function Used for add/edit pf_admin</p>
     *
     * @access  public
     * @param   id
     * @return string
     */

     public function modify($id) {  
      //echo "<pre>"; print_r($_POST); die;


        $employee_pf_account_no = $this->input->post('employee_pf_account_no');
        $employee_pf_percent = $this->input->post('employee_pf_percent');
        $employer_pf_percent = $this->input->post('employer_pf_percent');
       

        $date = date("Y-m-d H:i:s");

        if (!empty($id)) {
                $data = array(
                    'employee_pf_account_no' => $employee_pf_account_no,
                    'employee_pf_percent' => $employee_pf_percent,
                    'employer_pf_percent' => $employer_pf_percent
                   
                );
           
            $this->db->where('id', $id)->update(tablename('pf_admin'), $data);
            $this->session->set_flashdata('successmessage', 'pf_admin Details modified successfully');
            redirect(base_url('page/77/1'));
        } else {
         
                $data = array(
                    'employee_pf_account_no' => $employee_pf_account_no,
                    'employee_pf_percent' => $employee_pf_percent,
                    'employer_pf_percent' => $employer_pf_percent
                );
            
            $this->db->insert(tablename('pf_admin'), $data);
            
             $this->session->set_flashdata('successmessage', 'pf_admin Details added successfully');
            redirect(base_url('page/77/1'));
        }
    }



    /**
     * Used for get pf_admin by id
     *
     * <p>Description</p>
     *
     * <p>This function get pf_admin by id from table [Table: pf_admin]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_single_data($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('pf_admin'));
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
     * Used for status pf_admin
     *
     * <p>Description</p>
     *
     * <p>This function status pf_admin [Table: pf_admin]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function status_change($id) {
        $this->db->select('*');
        $this->db->from(tablename('pf_admin'));
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
            if ($this->db->update('pf_admin', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'pf_admin Details Status changed successfully');
            redirect(base_url('page/77/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/77/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'pf_admin Details not matched');
            redirect(base_url('page/77/1'));
        }
    }

    /**
     * Used for delete pf_admin
     *
     * <p>Description</p>
     *
     * <p>This function delete pf_admin [Table: pf_admin]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function delete_this($id) {
        $this->db->select('*');
        $this->db->from(tablename('pf_admin'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result)) {            
            $update_faq = array('is_active' => 'N','delete_flag'=> 'Y');
            $this->db->where('id', $id);
            if ($this->db->update('pf_admin', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'pf_admin Details Deleted successfully');
            redirect(base_url('page/77/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/77/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'pf_admin Details not matched');
            redirect(base_url('page/77/1'));
        }
    }
 
}
/* End of file SetOrgBankModel.php */
/* Location: ./application/modules/pf_admin/models/admin/SetOrgBankModel.php */