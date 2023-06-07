<?php
/**
 * department Model Class. Handles all the datatypes and methodes required for handling department
 */
class AssignedModel extends CI_Model {

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
        $this->db->select('t1.*,t2.first_name,t2.middle_name,t2.last_name,t3.equipment_name,t2.employee_no');
        $this->db->from(tablename('assign_employee') . ' as t1');
        $this->db->join(tablename('employee'). ' as t2', 't1.employee_id = t2.id');
        $this->db->join(tablename('equipment'). ' as t3', 't1.equipment_id = t3.id');
        $this->db->where('t1.delete_flag', 'N'); 
		$this->db->where('t2.delete_flag', 'N'); 
		$this->db->where('t2.is_active', 'Y'); 
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
    public function load_all_equipment(){

        $this->db->select('t1.*');
        $this->db->from(tablename('equipment') . ' as t1');
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
        $equipment_id= $this->input->post('equipment');

        $employee_id= $this->input->post('employee');

        $quantity= $this->input->post('quantity');
        $date = date("Y-m-d H:i:s");

        $this->db->select('t1.*');
        $this->db->from(tablename('equipment') . ' as t1');
        $this->db->where('t1.delete_flag', 'N'); 
        $this->db->where('t1.id', $equipment_id ); 
        $query = $this->db->get();
        $result = $query->row();

        
            if (!empty($id)) {

                    $this->db->select('t1.*');
                    $this->db->from(tablename('assign_employee') . ' as t1');
                    $this->db->where('t1.delete_flag', 'N'); 
                    $this->db->where('t1.id', $id ); 
                    $query = $this->db->get();
                    $result_assign_employee = $query->row();

                    $available=$result->quantity- $result->assigned + $result_assign_employee->quantity;

                   // echo "<pre>"; print_r($result->assigned); die;
                   
                   if($available >= $quantity){

                    $data1 = array(
                        'assigned' =>  $result->assigned + $quantity - $result_assign_employee->quantity,
                    );
                    $this->db->where('id', $equipment_id)->update(tablename('equipment'), $data1);

                      $data = array(
                        'equipment_id' =>  $equipment_id,

                        'employee_id'  => $employee_id,
                         
                        'quantity' =>$quantity,
                        
                        'modified_date' => $date
                    );
               
                    $this->db->where('id', $id)->update(tablename('assign_employee'), $data);
                    $this->session->set_flashdata('successmessage', 'Assigned Equipment modified successfully');
                    redirect(base_url('page/73/1'));

                   }else{

                        $this->session->set_flashdata('successmessage', 'Oops ! out of stock ');
                        redirect(base_url('page/73/1'));

                   }

                    
            } else {

                $available=$result->quantity-$result->assigned;
       
                if($available >= $quantity){
                   $data1 = array(
                        'assigned' =>  $result->assigned + $quantity,
                    );
                    $this->db->where('id', $equipment_id)->update(tablename('equipment'), $data1);
                 
                        $data = array(
                            'equipment_id' =>  $equipment_id,

                            'employee_id'  => $employee_id,

                            'quantity' =>$quantity,
                          
                            'entry_date' => $date,
                        );
                    
                    $this->db->insert(tablename('assign_employee'), $data);
                    
                     $this->session->set_flashdata('successmessage', 'Assigned Equipment added successfully');
                    redirect(base_url('page/73/1'));
                }else{
                    $this->session->set_flashdata('successmessage', 'Oops ! out of stock ');
                    redirect(base_url('page/73/1'));
                }
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
        $this->db->from(tablename('assign_employee'));
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
            redirect(base_url('page/73/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/73/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Equipment not matched');
            redirect(base_url('page/73/1'));
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
        $this->db->from(tablename('assign_employee'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result)) {   

            $update_faq = array('is_active' => 'N','delete_flag'=> 'Y');
            $this->db->where('id', $id);
            if ($this->db->update('assign_employee', $update_faq)) {

                 $quantity=$result->quantity ; 

                 $equipment_id=$result->equipment_id;

                $this->db->select('*');
                $this->db->from(tablename('equipment'));
                $this->db->where('id', $equipment_id);
                $this->db->where('delete_flag', 'N');
                $query1 = $this->db->get();
                $result1 = $query1->row();

                $data = array(
                        'assigned' =>  $result1->assigned - $quantity,
                    );    
                $this->db->where('id', $equipment_id);
                $this->db->update('equipment', $data);

            $this->session->set_flashdata('successmessage', 'Assigned Equipment Deleted successfully');
            redirect(base_url('page/73/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/73/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Assigned Equipment not matched');
            redirect(base_url('page/73/1'));
        }
    }
	
	public function check_all_equipment($equipment_id){
        $this->db->select('t1.*');
        $this->db->from(tablename('equipment') . ' as t1');
        $this->db->where('t1.delete_flag', 'N'); 
		$this->db->where('t1.id', $equipment_id);
        $query = $this->db->get();
        $result = $query->row();
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