 <form onsubmit="return myFunction('vehicle_maintenance')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_vehicles_maintenance').'/'.$id : base_url('admin_add_vehicles_maintenance'); ?>" name="vehicle_maintenance" id="vehicle_maintenance" enctype="multipart/form-data" >

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
                <label for="" class="form-control-label">Date</label>
                <input type="text" placeholder="Select date" class="form-control flatpickrDate" name="maintenance_date" value="<?php echo (isset($data_single->maintenance_date) ? $data_single->maintenance_date : ''); ?>">
            </div>
        </div>
    
        <div class="col-sm-6 col-xl-4">
            <div class="form-group">
                <label for="" class="form-control-label">Expanses</label>
                <input type="text" placeholder="Enter expanses amount" class="form-control" name="expenses" value="<?php echo (isset($data_single->expenses) ? $data_single->expenses : ''); ?>">
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="form-group">
                <label for="" class="form-control-label">Details</label>
                <textarea placeholder="Enter details" class="form-control" name="details" > <?php echo (isset($data_single->details) ? $data_single->details : ''); ?> </textarea>
<!--                <input type="text" placeholder="Enter vehicle model" class="form-control" name="vehicle_model_year" value="<?php echo (isset($data_single->vehicle_model_year) ? $data_single->vehicle_model_year : ''); ?>">-->
            </div>
        </div>
        
        <div class="col-md-12">
        <div class="form-group form-buttons">
             <button type="submit" name="submit" class="btn btn-success save-profile-btn">Save</button>
            <a href="javascript:void(0)" onclick="closeForm();" class="btn btn-outline-secondary ks-light btn-add-tenancy-contrcts-close">Close</a>
        </div>
    </div>        
    </div>        

</form>
