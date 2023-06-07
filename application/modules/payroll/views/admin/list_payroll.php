<div class="ks-page-header">
    <section class="ks-title">
        <h3>Pay Run for <?=date('F', mktime(0, 0, 0, $month, 10)).' - '.$year?></h3>
        <input type="hidden" name="hidden_Calender_Days" id="hidden_Calender_Days" value="<?=$Calender_Days?>">
        <input type="hidden" name="hidden_month" id="hidden_month" value="<?=$month?>">
        <input type="hidden" name="hidden_month_name" id="hidden_month_name" value="<?=date('F', mktime(0, 0, 0, $month, 10))?>">
        <input type="hidden" name="hidden_year" id="hidden_year" value="<?=$year?>">
        <input type="hidden" name="hidden_fromdate" id="hidden_fromdate" value="<?=$from_date?>">
        <input type="hidden" name="hidden_todate" id="hidden_todate" value="<?=$to_date?>">

        <input type="hidden" name="hidden_mode" id="hidden_mode" value="<?=$mode?>">
    </section>
</div>
 
 
 <div class="ks-page-content">
    <div class="ks-page-content-body">
        <div class="container-fluid">        
            <div class="content-wrapper">
                <div class="custom-tab payrolltab">
                    <ul class="nav nav-pills"> 
                    <?php 
                      $attendence_freez = $this->PayrollModel->get_result_data('attendance_freeze_payroll', array('month' => $month,'year' => $year));
                      $payable_freez = $this->PayrollModel->get_result_data('leaves_freeze_payroll', array('month' => $month,'year' => $year));
                      $adhoc_freez = $this->PayrollModel->get_result_data('adhoc_freeze_payroll', array('month' => $month,'year' => $year));
                      $hold_freez = $this->PayrollModel->get_result_data('hold_freeze_payroll', array('month' => $month,'year' => $year));
                      $payroll_freez = $this->PayrollModel->get_result_data('employee_payroll', array('month' => $month,'year' => $year));
					  $sal_temp = $this->PayrollModel->get_result_data('employee_salary_temp', array('month' => $month,'year' => $year));
                      ?>                    
                        <li class="nav-item"><a class="nav-link active hide" id="attnlink" data-toggle="pill" onclick="get_attendance();">Attendance <i class="la la-check <?php if(!empty($attendence_freez)){ echo 'bg-success';} ?>"></i></a></li> 

                        <li class="nav-item"><a class="nav-link hide" id="paynlink" data-toggle="pill" onclick="get_Payable();">Payable Day <i class="la la-check <?php if(!empty($payable_freez)){ echo 'bg-success';} ?>"></i></a></li>

                        <li class="nav-item"><a class="nav-link hide" id="adhocnlink" data-toggle="pill" onclick="get_AdhokPay();">Adhok Pay/Deduction <i class="la la-check <?php if(!empty($adhoc_freez)){ echo 'bg-success';} ?>"></i></a></li>

                        <li class="nav-item"><a class="nav-link hide" id="holdnlink" data-toggle="pill" onclick="get_HoldSalary();">Hold Salary <i class="la la-check <?php if(!empty($hold_freez)){ echo 'bg-success';} ?>"></i></a></li>

                        <li class="nav-item"><a class="nav-link register" id="regnlink" data-toggle="pill" onclick="get_Register();">Register <i class="la la-check <?php if(!empty($payroll_freez)){ echo 'bg-success';} ?>"></i></a></li>
                    </ul>
                </div>                
                <div class="tab-content pay_roll_container">
                    <div class="tab-pane fade active show" style="overflow: hidden;" id="tab_All" role="tabpanel" aria-expanded="false">
                        
                    </div> 
                </div>
               
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="modalAdhoc">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
          <div class="row" style="width:calc(100% + 30px)">
              <div class="col-6"><h4 class="modal-title" id="adhoc_pay">Adhoc Pay/Deduction</h4></div>
