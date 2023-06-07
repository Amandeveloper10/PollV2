<form onsubmit="return myFunction('employee_opening_leave_form')" method="post" action="<?php echo base_url('admin_add_employee_opening_leave'); ?>" name="employee_opening_leave_form" id="employee_opening_leave_form" enctype="multipart/form-data" >
    <div class="row" style="margin-bottom: 0 !important">
        <div class="col-sm-6 col-xl-3">
            <div class="form-group">
                <label for="" class="form-control-label">Date</label>
                <input required type="text" placeholder="Enter Date" class="form-control mysingle_date" name="date" id="date" value="<?php echo (isset($data_single->date) ? $data_single->date : ''); ?>">
            </div>
        </div>
    <div class="col-md-3">
    <div class="form-group">
        <label>Employee No</label>
            <select id="employee_id" name="employee_id" class="form-control js-example-basic-multiple" required="required" onchange="getallleaves(),checkOpening();">
                <option>Select</option>   
              <?php
                if(!empty($all_employee))
                {
                foreach ($all_employee as $employee) {
                ?>
                <option value="<?php echo $employee->id;?>"  <?php echo ((isset($data_single->employee_id) && ($data_single->employee_id==$employee->id)) ? 'selected' : ''); ?>><?php echo $employee->first_name.' '.$employee->last_name.' ('.$employee->employee_no.')';?></option>
                <?php
                }
                }
                ?> 
            </select> 
             <span id="dateErr" style="color: red;"></span>
    </div>
    </div>
            <table width="50%" id="leavetypetable">
              
            </table>
                          
        </div>

      
<div class="row">
    <div class="col-md-12">
    <div class="form-group text-right">
         <button type="submit" name="submit" class="btn btn-success saveopn">Save</button>
    </div>
    </div>
</div>



</form>

<script type="text/javascript">
  function getallleaves(){
  var employee_id = $("#employee_id option:selected").val();
  $.post("<?php echo base_url('admin_get_all_leaves'); ?>", {'id': employee_id}, function(result){
   $("#leavetypetable").html(result);
    });
  }

  function checkOpening() {
        var empVal = $("#employee_id option:selected").val();
        //alert(empVal);
        if (empVal != "") {
            $.post("<?php echo base_url('admin_check_emp_openingbalance'); ?>", {'empVal': empVal}, function (result) {
                console.log(result);
                if (result != 'no') {
                    $("#dateErr").html(result);
                    $(".saveopn").attr('disabled', true);
					$("#leavetypetable").html('');
                } else {
                    $("#dateErr").html('');
                    $(".saveopn").attr('disabled', false);
					
                }

            });
        }
    }
</script>
