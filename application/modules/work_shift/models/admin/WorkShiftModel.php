<?php
/**
 * work_shift Model Class. Handles all the datatypes and methodes required for handling work_shift
 */
class WorkShiftModel extends CI_Model {

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
     * Used for loading functionality of work_shift for an admin
     *
     * <p>Description</p>
     *
     * <p>This function loads all the work_shift that has been added by current admin [Table: master_work_shift]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_all_data() {
        $this->db->select('t1.*');
        $this->db->from(tablename('master_work_shift') . ' as t1');
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
     * <p>This function Used for add/edit work_shift</p>
     *
     * @access  public
     * @param   id
     * @return string
     */

     public function modify($id) {  
       // echo "<pre>"; print_r($_POST); die;
        $work_shift_name= $this->input->post('work_shift_name');
        $work_hour_start_1= $this->input->post('work_hour_start_1');
        $work_hour_end_1= $this->input->post('work_hour_end_1');
        $duration_1= $this->input->post('duration_1');
         $rule_1= $this->input->post('rule_1');
        

        $work_hour_start_2= $this->input->post('work_hour_start_2');
        $work_hour_end_2= $this->input->post('work_hour_end_2');
        $duration_2= $this->input->post('duration_2');
        $rule_2= $this->input->post('rule_2');

        $grace= $this->input->post('grace');
        $offdays= $this->input->post('offdays');
		 $weekoff= $this->input->post('Weekoff');
        //$weekvalue1= $this->input->post('weekvalue');
        $weeknametype = explode(',', $offdays);
       

       // $weekname = explode(",",$weekname1);
       // $weekvalue = explode(",",$weekvalue1);
        
        $date = date("Y-m-d H:i:s");

        if (!empty($id)) {
                $data = array(
                    'work_shift_name' =>  $work_shift_name,
					'weekoff' => $weekoff,
                     'rule_1' =>  $rule_1,
                    'work_hour_start_1' => $work_hour_start_1,
                    'work_hour_end_1' => $work_hour_end_1,
                    'work_hour_duration_1' => $duration_1,
                    'work_hour_grace' => $grace,
                    //'off_day' =>$offday,
                    'modified_date' => $date
                );

                 if(!empty($work_hour_start_2) && !empty($work_hour_end_2) && !empty($work_hour_end_2)){
                    $data['work_hour_start_2'] = $work_hour_start_2;
                     $data['work_hour_end_2'] = $work_hour_end_2;
                      $data['work_hour_duration_2'] = $duration_2;
                      $data['rule_2'] = $rule_2;
                      
                }
           
            $this->db->where('id', $id)->update(tablename('master_work_shift'), $data);
             if(!empty($weeknametype)){
                $this->db->delete('HR_master_work_shift_off_day', array('work_shift_id' => $id)); 

              
                foreach ($weeknametype as $value) {
                    $arr = explode('@', $value);
                    $dataoffday = array(
                    'work_shift_id' =>  $id,
                    'weekname' => $arr[1],
                    'weekvalue' => $arr[0],
                    'week_no' => $arr[2],
                    'entry_date' => $date,

                );
                    //print_r($dataoffday); die;
                $this->db->insert(tablename('master_work_shift_off_day'), $dataoffday);
                }
            
            }
            $this->session->set_flashdata('successmessage', 'Work Shift modified successfully');
            redirect(base_url('page/9/1'));
        } else {
         
                $data = array(
                    'work_shift_name' =>  $work_shift_name,
					'weekoff' => $weekoff,
                    'rule_1' =>  $rule_1,
                    'work_hour_start_1' => $work_hour_start_1,
                    'work_hour_end_1' => $work_hour_end_1,
                    'work_hour_duration_1' => $duration_1,
                    'work_hour_grace' => $grace,
                   //'off_day' => $offday,
                    'entry_date' => $date,
                );

                if(!empty($work_hour_start_2) && !empty($work_hour_end_2) && !empty($work_hour_end_2)){
                    $data['work_hour_start_2'] = $work_hour_start_2;
                     $data['work_hour_end_2'] = $work_hour_end_2;
                      $data['work_hour_duration_2'] = $duration_2;
                      $data['rule_2'] = $rule_2;
                }
            
            $this->db->insert(tablename('master_work_shift'), $data);
            $inserted = $this->db->insert_id();

            if(!empty($weeknametype)){
                foreach ($weeknametype as $value) {
                    $arr = explode('@', $value);
                    $dataoffday = array(
                    'work_shift_id' =>  $inserted,
                    'weekname' => $arr[1],
                    'weekvalue' => $arr[0],
                    'week_no' => $arr[2],
                    'entry_date' => $date,
                );
                    //print_r($dataoffday); die;
                $this->db->insert(tablename('master_work_shift_off_day'), $dataoffday);
                }
            }
            
             $this->session->set_flashdata('successmessage', 'Work Shift added successfully');
            redirect(base_url('page/9/1'));
        }
    }



    /**
     * Used for get work_shift by id
     *
     * <p>Description</p>
     *
     * <p>This function get work_shift by id from table [Table: master_work_shift]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_single_data($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('master_work_shift'));
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
     * Used for status work_shift
     *
     * <p>Description</p>
     *
     * <p>This function status work_shift [Table: master_work_shift]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function status_change($id) {
        $this->db->select('*');
        $this->db->from(tablename('master_work_shift'));
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
            if ($this->db->update('master_work_shift', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'Work Shift Status changed successfully');
            redirect(base_url('page/9/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/9/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Work Shift not matched');
            redirect(base_url('page/9/1'));
        }
    }

    /**
     * Used for delete work_shift
     *
     * <p>Description</p>
     *
     * <p>This function delete work_shift [Table: master_work_shift]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function delete_this($id) {
        $this->db->select('*');
        $this->db->from(tablename('master_work_shift'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result)) {            
            $update_faq = array('is_active' => 'N','delete_flag'=> 'Y');
            $this->db->where('id', $id);
            if ($this->db->update('master_work_shift', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'Work Shift Deleted successfully');
            redirect(base_url('page/9/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/9/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Work Shift not matched');
            redirect(base_url('page/9/1'));
        }
    }
 
}
/* End of file WorkShiftModel.php */
/* Location: ./application/modules/work_shift/models/admin/WorkShiftModel.php */