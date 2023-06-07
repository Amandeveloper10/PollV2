<div class="ks-page-header">
    <section class="ks-title">
        <h3>Benefits / Project Insurance</h3>
        <div class="ks-controls">
            <button type="button" class="btn btn-primary btn_header_add" onclick="openForm('');">Add</button>
        </div>
    </section>
</div>

<div class="ks-page-content">
    <div class="ks-page-content-body">
        <div class="content-wrapper">
            
            <div class="form-wrapper" style="display:none">
                
            </div>
            
            
            <table id="ksdatatable" class="table table-list">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Start Date</th>
                    <th>Exp. Date</th>     
                    <th>Premium</th>                             
                    <th></th> 
                  </tr>
                </thead>
                <tbody>
                <?php
                    $sl = 1;
                    if (!empty($all_data)) {
                      foreach ($all_data as $data) {
                        $employee = $this->BenefitProInsModel->get_row_data('employee',array('id'=>$data->employee_id));
                    ?>
                  <tr>
                    <td><?php echo @$employee->name; ?></td>
                    <td><?php echo $data->start_date; ?></td>
                    <td><?php echo $data->end_date; ?></td>
                    <td><?php echo $data->premium; ?></td>
                     <td class="custom-action-btn">
                                               
                        <a href="javascript:void(0)" onclick="openForm(<?php echo $data->id; ?>);"><span class="ks-icon la la-edit" title="Edit" aria-hidden="false"></span></a>


                        <?php
                        if ($data->is_active == "Y") {
                            echo '<span class="ks-icon la la-check" style="color:green;" title="Activate"  aria-hidden="false" onclick="change_status(' . $data->id . ');"></span>';
                        } else {
                            echo '<span style="color:red;" title="De-activated" class="ks-icon la la-close" aria-hidden="false" onclick="change_status(' . $data->id . ');"></span>';
                        }
                        ?>

                        <span title="Delete" class="ks-icon la la-trash" aria-hidden="false" onclick="delete_this(<?php echo $data->id; ?>);"></span>

                    </td>                               
                  </tr>
                  <?php $sl++; } } ?>    
                </tbody>
              </table>
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
         $.post("<?php echo base_url('admin_get_edit_form_benefits_project_insurance'); ?>", {id: id}, function(result){
            //console.log(result);
         $(".form-wrapper").html(result);
         $(".form-wrapper").show();
         $('.flatpickrDate').flatpickr();
    });
    }


    function change_status(id) {
        $("#myModal").on('shown.bs.modal', function() {
            $("#modal_confirm").click(function() {
                var url = "<?php echo base_url('admin_status_benefits_project_insurance'); ?>/" + id;
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
            $("#notification_body").html("Do you want to change status of this Benefits / Project Insurance?");
        }).modal("show");
    }

     function delete_this(id) {
        $("#myModal").on('shown.bs.modal', function() {
            $("#modal_confirm").click(function() {
               var url = "<?php echo base_url('admin_delete_benefits_project_insurance'); ?>/" + id;
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
            $("#notification_body").html("Do you want to Delete this Benefits / Project Insurance?");
        }).modal("show");
    }
</script>