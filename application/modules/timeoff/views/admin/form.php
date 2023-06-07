<?php $SysConfigaration = checkConfig1(); 
$dateformat = $SysConfigaration->date_format;
//print_r($SysConfigaration->date_format); die;?>
<form onsubmit="return myFunctiontimeoff('timeoff_form')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_timeoff').'/'.$id : base_url('admin_add_timeoff'); ?>" name="timeoff_form" id="timeoff_form" enctype="multipart/form-data" >
<input type="hidden" id="mode" name="mode" value="<?=@$mode?>"/>
<div class="row">
      <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label class="d-block">Type</label>
            <div class="d-inline-block mt-2">
                <div class="custom-control custom-radio ks-radio ks-info">
                    <input onchange="getvall('Personal');" <?php if(@$data_single->type=='Personal'){ ?> checked="checked" <?php } ?>  id="r3" type="radio" class="custom-control-input" value="Personal" name='type'  
                           data-validation="radio_group"
                           data-validation-qty="min1">
                    <label class="custom-control-label" for="r3">Personal</label>
                </div>
            </div>
            <div class="d-inline-block mt-2 ml-3">
                <div class="custom-control custom-radio ks-radio ks-purple">
                    <input onchange="getvall('Official');" <?php if(@$data_single->type=='Official'){ ?> checked="checked" <?php } ?>  id="r4" type="radio" class="custom-control-input" value="Official"  name='type'  
                           data-validation="radio_group"
                           data-validation-qty="min1">
                    <label class="custom-control-label" for="r4">Official</label>
                </div>
            </div>



            <input type="hidden" name="type_val" id="type_val" value="<?php echo @$data_single->type; ?>">
        </div>
        <span id="type_valErr" style="color: red;"></span>
    </div>

      <div class="col-sm-6 col-xl-4 officialDiv"  <?php if(isset($data_single->type) && @$data_single->type=='Official'){ ?>  <?php }else{ ?> style="display: none;" <?php } ?>>
        <div class="form-group">
             <label>Work Status</label>
            <select class="form-control" id="work_status" name="work_status" onchange="<?php if(@$mode != 'emp'){ ?>get_all_employee(),<?php } ?>getallvalue(this.value);">
                    <option value=''>Select Work Status</option>  
                    <option value='OD' <?php if(!empty($data_single->work_status) && $data_single->work_status == 'OD'){ echo 'selected';} ?>>Outside Duty</option>      
                    <option value='WFH' <?php if(!empty($data_single->work_status) && $data_single->work_status == 'WFH'){ echo 'selected';} ?>>Work From Home</option>           
            </select>
			  <span id="work_statusErr" style="color: red;"></span>
        </div>        
    </div>
	<?php if(@$mode != 'emp'){ ?>
    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
             <label>Employee Name</label>
            <select class="form-control js-example-basic-multiple" id="employee" required name="employee">
                    <?php
                     echo "<option value=''>Select Employee</option>";



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
	<?php } else { ?>
	<input type="hidden" id="employee" name="employee" value="<?=@$employee_id?>"/>
	
	<?php } ?>
        
    <div class="col-sm-6 col-xl-4 personaldiv" <?php if(isset($data_single->type) && @$data_single->type=='Personal'){ ?>  <?php }else{ ?> style="display: none;" <?php } ?>>
            <div class="form-group">
                <label for="" class="form-control-label">Date</label>
                <input type="text" placeholder="Enter Date" class="form-control mysingle_date" name="date" id="date" value="<?php echo (isset($data_single->date) ? date($dateformat,strtotime($data_single->date)) : ''); ?>">
            </div>
            <span id="dateErr" style="color: red;"></span>
        </div>

    <div class="col-sm-6 col-xl-4 officialDiv" <?php if(isset($data_single->type) && @$data_single->type=='Official'){ ?>  <?php }else{ ?> style="display: none;" <?php } ?>>
            <div class="form-group">
                <label for="" class="form-control-label">From Date</label>
                <input type="text" placeholder="Enter From Date" class="form-control mysingle_date" name="from_date" id="from_date" value="<?php echo (isset($data_single->from_date) ? date($dateformat,strtotime($data_single->from_date)) : ''); ?>">
            </div>
            <span id="dateErr" style="color: red;"></span>
        </div>
        <div class="col-sm-6 col-xl-4 officialDiv" <?php if(isset($data_single->type) && @$data_single->type=='Official'){ ?>  <?php }else{ ?> style="display: none;" <?php } ?>>
            <div class="form-group">
                <label for="" class="form-control-label">To Date</label>
                <input type="text" placeholder="Enter To Date" class="form-control mysingle_date" name="to_date" id="to_date" value="<?php echo (isset($data_single->to_date) ? date($dateformat,strtotime($data_single->to_date)) : ''); ?>">
            </div>
            <span id="dateErr" style="color: red;"></span>
        </div>
    <div class="col-sm-6 col-xl-4 personaldiv" <?php if(isset($data_single->type) && @$data_single->type=='Personal'){ ?>  <?php }else{ ?> style="display: none;" <?php } ?>>
       <div class="form-group">
                <label for="" class="form-control-label">Time</label>
                <input type="text" placeholder="Enter Time" class="form-control mytime_picker" name="time" id="time" value="<?php echo (isset($data_single->time) ? $data_single->time : ''); ?>">
            </div>
    </div>

    <div class="col-sm-6 col-xl-4 officialDiv" <?php if(isset($data_single->type) && @$data_single->type=='Official'){ ?>  <?php }else{ ?> style="display: none;" <?php } ?>>
            <div class="form-group">
                <label for="" class="form-control-label">Entry Time</label>
                <input type="text" placeholder="Enter Entry Time" class="form-control mytime_picker" name="entry_time" id="entry_time" value="<?php echo (isset($data_single->entry_time) ? $data_single->entry_time : ''); ?>">
            </div>
        </div>
        <div class="col-sm-6 col-xl-4 officialDiv" <?php if(isset($data_single->type) && @$data_single->type=='Official'){ ?>  <?php }else{ ?> style="display: none;" <?php } ?>>
            <div class="form-group">
                <label for="" class="form-control-label">Out Time</label>
                <input type="text" placeholder="Enter Out Time" class="form-control mytime_picker" name="out_time" id="out_time" value="<?php echo (isset($data_single->out_time) ? $data_single->out_time : ''); ?>">
            </div>
        </div>
          <div class="col-sm-6 col-xl-4 wfhdiv"  <?php if(isset($data_single->work_status) && @$data_single->work_status=='WFH'){ ?>  <?php }else{ ?> style="display: none;" <?php } ?>>
        <div class="form-group">
             <label>Work For</label>
            <select class="form-control" id="deduction_type" name="deduction_type">
                    <option value=''>Select</option>  
                    <option value='Half' <?php if(!empty($data_single->deduction_type) && $data_single->deduction_type == 'Half'){ echo 'selected';} ?>>Half</option>      
                    <option value='Full' <?php if(!empty($data_single->deduction_type) && $data_single->deduction_type == 'Full'){ echo 'selected';} ?>>Full</option>           
            </select>
        </div>        
    </div>
    <div class="col-sm-6 col-xl-12">
        <div class="form-group">
            <label>Purpose</label>
           <textarea required type="text" class="form-control" name="purpose"><?php echo (isset($data_single->purpose) ? $data_single->purpose : ''); ?></textarea>
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

<script type="text/javascript">

function getvall(vaal) {
        $("#type_val").val(vaal);
        if(vaal == 'Personal'){
            $(".personaldiv").show();
             $(".officialDiv").hide();
             $(".wfhdiv").hide();
			 $("#type_valErr").html('');
			 $("#work_status").attr("required", "false");
			 $("#deduction_type").attr("required", "false");
			 
			 
        }else{
            $(".personaldiv").hide();
            $(".officialDiv").show();
            $(".wfhdiv").hide();
			$("#type_valErr").html('');
			$("#work_status").attr("required", "true");
			$("#deduction_type").attr("required", "true");
        }
    }

    function getallvalue(value){
        if(value == 'WFH'){
            
			//$("#work_statusErr").html('');
            $(".wfhdiv").show();
        }else{
            $(".wfhdiv").hide();
			//$("#work_statusErr").html('');
			
        }
    }

function get_all_employee(){
   var work_status =  $('#work_status').val();
   var type_val =  $('#type_val').val();
   $.post("<?php echo base_url('getallemployee'); ?>", {work_status: work_status,type_val: type_val}, function(result){ 
            ///console.log(result);
            $('#employee').html(result);
                });
   
}
</script>