<form class="closeForm" onsubmit="return myFunction('setting_organization_bank_details')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_setting_organization_bank_details').'/'.$id : base_url('admin_add_setting_organization_bank_details'); ?>" name="setting_organization_bank_details" id="setting_organization_bank_details" enctype="multipart/form-data" >

<input type="hidden" class="form-control" name="org_id" value="1">

<div class="row">
    <div class="col-sm-6 col-xl-4">
      <div class="form-group">                              
          <input placeholder="Bank Name" type="text" class="form-control" id="bank_name"  name="bank_name" value="<?php echo (isset($data_single->bank_name) ? $data_single->bank_name : ''); ?>">
      </div>        
  </div>

  <div class="col-sm-6 col-xl-4">
      <div class="form-group">                              
          <input placeholder="Branch" type="text" class="form-control" id="branch"  name="branch" value="<?php echo (isset($data_single->branch) ? $data_single->branch : ''); ?>">
      </div>        
  </div>
    

  <div class="col-sm-6 col-xl-4">
      <div class="form-group">                              
          <input placeholder="IFSC Code" type="text" class="form-control" id="ifsc_code"  name="ifsc_code" value="<?php echo (isset($data_single->ifsc_code) ? $data_single->ifsc_code : ''); ?>">
      </div>        
  </div>

    
    <div class="col-lg-8">
        <div class="row">
            <div class="col-3">
                <div class="form-group">                              
        <input placeholder="Apt. No" type="text" class="form-control" id="apt_no"  name="apt_no" value="<?php echo (isset($data_single->apt_no) ? $data_single->apt_no : ''); ?>">
    </div>        
            </div>
            <div class="col-9">
                <div class="form-group">                              
        <input placeholder="Building / Road Name" type="text" class="form-control" id="building_name"  name="building_name" value="<?php echo (isset($data_single->building_name) ? $data_single->building_name : ''); ?>">
    </div>        
            </div>
        </div>
    </div>
    
   
   <div class="col-sm-6 col-xl-4">
      <div class="form-group">                              
          <input placeholder="Country" type="text" class="form-control" id="country"  name="country" value="<?php echo (isset($data_single->country) ? $data_single->country : ''); ?>">
      </div>        
  </div>


   <div class="col-sm-6 col-xl-4">
      <div class="form-group">                              
          <input placeholder="City" type="text" class="form-control" id="city"  name="city" value="<?php echo (isset($data_single->city) ? $data_single->city : ''); ?>">
      </div>        
  </div>

   <div class="col-sm-6 col-xl-4">
      <div class="form-group">                              
          <input placeholder="State" type="text" class="form-control" id="state"  name="state" value="<?php echo (isset($data_single->state) ? $data_single->state : ''); ?>">
      </div>        
  </div>

  <div class="col-sm-6 col-xl-4">
      <div class="form-group">                              
          <input placeholder="Zip" type="text" class="form-control" id="zip"  name="zip" value="<?php echo (isset($data_single->zip) ? $data_single->zip : ''); ?>">
      </div>        
  </div>

  <div class="col-sm-6 col-xl-4">
      <div class="form-group">                              
          <input placeholder="Telephone" type="text" class="form-control" id="telephone"  name="telephone" value="<?php echo (isset($data_single->telephone) ? $data_single->telephone : ''); ?>">
      </div>        
  </div>

   <div class="col-sm-6 col-xl-4">
      <div class="form-group">                              
          <input placeholder="Mobile" type="text" class="form-control" id="mobile"  name="mobile" value="<?php echo (isset($data_single->mobile) ? $data_single->mobile : ''); ?>">
      </div>        
  </div>

  <div class="col-sm-6 col-xl-4">
      <div class="form-group">                              
          <input placeholder="Email" type="email" class="form-control" id="email"  name="email" value="<?php echo (isset($data_single->email) ? $data_single->email : ''); ?>">
      </div>        
  </div>


   <div class="col-sm-6 col-xl-4">
      <div class="form-group">                              
          <input placeholder="Account Type" type="text" class="form-control" id="acc_type"  name="acc_type" value="<?php echo (isset($data_single->acc_type) ? $data_single->acc_type : ''); ?>">
      </div>        
  </div>

  <div class="col-sm-6 col-xl-4">
      <div class="form-group">                              
          <input placeholder="Account No" type="text" class="form-control" id="acc_no"  name="acc_no" value="<?php echo (isset($data_single->acc_no) ? $data_single->acc_no : ''); ?>">
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