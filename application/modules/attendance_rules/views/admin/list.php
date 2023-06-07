<div class="ks-page-header">
    <section class="ks-title">
        <h3><span>Rules  > </span> Attendance Rules</h3>
        <div class="ks-controls">            
            <a href="javascript:;" class="btn btn-icon btn-light btn_maximize"><i class="far fa-window-maximize"></i></a>
            <button type="button" class="btn btn-primary btn_header_add" onclick="openForm('');">Add</button>            
        </div>
    </section>
</div>


<div class="ks-page-content">
    <div class="ks-page-content-body">
        <div class="container-fluid">
        <div class="content-wrapper">            
            <div class="form-wrapper" style="display:none">
                
            </div>           
            
            <div class="table-responsiveX">
            <table id="payrolltable" class="table table-list">
                <thead>
                  <tr>
                    <th>Work shift</th>
                    <th>Day Type</th>
                    <th>Min. hrs. for half day</th>
                    <th>Min. hrs. for Full day</th>
                    <th>Incomp. present for less then</th>
                    <th>OT after hour</th>           
                    <th></th> 
                  </tr>
                </thead>
                <tbody>
                <?php
                    $sl = 1;
                   // echo "<pre>"; print_r($all_data); die;
                    if (!empty($all_data)) {
                      foreach ($all_data as $data) {
                        // $grade = $this->AttRulesModel->get_row_data('master_grade',array('id'=>$data->grade));
                        $work_shift = $this->AttRulesModel->get_row_data('master_work_shift',array('id'=>$data->work_shift_id));
                    ?>
                  <tr>
                    <td> <a class="" href="javascript:void(0)" onclick="openForm(<?php echo $data->id; ?>);"><?php echo @$work_shift->work_shift_name; ?></a></td>
                    <td><?php if($data->day_type == 'Full'){ echo 'Full Working Days'; } else { echo 'Half Working Days'; } ?></td>
                    <td><?php echo $data->min_hrs_for_half_day; ?></td>
                    <td><?php echo $data->min_hrs_for_full_day; ?></td>
                    <td><?php echo $data->incomplete_present_for_less_then; ?></td>
                    <td><?php echo $data->over_time_after_hour; ?></td>
                     <td class="table-action">
                        <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="la la-ellipsis-v"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="javascript:void(0)" onclick="openForm(<?php echo $data->id; ?>);"><span class="la la-pencil icon text-info"></span> Edit</a>
                            <?php
                                if ($data->is_active == "Y") {
                                    echo '<a class="dropdown-item" href="javascript:void(0)" onclick="change_status(' . $data->id . ');"><span class="ks-icon la la-close text-danger" aria-hidden="false"></span> De-activated</a>';
                                } else {
                                    echo '<a class="dropdown-item" href="javascript:void(0)" onclick="change_status(' . $data->id . ');"><span class="ks-icon la la-check text-success" aria-hidden="false"></span> Activate</a>';
                                }
                            ?>
                            <a class="dropdown-item" href="javascript:void(0)" onclick="delete_this(<?php echo $data->id; ?>);"><span class="la la-trash icon text-danger"></span> Delete</a>
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
<!-- [end] Notification DIV -->

<script type="text/javascript">
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
            //{targets: [ 1, 5], visible: false}
        ]
    });
    table.buttons().container().appendTo('.dataTable_buttons');
    $('.dataTables_filter').find('input').attr('placeholder', 'Search here...');
});
// datatable end 


    function openForm(id){
      ///alert(id);
         $.post("<?php echo base_url('admin_get_edit_form_attendance_rules'); ?>", {id: id}, function(result){
            //console.log(result);
         $(".form-wrapper").html(result);
         $(".form-wrapper").show();
		 $('.mytime_picker').daterangepicker({
			timePicker : true,
			singleDatePicker:true,
			timePicker24Hour : true,
			timePickerIncrement : 1,            
			locale : {
			format : 'HH:mm'
			}
			}).on('show.daterangepicker', function(ev, picker) {
			picker.container.find(".calendar-table").hide();
			});
    });
    }


    function change_status(id) {
        $("#myModal").on('shown.bs.modal', function() {
            $("#modal_confirm").click(function() {
                var url = "<?php echo base_url('admin_status_attendance_rules'); ?>/" + id;
                $("#pjax-container").load(url,function(response,status){                    
                    notification(status);
                });
            });

            $("#notification_heading").html("Confirmation");
            $("#notification_body").html("Do you want to change status of this Overtime Rule?");
        }).modal("show");
    }

     function delete_this(id) {
        $("#myModal").on('shown.bs.modal', function() {
            $("#modal_confirm").click(function() {
               var url = "<?php echo base_url('admin_delete_attendance_rules'); ?>/" + id;
                $("#pjax-container").load(url,function(response,status){                           
                    notification(status);
                });
            });

            $("#notification_heading").html("Confirmation");
            $("#notification_body").html("Do you want to Delete this Overtime Rule?");
        }).modal("show");
    }





function checkGradeAttRule(rule_id){
  var work_shift_id = $("#work_shift_id option:selected").val();
  var day_type = $("#day_type option:selected").val();
  $("#grade_err").html('');
  if(work_shift_id!='' && day_type!=''){
  $.post("<?php echo base_url('check_grade_attendance_rules'); ?>", {'work_shift_id': work_shift_id,'rule_id':rule_id,'day_type' : day_type}, function(result){
            console.log(result);
            if(result!='done'){
              $("#grade_err").html(result);
			  $('#submitatt').prop( "disabled", true );
            }else{
				 $("#grade_err").html('');
				  $('#submitatt').prop( "disabled", false );
			}
         
         
    });
  }
}
</script>