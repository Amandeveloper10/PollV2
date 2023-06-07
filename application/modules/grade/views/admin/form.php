<form onsubmit="return myFunction('grade_form')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_grade').'/'.$id : base_url('admin_add_grade'); ?>" name="grade_form" id="grade_form" enctype="multipart/form-data" >
<div class="row">
    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Grade Name</label>
            <input required type="text" class="form-control" id="grade_name" name="grade_name" onkeyup="checkgrade('<?php echo (isset($data_single->id) ? $data_single->id : ''); ?>');"  value="<?php echo (isset($data_single->grade_name) ? $data_single->grade_name : ''); ?>">
        </div>
         <span style="color: red;" id="grade_err"></span>
    </div>
    
    
    
    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Select Late Rule</label>
            <select name="late_rule_id" id="late_rule_id" class="form-control" >
                <option value="" >Select</option>
                <?php
                if(!empty($late)){
                foreach ($late as $value) {


                
                    ?>
                <option value="<?php echo $value->id; ?>" <?php  if(!empty($data_single->late_rule_id) && $data_single->late_rule_id==$value->id) { echo 'selected'; }  ?> ><?php echo $value->rule_name; ?></option>
                <?php
                }
                }
                ?>
            </select>
        </div>
    </div>
    
    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Select Overtime Rule</label>
            <select name="overtime_rule_id" id="overtime_rule_id" class="form-control" >
                <option value="" >Select</option>
                <?php
                if(!empty($over_time)){
                foreach ($over_time as $value) {


                
                    ?>
                <option value="<?php echo $value->id; ?>" <?php  if(!empty($data_single->overtime_rule_id) && $data_single->overtime_rule_id==$value->id) { echo 'selected'; }  ?> ><?php echo $value->overtime_name; ?></option>
                <?php
                }
                }
                ?>
            </select>
        </div>
    </div>
    
   <!-- <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Select Work Shift Rule</label>
            <select name="work_shift_id" id="work_shift_id" class="form-control" >
                <option value="" >Select</option>
                <?php
                if(!empty($work_shift)){
                foreach ($work_shift as $value) {


                
                    ?>
                <option value="<?php echo $value->id; ?>" <?php  if(!empty($data_single->work_shift_id) && $data_single->work_shift_id==$value->id) { echo 'selected'; }  ?> ><?php echo $value->work_shift_name; ?></option>
                <?php
                }
                }
                ?>
            </select>
        </div>
    </div>-->

    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Min. Salary</label>
            <input type="text" class="form-control onlynumber" required onkeyup="checkval();" name="min_salary" id="min_salary" value="<?php echo (isset($data_single->min_salary) ? $data_single->min_salary : ''); ?>">
            <!--<span style="color: #d4a00c;">Leave blank, if you don't restrict the limit</span>-->
        </div>        
    </div>

    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Max. Salary</label>
            <input type="text" class="form-control onlynumber" required onkeyup="checkval();" name="max_salary" id="max_salary" value="<?php echo (isset($data_single->max_salary) ? $data_single->max_salary : ''); ?>">
        </div>
         <span style="color: red;" id="salrange_err"></span>
    </div>
    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Select Leave Rule</label>
            <select name="leave_rule_id[]" id="leave_rule_id" class="select2" required multiple="" >
               
                <?php
                if(!empty($leave_rule)){
                foreach ($leave_rule as $value) {


                
                    ?>
                <option value="<?php echo $value->id; ?>" <?php  if(!empty($data_single->leave_rule_id) && in_array($value->id, explode(',',$data_single->leave_rule_id))) { echo 'selected'; }  ?> ><?php echo $value->rule_name; ?></option>
                <?php
                }
                }
                ?>
            </select>
        </div>
    </div>
   
    
    <div class="col-md-12">
        <div class="form-group form-buttons">
             <button type="submit" name="submit" id="save" class="btn btn-success">Save</button>
             <a href="javascript:;" class="btn btn-secondary" onclick="btnCloseForm();">Close</a>
        </div>
    </div>
</div>
</form>
<script>
    $(".select2").select2();
        function checkgrade(id){
        var grade_name = $("#grade_name").val().trim();
        //alert(rf_no);
        $("#grade_err").html('');
        $("#save").prop( "disabled", false );
        if(grade_name!=''){
        $.post("<?php echo base_url('check_grade'); ?>", {'grade': grade_name,'id':id}, function(result){
            console.log(result);
            if(result!='done'){
              $("#grade_err").html(result);
              $("#save").prop( "disabled", true );
            }
         
         
        });
        }
        }

        function checkminmax_sal(id){
        var min_salary = $("#min_salary").val().trim();
        var max_salary = $("#max_salary").val().trim();
        //alert(rf_no);
        $("#salrange_err").html('');
        $("#save").prop( "disabled", false );
        if(grade_name!=''){
        $.post("<?php echo base_url('checkminmax_sal'); ?>", {'min_salary': min_salary,'max_salary': max_salary,'id':id}, function(result){
            //console.log(result);
            if(result!='done'){
              $("#salrange_err").html(result);
              $("#save").prop( "disabled", true );
            }
         
         
        });
        }
        }

function checkval(){
    var min_salary  = $('#min_salary').val();
    var max_salary  = $('#max_salary').val();
    if(parseFloat(min_salary) < parseFloat(max_salary)){
        $("#save").prop( "disabled", false);
         $("#salrange_err").html('');
    }else{
         $("#salrange_err").html('Maximum salary can not less than minimum salary.');
       $("#save").prop( "disabled", true ); 
    }
}


$(".onlynumber").keypress(function (e) {
    if(e.which == 46){
        if($(this).val().indexOf('.') != -1) {
            return false;
        }
    }

    if (e.which != 8 && e.which != 0 && e.which != 46 && (e.which < 48 || e.which > 57)) {
        return false;
    }
});
</script>