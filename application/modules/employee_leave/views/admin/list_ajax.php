<?php
if(!empty($all_data))
                  {
					  //print_r($all_data); die;
				  $SysConfigauthenticaton = checkConfig1();
                  foreach ($all_data as $value) {
                      ?>
                  
                <tr>
                    <td class="d-flex align-items-center">
                        <img <?php if (isset($value->personal_image) && $value->personal_image != '') { ?> src="<?php echo base_url(); ?>uploads/<?php echo (isset($value->personal_image) && $value->personal_image != '') ? $value->personal_image : ''; ?>" <?php } else { ?> src="<?php echo base_url(); ?>/assets/img/avatars/placeholders/ava-128.png" <?php } ?>class="ks-avatar" alt="" width="36" height="36">
                        <div><?php
                                if(@$value->approved=='' || @$value->approved=='No')
                                {
                                ?>
                                <a href="javascript:void(0)" onclick="openForm('<?php echo @$value->id;?>')" class="" style="cursor:pointer;"><?php echo @$value->first_name . ' ' . @$value->middle_name . ' ' . @$value->last_name; ?><br>
                            <small><?php echo $value->employee_no; ?></small></a><?php } else { ?> <?php echo @$value->first_name . ' ' . @$value->middle_name . ' ' . @$value->last_name; ?><br>
                            <small><?php echo $value->employee_no; ?></small> <?php } ?>                      </div>
                    </td> 					
                     <td>
                    <?php 
                    $type = $this->EmpLeaveModel->get_row_data('master_leave_rules',array('id'=>$value->leave_type_id,'is_active'=>'Y','delete_flag'=>'N'));
                    echo @$type->rule_name; ?>
                    </td>
                    <td>
                        <?php echo date($SysConfigauthenticaton->date_format,strtotime(@$value->leave_from)); ?>
                    </td>
                    <td>
                       <?php echo date($SysConfigauthenticaton->date_format,strtotime(@$value->leave_to)); ?>
                    </td>
                    <td>
                       <?php echo @$value->leave_total_days; ?>
                    </td>
                   <!-- <td>
                       <?php echo @$value->leave_ticket; ?>
                    </td>
                    <td>
                       <?php echo @$value->leave_ticket_amount; ?>
                    </td> -->
                    <td>
                        <?php
                                if(@$value->approved=='No')
                                {
                                ?>
                                <span style="color: red;"><?php echo '<label class="badge badge-danger">Rejected</label>';?></span>
                                <?php
                                }
                                ?>
                                 <?php
                                if(@$value->approved=='')
                                {
                                ?>
                                <label class="badge badge-info">New</label> 
                                <?php
                                }
                                ?>
                                <?php
                                if(@$value->approved=='Yes')
                                {
                                ?>
                                <span style="color: green;"><?php echo '<label class="badge badge-success">Approved</label>';?></span>
                           <?php
                                }
                                ?>
                    </td>
                   


                     <td class="table-action">
                        <div class="dropdown">
                            <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="la la-ellipsis-v"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                              <?php
                                if(@$value->approved=='' || @$value->approved=='No')
                                {
                                ?>
                                <a href="javascript:void(0)" onclick="openForm('<?php echo @$value->id;?>')" class="dropdown-item" style="cursor:pointer;">
                                    <span class="la la-pencil icon text-info"></span> Edit
                                </a>
                                <?php
                                }
                                ?>
                                
                                <!-- <a href="javascript:void(0)" class="dropdown-item" style="cursor:pointer;" onclick="employees_leave_application_delete('<?php echo @$value->id;?>')"><span class="la la-trash icon text-danger"></span> Delete</a> -->
                                <?php /* ?><?php
                                if(@$value->approved=='No')
                                {
                                ?>
                                <a class="dropdown-item" style="cursor:pointer;" onclick="approve_status('<?php echo @$value->id;?>','Yes','<?php echo @$value->employee_id;?>')">Make Approve</a>
                                <?php
                                }
                                ?><?php */ ?>
								<?php if($this->session->userdata('futureAdmin')->detail->employee_id == '0'){ ?>
                                 <?php
                                if(@$value->approved=='')
                                {
                                ?>
                                <a class="dropdown-item" style="cursor:pointer;" onclick="approve_status('<?php echo @$value->id;?>','Yes','<?php echo @$value->employee_id;?>')">Make Approve</a>
                                <?php
                                }elseif(@$value->approved=='Yes') { 
                                ?>
								 <a class="dropdown-item" style="cursor:pointer;" onclick="approve_status('<?php echo @$value->id;?>','No','<?php echo @$value->employee_id;?>')">Make Not Approve</a>
								<?php
                                }else if(@$value->approved=='No'){ ?>
								<a class="dropdown-item" style="cursor:pointer;" onclick="approve_status('<?php echo @$value->id;?>','Yes','<?php echo @$value->employee_id;?>')">Make Approve</a>
								<?php } ?>
								<?php
                                }
                                ?>
                               <?php /* ?> <?php
                                if(@$value->approved=='Yes')
                                {
                                ?>
                                <a class="dropdown-item" style="cursor:pointer;" onclick="approve_status('<?php echo @$value->id;?>','No','<?php echo @$value->employee_id;?>')">Make Not Approve</a>
                           <?php
                                }
                                ?><?php */ ?>
                            </div>
                        </div>
                    </td> 
                </tr>
               <?php
                  }
                  }else { 
                  ?> 
					<tr>
					<td colspan="7" style="text-align:center">No Data Found.</td>
					</tr>
				  <?php } ?>				  
              
             
