<?php
/**
 * department Model Class. Handles all the datatypes and methodes required for handling department
 */
class EquipmentModel extends CI_Model {

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
    public function load_all_data() {
        $this->db->select('t1.*');
        $this->db->from(tablename('equipment') . ' as t1');
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
        $equipment_name= $this->input->post('equipment_name');

        $quantity= $this->input->post('quantity');
       
        $date = date("Y-m-d H:i:s");

        if (!empty($id)) {
                $data = array(
                    'equipment_name' =>  $equipment_name,

                    'quantity' =>$quantity,
                    
                    'modified_date' => $date
                );
           
            $this->db->where('id', $id)->update(tablename('equipment'), $data);
            $this->session->set_flashdata('successmessage', 'Equipment modified successfully');
            redirect(base_url('page/72/1'));
        } else {
         
                $data = array(
                    'equipment_name' =>  $equipment_name,

                    'quantity' =>$quantity,
                  
                    'entry_date' => $date,
                );
            
            $this->db->insert(tablename('equipment'), $data);
            
             $this->session->set_flashdata('successmessage', 'Equipment added successfully');
            redirect(base_url('page/72/1'));
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
        $this->db->from(tablename('equipment'));
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
            redirect(base_url('page/72/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/72/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Equipment not matched');
            redirect(base_url('page/72/1'));
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
        $this->db->from(tablename('equipment'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result)) {            
            $update_faq = array('is_active' => 'N','delete_flag'=> 'Y');
            $this->db->where('id', $id);
            if ($this->db->update('equipment', $update_faq)) {
				
			$update_faq1 = array('is_active' => 'N','delete_flag'=> 'Y');
			$this->db->where('equipment_id', $id);
			$this->db->update('assign_employee', $update_faq1);
			
            $this->session->set_flashdata('successmessage', 'Equipment Deleted successfully');
            redirect(base_url('page/72/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/72/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Equipment not matched');
            redirect(base_url('page/72/1'));
        }
    }
 
}
/* End of file DeptModel.php */
/* Location: ./application/modules/department/models/admin/DeptModel.php */