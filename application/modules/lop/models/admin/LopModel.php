<?php

/**
 * gratuity_formula Model Class. Handles all the datagrade_ids and methodes required for handling gratuity_formula
 */
class LopModel extends CI_Model {

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
     * Used for loading functionality of gratuity_formula for an admin
     *
     * <p>Description</p>
     *
     * <p>This function loads all the gratuity_formula that has been added by current admin [Table: master_gratuity_formula]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_all_data() {
        $this->db->select('t1.*,master_grade.grade_name');
        $this->db->from(tablename('master_lop') . ' as t1');
        $this->db->join('master_grade', 'master_grade.id = t1.grade_id');
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
     * <p>This function Used for add/edit gratuity_formula</p>
     *
     * @access  public
     * @param   id
     * @return string
     */
    public function modify($id) {
           
        //echo "<pre>"; print_r($_POST); die;       

        $grade_id = $this->input->post('grade_id');
        $based_on = $this->input->post('based_on');
        $operator = $this->input->post('operator');        
        $loss_of_day = $this->input->post('day');
        $days_type = $this->input->post('days_type');   
        $fixedDays = $this->input->post('fixed_days'); 
        if($fixedDays != ''){
           $fixed_days =  $fixedDays;
        }else{
            $fixed_days = '';
        }

        $date = date("Y-m-d H:i:s");

        if (!empty($id)) {
            $data = array(
                'grade_id' => $grade_id,
                'based_on' => $based_on,
                'operator' => $operator, 
                 'operator_1' => '/',    
                'loss_day' => $loss_of_day,
                'days_type' => $days_type,
                'fixed_days' => $fixed_days,
                'modified_date' => $date
            );

            $this->db->where('id', $id)->update(tablename('master_lop'), $data);


            $this->session->set_flashdata('successmessage', 'LOP modified successfully');
            redirect(base_url('page/84/1'));
        } else {

            $data = array(
                'grade_id' => $grade_id,
                'based_on' => $based_on,
                'operator' => $operator,  
                'operator_1' => '/',     
                'loss_day' => $loss_of_day,
                'days_type' => $days_type,
                'fixed_days' => $fixed_days,
                'entry_date' => $date
            );

            $this->db->insert(tablename('master_lop'), $data);
            $insert_id = $this->db->insert_id();

            $this->session->set_flashdata('successmessage', 'LOP added successfully');
            redirect(base_url('page/84/1'));
        }
    }

    /**
     * Used for get gratuity_formula by id
     *
     * <p>Description</p>
     *
     * <p>This function get gratuity_formula by id from table [Table: master_gratuity_formula]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_single_data($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('master_lop'));
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
     * Used for status gratuity_formula
     *
     * <p>Description</p>
     *
     * <p>This function status gratuity_formula [Table: master_gratuity_formula]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function status_change($id) {
        $this->db->select('*');
        $this->db->from(tablename('master_lop'));
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
            if ($this->db->update('master_lop', $update_faq)) {
                $this->session->set_flashdata('successmessage', 'LOP Status changed successfully');
                redirect(base_url('page/84/1'));
            } else {
                $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
                redirect(base_url('page/84/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'LOP not matched');
            redirect(base_url('page/84/1'));
        }
    }

    /**
     * Used for delete gratuity_formula
     *
     * <p>Description</p>
     *
     * <p>This function delete gratuity_formula [Table: master_gratuity_formula]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function delete_this($id) {
        $this->db->select('*');
        $this->db->from(tablename('master_lop'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result)) {
            $update_faq = array('is_active' => 'N', 'delete_flag' => 'Y');
            $this->db->where('id', $id);
            if ($this->db->update('master_lop', $update_faq)) {
                $this->session->set_flashdata('successmessage', 'LOP Deleted successfully');
                redirect(base_url('page/84/1'));
            } else {
                $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
                redirect(base_url('page/84/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'LOP not matched');
            redirect(base_url('page/84/1'));
        }
    }

    public function salary_formula($id = "") {
        $this->db->select('HR_master_gratuity_formula_formula.*,HR_master_salary_component.component,HR_master_salary_component.type');
        $this->db->from(tablename('master_gratuity_formula_formula'));
        $this->db->join('HR_master_salary_component', 'HR_master_salary_component.id = HR_master_gratuity_formula_formula.component_id', 'inner');
        $this->db->where('master_gratuity_formula_id', $id);
        $query = $this->db->get();
        $result = $query->result();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
    public function delete_gratuity_formula() {
       $id= $this->input->post('id');
        $this -> db -> where('id', $id);
        $this -> db -> delete('HR_master_gratuity_formula_formula');
        
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
	
	 public function check_lopgrade($grade_id = "",$id = "") {
        $this->db->select('t1.*'); 
        $this->db->from(tablename('master_lop') . ' as t1');
        $this->db->where('t1.delete_flag', 'N');
        $this->db->where('t1.is_active', 'Y');
        $this->db->where('t1.grade_id', $grade_id);
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

/* End of file GratuityModel.php */
/* Location: ./application/modules/gratuity_formula/models/admin/Model.php */