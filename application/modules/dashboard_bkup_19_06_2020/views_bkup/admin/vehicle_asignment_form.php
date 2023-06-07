 <form onsubmit="return myFunction('vehicle_asignment')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_vehicles_asignment').'/'.$id : base_url('admin_add_vehicles_asignment'); ?>" name="vehicle_asignment" id="vehicle_asignment" enctype="multipart/form-data" >

<div class="card-block">
    <?php  
  //  echo '<pre>';
   // print_r($data_single);
 //   exit;
    ?>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="" class="form-control-label">Vehicle No.</label>
<!--                <input type="text" placeholder="Enter Vehicle No." class="form-control" name="vehicle_no" value="<?php echo (isset($data_single->vehicle_no) ? $data_single->vehicle_no : ''); ?>">-->

               <select name="vehicle_id" class="form-control " >
                    <option value="">Please select</option>
                    <?php
                    if(!empty($all_vehicles))
                    {
                    foreach ($all_vehicles as $value) {
                        
                   
                    ?>
                    <option value="<?php echo $value->id ?>" <?php echo ((!empty($data_single->vehicle_id) && ($value->id==$data_single->vehicle_id)) ? 'selected' : ''); ?>><?php echo $value->vehicle_no ?></option>
                  <?php
                    }
                    }
                    ?>
                </select> 
            </div>
        </div>
        
        <div class="col-sm-6">
            <div class="form-group">
                <label for="" class="form-control-label">Employee Name</label>
<!--                <input type="text" placeholder="Enter Vehicle No." class="form-control" name="vehicle_no" value="<?php echo (isset($data_single->vehicle_no) ? $data_single->vehicle_no : ''); ?>">-->

               <select name="employee_id" class="form-control " >
                    <option value="">Please select</option>
                    <?php
                    if(!empty($all_employee))
                    {
                    foreach ($all_employee as $value) {
                        
                   
                    ?>
                    <option value="<?php echo @$value->id ?>" <?php echo ((!empty($data_single->employe_id) && ($value->id==$data_single->employe_id)) ? 'selected' : ''); ?>><?php echo @$value->first_name.'' .@$value->middle_name.''.@$value->last_name; ?> (<?php echo @$value->employee_no; ?>)</option>
                  <?php
                    }
                    }
                    ?>
                </select> 
            </div>
        </div>
<!--        <div class="col-sm-6">
            <div class="form-group">
                <label for="" class="form-control-label">Employee Name</label>
                <input type="text" placeholder="Enter employee name" class="form-control" name="employee_id" value="<?php echo (isset($data_single->employe_id) ? $data_single->employe_id : ''); ?>">
            </div>
        </div>-->
    </div>
<!--    <div class="row mt-2">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="" class="form-control-label">Designation</label>
                <input type="text" placeholder="Enter expanses amount" class="form-control" name="designation" value="<?php echo (isset($data_single->designation) ? $data_single->designation : ''); ?>">
            </div>
        </div>
        
    </div>-->
     <div class="row">
    
        <div class="col-sm-6">
            <div class="form-group">
                <label for="" class="form-control-label">From Date</label>
                <input type="text" placeholder="Enter From Date" class="form-control flatpickrDate" name="from_date" value="<?php echo (isset($data_single->from_date) ? $data_single->from_date : ''); ?>">
            </div>
        </div>
        
    
    
        <div class="col-sm-6">
            <div class="form-group">
                <label for="" class="form-control-label">To Date</label>
                <input type="text" placeholder="Enter To Date" class="form-control flatpickrDate" name="to_date" value="<?php echo (isset($data_single->to_date) ? $data_single->to_date : ''); ?>">
            </div>
        </div>
        
    
  </div>  
    
</div>


<div class="card-footer">
    <div class="form-group mt-3">
        <button type="submit" name="submit" class="btn btn-success save-profile-btn">Save Details</button>
        <a  href="<?php echo base_url('page/59'); ?>"  class="pjaxCls btn btn-outline-secondary ks-light btn-add-tenancy-contrcts-close">Close</a>
    </div>
</div>
</form>
<script>
    $('.flatpickrDate').flatpickr();
    </script>
