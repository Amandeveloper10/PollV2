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
        $this->db->select('t1.*,employee.first_name,employee.middle_name,employee.last_name,employee.employee_no');
        $this->db->from(tablename('leave_settlement') . ' as t1')->join('employee', 'employee.id = t1.employee_id');
        $this->db->where('t1.delete_flag', 'N');
        $this->db->where('employee.is_active', 'Y'); 
        $this->db->where('employee.delete_flag', 'N'); 		
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
        $employee_id= $this->input->post('employee_id');
        $amount= $this->input->post('amount');
        $settlement_date= date('Y-m-d',strtotime($this->input->post('settlement_date')));
        $description= $this->input->post('description');

        $leave_type= $this->input->post('leave_type');
        $settlement_leaves= $this->input->post('settlement_leaves');
        $basic_amount= $this->input->post('basic_amount');
        $total_days= $this->input->post('total_days');

        $date = date("Y-m-d H:i:s");

        if (!empty($id)) {
                $data = array(
                    'employee_id' =>  $employee_id,
                    'description' => $description,
                    'settlement_date' => $settlement_date,
                    'amount' => $amount,

                    'leave_type_id' =>  $leave_type,
                    'settlement_leaves' => $settlement_leaves,
                    'basic_amount' => $basic_amount,
                    'total_days' => $total_days,
                    'modified_date' => $date
                );
           
            $this->db->where('id', $id)->update(tablename('leave_settlement'), $data);
            $this->session->set_flashdata('successmessage', 'Settlement modified successfully');
            redirect(base_url('page/71/1'));
        } else {
         
                $data = array(
                    'employee_id' =>  $employee_id,
                    'description' => $description,
                    'settlement_date' => $settlement_date,
                    'amount' => $amount,
                    'leave_type_id' =>  $leave_type,
                    'settlement_leaves' => $settlement_leaves,
                    'basic_amount' => $basic_amount,
                    'total_days' => $total_days,
                    'entry_date' => $date,
                );
            
            $this->db->insert(tablename('leave_settlement'), $data);
            $inserted_id = $this->db->insert_id();
             $transactiondata = array(
                    'transaction_id' =>  'TNX/'.$inserted_id.'/'.date('m').'/'.date('Y')
                );
            $this->db->where('id', $inserted_id)->update(tablename('leave_settlement'), $transactiondata);

             $this->session->set_flashdata('successmessage', 'Settlement added successfully');
            redirect(base_url('page/71/1'));
        }
    }

 public function load_all_employee() {
        $this->db->select('t1.*');
        $this->db->from(tablename('employee') . ' as t1');
        $this->db->where('t1.is_active', 'Y'); 
        $this->db->where('t1.delete_flag', 'N'); 
		$this->db->order_by("t1.first_name", "asc");
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
        $this->db->from(tablename('leave_settlement'));
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
        $this->db->from(tablename('leave_settlement'));
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
            if ($this->db->update('leave_settlement', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'Settlement Status changed successfully');
            redirect(base_url('page/71/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/71/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Settlement not matched');
            redirect(base_url('page/71/1'));
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
        $this->db->from(tablename('leave_settlement'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result)) {            
            $update_faq = array('is_active' => 'N','delete_flag'=> 'Y');
            $this->db->where('id', $id);
            if ($this->db->update('leave_settlement', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'Settlement Deleted successfully');
            redirect(base_url('page/71/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/71/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Settlement not matched');
            redirect(base_url('page/71/1'));
        }
    }

    public function leave_due_day($leave_id=NULL,$employee_id=NULL) {
        $this->db->select('sum(t1.leave_total_days) as totalday');
        $this->db->from(tablename('employee_leave_application') . ' as t1');
        $this->db->where('t1.leave_type_id', $leave_id);
        $this->db->where('t1.employee_id', $employee_id);
        $this->db->where('t1.approved', 'Yes');
        $query = $this->db->get();
        $result = $query->row();
       // echo 'yyyy'. $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result->totalday;
        } else {
            return 0;
        }
    }

       public function settlement_due_day($leave_id=NULL,$employee_id=NULL) {
        $this->db->select('sum(t1.settlement_leaves) as totalsettday');
        $this->db->from(tablename('leave_settlement') . ' as t1');
        $this->db->where('t1.leave_type_id', $leave_id);
        $this->db->where('t1.employee_id', $employee_id);
        //$this->db->where('t1.approved', 'Yes');
        $query = $this->db->get();
        $result = $query->row();
       // echo 'yyyy'. $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result->totalsettday;
        } else {
            return 0;
        }
    }
 
}
/* End of file DesiModel.php */
/* Location: ./application/modules/designation/models/admin/DesiModel.php */