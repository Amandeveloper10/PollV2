<form class="closeForm" onsubmit="return myFunction('state_add')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_state_add').'/'.$id : base_url('admin_add_state_add'); ?>" name="state_add" id="state_add" enctype="multipart/form-data" >
<?php if(isset($data_single->id)){ ?>
<input type="hidden" class="form-control" name="id"  value="$data_single->id" ><?php } ?>
<div class="row">
    <div class="col-sm-6 col-xl-4">
      <div class="form-group">  
      <label for="" class="form-control-label">State Name</label>                            
          <input placeholder="State Name" type="text" class="form-control" id="name"  name="name" value="<?php echo (isset($data_single->name) ? $data_single->name : ''); ?>">
      </div>        
  </div>
</div>


 
   
    
   




<div class="col-md-12">
        <div class="form-group form-buttons">
             <button type="submit" name="submit" class="btn btn-success">Save</button>
             <a href="javascript:;" class="btn btn-secondary" onclick="btnCloseForm();">Close</a>
        </div>
    </div>   


</form>