<!--              <div class="col-6 text-right"><button onclick="save_adhoc_pay();" class="btn btn-success pull-right">Save</button>        <button type="button" class="close" data-dismiss="modal">&times;</button></div>-->
          </div>
        

      </div>

      <!-- Modal body -->
      <div class="modal-body">
          <div class="row">
              <div class="col-12"><div class="form-group">
              <label>Global Adhoc Amount</label>
                  <input type="hidden" class="form-control text-right" value="" name="adhoc_employee_id" id="adhoc_employee_id">
                  <input type="hidden" class="form-control text-right" value="" name="adhoc_type" id="adhoc_type">
                  <table class="table table-bordered table-hover" id="tab_logic">
                <thead>
                    <tr>
                        <th>Component</th>
                        <th>Amount</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <tr id='add_row0' class="sel">
                <td id="componentAdd">
               
                </td>
                <td>
                <input type="text" onkeyup="numeric(this)" name="adhoc_amount" id="adhoc_amount0" class="form-control text-right" placeholder="0.00">
               </td>
               <td>
                <button id="add_adhob" type="submit" onclick="get_div_adhoc();" class="btn btn-primary">Add</button>
            </td>
                </tr>
                </tbody>
                <tbody id="repead_row"></tbody>
          
      
   </table>
              
          </div></div>
              
          </div>
        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
          
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button onclick="save_adhoc_pay();" type="submit" name="submit" id="submit" class="btn btn-success pull-right">Save</button>
      </div>
    </div>
  </div>
</div>


<!-- The Modal -->
<div class="modal" id="holdmodal">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
          <div class="row" style="width:calc(100% + 30px)">
              <div class="col-6"><h4 class="modal-title">Update Payroll Holding</h4></div>
              <div class="col-6 text-right"><button onclick="freeze_holding()" class="btn btn-danger">Freeze Holding</button>
                  <button  onclick="save_hold()" class="btn btn-primary hold_button_new">Hold</button>
               
<!--        <button type="button" class="close" data-dismiss="modal">&times;</button>--></div>
          </div>
      </div>

      <!-- Modal body -->
      <div class="modal-body">          
        <div class="table-responsiveX">
            <form name="hold_form" id="hold_form" method="post">
                   <input type="hidden" name="hidden_month_hold" id="hidden_month_hold" value="<?=$month?>" >
                  <input type="hidden" name="hidden_year_new_hold" id="hidden_year_new_hold" value="<?=$year?>" >
                  <input type="hidden" class="form-control text-right" value="" name="hold_employee_id" id="hold_employee_id">
                  
                  
              </form>
        <table id="hold_table" data-pagination="true" class="table table-bordered">
            <thead class="thead-default">
                <tr>
                    <th width="20">
                        <div class="custom-control custom-checkbox">
                            <input onclick="CheckAllChkhold(this);" id="hold_check" type="checkbox" class="custom-control-input" >
                            <label class="custom-control-label" for="hold_check"></label>
                        </div>
                    </th>
                    <th>Employee Name.</th>

                </tr>
            </thead>
            <tbody>
					<?php
					if (!empty($all_data)) {
					// $this->load->model('admin/PayrollModel');
					foreach ($all_data as $data) {
					$addhocpay = $this->PayrollModel->load_all_employee_with_hold($month,$year,$data->id);

					?>
					<tr id="row_<?php echo $data->id; ?>">
					<td><div class="custom-control custom-checkbox">
					<input id="hold_employee_check<?php echo $data->id; ?>" name="mail_hold"  type="checkbox" <?php if(@$addhocpay->employee_id ==$data->id) { echo 'checked'; } ?> value="<?php echo $data->id; ?>" class="custom-control-input checkBoxClasshold lichi_hold" >
					<label class="custom-control-label" for="hold_employee_check<?php echo $data->id; ?>"></label>
					</div></td>

					<td><?php echo @$data->first_name . ' ' . @$data->middle_name . ' ' . @$data->last_name; ?> (<?php echo $data->employee_no; ?>)</td>

					</tr>
					<?php
					}
					}
					?>
                
            </tbody>
        </table>
      </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="notification_heading"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" >
       <p id="notification_body"></p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <a data-dismiss="modal" id="modal_confirm" class="btn btn-primary" href="#">Confirm</a> 
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<div class="modal" id="myModal_register">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="notification_heading_register"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <input type="hidden" class="form-control text-right" value="" name="register_employee_id" id="register_employee_id">
      </div>

      <!-- Modal body -->
      <div class="modal-body" >
         <p> If you click on Confirm button.Then you have to recomplete all the process.Process are given below.. </p>
        <li>Attendance</li>
        <li>Payable Day</li>
        <li>Adhok Pay/Deduction</li>
        <li>Hold Salary</li>
        <li>Register</li>
       <p id="notification_body_register"></p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <a data-dismiss="modal" id="modal_confirm_register" class="btn btn-primary" href="#">Confirm</a> 
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


