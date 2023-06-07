 <form onsubmit="return myFunction('tenancy_contracts')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_tenancy_contracts').'/'.$id : base_url('admin_add_tenancy_contracts'); ?>" name="tenancy_contracts" id="tenancy_contracts" enctype="multipart/form-data" >
 <input type="hidden" name="tenancy_id" value="<?php echo (isset($tenancy_id) ? $tenancy_id : ''); ?>">
 
    <div class="row">
        <div class="col-sm-6 col-xl-4">
            <div class="form-group">
                <label for="" class="form-control-label">Contract No.</label>
                <input type="text" placeholder="Enter Contract No." class="form-control" name="contract_no" value="<?php echo (isset($data_single->contract_no) ? $data_single->contract_no : ''); ?>">                                
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="form-group">
                <label for="" class="form-control-label">Landlord Name</label>
                <input type="text" placeholder="Enter landlord name" class="form-control" name="landloard_name" value="<?php echo (isset($data_single->landloard_name) ? $data_single->landloard_name : ''); ?>">
            </div>
        </div>
    
        <div class="col-sm-6 col-xl-4">
            <div class="form-group">
                <label for="" class="form-control-label">Contract Amount (Yearly)</label>
                <input type="text" placeholder="Enter contract amount" class="form-control" name="contract_amount" value="<?php echo (isset($data_single->contract_amount) ? $data_single->contract_amount : ''); ?>">
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="form-group">
                <label for="" class="form-control-label">Security Deposit Amount</label>
                <input type="text" placeholder="Enter landlord name" class="form-control" name="security_deposite_amount" value="<?php echo (isset($data_single->security_deposite_amount) ? $data_single->security_deposite_amount : ''); ?>">
            </div>
        </div>
    
        <div class="col-sm-6 col-xl-3">
            <div class="form-group">
                <label for="" class="form-control-label">No. of Rooms</label>
                <input type="text" placeholder="Enter no. of rooms" class="form-control" name="no_of_rooms" value="<?php echo (isset($data_single->no_of_rooms) ? $data_single->no_of_rooms : ''); ?>">
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="form-group">
                <label for="" class="form-control-label">Start Date</label>
                <input type="text" placeholder="Select date" class="form-control flatpickrDate" name="start_date" value="<?php echo (isset($data_single->start_date) ? $data_single->start_date : ''); ?>">
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="form-group">
                <label for="" class="form-control-label">Expiry Date</label>
                <input type="text" placeholder="Select date" class="form-control flatpickrDate" name="expiry_date" value="<?php echo (isset($data_single->expiry_date) ? $data_single->expiry_date : ''); ?>">
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