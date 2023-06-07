<?php
/**
 * insurance_policies Model Class. Handles all the datatypes and methodes required for handling insurance_policies
 */
class ProjectModel extends CI_Model {

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
     * Used for loading functionality of insurance_policies for an admin
     *
     * <p>Description</p>
     *
     * <p>This function loads all the insurance_policies that has been added by current admin [Table: insurance_policies]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    
     public function single_project_data($id=NULL) {
        $this->db->select('t1.*');
        $this->db->from(tablename('project') . ' as t1');
        $this->db->where('t1.id', $id); 
        $query = $this->db->get();
        $result = $query->row();
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
    public function load_all_data() {
        $this->db->select('t1.*');
        $this->db->from(tablename('project') . ' as t1');
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
    public function load_all_employee() {
        $this->db->select('t1.*');
        $this->db->from(tablename('employee') . ' as t1');
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
    
     public function load_all_data_search() {
         $where='';
         
         
        $this->db->select('t1.*');
        $this->db->from(tablename('project') . ' as t1');
        if($this->input->post('search')!=''){
            $search=$this->input->post('search');
            $this->db->where("project_name LIKE '$search%'");  
         }
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
     * <p>This function Used for add/edit insurance_policies</p>
     *
     * @access  public
     * @param   id
     * @return string
     */
 public function update_employee_assign() {  
    $project_id= $this->input->post('project_id');
        $employee= implode(',',$this->input->post('employee_id')); 
      //  echo '<pre>';print_r($employee);exit;
     
 $data = array(
                    'employee_id' => $employee
                  
                );
           
            $this->db->where('id', $project_id)->update(tablename('project'), $data);
        
 }
     public function modify($id) {  
      //echo "<pre>"; print_r($_POST); die;
      
        $project_name= $this->input->post('project_name');
        $start_date= $this->input->post('start_date');
        $end_date= $this->input->post('end_date');
        $description= $this->input->post('description');
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
                    'project_name' => $project_name,
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'description' => $description,
                    'image' => $image,
                    'entry_date' => date("Y-m-d"),
                    'modified_date' => $date
                );
           
            $this->db->where('id', $id)->update(tablename('project'), $data);
            $this->session->set_flashdata('successmessage', 'Project modified successfully');
            redirect(base_url('page/50/1'));
        } else {
         
                $data = array(
                    'project_name' => $project_name,
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'description' => $description,
                    'image' => $image,
                    'entry_date' => date("Y-m-d"),
                    'modified_date' => $date,
                );
             //   echo '<pre>';
              //  print_r($data);
              //  exit;
            $this->db->insert(tablename('project'), $data);
          // echo  $this->last_query();exit;
             $this->session->set_flashdata('successmessage', 'Project added successfully');
            redirect(base_url('page/50/1'));
        }
    }



    /**
     * Used for get insurance_policies by id
     *
     * <p>Description</p>
     *
     * <p>This function get insurance_policies by id from table [Table: insurance_policies]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_single_data($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('project'));
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
     * Used for delete insurance_policies
     *
     * <p>Description</p>
     *
     * <p>This function delete insurance_policies [Table: insurance_policies]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function delete_this($id) {
        $this->db->select('*');
        $this->db->from(tablename('project'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result)) {            
            $update_faq = array('is_active' => 'N','delete_flag'=> 'Y');
            $this->db->where('id', $id);
            if ($this->db->update('project', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'Project Deleted successfully');
            redirect(base_url('page/50/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/50/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Project not matched');
            redirect(base_url('page/50/1'));
        }
    }
    
     public function load_employee_details($id=NULL) {
        $this->db->select('t1.*');
        $this->db->from(tablename('employee') . ' as t1');
        $this->db->where('t1.id', $id); 
        $query = $this->db->get();
        $result = $query->row();
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
 
}
/* End of file InsuranceModel.php */
/* Location: ./application/modules/insurance_policies/models/admin/InsuranceModel.php */