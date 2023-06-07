<?php $SysConfig = checkConfig();
$SysOrganization = checkOrganization();
//echo "<pre>"; print_r($SysOrganization); die;
 ?>
 <style>
/*    .repeat_sal_component .row,.row{margin-bottom: 0 !important; margin-top: 0 !important; padding-top: 10px}
    .repeat_sal_component .row{border-top: 1px solid #e5e5e5;}
    .repeat_sal_component .row .row{border-top: 0; margin-bottom: 0 !important; margin-top: 0 !important}*/
</style>

<form onsubmit="return myFunction('salary_structure_form')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_salary_structure').'/'.$id : base_url('admin_add_salary_structure'); ?>" name="salary_structure_form" id="salary_structure_form" enctype="multipart/form-data" >
    <div class="row">
    <div class="col-sm-6 col-xl-3">
        <div class="form-group">
            <label>Salary Structure for</label>
            <input required type="text" class="form-control" name="structure_name" value="<?php echo (isset($data_single->structure_name) ? $data_single->structure_name : ''); ?>">
        </div>
    </div>

     <div class="col-sm-6 col-xl-3">
        <div class="form-group">
            <label>Grade</label>
            <select class="form-control"  name="grade_id" required>
                <option value="">Select</option>
                  <?php
                  if (!empty($all_grade)) {
                    foreach ($all_grade as $grade) {
                  ?>
                  <option value="<?php echo $grade->id; ?>" <?php echo ((isset($data_single->grade_id) && ($data_single->grade_id==$grade->id)) ? 'selected' : ''); ?>><?php echo $grade->grade_name; ?></option>
                  <?php } } ?>     
              </select>

        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="form-group">
            <label>Department</label>
            <select class="form-control"  name="dept_id" required>
                <option value="">Select</option>
                  <?php
                  if (!empty($all_dept)) {
                    foreach ($all_dept as $department) {
                  ?>
                  <option value="<?php echo $department->id; ?>" <?php echo ((isset($data_single->dept_id) && ($data_single->dept_id==$department->id)) ? 'selected' : ''); ?>><?php echo $department->department_name; ?></option>
                  <?php } } ?>
              </select>

        </div>
    </div>
<div class="col-sm-6 col-xl-3">
        <div class="form-group">
            <label style="color:green;">Example CTC</label>
            <input  type="text" class="form-control text-right" onblur="blank_percentage();" name="ctc_amount" id="ctc_amount" value="500000">
        </div>
    </div>
</div>
    <!--2ndRow-->

<!--<table>-->

    <div class="row mt-2">
    <div class="col-12">
    <div class="card panel panel-table" data-dashboard-widget>
    <div class="card-block" data-widget-content>
    <table class="table table-bordered table-striped" width="100%">
    <thead>
      <tr>
        <th width="100%" colspan="8">Earnings</th>
      </tr>
    <tr>
        <th>Component</th>
        <th>Mode</th>
        <th colspan="3">Formula</th>
        <!--<th></th>
        <th>%</th>-->
        <!--<th></th>-->
        <th>Monthly</th>
        <th>Yearly</th>
    </tr>
    </thead>
    <tbody>
      <?php
