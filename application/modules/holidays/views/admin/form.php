<?php $SysConfigauthenticaton = checkConfig1();?>
<form onsubmit="return myFunction('holidays_form')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_holidays').'/'.$id : base_url('admin_add_holidays'); ?>" name="holidays_form" id="holidays_form" enctype="multipart/form-data" >
<div class="row">
     <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Location Name</label>
            <select class="form-control select2" multiple id="location_id" name="location_id[]" required>
			 <option value="">Select</option>
                  <?php
                  if (!empty($load_all_organization)) {
                    foreach ($load_all_organization as $each_organization) {
						if(isset($id) && $id != ''){
						$location = $this->HolidaysModel->get_result_data('master_holidays_location', array('master_holiday_id' => $id, 'organization_id' => $each_organization->id));
						}
                        //$gradeid=  explode(',', @$data_single->grade_id);
                  ?>
                  <option value="<?php echo $each_organization->id; ?>" <?php if(!empty($location)){ echo 'selected'; } ?>><?php echo $each_organization->company_name; ?></option>
                  <?php } } ?>
                                                      
            </select>
              <span class="text-danger location_type_err" ></span>           
        </div>        
    </div>
    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Name</label>
            <input required type="text" class="form-control" name="holiday_name" value="<?php echo (isset($data_single->holiday_name) ? $data_single->holiday_name : ''); ?>">
        </div>
    </div>
    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Type</label>
            <select class="form-control"  name="holiday_type">
                <option value="Restricted" <?php echo ((isset($data_single->holiday_type) && ($data_single->holiday_type=='Restricted')) ? 'selected' : ''); ?>>Restricted</option>
                <option value="Regular" <?php echo ((isset($data_single->holiday_type) && ($data_single->holiday_type=='Regular')) ? 'selected' : 'selected'); ?>>Regular</option>                                            
              </select>

        </div>
    </div> 

    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>From Date</label>
            <input type="text" class="form-control mysingle_date" id="holiday_start_date"  name="holiday_start_date" value="<?php echo (isset($data_single->holiday_start_date) ? date($SysConfigauthenticaton->date_format,strtotime($data_single->holiday_start_date)) : ''); ?>">
        </div>        
    </div>   
    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>To Date</label>
            <input type="text" class="form-control mysingle_date"  id="holiday_end_date" name="holiday_end_date" value="<?php echo (isset($data_single->holiday_end_date) ? date($SysConfigauthenticaton->date_format,strtotime($data_single->holiday_end_date)) : ''); ?>">
        </div>        
    </div>
     
   

    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Full/Half</label>
            <select class="form-control"  name="holiday_off_type">
                <option value="Half Day" <?php echo ((isset($data_single->holiday_off_type) && ($data_single->holiday_off_type=='Half Day')) ? 'selected' : ''); ?>>Half Day</option>
                <option value="Full Day" <?php echo ((isset($data_single->holiday_off_type) && ($data_single->holiday_off_type=='Full Day')) ? 'selected' : 'selected'); ?>>Full Day</option>                                            
              </select>
        </div>
    </div>
    
    <div class="col-sm-6 col-xl-4">
        <label>Upload Image</label>
        <div class="image-uploader">            
        <img id="blah" class="img-fluid"  src="<?php if(!empty($data_single) && !empty($data_single->holiday_image)) { echo base_url(); ?>uploads/<?php echo $data_single->holiday_image; } else { echo base_url(); ?>assets/img/avatars/placeholders/ava-128.png <?php } ?>">
        <span class="btn btn-info btn-file"><i class="la la-edit"></i> 
            <input onchange="readURL(this,'holidays_form')" type="file" name="image" id="image" data-validation="mime size required" data-validation-allowing="jpg, png" data-validation-max-size="300kb" data-validation-error-msg-required="No image selected">
        </span>
        <input type="hidden" name="imagenew" id="imagenew" value="">
        <input type="hidden" name="imageold" value="<?php echo (isset($data_single->holiday_image) ? $data_single->holiday_image : ''); ?>">
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

<!-- The Modal -->
<div class="modal" id="picModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Holiday Picture</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <?php if(isset($data_single->holiday_image) && $data_single->holiday_image!=''){ ?>
                <img  class="img-fluid" src="<?php echo base_url(); ?>uploads/<?php echo (isset($data_single->holiday_image) && $data_single->holiday_image != '') ? $data_single->holiday_image : ''; ?>">
         <?php }else{ ?>
                <img class="img-fluid" src="<?php echo base_url(); ?>assets/img/images.png">
        <?php  } ?>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<script>
 $('.select2').select2({
    width: '100%'
})
</script>