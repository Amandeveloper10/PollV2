<?php $check_todays_att = $this->DashboardModel->get_row_data('attendance',array('employee_id'=>$this->session->userdata('futureAdmin')->detail->employee_id,'date'=>date('Y-m-d'),'entry_time !='=>'00:00:00','out_time !='=>'00:00:00'));
								if(empty($check_todays_att)){ ?>
								<?php $workshift = $this->DashboardModel->get_row_data('assigned_workshift', array('employee_id' => $this->session->userdata('futureAdmin')->detail->employee_id,'start_date' => date('Y-m-d')));
									$all_employee = $this->DashboardModel->get_row_data('employee',array('id'=>$this->session->userdata('futureAdmin')->detail->employee_id,'is_active'=>'Y','delete_flag'=>'N'));
											
											$workshiftid = '';
					if(!empty($workshift)){
						$workshiftid = $workshift->work_shift_id;
					}else{
						$workshiftid = $all_employee->work_shift_id;
					}
					$todaysdate = date('Y-m-d');
					$stweekname = date('l',strtotime($todaysdate));
					$curdate = date('Y-m-d',strtotime($todaysdate));
					$weekNo = getWeeks($curdate,$stweekname);
					
					$workshiftdetails = $this->DashboardModel->get_workshift_details($workshiftid,$weekNo,$stweekname);
					
					if($workshiftdetails->weekvalue == 'rule_1'){
					$work_hour_start = date('h:i A',strtotime($workshiftdetails->work_hour_start_1));
					$work_hour_end = date('h:i A',strtotime($workshiftdetails->work_hour_end_1));
					//echo '<pre>'; print_r($attendance_rules); die;
					}elseif($workshiftdetails->weekvalue == 'rule_2'){
					$work_hour_start = date('h:i A',strtotime($workshiftdetails->work_hour_start_2));
					$work_hour_end = date('h:i A',strtotime($workshiftdetails->work_hour_end_2));
					}elseif($workshiftdetails->weekvalue == 'Full'){
					if($workshiftdetails->weekoff == 'rule_1'){
					$work_hour_start = date('h:i A',strtotime($workshiftdetails->work_hour_start_1));
					$work_hour_end = date('h:i A',strtotime($workshiftdetails->work_hour_end_1));
					}else{ 
					$work_hour_start = date('h:i A',strtotime($workshiftdetails->work_hour_start_2));
					$work_hour_end = date('h:i A',strtotime($workshiftdetails->work_hour_end_2));
					} 
					} ?>
								
                                    <p class="mb-2">Make your presence </p>
								<?php $check_attendance = $this->DashboardModel->get_row_data('attendance',array('employee_id'=>$this->session->userdata('futureAdmin')->detail->employee_id,'date'=>date('Y-m-d'))); ?>                                    
								<?php if(!empty($check_attendance)) { 
								$check_inout = $this->DashboardModel->get_row_data_idorderby('attendance_break_time',array('attendance_id'=>$check_attendance->id,'employee_id'=>$this->session->userdata('futureAdmin')->detail->employee_id,'date'=>date('Y-m-d'),'entry_time !='=>'00:00:00','out_time'=>NULL));
								
								$check_in = $this->DashboardModel->get_row_data_idorderby('attendance_break_time',array('attendance_id'=>$check_attendance->id,'employee_id'=>$this->session->userdata('futureAdmin')->detail->employee_id,'date'=>date('Y-m-d'),'entry_time !='=>'00:00:00','out_time !='=>'00:00:00'));
								//print_r($check_in);
								$check_exits = $this->DashboardModel->get_row_data_idorderby('attendance_break_time',array('attendance_id'=>$check_attendance->id,'employee_id'=>$this->session->userdata('futureAdmin')->detail->employee_id,'date'=>date('Y-m-d')));
								?>
								 <?php if(empty($check_inout) || empty($check_exits)) { ?>
                                    <div class="card card-punch"><div class="card-body"><div class="row"><div class="col-8 align-self-center"><h5><?php echo 'Shift '.$work_hour_start.' - '.$work_hour_end;  ?></h5><span id="time" class="time"></span> </div><div class="col-4 text-right"><button class="btn btn-primary btn-punch"  onclick="breakin('<?php echo $check_attendance->id; ?>','<?php echo $this->session->userdata('futureAdmin')->detail->employee_id; ?>', '<?php echo date('Y-m-d H:i:s'); ?>');" id="breakoutbtn" >Break Out<br><br><br><br></button></div></div></div></div>
								  <?php } ?>
								  
									<script>
									
										var el = document.getElementById('breakoutbtn');

										el.addEventListener('long-press', function(e) {
											
											$("#myModalbreak").on('shown.bs.modal', function() {
											$("#modal_confirm_break").click(function() {
											addattendance("<?php echo $this->session->userdata('futureAdmin')->detail->employee_id; ?>", "<?php echo date('Y-m-d H:i:s'); ?>");	
											});
											}).modal("show");
										// do something
										});

									</script>
								  <?php if(!empty($check_inout)){?>
                                    <div class="card card-punch"><div class="card-body"><div class="row"><div class="col-8 align-self-center"><h5><?php echo 'Shift '.$work_hour_start.' - '.$work_hour_end;  ?></h5> <span id="time" class="time"></span> </div><div class="col-4 align-self-center text-right"><button class="btn btn-primary btn-punch" id="breakinbtn" onclick="breakout('<?php echo $check_inout->id; ?>','<?php echo $check_inout->attendance_id; ?>','<?php echo $this->session->userdata('futureAdmin')->detail->employee_id; ?>', '<?php echo date('Y-m-d H:i:s'); ?>','<?php echo $check_inout->entry_time; ?>');">Break In<br><br><br><br></button></div></div></div></div>                                    
								<?php } ?>
								
								<?php } ?>
                                  <?php if(empty($check_attendance)) { ?> <p class="m-0"> <a class="btn btnatt <?php if(!empty($check_attendance)) { echo 'btn-success'; } else { echo 'btn-primary'; } ?>" href="javascript:void(0)" onclick="addattendance('<?php echo $this->session->userdata('futureAdmin')->detail->employee_id; ?>', '<?php echo date('Y-m-d H:i:s'); ?>');"><?php if(!empty($check_attendance)) { echo 'Punch Out'; } else { echo 'Punch In'; } ?></a></p>
								  <?php } ?>
								<?php }else { ?> <h4><?php echo 'Duty Timing: '.date('H:i A',strtotime($check_todays_att->entry_time)).' - '.date('H:i A',strtotime($check_todays_att->out_time));  ?></h4> <?php } ?>