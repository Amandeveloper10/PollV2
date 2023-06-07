<?php

/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class for salary_structure [HMVC]. Handles all the datatypes and methodes required
 * for salary_structure section of future
 */
class Admin extends MX_Controller {

    /**
     * The constructor method of this class.
     *
     * @access  public
     * @param   none
     * @return  Loads all the method, helper, library etc. required throughout this class
     */
    public function __construct() {
        parent::__construct();
        admin_authenticate();
        $this->load->model('admin/SalaryStruModel');
        $this->load->helper('common');
    }

    /**
     * Index Page for this salary_structure controller.
     *
     * @access  public
     * @param   $id = is used to check index is load after add/edit or directly
     * @return  string
     */
    public function index($id=NULL) {
        $all_data = $this->SalaryStruModel->load_all_data();
      //  $c = $fname."$lname".$lname;
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
       // echo "<pre>"; print_r($all_data); //die;
        if($id){
            $this->load->view('salary_structure/admin/list',$this->data);
        }else{
            $this->middle = 'salary_structure/admin/list';
        $this->layout();
        }
    }

    /**
     * add/edit save for this salary_structure controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */

     public function form($id = NULL) {        
        if (isset($_POST['submit'])) {

        //echo "<pre>"; print_r($_POST); die;           
        $flg = $this->SalaryStruModel->modify($id);            
        }        
    }


    /**
     * edit Page load for this salary_structure controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */
    public function get_form() {
        $this->data = array();
       // echo "<pre>"; print_r($_POST); die;
        $id = $_POST['id'];  

        if (!empty($id)) {
            $this->data['data_single'] = $this->SalaryStruModel->load_single_data($id);
            $this->data['id'] = $id;  
        }  
        $this->data['all_grade'] = $this->SalaryStruModel->get_result_data('master_grade',array('is_active'=>'Y','delete_flag'=>'N'));
        $this->data['all_dept'] = $this->SalaryStruModel->get_result_data('master_department',array('is_active'=>'Y','delete_flag'=>'N'));
         $this->data['all_component'] = $this->SalaryStruModel->get_result_data('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N','mode'=>'Monthly','type'=>'Earning'));

