<div class="ks-page-header">
    <section class="ks-title">
        
		<h3><span>Core HR > </span> Assigned Equipment</h3>
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
                <?php                    
                    if (!empty($all_data)) {
                    ?>
                    <table id="payrolltable" class="table table-list">
                <thead>
                  <tr>
				   <th>Employee Name</th>
                   <th>Equipment Name</th>
                  
                   <th>Quantity</th>                   
                   <th></th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    $sl = 1;
                    if (!empty($all_data)) {
                      foreach ($all_data as $data) {
                    ?>
                  <tr>
				  <td class="d-flex align-items-center">
                        <img <?php if (isset($data->personal_image) && $data->personal_image != '') { ?> src="<?php echo base_url(); ?>uploads/<?php echo (isset($data->personal_image) && $data->personal_image != '') ? $data->personal_image : ''; ?>" <?php } else { ?> src="<?php echo base_url(); ?>/assets/img/avatars/placeholders/ava-128.png" <?php } ?>class="ks-avatar" alt="" width="36" height="36">
                        <div><a class="" href="javascript:void(0)" onclick="openForm(<?php echo $data->id; ?>);"><?php echo @$data->first_name . ' ' . @$data->middle_name . ' ' . @$data->last_name; ?><br>
                            <small><?php if(!empty($data->employee_no)) { echo '('.$data->employee_no.')'; } ?></small> </a></div>
                    </td>
                    <td><?php echo $data->equipment_name; ?></td>
                    <td><?php echo $data->quantity; ?></td>                   
                    <td class="table-action">
                        <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="la la-ellipsis-v"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="javascript:void(0)" onclick="openForm(<?php echo $data->id; ?>);"><span class="la la-pencil icon text-info"></span> Edit</a>
                           <!--  <?php
                                if ($data->is_active == "Y") {
                                    echo '<a class="dropdown-item" href="javascript:void(0)" onclick="change_status(' . $data->id . ');"><span class="ks-icon la la-check text-success" aria-hidden="false"></span> Activate</a>';
                                } else {
                                    echo '<a class="dropdown-item" href="javascript:void(0)" onclick="change_status(' . $data->id . ');"><span class="ks-icon la la-close text-danger" aria-hidden="false"></span> De-activated</a>';
                                }
                            ?> -->
                            <a class="dropdown-item" href="javascript:void(0)" onclick="delete_this(<?php echo $data->id; ?>);"><span class="la la-trash icon text-danger"></span> Delete</a>
                        </div>                                                
                    </td>                     
                  </tr>
                  <?php $sl++; } } ?>    
                </tbody>
              </table>
                
                <?php } else { ?>                
                <img src="<?php echo base_url(); ?>/assets/svg/no-data.svg" class="img-fluid img-no-data-found">
            <?php }?>
                
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

function btnCloseForm(){
    $('form').remove();
    $('.form-wrapper').css('display','none');
}

    function openForm(id){
         $.post("<?php echo base_url('admin_get_edit_form_assigned_employee'); ?>", {id: id}, function(result){
            //console.log(result);
         $(".form-wrapper").html(result);
         $(".form-wrapper").show();
		 $('.js-example-basic-multiple').select2();
		  $('.mydate_range').daterangepicker({           
           locale: {format: dateformat},
          // minDate:'01-01-2020',
           //maxDate:'01-05-2021'
        });
    });
    }


    function change_status(id) {
        $("#myModal").on('shown.bs.modal', function() {
            $("#modal_confirm").click(function() {
                var url = "<?php echo base_url('admin_status_equipment'); ?>/" + id;
                $("#pjax-container").load(url,function(response,status){                            
                    notification(status);
                });
            });

            $("#notification_heading").html("Confirmation");
            $("#notification_body").html("Do you want to change status of this equipment?");
        }).modal("show");
    }

     function delete_this(id) {
        $("#myModal").on('shown.bs.modal', function() {
            $("#modal_confirm").click(function() {
               var url = "<?php echo base_url('admin_delete_assigned_employee'); ?>/" + id;
                $("#pjax-container").load(url,function(response,status){                     
                    notification(status);
                });
            });

            $("#notification_heading").html("Confirmation");
            $("#notification_body").html("Do you want to Delete this equipment?");
        }).modal("show");
    }
</script>


