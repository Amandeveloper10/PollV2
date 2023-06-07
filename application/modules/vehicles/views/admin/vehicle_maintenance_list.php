  <div class="ks-page-header">
    <section class="ks-title">
      <h3>Vehicle Maintenance</h3>
        <div class="ks-controls">
            <a href="javascript:void(0)" class="btn btn-primary btn-add-vehicle" onclick="openForm('');">Add</a>
            <a href="javascript:;" class="btn btn-icon btn-light btn_maximize"><i class="far fa-window-maximize"></i></a>
        </div>
    </section>
</div>

<div class="ks-page-content">
    <div class="ks-page-content-body">
        <div class="container-fluid">        
            <div class="content-wrapper">
        <div class="card-nav d-flex">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link pjaxCls" href="<?php echo base_url('page/48'); ?>">
                        <span>
                           Listing
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active pjaxCls" href="<?php echo base_url('page/58'); ?>">
                        <span>
                            Maintenance Record
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pjaxCls" href="<?php echo base_url('vehicle_asignment_form'); ?>">
                        <span>
                            Assign Vehicle to Employee
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pjaxCls" href="<?php echo base_url('page/59'); ?>">
                        <span>
                            Assignment History
                        </span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="ks-nav-body">
            <div class="add-vehicle px-3 pt-3" style="display:none">
                
            </div>

            <div class="table-responsiveX">
            <table id="payrolltable" class="table table-list">
                        <thead>
                        <tr>
                            <th>Vehicle No.</th>
                            <th>Maintenance date</th>
                            <th>Expenses</th>
                            <th>Details</th>
                           
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                    $sl = 1;
                    if (!empty($all_data)) {
                      foreach ($all_data as $data) {
                    ?>

                            <tr>
                                <td><?php echo @$data->vehicle_no; ?></td>
                                <td><?php echo @$data->maintenance_date; ?></td>
                                
                                <td><?php echo @$data->expenses; ?></td>
                                <td><?php echo @$data->details; ?></td>
                                
                                <td class="table-action">
                                    <div class="dropdown">
                                        <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="la la-ellipsis-v"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
<!--                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <span class="la la-eye icon text-primary-on-hover"></span> View
                                            </a>-->
                                            <a class="dropdown-item" href="javascript:void(0)" onclick="openForm(<?php echo $data->id; ?>);">
                                                <span class="la la-pencil icon text-info"></span> Edit
                                            </a>
                                            <a class="dropdown-item" href="javascript:void(0)" onclick="delete_this(<?php echo $data->id; ?>);"><span class="la la-trash icon text-danger"></span> Delete</a>
                                        </div>
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
       $.post("<?php echo base_url('vehicle_maintenance_form'); ?>", {id: id}, function(result){
          //console.log(result);
       $(".add-vehicle").html(result);
       $(".add-vehicle").show(); 
       $(".btn-add-vehicle").hide(); 
       $('.flatpickrDate').flatpickr();
  });
  }


  function closeForm() {
    $(".add-vehicle").html('');
    $(".add-vehicle").hide();
    $(".btn-add-vehicle").show(); 
  }


  function delete_this(id) {
        $("#myModal").on('shown.bs.modal', function() {
            $("#modal_confirm").click(function() {
               var url = "<?php echo base_url('maintenance_delete'); ?>/" + id;
                $("#pjax-container").load(url,function(response,status){                           
                    notification(status);
                });
            });

            $("#notification_heading").html("Confirmation");
            $("#notification_body").html("Do you want to Delete this Maintenance?");
        }).modal("show");
    }


function readURLVehicle(input,formname,filedname) {

    // save file
    $.ajax({
        url : '<?php echo base_url('admin_upload_files'); ?>/'+filedname,
        type : 'POST',
        data : new FormData( $("#"+formname)[0]),
        async : false,
        cache : false,
        contentType : false,
        processData : false,
        success : function(data) {
            //console.log(data);
            $("#"+filedname+"_1").val(data);
        }
    });

    }
</script>