
 <form closeForm onsubmit="return validation() ;" method="post" action="<?php echo (isset($increement_details[0]->id) && $increement_details[0]->id != '') ? base_url('admin_edit_increement').'/'.$increement_details[0]->id : base_url('admin_add_increement'); ?>" name="increement" id="increement" enctype="multipart/form-data" >

    <div class="row">
        <div class="col-sm-6 col-xl-6">
            <div class="form-group">
	            <label>Employee Name</label>
	            <select class="form-control" id="employee" name="employee">
	                <?php
	                 echo "<option value=''>Select Employee</option>";
	                foreach ($load_all_employee as $key => $each_employee) {
                          if($increement_details[0]->employee_id==$each_employee->id){
                            echo "<option value='".$each_employee->id."' selected>".$each_employee->first_name." ".$each_employee->middle_name." ".$each_employee->last_name." (".$each_employee->employee_no.") </option>";
                        }else{
                            echo "<option value='".$each_employee->id."'>".$each_employee->first_name." ".$each_employee->middle_name." ".$each_employee->last_name." (".$each_employee->employee_no.") </option>";
                        }
	                	
	                }
	                 ?>                                   
              </select>
            </div>
        </div>
        <div class="col-sm-6 col-xl-6">
            <div class="form-group">
                

                <label class="d-block">Increement Mode </label>
                <input type="hidden" name="increement_type" id="increement_type" value="<?php echo (isset($increement_details[0]->type) ? $increement_details[0]->type : ''); ?>">
                <?php
                 if(isset($percentage)){
                ?>
                    <div class="d-inline-block mt-2">
                    <div class="custom-control custom-radio ks-radio ks-primary">
                        <input id="r1"  type="radio" class="custom-control-input increement_mode" value="Fixed" name="increement_mode" data-validation="radio_group" data-validation-qty="min1" >
                        <label class="custom-control-label" for="r1">Fixed</label>
                    </div>
                </div>
                <div class="d-inline-block mt-2 ml-3">
                    <div class="custom-control custom-radio ks-radio ks-primary">
                        <input id="r2" type="radio" class="custom-control-input increement_mode" value="Percentage" name="increement_mode" data-validation="radio_group" data-validation-qty="min1" checked="">
                        <label class="custom-control-label" for="r2">Percentage(%)</label>
                    </div>
                </div>

                <?php
                 }else{
                 ?>
                <div class="d-inline-block mt-2">
                    <div class="custom-control custom-radio ks-radio ks-primary">
                        <input id="r1"  type="radio" class="custom-control-input increement_mode" value="Fixed" name="increement_mode" data-validation="radio_group" data-validation-qty="min1" checked="">
                        <label class="custom-control-label" for="r1">Fixed</label>
                    </div>
                </div>
                <div class="d-inline-block mt-2 ml-3">
                    <div class="custom-control custom-radio ks-radio ks-primary">
                        <input id="r2" type="radio" class="custom-control-input increement_mode" value="Percentage" name="increement_mode" data-validation="radio_group" data-validation-qty="min1">
                        <label class="custom-control-label" for="r2">Percentage(%)</label>
                    </div>
                </div>
                 <?php } ?>
            </div>
        </div>
        <?php
         if(isset($percentage)){
        ?>

        <div class="col-sm-6 col-xl-6" id="enter_amount" style="display: none;" >
            <div class="form-group">
                <label for="" class="form-control-label">Amount</label>
                <input type="text" placeholder="Enter Amount" class="form-control" id="fixed_amount" name="fixed_amount" value="">
            </div>
        </div>
      <div class="row" >
        <div class="col-sm-6 col-xl-6" id="percentage" >
            <div class="form-group">
                <label for="" class="form-control-label">Percentage(%)</label>
                <input type="text" placeholder="For Example -10 " class="form-control" id="percentage_amount" name="percentage_amount" value="">
            </div>
        </div>
        <div class="col-sm-6 col-xl-6" style="display: none !important;"  >
            <div class="form-group">
                <label for="" class="form-control-label">Component</label>
                 <select class="form-control" id="component_id" name="component_id">
	                <?php
	                echo "<option value=''>Select Component</option>";
	                foreach ($load_all_component as $key => $each_component) {
                    if($increement_details[0]->component==$each_component->component){
	                	echo "<option value='".$each_component->id."' selected>".$each_component->component."</option>";
                      }else{
                        echo "<option value='".$each_component->id."'>".$each_component->component."</option>";  
                      }   
	                }
	                 ?>                                   
              </select>
            </div>
        </div>
        <?php
         }else{
         ?>
        <div class="col-sm-6 col-xl-6" id="enter_amount"  >
            <div class="form-group">
                <label for="" class="form-control-label">Amount</label>
                <input type="text" placeholder="Enter Amount" class="form-control" id="fixed_amount" name="fixed_amount" value="<?php echo (isset($increement_details[0]->amount) ? $increement_details[0]->amount : ''); ?>">
            </div>
        </div>

        <div class="col-sm-6 col-xl-6" id="percentage" style="display: none;">
            <div class="form-group">
                <label for="" class="form-control-label">Percentage(%)</label>
                <input type="text" placeholder="For Example -10 " class="form-control" id="percentage_amount" name="percentage_amount" value="">
            </div>
        </div>
        <div class="col-sm-6 col-xl-6"  style="display: none !important;">
            <div class="form-group">
                <label for="" class="form-control-label">Component</label>
                 <select class="form-control" id="component_id" name="component_id">
                    <?php
                    echo "<option value=''>Select Component</option>";
                    foreach ($load_all_component as $key => $each_component) {
                      if($increement_details[0]->component==$each_component->component){
                        echo "<option value='".$each_component->id."' selected>".$each_component->component."</option>";
                      }else{
                        echo "<option value='".$each_component->id."'>".$each_component->component."</option>";  
                      }  
                    }
                     ?>                                   
              </select>
            </div>
        </div>

         <?php } ?>
  

        <div class="col-md-12">
        <div class="form-group form-buttons">
             <button type="submit" name="submit" class="btn btn-success save-profile-btn">Save</button>
             <a href="javascript:;" class="btn btn-secondary" onclick="closeForm();">Close</a>
        </div>
    </div>
    </div>
     
