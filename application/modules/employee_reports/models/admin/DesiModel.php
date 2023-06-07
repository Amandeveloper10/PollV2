<?php
/**
 * designation Model Class. Handles all the datatypes and methodes required for handling designation
 */
class DesiModel extends CI_Model {

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
     * Used for loading functionality of designation for an admin
     *
     * <p>Description</p>
     *
     * <p>This function loads all the designation that has been added by current admin [Table: master_designation]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_all_data() {
        $this->db->select('t1.*');
        $this->db->from(tablename('master_gratuity_formula') . ' as t1');
        $this->db->where('t1.delete_flag', 'N'); 
        $this->db->where('t1.is_active', 'Y'); 
        $this->db->order_by('no_of_year', 'desc');
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
    
     public function load_all_employee() {
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
     * <p>This function Used for add/edit designation</p>
     *
     * @access  public
     * @param   id
     * @return string
     */

     public function modify($id) {  
        //echo "<pre>"; print_r($_POST); die;
        $designation_name= $this->input->post('designation_name');
        $description= $this->input->post('description');
        $date = date("Y-m-d H:i:s");

        if (!empty($id)) {
                $data = array(
                    'designation_name' =>  $designation_name,
                    'description' => $description,
                    'modified_date' => $date
                );
           
            $this->db->where('id', $id)->update(tablename('master_designation'), $data);
            $this->session->set_flashdata('successmessage', 'designation modified successfully');
            redirect(base_url('page/7/1'));
        } else {
         
                $data = array(
                    'designation_name' =>  $designation_name,
                    'description' => $description,
                    'entry_date' => $date,
                );
            
            $this->db->insert(tablename('master_designation'), $data);
            
             $this->session->set_flashdata('successmessage', 'designation added successfully');
            redirect(base_url('page/7/1'));
        }
    }



    /**
     * Used for get designation by id
     *
     * <p>Description</p>
     *
     * <p>This function get designation by id from table [Table: master_designation]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_single_data($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('master_designation'));
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
     * Used for status designation
     *
     * <p>Description</p>
     *
     * <p>This function status designation [Table: master_designation]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function status_change($id) {
        $this->db->select('*');
        $this->db->from(tablename('master_designation'));
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
            if ($this->db->update('master_designation', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'designation Status changed successfully');
            redirect(base_url('page/7/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/7/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'designation not matched');
            redirect(base_url('page/7/1'));
        }
    }

    /**
     * Used for delete designation
     *
     * <p>Description</p>
     *
     * <p>This function delete designation [Table: master_designation]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function delete_this($id) {
        $this->db->select('*');
        $this->db->from(tablename('master_designation'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result)) {            
            $update_faq = array('is_active' => 'N','delete_flag'=> 'Y');
            $this->db->where('id', $id);
            if ($this->db->update('master_designation', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'designation Deleted successfully');
            redirect(base_url('page/7/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/7/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'designation not matched');
            redirect(base_url('page/7/1'));
        }
    }
 
}
/* End of file DesiModel.php */
/* Location: ./application/modules/designation/models/admin/DesiModel.php */