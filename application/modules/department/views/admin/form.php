<form onsubmit="return myFunction('department_form')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_department').'/'.$id : base_url('admin_add_department'); ?>" name="department_form" id="department_form" enctype="multipart/form-data" >
<div class="row">
    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Department Name</label>
            <input required type="text" class="form-control" name="department_name" id="department_name" onkeyup="checkdepatment('<?php echo (isset($data_single->id) ? $data_single->id : ''); ?>');" value="<?php echo (isset($data_single->department_name) ? $data_single->department_name : ''); ?>">
        </div>
        <span style="color: red;" id="dept_err"></span>
    </div>
    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Under</label>
            <select class="form-control" name="under">
                <option value="0" <?php echo ((isset($data_single->under) && ($data_single->under=='0')) ? 'selected' : ''); ?>>Primary</option>
				<?php if(!empty($all_deparment)){ 
				foreach($all_deparment as $dept) { ?>
                <option value="<?=$dept->id?>" <?php echo ((isset($data_single->under) && ($data_single->under==$dept->id)) ? 'selected' : ''); ?>><?=$dept->department_name?></option>  
				<?php } } ?>				
              </select>
        </div>
    </div>
	
	<div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Overtime</label>
            <select class="form-control js-example-basic-multiple" id="overtime_id" name="overtime_id">
                    <?php
                     echo "<option value=''>Select Overtime</option>";

                    foreach ($load_all_overtime as $key => $each_overtime) {

                         if($data_single->overtime_id==$each_overtime->id){
                            echo "<option value='".$each_overtime->id."' selected>".$each_overtime->overtime_name." </option>";
                        }else{
                             echo "<option value='".$each_overtime->id."'>".$each_overtime->overtime_name." </option>";
                        }
                    }
                     ?>                                   
            </select>
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
      function checkdepatment(id){
        var department_name = $("#department_name").val().trim();
        //alert(rf_no);
        $("#dept_err").html('');
        $("#save").prop( "disabled", false );
        if(department_name!=''){
        $.post("<?php echo base_url('check_dept'); ?>", {'department_name': department_name,'id':id}, function(result){
            //console.log(result);
            if(result!='done'){
              $("#dept_err").html(result);
              $("#save").prop( "disabled", true );
            }
         
         
        });
        }
        }
		
	
</script>
