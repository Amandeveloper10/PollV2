<form onsubmit="return myFunction('assigned_form')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_assigned_employee').'/'.$id : base_url('admin_add_assigned_employee'); ?>" name="assigned_form" id="assigned_form" enctype="multipart/form-data" >
<div class="row">
  <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Employee Name</label>
            <select class="form-control js-example-basic-multiple" id="employee" name="employee" required>
                    <?php
                     echo "<option value=''>Select Employee Name</option>";

                    foreach ($load_all_employee as $key => $each_employee) {

                         if($data_single->employee_id==$each_employee->id){
                            echo "<option value='".$each_employee->id."' selected>".$each_employee->first_name." ".$each_employee->middle_name." ".$each_employee->last_name." </option>";
                        }else{
                             echo "<option value='".$each_employee->id."'>".$each_employee->first_name." ".$each_employee->middle_name." ".$each_employee->last_name." </option>";
                        }
                    }
                     ?>                                   
            </select>
        </div>
    </div>
    <div class="col-sm-6 col-xl-4">
        <div class="form-group">            
            <label>Equipment Name</label>
            <select class="form-control js-example-basic-multiple" id="equipment" name="equipment" required>
                    <?php
                     echo "<option value=''>Select Equipment</option>";
                    foreach ($load_all_equipment as $key => $each_equipment) {
                         if($data_single->equipment_id==$each_equipment->id){
                            echo "<option value='".$each_equipment->id."' selected>".$each_equipment->equipment_name." (available-".($each_equipment->quantity-$each_equipment->assigned).")</option>";
                        }else{
                             echo "<option value='".$each_equipment->id."'>".$each_equipment->equipment_name." (available-".($each_equipment->quantity-$each_equipment->assigned).") </option>";
                        }
                    }
                     ?>                                   
            </select>
        </div>
    </div>

  

    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Quantity</label>
            <input required type="text" onkeyup="checkquantity(this.value);" onkeypress="ValidateNumberOnly();"  class="form-control" name="quantity" value="<?php echo (isset($data_single->quantity) ? $data_single->quantity: ''); ?>">
        </div>
		<span style="color: red;" id="grade_err"></span>
    </div>
        
    <div class="col-md-12">
        <div class="form-group form-buttons">
             <button type="submit" name="submit" class="btn btn-success" id="save">Save</button>
             <a href="javascript:;" class="btn btn-secondary" onclick="btnCloseForm();">Close</a>
        </div>
    </div>
</div> 

</form>

<script type="text/javascript">
    

	function ValidateNumberOnly()
	{
	if ((event.keyCode < 48 || event.keyCode > 57)) 
	{
	event.returnValue = false;
	}
	}
	
	 $('.select2').select2({
        width: '100%'
    });
	
	 function checkquantity(val){
        var equipment = $("#equipment").val().trim();
        //alert(rf_no);
        $("#grade_err").html('');
        $("#save").prop( "disabled", false );
        if(equipment!=''){
        $.post("<?php echo base_url('check_equipment'); ?>", {'equipment': equipment,'val':val}, function(result){
            console.log(result);
            if(result!='done'){
              $("#grade_err").html(result);
              $("#save").prop( "disabled", true );
            }
         
         
        });
        }
        }
	
	
</script>