<style>
    div.dataTables_wrapper > .row:last-child{padding: 0!important; border: 0}    
</style>
<div class="table-responsiveX">
<table id="table_attendance" class="table table-list-payroll nowrap"  style="width:100%">
        <thead>
            <tr>
                <th>Employee &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th>Deptt. & Designation &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>               
                <th>Present</th>
                <th>Late</th>
                <th>Tour</th>
                <th>Leave</th>
                <th>Half Day</th>
                <th>Full Day Off</th>
                <th>Half Day Off</th>
                <th>WFH</th>
                <th>Early Leave</th>
                <th>Holiday</th>
				
				 <?php
                for ($j = 0; $j < $CalenderDays; $j++) {
                    $i = date('d', strtotime($From_date . "+" . $j . " day"));
                    ?>
                <th><?php echo $i; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <?php } ?> 
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($all_employee)) {
                foreach ($all_employee as $data) {
                    $department = $this->PayrollModel->get_row_data('master_department', array('id' => $data->department));

                    $designation = $this->PayrollModel->get_row_data('master_designation', array('id' => $data->designation));
                    $check_attendance_freeze = $this->PayrollModel->check_attendance_freeze($month, $year,$data->id);

                    $emp_salary = $this->PayrollModel->get_row_data('employee_salary', array('employee_id' => $data->id,'delete_flag'=>'N','is_active'=>'Y'));
                   // print_r($check_attendance_freeze);
                    $att_report = $this->PayrollModel->load_att_month(base64_encode($data->id), $month, $year, $From_date, $To_date);

                    
					$offshift = $this->PayrollModel->get_result_data('master_work_shift_off_day',array('work_shift_id'=>$data->work_shift_id,'weekvalue'=>'Full'));
                    $offSHIFTarr = array();
                    foreach ($offshift as $value) {
                        // $offSHIFTarr[$value->weekname] = $value->weekvalue;
                        $offSHIFTarr[$value->week_no][$value->weekname] = $value->weekvalue;
                    }

                    $offshiftarr = $offSHIFTarr;

                    // echo '<pre>'; print_r($att_report);

                    ?>
                    <tr <?php if(!empty($check_attendance_freeze) && $check_attendance_freeze->employee_id == $data->id){ echo 'style="background-color:#f8f2ec"'; }?>>
                        
                        <td class="d-flex align-items-center">                            
                            <img <?php if (isset($value->personal_image) && $value->personal_image != '') { ?> src="<?php echo base_url(); ?>uploads/<?php echo (isset($value->personal_image) && $value->personal_image != '') ? $value->personal_image : ''; ?>" <?php } else { ?> src="<?php echo base_url(); ?>/assets/img/avatars/placeholders/ava-128.png" <?php } ?>class="ks-avatar" alt="" width="36" height="36">
                            <div> <?php if(empty($emp_salary)){ echo '<i title="Salary Not Setup" class="la text-warning la-exclamation"></i>'; }?><?php echo $data->first_name . ' ' . @$data->middle_name . ' ' . @$data->last_name; ?><br>
                                <small><?php echo $data->employee_no; ?></small></div>
                        </td>
                        <td>
                            <?php echo @$department->department_name; ?><br>
                            <small><?php echo @$designation->designation_name; ?></small>
                        </td>                        
                        <?php
                        $year = date('Y');
                        $curdate = date('d') . '-' . $month . '-' . $year;
                        $days = date("t", strtotime($curdate));
                        $present = '0';
                        $late = '0';
                        $absent = '0';
                        $outside = '0';
                        $leave = '0';
                        $halfday = '0';
                        $offday = '0';
                        $wfh = '0';
                        $earlyleave = '0';
                        $cntholiday = '0';
                        $halfoffday = '0';
                        //echo '<pre>'; print_r($att_report); //die;
                        //echo $days; die;
                        for ($k = 0; $k < $CalenderDays; $k++) {
                            $m = date('d', strtotime($From_date . "+" . $k . " day"));
                            $n = sprintf("%02d", $m);

                            $date = $n . '-' . $month . '-' . $year;
                            $dayJan = date('l', strtotime($date));
                            $curdate = date('Y-m-d', strtotime('2020-' . $month . '-' . $n));
                            //echo $curdate; die;
                            $weekNo = getWeeks($curdate, $dayJan);
                            $text = '';
                            $text2 = '';
                            $bg = '';
                            $holiday = '';
                            $weekoff = '';


                            if ((!empty($att_report)) && (array_key_exists($n, $att_report))) {

                                $attReport = explode('_', @$att_report[sprintf('%02d', $m)]);

                                if ((!empty($att_report)) && (!empty($attReport[0]) && $attReport[0] == 'Full Day')) { // present day
                                    //  echo $attReport[0]; die;
                                    $text = 'P';
                                    $present = $present + 1;
                                    if (!empty($attReport[1]) && $attReport[1] == 'Late') {
                                        $text.='/L';
                                        $late = $late + 1;
                                    }
                                } else { // absent/half day/o
                                    $text = 'A';

                                    if ((!empty($att_report)) && (@$att_report[$m] == 'Absent')) {
                                        $text = 'A';
                                        $absent = $absent + 1;
                                    }


                                    if ((!empty($att_report)) && ($attReport[0] == 'Half Day')) {
                                        $text = 'H';
                                        $halfday = $halfday + 1;
                                        if ($attReport[1] == 'Late') {
                                            $text.='/L';
                                            $late = $late + 1;
                                        }
                                    }
                                }
                            } else {
                                $text = 'A';
                            }


                            if ((!empty($att_report)) && (@$att_report[$j] == 'WFH')) {
                                $text = 'WFH';
                                $wfh = $wfh + 1;
                            }
                            if ((!empty($att_report)) && (@$att_report[$j] == 'OD')) {
                                $text = 'OD';
                                $outside = $outside + 1;
                            }

                            /* if(array_key_exists($dayJan,$offshiftarr)){
                              $weekoff = 'WO';
                              $offday = $offday + 1;
                              $bg='background:yellow;';
                              if (strpos($text, 'A') !== false) {
                              $text='';
                              }
                              } */

                            if (!empty($offshiftarr)) {
                                foreach ($offshiftarr as $key => $variable) {
                                    if ($key == $weekNo) {
                                        foreach ($variable as $key => $value) {
                                            if ($dayJan == $key) {
                                                if ($value == 'Half') {
                                                    $weekoff = 'WO/H';
                                                    $halfoffday = $halfoffday + 1;
                                                } else {
                                                    $weekoff = 'WO';
                                                    $offday = $offday + 1;
                                                    if (strpos($text, 'A') !== false) {
                                                        $text = '';
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }


                            if (!empty($att_report['early_leave']) && (in_array($n, $att_report['early_leave']))) {
                                $text = 'EL';
                                $earlyleave = $earlyleave + 1;
                            }

                            if (!empty($att_report['futuredate']) && (in_array($n, $att_report['futuredate']))) {
                                $text = '-';
                            }
                            if (!empty($att_report['holidays']) && (in_array($n, $att_report['holidays']))) {
                                $bg = 'bg-holiday;';
                                $holiday = 'H';
                                $cntholiday = $cntholiday + 1;
                                if (strpos($text, 'A') !== false) {
                                    $text = '';
                                }
                            }


                                    if(!empty($att_report['leaves']) && (in_array($n,$att_report['leaves'])) ){
                                    $text = 'L';
                                    $leave = $leave + 1;
                                    }
                                    ?>
                                    <?php } ?>
                                    <td><?=$present?></td>
                                    <td><?=$late?></td>
                                    <td><?=$outside?></td>
                                    <td><?=$leave?></td>
                                    <td><?=$halfday?></td>
                                    <td><?=$offday?></td>
                                    <td><?=$halfoffday?></td>
                                    <td><?=$wfh?></td>
                                    <td><?=$earlyleave?></td>
                                    <td><?=$cntholiday?></td>
									<?php
                        $year = date('Y');
                        $curdate = date('d') . '-' . $month . '-' . $year;
                        $days = date("t", strtotime($curdate));
                        $present = '0';
                        $late = '0';
                        $absent = '0';
                        $outside = '0';
                        $leave = '0';
                        $halfday = '0';
                        $offday = '0';
                        $wfh = '0';
                        $earlyleave = '0';
                        $cntholiday = '0';
                        $halfoffday = '0';
                        //echo '<pre>'; print_r($att_report); //die;
                        //echo $days; die;
                        for ($k = 0; $k < $CalenderDays; $k++) {
                            $m = date('d', strtotime($From_date . "+" . $k . " day"));
                            $n = sprintf("%02d", $m);

                            $date = $n . '-' . $month . '-' . $year;
                            $dayJan = date('l', strtotime($date));
                            $curdate = date('Y-m-d', strtotime('2020-' . $month . '-' . $n));
                            //echo $curdate; die;
                            $weekNo = getWeeks($curdate, $dayJan);
                            $text = '';
                            $text2 = '';
                            $bg = '';
                            $holiday = '';
                            $weekoff = '';
							$ho = array();

                            if ((!empty($att_report)) && (array_key_exists($n, $att_report))) {

                                $attReport = explode('_', @$att_report[sprintf('%02d', $m)]);

                                if ((!empty($att_report)) && (!empty($attReport[0]) && $attReport[0] == 'Full Day')) { // present day
                                    //  echo $attReport[0]; die;
                                    $text = 'P';
                                    $present = $present + 1;
                                    if (!empty($attReport[1]) && $attReport[1] == 'Late') {
                                        $text.='/L';
                                        $late = $late + 1;
                                    }
                                } else { // absent/half day/o
                                    $text = 'A';

                                    if ((!empty($att_report)) && (@$att_report[$m] == 'Absent')) {
                                        $text = 'A';
                                        $absent = $absent + 1;
                                    }
									
									if((!empty($att_report)) && (@$att_report[$m]=='Over Time')){
												$text = 'OT';
												//$bg='background:#c0a7c2';
											}



                                    if ((!empty($att_report)) && ($attReport[0] == 'Half Day')) {
                                        $text = 'H';
                                        $halfday = $halfday + 1;
                                        if ($attReport[1] == 'Late') {
                                            $text.='/L';
                                            $late = $late + 1;
                                        }
                                    }
                                }
                            } else {
                                $text = 'A';
                            }


                            if ((!empty($att_report)) && (@$att_report[$j] == 'WFH')) {
                                $text = 'WFH';
                                $wfh = $wfh + 1;
                            }
                            if ((!empty($att_report)) && (@$att_report[$j] == 'OD')) {
                                $text = 'OD';
                                $outside = $outside + 1;
                            }

                            /* if(array_key_exists($dayJan,$offshiftarr)){
                              $weekoff = 'WO';
                              $offday = $offday + 1;
                              $bg='background:yellow;';
                              if (strpos($text, 'A') !== false) {
                              $text='';
                              }
                              } */

                            if (!empty($offshiftarr)) {
                                foreach ($offshiftarr as $key => $variable) {
                                    if ($key == $weekNo) {
                                        foreach ($variable as $key => $value) {
                                            if ($dayJan == $key) {
                                                if ($value == 'Half') {
                                                    $weekoff = 'WO/H';
                                                    $halfoffday = $halfoffday + 1;
                                                } else {
                                                    $weekoff = 'WO';
                                                    $offday = $offday + 1;
													$bg='bg-weekly-off';
                                                    if (strpos($text, 'A') !== false) {
                                                        $text = '';
                                                    }
                                                }
												array_push($ho,$bg);
                                            }
                                        }
                                    }
                                }
                            }


                            if (!empty($att_report['early_leave']) && (in_array($n, $att_report['early_leave']))) {
                                $text = 'EL';
                                $earlyleave = $earlyleave + 1;
                            }

                            if (!empty($att_report['futuredate']) && (in_array($n, $att_report['futuredate']))) {
                                $text = '-';
                            }
                            if (!empty($att_report['holidays']) && (in_array($n, $att_report['holidays']))) {
                                $bg='bg-holiday';
								array_push($ho,'red');
                                $holiday = 'H';
                                $cntholiday = $cntholiday + 1;
                                if (strpos($text, 'A') !== false) {
                                    $text = '';
                                }
                            }


                                    if(!empty($att_report['leaves']) && (in_array($n,$att_report['leaves'])) ){
                                    $text = 'L';
                                    $leave = $leave + 1;
                                    }
                                    ?>
                                    <td class="<?php if(!empty($ho) && count($ho) > '1'){
								$strholiday = implode(',', $ho);
								echo 'background-image: linear-gradient(to right,'.$strholiday.');';
							 }else{
								echo $bg;
							 }?>"><?=$text?></td>
                                    <?php } ?>
                                </tr>
                              <?php }  } ?>
                            </tbody>
                        </table>
</div>  

    <div class="payroll_footer_button">
        <div class="row">
            <div class="col-sm-7 mb-3 mb-sm-0 text-center text-sm-left align-self-center">
                <h5 class="pull-left">Review Attendance (<?= $CalenderDays ?> days)</h5>
            </div>
            <div class="col-sm-5 text-center text-sm-right">
                <a class="btn btn-primary attendance_freeze" onclick="freeze_attendance();">Freeze</a>
				 <a class="btn btn-warning" onclick="get_Payable();">Next</a>
            </div>
			
        </div>
    </div>


<script>
     $(document).ready(function() {
    var table = $('#table_attendance').DataTable({
         bPaginate: false,
        //responsive: true,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        oLanguage: {
            oPaginate: {
                "sNext": "<span class='la la-angle-right'></span>",
                "sPrevious": "<span class='la la-angle-left'></span>"
            },
            "sSearch": ""
        },
        bLengthChange: false,
        bFilter: true,
        bSort: false,
        bInfo: false,
        bAutoWidth: true,        
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
//            {
//                extend: 'pdfHtml5', text: '<i class="la la-file-pdf"></i>',
//                exportOptions: {
//                    columns: ':visible',
//                    search: 'applied',
//                    order: 'applied'
//                }
//            },
//            {
//                extend: 'print', text: '<i class="la la-print"></i>',
//                exportOptions: {
//                    columns: ':visible',
//                    search: 'applied',
//                    order: 'applied'
//                }
//            },
             {
                extend: 'colvis', text: '<i class="la la-eye"></i>'        
            }
        ],
        columnDefs: [
            {orderable: false, targets: -1}         
        ],
        scrollY:        "350px",
        scrollX:        true,
        scrollCollapse: true,        
        fixedColumns:   {
            leftColumns: 1
        }
    });
    table.buttons().container().appendTo('.dataTable_buttons');
    $('.dataTables_filter').find('input').attr('placeholder', 'Search here...');
});
    
</script>