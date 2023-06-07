<form class="closeForm" onsubmit="return myFunction('wfh_form')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_wfh').'/'.$id : base_url('admin_add_wfh'); ?>" name="wfh_form" id="wfh_form" enctype="multipart/form-data" >
<div class="row">
  <div class="col-xl-12" >
        <div class="form-group">
          <label>Type</label></br>
          <label><input type="radio" name="check_type" onclick="getchecked('wfh');" <?php if(isset($data_single->type) && $data_single->type == 'wfh'){ echo 'checked';}?>>WFH</label>
           <label><input type="radio" name="check_type" onclick="getchecked('personal');" <?php if(isset($data_single->type) && $data_single->type == 'personal'){ echo 'checked';}?>>Timeoff(Personal)</small></label>
            <input type="hidden" name="checktype" id="checktype" value="<?php echo (isset($data_single->type) ? $data_single->type : ''); ?>">
        </div>
    </div>
	 <div class="col-sm-6 col-xl-6 divshow"  <?php if(isset($id) && $id != ''){ ?> style="display: block;" <?php }else{ ?> style="display: none;" <?php } ?>>
        <div class="form-group">
            <label>Grade</label>
            <select class="form-control select2" name="grade_id[]" id="grade_id" multiple="multiple" required>
                <option value="">Select</option>
                  <?php
                  if (!empty($all_grade)) {
                    foreach ($all_grade as $grade) {
                       $gradeID = explode(',', $data_single->grade_id);
                  ?>
                 
                  <option value="<?php echo $grade->id; ?>" <?php if(!empty($gradeID) && in_array($grade->id, $gradeID)){ echo 'selected'; }?> ><?php echo $grade->grade_name; ?></option>
                  <?php } } ?>     
              </select>

        </div>
    </div>
    <div class="col-sm-6 col-xl-6 divshow " <?php if(isset($id) && $id != ''){ ?> style="display: block;" <?php }else{ ?> style="display: none;" <?php } ?> >
    <div class="form-group">
        <label>Department</label>
        <select class="form-control select2" multiple="multiple" name="dept_id[]" id="dept_id" required>
            <option value="">Select</option>
              <?php
              if (!empty($all_dept)) {
                foreach ($all_dept as $department) {
               $deptID = explode(',', $data_single->dept_id);
              ?>
          
             <option value="<?php echo $department->id; ?>" <?php if(!empty($deptID) && in_array($department->id, $deptID)){ echo 'selected'; }?>><?php echo $department->department_name; ?></option>
              <?php } } ?>
          </select>

    </div>
    </div>
</div>

