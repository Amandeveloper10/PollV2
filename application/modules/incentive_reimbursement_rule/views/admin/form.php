<style>
    table tr td .form-group{margin: 0}
</style>
<form onsubmit="return myFunction('set_formula_form')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_add_incentive_reimbursement_rule').'/'.$id : base_url('admin_get_edit_form_set_formula'); ?>" name="set_formula_form" id="set_formula_form" enctype="multipart/form-data" >
    <div class="row">
     <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Incentive / Reimbursement</label>
            <select class="form-control"  name="incentive_reimbursement_id" required>
                <option value="">Select</option>
                  <?php
                  if (!empty($all_component_incentive_reimbursement)) {
                    foreach ($all_component_incentive_reimbursement as $incentive_reimbursement) {
                  ?>
                  <option value="<?php echo $incentive_reimbursement->id; ?>" <?php echo ((isset($data_single->incentive_reimbursement_id) && ($data_single->incentive_reimbursement_id==$incentive_reimbursement->id)) ? 'selected' : ''); ?>><?php echo $incentive_reimbursement->component; ?></option>
                  <?php } } ?>     
              </select>

        </div>
    </div>
</div>
    <!--2ndRow-->

<!--<table>-->

    <div class="row">
    <div class="col-12">
    <div class="card panel panel-table mb-3" data-dashboard-widget>
    <div class="card-block" data-widget-content>
    <table class="table table-bordered" width="100%">
    <thead>      
    <tr>
        <th width="60%">Component</th>
        <th>Operator</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>
                <select onchange="fortype(this.value)" id="component" name="component[]" class="form-control">
                    <option>Select</option>
                     <option value="gross_amount">Gross Amount</option>
                    <?php
                  if (!empty($all_component)) {
                    foreach ($all_component as $component) {
                        if($component->id=='3')
                        {
                  ?>
                  <option value="<?php echo $component->id; ?>" <?php echo ((isset($data_single->dept_id) && ($data_single->dept_id==$component->id)) ? 'selected' : ''); ?>><?php echo $component->component; ?></option>
                    <?php } } } ?>
                </select>            
          </td>
       
         <td> 
            <select id="operator" name="operator[]" class="form-control">
              <option>Select</option>
              <option value="+">+</option>
              <option value="-">-</option>
              <option value="*">*</option>
              <option value="/">/</option>
            </select>
         	</td>
    </tr>
    

   
  </tbody>
  <tbody class="repeat_sal_component"></tbody>  
</table>        
</div>
</div>
</div>
<div class="col-xl-12">
    <input type="hidden" name="experience_div" id="experience_div" value="<?php echo ((isset($data_single_exp) && (count($data_single_exp)) > 0) ? count($data_single_exp) : '1'); ?>">
    <input type="hidden" name="experience_div_type" id="experience_div_type" value="<?php echo ((isset($data_single_exp) && (count($data_single_exp)) > 0) ? count($data_single_exp) : '0'); ?>">
    <label id="addclone"><a href="javascript:void(0)" class="btn btn-secondary" onclick="get_div_experience();">Add</a></label>
</div>
</div>
<!--<table>-->
<div class="row">
    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Days</label>
            <select id="days_type" name="days_type" class="form-control" >
              <option>Select</option>
              <option value="No of OverTime Days">No of OverTime Days</option>
              <option value="No of Days">No of Days</option>
              <option value="No of Holidays">No of Holidays</option>
            </select>
        </div>
    </div>
     <div class="col-sm-6 col-xl-4">
        <div class="form-group" id="fixedAmount">
            <label>Fixed Amount</label>
            <input type="text" name="fixed_amount" id="fixed_amount" class="form-control" value="">
        </div>
    </div>
</div>
   
   <div class="row">
    <div class="col-md-12">
            <div class="form-group form-buttons">
                 <button type="submit" name="submit" id="submit" class="btn btn-success">Save</button>
                 <a href="javascript:;" class="btn btn-secondary" onclick="btnCloseForm();">Close</a>
            </div>
    </div>    
   </div>
</form>