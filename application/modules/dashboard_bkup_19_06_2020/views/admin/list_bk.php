<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/fonts/kosmo/styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/fonts/weather/css/weather-icons.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/libs/c3js/c3.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/libs/noty/noty.css">-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/styles/widgets/payment.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/styles/widgets/panels.min.css">
<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/styles/dashboard/tabbed-sidebar.min.css">-->

<style>
    body.ks-page-header-fixed .ks-page-content .ks-page-content-body{padding-top: 0;}
</style>

<div class="ks-page-content">
    <div class="ks-page-content-body">
    <div class="container-fluid">        
        <div class="content-wrapper">
            <div class="content dasbboard-content">                
                <!--row1-->
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                        <div class="card panel panel-purple ks-amount-widget" data-type="purple">
                            <div class="card-header">
                                Total Employee
                                <div class="ks-controls"><span class="ks-icon la la-calendar"></span></div>
                            </div>
                            <div class="card-block panel-body">
                                <div class="ks-amount"><?php if(!empty($all_data)) { echo count($all_data); }else{ echo '0'; } ?></div>                                
                            </div>
                        </div>
                    </div>
<!--                    <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                        <div class="card panel panel-info ks-amount-widget" data-type="info">
                            <div class="card-header">
                                Login Users
                                <div class="ks-controls"><span class="ks-icon la la-calendar"></span></div>
                            </div>
                            <div class="card-block panel-body">
                                <div class="ks-amount">1</div>                               
                            </div>
                        </div>
                    </div>  -->
                    <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                        <div class="card panel panel-orange ks-amount-widget" data-type="purple">
                            <div class="card-header">
                                Employee in leave
                                <div class="ks-controls"><span class="ks-icon la la-calendar"></span></div>
                            </div>
                            <div class="card-block panel-body">
                                <div class="ks-amount"><?php if(!empty($today_employee_leave)) { echo count($today_employee_leave); }else{ echo '0'; } ?></div>                                
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                        <div class="card panel panel-success ks-amount-widget" data-type="purple">
                            <div class="card-header">
                                New Joining 
                                <div class="ks-controls"><span class="ks-icon la la-calendar"></span></div>
                            </div>
                            <div class="card-block panel-body">
                                <div class="ks-amount"><?php if(!empty($new_joining)) { echo count($new_joining); }else{ echo '0'; } ?></div>
                            </div>
                        </div>
                    </div>

                </div>
                
                <!--row2-->
                <div class="row">
                            <div class="col-xl-6">
                                <div class="card ks-card-widget ks-widget-payment-table-invoicing">
                                    <h5 class="card-header">
                                        Leave Request

<!--                                        <div class="ks-controls">
                                            <a href="#" class="ks-control-link">View All</a>
                                        </div>-->
                                    </h5>
                                    <div class="card-block mt-2">
                                        <div class="table-responsive">
                                        <table class="table table-bordered m-0">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Emp. Name </th>
                                                    <th>Available Leave</th>
