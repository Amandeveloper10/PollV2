<?php $SysConfigaration = checkConfig1(); 
$dateformat = $SysConfigaration->date_format;
$jquery_date_format = $SysConfigaration->jquery_date_format;
//print_r($SysConfigaration->date_format); die;?>
<div class="ks-page-header">
    <section class="ks-title">
        <h3> <span>Attendance ></span> Time Off</h3>
        <div class="ks-controls">            
            <a href="javascript:;" class="btn btn-icon btn-light btn_maximize"><i class="far fa-window-maximize"></i></a>
            <button type="button" class="btn btn-primary btn_header_add" onclick="openForm('');">Add</button>  
            <input type="hidden" id="employee_id" value="<?=@$employeeid?>"/>		
            <input type="hidden" id="mode" value="<?=@$mode?>"/>					
        </div>
    </section>
</div>

<div class="ks-page-content">
    <div class="ks-page-content-body">
        <div class="container-fluid">
        <div class="content-wrapper">            
            <div class="form-wrapper pb-0" style="display:none">
                
            </div>            
            <div class="table-responsiveX">
            <table id="payrolltable" class="table table-list">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Purpose</th>
                    <th>Approved</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    $sl = 1;
					//echo '<pre>'; print_r($all_data);
                    if (!empty($all_data)) {
                      foreach ($all_data as $data) {
                    ?>
                  <tr>
                    <td class="d-flex align-items-center">
                        <img <?php if (isset($data->personal_image) && $data->personal_image != '') { ?> src="<?php echo base_url(); ?>uploads/<?php echo (isset($data->personal_image) && $data->personal_image != '') ? $data->personal_image : ''; ?>" <?php } else { ?> src="<?php echo base_url(); ?>/assets/img/avatars/placeholders/ava-128.png" <?php } ?>class="ks-avatar" alt="" width="36" height="36">
                        <div><a class="" href="javascript:void(0)" onclick="openForm(<?php echo $data->id; ?>);"><?php echo @$data->first_name . ' ' . @$data->middle_name . ' ' . @$data->last_name; ?><br>
                            <small><?php if(!empty($data->employee_no)) { echo '('.$data->employee_no.')'; } ?></small> </a>                       </div>
                    </td>
                     <td><?php echo $data->type; ?></td>
                    <td><?php if($data->type == 'Personal'){
                      echo date($dateformat,strtotime($data->date));
                    }else{
                      echo date($dateformat,strtotime($data->from_date)).' To '.date($dateformat,strtotime($data->to_date));
                    } ?></td>
                    <td><?php if($data->type == 'Personal'){
                      echo $data->time;
                    }else{
                      echo '<span class="text-success">In Time: '.$data->entry_time.'</span> '; echo '<br>';
                      echo '<span class="text-warning">Out Time: '.$data->out_time.'</span>';
                    } ?></td>
                    <td><?php echo $data->purpose; ?></td>
                    <td><?php if($data->approved == ''){ 
					echo '<label class="badge badge-info">New</label>';
					}elseif($data->approved == 'Yes'){
						echo '<label class="badge badge-success">Approved</label>';
					}else{
						echo '<label class="badge badge-danger">Rejected</label>';
					} ?></td>
                    <td class="table-action">
                        <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="la la-ellipsis-v"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="javascript:void(0)" onclick="openForm(<?php echo $data->id; ?>);"><span class="la la-pencil icon  text-info"></span> Edit</a>
                            <?php
                                if ($data->is_active == "Y") {
                                    echo '<a class="dropdown-item" href="javascript:void(0)" onclick="change_status(' . $data->id . ');"><span class="ks-icon la la-close text-warning" aria-hidden="false"></span> De-activated</a>';
                                } else {
                                    echo '<a class="dropdown-item" href="javascript:void(0)" onclick="change_status(' . $data->id . ');"><span class="ks-icon la la-check text-success" aria-hidden="false"></span> Activate</a>';
                                }
                            ?>
                            <a class="dropdown-item " href="javascript:void(0)" onclick="delete_this(<?php echo $data->id; ?>);"><span class="la la-trash icon text-danger"></span> Delete</a>
                            <?php /* ?> <?php
                                if(@$data->approved=='No')
                                {
                                ?>
                                <a class="dropdown-item text-info" style="cursor:pointer;" onclick="approval_status('<?php echo @$data->id;?>','Yes','<?php echo @$data->employee_id;?>')">Make Approve</a>
                                <?php
                                }
					  ?> <?php */ ?>
                                 <?php
                                if(@$data->approved=='' || @$data->approved=='Yes' || @$data->approved=='No')
                                {
                                ?>
                                <a class="dropdown-item text-info" style="cursor:pointer;" onclick="approval_status('<?php echo @$data->id;?>','Yes','<?php echo @$data->employee_id;?>')">Make Approve</a>
                                <?php
                                }
                                ?>
                              <?php /* ?>  <?php
                                if(@$data->approved=='Yes')
                                {
                                ?>
                                <a class="dropdown-item" style="cursor:pointer;" onclick="approval_status('<?php echo @$data->id;?>','No','<?php echo @$data->employee_id;?>')">Make Not Approve</a>
                           <?php
                                }
                                ?><?php */ ?>
                        </div>                                                
                    </td>                     
                  </tr>
                  <?php $sl++; } } ?>    
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

