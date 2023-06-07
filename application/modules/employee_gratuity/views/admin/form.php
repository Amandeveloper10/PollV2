<form onsubmit="return myFunction('designation_form')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_designation').'/'.$id : base_url('admin_add_designation'); ?>" name="designation_form" id="designation_form" enctype="multipart/form-data" >
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>Designation Name</label>
            <input required type="text" class="form-control" name="designation_name" value="<?php echo (isset($data_single->designation_name) ? $data_single->designation_name : ''); ?>">
        </div>
    </div>
    <div class="col-md-12">
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" rows="4" name="description"><?php echo (isset($data_single->description) ? $data_single->description : ''); ?></textarea>
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