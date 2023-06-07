<style>
    /*    .dt-button.dropdown-item:nth-child(2), .dt-button.dropdown-item.active:nth-child(2){border: 0;padding: 0;height: 0;}*/
</style>

<div class="ks-page-header">
    <section class="ks-title">
        <h3>Attendance</h3><input required  type="text" placeholder="Enter Start Date" class="form-control mysingle_date" name="start_date" id="start_date" onChange="getSearchAtt();" value=""><span style="color: red"><?php print_r($this->session->flashdata('flash_attandance')); ?></span>
        <div class="ks-controls">            
            <a href="javascript:;" class="btn btn-icon btn-light btn_maximize"><i class="far fa-window-maximize"></i></a>
            <a class="btn btn-info btn-icon" href="javascript:void(0)"onclick="upload_csv('');"><i class="fa fa-upload"></i></a>            
            <!--<div class="header-search">
                <a href="javascript:void(0)" class="btn btn-warning btn-icon" onclick="$('.drop_search').slideToggle();">
                    <i class="fa fa-search"></i>
                </a>
                <div class="drop_search">
                    <div class="form-group">
                        <label for="" class="form-control-label">Search Attendance by Date</label>
                        <input required  type="text" placeholder="Enter Start Date" class="form-control mysingle_date" name="start_date" id="start_date" value="">
                    </div>
                    <span id="stdateErr" style="color: red;"></span>
                    <button type="button" onclick="getSearchAtt();"name="submit" class="btn btn-warning closeSearch save-profile-btn">Search</button>                    
                </div>              
            </div>-->
            <a class="btn btn-primary" href="javascript:void(0)" onclick="openForm('', '<?php echo date('Y-m-d'); ?>');">Add</a>
        </div>
    </section>
</div>

