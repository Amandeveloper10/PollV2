<div class="ks-page-header">
    <section class="ks-title">
        <h3>Employee</h3>
        <div class="ks-controls">            
            <a href="javascript:;" class="btn btn-light btn_maximize"><i class="far fa-window-maximize"></i></a>
			<a class="btn btn-info btn-icon" href="javascript:void(0)"onclick="upload_emp_csv('');"><i class="fa fa-upload"></i></a>
            <a href="<?php echo base_url('page/56'); ?>" class="btn btn-primary pjaxCls">Add</a>            
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
                    <div class="custom-tab">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" data-toggle="pill" href="#tab_1">Active <small>(#<?php echo count($all_data); ?>)</small></a></li>                      
                            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#tab_2">Archive <small>(#<?php if(!empty($all_data_archive)){ echo count($all_data_archive);}else{ echo '0';} ?>)</small></a></li>                        
                        </ul>
                    </div>
                    <div class="tab-content">
                    <div class="tab-pane fade active show" id="tab_1" role="tabpanel" aria-expanded="false">
                    <table id="payrolltable" class="table table-list">
                        <thead>
                            <tr>
                                <th>Employee</th>
                                <th>RF #</th>                                
                                <th>Department & Designation</th>
                                <th>Emp. Status</th>
                                <th>Status</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($all_data)) {
                                $i = 1;
                                $badge_color = '';
                                foreach ($all_data as $value) {

                                    $department = $this->EmployeesModel->get_row_data('master_department', array('id' => $value->department));

                                    $designation = $this->EmployeesModel->get_row_data('master_designation', array('id' => $value->designation));

                                    if ($value->status == 'Trainee') {
                                        $badge_color = 'badge-info';
                                    }
                                    if ($value->status == 'Provisional') {
                                        $badge_color = 'badge-warning';
                                    }
                                    if ($value->status == 'Contractual') {
                                        $badge_color = 'badge-purple';
                                    }
                                    if ($value->status == 'Permanent') {
                                        $badge_color = 'badge-success';
                                    }
                                    ?>
                                    <tr>                                        
                                        <td class="d-flex align-items-center">
                                            <img <?php if (isset($value->personal_image) && $value->personal_image != '') { ?> src="<?php echo base_url(); ?>uploads/<?php echo (isset($value->personal_image) && $value->personal_image != '') ? $value->personal_image : ''; ?>" <?php } else { ?> src="<?php echo base_url(); ?>/assets/img/avatars/placeholders/ava-128.png" <?php } ?>class="ks-avatar" alt="" width="36" height="36">
                                            <a class="" href="<?php echo base_url('page/64/' . base64_encode(@$value->id)); ?>"><?php echo @$value->first_name . ' ' . @$value->middle_name . ' ' . @$value->last_name; ?><br>
                                                <small><?php echo @$value->employee_no; ?></small>
                                            </a>                                            
                                        </td>
                                        <td>
                                            <?php echo @$value->rf_no; ?>
                                        </td>
                                        <td>
                                            <?php echo @$department->department_name; ?><br>
                                            <small><?php echo @$designation->designation_name; ?></small>
                                        </td>                                        
                                        <td><label class="badge <?php echo $badge_color; ?>"><?php echo @$value->status; ?></label>                                            
                                        </td>
                                        <td><?php
                                            if (@$value->is_active == "Y") {                                                
                                                echo '<label class="badge badge-success">Active</label>';
                                            } else {                                                
                                                echo '<label class="badge badge-danger">De-active</label>';
                                            }
                                            ?></td>
                                        <td class="table-action">
                                            <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="la la-ellipsis-v"></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                <a class="dropdown-item" href="<?php echo base_url('page/64/' . base64_encode(@$value->id)); ?>"><span class="la la-pencil ks-icon text-info"></span> Edit</a>
												<a class="dropdown-item pjaxCls" onclick="template_choose(<?=$value->id?>);" >Template</a>
                                                <?php
                                                if (@$value->is_active == "Y") {
                                                    echo '<a class="dropdown-item" href="javascript:void(0)" onclick="change_status(' . @$value->id . ');"><span class="ks-icon la la-close text-danger" aria-hidden="false"></span> De-activated</a>';
                                                } else {
                                                    echo '<a class="dropdown-item" href="javascript:void(0)" onclick="change_status(' . @$value->id . ');"><span class="ks-icon la la-check text-success" aria-hidden="false"></span> Activate</a>';
                                                }
                                                ?>
                                                <a class="dropdown-item" href="javascript:;" onclick="delete_this('<?php echo @$value->id; ?>');"><span class="ks-icon la la-trash text-danger"></span> Delete</a>
                                            </div>                                                
                                        </td>                            
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    </div>                        
                    <div class="tab-pane fade" id="tab_2" role="tabpanel" aria-expanded="false">
                         <table id="payrolltable_archive" class="table table-list">
                        <thead>
                            <tr>
                                <th>Employee</th>
                                <th>RF #</th>                                
                                <th>Deptt. & Designation</th>
                                <th>Emp. Status</th>
                                <th>Status</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($all_data_archive)) {
                                $i = 1;
                                $badge_color = '';
                                foreach ($all_data_archive as $value) {

                                    $department = $this->EmployeesModel->get_row_data('master_department', array('id' => $value->department));

                                    $designation = $this->EmployeesModel->get_row_data('master_designation', array('id' => $value->designation));

                                    if ($value->status == 'Trainee') {
                                        $badge_color = 'badge-info';
                                    }
                                    if ($value->status == 'Provisional') {
                                        $badge_color = 'badge-warning';
                                    }
                                    if ($value->status == 'Contractual') {
                                        $badge_color = 'badge-purple';
                                    }
                                    if ($value->status == 'Permanent') {
                                        $badge_color = 'badge-success';
                                    }
                                    ?>
                                    <tr>
                                        <td class="d-flex align-items-center">
                                            <img <?php if (isset($value->personal_image) && $value->personal_image != '') { ?> src="<?php echo base_url(); ?>uploads/<?php echo (isset($value->personal_image) && $value->personal_image != '') ? $value->personal_image : ''; ?>" <?php } else { ?> src="<?php echo base_url(); ?>/assets/img/avatars/placeholders/ava-128.png" <?php } ?>class="ks-avatar" alt="" width="36" height="36">
                                            <a class="pjaxCls" href="<?php echo base_url('page/64/' . base64_encode(@$value->id)); ?>"><?php echo @$value->first_name . ' ' . @$value->middle_name . ' ' . @$value->last_name; ?><br>
                                                <small><?php echo @$value->employee_no; ?></small>
                                            </a>                                            
                                        </td>
                                        <td>
                                            <?php echo @$value->rf_no; ?>
                                        </td>
                                        <td>
                                            <?php echo @$department->department_name; ?><br>
                                            <small><?php echo @$designation->designation_name; ?></small>
                                        </td>                                        
                                      <td><label class="badge <?php echo $badge_color; ?>"><?php echo @$value->status; ?></label>  </td>
                                        <td><?php
                                            if (@$value->is_active == "Y") {
                                                echo '<label class="badge badge-success">Active</label>';
                                            } else {
                                                echo '<label class="badge badge-danger">De-activate</label>';
                                            }
                                            ?></td>
                                        <td class="table-action">
                                            <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="la la-ellipsis-v"></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                <a class="dropdown-item pjaxCls" href="<?php echo base_url('page/64/' . base64_encode(@$value->id)); ?>"><span class="la la-pencil ks-icon text-info"></span> Edit</a>
                                                <?php
                                                if (@$value->is_active == "Y") {
                                                    echo '<a class="dropdown-item" href="javascript:void(0)" onclick="change_status(' . @$value->id . ');"><span class="ks-icon la la-close text-danger" aria-hidden="false"></span> De-activated</a>';
                                                } else {
                                                    echo '<a class="dropdown-item" href="javascript:void(0)" onclick="change_status(' . @$value->id . ');"><span class="ks-icon la la-check text-success" aria-hidden="false"></span> Activate</a>';
                                                }
                                                ?>
                                                <a class="dropdown-item" href="javascript:;" onclick="delete_this('<?php echo @$value->id; ?>');"><span class="ks-icon la la-trash text-danger"></span> Delete</a>
                                            </div>                                                
                                        </td>                            
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

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

<div class="modal" id="templateModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="notification_heading">Templates</h4>        
          
               
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         
      </div>

      <!-- Modal body -->
      <div class="modal-body" >
       <div class="add-project">
                                   
        </div>
      </div>
      <!-- Modal footer -->
    </div>
  </div> 
</div>

<div class="modal" id="templateModal_new">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="notification_heading">Templates</h4>
			<div class="col-3 text-right" id="temp_download_button1">
			</div> 
			<div class="col-3 text-right" id="temp_download_button2">
			</div> 
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" >
       <div class="add-project">
                                   
        </div>
      </div>
      <!-- Modal footer -->
    </div>
  </div> 
</div>

<div class="modal" id="uploadcsv">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="notification_heading">Upload Employees</h4>        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" >
       <div class="add-project">
                                   
        </div>
      </div>
      <!-- Modal footer -->
    </div>
  </div> 
</div>
<script type="text/javascript">

    $(document).ready(function () {
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
                {targets: [1], visible: false}
            ]
        });
        table.buttons().container().appendTo('.dataTable_buttons'); 

         var table2 = $('#payrolltable_archive').DataTable({
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
                {targets: [1], visible: false}
            ]
        });
        
        //table2.buttons().container().appendTo('.dataTable_buttons');        
        $('.dataTables_filter').find('input').attr('placeholder', 'Search here...');

    });



    


    function openForm(id) {
        $.post("<?php echo base_url('admin_get_edit_form_vehicles'); ?>", {id: id}, function (result) {
            //console.log(result);
            $(".add-vehicle").html(result);
            $(".add-vehicle").show();
            $(".btn-add-vehicle").hide();
            $('.flatpickrDate').flatpickr();
        });
    }

     function open_archive_list() {
        var id = '';
        $.post("<?php echo base_url('employees_details_archive'); ?>", {id: id}, function (result) {
            //console.log(result);
            $("#tab_1").html(result);
           
        });
    }


    function closeForm() {
        $(".add-vehicle").html('');
        $(".add-vehicle").hide();
        $(".btn-add-vehicle").show();
    }


    function delete_this(id) {
        $("#myModal").on('shown.bs.modal', function () {
            $("#modal_confirm").click(function () {
                var url = "<?php echo base_url('admin_delete_employee'); ?>/" + id;
                $("#pjax-container").load(url, function (response, status) {
                    notification(status);
                });
            });
            $("#notification_heading").html("Confirmation");
            $("#notification_body").html("Do you want to Delete this Employee?");
        }).modal("show");
    }


    function readURLVehicle(input, formname, filedname) {

        // save file
        $.ajax({
            url: '<?php echo base_url('admin_upload_files'); ?>/' + filedname,
            type: 'POST',
            data: new FormData($("#" + formname)[0]),
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                //console.log(data);
                $("#" + filedname + "_1").val(data);
            }
        });

    }

    function change_status(id) {
        $("#myModal").on('shown.bs.modal', function () {
            $("#modal_confirm").click(function () {
                var url = "<?php echo base_url('admin_status_employees_details'); ?>/" + id;
                $("#pjax-container").load(url, function (response, status) {
                    notification(status);
                });
            });
            $("#notification_heading").html("Confirmation");
            $("#notification_body").html("Do you want to change status of this Employee?");
        }).modal("show");
    }
	
	  function template_choose(id){
         $("#templateModal").on('shown.bs.modal', function() {
             $.post("<?php echo base_url('template_choose'); ?>", {id: id}, function(result){
                //console.log(result); //lead_list
             $(".add-project").html(result);
             $(".add-project").show();
            });
          }).modal("show");
    }
	
	 function genarate_temp(){
		 $('#templateModal').modal('hide');
         $("#templateModal_new").on('shown.bs.modal', function() {
			 
			 var templates_id = $('#templates_id').val();
			 if(templates_id == ''){
				 alert('Please select template');
				 return false;
			 }
			 var emp_id = $('#emp_id').val();
             $.post("<?php echo base_url('template_genarate'); ?>", {templates_id: templates_id,emp_id:emp_id}, function(result){
                console.log(result); //lead_list
             $(".add-project").html(result);
             $(".add-project").show();
			 $('#temp_download_button1').html('<button id="temp_download_button" onclick="send_email('+templates_id+','+emp_id+')"  class="btn btn-danger ">Send Email</button>');
			 $('#temp_download_button2').html('<button id="temp_download_button" onclick="download('+templates_id+','+emp_id+')"  class="btn btn-danger ">Download</button>');
            });
          }).modal("show");
    }
	
	 function download(templates_id,emp_id) {
  
    window.location.assign("<?php echo base_url('downtemplate'); ?>/"+templates_id+'/'+emp_id);
//            $.post("<?php echo base_url('down_slip'); ?>", {'month': month, 'year': year, 'employee_id': id}, function (result) {
//            console.log(result);
//            //$(".salaryslipmodal").html(result);
            $('#templateModal_new').modal('hide');
            
//        }); 
}

function send_email(templates_id,emp_id) {
  
    window.location.assign("<?php echo base_url('sendemail'); ?>/"+templates_id+'/'+emp_id);
//            $.post("<?php echo base_url('down_slip'); ?>", {'month': month, 'year': year, 'employee_id': id}, function (result) {
//            console.log(result);
//            //$(".salaryslipmodal").html(result);
           notification('success');  
            $('#templateModal_new').modal('hide');
            
//        }); 
}

  function upload_emp_csv(id = ''){
         $("#uploadcsv").on('shown.bs.modal', function() {
             $.post("<?php echo base_url('upload_emp_csv'); ?>", {id: id}, function(result){
                //console.log(result); //lead_list
             $(".add-project").html(result);
             $(".add-project").show();
            });
          }).modal("show");
    }
	
	

</script>

