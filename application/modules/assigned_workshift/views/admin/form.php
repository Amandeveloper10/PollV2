
<form class="closeForm" onsubmit="return myFunction('assigned_work_shift')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_assigned_work_shift').'/'.$id : base_url('admin_add_assigned_work_shift'); ?>" name="assigned_work_shift" id="assigned_work_shift" enctype="multipart/form-data" >
<div class="row">
     <div class="col-sm-6 col-xl-6">
        <div class="form-group">
             <label>Employee Name</label>
            <select class="form-control js-example-basic-multiple " id="employee" name="employee" required>
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
            <select class="form-control js-example-basic-multiple" id="workshift_id" name="workshift_id[]" required>
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
           <input type="text" class="form-control mydate_range" name="startdate" value="<?php echo (isset($data_single->daterange) ? $data_single->daterange : ''); ?>" placeholder="Pick the multiple dates">
        </div>        
    </div> 

     <div class="col-sm-6 col-xl-4">
        <div class="form-group">
           
            <label>OFF Day</label>
           <select class="form-control select2" id="off_day" name="off_day">
                    <option value=''>Select Off Day</option>
                    <option value="Monday" <?php  if (isset($data_single->off_day) && $data_single->off_day == 'Monday'){ echo "Selected";} else { echo "";} ?> >Monday</option>     
                    <option value="Tuesday" <?php  if (isset($data_single->off_day) && $data_single->off_day == 'Tuesday'){ echo "Selected";} else { echo "";} ?> >Tuesday</option>  
                     <option value="Wednesday" <?php  if (isset($data_single->off_day) && $data_single->off_day == 'Wednesday'){ echo "Selected";} else { echo "";} ?> >Wednesday</option>  
                      <option value="Thursday" <?php  if (isset($data_single->off_day) && $data_single->off_day == 'Thursday'){ echo "Selected";} else { echo "";} ?> >Thursday</option>  
                       <option value="Friday" <?php  if (isset($data_single->off_day) && $data_single->off_day == 'Friday'){ echo "Selected";} else { echo "";} ?> >Friday</option> 
                        <option value="Saturday" <?php  if (isset($data_single->off_day) && $data_single->off_day == 'Saturday'){ echo "Selected";} else { echo "";} ?> >Saturday</option> 
                         <option value="Sunday" <?php  if (isset($data_single->off_day) && $data_single->off_day == 'Sunday'){ echo "Selected";} else { echo "";} ?> >Sunday</option>                        
            </select>
        </div>        
    </div>  
    <!--<div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>To Date</label>
            <input type="text" class="form-control"  id="end_date" name="end_date" value="<?php echo (isset($data_single->end_date) ? $data_single->end_date : ''); ?>">
        </div>        
    </div>-->
    

   


    <div class="col-md-12">
        <div class="form-group form-buttons">
             <button type="submit" name="submit" class="btn btn-success">Save</button>
             <a href="javascript:;" class="btn btn-secondary" onclick="btnCloseForm();">Close</a>
        </div>
    </div>    
    </div>
 

</form>
<script>
$('.js-example-basic-multiple').select2();
 
</script>
