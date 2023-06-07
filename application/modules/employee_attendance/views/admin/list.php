<div class="ks-page-header">
    <section class="ks-title">
        <h3>Attendance Report</h3>
<!--        <div class="ks-controls">
            <button type="button" class="btn btn-primary btn_header_add" onclick="openForm('');">Add</button>            
        </div>-->
        <!--<a href="javascript:;" class="btn btn-iconic btn-warning btn-toggle-filter" onclick="$('.toggleFilter').slideToggle();"><span class="la la-filter"></span></a>-->
    </section>
</div>


<div class="ks-page-content">
    <div class="ks-page-content-body">
        <div class="container-fluid">
        <div class="content-wrapper">            
            <div class="form-wrapper" style="display:none">
                
            </div>  
             <div class="toggleFilter" style="display:none">   
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
            <div class="d-block" style="padding: 15px 15px 0;">
              <div class="row" id="calAtt">
                        <div class="col-md-4">
                        <div class="form-group">
                        <select class="form-control js-example-basic-multiple " id="employee" name="employee">
                        <?php
                        echo "<option value=''>Select Employee</option>";



                        foreach ($all_employee as $key => $each_employee) {

                           if($data_single->employee_id==$each_employee->id){
                              echo "<option value='".$each_employee->id."' selected>".$each_employee->first_name." ".$each_employee->middle_name." ".$each_employee->last_name." (".$each_employee->employee_no.")"." </option>";
                          }else{
                               echo "<option value='".$each_employee->id."'>".$each_employee->first_name." ".$each_employee->middle_name." ".$each_employee->last_name." (".$each_employee->employee_no.")"." </option>";
                          }  
                          
                        }
                        ?>                                   
                        </select>
                        </div>        
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select id='month_id' name="month_id" class="form-control">
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
                                <a href="javascript:void(0)" class="btn btn-danger btn-add-attendance" onclick="openattreport('');">Search</a>
                            </div>
                        </div>

                    </div>
            </div>
            <div class="table-responsive">
            <table id="table_search" class="table table-list">
              
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
            console.log(data);
            $("#table_search").html(data);
           
        });
      }
    }

function openattreport() {
        var employee = $("#employee option:selected").val();
        if(employee == ''){
          alert('Please select employee');
        }
        var month_id = $("#month_id option:selected").val();
         if(month_id == ''){
          alert('Please select Month');
        }
        if(employee != '' && month_id != ''){
        $.post("<?php echo base_url('admin_employee_att_report'); ?>", {'employee': employee, 'month_id': month_id}, function (result) {
            //console.log(result);
			 $('.js-example-basic-multiple').select2();
            $("#table_search").html(result);
           
        });
      }
    }

$( document ).ready(function() {
$(".child").hide();
$("body").delegate(".parent", 'click', function(e) {
e.preventDefault();
var parent = $(this).attr('data-parent');
$(".child"+"[data-child="+parent+"]").slideToggle("slow");
});	
});
</script>