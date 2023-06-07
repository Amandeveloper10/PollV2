 <form onsubmit="return myFunction('tenancy')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_tenancy').'/'.$id : base_url('admin_add_tenancy'); ?>" name="tenancy" id="tenancy" enctype="multipart/form-data" >

    <div class="row">
        <div class="col-sm-6 col-xl-6">
            <div class="form-group">
                <label for="" class="form-control-label">Type</label>
                 <select name="type" class="form-control " onchange="getTenType(this.value);" >
                    <option value="">Please select</option>
                    <option value="Office" <?php echo ((isset($data_single->type) && ($data_single->type=='Office')) ? 'selected' : ''); ?>>Office</option>
                    <option value="Camp" <?php echo ((isset($data_single->type) && ($data_single->type=='Camp')) ? 'selected' : ''); ?>>Camp</option>
                    <option value="Store" <?php echo ((isset($data_single->type) && ($data_single->type=='Store')) ? 'selected' : ''); ?>>Store</option>
                    <option value="Villa" <?php echo ((isset($data_single->type) && ($data_single->type=='Villa')) ? 'selected' : ''); ?>>Villa</option>
                    <option value="Apartment" <?php echo ((isset($data_single->type) && ($data_single->type=='Apartment')) ? 'selected' : ''); ?>>Apartment</option>
                    <option value="Studio" <?php echo ((isset($data_single->type) && ($data_single->type=='Studio')) ? 'selected' : ''); ?>>Studio</option>
                </select> 
            </div>
        </div>
        <div class="col-sm-6 col-xl-6">
            <div class="form-group">
                <label for="" class="form-control-label">Name</label>
                <input type="text" placeholder="Enter name" class="form-control" name="name" value="<?php echo (isset($data_single->name) ? $data_single->name : ''); ?>">
            </div>
        </div>

    </div>


    <div class="row campDiv" <?php if(isset($data_single->type) && $data_single->type=='Camp'){ ?> style="display: block;" <?php }else{ ?> style="display: none;" <?php } ?> >
    <div class="col-sm-6 col-xl-6">
            <div class="form-group">
                <label for="" class="form-control-label">Camp Details</label>
                <input type="text" placeholder="Enter Camp Details" class="form-control" name="camp_details" value="<?php echo (isset($data_single->camp_details) ? $data_single->camp_details : ''); ?>">
            </div>
        </div>

        <div class="col-sm-6 col-xl-6">
            <div class="form-group">
                <label for="" class="form-control-label">Labor Name</label>
                <input type="text" placeholder="Enter Labor Name" class="form-control" name="labor_name" value="<?php echo (isset($data_single->labor_name) ? $data_single->labor_name : ''); ?>">
            </div>
        </div>
    </div>

    <div class="row allDiv" <?php if(isset($data_single->type) && ($data_single->type!='Camp'&& $data_single->type!='Office' && $data_single->type!='Store') ){ ?> style="display: block;" <?php }else{ ?> style="display: none;" <?php } ?> >
    <div class="col-xl-12">
            <div class="form-group">
                <label for="" class="form-control-label">Details</label>
                <input type="text" placeholder="Enter Details" class="form-control" name="details" value="<?php echo (isset($data_single->details) ? $data_single->details : ''); ?>">
            </div>
        </div>        
    </div>

     <div class="row">
         <div class="col-md-12">
        <div class="form-group form-buttons">
             <button type="submit" name="submit" class="btn btn-success save-profile-btn">Save</button>
             <a href="javascript:void(0)" onclick="closeForm();" class="btn btn-outline-secondary ks-light btn-add-tenancy-contrcts-close">Close</a>
        </div>
    </div>
     </div>    

</form>