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
            $this->load->view('incentive_reimbursement_rule/admin/list',$this->data);
        }else{
            $this->middle = 'incentive_reimbursement_rule/admin/list';
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
     echo "<pre>"; print_r($_POST); die;      
        if (isset($_POST['submit'])) {

                   
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
        //echo "<pre>"; print_r($_POST['id']); die;
        if(!empty($_POST['id'])){
            $id = $_POST['id'];
        }else{
            $id = '';
        }
          

        if (!empty($id)) {
            $this->data['data_single'] = $this->SalaryStruModel->load_single_data($id);
            $this->data['id'] = $id;  
        }  
       
         $this->data['all_component'] = $this->SalaryStruModel->get_result_data('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N','mode'=>'Monthly','type'=>'Earning'));

          $this->data['all_component_incentive_reimbursement'] = $this->db->query("SELECT * FROM `HR_master_salary_component` WHERE `is_active` = 'Y' AND `delete_flag` = 'N' AND `type` = 'Reimbursement' || `type` = 'Incentive'")->result();
          
        $view = $this->load->view('incentive_reimbursement_rule/admin/form',$this->data, TRUE);
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
        $id = $_POST['id'];  
        $div='';
        $all_component = $this->SalaryStruModel->get_result_data_for_salary();
         $div.= '<tr id="exp_'.$id.'"><td><div class="form-group">
                 <select onchange="fortype(this.value)" id="component" name="component[]" class="form-control sel">
                    <option>Select</option>';
                    
                  if (!empty($all_component)) {
                    foreach ($all_component as $component) {
                        if($component->id!='3')
                        {
                 
              $div.=    '<option value="'.$component->id.'" >'.$component->component.'</option>';
                  } } }
                   
              $div.=  '</select>
            </div></td>
       
        <td>  <select name="operator[]" id="operator'.$id.'" class="form-control">
              <option>Select</option>
              <option value="+">+</option>
              <option value="-">-</option>
              <option value="*">*</option>
              <option value="/">/</option>
            </select></td>
        </tr>';
        
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
         <td class="benefit_fixed'.$id.'"><select name="benefit_oparetor[]" id="benefit_oparetor'.$id.'" class="form-control">
                            <option value="*">*</option>
                            <option value="+">+</option>
                             <option value="-">-</option>
                            
                        </select></td>
        <td class="benefitnot_fixed'.$id.'"><input placeholder="%" type="text" onkeyup="numeric(this),salarybenefitcalculation(this.value,'.$id.');" name="amountbenefit[]" id="amountbenefit'.$id.'" class="form-control text-right amount"></td>
        <td class="benefitnot_fixed'.$id.'">  <input type="text" placeholder="formula" readonly name="formulabenefit"  id="formulabenefit'.$id.'" value="" class="form-control text-right"></td>

        <td class="benefitfixed_new'.$id.'" style="display:none;"><input type="text" placeholder="Enter Total Amount" name="benefitfixed_amount[]" onkeyup="numeric(this),salarybenefitcalculation_new(this.value,'.$id.');" id="benefitfixed_amount" value="" class="form-control text-right"></td>
        <td class="benefitfixed_new'.$id.'" style="display:none;"></td>
        <td class="benefitfixed_new'.$id.'" style="display:none;"></td>
        <td class="benefitfixed_new'.$id.'" style="display:none;"></td>

         <td><span class="total_benefit" id="calculate_benefitamount'.$id.'"> </span></td>
        <td> <button type="button" name="delete" class="btn btn-danger"><span onclick="deletebenefitDiv(\'benefit\','.$id.');" title="Delete" class="ks-icon la la-trash" aria-hidden="false" ></span></button> </td></tr>';


       
        
        echo $div; exit();         
    }
    
     public function delete_salary_structure($id) {
        $this->SalaryStruModel->delete_salary_structure($id);
    }

}
/* End of file admin.php */
/* Location: ./application/modules/salary_structure/controllers/admin.php */