if(!empty($data_single))
{
    $this->load->model('admin/SalaryStruModel');
    $detail= $this->SalaryStruModel->salary_formula($data_single->id);
    //echo '<pre>'; print_r($detail);exit;
    if(!empty($detail))
    {
        $i=1;
    foreach ($detail as $key => $details) {
$new_amount=0;
if($details->component_id=='3'){
    
    $new_amount=((500000*$details->amount)/100);
}
    
?>
 <tr>
        <td><div class="form-group">
                <select onchange="fortype(this.value)" data-id="<?php echo @$details->id;?>" id="component<?php echo @$details->id;?>" name="component[]" class="form-control component">
                    <option>Select</option>
                    <?php
                  if (!empty($all_component)) {
                    foreach ($all_component as $component) {
                  ?>
                  <option value="<?php echo $component->id; ?>" <?php echo ((isset($details) && ($details->component_id==$component->id)) ? 'selected' : ''); ?>><?php echo $component->component; ?></option>
                  <?php } } ?>
                </select>
            </div></td>
        <td><div class="form-group"><label class="checkvalue" id="component_type_new<?php echo ((isset($data_single_exp) && (count($data_single_exp))>0)  ? count($data_single_exp) : '1'); ?>"><?php echo ((isset($details) && (!empty($details->type))) ? $details->type.', '.@$details->mode : ''); ?></label></div></td>
        <td>  <select name="base_on[]" id="base_on<?php echo @$details->id;?>" class="form-control">
                            <option value="CTC" <?php echo ((isset($details) && ($details->base_on=='*')) ? 'CTC' : ''); ?>>CTC</option>
                            <option value="Basic Salary" <?php echo ((isset($details) && ($details->base_on=='Basic Salary')) ? 'selected' : ''); ?> >Basic Salary</option>
                        </select></td>
         <td>  <select name="oparetor[]" id="oparetor<?php echo @$details->id;?>" class="form-control">
                            <option value="*" <?php echo ((isset($details) && ($details->operator=='*')) ? 'selected' : ''); ?>  >*</option>
                            <option value="+" <?php echo ((isset($details) && ($details->operator=='+')) ? 'selected' : ''); ?>  >+</option>
                             <option value="-" <?php echo ((isset($details) && ($details->operator=='-')) ? 'selected' : ''); ?>  >-</option>
<!--                            <option value="/" <?php echo ((isset($details) && ($details->operator=='/')) ? 'selected' : ''); ?>  >/</option>-->
                        </select></td>
        <td> <input type="text" placeholder="%" name="amount[]" onkeyup="numeric(this),salarycalculation_update(this.value,'<?php echo @$details->id;?>');" id="amount<?php echo @$details->id;?>" value="<?php echo ((isset($details) && (!empty($details->amount))) ? $details->amount : ''); ?>" class="form-control text-right"></td>
        <td><input type="text" placeholder="formula" name="formula"  id="formula<?php echo @$details->id;?>" value="<?php echo @$details->base_on.''.@$details->operator.''.@$details->amount; ?>" class="form-control text-right"></td>
         <td><input type="hidden" name="total_hidden[]" id="experience_div_type<?php echo @$details->id;?>" value="<?php echo @$new_amount;?>"></td>
        <td></td>
    </tr>
     <?php
   $i++;
    }
}
   }
   else{
   ?>
   
    <tr>
        <td><div class="form-group">
                <select onchange="fortype(this.value)" id="component" name="component[]" class="form-control">
                    <option>Select</option>
                    <?php
                  if (!empty($all_component)) {
                    foreach ($all_component as $component) {
                        if($component->id=='3')
                        {
                  ?>
                  <option value="<?php echo $component->id; ?>" comptype="<?=$component->fixed?>" <?php echo ((isset($data_single->dept_id) && ($data_single->dept_id==$component->id)) ? 'selected' : ''); ?>><?php echo $component->component; ?></option>
                    <?php } } } ?>
                </select>
               

            </div></td>
        <td> <div class="form-group"><label class="checkvalue" id="component_type_new<?php echo ((isset($data_single_exp) && (count($data_single_exp))>0)  ? count($data_single_exp) : '1'); ?>"></label></div></td>
        <td>  <select name="base_on[]"  id="base_on" class="form-control">
                            <option value="CTC">CTC</option>
<!--                            <option value="Basic Salary" >Basic Salary</option>-->
                        </select></td>
         <td> <input type="hidden" name="oparetor[]" id="oparetor" value="*" class="form-control">
         	<span>*</span>
         	</td>
        <td> <input placeholder="%" style="width: 47px;" type="text" name="amount[]" onkeyup="numeric(this),salarycalculation(this.value);" id="amount" class="form-control text-right amount">
        <input type="hidden" name="amounthidden[]" id="amounthidden">
        </td>
        <!--<td> <input type="text" placeholder="formula" readonly name="formula"  id="formula" value="" class="form-control text-right"></td>-->
         <td><strong class="total_amount_monthly" id="basic_amount_monthly">0.00</strong></td>
        <td><strong class="total_amount" id="basic_amount">0.00</strong></td>
    </tr>
     <?php
   }
   ?>

   
  </tbody>
  <tbody class="repeat_sal_component"></tbody>
  <tbody style="display: none;">
    <tr><td><div class="form-group">
                 <select id="componentadjustment" name="componentadjustment" class="form-control" readonly>
                  
                    <?php
                  if (!empty($all_component)) {
                    foreach ($all_component as $component) {
                        if($component->id=='18')
                        {
                  ?>
                  <option value="<?php echo $component->id; ?>" <?php echo ((isset($component->id) && ($component->id=='7')) ? 'selected' : ''); ?>><?php echo $component->component; ?></option>
                    <?php } } } ?>
                </select>
            </div></td>
        <td></td>
       

        <td><input type="text" placeholder="Enter Total Amount" id="adjustment_amount" name="adjustment_amount" value="" readonly="" class="form-control text-right"></td>
        <td></td>
        <td></td>
        <!--<td></td>-->
         <td><span class="total_amount_monthly" id="monthly_adjustment_amount">0.00</span></td>
        <td><span class="total_amount pfYes esiYes" id="total_adjustment_amount">0.00</span></td></tr>
  </tbody>
  <tbody>
     <tr>
     	<th><div class="col-xl-2 text-right">
            <input type="hidden" name="experience_div" id="experience_div" value="<?php echo ((isset($data_single_exp) && (count($data_single_exp)) > 0) ? count($data_single_exp) : '1'); ?>">
            <input type="hidden" name="experience_div_type" id="experience_div_type" value="<?php echo ((isset($data_single_exp) && (count($data_single_exp)) > 0) ? count($data_single_exp) : '0'); ?>">
            <label><a href="javascript:void(0)" class="text-primary" onclick="get_div_experience();">Add</a></label>
        </div> </th>
        <th colspan="4" style="text-align: right;">Gross Earning</th>
         <th><?php echo (isset($SysConfig) && $SysConfig->currency_position=='Left') ? $SysConfig->default_currency_symbol : ''; ?> <strong id="monthly_gross_earning">0.00</strong> <?php echo (isset($SysConfig) && $SysConfig->currency_position=='Right') ? $SysConfig->default_currency_symbol : ''; ?></th>
        <th><?php echo (isset($SysConfig) && $SysConfig->currency_position=='Left') ? $SysConfig->default_currency_symbol : ''; ?> <strong id="total_gross_earning">0.00</strong> <?php echo (isset($SysConfig) && $SysConfig->currency_position=='Right') ? $SysConfig->default_currency_symbol : ''; ?></th>
    </tr>
 </tbody>
