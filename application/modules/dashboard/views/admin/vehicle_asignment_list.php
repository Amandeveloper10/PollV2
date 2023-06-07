<div class="ks-page-header">
    <section class="ks-title">
        <h3>Vehicles Assignment</h3>
    </section>
</div>
<div class="ks-page-content">
    <div class="ks-page-content-body ks-content-nav ks-user-list-view">
        <div class="ks-nav ks-browse">
<!--                        <div class="ks-separator">Vehicle Types</div>-->
<!--                        <ul class="nav">
                            <li class="nav-item">
                                <div class="nav-link">
                                    <div class="custom-control custom-checkbox">
                                        <input id="c5" type="checkbox" class="custom-control-input">
                                        <label class="custom-control-label" for="c5">Bus</label>
                                    </div>
                                    <span class="badge ks-circle badge-success"></span>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="nav-link">
                                    <div class="custom-control custom-checkbox">
                                        <input id="c7" type="checkbox" class="custom-control-input">
                                        <label class="custom-control-label" for="c7">Car</label>
                                    </div>
                                    <span class="badge ks-circle badge-danger"></span>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="nav-link">
                                    <div class="custom-control custom-checkbox">
                                        <input id="c7" type="checkbox" class="custom-control-input">
                                        <label class="custom-control-label" for="c7">Pull Car</label>
                                    </div>
                                    <span class="badge ks-circle badge-info"></span>
                                </div>
                            </li>
                        </ul>-->
<div class="ks-separator"><a class="nav-link pjaxCls" href="<?php echo base_url('page/48'); ?>">Action</a></div>
                        <ul class="nav">
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
        <div class="ks-nav-body">
            <div class="ks-user-list-view-header-block">
                <h4 class="ks-user-list-view-header-block-name">
                    <span class="d-none d-sm-block">Vehicles Assignment List</span>
                    <span class="ks-user-list-view-header-block-amount">
                        <span class="ks-icon la la-car"></span>
<!--                        <span>50 vehicles</span>-->
                    </span>
                </h4>

<!--                <div class="ks-user-list-view-header-control">
                    <a href="javascript:void(0)" class="btn btn-primary btn-add-vehicle" onclick="openForm('');">Add New Assignment</a>
                </div>-->
            </div>

            <div class="card panel add-vehicle " style="display: none;">
                
               
            </div>

            <div class="ks-user-list-view-table">
                <div class="ks-full-table">
                    <table id="ksdatatable" class="table table-list">
                        <thead>
                        <tr>
                            <th>Vehicle No.</th>
<!--                            <th>Maintenance date</th>-->
<!--                            <th>Employee</th>-->
                            <th>Employee</th>
<!--                            <th>Designation</th>-->
                           
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
                                
                                
                                <td><?php echo @$data->first_name.'' .@$data->middle_name.''.@$data->last_name; ?>(<?php echo @$data->employee_no; ?>)</td>
<!--                                <td><?php echo @$data->	designation; ?></td>-->
                                
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
       $.post("<?php echo base_url('vehicle_asignment_form'); ?>", {id: id}, function(result){
          //console.log(result);
       $(".add-vehicle").html(result);
       $(".add-vehicle").show(); 
       $(".btn-add-vehicle").hide(); 
     //  $('.flatpickrDate').flatpickr();
  });
  }


  function closeForm() {
    $(".add-vehicle").html('');
    $(".add-vehicle").hide();
    $(".btn-add-vehicle").show(); 
  }


  function delete_this(id) {
   //   alert (1);
        $("#myModal").on('shown.bs.modal', function() {
            $("#modal_confirm").click(function() {
               var url = "<?php echo base_url('asignment_delete'); ?>/" + id;
                $("#pjax-container").load(url,function(response,status){ 
                  //  alert(response);
                 //   alert(status);
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
            $("#notification_body").html("Do you want to Delete this Assignment?");
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