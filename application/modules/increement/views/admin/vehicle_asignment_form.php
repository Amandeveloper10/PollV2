<div class="ks-nav-body" style="padding:20px;">
<form onsubmit="return myFunction('vehicle_asignment')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_vehicles_asignment').'/'.$id : base_url('admin_add_vehicles_asignment'); ?>" name="vehicle_asignment" id="vehicle_asignment" enctype="multipart/form-data" >


    <?php  
  //  echo '<pre>';
   // print_r($data_single);
 //   exit;
    ?>
    <div class="row">
        <div class="col-sm-6 col-xl-4">
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
        
        <div class="col-sm-6 col-xl-4">
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
    
        <div class="col-sm-6 col-xl-4">
            <div class="form-group">
                <label for="" class="form-control-label">From Date</label>
                <input type="text" placeholder="Enter From Date" class="form-control flatpickrDate" name="from_date" value="<?php echo (isset($data_single->from_date) ? $data_single->from_date : ''); ?>">
            </div>
        </div>
        
    
    
        <div class="col-sm-6 col-xl-4">
            <div class="form-group">
                <label for="" class="form-control-label">To Date</label>
                <input type="text" placeholder="Enter To Date" class="form-control flatpickrDate" name="to_date" value="<?php echo (isset($data_single->to_date) ? $data_single->to_date : ''); ?>">
            </div>
        </div>
        
<div class="col-md-12">
        <div class="form-group form-buttons">
             <button type="submit" name="submit" class="btn btn-success save-profile-btn">Save</button>
        <a  href="<?php echo base_url('page/59'); ?>"  class="pjaxCls btn btn-outline-secondary ks-light btn-add-tenancy-contrcts-close">Close</a>
        </div>
    </div>
        
    
  </div>  
    
</form>
<script>
    $('.flatpickrDate').flatpickr();
    </script>
</div>