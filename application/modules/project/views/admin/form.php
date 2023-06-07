 <form onsubmit="return myFunction('projects')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_project').'/'.$id : base_url('admin_add_project'); ?>" name="projects" id="projects" enctype="multipart/form-data" >
     
    <div class="row"> 
        <div class="col-lg-6">
            <div class="form-group">
                <label for="" class="form-control-label">Project Name</label>
                <input type="text" placeholder="Enter Project Name" class="form-control" name="project_name" value="<?php echo (isset($data_single->project_name) ? $data_single->project_name : ''); ?>">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="" class="form-control-label">Starting Date</label>
                <input type="text" placeholder="Select start date" class="form-control flatpickrDate" name="start_date" value="<?php echo (isset($data_single->start_date) ? $data_single->start_date : ''); ?>">
            </div>
        </div>
         <div class="col-lg-6">        
            <div class="form-group">
                <label for="" class="form-control-label">End Date</label>
                <input type="text" placeholder="Select end date" class="form-control flatpickrDate" name="end_date" value="<?php echo (isset($data_single->end_date) ? $data_single->end_date : ''); ?>">
            </div>
        </div>
         <div class="col-lg-6">
             <div class="ks-manage-avatar ks-group mt-2">
<!--                <img id="blah" class="ks-avatar" src="<?php echo base_url(); ?>assets/img/avatars/placeholders/ava-128.png" width="70" height="70">-->
                <?php if(isset($data_single->image) && $data_single->image!=''){ ?>
                          <a href="" data-toggle="modal" data-target="#projBigImage"><img id="blah" class="ks-avatar" src="<?php echo base_url(); ?>uploads/<?php echo (isset($data_single->image) && $data_single->image != '') ? $data_single->image : ''; ?>"  width="70" height="70"></a>
                   <?php }else{ ?>
                          <img id="blah" class="ks-avatar" src="<?php echo base_url(); ?>assets/img/images.png"  width="70" height="70">
                  <?php  } ?>
                <div class="ks-manage-avatar-body ml-3">
                    <div class="ks-manage-avatar-body-header">Project Image</div>                    
                    <div class="ks-manage-avatar-body-controls">
                        <label class="btn btn-primary ks-btn-file">
                            <span class="la la-cloud-upload ks-icon"></span>
                            <span class="ks-text">Select</span>
                            <input onchange="readURL(this,'projects')" type="file" name="image" id="image">
                        </label>
                        <input type="hidden" name="imagenew" id="imagenew" value="">        
                        <input type="hidden" name="imageold" value="<?php echo (isset($data_single->image) ? $data_single->image : ''); ?>">
                    </div>
                </div>
            </div>
             
             
             
             
             
<!--                  <div class="form-group">
                      <label>Project Image</label>
                      <input onchange="readURL(this,'projects')" type="file" name="image" id="image"
                             data-validation="mime size required"
                             data-validation-error-msg-required="No image selected" class="mb-2 d-block"><br>
                      
                   
                  </div>-->
             
             
              </div>
     
    <div class="col-lg-12">
            <div class="form-group">
                <label for="" class="form-control-label">Description</label>
                <textarea rows="6" placeholder="Enter Description" class="form-control" name="description"><?php echo (isset($data_single->description) ? $data_single->description : ''); ?></textarea>
            </div>
        </div>

        <div class="col-md-12">
        <div class="form-group form-buttons">
             <button type="submit" name="submit" class="btn btn-success save-profile-btn">Save</button>
              <a href="javascript:void(0)" onclick="closeForm();" class="btn btn-outline-secondary ks-light btn-add-tenancy-contrcts-close">Close</a>
        </div>
    </div>
        
    </div>
  
     
     
     <!-- The Modal -->
<div class="modal" id="projBigImage">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Project Image</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <img id="blah" class="img-fluid" src="<?php echo base_url(); ?>uploads/<?php echo (isset($data_single->image) && $data_single->image != '') ? $data_single->image : ''; ?>" >
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
     
     

</form>