<!--                                                    <th width="30"></th>-->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(!empty($leave_request)){
                                                        foreach ($leave_request as $request) {

                                                          
                                                            $mdate = date('Y-m');

                                  $pre_mth = strtoupper(date("Y-m", strtotime($mdate . " last month"))); //die;
                                  $exp_pre_mth = explode('-', $pre_mth);
                                  $pre_month = $exp_pre_mth[1];
                                  $pre_year =  $exp_pre_mth[0];

                                  //echo date('Y-m',strtotime("first day of last month")); die;

                                    
                                    // check previous year month leave balance 
                                    $check_leave_balance=$this->DashboardModel->get_row_data('employee_payroll_leave_info',array('is_active'=>'Y','delete_flag'=>'N','employee_id'=>$request->employee_id,'month'=>@$pre_month,'year'=>@$pre_year));

                                    //echo "<pre>"; print_r($check_leave_balance); die;

                                    if(empty($check_leave_balance)){
                                      $opening_leave = 0;
                                    }else{
                                      $opening_leave = @$check_leave_balance->balance_leave;
                                    }



                                    $totaldayofthismonth=cal_days_in_month(CAL_GREGORIAN, @$month, @$year);
                                    //echo $totaldayofthismonth; die;
                                    $total_attendance=$this->DashboardModel->get_total_attendence_of_employee($request->employee_id,@$month,@$year);
                                   // echo "<pre>"; print_r($total_attendance); die;
                                    $absent_day=$totaldayofthismonth - $total_attendance;
                                    //echo $absent_day; exit();
                                    if($total_attendance!=$totaldayofthismonth){
                                    // echo '1';exit;
                                     $total_leave_taken = $this->DashboardModel->total_leave_taken($request->employee_id,@$month,@$year); 
                                    //echo '<pre>';print_r($total_leave_taken);exit;
                                     $leavetakeArr=array();
                                     if(!empty($total_leave_taken))
                                     {
                                        foreach ($total_leave_taken as $leave_take) {
                                         $allleavedates = new DatePeriod(
                                     new DateTime($leave_take->leave_from),
                                     new DateInterval('P1D'),
                                     new DateTime($leave_take->leave_to)
                                );
                                   
                                     foreach ($allleavedates as $key => $value) {
                                       // echo $value->format('Y-m-d').'@'; exit;           
                                       if(date('m',strtotime($value->format('Y-m-d'))) == date('m')){                           
                                        $leavetakeArr[]=$value->format('Y-m-d');
                                    }
                                        }

                                        if(date('m',strtotime($leave_take->leave_to)) == date('m')){                           
                                         array_push($leavetakeArr,$leave_take->leave_to);
                                    }
                                       

                                     } }
                                    
                                     }

                                     //echo '<pre>';print_r($leavetakeArr);exit;


                                     if(!empty($leavetakeArr))
                                     {
                                        $leavetake = count($leavetakeArr);
                                     }
                                     else{
                                         $leavetake = 0;
                                     }


                                    $leave_type_for_this_employee= $this->DashboardModel->leave_type_for_this_employee(@$request->grade);

                                     //echo '<pre>';print_r($leave_type_for_this_employee);exit;

                                    $leave_type=array();
                                    if(!empty($leave_type_for_this_employee)){
                                       
                                        $leave_type=explode(',',$leave_type_for_this_employee->leave_rule_id);
                                        
                                    }


                                    $earn_leave_monthly = 0;
                                    
                                    if(!empty($leave_type))
                                    {
                                        foreach ($leave_type as $value) {
                                          $leave_type_details = $this->DashboardModel->leave_type_details(@$value); 

                                          //echo '<pre>';print_r($leave_type_details);//exit;

                                          if(!empty($leave_type_details)){
                                            $num_padded = sprintf("%02d", $leave_type_details->period_day);
                                            $ddt = date('d');
                                            $mmt = date('m');
                                            $mmtt = date('m',strtotime($leave_type_details->period_month));
                                           // echo $num_padded; //exit;
                                            //echo "<br>".$ddt;

                                            if(($leave_type_details->credit_month=='Monthly') && ((int)$ddt >= (int)$num_padded)){
                                                $earn_leave_monthly += 1;  
                                            }

                                        

                                            if(($leave_type_details->credit_month=='Yearly') && ((int)$ddt >= (int)$num_padded)  && ((int)$mmt == (int)$mmtt)){
                                            $opening_leave += $leave_type_details->unit;
                                          }
                                         
                                          }

                                        } 
                                    }

                                    $balance_leave = (($opening_leave + $earn_leave_monthly) - $leavetake);




                                                         ?>
                                                <tr>
                                                    <td class="card-circle">
                                                        <div class="bg-success">
                                                            <?php if (isset($request->personal_image) && $request->personal_image != '') { ?>

                            
                 <img src="<?php echo base_url(); ?>uploads/<?php echo (isset($request->personal_image) && $request->personal_image != '') ? $request->personal_image : ''; ?>" class="ks-avatar" alt="" width="36" height="36">
                                            <?php } else { ?>
                                                <img src="<?php echo base_url(); ?>assets/img/avatars/avatar-1.jpg" class="ks-avatar" alt="" width="36" height="36">
                                            <?php } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?php echo @$request->first_name . ' ' . @$request->middle_name . ' ' . @$request->last_name; ?><br>
                                                        <small>Toady</small>
                                                    </td>
                                                    <td>
                                                       <?php echo @$balance_leave; ?>
                                                    </td>

                                                </tr>
                                            <?php } } ?>
                                            </tbody>
                                            
                                        </table>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card ks-card-widget ks-widget-tasks-table">
                                    <h5 class="card-header">
                                        Upcoming Birthday
<!--                                        <div class="ks-controls">
                                            <a href="#" class="ks-control-link">View All</a>                                            
                                        </div>-->
                                    </h5>
                                    <div class="card-block mt-2">
                                        <div class="table-responsive">
                                        <table class="table table-bordered m-0">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Emp. Name </th>                                                    
