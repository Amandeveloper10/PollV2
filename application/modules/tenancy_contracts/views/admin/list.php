<div class="ks-page-header">
    <section class="ks-title">
        <h3><span>HR > </span> Tenancy Contracts</h3>
        <div class="ks-controls">
            <a href="javascript:void(0)" class="btn btn-primary btn-add-tenancy-contrcts" onclick="openForm('');">Add</a>
        </div>
    </section>
</div>

<div class="ks-page-content">
    <div class="ks-page-content-body">
        <div class="container-fluid">
        <div class="content-wrapper">              
            <div class="add-tenancy-contrcts mb-4" style="display:none">
                
            </div>           
            
            <div class="table-responsiveX">
            <table id="ksdatatable" class="table table-list">   
                <thead>
                        <tr>
                            <th>Contract No.</th>                            
                            <th>Landlord Name</th>
                            <th>Contract Amount</th>
                            <th>Deposit Amount</th>
                            <th>Start Date</th>
                            <th>Expiry Date</th>
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
                                <td><?php echo $data->contract_no; ?></td>
                                <!-- <td>
                                    <span class="badge badge-danger">Apartment</span>
                                </td> -->
                                <td><?php echo $data->landloard_name; ?></td>
                                <td><?php echo $data->contract_amount; ?></td>
                                <td><?php echo $data->security_deposite_amount; ?></td>
                                <td><?php echo $data->start_date; ?></td>
                                <td><?php echo $data->expiry_date; ?></td>
                                <td class="table-action">
                                    <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="la la-ellipsis-v"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="openForm(<?php echo $data->id; ?>);"><span class="la la-pencil icon text-info"></span> Edit</a>                                        
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
       $.post("<?php echo base_url('admin_get_edit_form_tenancy_contracts'); ?>", {id: id,'tenancy_id':'<?php echo @$tenancy_id; ?>'}, function(result){
          //console.log(result);
       $(".add-tenancy-contrcts").html(result);
       $(".add-tenancy-contrcts").show(); 
       $(".btn-add-tenancy-contrcts").hide(); 
       $('.flatpickrDate').flatpickr();
  });
  }


  function closeForm() {
    $(".add-tenancy-contrcts").html('');
    $(".add-tenancy-contrcts").hide();
    $(".btn-add-tenancy-contrcts").show(); 
  }


  function delete_this(id) {
        $("#myModal").on('shown.bs.modal', function() {
            $("#modal_confirm").click(function() {
               var url = "<?php echo base_url('admin_delete_tenancy_contracts'); ?>/" + id;
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
            $("#notification_body").html("Do you want to Delete this Tenancy Contracts?");
        }).modal("show");
    }

</script>