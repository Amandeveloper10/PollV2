<?php

/**
 * overtime_rules Model Class. Handles all the datagrade_ids and methodes required for handling overtime_rules
 */
class OvertimeRulesModel extends CI_Model {

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
     * Used for loading functionality of overtime_rules for an admin
     *
     * <p>Description</p>
     *
     * <p>This function loads all the overtime_rules that has been added by current admin [Table: master_overtime_rules]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_all_data() {
        $this->db->select('t1.*');
        $this->db->from(tablename('master_overtime_rules') . ' as t1');
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
     * <p>This function Used for add/edit overtime_rules</p>
     *
     * @access  public
     * @param   id
     * @return string
     */
    public function modify($id) {
           
        //echo "<pre>"; print_r($_POST); die;
        $overtime_name = $this->input->post('overtime_name');
        $overtime_type = $this->input->post('overtime_type');
        $component = $this->input->post('component');        
        $day = $this->input->post('day');
        $hour = $this->input->post('hour');
        $multiply_by = $this->input->post('multiply_by');    
        $hour_take_leave = $this->input->post('hour_take_leave');    
         

        $date = date("Y-m-d H:i:s");

        if (!empty($id)) {
            $data = array(
                'overtime_name' => $overtime_name,
                'overtime_type' => $overtime_type,
		        'component' => $component,    
		        'day' => $day,
		        'hour' => $hour,
		        'multiply_by' => $multiply_by,
                'modified_date' => $date,
                'hour_take_leave' => $hour_take_leave
            );

            $this->db->where('id', $id)->update(tablename('master_overtime_rules'), $data);


            $this->session->set_flashdata('successmessage', 'Overtime Rule modified successfully');
            redirect(base_url('page/62/1'));
        } else {

            $data = array(
                'overtime_name' => $overtime_name,
                'overtime_type' => $overtime_type,
		        'component' => $component,    
		        'day' => $day,
		        'hour' => $hour,
		        'multiply_by' => $multiply_by,
                'entry_date' => $date,
                'hour_take_leave' => $hour_take_leave
            );

            $this->db->insert(tablename('master_overtime_rules'), $data);
            $insert_id = $this->db->insert_id();

            $this->session->set_flashdata('successmessage', 'Overtime Rule added successfully');
            redirect(base_url('page/62/1'));
        }
    }

    /**
     * Used for get overtime_rules by id
     *
     * <p>Description</p>
     *
     * <p>This function get overtime_rules by id from table [Table: master_overtime_rules]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_single_data($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('master_overtime_rules'));
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
     * Used for status overtime_rules
     *
     * <p>Description</p>
     *
     * <p>This function status overtime_rules [Table: master_overtime_rules]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function status_change($id) {
        $this->db->select('*');
        $this->db->from(tablename('master_overtime_rules'));
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
            if ($this->db->update('master_overtime_rules', $update_faq)) {
                $this->session->set_flashdata('successmessage', 'Overtime Rule Status changed successfully');
                redirect(base_url('page/62/1'));
            } else {
                $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
                redirect(base_url('page/62/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Overtime Rule not matched');
            redirect(base_url('page/62/1'));
        }
    }

    /**
     * Used for delete overtime_rules
     *
     * <p>Description</p>
     *
     * <p>This function delete overtime_rules [Table: master_overtime_rules]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function delete_this($id) {
        $this->db->select('*');
        $this->db->from(tablename('master_overtime_rules'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result)) {
            $update_faq = array('is_active' => 'N', 'delete_flag' => 'Y');
            $this->db->where('id', $id);
            if ($this->db->update('master_overtime_rules', $update_faq)) {
                $this->session->set_flashdata('successmessage', 'Overtime Rule Deleted successfully');
                redirect(base_url('page/62/1'));
            } else {
                $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
                redirect(base_url('page/62/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Overtime Rule not matched');
            redirect(base_url('page/62/1'));
        }
    }

    public function salary_formula($id = "") {
        $this->db->select('HR_master_overtime_rules_formula.*,HR_master_salary_component.component,HR_master_salary_component.type');
        $this->db->from(tablename('master_overtime_rules_formula'));
        $this->db->join('HR_master_salary_component', 'HR_master_salary_component.id = HR_master_overtime_rules_formula.component_id', 'inner');
        $this->db->where('master_overtime_rules_id', $id);
        $query = $this->db->get();
        $result = $query->result();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
    public function delete_overtime_rules() {
       $id= $this->input->post('id');
        $this -> db -> where('id', $id);
        $this -> db -> delete('HR_master_overtime_rules_formula');
        
    }
     public function get_result_data_for_salary() {
         
if(!empty($_POST['value']))
        {
         $value=     implode( "', '" , $_POST['value']);
     $sql = "select * from HR_master_salary_component where is_active='Y' and delete_flag='N' and id !='3' and id not in ($value) ";
        }
        else{
            $sql = "select * from HR_master_salary_component where is_active='Y' and delete_flag='N' ";
        }
        
        $query = $this->db->query($sql);
        $row = $query->result();
       
        // echo '<pre>';
        // print_r($row);exit;
        if (!empty($row)) {
            return $row;
        } else {
            return '';
        }
    }
	
	
	  public function checkovertime($overtime = "",$id = "") {
        $this->db->select('t1.*'); 
        $this->db->from(tablename('master_overtime_rules') . ' as t1');
        //$this->db->where('t1.delete_flag', 'N');
       // $this->db->where('t1.is_active', 'Y');
        $this->db->where('t1.overtime_name', $overtime);
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

/* End of file OvertimeRulesModel.php */
/* Location: ./application/modules/overtime_rules/models/admin/Model.php */