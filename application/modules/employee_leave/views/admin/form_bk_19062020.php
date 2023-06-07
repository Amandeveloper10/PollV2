<?php $SysConfigauthenticaton = checkConfig1();?>
<form method="post"  name="employee_leave_form" id="employee_leave_form" enctype="multipart/form-data" >
<?php $url = (isset($id) && $id != '') ? base_url('admin_edit_employee_leave').'/'.$id : base_url('admin_add_employee_leave');?>
    <div class="row" style="margin-bottom: 0 !important">       
<?php if($this->session->userdata('futureAdmin')->detail->employee_id == '0'){ ?>
    <div class="col-sm-6 col-xl-4">
    <div class="form-group">
        <label>Employee No</label>
            <select id="employee_id" name="employee_id" class="form-control js-example-basic-multiple" <?php if(isset($id) && $id != ''){echo 'disabled';}?> onchange="getLeaveType(),checkupapprovedleave();">
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
            <span id="exist_leave" style="color:red"></span>
            <?php if(isset($id) && $id != ''){echo '<input type="hidden" name="employee_id" id="employee_id" value="'.$data_single->employee_id.'" />';}?>
    </div>
	
    </div>
<?php }else{?>
	<input type="hidden" name="employee_id" id="employee_id" value="<?php echo $this->session->userdata('futureAdmin')->detail->employee_id;?>" />
<?php } ?>
    <div class="col-sm-6 col-xl-4" id="leavetypediv" <?php if(isset($data_single->leave_type_id) && $data_single->leave_type_id!='0'){ echo 'style=""'; }else{ echo 'style="display:none;"';} ?>>
    <div class="form-group" id="leaveDiv" >
        <?php if(isset($data_single->leave_type_id) && $data_single->leave_type_id!='0'){ ?>
        <label>Leave Type</label>
             <select id="leave_type" name="leave_type" class="form-control">
                <option value="">Select</option>          

              <?php
                if(!empty($all_leave_type))
                {
                foreach ($all_leave_type as $value) {
                    if(in_array($value->id, $emp_leave)){
                    if(isset($data_single->employee_id) && $data_single->employee_id!=''){
                       $result=  $this->EmpLeaveModel->leave_due_day($value->id,$data_single->employee_id);
                       //$result1 =  $this->EmpLeaveModel->settlement_due_day($value->id,$_POST['id']);
                       //$due=$value->unit - ($result + $result1);
                        if(!empty($result)){
                          $due=$result;
                      }else{
                        $due=0;
                      }
                    }else{
                        $due=0;
                    }
                
                ?>
                <option value="<?php echo $value->id;?>" <?php echo ((isset($data_single->leave_type_id) && ($data_single->leave_type_id==$value->id)) ? 'selected' : ''); ?>><?php echo $value->rule_name .' ( Balance: '.$due.' )';?></option>
                <?php
                } }
                }
                ?>
              
            </select>       
            <span id="leave_error" style="color:red"></span>
			<?php if($this->session->userdata('futureAdmin')->detail->employee_id != '0'){ ?>
			<span id="exist_leave" style="color:red"></span>
			<?php } ?>
<?php } ?>

    </div>
    </div>



    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Date</label>
            <input required type="text" class="form-control mydate_range"  name="leave_from" id="leave_from" value="<?php echo (isset($data_single->date_range) ? $data_single->date_range : ''); ?>">
        </div>
    </div>

    <!--<div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>To Date</label>
            <input required type="text"  class="form-control mysingle_date"  name="leave_to" id="leave_to" value="<?php echo (isset($data_single->leave_to) ? $data_single->leave_to : ''); ?>">
        </div>
    </div>-->

    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Total Days</label>
            <input type="text" class="form-control" name="leave_total_days" readonly id="leave_total_days" value="<?php echo (isset($data_single->leave_total_days) ? $data_single->leave_total_days : ''); ?>" >
        </div>
    </div>

    <div class="col-sm-6 col-xl-4" style="display: none;">
        <div class="form-group">
        <label class="d-block">Ticket</label>
        <div class="d-inline-block mt-2">
            <div class="custom-control custom-radio ks-radio ks-success">
                <input onclick="checkTicket('Yes');" <?php echo ((isset($data_single->leave_ticket) && ($data_single->leave_ticket=='Yes')) ? 'checked' : ''); ?> type="radio" class="custom-control-input" name="leave_ticket" id="leave_ticket" value="Yes"
                       data-validation="radio_group"
                       data-validation-qty="min1">
                <label class="custom-control-label" for="leave_ticket">Yes</label>
            </div>
        </div>
        <div class="d-inline-block mt-2 ml-3">
            <div class="custom-control custom-radio ks-radio ks-danger">
                <input onclick="checkTicket('No');" <?php echo ((isset($data_single->leave_ticket) && ($data_single->leave_ticket=='No')) ? 'checked' : ''); ?>  type="radio" class="custom-control-input" name="leave_ticket" id="leave_ticket1" value="No"
                       data-validation="radio_group"
                       data-validation-qty="min1">
                <label class="custom-control-label" for="leave_ticket1">No</label>
            </div>
        </div>
    </div>
    <input type="hidden" name="leave_ticket_val" id="leave_ticket_val" value="<?php echo (isset($data_single->leave_ticket) ? $data_single->leave_ticket : 'No'); ?>">
    </div>


    <div class="col-sm-6 col-xl-4" style="display: none;">
        <div class="form-group">
            <label>Ticket Amount</label>
            <input readonly onkeyup="numeric(this);" type="text" class="form-control" name="leave_ticket_amount" id="leave_ticket_amount" value="<?php echo (isset($data_single->leave_ticket_amount) ? $data_single->leave_ticket_amount : ''); ?>">
        </div>
    </div>
 <div class="col-sm-6  col-xl-4">
                                
                                    <label for="" class="form-control-label">Upload Documents</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control forCustomFile inputDisabled" style="display:none;" placeholder="Upload file" value="Passport Images">
                                        <div class="custom-file replaceCustomFile" style="">
                                            <input type="file" name="passport_image[]" multiple class="custom-file-input" id="passport_image">
                                            <label class="custom-file-label" for="passport_image">Upload</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#idPassport" title="View"><span class="la la-eye ks-icon ml-2 pr-2 pr-2"></span></button>
                                        </div>
                                        <!-- Passport Modal -->
                                        <div class="modal fade" id="idPassport" tabindex="-1" role="dialog"aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Uploads</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <?php
                                                            if(!empty($data_single->documents))
                                                            {
                                                                $a=1;
                                                                $images=  explode(',', $data_single->documents);
                                                                foreach ($images as $value) {
//$my_url = 'http://www.example.com/5478631';
//$ext =substr($value, strrpos($value, "." )+1)."\n";
$ext = pathinfo($value, PATHINFO_EXTENSION);
//echo $ext;exit;
if($ext=='jpg' || $ext=='jpeg' || $ext=='png' || $ext=='bmp' || $ext=='gif')
{
    

                                                            ?>
                                                            <strong>  <?php echo $a++; ?>)</strong> <a href="<?php echo base_url('employees_loanapplication_download/').@$value; ?>">    <img src="<?php echo base_url(); ?>uploads/<?php echo @$value; ?>" alt="" class="img-fluid"></a><br>
                                                           <?php
}
else
    {
    ?>

                                                  <strong>     <?php echo $a++; ?>)  </strong>   <a href="<?php echo base_url('employees_loanapplication_download/').@$value; ?>"> <?php echo @$value; ?> </a><br>
    <?php
    }
    ?>
                                                            <?php
                                                            }
                                                            }
                                                            ?>
                                                            
                                                            
                                                          
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                </div>
                            </div>
    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Note</label>
             <textarea name="leave_note" id="leave_note" placeholder="Enter note" class="form-control inputDisabled" style="min-height: 60px; line-height: 20px;"><?php echo (isset($data_single->leave_note) ? $data_single->leave_note : ''); ?></textarea>
        </div>
    </div>

   
        </div>

  
        <div class="form-group form-buttons">
             <button type="button" name="submit" class="btn btn-success" id="leave_add">Save</button>
             <a href="javascript:;" class="btn btn-secondary" onclick="btnCloseForm();">Close</a>
        </div>
  

    <div id="due_leave">
     <?php
        if(!empty($all_leave_type))
        {
        foreach ($all_leave_type as $value) {

       if(isset($data_single->employee_id) && $data_single->employee_id!=''){
           $result=  $this->EmpLeaveModel->leave_due_day($value->id,$data_single->employee_id);
            //$result1 =  $this->EmpLeaveModel->settlement_due_day($value->id,$_POST['id']);
           // $due=$value->unit - ($result + $result1);
            if(!empty($result)){
            $due=$result;
            }else{
            $due=0;
            }
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

    function checkupapprovedleave(){
        var employee_id = $("#employee_id option:selected").val();
        //console.log(employee_id);
        $.post("<?php echo base_url('check_unapproved_leaves_of_employee'); ?>", {'id': employee_id}, function(result){
        //console.log(result);
        
        var res = result.split("@");
       if(res[0] == 'exist'){
        $('#exist_leave').text('You have '+res[1]+' not approved leaves.');
       
        $( "#leave_add" ).prop( "disabled", false );
       }else{
        $('#exist_leave').text('');
        $( "#leave_add" ).prop( "disabled", false );
       }

        });
    }
	
	$(document).ready(function () {
    $("#leave_add").click(function (event) {
        //stop submit the form, we will post it manually.
        event.preventDefault();
		var employee_id = $("#employee_id").val();
		var leave_type = $("#leave_type").val();
		var leave_from = $("#leave_from").val();
		var leave_total_days = $("#leave_total_days").val();
		
        
		if(employee_id == ''){
            //$("#prjname_err").text('Please enter project name');
            alert('Please select Employee ');
            $("#employee_id").focus(); 
            //$(".save").attr('disabled',true);
            return false;
         } else if(leave_type == ""){
           alert('Please select leave type');
            $("#leave_type").focus(); 
            //$(".save").attr('disabled',true);
            return false;
         }else if(leave_from == ""){
           alert('Please select date');
            $("#leave_from").focus(); 
            //$(".save").attr('disabled',true);
            return false;
         }else if(leave_total_days == ""){
           alert('Please select daterange');
            //$("#leave_total_days").focus(); 
            //$(".save").attr('disabled',true);
            return false;
         }
		 
		 
        // Get form
        var form = $('#employee_leave_form')[0];
    // Create an FormData object 
        var data = new FormData(form);
        //console.log(data); 
    // If you want to add an extra field for the FormData
        data.append("CustomField", "This is some extra data, testing");

    // disabled the submit button
        //$("#submit_exp").prop("disabled", true);

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "<?php echo $url; ?>",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (data) {
				notification('success');
				$(".form-wrapper").hide();
				 var url = '<?php echo base_url('employee_leave'); ?>/1';
                                  $("#pjax-container").load(url,function(response,status){       
                                  });
				//window.location.href="<?php echo base_url('employee_leave'); ?>";
				//notification(status);
               /*if(data == 'exist'){
					$("#Company").css('border','1px solid red');
					$("#from_date").css('border','1px solid red');
					$("#to_date").css('border','1px solid red');
					alert('Data already exists');
				}else{
				$("#add_experience").html(data);
				$("#Company").val('');
				$("#job_title").val('');
				$("#cv1").val('');
				$("#from_date").val('');
				$("#to_date").val('');
				$("#experience_div").show();
				$("#Company").css('border','');
				$("#from_date").css('border','');
				$("#to_date").css('border','');
				}*/
            },
           /* error: function (e) {

                $("#result").text(e.responseText);
                console.log("ERROR : ", e);
                $("#btnSubmit").prop("disabled", false);

            }*/
        });
	
    });

});

$(document).ready(function(){
 <?php //if((isset($id) && $id == '')) {
	 if($this->session->userdata('futureAdmin')->detail->employee_id != '0'){ ?>
getLeaveType();
checkupapprovedleave()
 <?php } //} ?>
});

</script>