<!--                                                    <th width="30"></th>-->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(!empty($upcoming_bday)){
                                                    foreach ($upcoming_bday as $bday) { ?>
                                                <tr>
                                                    <td class="card-circle">
                                                        <div class="bg-success">
                                                           <?php if (isset($bday->personal_image) && $bday->personal_image != '') { ?>

                            
                 <img src="<?php echo base_url(); ?>uploads/<?php echo (isset($bday->personal_image) && $bday->personal_image != '') ? $bday->personal_image : ''; ?>" class="ks-avatar" alt="" width="36" height="36">
                                            <?php } else { ?>
                                                <img src="<?php echo base_url(); ?>assets/img/avatars/avatar-1.jpg" class="ks-avatar" alt="" width="36" height="36">
                                            <?php } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?php echo @$bday->first_name . ' ' . @$bday->middle_name . ' ' . @$bday->last_name; ?><br>
                                                        <small><?php echo (date('d',strtotime($bday->dob)) == date('d')) ? 'Today' : date('d F',strtotime($bday->dob)); ?></small>
                                                    </td>  
                                                </tr>
                                            <?php } } ?>
                                            </tbody>
                                            
                                        </table>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                <!--row3-->
                <div class="row">
                            <div class="col-xl-6">
                                <div class="card ks-card-widget ks-widget-payment-table-invoicing">
                                    <h5 class="card-header">
                                        Upcoming Work Anniversary
<!--                                        <div class="ks-controls">
                                            <a href="#" class="ks-control-link">View All</a>
                                        </div>-->
                                    </h5>
                                    <div class="card-block mt-2">
                                        <div class="table-responsive">
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
                                                    <td class="card-circle">
                                                        <div class="bg-success">
                                                           <?php if (isset($anniversary->personal_image) && $anniversary->personal_image != '') { ?>

                            
                 <img src="<?php echo base_url(); ?>uploads/<?php echo (isset($anniversary->personal_image) && $anniversary->personal_image != '') ? $anniversary->personal_image : ''; ?>" class="ks-avatar" alt="" width="36" height="36">
                                            <?php } else { ?>
                                                <img src="<?php echo base_url(); ?>assets/img/avatars/avatar-1.jpg" class="ks-avatar" alt="" width="36" height="36">
                                            <?php } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?php echo @$anniversary->first_name . ' ' . @$anniversary->middle_name . ' ' . @$anniversary->last_name; ?><br>
                                                        <small><?php echo (date('d',strtotime($anniversary->hire_date)) == date('d')) ? 'Today' : date('d F',strtotime($anniversary->hire_date)); ?></small>
                                                    </td>  
                                                </tr>
                                            <?php } } } ?>
                                            </tbody>
                                            
                                        </table>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card ks-card-widget ks-widget-tasks-table">
                                    <h5 class="card-header">
                                        Upcoming / New Joinees
<!--                                        <div class="ks-controls">
                                            <a href="#" class="ks-control-link">View All</a>                                            
                                        </div>-->
                                    </h5>
                                    <div class="card-block mt-2">
                                        <div class="table-responsive">
                                        <table class="table table-bordered m-0">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Emp. Name </th>                                                    
<!--                                                    <th width="30"></th>-->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(!empty($upcoming_joining)){
                                                    foreach ($upcoming_joining as $joining) { ?>
                                                <tr>
                                                    <td class="card-circle">
                                                        <div class="bg-success">
                                                           <?php if (isset($joining->personal_image) && $joining->personal_image != '') { ?>

                            
                 <img src="<?php echo base_url(); ?>uploads/<?php echo (isset($joining->personal_image) && $joining->personal_image != '') ? $joining->personal_image : ''; ?>" class="ks-avatar" alt="" width="36" height="36">
                                            <?php } else { ?>
                                                <img src="<?php echo base_url(); ?>assets/img/avatars/avatar-1.jpg" class="ks-avatar" alt="" width="36" height="36">
                                            <?php } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?php echo @$joining->first_name . ' ' . @$joining->middle_name . ' ' . @$joining->last_name; ?><br>
                                                        <small><?php echo (date('d',strtotime($joining->hire_date)) == date('d')) ? 'Today' : date('d F',strtotime($joining->hire_date)); ?></small>
                                                    </td>  
                                                </tr>
                                            <?php } } ?>
                                            </tbody>
                                            
                                        </table>
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