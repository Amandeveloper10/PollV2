<form class="closeForm" onsubmit="return myFunction('skill_form')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_skill').'/'.$id : base_url('admin_add_skill'); ?>" name="skill_form" id="skill_form" enctype="multipart/form-data" >
    <div class="row">
        <div class="col-sm-6 col-xl-4">
            <div class="form-group">
                <label>Skill Name *</label>
                <input required type="text" class="form-control" name="skill_name" value="<?php echo (isset($data_single->skill_name) ? $data_single->skill_name : ''); ?>">                                               
            </div>
        </div>
        <div class="col-sm-12 col-xl-12">
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