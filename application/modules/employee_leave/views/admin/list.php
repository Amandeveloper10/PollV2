<?php $SysConfigauthenticaton = checkConfig1();
$jquery_date_format = $SysConfigauthenticaton->jquery_date_format;
//echo '<pre>'; print_r($SysConfigauthenticaton); die;?>
<div class="ks-page-header">
    <section class="ks-title">
        <h3>Leave > Applications</h3>
        <div class="ks-controls">            
            <a href="javascript:;" class="btn btn-icon btn-light btn_maximize"><i class="far fa-window-maximize"></i></a>            
            <div class="header-search">
            <a href="javascript:void(0)" class="btn btn-warning btn-icon" onclick="$('.drop_search').slideToggle();">
                <i class="fa fa-search"></i>
            </a>
            <div class="drop_search">             
                    <form method="get" id="searchForm">
                        <div class="form-group">
                            <label for="" class="form-control-label">Start Date</label>
                            <input required  type="text" placeholder="Enter Start Date" class="form-control mysingle_date" name="start_date" id="start_date" value="">
                            <span id="stdateErr" style="color: red;"></span>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-control-label">End Date</label>
                            <input required  type="text" placeholder="Enter End Date" class="form-control mysingle_date" name="end_date" id="end_date" value="">
                            <span id="enddateErr" style="color: red;"></span>
                        </div>
                        <button type="button" onclick="getSearchLeave();" name="submit" class="btn btn-warning closeSearch save-profile-btn">Search</button>                            
                    </form>
                </div>            
        </div>
            <a class="btn btn-primary" href="javascript:void(0)" onclick="openForm('');">Add</a>
        </div>
    </section>
</div>

<div class="ks-page-content">
    <div class="ks-page-content-body">
        <div class="container-fluid">
        <div class="content-wrapper">
                  