<div class="row" id="for_wfh" <?php if(isset($data_single->type) && ($data_single->type =='wfh')){ ?> style="" <?php }else{ ?> style="display: none;" <?php } ?>>

    <div class="col-sm-6 col-xl-6">
        <div class="form-group">
          <label>Enable Work From Home</label></br>
          <label><input type="radio" name="enable_chk" onclick="getval('all_employee');" <?php if(isset($data_single->grade_id) && $data_single->enanle_type == 'all_employee'){ echo 'checked';}?>> For All Employee</label><br>
           <label><input type="radio" name="enable_chk" onclick="getval('employee_enable_wfh');" <?php if(isset($data_single->grade_id) && $data_single->enanle_type == 'employee_enable_wfh'){ echo 'checked';}?>>Allows only employees who have WFH enable in their profile</small></label>
            <input type="hidden" name="enanle_type" id="enanle_type" value="<?php echo (isset($data_single->enanle_type) ? $data_single->enanle_type : ''); ?>">
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="form-group">
            <label>Maximum WFH Per Month</label>
            <input type="text" class="form-control" onkeyup="numeric(this)" maxlength="2" name="limit" value="<?php echo (isset($data_single->limit) ? $data_single->limit : ''); ?>">
        </div>
    </div>
     <div class="col-sm-6 col-xl-3">
        <div class="form-group">
            <div class="custom-control custom-checkbox mt-4">
                <input onchange="getDedLeave();" type="checkbox" class="custom-control-input" id="deduction_apply"  name="deduction_apply" value="Y" <?php echo ((isset($data_single->deduction_apply) && ($data_single->deduction_apply=='Y')) ? 'checked' : ''); ?>>
                <input type="hidden" id="deduction_apply1"  name="deduction_apply1" value="N">
                <label class="custom-control-label" for="deduction_apply">Deduction Apply</label>
              </div>            
        </div>        
    </div>

    <div class="col-md-12 deduDiv" <?php if(isset($data_single->deduction_apply) && ($data_single->deduction_apply =='Y')){ ?> style="display: block;" <?php }else{ ?> style="display: none;" <?php } ?>>
        <h5>Deduction of leave</h5>
    </div>

    <div class="col-sm-6 col-xl-4 deduDiv" <?php if(isset($data_single->deduction_apply) && ($data_single->deduction_apply =='Y')){ ?> style="display: block;" <?php }else{ ?> style="display: none;" <?php } ?>>
        <div class="form-group">
            <label>Leave Type</label>

             <select class="form-control select2"  name="leave_type[]" multiple="multiple">
            <option value="">Select</option>
              <?php
              if (!empty($all_leaverule)) {
                foreach ($all_leaverule as $leaverule) {
                  $leaveType=  explode(',', @$data_single->leave_type);
              ?>
              <option value="<?php echo $leaverule->id; ?>" <?php if (in_array(@$leaverule->id, $leaveType)) { echo 'selected';} ?> ><?php echo $leaverule->rule_name; ?></option>
              <?php } } ?>
          </select>
        </div>
    </div>

    <div class="col-sm-6 col-xl-4 deduDiv"  <?php if(isset($data_single->deduction_apply) && ($data_single->deduction_apply =='Y')){ ?> style="display: block;" <?php }else{ ?> style="display: none;" <?php } ?> >
        <div class="form-group">
            <label>Nos</label>
            <input type="text" class="form-control" id="nos" onkeyup="numeric(this)" maxlength="3" name="nos" value="<?php echo (isset($data_single->nos) ? $data_single->nos : ''); ?>">
        </div>        
    </div>
   
    <div class="col-md-12">
        <div class="form-group form-buttons">
             <button type="submit" name="submit" class="btn btn-success">Save</button>
             <a href="javascript:;" class="btn btn-secondary" onclick="btnCloseForm();">Close</a>
        </div>
    </div>
	</div>
	
	
	<div class="row" id="for_personal" <?php if(isset($data_single->type) && ($data_single->type =='personal')){ ?> style="" <?php }else{ ?> style="display: none;" <?php } ?>>

  
    <div class="col-sm-6 col-xl-3">
        <div class="form-group">
            <label>Maximum Timeoff(Personal) Per Month</label>
            <input required type="text" class="form-control" onkeyup="numeric(this)" maxlength="2" name="max_per_month"  id="max_per_month" value="<?php echo (isset($data_single->max_per_month) ? $data_single->max_per_month : ''); ?>">
        </div>
    </div>
      <div class="col-sm-6 col-xl-3">
        <div class="form-group">
            <label>Maximum Timeoff(Personal) hrs Per Month</label>
            <input required type="text" class="form-control" onkeyup="numeric(this)" maxlength="2" name="max_hrs_per_month" id="max_hrs_per_month" value="<?php echo (isset($data_single->max_hrs_per_month) ? $data_single->max_hrs_per_month : ''); ?>">
        </div>
    </div>
	
	<div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Maximum Timeoff(Personal) hrs to apply Per Day</label>
            <input required type="text" class="form-control" onkeyup="numeric(this)" maxlength="2" name="max_hrs_apply_per_day" id="max_hrs_apply_per_day" value="<?php echo (isset($data_single->max_hrs_apply_per_day) ? $data_single->max_hrs_apply_per_day : ''); ?>">
        </div>
    </div>

   
    <div class="col-md-12">
        <div class="form-group form-buttons">
             <button type="submit" name="submit" class="btn btn-success">Save</button>
             <a href="javascript:;" class="btn btn-secondary" onclick="btnCloseForm();">Close</a>
        </div>
    </div>
	</div>

</form>
<script type="text/javascript">
     $('.select2').select2({
    width: '100%'
})
function getval(value){
  $('#enanle_type').val(value);
}
function getchecked(val){
	if(val == 'wfh'){
		$('#for_wfh').show();
		$('#for_personal').hide();
		$('#checktype').val(val);
		$('.divshow').show();
		$("#limit").attr("required", "true");
		
		$("#max_per_month").attr("required", "false");
		$("#max_hrs_per_month").attr("required", "false");
		$("#max_hrs_apply_per_day").attr("required", "false");
		
	}else{
		$('#for_wfh').hide();
		$('#for_personal').show();
		$('#checktype').val(val);
		$('.divshow').show();
		$("#limit").attr("required", "false");
		$("#max_per_month").attr("required", "true");
		$("#max_hrs_per_month").attr("required", "true");
		$("#max_hrs_apply_per_day").attr("required", "true");
	
	}
	
}


 function getDedLeave() {
      var checkBoxes = $("input[name=deduction_apply]");
      if(checkBoxes.prop("checked") == true){
          $(".deduDiv").show();
          $("#deduction_apply1").val('Y');
      }
      else if(checkBoxes.prop("checked") == false){
          $(".deduDiv").hide();
          $("#deduction_apply1").val('N');
      }
    }
</script>