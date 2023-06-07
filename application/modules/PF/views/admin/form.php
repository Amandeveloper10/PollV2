<form class="closeForm" onsubmit="return myFunction('pf')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_pf').'/'.$id : base_url('admin_add_pf'); ?>" name="pf" id="pf" enctype="multipart/form-data" >
<?php if(isset($data_single->id)){ ?>
<input type="hidden" class="form-control" name="id"  value="$data_single->id" ><?php } ?>
<div class="row">

 <div class="col-sm-6 col-xl-4">
      <div class="form-group">  
      <label for="" class="form-control-label">Account No.</label>                            
          <input placeholder="Employer PF Account no." type="text" class="form-control" id="employee_pf_account_no"  name="employee_pf_account_no" value="<?php echo (isset($data_single->employee_pf_account_no) ? $data_single->employee_pf_account_no : ''); ?>">
      </div>        
  </div>

    <div class="col-sm-6 col-xl-4">
      <div class="form-group">  
      <label for="" class="form-control-label">Employee PF %</label>                            
          <input placeholder="Employer PF %" type="text" class="form-control" id="employee_pf_percent"  name="employee_pf_percent" value="<?php echo (isset($data_single->employee_pf_percent) ? $data_single->employee_pf_percent : ''); ?>">
      </div>        
  </div>
   <div class="col-sm-6 col-xl-4">
      <div class="form-group">  
      <label for="" class="form-control-label">Employer PF %</label>                            
          <input placeholder="Employee PF %" type="text" class="form-control" id="employer_pf_percent"  name="employer_pf_percent" value="<?php echo (isset($data_single->employer_pf_percent) ? $data_single->employer_pf_percent : ''); ?>">
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