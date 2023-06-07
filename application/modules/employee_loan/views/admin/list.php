<div class="ks-page-header">
    <section class="ks-title">
        <h3>Loan</h3>
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
                  <div class="toggleFilter" >         
                    <div class="row" id="calAtt" style="display: none;">
            <?php $start_yr = '2018';
                        $end_yr = date('Y');
                        ?>

                        <div class="col-md-4">
                          <div class="form-group">
                            <select id='month_id' name="month_id" class="form-control">
                                <option value=''>Select Month</option>
                                <option value='01' <?php echo (date('m')=='01') ? 'selected' : ''; ?> >Janaury</option>
                                <option value='02' <?php echo (date('m')=='02') ? 'selected' : ''; ?>>February</option>
                                <option value='03' <?php echo (date('m')=='03') ? 'selected' : ''; ?>>March</option>
                                <option value='04' <?php echo (date('m')=='04') ? 'selected' : ''; ?> >April</option>
                                <option value='05' <?php echo (date('m')=='05') ? 'selected' : ''; ?> >May</option>
                                <option value='06' <?php echo (date('m')=='06') ? 'selected' : ''; ?> >June</option>
                                <option value='07' <?php echo (date('m')=='07') ? 'selected' : ''; ?> >July</option>
                                <option value='08' <?php echo (date('m')=='08') ? 'selected' : ''; ?> >August</option>
                                <option value='09' <?php echo (date('m')=='09') ? 'selected' : ''; ?> >September</option>
                                <option value='10' <?php echo (date('m')=='10') ? 'selected' : ''; ?> >October</option>
                                <option value='11' <?php echo (date('m')=='11') ? 'selected' : ''; ?> >November</option>
                                <option value='12' <?php echo (date('m')=='12') ? 'selected' : ''; ?> >December</option> 
                            </select>                        
                        </div>
                      </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <select id='year_id' name="year_id" class="form-control">
                                <option value=''>Select Year</option>                               
                                <?php for ($i=2018; $i <= $end_yr; $i++) {  ?>
                                   <option value='<?php echo $i; ?>' <?php echo (date('Y')==$i) ? 'selected' : ''; ?>><?php echo $i; ?></option>
                            <?php } ?> 
                            </select>
                                    </div>                 
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                   <a href="javascript:void(0)" class="btn btn-danger btn-add-attendance" onclick="searchleavedetails('');">Search Registered</a>
                 </div>
                 </div>

          </div>
         
          </div>
            <div class="form-wrapper" style="display:none">
                
            </div>
            
            <div id="register_leave_search">
            <table id="payrolltable" class="table table-list">
                                    
                <thead>
                  <tr>
                    <th>Employee Name</th>
                  <th>Loan Id</th>                  
                  <th>Reference</th>
                  <th>Issue Date</th>
                  <th class="text-right">Loan Amount</th>
                  <th>Installment Start Date</th>
                  <th>Loan End Date</th>
                  <th class="text-right">Installment Amount</th>
                  <th>Approved</th>
                  <?php
                   if($this->session->userdata('type')=='management')
                   {
                  ?>
                  <th></th>
                  <?php
                   }
                   ?>
                  </tr>
                </thead>
                <tbody id="searchData">
                 <?php
                                       foreach ($loan_application as $value) {
                                           
                                       
                                            ?>
                                            <tr id="deleteapplication<?php echo @$value->id;?>">
                                              <td><?php echo @$value->first_name.' '.@$value->middle_name.' '.@$value->last_name; ?></td>
                                                <td>
                                               <?php echo @$value->id; ?>
                                            </td>
<!--                                            <td>
                                                <?php echo @$value->first_name.' '.@$value->middle_name.' '.@$value->last_name; ?>
                                            </td>
                                            <td>
                                               <?php echo @$value->employee_no; ?>
                                            </td>-->
                                            <td>
                                                <?php echo @$value->reference_name; ?>
                                            </td>
                                            <td>
                                               <?php echo date("d M-Y", strtotime(@$value->loan_issue_date)); ?>
                                            </td>
                                            <td class="text-right">
                                                <?php echo @$value->sanction_amount; ?>
                                            </td>
                                            <td>
                                                <?php echo date("d M-Y", strtotime(@$value->installment_start_date)); ?>
                                            </td>
                                            <td>
                                               <?php echo date("d M-Y", strtotime(@$value->loan_end_date)); ?>
                                            </td>
                                            <td class="text-right">
                                               <?php echo @$value->installment_amount; ?>
                                            </td>
                                            <td>
                                               <?php echo @$value->loan_approved; ?>
                                            </td>
                                            <?php
                                                 if($this->session->userdata('type')=='management')
                                                 {
                                                ?>
                                                <td class="table-action">
                                                    <div class="dropdown">
                                                        <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="la la-ellipsis-v"></span>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                            <a class="dropdown-item" onclick="openForm('<?php echo @$value->id;?>')">
                                                                <span class="la la-pencil icon text-info"></span> Edit
                                                            </a>
                                                            <a class="dropdown-item" href="javascript:void(0)" onclick="delete_this(<?php echo $value->id; ?>);"><span class="la la-trash icon text-danger"></span> Delete</a>
                                                        <?php /* ?><?php
                                                            if($value->loan_close=='0')
                                                            {
                                                            ?>
                                                            <a class="dropdown-item" onclick="goforloanclose('<?php echo @$value->id;?>','<?php echo @$value->employee_id;?>')">Make Loan Close</a>
                                                        <?php
                                                            }
                                                            else{
                                                            ?>
                                                            <a style="cursor:pointer;color:red" class="dropdown-item" >Loan Has Closed</a>
                                                            <?php
                                                            }
                                                            ?><?php */ ?>
                                                            <!--<a class="dropdown-item" onclick="getallpayment('<?php echo @$value->id;?>')"  title="View">View Payment</a>-->
                                                        </div>
                                                    </div>
                                                </td>
                                                <?php
                                                 }
                                                 ?>
                                            </tr>
                                            <?php
                                       }
                                       ?>
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
            {targets: [ 1, 2], visible: false}
        ]
    });
    table.buttons().container().appendTo('.dataTable_buttons');
    $('.dataTables_filter').find('input').attr('placeholder', 'Search here...');
});
// datatable end 


    function openForm(id){
         $.post("<?php echo base_url('admin_get_edit_form_employee_loan'); ?>", {'id': id}, function(result){
           // console.log(result);
         $(".form-wrapper").html(result);
         $(".form-wrapper").show();
         $('.flatpickrDate').flatpickr();
        /* $('.flatpickrnew').flatpickr({
                   onChange: function(selectedDates, dateStr, instance) {
       leave_due_calculate_new(); 
       var from=$('#leave_from').val();
       
      var employee_id = $("#employee_id option:selected").val();
      
       if(from!='' && employee_id!='' && (typeof from != "undefined")){
        $.ajax({
                        url: '<?php echo base_url('employees_leave_application_duplicate_date'); ?>/' + from+'/'+employee_id,
                        type: 'POST',
                      
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (datanew) {
                       
                            if(datanew=='have'){
                                
         alert('You have all ready took or applied leave for this date');
         $('#leave_add').hide();
        }
        else{
           $('#leave_add').show(); 
            
        }
                        }
                    });

    }
       
                   }
                 });*/
    });

         $('.toggleFilter').hide();
    }



  function change_status(id,status,employee_id) {
                if (confirm('Are you sure ?')) {
                    $.ajax({
                        url: '<?php echo base_url('employees_leave_approval_status'); ?>/' + id+'/'+status+'/'+employee_id,
                        type: 'POST',
                        //data : new FormData( $("#expenses")[0]),
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (datanew) {
                            //alert(datanew);
                            if(datanew!='no'){
                                 var url = '<?php echo base_url('employee_leave'); ?>/1';
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
                        }
                        else{
                      alert('Your this type leave balance is 0');      
        }
                        }
                    });
                }


            }

 function delete_this(id) {
        $("#myModal").on('shown.bs.modal', function() {
            $("#modal_confirm").click(function() {
               var url = "<?php echo base_url('admin_delete_loan'); ?>/" + id;
                $("#pjax-container").load(url,function(response,status){
                    notification(status);
                });
            });

            $("#notification_heading").html("Confirmation");
            $("#notification_body").html("Do you want to Delete this Loan?");
        }).modal("show");
    }
</script>
