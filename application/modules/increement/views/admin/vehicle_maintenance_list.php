  <div class="ks-page-header">
    <section class="ks-title">
      <h3>Vehicle Maintenance</h3>
        <div class="ks-controls">
            <a href="javascript:void(0)" class="btn btn-primary btn-add-vehicle" onclick="openForm('');">Add Maintenance</a>
        </div>
    </section>
</div>

<div class="ks-page-content">
    <div class="ks-page-content-body ks-content-nav ks-user-list-view">
        <div class="ks-nav ks-browse">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link pjaxCls" href="<?php echo base_url('page/48'); ?>">
                        <span>
                           Listing
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pjaxCls" href="<?php echo base_url('page/58'); ?>">
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
        <div class="ks-nav-body" style="padding:20px;">
            <div class="add-vehicle mb-4" style="display:none">
                
            </div>

            <div class="table-responsiveX">
            <table id="ksdatatable" class="table table-list">
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