<div style="border:1px solid #000;" class="modal" id="salaryslipmodal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
          <div class="row" style="width:calc(100% + 30px)">
              <div class="col-6"><h4 class="modal-title" id="heading_salary">Salary Slip</h4></div>
              
              <div class="col-6 text-right"><button onclick="download();" id="salary_slip_button"  class="btn btn-danger ">Download</button>
                  <input type="hidden" name="employee_id_salary" id="employee_id_salary" value="" />
               
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          </div>
      </div>

      <!-- Modal body -->
      <div class="modal-body">          
        <div class="salaryslipmodal">
            
             
      </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
  </div>
  
  <div style="border:1px solid #000;" class="modal" id="salaryslipmodalfinal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
          <div class="row" style="width:calc(100% + 30px)">
              <div class="col-6"><h4 class="modal-title" id="heading_salary">Salary Slip</h4></div>
              
              <div class="col-6 text-right"><button onclick="download_final();" id="salary_slip_button"  class="btn btn-danger ">Download</button>
                  <input type="hidden" name="employee_id_salary" id="employee_id_salary" value="" />
               
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          </div>
      </div>

      <!-- Modal body -->
      <div class="modal-body">          
        <div class="salaryslipmodalfinal">
            
             
      </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
  </div>

<script>
 
//attendance
$( document ).ready(function() {
var month = $('#hidden_month').val();
var year = $('#hidden_year').val();
var CalenderDays = $('#hidden_Calender_Days').val();
var fromdate =  $('#hidden_fromdate').val();
var todate =  $('#hidden_todate').val();
var mode = $('#hidden_mode').val();
var startingdate = '';
<?php if(empty($attendence_freez)) { ?>
get_attendance();
<?php }elseif(empty($payable_freez)){ ?>
get_Payable();
<?php }elseif(empty($adhoc_freez)){ ?>
get_AdhokPay();
<?php }elseif(empty($hold_freez)){ ?>
get_HoldSalary();
<?php }elseif(empty($sal_temp)){ ?>
get_Register();
///$("#regnlink").css("display", "none");
<?php } ?>

<?php if(empty($sal_temp)){ ?>
$("#regnlink").css("display", "none");
<?php } ?>
 
/*if(mode == 'payroll'){
$.post("<?php echo base_url('employee_attendance_payroll'); ?>", {'month': month, 'year': year,'CalenderDays':CalenderDays,'startingdate':startingdate,'fromdate':fromdate,'todate':todate}, function (result) {
$('#tab_All').html(result);
});
}else{
 $.post("<?php echo base_url('employee_Register_payroll_view'); ?>", {'month': month, 'year': year,'CalenderDays':CalenderDays,'startingdate':startingdate,'fromdate':fromdate,'todate':todate}, function (result) {
$('#tab_All').html(result);
$('.register').addClass('active');
$('.hide').removeClass('active');

});
}*/
});

//attendance
function get_attendance(){  
var month = $('#hidden_month').val();
var year = $('#hidden_year').val();
var CalenderDays = $('#hidden_Calender_Days').val();
var fromdate =  $('#hidden_fromdate').val();
var todate =  $('#hidden_todate').val();
var startingdate = '';
$('#attnlink').addClass('active');
$('#paynlink').removeClass('active');
$('#adhocnlink').removeClass('active');
$('#holdnlink').removeClass('active');
$('#regnlink').removeClass('active');


$.post("<?php echo base_url('employee_attendance_payroll'); ?>", {'month': month, 'year': year,'CalenderDays':CalenderDays,'startingdate':startingdate,'fromdate':fromdate,'todate':todate}, function (result) {
$('#tab_All').html(result);
});
}



