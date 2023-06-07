<div class="ks-page-header">
    <section class="ks-title">
        <h3>Organization Bank</h3>
        <div class="ks-controls">
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
            <table id="ksdatatable" class="table table-list">
                <thead>
                  <tr>  
                    <th>Bank</th>
                    <th>Branch</th>
                    <th>Account No</th>  
                    <th>IFSC</th>   
                    <th>Status</th>                             
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
                    <td><?php echo $data->bank_name; ?></td>
                    <td><?php echo $data->branch; ?></td>
                    <td><?php echo $data->acc_no; ?></td>
                    <td><?php echo $data->ifsc_code; ?></td>
                    <td><?php
                        if ($data->is_active == "Y") {
                            echo '<span class="text-success">Active</span>';
                        } else {
                             echo '<span class="text-danger">De-active</span>';
                        }
                        ?></td>
                    <td class="table-action">
                        <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="la la-ellipsis-v"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="javascript:void(0)" onclick="openForm(<?php echo $data->id; ?>);"><span class="la la-pencil icon text-info"></span> Edit</a>
                            <?php
                                if ($data->is_active == "Y") {
                                    echo '<a class="dropdown-item" href="javascript:void(0)" onclick="change_status(' . $data->id . ');"><span class="ks-icon la la-check text-success" aria-hidden="false"></span> Activate</a>';
                                } else {
                                    echo '<a class="dropdown-item" href="javascript:void(0)" onclick="change_status(' . $data->id . ');"><span class="ks-icon la la-close text-danger" aria-hidden="false"></span> De-activated</a>';
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
    function openForm(id){
         $.post("<?php echo base_url('admin_get_edit_form_setting_organization_bank_details'); ?>", {id: id}, function(result){
            //console.log(result);
         $(".form-wrapper").html(result);
         $(".form-wrapper").show();
         $(".flatpickrDate").flatpickr();
    });
    }


    function change_status(id) {
        $("#myModal").on('shown.bs.modal', function() {
            $("#modal_confirm").click(function() {
                var url = "<?php echo base_url('admin_status_setting_organization_bank_details'); ?>/" + id;
                $("#pjax-container").load(url,function(response,status){       
                    var table = $('#ksdatatable').DataTable({
                bPaginate: true,
                responsive: true,
                pageLength: 10,                
                oLanguage: {
                  oPaginate: {
                  "sNext": "<span class='la la-angle-right'></span>",
                  "sPrevious": "<span class='la la-angle-left'></span>"
                  },
                  "sSearch":""
                },
                bLengthChange: true,
                bFilter: true,
                bSort: true,
                bInfo: true,
                bAutoWidth: false,
                lengthChange: false,
                buttons: [
                   // 'excelHtml5',
                   // 'pdfHtml5',                    
                    {
                        extend: 'print', text: '<i class="la la-print"></i>',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'colvis', text: '<i class="la la-eye"></i>'                        
                    }
                ],
                columnDefs: [
                    { orderable: false, targets: -1 }
                 ]
            });
            table.buttons().container().appendTo( '.dataTable_buttons' );
            $('.dataTables_filter').find('input').attr('placeholder','Search here...');


                    notification(status);
                });
            });

            $("#notification_heading").html("Confirmation");
            $("#notification_body").html("Do you want to change status of this Organization Bank Details?");
        }).modal("show");
    }

     function delete_this(id) {
        $("#myModal").on('shown.bs.modal', function() {
            $("#modal_confirm").click(function() {
               var url = "<?php echo base_url('admin_delete_setting_organization_bank_details'); ?>/" + id;
                $("#pjax-container").load(url,function(response,status){       
                    var table = $('#ksdatatable').DataTable({
                bPaginate: true,
                responsive: true,
                pageLength: 10,                
                oLanguage: {
                  oPaginate: {
                  "sNext": "<span class='la la-angle-right'></span>",
                  "sPrevious": "<span class='la la-angle-left'></span>"
                  },
                  "sSearch":""
                },
                bLengthChange: true,
                bFilter: true,
                bSort: true,
                bInfo: true,
                bAutoWidth: false,
                lengthChange: false,
                buttons: [
                   // 'excelHtml5',
                   // 'pdfHtml5',                    
                    {
                        extend: 'print', text: '<i class="la la-print"></i>',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'colvis', text: '<i class="la la-eye"></i>'                        
                    }
                ],
                columnDefs: [
                    { orderable: false, targets: -1 }
                 ]
            });
            table.buttons().container().appendTo( '.dataTable_buttons' );
            $('.dataTables_filter').find('input').attr('placeholder','Search here...');


                    notification(status);
                });
            });

            $("#notification_heading").html("Confirmation");
            $("#notification_body").html("Do you want to Delete this Organization Bank Details?");
        }).modal("show");
    }
</script>