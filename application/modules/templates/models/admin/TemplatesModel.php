<?php
/**
 * department Model Class. Handles all the datatypes and methodes required for handling department
 */
class TemplatesModel extends CI_Model {

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
     * Used for loading functionality of templates for an admin
     *
     * <p>Description</p>
     *
     * <p>This function loads all the templates that has been added by current admin [Table: templates]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_all_data() {
        $this->db->select('t1.*');
        $this->db->from(tablename('templates') . ' as t1');
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
		$template_name= $this->input->post('template_name');
		$email_from= $this->input->post('email_from');
		$description= $this->input->post('description');
		$email_subject= $this->input->post('email_subject');
		$date = date("Y-m-d H:i:s");

        if (!empty($id)) {
                $data = array(
                    'template_name' =>  $template_name,
                    'email_from' => $email_from,
					'email_subject' =>  $email_subject,
                    'description' => $description,
                    'modified_date' => $date
                );
           
            $this->db->where('id', $id)->update(tablename('templates'), $data);
            $this->session->set_flashdata('successmessage', 'templates modified successfully');
            redirect(base_url('page/92/1'));
        } else {
         
                $data = array(
                    'template_name' =>  $template_name,
                    'email_from' => $email_from,
					'email_subject' =>  $email_subject,
                    'description' => $description,
                    'entry_date' => $date,
                );
            
            $this->db->insert(tablename('templates'), $data);
            
             $this->session->set_flashdata('successmessage', 'templates added successfully');
            redirect(base_url('page/92/1'));
        }
    }



    /**
     * Used for get templates by id
     *
     * <p>Description</p>
     *
     * <p>This function get templates by id from table [Table: templates]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_single_data($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('templates'));
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
     * Used for status templates
     *
     * <p>Description</p>
     *
     * <p>This function status templates [Table: templates]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function status_change($id) {
        $this->db->select('*');
        $this->db->from(tablename('templates'));
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
            if ($this->db->update('templates', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'templates Status changed successfully');
            redirect(base_url('page/92/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/92/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'templates not matched');
            redirect(base_url('page/92/1'));
        }
    }

    /**
     * Used for delete templates
     *
     * <p>Description</p>
     *
     * <p>This function delete templates [Table: templates]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function delete_this($id) {
        $this->db->select('*');
        $this->db->from(tablename('templates'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result)) {            
            $update_faq = array('is_active' => 'N','delete_flag'=> 'Y');
            $this->db->where('id', $id);
            if ($this->db->update('templates', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'templates Deleted successfully');
            redirect(base_url('page/92/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/92/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'templates not matched');
            redirect(base_url('page/92/1'));
        }
    }

    public function check_templates($templates = "",$id = "") {
        $this->db->select('t1.*'); 
        $this->db->from(tablename('templates') . ' as t1');
        $this->db->where('t1.delete_flag', 'N');
        $this->db->where('t1.is_active', 'Y');
        $this->db->where('t1.templates_name', $templates);
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
/* End of file DeptModel.php */
/* Location: ./application/modules/department/models/admin/DeptModel.php */