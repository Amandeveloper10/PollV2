<?php
/**
 * holidays Model Class. Handles all the datatypes and methodes required for handling holidays
 */
class HolidaysModel extends CI_Model {

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
     * Used for loading functionality of holidays for an admin
     *
     * <p>Description</p>
     *
     * <p>This function loads all the holidays that has been added by current admin [Table: master_holidays]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_all_data() {
        $this->db->select('t1.*,t2.company_name');
        $this->db->from(tablename('master_holidays') . ' as t1');
         $this->db->join(tablename('setting_organization'). ' as t2', 't1.organization_id = t2.id');
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
     * <p>This function Used for add/edit holidays</p>
     *
     * @access  public
     * @param   id
     * @return string
     */

     public function modify($id) {  
     //  echo "<pre>"; print_r($_POST); die;
        $location_id= $this->input->post('location_id');
        $holiday_name= $this->input->post('holiday_name');
        $holiday_start_date= date('Y-m-d',strtotime($this->input->post('holiday_start_date')));
        $holiday_end_date= date('Y-m-d',strtotime($this->input->post('holiday_end_date')));
        $holiday_type= $this->input->post('holiday_type');
        $holiday_off_type= $this->input->post('holiday_off_type');


        $imagenew= $this->input->post('imagenew');
        $imageold= $this->input->post('imageold');

        if ($imagenew!='') {
            $image = $imagenew;
        }else {
            $image = $imageold;
        }

        $date = date("Y-m-d H:i:s");

        if (!empty($id)) {
                $data = array(
                    'organization_id' => '1',
                    'holiday_name' =>  $holiday_name,
                    'holiday_start_date' => $holiday_start_date,
                    'holiday_end_date' => $holiday_end_date,
                    'holiday_type' => $holiday_type,
                    'holiday_off_type' => $holiday_off_type,
                    'modified_date' => $date,
                    'holiday_image'=>$image
                );
           
            $this->db->where('id', $id)->update(tablename('master_holidays'), $data);
			$this->db->delete('master_holidays_location', array('master_holiday_id' => $id));
			if(!empty($location_id)){
				foreach($location_id as $key=>$value){
					$dataholiday = array(
                    'organization_id' => $value,
                    'master_holiday_id' =>  $id
                );
				$this->db->insert(tablename('master_holidays_location'), $dataholiday);
				}
			}
            $this->session->set_flashdata('successmessage', 'Holidays modified successfully');
            redirect(base_url('page/11/1'));
        } else {
         
                $data = array(
                    'organization_id' => '1',
                    'holiday_name' =>  $holiday_name,
                    'holiday_start_date' => $holiday_start_date,
                    'holiday_end_date' => $holiday_end_date,
                    'holiday_type' => $holiday_type,
                    'holiday_off_type' => $holiday_off_type,
                    'entry_date' => $date,
                    'holiday_image'=>$image
                );
            
            $this->db->insert(tablename('master_holidays'), $data);
			$insertid = $this->db->insert_id();
			if(!empty($location_id)){
				foreach($location_id as $key=>$value){
					$dataholiday = array(
                    'organization_id' => $value,
                    'master_holiday_id' =>  $insertid
                );
				$this->db->insert(tablename('master_holidays_location'), $dataholiday);
				}
			}
            
             $this->session->set_flashdata('successmessage', 'Holidays added successfully');
            redirect(base_url('page/11/1'));
        }
    }



    /**
     * Used for get holidays by id
     *
     * <p>Description</p>
     *
     * <p>This function get holidays by id from table [Table: master_holidays]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_single_data($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('master_holidays'));
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
     * Used for status holidays
     *
     * <p>Description</p>
     *
     * <p>This function status holidays [Table: master_holidays]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function status_change($id) {
        $this->db->select('*');
        $this->db->from(tablename('master_holidays'));
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
            if ($this->db->update('master_holidays', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'Holidays Status changed successfully');
            redirect(base_url('page/11/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/11/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Holidays not matched');
            redirect(base_url('page/11/1'));
        }
    }

    /**
     * Used for delete holidays
     *
     * <p>Description</p>
     *
     * <p>This function delete holidays [Table: master_holidays]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function delete_this($id) {
        $this->db->select('*');
        $this->db->from(tablename('master_holidays'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result)) {            
            $update_faq = array('is_active' => 'N','delete_flag'=> 'Y');
            $this->db->where('id', $id);
            if ($this->db->update('master_holidays', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'Holidays Deleted successfully');
            redirect(base_url('page/11/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/11/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Holidays not matched');
            redirect(base_url('page/11/1'));
        }
    }

    public function load_all_organization(){

        $this->db->select('t1.*');
        $this->db->from(tablename('setting_organization') . ' as t1');
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
 
}
/* End of file HolidaysModel.php */
/* Location: ./application/modules/holidays/models/admin/HolidaysModel.php */