         $this->data['all_component_deduction'] = $this->SalaryStruModel->get_result_data('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N','mode'=>'Monthly','type'=>'Deduction'));
         //print_r($this->data['all_component_deduction']);

          $this->data['all_component_Annual'] = $this->SalaryStruModel->get_result_data('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N','type'=>'Earning','mode'=>'Annual'));

          $this->data['all_component_incentive_reimbursement'] = $this->db->query("SELECT * FROM `HR_master_salary_component` WHERE `is_active` = 'Y' AND `delete_flag` = 'N' AND `mode` != 'Adhoc' AND `type` = 'Reimbursement' || `type` = 'Incentive'  AND `mode` != 'Adhoc'")->result();
          //echo $this->db->last_query() ; die;
         //echo '<pre>'; print_r($this->data['all_component_incentive_reimbursement']); die;

         $this->data['pf_data']=$this->SalaryStruModel->get_result_data('pf_admin',array('is_active'=>'Y','delete_flag'=>'N'));
         $this->data['esi_data']=$this->SalaryStruModel->get_result_data('esi_admin',array('is_active'=>'Y','delete_flag'=>'N'));
         $this->data['all_state']=$this->SalaryStruModel->all_state();
        //echo "<pre>"; print_r($this->data['all_state']); die;
        $view = $this->load->view('salary_structure/admin/form',$this->data, TRUE);
        echo $view; exit();         
    }



     public function get_form_view() {
        $this->data = array();
       // echo "<pre>"; print_r($_POST); die;
        $id = $_POST['id'];  

        if (!empty($id)) {
            $this->data['data_single'] = $this->SalaryStruModel->load_single_data($id);
            $this->data['id'] = $id;  
        }  
        $this->data['all_grade'] = $this->SalaryStruModel->get_result_data('master_grade',array('is_active'=>'Y','delete_flag'=>'N'));
        $this->data['all_dept'] = $this->SalaryStruModel->get_result_data('master_department',array('is_active'=>'Y','delete_flag'=>'N'));
         $this->data['all_component'] = $this->SalaryStruModel->get_result_data('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N','mode'=>'Monthly','type'=>'Earning'));

         $this->data['all_component_deduction'] = $this->SalaryStruModel->get_result_data('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N','mode'=>'Monthly','type'=>'Deduction'));
         //print_r($this->data['all_component_deduction']);

          $this->data['all_component_Annual'] = $this->SalaryStruModel->get_result_data('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N','type'=>'Earning','mode'=>'Annual'));

          $this->data['all_component_incentive_reimbursement'] = $this->db->query("SELECT * FROM `HR_master_salary_component` WHERE `is_active` = 'Y' AND `delete_flag` = 'N' AND `type` = 'Reimbursement' || `type` = 'Incentive'")->result();
          //echo $this->db->last_query() ; die;
         //echo '<pre>'; print_r($this->data['all_component_incentive_reimbursement']); die;

         $this->data['pf_data']=$this->SalaryStruModel->get_result_data('pf_admin',array('is_active'=>'Y','delete_flag'=>'N'));
         $this->data['esi_data']=$this->SalaryStruModel->get_result_data('esi_admin',array('is_active'=>'Y','delete_flag'=>'N'));
         $this->data['all_state']=$this->SalaryStruModel->all_state();
        //echo "<pre>"; print_r($this->data['all_state']); die;
        $view = $this->load->view('salary_structure/admin/view',$this->data, TRUE);
        echo $view; exit();         
    }


    /**
     * status salary_structure controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function status($id) {
        $this->SalaryStruModel->status_change($id);
    }


    /**
     * delete membership controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function delete($id) {
        $this->SalaryStruModel->delete_this($id);
    }
    public function get_component_type() {
    $id=   $this->input->post('id');
    
        $this->data['all_component_type'] = $this->SalaryStruModel->get_row_data('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N','type'=>'Earning','mode'=>'Monthly','id'=>$id));
     //echo $this->db->last_query();exit;

       // print_r($this->data['all_component_type']);
        echo $this->data['all_component_type']->type.', '.$this->data['all_component_type']->mode.', '.$this->data['all_component_type']->fixed.','.$this->data['all_component_type']->component.','.$this->data['all_component_type']->pf.','.$this->data['all_component_type']->esi;exit;
        
        
       
    }

     public function get_component_deduction() {
    $id=   $this->input->post('id');
    
        $this->data['all_component_type'] = $this->SalaryStruModel->get_row_data('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N','type'=>'Deduction','mode'=>'Monthly','id'=>$id));
     //echo $this->db->last_query();exit;

       // print_r($this->data['all_component_type']);
        echo $this->data['all_component_type']->type.', '.$this->data['all_component_type']->mode.', '.$this->data['all_component_type']->fixed.','.$this->data['all_component_type']->component.','.$this->data['all_component_type']->pf.','.$this->data['all_component_type']->esi;exit;
        
        
       
    }

    public function get_component_benefit() {
    $id=   $this->input->post('id');
    
        $this->data['all_component_type'] = $this->SalaryStruModel->get_row_data('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N','type'=>'Earning','mode'=>'Annual','id'=>$id));
     //echo $this->db->last_query();exit;

       // print_r($this->data['all_component_type']);
        echo $this->data['all_component_type']->type.', '.$this->data['all_component_type']->mode.', '.$this->data['all_component_type']->fixed.','.$this->data['all_component_type']->component.','.$this->data['all_component_type']->pf.','.$this->data['all_component_type']->esi;exit;
        
        
       
    }

    public function ptax_deduction() {
        $state=   $this->input->post('state');
        $total=   $this->input->post('total'); 
        $this->data['Ptax_deduction'] = $this->SalaryStruModel->ptax_deduction($state,$total);

       // print_r( $this->data['Ptax_deduction']);

     //echo $this->db->last_query();exit;

       // print_r($this->data['all_component_type']);
        if( $this->data['Ptax_deduction']){
         echo $this->data['Ptax_deduction']->p_tax_no.', '.$this->data['Ptax_deduction']->p_tax; exit;
        }else{
            echo "no_data";
        }
               
    }

    public function div_colon() {
       // $value=$_POST['value'];
      
        //echo '<pre>'; print_r($_POST); exit;
        $id = $_POST['id'];  
        $div='';
       // $all_component = $this->SalaryStruModel->get_result_data_for_salary('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N'));
        $all_component = $this->SalaryStruModel->get_result_data_for_salary();


      //  echo '<pre>';
      //  print_r($all_component);
      // exit;
         $div.= '<tr id="exp_'.$id.'"><td><div class="form-group">
                 <select onchange="fortype(this.value)" id="component'.$id.'" name="component[]" class="form-control sel">
                    <option>Select</option>';
                    
                  if (!empty($all_component)) {
                    foreach ($all_component as $component) {
                        if($component->id!='3')
                        {
                 
              $div.=    '<option value="'.$component->id.'" comptype="'.$component->fixed.'">'.$component->component.'</option>';
                  } } }
                   
              $div.=  '</select>
              

            </div></td>
        <td> <div class="form-group"><label class="checkvalue" id="component_type_new'.$id.'"></label></div></td>
        <td class="not_fixed'.$id.'">  <select name="base_on[]"  id="base_on'.$id.'" class="form-control">
                            <option value="CTC">CTC</option>
                            <option value="Basic Salary" >Basic Salary</option>
                        </select></td>
         <td class="not_fixed'.$id.'"><input type="hidden" name="oparetor[]" id="oparetor'.$id.'" value="*" class="form-control">
            <span>*</span></td>
        <td class="not_fixed'.$id.'"><input placeholder="%" type="text" style="width: 47px;" onkeyup="numeric(this),salarycalculation(this.value,'.$id.');" name="amount[]" id="amount'.$id.'" class="form-control text-right amount">
        <input class="not_fixed'.$id.'" type="hidden" name="amounthidden[]" id="amounthidden'.$id.'" >
        </td>
       

        <td class="fixed_new'.$id.'" style="display:none;"><input type="text" placeholder="Enter Total Amount" name="fixed_amount[]" onkeyup="numeric(this),salarycalculation_new(this.value,'.$id.');" id="fixed_amount" value="" class="form-control text-right">
        <input class="fixed_new'.$id.'"  type="hidden" name="amounthiddenfix[]" id="amounthiddenfix'.$id.'" >
        </td>
        <td class="fixed_new'.$id.'" style="display:none;"></td>
        
        <td class="fixed_new'.$id.'" style="display:none;"></td>
        
         <td class="text-right"><span class="total_amount_monthly" id="monthly_calculate_amount'.$id.'">0.00</span></td>
        <td class="tr-delete text-right"><span class="total_amount" id="calculate_amount'.$id.'">0.00</span> <button type="button" name="delete" id="delete" style="display:none" class="btn btn-danger delete"><span onclick="deleteDiv(\'exp\','.$id.');" title="Delete" class="ks-icon la la-trash" aria-hidden="false" ></span></button> </td></tr>';


       
        
        echo $div; exit();         
    }

    public function div_deduction_colon() {
       // $value=$_POST['value'];
      
        //echo '<pre>'; print_r($_POST); exit;
        $id = $_POST['id'];  
        $div='';
       // $all_component = $this->SalaryStruModel->get_result_data_for_salary('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N'));
        $all_deductioncomponent = $this->SalaryStruModel->get_result_data_for_salary_deduction();


      //  echo '<pre>';
      //  print_r($all_component);
      // exit;
         $div.= '<tr id="deduction_'.$id.'"><td><div class="form-group">
                 <select onchange="fordeductiontype(this.value)" id="component_deduction" name="component_deduction[]" class="form-control seldeduction">
                    <option>Select</option>';
                    
                  if (!empty($all_deductioncomponent)) {
                    foreach ($all_deductioncomponent as $component) {
                        
                 
              $div.=    '<option value="'.$component->id.'" >'.$component->component.'</option>';
                   } }
                   
              $div.=  '</select>
            </div></td>
        <td> <div class="form-group"><label class="checkvalue" id="component_deduction_new'.$id.'"></label></div></td>
        <td class="dednot_fixed'.$id.'">  <select name="deduction_base_on[]" id="deduction_base_on'.$id.'" class="form-control">
                            <option value="CTC">CTC</option>
                            <option value="Basic Salary" >Basic Salary</option>
                        </select></td>
         <td class="dednot_fixed'.$id.'"><select name="deduction_oparetor[]" id="deduction_oparetor'.$id.'" class="form-control">
                            <option value="*">*</option>
                            <option value="+">+</option>
                             <option value="-">-</option>
                            
                        </select></td>
        <td class="dednot_fixed'.$id.'"><input placeholder="%" type="text" onkeyup="numeric(this),salarydeductioncalculation(this.value,'.$id.');" name="amountdeduction[]" id="amountdeduction'.$id.'" class="form-control text-right amount"></td>
        <td class="dednot_fixed'.$id.'">  <input type="text" placeholder="formula" readonly name="formuladeduction"  id="formuladeduction'.$id.'" value="" class="form-control text-right"></td>

        <td class="dedfixed_new'.$id.'" style="display:none;"><input type="text" placeholder="Enter Total Amount" name="dedfixed_amount[]" onkeyup="numeric(this),salarydeductioncalculation_new(this.value,'.$id.');" id="dedfixed_amount" value="" class="form-control text-right"></td>
        <td class="dedfixed_new'.$id.'" style="display:none;"></td>
        <td class="dedfixed_new'.$id.'" style="display:none;"></td>
        <td class="dedfixed_new'.$id.'" style="display:none;"></td>

         <td><span class="total_deduction" id="calculate_deductionamount'.$id.'"> </span></td>
        <td> <button type="button" name="delete" class="btn btn-danger"><span onclick="deletedeductionDiv(\'deduction\','.$id.');" title="Delete" class="ks-icon la la-trash" aria-hidden="false" ></span></button> </td></tr>';


       
        
        echo $div; exit();         
    }

     public function div_benefit_colon() {
       // $value=$_POST['value'];
      
        //echo '<pre>'; print_r($_POST); exit;
        $id = $_POST['id'];  
        $div='';
       // $all_component = $this->SalaryStruModel->get_result_data_for_salary('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N'));
        $all_benefitcomponent = $this->SalaryStruModel->get_result_data_for_salary_deduction();


      //  echo '<pre>';
      //  print_r($all_component);
      // exit;
         $div.= '<tr id="benefit_'.$id.'"><td><div class="form-group">
                 <select onchange="forbenefittype(this.value)" id="component_benefit" name="component_benefit[]" class="form-control selbenefit">
                    <option>Select</option>';
                    
                  if (!empty($all_benefitcomponent)) {
                    foreach ($all_benefitcomponent as $component) {
                        
                 
              $div.=    '<option value="'.$component->id.'" >'.$component->component.'</option>';
                   } }
                   
              $div.=  '</select>
            </div></td>
     
      <td> <div class="form-group"><label class="checkvalue" id="component_benefit_new'.$id.'"></label></div></td>
        <td class="benefitnot_fixed'.$id.'">  <select name="benefit_base_on[]" id="benefit_base_on'.$id.'" class="form-control">
                            <option value="CTC">CTC</option>
                            <option value="Basic Salary" >Basic Salary</option>
                        </select></td>
        <td class="benefitnot_fixed'.$id.'"><input type="hidden" name="benefit_oparetor[]" id="benefit_oparetor'.$id.'" value="*" class="form-control">
            <span>*</span></td>
        <td class="benefitnot_fixed'.$id.'"> <input placeholder="%" type="text" name="amountbenefit[]" onkeyup="numeric(this),salarybenefitcalculation(this.value);" id="amountbenefit'.$id.'" class="form-control text-right amount"></td>
        <td class="benefitnot_fixed'.$id.'"> <input type="text" placeholder="formula" readonly name="formulabenefit"  id="formulabenefit'.$id.'" value="" class="form-control text-right">
          <input type="hidden" name="benefit_div" id="benefit_div'.$id.'" value="'.$id.'">
            <input type="hidden" name="benefit_div_type" id="benefit_div_type'.$id.'" value="'.$id.'"></td>

        <td class="benefitfixed_new'.$id.'" style="display:none;"><input type="text" placeholder="Enter Total Amount" name="fixed_benefit_amount[]" onkeyup="numeric(this),salarybenefitcalculation_new(this.value,'.$id.');" id="fixed_benefit_amount'.$id.'" value="" class="form-control text-right">
        <input class="benefitfixed_new'.$id.'"  type="hidden" name="fixamounthiddenfix[]" id="fixamounthiddenfix'.$id.'" >
        </td>
        <td class="benefitfixed_new'.$id.'" style="display:none;"></td>
         <td class="benefitfixed_new'.$id.'" style="display:none;"></td>
        <td class="benefitfixed_new'.$id.'" style="display:none;"></td>
         <td class="text-right"><strong class="monthly_benefit" id="benefit_amount_monthly'.$id.'">0.00</strong></td>
        <td class="text-right"><strong class="total_benefit" id="benefit_amount_annual'.$id.'">0.00</strong></td>';


       
        
        echo $div; exit();         
    }
    
     public function delete_salary_structure($id) {
        $this->SalaryStruModel->delete_salary_structure($id);
    }





     public function get_salary_stucture_view() {
        $this->data['ctcVal'] = (float) $_POST['ctcVal'];      
        $this->data['salary_structure_val'] = $_POST['salary_structure_val'];

        $this->data['salary_component_Earning'] = $this->SalaryStruModel->get_salary_component_by_type($this->data['salary_structure_val'],'Earning','Monthly');
        $this->data['salary_component_Deduction'] = $this->SalaryStruModel->get_salary_component_by_type($this->data['salary_structure_val'],'Deduction','Monthly');
        $this->data['salary_component_benefit'] = $this->SalaryStruModel->get_salary_component_by_type($this->data['salary_structure_val'],'Earning','Annual');

        $this->data['all_component_incentive_reimbursement'] = $this->db->query("SELECT * FROM `HR_master_salary_component` WHERE `is_active` = 'Y' AND `delete_flag` = 'N' AND `mode` != 'Adhoc' AND `type` = 'Reimbursement' || `type` = 'Incentive'  AND `mode` != 'Adhoc'")->result();
        //$this->data['all_component_incentive_reimbursement'] = $this->db->query("SELECT * FROM `HR_master_salary_component` WHERE `is_active` = 'Y' AND `delete_flag` = 'N' AND `type` = 'Reimbursement' || `type` = 'Incentive'")->result();
        //print_r($this->data['salary_component_benefit']); die;
        $view = $this->load->view('salary_structure/admin/view_salary', $this->data, TRUE);
        echo $view;
        exit();
    }

}
/* End of file admin.php */
/* Location: ./application/modules/salary_structure/controllers/admin.php */