<div class="modal" id="myModalapp">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="notification_heading">Timeoff Approval </h4>
        <button type="button" class="close" data-dismiss="modal"><i class="la la-times"></i></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" >

       <p id="notification_body_app"></p>
	  <!-- <div class="alert alert-danger">
   <strong><span id="notehtml"></span></strong>
  </div>-->
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        
		<a data-dismiss="modal" id="modal_confirm_rej" class="btn btn-danger" href="#">Reject</a>
         <a data-dismiss="modal" id="modal_confirm_app" class="btn btn-success" href="#">Approved</a> 
      </div>

    </div>
  </div>
</div>
<!-- [end] Notification DIV -->

<script type="text/javascript">    
    var dateformat = '<?php echo $dateformat;?>';
	var jquerydateformat = '<?php echo $jquery_date_format;?>';
// datatable start
    $(document).ready(function() {
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
            {targets: [ 4 ], visible: false}
        ]
    });
    table.buttons().container().appendTo('.dataTable_buttons');
    $('.dataTables_filter').find('input').attr('placeholder', 'Search here...');
});
// datatable end 
    
    
function btnCloseForm(){
    $('form').remove();
    $('.form-wrapper').css('display','none');
}

    function openForm(id){
		var employee_id = $('#employee_id').val();
		var mode = $('#mode').val();
		
		$.post("<?php echo base_url('admin_get_edit_form_timeoff'); ?>", {id: id,employee_id: employee_id,mode: mode}, function(result){
            //console.log(result);
         $(".form-wrapper").html(result);
         $(".form-wrapper").show();
		 $('.js-example-basic-multiple').select2();
		
		$('.mysingle_date').daterangepicker({ //Date format
		locale: {format: jquerydateformat},
		singleDatePicker:true,
		showDropdowns:true,
		minDate:new Date()
		}); 
		
		$('.mytime_picker').daterangepicker({
			timePicker : true,
			singleDatePicker:true,
			//timePicker24Hour : true,
			timePickerIncrement : 1,            
			locale : {
			format : 'hh:mm A'
			}
			}).on('show.daterangepicker', function(ev, picker) {
			picker.container.find(".calendar-table").hide();
			});
    });
    }

    function approval_status(id,status,employee_id) {
                //if (confirm('Are you sure ?')) {
					$("#myModalapp").on('shown.bs.modal', function() {
					$.post("<?php echo base_url('admin_get_view_form_timeoff'); ?>", {'id': id,'status':status,'employee_id':employee_id}, function(result){
					//console.log(result);
					
					$("#notification_body_app").html(result);
					

					//$("#notification_heading").html("Confirmation");
					//$("#notification_body").html("Do you want to Delete this designation?");
					});
					 $("#modal_confirm_app").click(function() {
						 status = 'Yes';
						 var timeapprovalnote = $('#app_timeoff_note').val();
					if(timeapprovalnote == ''){
						var timeapproval_note = '1';
					}else{
						var timeapproval_note = timeapprovalnote;
					}
                    $.ajax({
                        url: '<?php echo base_url('employees_timeoff_approval_status'); ?>/' + id+'/'+status+'/'+employee_id+'/'+timeapproval_note,
                        type: 'POST',
                        //data : new FormData( $("#expenses")[0]),
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (datanew) {
                            //alert(datanew);
							//console.log(datanew);
                            //if(datanew!='no'){
                                 var url = '<?php echo base_url('timeoff'); ?>/1';
                                  $("#pjax-container").load(url,function(response,status){       
                                      
                                      notification(status);
                                  });
                        //}
                       
                        }
                    });
					});
					
					$("#modal_confirm_rej").click(function() {
						 status = 'No';
						 var timeapprovalnote = $('#app_timeoff_note').val();
					if(timeapprovalnote == ''){
						var timeapproval_note = '1';
					}else{
						var timeapproval_note = timeapprovalnote;
					}
                    $.ajax({
                        url: '<?php echo base_url('employees_timeoff_approval_status'); ?>/' + id+'/'+status+'/'+employee_id+'/'+timeapproval_note,
                        type: 'POST',
                        //data : new FormData( $("#expenses")[0]),
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (datanew) {
                            //alert(datanew);
							//console.log(datanew);
                            //if(datanew!='no'){
                                 var url = '<?php echo base_url('timeoff'); ?>/1';
                                  $("#pjax-container").load(url,function(response,status){       
                                      
                                      notification(status);
                                  });
                        //}
                       
                        }
                    });
					});
                //}

				}).modal("show");
            }


    function change_status(id) {
        $("#myModal").on('shown.bs.modal', function() {
            $("#modal_confirm").click(function() {
                var url = "<?php echo base_url('admin_status_timeoff'); ?>/" + id;
                $("#pjax-container").load(url,function(response,status){
                    notification(status);
                });
            });

            $("#notification_heading").html("Confirmation");
            $("#notification_body").html("Do you want to change status of this time off?");
        }).modal("show");
    }

     function delete_this(id) {
        $("#myModal").on('shown.bs.modal', function() {
            $("#modal_confirm").click(function() {
               var url = "<?php echo base_url('admin_delete_timeoff'); ?>/" + id;
                $("#pjax-container").load(url,function(response,status){                     
                    notification(status);
                });
            });
            $("#notification_heading").html("Confirmation");
            $("#notification_body").html("Do you want to Delete this time off?");
        }).modal("show");
    }
</script>