<div class="row" id="calAtt" style="display: none;">
            <?php $start_yr = '2018';
                        $end_yr = date('Y');
                        ?>

                        <div class="col-md-4">
                          <div class="form-group">
                            <select id='month_id' name="month_id" class="form-control">
                                <option value=''>Select Month</option>
                                <option value='01' <?php echo (date('m')=='01') ? 'selected' : ''; ?> >Janaury</option>
                                <option value='02' <?php echo (date('m')=='02') ? 'selected' : ''; ?>>February</option>
                                <option value='03' <?php echo (date('m')=='03') ? 'selected' : ''; ?>>March</option>
                                <option value='04' <?php echo (date('m')=='04') ? 'selected' : ''; ?> >April</option>
                                <option value='05' <?php echo (date('m')=='05') ? 'selected' : ''; ?> >May</option>
                                <option value='06' <?php echo (date('m')=='06') ? 'selected' : ''; ?> >June</option>
                                <option value='07' <?php echo (date('m')=='07') ? 'selected' : ''; ?> >July</option>
                                <option value='08' <?php echo (date('m')=='08') ? 'selected' : ''; ?> >August</option>
                                <option value='09' <?php echo (date('m')=='09') ? 'selected' : ''; ?> >September</option>
                                <option value='10' <?php echo (date('m')=='10') ? 'selected' : ''; ?> >October</option>
                                <option value='11' <?php echo (date('m')=='11') ? 'selected' : ''; ?> >November</option>
                                <option value='12' <?php echo (date('m')=='12') ? 'selected' : ''; ?> >December</option> 
                            </select>                        
                        </div>
                      </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <select id='year_id' name="year_id" class="form-control">
                                <option value=''>Select Year</option>                               
                                <?php for ($i=2018; $i <= $end_yr; $i++) {  ?>
                                   <option value='<?php echo $i; ?>' <?php echo (date('Y')==$i) ? 'selected' : ''; ?>><?php echo $i; ?></option>
                            <?php } ?> 
                            </select>
                                    </div>                 
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                   <a href="javascript:void(0)" class="btn btn-danger btn-add-attendance" onclick="searchleavedetails('');">Search Registered</a>
                 </div>
                 </div>

          </div>
         
          
            <div class="form-wrapper pb-0" style="display:none">
                
            </div>
            
            <div id="register_leave_search" class="table-responsiveX">
            <table id="payrolltable" class="table table-list2">                                    
                <thead>
                  <tr>
                    <th>Employee </th>
                    <th>Leave Type</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Total Days</th>                   
                    <th>Status</th>
                   
                    <th></th>
                </tr>
                </thead>
                <tbody id="searchData">
                <?php

                  if(!empty($all_data))
                  {
                  foreach ($all_data as $value) {
                      ?>
                  
                <tr>
                    <td class="d-flex align-items-center">
                        <img <?php if (isset($value->personal_image) && $value->personal_image != '') { ?> src="<?php echo base_url(); ?>uploads/<?php echo (isset($value->personal_image) && $value->personal_image != '') ? $value->personal_image : ''; ?>" <?php } else { ?> src="<?php echo base_url(); ?>/assets/img/avatars/placeholders/ava-128.png" <?php } ?>class="ks-avatar" alt="" width="36" height="36">
                        <div><?php
                                if(@$value->approved=='' || @$value->approved=='No')
                                {
                                ?>
                                <a href="javascript:void(0)" onclick="openForm('<?php echo @$value->id;?>')" class="" style="cursor:pointer;"><?php echo @$value->first_name . ' ' . @$value->middle_name . ' ' . @$value->last_name; ?><br>
                            <small><?php echo $value->employee_no; ?></small></a><?php } else { ?> <?php echo @$value->first_name . ' ' . @$value->middle_name . ' ' . @$value->last_name; ?><br>
                            <small><?php echo $value->employee_no; ?></small> <?php } ?>                      </div>
                    </td> 					
                     <td>
                    <?php 
                    $type = $this->EmpLeaveModel->get_row_data('master_leave_rules',array('id'=>$value->leave_type_id,'is_active'=>'Y','delete_flag'=>'N'));
                    echo @$type->rule_name; ?>
                    </td>
                    <td>
                        <?php echo date($SysConfigauthenticaton->date_format,strtotime(@$value->leave_from)); ?>
                    </td>
                    <td>
                       <?php echo date($SysConfigauthenticaton->date_format,strtotime(@$value->leave_to)); ?>
                    </td>
                    <td>
                       <?php echo @$value->leave_total_days; ?>
                    </td>
                   <!-- <td>
                       <?php echo @$value->leave_ticket; ?>
                    </td>
                    <td>
                       <?php echo @$value->leave_ticket_amount; ?>
                    </td> -->
                    <td>
                        <?php
                                if(@$value->approved=='No')
                                {
                                ?>
                                <span style="color: red;"><?php echo '<label class="badge badge-danger">Rejected</label>';?></span>
                                <?php
                                }
                                ?>
                                 <?php
                                if(@$value->approved=='')
                                {
                                ?>
                                <label class="badge badge-info">New</label> 
                                <?php
                                }
                                ?>
                                <?php
                                if(@$value->approved=='Yes')
                                {
                                ?>
                                <span style="color: green;"><?php echo '<label class="badge badge-success">Approved</label>';?></span>
                           <?php
                                }
                                ?>
                    </td>
                   


                     <td class="table-action">
                        <div class="dropdown">
                            <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="la la-ellipsis-v"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                              <?php
                                if(@$value->approved=='' || @$value->approved=='No')
                                {
                                ?>
                                <a href="javascript:void(0)" onclick="openForm('<?php echo @$value->id;?>')" class="dropdown-item" style="cursor:pointer;">
                                    <span class="la la-pencil icon text-info"></span> Edit
                                </a>
                                <?php
                                }
                                ?>
                                
                                <!-- <a href="javascript:void(0)" class="dropdown-item" style="cursor:pointer;" onclick="employees_leave_application_delete('<?php echo @$value->id;?>')"><span class="la la-trash icon text-danger"></span> Delete</a> -->
                                <?php /* ?><?php
                                if(@$value->approved=='No')
                                {
                                ?>
                                <a class="dropdown-item" style="cursor:pointer;" onclick="approve_status('<?php echo @$value->id;?>','Yes','<?php echo @$value->employee_id;?>')">Make Approve</a>
                                <?php
                                }
                                ?><?php */ ?>
								<?php if($this->session->userdata('futureAdmin')->detail->employee_id == '0'){ ?>
                                 <?php
                                if(@$value->approved=='')
                                {
                                ?>
                                <a class="dropdown-item" style="cursor:pointer;" onclick="approve_status('<?php echo @$value->id;?>','Yes','<?php echo @$value->employee_id;?>')">Make Approve</a>
                                <?php
                                }elseif(@$value->approved=='Yes') { 
                                ?>
								 <a class="dropdown-item" style="cursor:pointer;" onclick="approve_status('<?php echo @$value->id;?>','No','<?php echo @$value->employee_id;?>')">Make Not Approve</a>
								<?php
                                }else if(@$value->approved=='No'){ ?>
								<a class="dropdown-item" style="cursor:pointer;" onclick="approve_status('<?php echo @$value->id;?>','Yes','<?php echo @$value->employee_id;?>')">Make Approve</a>
								<?php } ?>
								<?php
                                }
                                ?>
                               <?php /* ?> <?php
                                if(@$value->approved=='Yes')
                                {
                                ?>
                                <a class="dropdown-item" style="cursor:pointer;" onclick="approve_status('<?php echo @$value->id;?>','No','<?php echo @$value->employee_id;?>')">Make Not Approve</a>
                           <?php
                                }
                                ?><?php */ ?>
                            </div>
                        </div>
                    </td> 
                </tr>
               <?php
                  }
                  }
                  ?>   
                </tbody>
              </table>
            </div>
        </div>
    </div>
    </div>
