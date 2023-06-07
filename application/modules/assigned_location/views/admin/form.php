<?php $SysConfigauthenticaton = checkConfig1();?>
<form class="closeForm" onsubmit="return myFunction('assigned_location')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_assigned_location').'/'.$id : base_url('admin_add_assigned_location'); ?>" name="assigned_location" id="assigned_location" enctype="multipart/form-data" >
<div class="row">
    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Location Name</label>
            <select class="form-control" id="location_id" name="location_id" required="required" >
                    <?php
                     echo "<option value=''>Select Location</option>";



                    foreach ($all_Organization as $key => $each_Organization) {

                         if($data_single->organization_id==$each_Organization->id){
                            echo "<option value='".$each_Organization->id."' selected>".$each_Organization->company_name."</option>";
                        }else{
                             echo "<option value='".$each_Organization->id."'>".$each_Organization->company_name." </option>";
                        }
                        
                    }
                     ?>                                   
            </select>
              <span class="text-danger location_type_err" ></span>           
        </div>        
    </div>


    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
             <label>Employee Name</label>
            <select class="form-control js-example-basic-multiple" required="required" id="employee" name="employee">
                    <?php
                     echo "<option value=''>Select Employee</option>";



                    foreach ($load_all_employee as $key => $each_employee) {

                         if($data_single->employee_id==$each_employee->id){
                            echo "<option value='".$each_employee->id."' selected>".$each_employee->first_name." ".$each_employee->middle_name." ".$each_employee->last_name." </option>";
                        }else{
                             echo "<option value='".$each_employee->id."'>".$each_employee->first_name." ".$each_employee->middle_name." ".$each_employee->last_name." </option>";
                        }  
                        
                    }
                     ?>                                   
            </select>
        </div>        
    </div>
       <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Effective From</label>
            <input type="text" class="form-control mysingle_date" id="effective_start_date" required="required" name="effective_start_date" value="<?php echo (isset($data_single->effective_start_date) ? date($SysConfigauthenticaton->date_format,strtotime($data_single->effective_start_date)) : ''); ?>">
        </div>        
    </div>  
    <!-- <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Effective To</label>
            <input type="text" class="form-control mysingle_date"  id="effective_end_date" name="effective_end_date" value="<?php echo (isset($data_single->effective_end_date) ? $data_single->effective_end_date : ''); ?>">
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
 $('.select2').select2({
        width: '100%'
    });
</script>