function freeze_attendance(){
    var month = $('#hidden_month').val();
    var year = $('#hidden_year').val();
    var fromdate =  $('#hidden_fromdate').val();
    var todate =  $('#hidden_todate').val();

    $.post("<?php echo base_url('save_freeze_month_attendance'); ?>", {'month': month, 'year': year,'fromdate':fromdate,'todate':todate}, function (result) {
      //console.log(result);
      get_attendance();
    if(result=='yes'){
    // $('#attendance_freeze').removeClass('btn-primary');
    // $('#attendance_freeze').addClass('btn-outline-success active');
    alert('You have allready freezed this month ');
    }
    else{
    //$('#attendance_freeze').removeClass('btn-primary');
    // $('#attendance_freeze').addClass('btn-outline-success active');

    notification('success');   
    }

    }); 
       
    }


    function freeze_leaves(){
    var month = $('#hidden_month').val();
    var year = $('#hidden_year').val();
    var fromdate =  $('#hidden_fromdate').val();
    var todate =  $('#hidden_todate').val();

    

     var LOP = new Array();
        
        $(".losofpay").each(function(){            
            var vall = $(this).val();
            vall = vall.replace(/\,/g,'');
            vall = parseFloat(vall);
            //console.log('vall--'+vall);
            var valId = $(this).data('id');
            var finalVal = valId+'##'+vall;

            LOP.push(finalVal);
            
          })
        //alert(LOP);
        var TotalDays = new Array();

        $(".totaldays").each(function(){            
            var vall1 = $(this).val();
            vall1 = vall1.replace(/\,/g,'');
            vall1 = parseFloat(vall1);
            //console.log('vall--'+vall);
            var valId1 = $(this).data('id');
            var finalVal1 = valId1+'##'+vall1;

            TotalDays.push(finalVal1);
            
          })
//alert(TotalDays);
   

    $.post("<?php echo base_url('save_freeze_month_leaves'); ?>", {'month': month, 'year': year,'fromdate':fromdate,'todate':todate,'LOP':LOP,'TotalDays':TotalDays}, function (result) {
      //console.log(result);
      get_Payable();
    if(result=='yes'){
    // $('#attendance_freeze').removeClass('btn-primary');
    // $('#attendance_freeze').addClass('btn-outline-success active');
    alert('You have allready freezed this month ');
    }
    else{
    //$('#attendance_freeze').removeClass('btn-primary');
    // $('#attendance_freeze').addClass('btn-outline-success active');

    notification('success');   
    }

    }); 
       
    }


//payble
function get_Payable(){  
var month = $('#hidden_month').val();
var year = $('#hidden_year').val();
var CalenderDays = $('#hidden_Calender_Days').val();
var fromdate =  $('#hidden_fromdate').val();
var todate =  $('#hidden_todate').val();
var startingdate = '';

$('#attnlink').removeClass('active');
$('#paynlink').addClass('active');
$('#adhocnlink').removeClass('active');
$('#holdnlink').removeClass('active');
$('#regnlink').removeClass('active');

$.post("<?php echo base_url('employee_Payable_payroll'); ?>", {'month': month, 'year': year,'CalenderDays':CalenderDays,'startingdate':startingdate,'fromdate':fromdate,'todate':todate}, function (result) {
$('#tab_All').html(result);
});
}


//AdhokPay
function get_AdhokPay(){  
var month = $('#hidden_month').val();
var year = $('#hidden_year').val();
var CalenderDays = $('#hidden_Calender_Days').val();
var fromdate =  $('#hidden_fromdate').val();
var todate =  $('#hidden_todate').val();
var startingdate = '';

$('#attnlink').removeClass('active');
$('#paynlink').removeClass('active');
$('#adhocnlink').addClass('active');
$('#holdnlink').removeClass('active');
$('#regnlink').removeClass('active');

$.post("<?php echo base_url('employee_AdhokPay_payroll'); ?>", {'month': month, 'year': year,'CalenderDays':CalenderDays,'startingdate':startingdate,'fromdate':fromdate,'todate':todate}, function (result) {
$('#tab_All').html(result);
});
}

//hold
function get_HoldSalary(){  
var month = $('#hidden_month').val();
var year = $('#hidden_year').val();
var CalenderDays = $('#hidden_Calender_Days').val();
var fromdate =  $('#hidden_fromdate').val();
var todate =  $('#hidden_todate').val();
var startingdate = '';

$('#attnlink').removeClass('active');
$('#paynlink').removeClass('active');
$('#adhocnlink').removeClass('active');
$('#holdnlink').addClass('active');
$('#regnlink').removeClass('active');

$.post("<?php echo base_url('employee_Hold_payroll'); ?>", {'month': month, 'year': year,'CalenderDays':CalenderDays,'startingdate':startingdate,'fromdate':fromdate,'todate':todate}, function (result) {
$('#tab_All').html(result);
$("#regnlink").css("display", "block");
});
}