</table>
</div>
</div>
</div>
</div>
<!--<table>-->

  <!-- Table for deduction -->
  <div class="row mt-2">
    <div class="col-12">
    <div class="card panel panel-table" data-dashboard-widget>
    <div class="card-block" data-widget-content>
    <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th colspan="8">Deductions</th>
      </tr>
    </thead>
    <tbody>
      <?php if(!empty($SysOrganization->pf_no)){?>
      <?php foreach ($pf_data as $value) { ?>
    <tr>
      <td style="width: 27%;">
          <label><strong>PF (Employee Contribution)</strong></label>
          <input type="checkbox" id="pf_include"  name="pf">
         </td>
         <td style="width: 17%;"></td>
        <td> <input type="text" class="form-control text-right" id="employee_pf" name="employee_pf" value="<?php echo (isset($value->employee_pf_percent) ? $value->employee_pf_percent : ''); ?>" disabled>
             <input type="hidden" class="form-control text-right" id="employee_pf" name="employee_pf" value="<?php echo (isset($value->employee_pf_percent) ? $value->employee_pf_percent : ''); ?>"></td>
        <td><div class="form-group text-right">
            <input type="text" class="form-control text-right" style="display: none;" id="employee_deduction" name="employee_deduction"  readonly>
          </td>
        <td></td>
        <td></td>
        <td style="width: 12%;"><strong class="monthly_deduction" id="pf_employee_deduction_monthly">0.00</strong></td>
        <td style="width: 12%;"><strong class="total_deduction" id="pf_employee_deduction">0.00</strong></td>
    </tr>
    <?php } } ?>

     <?php 
      if(!empty($SysOrganization->esi_no)){
          foreach ($esi_data as $value) { ?>
    <tr>
      <td>
          <label><strong>ESI (Employee Contribution)</strong></label>
          <input type="checkbox" id="esi_include"  name="esi">
         </td>
          <td></td>
        <td>  <input type="text" class="form-control text-right" id="employee_esi" name="employee_esi" value="<?php echo (isset($value->employee_esi_percent) ? $value->employee_esi_percent : ''); ?>" disabled>
             <input type="hidden" class="form-control text-right" id="employee_esi" name="employee_esi" value="<?php echo (isset($value->employee_esi_percent) ? $value->employee_esi_percent : ''); ?>"></td>
        <td><div class="form-group text-right">
            <input type="text" class="form-control text-right" style="display: none;" id="employee_esi_deduction" name="employee_esi_deduction"  readonly="">
          </div></td>
          <td></td>
        <td></td>
        <td><strong class="monthly_deduction" id="esi_employee_deduction_monthly">0.00</strong></td>
        <td><strong class="total_deduction" id="esi_employee_deduction">0.00</strong></td>
    </tr>
    <?php } } ?>

     <?php 
     if(!empty($SysOrganization->p_tax_no)){
      foreach ($pf_data as $value) { ?>
    <tr>
      <td>
          <label><strong>Ptax</strong></label>
          <input type="hidden" name="ptax" value="1">
         </td>
        <td><div class="form-group">
            <label class="checkvalue" >Select State</label>
              <select name="ptax_state" onchange="ptax_deduction(this.value)" id="ptax_state" class="form-control" >
                 <option value="">Select State</option>  
                 <?php
                 if (isset($all_state)) {
                   foreach ($all_state as $key => $value) {
                    echo "<option value='".$value->state."' >".$value->state."</option>";
                   }
                 }
                  ?>  
              </select>
          </div></td>
        <td><input type="text" class="form-control text-right" id="ptax_num" name="ptax_num"  readonly=""></td>
        <td> <input type="text" class="form-control text-right" id="ptax_amount" name="ptax_amount"  disabled="">
            <input type="hidden" name="ptax_monthly" id="ptax_monthly"></td>
            <td></td>
        <td></td>
        <td><strong class="monthly_deduction" id="ptax_amount_deduction_monthly">0.00</strong></td>
        <td><strong class="total_deduction" id="ptax_amount_deduction">0.00</strong></td>
    </tr>
    <?php } } ?>
 <?php
   if (!empty($all_component_deduction)) { ?>
  <tbody>
  <tr>
        <td><div class="form-group">
                <select onchange="fordeductiontype(this.value)" id="component_deduction" name="component_deduction[]" class="form-control">
                    <option>Select</option>
                    <?php
                  if (!empty($all_component_deduction)) {
                    foreach ($all_component_deduction as $component) {
                        
                  ?>
                  <option value="<?php echo $component->id; ?>" <?php echo ((isset($data_single->dept_id) && ($data_single->dept_id==$component->id)) ? 'selected' : ''); ?>><?php echo $component->component; ?></option>
                    <?php  } } ?>
                </select>
            </div></td>
        <td> <div class="form-group"><label class="checkvalue" id="component_deduction_new<?php echo ((isset($data_single_exp) && (count($data_single_exp))>0)  ? count($data_single_exp) : '1'); ?>"></label></div></td>
        <td>  <select name="deduction_base_on[]" id="deduction_base_on" class="form-control">
                            <option value="CTC">CTC</option>
                        </select></td>
         <td> <select name="deduction_oparetor[]" id="deduction_oparetor" class="form-control">
                            <option value="*">*</option>
                        </select></td>
        <td> <input placeholder="%" type="text" name="amountdeduction[]" onkeyup="numeric(this),salarydeductioncalculation(this.value);" id="amountdeduction" class="form-control text-right amount"></td>
        <td> <input type="text" placeholder="formula" readonly name="formuladeduction"  id="formuladeduction" value="" class="form-control text-right"></td>
         <td><strong class="total_deduction" id="deduction_amount">0.00</strong></td>
        <td> <div class="col-xl-2 text-right">
            <input type="hidden" name="deduction_div" id="deduction_div" value="<?php echo ((isset($data_single_exp) && (count($data_single_exp)) > 0) ? count($data_single_exp) : '1'); ?>">
            <input type="hidden" name="deduction_div_type" id="deduction_div_type" value="<?php echo ((isset($data_single_exp) && (count($data_single_exp)) > 0) ? count($data_single_exp) : '0'); ?>">
            <label><a href="javascript:void(0)" class="text-primary" onclick="get_div_deduction();">Add</a></label>
        </div> </td>
    </tr>
</tbody>
<?php } ?>

 <tbody class="deduction_sal_repeat"></tbody>
   <tbody>
     <tr>
        <th colspan="6" style="text-align: right;">Total Deduction</th>
        <th><?php echo (isset($SysConfig) && $SysConfig->currency_position=='Left') ? $SysConfig->default_currency_symbol : ''; ?> <strong id="monthly_deduction_amount">0.00</strong> <?php echo (isset($SysConfig) && $SysConfig->currency_position=='Right') ? $SysConfig->default_currency_symbol : ''; ?></th>
        <th><?php echo (isset($SysConfig) && $SysConfig->currency_position=='Left') ? $SysConfig->default_currency_symbol : ''; ?> <strong id="total_deduction_amount">0.00</strong> <?php echo (isset($SysConfig) && $SysConfig->currency_position=='Right') ? $SysConfig->default_currency_symbol : ''; ?></th>
    </tr>
 </tbody>

  <tbody>
     <tr>
        <th colspan="6" style="text-align: right;">Take Home</th>
         <th><?php echo (isset($SysConfig) && $SysConfig->currency_position=='Left') ? $SysConfig->default_currency_symbol : ''; ?> <strong id="monthly_taken_amount">0.00</strong> <?php echo (isset($SysConfig) && $SysConfig->currency_position=='Right') ? $SysConfig->default_currency_symbol : ''; ?></th>
        <th><?php echo (isset($SysConfig) && $SysConfig->currency_position=='Left') ? $SysConfig->default_currency_symbol : ''; ?> <strong id="total_taken_amount">0.00</strong> <?php echo (isset($SysConfig) && $SysConfig->currency_position=='Right') ? $SysConfig->default_currency_symbol : ''; ?></th>
    </tr>
 </tbody>
</table>
</div>
</div>
</div>
</div>

