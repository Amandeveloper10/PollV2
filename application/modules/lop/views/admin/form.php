<form class="closeForm" onsubmit="return myFunction('lop_form')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_lop').'/'.$id : base_url('admin_add_lop'); ?>" name="lop_form" id="lop_form" enctype="multipart/form-data" >
    <div class="row" >

     <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Grade</label>
            <select class="form-control"  name="grade_id" id="grade_id" required onchange="getOtFormulalop(),checklopgrade('<?php echo (isset($data_single->id) ? $data_single->id : ''); ?>');">
                <option value="">Select</option>
                  <?php
                  if (!empty($all_grade)) {
                    foreach ($all_grade as $grade) {
                  ?>
                  <option value="<?php echo $grade->id; ?>" <?php echo ((isset($data_single->grade_id) && ($data_single->grade_id==$grade->id)) ? 'selected' : ''); ?>><?php echo $grade->grade_name; ?></option>
                  <?php } } ?>     
              </select>

        </div>
		  <span style="color: red;" id="grade_err"></span>
    </div>

    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Based On</label>
                 <select id="based_on" name="based_on" class="form-control" onchange="getOtFormulalop();">
                    <!--<option>Select</option>-->
                    <option value="Gross Salary" <?php echo ((isset($data_single->based_on) && ($data_single->based_on=='Gross Salary')) ? 'selected' : ''); ?>>Gross Salary</option>
                    <option value="Basic Salary" <?php echo ((isset($data_single->based_on) && ($data_single->based_on=='Basic Salary')) ? 'selected' : ''); ?>>Basic Salary</option>          
                </select>         

        </div>
    </div>

    <div style="display:none;" class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Operator</label>
                 <select  id="operator" name="operator" class="form-control" onchange="getOtFormulalop();">
                    <option>Select</option>
                    <option value="*" selected >*</option>
<!--                    <option value="<" <?php echo ((isset($data_single->operator) && ($data_single->operator=='<')) ? 'selected' : ''); ?>><</option>
                  <option value=">=" <?php echo ((isset($data_single->operator) && ($data_single->operator=='>=')) ? 'selected' : ''); ?>>>=</option>    
                  <option value="<" <?php echo ((isset($data_single->operator) && ($data_single->operator=='<')) ? 'selected' : ''); ?>><</option>   
                  <option value="<=" <?php echo ((isset($data_single->operator) && ($data_single->operator=='<=')) ? 'selected' : ''); ?>><=</option>-->
                </select>         

        </div>
    </div>


   <!-- <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Loss of Pay Days</label>
            <input onkeyup="numeric(this),getOtFormulalop();" type="text" class="form-control" name="day" id="day" value="<?php echo (isset($data_single->day) ? $data_single->day : ''); ?>">
        </div>
    </div>-->

      <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Days</label>
                 <select name="day" id="day" class="form-control" onchange="getOtFormulalop();">
                    <!--<option>Select</option>-->
                    <option value="Loss of Pay Days" <?php echo ((isset($data_single->day) && ($data_single->day=='Loss of Pay Days')) ? 'selected' : ''); ?>>Loss of Pay Days</option>
                               
                </select>         

        </div>
    </div>

       <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Calculation Based on</label>
                 <select  id="days_type" name="days_type" class="form-control" required onchange="getOtFormulalop(),getvalue(this.value);">
                    <option value="">Select</option>
                    <option value="calendar day basis" <?php echo ((isset($data_single->days_type) && ($data_single->days_type=='calendar day basis')) ? 'selected' : ''); ?>>Calendar day basis</option>
                    <option value="fixed number of days basis" <?php echo ((isset($data_single->days_type) && ($data_single->days_type=='fixed number of days basis')) ? 'selected' : ''); ?>>Fixed number of days basis</option>
                </select>         

        </div>
    </div>

    <div class="col-sm-6 col-xl-4" id="fixeddays"  <?php if(@$data_single->days_type != 'fixed number of days basis'){ ?> style="display:none;" <?php } ?>>
        <div class="form-group">
            <label>Fixed Days</label>
            <input onkeyup="numeric(this),getOtFormulalop();" maxlength="5" type="text" class="form-control" name="fixed_days" id="fixed_days" value="<?php echo (isset($data_single->fixed_days) ? $data_single->fixed_days : ''); ?>">
        </div>
    </div>
    <div class="col-sm-6 col-xl-4 align-self-center">
    <div class="form-group mb-3 mb-xl-0">
          <span style="font-size: 15px;" class="text-warning">
        Lop = <span id="based_on_id"><?php echo (isset($data_single->based_on) ? $data_single->based_on : ''); ?></span><span id="operator_id_1"><?php echo (isset($data_single->operator_1) ? $data_single->operator_1 : ''); ?></span><span id="calculate_on_days_id"><?php if(@$data_single->days_type == 'calendar day basis'){ echo @$data_single->days_type; } else{ echo @$data_single->fixed_days;}?></span><span id="operator_id"><?php echo (isset($data_single->operator) ? $data_single->operator : ''); ?></span><span id="day_id"><?php echo (isset($data_single->loss_day) ? $data_single->loss_day : ''); ?></span></span>
        </div>
    </div>
    

   
        </div>

   
<div class="row">
    <div class="col-md-12">
        <div class="form-group form-buttons">
             <button type="submit" name="submit" class="btn btn-success" id="save">Save</button>
             <a href="javascript:;" class="btn btn-secondary" onclick="btnCloseForm();">Close</a>
        </div>
    </div>
</div>
    

</form>

<script>
 function checklopgrade(id){
        var grade_id = $("#grade_id").val().trim();
        //alert(rf_no);
        $("#grade_err").html('');
        $("#save").prop( "disabled", false );
        if(grade_id!=''){
        $.post("<?php echo base_url('check_lop_grade'); ?>", {'grade_id': grade_id,'id':id}, function(result){
            console.log(result);
            if(result!='done'){
              $("#grade_err").html(result);
              $("#save").prop( "disabled", true );
            }
         
         
        });
        }
        }
</script>