</div>


<!--
  Notification DIV 
  This div acts as the notification before performing any action
-->
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="notification_heading">Leave Approval </h4>
        <button type="button" class="close" data-dismiss="modal"><i class="la la-times"></i></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" >

       <p id="notification_body"></p>
	   <div class="alert alert-danger">
   <strong><span id="notehtml"></span></strong>
  </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <a data-dismiss="modal" id="modal_confirm_leave_reject" class="btn btn-danger" href="#">Reject</a> 
          <a data-dismiss="modal" id="modal_confirm" class="btn btn-success" href="#">Approve</a>
      </div>

    </div>
  </div>
</div>
<!-- [end] Notification DIV -->
<script type="text/javascript">
    // datatable start
	var jquerydateformat = '<?php echo $jquery_date_format;?>';
	
    $(document).ready(function() {
		  $('.mysingle_date').daterangepicker({//Date format
                locale: {format: jquerydateformat},
                singleDatePicker: true,
                showDropdowns: true,
                //maxDate: moment(),
                
            });
    var table = $('#payrolltable').DataTable({
        bPaginate: true,
        //responsive: true,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        oLanguage: {
            oPaginate: {
                "sNext": "<span class='la la-angle-right'></span>",
                "sPrevious": "<span class='la la-angle-left'></span>"
            },
            "sSearch": ""
        },
        bLengthChange: true,
        bFilter: true,
        bSort: true,
        bInfo: true,
        bAutoWidth: false,        
        pagingType: "input",
        buttons: [
            {
                extend: 'excelHtml5', text: '<i class="la la-file-excel"></i>',
                exportOptions: {
                    columns: ':visible',
                    search: 'applied',
                    order: 'applied'

                }
            },
            {
                extend: 'pdfHtml5', text: '<i class="la la-file-pdf"></i>',
                exportOptions: {
                    columns: ':visible',
                    search: 'applied',
                    order: 'applied'
                }
            },
            {
                extend: 'print', text: '<i class="la la-print"></i>',
                exportOptions: {
                    columns: ':visible',
                    search: 'applied',
                    order: 'applied'
                }
            },
            {
                extend: 'colvis', text: '<i class="la la-eye"></i>'
            }
        ],
        columnDefs: [
            {orderable: false, targets: -1},
            //{targets: [ 1, 5], visible: false}
        ]
    });
    table.buttons().container().appendTo('.dataTable_buttons');
    $('.dataTables_filter').find('input').attr('placeholder', 'Search here...');
});
// datatable end 