<div class="row mt-2">
    <div class="col-12">
    <div class="card panel panel-table" data-dashboard-widget>
    <div class="card-block" data-widget-content>
    <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th colspan="8">Benefits</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      if(!empty($SysOrganization->pf_no)){
      foreach ($pf_data as $value) { ?>
    <tr>
      <td>
          <label><strong>PF (Employer Contribution)</strong></label>
         </td>
         <td></td>
        <td> <input type="text" class="form-control text-right" id="Employer_pf" name="Employer_pf" value="<?php echo (isset($value->employer_pf_percent) ? $value->employer_pf_percent : ''); ?>" disabled>
            <input type="hidden" class="form-control" id="Employer_pf" name="Employer_pf" value="<?php echo (isset($value->employer_pf_percent) ? $value->employer_pf_percent : ''); ?>"></td>
        <td><div class="form-group text-right">
            <input type="text" class="form-control  text-right" style="display: none;" id="employer_deduction" name="employer_deduction" readonly=""></td>
        <td></td>
        <td></td>
        <td><strong class="monthly_benefit" id="pf_employee_deduction_benefit_monthly">0.00</strong></td>
        <td><strong class="total_benefit" id="pf_employee_deduction_benefit">0.00</strong></td>
    </tr>
    <?php } }  ?>

     <?php 
 if(!empty($SysOrganization->esi_no)){
     foreach ($esi_data as $value) { ?>
    <tr>
      <td>
          <label><strong>ESI (Employer Contribution)</strong></label>
         </td>
          <td></td>
        <td>  <input type="text" class="form-control  text-right" id="Employer_esi" name="Employer_esi" value="<?php echo (isset($value->employer_esi_percent) ? $value->employer_esi_percent : ''); ?>" disabled>
            <input type="hidden" class="form-control  text-right" id="Employer_esi" name="Employer_esi" value="<?php echo (isset($value->employer_esi_percent) ? $value->employer_esi_percent : ''); ?>"></td>
        <td><div class="form-group text-right">
            <input type="text" class="form-control text-right" style="display: none;" id="employer_esi_deduction" name="employer_esi_deduction"  readonly="">
          </div></td>
          <td></td>
        <td></td>
        <td><strong class="monthly_benefit" id="esi_employee_deduction_benefit_monthly">0.00</strong></td>
        <td><strong class="total_benefit" id="esi_employee_deduction_benefit">0.00</strong></td>
    </tr>
    <?php } } ?>
    </tbody>
     <?php
   if (!empty($all_component_Annual)) { ?>
  <tbody>
  <tr>
        <td><div class="form-group">
                <select onchange="forbenefittype(this.value)" id="component_benefit" name="component_benefit[]" class="form-control">
                    <option>Select</option>
                    <?php
                  if (!empty($all_component_Annual)) {
                    foreach ($all_component_Annual as $component) {
                        
                  ?>
                  <option value="<?php echo $component->id; ?>" <?php echo ((isset($data_single->dept_id) && ($data_single->dept_id==$component->id)) ? 'selected' : ''); ?>><?php echo $component->component; ?></option>
                    <?php  } } ?>
                </select>
            </div></td>
        <td> <div class="form-group"><label class="checkvalue" id="component_benefit_new<?php echo ((isset($data_single_exp) && (count($data_single_exp))>0)  ? count($data_single_exp) : '1'); ?>"></label></div></td>
        <td>  <select name="benefit_base_on[]" id="benefit_base_on" class="form-control">
                            <option value="CTC">CTC</option>
                        </select></td>
         <td> <select name="benefit_oparetor[]" id="benefit_oparetor" class="form-control">
                            <option value="*">*</option>
                        </select></td>
        <td> <input placeholder="%" type="text" name="amountbenefit[]" onkeyup="numeric(this),salarybenefitcalculation(this.value);" id="amountbenefit" class="form-control text-right amount"></td>
        <td> <input type="text" placeholder="formula" readonly name="formulabenefit"  id="formulabenefit" value="" class="form-control text-right"></td>
         <td><strong class="total_benefit" id="benefit_amount">0.00</strong></td>
        <td> <div class="col-xl-2 text-right">
            <input type="hidden" name="benefit_div" id="benefit_div" value="<?php echo ((isset($data_single_exp) && (count($data_single_exp)) > 0) ? count($data_single_exp) : '1'); ?>">
            <input type="hidden" name="benefit_div_type" id="benefit_div_type" value="<?php echo ((isset($data_single_exp) && (count($data_single_exp)) > 0) ? count($data_single_exp) : '0'); ?>">
            <label><a href="javascript:void(0)" class="text-primary" onclick="get_div_benefit();">Add</a></label>
        </div> </td>
    </tr>
</tbody>
<?php } ?>

 <tbody class="benefit_sal_repeat"></tbody>
     <tbody>
     <tr>
        <th colspan="6" style="text-align: right;">Total Benefits</th>
         <th><?php echo (isset($SysConfig) && $SysConfig->currency_position=='Left') ? $SysConfig->default_currency_symbol : ''; ?> <strong id="monthly_benefit_amount">0.00</strong> <?php echo (isset($SysConfig) && $SysConfig->currency_position=='Right') ? $SysConfig->default_currency_symbol : ''; ?></th>
        <th><?php echo (isset($SysConfig) && $SysConfig->currency_position=='Left') ? $SysConfig->default_currency_symbol : ''; ?> <strong id="total_benefit_amount">0.00</strong> <?php echo (isset($SysConfig) && $SysConfig->currency_position=='Right') ? $SysConfig->default_currency_symbol : ''; ?></th>
    </tr>
     <tr>
         <th style="text-align: right;" colspan="5">
          <!--<label><strong>Re-calculate components total</strong></label>
          <input type="checkbox" id="adjustment"  name="adjustment">-->
         </th>
        <th style="text-align: right;">CTC</th>
        <th><?php echo (isset($SysConfig) && $SysConfig->currency_position=='Left') ? $SysConfig->default_currency_symbol : ''; ?> <strong id="monthly_ctc_amount">0.00</strong> <?php echo (isset($SysConfig) && $SysConfig->currency_position=='Right') ? $SysConfig->default_currency_symbol : ''; ?></th>
        <th><?php echo (isset($SysConfig) && $SysConfig->currency_position=='Left') ? $SysConfig->default_currency_symbol : ''; ?> <strong id="total_ctc_amount">0.00</strong> <?php echo (isset($SysConfig) && $SysConfig->currency_position=='Right') ? $SysConfig->default_currency_symbol : ''; ?></th>
    </tr>
 </tbody>

  </table>
</div>
</div>
</div>
</div>