//Register
function get_Register(){  
var month = $('#hidden_month').val();
var year = $('#hidden_year').val();
var CalenderDays = $('#hidden_Calender_Days').val();
var fromdate =  $('#hidden_fromdate').val();
var todate =  $('#hidden_todate').val();
var startingdate = '';
$.post("<?php echo base_url('employee_Register_payroll'); ?>", {'month': month, 'year': year,'CalenderDays':CalenderDays,'startingdate':startingdate,'fromdate':fromdate,'todate':todate}, function (result) {
$('#tab_All').html(result);
});
}

function adhoc_pay(value){
      var  type='';
        if(value=='pay'){
         type= 'Adhoc Pay';   
        }
        if(value=='deduction'){
         type= 'Adhoc Deduction';   
        }
        $.post("<?php echo base_url('getallcomponent'); ?>", {value: value}, function(result){   
                 //alert(result);
            $('#componentAdd').html(result);
			$('#adhoc_amount0').val('0.00');
                });
        $('#adhoc_type').val(value);
        $('#adhoc_pay').html(type);
    }

function get_div_adhoc() {
var value = $(".sel").length;
var id = value - 1;
alert(id);
if($('#component'+id).val() == ''){
    alert('Please Select component');
    return true;
}
if($('#adhoc_amount'+id).val() == ''){
    alert('Please enter Amount');
    return true;
}

var adhoc_type = $("#adhoc_type").val();
$.post("<?php echo base_url('add_adhob_div'); ?>", {value: value,adhoc_type:adhoc_type}, function(result){   
                 //alert(result);
$('#repead_row').append(result);

                });
     
    }
function CheckAllChkadhoc(all) {
        $(".checkBoxClassadhoc").prop('checked', $(all).prop('checked'));
       var ids = [];
          $('input[name=mail]:checked').each(function() {
            //  alert($(this).val());
               ids.push($(this).val());

            });
            //alert(ids);
           $("#adhoc_employee_id").val(ids);
           

    }

