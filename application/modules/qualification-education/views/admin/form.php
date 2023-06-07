<form onsubmit="return myFunction('education_form')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_education').'/'.$id : base_url('admin_add_education'); ?>" name="education_form" id="education_form" enctype="multipart/form-data" >
<div class="row">
    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Level Name</label>
            <input required type="text" class="form-control" name="level_name" value="<?php echo (isset($data_single->level_name) ? $data_single->level_name : ''); ?>">
        </div>
    </div>
    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Is Mandatory *</label>
            <select class="form-control"  name="is_mandatory">
                <option value="Yes" <?php echo ((isset($data_single->is_mandatory) && ($data_single->is_mandatory=='Yes')) ? 'selected' : ''); ?>>Yes</option>
                <option value="No" <?php echo ((isset($data_single->is_mandatory) && ($data_single->is_mandatory=='No')) ? 'selected' : 'selected'); ?>>No</option>                                            
              </select>
        </div>
    </div>
    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Mandatory For Grade</label>
            <input type="text" class="form-control"  name="mandatory_grade" value="<?php echo (isset($data_single->mandatory_grade) ? $data_single->mandatory_grade : ''); ?>">
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