<form class="closeForm" onsubmit="return myFunction('overtime_rules_form')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_overtime_rules').'/'.$id : base_url('admin_add_overtime_rules'); ?>" name="overtime_rules_form" id="overtime_rules_form" enctype="multipart/form-data" >
    <div class="row">
    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Overtime Name</label>
            <input required type="text" class="form-control" onkeyup="checkovertime('<?php echo (isset($data_single->id) ? $data_single->id : ''); ?>');"  name="overtime_name" id="overtime_name" value="<?php echo (isset($data_single->overtime_name) ? $data_single->overtime_name : ''); ?>">
        </div>
		<span style="color: red;" id="overtime_err"></span>
    </div>

    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Overtime Type</label>

                 <select id="overtime_type" name="overtime_type" required class="form-control">
                    <option value="" >Select</option>
                  <option value="Normal" <?php echo ((isset($data_single->overtime_type) && ($data_single->overtime_type=='Normal')) ? 'selected' : ''); ?>>Normal</option>

                  <option value="Weekend" <?php echo ((isset($data_single->overtime_type) && ($data_single->overtime_type=='Weekend')) ? 'selected' : ''); ?>>Weekend</option>

                  <option value="Public Holiday" <?php echo ((isset($data_single->overtime_type) && ($data_single->overtime_type=='Public Holiday')) ? 'selected' : ''); ?>>Public Holiday</option>

                  <option value="Special" <?php echo ((isset($data_single->overtime_type) && ($data_single->overtime_type=='Special')) ? 'selected' : ''); ?>>Special</option>
                  
                </select>         

        </div>
    </div>

     <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Component</label>
                 <select id="component" name="component" required class="form-control" onchange="getOtFormula();">
                   <option value="" >Select</option>
                    <?php
                  if (!empty($all_component)) {
                    foreach ($all_component as $component) {
                  ?>
                  <option value="<?php echo $component->id; ?>" <?php echo ((isset($data_single->component) && ($data_single->component==$component->id)) ? 'selected' : ''); ?>><?php echo $component->component; ?></option>
                  <?php } } ?>
                </select>
         

        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="form-group">
            <label>Day</label>
            <input onkeyup="numeric(this),getOtFormula();" required type="text" class="form-control"  name="day" id="day" value="<?php echo (isset($data_single->day) ? $data_single->day : ''); ?>">
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="form-group">
            <label>Hour</label>
            <input onkeyup="numeric(this),getOtFormula();" required type="text" class="form-control"  name="hour" id="hour"  value="<?php echo (isset($data_single->hour) ? $data_single->hour : ''); ?>">
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="form-group">
            <label>Multiply By</label>
            <input onkeyup="numeric(this),getOtFormula();" required type="text" class="form-control"  name="multiply_by" value="<?php echo (isset($data_single->multiply_by) ? $data_single->multiply_by : ''); ?>" id="multiply_by">
        </div>
    </div>
        <?php  if(isset($data_single->component)) { $component123 = $this->OvertimeRulesModel->get_row_data('master_salary_component',array('id'=>$data_single->component)); } ?>
        <div class="col-sm-6 col-xl-3 align-self-center">
        <div class="form-group mb-3 mb-xl-0">
          <span style="font-size: 15px;" class="text-warning">
            (<span id="component_type"><?php echo @$component123->component; ?></span>/<span id="day_id"><?php echo (isset($data_single->day) ? $data_single->day : ''); ?></span>/<span id="hour_id"><?php echo (isset($data_single->hour) ? $data_single->hour : ''); ?></span>)*<span id="multiply_by_id"><?php echo (isset($data_single->multiply_by) ? $data_single->multiply_by : ''); ?></span></span>
        </div>
        </div>   
        </div>
  <div class="col-sm-6 col-xl-3">
        <div class="form-group">
            <label>Min. Hours to take leave</label>
            <input type="text" class="form-control" required maxlength="3" onkeyup="numeric(this)" name="hour_take_leave" id="hour_take_leave"  value="<?php echo (isset($data_single->hour_take_leave) ? $data_single->hour_take_leave : ''); ?>">
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


 function checkovertime(id){
        var overtime_name = $("#overtime_name").val().trim();
       
        $("#overtime_err").html('');
        $("#save").prop( "disabled", false );
        if(overtime_name!=''){
        $.post("<?php echo base_url('check_overtime'); ?>", {'overtime_name': overtime_name,'id':id}, function(result){
           
            if(result!='done'){
              $("#overtime_err").html(result);
              $("#save").prop( "disabled", true );
            }
         
         
        });
        }
        }
</script>