<div class="ks-page-content">
    <div class="ks-page-content-body">
        <div class="container-fluid">
            <div class="content-wrapper">                
                <div class="form-wrapper add-attendance pb-0" style="display: none;">                
                </div>

                <div class="table-responsiveX" id="atten_search">
                    <table id="payrolltable" class="table table-list2 table-mobile">
                        <thead>
                            <tr>                                
                                <th>Employee</th> 
                                <!--<th class="col-mobile">Mobile</th>--> 
                                <th>RF #</th> 
                                <th>Deptt. & Designation</th>
                                <th>In Time</th>
                                <th>Out Time</th>
								<th>Total Break Time</th>
                                <th>Total Time</th>
                                <th>Status</th>                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sl = 1;
                            $SysConfigauthenticaton = checkConfig1();
                            $dateformat = $SysConfigauthenticaton->date_format;
                            $jquery_date_format = $SysConfigauthenticaton->jquery_date_format;
                            if (!empty($all_data)) {
                                foreach ($all_data as $data) {
                                    $department = $this->AttendanceModel->get_row_data('master_department', array('id' => $data->department));

                                    $designation = $this->AttendanceModel->get_row_data('master_designation', array('id' => $data->designation));



                                    $current_att = $this->AttendanceModel->get_row_data('attendance', array('employee_id' => $data->id, 'date' => $start_date));
									$breakTotalTime  = $this->AttendanceModel->get_total_breaktime_daywise($start_date,$data->id);
                                    if (isset($_GET['start_date'])) {
                                        $current_att = $this->AttendanceModel->get_row_data('attendance', array('employee_id' => $data->id, 'date' => date('Y-m-d', strtotime($_GET['start_date']))));
                                        $date = (!empty($current_att)) ? date($dateformat, strtotime($current_att->date)) : date($dateformat, strtotime($_GET['start_date']));
                                        $intime = (!empty($current_att)) ? $current_att->entry_time : '';
                                        $outtime = (!empty($current_att)) ? $current_att->out_time : '';
                                        $type = (!empty($current_att) && $current_att->entry_time != '00:00') ? '<label class="badge badge-success">Present</label>' : '<label class="badge badge-danger">Absent</label>';
                                        //$total_hour = (!empty($current_att)) ? $current_att->total_hour : '';
										 if($outtime != '00:00:00'){
                                                 
												 if($breakTotalTime->timeSum != ''){
													$totalhour = getTimeDiff(date('H:i',strtotime($intime)),date('H:i',strtotime($outtime)));
													$timeSum = date('H:i',strtotime($breakTotalTime->timeSum));
													$totalhourArr =  explode(':',$totalhour);
													$totalminutes = $totalhourArr[0]* 60 + $totalhourArr[1];
													$timeSumArr =  explode(':',$timeSum);
													$timeSumminutes = $timeSumArr[0]* 60 + $timeSumArr[1];
													
													
													
													//$total_hour = $totalhour;
													$minutes = $totalminutes - $timeSumminutes;
													$hours = floor($minutes / 60);
													$min = $minutes - ($hours * 60);
													$total_hour = $hours.":".$min;
													 
												 }else{
													$total_hour = getTimeDiff(date('H:i',strtotime($intime)),date('H:i',strtotime($outtime)));
												 }
												}else {
													$total_hour = '-';
												}

                                    } else {
                                        $curdate = date('Y-m-d');
                                        $date = (!empty($current_att)) ? date($dateformat, strtotime($current_att->date)) : date($dateformat, strtotime($curdate));
                                        $intime = (!empty($current_att)) ? $current_att->entry_time : '';
                                        $outtime = (!empty($current_att)) ? $current_att->out_time : '';
                                        $type = (!empty($current_att) && $current_att->entry_time != '00:00') ? '<label class="badge badge-success">Present</label>' : '<label class="badge badge-danger">Absent</label>';
                                        //$total_hour = (!empty($current_att)) ? $current_att->total_hour : '';
										 if($outtime != '00:00:00'){
                                                 
												 if($breakTotalTime->timeSum != ''){
													$totalhour = getTimeDiff(date('H:i',strtotime($intime)),date('H:i',strtotime($outtime)));
													$timeSum = date('H:i',strtotime($breakTotalTime->timeSum));
													$totalhourArr =  explode(':',$totalhour);
													$totalminutes = $totalhourArr[0]* 60 + $totalhourArr[1];
													$timeSumArr =  explode(':',$timeSum);
													$timeSumminutes = $timeSumArr[0]* 60 + $timeSumArr[1];
													
													
													
													//$total_hour = $totalhour;
													$minutes = $totalminutes - $timeSumminutes;
													$hours = floor($minutes / 60);
													$min = $minutes - ($hours * 60);
													$total_hour = $hours.":".$min;
													 
												 }else{
													$total_hour = getTimeDiff(date('H:i',strtotime($intime)),date('H:i',strtotime($outtime)));
												 }
												}else {
													$total_hour = '-';
												}
                                      
                                    }

                                    $freezmonth = $this->AttendanceModel->get_row_data('attendance_freeze_payroll', array('month' => $data_month, 'year' => $data_year));
                                    ?>

                                    <tr>                                        
                                        <td class="d-flex align-items-center">
                                            <img <?php if (isset($data->personal_image) && $data->personal_image != '') { ?> src="<?php echo base_url(); ?>uploads/<?php echo (isset($data->personal_image) && $data->personal_image != '') ? $data->personal_image : ''; ?>" <?php } else { ?> src="<?php echo base_url(); ?>/assets/img/avatars/placeholders/ava-128.png" <?php } ?>class="ks-avatar" alt="" width="36" height="36">
                                            <a <?php if (@$current_att->id != '') { ?> href="javascript:void(0)"  onclick="openForm('<?php echo @$current_att->id; ?>', '<?php echo (isset($_GET['start_date']) && $_GET['start_date'] != '') ? $_GET['start_date'] : $start_date; ?>');" <?php } ?>>
                                                <?php echo @$data->first_name . ' ' . @$data->middle_name . ' ' . @$data->last_name; ?><br><small><?php echo $data->employee_no; ?></small></a></td>
                                       <!-- <td class="col-mobile">
                                            <div class="row m-0">                                                
       
                                                <div class="col-6"><div class="form-group"><small>RF #</small><br><?php echo $data->rf_no; ?></div></div>
                                                <div class="col-6"><div class="form-group"><small>Deptt.</small><br><?php echo @$department->department_name; ?></div></div>
                                                <div class="col-6"><div class="form-group"><small>Designation</small><br> <?php echo @$designation->designation_name; ?></div></div>
                                                <div class="col-6"><div class="form-group"><small>In Time</small><br> <?php echo (@$intime) ? date('H:i', strtotime(@$intime)) : '00:00'; ?></div></div>
                                                <div class="col-6"><div class="form-group"><small>Out Time</small><br> <?php echo (@$outtime) ? date('H:i', strtotime(@$outtime)) : '00:00'; ?></div></div>
                                                <div class="col-6"><div class="form-group"><small>Total Hours</small><br> <?php echo (@$total_hour) ? date('H:i', strtotime(@$total_hour)) : '00:00'; ?></div></div>                                                
                                                <div class="col-6"><div class="form-group"><small>Status</small><br> <?= @$type ?></div></div>                                                
                                            </div>                                           
                                        </td>-->
                                        <td><?php echo $data->rf_no; ?></td>
                                        <td><?php echo @$department->department_name; ?><br><small><?php echo @$designation->designation_name; ?></small></td>
                                        <td><?php echo (@$intime) ? date('H:i', strtotime(@$intime)) : '00:00'; ?></td>
                                        <td><?php echo (@$outtime) ? date('H:i', strtotime(@$outtime)) : '00:00'; ?></td>
										<td><?php if($breakTotalTime->timeSum != ''){ echo date('H:i',strtotime(@$breakTotalTime->timeSum)); } else { echo '00:00';}?></td>
                                        <td><?php if($total_hour != '-'){ echo date('H:i',strtotime($total_hour)); } else { echo $total_hour;} ?></td>
                                        <td><?= @$type ?></td>                                        
                                    </tr>                          
                                    <?php
                                    $sl++;
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
    var dateformat = '<?php echo $dateformat; ?>';
    var jquerydateformat = '<?php echo $jquery_date_format; ?>';
    // datatable start
    $(document).ready(function () {
        //$('.flatpickrDateNew').flatpickr();
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
                    },
                    // pdf style        
                    pageSize: 'A4',
                    pageOrientation: 'portrait',
                    pageMargins: [80, 80, 80, 80],
                    title: 'Attendance List',
                    customize: function (doc) {
                        doc.styles.title = {
                            color: '#555',
                            fontSize: '15',
                            alignment: 'center',                            
                        },
                        doc.styles.tableBodyOdd = {
                            fontSize: '8'
                        },
                        doc.styles.tableBodyEven = {
                            fontSize: '8'
                        }
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
            ],
        });
        table.buttons().container().appendTo('.dataTable_buttons');
        $('.dataTables_filter').find('input').attr('placeholder', 'Search here...');
		
		 $('.mysingle_date').daterangepicker({//Date format
                locale: {format: jquerydateformat},
                singleDatePicker: true,
                showDropdowns: true,
                
            });
    });
