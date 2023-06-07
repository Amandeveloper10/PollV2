<?php
/**
 * salary_component Model Class. Handles all the datatypes and methodes required for handling salary_component
 */
class SalaryCompModel extends CI_Model {

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
     * Used for loading functionality of salary_component for an admin
     *
     * <p>Description</p>
     *
     * <p>This function loads all the salary_component that has been added by current admin [Table: master_salary_component]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_all_data() {
        $this->db->select('t1.*');
        $this->db->from(tablename('master_salary_component') . ' as t1');
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
     * <p>This function Used for add/edit salary_component</p>
     *
     * @access  public
     * @param   id
     * @return string
     */

     public function modify($id) {  
      // echo "<pre>"; print_r($_POST); die;
        $component= $this->input->post('component');
        $type= $this->input->post('type');
        $mode= $this->input->post('mode');
        $taxable1= $this->input->post('taxable1');
        $fixed1= $this->input->post('fixed1'); 
        $pf1= $this->input->post('pf1');   
        $esi1= $this->input->post('esi1');     
        $set_formula1 = $this->input->post('set_formula1');   
        $sequence= $this->input->post('sequence');  

        $componentformula= $this->input->post('componentformula');
        $operator= $this->input->post('operator');
        $days_type= $this->input->post('days_type');
        $days_type_1= $this->input->post('days_type_1');
        $fixed_amount= $this->input->post('fixed_amount');  

        $date = date("Y-m-d H:i:s");

        if (!empty($id)) {
                $data = array(
                    'component' =>  $component,
                    'type' => $type,
                    'mode' => $mode,
                    'taxable' => $taxable1,
                    'fixed' => $fixed1,
                    'pf'=>$pf1,
                    'esi'=>$esi1,
                    'set_formula'=>$set_formula1,
                    'modified_date' => $date,
                    'sequence' => $sequence,
                );
           
            $this->db->where('id', $id)->update(tablename('master_salary_component'), $data);
            $this->db->delete('HR_master_salary_component_formula', array('component_id' => $id)); 
            if($set_formula1 == 'Yes'){
                foreach ($componentformula as $key => $value) {
                  if($value == 'gross_amount'){
                    $data_formula = array(
                    'component_id' => $id,
                    'component' =>  $value,
                    'operator' => '',
                    'day_type' => $days_type,
                    'day_type_1' => $days_type_1,
                    'fixed_amount' => ''
                ); 
                    //print_r($data_formula); die;
                    $this->db->insert(tablename('master_salary_component_formula'), $data_formula);
                  }else{
                    $data_formula = array(
                    'component_id' => $id,
                    'component' =>  $value,
                    'operator' => $operator[$key],
                    'day_type' => $days_type,
                    'day_type_1' => $days_type_1,
                    'fixed_amount' => $fixed_amount
                ); 
                    //print_r($data_formula); die;
                    $this->db->insert(tablename('master_salary_component_formula'), $data_formula);
                  }
                }
            }

            $this->session->set_flashdata('successmessage', 'Salary Component modified successfully');
            redirect(base_url('page/12/1'));
        } else {
         
                $data = array(
                    'component' =>  $component,
					 'alias' =>  $component,
                    'type' => $type,
                    'mode' => $mode,
                    'taxable' => $taxable1,
                    'fixed' => $fixed1,
                    'pf'=>$pf1,
                    'esi'=>$esi1,
                    'set_formula'=>$set_formula1,
                    'entry_date' => $date,
                    'sequence' => $sequence,
                );
            
            $this->db->insert(tablename('master_salary_component'), $data);
            $insert_id = $this->db->insert_id();
            if($set_formula1 == 'Yes'){
                foreach ($componentformula as $key => $value) {
                  if($value == 'gross_amount'){
                    $data_formula = array(
                    'component_id' => $insert_id,
                    'component' =>  $value,
                    'operator' => '',
                    'day_type' => $days_type,
                    'day_type_1' => $days_type_1,
                    'fixed_amount' => ''
                ); 
                    //print_r($data_formula); die;
                    $this->db->insert(tablename('master_salary_component_formula'), $data_formula);
                  }else{
                    $data_formula = array(
                    'component_id' => $insert_id,
                    'component' =>  $value,
                    'operator' => $operator[$key],
                    'day_type' => $days_type,
                    'day_type_1' => $days_type_1,
                    'fixed_amount' => $fixed_amount
                ); 
                    //print_r($data_formula); die;
                    $this->db->insert(tablename('master_salary_component_formula'), $data_formula);
                  }
                }
            }
            
             $this->session->set_flashdata('successmessage', 'Salary Component added successfully');
            redirect(base_url('page/12/1'));
        }
    }



    /**
     * Used for get salary_component by id
     *
     * <p>Description</p>
     *
     * <p>This function get salary_component by id from table [Table: master_salary_component]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_single_data($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('master_salary_component'));
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
     * Used for status salary_component
     *
     * <p>Description</p>
     *
     * <p>This function status salary_component [Table: master_salary_component]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function status_change($id) {
        $this->db->select('*');
        $this->db->from(tablename('master_salary_component'));
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
            if ($this->db->update('master_salary_component', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'Salary Component Status changed successfully');
            redirect(base_url('page/12/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/12/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Salary Component not matched');
            redirect(base_url('page/12/1'));
        }
    }

    /**
     * Used for delete salary_component
     *
     * <p>Description</p>
     *
     * <p>This function delete salary_component [Table: master_salary_component]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function delete_this($id) {
        $this->db->select('*');
        $this->db->from(tablename('master_salary_component'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result)) {            
            $update_faq = array('is_active' => 'N','delete_flag'=> 'Y');
            $this->db->where('id', $id);
            if ($this->db->update('master_salary_component', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'Salary Component Deleted successfully');
            redirect(base_url('page/12/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/12/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Salary Component not matched');
            redirect(base_url('page/12/1'));
        }
    }

     public function get_result_data_for_salary() {

        //echo '<pre>'; print_r($_POST); exit;
         
if(!empty($_POST['value']))
        {
         $value=     implode( "," , $_POST['value']);
         //print_r($value);exit;
     $sql = "select * from HR_master_salary_component where is_active='Y' and delete_flag='N' and mode='Monthly' and type='Earning' and id !='3' and id !='18' and id not in ($value) ";
        }
        else{
            $sql = "select * from HR_master_salary_component where is_active='Y' and mode='Monthly' and id !='18' and type='Earning' and delete_flag='N' ";
        }
        
        $query = $this->db->query($sql);
        $row = $query->result();
       
         //echo '<pre>';print_r($row);exit;
        if (!empty($row)) {
            return $row;
        } else {
            return '';
        }
    }

     public function check_component($component = "",$id = "") {
        $this->db->select('t1.*'); 
        $this->db->from(tablename('master_salary_component') . ' as t1');
        $this->db->where('t1.delete_flag', 'N');
        $this->db->where('t1.is_active', 'Y');
        $this->db->where('t1.component', $component);
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
/* End of file SalaryCompModel.php */
/* Location: ./application/modules/salary_component/models/admin/SalaryCompModel.php */