<style>
    .ks-page-content .ks-page-content-body.dashboard-content {margin-top: 10px;}
    .ks-page-content .ks-page-content-body.dashboard-content .content-wrapper{border: 0}    
    .sidebar_right{position: fixed; top:50px; width: 300px; margin-right: 0; right:0; bottom: 0; background: #fff; border-left: 1px solid #e5e5e5; z-index: 2; transition: margin ease-in-out 0.3s; padding: 15px}
    .sidebar_right .closeSidebar{position: absolute; top:8px; right: 15px; display: none; color: #c00}
    .sidebar_right .card{box-shadow: 0 10px 10px -6px rgba(0,0,0,0.1)}
    .sidebar_right .card p{margin-bottom: 10px;}
    .sidebar_right .card h4{margin-bottom: 0;}
    .sidebar_right .card .card-body{padding: 15px;}
    .sidebar_right .sidebar-content{}
    
    body.ks-page-header-fixed .ks-page-content .ks-page-content-body.dashboard-content{padding-right: 300px;}
    body.ks-page-header-fixed.openrightsidebar .ks-page-content .ks-page-content-body.dashboard-content{padding-right: 0;}
</style>
<?php $SysConfigauthenticaton = checkConfig1();?>



<div class="sidebar_right open">
    <a href="javascript:;" class="closeSidebar"><i class="la la-times text-"></i></a>
    <div class="sidebar-content">
        <div class="row">
                    <div class="col-lg-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4"><img src="<?php echo base_url(); ?>/assets/svg/emp.svg" class="img-fluid"></div>
                                    <div class="col-8  align-self-center"><p>Total active employee</p><h4><a class="pjaxCls" href="<?php echo base_url('employees_details'); ?>"><?php if(!empty($all_data)) { echo count($all_data); }else{ echo '0'; } ?></a></h4></div>
                                </div>                                
                            </div>
                        </div>
                    </div>                    
                    <div class="col-lg-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4"><img src="<?php echo base_url(); ?>/assets/svg/male.svg" class="img-fluid"></div>
                                    <div class="col-8  align-self-center"><p>Male Employee </p><h4><a class="pjaxCls" href="<?php echo base_url('employees_details'); ?>"><?php if(!empty($all_data)) { echo count($all_data); }else{ echo '0'; } ?> <small class="text-muted">(60%)</small></a></h4></div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4"><img src="<?php echo base_url(); ?>/assets/svg/female.svg" class="img-fluid"></div>
                                    <div class="col-8  align-self-center"><p>Female  Employee </p><h4><a class="pjaxCls" href="<?php echo base_url('employees_details'); ?>"><?php if(!empty($all_data)) { echo count($all_data); }else{ echo '0'; } ?> <small class="text-muted">(40%)</small></a></h4></div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4"><img src="<?php echo base_url(); ?>/assets/svg/team.svg" class="img-fluid"></div>
                                    <div class="col-8  align-self-center"><p>New Joinee</p><h4><a class="pjaxCls" href="<?php echo base_url('employees_details'); ?>"><?php if(!empty($upcoming_joining)){ echo count($upcoming_joining);} else { echo '0';} ?></a><small> (7%<i class="la la-arrow-down text-danger"></i>)</small></h4></div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4"><img src="<?php echo base_url(); ?>/assets/svg/attritions.svg" class="img-fluid"></div>
                                    <div class="col-8  align-self-center"><p>Attritions</p><h4><a class="pjaxCls" href="<?php echo base_url('employee_leave'); ?>"><?php if(!empty($today_employee_leave)) { echo count($today_employee_leave); }else{ echo '0'; } ?></a> <small>(5%<i class="la la-arrow-up text-success"></i>)</small></h4>
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
                       <div class="col-lg-6 mb-4">
                        <div class="card h-100">
                            <div class="card-header">
                               Leave Request
                                <span class="pull-right"><?php if(!empty($leave_request)){ echo count($leave_request);} else { echo '0';} ?></span>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <?php if(!empty($leave_request)){ ?>
                                        <table class="table table-bordered m-0">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Emp. Name </th> 
													<th>From Date</th>
													<th>To Date</th>
													<th>Total Days</th>  													
<!--                                                <th width="30"></th>-->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                //echo '<pre>'; print_r($leave_request); die;
                                                if(!empty($leave_request)){
                                                    foreach ($leave_request as $leaves) { ?>
                                                <tr>
                                                    <td width="50">
                                                        <div class="card-circle">
                                                           <?php if (isset($leaves->personal_image) && $leaves->personal_image != '') { ?>
                                                            <img src="<?php echo base_url(); ?>uploads/<?php echo (isset($leaves->personal_image) && $leaves->personal_image != '') ? $leaves->personal_image : ''; ?>" class="ks-avatar" alt="" width="36" height="36">
                                                            <?php } else { ?>
                                                            <img src="<?php echo base_url(); ?>assets/img/avatars/placeholders/ava-128.png" class="ks-avatar" alt="" width="36" height="36">
                                                            <?php } ?>
                                                        </div>
                                                    </td>
                                                    <td><a class="pjaxCls" href="<?php echo base_url('employee_leave'); ?>">
                                                    <?php echo @$leaves->first_name . ' ' . @$leaves->middle_name . ' ' . @$leaves->last_name; ?></a><br>
                                                    </td>
													<td>
													<?php echo date($SysConfigauthenticaton->date_format,strtotime(@$leaves->leave_from)); ?>
													</td>
													<td>
													<?php echo date($SysConfigauthenticaton->date_format,strtotime(@$leaves->leave_to)); ?>
													</td>
													<td>
													<?php echo @$leaves->leave_total_days; ?>
													</td>													
                                                </tr>
                                            <?php } } ?>
                                            </tbody>
                                            
                                        </table>
                                         <?php } else {?>
                                        <img src="<?php echo base_url(); ?>/assets/svg/leave.svg" class="img-fluid">
                                        <?php } ?>
                                        
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6 mb-4">
                        <div class="card h-100">
                            <div class="card-header">
                                Upcoming Birthday
                                <span class="pull-right"><?php if(!empty($upcoming_bday)){ echo count($upcoming_bday);} else { echo '0';} ?></span>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <?php if(!empty($upcoming_bday)){ ?>
                                        <table class="table table-bordered m-0">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Emp. Name </th>                                                    
<!--                                                    <th width="30"></th>-->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                //echo '<pre>'; print_r($upcoming_bday);
                                                if(!empty($upcoming_bday)){
                                                    foreach ($upcoming_bday as $bday) { ?>
                                                <tr>
                                                    <td width="50">
                                                        <div class="card-circle">
                                                           <?php if (isset($bday->personal_image) && $bday->personal_image != '') { ?>
                                                            <img src="<?php echo base_url(); ?>uploads/<?php echo (isset($bday->personal_image) && $bday->personal_image != '') ? $bday->personal_image : ''; ?>" class="ks-avatar" alt="" width="36" height="36">
                                                            <?php } else { ?>
                                                            <img src="<?php echo base_url(); ?>assets/img/avatars/placeholders/ava-128.png" class="ks-avatar" alt="" width="36" height="36">
                                                            <?php } ?>
                                                        </div>
                                                    </td>
                                                    <td><a class="pjaxCls" href="<?php echo base_url('page/64/' . base64_encode(@$bday->id)); ?>">
                                                    <?php echo @$bday->first_name . ' ' . @$bday->middle_name . ' ' . @$bday->last_name; ?></a><br>
                                                        <small><?php echo (date('d',strtotime($bday->dob)) == date('d')) ? 'Today' : date('d F',strtotime($bday->dob)); ?></small>
                                                    </td>  
                                                </tr>
                                            <?php } } ?>
                                            </tbody>
                                            
                                        </table>
                                         <?php } else {?>
                                        <img src="<?php echo base_url(); ?>/assets/svg/birthday.svg" class="img-fluid">
                                        <?php } ?>
                                        
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                        </div>
                
                <!--row3-->
                <div class="row">
                    
                    <div class="col-lg-6 mb-4">
                        <div class="card h-100">
                            <div class="card-header">
                                Upcoming Work Anniversary
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
                                <div class="row">
                                    <div class="col-12">
                                        <?php if(!empty($upcoming_work_anniversary)){ ?>
                                        <table class="table table-bordered m-0">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Emp. Name </th>
<!--                                                    <th width="30"></th>-->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
												
												if(!empty($upcoming_work_anniversary)){
                                                    foreach ($upcoming_work_anniversary as $anniversary) {
                                                    ///if(date('Y',strtotime($anniversary->hire_date)) != date('Y')){
													
													?>
                                                <tr>
                                                    <td width="50">
                                                        <div class="card-circle">
                                                           <?php if (isset($anniversary->personal_image) && $anniversary->personal_image != '') { ?>
                                                            <img src="<?php echo base_url(); ?>uploads/<?php echo (isset($anniversary->personal_image) && $anniversary->personal_image != '') ? $anniversary->personal_image : ''; ?>" class="ks-avatar" alt="" width="36" height="36">
                                                            <?php } else { ?>
                                                                <img src="<?php echo base_url(); ?>assets/img/avatars/placeholders/ava-128.png" class="ks-avatar" alt="" width="36" height="36">
                                                            <?php } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a class="pjaxCls" href="<?php echo base_url('page/64/' . base64_encode(@$anniversary->id)); ?>"><?php echo @$anniversary->first_name . ' ' . @$anniversary->middle_name . ' ' . @$anniversary->last_name; ?></a><br>
                                                        <small><?php echo (date('d',strtotime($anniversary->hire_date)) == date('d')) ? 'Today' : date('d F',strtotime($anniversary->hire_date)); ?></small>
                                                    </td>  
                                                </tr>
                                            <?php //}
											} } ?>
                                            </tbody>
                                            
                                        </table>
                                         <?php } else {?>
                                        <img src="<?php echo base_url(); ?>/assets/svg/work-anniversary.svg" class="img-fluid">
                                        <?php } ?>
                                        
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div class="card h-100">
                            <div class="card-header">
                                Upcoming / New Joinees
                                <span class="pull-right"><?php if(!empty($upcoming_joining)){ echo count($upcoming_joining);} else { echo '0';} ?></span>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <?php if(!empty($upcoming_joining)){ ?>
                                        <table class="table table-bordered m-0">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Emp. Name </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(!empty($upcoming_joining)){
                                                    foreach ($upcoming_joining as $joining) { ?>
                                                <tr>
                                                    <td width="50">
                                                        <div class="card-circle">
                                                           <?php if (isset($joining->personal_image) && $joining->personal_image != '') { ?>
                                                            <img src="<?php echo base_url(); ?>uploads/<?php echo (isset($joining->personal_image) && $joining->personal_image != '') ? $joining->personal_image : ''; ?>" class="ks-avatar" alt="" width="36" height="36">
                                                            <?php } else { ?>
                                                                <img src="<?php echo base_url(); ?>assets/img/avatars/placeholders/ava-128.png" class="ks-avatar" alt="" width="36" height="36">
                                                            <?php } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                       <a class="pjaxCls" href="<?php echo base_url('page/64/' . base64_encode(@$joining->id)); ?>"><?php echo @$joining->first_name . ' ' . @$joining->middle_name . ' ' . @$joining->last_name; ?></a><br>
                                                        <small><?php echo (date('d',strtotime($joining->hire_date)) == date('d')) ? 'Today' : date('d F',strtotime($joining->hire_date)); ?></small>
                                                    </td>  
                                                </tr>
                                            <?php } } ?>
                                            </tbody>                                            
                                        </table>
                                         <?php } else {?>
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
