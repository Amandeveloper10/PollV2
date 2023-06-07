<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

<form class="closeForm" onsubmit="return myFunction('assigned_work_shift')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_assigned_work_shift').'/'.$id : base_url('admin_add_assigned_work_shift'); ?>" name="assigned_work_shift" id="assigned_work_shift" enctype="multipart/form-data" >
<div class="row">
     <div class="col-sm-6 col-xl-6">
        <div class="form-group">
             <label>Employee Name</label>
            <select class="form-control select2 " id="employee" name="employee">
                    <?php
                     echo "<option value=''>Select Employee</option>";



                    foreach ($load_all_employee as $key => $each_employee) {

                         if($data_single->employee_id==$each_employee->id){
                            echo "<option value='".$each_employee->id."' selected>".$each_employee->first_name." ".$each_employee->middle_name." ".$each_employee->last_name." (".$each_employee->employee_no.")"." </option>";
                        }else{
                             echo "<option value='".$each_employee->id."'>".$each_employee->first_name." ".$each_employee->middle_name." ".$each_employee->last_name." (".$each_employee->employee_no.")"." </option>";
                        }  
                        
                    }
                     ?>                                   
            </select>
        </div>        
    </div>
    <div class="col-sm-6 col-xl-6">
        <div class="form-group">
            <label>Work Shift Name</label>
            <select class="form-control select2" id="workshift_id" name="workshift_id[]">
                    <?php
                     echo "<option value=''>Select Work Shift</option>";



                    foreach ($load_all_workshift as $key => $each_workshift) { 
                        $workshiftArr = explode(",",$data_single->work_shift_id);
                        ?>
                        
                        <option value="<? echo $each_workshift->id?>" <?php  if (in_array($each_workshift->id, $workshiftArr)){ echo "Selected";} else { echo "";} ?>><?php echo $each_workshift->work_shift_name?></option>";
                       
                        
                    <?php }
                     ?>                                   
            </select>
              <span class="text-danger location_type_err" ></span>           
        </div>        
    </div>


    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>From Date</label>
            <input type="text" class="form-control flatpickrDate" id="start_date"  name="start_date" value="<?php echo (isset($data_single->start_date) ? $data_single->start_date : ''); ?>">
        </div>        
    </div>   
    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>To Date</label>
            <input type="text" class="form-control flatpickrDate"  id="end_date" name="end_date" value="<?php echo (isset($data_single->end_date) ? $data_single->end_date : ''); ?>">
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
    $('.flatpickrDate').flatpickr();

    $('.select2').select2({
    width: '100%'
})
</script>

