<div class="ks-page-header">
    <section class="ks-title">
        <h3>Employees</h3>
        <div class="ks-controls">
            <button type="button" class="btn btn-primary" onclick="openFormEmp('');">Add</button>
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
                    <th>Employee Name</th>
                    <th>Date of Joining</th>  
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Status</th>                             
                    <th></th> 
                  </tr>
                </thead>
                <tbody>
                <?php
                    $sl = 1;
                    //echo "<pre>"; print_r($all_data); die;
                    if (!empty($all_data)) {
                      foreach ($all_data as $data) {
                       // $job_opening_name =  $this->EmployeesModel->get_row_data('master_req_job_opening',array('id'=>$data->job_opening_no));
                    ?>
                  <tr>
                    <!-- <td><?php //echo @$job_opening_name->position_title; ?></td> -->
                    <td><?php echo $data->first_name; ?></td>
                    <td><?php echo $data->joining_date; ?></td>
                    <td><?php echo $data->department; ?></td>
                    <td><?php echo $data->designation; ?></td>
                    <td><?php
                        if ($data->is_active == "Y") {
                            echo 'Active';
                        } else {
                             echo 'De-active';
                        }
                        ?></td>
                     <td class="custom-action-btn">
                                               
                        <a href="javascript:void(0)" onclick="openFormEmp(<?php echo $data->id; ?>);"><span class="ks-icon la la-edit" title="Edit" aria-hidden="false"></span></a>


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
    function openFormEmp(id){
         $.post("<?php echo base_url('admin_get_edit_form_employees'); ?>", {id: id}, function(result){
            //console.log(result);
         $(".form-wrapper").html(result);
         $(".form-wrapper").show();
         $(".flatpickrDate").flatpickr();
         $('.flatpickr').flatpickr({
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                minDate: "today",
                time_24hr: true

            });
         
    });
    }


    function change_status(id) {
        $("#myModal").on('shown.bs.modal', function() {
            $("#modal_confirm").click(function() {
                var url = "<?php echo base_url('admin_status_employees'); ?>/" + id;
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
            $("#notification_body").html("Do you want to change status of this Employees?");
        }).modal("show");
    }

     function delete_this(id) {
        $("#myModal").on('shown.bs.modal', function() {
            $("#modal_confirm").click(function() {
               var url = "<?php echo base_url('admin_delete_employees'); ?>/" + id;
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
            $("#notification_body").html("Do you want to Delete this Employees?");
        }).modal("show");
    }

    function getvall(type) {
    //console.log(type);
      var checkBoxes = $("input[name="+type+"]");   
      //console.log(checkBoxes);  
      if(checkBoxes.prop("checked") == true){
       // console.log('yes');   
          $("#"+type+"1").val('Y');
      }
      else if(checkBoxes.prop("checked") == false){
        //console.log('no'); 
          $("#"+type+"1").val('N');
      }


    }


   
   function getCandidate(job_id){
         $.post("<?php echo base_url('admin_get_interview_candidate'); ?>", {'job_id': job_id}, function(result){
            //console.log(result);
         $("#candidate_id_div").html(result);
         });
    }

    //preview the image
function readURLEmployees(input,formname,fileName) {
    //console.log(input);
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah_'+fileName).attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }  

// save image
$.ajax({
    url : '<?php echo base_url('admin_get_image_dynamic_name/'); ?>'+fileName,
    type : 'POST',
    data : new FormData( $("#"+formname)[0]),
    async : false,
    cache : false,
    contentType : false,
    processData : false,
    success : function(data) {
        //console.log(data);
        $("#new_"+fileName).val(data);
    }
});

}

</script>