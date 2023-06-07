<div class="ks-page-header">
    <section class="ks-title">
        <h3>Pay Schedule</h3>
        <div class="ks-controls">
            <button type="button" class="btn btn-primary" style="display: none;" onclick="openForm('');">Add</button>
        </div>
    </section>
</div>



<div class="ks-page-content">
    <div class="ks-page-content-body">
        <div class="container-fluid">
        <div class="content-wrapper">            
            <div class="form-wrapper" >
                
            </div>           
            
            <div class="table-responsiveX">
            <!-- class="table table-list" >
                <thead>
                  <tr>  
                     
                    <th>State</th>                         
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
                    
                    <td><?php echo $data->name; ?></td>
                   
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
              </table> -->

             <!--  modified by priyam on 24/08/19 -->


             

             <form class="closeForm" onsubmit="return myFunction('pay_schedule')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_pay_schedule').'/'.$id : base_url('admin_add_pay_schedule'); ?>" name="pay_schedule" id="pay_schedule" enctype="multipart/form-data" >
              <?php if(isset($data_single->id)){ ?>
              <input type="hidden" class="form-control" name="id"  value="<?=$data_single->id?>" ><?php } ?>
                <div class="row">
                <div class="col-sm-6 col-xl-4">
                    <div class="form-group">  
                    <label for="" class="form-control-label">Date of Processing Month:</label>                           
                         <select class="form-control"  name="processing_month" style="margin-top: 8px;" required="required">
                        <option value="">Month</option>               
                        <option value='Janaury' <?php echo ((isset($data_single->processing_month) && ($data_single->processing_month=='Janaury')) ? 'selected' : ''); ?>>Janaury</option>
                        <option value='February' <?php echo ((isset($data_single->processing_month) && ($data_single->processing_month=='February')) ? 'selected' : ''); ?>>February</option>
                        <option value='March' <?php echo ((isset($data_single->processing_month) && ($data_single->processing_month=='March')) ? 'selected' : ''); ?>>March</option>
                        <option value='April' <?php echo ((isset($data_single->processing_month) && ($data_single->processing_month=='April')) ? 'selected' : ''); ?>>April</option>
                        <option value='May' <?php echo ((isset($data_single->processing_month) && ($data_single->processing_month=='May')) ? 'selected' : ''); ?>>May</option>
                        <option value='June' <?php echo ((isset($data_single->processing_month) && ($data_single->processing_month=='June')) ? 'selected' : ''); ?>>June</option>
                        <option value='July' <?php echo ((isset($data_single->processing_month) && ($data_single->processing_month=='July')) ? 'selected' : ''); ?>>July</option>
                        <option value='August' <?php echo ((isset($data_single->processing_month) && ($data_single->processing_month=='August')) ? 'selected' : ''); ?>>August</option>
                        <option value='September' <?php echo ((isset($data_single->processing_month) && ($data_single->processing_month=='September')) ? 'selected' : ''); ?>>September</option>
                        <option value='October' <?php echo ((isset($data_single->processing_month) && ($data_single->processing_month=='October')) ? 'selected' : ''); ?>>October</option>
                        <option value='November' <?php echo ((isset($data_single->processing_month) && ($data_single->processing_month=='November')) ? 'selected' : ''); ?>>November</option>
                        <option value='December' <?php echo ((isset($data_single->processing_month) && ($data_single->processing_month=='December')) ? 'selected' : ''); ?>>December</option>
                        </select>
                    </div>        
                </div>
                 <div class="col-sm-6 col-xl-4">
                    <div class="form-group">  
                    <label for="" class="form-control-label">Day of Processing:</label>                        
                        <select required class="form-control"  name="period_day" required="required">
                        <option value="">Day</option>
                        <?php for ($i = 1; $i <= 31; $i++) : ?>
                        <option value="<?php echo $i; ?>" <?php echo ((isset($data_single->day_of_processing) && ($data_single->day_of_processing==$i)) ? 'selected' : ''); ?>><?php echo $i; ?></option>
                        <?php endfor; ?>
                        </select>
                    </div>        
                </div>
                  <div class="col-sm-6 col-xl-4">
                    <div class="form-group">  
                    <label for="" class="form-control-label">Calculate Monthly salary based on:</label><br>                            
                       <!--  <input placeholder="State Name" type="text" class="form-control" id="name"  name="name" value="<?php echo (isset($data_single->name) ? $data_single->name : ''); ?>"> -->
                        <input type="radio" name="days" <?php if(isset($data_single->id) && $data_single->based_on == 'actual_days'){ echo 'checked'; }?> onclick="return getallvalue('actual_days');">Actual days in a month<br>
                        <input type="radio" name="days" <?php if(isset($data_single->id) && $data_single->based_on == 'organisation_working_days'){ echo 'checked'; }?> onclick="return getallvalue('organisation_working_days');" >Organisation working days per month<br>
                        <input type="hidden" class="form-control" id="based_on"  name="based_on" value="<?php echo (isset($data_single->based_on) ? $data_single->based_on : ''); ?>">
                    </div>        
                </div>
              </div>


              <div class="col-md-12">
                      <div class="form-group form-buttons">
                           <button type="submit" name="submit" class="btn btn-success">Save</button>
                           <!--<a href="javascript:;" class="btn btn-secondary" onclick="btnCloseForm();">Close</a>-->
                      </div>
                  </div>   


              </form>
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
         $.post("<?php echo base_url('admin_get_edit_form_state_add'); ?>", {id: id}, function(result){
            //console.log(result);
         $(".form-wrapper").html(result);
         $(".form-wrapper").show();
         $(".flatpickrDate").flatpickr();
    });
    }


    function change_status(id) {
        $("#myModal").on('shown.bs.modal', function() {
            $("#modal_confirm").click(function() {
                var url = "<?php echo base_url('admin_status_state_add'); ?>/" + id;
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
            $("#notification_body").html("Do you want to change status of this State List?");
        }).modal("show");
    }

     function delete_this(id) {
        $("#myModal").on('shown.bs.modal', function() {
            $("#modal_confirm").click(function() {
               var url = "<?php echo base_url('admin_delete_state_add'); ?>/" + id;
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
            $("#notification_body").html("Do you want to Delete this State list?");
        }).modal("show");
    }

    function getallvalue(value){
      $('#based_on').val(value);
    }
</script>