 <?php $SysConfigauthenticaton = checkConfig1(); ?>
 <div class="row mb-3">
              <div class="col-12 d-flex align-items-center">
			 <?php  $all_employee = $this->TimeoffModel->get_row_data('employee',array('id'=>$data_single->employee_id,'is_active'=>'Y','delete_flag'=>'N'));
					 $department = $this->TimeoffModel->get_row_data('master_department', array('id' => $all_employee->department));
                    $designation = $this->TimeoffModel->get_row_data('master_designation', array('id' => $all_employee->designation));
					$workshift = $this->TimeoffModel->get_row_data('assigned_workshift', array('employee_id' => $all_employee->id,'start_date' => $data_single->date));
					$workshiftid = '';
					if(!empty($workshift)){
						$workshiftid = $workshift->work_shift_id;
					}else{
						$workshiftid = $all_employee->work_shift_id;
					}
					
					$stweekname = date('l',strtotime($data_single->date));
					$curdate = date('Y-m-d',strtotime($data_single->date));
					$weekNo = getWeeks($curdate,$stweekname);
					
					$workshiftdetails = $this->TimeoffModel->get_workshift_details($workshiftid,$weekNo,$stweekname);
					
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
					
					
			 ?>
                    <img <?php if (isset($all_employee->personal_image) && $all_employee->personal_image != '') { ?> src="<?php echo base_url(); ?>uploads/<?php echo (isset($all_employee->personal_image) && $all_employee->personal_image != '') ? $all_employee->personal_image : ''; ?>" <?php } else { ?> src="<?php echo base_url(); ?>/assets/img/avatars/placeholders/ava-128.png" <?php } ?> class="ks-avatar mr-3" alt="" width="45" height="45">
                    <div style="line-height: 1.2"><strong><?php echo $all_employee->first_name.' '.$all_employee->last_name.' ('.$all_employee->employee_no.')';?></strong><br>
                        <small><?php echo @$department->department_name; ?></small><br>
                        <small><?php echo @$designation->designation_name; ?></small>
                    </div>                    
              </div>
          </div>
		  <?php 
			$startdate = date('Y-m-d',strtotime($data_single->from_date));
			//echo $start_date;
			$enddate = date('Y-m-d',strtotime($data_single->to_date));
			$start_date = strtotime($startdate); 
			$end_date = strtotime($enddate); 
		   //echo $end_date; die;
		  $days = ($end_date - $start_date)/60/60/24;
		  $total_hour = getTimeDiff(date('h:i',strtotime($data_single->time)),date('h:i',strtotime($work_hour_end)));
		  //echo $total_hour;
		  //echo date('h:i s',strtotime($data_single->time)); ///die;  
		  //echo'<br>';
		  //echo date('h:i s',strtotime($work_hour_end)); die;
		  ?>
          
          <div class="row mb-3">
              <div class="col-5 align-self-center"><h4 class="m-0"><?php if(@$data_single->type=='Personal'){ ?>1<small> day Early Leave<?php } else { ?><?=$days+1?><small> days <?php if(!empty($data_single->work_status) && $data_single->work_status == 'OD'){ echo 'Outside Duty'; } else { echo 'WFH'; } ?><?php } ?></small></h4><?php if(@$data_single->type=='Personal'){ ?>
				  <p>Early leave for <?=$total_hour?> Hrs.</p>
				  <?php } ?> </div>
              <div class="col-1 align-self-center">
                  <div class="bar"></div>
              </div>
              <div class="col-5 align-self-center">
			  <?php if(@$data_single->type=='Personal'){ ?>
                 <p class="mb-3"><?php echo date($SysConfigauthenticaton->date_format,strtotime($data_single->date));?>&nbsp;&nbsp;&nbsp;<?php echo (isset($data_single->time) ? date('h:i a',strtotime($data_single->time)) : ''); ?></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=date('h:i a',strtotime($work_hour_end))?></p>
                 
			  <?php } else { ?>
                  <p class="mb-3"><?=date($SysConfigauthenticaton->date_format,strtotime($data_single->from_date))?> &nbsp;  &nbsp; &nbsp; <?php echo (isset($data_single->entry_time) ? date('h:i a',strtotime($data_single->entry_time)) : ''); ?></p>
                  <p><?=date($SysConfigauthenticaton->date_format,strtotime($data_single->to_date))?> &nbsp;  &nbsp; &nbsp; <?php echo (isset($data_single->out_time) ? date('h:i a',strtotime($data_single->out_time)) : ''); ?></p>
			  <?php } ?>  
              </div>
              <div class="col-12 mt-3">
                  <p class="text-muted mb-2">Reason for leave</p>
                  <p><?php echo (isset($data_single->purpose) ? $data_single->purpose : ''); ?></p>
				  
                 <?php
					//if(!empty($data_single->documents))
					//{?> <!--<p class="text-muted mb-2">Attachments</p> -->
				<?php //} ?>
              </div>
             <!-- <div class="col-12">
                  <div class="form-group">
				   <?php
					if(!empty($data_single->documents))
					{
                                                                
                    $images=  explode(',', $data_single->documents);
                     foreach ($images as $value) {					?>
                      <a href="<?php echo base_url('employees_loanapplication_download/').@$value; ?>" class="btn btn-secondary"><i class="la la-paperclip"></i></a>
					<?php } } ?>
                  </div>
              </div>-->
              <div class="col-12">
                  <textarea class="form-control" rows="2" id="app_timeoff_note" placeholder="Add note"><?php echo (isset($data_single->approvalnote) ? $data_single->approvalnote : ''); ?></textarea>
              </div>
          </div>
		


