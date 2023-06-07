 <div class="card-header">
                               Approval  Request
                                <span class="pull-right"><?php if(!empty($total_approval) && $total_approval != '0'){ echo $total_approval;} else { echo '0';} ?></span>
                            </div>
                            <div class="card-body">
                                 <?php         
                                   //echo '<pre>'; print_r($leave_request);
                                  $SysConfigauthenticaton = checkConfig1();									   
                                    if(!empty($leave_request)){
                                        foreach ($leave_request as $leaves) {
											if($leaves->leave_type_id != '0'){
											 $leave_name = $this->DashboardModel->get_row_data('master_leave_rules', array('id' => $leaves->leave_type_id));
											}
											?>
                                            <table class="table small-card">
                                                <tr>
                                                    <td width="70">
                                                         <?php if (isset($leaves->personal_image) && $leaves->personal_image != '') { ?>
                                                         <img src="<?php echo base_url(); ?>uploads/<?php echo (isset($leaves->personal_image) && $leaves->personal_image != '') ? $leaves->personal_image : ''; ?>" class="ks-avatar  img-fluid" alt="">
                                                         <?php } else { ?>
                                                         <img src="<?php echo base_url(); ?>assets/img/avatars/placeholders/ava-128.png" class="ks-avatar img-fluid" alt="">
                                                         <?php } ?> 
                                                    </td>
                                                    <td>
														<h5>
														<?php /* ?><?php
														if(@$leaves->approved=='No')
														{
														?>
														<a class="" style="cursor:pointer;" onclick="approve_status('<?php echo @$leaves->id;?>','Yes','<?php echo @$leaves->employee_id;?>')"><?php echo @$leaves->first_name . ' ' . @$leaves->middle_name . ' ' . @$leaves->last_name; ?></a>
														<?php
														}
														?><?php */ ?>
														<?php
														if(@$leaves->approved=='' || @$leaves->approved=='Yes' || @$leaves->approved=='No')
														{
														?>
														<a class="" style="cursor:pointer;" onclick="approve_status('<?php echo @$leaves->id;?>','Yes','<?php echo @$leaves->employee_id;?>')"><?php echo @$leaves->first_name . ' ' . @$leaves->middle_name . ' ' . @$leaves->last_name; ?></a>
														<?php
														}
														?>
														 <?php /* ?><?php
														if(@$leaves->approved=='Yes')
														{
														?>
														<a class="" style="cursor:pointer;" onclick="approve_status('<?php echo @$leaves->id;?>','No','<?php echo @$value->employee_id;?>')"><?php echo @$leaves->first_name . ' ' . @$leaves->middle_name . ' ' . @$leaves->last_name; ?></a>
														<?php
														}
														?> <?php */ ?>
														
														
														
														</h5>
                                                            <p>Request <?php if(!empty($leave_name)) { echo $leave_name->rule_name.' for '; } ?> - <?php echo @$leaves->leave_total_days.' days'; ?>  from <strong><?php echo date($SysConfigauthenticaton->date_format,strtotime(@$leaves->leave_from)); ?></strong> to <strong><?php echo date($SysConfigauthenticaton->date_format,strtotime(@$leaves->leave_to)); ?></strong></p>
                                                    </td>
                                                </tr>
                                            </table>                                                                               
                                    <?php } } ?>

									<?php         
                                   //echo '<pre>'; print_r($leave_request);								 
                                    if(!empty($timeoff_request)){
                                        foreach ($timeoff_request as $timeoff) {
									$workshift = $this->DashboardModel->get_row_data('assigned_workshift', array('employee_id' => $timeoff->employee_id,'start_date' => $timeoff->date));
									$all_employee = $this->DashboardModel->get_row_data('employee',array('id'=>$timeoff->employee_id,'is_active'=>'Y','delete_flag'=>'N'));
											
											$workshiftid = '';
					if(!empty($workshift)){
						$workshiftid = $workshift->work_shift_id;
					}else{
						$workshiftid = $all_employee->work_shift_id;
					}
					
					$stweekname = date('l',strtotime($timeoff->date));
					$curdate = date('Y-m-d',strtotime($timeoff->date));
					$weekNo = getWeeks($curdate,$stweekname);
					
					$workshiftdetails = $this->DashboardModel->get_workshift_details($workshiftid,$weekNo,$stweekname);
					
					if($workshiftdetails->weekvalue == 'rule_1'){
					$work_hour_start = $workshiftdetails->work_hour_start_1;
					$work_hour_end = $workshiftdetails->work_hour_end_1;
					//echo '<pre>'; print_r($attendance_rules); die;
					}elseif($workshiftdetails->weekvalue == 'rule_2'){
					$work_hour_start = $workshiftdetails->work_hour_start_2;
					$work_hour_end = $workshiftdetails->work_hour_end_2;
					}elseif($workshiftdetails->weekvalue == 'Full'){
					if($workshiftdetails->weekoff == 'rule_1'){
					$work_hour_start = $workshiftdetails->work_hour_start_1;
					$work_hour_end = $workshiftdetails->work_hour_end_1;
					}else{ 
					$work_hour_start = $workshiftdetails->work_hour_start_2;
					$work_hour_end = $workshiftdetails->work_hour_end_2;
					} 
					}
											$startdate = date('Y-m-d',strtotime($timeoff->from_date));
											//echo $start_date;
											$enddate = date('Y-m-d',strtotime($timeoff->to_date));
											$start_date = strtotime($startdate); 
											$end_date = strtotime($enddate); 
											//echo $end_date; die;
											$day = ($end_date - $start_date)/60/60/24;
											$days = $day + 1;
											$total_hour = getTimeDiff(date('h:i',strtotime($timeoff->time)),date('h:i',strtotime($work_hour_end)));
											?>
                                            <table class="table small-card">
                                                <tr>
                                                    <td width="70">
                                                         <?php if (isset($timeoff->personal_image) && $timeoff->personal_image != '') { ?>
                                                         <img src="<?php echo base_url(); ?>uploads/<?php echo (isset($timeoff->personal_image) && $timeoff->personal_image != '') ? $timeoff->personal_image : ''; ?>" class="ks-avatar  img-fluid" alt="">
                                                         <?php } else { ?>
                                                         <img src="<?php echo base_url(); ?>assets/img/avatars/placeholders/ava-128.png" class="ks-avatar img-fluid" alt="">
                                                         <?php } ?> 
                                                    </td>
                                                    <td>
														<h5><?php
														if(@$timeoff->approved=='No')
														{
														?>
														<a class="" style="cursor:pointer;" onclick="time_approve_status('<?php echo @$timeoff->id;?>','Yes','<?php echo @$timeoff->employee_id;?>')"><?php echo @$timeoff->first_name . ' ' . @$timeoff->middle_name . ' ' . @$timeoff->last_name; ?></a>
														<?php
														}
														?>
														<?php
														if(@$timeoff->approved=='')
														{
														?>
														<a class="" style="cursor:pointer;" onclick="time_approve_status('<?php echo @$timeoff->id;?>','Yes','<?php echo @$timeoff->employee_id;?>')"><?php echo @$timeoff->first_name . ' ' . @$timeoff->middle_name . ' ' . @$timeoff->last_name; ?></a>
														<?php
														}
														?>
														<?php
														if(@$timeoff->approved=='Yes')
														{
														?>
														<a class="" style="cursor:pointer;" onclick="time_approve_status('<?php echo @$timeoff->id;?>','No','<?php echo @$timeoff->employee_id;?>')"><?php echo @$timeoff->first_name . ' ' . @$timeoff->middle_name . ' ' . @$timeoff->last_name; ?></a>
														<?php
														}
														?>
														
														
														
														</h5>
														
                                                           <p><?php if(@$timeoff->type=='Personal'){ ?>Request <label class="badge badge-warning">time off </label> for <?=$total_hour?> Hrs<?php } else { ?> <?php if(!empty($timeoff->work_status) && $timeoff->work_status == 'OD'){ echo 'Request <label class="badge badge-info">Outdoor duty</label>'; } else { echo 'Request <label class="badge badge-success">WFH</label> for '.$days.' days'; } ?><?php } ?> <strong><?php if(@$timeoff->type=='Personal'){ echo 'On '.date($SysConfigauthenticaton->date_format,strtotime(@$timeoff->date)); } else { echo 'from '.date($SysConfigauthenticaton->date_format,strtotime(@$timeoff->from_date)).' To '.date($SysConfigauthenticaton->date_format,strtotime(@$timeoff->to_date));} ?></strong></p>
                                                    </td>
                                                </tr>
                                            </table>                                                                               
                                    <?php } } ?>
									<?php if(empty($leave_request) && empty($timeoff_request)){ ?>
                                    <img src="<?php echo base_url(); ?>/assets/svg/leave.svg" class="img-fluid">
									<?php } ?>
                            </div>