<form class="closeForm" onsubmit="return myFunction('esi')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_esi').'/'.$id : base_url('admin_add_esi'); ?>" name="esi" id="esi" enctype="multipart/form-data" >
<?php if(isset($data_single->id)){ ?>
<input type="hidden" class="form-control" name="id"  value="$data_single->id" ><?php } ?>
<div class="row">

 <div class="col-sm-6 col-xl-4">
      <div class="form-group">  
      <label for="" class="form-control-label">Account No.</label>                            
          <input placeholder="Employer ESI Account no." type="text" class="form-control" id="employee_esi_account_no"  name="employee_esi_account_no" value="<?php echo (isset($data_single->employee_esi_account_no) ? $data_single->employee_esi_account_no : ''); ?>">
      </div>        
  </div>

    <div class="col-sm-6 col-xl-4">
      <div class="form-group">  
      <label for="" class="form-control-label">Employee ESI %</label>                            
          <input placeholder="Employer ESI %" type="text" class="form-control" id="employee_esi_percent"  name="employee_esi_percent" value="<?php echo (isset($data_single->employee_esi_percent) ? $data_single->employee_esi_percent : ''); ?>">
      </div>        
  </div>
   <div class="col-sm-6 col-xl-4">
      <div class="form-group">  
      <label for="" class="form-control-label">Employer ESI %</label>                            
          <input placeholder="Employee ESI %" type="text" class="form-control" id="employer_esi_percent"  name="employer_esi_percent" value="<?php echo (isset($data_single->employer_esi_percent) ? $data_single->employer_esi_percent : ''); ?>">
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