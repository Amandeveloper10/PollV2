<?php
/**
 * tenancy_contracts Model Class. Handles all the datatypes and methodes required for handling tenancy_contracts
 */
class TenancyModel extends CI_Model {

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
     * Used for loading functionality of tenancy for an admin
     *
     * <p>Description</p>
     *
     * <p>This function loads all the tenancy that has been added by current admin [Table: tenancy]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_all_data_tenancy() {
        $this->db->select('t1.*');
        $this->db->from(tablename('tenancy') . ' as t1');
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
     * Used for loading functionality of tenancy_contracts for an admin
     *
     * <p>Description</p>
     *
     * <p>This function loads all the tenancy_contracts that has been added by current admin [Table: tenancy_contracts]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_all_data($id) {
        $this->db->select('t1.*');
        $this->db->from(tablename('tenancy_contracts') . ' as t1');
        $this->db->where('t1.tenancy_id', $id); 
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
     * <p>This function Used for add/edit tenancy_contracts</p>
     *
     * @access  public
     * @param   id
     * @return string
     */

     public function modify($id) {  
      //echo "<pre>"; print_r($_POST); die;
        $contract_no= $this->input->post('contract_no');
        $landloard_name= $this->input->post('landloard_name');
        $contract_amount= $this->input->post('contract_amount');
        $security_deposite_amount= $this->input->post('security_deposite_amount');
        $no_of_rooms= $this->input->post('no_of_rooms');
        $start_date= $this->input->post('start_date');
        $expiry_date= $this->input->post('expiry_date'); 

        $tenancy_id= $this->input->post('tenancy_id'); 


        $date = date("Y-m-d H:i:s");

        if (!empty($id)) {
                $data = array(
                    'tenancy_id' => $tenancy_id,
                    'contract_no' => $contract_no,
                    'landloard_name' => $landloard_name,
                    'contract_amount' => $contract_amount,
                    'security_deposite_amount' => $security_deposite_amount,
                    'no_of_rooms' => $no_of_rooms,
                    'start_date' => $start_date,
                    'expiry_date' => $expiry_date,
                    'modified_date' => $date
                );
           
            $this->db->where('id', $id)->update(tablename('tenancy_contracts'), $data);
            $this->session->set_flashdata('successmessage', 'Tenancy Contracts modified successfully');
           // redirect(base_url('page/61/'.$tenancy_id.'/1'));
            //redirect(base_url('page/61/'.$tenancy_id));
            redirect(base_url('save_index_tenancy/'.$tenancy_id));
        } else {
         
                $data = array(
                    'tenancy_id' => $tenancy_id,
                    'contract_no' => $contract_no,
                    'landloard_name' => $landloard_name,
                    'contract_amount' => $contract_amount,
                    'security_deposite_amount' => $security_deposite_amount,
                    'no_of_rooms' => $no_of_rooms,
                    'start_date' => $start_date,
                    'expiry_date' => $expiry_date,
                    'entry_date' => $date
                );
            
            $this->db->insert(tablename('tenancy_contracts'), $data);
            
             $this->session->set_flashdata('successmessage', 'Tenancy Contracts added successfully');
           // redirect(base_url('page/61/'.$tenancy_id.'/1'));
         //  redirect(base_url('page/61/'.$tenancy_id));
             redirect(base_url('save_index_tenancy/'.$tenancy_id));
        }
    }



    /**
     * Used for get tenancy_contracts by id
     *
     * <p>Description</p>
     *
     * <p>This function get tenancy_contracts by id from table [Table: tenancy_contracts]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_single_data($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('tenancy_contracts'));
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
     * Used for add/edit rows from a table
     *
     * <p>Description</p>
     *
     * <p>This function Used for add/edit tenancy</p>
     *
     * @access  public
     * @param   id
     * @return string
     */

     public function modify_tenancy($id) {  
      //echo "<pre>"; print_r($_POST); die;
        $type= $this->input->post('type');
        $name= $this->input->post('name');
        $camp_details = ($this->input->post('camp_details')) ? $this->input->post('camp_details') : '';
        $labor_name = ($this->input->post('labor_name')) ? $this->input->post('labor_name') : '';
        $details = ($this->input->post('details')) ? $this->input->post('details') : '';
        $date = date("Y-m-d H:i:s");

        if (!empty($id)) {
                $data = array(
                    'type' => $type,
                    'name' => $name,
                    'camp_details' => $camp_details,
                    'labor_name' => $labor_name,
                    'details' => $details,
                    'modified_date' => $date
                );
           
            $this->db->where('id', $id)->update(tablename('tenancy'), $data);
            $this->session->set_flashdata('successmessage', 'Tenancy Contracts modified successfully');
            redirect(base_url('page/47/1'));
            // redirect(base_url('tenancy'));
        } else {
         
                $data = array(
                    'type' => $type,
                    'name' => $name,
                    'camp_details' => $camp_details,
                    'labor_name' => $labor_name,
                    'details' => $details,
                    'entry_date' => $date
                );
            
            $this->db->insert(tablename('tenancy'), $data);
            
             $this->session->set_flashdata('successmessage', 'Tenancy Contracts added successfully');
            redirect(base_url('page/47/1'));
             // redirect(base_url('tenancy'));
        }
    }



    /**
     * Used for get tenancy by id
     *
     * <p>Description</p>
     *
     * <p>This function get tenancy by id from table [Table: tenancy]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_single_data_tenancy($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('tenancy'));
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
     * Used for delete tenancy_contracts
     *
     * <p>Description</p>
     *
     * <p>This function delete tenancy_contracts [Table: tenancy_contracts]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function delete_this($id) {
        $this->db->select('*');
        $this->db->from(tablename('tenancy_contracts'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result)) {            
            $update_faq = array('is_active' => 'N','delete_flag'=> 'Y');
            $this->db->where('id', $id);
            if ($this->db->update('tenancy_contracts', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'Tenancy Contracts Deleted successfully');
            redirect(base_url('page/61/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/61/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Tenancy Contracts not matched');
            redirect(base_url('page/61/1'));
        }
    }
 
}
/* End of file TenancyModel.php */
/* Location: ./application/modules/tenancy_contracts/models/admin/TenancyModel.php */