<!-- <div class="row mt-2">
    <div class="col-12">
    <div class="card panel panel-table" data-dashboard-widget>
    <div class="card-block" data-widget-content>
    <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th colspan="8">Incentive / Reimbursement</th>
      </tr>
    </thead>
    <tbody>
      <?php  if (!empty($all_component_incentive_reimbursement)) {
                    foreach ($all_component_incentive_reimbursement as $component) {?>
    <tr>
      <td style="width: 27%;">
          <label><strong><?php echo $component->component?></strong></label>
          <input type="checkbox" id="insentive_reim_<?php echo $component->component?>" name="insentive_reim[]">
         </td>
         <td style="width: 17%;"></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td style="width: 12%;"></td>
        <td style="width: 12%;"></td>
    </tr>
    <?php } } ?>

</table>
</div>
</div>
</div>
</div>-->


  <!-- Table end->

   <!--Appending here-->
  
   
   <!-- <div class="row">
    <div class="text-right col-md-12">Total Amount: <?php echo (isset($SysConfig) && $SysConfig->currency_position=='Left') ? $SysConfig->default_currency_symbol : ''; ?> <strong id="total_calculate_amount">0.00</strong> <?php echo (isset($SysConfig) && $SysConfig->currency_position=='Right') ? $SysConfig->default_currency_symbol : ''; ?> </div>
    </div> -->
<!--<div class="row">
  <div class="col-lg-4 mb-4 mb-lg-0">
    <?php foreach ($pf_data as $value) { ?>
     
     <div class="row">
    
      <div class="col-12">
         <div class="card">
          <div class="card-body" style="background-color: #f2f4f5; padding: 15px 0 5px 15px;">
            <label><strong>PF</strong></label>
            <input type="checkbox" id="pf_include"  name="pf">
          </div>
        </div>
         </div>
        
      </div>


      <div class="row">   
        <div class="col-xl-12 pf_percent mt-3" style="display: none;">
        <div class="form-group">
            <label>Employer Contribution</label>
            <input type="text" class="form-control" id="Employer_pf" name="Employer_pf" value="<?php echo (isset($value->employer_pf_percent) ? $value->employer_pf_percent : ''); ?>" disabled>
            <input type="hidden" class="form-control" id="Employer_pf" name="Employer_pf" value="<?php echo (isset($value->employer_pf_percent) ? $value->employer_pf_percent : ''); ?>">
        </div>
        </div>
        <div class="col-xl-12">
          <div class="form-group"><label class="checkvalue pf_deduction_lable"  style="display: none; padding: 10px;" >Deduction</label>
             <input type="text" class="form-control" style="display: none;" id="employer_deduction" name="employer_deduction"  disabled="">
          </div>
             
        </div>





      </div>

    <div class="row">  
    <div class="col-xl-12 pf_percent" style="display: none;">
        <div class="form-group">
            <label>Employee Contribution</label>
            <input type="text" class="form-control" id="employee_pf" name="employee_pf" value="<?php echo (isset($value->employee_pf_percent) ? $value->employee_pf_percent : ''); ?>" disabled>
             <input type="hidden" class="form-control" id="employee_pf" name="employee_pf" value="<?php echo (isset($value->employee_pf_percent) ? $value->employee_pf_percent : ''); ?>">
        </div>

    </div>
     <div class="col-xl-12">
          <div class="form-group"><label class="checkvalue pf_deduction_lable"  style="display: none; padding: 10px; " >Deduction</label>
            <input type="text" class="form-control" style="display: none;" id="employee_deduction" name="employee_deduction"  disabled="">
          </div>
              
        </div>
   
    </div>


  <?php } ?>
  </div>
  <div class="col-lg-4 mb-4 mb-lg-0">
    <?php foreach ($esi_data as $value) { ?>
     
     <div class="row">
    
     <div class="col-12">
         <div class="card">
          <div class="card-body" style="background-color: #f2f4f5; padding: 15px 0 5px 15px;">
            <label><strong>ESI</strong></label>
            <input type="checkbox" id="esi_include"  name="esi">
          </div>
        </div>
         </div>
        
      </div>


      <div class="row">   
        <div class="col-xl-12 esi_percent mt-3" style="display: none;">
        <div class="form-group">
            <label>Employer Contribution</label>
            <input type="text" class="form-control" id="Employer_esi" name="Employer_esi" value="<?php echo (isset($value->employer_esi_percent) ? $value->employer_esi_percent : ''); ?>" disabled>
            <input type="hidden" class="form-control" id="Employer_esi" name="Employer_esi" value="<?php echo (isset($value->employer_esi_percent) ? $value->employer_esi_percent : ''); ?>">
        </div>
        </div>
        <div class="col-xl-12">
          <div class="form-group"><label class="checkvalue esi_deduction_lable"  style="display: none; padding: 10px;" >Deduction</label>
             <input type="text" class="form-control" style="display: none;" id="employer_esi_deduction" name="employer_esi_deduction"  disabled="">
          </div>
             
        </div>





      </div>

    <div class="row">  
    <div class="col-xl-12 esi_percent" style="display: none;">
        <div class="form-group">
            <label>Employee Contribution</label>
            <input type="text" class="form-control" id="employee_esi" name="employee_esi" value="<?php echo (isset($value->employee_esi_percent) ? $value->employee_esi_percent : ''); ?>" disabled>
             <input type="hidden" class="form-control" id="employee_esi" name="employee_esi" value="<?php echo (isset($value->employee_esi_percent) ? $value->employee_esi_percent : ''); ?>">
        </div>

    </div>
     <div class="col-xl-12">
          <div class="form-group"><label class="checkvalue esi_deduction_lable"  style="display: none; padding: 10px; " >Deduction</label>
            <input type="text" class="form-control" style="display: none;" id="employee_esi_deduction" name="employee_esi_deduction"  disabled="">
          </div>
              
        </div>
   
    </div>


  <?php } ?>
  </div>
  <div class="col-lg-4 mb-4 mb-lg-0">
     <?php foreach ($pf_data as $value) { ?>
     
     <div class="row">
    
        <div class="col-12">
          <div class="card">
          <div class="card-body" style="background-color: #f2f4f5; padding: 15px 0 5px 15px;">
              <label><strong>P tax</strong></label>
              <input type="checkbox"  name="ptax" id="ptax">
          </div>
        </div>
        </div>
        
     </div>


    <div class="row" id="ptax_div" style="display: none;">   
        <div class="col-xl-12 mt-3">
          <div class="form-group">
            <label class="checkvalue" >Select State</label>
              <select name="ptax_state" onchange="ptax_deduction(this.value)" id="ptax_state" class="form-control" >
                 <option value="">Select State</option>  
                 <?php
                 if (isset($all_state)) {
                   foreach ($all_state as $key => $value) {
                    echo "<option value='".$value->state."' >".$value->state."</option>";
                   }
                 }
                  ?>  
              </select>
          </div>
        </div>
        <div class="col-xl-12 ptax_details" style="display: none;" >
          <div class="form-group" >
            <label class="checkvalue " >Ptax NUMBER</label>
            <input type="text" class="form-control" id="ptax_num" name="ptax_num"  disabled="">
          </div>
        </div> 
        <div class="col-xl-12 ptax_details" style="display: none;">
          <div class="form-group" >
            <label class="checkvalue " >Deduction</label>
            <input type="text" class="form-control" id="ptax_amount" name="ptax_amount"  disabled="">
            <input type="hidden" name="ptax_monthly" id="ptax_monthly">
          </div>
        </div>

    </div>


  
  <?php } ?>
  </div>