function save_adhoc_pay(id) {
    var ids = [];
    $('input[name=mail]:checked').each(function() {

    ids.push($(this).val());
    });
    $("#adhoc_employee_id").val(ids);
    //alert(ids);
    var components = []; 
    $(".com").each(function() {
    components.push($(this).val());
    });

    var amounts = []; 
    $("input[name=adhoc_amount]").each(function() {
    amounts.push($(this).val());
    });

    var hidden_month = $('#hidden_month').val();
    var hidden_year = $('#hidden_year').val();
    var adhoc_type = $('#adhoc_type').val();
    var adhoc_employee_id = $('#adhoc_employee_id').val();
          if(ids!='')
           {
            $.post("<?php echo base_url('save_adhoc_pay'); ?>", {ids: ids,components: components,amounts:amounts,hidden_month:hidden_month,hidden_year:hidden_year,adhoc_type:adhoc_type,adhoc_employee_id:adhoc_employee_id}, function(result){
                //console.log(result);
                 notification('success');
                       //  alert(data);
                        //console.log(result);
                        $("#adhoc").html(result);
                        $("#adhoc_amount").val('');
                        $("#modalAdhoc").modal("hide");
                        $('#repead_row').html('');
                        adhoc_pay(adhoc_type);
                        get_AdhokPay();

            });
           }else{
            alert('please check at least anyone employee');
           }
         
       

            }

        function freeze_component(){
        var month=    $('#hidden_month').val();
        var year=   $('#hidden_year').val();
        $.post("<?php echo base_url('save_freeze_month_adhoc'); ?>", {'month': month, 'year': year}, function (result) {

        if(result=='yes'){
        //$('#adhoc_freeze').removeClass('btn-primary');
        // $('#adhoc_freeze').addClass('btn-outline-success active');
        alert('You have allready freezed this month ');
        }
        else{
        //$('#adhoc_freeze').removeClass('btn-primary');
        // $('#adhoc_freeze').addClass('btn-outline-success active');
        get_AdhokPay();
        notification('success');   
        }

        }); 


        }


        function CheckAllChkhold(all) {
        $(".checkBoxClasshold").prop('checked', $(all).prop('checked'));
       var ids = [];
          $('input[name=mail_hold]:checked').each(function() {
            //  alert($(this).val());
               ids.push($(this).val());
            });
            //alert(ids);
           $("#hold_employee_id").val(ids);
          
    }

    function CheckAllChkregister(all) {
        $(".checkBoxClassregister").prop('checked', $(all).prop('checked'));
       var ids = [];
          $('input[name=mail_register]:checked').each(function() {
            //  alert($(this).val());
               ids.push($(this).val());
            });
            //alert(ids);
           $("#register_employee_id").val(ids);
          
    }

      function freeze_holding(){
    var month =    $('#hidden_month').val();
    var year =   $('#hidden_year').val();
    var fromdate =  $('#hidden_fromdate').val();
    var todate =  $('#hidden_todate').val();
        $.post("<?php echo base_url('save_freeze_month_hold'); ?>", {'month': month, 'year': year,'fromdate':fromdate,'todate':todate}, function (result) {
           //console.log(result);
           // $(".attendance_table").html(result);
           
if(result=='yes'){
    //$('#hold_freeze').removeClass('btn-primary');
   // $('#hold_freeze').addClass('btn-outline-success active');
    alert('You have allready freezed this month ');
    
    
   /* $.post("<?php echo base_url('save_freeze_month_adhoc'); ?>", {'month': month, 'year': year}, function (result) {
        
        
        
        
        var ids = [];
          $('input[name=mail_hold]:checked').each(function() {
            //  alert($(this).val());
               ids.push($(this).val());
            });
           // alert(ids);
           if(ids!='')
           {
                $.ajax({
                    url: '<?php echo base_url('relize_hold'); ?>',
                    type: 'POST',
                    data: new FormData($("#hold_form")[0]),
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        notification('success');
                         alert(data);
                       console.log(data);
                       
                        $('#hold_employee_id').val('');
                      $('#holdmodal').modal('hide');
                    }
                });
                }
                else{
                
                alert('You have allready freezed this month ');
                }
        

        }); */
    
    
        }
        else{
   // $('#hold_freeze').removeClass('btn-primary');
   // $('#hold_freeze').addClass('btn-outline-success active');
           
          notification('success');   
        }
      
         

        }); 
        
       // openPayroll();
    }


     function save_hold(id) {
    
            //alert('sanchari');
 var ids = [];
          $('input[name=mail_hold]:checked').each(function() {
            //  alert($(this).val());
               ids.push($(this).val());
            });
          $('#hold_employee_id').val(ids);
            //alert(ids);
             $("#myModal").on('shown.bs.modal', function() {
            $("#modal_confirm").click(function() {
           if(ids!='')
           {
                $.ajax({
                    url: '<?php echo base_url('save_hold'); ?>',
                    type: 'POST',
                    data: new FormData($("#hold_form")[0]),
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        notification('success');
                       //console.log(data);
                       $( ".hold_button_new" ).hide();

                        $('#hold_employee_id').val('');
                        get_HoldSalary();
                     // openPayroll();
                    }
                });
                }
                else{
                
                alert('please check at least anyone employee');
                }

                });

            $("#notification_heading").html("Confirmation");
            $("#notification_body").html("Do you want to Hold or Relize this Employee?");
       }).modal("show");

            }

    function emp_register_delete() {
var month = $('#hidden_month').val();
var year = $('#hidden_year').val();
var fromdate =  $('#hidden_fromdate').val();
var todate =  $('#hidden_todate').val();
 var ids = [];
          $('input[name=mail_register]:checked').each(function() {
            //  alert($(this).val());
               ids.push($(this).val());
            });
          $('#register_employee_id').val(ids);
            //alert(ids);
             $("#myModal_register").on('shown.bs.modal', function() {
            $("#modal_confirm_register").click(function() {
                  $.post("<?php echo base_url('emp_register_delete'); ?>", {'ids':ids,'month': month, 'year': year,'fromdate':fromdate,'todate':todate}, function (result) {
                  //console.log(result);
                  get_Register();
                  if(result=='deleted'){
                  // $('#attendance_freeze').removeClass('btn-primary');
                  // $('#attendance_freeze').addClass('btn-outline-success active');
                  notification('success');
                  }
                  

                  }); 
                

                });

            $("#notification_heading_register").html("Confirmation");
            $("#notification_body_register").html("Do you want to delete this Employee?");
       }).modal("show");

            }




  function save_register(){
    var month = $('#hidden_month').val();
    var year = $('#hidden_year').val();
    var fromdate =  $('#hidden_fromdate').val();
    var todate =  $('#hidden_todate').val();

    $.post("<?php echo base_url('save_freeze_month_payroll'); ?>", {'month': month, 'year': year,'fromdate':fromdate,'todate':todate}, function (result) {
      console.log(result);
      get_Register();
    if(result=='yes'){
    // $('#attendance_freeze').removeClass('btn-primary');
    // $('#attendance_freeze').addClass('btn-outline-success active');
    alert('You have allready freezed this month ');
    }
    else{
    //$('#attendance_freeze').removeClass('btn-primary');
    // $('#attendance_freeze').addClass('btn-outline-success active');

    notification('success');   
    }

    }); 
       
    }


    function seemailslip(id){
    $('#employee_id_salary').val(id);
     var month = $('#hidden_month').val();
    var year = $('#hidden_year').val();
    var fromdate =  $('#hidden_fromdate').val();
    var todate =  $('#hidden_todate').val();
    var name_month = $('#hidden_month_name').val();
    var heading = 'Salary Slip for the month of '+name_month+' '+year;
    $.post("<?php echo base_url('download_salary_slip'); ?>", {'month': month, 'year': year, 'employee_id': id}, function (result) {
    // console.log(result);
    $(".salaryslipmodal").html(result);
    $('#salaryslipmodal').modal('show');
    $('#heading_salary').html(heading);

    }); 
    }

     function seemailslip_payroll(id){
    $('#employee_id_salary').val(id);
     var month = $('#hidden_month').val();
    var year = $('#hidden_year').val();
    var fromdate =  $('#hidden_fromdate').val();
    var todate =  $('#hidden_todate').val();
    var name_month = $('#hidden_month_name').val();
    var heading = 'Salary Slip for the month of '+name_month+' '+year;
    $.post("<?php echo base_url('download_salary_slip_payroll'); ?>", {'month': month, 'year': year, 'employee_id': id}, function (result) {
     console.log(result);
    $(".salaryslipmodalfinal").html(result);
    $('#salaryslipmodalfinal').modal('show');
    $('#heading_salary').html(heading);

    }); 
    }
	
	 function download_final() {
   // alert(1);
    var month = $('#hidden_month').val();
    var year = $('#hidden_year').val();
    var id=   $('#employee_id_salary').val();
    window.location.assign("<?php echo base_url('down_slip_final'); ?>/"+month+'/'+year+'/'+id);
//            $.post("<?php echo base_url('down_slip_final'); ?>", {'month': month, 'year': year, 'employee_id': id}, function (result) {
//            console.log(result);
//            //$(".salaryslipmodal").html(result);
            $('#salaryslipmodalfinal').modal('hide');
            $('#employee_id_salary').val();
//        }); 
}


    function download () {
   // alert(1);
    var month = $('#hidden_month').val();
    var year = $('#hidden_year').val();
    var id=   $('#employee_id_salary').val();
    window.location.assign("<?php echo base_url('down_slip'); ?>/"+month+'/'+year+'/'+id);
//            $.post("<?php echo base_url('down_slip'); ?>", {'month': month, 'year': year, 'employee_id': id}, function (result) {
//            console.log(result);
//            //$(".salaryslipmodal").html(result);
            $('#salaryslipmodal').modal('hide');
            $('#employee_id_salary').val();
//        }); 
}

</script>
<style>
/*    .dataTable_buttons{display: none!important}*/
/*    table tr th {white-space: nowrap}
    table tr td {white-space: nowrap}        
    .DTFC_LeftBodyLiner{overflow-x: hidden}*/
.col-fixed-400{-ms-flex: 0 0 110px;flex: 0 0 110px;max-width: 110px;}
.dataTable_buttons .dt-buttons{margin: 0!important}
table tr td,table tr th {white-space: nowrap}
.table tr td{border-bottom: 1px solid #dee0e1; border-top:0}
.table tr:first-child td{border-top: 1px solid #dee0e1;}
div.dataTables_wrapper > .row:last-child{border-top: 0}    
.table-responsive{min-height: 50vh}
</style>