$(document).ready(function(){
 <?php if($this->session->userdata('futureAdmin')->detail->employee_id != '0'){ ?>
getLeaveType();
<?php } ?>
});


    function openingbalanceform(id){
         $.post("<?php echo base_url('admin_get_edit_form_employee_opening'); ?>", {'id': id}, function(result){
            //console.log(result);
         $(".form-wrapper").html(result);
         $(".form-wrapper").show();
		  $('.js-example-basic-multiple').select2();
	
        $('.mysingle_date').daterangepicker({ //Date format
		locale: {format: jquerydateformat},
		singleDatePicker:true,
		showDropdowns:true,
                   onChange: function(selectedDates, dateStr, instance) {
       //leave_due_calculate_new(); 
       var from=$('#leave_from').val();
       
      var employee_id = $("#employee_id option:selected").val();
       //alert(from);
      /* if(from!='' && employee_id!='' && (typeof from != "undefined")){
        $.ajax({
                        url: '<?php echo base_url('employees_leave_application_duplicate_date'); ?>/' + from+'/'+employee_id,
                        type: 'POST',
                        //data : new FormData( $("#expenses")[0]),
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (datanew) {
                         //    alert(datanew);
                            if(datanew=='have'){
                                
         alert('You have all ready took or applied leave for this date');
         $('#leave_add').hide();
        }
        else{
           $('#leave_add').show(); 
            
        }
                        }
                    });

    }*/
       
                   }
                 });
    });

         $('.toggleFilter').hide();
    }

    function openForm(id){
         $.post("<?php echo base_url('admin_get_edit_form_employee_leave'); ?>", {'id': id}, function(result){
            //console.log(result);
         $(".form-wrapper").html(result);
         $(".form-wrapper").show();
		
		 $('.js-example-basic-multiple').select2();
		 $('.mydate_range').daterangepicker({           
           locale: {format: jquerydateformat},
        }, function(start, end, label) {
			console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
			leave_due_calculate_new(start.format('YYYY-MM-DD'),end.format('YYYY-MM-DD'));
		});
        /* $('.mysingle_date').daterangepicker({ //Date format
		locale: {format: 'YYYY-M-DD'},
		//locale: {format: 'DD-M-YYYY'},
		singleDatePicker:true,
		showDropdowns:true,
                   onChange: function(selectedDates, dateStr, instance) {
					   console.log(selectedDates);
					   console.log(dateStr);
       //leave_due_calculate_new(); 
       var from=$('#leave_from').val();
       var to=$('#leave_to').val();
      var employee_id = $("#employee_id option:selected").val();
       if(to < from){
        //alert('ee');
        $('#leave_add').hide();
       }else{
        $('#leave_add').show();
       }
       if(from!='' && employee_id!='' && (typeof from != "undefined")){
        $.ajax({
                        url: '<?php echo base_url('employees_leave_application_duplicate_date'); ?>/' + from+'/'+employee_id+'/'+id,
                        type: 'POST',
                        //data : new FormData( $("#expenses")[0]),
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (datanew) {
                            // alert(datanew);
                            if(datanew=='have'){
                                
         alert('You have all ready took or applied leave for this date');
         $('#leave_add').prop('disabled', true);
        }
        else{
           $('#leave_add').prop('disabled', false); 
            
        }
                        }
                    });
                        //leave_due_calculate_new(); 

    }
       
                   }
                 }, function(start, end, label) {
					//start.format('YYYY-MM-DD')
					///var from = $('#leave_from').val().format('YYYY-MM-DD');  
					//var to = $('#leave_to').val().format('YYYY-MM-DD');
					//console.log("Fromm--"+from+"--To--"+to);
					console.log(start);
				});*/
    });

         $('.toggleFilter').hide();
    }


   

function getLeaveType(){
	
  var employee_id = $("#employee_id").val();
//alert(employee_id);
//console.log(employee_id);
if(employee_id != ''){
  $.post("<?php echo base_url('admin_get_employee_leave'); ?>", {'id': employee_id}, function(result){
          //console.log(result);
          var result1 = result.split("##");
          if(result1[0] != ''){
            $("#leavetypediv").show();
          }else{
            $("#leavetypediv").hide();
          }
      
       $("#leaveDiv").html(result1[0]);
       $("#due_leave").html(result1[1]);
       
        });
}else{
	$("#leavetypediv").hide();
	$("#leaveDiv").html('');
    $("#due_leave").html('');
	$("#exist_leave").html('');
     
	
}

}

function getOpeningLeave(){
  var employee_id = $("#employee_id option:selected").val();

//console.log(employee_id);
  $.post("<?php echo base_url('admin_get_employee_opening_leave'); ?>", {'id': employee_id}, function(result){
          //console.log(result);
          var result1 = result.split("##");
       $("#leaveDiv").html(result1[0]);
       $("#due_leave").html(result1[1]);
       
        });

}



