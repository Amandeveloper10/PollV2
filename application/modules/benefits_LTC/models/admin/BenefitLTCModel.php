<?php
/**
 * benefits_LTC Model Class. Handles all the datatypes and methodes required for handling benefits_LTC
 */
class BenefitLTCModel extends CI_Model {

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
     * Used for loading functionality of benefits_LTC for an admin
     *
     * <p>Description</p>
     *
     * <p>This function loads all the benefits_LTC that has been added by current admin [Table: master_benefits_LTC]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_all_data() {
        $this->db->select('t1.*');
        $this->db->from(tablename('master_benefits_LTC') . ' as t1');
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
     * <p>This function Used for add/edit benefits_LTC</p>
     *
     * @access  public
     * @param   id
     * @return string
     */

     public function modify($id) {  
      //echo "<pre>"; print_r($_POST); die;
        $employee_id= $this->input->post('employee_id');
        $start_date= $this->input->post('start_date');
        $end_date= $this->input->post('end_date');
        $premium= $this->input->post('premium');


        

        $date = date("Y-m-d H:i:s");

        if (!empty($id)) {
                $data = array(
                    'employee_id' =>  $employee_id,
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'premium' => $premium,
                    'modified_date' => $date
                );
           
            $this->db->where('id', $id)->update(tablename('master_benefits_LTC'), $data);
            $this->session->set_flashdata('successmessage', 'Benefits / Leave Travel Allowance (LTC) modified successfully');
            redirect(base_url('page/19/1'));
        } else {
         
                $data = array(
                    'employee_id' =>  $employee_id,
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'premium' => $premium,
                    'entry_date' => $date
                );
            
            $this->db->insert(tablename('master_benefits_LTC'), $data);
            
             $this->session->set_flashdata('successmessage', 'Benefits / Leave Travel Allowance (LTC) added successfully');
            redirect(base_url('page/19/1'));
        }
    }



    /**
     * Used for get benefits_LTC by id
     *
     * <p>Description</p>
     *
     * <p>This function get benefits_LTC by id from table [Table: master_benefits_LTC]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_single_data($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('master_benefits_LTC'));
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
     * Used for status benefits_LTC
     *
     * <p>Description</p>
     *
     * <p>This function status benefits_LTC [Table: master_benefits_LTC]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function status_change($id) {
        $this->db->select('*');
        $this->db->from(tablename('master_benefits_LTC'));
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
            if ($this->db->update('master_benefits_LTC', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'Benefits / Leave Travel Allowance (LTC) Status changed successfully');
            redirect(base_url('page/19/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/19/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Benefits / Leave Travel Allowance (LTC) not matched');
            redirect(base_url('page/19/1'));
        }
    }

    /**
     * Used for delete benefits_LTC
     *
     * <p>Description</p>
     *
     * <p>This function delete benefits_LTC [Table: master_benefits_LTC]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function delete_this($id) {
        $this->db->select('*');
        $this->db->from(tablename('master_benefits_LTC'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result)) {            
            $update_faq = array('is_active' => 'N','delete_flag'=> 'Y');
            $this->db->where('id', $id);
            if ($this->db->update('master_benefits_LTC', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'Benefits / Leave Travel Allowance (LTC) Deleted successfully');
            redirect(base_url('page/19/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/19/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Benefits / Leave Travel Allowance (LTC) not matched');
            redirect(base_url('page/19/1'));
        }
    }
 
}
/* End of file BenefitLTCModel.php */
/* Location: ./application/modules/benefits_LTC/models/admin/BenefitLTCModel.php */