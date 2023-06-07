<div class="ks-page-header">
    <section class="ks-title">
        <h3><span>Rules > </span> WFH / Timeoff Rules</h3>
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
            <table id="payrolltable" class="table table-list">
                <thead>
                  <tr>
                    <th>Grade</th>
                    <th>Department</th>
                    <th>Type</th>
                    <th>Max limit</th>                           
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
                    <td><a class="pjaxCls" href="javascript:void(0)" onclick="openForm(<?php echo $data->id; ?>);"><?php if(!empty($data->grade_id)){
                      $gradeID = explode(',', $data->grade_id);
                      
                      foreach($gradeID as $key => $value){
                        
                       $all_grade = $this->WfhModel->get_row_data('master_grade',array('is_active'=>'Y','id'=>$value,'delete_flag'=>'N'));
                      $gradeName = $all_grade->grade_name.',';
                      echo $gradeName;
                      }
                    } ?></a></td>
                     <td><?php if(!empty($data->dept_id)){
                      $deptID = explode(',', $data->dept_id);
                      
                      foreach($deptID as $key => $value){
                        
                       $all_dept = $this->WfhModel->get_row_data('master_department',array('is_active'=>'Y','id'=>$value,'delete_flag'=>'N'));
                      $deptName = $all_dept->department_name.',';
                      echo $deptName;
                      }
                    } ?></td>
                     <td><!--<?php if($data->enanle_type == 'all_employee'){ echo 'For All Employee';}else{ echo 'Allows only employees who have WFH enable in their profile';} ?>-->
					<?php echo ucwords($data->type); ?>
					 </td>
                    <td><?php if($data->type == 'wfh'){ echo $data->limit; } else { echo $data->max_per_month; } ?></td>
                     <td class="table-action">
                        <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="la la-ellipsis-v"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="javascript:void(0)" onclick="openForm(<?php echo $data->id; ?>);"><span class="la la-pencil icon text-info"></span> Edit</a>
                            <?php
                                if ($data->is_active == "Y") {
                                    echo '<a class="dropdown-item" href="javascript:void(0)" onclick="change_status(' . $data->id . ');"><span class="ks-icon la la-close text-danger" aria-hidden="false"></span> De-activated</a>';
                                } else {
                                    echo '<a class="dropdown-item" href="javascript:void(0)" onclick="change_status(' . $data->id . ');"><span class="ks-icon la la-check text-success" aria-hidden="false"></span> Activate</a>';
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
         $.post("<?php echo base_url('admin_get_edit_form_wfh'); ?>", {id: id}, function(result){
            //console.log(result);
         $(".form-wrapper").html(result);
         $(".form-wrapper").show();
         $('.flatpickrDate').flatpickr();
    });
    }


    function change_status(id) {
        $("#myModal").on('shown.bs.modal', function() {
            $("#modal_confirm").click(function() {
                var url = "<?php echo base_url('admin_status_wfh'); ?>/" + id;
                $("#pjax-container").load(url,function(response,status){                           
                    notification(status);
                });
            });

            $("#notification_heading").html("Confirmation");
            $("#notification_body").html("Do you want to change status of this WFH Rules?");
        }).modal("show");
    }

     function delete_this(id) {
        $("#myModal").on('shown.bs.modal', function() {
            $("#modal_confirm").click(function() {
               var url = "<?php echo base_url('admin_delete_wfh'); ?>/" + id;
                $("#pjax-container").load(url,function(response,status){       
                    notification(status);
                });
            });

            $("#notification_heading").html("Confirmation");
            $("#notification_body").html("Do you want to Delete this WFH Rules?");
        }).modal("show");
    }

    


    function getDedLeave() {
      var checkBoxes = $("input[name=deduction_apply]");
      if(checkBoxes.prop("checked") == true){
          $(".deduDiv").show();
          $("#deduction_apply1").val('Y');
      }
      else if(checkBoxes.prop("checked") == false){
          $(".deduDiv").hide();
          $("#deduction_apply1").val('N');
      }
    }
</script>