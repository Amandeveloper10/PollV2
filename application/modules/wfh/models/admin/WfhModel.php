<?php
/**
 * late_rules Model Class. Handles all the datatypes and methodes required for handling late_rules
 */
class WfhModel extends CI_Model {

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
     * Used for loading functionality of late_rules for an admin
     *
     * <p>Description</p>
     *
     * <p>This function loads all the late_rules that has been added by current admin [Table: master_late_rules]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_all_data() {
        $this->db->select('t1.*');
        $this->db->from(tablename('master_wfh_rules') . ' as t1');
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
     * <p>This function Used for add/edit late_rules</p>
     *
     * @access  public
     * @param   id
     * @return string
     */

     public function modify($id) {  
      //echo "<pre>"; print_r($_POST); die;
        
       $gradeId= $this->input->post('grade_id');
       if(!empty($gradeId)){
        $grade_id = implode(',', $gradeId);
       }
        $deptId= $this->input->post('dept_id');
         if(!empty($deptId)){
        $dept_id = implode(',', $deptId);
       }
	   $checktype= $this->input->post('checktype');
	   if($checktype == 'personal'){
			$max_per_month= $this->input->post('max_per_month');
			$max_hrs_per_month= $this->input->post('max_hrs_per_month');
			$max_hrs_apply_per_day= $this->input->post('max_hrs_apply_per_day'); 
			
	   }else{
			$limit= $this->input->post('limit');
			$enanle_type= $this->input->post('enanle_type');
			$deduction_apply1= $this->input->post('deduction_apply1');        
			$nos= $this->input->post('nos'); 
			$leave_type = ($this->input->post('leave_type')) ? implode(',', $this->input->post('leave_type')) :'' ;
	   }
		
        
        $date = date("Y-m-d H:i:s");

        if (!empty($id)) {
			 if($checktype == 'personal'){
                $data = array(
                    'grade_id' =>  $grade_id,
                     'dept_id' =>  $dept_id,
					  'type' =>  $checktype,
					'max_per_month' =>  $max_per_month,
					'max_hrs_per_month' =>  $max_hrs_per_month,
					'max_hrs_apply_per_day' =>  $max_hrs_apply_per_day,
                    'limit' =>  '',
                     'enanle_type' =>  '',
                    'modified_date' => $date,
                     'deduction_apply' => '',
                    'leave_type' => '',
                     'nos' => '',
                );
			 }else{
				  $data = array(
                    'grade_id' =>  $grade_id,
                     'dept_id' =>  $dept_id,
					  'type' =>  $checktype,
					'max_per_month' =>  '',
					'max_hrs_per_month' =>  '',
					'max_hrs_apply_per_day' =>  '',
                    'limit' =>  $limit,
                     'enanle_type' =>  $enanle_type,
                    'modified_date' => $date,
                     'deduction_apply' => $deduction_apply1,
                    'leave_type' => $leave_type,
                     'nos' => $nos,
                );
			 }
           
            $this->db->where('id', $id)->update(tablename('master_wfh_rules'), $data);
            $this->session->set_flashdata('successmessage', 'WFH Rule modified successfully');
            redirect(base_url('page/88/1'));
        } else {
         if($checktype == 'personal'){
			 $data = array(
                     'grade_id' =>  $grade_id,
                     'dept_id' =>  $dept_id,
					 'type' =>  $checktype,
					'max_per_month' =>  $max_per_month,
					'max_hrs_per_month' =>  $max_hrs_per_month,
					'max_hrs_apply_per_day' =>  $max_hrs_apply_per_day,
                    'limit' =>  '',
                    'enanle_type' =>  '',
                    'period_month' =>  '',
                    'entry_date' => $date,
                     'deduction_apply' => '',
                    'leave_type' => '',
                     'nos' => '',
                );
		 }else{
			 $data = array(
                     'grade_id' =>  $grade_id,
                     'dept_id' =>  $dept_id,
					  'type' =>  $checktype,
					'max_per_month' =>  '',
					'max_hrs_per_month' =>  '',
					'max_hrs_apply_per_day' =>  '',
                    'limit' =>  $limit,
                    'enanle_type' =>  $enanle_type,
                    'period_month' =>  $period_month,
                    'entry_date' => $date,
                     'deduction_apply' => $deduction_apply1,
                    'leave_type' => $leave_type,
                     'nos' => $nos,
                );
		 }
               
            
            $this->db->insert(tablename('master_wfh_rules'), $data);
            
             $this->session->set_flashdata('successmessage', 'WFH Rule added successfully');
            redirect(base_url('page/88/1'));
        }
    }



    /**
     * Used for get late_rules by id
     *
     * <p>Description</p>
     *
     * <p>This function get late_rules by id from table [Table: master_late_rules]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_single_data($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('master_wfh_rules'));
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
     * Used for status late_rules
     *
     * <p>Description</p>
     *
     * <p>This function status late_rules [Table: master_late_rules]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function status_change($id) {
        $this->db->select('*');
        $this->db->from(tablename('master_wfh_rules'));
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
            if ($this->db->update('master_wfh_rules', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'WFH rules Status changed successfully');
            redirect(base_url('page/88/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/88/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'WFH rules not matched');
            redirect(base_url('page/88/1'));
        }
    }

    /**
     * Used for delete late_rules
     *
     * <p>Description</p>
     *
     * <p>This function delete late_rules [Table: master_late_rules]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function delete_this($id) {
        $this->db->select('*');
        $this->db->from(tablename('master_wfh_rules'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result)) {            
            $update_faq = array('is_active' => 'N','delete_flag'=> 'Y');
            $this->db->where('id', $id);
            if ($this->db->update('master_wfh_rules', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'WFH rules Deleted successfully');
            redirect(base_url('page/88/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/88/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'WFH rules not matched');
            redirect(base_url('page/88/1'));
        }
    }
 
}
/* End of file LateRulesModel.php */
/* Location: ./application/modules/late_rules/Models/admin/LateRulesModel.php */