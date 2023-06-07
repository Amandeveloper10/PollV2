<form onsubmit="return myFunction('designation_form')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_designation').'/'.$id : base_url('admin_add_designation'); ?>" name="designation_form" id="designation_form" enctype="multipart/form-data" >
<div class="row">
    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Designation Name</label>
            <input required type="text" onkeyup="checkdesignation('<?php echo (isset($data_single->id) ? $data_single->id : ''); ?>');" class="form-control" name="designation_name" id="designation_name" value="<?php echo (isset($data_single->designation_name) ? $data_single->designation_name : ''); ?>">
        </div>
         <span style="color: red;" id="desig_err"></span>
    </div>
    <div class="col-sm-6 col-xl-8">
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" rows="3" name="description"><?php echo (isset($data_single->description) ? $data_single->description : ''); ?></textarea>
            </div>
        </div>
    
    <div class="col-md-12">
        <div class="form-group form-buttons">
             <button type="submit" name="submit" class="btn btn-success" id="save">Save</button>
             <a href="javascript:;" class="btn btn-secondary" onclick="btnCloseForm();">Close</a>
        </div>
    </div>
</div>

</form>

<script>
      function checkdesignation(id){
        var designation_name = $("#designation_name").val().trim();
        //alert(rf_no);
        $("#desig_err").html('');
        $("#save").prop( "disabled", false );
        if(designation_name!=''){
        $.post("<?php echo base_url('check_designation'); ?>", {'designation_name': designation_name,'id':id}, function(result){
            //console.log(result);
            if(result!='done'){
              $("#desig_err").html(result);
              $("#save").prop( "disabled", true );
            }
         
         
        });
        }
        }
</script>