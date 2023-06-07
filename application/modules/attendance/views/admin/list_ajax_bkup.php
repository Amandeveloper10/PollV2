<div class="ks-page-header">
    <section class="ks-title">
        <h3>Attendance</h3><span style="color: red"><?php print_r($this->session->flashdata('flash_attandance'));?></span>
        <div class="ks-controls">
             <a href="javascript:void(0)" class="btn btn-primary btn-add-attendance" onclick="upload_csv('');">Upload Attandance</a>
            <a href="javascript:void(0)" class="btn btn-primary btn-add-attendance" onclick="openForm('', '<?php echo date('Y-m-d'); ?>');">Add</a>
            <a href="javascript:;" class="btn btn-iconic btn-warning btn-toggle-filter" onclick="$('.toggleFilter').slideToggle();"><span class="la la-filter"></span></a>
        </div>

    </section>
</div>

<div class="ks-page-content">
    <div class="ks-page-content-body">
        <div class="container-fluid">
            <div class="content-wrapper">            
                <div class="toggleFilter" style="display: none">
                    <form method="get" id="searchForm" onsubmit="return getSearchAtt()" >
                        <div class="row" style="margin-bottom:0">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Start Date</label>
                                    <input required  type="text" placeholder="Enter Start Date" class="form-control flatpickrDateNew" name="start_date" id="start_date" value="<?php echo (isset($_GET['start_date']) && $_GET['start_date'] != '') ? $_GET['start_date'] : $start_date; ?>">
                                </div>
                                <span id="stdateErr" style="color: red;"></span>
                            </div>
                            <!-- <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">End Date</label>
                                    <input required  type="text" placeholder="Enter End Date" class="form-control flatpickrDateNew" name="end_date" id="end_date" value="<?php //echo (isset($_GET['end_date']) && $_GET['end_date']!='') ? $_GET['end_date'] : '';   ?>">
                                </div>
                                <span id="enddateErr" style="color: red;"></span>
                            </div> -->

                            <div class="col-md-4">
                                <div class="form-group mt-md-25" >
                                    <button type="submit" name="submit" class="btn btn-success save-profile-btn">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="row" id="calAtt">
                        <?php
                        $start_yr = '2018';
                        $end_yr = date('Y');
                        ?>

                        <div class="col-md-4">
                            <div class="form-group">
                                <select id='month_id' name="month_id" class="form-control">
                                    <option value=''>Select Month</option>
                                    <option value='01' <?php echo (date('m') == '01') ? 'selected' : ''; ?> >Janaury</option>
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
                                <select id='year_id' name="year_id" class="form-control">
                                    <option value=''>Select Year</option>                               
                                    <?php for ($i = 2018; $i <= $end_yr; $i++) { ?>
                                        <option value='<?php echo $i; ?>' <?php echo (date('Y') == $i) ? 'selected' : ''; ?>><?php echo $i; ?></option>
                                    <?php } ?> 
                                </select>
                            </div>                 
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <a href="javascript:void(0)" class="btn btn-danger btn-add-attendance" onclick="openAttendance('');">Calender Attendance</a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="add-attendance mb-4" style="display: none;">                

                </div>       


                <div  class="table-responsiveX">
                    <table id="ksdatatable" class="table table-list">
                        <thead>
                            <tr>
                                <th>Employee No.</th>                            
                                <th>Date</th>
                                <th>In Time</th>
                                <th>Out Time</th>
                                <!--<th>Status</th>-->
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sl = 1;
                            //echo '<pre>'; print_r($all_data); die;
                            if (!empty($all_data)) {
                                foreach ($all_data as $data) {
                                    $department = $this->AttendanceModel->get_row_data('master_department', array('id' => $data->department));

                                    $designation = $this->AttendanceModel->get_row_data('master_designation', array('id' => $data->designation));

                                    $current_att = $this->AttendanceModel->get_row_data('attendance', array('employee_id' => $data->id, 'date' => $start_date));

                                    if (isset($_GET['start_date'])) {
                                        $date = $data->date;
                                        $intime = $data->entry_time;
                                        $outtime = $data->out_time;
                                        $type = $data->type;
                                    } else {
                                        /*$date = (!empty($current_att)) ? $current_att->date : '';
                                        $intime = (!empty($current_att)) ? $current_att->entry_time : '';
                                        $outtime = (!empty($current_att)) ? $current_att->out_time : '';
                                        $type = (!empty($current_att)) ? $current_att->type : '';*/
                                        $date = $data->date;
                                        $intime = $data->entry_time;
                                        $outtime = $data->out_time;
                                        $type = $data->type;
                                    }

                                    $freezmonth = $this->AttendanceModel->get_row_data('attendance_freeze_payroll', array('month' => $data_month, 'year' => $data_year));
                                    ?>

                                    <tr>
                                        <td><?php echo @$data->first_name . ' ' . @$data->middle_name . ' ' . @$data->last_name; ?><br>(<?php echo $data->employee_no; ?>)<br><small><?php echo @$department->department_name; ?></small><br><small><?php echo @$designation->designation_name; ?></small></td>
                                        <td><?php echo (@$date) ? @$date : date('Y-m-d'); ?></td>
                                        <td><?php echo (@$intime) ? @$intime : '00:00'; ?></td>
                                        <td><?php echo (@$outtime) ? @$outtime : '00:00'; ?></td>
                                        <!--<td><?php echo (@$type == 'Absent') ? "<span style='color:red;'>Absent</span>" : (@$type) ? @$type : '-'; ?></td>-->
                                        <td class="table-action">
                                         <?php 
                                         //print_r($freezmonth); die;
                                         //if(!empty($current_att) && empty($freezmonth)){  
                                         if(!empty($all_data)){
                                         ?>
                                            <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="la la-ellipsis-v"></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                <a class="dropdown-item" href="javascript:void(0)" onclick="openForm('<?php echo @$data->id; ?>', '<?php echo (isset($_GET['start_date']) && $_GET['start_date'] != '') ? $_GET['start_date'] : $start_date; ?>');"><span class="la la-pencil icon text-info"></span> Edit</a>                                        
                                            </div> 
                                        <?php }  ?>
                                        </td> 
                                    </tr>                          
                                    <?php
                                    $sl++;
                                }
                            } else {
                                echo '<tr><td class="no-data-found" colspan="7">No date found</td></tr>';
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

<div class="modal" id="uploadcsv">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="notification_heading">Upload Attendance</h4>
        <nav class="breadcrumb ks-default" style="margin-left: 12px;">
        <a href="<?php echo base_url(); ?>assets/img/demo_attendance.csv" title="Demo CSV Download" class="breadcrumb-item ks-breadcrumb-icon" download><span class="la la-cloud-download"></span></a>
        </nav>
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
<!-- [end] Notification DIV -->


<!--rightbar-->
<!--<div class="ks-settings-slide-block">
    <div class="ks-header">
        <span class="ks-text">Layout Options</span>
        <a class="ks-settings-slide-close-control">
            <span class="ks-icon la la-close"></span>
        </a>
    </div>    
    <div class="ks-themes-list">
          hello world
    </div>
    
</div>-->
<script type="text/javascript">
    function openForm(id, stDate) {
        $.post("<?php echo base_url('admin_get_edit_form_attendance'); ?>", {'id': id, 'stDate': stDate}, function (result) {
            //console.log(result);
            $(".add-attendance").html(result);
            $(".add-attendance").show();
            $(".btn-add-attendance").hide();
            $(".btn-toggle-filter").hide();
            $("#calAtt").hide();

            //$('.flatpickrDateNew').flatpickr();
            $('.flatpickr').flatpickr({
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true
            });

            $('.flatpickrDateNew').flatpickr({
                onChange: function (selectedDates, dateStr, instance) {
                    checkAtt();
                }
            });


            $('#searchForm').hide();
        });
    }


    function closeForm() {
        $(".add-attendance").html('');
        $(".add-attendance").hide();
        $(".btn-add-attendance").show();
        $('#searchForm').show();
        $("#calAtt").show();
        $(".btn-toggle-filter").show();
    }

    function getvallAtt(vaal) {
        $("#type_val").val(vaal);

        if (vaal == 'Absent') {
            $("#entry_time").val('');
            $("#out_time").val('');
            $(".presentDiv").hide();
        } else {
            $(".presentDiv").show();
        }
    }

    function checkAtt() {
        var dateVal = $("#date").val();
        var empVal = $("#employee_id option:selected").val();
        var att_id = $("#att_id").val();
        if (dateVal != "" && empVal != "") {
            $.post("<?php echo base_url('admin_check_emp_attendance'); ?>", {'dateVal': dateVal, 'empVal': empVal, 'att_id': att_id}, function (result) {
                console.log(result);
                if (result != 'no') {
                    $("#dateErr").html(result);
                    $(".saveAtt").attr('disabled', true);
                } else {
                    $("#dateErr").html('');
                    $(".saveAtt").attr('disabled', false);
                }

            });
        }


    }

    function openAttendance() {
        var month = $("#month_id option:selected").val();
        var year = $("#year_id option:selected").val();
        var d = new Date(),
                n = d.getMonth() + 1,
                y = d.getFullYear();

        $.post("<?php echo base_url('admin_employee_worksheet'); ?>", {'month': month, 'year': year}, function (result) {
            console.log(result);
            $("#ksdatatable").html(result);
            $('#start_date').val('');
            $('#end_date').val('');
            // console.log('month--'+month);
            // console.log('month--**'+n);
            if (month != '') {
                $("#month_id").val(month);
            } else {
                $("#month_id").val(n);
            }

            if (year != '') {
                $("#year_id").val(year);
            } else {
                $("#year_id").val(y);
            }
//var tableold = $('#ksdatatable').DataTable();
//tableold.destroy();
//var table = $('#ksdatatable').DataTable({
//    
//                bPaginate: true,
//                responsive: true,
//                pageLength: 10,                
//                oLanguage: {
//                  oPaginate: {
//                  "sNext": "<span class='la la-angle-right'></span>",
//                  "sPrevious": "<span class='la la-angle-left'></span>"
//                  },
//                  "sSearch":""
//                },
//                bLengthChange: true,
//                bFilter: true,
//                bSort: true,
//                bInfo: true,
//                bAutoWidth: false,
//                lengthChange: false,
//                buttons: [
//                   // 'excelHtml5',
//                   // 'pdfHtml5',                    
//                    {
//                        extend: 'print', text: '<i class="la la-print"></i>',
//                        exportOptions: {
//                            columns: ':visible'
//                        }
//                    },
//                    {
//                        extend: 'colvis', text: '<i class="la la-eye"></i>'                        
//                    }
//                ],
//                columnDefs: [
//                    { orderable: false, targets: -1 }
//                 ]
//            });
//            table.buttons().container().appendTo( '.dataTable_buttons' );
//            $('.dataTables_filter').find('input').attr('placeholder','Search here...');


        });
    }

    function getSearchAtt() {
        var st_date = $("#start_date").val();
        var end_date = $("#end_date").val();

        $('#month_id').val('');
        $('#year_id').val('');

        if (st_date != '' && end_date != '') {
            $('#start_date').css('border-color', '');
            $('#end_date').css('border-color', '');
            $("#stdateErr").html('');
            $("#enddateErr").html('');
            //$("#searchForm").submit();
            return true;
        } else {
            $('#start_date').css('border-color', 'red');
            $('#end_date').css('border-color', 'red');
            $("#stdateErr").html('Field Required');
            $("#enddateErr").html('Field Required');
            return false;
        }
    }


    function upload_csv(id = ''){
         $("#uploadcsv").on('shown.bs.modal', function() {
             $.post("<?php echo base_url('upload_excel'); ?>", {id: id}, function(result){
                //console.log(result); //lead_list
             $(".add-project").html(result);
             $(".add-project").show();
            });
          }).modal("show");
    }



</script>