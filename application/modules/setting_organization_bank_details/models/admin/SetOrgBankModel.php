<?php
/**
 * setting_organization_bank_details Model Class. Handles all the datatypes and methodes required for handling setting_organization_bank_details
 */
class SetOrgBankModel extends CI_Model {

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
     * Used for loading functionality of setting_organization_bank_details for an admin
     *
     * <p>Description</p>
     *
     * <p>This function loads all the setting_organization_bank_details that has been added by current admin [Table: setting_organization_bank_details]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_all_data() {
        $this->db->select('t1.*');
        $this->db->from(tablename('setting_organization_bank_details') . ' as t1');
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
     * <p>This function Used for add/edit setting_organization_bank_details</p>
     *
     * @access  public
     * @param   id
     * @return string
     */

     public function modify($id) {  
      //echo "<pre>"; print_r($_POST); die;


        $org_id = $this->input->post('org_id');
        $bank_name = $this->input->post('bank_name');
        $branch = $this->input->post('branch');
        $apt_no = $this->input->post('apt_no');
        $building_name = $this->input->post('building_name');
        $country = $this->input->post('country');
        $city = $this->input->post('city');
        $state = $this->input->post('state');
        $zip = $this->input->post('zip');
        $telephone = $this->input->post('telephone');
        $mobile = $this->input->post('mobile');
        $email = $this->input->post('email');
        $acc_type = $this->input->post('acc_type');
        $acc_no = $this->input->post('acc_no');
        $ifsc_code = $this->input->post('ifsc_code');

        $date = date("Y-m-d H:i:s");

        if (!empty($id)) {
                $data = array(
                    'org_id' => $org_id,
                    'bank_name' => $bank_name,
                    'branch' => $branch,
                    'apt_no' => $apt_no,
                    'building_name' => $building_name,
                    'country' => $country,
                    'city' =>$city,
                    'state' => $state,
                    'zip' => $zip,
                    'telephone' => $telephone,
                    'mobile' => $mobile,
                    'email' => $email,
                    'acc_type' => $acc_type,
                    'acc_no' => $acc_no,
                    'ifsc_code' => $ifsc_code,
                    'modified_date' => $date
                );
           
            $this->db->where('id', $id)->update(tablename('setting_organization_bank_details'), $data);
            $this->session->set_flashdata('successmessage', 'Organization Bank Details modified successfully');
            redirect(base_url('page/37/1'));
        } else {
         
                $data = array(
                    'org_id' => $org_id,
                    'bank_name' => $bank_name,
                    'branch' => $branch,
                    'apt_no' => $apt_no,
                    'building_name' => $building_name,
                    'country' => $country,
                    'city' =>$city,
                    'state' => $state,
                    'zip' => $zip,
                    'telephone' => $telephone,
                    'mobile' => $mobile,
                    'email' => $email,
                    'acc_type' => $acc_type,
                    'acc_no' => $acc_no,
                    'ifsc_code' => $ifsc_code,
                    'entry_date' => $date
                );
            
            $this->db->insert(tablename('setting_organization_bank_details'), $data);
            
             $this->session->set_flashdata('successmessage', 'Organization Bank Details added successfully');
            redirect(base_url('page/37/1'));
        }
    }



    /**
     * Used for get setting_organization_bank_details by id
     *
     * <p>Description</p>
     *
     * <p>This function get setting_organization_bank_details by id from table [Table: setting_organization_bank_details]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_single_data($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('setting_organization_bank_details'));
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
     * Used for status setting_organization_bank_details
     *
     * <p>Description</p>
     *
     * <p>This function status setting_organization_bank_details [Table: setting_organization_bank_details]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function status_change($id) {
        $this->db->select('*');
        $this->db->from(tablename('setting_organization_bank_details'));
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
            if ($this->db->update('setting_organization_bank_details', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'Organization Bank Details Status changed successfully');
            redirect(base_url('page/37/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/37/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Organization Bank Details not matched');
            redirect(base_url('page/37/1'));
        }
    }

    /**
     * Used for delete setting_organization_bank_details
     *
     * <p>Description</p>
     *
     * <p>This function delete setting_organization_bank_details [Table: setting_organization_bank_details]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function delete_this($id) {
        $this->db->select('*');
        $this->db->from(tablename('setting_organization_bank_details'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result)) {            
            $update_faq = array('is_active' => 'N','delete_flag'=> 'Y');
            $this->db->where('id', $id);
            if ($this->db->update('setting_organization_bank_details', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'Organization Bank Details Deleted successfully');
            redirect(base_url('page/37/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/37/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Organization Bank Details not matched');
            redirect(base_url('page/37/1'));
        }
    }
 
}
/* End of file SetOrgBankModel.php */
/* Location: ./application/modules/setting_organization_bank_details/models/admin/SetOrgBankModel.php */