<!--<div class="card-footer">
    <div class="form-group mt-3">
        <button type="submit" name="submit" class="btn btn-success save-profile-btn">Save vehicle</button>
        <a href="javascript:void(0)" onclick="closeForm();" class="btn btn-outline-secondary ks-light btn-add-tenancy-contrcts-close">Close</a>
    </div>
</div>-->
</form>
<script type="text/javascript">
	$(document).ready(function(){
        var radioValue = $("input[name='increement_mode']:checked").val();
         $("#increement_type").val(radioValue);
        $(".increement_mode").click(function(){
            var radioValue = $("input[name='increement_mode']:checked").val();

            $("#increement_type").val(radioValue);
            if(radioValue=='Fixed'){
                
                $("#component").hide();
                $("#percentage").hide();
                $("#enter_amount").show();
            }else{
            	$("#enter_amount").hide();
                $("#component").show();
                $("#percentage").show();
            }
        });
        
    });
    $("#component_id").change(function(){
         var employee_id=$("#employee").val();
         if(employee_id){
            var component_id=$(this).val();
            $.ajax({
                url : '<?php echo base_url('increement_check_salary_stracture'); ?>/',
                type : 'POST',
                data : {component_id:component_id,employee_id:employee_id},
                
                success : function(data) {
                 console.log(data);
                    if(data=="yes"){
                      
                    }else{
                      $("#validation_heading").html(" ");
                      $("#validation_body").html("Component Not Found ");
                      $("#validation_Model").modal("show");

                      
                    }
                   
                }
            });
        }else{
            $("#validation_heading").html(" ");
            $("#validation_body").html("Select Employee Name ");
            $("#validation_Model").modal("show");
        }
         

    });
    function validation(){
    	if($("#employee").val()){
            var employee_id=$("#employee").val();
    		var component_id=$("#component_id").val();
    		var increement_mode = $("input[name='increement_mode']:checked").val();
            if (increement_mode=="Fixed") {
            	if($("#fixed_amount").val()) {
                    
	    			return true;
	    		}else{
                 $("#validation_heading").html(" ");
	    		 $("#validation_body").html("Please Enter Amount");
	    		 $("#validation_Model").modal("show");

	    		 return false;
	    		}
            }else{
            	if (component_id) {

                    if($("#percentage_amount").val()){
                    return true ;
                    }else{

                         $("#validation_heading").html(" ");
                         $("#validation_body").html("Please Enter Amount");
                         $("#validation_Model").modal("show");
                         return false ;

                    }
       
	    		
		    	}else{
		    		
	                 $("#validation_heading").html(" ");
		    		 $("#validation_body").html("Please Select Component ");
		    		 $("#validation_Model").modal("show");

		    		return false;
		    	}
		    	
            }
	    	
    	}else{
    		 $("#validation_heading").html(" ");
    		 $("#validation_body").html("Please select Employee  ");
    		 $("#validation_Model").modal("show");
    		return false;
    	}
    	

    }
</script>