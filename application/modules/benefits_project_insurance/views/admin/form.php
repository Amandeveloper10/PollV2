<form onsubmit="return myFunction('benefits_project_insurance')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_benefits_project_insurance').'/'.$id : base_url('admin_add_benefits_project_insurance'); ?>" name="benefits_project_insurance" id="benefits_project_insurance" enctype="multipart/form-data" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label>Name</label>
            <select class="form-control"  name="employee_id" required>
                <option value="">Select</option>
                  <?php
                  if (!empty($all_employee)) {
                    foreach ($all_employee as $employee) {
                  ?>
                  <option value="<?php echo $employee->id; ?>" <?php echo ((isset($data_single->employee_id) && ($data_single->employee_id==$employee->id)) ? 'selected' : ''); ?>><?php echo $employee->name; ?></option>
                  <?php } } ?>     
              </select>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label>Date</label>
            <input required type="text" class="form-control flatpickrDate" id="start_date"  name="start_date" value="<?php echo (isset($data_single->start_date) ? $data_single->start_date : ''); ?>">
        </div>        
    </div>
    <div class="col-md-1">
        <div class="form-group">
            <label></label>
            To
        </div>        
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label></label>
            <input required type="text" class="form-control flatpickrDate"  id="end_date" name="end_date" value="<?php echo (isset($data_single->end_date) ? $data_single->end_date : ''); ?>">
        </div>        
    </div>


    <div class="col-md-3">
        <div class="form-group">
            <label>Premium</label>
            <input required type="text" class="form-control" onkeypress="return isNumberKey(event,this.value)" name="premium" value="<?php echo (isset($data_single->premium) ? $data_single->premium : ''); ?>">
        </div>
    </div>
     


    <div class="col-md-12">
    <div class="form-group text-right">
         
         <button type="submit" name="submit" class="btn btn-dark">Save</button>
    </div>
    </div>
</div>
<hr>
</form>