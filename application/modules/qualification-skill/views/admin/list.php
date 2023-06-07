<div class="ks-page-header">
    <section class="ks-title">
        <h3><span>Settings> </span> Skills</h3>
        <div class="ks-controls">
            <button type="button" class="btn btn-primary" onclick="openForm('');">Add</button>
        </div>
    </section>
</div>

<div class="ks-page-content">
    <div class="ks-page-content-body">
        <div class="container-fluid">
        <div class="content-wrapper">            
            <div class="form-wrapper mb-4" style="display:none">
                
            </div>           
            
            <div class="table-responsive visible-x">
            <table id="payrolltable" class="table table-list" >
                <thead>
                  <tr>
                    <th>Skill Name</th>
                    <th>Description</th> 
                    <th>Action</th>                               
                  </tr>
                </thead>
                <tbody>
                <?php
                    $sl = 1;
                    if (!empty($all_data)) {
                      foreach ($all_data as $data) {
                    ?>
                  <tr>
                    <td><?php echo $data->skill_name; ?></td>
                    <td><?php echo $data->description; ?></td> 
                    <td class="table-action">
                        <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="la la-ellipsis-v"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="javascript:void(0)" onclick="openForm(<?php echo $data->id; ?>);"><span class="la la-pencil icon text-primary-on-hover"></span> Edit</a>
                            <?php
                                if ($data->is_active == "Y") {
                                    echo '<a class="dropdown-item" href="javascript:void(0)" onclick="change_status(' . $data->id . ');"><span class="ks-icon la la-check text-success" aria-hidden="false"></span> Activate</a>';
                                } else {
                                    echo '<a class="dropdown-item" href="javascript:void(0)" onclick="change_status(' . $data->id . ');"><span class="ks-icon la la-close text-danger" aria-hidden="false"></span> De-activated</a>';
                                }
                            ?>
                            <a class="dropdown-item" href="javascript:void(0)" onclick="delete_this(<?php echo $data->id; ?>);"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
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
         $.post("<?php echo base_url('admin_get_edit_form_skill'); ?>", {id: id}, function(result){
            //console.log(result);
         $(".form-wrapper").html(result);
         $(".form-wrapper").show();
    });
    }

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
            //{targets: [5], visible: false}
        ]
    });
    table.buttons().container().appendTo('.dataTable_buttons');
    $('.dataTables_filter').find('input').attr('placeholder', 'Search here...');
});
// datatable end 


    function change_status(id) {
        $("#myModal").on('shown.bs.modal', function() {
            $("#modal_confirm").click(function() {
                var url = "<?php echo base_url('admin_status_skill'); ?>/" + id;
                $("#pjax-container").load(url,function(response,status){                   
                    notification(status);
                });
            });

            $("#notification_heading").html("Confirmation");
            $("#notification_body").html("Do you want to change status of this Skill?");
        }).modal("show");
    }

     function delete_this(id) {
        $("#myModal").on('shown.bs.modal', function() {
            $("#modal_confirm").click(function() {
               var url = "<?php echo base_url('admin_delete_skill'); ?>/" + id;
                $("#pjax-container").load(url,function(response,status){
                    notification(status);
                });
            });

            $("#notification_heading").html("Confirmation");
            $("#notification_body").html("Do you want to Delete this Skill?");
        }).modal("show");
    }
</script> 