// datatable end 


    function openForm(id, stDate) {
        $.post("<?php echo base_url('admin_get_edit_form_attendance'); ?>", {'id': id, 'stDate': stDate}, function (result) {
            //console.log(result);
            $(".add-attendance").html(result);
            $(".add-attendance").show();
            $(".btn-add-attendance").hide();
            $(".btn-toggle-filter").hide();
            $('.js-example-basic-multiple').select2();
            $('.mysingle_date').daterangepicker({//Date format
                locale: {format: jquerydateformat},
                singleDatePicker: true,
                showDropdowns: true,
                maxDate: moment(),
                onChange: function (selectedDates, dateStr, instance) {
                    checkAtt();
                }
            });

            $('.mytime_picker').daterangepicker({
                timePicker: true,
                singleDatePicker: true,
                //timePicker24Hour : true,
                timePickerIncrement: 1,
                locale: {
                    format: 'hh:mm A'
                },
                autoUpdateInput: false,
            }).on('show.daterangepicker', function (ev, picker) {
                picker.container.find(".calendar-table").hide();
            });

            $('.mytime_picker').on('apply.daterangepicker', function (ev, picker) {
                $(this).val(picker.startDate.format('hh:mm A'));
            });

            $('.mytime_picker').on('cancel.daterangepicker', function (ev, picker) {
                $(this).val('');
            });

            $('#searchForm').hide();
        });
    }


    function closeForm() {
        $(".add-attendance").html('');
        $(".add-attendance").hide();
        $(".btn-add-attendance").show();
        $('#searchForm').show();
        // $("#calAtt").show();
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
                //console.log(result);
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
            //console.log(result);
            $("#ksdatatable").html(result);
            $('#start_date').val('');
            $('#end_date').val('');
           
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

        });
    }

    function getSearchAtt() {
        var st_date = $("#start_date").val();
        if (st_date != '') {
            $('#start_date').css('border-color', '');
            $('#start_date').val(st_date);
            $("#stdateErr").html('');
            $.post("<?php echo base_url('search_attendance'); ?>", {'st_date': st_date}, function (result) {
               // console.log(result);
                $("#atten_search").html(result);
				var table = $('#payrolltable_1').DataTable({
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
                    },
                    // pdf style        
                    pageSize: 'A4',
                    pageOrientation: 'portrait',
                    pageMargins: [80, 80, 80, 80],
                    title: 'Attendance List',
                    customize: function (doc) {
                        doc.styles.title = {
                            color: '#555',
                            fontSize: '15',
                            alignment: 'center',                            
                        },
                        doc.styles.tableBodyOdd = {
                            fontSize: '8'
                        },
                        doc.styles.tableBodyEven = {
                            fontSize: '8'
                        }
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
            ],
        });
        table.buttons().container().appendTo('.dataTable_buttons');
        $('.dataTables_filter').find('input').attr('placeholder', 'Search here...');
				
            });
           
            return true;
        } else {
            $('#start_date').val(st_date);
            $('#start_date').css('border-color', 'red');
            $("#stdateErr").html('Field Required');
            return false;
        }
    }


    function upload_csv(id = ''){
        $("#uploadcsv").on('shown.bs.modal', function () {
            $.post("<?php echo base_url('upload_excel'); ?>", {id: id}, function (result) {
                //console.log(result); //lead_list
                $(".add-project").html(result);
                $(".add-project").show();
            });
        }).modal("show");
    }


    $(".closeSearch").click(function () {
        $('.drop_search').slideToggle();
    });
</script>