function leave_due_calculate_new(from,to) {
    var leave_type = $("#leave_type").val();
	var start = new Date(from);
	var end = new Date(to);
	var timeDiff  = new Date(end - start);
	var  daysDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
	var original=daysDiff+1;
	//console.log(daysDiff);	
   if(from!='' && to!='' && leave_type!='' && (typeof to != "undefined") && (typeof from != "undefined") && (Date.parse(from) <= Date.parse(to))){
	  
  var due_leave=$('#due_leave'+leave_type).val();
          
        if(Math.floor(due_leave)>=original){
        $('#leave_total_days').val(original);
        //$('#leave_add').show();
        $("#leave_add").prop('disabled', false);
        $('#leave_error').text('');
        }else if(due_leave == '0' ||due_leave == '0.5'){
         
          $('#leave_total_days').val(original);
          $('#leave_error').text('Your Balance leave is less than required leave.');
          $("#leave_add").prop('disabled', false);
          //alert('sd');
        }else{
        //alert('Your due leave is less than required leave.');
        $('#leave_error').text('Your Balance leave is less than required leave.');
        
        $('#leave_total_days').val(original);
         $("#leave_add").prop('disabled', 'disabled');
         //alert('s22d');
        }

    }else{
      $('#leave_total_days').val(original);
     $("#leave_add").prop('disabled', false);
    }

  }
  
  
  function check_available_leave(){
	var leave_type = $("#leave_type").val();
	var due_leave=$('#due_leave'+leave_type).val();
	var original=$('#leave_total_days').val();
	
       if(due_leave > '0'){   
        if(Math.floor(due_leave)>=original){
        $('#leave_total_days').val(original);
        //$('#leave_add').show();
        $("#leave_add").prop('disabled', false);
        $('#leave_error').text('');
        }else if(due_leave == '0' ||due_leave == '0.5'){
         
          $('#leave_total_days').val(original);
          $('#leave_error').text('Your Balance leave is less than required leave.');
          $("#leave_add").prop('disabled', false);
          //alert('sd');
        }else{
        //alert('Your due leave is less than required leave.');
        $('#leave_error').text('Your Balance leave is less than required leave.');
        
        $('#leave_total_days').val(original);
         $("#leave_add").prop('disabled', 'disabled');
         //alert('s22d');
        }

    }else{
      $('#leave_total_days').val(original);
     $("#leave_add").prop('disabled', false);
    }
  }

  function checkTicket(Ticket_type){
    if(Ticket_type=='Yes'){
      $("#leave_ticket_amount").removeAttr("readonly");      
    }else{
      $('#leave_ticket_amount').val('');
      $("#leave_ticket_amount").attr("readonly", "readonly");
    }
    $("#leave_ticket_val").val(Ticket_type);

  }

  function change_status(id,status,employee_id) {
     $.ajax({
                        url: '<?php echo base_url('employees_leave_approval_status_check'); ?>/' + id+'/'+status+'/'+employee_id,
                        type: 'POST',
                        //data : new FormData( $("#expenses")[0]),
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (datanew) {
                           // alert(datanew);
                          
                      }
                    });
                if (confirm('Are you sure ?')) {
                    $.ajax({
                        url: '<?php echo base_url('employees_leave_approval_status'); ?>/' + id+'/'+status+'/'+employee_id,
                        type: 'POST',
                        //data : new FormData( $("#expenses")[0]),
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (datanew) {
                            //alert(datanew);
                            
                                 var url = '<?php echo base_url('employee_leave'); ?>/1';
                                  $("#pjax-container").load(url,function(response,status){       
                                      $('#ks-datatable').bootstrapTable({
                                          icons: {
                                              refresh: 'la la-refresh icon-refresh',
                                              toggle: 'la la-list-alt icon-list-alt',
                                              columns: 'la la-th icon-th',
                                              share: 'la la-download icon-share'
                                          }
                                      });
                                      notification(status);
                                  });
                        
                        
                        
                      }
                    });
                
                  }

            }

            function approve_status(id,status,employee_id){            
              $("#myModal").on('shown.bs.modal', function() {
                $.post("<?php echo base_url('admin_get_view_form_employee_leave'); ?>", {'id': id,'status':status,'employee_id':employee_id}, function(result){
                //console.log(result);
                var res = result.split("^~");
              /* if(status == 'Yes'){
				   
				   $("#modal_confirm").html('Approve');
				   $("#modal_confirm").addClass('btn-success');
				   $("#modal_confirm").removeClass('btn-danger');
			   }else{
				    
					$("#modal_confirm").html('Reject');
					$("#modal_confirm").addClass('btn-danger');
				   $("#modal_confirm").removeClass('btn-success');
			   }*/
                $("#notification_body").html(res[0]);
                 $("#notehtml").html(res[1]);

                //$("#notification_heading").html("Confirmation");
                //$("#notification_body").html("Do you want to Delete this designation?");
                });
                $("#modal_confirm").click(function() {
					status = 'Yes';
					var approvalnote = $('#approval_note').val();
					if(approvalnote == ''){
						var approval_note = '1';
					}else{
						var approval_note = approvalnote;
					}
					//alert(approval_note);
                $.ajax({
                        url: '<?php echo base_url('employees_leave_approval_status'); ?>/' + id+'/'+status+'/'+employee_id+'/'+approval_note,
                        type: 'POST',
                        //data : new FormData( $("#expenses")[0]),
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (datanew) {
                            //alert(datanew);
                            
                                 var url = '<?php echo base_url('employee_leave'); ?>/1';
                                  $("#pjax-container").load(url,function(response,status){       
                                    
                                      notification(status);
                                  });
                        
                        
                        
                      }
                    });
                });
				$("#modal_confirm_leave_reject").click(function() {
					status = 'No';
					var approvalnote = $('#approval_note').val();
					if(approvalnote == ''){
						var approval_note = '1';
					}else{
						var approval_note = approvalnote;
					}
					//alert(approval_note);
                $.ajax({
                        url: '<?php echo base_url('employees_leave_approval_status'); ?>/' + id+'/'+status+'/'+employee_id+'/'+approval_note,
                        type: 'POST',
                        //data : new FormData( $("#expenses")[0]),
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (datanew) {
                            //alert(datanew);
                            
                                 var url = '<?php echo base_url('employee_leave'); ?>/1';
                                  $("#pjax-container").load(url,function(response,status){       
                                    
                                      notification(status);
                                  });
                        
                        
                        
                      }
                    });
                });
              }).modal("show");

            }
			
			
			
	function getSearchLeave() {
        var st_date = $("#start_date").val();
		 var end_date = $("#end_date").val();
       

        if (st_date != '' && end_date != '') {
            $('#start_date').css('border-color', '');
            $('#start_date').val(st_date);
            $("#stdateErr").html('');
			
			$('#end_date').css('border-color', '');
            $('#end_date').val(end_date);
            $("#enddateErr").html('');
			
            $.post("<?php echo base_url('search_leave'); ?>", {'st_date': st_date,'end_date': end_date}, function (result) {
                console.log(result);
                $("#searchData").html(result);
            });
           
            return true;
        } else {
            $('#start_date').val(st_date);
            $('#start_date').css('border-color', 'red');
            $("#stdateErr").html('Field Required');
			
			$('#end_date').val(end_date);
            $('#end_date').css('border-color', 'red');
            $("#enddateErr").html('Field Required');
           
            return false;
        }
    }

    /*function getSearchleave(type) {
    var st_date = $("#start_date").val();
    var end_date = $("#end_date").val();

    $('#month_id').val('');
    $('#year_id').val('');

    if(st_date!='' && end_date!=''){
      $('#start_date').css('border-color', '');
      $('#end_date').css('border-color', '');
      $("#stdateErr").html('');
      $("#enddateErr").html('');
    

        $.post("<?php echo base_url('employee_leave_search'); ?>", {'start_date': st_date,'end_date': end_date,'type': type}, function(result){
            //console.log(result);
         $("#searchData").html(result);
         $('#ks-datatable').bootstrapTable({
              icons: {
                  refresh: 'la la-refresh icon-refresh',
                  toggle: 'la la-list-alt icon-list-alt',
                  columns: 'la la-th icon-th',
                  share: 'la la-download icon-share'
              }
          });
         
        });


    }else{
      $('#start_date').css('border-color', 'red');
      $('#end_date').css('border-color', 'red');
      $("#stdateErr").html('Field Required');
      $("#enddateErr").html('Field Required');
     
    }
  }*/
  //$('.flatpickrDateNew').flatpickr();
  function searchleavedetails() {
    var month = $("#month_id option:selected").val();
    var year = $("#year_id option:selected").val();
    var d = new Date(),
    n = d.getMonth()+1,
    y = d.getFullYear();

    $.post("<?php echo base_url('employee_leave_search_month'); ?>", {'month': month,'year': year}, function(result){
            //console.log(result);
           
           $('#register_leave_search').html(result);

            
        
    });
  }
  
  $(".closeSearch").click(function(){
        $('.drop_search').slideToggle();
    });
	
	function deleteimg(primarykey,selectedimg,table,a,field = '',tablefield){
 var r = confirm("Do you Want to Delete this?");
if (r == true) {
  $.post("<?php echo base_url('delete_selected_image'); ?>", {primarykey: primarykey,selectedimg: selectedimg,table: table,field: field,tablefield:tablefield}, function(result){
         //$("#view_details").html(result);
         console.log(result);
         if(result == '1' && field == ''){
           $('#remove'+a+primarykey).remove();
         }else if(result == '1' && field != ''){
          $('#remove_'+field+a+primarykey).remove();
         }
        });
}else{
  return false;
}
}
    
</script>
