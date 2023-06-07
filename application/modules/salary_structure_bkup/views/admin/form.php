<?php $SysConfig = checkConfig();
$SysOrganization = checkOrganization();
 ?>
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
        <h5>Earnings</h5>
        <div class="card mb-3" style="border-top:0">
    <div class="card-block  p-0" data-widget-content>
    <table class="table table-bordered mb-0">
    <thead>      
    <tr>
        <th>Component</th>
        <th>Mode</th>
        <th colspan="3">Formula</th>
        <th class="text-right">Monthly</th>
        <th class="text-right">Yearly</th>
    </tr>
    </thead>
    <tbody>

   
    <tr>
        <td><div class="">
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
        <td> <div class=""><label class="checkvalue" id="component_type_new<?php echo ((isset($data_single_exp) && (count($data_single_exp))>0)  ? count($data_single_exp) : '1'); ?>"></label></div></td>
        <td>  <select name="base_on[]"  id="base_on" class="form-control">
                            <option value="CTC">CTC</option>
                        </select></td>
         <td> <input type="hidden" name="oparetor[]" id="oparetor" value="*" class="form-control">
         	<span>*</span>
         	</td>
        <td> <input placeholder="%" style="width: 47px;" type="text" name="amount[]" onkeyup="numeric(this),salarycalculation(this.value);" id="amount" class="form-control text-right amount">
        <input type="hidden" name="amounthidden[]" id="amounthidden">
        </td>
         <td  class="text-right"><strong class="total_amount_monthly" id="basic_amount_monthly">0.00</strong></td>
        <td  class="text-right"><strong class="total_amount" id="basic_amount">0.00</strong></td>
    </tr>
  

   
  </tbody>
  <tbody class="repeat_sal_component"></tbody>
  <tbody>
    <tr><td><div class="">
                 <select id="componentadjustment" name="componentadjustment" class="form-control" readonly>
                  
                    <?php
                  if (!empty($all_component)) {
                    foreach ($all_component as $component) {
                        if($component->id=='20')
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
         <td class="text-right"><span class="total_amount_monthly" id="monthly_adjustment_amount">0.00</span></td>
        <td class="text-right"><span class="total_amount pfYes esiYes" id="total_adjustment_amount">0.00</span></td></tr>
  </tbody>
  <tbody>
     <tr>
     	<th><div class="col-xl-2 text-right">
            <input type="hidden" name="experience_div" id="experience_div" value="<?php echo ((isset($data_single_exp) && (count($data_single_exp)) > 0) ? count($data_single_exp) : '1'); ?>">
            <input type="hidden" name="experience_div_type" id="experience_div_type" value="<?php echo ((isset($data_single_exp) && (count($data_single_exp)) > 0) ? count($data_single_exp) : '0'); ?>">
            <label><a href="javascript:void(0)" class="text-primary" onclick="get_div_experience();">Add</a></label>
        </div> </th>
        <th colspan="4" style="text-align: right;">Gross Earning</th>
         <th class="text-right"><?php echo (isset($SysConfig) && $SysConfig->currency_position=='Left') ? $SysConfig->default_currency_symbol : ''; ?> <strong id="monthly_gross_earning">0.00</strong> <?php echo (isset($SysConfig) && $SysConfig->currency_position=='Right') ? $SysConfig->default_currency_symbol : ''; ?></th>
        <th class="text-right"><?php echo (isset($SysConfig) && $SysConfig->currency_position=='Left') ? $SysConfig->default_currency_symbol : ''; ?> <strong id="total_gross_earning">0.00</strong> <?php echo (isset($SysConfig) && $SysConfig->currency_position=='Right') ? $SysConfig->default_currency_symbol : ''; ?></th>
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
        <h5>Deductions</h5>
    <div class="card mb-3" style="border-top:0">
    <div class="card-block  p-0" data-widget-content>
    <table class="table table-bordered mb-0">    
    <tbody>
      <?php if(!empty($SysOrganization->pf_no)){?>
      <?php foreach ($pf_data as $value) { ?>
    <tr>
      <td style="width: 27%;">
        <div class="custom-control custom-checkbox">            
            <input type="checkbox" id="pf_include" class="custom-control-input"  name="pf">
            <label class="custom-control-label" for="pf_include">PF (Employee Contribution)</label>
        </div>
         </td>
         <td style="width: 17%;"></td>
        <td> <input type="text" class="form-control text-right" id="employee_pf" name="employee_pf" value="<?php echo (isset($value->employee_pf_percent) ? $value->employee_pf_percent : ''); ?>" disabled>
             <input type="hidden" class="form-control text-right" id="employee_pf" name="employee_pf" value="<?php echo (isset($value->employee_pf_percent) ? $value->employee_pf_percent : ''); ?>"></td>
        <td><div class=" text-right">
            <input type="text" class="form-control text-right" style="display: none;" id="employee_deduction" name="employee_deduction"  readonly>
          </td>
        <td></td>
        <td></td>
        <td class="text-right" style="width: 12%;"><strong class="monthly_deduction" id="pf_employee_deduction_monthly">0.00</strong></td>
        <td class="text-right" style="width: 12%;"><strong class="total_deduction" id="pf_employee_deduction">0.00</strong></td>
    </tr>
    <?php } } ?>

     <?php 
      if(!empty($SysOrganization->esi_no)){
          foreach ($esi_data as $value) { ?>
    <tr>
      <td>
          <div class="custom-control custom-checkbox">                        
            <input type="checkbox" id="esi_include"  name="esi" class="custom-control-input"  >
            <label class="custom-control-label" for="esi_include">ESI (Employee Contribution)</label>
        </div>
         </td>
          <td></td>
        <td>  <input type="text" class="form-control text-right" id="employee_esi" name="employee_esi" value="<?php echo (isset($value->employee_esi_percent) ? $value->employee_esi_percent : ''); ?>" disabled>
             <input type="hidden" class="form-control text-right" id="employee_esi" name="employee_esi" value="<?php echo (isset($value->employee_esi_percent) ? $value->employee_esi_percent : ''); ?>"></td>
        <td><div class=" text-right">
            <input type="text" class="form-control text-right" style="display: none;" id="employee_esi_deduction" name="employee_esi_deduction"  readonly="">
          </div></td>
          <td></td>
        <td></td>
        <td class="text-right"><strong class="monthly_deduction" id="esi_employee_deduction_monthly">0.00</strong></td>
        <td class="text-right"><strong class="total_deduction" id="esi_employee_deduction">0.00</strong></td>
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
        <td><div class="">
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
        <td class="text-right"><strong class="monthly_deduction" id="ptax_amount_deduction_monthly">0.00</strong></td>
        <td class="text-right"><strong class="total_deduction" id="ptax_amount_deduction">0.00</strong></td>
    </tr>
    <?php } } ?>
 <?php
   if (!empty($all_component_deduction)) { ?>
  <tbody>
  <tr>
        <td><div class="">
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
        <td> <div class=""><label class="checkvalue" id="component_deduction_new<?php echo ((isset($data_single_exp) && (count($data_single_exp))>0)  ? count($data_single_exp) : '1'); ?>"></label></div></td>
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
        <th class="text-right"><?php echo (isset($SysConfig) && $SysConfig->currency_position=='Left') ? $SysConfig->default_currency_symbol : ''; ?> <strong id="monthly_deduction_amount">0.00</strong> <?php echo (isset($SysConfig) && $SysConfig->currency_position=='Right') ? $SysConfig->default_currency_symbol : ''; ?></th>
        <th class="text-right"><?php echo (isset($SysConfig) && $SysConfig->currency_position=='Left') ? $SysConfig->default_currency_symbol : ''; ?> <strong id="total_deduction_amount">0.00</strong> <?php echo (isset($SysConfig) && $SysConfig->currency_position=='Right') ? $SysConfig->default_currency_symbol : ''; ?></th>
    </tr>
 </tbody>

  <tbody>
     <tr>
        <th colspan="6" style="text-align: right;">Take Home</th>
         <th class="text-right"><?php echo (isset($SysConfig) && $SysConfig->currency_position=='Left') ? $SysConfig->default_currency_symbol : ''; ?> <strong id="monthly_taken_amount">0.00</strong> <?php echo (isset($SysConfig) && $SysConfig->currency_position=='Right') ? $SysConfig->default_currency_symbol : ''; ?></th>
        <th class="text-right"><?php echo (isset($SysConfig) && $SysConfig->currency_position=='Left') ? $SysConfig->default_currency_symbol : ''; ?> <strong id="total_taken_amount">0.00</strong> <?php echo (isset($SysConfig) && $SysConfig->currency_position=='Right') ? $SysConfig->default_currency_symbol : ''; ?></th>
    </tr>
 </tbody>
</table>
</div>
</div>
</div>
</div>

<div class="row mt-2">
    <div class="col-12">
        <h5>Benefits</h5>
    <div class="card mb-3" style="border-top:0">
    <div class="card-block  p-0" data-widget-content>
    <table class="table table-bordered mb-0">    
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
        <td><div class=" text-right">
            <input type="text" class="form-control  text-right" style="display: none;" id="employer_deduction" name="employer_deduction" readonly=""></td>
        <td></td>
        <td></td>
        <td class="text-right"><strong class="monthly_benefit" id="pf_employee_deduction_benefit_monthly">0.00</strong></td>
        <td class="text-right"><strong class="total_benefit" id="pf_employee_deduction_benefit">0.00</strong></td>
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
        <td><div class=" text-right">
            <input type="text" class="form-control text-right" style="display: none;" id="employer_esi_deduction" name="employer_esi_deduction"  readonly="">
          </div></td>
          <td></td>
        <td></td>
        <td class="text-right"><strong class="monthly_benefit" id="esi_employee_deduction_benefit_monthly">0.00</strong></td>
        <td class="text-right"><strong class="total_benefit" id="esi_employee_deduction_benefit">0.00</strong></td>
    </tr>
    <?php } } ?>
    
     <?php
   if (!empty($all_component_Annual)) { ?>
  
  <tr>
        <td><div class="">
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
          <td> 
            <div class="">
            <label class="checkvalue" id="component_benefit_new<?php echo ((isset($data_single_bef) && (count($data_single_bef))>0)  ? count($data_single_bef) : '1'); ?>"></label>
            </div>
          </td>
        <td class="benefitnot_fixed<?php echo ((isset($data_single_bef) && (count($data_single_bef))>0)  ? count($data_single_bef) : '1'); ?>">  
              <select name="benefit_base_on[]" id="benefit_base_on" class="form-control">
              <option value="CTC">CTC</option>
              <option value="Basic Salary" >Basic Salary</option>
              </select>
      </td>
        <td class="benefitnot_fixed<?php echo ((isset($data_single_bef) && (count($data_single_bef))>0)  ? count($data_single_bef) : '1'); ?>">
          <input type="hidden" name="benefit_oparetor[]" id="benefit_oparetor" value="*" class="form-control">
            <span>*</span>
          </td>
        <td class="benefitnot_fixed<?php echo ((isset($data_single_bef) && (count($data_single_bef))>0)  ? count($data_single_bef) : '1'); ?>"> 
          <input placeholder="%" type="text" name="amountbenefit[]" onkeyup="numeric(this),salarybenefitcalculation(this.value,'<?php echo ((isset($data_single_bef) && (count($data_single_bef))>0)  ? count($data_single_bef) : '1'); ?>');" id="amountbenefit" class="form-control text-right amount">
        </td>
        <td class="benefitnot_fixed<?php echo ((isset($data_single_bef) && (count($data_single_bef))>0)  ? count($data_single_bef) : '1'); ?>"> 
          <input type="text" placeholder="formula" readonly name="formulabenefit"  id="formulabenefit<?php echo ((isset($data_single_bef) && (count($data_single_bef))>0)  ? count($data_single_bef) : '1'); ?>" value="" class="form-control text-right">
          <input type="hidden" name="benefit_div" id="benefit_div" value="<?php echo ((isset($data_single_bef) && (count($data_single_bef)) > 0) ? count($data_single_bef) : '1'); ?>">

          <input type="hidden" name="benefit_div_type" id="benefit_div_type" value="<?php echo ((isset($data_single_bef) && (count($data_single_bef)) > 0) ? count($data_single_bef) : '0'); ?>">
      </td>

        <td class="benefitfixed_new<?php echo ((isset($data_single_bef) && (count($data_single_bef))>0)  ? count($data_single_bef) : '1'); ?>" style="display:none;">
          <input type="text" placeholder="Enter Total Amount" name="fixed_benefit_amount[]" onkeyup="numeric(this),salarybenefitcalculation_new(this.value,'<?php echo ((isset($data_single_bef) && (count($data_single_bef))>0)  ? count($data_single_bef) : '1'); ?>');" id="fixed_benefit_amount" value="" class="form-control text-right">
        <input class="benefitfixed_new<?php echo ((isset($data_single_bef) && (count($data_single_bef))>0)  ? count($data_single_bef) : '1'); ?>"  type="hidden" name="fixamounthiddenfix[]" id="fixamounthiddenfix" >
        </td>
        <td class="benefitfixed_new<?php echo ((isset($data_single_bef) && (count($data_single_bef))>0)  ? count($data_single_bef) : '1'); ?>" style="display:none;">
        </td>
         <td class="benefitfixed_new<?php echo ((isset($data_single_bef) && (count($data_single_bef))>0)  ? count($data_single_bef) : '1'); ?>" style="display:none;">
         </td>
        <td class="benefitfixed_new<?php echo ((isset($data_single_bef) && (count($data_single_bef))>0)  ? count($data_single_bef) : '1'); ?>" style="display:none;">
        </td>
         <td class="text-right">
        <strong class="monthly_benefit" id="benefit_amount_monthly<?php echo ((isset($data_single_bef) && (count($data_single_bef))>0)  ? count($data_single_bef) : '1'); ?>">0.00</strong>
        </td>
        <td class="text-right">
          <strong class="total_benefit benefitamount" id="benefit_amount_annual<?php echo ((isset($data_single_bef) && (count($data_single_bef))>0)  ? count($data_single_bef) : '1'); ?>">0.00</strong></td>
    </tr>
</tbody>
<?php } ?>

 <tbody class="benefit_sal_repeat"></tbody>
     <tfoot>
     <tr>
      <th><div class="col-xl-2 text-right">
            <input type="hidden" name="benefit_div" id="benefit_div" value="<?php echo ((isset($data_single_bef) && (count($data_single_bef)) > 0) ? count($data_single_bef) : '1'); ?>">
            <input type="hidden" name="benefit_div_type" id="benefit_div_type" value="<?php echo ((isset($data_single_bef) && (count($data_single_bef)) > 0) ? count($data_single_bef) : '0'); ?>">
            <label><a href="javascript:void(0)" class="text-primary" onclick="get_div_benefit();">Add</a></label>
        </div>
      </th>
        <th colspan="5" style="text-align: right;">Total Benefits</th>
         <th class="text-right"><?php echo (isset($SysConfig) && $SysConfig->currency_position=='Left') ? $SysConfig->default_currency_symbol : ''; ?> <strong id="monthly_benefit_amount">0.00</strong> <?php echo (isset($SysConfig) && $SysConfig->currency_position=='Right') ? $SysConfig->default_currency_symbol : ''; ?></th>
        <th class="text-right"><?php echo (isset($SysConfig) && $SysConfig->currency_position=='Left') ? $SysConfig->default_currency_symbol : ''; ?> <strong id="total_benefit_amount">0.00</strong> <?php echo (isset($SysConfig) && $SysConfig->currency_position=='Right') ? $SysConfig->default_currency_symbol : ''; ?></th>
    </tr>
     <tr>
         <th colspan="5">
          <div class="custom-control custom-checkbox">            
            <input type="checkbox" class="custom-control-input" id="adjustment1" onclick="getgross();"  name="adjustment1">
            <label class="custom-control-label" for="adjustment1" style="font-weight:normal!important">Re-calculate components total</label>            
        </div>     
         </th>
        <th style="text-align: right;">CTC</th>
        <th class="text-right"><?php echo (isset($SysConfig) && $SysConfig->currency_position=='Left') ? $SysConfig->default_currency_symbol : ''; ?> <strong id="monthly_ctc_amount">0.00</strong> <?php echo (isset($SysConfig) && $SysConfig->currency_position=='Right') ? $SysConfig->default_currency_symbol : ''; ?></th>
        <th class="text-right"><?php echo (isset($SysConfig) && $SysConfig->currency_position=='Left') ? $SysConfig->default_currency_symbol : ''; ?> <strong id="total_ctc_amount">0.00</strong> <?php echo (isset($SysConfig) && $SysConfig->currency_position=='Right') ? $SysConfig->default_currency_symbol : ''; ?></th>
    </tr>
 </tfoot>

  </table>
</div>
</div>
</div>
</div>
   <?php
   if (!empty($all_component_incentive_reimbursement)) { ?>
<div class="row mt-2">
    <div class="col-12">
        <h5>Not part of CTC</h5>
    <div class="card mb-3" style="border-top:0">
    <div class="card-block  p-0" data-widget-content>
    <table class="table table-bordered mb-0">    
   <tbody>
    
     <?php
  
                  if (!empty($all_component_incentive_reimbursement)) {
                    foreach ($all_component_incentive_reimbursement as $incentive_reimbursement) {
                      $formula = '';
                        $data_single_formula = $this->SalaryStruModel->get_row_data('master_salary_component_formula',array('component_id'=>$incentive_reimbursement->id));
                        if(!empty($data_single_formula)){
                          if($data_single_formula->component == 'gross_amount'){
                            $formula = 'Gross / '.$data_single_formula->day_type.' * '.$data_single_formula->day_type_1;
                          }else{
                            $componentArr = explode(',', $data_single_formula->component);
                            $operatorArr = explode(',', $data_single_formula->operator);
                             $com_operator = '';
                            foreach ($componentArr as $key => $value) {
                               $component_name = $this->SalaryStruModel->get_row_data('master_salary_component',array('id'=>$value));
                               $com_operator .= $component_name->component.' '.$operatorArr[$key];
                            }
                            $formula = $com_operator.' '.$data_single_formula->fixed_amount.' / '.$data_single_formula->day_type.' * '.$data_single_formula->day_type_1;
                          }
                        }
                  ?>
  <tr>
      <td><div class="custom-control custom-checkbox">            
      <input type="checkbox" onclick="Checknotpartofsalary();" id="not_part_of_ctc<?=$incentive_reimbursement->id?>" class="custom-control-input"  name="not_part_of_ctc"  value="<?php echo $incentive_reimbursement->id; ?>">
      <label class="custom-control-label" for="not_part_of_ctc<?=$incentive_reimbursement->id?>"><?php echo $incentive_reimbursement->component;?></label>
      </div>
      <input type="hidden" name="not_part_ctc_component_id" id="not_part_ctc_component_id" value=""> 
      </td>
      <td colspan="7"> <?=$formula?>
      </td>
    </tr>


<?php }} ?>
</tbody>


    

  </table>
</div>
</div>
</div>
</div>
<?php } ?>




   

   <div class="row">
    <div class="col-md-12">
            <div class=" form-buttons">
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
                  $('#monthly_taken_amount').text(Math.round(totaltakehome/12));
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
                  $('#total_taken_amount').text(Math.round(totaltakehome));
                  $('#monthly_taken_amount').text(Math.round(totaltakehome/12));
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


function getgross(){
  var ctc = $('#ctc_amount').val();
  var HRA = 0;
  $('.pfNo').each(function() {
  HRA += parseFloat($(this).text());
  });
  var Basic = $('.basicAmount').text();
  var pf = 0;
  var benefitAmount = 0;
  var Employer_pf_percentage = $('#Employer_pf').val();
  var Employer_esi_percentage = $('#Employer_esi').val();
  var pfesi_percentage = parseFloat(Employer_pf_percentage)+parseFloat(Employer_esi_percentage)+100;
  var pf_percentage = parseFloat(Employer_pf_percentage)+100;
  var esi_percentage = parseFloat(Employer_esi_percentage)+100;
  var gross = 0;
  var total_earning = 0;
  var Earning = 0;
  var special_amount = 0;

$('.pfYes').each(function() {
pf += parseFloat($(this).text());
});



$('.total_amount').each(function() {
total_earning += parseFloat($(this).text());
});
Earning = parseFloat(total_earning) - parseFloat($('#total_adjustment_amount').text());
//alert(Earning);

$('.benefitamount').each(function() {
benefitAmount += parseFloat($(this).text());
});

if ($('#pf_include').prop('checked') == true && $('#esi_include').prop('checked') == true) {
  if(parseFloat(Basic) < '180000'){
  gross = (parseFloat(ctc) + parseFloat(HRA)*12/100 - parseFloat(benefitAmount))*100/parseFloat(pfesi_percentage);
  special_amount = parseFloat(gross) - parseFloat(Earning);
  $('#adjustment_amount').val(Math.round(special_amount));
  $('#monthly_adjustment_amount').text(Math.round(special_amount/12));
  $('#total_adjustment_amount').text(Math.round(special_amount));
  }else{
  gross = (parseFloat(ctc) - parseFloat(Basic)*12/100 - parseFloat(benefitAmount))*100/parseFloat(esi_percentage);
  special_amount = parseFloat(gross) - parseFloat(Earning);
  $('#adjustment_amount').val(Math.round(special_amount));
  $('#monthly_adjustment_amount').text(Math.round(special_amount/12));
  $('#total_adjustment_amount').text(Math.round(special_amount));
  }
}else if($('#pf_include').prop('checked') == true && $('#esi_include').prop('checked') == false){
  if(parseFloat(Basic) < '180000'){
  gross = (parseFloat(ctc) + parseFloat(HRA)*12/100 - parseFloat(benefitAmount))*100/parseFloat(pf_percentage);
  special_amount = parseFloat(gross) - parseFloat(Earning);
  $('#adjustment_amount').val(Math.round(special_amount));
  $('#monthly_adjustment_amount').text(Math.round(special_amount/12));
  $('#total_adjustment_amount').text(Math.round(special_amount));
  }else{
  gross = (parseFloat(ctc) - parseFloat(Basic)*12/100 - parseFloat(benefitAmount));
  special_amount = parseFloat(gross) - parseFloat(Earning);
  $('#adjustment_amount').val(Math.round(special_amount));
  $('#monthly_adjustment_amount').text(Math.round(special_amount/12));
  $('#total_adjustment_amount').text(Math.round(special_amount));
  }
}else if($('#pf_include').prop('checked') == false && $('#esi_include').prop('checked') == true){
  gross = (parseFloat(ctc) - parseFloat(benefitAmount))*100/parseFloat(esi_percentage);
  special_amount = parseFloat(gross) - parseFloat(Earning);
  $('#adjustment_amount').val(Math.round(special_amount));
  $('#monthly_adjustment_amount').text(Math.round(special_amount/12));
  $('#total_adjustment_amount').text(Math.round(special_amount));
}else if($('#pf_include').prop('checked') == false && $('#esi_include').prop('checked') == false){
  gross = (parseFloat(ctc) - parseFloat(benefitAmount));
  special_amount = parseFloat(gross) - parseFloat(Earning);
  $('#adjustment_amount').val(Math.round(special_amount));
  $('#monthly_adjustment_amount').text(Math.round(special_amount/12));
  $('#total_adjustment_amount').text(Math.round(special_amount));
}


salarycalculation();


}

function Checknotpartofsalary() {
       var ids = [];
          $('input[name=not_part_of_ctc]:checked').each(function() {
            //  alert($(this).val());
               ids.push($(this).val());
            });
            //alert(ids);
           $("#not_part_ctc_component_id").val(ids);
          
    }
</script>
