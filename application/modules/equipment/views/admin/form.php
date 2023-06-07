<form onsubmit="return myFunction('equipment')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_equipment').'/'.$id : base_url('admin_add_equipment'); ?>" name="equipment" id="equipment" enctype="multipart/form-data" >
<div class="row">
    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Equipment Name</label>
            <input required type="text" class="form-control" name="equipment_name" value="<?php echo (isset($data_single->equipment_name) ? $data_single->equipment_name: ''); ?>">
        </div>
    </div>

    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Quantity</label>
            <input required type="text" class="form-control" name="quantity" value="<?php echo (isset($data_single->quantity) ? $data_single->quantity: ''); ?>">
        </div>
    </div>
    <div class="col-sm-6 col-xl-4">
        <!-- <div class="form-group">
            <label>Under</label>
            <select class="form-control" name="under">
                <option value="Primary" <?php echo ((isset($data_single->under) && ($data_single->under=='Primary')) ? 'selected' : ''); ?>>Primary</option>
                <option value="Secondary" <?php echo ((isset($data_single->under) && ($data_single->under=='Secondary')) ? 'selected' : ''); ?>>Secondary</option>                                            
              </select>
        </div> -->
    </div>
    
    <div class="col-md-12">
        <div class="form-group form-buttons">
             <button type="submit" name="submit" class="btn btn-success">Save</button>
             <a href="javascript:;" class="btn btn-secondary" onclick="btnCloseForm();">Close</a>
        </div>
    </div>
</div> 

</form>