<div class="ks-page-header">
    <section class="ks-title">
        <h3>Summary Report</h3>
<!--        <div class="ks-controls">
            <button type="button" class="btn btn-primary btn_header_add" onclick="openForm('');">Add</button>            
        </div>-->
    </section>
</div>


<div class="ks-page-content">
    <div class="ks-page-content-body">
        <div class="container-fluid">
        <div class="content-wrapper">            
            <div class="form-wrapper mb-4" style="display:none">
                
            </div>  
             <div class="d-block" style="padding: 15px 15px 0;">
               <div class="row">
                       
                        <div class="col-md-4">
                            <div class="form-group">
                                <select id='month' name="month" class="form-control">
                                    <option value=''>Select Month</option>
                                    <option value='01' <?php echo (date('m') == '01') ? 'selected' : ''; ?> >January</option>
                                    <option value='02' <?php echo (date('m') == '02') ? 'selected' : ''; ?>>February</option>
                                    <option value='03' <?php echo (date('m') == '03') ? 'selected' : ''; ?>>March</option>
                                    <option value='04' <?php echo (date('m') == '04') ? 'selected' : ''; ?> >April</option>
                                    <option value='05' <?php echo (date('m') == '05') ? 'selected' : ''; ?> >May</option>
                                    <option value='06' <?php echo (date('m') == '06') ? 'selected' : ''; ?> >June</option>
                                    <option value='07' <?php echo (date('m') == '07') ? 'selected' : ''; ?> >July</option>
                                    <option value='08' <?php echo (date('m') == '08') ? 'selected' : ''; ?> >August</option>
                                    <option value='09' <?php echo (date('m') == '09') ? 'selected' : ''; ?> >September</option>
                                    <option value='10' <?php echo (date('m') == '10') ? 'selected' : ''; ?> >October</option>
                                    <option value='11' <?php echo (date('m') == '11') ? 'selected' : ''; ?> >November</option>
                                    <option value='12' <?php echo (date('m') == '12') ? 'selected' : ''; ?> >December</option> 
                                </select>                        
                            </div>
                        </div>

                       
                        <div class="col-md-4">
                            <div class="form-group">
                                <a href="javascript:void(0)" class="btn btn-danger btn-add-attendance" onclick="openreport('');">Search</a>
                            </div>
                        </div>

                    </div>     
</div>
             
            <div class="table-responsive">
            <table id="summanryReport" class="table table-list" >
                <thead>
                  <tr>
                    <th>Sl#</th>
                    <th>Employee Name</th>
                    <th>RF No.</th>
                    <?php if(!empty($all_leave_type)){
                    foreach($all_leave_type as $leave_type){?>
                    <th><?='Opening '.$leave_type->rule_name?></th>
                    <?php } } ?>
                    <th>Late</th>
                    <th>CL Taken</th>
                    <th>PL Taken</th>
                    <th>LOP</th>
                    <th>Total Leave</th>
                    <th>WFH</th>
                    <th>Half Day</th>
                    <th>Outside Duty</th>
                    <th>Early Leave</th>
                  </tr>
                </thead>
                <tbody>
              
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
  
function openreport() {
        var month = $("#month option:selected").val();
         if(month == ''){
          alert('Please select Month');
        }
        if(month != ''){
        $.post("<?php echo base_url('admin_employee_report'); ?>", {'month': month}, function (data) {
            //console.log(data);
            //$("#ksdatatable").html(data);
             $("#summanryReport").html(data);
           
        });
      }
    }

</script>