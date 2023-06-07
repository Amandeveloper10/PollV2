<form class="closeForm" onsubmit="return myFunction('late_rules_form')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_late_rules').'/'.$id : base_url('admin_add_late_rules'); ?>" name="late_rules_form" id="late_rules_form" enctype="multipart/form-data" >
<div class="row">
    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Grade</label>
            <select class="form-control select2" multiple name="grade_id[]" required>
               
                  <?php
                  if (!empty($all_grade)) {
                    foreach ($all_grade as $grade) {
                        $gradeid=  explode(',', @$data_single->grade_id);
                  ?>
                  <option value="<?php echo $grade->id; ?>" <?php if (in_array(@$grade->id, $gradeid)) { echo 'selected';} ?>><?php echo $grade->grade_name; ?></option>
                  <?php } } ?>     
              </select>

        </div>
    </div>
    <div class="col-sm-6 col-xl-4">
    <div class="form-group">
        <label>Department</label>
        <select class="form-control select2"  name="dept_id[]" multiple required>
            
              <?php
              if (!empty($all_dept)) {
                foreach ($all_dept as $department) {
                    $deptId=  explode(',', @$data_single->dept_id);
              ?>
              <option value="<?php echo $department->id; ?>" <?php if (in_array(@$department->id, $deptId)) { echo 'selected';} ?> ><?php echo $department->department_name; ?></option>
              <?php } } ?>
          </select>

    </div>
    </div>
    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Rule name</label>
            <input required type="text" class="form-control" name="rule_name" value="<?php echo (isset($data_single->rule_name) ? $data_single->rule_name : ''); ?>">
        </div>
    </div>

     <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Occurence Type</label>
            <select class="form-control"  name="occurrence_type" required>
                <option value="First Occurence" <?php echo ((isset($data_single->occurrence_type) && ($data_single->occurrence_type=='First Occurence')) ? 'selected' : ''); ?>>First Occurence</option>
                 <option value="After First Occurence" <?php echo ((isset($data_single->occurrence_type) && ($data_single->occurrence_type=='After First Occurence')) ? 'selected' : ''); ?>>After First Occurence</option>
              </select>
        </div>
    </div>

    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>No. of occurrence allowed</label>
            <input type="text" class="form-control" onkeyup="numeric(this);"  required id="no_of_occu_allowed"  name="no_of_occu_allowed" value="<?php echo (isset($data_single->no_of_occu_allowed) ? $data_single->no_of_occu_allowed : ''); ?>">
        </div>        
    </div>

     <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Type</label>
            <select class="form-control"  name="type" required>
                <option value="Continuous" <?php echo ((isset($data_single->type) && ($data_single->type=='Continuous')) ? 'selected' : ''); ?>>Continuous</option>
                 <option value="Interval" <?php echo ((isset($data_single->type) && ($data_single->type=='Interval')) ? 'selected' : ''); ?>>Interval</option>
              </select>

        </div>
    </div>

    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Include</label>
            <select class="form-control select2" multiple  name="include[]">
                <?php  $includearr=  explode(',', @$data_single->include); ?>
                
                <option value="Holiday" <?php if (in_array('Holiday', $includearr)) { echo 'selected';} ?>>Holiday</option>
                <option value="Weekly off" <?php if (in_array('Weekly off', $includearr)) { echo 'selected';} ?>>Weekly off</option>
                <option value="Leave" <?php if (in_array('Leave', $includearr)) { echo 'selected';} ?>>Leave</option>
                <option value="Tour" <?php if (in_array('Tour', $includearr)) { echo 'selected';} ?>>Tour</option>
              </select>

        </div>
    </div>
   

    
    <div class="col-sm-6 col-xl-4 align-self-center">
        <div class="form-group">
            <div class="custom-control custom-checkbox mt-4">
                <input onchange="getDedLeave();" type="checkbox" class="custom-control-input" id="deduction_apply"  name="deduction_apply" value="Y" <?php echo ((isset($data_single->deduction_apply) && ($data_single->deduction_apply=='Y')) ? 'checked' : ''); ?>>
                <input type="hidden" id="deduction_apply1"  name="deduction_apply1" value="N">
                <label class="custom-control-label" for="deduction_apply">Deduction apply</label>
              </div>            
        </div>        
    </div>

    <div class="col-md-12 deduDiv" <?php if(isset($data_single->deduction_apply) && ($data_single->deduction_apply =='Y')){ ?> style="display: block;" <?php }else{ ?> style="display: none;" <?php } ?>>
        <h5>Deduction of leave</h5>
    </div>

    <div class="col-sm-6 col-xl-4 deduDiv" <?php if(isset($data_single->deduction_apply) && ($data_single->deduction_apply =='Y')){ ?> style="display: block;" <?php }else{ ?> style="display: none;" <?php } ?>>
        <div class="form-group">
            <label>Leave Type</label>

             <select class="form-control select2" id="leave_type"  name="leave_type[]" multiple="multiple">
           
              <?php
              if (!empty($all_leaverule)) {
                foreach ($all_leaverule as $leaverule) {
                  $leaveType=  explode(',', @$data_single->leave_type);
              ?>
              <option value="<?php echo $leaverule->id; ?>" <?php if (in_array(@$leaverule->id, $leaveType)) { echo 'selected';} ?> ><?php echo $leaverule->rule_name; ?></option>
              <?php } } ?>
          </select>
           <!-- <select class="form-control"  name="leave_type">
            <option value="">Select</option>
                <option value="Sick leave" <?php echo ((isset($data_single->leave_type) && ($data_single->leave_type=='Sick leave')) ? 'selected' : ''); ?>>Sick leave</option>
                <option value="Casual leave" <?php echo ((isset($data_single->leave_type) && ($data_single->leave_type=='Casual leave')) ? 'selected' : ''); ?>>Casual leave</option>
                <option value="Earned/Paid leave" <?php echo ((isset($data_single->leave_type) && ($data_single->leave_type=='Earned/Paid leave')) ? 'selected' : ''); ?>>Earned/Paid leave</option>
                <option value="Sectional/National leave" <?php echo ((isset($data_single->leave_type) && ($data_single->leave_type=='Sectional/National leave')) ? 'selected' : ''); ?>>Sectional/National leave</option>
                <option value="Maternity leave" <?php echo ((isset($data_single->leave_type) && ($data_single->leave_type=='Maternity leave')) ? 'selected' : ''); ?>>Maternity leave</option>
                <option value="Paternity leave" <?php echo ((isset($data_single->leave_type) && ($data_single->leave_type=='Paternity leave')) ? 'selected' : ''); ?>>Paternity leave</option>
                <option value="Transfer leave" <?php echo ((isset($data_single->leave_type) && ($data_single->leave_type=='Transfer leave')) ? 'selected' : ''); ?>>Transfer leave</option>
                <option value="Study/Sabbatical leave" <?php echo ((isset($data_single->leave_type) && ($data_single->leave_type=='Study/Sabbatical leave')) ? 'selected' : ''); ?>>Study/Sabbatical leave</option>
            </select>-->

        </div>
    </div>

    <div class="col-sm-6 col-xl-4 deduDiv"  <?php if(isset($data_single->deduction_apply) && ($data_single->deduction_apply =='Y')){ ?> style="display: block;" <?php }else{ ?> style="display: none;" <?php } ?> >
        <div class="form-group">
            <label>Nos</label>
            <input type="text" class="form-control" onkeyup="numeric(this)" id="nos"  name="nos" value="<?php echo (isset($data_single->nos) ? $data_single->nos : ''); ?>">
        </div>        
    </div>


    <div class="col-md-12">
        <div class="form-group form-buttons">
             <button type="submit" name="submit" class="btn btn-success">Save</button>
             <a href="javascript:;" class="btn btn-secondary" onclick="btnCloseForm();">Close</a>
        </div>
    </div></div>

</form>
<script type="text/javascript">
     $('.select2').select2({
    width: '100%'
})

$(document).ready(function() {
    $(".onlynumber").keydown(function(event) {
        // Allow only backspace and delete
        if ( event.keyCode == 46 || event.keyCode == 8 ) {
            // let it happen, don't do anything
        }
        else {
            // Ensure that it is a number and stop the keypress
            if (event.keyCode < 48 || event.keyCode > 57 ) {
                event.preventDefault(); 
            }   
        }
    });
});
</script>