</div>-->
    

  




   

   <!-- <div class="row">
    <div class="text-right col-md-12">Total Amount: <?php echo (isset($SysConfig) && $SysConfig->currency_position=='Left') ? $SysConfig->default_currency_symbol : ''; ?> <strong id="total_calculate_amount">0.00</strong> <?php echo (isset($SysConfig) && $SysConfig->currency_position=='Right') ? $SysConfig->default_currency_symbol : ''; ?> </div>
    </div>-->





   <br>
   <div class="row">
    <div class="col-md-12">
            <div class="form-group form-buttons">
                 <button type="submit" name="submit" id="submit" class="btn btn-success">Save</button>
                 <a href="javascript:;" class="btn btn-secondary" onclick="btnCloseForm();">Close</a>
            </div>
    </div>    
   </div>

</form>


<script type="text/javascript">
    $(document).ready(function(){
    	
        $('input[name="pf"]').click(function(){
            if($(this).prop("checked") == true){
                //alert("Checkbox is checked.");
               var basicAmount = $('.basicAmount').text(); 
                $('.pf_deduction_lable').show();
                $('.pf_percent').show();
                $('input[name="pf"]').val('1');
                $("#employee_deduction").show();
                $("#employer_deduction").show();

                 var totalpf = 0;
                  $('.pfYes').each(function() {

                  totalpf += parseFloat($(this).text());

                  });

                 var Employer_pf=$("#Employer_pf").val();
                  var employee_pf=$("#employee_pf").val();
                  var letpfamount  = '180000';

                if(parseFloat(basicAmount) >= parseFloat(letpfamount)){
                 

                  var employer_deduction=basicAmount * (Employer_pf/100);
                  var employee_deduction=basicAmount * (employee_pf/100);

                  $("#employer_deduction").val(Math.round(employer_deduction));
                  $("#employee_deduction").val(Math.round(employee_deduction));
                }else if(totalpf >= parseFloat(letpfamount)){
                   var employer_deduction=totalpf * (Employer_pf/100);
                  var employee_deduction=totalpf * (employee_pf/100);

                  $("#employer_deduction").val(Math.round(employer_deduction));
                  $("#employee_deduction").val(Math.round(employee_deduction));
                }else if(totalpf < parseFloat(letpfamount)){
                    var employer_deduction=totalpf * (Employer_pf/100);
                  var employee_deduction=totalpf * (employee_pf/100);

                  $("#employer_deduction").val(Math.round(employer_deduction));
                  $("#employee_deduction").val(Math.round(employee_deduction));
                }

                  $("#pf_employee_deduction").text(Math.round(employee_deduction));
                  $("#pf_employee_deduction_monthly").text(Math.round(employee_deduction/12));
                  
                  $("#pf_employee_deduction_benefit").text(Math.round(employer_deduction));
                  $("#pf_employee_deduction_benefit_monthly").text(Math.round(employer_deduction/12));
                  var totaldeduction = 0;
                  $('.total_deduction').each(function() {

                  totaldeduction += parseFloat($(this).text());

                  });
                  $("#total_deduction_amount").text(Math.round(totaldeduction));

                  var monthlydeduction = 0;
                  $('.monthly_deduction').each(function() {

                  monthlydeduction += parseFloat($(this).text());

                  });
                  $("#monthly_deduction_amount").text(Math.round(monthlydeduction));

                  var totalbenefit = 0;
                  $('.total_benefit').each(function() {

                  totalbenefit += parseFloat($(this).text());

                  });
                  $("#total_benefit_amount").text(Math.round(totalbenefit));

                  var monthlybenefit = 0;
                  $('.monthly_benefit').each(function() {

                  monthlybenefit += parseFloat($(this).text());

                  });
                  $("#monthly_benefit_amount").text(Math.round(monthlybenefit));

                  var totaltakehome = $('#total_gross_earning').text() - $('#total_deduction_amount').text();
                  $('#total_taken_amount').text(Math.round(totaltakehome));
                  $('#monthly_taken_amount').text(Math.round(totaltakehome/12));
                  var totalctc = parseFloat($('#total_gross_earning').text()) +  parseFloat($("#total_benefit_amount").text());
                  $('#total_ctc_amount').text(Math.round(totalctc));
                  $('#monthly_ctc_amount').text(Math.round(totalctc/12));
                  
                  
                //}
            }
            else if($(this).prop("checked") == false){
                //alert("Checkbox is unchecked.");
                var total=0;
                $('.pf_deduction_lable').hide();
                $('.pf_percent').hide();
                $('input[name="pf"]').val('0');
                //var total=$("#total_calculate_amount").text();
                var employer_deduction= $("#employer_deduction").val();
                var employee_deduction=  $("#employee_deduction").val();
                $("#employee_deduction").hide();
                $("#employer_deduction").hide();
                $("#pf_employee_deduction").text('0.00');
                 $("#pf_employee_deduction_monthly").text('0.00');
                
                $("#pf_employee_deduction_benefit").text('0.00');
                 $("#pf_employee_deduction_benefit_monthly").text('0.00');
                var totaldeduction = 0;
                  $('.total_deduction').each(function() {

                  totaldeduction += parseFloat($(this).text());

                  });
                  $("#total_deduction_amount").text(Math.round(totaldeduction));

                   var monthlydeduction = 0;
                  $('.monthly_deduction').each(function() {

                  monthlydeduction += parseFloat($(this).text());

                  });
                  $("#monthly_deduction_amount").text(Math.round(monthlydeduction));

                var totalbenefit = 0;
                  $('.total_benefit').each(function() {

                  totalbenefit += parseFloat($(this).text());

                  });
                  $("#total_benefit_amount").text(Math.round(totalbenefit));
                  var monthlybenefit = 0;
                  $('.monthly_benefit').each(function() {

                  monthlybenefit += parseFloat($(this).text());

                  });
                  $("#monthly_benefit_amount").text(Math.round(monthlybenefit));
                   var totaltakehome = $('#total_gross_earning').text() - $('#total_deduction_amount').text();
                  $('#total_taken_amount').text(Math.round(totaltakehome));
                  $('#monthly_taken_amount').text(Math.round(totaltakehome/12));
                 var totalctc = parseFloat($('#total_gross_earning').text()) +  parseFloat($("#total_benefit_amount").text());
                  $('#total_ctc_amount').text(Math.round(totalctc));
                  $('#monthly_ctc_amount').text(Math.round(totalctc/12));

            }
        });

         $('input[name="esi"]').click(function(){
            if($(this).prop("checked") == true){
              
                $('.esi_deduction_lable').show();
                $('.esi_percent').show();
                $('input[name="esi"]').val('1');
                $("#employee_esi_deduction").show();
                $("#employer_esi_deduction").show();
                var totalgross = parseFloat($('#total_gross_earning').text());
                var Employer_esi=$("#Employer_esi").val();

                var employee_esi=$("#employee_esi").val();

                var employer_deduction=totalgross * (Employer_esi/100);
                //alert(employer_deduction);

                var employee_deduction=totalgross * (employee_esi/100);

            $("#employer_esi_deduction").val(Math.round(employer_deduction));
            $("#employee_esi_deduction").val(Math.round(employee_deduction));

            $("#esi_employee_deduction").text(Math.round(employee_deduction));
            $("#esi_employee_deduction_monthly").text(Math.round(employee_deduction/12));
            $("#esi_employee_deduction_benefit").text(Math.round(employer_deduction));
            $("#esi_employee_deduction_benefit_monthly").text(Math.round(employer_deduction/12));
             var totaldeduction = 0;
                  $('.total_deduction').each(function() {

                  totaldeduction += parseFloat($(this).text());

                  });
                  $("#total_deduction_amount").text(Math.round(totaldeduction));

                   var monthlydeduction = 0;
                  $('.monthly_deduction').each(function() {

                  monthlydeduction += parseFloat($(this).text());

                  });
                  $("#monthly_deduction_amount").text(Math.round(monthlydeduction));

                  var totalbenefit = 0;
                  $('.total_benefit').each(function() {

                  totalbenefit += parseFloat($(this).text());

                  });
                  $("#total_benefit_amount").text(Math.round(totalbenefit));

                  var monthlybenefit = 0;
                  $('.monthly_benefit').each(function() {

                  monthlybenefit += parseFloat($(this).text());

                  });
                  $("#monthly_benefit_amount").text(Math.round(monthlybenefit));

                  var totaltakehome = $('#total_gross_earning').text() - $('#total_deduction_amount').text();
                  $('#total_taken_amount').text(Math.round(totaltakehome));
                  $('#monthly_taken_amount').text(Math.round(totaltakehome/12));
                  var totalctc = parseFloat($('#total_gross_earning').text()) +  parseFloat($("#total_benefit_amount").text());
                  $('#total_ctc_amount').text(Math.round(totalctc));
                  $('#monthly_ctc_amount').text(Math.round(totalctc/12));
            }
            else if($(this).prop("checked") == false){
                //alert("Checkbox is unchecked.");
                var total=0;
                $('.esi_deduction_lable').hide();

                $('.esi_percent').hide();
                $('input[name="esi"]').val('0');
               
                var employer_deduction= $("#employer_esi_deduction").val();
                var employee_deduction=  $("#employee_esi_deduction").val();
                $("#employee_esi_deduction").hide();
                $("#employer_esi_deduction").hide();
                $("#esi_employee_deduction").text('0.00');
                $("#esi_employee_deduction_monthly").text('0.00');
                $("#esi_employee_deduction_benefit").text('0.00');
                $("#esi_employee_deduction_benefit_monthly").text('0.00');
                
                var totaldeduction = 0;
                  $('.total_deduction').each(function() {

                  totaldeduction += parseFloat($(this).text());

                  });
                  $("#total_deduction_amount").text(Math.round(totaldeduction));
                   var monthlydeduction = 0;
                  $('.monthly_deduction').each(function() {

                  monthlydeduction += parseFloat($(this).text());

                  });
                  $("#monthly_deduction_amount").text(Math.round(monthlydeduction));

                  var totalbenefit = 0;
                  $('.total_benefit').each(function() {

                  totalbenefit += parseFloat($(this).text());

                  });
                  $("#total_benefit_amount").text(Math.round(totalbenefit));

                  var monthlybenefit = 0;
                  $('.monthly_benefit').each(function() {

                  monthlybenefit += parseFloat($(this).text());

                  });
                  $("#monthly_benefit_amount").text(Math.round(monthlybenefit));

                   var totaltakehome = $('#total_gross_earning').text() - $('#total_deduction_amount').text();
                  $('#total_taken_amount').text(Math.round(totaltakehome));
                  $('#monthly_taken_amount').text(totaltakehome/12);
                  var totalctc = parseFloat($('#total_gross_earning').text()) +  parseFloat($("#total_benefit_amount").text());
                  $('#total_ctc_amount').text(Math.round(totalctc));
                  $('#monthly_ctc_amount').text(Math.round(totalctc/12));
            }
        });

      
         $('input[name="ptax"]').click(function(){
            if($(this).prop("checked") == true){
            	$("#ptax_num").val('');
                 $("#ptax_amount").val('');
                 $('input[name="ptax"]').val('1');
                $("#ptax_div").show();
            }else{
            	ptax_state="";
                 var totalamount=$("#total_calculate_amount").text();
                 if($("#ptax_amount").val()){
                 var totaldeduction = 0;
                  $('.total_deduction').each(function() {

                  totaldeduction += parseFloat($(this).text());

                  });
                  $("#total_deduction_amount").text(Math.round(totaldeduction));

                   var monthlydeduction = 0;
                  $('.monthly_deduction').each(function() {

                  monthlydeduction += parseFloat($(this).text());

                  });
                  $("#monthly_deduction_amount").text(Math.round(monthlydeduction));

                  var totalbenefit = 0;
                  $('.total_benefit').each(function() {

                  totalbenefit += parseFloat($(this).text());

                  });
                  $("#total_benefit_amount").text(Math.round(totalbenefit));
                   var monthlybenefit = 0;
                  $('.monthly_benefit').each(function() {

                  monthlybenefit += parseFloat($(this).text());

                  });
                  $("#monthly_benefit_amount").text(Math.round(monthlybenefit));
                   var totaltakehome = $('#total_gross_earning').text() - $('#total_deduction_amount').text();
                  $('#total_taken_amount').text(totaltakehome);
                  $('#monthly_taken_amount').text(totaltakehome/12);
                 var totalctc = parseFloat($('#total_gross_earning').text()) +  parseFloat($("#total_benefit_amount").text());
                  $('#total_ctc_amount').text(Math.round(totalctc));
                  $('#monthly_ctc_amount').text(Math.round(totalctc/12));
                 }
               $('input[name="ptax"]').val('');
                $("#ptax_div").hide();
                $(".ptax_details").hide();
                 $("#ptax_num").val('');
                 $("#ptax_amount").val('');
            }
        });


    });



  $('input[name="adjustment"]').click(function(){
            if($(this).prop("checked") == true){

            var totalctc = $('#total_ctc_amount').text();
            var ctc=$('#ctc_amount').val();
            var balancing_amount  = parseFloat(ctc) - parseFloat(totalctc);
            $('#adjustment_amount').val(Math.round(balancing_amount));
            $('#total_adjustment_amount').text(Math.round(balancing_amount));
            $('#monthly_adjustment_amount').text(Math.round(balancing_amount/12));
            
            var totalearning = 0;
            $('.total_amount').each(function() {

                  totalearning += parseFloat($(this).text());

                  });
                  $("#total_gross_earning").text(Math.round(totalearning));


             var monthlyearning = 0;
            $('.total_amount_monthly').each(function() {

                  monthlyearning += parseFloat($(this).text());

                  });
                  $("#monthly_gross_earning").text(Math.round(monthlyearning));

             var totaldeduction = 0;
                  $('.total_deduction').each(function() {

                  totaldeduction += parseFloat($(this).text());

                  });
                  $("#total_deduction_amount").text(Math.round(totaldeduction));

                   var monthlydeduction = 0;
                  $('.monthly_deduction').each(function() {

                  monthlydeduction += parseFloat($(this).text());

                  });
                  $("#monthly_deduction_amount").text(Math.round(monthlydeduction));

                  var totalbenefit = 0;
                  $('.total_benefit').each(function() {

                  totalbenefit += parseFloat($(this).text());

                  });
                  $("#total_benefit_amount").text(Math.round(totalbenefit));

                   var monthlybenefit = 0;
                  $('.monthly_benefit').each(function() {

                  monthlybenefit += parseFloat($(this).text());

                  });
                  $("#monthly_benefit_amount").text(Math.round(monthlybenefit));

                  var totaltakehome = $('#total_gross_earning').text() - $('#total_deduction_amount').text();
                  $('#total_taken_amount').text(Math.round(totaltakehome));
                  $('#monthly_taken_amount').text(totaltakehome/12);
                  var totalctc = parseFloat($('#total_gross_earning').text()) +  parseFloat($("#total_benefit_amount").text());
                  $('#total_ctc_amount').text(Math.round(totalctc));
                  $('#monthly_ctc_amount').text(Math.round(totalctc/12));

                  if(parseFloat(totalctc)>parseFloat(ctc)){
                  alert('Your CTC amount is less than total amount');
                  $("#submit").attr("disabled", true); 
                  }
                  else if(parseFloat(totalctc)<parseFloat(ctc)){
                  //alert('Your CTC amount is less than total amount');
                  $("#submit").attr("disabled", true); 
                  }else{
                  $("#submit").attr("disabled", false);
                  }

                  salarycalculation();
            }
            else if($(this).prop("checked") == false){
              //alert("Checkbox is unchecked.");
              $('#adjustment_amount').val('0.00');
              $('#total_adjustment_amount').text('0.00');
              $('#monthly_adjustment_amount').text('0.00');
              var totalearning = 0;
              $('.total_amount').each(function() {

              totalearning += parseFloat($(this).text());

              });
              $("#total_gross_earning").text(Math.round(totalearning));
              var monthlyearning = 0.00;
    $('.total_amount_monthly').each(function() {
    // console.log($(this).text());
      monthlyearning += parseFloat($(this).text());
  });
  $('#monthly_gross_earning').text(Math.round(monthlyearning));

                var totaldeduction = 0;
                  $('.total_deduction').each(function() {

                  totaldeduction += parseFloat($(this).text());

                  });
                  $("#total_deduction_amount").text(Math.round(totaldeduction));

                   var monthlydeduction = 0;
                  $('.monthly_deduction').each(function() {

                  monthlydeduction += parseFloat($(this).text());

                  });
                  $("#monthly_deduction_amount").text(Math.round(monthlydeduction));

                  var totalbenefit = 0;
                  $('.total_benefit').each(function() {

                  totalbenefit += parseFloat($(this).text());

                  });
                  $("#total_benefit_amount").text(Math.round(totalbenefit));

                   var monthlybenefit = 0;
                  $('.monthly_benefit').each(function() {

                  monthlybenefit += parseFloat($(this).text());

                  });
                  $("#monthly_benefit_amount").text(Math.round(monthlybenefit));

                   var totaltakehome = $('#total_gross_earning').text() - $('#total_deduction_amount').text();
                  $('#total_taken_amount').text(Math.round(totaltakehome));
                  $('#monthly_taken_amount').text(Math.round(totaltakehome/12));
                  var totalctc = parseFloat($('#total_gross_earning').text()) +  parseFloat($("#total_benefit_amount").text());
                  $('#total_ctc_amount').text(Math.round(totalctc));

                  $('#monthly_ctc_amount').text(Math.round(totalctc/12));
                  if(parseFloat(totalctc)>parseFloat(ctc)){
                  alert('Your CTC amount is less than total amount');
                  $("#submit").attr("disabled", true); 
                  }
                  else if(parseFloat(totalctc)<parseFloat(ctc)){
                  //alert('Your CTC amount is less than total amount');
                  $("#submit").attr("disabled", true); 
                  }else{
                  $("#submit").attr("disabled", false);
                  }
            }
        });
</script>
