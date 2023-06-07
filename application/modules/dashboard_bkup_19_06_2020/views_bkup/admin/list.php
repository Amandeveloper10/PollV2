<style>
    .ks-page-content .ks-page-content-body.dashboard-content {margin-top: 10px;}
    .ks-page-content .ks-page-content-body.dashboard-content .content-wrapper{border: 0}
</style>
<?php $SysConfigauthenticaton = checkConfig1();
///print_r($SysConfigauthenticaton); die;?>
<div class="ks-page-content">

    <div class="ks-page-content-body dashboard-content">
    <div class="container-fluid">        
        <div class="content-wrapper">
            <div class="content">
                <div class="row mb-4">
                    <div class="col">Single date<input class="form-control mysingle_date" type="text" placeholder="Select Date.."></div>
                    <div class="col">Single date & Time<input class="form-control mydate_time" type="text" placeholder="Select Date & Time"></div>                    
                    <div class="col">Date Range<input class="form-control mydate_range" type="text" placeholder="Select Date & Time"></div>                    
                    <div class="col">Button Date <span id="selectedDate" class="text-danger">Today</span><br><button class="btn btn-info mybtn_date"><i class="la la-calendar"></i></button></div>                    
                </div>
                <div class="row mb-4">
                    <div class="col">Date & Time Range<input class="form-control mydate_timeRange" type="text" placeholder="Select Date & Time"></div>                    
                    <div class="col">Single Time<input class="form-control mytime_picker" type="text" placeholder="Select Date & Time"></div>
                    <div class="col">Time Range<input class="form-control mytime_pickerRange" type="text" placeholder="Select Date & Time"></div>
                </div>                
    

                <!--row1-->
                <div class="row">
                    <div class="col-lg-4 col-sm-6 col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-5 col-sm-4 col-md-5"><img src="<?php echo base_url(); ?>/assets/svg/emp.svg" class="img-fluid"></div>
                                    <div class="col-7 col-sm-8 col-md-7"><p>Total Employee</p><h4><a class="pjaxCls" href="<?php echo base_url('employees_details'); ?>"><?php if(!empty($all_data)) { echo count($all_data); }else{ echo '0'; } ?></a></h4></div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-sm-6 col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-5 col-sm-4 col-md-5"><img src="<?php echo base_url(); ?>/assets/svg/travel.svg" class="img-fluid"></div>
                                    <div class="col-7 col-sm-8 col-md-7"><p>Employee in leave</p><h4><a class="pjaxCls" href="<?php echo base_url('employee_leave'); ?>"><?php if(!empty($today_employee_leave)) { echo count($today_employee_leave); }else{ echo '0'; } ?></a></h4></div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-sm-6 col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-5 col-sm-4 col-md-5"><img src="<?php echo base_url(); ?>/assets/svg/team.svg" class="img-fluid"></div>
                                    <div class="col-7 col-sm-8 col-md-7"><p>New Joining</p><h4><a class="pjaxCls" href="<?php echo base_url('employees_details'); ?>"><?php if(!empty($upcoming_joining)){ echo count($upcoming_joining);} else { echo '0';} ?></a></h4></div>
                                </div>                                
                            </div>
                        </div>
                    </div>
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
                                        <img src="<?php echo base_url(); ?>/assets/svg/birthday.svg" class="img-fluid">
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
                                <span class="pull-right"><?php if(!empty($upcoming_work_anniversary)){ echo count($upcoming_work_anniversary);} else { echo '0';} ?></span>
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
                                                <?php if(!empty($upcoming_work_anniversary)){
                                                    foreach ($upcoming_work_anniversary as $anniversary) {
                                                    if(date('Y',strtotime($anniversary->hire_date)) != date('Y')){ ?>
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
                                            <?php } } } ?>
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
                                        <img src="<?php echo base_url(); ?>/assets/svg/birthday.svg" class="img-fluid">
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