<style>
.ks-page-content .ks-page-content-body.dashboard-content{margin-top: 0;}
.ks-page-content .ks-page-content-body.dashboard-content .content-wrapper{background: transparent; padding: 5px; box-shadow: none}
.dashboard-content{max-width: 1300px; width: 100%; margin: 0 auto}
.dashboard-content .card{border-radius: 5px; box-shadow: 0 15px 15px -6px rgba(0,0,0,0.1); margin:0; border: 0; background: #fff; overflow: hidden; min-height: 153px;}
.dashboard-content .card h4{position: relative; margin-bottom: 18px; padding-bottom: 5px;} 
.dashboard-content .card h4:before{content: '';position: absolute;bottom: -8px;height: 2px;width: 25%;background:#4b83ee;}
.dashboard-content .card p{margin: 0;} 
.dashboard-content .card .card-header{border-bottom-color: #eee} 
 .custom-tab .nav-pills .nav-item {padding: 0 30px 0 0;}
.ks-page-content .ks-page-content-body.dashboard-content {margin-top: 10px;}
.ks-page-content .ks-page-content-body.dashboard-content .content-wrapper{border: 0}    
.sidebar_right{position: fixed; top:50px; width: 350px; margin-right: 0; right:0; bottom: 0; background: #fff; border-left: 1px solid #e5e5e5; z-index: 2; transition: margin ease-in-out 0.3s; padding: 15px}
.sidebar_right.open{margin-right: 0;}
.toggleRightbar{display: none; border: 0!important;}
.toggleRightbar:hover{background: transparent!important;}
/*.toggleRightbar .nav-link{color: #4b83ee!important; padding: 0 10px!important}
.toggleRightbar .nav-link:hover{background: transparent!important; color: #000!important}*/
.toggleRightbar i{font-size: 20px!important}

.sidebar_right .closeSidebar{position: absolute; top:8px; right: 15px; display: none; color: #c00}
.sidebar_right .card{box-shadow: 0 10px 10px -6px rgba(0,0,0,0.1)}
.sidebar_right .card p{margin-bottom: 10px;}
.sidebar_right .card h4{margin-bottom: 0;}
.sidebar_right .card .card-body{padding: 15px;}
.sidebar_right .sidebar-content{ height: 100%; overflow-x: hidden}
body.ks-page-header-fixed .ks-page-content .ks-page-content-body.dashboard-content{padding-right: 350px;}
body.ks-page-header-fixed.openrightsidebar .ks-page-content .ks-page-content-body.dashboard-content{padding-right: 0;}

.table.small-card{margin-bottom: 15px; border: 1px solid #e5e5e5; box-shadow: none; min-height: 50px; background: transparent; border-radius: 5px}
.table.small-card:last-child{margin-bottom: 0;}
.table.small-card h5{font-size: 15px}
.scroller{max-height: 315px; overflow-y: auto}

.dashboard-content .custom-tab{margin:0 5px 15px; text-transform: uppercase}
@media screen and (max-width: 767px) {
/*    .toggleRightbar{display: block}*/
    .sidebar_right{margin-right: -350px;}
    body.ks-page-header-fixed .ks-page-content .ks-page-content-body.dashboard-content{padding-right: 0}
    .table.small-card tr td{padding: 4px}
    .table.small-card tr td img{max-width: 45px}
    .table.small-card h5{margin-bottom: 5px}
    .dashboard-content .card{min-height: 50px;}
}    
.jspHorizontalBar{display: none!important}
</style>

 
<script>
$(document).ready(function() {
    
	startTime();
   /*var timeDisplay = document.getElementById("time");


function refreshTime() {
  var dateString = new Date().toLocaleString("en-US", {timeZone: "Asia/Calcutta"});
  var formattedString = dateString.replace(", ", " - ");
  timeDisplay.innerHTML = dateString;
}

setInterval(refreshTime, 1000);*/
        
        
    $(function()
    {
        $('.scroller').jScrollPane();
        $('.sidebar-content').jScrollPane();
    });
});

function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  //document.getElementById('time').innerHTML =h + ":" + m + ":" + s;
  var curtime = h + ":" + m + ":" + s;
  $('#time').html(curtime);
  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}

        </script>

<?php $SysConfigauthenticaton = checkConfig1();
?>

<div class="sidebar_right">
    <a href="javascript:;" class="closeSidebar"><i class="la la-times text-"></i></a>
    <div class="sidebar-content">
        <div class="row">
                    <div class="col-lg-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4"><img src="<?php echo base_url(); ?>/assets/svg/emp.svg" class="img-fluid"></div>
                                    <div class="col-8  align-self-center"><p>Total active employee <a><?php if(!empty($all_data)) { echo count($all_data); }else{ echo '0'; } ?></a></p></div>
									
                                </div>                                
                            </div>
                        </div>
                    </div>                    
                    <div class="col-lg-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4"><img src="<?php echo base_url(); ?>/assets/svg/male.svg" class="img-fluid"></div>
                                    <div class="col-8  align-self-center"><p>Male Employee <a><?php if(!empty($all_data_male)) { echo count($all_data_male); }else{ echo '0'; } ?> <small class="text-muted"><?php if(!empty($all_data_male)) { echo '('.round(count($all_data_male)/count($all_data) * 100).'%)'; } ?></small></a></p></div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4"><img src="<?php echo base_url(); ?>/assets/svg/female.svg" class="img-fluid"></div>
                                    <div class="col-8  align-self-center"><p>Female  Employee <a><?php if(!empty($all_data_female)) { echo count($all_data_female); }else{ echo '0'; } ?> <small class="text-muted"><?php if(!empty($all_data_female)) { echo '('.round(count($all_data_female)/count($all_data) * 100).'%)'; } ?></small></a></p></div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4"><img src="<?php echo base_url(); ?>/assets/svg/team.svg" class="img-fluid"></div>
                                    <div class="col-8  align-self-center"><p>New Joinee <a><?php if(!empty($upcoming_joining)){ echo count($upcoming_joining);} else { echo '0';} ?></a><small> 
									<?php if(!empty($upcoming_joining_this_year) && count($upcoming_joining_this_year) > 0){ echo '('.round(count($upcoming_joining_this_year)/ 12 * 100).'%<i class="la la-arrow-down text-danger"></i>)'; } ?></small></p></div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4"><img src="<?php echo base_url(); ?>/assets/svg/attritions.svg" class="img-fluid"></div>
                                    <div class="col-8  align-self-center"><p>Attritions <a><?php if(!empty($today_employee_leave)) { echo count($today_employee_leave); }else{ echo '0'; } ?></a> <small>(0%<i class="la la-arrow-up text-success"></i>)</small></p>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </div>                   
                </div>
    </div>
</div>

<div class="ks-page-content">
    <div class="ks-page-content-body dashboard-content">
    <div class="container-fluid">
        <div class="custom-tab">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" data-toggle="pill" href="#tab_1">Company</a></li>    
<?php if($this->session->userdata('futureAdmin')->detail->employee_id != '0'){ ?>				
                <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#tab_2">Profile</a></li>  
<?php } ?>				
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane mb-3" id="tab_2" role="tabpanel" aria-expanded="false">
                
        <div class="content-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Profile</div>
                            <!--<div class="card-body">Coming soon...</div>-->
							<?php if($this->session->userdata('futureAdmin')->detail->employee_id != '0'){ ?>
							<div class="card-body">							                           
                                
                                <div class="d-block" id="attendanceDiv">
								<?php $check_todays_att = $this->DashboardModel->get_row_data('attendance',array('employee_id'=>$this->session->userdata('futureAdmin')->detail->employee_id,'date'=>date('Y-m-d'),'entry_time !='=>'00:00:00','out_time !='=>'00:00:00'));
								if(empty($check_todays_att)){ ?>
								<?php $workshift = $this->DashboardModel->get_row_data('assigned_workshift', array('employee_id' => $this->session->userdata('futureAdmin')->detail->employee_id,'start_date' => date('Y-m-d')));
									$all_employee = $this->DashboardModel->get_row_data('employee',array('id'=>$this->session->userdata('futureAdmin')->detail->employee_id,'is_active'=>'Y','delete_flag'=>'N'));
											//echo '<pre>'; print_r($all_employee); die;
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
                                    <div class="card card-punch"><div class="card-body"><div class="row"><div class="col-8 align-self-center"><h5><?php echo 'Shift '.$work_hour_start.' - '.$work_hour_end;  ?></h5><span id="time" class="time"></span> </div><div class="col-4 text-right"><button class="btn btn-primary btn-punch" onclick="breakin('<?php echo $check_attendance->id; ?>','<?php echo $this->session->userdata('futureAdmin')->detail->employee_id; ?>', '<?php echo date('Y-m-d H:i:s'); ?>');" id="breakoutbtn" >Break Out<br><br><br><br></div></div></div></div>
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
                                  <?php if(empty($check_attendance)) { ?> <p class="m-0"> 
								    <div class="card card-punch"><div class="card-body"><div class="row"><div class="col-8 align-self-center"><h5><?php echo 'Shift '.$work_hour_start.' - '.$work_hour_end;  ?></h5><span id="time" class="time"></span> </div><div class="col-4 text-right"><button class="btn btnatt <?php if(!empty($check_attendance)) { echo 'btn-success'; } else { echo 'btn-primary'; } ?> btn-punch" onclick="addattendance('<?php echo $this->session->userdata('futureAdmin')->detail->employee_id; ?>', '<?php echo date('Y-m-d H:i:s'); ?>');" ><?php if(!empty($check_attendance)) { echo 'Punch Out'; } else { echo 'Punch In'; } ?><br><br><br><br></div></div></div></div></p>
								  <?php } ?>
								<?php }else { ?> <h5><?php echo 'Duty Timing: '.date('H:i A',strtotime($check_todays_att->entry_time)).' - '.date('H:i A',strtotime($check_todays_att->out_time));  ?></h5> <?php } ?>
                                </div>
                                
                                <p class="mt-1 text-muted">*<small>for punch out press long</small></p>
                                <p class="mt-3 mb-2">Apply leave and time off</p>
                                <ul class="d-block profile-tab-buttons">
                                    <li><a href="<?php echo base_url('employee_leave'); ?>" class="btn btn-outline-info pjaxCls"><i class="bx bxs-plane-take-off"></i><br> Leave</a></li>
                                    <li><a href="<?php echo base_url('timeoff'); ?>" class="btn btn-outline-info pjaxCls"><i class='bx bx-time'></i><br>Time off</a></li>
									<?php $wfh_rule = $this->DashboardModel->get_row_data('master_wfh_rules', array('delete_flag' => 'N', 'is_active' => 'Y'));
									if(!empty($wfh_rule) && $wfh_rule->enanle_type == 'all_employee'){
									$wfh_employee  = $this->DashboardModel->get_row_data('employee', array('delete_flag' => 'N', 'is_active' => 'Y','id' => $this->session->userdata('futureAdmin')->detail->employee_id));
									}else{
									$wfh_employee  = $this->DashboardModel->get_row_data('employee', array('delete_flag' => 'N', 'is_active' => 'Y', 'wfh' => '1','id' => $this->session->userdata('futureAdmin')->detail->employee_id));
									//echo '<pre>'; print_r($all_employee);
									}
									?>
									<?php if(!empty($wfh_employee)){ ?>
                                    <li><a href="<?php echo base_url('timeoff'); ?>" class="btn btn-outline-info pjaxCls"><i class='bx bx-briefcase-alt' ></i><br> WFH</a></li>
									<?php } ?>
                                </ul>
							</div>
							<?php  }else {  ?>
							<div class="card-body">Coming soon...</div>
							<?php } ?>
							
                        </div>
                    </div>
                </div>
            </div>
            </div>
            
        </div>
            
            <div class="tab-pane active" id="tab_1" role="tabpanel" aria-expanded="false">
        
        <div class="content-wrapper">
            <div class="content">
                <div class="row mb-4" style="display:none;">
                    <div class="col">Single date<input class="form-control mysingle_date" type="text" placeholder="Select Date.."></div>
                    <div class="col">Single date & Time<input class="form-control mydate_time" type="text" placeholder="Select Date & Time"></div>                    
                    <div class="col">Date Range<input class="form-control mydate_range" type="text" placeholder="Select Date & Time"></div>                    
                    <div class="col">Button Date <span id="selectedDate" class="text-danger">Today</span><br><button class="btn btn-info mybtn_date"><i class="la la-calendar"></i></button></div>                    
                </div>
                <div class="row mb-4" style="display:none;">
                    <div class="col">Date & Time Range<input class="form-control mydate_timeRange" type="text" placeholder="Select Date & Time"></div>                    
                    <div class="col">Single Time<input class="form-control mytime_picker" type="text" placeholder="Select Date & Time"></div>
                    <div class="col">Time Range<input class="form-control mytime_pickerRange" type="text" placeholder="Select Date & Time"></div>
                </div>

                
                <!--row2-->
                <div class="row">
				<?php if($this->session->userdata('futureAdmin')->detail->employee_id == '0'){ ?>
                       <div class="col-lg-12 mb-4">
                        <div class="card" id="leave_card">
                            <div class="card-header">
                               Approval  Request
                                <span class="pull-right"><?php if(!empty($total_approval) && $total_approval != '0'){ echo $total_approval;} else { echo '0';} ?></span>
                            </div>
                            <div class="card-body">
                                <div class="scroller">
                                 <?php         
                                   //echo '<pre>'; print_r($leave_request);								 
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
                                  					 
                                    if(!empty($timeoff_request)){
                                        foreach ($timeoff_request as $timeoff) {
												
									$workshift = $this->DashboardModel->get_row_data('assigned_workshift', array('employee_id' => $timeoff->employee_id,'start_date' => $timeoff->date));
									$all_employee = $this->DashboardModel->get_row_data('employee',array('id'=>$timeoff->employee_id,'is_active'=>'Y','delete_flag'=>'N'));
									//echo '<pre>'; print_r($all_employee);
											
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
                            </div>
                        </div>
                    </div>
					<?php } else { ?>
						 <div class="col-lg-12 mb-4">
                        <div class="card" id="leave_card">
                            <div class="card-header">
                               Requested Leaves
                                <span class="pull-right"></span>
                            </div>
                            <div class="card-body">
                                <div class="scroller">
                                 <?php         
                                   //echo '<pre>'; print_r($leave_request);								 
                                    if(!empty($leave_request_emp)){
                                        foreach ($leave_request_emp as $leaves) {
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
														<?php echo @$leaves->first_name . ' ' . @$leaves->middle_name . ' ' . @$leaves->last_name; ?>
														
														
														
														
														</h5>
														<p>Status : 
															<?php if(@$leaves->approved=='Yes' ){ ?>
																Approved 
															<?php } elseif(@$leaves->approved=='No'){ ?>
															Reject
															<?php }elseif(@$leaves->approved==''){ ?>
															New
															<?php } ?>
															</p>
                                                            <p>Request <?php if(!empty($leave_name)) { echo $leave_name->rule_name.' for '; } ?> - <?php echo @$leaves->leave_total_days.' days'; ?>  from <strong><?php echo date($SysConfigauthenticaton->date_format,strtotime(@$leaves->leave_from)); ?></strong> to <strong><?php echo date($SysConfigauthenticaton->date_format,strtotime(@$leaves->leave_to)); ?></strong></p>
															
                                                    </td>
                                                </tr>
                                            </table>                                                                               
                                    <?php } } ?>
									
									<?php         
                                   //echo '<pre>'; print_r($leave_request);								 
                                    if(!empty($timeoff_request_emp)){
                                        foreach ($timeoff_request_emp as $timeoff) {
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
														<?php echo @$timeoff->first_name . ' ' . @$timeoff->middle_name . ' ' . @$timeoff->last_name; ?>
														
														<?php
														}
														?>
														<?php
														if(@$timeoff->approved=='')
														{
														?>
														<?php echo @$timeoff->first_name . ' ' . @$timeoff->middle_name . ' ' . @$timeoff->last_name; ?>
														
														<?php
														}
														?>
														<?php
														if(@$timeoff->approved=='Yes')
														{
														?>
														<?php echo @$timeoff->first_name . ' ' . @$timeoff->middle_name . ' ' . @$timeoff->last_name; ?>
														
														<?php
														}
														?>
														
														
														
														</h5>
														<?php
														if(@$timeoff->approved=='No')
														{
														?>
														
														<p>Status : Reject</p>
														<?php
														}
														?>
														<?php
														if(@$timeoff->approved=='')
														{
														?>
														
														<p>Status : New</p>
														<?php
														}
														?>
														<?php
														if(@$timeoff->approved=='Yes')
														{
														?>
														
														<p>Status : Approved</p>
														<?php
														}
														?>
														
                                                           <p><?php if(@$timeoff->type=='Personal'){ ?>Request <label class="badge badge-warning">time off </label> for <?=$total_hour?> Hrs<?php } else { ?> <?php if(!empty($timeoff->work_status) && $timeoff->work_status == 'OD'){ echo 'Request <label class="badge badge-info">Outdoor duty</label>'; } else { echo 'Request <label class="badge badge-success">WFH</label> for '.$days.' days'; } ?><?php } ?> <strong><?php if(@$timeoff->type=='Personal'){ echo 'On '.date($SysConfigauthenticaton->date_format,strtotime(@$timeoff->date)); } else { echo 'from '.date($SysConfigauthenticaton->date_format,strtotime(@$timeoff->from_date)).' To '.date($SysConfigauthenticaton->date_format,strtotime(@$timeoff->to_date));} ?></strong></p>
                                                    </td>
                                                </tr>
                                            </table>                                                                               
                                    <?php } } ?>
									<?php if(empty($leave_request_emp) && empty($timeoff_request_emp)){ ?>
                                    <img src="<?php echo base_url(); ?>/assets/svg/leave.svg" class="img-fluid">
									<?php } ?>
						</div>
						</div>
						</div>
						</div>
						
					<?php } ?>
                    
                    <div class="col-lg-12 mb-4">
                        <div class="card">
                            <div class="card-header">
                                Birthday
                                <span class="pull-right"><?php if(!empty($upcoming_bday)){ echo count($upcoming_bday);} else { echo '0';} ?></span>
                            </div>
                            <div class="card-body">
                                <div class="scroller">
                                <?php 
                                    if(!empty($upcoming_bday)){
                                        foreach ($upcoming_bday as $bday) { ?>
                                        <table class="table small-card">
                                            <tr>
                                                <td width="70">
                                                    <?php if (isset($bday->personal_image) && $bday->personal_image != '') { ?>
                                                <img src="<?php echo base_url(); ?>uploads/<?php echo (isset($bday->personal_image) && $bday->personal_image != '') ? $bday->personal_image : ''; ?>" class="ks-avatar img-fluid" alt="">
                                                <?php } else { ?>
                                                <img src="<?php echo base_url(); ?>assets/img/avatars/placeholders/ava-128.png" class="ks-avatar img-fluid" alt="" >
                                                <?php } ?>                                        
                                                </td>
                                                <td>
                                                    <h5>
													<?php if($this->session->userdata('futureAdmin')->detail->id == '1'){ ?>
													<a class="" href="<?php echo base_url('page/64/' . base64_encode(@$bday->id)); ?>"><?php echo @$bday->first_name . ' ' . @$bday->middle_name . ' ' . @$bday->last_name; ?></a>
													<?php } else { ?>
													<?php echo @$bday->first_name . ' ' . @$bday->middle_name . ' ' . @$bday->last_name; ?>
													<?php } ?>
													
													</h5>
                                                <p><?php echo (date('d',strtotime($bday->dob)) == date('d')) ? 'Today' : date('d F',strtotime($bday->dob)); ?></p>
                                                </td>
                                            </tr>
                                        </table>
                                
                                <?php } } else {?>
                                    <img src="<?php echo base_url(); ?>/assets/svg/birthday.svg" class="img-fluid">
                                <?php } ?> 
                                                               
                            </div>
                        </div>
                        </div>
                    </div>
                       
                    
                    <div class="col-lg-12 mb-4">
                        <div class="card">
                            <div class="card-header">
                                
                                Work Anniversary
									<?php //$i = 0;
									//$count = 1;
									//print_r($upcoming_work_anniversary);
									//if(!empty($upcoming_work_anniversary)){
									//foreach ($upcoming_work_anniversary as $anniversary) {
									//if(date('Y',strtotime($anniversary->hire_date)) != date('Y')){
									//$count += $i ++;
									//}
									//}
									//}
									?>
                                <span class="pull-right"><?php //echo $count; 
								if(!empty($upcoming_work_anniversary)){ echo count($upcoming_work_anniversary);} else { echo '0';} ?></span>
                            </div>
                            <div class="card-body">
                                <div class="scroller">
                                 <?php 
                                    if(!empty($upcoming_work_anniversary)){
                                        foreach ($upcoming_work_anniversary as $anniversary) {
                                    ?>
                                
                                <table class="table small-card">
                                            <tr>
                                                <td width="70">
                                                    <?php if (isset($anniversary->personal_image) && $anniversary->personal_image != '') { ?>
                                                <img src="<?php echo base_url(); ?>uploads/<?php echo (isset($anniversary->personal_image) && $anniversary->personal_image != '') ? $anniversary->personal_image : ''; ?>" class="ks-avatar img-fluid" alt="">
                                                <?php } else { ?>
                                                    <img src="<?php echo base_url(); ?>assets/img/avatars/placeholders/ava-128.png" class="ks-avatar img-fluid" alt="">
                                                <?php } ?>                                        
                                                </td>
                                                <td>
                                                    <h5>
													<?php if($this->session->userdata('futureAdmin')->detail->id == '1'){ ?>
													<a class="" href="<?php echo base_url('page/64/' . base64_encode(@$anniversary->id)); ?>"><?php echo @$anniversary->first_name . ' ' . @$anniversary->middle_name . ' ' . @$anniversary->last_name; ?></a>
													<?php } else { ?>
													<?php echo @$anniversary->first_name . ' ' . @$anniversary->middle_name . ' ' . @$anniversary->last_name; ?>
													<?php } ?>
													</h5>
                                                <p><?php echo (date('d',strtotime($anniversary->hire_date)) == date('d')) ? 'Today' : date('d F',strtotime($anniversary->hire_date)); ?></p>
                                                </td>
                                            </tr>
                                        </table>
                                
									<?php } } else {?>
                                    <img src="<?php echo base_url(); ?>/assets/svg/work-anniversary.svg" class="img-fluid">
                                <?php } ?>                                                                
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <div class="card">
                            <div class="card-header">
                                Joinees
                                <span class="pull-right"><?php if(!empty($upcoming_joining)){ echo count($upcoming_joining);} else { echo '0';} ?></span>
                            </div>
                            <div class="card-body">
                                <div class="scroller">
                                <?php if(!empty($upcoming_joining)){
                                                    foreach ($upcoming_joining as $joining) { ?>
                                
                                <table class="table small-card">
                                    <tr>
                                        <td width="70">
                                            <?php if (isset($joining->personal_image) && $joining->personal_image != '') { ?>
                                        <img src="<?php echo base_url(); ?>uploads/<?php echo (isset($joining->personal_image) && $joining->personal_image != '') ? $joining->personal_image : ''; ?>" class="ks-avatar img-fluid" alt="">
                                        <?php } else { ?>
                                            <img src="<?php echo base_url(); ?>assets/img/avatars/placeholders/ava-128.png" class="ks-avatar img-fluid" alt="">
                                        <?php } ?>  
                                        </td>
                                        <td>
                                            <h5>
											<?php if($this->session->userdata('futureAdmin')->detail->id == '1'){ ?>
											<a class="" href="<?php echo base_url('page/64/' . base64_encode(@$joining->id)); ?>"><?php echo @$joining->first_name . ' ' . @$joining->middle_name . ' ' . @$joining->last_name; ?></a>
											<?php } else { ?>
											<?php echo @$joining->first_name . ' ' . @$joining->middle_name . ' ' . @$joining->last_name; ?>
											<?php } ?>
											</h5>
                                        <p><?php echo (date('d',strtotime($joining->hire_date)) == date('d')) ? 'Today' : date('d F',strtotime($joining->hire_date)); ?></p>
                                        </td>
                                    </tr>
                                </table>
                                
                                 <?php } } else {?>
                                    <img src="<?php echo base_url(); ?>/assets/svg/team.svg" class="img-fluid">
                                <?php } ?>                                 
                                                                
                            </div>
                        </div>
                        </div>
                    </div>
                </div>                
            </div> 
        </div>
                </div>
            
    </div>
    </div>
</div>
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="notification_heading">Leave Approval </h4>
        <button type="button" class="close" data-dismiss="modal"><i class="la la-times"></i></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" >

       <p id="notification_body"></p>
		<div class="alert alert-danger">
		<strong><span id="notehtml"></span></strong>
		</div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <a data-dismiss="modal" id="modal_confirm_leave_reject" class="btn btn-danger" href="#">Reject</a> 
          <a data-dismiss="modal" id="modal_confirm" class="btn btn-success" href="#">Approve</a> 
      </div>

    </div>
  </div>
</div>
<!-- [end] Notification DIV -->

<div class="modal" id="myModalapp">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="notification_heading">Timeoff Approval </h4>
        <button type="button" class="close" data-dismiss="modal"><i class="la la-times"></i></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" >

       <p id="notification_body_app"></p>
	  <!-- <div class="alert alert-danger">
   <strong><span id="notehtml"></span></strong>
  </div>-->
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <a data-dismiss="modal" id="modal_confirm_rej" class="btn btn-danger" href="#">Reject</a>
         <a data-dismiss="modal" id="modal_confirm_app" class="btn btn-success" href="#">Approved</a> 
      </div>

    </div>
  </div>
</div>

<div class="modal" id="myModalbreak">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="notification_heading"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" >
       <p id="notification_body">Do you want to Logoff?</p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <a data-dismiss="modal" id="modal_confirm_break" class="btn btn-primary" href="#">Confirm</a> 
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div> 
</div>
<script>
    $(".toggleRightbar").click(function(){
        $(".sidebar_right").toggleClass('open');
        $('body').toggleClass('sidebar-right-open');
    });
	

		
	function approve_status(id,status,employee_id){            
              $("#myModal").on('shown.bs.modal', function() {
                $.post("<?php echo base_url('admin_get_view_form_employee_leave'); ?>", {'id': id,'status':status,'employee_id':employee_id}, function(result){
                //console.log(result);
                var res = result.split("^~");
               /*if(status == 'Yes'){
				   
				   $("#modal_confirm").html('Approve');
				   $("#modal_confirm").addClass('btn-success');
				   $("#modal_confirm").removeClass('btn-danger');
			   }else{
				    
					$("#modal_confirm").html('Reject');
					$("#modal_confirm").addClass('btn-danger');
				   $("#modal_confirm").removeClass('btn-success');
			   }*/
                $("#notification_body").html(res[0]);
                 $("#notehtml").html(res[1]);

                //$("#notification_heading").html("Confirmation");
                //$("#notification_body").html("Do you want to Delete this designation?"); //
                });
                $("#modal_confirm").click(function() {
					status = 'Yes';
					var approvalnote = $('#approval_note').val();
					if(approvalnote == ''){
						var approval_note = '1';
					}else{
						var approval_note = approvalnote;
					}
					//alert(approval_note);
                $.ajax({
                        url: '<?php echo base_url('employees_leave_approval_status'); ?>/' + id+'/'+status+'/'+employee_id+'/'+approval_note,
                        type: 'POST',
                        //data : new FormData( $("#expenses")[0]),
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (datanew) {
                            //alert(datanew);
							$.post("<?php echo base_url('get_leave_in_dashbord'); ?>", {'id': id}, function(result){
								//console.log(result);
								$("#leave_card").html(result);
							});
                            
                      }
                    });
                });
				
				$("#modal_confirm_leave_reject").click(function() {
					status = 'No';
					var approvalnote = $('#approval_note').val();
					if(approvalnote == ''){
						var approval_note = '1';
					}else{
						var approval_note = approvalnote;
					}
					//alert(approval_note);
                $.ajax({
                        url: '<?php echo base_url('employees_leave_approval_status'); ?>/' + id+'/'+status+'/'+employee_id+'/'+approval_note,
                        type: 'POST',
                        //data : new FormData( $("#expenses")[0]),
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (datanew) {
                            //alert(datanew);
							$.post("<?php echo base_url('get_leave_in_dashbord'); ?>", {'id': id}, function(result){
								//console.log(result);
								$("#leave_card").html(result);
							});
                            
                      }
                    });
                });
              }).modal("show");

            }
			
			  function time_approve_status(id,status,employee_id) {
                //if (confirm('Are you sure ?')) {
					$("#myModalapp").on('shown.bs.modal', function() {
					$.post("<?php echo base_url('admin_get_view_form_timeoff'); ?>", {'id': id,'status':status,'employee_id':employee_id}, function(result){
					//console.log(result);
					/*if(status == 'Yes'){

					$("#modal_confirm_app").html('Approve');
					$("#modal_confirm_app").addClass('btn-success');
					$("#modal_confirm_app").removeClass('btn-danger');
					}else{

					$("#modal_confirm_app").html('Reject');
					$("#modal_confirm_app").addClass('btn-danger');
					$("#modal_confirm_app").removeClass('btn-success');
					}*/
					$("#notification_body_app").html(result);
					

					//$("#notification_heading").html("Confirmation");
					//$("#notification_body").html("Do you want to Delete this designation?");
					});
					 $("#modal_confirm_app").click(function() {
						 status = 'Yes';
						 var timeapprovalnote = $('#app_timeoff_note').val();
					if(timeapprovalnote == ''){
						var timeapproval_note = '1';
					}else{
						var timeapproval_note = timeapprovalnote;
					}
                    $.ajax({
                        url: '<?php echo base_url('employees_timeoff_approval_status'); ?>/' + id+'/'+status+'/'+employee_id+'/'+timeapproval_note,
                        type: 'POST',
                        //data : new FormData( $("#expenses")[0]),
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (datanew) {
                            $.post("<?php echo base_url('get_leave_in_dashbord'); ?>", {'id': id}, function(result){
								//console.log(result);
								$("#leave_card").html(result);
							});
                       
                        }
                    });
					});
					
					 $("#modal_confirm_rej").click(function() {
						 status = 'No';
						 var timeapprovalnote = $('#app_timeoff_note').val();
					if(timeapprovalnote == ''){
						var timeapproval_note = '1';
					}else{
						var timeapproval_note = timeapprovalnote;
					}
                    $.ajax({
                        url: '<?php echo base_url('employees_timeoff_approval_status'); ?>/' + id+'/'+status+'/'+employee_id+'/'+timeapproval_note,
                        type: 'POST',
                        //data : new FormData( $("#expenses")[0]),
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (datanew) {
                            $.post("<?php echo base_url('get_leave_in_dashbord'); ?>", {'id': id}, function(result){
								//console.log(result);
								$("#leave_card").html(result);
							});
                       
                        }
                    });
					});
                //}

				}).modal("show");
            }
			
			function addattendance(employee_id,datetime){
				
				var time = $('#time').html();
				$('.btnatt').prop( "disabled", true );
				//alert(time);
				$.post("<?php echo base_url('admin_addedit_attendance_from_dashboard'); ?>", {'employee_id': employee_id, 'datetime': datetime, 'time' : time}, function (result) {
					//console.log(result);
					$.post("<?php echo base_url('get_attendance_in_dashbord'); ?>", {'employee_id': employee_id}, function(result){
								//console.log(result);
								$("#attendanceDiv").html(result);
							});
					notification('success');
					startTime();
					$('.btnatt').prop( "disabled", false );
				});
			}
			
			
			function breakin(attendance_id,employee_id,datetime){
				var time = $('#time').html();
				$('#breakoutbtn').prop('disabled', true);
				$.post("<?php echo base_url('admin_break_in_attendance_from_dashboard'); ?>", {'attendance_id':attendance_id,'employee_id': employee_id, 'datetime': datetime,'time' : time}, function (result) {
					//console.log(result);
					$.post("<?php echo base_url('get_attendance_in_dashbord'); ?>", {'employee_id': employee_id}, function(result){
								//console.log(result);
								$("#attendanceDiv").html(result);
								$('#breakoutbtn').prop('disabled', false);
							});
					notification('success');
					startTime();
				});
			}
			
			function breakout(id,attendance_id,employee_id,datetime,entry_time){
				var time = $('#time').html();
				$('#breakinbtn').prop('disabled', true);
				$.post("<?php echo base_url('admin_break_out_attendance_from_dashboard'); ?>", {'id':id,'attendance_id':attendance_id,'employee_id': employee_id, 'datetime': datetime,'entry_time':entry_time,'time' : time}, function (result) {
					//console.log(result);
					$.post("<?php echo base_url('get_attendance_in_dashbord'); ?>", {'employee_id': employee_id}, function(result){
								//console.log(result);
								$("#attendanceDiv").html(result);
								$('#breakinbtn').prop('disabled', false);
							});
					notification('success');
					startTime();
				});
			}
			
			


function mergeTabs(){
    if ($(window).width() < 767){
    $(".custom-tab").remove();
    $("#tab_2").addClass('active');
    $("#tab_2").css('margin-top','20px');
    $("#tab_1").addClass('active');
    }
}
$(document).ready(mergeTabs);
$(window).on('resize',mergeTabs);
			
</script>