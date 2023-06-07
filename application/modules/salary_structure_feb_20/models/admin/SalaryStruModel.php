<?php

/**
 * salary_structure Model Class. Handles all the datagrade_ids and methodes required for handling salary_structure
 */
class SalaryStruModel extends CI_Model {

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
     * Used for loading functionality of salary_structure for an admin
     *
     * <p>Description</p>
     *
     * <p>This function loads all the salary_structure that has been added by current admin [Table: master_salary_structure]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_all_data() {
        $this->db->select('t1.*');
        $this->db->from(tablename('master_salary_structure') . ' as t1');
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

    public function all_state() {

        $this->db->distinct();
        $this->db->select('t1.state');
        $this->db->from(tablename('p_tax') . ' as t1');
        $this->db->where('t1.delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->result();

       

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    public function ptax_deduction($state,$total){
        $this->db->select('t1.*');
        $this->db->from(tablename('p_tax') . ' as t1');
        $this->db->where('t1.delete_flag', 'N');
        $this->db->where('t1.state', $state);
        $this->db->where('t1.amount_from <=',(int)$total);
        $this->db->where('t1.amount_to >=', (int)$total);
        $query = $this->db->get();
        $result = $query->row();

       
       //print_r( $this->db->last_query()); die;
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
     * <p>This function Used for add/edit salary_structure</p>
     *
     * @access  public
     * @param   id
     * @return string
     */
    public function modify($id) {
        $component = array();
        $oparetor = array();
        $amount = array();
         $fixed_amount = array();
        $base_on = array();

        //deductions

        $component_deduction = array();
        $deduction_oparetor = array();
        $amountdeduction = array();
        $dedfixed_amount = array();
        $deduction_base_on = array();

         //benefits

        $component_benefit = array();
        $deduction_benefit = array();
        $amountbenefit = array();
        $benefitfixed_amount = array();
        $benefit_base_on = array();
       // echo "<pre>"; print_r($_POST); die;
        $componentadjustment = $this->input->post('componentadjustment');
        $adjustment_amount = $this->input->post('adjustment_amount');
        

        $structure_name = $this->input->post('structure_name');
        $grade_id = $this->input->post('grade_id');
        $dept_id = $this->input->post('dept_id');
        
     

        $component = explode(',',$this->input->post('component')[0]);
        $oparetor = explode(',',$this->input->post('oparetor')[0]);
        $amount = explode(',',$this->input->post('amount')[0]);
        $base_on = explode(',',$this->input->post('base_on')[0]);
        $fixed_amount = explode(',',$this->input->post('fixed_amount')[0]);
        $amounthidden = explode(',',$this->input->post('amounthidden')[0]);
        $amounthiddenfix = explode(',',$this->input->post('amounthiddenfix')[0]);
        

        //deduction
        $component_deduction = explode(',',$this->input->post('component_deduction')[0]);
        $deduction_oparetor = explode(',',$this->input->post('deduction_oparetor')[0]);
        $amountdeduction = explode(',',$this->input->post('amountdeduction')[0]);
        $deduction_base_on = explode(',',$this->input->post('deduction_base_on')[0]);
        $dedfixed_amount = explode(',',$this->input->post('dedfixed_amount')[0]);

         //benefit
        $component_benefit = explode(',',$this->input->post('component_benefit')[0]);
        $benefit_oparetor = explode(',',$this->input->post('benefit_oparetor')[0]);
        $amountbenefit = explode(',',$this->input->post('amountbenefit')[0]);
        $benefit_base_on = explode(',',$this->input->post('benefit_base_on')[0]);
        $benefitfixed_amount = explode(',',$this->input->post('benefitfixed_amount')[0]);
//print_r($fixed_amount);exit;
        $date = date("Y-m-d H:i:s");

//echo '<pre>'; print_r($_POST); die;

        if (!empty($id)) {
            $data = array(
                'structure_name' => $structure_name,
                'grade_id' => $grade_id,
                'dept_id' => $dept_id,
                'modified_date' => $date
            );

             if(isset($_POST['pf'])){
            $data['pf']=$_POST['pf'];
            $data['employee_pf_percent']=$_POST['employee_pf'];
            $data['employer_pf_percent']=$_POST['Employer_pf'];
            $data['employee_pf_amount']=$_POST['employee_deduction'];
            $data['employer_pf_amount']=$_POST['employer_deduction'];
         }

         if(isset($_POST['ptax'])){
            $data['ptax']=$_POST['ptax'];
            $data['state']=$_POST['ptax_state'];
            $data['ptax_num']=$_POST['ptax_num'];
            $data['ptax_amount']=$_POST['ptax_monthly'];


         }

          if(isset($_POST['esi'])){
            $data['esi']=$_POST['esi'];
            $data['employee_esi_percent']=$_POST['employee_esi'];
            $data['employer_esi_percent']=$_POST['Employer_esi'];
             $data['employee_esi_amount']=$_POST['employee_esi_deduction'];
            $data['employer_esi_amount']=$_POST['employer_esi_deduction'];
            
            
         }

            $this->db->where('id', $id)->update(tablename('master_salary_structure'), $data);

            if (!empty($component)) {
                $this->db->where('master_salary_structure_id', $id);
                $this->db->delete(tablename('master_salary_structure_formula'));

                foreach ($component as $key => $value) {
                    $data = array(
                        'master_salary_structure_id' => $id,
                        'component_id' => $value,
                        'operator' => $oparetor[$key],
                        'base_on' => $base_on[$key],
                      
                        'amount' => $amount[$key]
                    );
                    if(empty($amount[$key]))
                    {
                    //$data['fixed_amount'] = (float) $fixed_amount[0];
                        foreach ($amounthiddenfix as $k_fix => $fix_value) {
                           $fixval = explode('_', $fix_value);
                           if($fixval[1] == $value){
                            $data['fixed_amount'] = (float) $fixval[0];
                           }
                        }
                    }

                    $this->db->insert(tablename('master_salary_structure_formula'), $data);
                }
            }

            $this->session->set_flashdata('successmessage', 'Salary Structure modified successfully');
            redirect(base_url('page/13/1'));
        } else {

            $data = array(
                'structure_name' => $structure_name,
                'grade_id' => $grade_id,
                'dept_id' => $dept_id,
                'entry_date' => $date
            );

             if(isset($_POST['pf'])){
            $data['pf']=$_POST['pf'];
            $data['employee_pf_percent']=$_POST['employee_pf'];
            $data['employer_pf_percent']=$_POST['Employer_pf'];
            $data['employee_pf_amount']=$_POST['employee_deduction'];
            $data['employer_pf_amount']=$_POST['employer_deduction'];
         }

         if(isset($_POST['ptax'])){
            $data['ptax']=$_POST['ptax'];
            $data['state']=$_POST['ptax_state'];
            $data['ptax_num']=$_POST['ptax_num'];
            $data['ptax_amount']=$_POST['ptax_monthly'];


         }

          if(isset($_POST['esi'])){
            $data['esi']=$_POST['esi'];
            $data['employee_esi_percent']=$_POST['employee_esi'];
            $data['employer_esi_percent']=$_POST['Employer_esi'];
             $data['employee_esi_amount']=$_POST['employee_esi_deduction'];
            $data['employer_esi_amount']=$_POST['employer_esi_deduction'];
            
            
         }

            $this->db->insert(tablename('master_salary_structure'), $data);
            $insert_id = $this->db->insert_id();
            if (!empty($component)) {
                foreach ($component as $key => $value) {
                    $data = array(
                        'master_salary_structure_id' => $insert_id,
                        'component_id' => $value,
                        'operator' => $oparetor[$key],
                        'base_on' => $base_on[$key],
                        'salary_type' => 'Earning',
                        'amount' => $amount[$key]
                    );
                   // echo$amount[$key];
                    if(empty($amount[$key]))
                    {
                        foreach ($amounthiddenfix as $k_fix => $fix_value) {
                           $fixval = explode('_', $fix_value);
                           if($fixval[1] == $value){
                            $data['fixed_amount'] = (float) $fixval[0];
                           }
                        }
                       
                    
                     //echo '<pre>';print_r($data);exit;
                    }
//echo '<pre>';print_r($data);//exit;
                    $this->db->insert(tablename('master_salary_structure_formula'), $data);
                }
            }
//exit;
            /*if (!empty($componentadjustment)) {
               if($adjustment_amount != '0.00'){
                    $dataadjust = array(
                        'master_salary_structure_id' => $insert_id,
                        'component_id' => $componentadjustment,
                        'salary_type' => 'Earning',
                        'fixed_amount' => $adjustment_amount
                    );
                   // echo$amount[$key];
                   
                    $this->db->insert(tablename('master_salary_structure_formula'), $dataadjust);
                }
            }*/

            

           

             if (!empty($component_deduction)) {
                foreach ($component_deduction as $key => $value) {
                    $datadeduction = array(
                        'master_salary_structure_id' => $insert_id,
                        'component_id' => $value,
                        'operator' => $deduction_oparetor[$key],
                        'base_on' => $deduction_base_on[$key],
                        'salary_type' => 'Deduction',
                        'amount' => $amountdeduction[$key]
                    );
                   // echo$amount[$key];
                    if(empty($amount[$key]))
                    {
                       $datadeduction['fixed_amount'] = (float) $dedfixed_amount[0];
                    
                     //echo '<pre>';print_r($data);exit;
                    }
//echo '<pre>';print_r($data);exit;
                    $this->db->insert(tablename('master_salary_structure_formula'), $datadeduction);
                }
            }

               //benefit
        $component_benefit = explode(',',$this->input->post('component_benefit')[0]);
        $benefit_oparetor = explode(',',$this->input->post('benefit_oparetor')[0]);
        $amountbenefit = explode(',',$this->input->post('amountbenefit')[0]);
        $benefit_base_on = explode(',',$this->input->post('benefit_base_on')[0]);
        $benefitfixed_amount = explode(',',$this->input->post('benefitfixed_amount')[0]);

        if (!empty($component_benefit)) {
                foreach ($component_benefit as $key => $value) {
                    $databenefit = array(
                        'master_salary_structure_id' => $insert_id,
                        'component_id' => $value,
                        'operator' => $benefit_oparetor[$key],
                        'base_on' => $benefit_base_on[$key],
                        'salary_type' => 'Annual',
                        'amount' => $amountdeduction[$key]
                    );
                   // echo$amount[$key];
                    if(empty($amount[$key]))
                    {

                       $databenefit['fixed_amount'] = (float) $benefitfixed_amount[0];
                    
                     //echo '<pre>';print_r($data);exit;
                    }
//echo '<pre>';print_r($data);exit;
                    $this->db->insert(tablename('master_salary_structure_formula'), $databenefit);
                }
            }


            $this->session->set_flashdata('successmessage', 'Salary Structure added successfully');
            redirect(base_url('page/13/1'));
        }
    }

    /**
     * Used for get salary_structure by id
     *
     * <p>Description</p>
     *
     * <p>This function get salary_structure by id from table [Table: master_salary_structure]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_single_data($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('master_salary_structure'));
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
     * Used for status salary_structure
     *
     * <p>Description</p>
     *
     * <p>This function status salary_structure [Table: master_salary_structure]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function status_change($id) {
        $this->db->select('*');
        $this->db->from(tablename('master_salary_structure'));
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
            if ($this->db->update('master_salary_structure', $update_faq)) {
                $this->session->set_flashdata('successmessage', 'Salary Structure Status changed successfully');
                redirect(base_url('page/13/1'));
            } else {
                $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
                redirect(base_url('page/13/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Salary Structure not matched');
            redirect(base_url('page/13/1'));
        }
    }

    /**
     * Used for delete salary_structure
     *
     * <p>Description</p>
     *
     * <p>This function delete salary_structure [Table: master_salary_structure]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function delete_this($id) {
        $this->db->select('*');
        $this->db->from(tablename('master_salary_structure'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result)) {
            $update_faq = array('is_active' => 'N', 'delete_flag' => 'Y');
            $this->db->where('id', $id);
            if ($this->db->update('master_salary_structure', $update_faq)) {
                $this->session->set_flashdata('successmessage', 'Salary Structure Deleted successfully');
                redirect(base_url('page/13/1'));
            } else {
                $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
                redirect(base_url('page/13/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Salary Structure not matched');
            redirect(base_url('page/13/1'));
        }
    }

    public function salary_formula($id = "") {
        $this->db->select('HR_master_salary_structure_formula.*,HR_master_salary_component.component,HR_master_salary_component.type');
        $this->db->from(tablename('master_salary_structure_formula'));
        $this->db->join('HR_master_salary_component', 'HR_master_salary_component.id = HR_master_salary_structure_formula.component_id', 'inner');
        $this->db->where('master_salary_structure_id', $id);
        $query = $this->db->get();
        $result = $query->result();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
    public function delete_salary_structure() {
       $id= $this->input->post('id');
        $this -> db -> where('id', $id);
        $this -> db -> delete('HR_master_salary_structure_formula');
        
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

     public function get_result_data_for_salary_deduction() {

        //echo '<pre>'; print_r($_POST); exit;
         
if(!empty($_POST['value']))
        {
         $value=     implode( "," , $_POST['value']);
         //print_r($value);exit;
     $sql = "select * from HR_master_salary_component where is_active='Y' and delete_flag='N' and mode='Annual' and type='Earning' and id !='3' and id not in ($value) ";
        }
        else{
            $sql = "select * from HR_master_salary_component where is_active='Y' and mode='Annual' and type='Earning' and delete_flag='N' ";
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


}


    

/* End of file SalaryStruModel.php */
/* Location: ./application/modules/salary_structure/models/admin/Model.php */