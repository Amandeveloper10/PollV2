<?php $SysConfigauthenticaton = checkConfig1(); ?>
<form onsubmit="return myFunction('leave_settlement')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_leave_settlement').'/'.$id : base_url('admin_add_leave_settlement'); ?>" name="leave_settlement" id="leave_settlement" enctype="multipart/form-data" >
<div class="row">
    <div class="col-sm-6 col-xl-4">
            <div class="form-group">
	            <label>Employee Name</label>
	            <select class="form-control js-example-basic-multiple" id="employee_id" name="employee_id" required onchange="getLeaveType();">
                        
                        <option value=''>Select Employee</option>
                        
	                <?php
                        
                        foreach ($load_all_employee as $key => $each_employee) {
                            
                            ?>
                            <option value='<?php echo @$each_employee->id;?>' <?php if(!empty($data_single) && $data_single->employee_id==$each_employee->id) {  echo 'selected'; } ?>  ><?php echo $each_employee->first_name.' '.$each_employee->middle_name.' '.$each_employee->last_name.' ( '.$each_employee->employee_no.' )'; ?></option>
                        <?php    
                        }
                        ?>
	                                             
              </select>
                    <?php //echo 'hello'; exit;?>
            </div>
        </div>

            <div class="col-md-4">
    <div class="form-group" id="leaveDiv">
        <label>Leave Type</label>
             <select id="leave_type" name="leave_type" class="form-control" required onchange="getsettelementleave('');">
                <option value="">Select</option>          

              <?php
                if(!empty($all_leave_type))
                {
                foreach ($all_leave_type as $value) {
                    if(in_array($value->id, $emp_leave)){
                    if(isset($data_single->employee_id) && $data_single->employee_id!=''){
                       $result=  $this->EmpLeaveModel->leave_due_day($value->id,$data_single->employee_id);
                       $due=$value->unit - $result;
                    }else{
                        $due=0;
                    }
                
                ?>
                <option value="<?php echo $value->id;?>"  <?php echo ((isset($data_single->leave_type_id) && ($data_single->leave_type_id==$value->id)) ? 'selected' : ''); ?>><?php echo $value->rule_name .' ( Due: '.$due.' )';?></option>
                <?php
                } }
                }
                ?>
              
            </select>         

    </div>
    </div>
    <div class="col-sm-6 col-xl-4" style="display: none;">
            <div class="form-group" id="due_leave">
                <label for="" class="form-control-label">Settlement leaves</label>
                <?php
    if(!empty($all_leave_type))
    {
    foreach ($all_leave_type as $value) {

    if(isset($data_single->employee_id) && $data_single->employee_id!=''){
    $result=  $this->EmpLeaveModel->leave_due_day($value->id,$data_single->employee_id);
    $due=$value->unit - $result;
    }else{
    $due=0;
    }

    ?>
    <input type="hidden" class="form-control" name="due_leave<?php echo $value->id;?>" id="due_leave<?php echo $value->id;?>" value="<?php echo $due;?>" />

    <?php
    }
    }
    ?>
            </div>
        </div>


        <div class="col-sm-6 col-xl-4">
            <div class="form-group">
                <label for="" class="form-control-label">Settlement Leaves</label>
                <input type="text" placeholder="Enter Settlement Leaves" required onkeyup="checkingsettlementleaves();" class="form-control" id="settlement_leaves" name="settlement_leaves" value="<?php echo (isset($data_single->settlement_leaves) ? $data_single->settlement_leaves : ''); ?>">
            </div>
        </div>

    <div class="col-sm-6 col-xl-4">
            <div class="form-group">
                <label for="" class="form-control-label">Settlement date</label>
                <input type="text" placeholder="Enter Date" required class="form-control mysingle_date" id="settlement_date" name="settlement_date" value="<?php echo (isset($data_single->settlement_date) ? date($SysConfigauthenticaton->date_format,strtotime($data_single->settlement_date)) : date($SysConfigauthenticaton->date_format)); ?>">
            </div>
        </div>
     <div class="col-sm-6 col-xl-4">
            <div class="form-group">
                <label for="" class="form-control-label">Amount</label>
                <input type="text" placeholder="Enter Amount" required class="form-control" onkeyup="checkingsettlementleaves();"   id="basic_amount" name="basic_amount" value="<?php echo (isset($data_single->basic_amount) ? $data_single->basic_amount : '0.00'); ?>">
            </div>
        </div>
     <div class="col-sm-6 col-xl-4">
            <div class="form-group">
                <label for="" class="form-control-label">Total Days in This Month</label>
                <input type="text" placeholder="Enter Total Days in This Month" required onkeyup="checkingsettlementleaves();"  class="form-control" id="total_days" name="total_days" value="<?php echo (isset($data_single->total_days) ? $data_single->total_days : date("t")); ?>">
            </div>
        </div>
    <div class="col-sm-6 col-xl-4" id="enter_amount" >
            <div class="form-group">
                <label for="" class="form-control-label">Amount</label>
                <input type="text" placeholder="Enter Amount" readonly required class="form-control" id="amount" name="amount" value="<?php echo (isset($data_single->amount) ? $data_single->amount : ''); ?>">
            </div>
        </div>
    <div class="col-sm-6 col-xl-6 align-self-center">
        <div class="form-group mb-0">
          <span style="font-size: 16px;" class="text-danger">
            Formula = <span>Basic Amount</span> / <span>Total Days in This Month</span> * <span>Settlement Leaves</span>
          </span>
        </div>
    </div>
    <div class="col-md-12">
            <div class="form-group">
                <label>Notes</label>
                <textarea class="form-control" rows="3" name="description"><?php echo (isset($data_single->description) ? $data_single->description : ''); ?></textarea>
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

  $('.select2').select2({
        width: '100%'
    });
	
function getsettelementleave(){
    var leave_type = $("#leave_type option:selected").val();
    if(leave_type != ''){
        var due_Leave = $("#due_leave"+leave_type).val(); 
        $('#settlement_leaves').val(due_Leave);
    }

}

function checkingsettlementleaves(){
    var leave_type = $("#leave_type option:selected").val();
    var leaves = $("#settlement_leaves").val();
    
    if(leave_type != ''){
        var due_Leave = $("#due_leave"+leave_type).val(); 
        $('#settlement_leaves').val(due_Leave);
        if(parseFloat(leaves)>parseFloat(due_Leave)){
            alert('Please enter less than or equal to due leave');
        }else{
          $('#settlement_leaves').val(leaves);  
          var basic_amount = $('#basic_amount').val(); 
          var total_days = $('#total_days').val(); 
          var totalamount = parseFloat(basic_amount) / parseFloat(total_days) * parseFloat(leaves);
          $('#amount').val(totalamount.toFixed(2)); 
        }
    }
    
}
</script>