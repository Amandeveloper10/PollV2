 <?php $SysConfigauthenticaton = checkConfig1(); ?>
 <div class="row mb-3">
              <div class="col-12 d-flex align-items-center">
			 <?php  $all_employee = $this->EmpLeaveModel->get_row_data('employee',array('id'=>$data_single->employee_id,'is_active'=>'Y','delete_flag'=>'N'));
					 $department = $this->EmpLeaveModel->get_row_data('master_department', array('id' => $all_employee->department));

                    $designation = $this->EmpLeaveModel->get_row_data('master_designation', array('id' => $all_employee->designation));
			 ?>
                    <img <?php if (isset($all_employee->personal_image) && $all_employee->personal_image != '') { ?> src="<?php echo base_url(); ?>uploads/<?php echo (isset($all_employee->personal_image) && $all_employee->personal_image != '') ? $all_employee->personal_image : ''; ?>" <?php } else { ?> src="<?php echo base_url(); ?>/assets/img/avatars/placeholders/ava-128.png" <?php } ?> class="ks-avatar mr-3" alt="" width="45" height="45">
                    <div style="line-height: 1.2"><strong><?php echo $all_employee->first_name.' '.$all_employee->last_name.' ('.$all_employee->employee_no.')';?></strong><br>
                        <small><?php echo @$department->department_name; ?></small><br>
                        <small><?php echo @$designation->designation_name; ?></small>
                    </div>                    
              </div>
          </div>
          
          <div class="row mb-3">
              <div class="col-5 align-self-center"><h4 class="m-0"><?php echo (isset($data_single->leave_total_days) ? $data_single->leave_total_days : ''); ?><small> days</small></h4><?php if($data_single->leave_type_id != '0'){
                if(!empty($all_leave_type))
                {
                foreach ($all_leave_type as $value) {
                    if(in_array($value->id, $emp_leave)){
                    if(isset($data_single->employee_id) && $data_single->employee_id!=''){
                       $result=  $this->EmpLeaveModel->leave_due_day($value->id,$data_single->employee_id);
                       //$result1 =  $this->EmpLeaveModel->settlement_due_day($value->id,$_POST['id']);
                       //$due=$value->unit - ($result + $result1);
                        if(!empty($result)){
                          $due=$result;
                      }else{
                        $due=0;
                      }
                    }else{
                        $due=0;
                    }
					
					echo ((isset($data_single->leave_type_id) && ($data_single->leave_type_id==$value->id)) ? $value->rule_name : '');
                
                ?>
                <?php
                } }
                }
                ?>
<?php } ?></div>
              <div class="col-1 align-self-center">
                  <div class="bar"></div>
              </div>
              <div class="col-5 align-self-center">
			  <?php if(isset($data_single->date_range)){ 
			   $arrdate = explode(' ',$data_single->date_range);?>
                 <p class="mb-3"><?=date($SysConfigauthenticaton->date_format,strtotime($arrdate[0]))?></p>
                  <p><?=date($SysConfigauthenticaton->date_format,strtotime($arrdate[2]))?></p>
			  <?php } ?>  
              </div>
              <div class="col-12 mt-3">
                  <p class="text-muted mb-2">Reason for leave</p>
                  <p><?php echo (isset($data_single->leave_note) ? $data_single->leave_note : ''); ?></p>
                 <?php
					if(!empty($data_single->documents))
					{?> <p class="text-muted mb-2">Attachments</p> <?php } ?>
              </div>
              <div class="col-12">
                  <div class="form-group">
				   <?php
					if(!empty($data_single->documents))
					{
                                                                
                    $images=  explode(',', $data_single->documents);
                     foreach ($images as $value) {					?>
                      <a href="<?php echo base_url('employees_loanapplication_download/').@$value; ?>" class="btn btn-secondary"><i class="la la-paperclip"></i></a>
					<?php } } ?>
                  </div>
              </div>
              <div class="col-12">
                  <textarea class="form-control" rows="2" id="approval_note" placeholder="Add note"><?php echo (isset($data_single->approvalnote) ? $data_single->approvalnote : ''); ?></textarea>
              </div>
          </div>
		  Balance Leave : <p style="color: red;"><?php if($data_single->leave_type_id != '0'){
                if(!empty($all_leave_type))
                {
                foreach ($all_leave_type as $value) {
                    if(in_array($value->id, $emp_leave)){
                    if(isset($data_single->employee_id) && $data_single->employee_id!=''){
                       $result=  $this->EmpLeaveModel->leave_due_day($value->id,$data_single->employee_id);
                       //$result1 =  $this->EmpLeaveModel->settlement_due_day($value->id,$_POST['id']);
                       //$due=$value->unit - ($result + $result1);
                        if(!empty($result)){
                          $due=$result;
                      }else{
                        $due=0;
                      }
                    }else{
                        $due=0;
                    }
					
					echo ((isset($data_single->leave_type_id) && ($data_single->leave_type_id==$value->id)) ? $due.' leaves of '.$value->rule_name : '');
                
                ?>
                <?php
                } }
                }
                ?>
<?php } ?></p>


