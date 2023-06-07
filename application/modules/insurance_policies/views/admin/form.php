 <?php $SysConfigauthenticaton = checkConfig1(); ?>
 <form class="closeForm" onsubmit="return myFunction('insurance_policies')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_insurance_policies').'/'.$id : base_url('admin_add_insurance_policies'); ?>" name="insurance_policies" id="insurance_policies" enctype="multipart/form-data" >
 
    <div class="row">
        <div class="col-sm-6 col-xl-4">
            <div class="form-group">
                <label for="" class="form-control-label">Coverage</label>
                
              <select name="type" class="form-control " required >
                    <option value="">Select Policy Type</option>
                    <option value="Workman Compensation" <?php if(@$data_single->type=='Workman Compensation') { echo 'selected';  } ?>>Workman Compensation</option>
                    <option value="Projects Insurance" <?php if(@$data_single->type=='Projects Insurance') { echo 'selected';  } ?>>Projects Insurance</option>
                    <option value="Health Insurance" <?php if(@$data_single->type=='Health Insurance') { echo 'selected';  } ?> >Health Insurance</option>
                     <option value="Vehicle Insurance" <?php if(@$data_single->type=='Vehicle Insurance') { echo 'selected';  } ?> >Vehicle Insurance</option>
                </select>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="form-group">
                <label for="" class="form-control-label">Policy For</label>
                
              <select name="policy_for" class="form-control " required >
                    <option value="">Select Policy For</option>
                    <option value="employee" <?php if(@$data_single->insurence_for=='employee') { echo 'selected';  } ?>>Employee</option>
                    <option value="vehicle" <?php if(@$data_single->insurence_for=='vehicle') { echo 'selected';  } ?>>Vehicle</option>
                   
                </select>
            </div>
        </div>
        
        <div class="col-sm-6 col-xl-4">
            <div class="form-group">
                <label for="" class="form-control-label">Policy Name</label>
                <input type="text" placeholder="Enter Policy Name" required class="form-control" name="policy_name" onkeyup="checkpolicy('<?php echo (isset($data_single->id) ? $data_single->id : ''); ?>');" id="policy_name" value="<?php echo (isset($data_single->policy_name) ? $data_single->policy_name : ''); ?>">
            </div>
			<span style="color: red;" id="grade_err"></span>
        </div>
    <div class="col-sm-6 col-xl-4">
            <div class="form-group">
                <label for="" class="form-control-label">Renewal Date</label>
                <input type="text" placeholder="Select date" required class="form-control mysingle_date" name="renewal_date" value="<?php echo (isset($data_single->renewal_date) ? date($SysConfigauthenticaton->date_format,strtotime($data_single->renewal_date)) : ''); ?>">
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="form-group">
                <label for="" class="form-control-label">Expiry Date</label>
                <input type="text" placeholder="Select date" required class="form-control mysingle_date" name="expiry_date" value="<?php echo (isset($data_single->expiry_date) ? date($SysConfigauthenticaton->date_format,strtotime($data_single->expiry_date)) : ''); ?>">
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="form-group">
                <label for="" class="form-control-label">Coverage For</label>
                <input type="text" placeholder="Enter Coverage For"  required class="form-control" name="coverage" value="<?php echo (isset($data_single->coverage) ? $data_single->coverage : ''); ?>">
                <!-- <select name="select" class="form-control " >
                    <option value="0">Please select</option>
                    <option value="1">Option #1</option>
                    <option value="2">Option #2</option>
                    <option value="3">Option #3</option>
                </select> -->
            </div>
        </div>
    <div class="col-sm-12 col-xl-12">
            <div class="form-group">
                <label for="" class="form-control-label">Note</label>
                <textarea placeholder="Enter note" class="form-control" required style="min-height: 60px; line-height: 20px;" name="note"><?php echo (isset($data_single->note) ? $data_single->note : ''); ?></textarea>
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
 function checkpolicy(id){
        var policy_name = $("#policy_name").val().trim();
        //alert(policy_name);
        $("#grade_err").html('');
        $("#save").prop( "disabled", false );
        if(policy_name!=''){
        $.post("<?php echo base_url('check_policy'); ?>", {'policy_name': policy_name,'id':id}, function(result){
            console.log(result);
            if(result!='done'){
              $("#grade_err").html(result);
              $("#save").prop( "disabled", true );
            }
        });
        }
        }
</script>
