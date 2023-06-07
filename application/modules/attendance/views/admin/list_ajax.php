                         <table id="payrolltable_1" class="table table-list2 table-mobile">
                        <thead>
                            <tr>                                
                                <th>Employee</th> 
                                <th>RF #</th> 
                                <th>Deptt. & Designation</th>
                                <th>In Time</th>
                                <th>Out Time</th>
								<th>Total Break Time</th>
                                <th>Total Time</th>
                                <th>Status</th>                               
                            </tr>
                        </thead>    
							<?php
                            $sl = 1;
                           $SysConfigauthenticaton = checkConfig1();
                            $dateformat = $SysConfigauthenticaton->date_format;
                            if (!empty($all_data)) {
                                foreach ($all_data as $data) {
                                    $department = $this->AttendanceModel->get_row_data('master_department', array('id' => $data->department));

                                    $designation = $this->AttendanceModel->get_row_data('master_designation', array('id' => $data->designation));

           
                                    $current_att = $this->AttendanceModel->get_row_data('attendance', array('employee_id' => $data->id, 'date' => $start_date));
									$breakTotalTime  = $this->AttendanceModel->get_total_breaktime_daywise($start_date,$data->id);
                                    
									if ($start_date != '') {
                                        $current_att = $this->AttendanceModel->get_row_data('attendance', array('employee_id' => $data->id, 'date' => date('Y-m-d',strtotime($start_date))));
                                         $date = (!empty($current_att)) ? date($dateformat,strtotime($current_att->date)) : date($dateformat,strtotime($start_date));
                                        $intime = (!empty($current_att)) ? $current_att->entry_time : '';
                                        $outtime = (!empty($current_att)) ? $current_att->out_time : '';
                                        $type =  (!empty($current_att) && $current_att->entry_time != '00:00') ? '<label class="badge badge-success">Present</label>' : '<label class="badge badge-danger">Absent</label>';
                                        $total_hour = (!empty($current_att)) ? $current_att->total_hour : '';
										
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
                                        $date = (!empty($current_att)) ? date($dateformat,strtotime($current_att->date)) : date($dateformat,strtotime($curdate));
                                        $intime = (!empty($current_att)) ? $current_att->entry_time : '';
                                        $outtime = (!empty($current_att)) ? $current_att->out_time : '';
                                         $type =  (!empty($current_att) && $current_att->entry_time != '00:00') ? '<label class="badge badge-success">Present</label>' : '<label class="badge badge-danger">Absent</label>';
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
                                            <a <?php if(@$current_att->id != ''){ ?> href="javascript:void(0)"  onclick="openForm('<?php echo @$current_att->id; ?>', '<?php echo (isset($_GET['start_date']) && $_GET['start_date'] != '') ? $_GET['start_date'] : $start_date; ?>');" <?php } ?>>
                                                <?php echo @$data->first_name . ' ' . @$data->middle_name . ' ' . @$data->last_name; ?><br><small><?php echo $data->employee_no; ?></small></a></td>
                                    
                                        <td><?php echo $data->rf_no; ?></td>
                                        <td><?php echo @$department->department_name; ?><br><small><?php echo @$designation->designation_name; ?></small></td>
                                        <td><?php echo (@$intime) ? date('H:i',strtotime(@$intime)) : '00:00'; ?></td>
                                        <td><?php echo (@$outtime) ? date('H:i',strtotime(@$outtime)) : '00:00'; ?></td>
										<td><?php if($breakTotalTime->timeSum != ''){ echo date('H:i',strtotime(@$breakTotalTime->timeSum)); } else { echo '00:00';}?></td>
                                        <td><?php if($total_hour != '-'){ echo date('H:i',strtotime($total_hour)); } else { echo $total_hour;} ?></td>
                                      <td><?=@$type?></td>                                        
                                    </tr>                          
                                    <?php
                                    $sl++;
                                }
                            } 
                            ?>
							</table>
                       