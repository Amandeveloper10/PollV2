<form class="closeForm" onsubmit="return myFunction('attendance_rules_form')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_attendance_rules').'/'.$id : base_url('admin_add_attendance_rules'); ?>" name="attendance_rules_form" id="attendance_rules_form" enctype="multipart/form-data" >

    <div class="row">
       <!-- <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Grade</label>
                 <select id="grade" name="grade" class="form-control" onchange="checkGradeAttRule('<?php echo (isset($data_single->id) ? $data_single->id : ''); ?>');">
                    <option>Select</option>
                    <?php
                  if (!empty($all_grade)) {
                    foreach ($all_grade as $grade) {
                  ?>
                  <option value="<?php echo $grade->id; ?>" <?php echo ((isset($data_single->grade) && ($data_single->grade==$grade->id)) ? 'selected' : ''); ?>><?php echo $grade->grade_name; ?></option>
                  <?php } } ?>
                </select>
        </div>
        <span style="color: red;" id="grade_err"></span>
    </div>-->

    <div class="col-sm-6 col-xl-6">
        <div class="form-group">
            <label>Work Shift</label>
                 <select id="work_shift_id" required name="work_shift_id" class="form-control" onchange="checkGradeAttRule('<?php echo (isset($data_single->id) ? $data_single->id : ''); ?>');">
                    <option value="">Select</option>
                    <?php
                  if (!empty($all_work_shift)) {
                    foreach ($all_work_shift as $work_shift) {
                  ?>
                  <option value="<?php echo $work_shift->id; ?>" <?php echo ((isset($data_single->work_shift_id) && ($data_single->work_shift_id==$work_shift->id)) ? 'selected' : ''); ?>><?php echo $work_shift->work_shift_name; ?></option>
                  <?php } } ?>
                </select>
        </div>
        <span style="color: red;" id="grade_err"></span>
    </div>

      <div class="col-sm-6 col-xl-6">
        <div class="form-group">
            <label>Day Type</label>
                 <select id="day_type" name="day_type" required class="form-control" onchange="checkGradeAttRule('<?php echo (isset($data_single->id) ? $data_single->id : ''); ?>');">
                    <option value="">Select</option>
                    <option value="Full" <?php echo ((isset($data_single->day_type) && ($data_single->day_type=='Full')) ? 'selected' : ''); ?>>Full Working Days(Rule 1)</option>
                    <option value="Half" <?php echo ((isset($data_single->day_type) && ($data_single->day_type=='Half')) ? 'selected' : ''); ?>>Half Working Days(Rule 2)</option>
                </select>
        </div>
        <span style="color: red;" id="grade_err"></span>
    </div>

    <div class="col-sm-6 col-xl-6 halfdiv">
        <div class="form-group">
            <label>Leave type for deducting half day</label>
          <select class="form-control select2" required  name="leave_type_half[]" multiple="multiple">
            <option value="">Select</option>
              <?php
              if (!empty($all_leaverule)) {
                foreach ($all_leaverule as $leaverule) {
                  $leaveTypeHalf=  explode(',', @$data_single->leave_type_half);
              ?>
              <option value="<?php echo $leaverule->id; ?>" <?php if (in_array(@$leaverule->id, $leaveTypeHalf)) { echo 'selected';} ?> ><?php echo $leaverule->rule_name; ?></option>
              <?php } } ?>
          </select>
        </div>
    </div>

    <div class="col-sm-6 col-xl-6 halfdiv">
        <div class="form-group">
            <label>No of leave deduction for half Day</label>
            <input type="text" class="form-control" required id="nos_half" onkeyup="numeric(this);" maxlength="3" name="nos_half" value="<?php echo (isset($data_single->nos_half) ? $data_single->nos_half : ''); ?>">
        </div>        
    </div>

      <div class="col-sm-6 col-xl-6">
        <div class="form-group">
            <label>Leave type for deducting absent</label>
          <select class="form-control select2" required name="leave_type[]" multiple="multiple">
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

    <div class="col-sm-6 col-xl-6">
        <div class="form-group">
            <label>No of leave deduction for absent</label>
            <input type="text" class="form-control" required id="nos" onkeyup="numeric(this);" maxlength="3" name="nos" value="<?php echo (isset($data_single->nos) ? $data_single->nos : ''); ?>">
        </div>        
    </div>


    <div class="col-sm-6 col-xl-4">
      <div class="form-group">
          <label>Minimum Hrs for half day</label>
          <input required type="text" class="form-control mytime_picker" name="min_hrs_for_half_day" value="<?php echo (isset($data_single->min_hrs_for_half_day) ? $data_single->min_hrs_for_half_day : ''); ?>"><span class="text-danger d-block">HH : MM</span>
      </div>
  </div>
     <div class="col-sm-6 col-xl-4">
      <div class="form-group">
          <label>Minimum Hrs for Full day</label>
          <input required type="text" class="form-control mytime_picker" name="min_hrs_for_full_day" value="<?php echo (isset($data_single->min_hrs_for_full_day) ? $data_single->min_hrs_for_full_day : ''); ?>"><span class="text-danger d-block">HH : MM</span>
      </div>
  </div>
  <div class="col-sm-6 col-xl-4">
      <div class="form-group">
          <label>Incomplete present for less then</label>
          <input type="text" class="form-control mytime_picker" required name="incomplete_present_for_less_then" value="<?php echo (isset($data_single->incomplete_present_for_less_then) ? $data_single->incomplete_present_for_less_then : ''); ?>"><span class="text-danger d-block">HH : MM</span>
      </div>        
  </div> 

  <div class="col-sm-6 col-xl-4">
      <div class="form-group">
          <label>Over Time After Hour</label>
          <input type="text" class="form-control mytime_picker" required name="over_time_after_hour" value="<?php echo (isset($data_single->over_time_after_hour) ? $data_single->over_time_after_hour : ''); ?>"><span class="text-danger d-block">HH : MM</span>
      </div>        
  </div>                      

  
  <div class="col-md-12">
        <div class="form-group form-buttons">
             <button type="submit" name="submit" id="submitatt" class="btn btn-success">Save</button>
             <a href="javascript:;" class="btn btn-secondary" onclick="btnCloseForm();">Close</a>
        </div>
    </div>
  
</div>

</form>

<script type="text/javascript">
     $('.select2').select2({
    width: '100%'
})


/*function getvalue(val){
if(val == 'Half'){
  $('.halfdiv').show();
}else{
   $('.halfdiv').hide();
}
}*/
</script>
