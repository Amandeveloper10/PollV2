<form onsubmit="return myFunction('notice_form')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_notice').'/'.$id : base_url('admin_add_notice'); ?>" name="notice_form" id="notice_form" enctype="multipart/form-data" >
<div class="row">
    <div class="col-sm-6 col-xl-6">
        <div class="form-group">
             <label>Employee Name</label>
            <select class="form-control select2" multiple id="employee" name="employee[]" required>
			<option value="">Select</option>
			<?php
                  if (!empty($load_all_employee)) {
                    foreach ($load_all_employee as $each_employee) {
                        $employeeid=  explode(',', @$data_single->employee_id);
                  ?>
                  <option value="<?php echo $each_employee->id; ?>" <?php if (in_array(@$each_employee->id, $employeeid)) { echo 'selected';} ?>><?php echo $each_employee->first_name.' '.$each_employee->middle_name.' '.$each_employee->last_name; ?></option>
                  <?php } } ?>

            </select>
        </div>        
    </div>
    <div class="col-sm-6 col-xl-6">
        <div class="form-group">
            <label>Subject</label>
            <input required type="text" class="form-control" name="subject" maxlength="100" value="<?php echo (isset($data_single->subject) ? $data_single->subject : ''); ?>">
        </div>
    </div>
    <div class="col-sm-6 col-xl-12">
        <div class="form-group">
            <label>Content</label>
           <textarea required type="text" class="form-control" name="content"><?php echo (isset($data_single->content) ? $data_single->content : ''); ?></textarea>
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
<script>
 $('.select2').select2({
        width: '100%'
    });

</script>