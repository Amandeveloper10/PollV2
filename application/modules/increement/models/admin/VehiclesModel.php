<?php
/**
 * vehicles Model Class. Handles all the datatypes and methodes required for handling vehicles
 */
class VehiclesModel extends CI_Model {

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
     * Used for loading functionality of vehicles for an admin
     *
     * <p>Description</p>
     *
     * <p>This function loads all the vehicles that has been added by current admin [Table: vehicles]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_all_data() {
        $this->db->select('t1.*');
        $this->db->from(tablename('vehicles') . ' as t1');
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
     public function load_all_employee() {
        $this->db->select('t1.*');
        $this->db->from(tablename('employee') . ' as t1');
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
    
    public function load_all_data_vehicle() {
        $this->db->select('t1.*,t2.vehicle_no');
        $this->db->from(tablename('vehicle-maintenance') . ' as t1');
        $this->db->join(tablename('vehicles'). ' as t2', 't1.vehicle_id = t2.id');
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
    
     public function load_all_data_vehicle_asignment() {
        $this->db->select('t1.*,t2.vehicle_no,t3.first_name,t3.middle_name,t3.last_name,t3.employee_no');
        $this->db->from(tablename('vehicle-asignment') . ' as t1');
        $this->db->join(tablename('vehicles'). ' as t2', 't1.vehicle_id = t2.id');
        $this->db->join(tablename('employee'). ' as t3', 't1.employe_id = t3.id');
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
     * <p>This function Used for add/edit vehicles</p>
     *
     * @access  public
     * @param   id
     * @return string
     */

     public function modify($id) {  
      //echo "<pre>"; print_r($_POST); die;

        $vehicle_no= $this->input->post('vehicle_no');
        $vehicle_reg_code= $this->input->post('vehicle_reg_code');
        $vehicle_name= $this->input->post('vehicle_name');
        $vehicle_model_year= $this->input->post('vehicle_model_year');
        $purchase_amount= $this->input->post('purchase_amount');
        $assign_emloyee= $this->input->post('assign_emloyee');
        $reg_doc= $this->input->post('reg_doc_1');
        $insur_doc= $this->input->post('insur_doc_1');


        $date = date("Y-m-d H:i:s");

        if (!empty($id)) {
                $data = array(
                    'vehicle_no' => $vehicle_no,
                    'vehicle_reg_code' => $vehicle_reg_code,
                    'vehicle_name' => $vehicle_name,
                    'vehicle_model_year' => $vehicle_model_year,
                    'purchase_amount' => $purchase_amount,
                    'assign_emloyee' => $assign_emloyee,
                    'reg_doc' => $reg_doc,
                    'insur_doc' => $insur_doc,
                    'modified_date' => $date
                );
           
            $this->db->where('id', $id)->update(tablename('vehicles'), $data);
            $this->session->set_flashdata('successmessage', 'Vehicles modified successfully');
            redirect(base_url('page/48/1'));
        } else {
         
                $data = array(
                    'vehicle_no' => $vehicle_no,
                    'vehicle_reg_code' => $vehicle_reg_code,
                    'vehicle_name' => $vehicle_name,
                    'vehicle_model_year' => $vehicle_model_year,
                    'purchase_amount' => $purchase_amount,
                    'assign_emloyee' => $assign_emloyee,
                    'reg_doc' => $reg_doc,
                    'insur_doc' => $insur_doc,
                    'entry_date' => $date
                );
            
            $this->db->insert(tablename('vehicles'), $data);
            
             $this->session->set_flashdata('successmessage', 'Vehicles added successfully');
            redirect(base_url('page/48/1'));
        }
    }
    
     public function modify_maintenance($id) {  
      //echo "<pre>"; print_r($_POST); die;

        $vehicle_id= $this->input->post('vehicle_id');
        $maintenance_date= $this->input->post('maintenance_date');
        $expenses= $this->input->post('expenses');
        $details= $this->input->post('details');
       


        $date = date("Y-m-d H:i:s");

        if (!empty($id)) {
                $data = array(
                    'vehicle_id' => $vehicle_id,
                    'maintenance_date' => $maintenance_date,
                    'expenses' => $expenses,
                    
                    'details' => $details,
                   
                  
                    'modified_date' => $date
                );
           
            $this->db->where('id', $id)->update(tablename('vehicle-maintenance'), $data);
            $this->session->set_flashdata('successmessage', 'Vehicles modified successfully');
            redirect(base_url('page/58/1'));
        } else {
         
                $data = array(
                    'vehicle_id' => $vehicle_id,
                    'maintenance_date' => $maintenance_date,
                    'expenses' => $expenses,
                   
                    'details' => $details,
                    'entry_date' => date("Y-m-d"),
                  
                    'modified_date' => $date
                );
            
            $this->db->insert(tablename('vehicle-maintenance'), $data);
       //  echo   $this->db->last_query();exit;
             $this->session->set_flashdata('successmessage', 'Details added successfully');
            redirect(base_url('page/58/1'));
        }
    }
    
    public function modify_asignment($id) {  
      //echo "<pre>"; print_r($_POST); die;

        $vehicle_id= $this->input->post('vehicle_id');
        $employe_id= $this->input->post('employee_id');
        $designation= $this->input->post('designation');
        $from_date= $this->input->post('from_date');
        $to_date= $this->input->post('to_date');
       


        $date = date("Y-m-d H:i:s");

        if (!empty($id)) {
                $data = array(
                    'vehicle_id' => $vehicle_id,
                   
                    'employe_id' => $employe_id,
                     'from_date' => $from_date,
                     'to_date' => $to_date,
                    'modified_date' => $date
                );
           
            $this->db->where('id', $id)->update(tablename('vehicle-asignment'), $data);
            $this->session->set_flashdata('successmessage', 'Vehicles modified successfully');
            redirect(base_url('page/60/1'));
        } else {
         
                $data = array(
                   'vehicle_id' => $vehicle_id,
                    
                    'employe_id' => $employe_id,
                    'entry_date' => date("Y-m-d"),
                    'from_date' => $from_date,
                     'to_date' => $to_date,
                    'modified_date' => $date
                );
         //   echo '<pre>'; print_r($data);exit;
            $this->db->insert(tablename('vehicle-asignment'), $data);
        // echo   $this->db->last_query();exit;
             $this->session->set_flashdata('successmessage', 'Details added successfully');
            redirect(base_url('page/60/1'));
        }
    }



    /**
     * Used for get vehicles by id
     *
     * <p>Description</p>
     *
     * <p>This function get vehicles by id from table [Table: vehicles]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_single_data($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('vehicles'));
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {           
            return $result;
        } else {
            return array();
        }
    }
    
      public function load_single_vehicle_maintenance($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('vehicle-maintenance'));
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {           
            return $result;
        } else {
            return array();
        }
    }
     public function load_single_vehicle_asignment($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('vehicle-asignment'));
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
     * Used for delete vehicles
     *
     * <p>Description</p>
     *
     * <p>This function delete vehicles [Table: vehicles]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function delete_this($id) {
        $this->db->select('*');
        $this->db->from(tablename('vehicles'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result)) {            
            $update_faq = array('is_active' => 'N','delete_flag'=> 'Y');
            $this->db->where('id', $id);
            if ($this->db->update('vehicles', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'Vehicles Deleted successfully');
            redirect(base_url('page/48/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/48/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Vehicles not matched');
            redirect(base_url('page/48/1'));
        }
    }
    
    public function maintenance_delete($id) {
        $this->db->select('*');
        $this->db->from(tablename('vehicle-maintenance'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result)) {            
            $update_faq = array('is_active' => 'N','delete_flag'=> 'Y');
            $this->db->where('id', $id);
            if ($this->db->update('vehicle-maintenance', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'Vehicles Deleted successfully');
            redirect(base_url('page/58/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/58/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Vehicles not matched');
            redirect(base_url('page/58/1'));
        }
    }
     public function asignment_delete($id) {
        $this->db->select('*');
        $this->db->from(tablename('vehicle-asignment'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result)) {            
            $update_faq = array('is_active' => 'N','delete_flag'=> 'Y');
            $this->db->where('id', $id);
            if ($this->db->update('vehicle-asignment', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'Vehicles Deleted successfully');
            redirect(base_url('page/60/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/60/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Vehicles not matched');
            redirect(base_url('page/60/1'));
        }
    }
 
}
/* End of file VehiclesModel.php */
/* Location: ./application/modules/vehicles/models/admin/VehiclesModel.php */