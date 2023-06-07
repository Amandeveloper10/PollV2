<form onsubmit="return myFunction('employee_leave_form')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_employee_leave').'/'.$id : base_url('admin_add_employee_leave'); ?>" name="employee_leave_form" id="employee_leave_form" enctype="multipart/form-data" >
    <div class="row" style="margin-bottom: 0 !important">

       

    <div class="col-md-4">
    <div class="form-group">
        <label>Employee No</label>
            <select id="employee_id" name="employee_id" class="form-control">
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
    </div>
    </div>
            <table width="100%">
                <thead>
                <tr>
                    <th width="50%"> <label for="" class="form-control-label">Leave Type</label></th>
                    <th width="40%"><label for="" class="form-control-label">Opening Balance</label></th>
                    <th width="10%"></th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><div class="form-group">
                       
                        <select name="leavetype[]" id="leavetype"  class="form-control">
                            <option value="">Please select</option>
                            <?php
                       if(!empty($all_leaves))
                       {
                           foreach ($all_leaves as $value) {
                             
                        ?>
                       
                        <option value="<?php echo @$value->id;?>" <?php if(@$data_qualification->highest_qualification==@$value->id) {  ?> selected="selected" <?php } ?> ><?php echo @$value->rule_name;?></option>
                       <?php
                           }
                        }
                        ?>
                        </select>
                    </div>
</td>
                        <td><div class="form-group"> <input type="text" placeholder="Enter opening balance" class="form-control" value="" name="opening_balance[]" id="opening_balance"></div></td>
                        <td> <label><a href="javascript:void(0)" class="text-primary" onclick="get_div();">Add</a></label></td>
                    </tr>
                </tbody>
                <tbody id="add_leaves"></tbody>
            </table>
                          
        </div>

      
<div class="row">
    <div class="col-md-12">
    <div class="form-group text-right">
         <button type="submit" name="submit" class="btn btn-dark" id="leave_add">Save</button>
    </div>
    </div>
</div>

    <div id="due_leave">
     <?php
        if(!empty($all_leave_type))
        {
        foreach ($all_leave_type as $value) {

       if(isset($data_single->employee_id) && $data_single->employee_id!=''){
           $result=  $this->EmpLeaveModel->leave_due_day($value->id,$data_single->employee_id);
            $result1 =  $this->EmpLeaveModel->settlement_due_day($value->id,$_POST['id']);
            $due=$value->unit - ($result + $result1);
        }else{
            $due=0;
        }
        
        ?>
        <input type="hidden" name="due_leave<?php echo $value->id;?>" id="due_leave<?php echo $value->id;?>" value="<?php echo $due;?>" />
        
        <?php
        }
        }
        ?>
    </div>
    
    

</form>

<script type="text/javascript">
     function get_div(){
        var leavetype = $('#leavetype').val();
        var opening_balance = $('#opening_balance').val();
        var myList = [];

        $('.sel').each(function() {

        myList.push($(this).val())
        });
        if(leavetype != '' && opening_balance !=''){
            $.post("<?php echo base_url('div_colon_for_opening_balance'); ?>", {leavetype: leavetype,value: myList}, function(result){ 
            //console.log(result);
            $('#add_leaves').append(result);  
                //$(".repeat_sal_component").append(result);
                //$("#experience_div").val(div_id);
                //$("#experience_div_type").val(div_id_type);
                });
            //$('#add_leaves').append('<tr></tr>');
        }else{
            alert('Please select leave type and leave balance');
        }

    }
</script>
