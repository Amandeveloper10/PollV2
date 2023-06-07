<?php $SysConfig = checkConfig();
//echo "<pre>"; print_r($SysConfig); die;
 ?>
<style>
    .custom-file-label:after{
        line-height: 26px;
    }
    .img-fluid {
    max-width: 150px; 
   }
   .bootstrap-table{border-bottom: 0; border-top: 0}
   
    </style>
    <?php  $this->load->model('admin/EmployeesModel'); ?>
<div class="ks-page-header">
<section class="ks-title">
<h3>Employee Profilex</h3>
<div class="ks-controls">
<button type="button" class="btn btn-outline-primary ks-light ks-settings-menu-block-toggle" data-block-toggle=".ks-settings-tab > .ks-menu">Profile Tabs</button>
</div>
</section>
</div>
    <?php //echo @$id; exit; ?>
<form  class="ks-form ks-settings-tab-form ks-general" method="post" action="<?php echo base_url('modify_employees_details/'.$id)?>" name="general_edit" id="general_edit" enctype="multipart/form-data">
    <input type="hidden" name="id" id="id" value="<?php echo @$id; ?>">
    <div class="ks-page-content">
    
<!--<div class="ks-page-content-body ks-social-profile ks-profile">    
<div class="ks-profile-header">    
<div class="row w-100">
<div class="col-sm-6 col-lg-4">
<div class="card ks-panel ks-widget-progress-chart-statistics mt-4 mt-lg-0">
<div class="card-block">
    <table class="ks-statistics">
        <tbody>
        <tr>
            <td rowspan="2" class="ks-chart">
                <div id="ks-projects-progress-chart" class="ks-radial-progress-chart ks-success"></div>
            </td>
            <td class="ks-statistic-item">
                <span class="ks-amount">149</span>
                <span class="ks-text">Working days</span>
            </td>
        </tr>
        <tr>
            <td class="ks-statistic-item">
                <span class="ks-amount">9</span>
                <span class="ks-text">Sick Leave</span>
            </td>
        </tr>
        </tbody>
    </table>
</div>
</div>
</div>
<div class="col-sm-6 col-lg-4">
<div class="card ks-panel ks-widget-progress-chart-statistics mt-4 mt-lg-0">
<div class="card-block">
    <table class="ks-statistics">
        <tbody>
        <tr>
            <td rowspan="2" class="ks-chart">
                <div id="ks-projects-progress-chart2" class="ks-radial-progress-chart ks-success"></div>
            </td>
            <td class="ks-statistic-item">
                <span class="ks-amount">23</span>
                <span class="ks-text">Booked</span>
            </td>
        </tr>
        <tr>
            <td class="ks-statistic-item">
                <span class="ks-amount">5</span>
                <span class="ks-text">Remaining</span>
            </td>
        </tr>
        </tbody>
    </table>
</div>
</div>
</div>
</div>
</div>
</div>-->
<div class="ks-page-content-body ks-social-profile ks-profile">
<div class="day-calendar mt-3">
    <h6><b><?php echo date('F, Y'); ?> (All Leave & Holiday of this month)</b></h6>

    <?php
    //echo '<pre>';print_r($att_january_leave);exit;
    $dd = '';
    $cc=0;
   
    foreach ($all_leave_type as $value) {
        $num_padded11 = sprintf("%02d", $cc);
        $dd[] = $value->rule_name;
        $cc++;
    }
//echo '<pre>';print_r($dd);exit;
    ?>
    <div class="btn-group">
        <?php
        for ($i = 01; $i <= 31; $i++) {
            //echo $i;
            $num_padded = sprintf("%02d", $i);
           
            if ((!empty($att_january_leave)) && (array_key_exists($num_padded, $att_january_leave))) {
                //echo $att_january_leave[$i];
             //echo '<pre>';print_r($att_january_leave);exit;
                ?>


                <button type="button" class="<?php if (in_array(@$att_january_leave[$num_padded], $dd)) {
            echo 'btn btn-success';
        } else {
            echo 'btn btn-danger';
        } ?>" data-toggle="tooltip" data-placement="top" title="<?php echo @$att_january_leave[$num_padded]; ?>"><?php echo $i; ?></button>


    <?php } else { ?>
                <button type="button" class="btn btn-secondary"><?php echo $i; ?></button>
    <?php }
} ?>


    </div>
</div>
    </div>

<div class="ks-tabs-container ks-tabs-default ks-tabs-no-separator ks-full ks-light">
<div class="tab-content">
<div class="tab-pane active" id="settings" role="tabpanel" aria-expanded="false">
<div class="ks-settings-tab">
<div class="ks-menu">
  
    
    <div class="ks-manage-avatar avatar-emp-profile"> 
        <?php if(!empty($data_single->personal_image)){ ?>
        <img id="blah" src="<?php echo base_url(); ?>uploads/<?php echo @$data_single->personal_image; ?>" class="ks-avatar" width="100" height="100"> 
    <?php } else{ ?>
        <img id="blah" src="<?php echo base_url(); ?>assets/img/avatars/placeholders/ava-128.png" class="ks-avatar" width="100" height="100"> 
    <?php } ?>
        
        <label class="btn btn-primary ks-btn-file">
                <span class="la la-cloud-upload ks-icon"></span>                    
                <input onchange="readURLprofile(this, 'general_edit')" type="file" name="image" id="image">
        </label> 
        
        <p><?php echo @$data_single->first_name . ' ' . @$data_single->middle_name . ' ' . @$data_single->last_name; ?><br>
            <small><?php echo @$emp_designation->designation_name; ?></small></p>
        <p>Employee#: <b><?php echo @$data_single->employee_no; ?></b></p>
        <p>RF No#: <b><?php echo @$data_single->rf_no; ?></b></p>
        </div>
                        
                        
    <div class="employee-avatar new d-none">
    <div class="profile-img">
        
    </div>
<!--    <div class="ks-info mt-0">
        
        <div class="ks-manage-avatar-body-controls mt-2">
            <div class="custom-file replaceCustomFile">
                <input onchange="readURLprofile(this, 'general_edit')" type="file" class="custom-file-input " name="image" id="image">
                <label class="custom-file-label btn-primary" style="color:#fff;line-height: 26px;" for="inputGroupFile04">Upload Image</label>
            </div>
        </div>
    </div>-->
</div>    
    
    
    
    <ul class="nav nav-pills nav-stacked" style="border-radius: 0 0 3px 3px">
       
            
        <li class="nav-item">
            <a class="nav-link active" id="pills-overview-tab" data-toggle="pill" href="#pills-overview" role="tab" aria-controls="pills-overview" aria-selected="true">Overview</a>
        </li>
         <?php
            if($this->session->userdata('type')=='management')
            {
                ?>
        <li class="nav-item">
            <a class="nav-link" id="pills-general-tab" data-toggle="pill" href="#pills-general" role="tab" aria-controls="pills-general" aria-selected="false">General</a>
        </li>
      <!-- <li class="nav-item">
            <a class="nav-link" id="pills-experience-tab" data-toggle="pill" href="#pills-experience" role="tab" aria-controls="pills-experience" aria-selected="false">Experience & Qualification</a>
        </li>-->

        <li class="nav-item">
            <a class="nav-link" id="pills-salary-tab2" data-toggle="pill" href="#pills-salary2" role="tab" aria-controls="pills-salary2" aria-selected="false">Salary</a>
        </li>
        <!--<li class="nav-item">
            <a class="nav-link" id="pills-passport-tab" data-toggle="pill" href="#pills-passport" role="tab" aria-controls="pills-passport" aria-selected="false">Passport / Visa</a>
        </li>-->
        <li class="nav-item">
            <a class="nav-link" id="pills-benefits-tab" data-toggle="pill" href="#pills-benefits" role="tab" aria-controls="pills-benefits" aria-selected="false">Benefits</a>
        </li>
        <?php
            }
        ?>
        <li class="nav-item">
            <a class="nav-link" id="pills-leave-tab" data-toggle="pill" href="#pills-leave-application" role="tab" aria-controls="pills-leave-application" aria-selected="false">Leave Application</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="pill" href="#tab-attendance">Attendance</a>
        </li>
        <?php
                                                 if($this->session->userdata('type')=='management')
                                                 {
                                                ?>
        <!--<li class="nav-item">
            <a class="nav-link" id="pills-expenses-tab" data-toggle="pill" href="#pills-expenses" role="tab" aria-controls="pills-expenses" aria-selected="false">Full Expenses</a>
        </li>-->
        <li class="nav-item">
            <a class="nav-link" id="pills-bank-tab" data-toggle="pill" href="#pills-bank" role="tab" aria-controls="pills-bank" aria-selected="false">Bank Details</a>
        </li>
        <?php
                                                 }
                                                 ?>
        <li class="nav-item">
            <a class="nav-link" id="pills-loans-tab" data-toggle="pill" href="#pills-loans" role="tab" aria-controls="pills-loans" aria-selected="false">Loans</a>
        </li>
       <!-- <li class="nav-item">
            <a class="nav-link" id="pills-warnings-tab" data-toggle="pill" href="#pills-warnings" role="tab" aria-controls="pills-warnings" aria-selected="false">Warnings & Evaluation</a>
        </li>-->
      <!--  <li class="nav-item">
            <a class="nav-link" id="pills-complaints-tab" data-toggle="pill" href="#pills-complaints" role="tab" aria-controls="pills-complaints" aria-selected="false">Complaints</a>
        </li>-->
        <li class="nav-item">
            <a class="nav-link" id="pills-closure-tab" data-toggle="pill" href="#pills-closure" role="tab" aria-controls="pills-closure" aria-selected="false">Closure</a>
        </li>
    </ul>
</div>
    <div class="ks-settings-form-wrapper">
    <!-- ks-uppercase ks-light -->
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade p-0 show active" id="pills-overview" role="tabpanel" aria-labelledby="pills-overview-tab">
                <div class="ks-widgets ks-widgets-overview">
                    <div class="row">
                        <div class="col-sm-6 col-xl-4">
                            <div class="card text-white bg-primary panel panel-default ks-solid ks-widget ks-widget-info mb-4">
                                <h5 class="card-header">About</h5>
                                <div class="card-block">
                                    <div class="ks-item">
                                        <span>Employee ID</span>
                                        <span><?php echo @$data_single->employee_no; ?></span>
                                    </div>
                                    <div class="ks-item">
                                        <span>Joining Date</span>
                                        <span><?php echo date("d M-Y", strtotime(@$data_single->hire_date)); ?></span>
                                    </div>
                                    <div class="ks-item">
                                        <span>Birthday</span>
                                        <span><?php echo date("d M-Y", strtotime(@$data_single->dob)); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <div class="card text-white bg-success panel panel-default ks-solid ks-widget ks-widget-tags mb-4">
                                <h5 class="card-header">Skills</h5>
                                <div class="card-block">
                                    
                                     <?php
                                     
                                   if(!empty($data_qualification->skill_details))
                                   {
                                       $all_skill2=  explode(',', @$data_qualification->skill_details);
                                       foreach ($all_skill2 as $value) {
                                      
                                    $name=  $this->EmployeesModel->skill_name($value);
                                  //  echo $data_qualification->skill_details;exit;
                                    ?>
                                    
                                    <span class="badge badge-pill badge-default-outline"><?php echo @$name->skill_name;  ?></span>
                                    <?php
                                       }
                                       }
                                       ?>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <div class="card text-white bg-danger panel panel-default ks-solid ks-widget ks-widget-contact-info mb-4">
                                <h5 class="card-header">Contact Info</h5>
                                <div class="card-block">
                                    <table class="ks-table-description">
                                        <tr>
                                            <td class="ks-icon" valign="top">
                                                <span class="la la-map-marker"></span>
                                            </td>
                                            <td class="ks-text">
                                               <?php echo @$data_single->contact_address; ?> <br>
                                               <?php echo @$data_single->contact_city; ?><br>
                                               <?php echo @$data_single->contact_country; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="ks-icon ks-fs-16">
                                                <span class="la la-phone"></span>
                                            </td>
                                            <td class="ks-text">
                                               <?php echo @$data_single->contact_phone; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="ks-icon">
                                                <span class="la la-mobile-phone"></span>
                                            </td>
                                            <td class="ks-text">
                                                <?php echo @$data_single->contact_mobile; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="ks-icon ks-fs-14">
                                                <span class="la la-envelope"></span>
                                            </td>
                                            <td class="ks-text">
                                                <a href="#" title="<?php echo @$data_single->contact_email; ?>" data-toggle="tooltip" data-placement="left"><?php echo @$data_single->contact_email; ?></a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <div class="card text-white bg-dark panel panel-default ks-solid ks-widget ks-widget-info mb-4">
                                <h5 class="card-header">Attandance</h5>
                                <div class="card-block">
                                    <div class="ks-item">
                                        <span>Full Attandance</span>
                                        <span><?php echo count($att_full); ?> Days</span>
                                    </div>
                                    <div class="ks-item">
                                        <span>Half Attandance</span>
                                        <span><?php echo count($att_half); ?>  Days</span>
                                    </div>
                                    <div class="ks-item">
                                        <span>Over Time Attandance</span>
                                        <span><?php echo count($att_overtime); ?>  Days</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <div class="card text-white bg-info panel panel-default ks-solid ks-widget ks-widget-info mb-4">
                                <h5 class="card-header">Leave</h5>
                                <div class="card-block">
                                     <?php
                                                    if(!empty($all_employee_leave_total))
                                                    {
                                                    foreach ($all_employee_leave_total as $value) {
                                                        ?>
                                    <div class="ks-item">
                                        <span><?php echo @$value->rule_name; ?></span>
                                        <span><?php echo @$value->total_leave; ?></span>
                                    </div>
                                    <?php
                                                    }
                                                    }
                                                    ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <div class="card text-white bg-warning panel panel-default ks-solid ks-widget ks-widget-info mb-4">
                                <h5 class="card-header">Experience & Qualification</h5>
                                <div class="card-block">
                                    <div class="ks-item">
                                        <span>Highest Qualification</span>
                                       
                                    </div>
                                     <span>
                                          <?php
                                   if(!empty($all_qualification))
                                   {
                                       foreach ($all_qualification as $value) {
                                      
                                          if(@$data_qualification->highest_qualification==@$value->id) 
  {
   echo @$value->level_name;
  }
                                           
                                    ?>
                             </span>       
                                    
                                   

                                   <?php
                                       }
                                    }
                                    ?>
                                    
                                    

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade p-0" id="pills-general" role="tabpanel" aria-labelledby="pills-general-tab">
            	
                
                <input type="hidden" name="imagenew" id="imagenew" value="<?php echo @$data_single->personal_image; ?>"> 
                    <div class="form-box">
                	<h6 class="form-box-heading">Basic Details</h6>
                    <div class="row">
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">First Name</label>
                                <input type="text" placeholder="Enter first name" class="form-control inputDisabled" name='first_name' required id='first_name' value="<?php echo @$data_single->first_name; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Middle Name</label>                                
                                        <input type="text" name='middle_name'  id='middle_name' value="<?php echo @$data_single->middle_name; ?>" placeholder="Middle Name"  class="form-control">
                                </div>
                            </div>
                        
                        <div class="col-sm-6 col-xl-4">
                        <div class="form-group">
                                <label for="" class="form-control-label">Last Name</label>                                
                                        <input type="text" name='last_name'  id='last_name' value="<?php echo @$data_single->last_name; ?>" placeholder="Last name" class="form-control">
                                    
                            </div>    
                        </div>
                           <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Category</label>
                                <select name='employee_category' required id='employee_category' class="form-control inputDisabled" >
                                    <option value="">Please select</option>
                                    <option value="Employee" <?php if(@$data_single->employee_category=='Employee'){ ?> selected="selected" <?php } ?>>Employee</option>
                                    <option value="Labor" <?php if(@$data_single->employee_category=='Labor'){ ?> selected="selected" <?php } ?>>Labor</option>
                                </select>
                            </div>
                        </div>
                         <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label class="d-block">Gender</label>
                                <div class="d-inline-block mt-2">
                                    <div class="custom-control custom-radio ks-radio ks-info">
                                        <input id="r3" type="radio" class="custom-control-input inputDisabled " value="Male"   name='gender'  id='gender'  <?php if(@$data_single->gender=='Male'){ ?> checked="checked" <?php } ?> 
                                               data-validation="radio_group"
                                               data-validation-qty="min1">
                                        <label class="custom-control-label" for="r3">Male</label>
                                    </div>
                                </div>
                                <div class="d-inline-block mt-2 ml-3">
                                    <div class="custom-control custom-radio ks-radio ks-purple">
                                        <input id="r4" type="radio" class="custom-control-input inputDisabled" value="Female"  name='gender'  id='gender' <?php if(@$data_single->gender=='Female'){ ?> checked="checked" <?php } ?> 
                                               data-validation="radio_group"
                                               data-validation-qty="min1">
                                        <label class="custom-control-label" for="r4">Female</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--<div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Title</label>
                                <input type="text" placeholder="Enter title" class="form-control inputDisabled" name='employee_title'  id='employee_title' value="<?php echo @$data_single->employee_title; ?>" >
                            </div>
                        </div>-->
                        
                        
                        
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Birth Date</label>
                                <input type="text" placeholder="Enter date" class="form-control inputDisabled flatpickrDate" name='dob'  id='dob' value="<?php echo @$data_single->dob; ?>">
                            </div>
                        </div>
                        
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Religion</label>
                                <input type="text" placeholder="Enter relegion" class="form-control inputDisabled" value="<?php echo @$data_single->religion; ?>" name='religion' id='religion'>
                            </div>
                        </div>

                    
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Joining Date</label>
                                <input type="text" placeholder="Select date" class="form-control ks-daterange-single inputDisabled flatpickrDate" name='hire_date' required id='hire_date' value="<?php echo @$data_single->hire_date; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Status</label>
                                <select name='status' required id='status' class="form-control inputDisabled">
                           <!--<option value="On Service">On Service</option>
                          <option value="On Vacation" <?php if(@$data_single->status=='On Vacation'){ ?> selected="selected" <?php } ?> >On Vacation</option>
                          <option value="On Leave" <?php if(@$data_single->status=='On Leave'){ ?> selected="selected" <?php } ?> >On Leave</option>
                          <option value="Dispute" <?php if(@$data_single->status=='Dispute'){ ?> selected="selected" <?php } ?> >Dispute</option>-->
                           <option value="Trainee" <?php if(@$data_single->status=='Trainee'){ ?> selected="selected" <?php } ?>>Trainee</option>
                          <option value="Provisional" <?php if(@$data_single->status=='Provisional'){ ?> selected="selected" <?php } ?> >Provisional</option>
                          <option value="Contractual" <?php if(@$data_single->status=='Contractual'){ ?> selected="selected" <?php } ?> >Contractual</option>
                          <option value="Permanent" <?php if(@$data_single->status=='Permanent'){ ?> selected="selected" <?php } ?> >Permanent</option>
                                </select>
                            </div>
                        </div>
                    
                        
                    </div>
               
                </div>
                
                <div class="form-box">
                	<h6 class="form-box-heading">Family Details</h6>
                    <div class="row">
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Father's Name</label>
                                <input type="text" placeholder="Enter father's name" class="form-control inputDisabled" name='father_name'  id='father_name' value="<?php echo @$data_single->father_name; ?>" >
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Mother's Name</label>
                                <input type="text" placeholder="Enter mother's name" class="form-control inputDisabled" name='mother_name'  id='mother_name' value="<?php echo @$data_single->mother_name; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Spouse Name (if married)</label>
                                <input type="text" placeholder="Enter spouce name" class="form-control inputDisabled" name='spouse_name'  id='spouse_name' value="<?php echo @$data_single->spouse_name; ?>" >
                            </div>
                        </div>
                    
                        <div class="col-sm-6 col-xl-5">
                            <div class="form-group">
                                <label class="d-block">Marital Status</label>
                                <div class="d-inline-block mt-2">
                                    <div class="custom-control custom-radio ks-radio ks-primary">
                                        <input id="r1" type="radio" class="custom-control-input inputDisabled" <?php if(@$data_single->marital_status=='Married'){ ?> checked="checked" <?php } ?> name='marital_status'  id='marital_status' value="Married"
                                               data-validation="radio_group"
                                               data-validation-qty="min1">
                                        <label class="custom-control-label" for="r1">Married</label>
                                    </div>
                                </div>
                                <div class="d-inline-block mt-2 ml-3">
                                    <div class="custom-control custom-radio ks-radio ks-primary">
                                        <input id="r2" type="radio" class="custom-control-input inputDisabled"  name='marital_status'  id='marital_status' <?php if(@$data_single->marital_status=='Unmarried'){ ?> checked="checked" <?php } ?> value="Unmarried"
                                               data-validation="radio_group"
                                               data-validation-qty="min1">
                                        <label class="custom-control-label" for="r2">Unmarried</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                      
                       
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">No. of Children</label>
                                <input type="text" placeholder="Enter number of children" class="form-control inputDisabled" name='no_of_children'  id='no_of_children' value="<?php echo @$data_single->no_of_children; ?>" >
                            </div>
                        </div>
                    
                    </div>
                </div>

                <div class="form-box">
                	<h6 class="form-box-heading">Present Address</h6>
                    <div class="row">
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Address 1</label>
                                <input type="text" placeholder="Enter address" class="form-control inputDisabled" value="<?php echo @$data_single->contact_address; ?>" name='contact_address'  id='contact_address' >
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">City</label>
                                <input type="text" placeholder="Enter city" class="form-control inputDisabled"  name='contact_city'  id='contact_city' value="<?php echo @$data_single->contact_city; ?>" >
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Country</label>
                                <select  name='contact_country'  id='contact_country' class="form-control inputDisabled">
                                   <option value="">Please select</option>
                                   
                                   
                                   <option value="">Please select</option>
                                        <?php
                                         foreach ($country as $value) {
                                             
                                         
                                        ?>
                                        <option value="<?php echo @$value->country_name; ?>" <?php if(@$data_single->contact_country==$value->country_name){ ?> selected="selected" <?php } ?> ><?php echo @$value->country_name; ?></option>
                                        <?php
                                         }
                                      ?>
                                   
                                                           
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Telephone No.</label>
                                <input type="text" placeholder="Enter telephone number" class="form-control inputDisabled" value="<?php echo @$data_single->contact_phone; ?>" name='contact_phone'  id='contact_phone'>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Mobile No.</label>
                                <input type="text" placeholder="Enter mobile number" class="form-control inputDisabled" value="<?php echo @$data_single->contact_mobile; ?>" name='contact_mobile'  id='contact_mobile'>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Email/Login Email</label>
                                <input type="text" placeholder="Enter email" class="form-control inputDisabled" name='contact_email'  id='contact_email' value="<?php echo @$data_single->contact_email; ?>" >
                            </div>
                        </div>
                       <!-- <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Password</label>
                                    <input type="text" name='password'  id='password' placeholder="Password" value="<?php echo @$data_single->original_password; ?>" class="form-control">
                                </div>
                            </div>-->
                    </div>
                </div>

                <div class="form-box">
                	<h6 class="form-box-heading">Permanent Address</h6>
                    <div class="row">
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Address 1</label>
                                <input type="text" placeholder="Enter address" class="form-control inputDisabled" name='home_address'  id='home_address' value="<?php echo @$data_single->home_address; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">City</label>
                                <input type="text" placeholder="Enter city" class="form-control inputDisabled" name='home_city'  id='home_city' value="<?php echo @$data_single->home_city; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Country</label>
                                <select name='home_country'  id='home_country' class="form-control inputDisabled">
                                    <option value="">Please select</option>
                                    
                                      <?php
                                         foreach ($country as $value) {
                                             
                                         
                                        ?>
                                        <option value="<?php echo @$value->country_name; ?>" <?php if(@$data_single->home_country==$value->country_name){ ?> selected="selected" <?php } ?> ><?php echo @$value->country_name; ?></option>
                                        <?php
                                         }
                                      ?>
                                    
                                                          
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Telephone No.</label>
                                <input type="text" placeholder="Enter telephone number" class="form-control inputDisabled" value="<?php echo @$data_single->home_phone; ?>" name='home_phone'  id='home_phone'>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Mobile No.</label>
                                <input type="text" placeholder="Enter mobile number" class="form-control inputDisabled" value="<?php echo @$data_single->home_mobile; ?>" name='home_mobile' id='home_mobile'>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Email</label>
                                <input type="text" placeholder="Enter email" class="form-control inputDisabled" value="<?php echo @$data_single->home_email; ?>" name='home_email' id='home_email'>
                            </div>
                        </div>
                    </div>
                </div>


                 <div class="form-box">
                    <h6 class="form-box-heading">Official Details</h6>
                    <div class="row">
                          <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Employee No.</label>
                                <input type="text" placeholder="Enter employee number" class="form-control inputDisabled" name='employee_no' id='employee_no' onkeyup="checkEmployeeno('<?php echo (isset($data_single->id) ? $data_single->id : ''); ?>');" value="<?php echo @$data_single->employee_no; ?>" >
                            </div>
                            <span style="color: red;" id="emp_no_err"></span>
                        </div>
                          <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">RF No.</label>
                                <input type="text" placeholder="Enter RF number" class="form-control inputDisabled" name='rf_no' id='rf_no' onkeyup="checkRFno('<?php echo (isset($data_single->id) ? $data_single->id : ''); ?>');" value="<?php echo @$data_single->rf_no; ?>" >
                            </div>
                            <span style="color: red;" id="rf_no_err"></span>
                        </div>
                      <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">File No.</label>
                                <input type="text" placeholder="Enter file number" class="form-control inputDisabled" name='file_no' id='file_no' value="<?php echo @$data_single->file_no; ?>">
                            </div>
                        </div>
                          <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Voter Card No.</label>
                                    <input type="text" name='voter_card'  id='voter_card' placeholder="Enter Voter Card No" class="form-control" value="<?php echo @$data_single->voter_card; ?>">
                                </div>
                            </div>
                              <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Aadhar Card No.</label>
                                    <input type="text" name='aadhar_card' value="<?php echo @$data_single->aadhar_card; ?>" id='aadhar_card'  placeholder="Enter Aadhar Card No" class="form-control">
                                </div>
                            </div>

                             <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Pan Card No.</label>
                                    <input type="text" name='pan_card' value="<?php echo @$data_single->pan_card; ?>" id='pan_card'  placeholder="Enter Pan Card No" class="form-control">
                                </div>
                            </div>
                        
                        
                            <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Grade</label>
                                <select id="grade" name="grade" class="form-control">
                                <option>Select</option>
                                <?php
                              if (!empty($all_grade)) {
                                foreach ($all_grade as $grade) {
                              ?>
                              <option value="<?php echo $grade->id; ?>" <?php echo ((isset($data_single->grade) && ($data_single->grade==$grade->id)) ? 'selected' : ''); ?>><?php echo $grade->grade_name; ?></option>
                              <?php } } ?>
                            </select>
                            </div>
                        </div>

                    
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Department</label>
                                <!-- <input type="text" placeholder="Enter department" class="form-control inputDisabled" name='department' required id='department' value="<?php echo @$data_single->department; ?>" > -->


                                <select id="department" name="department" class="form-control">
                                <option>Select</option>
                                <?php
                              if (!empty($all_department)) {
                                foreach ($all_department as $department) {
                              ?>
                              <option value="<?php echo $department->id; ?>" <?php echo ((isset($data_single->department) && ($data_single->department==$department->id)) ? 'selected' : ''); ?>><?php echo $department->department_name; ?></option>
                              <?php } } ?>
                            </select>


                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Designation</label>
                                <!-- <input type="text" placeholder="Enter designation" class="form-control inputDisabled" name='designation' required id='designation' value="<?php echo @$data_single->designation; ?>"> -->
                                <select id="designation" name="designation" class="form-control">
                                <option>Select</option>
                                <?php
                              if (!empty($all_designation)) {
                                foreach ($all_designation as $designation) {
                              ?>
                              <option value="<?php echo $designation->id; ?>" <?php echo ((isset($data_single->designation) && ($data_single->designation==$designation->id)) ? 'selected' : ''); ?>><?php echo $designation->designation_name; ?></option>
                              <?php } } ?>
                            </select>
                            </div>
                        </div>
                         <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Default Workshift</label>
                                <select id="work_shift_id" name="work_shift_id" class="form-control">
                                <?php
                              if (!empty($defaultshift)) {
                                foreach ($defaultshift as $shift) {
                              ?>
                              <option value="<?php echo $shift->id; ?>" <?php echo ((isset($data_single->work_shift_id) && ($data_single->work_shift_id == $shift->id)) ? 'selected' : ''); ?>><?php echo $shift->work_shift_name; ?></option>
                              <?php } } ?>
                            </select>
                            </div>
                        </div>
                             <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Date Discontinued</label>
                                <input type="text" placeholder="Select date" class="form-control ks-daterange-single inputDisabled flatpickrDate" name='discontinued_date' id='discontinued_date' value="<?php echo @$data_single->discontinued_date; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                     <input type="checkbox" class="form-group" <?php if(!empty($data_single->wfh) && $data_single->wfh == '1'){ echo 'checked';} else { echo '';} ?> name="enable_wfh" id="enable_wfh" value="0">  
                                     <label for="" class="form-control-label">Enable Work From Home</label>
                                  
                                </div>
                            </div>
                       <!-- <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Gratuity Start Date</label>
                                <input type="text" placeholder="Select date" class="form-control ks-daterange-single inputDisabled flatpickrDate" name='gratuity_start_date'  id='gratuity_start_date' value="<?php echo @$data_single->gratuity_start_date; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Gratuity Amount (up-to-date)</label>
                                <input type="text" placeholder="Enter amount" class="form-control inputDisabled" name='gratuity_amount'  id='gratuity_amount' value="<?php echo @$data_single->gratuity_amount; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">PRO Name</label>
                                <input type="text" placeholder="Enter PRO Name" class="form-control inputDisabled" name='pro_name'  id='pro_name' value="<?php echo @$data_single->pro_name; ?>">
                            </div>
                        </div>
                    
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Leave Per Month</label>
                                <input type="text" placeholder="Enter leave per month" class="form-control inputDisabled" name='leave_per_month'  id='leave_per_month' value="<?php echo @$data_single->leave_per_month; ?>" >
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Next Leave Due Date</label>
                                <input type="text" placeholder="Select date" class="form-control ks-daterange-single inputDisabled flatpickrDate" name='next_leave_due_date' id='next_leave_due_date' value="<?php echo @$data_single->next_leave_due_date; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Increment Due Date</label>
                                <input type="text" placeholder="Select date" class="form-control ks-daterange-single inputDisabled flatpickrDate" name='increment_due_date'  id='increment_due_date' value="<?php echo @$data_single->increment_due_date; ?>" >
                            </div>
                        </div>-->

                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Reporting Manager</label>

                                <select id="reporting_manager" name="reporting_manager" class="form-control" onchange="getSubordinate(this.value,'<?php echo @$data_single->id; ?>');">
                                <option>Select</option>
                                <?php
                              if (!empty($all_manager)) {
                                foreach ($all_manager as $manager) {
                              ?>
                              <option value="<?php echo $manager->id; ?>" <?php echo ((isset($data_single->reporting_manager) && ($data_single->reporting_manager==$manager->id)) ? 'selected' : ''); ?>><?php echo $manager->first_name.' '.$manager->middle_name.' '.$manager->last_name; ?></option>
                              <?php } } ?>
                            </select>

                            </div>
                        </div>

                        
                    
                    <div class="col-sm-6 col-xl-4">
                            <div class="form-group SubordinateDiv">
                                <label for="" class="form-control-label d-block">Subordinate</label>
                                <select id="subordinate" name="subordinate[]" class="form-control js-example-basic-multiple" multiple>
                                <option>Select</option>
                                <?php
                              if (!empty($all_subordinate)) {
                                foreach ($all_subordinate as $ordinate) {
                              ?>
                              <option value="<?php echo $ordinate->id; ?>" <?php echo ((isset($subordinate_arr) && (in_array($ordinate->id, $subordinate_arr))) ? 'selected' : ''); ?>><?php echo $ordinate->first_name.' '.$ordinate->middle_name.' '.$ordinate->last_name; ?></option>
                              <?php } } ?>
                            </select>

                            </div>
                        </div>

                        
                    
                        <div class="col-12">                            
                                <label for="" class="form-control-label">Note</label>
                                <textarea placeholder="Enter note" class="form-control inputDisabled" name='note'  id='note' rows="4"><?php echo @$data_single->note; ?></textarea>                            
                        </div>              
                                                          
                  </div>
                </div>


               <!-- <div class="form-box">
                    <h6 class="form-box-heading">Opening Leave</h6>
                    <div class="row">
                        <table width="100%">
                            <thead>
                            <tr>
                                <th width="50%"> <label for="" class="form-control-label">Leave Type</label></th>
                                <th width="40%"><label for="" class="form-control-label">Opening Balance</label></th>
                                <th width="10%"></th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php 
                                //echo count($opening_leave);
                                $sl = 1;
                                if(!empty($opening_leave)) {
                                          foreach ($opening_leave as $valueopening) {
                                            ?>
                                
                                <tr>
                                    <td><div class="form-group">
                                   
                                    <select name="leavetype[]" id="leavetype"  class="form-control">
                                        <option value="">Please select</option>
                                        <?php
                                   if(!empty($all_leaves))
                                   {
                                       foreach ($all_leaves as $value) {
                                         
                                    ?>
                                   
                                    <option value="<?php echo @$value->id;?>" <?php if(@$valueopening->leave_id==@$value->id) {  ?> selected="selected" <?php } ?> ><?php echo @$value->rule_name;?></option>
                                   <?php
                                       }
                                    }
                                    ?>
                                    </select>
                                </div>
</td>
                                    <td><div class="form-group"> <input type="text" placeholder="Enter opening balance" class="form-control" value="<?php echo @$valueopening->opening_balance;?>" name="opening_balance[]" id="opening_balance"></div></td>
                                    <td><?php if($sl == count($opening_leave)){ ?> <label><a href="javascript:void(0)" class="text-primary" onclick="get_div();">Add </a></label> <?php } ?></td>
                                </tr>
                            <?php $sl++; }  }else { ?>
                                 <tr>
                                    <td><div class="form-group">
                                   
                                    <select name="leavetype[]" id="leavetype"  class="form-control">
                                        <option value="">Please select</option>
                                        <?php
                                   if(!empty($all_leaves))
                                   {
                                       foreach ($all_leaves as $value) {
                                         
                                    ?>
                                   
                                    <option value="<?php echo @$value->id;?>" <?php if(@$valueopening->leave_id==@$value->id) {  ?> selected="selected" <?php } ?> ><?php echo @$value->rule_name;?></option>
                                   <?php
                                       }
                                    }
                                    ?>
                                    </select>
                                </div>
</td>
                                    <td><div class="form-group"> <input type="text" placeholder="Enter opening balance" class="form-control" value="<?php echo @$valueopening->opening_balance;?>" name="opening_balance[]" id="opening_balance"></div></td>
                                    <td> <label><a href="javascript:void(0)" class="text-primary" onclick="get_div();">Add</a></label></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tbody id="add_leaves"></tbody>
                        </table>
                          
                  </div>
                </div>-->

               <!-- <div class="form-box">
                    <h6 class="form-box-heading">Experience & Qualification</h6>
                    <div class="row">

                           <div class="col-sm-4 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Highest Qualification</label>
                                    <select name="highest_qualification" id="highest_qualification"  class="form-control">
                                        <option value="">Please select</option>
                                        <?php
                                   if(!empty($all_qualification))
                                   {
                                       foreach ($all_qualification as $value) {
                                         
                                    ?>
                                   
                                    <option value="<?php echo @$value->id;?>" <?php if(@$data_qualification->highest_qualification==@$value->id) {  ?> selected="selected" <?php } ?> ><?php echo @$value->level_name;?></option>
                                   <?php
                                       }
                                    }
                                    ?>
                                    </select>
                                </div>
                            </div>

                             <div class="col-sm-4 col-xl-8">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Skill</label>
                                    <select name="skill_details[]" multiple id="skill_details" class="form-control js-example-basic-multiple">
                                        <option value="">Please select</option>
                                       <?php
                                   if(!empty($all_skill))
                                   {
                                       foreach ($all_skill as $value) {
                                      $all_skill4=  explode(',', @$data_qualification->skill_details);

                                    ?>
                                   
                                    <option value="<?php echo @$value->id;?>" <?php if (in_array(@$value->id, $all_skill4)) { echo 'selected';} ?>  ><?php echo @$value->skill_name;?></option>
                                   <?php
                                       }
                                    }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Upload CV</label>
                                    <div class="input-group">
                                        <div class="custom-file replaceCustomFile" >
                                            <input type="file" class="custom-file-input" name="cv" id="cv" >
                                            <label class="custom-file-label" for="cv">Upload</label>
                                        </div>
                                        <div class="input-group-append">
                                            <a href="<?php echo base_url(); ?>uploads/<?php echo @$data_qualification->cv; ?>" class="btn btn-outline-secondary" type="button" title="View" target="_blank"><span class="la la-eye ks-icon ml-2"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                     
                  </div>
                </div>-->
                <div class="form-box">
                    <h6 class="form-box-heading">Work Experience</h6>
                    <div class="row">
                          <div class="col-sm-6 col-xl-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Company</label>
                                    <input type="text" placeholder="Enter Company" class="form-control inputDisabled" value="<?php echo @$experience->Company;?>" name="Company" id="Company" >
                                </div>
                            </div>
                             <div class="col-sm-6 col-xl-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Job Title</label>
                                    <input type="text" placeholder="Enter Job Title" class="form-control inputDisabled" value="<?php echo @$experience->job_title;?>" name="job_title" id="job_title">
                                </div>
                            </div>
                             <div class="col-sm-6 col-xl-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label">From</label>
                                    <input type="text" name='from_date' id='from_date' placeholder="Enter From Date" class="form-control flatpickrDate">
                                </div>
                            </div>
                             <div class="col-sm-6 col-xl-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label">To</label>
                                    <input type="text" name='to_date' id='to_date' placeholder="Enter To Date" class="form-control flatpickrDate">
                                </div>
                            </div>
                             <div class="col-sm-6 col-xl-3">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Upload</label>
                                    <div class="input-group">
                                        <div class="custom-file replaceCustomFile" >
                                            <input type="file" class="custom-file-input" name="cv" id="cv" >
                                            <label class="custom-file-label" for="cv">Upload</label>
                                        </div>
                                        <!--<div class="input-group-append">
                                            <a href="<?php echo base_url(); ?>uploads/<?php echo @$data_qualification->cv; ?>" class="btn btn-outline-secondary" type="button" title="View" target="_blank"><span class="la la-eye ks-icon ml-2"></span></a>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                             <div class="col-sm-6 col-xl-1">
                            <div class="form-group">
                                <label for="" class="form-control-label">Action</label>
                                 <button type="button" name="submit_exp" id="submit_exp" class="btn btn-success">Add</button>
                            </div>
                        </div>
                   
                        <table id="" class="table table-bordered" >
                    <thead>
                       
                    <tr>
                        <th>Company</th>
                        <th>Job Title</th>
                        <th>From Date</th>
                        <th>To Date</th>
                        <th>Document</th>
                    </tr>
                    </thead>
                    <?php if(!empty($experience)){

                    foreach ($experience as $value) {
                    ?>
                    <tbody> 
                        <td><?=$value->company?></td>
                            <td><?=$value->job_title?></td>
                            <td><?=$value->from_date?></td>
                            <td><?=$value->to_date?></td>
                            <td><a href="<?=base_url()?>uploads/<?=$value->cv?>" target="_blank" tabindex="-1"><span class="ks-icon la la-la la-paperclip"></span></a></td>
                        </tbody>
                    <?php } } ?>
                    <tbody id="add_experience">
                       
                    </tbody>
                </table>
           
            
                    </div>
                </div>

                     <div class="form-box">
                    <h6 class="form-box-heading">Education</h6>
                    <div class="row">
                          <div class="col-sm-6 col-xl-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Level</label>
                                    <input type="text" placeholder="Enter Level" class="form-control inputDisabled" value="" name="Level" id="Level" >
                                </div>
                            </div>
                             <div class="col-sm-6 col-xl-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Institute</label>
                                    <input type="text" placeholder="Enter Institute" class="form-control inputDisabled" value="" name="Institute" id="Institute">
                                </div>
                            </div>
                            
                             <div class="col-sm-6 col-xl-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Year</label>
                                    <select name='year' id='year' class="form-control">
                                        <?php
                                        $currentYear = date('Y');
                                        foreach (range(1950, $currentYear) as $value) {
                                        echo "<option>" . $value . "</option > ";

                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                             <div class="col-sm-6 col-xl-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Marks(%)</label>
                                    <input type="number" name='marks' id='marks'  placeholder="Marks(%)" class="form-control">
                                </div>
                            </div>
                             <div class="col-sm-6 col-xl-3">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Upload</label>
                                    <div class="input-group">
                                        <div class="custom-file replaceCustomFile" >
                                            <input type="file" class="custom-file-input" name="document" id="document" >
                                            <label class="custom-file-label" for="document">Upload</label>
                                        </div>
                                        <!--<div class="input-group-append">
                                            <a href="<?php echo base_url(); ?>uploads/<?php echo @$data_qualification->cv; ?>" class="btn btn-outline-secondary" type="button" title="View" target="_blank"><span class="la la-eye ks-icon ml-2"></span></a>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                             <div class="col-sm-6 col-xl-1">
                            <div class="form-group">
                                <label for="" class="form-control-label">Action</label>
                                 <button type="button" name="submit_edu" id="submit_edu"  class="btn btn-success">Add</button>
                            </div>
                        </div>
                     
                        <table id="" class="table table-bordered" >
                    <thead>
                    <tr>
                        <th>Level</th>
                        <th>Institute</th>
                        <th>Year</th>
                        <th>Marks(%)</th>
                        <th>Document</th>
                    </tr>
                    </thead>
                     <?php if(!empty($educaton)){

                    foreach ($educaton as $value) {
                    ?>
                    <tbody>
                         <td><?=$value->level?></td>
                            <td><?=$value->institute?></td>
                            <td><?=$value->year?></td>
                            <td><?=$value->marks?></td>
                            <td><a href="<?=base_url()?>uploads/<?=$value->cv?>" target="_blank" tabindex="-1"><span class="ks-icon la la-la la-paperclip"></span></a></td>
                    </tbody>
                <?php } } ?>
                    <tbody id="add_education">
                       
                    </tbody>
                </table>
            
                    </div>
                </div>
             


                  <div class="form-box">
                    <h6 class="form-box-heading">Passport / Visa</h6>
                    <div class="row">
                         <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Passport No.</label>
                                    <input type="text" placeholder="Enter passport number" class="form-control inputDisabled" value="<?php echo @$passport_single->passport_no;?>" name="passport_no" id="passport_no" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Place of Issue</label>
                                    <input type="text" placeholder="Enter place of issue" class="form-control inputDisabled" value="<?php echo @$passport_single->passport_place_of_issue;?>" name="passport_place_of_issue" id="passport_place_of_issue">
                                </div>
                            </div>
                        
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Country</label>
                                    <select name="passport_country" id="passport_country" class="form-control inputDisabled">
                                       <option value="">Please select</option>
                                        <?php
                                         foreach ($country as $value) {
                                             
                                         
                                        ?>
                                        <option value="<?php echo @$value->country_name; ?>" <?php if(@$passport_single->passport_country==$value->country_name){ ?> selected="selected" <?php } ?> ><?php echo @$value->country_name; ?></option>
                                        <?php
                                         }
                                      ?>
                                       
                                                            
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Issue Date</label>
                                    <input type="text" placeholder="Select date" class="form-control ks-daterange-single flatpickrDate inputDisabled" value="<?php echo @$passport_single->passport_issue_date;?>" name="passport_issue_date" id="passport_issue_date">
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Expiry Date</label>
                                    <input type="text" placeholder="Select date" class="form-control ks-daterange-single flatpickrDate inputDisabled" value="<?php echo @$passport_single->passport_expiry_date;?>" name="passport_expiry_date" id="passport_expiry_date">
                                </div>
                            </div>
                        
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label class="d-block">Retained with Company</label>
                                    <div class="d-inline-block mt-2">
                                        <div class="custom-control custom-radio ks-radio ks-success">
                                            <input  type="radio" class="custom-control-input inputDisabled" <?php if(@$passport_single->retained_with_company=='Yes'){ ?> checked="checked" <?php } ?> name='retained_with_company'  id='retained_with_company' value="Yes"
                                                   data-validation="radio_group"
                                                   data-validation-qty="min1">
                                            <label class="custom-control-label" for="retained_with_company">Yes</label>
                                        </div>
                                    </div>
                                    <div class="d-inline-block mt-2 ml-3">
                                        <div class="custom-control custom-radio ks-radio ks-danger">
                                            <input  type="radio" class="custom-control-input inputDisabled"  <?php if(@$passport_single->retained_with_company=='No'){ ?> checked="checked" <?php } ?> name='retained_with_company'  id='retained_with_company1' value="No" 
                                                   data-validation="radio_group"
                                                   data-validation-qty="min1">
                                            <label class="custom-control-label" for="retained_with_company1">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6  col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Upload Passport (5 pages)</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control forCustomFile inputDisabled" style="display:none;" placeholder="Upload file" value="Passport Images">
                                        <div class="custom-file replaceCustomFile" style="">
                                            <input type="file" name="passport_image[]" multiple class="custom-file-input" id="passport_image">
                                            <label class="custom-file-label" for="passport_image">Upload</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#idPassport" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                        </div>
                                        <!-- Passport Modal -->
                                        <div class="modal fade" id="idPassport" tabindex="-1" role="dialog"aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Passport</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <?php
                                                            if(!empty($passport_single->passport_image))
                                                            {
                                                                $a=1;
                                                                $images=  explode(',', $passport_single->passport_image);
                                                                foreach ($images as $value) {
//$my_url = 'http://www.example.com/5478631';
//$ext =substr($value, strrpos($value, "." )+1)."\n";
$ext = pathinfo($value, PATHINFO_EXTENSION);
//echo $ext;exit;
if($ext=='jpg' || $ext=='jpeg' || $ext=='png' || $ext=='bmp' || $ext=='gif')
{
    

                                                            ?>
                                                            <strong>  <?php echo $a++; ?>)</strong> <a href="<?php echo base_url('employees_loanapplication_download/').@$value; ?>">    <img src="<?php echo base_url(); ?>uploads/<?php echo @$value; ?>" alt="" class="img-fluid"></a><br>
                                                           <?php
}
else
    {
    ?>

                                                  <strong>     <?php echo $a++; ?>)  </strong>   <a href="<?php echo base_url('employees_loanapplication_download/').@$value; ?>"> <?php echo @$value; ?> </a><br>
    <?php
    }
    ?>
                                                            <?php
                                                            }
                                                            }
                                                            ?>
                                                            
                                                            
                                                          
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

                  <div class="form-box">
                        <h6 class="form-box-heading">PF Details <input type="checkbox" class="form-group" name="pf_checkbox" id="pf_checkbox" <?php if(!empty($data_single_pf)){ ?> value="1" <?php }else{ ?> value="0" <?php } ?><?php if(!empty($data_single_pf)){ echo 'checked disabled';} else { echo '';} ?>></h6>
                         <?php if(!empty($data_single_pf)){ ?> <input type="hidden" name='pf_checkbox' id='pf_checkbox' value="1"> <?php } ?>
                        <div class="row" id="pf_div"  <?php if(!empty($data_single_pf)){ ?> style="" <?php }else{ ?> style="display: none;" <?php } ?> >
                             <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Employee PF No.</label>
                                    <input type="text" name='employee_pf_no' value="<?php echo @$data_single_pf->employee_pf_no; ?>" id='employee_pf_no' placeholder="Enter employee pf number" class="form-control">
                                </div>
                            </div>
                             <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">UAN No.</label>
                                    <input type="text" name='uan_no'  id='uan_no' value="<?php echo @$data_single_pf->uan_no; ?>" placeholder="Enter UAN number" class="form-control ">
                                </div>
                            </div>
                             <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">No.</label>
                                    <input type="text" name='emp_no'   id='emp_no' placeholder="Enter number"  value="<?php echo @$data_single_pf->no; ?>" class="form-control ">
                                </div>
                            </div>

                        </div>
                    </div>

                      <div class="form-box">
                        <h6 class="form-box-heading">ESI Details <input type="checkbox" class="form-group" name="esi_checkbox" id="esi_checkbox" <?php if(!empty($data_single_esi)){ ?> value="1" <?php }else{ ?> value="0" <?php } ?><?php if(!empty($data_single_esi)){ echo 'checked disabled';} else { echo '';} ?> ></h6>
                        <?php if(!empty($data_single_esi)){ ?> <input type="hidden" name='esi_checkbox' id='esi_checkbox' value="1"> <?php } ?>
                        <div class="row" id="esi_div" <?php if(!empty($data_single_esi)){ ?> style="" <?php }else{ ?> style="display: none;" <?php } ?> >
                             <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">ESI No.</label>
                                    <input type="text" name='esi_no' id='esi_no' value="<?php echo @$data_single_esi->esi_no; ?>" placeholder="Enter ESI number" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                     <div class="form-box">
                        <h6 class="form-box-heading">Ptax Details <input type="checkbox" class="form-group" name="ptax_checkbox" id="ptax_checkbox" <?php if(!empty($data_single_ptax)){ ?> value="1" <?php }else{ ?> value="0" <?php } ?><?php if(!empty($data_single_ptax)){ echo 'checked disabled';} else { echo '';} ?>></h6>
                         <?php if(!empty($data_single_ptax)){ ?> <input type="hidden" name='ptax_checkbox' id='ptax_checkbox' value="1"> <?php } ?>
                        <div class="row" id="ptax_div" <?php if(!empty($data_single_ptax)){ ?> style="" <?php }else{ ?> style="display: none;" <?php } ?>>
                             <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">PTAX No.</label>
                                    <input type="text" name='ptax_no'  id='ptax_no' value="<?php echo @$data_single_ptax->ptax_no; ?>" placeholder="Enter PTAX number" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                   
                

                <div class="form-group mt-3">
<!--                    <button type="btn" class="btn btn-primary edit-profile-btn">Edit</button>-->
                    <button type="submit" id="save" class="btn btn-success save-profile-btn">Update & Save</button>
                    <button type="reset" class="btn btn-outline-secondary ks-light reset-profile-btn" style="display: none;">Reset</button>
                </div>
</form>
            </div>
            
            <div class="tab-pane fade p-0" id="pills-experience" role="tabpanel" aria-labelledby="pills-experience-tab">
                <form  class="ks-form ks-settings-tab-form ks-general" method="post" action="<?php echo base_url('modify_employees_qualification/'.$id)?>" name="qualification_edit" id="qualification_edit" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id" value="<?php echo @$id;  ?>">
                  <div class="form-box">
                	<h6 class="form-box-heading">Experience & Qualification</h6>
                    
                        <script>
                           function changethediv(value){
                            if(value=='Engineer')
                            {
                              $('#engineer').show(); 
                               $('#pro').hide(); 
                                $('#safety').hide(); 
                                 $('#others').hide(); 
                            }  
                             if(value=='PRO')
                            {
                              $('#engineer').hide(); 
                               $('#pro').show(); 
                                $('#safety').hide(); 
                                 $('#others').hide(); 
                            }  
                             if(value=='Safety Officer')
                            {
                              $('#engineer').hide(); 
                               $('#pro').hide(); 
                                $('#safety').show(); 
                                 $('#others').hide(); 
                            }  
                             if(value=='Other')
                            {
                              $('#engineer').hide(); 
                               $('#pro').hide(); 
                                $('#safety').hide(); 
                                 $('#others').show(); 
                            }  
                               
                           } 
                            
                            
                            </script>
                    <div class="card-block p-0">
                        <div class="row">
                            <div class="col-sm-4 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Category</label>
                                    <select name="basic_category" id="basic_category" onchange="changethediv(this.value);"  class="form-control">
                                        <option value="">Please select</option>
                                        <option value="Engineer" <?php if(@$data_qualification->basic_category=='Engineer') {  ?> selected="selected" <?php } ?>>Engineer</option>
                                        <option value="PRO" <?php if(@$data_qualification->basic_category=='PRO') {  ?> selected="selected" <?php } ?>>PRO</option>
                                        <option value="Safety Officer" <?php if(@$data_qualification->basic_category=='Safety Officer') {  ?> selected="selected" <?php } ?>>Safety Officer</option>
                                        <option value="Other" <?php if(@$data_qualification->basic_category=='Other') {  ?> selected="selected" <?php } ?>>Other</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-sm-4 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Highest Qualification</label>
                                    <select name="highest_qualification" id="highest_qualification"  class="form-control">
                                        <option value="">Please select</option>
                                        <?php
                                   if(!empty($all_qualification))
                                   {
                                       foreach ($all_qualification as $value) {
                                         
                                    ?>
                                   
                                    <option value="<?php echo @$value->id;?>" <?php if(@$data_qualification->highest_qualification==@$value->id) {  ?> selected="selected" <?php } ?> ><?php echo @$value->level_name;?></option>
                                   <?php
                                       }
                                    }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <?php //echo "<pre>"; print_r($all_skill); die;?>
                            <div class="col-sm-4 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Skill</label>
                                    <select name="skill_details[]" multiple id="skill_details" class="form-control js-example-basic-multiple">
                                        <option value="">Please select</option>
                                       <?php
                                   if(!empty($all_skill))
                                   {
                                       foreach ($all_skill as $value) {
                                      $all_skill4=  explode(',', @$data_qualification->skill_details);

                                    ?>
                                   
                                    <option value="<?php echo @$value->id;?>" <?php if (in_array(@$value->id, $all_skill4)) { echo 'selected';} ?>  ><?php echo @$value->skill_name;?></option>
                                   <?php
                                       }
                                    }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                        <div style="display:none;" id="engineer">
                        <div class="row mt-2">
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">University Name</label>
                                    <input type="text" placeholder="Enter university name" class="form-control inputDisabled" name="university_name" id="university_name"  value="<?php echo @$data_qualification->university_name; ?>">
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Certificate Type</label>
                                    <select name="certificate_type" id="certificate_type"  class="form-control inputDisabled">
                                        <option value="">Please select</option>
                                        <?php
                                        
                                    if(!empty($data_certificate_type))
                                    {
                                       
                                         foreach($data_certificate_type as $value) {
                                         
                                     ?>
                                  
                                    <option value="<?php echo $value->id;?>"><?php echo @$value->type ;?></option>
                                    <?php
                                       }
                                     }
                                    ?>

                                    </select>
                                    <!-- <?php print_r(($data_certificate_type)); ?>
 -->



                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Year of Graduation</label>
                                    <input type="text" placeholder="Select date" class="form-control ks-daterange-single inputDisabled flatpickrDate" name="year_graduation" id="year_graduation"  value="<?php echo @$data_qualification->year_graduation; ?>">
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">No. of Years Experience</label>
                                    <input type="text" placeholder="Enter nuber of Years Experience" class="form-control inputDisabled" name="no_of_year_experience" id="no_of_year_experience"  value="<?php echo @$data_qualification->no_of_year_experience; ?>">
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">No. of Projects Executed</label>
                                    <input type="text" placeholder="Enter number of Projects Executed" class="form-control inputDisabled" name="no_of_project" id="no_of_project"  value="<?php echo @$data_qualification->no_of_project; ?>" >
                                </div>
                            </div>
                        </div>
                            <script>
                                function societyyesno(value){
                                   // alert(value);
                                  if(value=='Yes'){
                                   $('#socitynodiv').hide();   
                                    $('#socityyesdiv').show();     
                                  } 
                                  else{
                                       $('#socitynodiv').show();   
                                    $('#socityyesdiv').hide();
                                  }
                                    
                                }
                            </script>
                        <div class="row mt-2">
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label class="d-block">Society of Engineers</label>
                                    <div class="d-inline-block mt-2">
                                        <div class="custom-control custom-radio ks-radio ks-success">
                                            <input  type="radio" class="custom-control-input inputDisabled" onclick="societyyesno(this.value);" name="society_of_engineers" id="society_of_engineers" <?php if(@$data_qualification->society_of_engineers=='Yes') {  ?> checked="checked"  <?php } ?>   value="Yes"
                                                   data-validation="radio_group"
                                                   data-validation-qty="min1">
                                            <label class="custom-control-label" for="society_of_engineers">Yes</label>
                                        </div>
                                    </div>
                                    <div class="d-inline-block mt-2 ml-3">
                                        <div class="custom-control custom-radio ks-radio ks-danger">
                                            <input  type="radio" class="custom-control-input inputDisabled" name="society_of_engineers" onclick="societyyesno(this.value);" id="society_of_engineers1" <?php if(@$data_qualification->society_of_engineers=='No') {  ?> checked="checked"  <?php } ?>  value="No"
                                                   data-validation="radio_group"
                                                   data-validation-qty="min1">
                                            <label class="custom-control-label" for="society_of_engineers1">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div  id="socityyesdiv" <?php if(isset($data_qualification->society_of_engineers) && $data_qualification->society_of_engineers=='Yes'){ ?> style="display: block;" <?php }else{ ?> style="display: none;" <?php } ?>>
                        <div class="row mt-2">
                            <div class="col-sm-6 col-xl-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Expiry Date</label>
                                    <input type="text" placeholder="Select date" class="form-control ks-daterange-single inputDisabled flatpickrDate" name="society_expiry_date" id="society_expiry_date"  value="<?php echo @$data_qualification->society_expiry_date; ?>">
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Society Id Front</label>
                                    <div class="input-group">
<!--                                        <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" name="select" id="" required value="Society Id Front Image" >-->
                                        <div class="custom-file replaceCustomFile" >
                                            <input type="file" class="custom-file-input" name="society_id_front" id="society_id_front">
                                            <label class="custom-file-label" for="inputGroupFile01">Upload file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#society_id_front_modal" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                        </div>
                                        <!-- Society Id Front Modal -->
                                        <div class="modal fade" id="society_id_front_modal" tabindex="-1" role="dialog"aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Society Id Front</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <a href="<?php echo base_url('employees_loanapplication_download/').@$data_qualification->society_id_front; ?>">       <img src="<?php echo base_url(); ?>uploads/<?php echo @$data_qualification->society_id_front; ?>" alt="" class="img-fluid"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Society Id Back</label>
                                    <div class="input-group">
<!--                                        <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" value="Society Id Back Image">-->
                                        <div class="custom-file replaceCustomFile" >
                                            <input type="file" class="custom-file-input"  name="society_id_back" id="society_id_back">
                                            <label class="custom-file-label" for="inputGroupFile02">Upload file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#idBack1" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                        </div>
                                        <!-- Society Id Back Modal -->
                                        <div class="modal fade" id="idBack1" tabindex="-1" role="dialog"aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Society Id Back</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <a href="<?php echo base_url('employees_loanapplication_download/').@$data_qualification->society_id_back; ?>">        <img src="<?php echo base_url(); ?>uploads/<?php echo @$data_qualification->society_id_back; ?>" alt="" class="img-fluid"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Uploaded Date</label>
                                    <input type="text" placeholder="Select date" class="form-control ks-daterange-single inputDisabled flatpickrDate" value="<?php echo @$data_qualification->uploaded_date; ?>" name="uploaded_date" id="uploaded_date" >
                                </div>
                            </div>
                        </div>
                            </div>
                            <!-- <div style="display:none"  id="socitynodiv">
                                <div class="row">
                                <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Reminder Date</label>
                                    <input type="text" placeholder="Select date" class="form-control ks-daterange-single inputDisabled flatpickrDate" value="<?php echo @$data_qualification->society_reminder_date; ?>" name="society_reminder_date" id="society_reminder_date" >
                                </div>
                                    </div>
                            </div>
                                </div> -->
                        <script>
                                function dubaimunicipalityyesno(value){
                                   // alert(value);
                                  if(value=='Yes'){
                                   $('#dubaimunicipalitynodiv').hide();   
                                    $('#dubaimunicipalityyesdiv').show();     
                                  } 
                                  else{
                                       $('#dubaimunicipalitynodiv').show();   
                                    $('#dubaimunicipalityyesdiv').hide();
                                  }
                                    
                                }
                            </script>
                            
                        <div class="row mt-2">
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label class="d-block">Dubai Municipality</label>
                                    <div class="d-inline-block mt-2">
                                        <div class="custom-control custom-radio ks-radio ks-success">
                                            <input id="r7" type="radio" class="custom-control-input inputDisabled" onclick="dubaimunicipalityyesno(this.value);"  <?php if(@$data_qualification->dubai_municipality=='Yes') {  ?> checked="checked"  <?php } ?> name="dubai_municipality" id="dubai_municipality" value="Yes"  
                                                   data-validation="radio_group"
                                                   data-validation-qty="min1">
                                            <label class="custom-control-label" for="r7">Yes</label>
                                        </div>
                                    </div>
                                    <div class="d-inline-block mt-2 ml-3">
                                        <div class="custom-control custom-radio ks-radio ks-danger">
                                            <input id="r8" type="radio" class="custom-control-input inputDisabled" onclick="dubaimunicipalityyesno(this.value);" <?php if(@$data_qualification->dubai_municipality=='No') {  ?> checked="checked"  <?php } ?>  name="dubai_municipality" id="dubai_municipality" value="No"
                                                   data-validation="radio_group"
                                                   data-validation-qty="min1">
                                            <label class="custom-control-label" for="r8">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div id="dubaimunicipalityyesdiv" <?php if(isset($data_qualification->dubai_municipality) && $data_qualification->dubai_municipality=='Yes'){ ?> style="display: block;" <?php }else{ ?> style="display: none;" <?php } ?>>
                        <div class="row mt-2">
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Category</label>
                                    <select name="dubai_municipality_category" id="dubai_municipality_category"  class="form-control inputDisabled" >
                                        <option value="">Please select</option>
                                        <option value="Option 1" <?php if(@$data_qualification->dubai_municipality_category=='MBA') {  ?> selected="selected" <?php } ?>>Option 1</option>
                                        <option value="Option 2" <?php if(@$data_qualification->dubai_municipality_category=='MBA') {  ?> selected="selected" <?php } ?>>Option 2</option>
                                        <option value="Option 3" <?php if(@$data_qualification->dubai_municipality_category=='MBA') {  ?> selected="selected" <?php } ?>>Option 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Expiry Date</label>
                                    <input type="text" placeholder="Select date" class="form-control ks-daterange-single inputDisabled flatpickrDate" name="dubai_municipality_expiry_date" id="dubai_municipality_expiry_date" value="<?php echo @$data_qualification->dubai_municipality_expiry_date; ?>" >
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Municipality Id Front</label>
                                    <div class="input-group">
<!--                                        <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" value="Municipality Id Front Image" disabled="disabled">-->
                                        <div class="custom-file replaceCustomFile">
                                            <input type="file" class="custom-file-input" name="dubai_municipality_id_front" id="dubai_municipality_id_front">
                                            <label class="custom-file-label" for="inputGroupFile03">Upload file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#idFront2" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                        </div>
                                        <!-- Municipality Id Front Modal -->
                                        <div class="modal fade" id="idFront2" tabindex="-1" role="dialog"aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Municipality Id Front</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <a href="<?php echo base_url('employees_loanapplication_download/').@$data_qualification->dubai_municipality_id_front; ?>">         <img src="<?php echo base_url(); ?>uploads/<?php echo @$data_qualification->dubai_municipality_id_front; ?>" alt="" class="img-fluid"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Municipality Id Back</label>
                                    <div class="input-group">
<!--                                        <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" value="Society Id Back Image" disabled="disabled">-->
                                        <div class="custom-file replaceCustomFile">
                                            <input type="file" class="custom-file-input" name="dubai_municipality_id_back" id="dubai_municipality_id_back">
                                            <label class="custom-file-label" for="inputGroupFile04">Upload file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#dubai_municipality_id_back_modal" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                        </div>
                                        <!-- Municipality Id Back Modal -->
                                        <div class="modal fade" id="dubai_municipality_id_back_modal" tabindex="-1" role="dialog"aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Municipality Id Back</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <a href="<?php echo base_url('employees_loanapplication_download/').@$data_qualification->dubai_municipality_id_back; ?>">     <img src="<?php echo base_url(); ?>uploads/<?php echo @$data_qualification->dubai_municipality_id_back; ?>" alt="" class="img-fluid"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Uploaded Date</label>
                                    <input type="text" placeholder="Select date" class="form-control ks-daterange-single inputDisabled flatpickrDate" name="dubai_municipality_uploded_date" id="dubai_municipality_uploded_date"  value="<?php echo @$data_qualification->dubai_municipality_uploded_date; ?>" >
                                </div>
                            </div>
                        </div>
                            </div>
                            <!-- <div style="display:none"  id="dubaimunicipalitynodiv">
                                <div class="row">
                              <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Reminder Date</label>
                                    <input type="text" placeholder="Select date" class="form-control ks-daterange-single inputDisabled flatpickrDate" name="dubai_municipality_reminder_date" id="dubai_municipality_reminder_date"  value="<?php echo @$data_qualification->dubai_municipality_reminder_date; ?>" >
                                </div>
                            </div>  
                            </div>
                            </div> -->
                            
                            <script>
                                function trakheesyesno(value){
                                   // alert(value);
                                  if(value=='Yes'){
                                   $('#trakheesnodiv').hide();   
                                    $('#trakheesyesdiv').show();     
                                  } 
                                  else{
                                       $('#trakheesnodiv').show();   
                                    $('#trakheesyesdiv').hide();
                                  }
                                    
                                }
                            </script>
                        <div class="row mt-2">
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label class="d-block">Trakhees</label>
                                    <div class="d-inline-block mt-2">
                                        <div class="custom-control custom-radio ks-radio ks-success">
                                            <input id="r9" type="radio" class="custom-control-input inputDisabled" onclick="trakheesyesno(this.value)" name="trakhees" id="trakhees"  <?php if(@$data_qualification->trakhees=='Yes') {  ?> checked="checked"  <?php } ?>  value="Yes"
                                                   data-validation="radio_group"
                                                   data-validation-qty="min1">
                                            <label class="custom-control-label" for="r9">Yes</label>
                                        </div>
                                    </div>
                                    <div class="d-inline-block mt-2 ml-3">
                                        <div class="custom-control custom-radio ks-radio ks-danger">
                                            <input id="r10" type="radio" class="custom-control-input inputDisabled" onclick="trakheesyesno(this.value)" name="trakhees" id="trakhees" value="No" <?php if(@$data_qualification->trakhees=='No') {  ?> checked="checked"  <?php } ?> 
                                                   data-validation="radio_group"
                                                   data-validation-qty="min1">
                                            <label class="custom-control-label" for="r10">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div id="trakheesyesdiv" <?php if(isset($data_qualification->trakhees) && $data_qualification->trakhees=='Yes'){ ?> style="display: block;" <?php }else{ ?> style="display: none;" <?php } ?>>
                        <div class="row mt-2">
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">No. of Cards</label>
                                    <input type="text" placeholder="No. of Cards" class="form-control inputDisabled" name="trakhees_no_of_card" id="trakhees_no_of_card"  value="<?php echo @$data_qualification->trakhees_no_of_card; ?>" >
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">1st Card Color</label>
                                    <input type="text" placeholder="Card Color" class="form-control inputDisabled" name="trakhees_1st_card_color" id="trakhees_1st_card_color"  value="<?php echo @$data_qualification->trakhees_1st_card_color; ?>" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">1st Card Expiry Date</label>
                                    <input type="text" placeholder="Select date" class="form-control ks-daterange-single inputDisabled" name="trakhees_1st_card_expiry_date" id="trakhees_1st_card_expiry_date"  value="<?php echo @$data_qualification->trakhees_1st_card_expiry_date; ?>" >
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">1st Card Front</label>
                                    <div class="input-group">
<!--                                        <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" value="1st Card Front Image" disabled="disabled">-->
                                        <div class="custom-file replaceCustomFile" >
                                            <input type="file" class="custom-file-input" name="trakhees_1st_card_front" id="trakhees_1st_card_front" >
                                            <label class="custom-file-label" for="inputGroupFile05">Upload file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#trakhees_1st_card_front_modal" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                        </div>
                                        <!-- 1st Card Front Modal -->
                                        <div class="modal fade" id="trakhees_1st_card_front_modal" tabindex="-1" role="dialog"aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">1st Card Front</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <a href="<?php echo base_url('employees_loanapplication_download/').@$data_qualification->trakhees_1st_card_front; ?>">    <img src="<?php echo base_url(); ?>uploads/<?php echo @$data_qualification->trakhees_1st_card_front; ?>" alt="" class="img-fluid"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">1st Card Back</label>
                                    <div class="input-group">
<!--                                        <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" value="1st Card Id Back Image" disabled="disabled">-->
                                        <div class="custom-file replaceCustomFile" >
                                            <input type="file" class="custom-file-input" name="trakhees_1st_card_back" id="trakhees_1st_card_back" >
                                            <label class="custom-file-label" for="inputGroupFile06">Upload file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#trakhees_1st_card_back_modal" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                        </div>
                                        <!-- 1st Card Back Modal -->
                                        <div class="modal fade" id="trakhees_1st_card_back_modal" tabindex="-1" role="dialog"aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">1st Card Id Back</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <a href="<?php echo base_url('employees_loanapplication_download/').@$data_qualification->trakhees_1st_card_back; ?>">      <img src="<?php echo base_url(); ?>uploads/<?php echo @$data_qualification->trakhees_1st_card_back; ?>" alt="" class="img-fluid"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Uploaded Date</label>
                                    <input type="text" placeholder="Select date" class="form-control ks-daterange-single inputDisabled flatpickrDate" name="trakhees_1st_card_uplodaed_date" id="trakhees_1st_card_uplodaed_date"  value="<?php echo @$data_qualification->trakhees_1st_card_uplodaed_date; ?>" >
                                </div>
                            </div>
                        </div>
                         
                            
                        <div class="row mt-2">
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">2nd Card Color</label>
                                    <input type="text" placeholder="Card Color" class="form-control inputDisabled" name="trakhees_2nd_card_color" id="trakhees_2nd_card_color"  value="<?php echo @$data_qualification->trakhees_2nd_card_color; ?>">
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">2nd Card Expiry Date</label>
                                    <input type="text" placeholder="Select date" class="form-control ks-daterange-single inputDisabled flatpickrDate" name="trakhees_2nd_card_expiry_date" id="trakhees_2nd_card_expiry_date"  value="<?php echo @$data_qualification->trakhees_2nd_card_expiry_date; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">2nd Card Front</label>
                                    <div class="input-group">
<!--                                        <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" name="select" id=""  value="2nd Card Front Image">-->
                                        <div class="custom-file replaceCustomFile" >
                                            <input type="file" class="custom-file-input" name="trakhees_2nd_card_front" id="trakhees_2nd_card_front" >
                                            <label class="custom-file-label" for="trakhees_2nd_card_front">Upload file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#trakhees_2nd_card_front_modal" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                        </div>
                                        <!-- 2nd Card Front Modal -->
                                        <div class="modal fade" id="trakhees_2nd_card_front_modal" tabindex="-1" role="dialog"aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">2nd Card Id Front</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <a href="<?php echo base_url('employees_loanapplication_download/').@$data_qualification->trakhees_2nd_card_front; ?>">      <img src="<?php echo base_url(); ?>uploads/<?php echo @$data_qualification->trakhees_2nd_card_front; ?>" alt="" class="img-fluid"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">2nd Card Back</label>
                                    <div class="input-group">
<!--                                        <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" value="2nd Card Back Image" disabled="disabled">-->
                                        <div class="custom-file replaceCustomFile">
                                            <input type="file" class="custom-file-input" name="trakhees_2nd_card_back" id="trakhees_2nd_card_back" >
                                            <label class="custom-file-label" for="inputGroupFile08">Upload file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#trakhees_2nd_card_back_modal" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                        </div>
                                        <!-- 2nd Card Back Modal -->
                                        <div class="modal fade" id="trakhees_2nd_card_back_modal" tabindex="-1" role="dialog"aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">2nd Card Back</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <a href="<?php echo base_url('employees_loanapplication_download/').@$data_qualification->trakhees_2nd_card_back; ?>">     <img src="<?php echo base_url(); ?>uploads/<?php echo @$data_qualification->trakhees_2nd_card_back; ?>" alt="" class="img-fluid"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Uploaded Date</label>
                                    <input type="text" placeholder="Select date" class="form-control ks-daterange-single inputDisabled flatpickrDate" name="trakhees_2nd_card_uplodaed_date" id="trakhees_2nd_card_uplodaed_date"  value="<?php echo @$data_qualification->trakhees_2nd_card_uplodaed_date; ?>">
                                </div>
                            </div>
                        </div>
                            </div>
                            <!-- <div style="display:none" id="trakheesnodiv">
                                <div class="row">
                               <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Reminder Date</label>
                                    <input type="text" placeholder="Select date" class="form-control ks-daterange-single inputDisabled flatpickrDate" name="trakhees_reminder_date" id="trakhees_reminder_date"  value="<?php echo @$data_qualification->trakhees_reminder_date; ?>">
                                </div>
                            </div> 
                            </div>
                                </div>  -->                       
                    </div>
                        <script>
                                function ministryoflaborcard(value){
                                   // alert(value);
                                  if(value=='Yes'){
                                   $('#ministryoflaborcardnodiv').hide();   
                                    $('#ministryoflaborcardyesdiv').show();     
                                  } 
                                  else{
                                       $('#ministryoflaborcardnodiv').show();   
                                    $('#ministryoflaborcardyesdiv').hide();
                                  }
                                    
                                }
                            </script> 
                        <div style="display:none;" id="pro">
                            
                        <div class="row mt-2">
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label class="d-block">Ministry of Labor Card</label>
                                    <div class="d-inline-block mt-2">
                                        <div class="custom-control custom-radio ks-radio ks-success">
                                            <input   type="radio" class="custom-control-input inputDisabled" onclick="ministryoflaborcard(this.value)" name="minstry_labor_card" id="minstry_labor_card" <?php if(@$data_qualification->minstry_labor_card=='Yes') {  ?> checked="checked"  <?php } ?>   value="Yes"
                                                   data-validation="radio_group"
                                                   data-validation-qty="min1">
                                            <label class="custom-control-label" for="minstry_labor_card">Yes</label>
                                        </div>
                                    </div>
                                    <div class="d-inline-block mt-2 ml-3">
                                        <div class="custom-control custom-radio ks-radio ks-danger">
                                            <input type="radio" class="custom-control-input inputDisabled"  onclick="ministryoflaborcard(this.value)"  name="minstry_labor_card" id="minstry_labor_card1" <?php if(@$data_qualification->minstry_labor_card=='No') {  ?> checked="checked"  <?php } ?>  value="No"
                                                   data-validation="radio_group"
                                                   data-validation-qty="min1">
                                            <label class="custom-control-label" for="minstry_labor_card1">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div id="ministryoflaborcardyesdiv">
                        <div class="row mt-2">
                            <div class="col-sm-6 col-xl-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Expiry Date</label>
                                    <input type="text" placeholder="Select date" class="form-control ks-daterange-single inputDisabled flatpickrDate" name="minstry_labor_card_expire_date" id="minstry_labor_card_expire_date"  value="<?php echo @$data_qualification->minstry_labor_card_expire_date; ?>">
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Upload Id Front</label>
                                    <div class="input-group">
<!--                                        <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" name="select" id="" required value="Society Id Front Image" >-->
                                        <div class="custom-file replaceCustomFile" >
                                            <input type="file" class="custom-file-input" name="minstry_labor_card_front" id="minstry_labor_card_front">
                                            <label class="custom-file-label" for="inputGroupFile01">Upload file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#minstry_labor_card_front_modal" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                        </div>
                                        <!-- Society Id Front Modal -->
                                        <div class="modal fade" id="minstry_labor_card_front_modal" tabindex="-1" role="dialog"aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Upload Id Front</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <a href="<?php echo base_url('employees_loanapplication_download/').@$data_qualification->minstry_labor_card_front; ?>">     <img src="<?php echo base_url(); ?>uploads/<?php echo @$data_qualification->minstry_labor_card_front; ?>" alt="" class="img-fluid"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Upload Id Back</label>
                                    <div class="input-group">
<!--                                        <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" value="Society Id Back Image">-->
                                        <div class="custom-file replaceCustomFile" >
                                            <input type="file" class="custom-file-input"  name="minstry_labor_card_back" id="minstry_labor_card_back">
                                            <label class="custom-file-label" for="inputGroupFile02">Upload file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#minstry_labor_card_back_modal" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                        </div>
                                        <!-- Society Id Back Modal -->
                                        <div class="modal fade" id="minstry_labor_card_back_modal" tabindex="-1" role="dialog"aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Upload Id Back</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <a href="<?php echo base_url('employees_loanapplication_download/').@$data_qualification->minstry_labor_card_back; ?>"> <img src="<?php echo base_url(); ?>uploads/<?php echo @$data_qualification->minstry_labor_card_back; ?>" alt="" class="img-fluid"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Uploaded Date</label>
                                    <input type="text" placeholder="Select date" class="form-control ks-daterange-single inputDisabled flatpickrDate" value="<?php echo @$data_qualification->minstry_labor_card_uploaded_date; ?>" name="minstry_labor_card_uploaded_date" id="minstry_labor_card_uploaded_date" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Renewal Date</label>
                                    <input type="text" placeholder="Select date" class="form-control ks-daterange-single inputDisabled flatpickrDate" value="<?php echo @$data_qualification->minstry_labor_card_renewal_date; ?>" name="minstry_labor_card_renewal_date" id="minstry_labor_card_renewal_date" >
                                </div>
                            </div>
                        </div>
                            </div>
                            
                            <!-- <div style="display:none;" id="ministryoflaborcardnodiv">
                                
                                <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Reminder Date</label>
                                    <input type="text" placeholder="Select date" class="form-control ks-daterange-single inputDisabled flatpickrDate" value="<?php echo @$data_qualification->minstry_labor_card_reminder_date; ?>" name="minstry_labor_card_reminder_date" id="minstry_labor_card_reminder_date" >
                                </div>
                            </div>
                                
                            </div> -->
                        
                        <script>
                                function immigrationcard(value){
                                   // alert(value);
                                  if(value=='Yes'){
                                   $('#immigrationcardnodiv').hide();   
                                    $('#immigrationcardyesdiv').show();     
                                  } 
                                  else{
                                       $('#immigrationcardnodiv').show();   
                                    $('#immigrationcardyesdiv').hide();
                                  }
                                    
                                }
                            </script> 
                            
                            <div class="row mt-2">
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label class="d-block">Immigration Card</label>
                                    <div class="d-inline-block mt-2">
                                        <div class="custom-control custom-radio ks-radio ks-success">
                                            <input  type="radio" class="custom-control-input inputDisabled" onclick="immigrationcard(this.value)" name="immigration_card" id="immigration_card" <?php if(@$data_qualification->immigration_card=='Yes') {  ?> checked="checked"  <?php } ?>   value="Yes"
                                                   data-validation="radio_group"
                                                   data-validation-qty="min1">
                                            <label class="custom-control-label" for="immigration_card">Yes</label>
                                        </div>
                                    </div>
                                    <div class="d-inline-block mt-2 ml-3">
                                        <div class="custom-control custom-radio ks-radio ks-danger">
                                            <input type="radio" class="custom-control-input inputDisabled" onclick="immigrationcard(this.value)" name="immigration_card" id="immigration_card1" <?php if(@$data_qualification->immigration_card=='No') {  ?> checked="checked"  <?php } ?>  value="No"
                                                   data-validation="radio_group"
                                                   data-validation-qty="min1">
                                            <label class="custom-control-label" for="immigration_card1">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div id="immigrationcardyesdiv">
                        <div class="row mt-2">
                            <div class="col-sm-6 col-xl-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Expiry Date</label>
                                    <input type="text" placeholder="Select date" class="form-control ks-daterange-single inputDisabled flatpickrDate" name="immigration_card_expire_date" id="immigration_card_expire_date"  value="<?php echo @$data_qualification->immigration_card_expire_date; ?>">
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Upload Id Front</label>
                                    <div class="input-group">
<!--                                        <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" name="select" id="" required value="Society Id Front Image" >-->
                                        <div class="custom-file replaceCustomFile" >
                                            <input type="file" class="custom-file-input" name="immigration_card_front" id="immigration_card_front">
                                            <label class="custom-file-label" for="inputGroupFile01">Upload file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#immigration_card_front_modal" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                        </div>
                                        <!-- Society Id Front Modal -->
                                        <div class="modal fade" id="immigration_card_front_modal" tabindex="-1" role="dialog"aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Upload Id Front</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <a href="<?php echo base_url('employees_loanapplication_download/').@$data_qualification->immigration_card_front; ?>">    <img src="<?php echo base_url(); ?>uploads/<?php echo @$data_qualification->immigration_card_front; ?>" alt="" class="img-fluid"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Upload Id Back</label>
                                    <div class="input-group">
<!--                                        <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" value="Society Id Back Image">-->
                                        <div class="custom-file replaceCustomFile" >
                                            <input type="file" class="custom-file-input"  name="immigration_card_back" id="immigration_card_back">
                                            <label class="custom-file-label" for="inputGroupFile02">Upload file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#immigration_card_back_modal" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                        </div>
                                        <!-- Society Id Back Modal -->
                                        <div class="modal fade" id="immigration_card_back_modal" tabindex="-1" role="dialog"aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Upload Id Back</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <a href="<?php echo base_url('employees_loanapplication_download/').@$data_qualification->immigration_card_back; ?>">     <img src="<?php echo base_url(); ?>uploads/<?php echo @$data_qualification->immigration_card_back; ?>" alt="" class="img-fluid"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Uploaded Date</label>
                                    <input type="text" placeholder="Select date" class="form-control ks-daterange-single inputDisabled flatpickrDate" value="<?php echo @$data_qualification->immigration_card_uploaded_date; ?>" name="immigration_card_uploaded_date" id="immigration_card_uploaded_date" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Renewal Date</label>
                                    <input type="text" placeholder="Select date" class="form-control ks-daterange-single inputDisabled flatpickrDate" value="<?php echo @$data_qualification->immigration_card_renewal_date; ?>" name="immigration_card_renewal_date" id="immigration_card_renewal_date" >
                                </div>
                            </div>
                        </div>
                            </div>
                            <!-- <div style="display:none" id="immigrationcardnodiv">
                               
                                <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Reminder Date</label>
                                    <input type="text" placeholder="Select date" class="form-control ks-daterange-single inputDisabled flatpickrDate" value="<?php echo @$data_qualification->immigration_card_reminder_date; ?>" name="immigration_card_reminder_date" id="immigration_card_reminder_date" >
                                </div>
                            </div>
                                
                            </div> -->
                            <script>
                                function dubai_civil_defence_card(value){
                                   // alert(value);
                                  if(value=='Yes'){
                                   $('#dubai_civil_defence_cardnodiv').hide();   
                                    $('#dubai_civil_defence_cardyesdiv').show();     
                                  } 
                                  else{
                                       $('#dubai_civil_defence_cardnodiv').show();   
                                    $('#dubai_civil_defence_cardyesdiv').hide();
                                  }
                                    
                                }
                            </script> 
                            
                             <div class="row mt-2">
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label class="d-block">Dubai Civil Defence Card</label>
                                    <div class="d-inline-block mt-2">
                                        <div class="custom-control custom-radio ks-radio ks-success">
                                            <input  type="radio" class="custom-control-input inputDisabled" onclick="dubai_civil_defence_card(this.value)" name="dubai_civil_defence_card" id="dubai_civil_defence_card" <?php if(@$data_qualification->dubai_civil_defence_card=='Yes') {  ?> checked="checked"  <?php } ?>   value="Yes"
                                                   data-validation="radio_group"
                                                   data-validation-qty="min1">
                                            <label class="custom-control-label" for="immigration_card">Yes</label>
                                        </div>
                                    </div>
                                    <div class="d-inline-block mt-2 ml-3">
                                        <div class="custom-control custom-radio ks-radio ks-danger">
                                            <input  type="radio" class="custom-control-input inputDisabled" onclick="dubai_civil_defence_card(this.value)" name="dubai_civil_defence_card" id="dubai_civil_defence_card1" <?php if(@$data_qualification->dubai_civil_defence_card=='No') {  ?> checked="checked"  <?php } ?>  value="No"
                                                   data-validation="radio_group"
                                                   data-validation-qty="min1">
                                            <label class="custom-control-label" for="dubai_civil_defence_card1">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div id="dubai_civil_defence_cardyesdiv">
                        <div class="row mt-2">
                            <div class="col-sm-6 col-xl-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Expiry Date</label>
                                    <input type="text" placeholder="Select date" class="form-control ks-daterange-single inputDisabled flatpickrDate" name="dubai_civil_defence_card_expire_date" id="immigration_card_expire_date"  value="<?php echo @$data_qualification->immigration_card_expire_date; ?>">
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Upload Id Front</label>
                                    <div class="input-group">
<!--                                        <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" name="select" id="" required value="Society Id Front Image" >-->
                                        <div class="custom-file replaceCustomFile" >
                                            <input type="file" class="custom-file-input" name="dubai_civil_defence_card_front" id="dubai_civil_defence_card_front">
                                            <label class="custom-file-label" for="dubai_civil_defence_card_front">Upload file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#dubai_civil_defence_card_front_modal" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                        </div>
                                        <!-- Society Id Front Modal -->
                                        <div class="modal fade" id="dubai_civil_defence_card_front_modal" tabindex="-1" role="dialog"aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Upload Id Front</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <a href="<?php echo base_url('employees_loanapplication_download/').@$data_qualification->dubai_civil_defence_card_front; ?>">     <img src="<?php echo base_url(); ?>uploads/<?php echo @$data_qualification->dubai_civil_defence_card_front; ?>" alt="" class="img-fluid"> </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Upload Id Back</label>
                                    <div class="input-group">
<!--                                        <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" value="Society Id Back Image">-->
                                        <div class="custom-file replaceCustomFile" >
                                            <input type="file" class="custom-file-input"  name="dubai_civil_defence_card_back" id="dubai_civil_defence_card_back">
                                            <label class="custom-file-label" for="dubai_civil_defence_card_back">Upload file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#dubai_civil_defence_card_back_modal" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                        </div>
                                        <!-- Society Id Back Modal -->
                                        <div class="modal fade" id="dubai_civil_defence_card_back_modal" tabindex="-1" role="dialog"aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Upload Id Back</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <a href="<?php echo base_url('employees_loanapplication_download/').@$data_qualification->dubai_civil_defence_card_back; ?>">    <img src="<?php echo base_url(); ?>uploads/<?php echo @$data_qualification->dubai_civil_defence_card_back; ?>" alt="" class="img-fluid"> </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Uploaded Date</label>
                                    <input type="text" placeholder="Select date" class="form-control ks-daterange-single inputDisabled flatpickrDate" value="<?php echo @$data_qualification->dubai_civil_defence_card_uploaded_date; ?>" name="dubai_civil_defence_card_uploaded_date" id="dubai_civil_defence_card_uploaded_date" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Renewal Date</label>
                                    <input type="text" placeholder="Select date" class="form-control ks-daterange-single inputDisabled flatpickrDate" value="<?php echo @$data_qualification->dubai_civil_defence_card_renewal_date; ?>" name="dubai_civil_defence_card_renewal_date" id="dubai_civil_defence_card_renewal_date" >
                                </div>
                            </div>
                        </div>
                            </div>
                           <!--  <div id="dubai_civil_defence_cardnodiv" style="display:none;">
                              
                                <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Reminder Date</label>
                                    <input type="text" placeholder="Select date" class="form-control ks-daterange-single inputDisabled flatpickrDate" value="<?php echo @$data_qualification->dubai_civil_defence_card_reminder_date; ?>" name="dubai_civil_defence_card_reminder_date" id="dubai_civil_defence_card_reminder_date" >
                                </div>
                            </div>
                            </div> -->
                            
                            
                        </div>
                        
                        <div style="display:none;" id="safety">
                        
                            <div class="row mt-2">
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label class="d-block">Safety Officer</label>
                                    
                                </div>
                            </div>
                        </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Upload Certificate</label>
                                    <div class="input-group">
<!--                                        <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" name="select" id="" required value="Society Id Front Image" >-->
                                        <div class="custom-file replaceCustomFile" >
                                            <input type="file" class="custom-file-input" name="safety_certificate" id="safety_certificate">
                                            <label class="custom-file-label" for="safety_certificate">Upload</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#safety_certificate_modal" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                        </div>
                                        <!-- Society Id Front Modal -->
                                        <div class="modal fade" id="safety_certificate_modal" tabindex="-1" role="dialog"aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Upload Id Front</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <a href="<?php echo base_url('employees_loanapplication_download/').@$data_qualification->safety_certificate; ?>">   <img src="<?php echo base_url(); ?>uploads/<?php echo @$data_qualification->safety_certificate; ?>" alt="" class="img-fluid"></a>                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        <div class="row mt-2">
                            <div class="col-sm-6 col-xl-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Expiry Date</label>
                                    <input type="text" placeholder="Select date" class="form-control ks-daterange-single inputDisabled flatpickrDate" name="safety_card_expire_date" id="safety_card_expire_date"  value="<?php echo @$data_qualification->safety_card_expire_date; ?>">
                                </div>
                            </div>
                            
                            
                            
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Upload Id Front</label>
                                    <div class="input-group">
<!--                                        <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" name="select" id="" required value="Society Id Front Image" >-->
                                        <div class="custom-file replaceCustomFile" >
                                            <input type="file" class="custom-file-input" name="safety_card_front" id="safety_card_front">
                                            <label class="custom-file-label" for="safety_card_front">Upload file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#safety_card_front_modal" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                        </div>
                                        <!-- Society Id Front Modal -->
                                        <div class="modal fade" id="safety_card_front_modal" tabindex="-1" role="dialog"aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Upload Id Front</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <a href="<?php echo base_url('employees_loanapplication_download/').@$data_qualification->safety_card_front; ?>">  <img src="<?php echo base_url(); ?>uploads/<?php echo @$data_qualification->safety_card_front; ?>" alt="" class="img-fluid"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Upload Id Back</label>
                                    <div class="input-group">
<!--                                        <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" value="Society Id Back Image">-->
                                        <div class="custom-file replaceCustomFile" >
                                            <input type="file" class="custom-file-input"  name="safety_card_back" id="safety_card_back">
                                            <label class="custom-file-label" for="safety_card_back">Upload file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#safety_card_back_modal" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                        </div>
                                        <!-- Society Id Back Modal -->
                                        <div class="modal fade" id="safety_card_back_modal" tabindex="-1" role="dialog"aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Upload Id Back</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <a href="<?php echo base_url('employees_loanapplication_download/').@$data_qualification->safety_card_back; ?>">    <img src="<?php echo base_url(); ?>uploads/<?php echo @$data_qualification->safety_card_back; ?>" alt="" class="img-fluid"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
<!--                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">CV</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload CV" value="Amy Gonzales CV" >
                                        <div class="custom-file replaceCustomFile" >
                                            <input type="file" class="custom-file-input" name="cv" id="cv" >
                                            <label class="custom-file-label" for="inputGroupFile09">Upload CV</label>
                                        </div>
                                        <div class="input-group-append">
                                            <a href="<?php echo base_url(); ?>uploads/<?php echo @$data_qualification->cv; ?>" class="btn btn-outline-secondary" type="button" title="View" target="_blank"><span class="la la-eye ks-icon ml-2"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                        
                        </div>
                    </div>
                        
                        
                        <div class="row mt-2">
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Upload CV</label>
                                    <div class="input-group">
<!--                                        <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload CV" value="Amy Gonzales CV" >-->
                                        <div class="custom-file replaceCustomFile" >
                                            <input type="file" class="custom-file-input" name="cv" id="cv" >
                                            <label class="custom-file-label" for="cv">Upload</label>
                                        </div>
                                        <div class="input-group-append">
                                            <a href="<?php echo base_url(); ?>uploads/<?php echo @$data_qualification->cv; ?>" class="btn btn-outline-secondary" type="button" title="View" target="_blank"><span class="la la-eye ks-icon ml-2"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                            </div>
                    <div class="">
                        <div class="form-group mt-3">
<!--                            <button type="btn" class="btn btn-primary edit-profile-btn">Edit</button>-->
                            <button type="submit" class="btn btn-success save-profile-btn">Update & Save</button>
                            <button type="reset" class="btn btn-outline-secondary ks-light reset-profile-btn" style="display: none;">Reset</button>
                        </div>
                    </div>
                
                </form>
            </div>
            
            <div class="tab-pane fade p-0" id="pills-salary" role="tabpanel" aria-labelledby="pills-salary-tab">
                <div class="card panel">
                    <h4 class="card-header">
                        <span class="ks-text mt-2">Salary</span>
                        <a href="#" class="btn btn-outline-primary ks-light ks-no-text edit-profile-btn"><span class="la la-pencil ks-icon"></span></a>
                        <a href="#" class="btn btn-outline-primary ks-light ks-no-text save-profile-btn" style="display: none;"><span class="la la-save ks-icon"></span></a>
                    </h4>
                    <div class="card-block">
                        <h6 class="my-3">Salary Details</h6>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Pay Currency</label>
                                    <select name="select" class="form-control inputDisabled" disabled="disabled">
                                        <option value="0">Please select</option>
                                        <option value="1" selected="selected">$ Dolor</option>
                                        <option value="2">Option 2</option>
                                        <option value="3">Option 3</option>
                                        <option value="4">Option 4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Basic Salary</label>
                                    <input type="text" placeholder="Enter basic salary amount" class="form-control inputDisabled" value="$240" disabled="disabled">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="d-block">Allowances</label>
                                    <div class="d-inline-block mt-2">
                                        <div class="custom-control custom-checkbox ks-checkbox ks-checkbox-success">
                                            <input type="checkbox" class="custom-control-input inputDisabled" id="customCheck1" checked="checked" disabled="disabled">
                                            <label class="custom-control-label" for="customCheck1">House Allowance</label>
                                        </div>
                                    </div>
                                    <div class="d-inline-block mt-2 ml-3">
                                        <div class="custom-control custom-checkbox ks-checkbox ks-checkbox-success">
                                            <input type="checkbox" class="custom-control-input inputDisabled" id="customCheck2" checked="checked" disabled="disabled">
                                            <label class="custom-control-label" for="customCheck2">Transportation Allowance</label>
                                        </div>
                                    </div>
                                    <div class="d-inline-block mt-2 ml-3">
                                        <div class="custom-control custom-checkbox ks-checkbox ks-checkbox-success">
                                            <input type="checkbox" class="custom-control-input inputDisabled" id="customCheck3" disabled="disabled">
                                            <label class="custom-control-label" for="customCheck3">Petrol/Salik Allowance</label>
                                        </div>
                                    </div>
                                    <div class="d-inline-block mt-2 ml-3">
                                        <div class="custom-control custom-checkbox ks-checkbox ks-checkbox-success">
                                            <input type="checkbox" class="custom-control-input inputDisabled" id="customCheck4" disabled="disabled">
                                            <label class="custom-control-label" for="customCheck4">Phone Allowance</label>
                                        </div>
                                    </div>
                                    <div class="d-inline-block mt-2 ml-3">
                                        <div class="custom-control custom-checkbox ks-checkbox ks-checkbox-success">
                                            <input type="checkbox" class="custom-control-input inputDisabled" id="customCheck4" disabled="disabled">
                                            <label class="custom-control-label" for="customCheck4">Other Allowances</label>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                        <div class="pt-2 px-4 pb-0 mb-3" style="border: 1px solid rgba(0,0,0,0.1);">
                            <h6 class="my-3">House Allowance</h6>
                            <hr>
                            <div class="row mt-2">
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label class="d-block">Provided by Company</label>
                                        <div class="d-inline-block mt-2">
                                            <div class="custom-control custom-radio ks-radio ks-success">
                                                <input id="r11" type="radio" class="custom-control-input inputDisabled" name="houseallowance" checked="checked" disabled="disabled" 
                                                       data-validation="radio_group"
                                                       data-validation-qty="min1">
                                                <label class="custom-control-label" for="r11">Yes</label>
                                            </div>
                                        </div>
                                        <div class="d-inline-block mt-2 ml-3">
                                            <div class="custom-control custom-radio ks-radio ks-danger">
                                                <input id="r12" type="radio" class="custom-control-input inputDisabled" name="houseallowance" disabled="disabled" 
                                                       data-validation="radio_group"
                                                       data-validation-qty="min1">
                                                <label class="custom-control-label" for="r12">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Tenency Contracts</label>
                                        <select name="select" class="form-control inputDisabled" disabled="disabled">
                                            <option value="0">Please select</option>
                                            <option value="1" selected="selected">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
                                            <option value="4">Option 4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>    
                        </div>
                        <div class="pt-2 px-4 pb-0 mb-3" style="border: 1px solid rgba(0,0,0,0.1);">
                            <h6 class="my-3">Transportation Allowance</h6>
                            <hr>
                            <div class="row mt-2">
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label class="d-block">Provided by Company</label>
                                        <div class="d-inline-block mt-2">
                                            <div class="custom-control custom-radio ks-radio ks-success">
                                                <input id="r13" type="radio" class="custom-control-input inputDisabled" name="transportationallowance" disabled="disabled" 
                                                       data-validation="radio_group"
                                                       data-validation-qty="min1">
                                                <label class="custom-control-label" for="r13">Yes</label>
                                            </div>
                                        </div>
                                        <div class="d-inline-block mt-2 ml-3">
                                            <div class="custom-control custom-radio ks-radio ks-danger">
                                                <input id="r14" type="radio" class="custom-control-input inputDisabled" name="transportationallowance" checked="checked" disabled="disabled" 
                                                       data-validation="radio_group"
                                                       data-validation-qty="min1">
                                                <label class="custom-control-label" for="r14">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Enter Amount</label>
                                        <input type="text" placeholder="Enter amount" class="form-control inputDisabled" value="$20" disabled="disabled">
                                    </div>
                                </div>
                            </div>    
                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="d-block">Deduction</label>
                                    <div class="d-inline-block mt-2">
                                        <div class="custom-control custom-checkbox ks-checkbox ks-checkbox-success">
                                            <input type="checkbox" class="custom-control-input inputDisabled" id="customCheck6" checked="checked" disabled="disabled">
                                            <label class="custom-control-label" for="customCheck6">Insurance</label>
                                        </div>
                                    </div>
                                    <div class="d-inline-block mt-2 ml-3">
                                        <div class="custom-control custom-checkbox ks-checkbox ks-checkbox-success">
                                            <input type="checkbox" class="custom-control-input inputDisabled" id="customCheck7" checked="checked" disabled="disabled">
                                            <label class="custom-control-label" for="customCheck7">Loan/Advance</label>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                        <div class="pt-2 px-4 pb-0 mb-3" style="border: 1px solid rgba(0,0,0,0.1);">
                            <h6 class="my-3">Insurance</h6>
                            <hr>
                            <div class="row mt-2">
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label class="d-block">Provided by Company</label>
                                        <div class="d-inline-block mt-2">
                                            <div class="custom-control custom-radio ks-radio ks-success">
                                                <input id="r17" type="radio" class="custom-control-input inputDisabled" name="insurancededuction" checked="checked" disabled="disabled" 
                                                       data-validation="radio_group"
                                                       data-validation-qty="min1">
                                                <label class="custom-control-label" for="r17">Yes</label>
                                            </div>
                                        </div>
                                        <div class="d-inline-block mt-2 ml-3">
                                            <div class="custom-control custom-radio ks-radio ks-danger">
                                                <input id="r18" type="radio" class="custom-control-input inputDisabled" name="insurancededuction" disabled="disabled" 
                                                       data-validation="radio_group"
                                                       data-validation-qty="min1">
                                                <label class="custom-control-label" for="r18">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Insurance Type</label>
                                        <select name="select" class="form-control inputDisabled" disabled="disabled">
                                            <option value="0">Please select</option>
                                            <option value="1" selected="selected">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
                                            <option value="4">Option 4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>    
                        </div>
                        <div class="pt-2 px-4 pb-0 mb-3" style="border: 1px solid rgba(0,0,0,0.1);">
                            <h6 class="my-3">Loan/Advance</h6>
                            <hr>
                            <div class="row mt-2">
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label class="d-block">Provided by Company</label>
                                        <div class="d-inline-block mt-2">
                                            <div class="custom-control custom-radio ks-radio ks-success">
                                                <input id="r15" type="radio" class="custom-control-input inputDisabled" name="loandeduction" disabled="disabled" 
                                                       data-validation="radio_group"
                                                       data-validation-qty="min1">
                                                <label class="custom-control-label" for="r15">Yes</label>
                                            </div>
                                        </div>
                                        <div class="d-inline-block mt-2 ml-3">
                                            <div class="custom-control custom-radio ks-radio ks-danger">
                                                <input id="r16" type="radio" class="custom-control-input inputDisabled" name="loandeduction" checked="checked" disabled="disabled" 
                                                       data-validation="radio_group"
                                                       data-validation-qty="min1">
                                                <label class="custom-control-label" for="r16">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Enter Amount</label>
                                        <input type="text" placeholder="Enter amount" class="form-control inputDisabled" value="$140" disabled="disabled">
                                    </div>
                                </div>
                            </div>    
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Gross Salary</label>
                                    <input type="text" placeholder="Enter gross salary amount" class="form-control inputDisabled" value="$320" disabled="disabled">
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label class="d-block">Apply Overtime</label>
                                    <div class="d-inline-block mt-2">
                                        <div class="custom-control custom-radio ks-radio ks-success">
                                            <input id="r19" type="radio" class="custom-control-input inputDisabled" name="overtime" checked="checked" disabled="disabled" 
                                                   data-validation="radio_group"
                                                   data-validation-qty="min1">
                                            <label class="custom-control-label" for="r19">Yes</label>
                                        </div>
                                    </div>
                                    <div class="d-inline-block mt-2 ml-3">
                                        <div class="custom-control custom-radio ks-radio ks-danger">
                                            <input id="r20" type="radio" class="custom-control-input inputDisabled" name="overtime" disabled="disabled" 
                                                   data-validation="radio_group"
                                                   data-validation-qty="min1">
                                            <label class="custom-control-label" for="r20">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h6 class="my-3">Bank Details</h6>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Bank Name</label>
                                    <select name="select" class="form-control inputDisabled" disabled="disabled">
                                        <option value="0">Please select</option>
                                        <option value="1" selected="selected">Option 1</option>
                                        <option value="2">Option 2</option>
                                        <option value="3">Option 3</option>
                                        <option value="4">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Account No.</label>
                                    <input type="text" placeholder="Enter account number" class="form-control inputDisabled" value="AB-1234567890" disabled="disabled">
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">IBAN No.</label>
                                    <input type="text" placeholder="Enter account number" class="form-control inputDisabled" value="A-7890" disabled="disabled">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <div class="d-inline-block mt-2">
                                        <div class="custom-control custom-checkbox ks-checkbox ks-checkbox-success">
                                            <input type="checkbox" class="custom-control-input inputDisabled" id="customCheck8" checked="checked" disabled="disabled">
                                            <label class="custom-control-label" for="customCheck8">Include in Monthly WPS File</label>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <div class="d-inline-block mt-2">
                                        <div class="custom-control custom-checkbox ks-checkbox ks-checkbox-success">
                                            <input type="checkbox" class="custom-control-input inputDisabled" id="customCheck9" checked="checked" disabled="disabled">
                                            <label class="custom-control-label" for="customCheck9">Save this Bank Account as a Default</label>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group mt-3">
                            <button type="btn" class="btn btn-primary edit-profile-btn">Edit</button>
                            <button type="submit" class="btn btn-success save-profile-btn" style="display: none;">Update & Save</button>
                            <button type="reset" class="btn btn-outline-secondary ks-light reset-profile-btn" style="display: none;">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade p-0" id="pills-salary2" role="tabpanel" aria-labelledby="pills-salary-tab2">
                <div class="form-group">
                    <button type="button" class="btn btn-primary" onclick="salarydivopen();">Add</button>
                    <!--<button type="button" class="btn btn-success" onclick="getexistNetSalary('<?php echo @$data_single->id; ?>');">Update</button>-->
                    <input type="hidden" name="mode" id="mode" value="">
                </div>
            	<div class="form-box" id="add_salary" style="display: none;">
                	<h6 class="form-box-heading">Salary</h6>       

                    <?php
                           $minSalary = $maxSalary = 0;
                           if($data_single->grade!='' && $data_single->grade!='0'){
                            $getMinMaxSalary = $this->EmployeesModel->get_row_data('master_grade',array('id'=>$data_single->grade));
                           }else{
                            $getMinMaxSalary = array();
                           }

                           if(!empty($getMinMaxSalary)){
                            $minSalary = $getMinMaxSalary->min_salary;
                            $maxSalary = $getMinMaxSalary->max_salary;
                           }


                           if(($data_single->grade!='' && $data_single->grade!='0') && ($data_single->department!='' && $data_single->department!='0')){
                            $all_salary_structure  = $this->EmployeesModel->get_result_data('master_salary_structure',array('is_active'=>'Y','delete_flag'=>'N','grade_id'=>$data_single->grade,'dept_id'=>$data_single->department));

                           }else{

                            $all_salary_structure  = array();
                           }

                         ?>


                	<div class="row mt-2">
                		<div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Salary Structure</label>
                                <select id="salary_structure" name="salary_structure" class="form-control">
                                <option>Select</option>
                                <?php
                                  if (!empty($all_salary_structure)) {
                                    foreach ($all_salary_structure as $salary_structure) {
                                  ?>
                                  <option value="<?php echo $salary_structure->id; ?>" <?php echo ((isset($data_single->salary_structure_id) && ($data_single->salary_structure_id==$salary_structure->id)) ? 'selected' : ''); ?>><?php echo $salary_structure->structure_name; ?></option>
                                  <?php } } ?>
                            </select>
                            </div>
                            <span class="salary_structure_err" style="color: red;"></span>
                        </div>
                        
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">CTC</label>
                                <input onkeyup="numeric(this);checkCTCgrade('<?php echo @$minSalary; ?>','<?php echo @$maxSalary; ?>',this);" type="text" placeholder="Enter CTC" class="form-control inputDisabled ctcAmtClass" name='ctc' id='ctc' value="<?php echo @$data_single->ctc_amount; ?>" > 
                            
                            <span style="color: red;">** <small>CTC will be between <?php echo @$minSalary; ?> - <?php echo @$maxSalary; ?> according to Grade <?php echo (!empty($getMinMaxSalary)) ? $getMinMaxSalary->grade_name : '' ?></small></span>
                            <br><span class="CTC_err" style="color: red;"></span>
                            </div>
                        </div>
                	</div>    

                    <div class="form-group mt-3">
                    <button type="button" class="btn btn-primary edit-profile-btn NetSalaryCls" onclick="getNetSalary('<?php echo @$data_single->id; ?>');">Calculate Net Salary</button>

                    <button style="display: none;" type="button" class="btn btn-primary edit-profile-btn NetSalaryClose" onclick="CloseNetSalary();">Close Calculation</button>
                </div>  
 


                    <div class="form-group mt-3">
                    <spna style="color:green; font-size: 16px;" id="net_salary_save"></spna>
                </div>  

                </div>
                <div class="form-box" id="net_salary">


                </div>
                 <div class="form-box" id="edit_net_salary" style="display: none;">


                </div>

                  <div class="form-group mt-3" >
                    <button type="button" id="saveDiv" style="display: none;" class="btn btn-primary edit-profile-btn saveSalary" onclick="saveSalaryStructure('<?php echo @$data_single->id; ?>');">Save</button>
                      <button type="button" id="updateDiv" style="display: none;" class="btn btn-primary edit-profile-btn updateSalary" onclick="saveSalaryStructure('<?php echo @$data_single->id; ?>');">Update</button>
                    <button type="submit" class="btn btn-success save-profile-btn" style="display: none;">Update & Save</button>
                    <button type="reset" class="btn btn-outline-secondary ks-light reset-profile-btn" style="display: none;">Reset</button>
                </div>

                    <table id="payroll_table" class="table table-bordered table-list mb-20">
                    <thead>
                    <tr>
                        <th>Month</th>
                        <th>Year</th>
                        <th>Paid Date</th>
                        <th>Salary</th>
                        <th>Overtime</th>
                        <!-- <th>Bonus</th> -->
                    </tr>
                    </thead>
                    <tbody>
                        
                        <?php 
                        if(!empty($all_payroll))
                        {
                            foreach ($all_payroll as $payroll) {
                                
                        
                        ?>
                        <tr>
                        <td><?php echo @$payroll->payroll_month;?></td>
                        <td><?php echo @$payroll->payroll_year;?></td>
                        <td><?php echo @$payroll->payroll_date;?></td>
                        <td style="text-align: right;"><?php echo (isset($SysConfig) && $SysConfig->currency_position=='Left') ? $SysConfig->default_currency_symbol : ''; ?> <?php echo @$payroll->salary;?> <?php echo (isset($SysConfig) && $SysConfig->currency_position=='Right') ? $SysConfig->default_currency_symbol : ''; ?></td>
                        <td><?php echo @$payroll->overtime;?></td>
                        <!-- <td><?php echo @$payroll->bonus;?></td> -->
                        
                    </tr>
                    <?php
                            }
                        }
                        ?>
                    </tbody>
                </table> 
                
              
            </div>
            <div class="tab-pane fade p-0" id="pills-passport" role="tabpanel" aria-labelledby="pills-passport-tab">
                <div id="passport_div" class="form-box">
                    <div>
                    <h6 class="form-box-heading">Passport / Visa</h6>
<!--                    <h5 class="card-header">
                        <span class="ks-text mt-2">Passport / Visa</span>
                        <a href="#" class="btn btn-outline-primary ks-light ks-no-text edit-profile-btn"><span class="la la-pencil ks-icon"></span></a>
                        <a href="#" class="btn btn-outline-primary ks-light ks-no-text save-profile-btn" style="display: none;"><span class="la la-save ks-icon"></span></a>
                    </h5>-->
                    <form  class="ks-form ks-settings-tab-form ks-general" method="post" action="" name="passport_form" id="passport_form" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id" value="<?php echo @$id;  ?>">
                    <div class="clearfix">
                        <div class="row">
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Passport No.</label>
                                    <input type="text" placeholder="Enter passport number" class="form-control inputDisabled" value="<?php echo @$passport_single->passport_no;?>" name="passport_no" id="passport_no" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Place of Issue</label>
                                    <input type="text" placeholder="Enter place of issue" class="form-control inputDisabled" value="<?php echo @$passport_single->passport_place_of_issue;?>" name="passport_place_of_issue" id="passport_place_of_issue">
                                </div>
                            </div>
                        
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Country</label>
                                    <select name="passport_country" id="passport_country" class="form-control inputDisabled">
                                       <option value="">Please select</option>
                                        <?php
                                         foreach ($country as $value) {
                                             
                                         
                                        ?>
                                        <option value="<?php echo @$value->country_name; ?>" <?php if(@$passport_single->passport_country==$value->country_name){ ?> selected="selected" <?php } ?> ><?php echo @$value->country_name; ?></option>
                                        <?php
                                         }
                                      ?>
                                       
                                                            
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Issue Date</label>
                                    <input type="text" placeholder="Select date" class="form-control ks-daterange-single flatpickrDate inputDisabled" value="<?php echo @$passport_single->passport_issue_date;?>" name="passport_issue_date" id="passport_issue_date">
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Expiry Date</label>
                                    <input type="text" placeholder="Select date" class="form-control ks-daterange-single flatpickrDate inputDisabled" value="<?php echo @$passport_single->passport_expiry_date;?>" name="passport_expiry_date" id="passport_expiry_date">
                                </div>
                            </div>
                        
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label class="d-block">Retained with Company</label>
                                    <div class="d-inline-block mt-2">
                                        <div class="custom-control custom-radio ks-radio ks-success">
                                            <input  type="radio" class="custom-control-input inputDisabled" <?php if(@$passport_single->retained_with_company=='Yes'){ ?> checked="checked" <?php } ?> name='retained_with_company'  id='retained_with_company' value="Yes"
                                                   data-validation="radio_group"
                                                   data-validation-qty="min1">
                                            <label class="custom-control-label" for="retained_with_company">Yes</label>
                                        </div>
                                    </div>
                                    <div class="d-inline-block mt-2 ml-3">
                                        <div class="custom-control custom-radio ks-radio ks-danger">
                                            <input  type="radio" class="custom-control-input inputDisabled"  <?php if(@$passport_single->retained_with_company=='No'){ ?> checked="checked" <?php } ?> name='retained_with_company'  id='retained_with_company1' value="No" 
                                                   data-validation="radio_group"
                                                   data-validation-qty="min1">
                                            <label class="custom-control-label" for="retained_with_company1">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6  col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Upload Passport (5 pages)</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control forCustomFile inputDisabled" style="display:none;" placeholder="Upload file" value="Passport Images">
                                        <div class="custom-file replaceCustomFile" style="">
                                            <input type="file" name="passport_image[]" multiple class="custom-file-input" id="passport_image">
                                            <label class="custom-file-label" for="passport_image">Upload</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#idPassport" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                        </div>
                                        <!-- Passport Modal -->
                                        <div class="modal fade" id="idPassport" tabindex="-1" role="dialog"aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Passport</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <?php
                                                            if(!empty($passport_single->passport_image))
                                                            {
                                                                $a=1;
                                                                $images=  explode(',', $passport_single->passport_image);
                                                                foreach ($images as $value) {
//$my_url = 'http://www.example.com/5478631';
//$ext =substr($value, strrpos($value, "." )+1)."\n";
$ext = pathinfo($value, PATHINFO_EXTENSION);
//echo $ext;exit;
if($ext=='jpg' || $ext=='jpeg' || $ext=='png' || $ext=='bmp' || $ext=='gif')
{
    

                                                            ?>
                                                            <strong>  <?php echo $a++; ?>)</strong> <a href="<?php echo base_url('employees_loanapplication_download/').@$value; ?>">    <img src="<?php echo base_url(); ?>uploads/<?php echo @$value; ?>" alt="" class="img-fluid"></a><br>
                                                           <?php
}
else
    {
    ?>

                                                  <strong>     <?php echo $a++; ?>)  </strong>   <a href="<?php echo base_url('employees_loanapplication_download/').@$value; ?>"> <?php echo @$value; ?> </a><br>
    <?php
    }
    ?>
                                                            <?php
                                                            }
                                                            }
                                                            ?>
                                                            
                                                            
                                                          
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="">
                        <div class="form-group mt-2 mb-0">
<!--                            <button type="btn" class="btn btn-primary edit-profile-btn">Edit</button>-->
                            <a onclick="passport_form_submit('<?php echo $id; ?>')" class="btn btn-success save-profile-btn" style="">Update & Save</a>
<!--                            <button type="reset" class="btn btn-outline-secondary ks-light reset-profile-btn" style="display: none;">Reset</button>-->
                        </div>
                    </div>
                        <div style="display: none;">
                            <h6 class="my-3">Employment Offer</h6>
                            <hr>
                            <div class="row mt-2">
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Upload Employment Offer (5 pages)</label>
                                        <div class="input-group">
<!--                                            <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" value="Employment Offer Images" disabled="disabled">-->
                                            <div class="custom-file replaceCustomFile" style="">
                                                <input type="file" name="employment_offer_image[]" multiple class="custom-file-input" class="custom-file-input" id="employment_offer_image">
                                                <label class="custom-file-label" for="employment_offer_image">Upload</label>
                                            </div>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#idEmploymentOffer" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                            </div>
                                            <!-- Employment Offer Modal -->
                                            <div class="modal fade" id="idEmploymentOffer" tabindex="-1" role="dialog"aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Employment Offer</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="text-center">
                                                                
                                                                <?php
                                                            if(!empty($passport_single->employment_offer_image))
                                                            {
                                                                $a=1;
                                                                $images=  explode(',', $passport_single->employment_offer_image);
                                                                foreach ($images as $value) {
$ext = pathinfo($value, PATHINFO_EXTENSION);
//echo $ext;exit;
if($ext=='jpg' || $ext=='jpeg' || $ext=='png' || $ext=='bmp' || $ext=='gif')
{


                                                            ?>
                                                          <strong>  <?php echo $a++; ?>)</strong>      <a href="<?php echo base_url('employees_loanapplication_download/').@$value; ?>">    <img src="<?php echo base_url(); ?>uploads/<?php echo @$value; ?>" alt="" class="img-fluid"></a><br>
                                                            <?php
}
else
    {
    ?>

                                                  <strong>     <?php echo $a++; ?>)  </strong>   <a href="<?php echo base_url('employees_loanapplication_download/').@$value; ?>"> <?php echo @$value; ?> </a><br>
    <?php
    }
    ?>
                                                            <?php
                                                            }
                                                            }
                                                            ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Employment Offer Date</label>
                                        <input type="text" placeholder="Select date" class="form-control flatpickrDate ks-daterange-single inputDisabled" value="<?php echo @$passport_single->employment_offer_date;?>" name="employment_offer_date" id="employment_offer_date">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Employment Offer Cost</label>
                                        <input type="text" placeholder="Enter employment offer cost" class="form-control inputDisabled" value="<?php echo @$passport_single->employment_offer_cost;?>" name="employment_offer_cost" id="employment_offer_cost">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="display: none;">
                            <h6 class="my-3">Typing Electronic Pre-Approval Work Permit Application</h6>
                            <hr>
                            <div class="row mt-2">
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Upload Application (2 pages)</label>
                                        <div class="input-group">
<!--                                            <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" value="Work Permit Application Images" disabled="disabled">-->
                                            <div class="custom-file replaceCustomFile" style="">
                                                <input type="file" name="work_permit_application_image[]" multiple class="custom-file-input" id="work_permit_application_image">
                                                <label class="custom-file-label" for="work_permit_application_image">Upload</label>
                                            </div>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#idWorkPermit" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                            </div>
                                            <!-- Employment Offer Modal -->
                                            <div class="modal fade" id="idWorkPermit" tabindex="-1" role="dialog"aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Work Permit Application</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="text-center">
                                                                <?php
                                                            if(!empty($passport_single->work_permit_application_image))
                                                            {
                                                                $a=1;
                                                                $images=  explode(',', $passport_single->work_permit_application_image);
                                                                foreach ($images as $value) {
$ext = pathinfo($value, PATHINFO_EXTENSION);
//echo $ext;exit;
if($ext=='jpg' || $ext=='jpeg' || $ext=='png' || $ext=='bmp' || $ext=='gif')
{


                                                            ?>
                                                       <strong>     <?php echo $a++; ?>)  </strong>     <a href="<?php echo base_url('employees_loanapplication_download/').@$value; ?>">    <img src="<?php echo base_url(); ?>uploads/<?php echo @$value; ?>" alt="" class="img-fluid"></a><br>
                                                            <?php
}
else
    {
    ?>

                                                  <strong>     <?php echo $a++; ?>)  </strong>   <a href="<?php echo base_url('employees_loanapplication_download/').@$value; ?>"> <?php echo @$value; ?> </a><br>
    <?php
    }
    ?>
                                                            <?php
                                                            }
                                                            }
                                                            ?>
<!--                                                                <img src="http://www.fixituae.com/wp-content/uploads/2014/06/EID300x182.jpg" alt="" class="img-fluid">
                                                                <img src="http://www.fixituae.com/wp-content/uploads/2014/06/EID300x182.jpg" alt="" class="img-fluid mt-3">-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Application Date</label>
                                        <input type="text" placeholder="Select date" class="form-control flatpickrDate ks-daterange-single inputDisabled" value="<?php echo @$passport_single->work_permit_application_date;?>" name="work_permit_application_date" id="work_permit_application_date">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Application Cost</label>
                                        <input type="text" placeholder="Enter application cost" class="form-control inputDisabled" value="<?php echo @$passport_single->work_permit_application_cost;?>" name="work_permit_application_cost" id="work_permit_application_cost">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="display: none;">
                            <h6 class="my-3">Employment Contract (Outside the Country)</h6>
                            <hr>
                            <div class="row mt-2">
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Upload Employment Contract (5 pages)</label>
                                        <div class="input-group">
<!--                                            <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" value="Employment Contract Images" disabled="disabled">-->
                                            <div class="custom-file replaceCustomFile" style="">
                                                <input type="file" class="custom-file-input" multiple name="employment_contact_image[]" multiple id="employment_contact_image">
                                                <label class="custom-file-label" for="employment_contact_image">Upload</label>
                                            </div>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#idEmploymentContract" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                            </div>
                                            <!-- Employment Contract Modal -->
                                            <div class="modal fade" id="idEmploymentContract" tabindex="-1" role="dialog"aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Employment Contract</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="text-center">
                                                                <?php
                                                            if(!empty($passport_single->employment_contact_image))
                                                            {
                                                                $a=1;
                                                                $images=  explode(',', $passport_single->employment_contact_image);
                                                                foreach ($images as $value) {

$ext = pathinfo($value, PATHINFO_EXTENSION);
//echo $ext;exit;
if($ext=='jpg' || $ext=='jpeg' || $ext=='png' || $ext=='bmp' || $ext=='gif')
{

                                                            ?>
                                                         <strong>     <?php echo $a++; ?>)  </strong>   <a href="<?php echo base_url('employees_loanapplication_download/').@$value; ?>">    <img src="<?php echo base_url(); ?>uploads/<?php echo @$value; ?>" alt="" class="img-fluid"></a><br>
                                                           <?php
}
else
    {
    ?>

                                                  <strong>     <?php echo $a++; ?>)  </strong>   <a href="<?php echo base_url('employees_loanapplication_download/').@$value; ?>"> <?php echo @$value; ?> </a><br>
    <?php
    }
    ?>
                                                            <?php
                                                            }
                                                            }
                                                            ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Employment Contract Date</label>
                                        <input type="text" placeholder="Select date" class="form-control flatpickrDate ks-daterange-single inputDisabled" value="<?php echo @$passport_single->employment_contact_date;?>" name="employment_contact_date" id="employment_contact_date">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Employment Contract Cost</label>
                                        <input type="text" placeholder="Enter application cost" class="form-control inputDisabled" value="<?php echo @$passport_single->employment_contact_cost;?>" name="employment_contact_cost" id="employment_contact_cost">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="display: none;">
                            <h6 class="my-3">Bank Guarantee (Returned after Labor Cancels)</h6>
                            <hr>
                            <div class="row mt-2">
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Policy No.</label>
                                        <input type="text" placeholder="Enter policy no." class="form-control inputDisabled" value="<?php echo @$passport_single->bank_gurantee_policy_no;?>" name="bank_gurantee_policy_no" id="bank_gurantee_policy_no">
                                    </div>   
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Name of Finance Institution</label>
                                        <input type="text" placeholder="Enter name of finance instituton" class="form-control inputDisabled" value="<?php echo @$passport_single->name_of_finance_institution;?>" name="name_of_finance_institution" id="name_of_finance_institution">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Amount</label>
                                        <input type="text" placeholder="Enter amount" class="form-control inputDisabled" value="<?php echo @$passport_single->bank_gurantee_finance_amount;?>" name="bank_gurantee_finance_amount" id="bank_gurantee_finance_amount">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="display: none;">
                            <h6 class="my-3">Electronic Work Permit</h6>
                            <hr>
                            <div class="row mt-2">
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Upload Work Permit (2 pages)</label>
                                        <div class="input-group">
<!--                                            <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" value="Work Permit Images" disabled="disabled">-->
                                            <div class="custom-file replaceCustomFile" style="">
                                                <input type="file" name="electronic_work_permit[]" multiple class="custom-file-input" id="electronic_work_permit">
                                                <label class="custom-file-label" for="electronic_work_permit">Upload</label>
                                            </div>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#idWorkPermit" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                            </div>
                                            <!-- Employment Contract Modal -->
                                            <div class="modal fade" id="idWorkPermit" tabindex="-1" role="dialog"aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Electronic Work Permit</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="text-center">
                                                                 <?php
                                                            if(!empty($passport_single->electronic_work_permit))
                                                            {
                                                                $a=1;
                                                                $images=  explode(',', $passport_single->electronic_work_permit);
                                                                foreach ($images as $value) {
$ext = pathinfo($value, PATHINFO_EXTENSION);
//echo $ext;exit;
if($ext=='jpg' || $ext=='jpeg' || $ext=='png' || $ext=='bmp' || $ext=='gif')
{


                                                            ?>
                                                     <strong>     <?php echo $a++; ?>)  </strong>       <a href="<?php echo base_url('employees_loanapplication_download/').@$value; ?>">    <img src="<?php echo base_url(); ?>uploads/<?php echo @$value; ?>" alt="" class="img-fluid"></a><br>
                                                           <?php
}
else
    {
    ?>

                                                  <strong>     <?php echo $a++; ?>)  </strong>   <a href="<?php echo base_url('employees_loanapplication_download/').@$value; ?>"> <?php echo @$value; ?> </a><br>
    <?php
    }
    ?>
                                                            <?php
                                                            }
                                                            }
                                                            ?>
<!--                                                                <img src="http://www.fixituae.com/wp-content/uploads/2014/06/EID300x182.jpg" alt="" class="img-fluid">
                                                                <img src="http://www.fixituae.com/wp-content/uploads/2014/06/EID300x182.jpg" alt="" class="img-fluid mt-3">-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Work Permit Date</label>
                                        <input type="text" placeholder="Select date" class="form-control flatpickrDate ks-daterange-single inputDisabled" value="<?php echo @$passport_single->electronic_work_permit_date;?>" name="electronic_work_permit_date" id="electronic_work_permit_date">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Work Permit Cost</label>
                                        <input type="text" placeholder="Enter application cost" class="form-control inputDisabled" value="<?php echo @$passport_single->electronic_work_permit_cost;?>" name="electronic_work_permit_cost" id="electronic_work_permit_cost">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="display:none;">
                            <h6 class="my-3">Ministry of Labor Card</h6>
                            <hr>
                            <div class="row mt-2">
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Card No.</label>
                                        <input type="text" placeholder="Enter Labor Card No." class="form-control inputDisabled" value="<?php echo @$passport_single->ministry_card_no;?>" name="ministry_card_no" id="ministry_card_no">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Personal Id No.</label>
                                        <input type="text" placeholder="Enter Personal Id No" class="form-control inputDisabled" value="<?php echo @$passport_single->personal_id;?>" name="personal_id" id="personal_id">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Issue Date</label>
                                        <input type="text" placeholder="Select date" class="form-control flatpickrDate ks-daterange-single inputDisabled" value="<?php echo @$passport_single->ministry_card_issue_date;?>" name="ministry_card_issue_date" id="ministry_card_issue_date">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Expiry Date</label>
                                        <input type="text" placeholder="Select date" class="form-control flatpickrDate ks-daterange-single inputDisabled" value="<?php echo @$passport_single->ministry_card_expiry_date;?>" name="ministry_card_expiry_date" id="ministry_card_expiry_date">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Labor Card Cost</label>
                                        <input type="text" placeholder="Enter labor card cost" class="form-control inputDisabled" value="<?php echo @$passport_single->labor_card_cost;?>" name="labor_card_cost" id="labor_card_cost">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Upload Card</label>
                                        <div class="input-group">
<!--                                            <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" value="Work Permit Images" disabled="disabled">-->
                                            <div class="custom-file replaceCustomFile" style="">
                                                <input type="file" name="labor_card_image" class="custom-file-input" id="labor_card_image">
                                                <label class="custom-file-label" for="labor_card_image">Upload</label>
                                            </div>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#idLaborCard" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                            </div>
                                            <!-- Ministry of Labor Card Modal -->
                                            <div class="modal fade" id="idLaborCard" tabindex="-1" role="dialog"aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Ministry of Labor Card</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="text-center">
                                                                <?php
                                                                $ext = pathinfo(@$passport_single->labor_card_image, PATHINFO_EXTENSION);
//echo $ext;exit;
if($ext=='jpg' || $ext=='jpeg' || $ext=='png' || $ext=='bmp' || $ext=='gif')
{
                                                                ?>
                                                               <a href="<?php echo base_url('employees_loanapplication_download/').@$passport_single->labor_card_image; ?>">     <img src="<?php echo base_url(); ?>uploads/<?php echo @$passport_single->labor_card_image; ?>" alt="" class="img-fluid"></a>
<!--                                                                <img src="http://www.fixituae.com/wp-content/uploads/2014/06/EID300x182.jpg" alt="" class="img-fluid">-->
                                                             <?php
}
else
    {
    ?>

                                                    <a href="<?php echo base_url('employees_loanapplication_download/').@$passport_single->labor_card_image; ?>"> <?php echo @$passport_single->labor_card_image; ?> </a>
    <?php
    }
    ?>
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
                        <div style="display: none;">
                            <h6 class="my-3">Employment Visa (Inside the Country)</h6>
                            <hr>
                            <div class="row mt-2">
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Issue Date</label>
                                        <input type="text" placeholder="Select date" class="form-control flatpickrDate ks-daterange-single inputDisabled" value="<?php echo @$passport_single->employment_visa_in_country_issue_date;?>" name="employment_visa_in_country_issue_date" id="employment_visa_in_country_issue_date">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Expiry Date</label>
                                        <input type="text" placeholder="Select date" class="form-control flatpickrDate ks-daterange-single inputDisabled" value="<?php echo @$passport_single->employment_visa_in_country_expiry_date;?>" name="employment_visa_in_country_expiry_date" id="employment_visa_in_country_expiry_date">
                                    </div>
                                </div>                            
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Visa Cost</label>
                                        <input type="text" placeholder="Enter visa card cost" class="form-control inputDisabled" value="<?php echo @$passport_single->employment_visa_in_country_cost;?>" name="employment_visa_in_country_cost" id="employment_visa_in_country_cost">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Upload Employment Visa</label>
                                        <div class="input-group">
<!--                                            <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" value="Employment Visa Image" disabled="disabled">-->
                                            <div class="custom-file replaceCustomFile" style="">
                                                <input type="file" name="employment_visa_in_country_image" class="custom-file-input" id="employment_visa_in_country_image">
                                                <label class="custom-file-label" for="employment_visa_in_country_image">Upload</label>
                                            </div>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#idEmploymentVisa1" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                            </div>
                                            <!-- Employment Visa Modal -->
                                            <div class="modal fade" id="idEmploymentVisa1" tabindex="-1" role="dialog"aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Employment Visa (Inside the Country)</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="text-center">
                                                                 <?php
                                                                $ext = pathinfo(@$passport_single->labor_card_image, PATHINFO_EXTENSION);
//echo $ext;exit;
if($ext=='jpg' || $ext=='jpeg' || $ext=='png' || $ext=='bmp' || $ext=='gif')
{
                                                                ?>
                                                                <a href="<?php echo base_url('employees_loanapplication_download/').@$passport_single->employment_visa_in_country_image; ?>">     <img src="<?php echo base_url(); ?>uploads/<?php echo @$passport_single->employment_visa_in_country_image; ?>" alt="" class="img-fluid"></a>
<!--                                                                <img src="http://www.fixituae.com/wp-content/uploads/2014/06/EID300x182.jpg" alt="" class="img-fluid">-->
                                                            <?php
}
else
    {
    ?>

                                                    <a href="<?php echo base_url('employees_loanapplication_download/').@$passport_single->labor_card_image; ?>"> <?php echo @$passport_single->labor_card_image; ?> </a>
    <?php
    }
    ?>
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
                        <div style="display: none;">
                            <h6 class="my-3">Employment Visa (Outside the Country)</h6>
                            <hr>
                            <div class="row mt-2">
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Issue Date</label>
                                        <input type="text" placeholder="Select date" class="form-control flatpickrDate ks-daterange-single inputDisabled" value="<?php echo @$passport_single->employment_visa_out_country_issue_date;?>" name="employment_visa_out_country_issue_date" id="employment_visa_out_country_issue_date">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Expiry Date</label>
                                        <input type="text" placeholder="Select date" class="form-control flatpickrDate ks-daterange-single inputDisabled" value="<?php echo @$passport_single->employment_visa_out_country_expiry_date;?>" name="employment_visa_out_country_expiry_date" id="employment_visa_out_country_expiry_date">
                                    </div>
                                </div>
                            
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Visa Cost</label>
                                        <input type="text" placeholder="Enter visa card cost" class="form-control inputDisabled" value="<?php echo @$passport_single->employment_visa_out_country_cost;?>" name="employment_visa_out_country_cost" id="employment_visa_out_country_cost">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Upload Employment Visa</label>
                                        <div class="input-group">
<!--                                            <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" value="Employment Visa Image" disabled="disabled">-->
                                            <div class="custom-file replaceCustomFile" style="">
                                                <input type="file" name="employment_visa_out_country_image" class="custom-file-input" id="employment_visa_out_country_image">
                                                <label class="custom-file-label" for="employment_visa_out_country_image">Upload</label>
                                            </div>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#idEmploymentVisa2" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                            </div>
                                            <!-- Employment Visa Modal -->
                                            <div class="modal fade" id="idEmploymentVisa2" tabindex="-1" role="dialog"aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Employment Visa (Outside the Country)</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="text-center">
                                                                 <?php
                                                                $ext = pathinfo(@$passport_single->employment_visa_out_country_image, PATHINFO_EXTENSION);
//echo $ext;exit;
if($ext=='jpg' || $ext=='jpeg' || $ext=='png' || $ext=='bmp' || $ext=='gif')
{
                                                                ?>
                                                                <a href="<?php echo base_url('employees_loanapplication_download/').@$passport_single->employment_visa_out_country_image; ?>">     <img src="<?php echo base_url(); ?>uploads/<?php echo @$passport_single->employment_visa_out_country_image; ?>" alt="" class="img-fluid"></a>
                                                            <?php
}
else
    {
    ?>

                                                    <a href="<?php echo base_url('employees_loanapplication_download/').@$passport_single->employment_visa_out_country_image; ?>"> <?php echo @$passport_single->employment_visa_out_country_image; ?> </a>
    <?php
    }
    ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Entry Date</label>
                                        <input type="text" placeholder="Select date" class="form-control flatpickrDate ks-daterange-single inputDisabled" value="<?php echo @$passport_single->employment_visa_out_country_entry_date;?>" name="employment_visa_out_country_entry_date" id="employment_visa_out_country_entry_date">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="display: none;">
                            <h6 class="my-3">Medical</h6>
                            <hr>
                            <div class="row mt-2">
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Upload Test Application</label>
                                        <div class="input-group">
<!--                                            <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" value="Test Application Image" disabled="disabled">-->
                                            <div class="custom-file replaceCustomFile" style="">
                                                <input type="file" name="medical_test_application_image" class="custom-file-input" id="medical_test_application_image">
                                                <label class="custom-file-label" for="medical_test_application_image">Upload</label>
                                            </div>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#idTestApplication" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                            </div>
                                            <!-- Employment Visa Modal -->
                                            <div class="modal fade" id="idTestApplication" tabindex="-1" role="dialog"aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Test Application</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="text-center">
                                                                <?php
                                                                $ext = pathinfo(@$passport_single->medical_test_application_image, PATHINFO_EXTENSION);
//echo $ext;exit;
if($ext=='jpg' || $ext=='jpeg' || $ext=='png' || $ext=='bmp' || $ext=='gif')
{
                                                                ?>
                                                                <a href="<?php echo base_url('employees_loanapplication_download/').@$passport_single->medical_test_application_image; ?>">     <img src="<?php echo base_url(); ?>uploads/<?php echo @$passport_single->medical_test_application_image; ?>" alt="" class="img-fluid"></a>
                                                           <?php
}
else
    {
    ?>

                                                    <a href="<?php echo base_url('employees_loanapplication_download/').@$passport_single->medical_test_application_image; ?>"> <?php echo @$passport_single->medical_test_application_image; ?> </a>
    <?php
    }
    ?>  
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Test Application Cost</label>
                                        <input type="text" placeholder="Enter visa card cost" class="form-control inputDisabled" value="<?php echo @$passport_single->medical_test_cost;?>" name="medical_test_cost" id="medical_test_cost">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Upload Test Result</label>
                                        <div class="input-group">
<!--                                            <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload" value="Test Result Image" disabled="disabled">-->
                                            <div class="custom-file replaceCustomFile" style="display: none;">
                                                <input type="file" class="custom-file-input" name="medical_test_result_image" id="medical_test_result_image">
                                                <label class="custom-file-label" for="medical_test_result_image">Upload</label>
                                            </div>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#idTestResult" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                            </div>
                                            <!-- Employment Visa Modal -->
                                            <div class="modal fade" id="idTestResult" tabindex="-1" role="dialog"aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Test Result</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="text-center">
                                                                <?php
                                                                $ext = pathinfo(@$passport_single->medical_test_result_image, PATHINFO_EXTENSION);
//echo $ext;exit;
if($ext=='jpg' || $ext=='jpeg' || $ext=='png' || $ext=='bmp' || $ext=='gif')
{
                                                                ?>
                                                                <a href="<?php echo base_url('employees_loanapplication_download/').@$passport_single->medical_test_result_image; ?>">     <img src="<?php echo base_url(); ?>uploads/<?php echo @$passport_single->medical_test_result_image; ?>" alt="" class="img-fluid"></a>
                                                            <?php
}
else
    {
    ?>

                                                    <a href="<?php echo base_url('employees_loanapplication_download/').@$passport_single->medical_test_result_image; ?>"> <?php echo @$passport_single->medical_test_result_image; ?> </a>
    <?php
    }
    ?>  
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
                        <div style="display: none;">
                            <h6 class="my-3">Emirates ID</h6>
                            <hr>
                            <div class="row mt-2">
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Upload Emirates ID Application</label>
                                        <div class="input-group">
<!--                                            <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload" value="Emirates ID Application Image" disabled="disabled">-->
                                            <div class="custom-file replaceCustomFile" style="">
                                                <input type="file" class="custom-file-input" name="emirates_id_application_image" id="emirates_id_application_image">
                                                <label class="custom-file-label" for="emirates_id_application_image">Upload</label>
                                            </div>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#idEmiratesID" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                            </div>
                                            <!-- Emirates ID Modal -->
                                            <div class="modal fade" id="idEmiratesID" tabindex="-1" role="dialog"aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Emirates ID Application</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="text-center">
                                                                 <?php
                                                                $ext = pathinfo(@$passport_single->emirates_id_application_image, PATHINFO_EXTENSION);
//echo $ext;exit;
if($ext=='jpg' || $ext=='jpeg' || $ext=='png' || $ext=='bmp' || $ext=='gif')
{
                                                                ?>
                                                                <a href="<?php echo base_url('employees_loanapplication_download/').@$passport_single->emirates_id_application_image; ?>">     <img src="<?php echo base_url(); ?>uploads/<?php echo @$passport_single->emirates_id_application_image; ?>" alt="" class="img-fluid"></a>
                                                            <?php
}
else
    {
    ?>

                                                    <a href="<?php echo base_url('employees_loanapplication_download/').@$passport_single->emirates_id_application_image; ?>"> <?php echo @$passport_single->emirates_id_application_image; ?> </a>
    <?php
    }
    ?>  
                                                            
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Emirates ID Application Cost</label>
                                        <input type="text" placeholder="Enter Application cost" class="form-control inputDisabled" value="<?php echo @$passport_single->emirates_id_application_cost;?>" name="emirates_id_application_cost" id="emirates_id_application_cost">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">ID No.</label>
                                        <input type="text" placeholder="Enter application ID No." class="form-control inputDisabled" value="<?php echo @$passport_single->emirates_id_no;?>" name="emirates_id_no" id="emirates_id_no">
                                    </div>
                                </div>
                            
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Issue Date</label>
                                        <input type="text" placeholder="Select date" class="form-control flatpickrDate ks-daterange-single inputDisabled" value="<?php echo @$passport_single->emirates_id_application_issue_date;?>" name="emirates_id_applic
ation_issue_date" id="emirates_id_application_issue_date">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Expiry Date</label>
                                        <input type="text" placeholder="Select date" class="form-control flatpickrDate ks-daterange-single inputDisabled" value="<?php echo @$passport_single->mirates_id_application_expiry_date;?>" name="mirates_id_application_expiry_date" id="mirates_id_application_expiry_date">
                                    </div>
                                </div>
                            
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">EID Card Front</label>
                                        <div class="input-group">
<!--                                            <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload" value="EID Card Front Image" disabled="disabled">-->
                                            <div class="custom-file replaceCustomFile" style="">
                                                <input type="file" class="custom-file-input" name="eid_card_front_image" id="eid_card_front_image">
                                                <label class="custom-file-label" for="eid_card_front_image">Upload</label>
                                            </div>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#idEIDFront" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                            </div>
                                            <!-- EID Card Front Modal -->
                                            <div class="modal fade" id="idEIDFront" tabindex="-1" role="dialog"aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">EID Card Front</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="text-center">
                                                                 <?php
                                                                $ext = pathinfo(@$passport_single->eid_card_front_image, PATHINFO_EXTENSION);
//echo $ext;exit;
if($ext=='jpg' || $ext=='jpeg' || $ext=='png' || $ext=='bmp' || $ext=='gif')
{
                                                                ?>
                                                                <a href="<?php echo base_url('employees_loanapplication_download/').@$passport_single->eid_card_front_image; ?>">     <img src="<?php echo base_url(); ?>uploads/<?php echo @$passport_single->eid_card_front_image; ?>" alt="" class="img-fluid"></a>
                                                              <?php
}
else
    {
    ?>

                                                    <a href="<?php echo base_url('employees_loanapplication_download/').@$passport_single->eid_card_front_image; ?>"> <?php echo @$passport_single->eid_card_front_image; ?> </a>
    <?php
    }
    ?>  
                                                            
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">EID Card Back</label>
                                        <div class="input-group">
<!--                                            <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload" value="EID Card Back Image" disabled="disabled">-->
                                            <div class="custom-file replaceCustomFile" style="">
                                                <input type="file" class="custom-file-input" name="eid_card_back_image" id="eid_card_back_image">
                                                <label class="custom-file-label" for="eid_card_back_image">Upload</label>
                                            </div>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#idEIDBack" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                            </div>
                                            <!-- EID Card Back Modal -->
                                            <div class="modal fade" id="idEIDBack" tabindex="-1" role="dialog"aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">EID Card Back</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="text-center">
                                                                 <?php
                                                                $ext = pathinfo(@$passport_single->eid_card_back_image, PATHINFO_EXTENSION);
//echo $ext;exit;
if($ext=='jpg' || $ext=='jpeg' || $ext=='png' || $ext=='bmp' || $ext=='gif')
{
                                                                ?>
                                                               <a href="<?php echo base_url('employees_loanapplication_download/').@$passport_single->eid_card_back_image; ?>">     <img src="<?php echo base_url(); ?>uploads/<?php echo @$passport_single->eid_card_back_image; ?>" alt="" class="img-fluid"></a>
                                                            <?php
}
else
    {
    ?>

                                                    <a href="<?php echo base_url('employees_loanapplication_download/').@$passport_single->eid_card_back_image; ?>"> <?php echo @$passport_single->eid_card_back_image; ?> </a>
    <?php
    }
    ?>  
                                                            
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
                        <div style="display: none;">
                            <h6 class="my-3">Permanent Visa</h6>
                            <hr>
                            <div class="row mt-2">
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Application for Permanent Visa</label>
                                        <div class="input-group">
<!--                                            <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload" value="Application for Permanent Visa Image" disabled="disabled">-->
                                            <div class="custom-file replaceCustomFile" style="">
                                                <input type="file" name="permanent_visa_application" class="custom-file-input" id="permanent_visa_application">
                                                <label class="custom-file-label" for="permanent_visa_application">Upload</label>
                                            </div>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#idApplicationPermanentVisa" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                            </div>
                                            <!-- Application for Permanent Visa Modal -->
                                            <div class="modal fade" id="idApplicationPermanentVisa" tabindex="-1" role="dialog"aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Application for Permanent Visa</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="text-center">
                                                                 <?php
                                                                $ext = pathinfo(@$passport_single->permanent_visa_application, PATHINFO_EXTENSION);
//echo $ext;exit;
if($ext=='jpg' || $ext=='jpeg' || $ext=='png' || $ext=='bmp' || $ext=='gif')
{
                                                                ?>
                                                                <a href="<?php echo base_url('employees_loanapplication_download/').@$passport_single->permanent_visa_application; ?>">     <img src="<?php echo base_url(); ?>uploads/<?php echo @$passport_single->permanent_visa_application; ?>" alt="" class="img-fluid"></a>
<!--                                                                <img src="http://www.fixituae.com/wp-content/uploads/2014/06/EID300x182.jpg" alt="" class="img-fluid">-->
                                                            <?php
}
else
    {
    ?>

                                                    <a href="<?php echo base_url('employees_loanapplication_download/').@$passport_single->permanent_visa_application; ?>"> <?php echo @$passport_single->permanent_visa_application; ?> </a>
    <?php
    }
    ?>  
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Visa Cost</label>
                                        <input type="text" placeholder="Enter Visa cost" class="form-control inputDisabled" value="<?php echo @$passport_single->permanent_visa_cost;?>" name="permanent_visa_cost" id="permanent_visa_cost">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">UID No.</label>
                                        <input type="text" placeholder="Enter UID No." class="form-control inputDisabled" value="<?php echo @$passport_single->permanent_uid_no;?>" name="permanent_uid_no" id="permanent_uid_no">
                                    </div>
                                </div>
                            
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Issue Date</label>
                                        <input type="text" placeholder="Select date" class="form-control flatpickrDate ks-daterange-single inputDisabled" value="<?php echo @$passport_single->permanent_visa_issue_date;?>" name="permanent_visa_issue_date" id="permanent_visa_issue_date">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Expiry Date</label>
                                        <input type="text" placeholder="Select date" class="form-control flatpickrDate ks-daterange-single inputDisabled" value="<?php echo @$passport_single->permanent_visa_expiry_date;?>" name="permanent_visa_expiry_date" id="permanent_visa_expiry_date">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Upload Permanent Visa</label>
                                        <div class="input-group">
<!--                                            <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload" value="EID Card Front Image" disabled="disabled">-->
                                            <div class="custom-file replaceCustomFile" style="">
                                                <input type="file" name="permanent_visa_image" class="custom-file-input" id="permanent_visa_image">
                                                <label class="custom-file-label" for="permanent_visa_image">Upload</label>
                                            </div>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#idPermanentVisa" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                            </div>
                                            <!-- Permanent Visa Modal -->
                                            <div class="modal fade" id="idPermanentVisa" tabindex="-1" role="dialog"aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Permanent Visa</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="text-center">
                                                                 <?php
                                                                $ext = pathinfo(@$passport_single->permanent_visa_image, PATHINFO_EXTENSION);
//echo $ext;exit;
if($ext=='jpg' || $ext=='jpeg' || $ext=='png' || $ext=='bmp' || $ext=='gif')
{
                                                                ?>
                                                                <a href="<?php echo base_url('employees_loanapplication_download/').@$passport_single->permanent_visa_image; ?>">     <img src="<?php echo base_url(); ?>uploads/<?php echo @$passport_single->permanent_visa_image; ?>" alt="" class="img-fluid"></a>
<!--                                                                <img src="http://www.fixituae.com/wp-content/uploads/2014/06/EID300x182.jpg" alt="" class="img-fluid">-->
                                                            
                                                           <?php
}
else
    {
    ?>

                                                    <a href="<?php echo base_url('employees_loanapplication_download/').@$passport_single->permanent_visa_image; ?>"> <?php echo @$passport_single->permanent_visa_image; ?> </a>
    <?php
    }
    ?>    
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
                        <div style="display: none;">
                            <h6 class="my-3">Employment Contract (Inside the Country)</h6>
                            <hr>
                            <div class="row mt-2">
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Employment Contract (5 pages)</label>
                                        <div class="input-group">
<!--                                            <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload" value="Employment Contract Image" disabled="disabled">-->
                                            <div class="custom-file replaceCustomFile" style="">
                                                <input type="file" multiple name="emplyment_in_country_contact_image[]" class="custom-file-input" id="emplyment_in_country_contact_image">
                                                <label class="custom-file-label"  for="emplyment_in_country_contact_image">Upload</label>
                                            </div>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#idEmploymentContract2" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                            </div>
                                            <!-- Employment Contract Modal -->
                                            <div class="modal fade" id="idEmploymentContract2" tabindex="-1" role="dialog"aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Employment Contract (Inside the Country)</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="text-center">
                                                                 <?php
                                                            if(!empty($passport_single->emplyment_in_country_contact_image))
                                                            {
                                                                $a=1;
                                                                $images=  explode(',', $passport_single->emplyment_in_country_contact_image);
                                                                foreach ($images as $value) {

 $ext = pathinfo(@$value, PATHINFO_EXTENSION);
//echo $ext;exit;
if($ext=='jpg' || $ext=='jpeg' || $ext=='png' || $ext=='bmp' || $ext=='gif')
{

                                                            ?>
                                                           <strong>     <?php echo $a++; ?>)  </strong>  <a href="<?php echo base_url('employees_loanapplication_download/').@$value; ?>">    <img src="<?php echo base_url(); ?>uploads/<?php echo @$value; ?>" alt="" class="img-fluid"></a><br>
                                                           <?php
}
else
    {
    ?>

                                                  <strong>     <?php echo $a++; ?>)  </strong>   <a href="<?php echo base_url('employees_loanapplication_download/').@$value; ?>"> <?php echo @$value; ?> </a><br>
    <?php
    }
    ?>
                                                            <?php
                                                            }
                                                            }
                                                            ?>
<!--                                                                <img src="http://www.fixituae.com/wp-content/uploads/2014/06/EID300x182.jpg" alt="" class="img-fluid">
                                                                <img src="http://www.fixituae.com/wp-content/uploads/2014/06/EID300x182.jpg" alt="" class="img-fluid mt-3">
                                                                <img src="http://www.fixituae.com/wp-content/uploads/2014/06/EID300x182.jpg" alt="" class="img-fluid mt-3">
                                                                <img src="http://www.fixituae.com/wp-content/uploads/2014/06/EID300x182.jpg" alt="" class="img-fluid mt-3">
                                                                <img src="http://www.fixituae.com/wp-content/uploads/2014/06/EID300x182.jpg" alt="" class="img-fluid mt-3">-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Date Submitted</label>
                                        <input type="text" placeholder="Select date" class="form-control flatpickrDate ks-daterange-single inputDisabled" value="<?php echo @$passport_single->date_submited;?>" name="date_submited" id="date_submited">
                                    </div>
                                </div>
<!--                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Employment Contract Cost</label>
                                        <input type="text" placeholder="Enter Visa cost" class="form-control inputDisabled" value="<?php echo @$passport_single->employment_contact_cost;?>" name="employment_contact_cost" id="employment_contact_cost">
                                    </div>
                                </div>-->
                            </div>
                        
                            <div class="col-12" style="display: none;">
                                <div class="form-group">
                                    <div class="d-inline-block mt-2">
                                        <div class="custom-control custom-checkbox ks-checkbox ks-checkbox-success">
                                            <input type="checkbox" class="custom-control-input inputDisabled" id="customCheck10" checked="checked" disabled="disabled">
                                            <label class="custom-control-label" for="customCheck10">Process to be re-confirmed or can always be changable by Ministry</label>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                </form>
                   
                </div>
            </div>
            </div>
            <div class="tab-pane fade p-0" id="pills-benefits" role="tabpanel" aria-labelledby="pills-benefits-tab">
                <div class="card panel">
                    <h5 class="card-header">
                        <span class="ks-text mt-2">Benefits</span>
<!--                        <a href="#" class="btn btn-outline-primary ks-light ks-no-text edit-profile-btn"><span class="la la-pencil ks-icon"></span></a>-->
                        <a href="#" class="btn btn-outline-primary ks-light ks-no-text save-profile-btn" style="display: none;"><span class="la la-save ks-icon"></span></a>
                    </h5>
                    <div class="card-body">
                        <form name="benifit" id="benifit"   method="post">
                             <input type="hidden" name="benifit_edit_id" id="benifit_edit_id" value=""> 
                        <div>
                            <h6 class="mb-3">Health Insurance</h6>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        
                                        <label for="" class="form-control-label">Policy Name</label>
                                        <select name='policy_name' required id='policy_name' onchange="getpolicydetails(this.value);" class="form-control inputDisabled" >
                                     <option value="">Please select</option>
                                    <?php
                                   if(!empty($all_policy))
                                   {
                                       foreach ($all_policy as $value) {
                                         
                                    
                                    ?>
                                   
                                    <option value="<?php echo @$value->id;?>"><?php echo @$value->policy_name.' ( '.@$value->type.' )'; ?></option>
                                   <?php
                                       }
                                    }
                                    ?>
                                </select>
<!--                                        <label for="" class="form-control-label">Policy Name</label>
                                        <input type="text" placeholder="Enter policy name" class="form-control inputDisabled" name="policy_name" id="policy_name" value="<?php echo @$passport_single->employment_contact_cost;?>">-->
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <span id="policy_details"> </span>
<!--                                    <div class="form-group">
                                        <label for="" class="form-control-label">Expiry Date</label>
                                        <input type="text" placeholder="Select date" class="form-control ks-daterange-single inputDisabled" value="22/12/2021">
                                    </div>-->
                                </div>
                                </form>
                                
                        <div class="form-group col-md-12 mb-4 ">
<!--                            <button type="btn" class="btn btn-primary edit-profile-btn">Edit</button>-->
<a onclick="benifit_form_submit('<?php echo $id; ?>');" class="btn btn-success save-profile-btn" style="">Update & Save</a>
<!--                            <button type="reset" class="btn btn-outline-secondary ks-light reset-profile-btn" style="display: none;">Reset</button>-->
                        </div>                    
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="table-responsiveX">
                                    <table id="benifit_table" class="table table-bordered table-list mb-0">
                                                <thead>
                                                <tr>
                                                    <th width="10"></th>
                                                    <th>Policy Name</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    <?php
                                                    if(!empty($all_employee_policy))
                                                    {
                                                        foreach ($all_employee_policy as $value) {
                                                            
                                                    
                                                    ?>
                                                    <tr id="benifit_delete<?php echo @$value->id; ?>">
                                                    <td scope="row">1</td>
                                                    <td><?php echo @$value->policy_name;?></td>
                                                    <td class="table-action">
                                                        <div class="dropdown">
                                                        <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="la la-ellipsis-v"></span>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                            <a class="dropdown-item" onclick="goforbenifitedit('<?php echo @$value->id;?>')"><span title="Delete" class="la la-pencil"></span> Edit</a>
                                                            <a class="dropdown-item" onclick="goforbenifitdelete('<?php echo @$value->id;?>')"><span title="Delete" class="la la-trash"></span> Delete</a>
                                                        </div>
                                                    </div>
                                                        
                                                        
                                                    </td>
                                                </tr>
                                                <?php
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    
                </div>
            </div>
            <div class="tab-pane fade p-0" id="pills-leave-application" role="tabpanel" aria-labelledby="pills-leave-application-tab">
                <div class="form-box">
                	<h6 class="form-box-heading">Leave Application List</h6>
<!--                        <span class="ks-text mt-2">Leave Application List</span>-->
<!--                        <a href="#" class="btn btn-outline-primary ks-light ks-no-text edit-profile-btn"><span class="la la-pencil ks-icon"></span></a>-->
                        <a href="#" class="btn btn-outline-primary ks-light ks-no-text save-profile-btn" style="display: none;"><span class="la la-save ks-icon"></span></a>
                    </h5>
                    
                       
                            <script>
                                function openaddform(){
                                   $('#leave_application_form_div').show(); 
                                }
                            </script>
                            <form name="leave_application_form" id="leave_application_form" method="post">
                             <input type="hidden" name="leave_application_edit_id" id="leave_application_edit_id" value=""> 
                            <a href="javascript:void(0);" onclick="openaddform();" type="btn" class="btn btn-outline-primary btn-add-leave btnDisabled">Add Leave Application</a>
<!--                            <a href="javascript:void(0);" type="btn" class="btn btn-outline-primary mt-4 ml-3 btn-add-leave-settlement disabled btnDisabled">Add Leave Settlement</a>-->

                            <div class="card panel panel-default add-leave mt-2" id="leave_application_form_div" style="display: none;">
                                <h5 class="card-header" style="font-size: 13px;">
                                    Add Leave
                                </h5>
                                <?php
                                                    if(!empty($all_leave_type))
                                                    {
                                                    foreach ($all_leave_type as $value) {

                                                   //$result=  $this->EmployeesModel->leave_due_day($value->id,$id);
                                                   //  $result1 =  $this->EmployeesModel->settlement_due_day($value->id,$id);
                                                  // $due=$value->unit - ($result + $result1);
                                                   //$due=$value->unit - $result;
                                                    $result=  $this->EmployeesModel->leave_due_day($value->id,base64_decode($id));
                                                    if(!empty($result)){
                                                    $due=$result;
                                                    }else{
                                                    $due=0;
                                                    }
                                                    
                                                    ?>
                                <input type="hidden" name="due_leave<?php echo $value->id;?>" id="due_leave<?php echo $value->id;?>" value="<?php echo $due;?>" />
                                                    
                                                    <?php
                                                    }
                                                    }
                                                    ?>
                                <div class="card-block">
                                    <div class="row">
                                        
                                         <div class="col-sm-6 col-xl-4">
                                            <div class="form-group">
                                                <label for="" class="form-control-label">Leave Type</label>
                                                <select name="leave_type" id="leave_type" class="form-control">
                                                    <option value="">Select</option> 
                                                    <?php
                                                    if(!empty($all_leave_type))
                                                    {
                                                        $leave_rule_id=explode(',',$grade_wise_leave[0]->leave_rule_id);
                                                        //echo '<pre>';print_r($leave_rule_id);
                                                    foreach ($all_leave_type as $value) {

                                                   //$result=  $this->EmployeesModel->leave_due_day($value->id,$id);
                                                    //$result1 =  $this->EmployeesModel->settlement_due_day($value->id,$id);
                                                  // $due=$value->unit - ($result + $result1);
                                                   //$due=$value->unit - $result;
                                                    $result=  $this->EmployeesModel->leave_due_day($value->id,base64_decode($id));
                                                    //print_r($result); 
                                                    if(!empty($result)){
                                                    $due=$result;
                                                    }else{
                                                    $due=0;
                                                    }
                                                    if (in_array($value->id, $leave_rule_id))
  {
                                                    ?>
                                                    <option value="<?php echo $value->id;?>"><?php echo $value->rule_name .' ( Due: '.$due.' )';?></option>
                                                    <?php
  }
                                                    }
                                                    }
                                                    ?>
                                                </select>
<!--                                                <input type="text" name="leave_type" id="leave_type" placeholder="Enter ticket amount" class="form-control">-->
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="form-group">
                                                <label for="" class="form-control-label">From Date</label> 
                                                <input type="text" name="leave_from"   id="leave_from"  value="" placeholder="Select date" class="form-control ks-daterange-single flatpickrnew">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="form-group">
                                                <label for="" class="form-control-label">To Date</label>
                                                <input type="text" name="leave_to" id="leave_to" value=""  placeholder="Select date" class="form-control ks-daterange-single flatpickrnew">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="form-group">
                                                <label for="" class="form-control-label">Total Days</label>
                                                <input type="text" name="leave_total_days" readonly id="leave_total_days" value="" placeholder="Enter total days" class="form-control">
                                            </div>
                                        </div>
                                    
                                        <div class="col-sm-6 col-xl-4" style="display: none;">
                                            <div class="form-group">
                                                <label class="d-block">Ticket</label>
                                                <div class="d-inline-block mt-2">
                                                    <div class="custom-control custom-radio ks-radio ks-success">
                                                        <input  type="radio" class="custom-control-input" name="leave_ticket" id="leave_ticket" value="Yes"
                                                               data-validation="radio_group"
                                                               data-validation-qty="min1">
                                                        <label class="custom-control-label" for="leave_ticket">Yes</label>
                                                    </div>
                                                </div>
                                                <div class="d-inline-block mt-2 ml-3">
                                                    <div class="custom-control custom-radio ks-radio ks-danger">
                                                        <input  type="radio" class="custom-control-input" name="leave_ticket" id="leave_ticket1" value="No"
                                                               data-validation="radio_group"
                                                               data-validation-qty="min1">
                                                        <label class="custom-control-label" for="leave_ticket1">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xl-4" style="display: none;">
                                            <div class="form-group">
                                                <label for="" class="form-control-label">Ticket Amount</label>
                                                <input type="text" name="leave_ticket_amount" id="leave_ticket_amount" placeholder="Enter ticket amount" class="form-control">
                                            </div>
                                        </div>
<!--                                        <div class="col-sm-6 col-xl-4">
                                            <div class="form-group">
                                                <label for="" class="form-control-label">Paid Amount</label>
                                                <input type="text" placeholder="Enter paid salary amount" class="form-control">
                                            </div>
                                        </div>-->
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="" class="form-control-label">Note</label>
                                                <textarea name="leave_note" id="leave_note" placeholder="Enter note" class="form-control inputDisabled" style="min-height: 60px; line-height: 20px;"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-1 mt-2">
                                    <a onclick="leave_application_form_submit('<?php echo $id; ?>')" id="leave_add" class="btn btn-success">Save</a>
                                    <a href="javascript:void(0);" onclick="closeaddform();" type="btn" class="btn btn-outline-secondary ks-light btn-add-leave-close ml-3">Close</a>
                                </div>
                                </div>
                               
                                
                            </div>
 </form>
                              <script>
                                function closeaddform(){
                                   $("#leave_application_form").find("input[type=text], select, textarea, file, radio").val("");
                                   $('#leave_application_form_div').hide(); 
                                }
                            </script>

                            <div class="ks-user-list-view-table mt-4">
                                <div class="table-responsiveX">
                                    <table id="leave_application_table" class="table table-bordered table-list mb-0" data-pagination="true">
                                        <thead>
<!--                                            <tr>
                                                <th colspan="9">Leave List</th>
                                            </tr>-->
                                            <tr>
                                                <th>From<br>Date</th>
                                                <th>To<br>Date</th>
                                                <th>Total<br>Days</th>
                                               <!-- <th>Ticket</th>
                                                <!--<th>Ticket<br>Amount</th>-->
                                                 <th>Approval<br>Status</th>
<!--                                                <th>Paid<br>Amount</th>-->
<!--                                                <th>Credited<br>Amount</th>-->
                                                <th>Remarks</th>
                                                <?php
                                                 if($this->session->userdata('type')=='management')
                                                 {
                                                ?>
                                                <th></th>
                                                <?php
                                                 }
                                                 ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php
                                                    if(!empty($all_employee_leave_application))
                                                    {
                                                    foreach ($all_employee_leave_application as $value) {
                                                        ?>
                                                    
                                            <tr id="leave_application_delete<?php echo @$value->id; ?>">
                                                <td>
                                                    <?php echo @$value->leave_from; ?>
                                                </td>
                                                <td>
                                                   <?php echo @$value->leave_to; ?>
                                                </td>
                                                <td>
                                                   <?php echo @$value->leave_total_days; ?>
                                                </td>
                                                <!--<td>
                                                   <?php echo @$value->leave_ticket; ?>
                                                </td>
                                                <td>
                                                   <?php echo @$value->leave_ticket_amount; ?>
                                                </td>-->
                                                <td>
                                                    <?php
                                                            if(@$value->approved=='No')
                                                            {
                                                            ?>
                                                            <?php echo @$value->approved;?>
                                                            <?php
                                                            }
                                                            ?>
                                                             <?php
                                                            if(@$value->approved=='')
                                                            {
                                                            ?>
                                                            New 
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if(@$value->approved=='Yes')
                                                            {
                                                            ?>
                                                            <?php echo @$value->approved;?>
                                                       <?php
                                                            }
                                                            ?>
                                                </td>
<!--                                                <td>
                                                    $20
                                                </td>-->
<!--                                                <td>
                                                    $20
                                                </td>-->
                                                <td>
                                                    <?php echo @$value->leave_note; ?>
                                                </td>
                                                <?php
                                                 if($this->session->userdata('type')=='management')
                                                 {
                                                ?>
                                                <td class="table-action">
                                                    <div class="dropdown">
                                                        <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="la la-ellipsis-v"></span>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                            <a onclick="goforleaveapplicationdit('<?php echo @$value->id;?>')" class="dropdown-item" style="cursor:pointer;">
                                                                <span class="la la-pencil icon text-info"></span> Edit
                                                            </a>
                                                            <!-- <a class="dropdown-item" onclick="goforleaveapplicationdelete('<?php echo @$value->id;?>')"><span class="la la-trash icon text-danger"></span> Delete</a> -->
                                                            <?php
                                                            if(@$value->approved=='No')
                                                            {
                                                            ?>
                                                            <a class="dropdown-item" onclick="goforleaveapproval('<?php echo @$value->id;?>','Yes','<?php echo @$id;?>')">Make Approve</a>
                                                            <?php
                                                            }
                                                            ?>
                                                             <?php
                                                            if(@$value->approved=='')
                                                            {
                                                            ?>
                                                            <a class="dropdown-item" onclick="goforleaveapproval('<?php echo @$value->id;?>','Yes','<?php echo @$id;?>')">Make Approve(New)</a>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if(@$value->approved=='Yes')
                                                            {
                                                            ?>
                                                            <a class="dropdown-item" onclick="goforleaveapproval('<?php echo @$value->id;?>','No','<?php echo @$id;?>')">Make Not Approve</a>
                                                       <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </td>
                                                <?php
                                                 }
                                                 ?>
                                            </tr>
                                            <?php
                                                    }
                                                    }
                                                    ?>
                                            
                                            
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                      
                    
                </div>
            </div>
            
            
            <div class="tab-pane fade p-0" id="tab-attendance">
                <div class="form-box">
                	<h6 class="form-box-heading">Attendance</h6>
                    <div class="row">
                        <div class="col-sm-2">
                             <h6 style="background-color:red; width: 12px; height: 12px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Holiday</h6>
                        </div>
                        <div class="col-sm-2">
                             <h6 style="background-color:#a950af; width: 12px; height: 12px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Present</h6>
                        </div>
                        <div class="col-sm-2">
                             <h6 style="background-color:#da9090; width: 12px; height: 12px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HalfDay</h6>
                        </div>
                        <div class="col-sm-2">
                            <h6 style="background-color:#4bbcd8; width: 12px; height: 12px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Late</h6>
                        </div>
                        
                         <div class="col-sm-2">
                          <h6 style="background-color:#c0a7c2; width: 12px; height: 12px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Absent</h6>
                        </div>
                          <div class="col-sm-2">
                         <h6 style="background-color:#a5c3de; width: 12px; height: 12px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Outside</h6>
                        </div>
                          <div class="col-sm-2">
                         <h6 style="background-color:#5c5c5d; width: 12px; height: 12px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Early Leave</h6>
                        </div>
                         <div class="col-sm-2">
                         <h6 style="background-color:yellow; width: 12px; height: 12px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OffDay(F)</h6>
                        </div>
                        <div class="col-sm-2">
                         <h6 style="background-color:#6c3cc1; width: 12px; height: 12px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OffDay(H)</h6>
                        </div>

                        <div class="col-sm-2">
                         <h6 style="background-color:#54af50; width: 12px; height: 12px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Leave</h6>
                        </div>
                    </div>
                    
                    
                     
                       
                          
                            
                              

                  
                 <!--   <div class="clearfix btn-group">
                        <a href="#" class="btn btn-outline-primary ks-light ks-no-text" ><span class="la la-download ks-icon"></span></a>
                        <div class="dropdown d-inline-block">
                        <button type="button" class="btn btn-outline-primary ks-light dropdown-toggle" data-toggle="dropdown">
                          Year
                        </button>
                        <?php $start_yr = '2019';
                        $end_yr = date('Y');
                        ?>

                        <div class="dropdown-menu">
                            <?php for ($i=2019; $i <= $end_yr; $i++) {  ?>
                               <a class="dropdown-item" href="javascript:void(0)" onclick="getAttData('<?php echo $i; ?>','<?php echo $id; ?>');"><?php echo $i; ?></a>
                            <?php } ?>                          
                        </div>
                      </div>                        
                    
                        </div> -->                   
                            <div class="ks-user-list-view-table mt-4">
                                <div class="table-responsive" style="overflow-x:scroll;">
                                    <table id="example" class="table table-bordered table-list dt-responsive table-emp-attendance">
                                        <thead>
                                            <tr>
                                                <th nowrap>Month</th>
                                                <th>1</th>
                                                <th>2</th>
                                                <th>3</th>
                                                <th>4</th>
                                                <th>5</th>
                                                <th>6</th>
                                                <th>7</th>
                                                <th>8</th>
                                                <th>9</th>
                                                <th>10</th>                                  
                                                <th>11</th>                                    
                                                <th>12</th>                                   
                                                <th>13</th>                                     
                                                <th>14</th>                                     
                                                <th>15</th>                                    
                                                <th>16</th>                                     
                                                <th>17</th>                                     
                                                <th>18</th>                                    
                                                <th>19</th>                                    
                                                <th>20</th>                                     
                                                <th>21</th>                                    
                                                <th>22</th>                                     
                                                <th>23</th>                                    
                                                <th>24</th>                                    
                                                <th>25</th>                                    
                                                <th>26</th>                                   
                                                <th>27</th>                                   
                                                <th>28</th>                                    
                                                <th>29</th>                                   
                                                <th>30</th>                                     
                                                <th>31</th>                                    
                                            </tr>
                                        </thead>
                                        <tbody id="AttData">

                                           <tr>
                                                <td class="" nowrap>January</td>
                                                <?php //echo '<pre>'; print_r($att_january); die; ?>
                                             <?php /*?> <?php for ($i=01; $i <= 31 ; $i++) { 
                                                        $dayJan = date('l',strtotime('2020-01-'.$i));
                                                      
                                                        if((!empty($att_january)) &&  (array_key_exists(sprintf('%02d', $i),$att_january))){ 
                                                           
                                                                $attJanuary = explode('_', @$att_january[sprintf('%02d', $i)]);
                                                          
                                                            ?>
                                                             <?php 
                                                             if((!empty($att_january)) && (!empty($attJanuary[0]) && $attJanuary[0]=='Full Day')){ ?><td class="text-success">P <?php if(!empty($attJanuary[1]) && $attJanuary[1] == 'Late'){ echo '/L';}else{ echo '';} ?></td>
                                                        <?php }elseif((!empty($att_january)) && ($attJanuary[0]=='Half Day')){ ?>
                                                            <td class="text-success">H<?php if($attJanuary[1] == 'Late'){ echo '/L';}else{ echo '';} ?></td>
                                                            <?php }elseif((!empty($att_january)) && (@$att_january[$i]=='Absent')){ ?>
                                                                 <td class="text-danger">A</td> 
                                                            <?php } ?>
                                                            <?php }elseif(!empty($att_january['futuredate']) && (in_array(sprintf('%02d', $i),$att_january['futuredate'])) ){ ?>
                                                             <td class="text-danger">-</td> 
                                                        <?php }elseif(array_key_exists($dayJan,$offshiftarr)){?>
                                                            <td class="text-success">Off</td>
                                                       <?php }elseif(!empty($att_january['holidays']) && (in_array(sprintf('%02d', $i),$att_january['holidays'])) ){ ?>
                                                             <td style="background-color: red;"></td> 
                                                        <?php }else { ?>
                                                             <td class="text-danger">A</td> 
                                                 <?php } }?><?php */ ?>
                                                
                                                <?php for ($i=01; $i <= 31 ; $i++) {
                                                    $text = '';
                                                    $text2 = '';
                                                    $bg='';
                                                    $holiday = array();
                                                    $dayJan = date('l',strtotime('2020-01-'.$i));   
                                                    $curdate = date('Y-m-d',strtotime('2020-01-'.$i));
                                                    $weekNo = getWeeks($curdate,$dayJan);
                                                   



                                                      if((!empty($att_january)) &&  (array_key_exists(sprintf('%02d', $i),$att_january))){
                                                        $attJanuary = explode('_', @$att_january[sprintf('%02d', $i)]);
                                                        if((!empty($att_january)) && (!empty($attJanuary[0]) && $attJanuary[0]=='Full Day')){ // present day
                                                            $text = 'P';
                                                            $bg='background:#a950af';
                                                            array_push($holiday,'#a950af');;
                                                           if(!empty($attJanuary[1]) && $attJanuary[1] == 'Late'){ $text.='/L'; $bg='background:#4bbcd8'; array_push($holiday,'#4bbcd8'); } 
                                                           


                                                            }else{ // absent/half day/o
                                                                $text='A';
                                                                //$bg='background:#c0a7c2';
                                                                if((!empty($att_january)) && (@$att_january[$i]=='Absent')){
                                                                    $text = 'A';
                                                                    //$bg='background:#c0a7c2';
                                                                }

                                                               
                                                                if((!empty($att_january)) && ($attJanuary[0]=='Half Day')){
                                                                     $text = 'H';
                                                                     $bg='background:#da9090';
                                                                     array_push($holiday,'#da9090');
                                                                     if($attJanuary[1] == 'Late'){ $text.='/L'; $bg='background:#4bbcd8'; array_push($holiday,'#4bbcd8');}
                                                                }

                                                            }
                                                    }else{
                                                        $text='A';
                                                       
                                                    }
                                                    $j = str_pad($i, 2, "0", STR_PAD_LEFT);

                                                    if((!empty($att_january)) && (@$att_january[$j]=='WFH')){
                                                        $text = 'WFH';
                                                        $bg='background:#2c80d6';
                                                        array_push($holiday,'#2c80d6');
                                                    }
                                                    if((!empty($att_january)) && (@$att_january[$j]=='OD')){
                                                        $text = 'OD';
                                                        $bg='background:#a5c3de';
                                                        array_push($holiday,'#a5c3de');
                                                    }

                                                   
                                                    if(!empty($offshiftarr)){
                                                       foreach ($offshiftarr as $key => $variable) {
                                                            if($key == $weekNo){
                                                                foreach ($variable as $key => $value) {
                                                                //echo $dayJan;
                                                                    if($dayJan == $key){
                                                                       //#6c3cc1->half//#yellow->full
                                                                        if($value == 'Half'){
                                                                        $bg='background:#6c3cc1;';
                                                                        // array_push($holiday,'#6c3cc1');
                                                                        }else{
                                                                        $bg='background:yellow;';   
                                                                        if (strpos($text, 'A') !== false) {
                                                                        $text='';
                                                                        }
                                                                        }
                                                                    array_push($holiday,$bg);
                                                                    }
                                                                    }
                                                                }
                                                          
                                                       }
                                                   }
                                                          //  $text = '';
                                                            
                                                        //$bg = 'background-image: linear-gradient(to right, red , yellow);';

                                                    //}

                                                   

                                                     if(!empty($att_january['early_leave']) && (in_array(sprintf('%02d', $i),$att_january['early_leave'])) ){
                                                        $text = 'EL';
                                                         $bg='background:#5c5c5d';
                                                          array_push($holiday,'#5c5c5d');
                                                    }

                                                    if(!empty($att_january['futuredate']) && (in_array(sprintf('%02d', $i),$att_january['futuredate'])) ){
                                                        $text = '-';
                                                    }
                                                    if(!empty($att_january['holidays']) && (in_array(sprintf('%02d', $i),$att_january['holidays'])) ){
                                                        $bg='background:red;';
                                                         array_push($holiday,'red');
                                                        if (strpos($text, 'A') !== false) {
                                                            $text='';
                                                        }
                                                    }

                                                   

                                                    if(!empty($att_january['leaves']) && (in_array(sprintf('%02d', $i),$att_january['leaves'])) ){
                                                        $text = 'L';
                                                        $bg='background:#54af50';
                                                        array_push($holiday,'#54af50');
                                                    }

                                                    

                                                    
                                                ?>

                                                <!--<td style="<?=$bg?>"><?=$text?></td>-->
                                                <td 
                                                 style="<?php if(!empty($holiday) && count($holiday) > '1'){
                                                    $strholiday = implode(',', $holiday);
                                                    echo 'background-image: linear-gradient(to right,'.$strholiday.');';
                                                 }else{
                                                    echo $bg;
                                                 }?>"><?=$text?></td>
                                                 <?php } ?>
                                            </tr>



                                            <tr>
                                                <td class="" nowrap>February</td>
                                                 <?php /* ?>  <?php for ($i=01; $i <= 31 ; $i++) {
                                                        if(date('Y')>='2020' && date('m') < '02'){
                                                           echo '<td class="text-danger">-</td>';  
                                                        }else{
                                                            $dayfeb = date('l',strtotime('2020-02-'.$i));
                                                            if((!empty($att_february)) &&  (array_key_exists(sprintf('%02d', $i),$att_february))){ 
                                                                 $attFebruary = explode('_', $att_february[sprintf('%02d', $i)]);?>
                                                            <?php if((!empty($att_february)) && ($attFebruary[0]=='Full Day')){ ?><td class="text-success">P<?php if($attFebruary[1] == 'Late'){ echo '/L';}else{ echo '';} ?></td>
                                                            <?php }elseif((!empty($att_february)) && ($attFebruary[0]=='Half Day')){ ?>
                                                            <td class="text-success">H<?php if($attFebruary[1] == 'Late'){ echo '/L';}else{ echo '';} ?></td>
                                                            <?php }elseif((!empty($att_february)) && ($att_february[$i]=='Absent')){ ?>
                                                            <td class="text-danger">A</td> 
                                                            <?php } ?>
                                                           <?php  }elseif(!empty($att_february['futuredate']) && (in_array(sprintf('%02d', $i),$att_february['futuredate'])) ){
                                                                echo '<td class="text-danger">A</td>'; 
                                                            }else{
                                                                echo '<td class="text-danger">-</td>';  
                                                            }
                                                        }
                                             }?><?php */ ?>
                                              <?php /* ?><?php for ($i=01; $i <= 31 ; $i++) {
                                                $text = '';
                                                    $bg='';
                                                if(date('Y')>='2020' && date('m') < '02'){
                                                          $text = '-';
                                                        }else{
                                                    
                                                      $dayfeb = date('l',strtotime('2020-02-'.$i));   
                                                      if((!empty($att_february)) &&  (array_key_exists(sprintf('%02d', $i),$att_february))){                                              
                                                        $attFebruary = explode('_', @$att_february[sprintf('%02d', $i)]);
                                                        if((!empty($att_february)) && (!empty($attFebruary[0]) && $attFebruary[0]=='Full Day')){ // present day
                                                            $text = 'P';
                                                           if(!empty($attFebruary[1]) && $attFebruary[1] == 'Late'){ $text.='/L';} 
                                                        }else{ // absent/half day/o
                                                            $text='A';
                                                            if((!empty($att_february)) && (@$att_february[$i]=='Absent')){
                                                                $text = 'A';
                                                            }
                                                            if((!empty($att_february)) && ($attFebruary[0]=='Half Day')){
                                                                 $text = 'H';
                                                                 if($attFebruary[1] == 'Late'){ $text.='/L';}
                                                            }
                                                        }
                                                    }else{
                                                        $text='A';
                                                    }

                                                    $j = str_pad($i, 2, "0", STR_PAD_LEFT);

                                                    if((!empty($att_february)) && (@$att_february[$j]=='WFH')){
                                                        $text = 'WFH';
                                                    }
                                                    if((!empty($att_february)) && (@$att_february[$j]=='OD')){
                                                        $text = 'OD';
                                                    }

                                                    if(array_key_exists($dayfeb,$offshiftarr)){
                                                            $bg='background:yellow;';
                                                    }

                                                     if(!empty($att_february['early_leave']) && (in_array(sprintf('%02d', $i),$att_february['early_leave'])) ){
                                                        $text = 'EL';
                                                    }

                                                    if(!empty($att_february['futuredate']) && (in_array(sprintf('%02d', $i),$att_february['futuredate'])) ){
                                                        $text = '-';
                                                    }
                                                    if(!empty($att_february['holidays']) && (in_array(sprintf('%02d', $i),$att_february['holidays'])) ){
                                                        $bg='background:red;';
                                                        if (strpos($text, 'A') !== false) {
                                                            $text='';
                                                        }
                                                    }

                                                     if(!empty($att_february['leaves']) && (in_array(sprintf('%02d', $i),$att_february['leaves'])) ){
                                                        $text = 'L';
                                                    }
                                                }
                                                ?>

                                                  <td style="<?=$bg?>"><?=$text?></td>
                                                 <?php } ?><?php */ ?>
                                                 <?php //echo '<pre>'; print_r($att_february);?>
                                                  <?php for ($i=01; $i <= 31 ; $i++) {
                                                    $text_f = '';
                                                    $text2 = '';
                                                    $bg_f='';
                                                    $holiday_f = array();
                                                    $dayfeb = date('l',strtotime('2020-02-'.$i));   
                                                    $curdate_f = date('Y-m-d',strtotime('2020-02-'.$i));
                                                    $weekNo_f = getWeeks($curdate_f,$dayfeb);
                                                   

                                                        if(date('Y')>='2020' && date('m') < '02'){
                                                            $text_f = '-';
                                                        }else{

                                                      if((!empty($att_february)) &&  (array_key_exists(sprintf('%02d', $i),$att_february))){

                                                        $attFeb = explode('_', @$att_february[sprintf('%02d', $i)]);
                                                        //echo '<pre>'; print_r($att_february); die;
                                                        if((!empty($att_february)) && (!empty($attFeb[0]) && $attFeb[0]=='Full Day')){ // present day

                                                            $text_f = 'P';
                                                            $bg_f='background:#a950af';
                                                            array_push($holiday_f,'#a950af');;
                                                           if(!empty($attFeb[1]) && $attFeb[1] == 'Late'){ $text_f.='/L'; $bg_f='background:#4bbcd8'; array_push($holiday_f,'#4bbcd8'); } 
                                                           


                                                            }else{ // absent/half day/o
                                                                $text_f='A';
                                                                //$bg='background:#c0a7c2';
                                                                if((!empty($att_february)) && (@$att_february[$i]=='Absent')){
                                                                    $text_f = 'A';
                                                                    //$bg='background:#c0a7c2';
                                                                }

                                                               
                                                                if((!empty($att_february)) && ($attFeb[0]=='Half Day')){
                                                                     $text_f = 'H';
                                                                     $bg_f='background:#da9090';
                                                                     array_push($holiday_f,'#da9090');
                                                                     if($attFeb[1] == 'Late'){ $text_f.='/L'; $bg_f='background:#4bbcd8'; array_push($holiday_f,'#4bbcd8');}
                                                                }

                                                            }
                                                    }else{
                                                        $text_f='A';
                                                       
                                                    }
                                                    $j = str_pad($i, 2, "0", STR_PAD_LEFT);

                                                    if((!empty($att_february)) && (@$att_february[$j]=='WFH')){
                                                        $text_f = 'WFH';
                                                        $bg_f='background:#2c80d6';
                                                        array_push($holiday_f,'#2c80d6');
                                                    }
                                                    if((!empty($att_february)) && (@$att_february[$j]=='OD')){
                                                        $text_f = 'OD';
                                                        $bg_f='background:#a5c3de';
                                                        array_push($holiday_f,'#a5c3de');
                                                    }

                                                   
                                                    if(!empty($offshiftarr)){
                                                      
                                                       foreach ($offshiftarr as $key => $variable) {
                                                         //echo '<pre>'; print_r($variable); die;
                                                            if($key == $weekNo_f){
                                                                //echo '<pre>'; print_r($key); die;
                                                                foreach ($variable as $key => $value) {
                                                                //echo $dayJan;
                                                                    if($dayfeb == $key){
                                                                       //#6c3cc1->half//#yellow->full
                                                                        if($value == 'Half'){
                                                                        $bg_f='background:#6c3cc1;';
                                                                        // array_push($holiday,'#6c3cc1');
                                                                        }else{
                                                                        $bg_f='background:yellow;';   
                                                                        if (strpos($text_f, 'A') !== false) {
                                                                        $text_f='';
                                                                        }
                                                                        }
                                                                    array_push($holiday_f,$bg_f);
                                                                    }
                                                                    }
                                                                }
                                                          
                                                       }
                                                   }
                                                          //  $text = '';
                                                            
                                                        //$bg = 'background-image: linear-gradient(to right, red , yellow);';

                                                    //}

                                                   

                                                     if(!empty($att_february['early_leave']) && (in_array(sprintf('%02d', $i),$att_february['early_leave'])) ){
                                                        $text_f = 'EL';
                                                         $bg_f='background:#5c5c5d';
                                                          array_push($holiday_f,'#5c5c5d');
                                                    }

                                                    if(!empty($att_february['futuredate']) && (in_array(sprintf('%02d', $i),$att_february['futuredate'])) ){
                                                        $text_f = '-';
                                                    }
                                                    if(!empty($att_february['holidays']) && (in_array(sprintf('%02d', $i),$att_february['holidays'])) ){
                                                        $bg_f='background:red;';
                                                         array_push($holiday_f,'red');
                                                        if (strpos($text_f, 'A') !== false) {
                                                            $text_f='';
                                                        }
                                                    }

                                                   

                                                    if(!empty($att_february['leaves']) && (in_array(sprintf('%02d', $i),$att_february['leaves'])) ){
                                                        $text_f = 'L';
                                                        $bg_f='background:#54af50';
                                                        array_push($holiday_f,'#54af50');
                                                    }

                                                    
                                                }
                                                    
                                                ?>

                                                <!--<td style="<?=$bg?>"><?=$text?></td>-->
                                                <td 
                                                 style="<?php if(!empty($holiday_f) && count($holiday_f) > '1'){
                                                    $strholiday_f = implode(',', $holiday_f);
                                                    echo 'background-image: linear-gradient(to right,'.$strholiday_f.');';
                                                 }else{
                                                    echo $bg_f;
                                                 }?>"><?=$text_f?></td>
                                                 <?php } ?>
                                            </tr>

                                            <tr>
                                                <td class="" nowrap>March</td>
                                                  
                                             <?php for ($i=01; $i <= 31 ; $i++) {
                                                $text = '';
                                                    $bg='';
                                                if(date('Y')>='2020' && date('m') < '03'){
                                                          $text = '-';
                                                        }else{
                                                    
                                                      $daymar = date('l',strtotime('2020-03-'.$i));   
                                                      if((!empty($att_march)) &&  (array_key_exists(sprintf('%02d', $i),$att_march))){                                              
                                                        $attMarch = explode('_', @$att_march[sprintf('%02d', $i)]);
                                                        if((!empty($att_march)) && (!empty($attMarch[0]) && $attMarch[0]=='Full Day')){ // present day
                                                            $text = 'P';
                                                           if(!empty($attMarch[1]) && $attMarch[1] == 'Late'){ $text.='/L';} 
                                                        }else{ // absent/half day/o
                                                            $text='A';
                                                            if((!empty($att_march)) && (@$att_march[$i]=='Absent')){
                                                                $text = 'A';
                                                            }
                                                            if((!empty($att_march)) && ($attMarch[0]=='Half Day')){
                                                                 $text = 'H';
                                                                 if($attMarch[1] == 'Late'){ $text.='/L';}
                                                            }
                                                        }
                                                    }else{
                                                        $text='A';
                                                    }

                                                     $j = str_pad($i, 2, "0", STR_PAD_LEFT);

                                                    if((!empty($att_march)) && (@$att_march[$j]=='WFH')){
                                                        $text = 'WFH';
                                                    }
                                                    if((!empty($att_march)) && (@$att_march[$j]=='OD')){
                                                        $text = 'OD';
                                                    }
                                                    if(array_key_exists($daymar,$offshiftarr)){
                                                            $bg='background:yellow;';
                                                    }

                                                     if(!empty($att_march['early_leave']) && (in_array(sprintf('%02d', $i),$att_march['early_leave'])) ){
                                                        $text = 'EL';
                                                    }

                                                    if(!empty($att_march['futuredate']) && (in_array(sprintf('%02d', $i),$att_march['futuredate'])) ){
                                                        $text = '-';
                                                    }
                                                    if(!empty($att_march['holidays']) && (in_array(sprintf('%02d', $i),$att_march['holidays'])) ){
                                                        $bg='background:red;';
                                                        if (strpos($text, 'A') !== false) {
                                                            $text='';
                                                        }
                                                    }

                                                      if(!empty($att_march['leaves']) && (in_array(sprintf('%02d', $i),$att_march['leaves'])) ){
                                                        $text = 'L';
                                                    }
                                                }
                                                ?>

                                                  <td style="<?=$bg?>"><?=$text?></td>
                                                 <?php } ?>
                                            </tr>

                                            <tr>
                                                <td class="" nowrap>April</td>
                                                
                                              <?php for ($i=01; $i <= 31 ; $i++) {
                                                $text = '';
                                                    $bg='';
                                                if(date('Y')>='2020' && date('m') < '04'){
                                                          $text = '-';
                                                        }else{
                                                    
                                                      $dayapril = date('l',strtotime('2020-04-'.$i));   
                                                      if((!empty($att_april)) &&  (array_key_exists(sprintf('%02d', $i),$att_april))){                                              
                                                        $attApril = explode('_', @$att_april[sprintf('%02d', $i)]);
                                                        if((!empty($att_april)) && (!empty($attApril[0]) && $attApril[0]=='Full Day')){ // present day
                                                            $text = 'P';
                                                           if(!empty($attApril[1]) && $attApril[1] == 'Late'){ $text.='/L';} 
                                                        }else{ // absent/half day/o
                                                            $text='A';
                                                            if((!empty($att_april)) && (@$att_april[$i]=='Absent')){
                                                                $text = 'A';
                                                            }
                                                            if((!empty($att_april)) && ($attApril[0]=='Half Day')){
                                                                 $text = 'H';
                                                                 if($attApril[1] == 'Late'){ $text.='/L';}
                                                            }
                                                        }
                                                    }else{
                                                        $text='A';
                                                    }

                                                    $j = str_pad($i, 2, "0", STR_PAD_LEFT);

                                                    if((!empty($att_april)) && (@$att_april[$j]=='WFH')){
                                                        $text = 'WFH';
                                                    }
                                                    if((!empty($att_april)) && (@$att_april[$j]=='OD')){
                                                        $text = 'OD';
                                                    }

                                                    if(array_key_exists($dayapril,$offshiftarr)){
                                                          $bg='background:yellow;';
                                                    }

                                                     if(!empty($att_april['early_leave']) && (in_array(sprintf('%02d', $i),$att_april['early_leave'])) ){
                                                        $text = 'EL';
                                                    }

                                                    if(!empty($att_april['futuredate']) && (in_array(sprintf('%02d', $i),$att_april['futuredate'])) ){
                                                        $text = '-';
                                                    }
                                                    if(!empty($att_april['holidays']) && (in_array(sprintf('%02d', $i),$att_april['holidays'])) ){
                                                        $bg='background:red;';
                                                        if (strpos($text, 'A') !== false) {
                                                            $text='';
                                                        }
                                                    }

                                                     if(!empty($att_april['leaves']) && (in_array(sprintf('%02d', $i),$att_april['leaves'])) ){
                                                        $text = 'L';
                                                    }
                                                }
                                                ?>

                                                  <td style="<?=$bg?>"><?=$text?></td>
                                                 <?php } ?>
                                            </tr>

                                           <tr>
                                                <td class="" nowrap>May</td>
                                               

                                             <?php for ($i=01; $i <= 31 ; $i++) {
                                                $text = '';
                                                    $bg='';
                                                if(date('Y')>='2020' && date('m') < '05'){
                                                          $text = '-';
                                                        }else{
                                                    
                                                      $daymay = date('l',strtotime('2020-05-'.$i));   
                                                      if((!empty($att_may)) &&  (array_key_exists(sprintf('%02d', $i),$att_may))){                                              
                                                        $attMay = explode('_', @$att_may[sprintf('%02d', $i)]);
                                                        if((!empty($att_may)) && (!empty($attMay[0]) && $attMay[0]=='Full Day')){ // present day
                                                            $text = 'P';
                                                           if(!empty($attMay[1]) && $attMay[1] == 'Late'){ $text.='/L';} 
                                                        }else{ // absent/half day/o
                                                            $text='A';
                                                            if((!empty($att_may)) && (@$att_may[$i]=='Absent')){
                                                                $text = 'A';
                                                            }
                                                            if((!empty($att_may)) && ($attMay[0]=='Half Day')){
                                                                 $text = 'H';
                                                                 if($attMay[1] == 'Late'){ $text.='/L';}
                                                            }
                                                        }
                                                    }else{
                                                        $text='A';
                                                    }

                                                    $j = str_pad($i, 2, "0", STR_PAD_LEFT);

                                                    if((!empty($att_may)) && (@$att_may[$j]=='WFH')){
                                                        $text = 'WFH';
                                                    }
                                                    if((!empty($att_may)) && (@$att_may[$j]=='OD')){
                                                        $text = 'OD';
                                                    }

                                                    if(array_key_exists($daymay,$offshiftarr)){
                                                            $bg='background:yellow;';
                                                    }

                                                     if(!empty($att_may['early_leave']) && (in_array(sprintf('%02d', $i),$att_may['early_leave'])) ){
                                                        $text = 'EL';
                                                    }

                                                    if(!empty($att_may['futuredate']) && (in_array(sprintf('%02d', $i),$att_may['futuredate'])) ){
                                                        $text = '-';
                                                    }
                                                    if(!empty($att_may['holidays']) && (in_array(sprintf('%02d', $i),$att_may['holidays'])) ){
                                                        $bg='background:red;';
                                                        if (strpos($text, 'A') !== false) {
                                                            $text='';
                                                        }
                                                    }

                                                    if(!empty($att_may['leaves']) && (in_array(sprintf('%02d', $i),$att_may['leaves'])) ){
                                                        $text = 'L';
                                                    }

                                                }
                                                ?>

                                                  <td style="<?=$bg?>"><?=$text?></td>
                                                 <?php } ?>
                                            </tr>


                                            <tr>
                                                <td class="" nowrap>June</td>
                                                  

                                             <?php for ($i=01; $i <= 31 ; $i++) {
                                                $text = '';
                                                    $bg='';
                                                if(date('Y')>='2020' && date('m') < '06'){
                                                          $text = '-';
                                                        }else{
                                                    
                                                      $dayJune = date('l',strtotime('2020-06-'.$i));   
                                                      if((!empty($att_june)) &&  (array_key_exists(sprintf('%02d', $i),$att_june))){                                              
                                                        $attJune = explode('_', @$att_june[sprintf('%02d', $i)]);
                                                        if((!empty($att_june)) && (!empty($attJune[0]) && $attJune[0]=='Full Day')){ // present day
                                                            $text = 'P';
                                                           if(!empty($attJune[1]) && $attJune[1] == 'Late'){ $text.='/L';} 
                                                        }else{ // absent/half day/o
                                                            $text='A';
                                                            if((!empty($att_june)) && (@$att_june[$i]=='Absent')){
                                                                $text = 'A';
                                                            }
                                                            if((!empty($att_june)) && ($attJune[0]=='Half Day')){
                                                                 $text = 'H';
                                                                 if($attJune[1] == 'Late'){ $text.='/L';}
                                                            }
                                                        }
                                                    }else{
                                                        $text='A';
                                                    }

                                                    $j = str_pad($i, 2, "0", STR_PAD_LEFT);

                                                    if((!empty($att_june)) && (@$att_june[$j]=='WFH')){
                                                        $text = 'WFH';
                                                    }
                                                    if((!empty($att_june)) && (@$att_june[$j]=='OD')){
                                                        $text = 'OD';
                                                    } 
                                                    if(array_key_exists($dayJune,$offshiftarr)){
                                                           $bg='background:yellow;';
                                                    }

                                                     if(!empty($att_june['early_leave']) && (in_array(sprintf('%02d', $i),$att_june['early_leave'])) ){
                                                        $text = 'EL';
                                                    }

                                                    if(!empty($att_june['futuredate']) && (in_array(sprintf('%02d', $i),$att_june['futuredate'])) ){
                                                        $text = '-';
                                                    }
                                                    if(!empty($att_june['holidays']) && (in_array(sprintf('%02d', $i),$att_june['holidays'])) ){
                                                        $bg='background:red;';
                                                        if (strpos($text, 'A') !== false) {
                                                            $text='';
                                                        }
                                                    }

                                                      if(!empty($att_june['leaves']) && (in_array(sprintf('%02d', $i),$att_june['leaves'])) ){
                                                        $text = 'L';
                                                    }
                                                }
                                                ?>

                                                  <td style="<?=$bg?>"><?=$text?></td>
                                                 <?php } ?>

                                            </tr>

                                            <tr>
                                                <td class="" nowrap>July</td>
                                                

                                              <?php for ($i=01; $i <= 31 ; $i++) {
                                                $text = '';
                                                    $bg='';
                                                if(date('Y')>='2020' && date('m') < '07'){
                                                          $text = '-';
                                                        }else{
                                                    
                                                      $dayJuly = date('l',strtotime('2020-07-'.$i));   
                                                      if((!empty($att_july)) &&  (array_key_exists(sprintf('%02d', $i),$att_july))){                                              
                                                        $attJuly = explode('_', @$att_july[sprintf('%02d', $i)]);
                                                        if((!empty($att_july)) && (!empty($attJuly[0]) && $attJuly[0]=='Full Day')){ // present day
                                                            $text = 'P';
                                                           if(!empty($attJuly[1]) && $attJuly[1] == 'Late'){ $text.='/L';} 
                                                        }else{ // absent/half day/o
                                                            $text='A';
                                                            if((!empty($att_july)) && (@$att_july[$i]=='Absent')){
                                                                $text = 'A';
                                                            }
                                                            if((!empty($att_july)) && ($attJuly[0]=='Half Day')){
                                                                 $text = 'H';
                                                                 if($attJuly[1] == 'Late'){ $text.='/L';}
                                                            }
                                                        }
                                                    }else{
                                                        $text='A';
                                                    }

                                                     $j = str_pad($i, 2, "0", STR_PAD_LEFT);

                                                    if((!empty($att_july)) && (@$att_july[$j]=='WFH')){
                                                        $text = 'WFH';
                                                    }
                                                    if((!empty($att_july)) && (@$att_july[$j]=='OD')){
                                                        $text = 'OD';
                                                    } 
                                                    if(array_key_exists($dayJuly,$offshiftarr)){
                                                          $bg='background:yellow;';
                                                    }

                                                     if(!empty($att_july['early_leave']) && (in_array(sprintf('%02d', $i),$att_july['early_leave'])) ){
                                                        $text = 'EL';
                                                    }

                                                    if(!empty($att_july['futuredate']) && (in_array(sprintf('%02d', $i),$att_july['futuredate'])) ){
                                                        $text = '-';
                                                    }
                                                    if(!empty($att_july['holidays']) && (in_array(sprintf('%02d', $i),$att_july['holidays'])) ){
                                                        $bg='background:red;';
                                                        if (strpos($text, 'A') !== false) {
                                                            $text='';
                                                        }
                                                    }

                                                     if(!empty($att_july['leaves']) && (in_array(sprintf('%02d', $i),$att_july['leaves'])) ){
                                                        $text = 'L';
                                                    }
                                                }
                                                ?>

                                                  <td style="<?=$bg?>"><?=$text?></td>
                                                 <?php } ?>



                                            </tr>

                                            <tr>
                                                <td class="" nowrap>August</td>
                                              
                                             <?php for ($i=01; $i <= 31 ; $i++) {
                                                $text = '';
                                                    $bg='';
                                                if(date('Y')>='2020' && date('m') < '08'){
                                                          $text = '-';
                                                        }else{
                                                    
                                                      $dayAug = date('l',strtotime('2020-08-'.$i));   
                                                      if((!empty($att_august)) &&  (array_key_exists(sprintf('%02d', $i),$att_august))){                                              
                                                        $attAugust = explode('_', @$att_august[sprintf('%02d', $i)]);
                                                        if((!empty($att_august)) && (!empty($attAugust[0]) && $attAugust[0]=='Full Day')){ // present day
                                                            $text = 'P';
                                                           if(!empty($attAugust[1]) && $attAugust[1] == 'Late'){ $text.='/L';} 
                                                        }else{ // absent/half day/o
                                                            $text='A';
                                                            if((!empty($att_august)) && (@$att_august[$i]=='Absent')){
                                                                $text = 'A';
                                                            }
                                                            if((!empty($att_august)) && ($attAugust[0]=='Half Day')){
                                                                 $text = 'H';
                                                                 if($attAugust[1] == 'Late'){ $text.='/L';}
                                                            }
                                                        }
                                                    }else{
                                                        $text='A';
                                                    }

                                                    $j = str_pad($i, 2, "0", STR_PAD_LEFT);

                                                    if((!empty($att_august)) && (@$att_august[$j]=='WFH')){
                                                        $text = 'WFH';
                                                    }
                                                    if((!empty($att_august)) && (@$att_august[$j]=='OD')){
                                                        $text = 'OD';
                                                    } 
                                                    if(array_key_exists($dayAug,$offshiftarr)){
                                                          $bg='background:yellow;';
                                                    }

                                                     if(!empty($att_august['early_leave']) && (in_array(sprintf('%02d', $i),$att_august['early_leave'])) ){
                                                        $text = 'EL';
                                                    }

                                                    if(!empty($att_august['futuredate']) && (in_array(sprintf('%02d', $i),$att_august['futuredate'])) ){
                                                        $text = '-';
                                                    }
                                                    if(!empty($att_august['holidays']) && (in_array(sprintf('%02d', $i),$att_august['holidays'])) ){
                                                        $bg='background:red;';
                                                        if (strpos($text, 'A') !== false) {
                                                            $text='';
                                                        }
                                                    }
                                                     if(!empty($att_august['leaves']) && (in_array(sprintf('%02d', $i),$att_august['leaves'])) ){
                                                        $text = 'L';
                                                    }
                                                }
                                                ?>

                                                  <td style="<?=$bg?>"><?=$text?></td>
                                                 <?php } ?>
                                            </tr>

                                            <tr>
                                                <td class="" nowrap>September</td>
                                                  
                                             <?php for ($i=01; $i <= 31 ; $i++) {
                                                $text = '';
                                                    $bg='';
                                                if(date('Y')>='2020' && date('m') < '09'){
                                                          $text = '-';
                                                        }else{
                                                    
                                                      $daySep = date('l',strtotime('2020-09-'.$i));   
                                                      if((!empty($att_september)) &&  (array_key_exists(sprintf('%02d', $i),$att_september))){                                              
                                                        $attSep = explode('_', @$att_september[sprintf('%02d', $i)]);
                                                        if((!empty($att_september)) && (!empty($attSep[0]) && $attSep[0]=='Full Day')){ // present day
                                                            $text = 'P';
                                                           if(!empty($attSep[1]) && $attSep[1] == 'Late'){ $text.='/L';} 
                                                        }else{ // absent/half day/o
                                                            $text='A';
                                                            if((!empty($att_september)) && (@$att_september[$i]=='Absent')){
                                                                $text = 'A';
                                                            }
                                                            if((!empty($att_september)) && ($attSep[0]=='Half Day')){
                                                                 $text = 'H';
                                                                 if($attSep[1] == 'Late'){ $text.='/L';}
                                                            }
                                                        }
                                                    }else{
                                                        $text='A';
                                                    }


                                                    $j = str_pad($i, 2, "0", STR_PAD_LEFT);

                                                    if((!empty($att_september)) && (@$att_september[$j]=='WFH')){
                                                        $text = 'WFH';
                                                    }
                                                    if((!empty($att_september)) && (@$att_september[$j]=='OD')){
                                                        $text = 'OD';
                                                    } 
                                                    if(array_key_exists($daySep,$offshiftarr)){
                                                           $bg='background:yellow;';
                                                    }

                                                     if(!empty($att_september['early_leave']) && (in_array(sprintf('%02d', $i),$att_september['early_leave'])) ){
                                                        $text = 'EL';
                                                    }

                                                    if(!empty($att_september['futuredate']) && (in_array(sprintf('%02d', $i),$att_september['futuredate'])) ){
                                                        $text = '-';
                                                    }
                                                    if(!empty($att_september['holidays']) && (in_array(sprintf('%02d', $i),$att_september['holidays'])) ){
                                                        $bg='background:red;';
                                                        if (strpos($text, 'A') !== false) {
                                                            $text='';
                                                        }
                                                    }

                                                    if(!empty($att_september['leaves']) && (in_array(sprintf('%02d', $i),$att_september['leaves'])) ){
                                                        $text = 'L';
                                                    }
                                                }
                                                ?>

                                                  <td style="<?=$bg?>"><?=$text?></td>
                                                 <?php } ?>
                                            </tr>

                                            <tr>
                                                <td class="" nowrap>October</td>
                                               

                                               <?php for ($i=01; $i <= 31 ; $i++) {
                                                $text = '';
                                                    $bg='';
                                                if(date('Y')>='2020' && date('m') < '10'){
                                                          $text = '-';
                                                        }else{
                                                    
                                                      $dayOct = date('l',strtotime('2020-10-'.$i));   
                                                      if((!empty($att_october)) &&  (array_key_exists(sprintf('%02d', $i),$att_october))){                                              
                                                        $attOct = explode('_', @$att_october[sprintf('%02d', $i)]);
                                                        if((!empty($att_october)) && (!empty($attOct[0]) && $attOct[0]=='Full Day')){ // present day
                                                            $text = 'P';
                                                           if(!empty($attOct[1]) && $attOct[1] == 'Late'){ $text.='/L';} 
                                                        }else{ // absent/half day/o
                                                            $text='A';
                                                            if((!empty($att_october)) && (@$att_october[$i]=='Absent')){
                                                                $text = 'A';
                                                            }
                                                            if((!empty($att_october)) && ($attOct[0]=='Half Day')){
                                                                 $text = 'H';
                                                                 if($attOct[1] == 'Late'){ $text.='/L';}
                                                            }
                                                        }
                                                    }else{
                                                        $text='A';
                                                    }

                                                    $j = str_pad($i, 2, "0", STR_PAD_LEFT);

                                                    if((!empty($att_october)) && (@$att_october[$j]=='WFH')){
                                                        $text = 'WFH';
                                                    }
                                                    if((!empty($att_october)) && (@$att_october[$j]=='OD')){
                                                        $text = 'OD';
                                                    } 
                                                    if(array_key_exists($dayOct,$offshiftarr)){
                                                            $bg='background:yellow;';
                                                    }

                                                     if(!empty($att_october['early_leave']) && (in_array(sprintf('%02d', $i),$att_october['early_leave'])) ){
                                                        $text = 'EL';
                                                    }

                                                    if(!empty($att_october['futuredate']) && (in_array(sprintf('%02d', $i),$att_october['futuredate'])) ){
                                                        $text = '-';
                                                    }
                                                    if(!empty($att_october['holidays']) && (in_array(sprintf('%02d', $i),$att_october['holidays'])) ){
                                                        $bg='background:red;';
                                                        if (strpos($text, 'A') !== false) {
                                                            $text='';
                                                        }
                                                    }

                                                    if(!empty($att_october['leaves']) && (in_array(sprintf('%02d', $i),$att_october['leaves'])) ){
                                                        $text = 'L';
                                                    }
                                                }
                                                ?>

                                                  <td style="<?=$bg?>"><?=$text?></td>
                                                 <?php } ?>
                                            </tr>

                                            <tr>
                                                <td class="" nowrap>November</td>
                                               
                                              <?php for ($i=01; $i <= 31 ; $i++) {
                                                $text = '';
                                                    $bg='';
                                                if(date('Y')>='2020' && date('m') < '11'){
                                                          $text = '-';
                                                        }else{
                                                    
                                                      $dayNov = date('l',strtotime('2020-11-'.$i));   
                                                      if((!empty($att_november)) &&  (array_key_exists(sprintf('%02d', $i),$att_november))){                                              
                                                        $attNov = explode('_', @$att_november[sprintf('%02d', $i)]);
                                                        if((!empty($att_november)) && (!empty($attNov[0]) && $attNov[0]=='Full Day')){ // present day
                                                            $text = 'P';
                                                           if(!empty($attNov[1]) && $attNov[1] == 'Late'){ $text.='/L';} 
                                                        }else{ // absent/half day/o
                                                            $text='A';
                                                            if((!empty($att_november)) && (@$att_november[$i]=='Absent')){
                                                                $text = 'A';
                                                            }
                                                            if((!empty($att_november)) && ($attNov[0]=='Half Day')){
                                                                 $text = 'H';
                                                                 if($attNov[1] == 'Late'){ $text.='/L';}
                                                            }
                                                        }
                                                    }else{
                                                        $text='A';
                                                    }

                                                    $j = str_pad($i, 2, "0", STR_PAD_LEFT);

                                                    if((!empty($att_november)) && (@$att_november[$j]=='WFH')){
                                                        $text = 'WFH';
                                                    }
                                                    if((!empty($att_november)) && (@$att_november[$j]=='OD')){
                                                        $text = 'OD';
                                                    } 
                                                    if(array_key_exists($dayNov,$offshiftarr)){
                                                           $bg='background:yellow;';
                                                    }

                                                     if(!empty($att_november['early_leave']) && (in_array(sprintf('%02d', $i),$att_november['early_leave'])) ){
                                                        $text = 'EL';
                                                    }

                                                    if(!empty($att_november['futuredate']) && (in_array(sprintf('%02d', $i),$att_november['futuredate'])) ){
                                                        $text = '-';
                                                    }
                                                    if(!empty($att_november['holidays']) && (in_array(sprintf('%02d', $i),$att_november['holidays'])) ){
                                                        $bg='background:red;';
                                                        if (strpos($text, 'A') !== false) {
                                                            $text='';
                                                        }
                                                    }

                                                    if(!empty($att_november['leaves']) && (in_array(sprintf('%02d', $i),$att_november['leaves'])) ){
                                                        $text = 'L';
                                                    }
                                                }
                                                ?>

                                                  <td style="<?=$bg?>"><?=$text?></td>
                                                 <?php } ?>
                                            </tr>

                                            <tr>
                                                <td class="" nowrap>December</td>
                                                 

                                             <?php for ($i=01; $i <= 31 ; $i++) {
                                                $text = '';
                                                    $bg='';
                                                if(date('Y')>='2020' && date('m') < '12'){
                                                          $text = '-';
                                                        }else{
                                                    
                                                      $dayDec = date('l',strtotime('2020-12-'.$i));   
                                                      if((!empty($att_december)) &&  (array_key_exists(sprintf('%02d', $i),$att_december))){                                              
                                                        $attDec = explode('_', @$att_december[sprintf('%02d', $i)]);
                                                        if((!empty($att_december)) && (!empty($attDec[0]) && $attDec[0]=='Full Day')){ // present day
                                                            $text = 'P';
                                                           if(!empty($attDec[1]) && $attDec[1] == 'Late'){ $text.='/L';} 
                                                        }else{ // absent/half day/o
                                                            $text='A';
                                                            if((!empty($att_december)) && (@$att_december[$i]=='Absent')){
                                                                $text = 'A';
                                                            }
                                                            if((!empty($att_december)) && ($attDec[0]=='Half Day')){
                                                                 $text = 'H';
                                                                 if($attDec[1] == 'Late'){ $text.='/L';}
                                                            }
                                                        }
                                                    }else{
                                                        $text='A';
                                                    }
                                                    $j = str_pad($i, 2, "0", STR_PAD_LEFT);

                                                    if((!empty($att_december)) && (@$att_december[$j]=='WFH')){
                                                        $text = 'WFH';
                                                    }
                                                    if((!empty($att_december)) && (@$att_december[$j]=='OD')){
                                                        $text = 'OD';
                                                    } 
                                                    if(array_key_exists($dayDec,$offshiftarr)){
                                                           $bg='background:yellow;';
                                                    }

                                                     if(!empty($att_december['early_leave']) && (in_array(sprintf('%02d', $i),$att_december['early_leave'])) ){
                                                        $text = 'EL';
                                                    }

                                                    if(!empty($att_december['futuredate']) && (in_array(sprintf('%02d', $i),$att_december['futuredate'])) ){
                                                        $text = '-';
                                                    }
                                                    if(!empty($att_december['holidays']) && (in_array(sprintf('%02d', $i),$att_december['holidays'])) ){
                                                        $bg='background:red;';
                                                        if (strpos($text, 'A') !== false) {
                                                            $text='';
                                                        }
                                                    }

                                                     if(!empty($att_december['leaves']) && (in_array(sprintf('%02d', $i),$att_december['leaves'])) ){
                                                        $text = 'L';
                                                    }
                                                }
                                                ?>

                                                  <td style="<?=$bg?>"><?=$text?></td>
                                                 <?php } ?>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                        
                    </div>
                    
                    </div>                    
                
            </div>
            
            
            
            
            <div class="tab-pane fade p-0" id="pills-expenses" role="tabpanel" aria-labelledby="pills-expenses-tab">
                
                
                <div style="display:none;" id="expenseaddForm">
                <form name="expenses" id="expenses"   method="post">
                    
                    <input type="hidden" name="expenses_edit_id" id="expenses_edit_id" value=""> 
                    <div class="form-box">
                	<h6 class="form-box-heading">Expenses Details</h6>
                    <div class="row">
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Expenses Name</label>
                                <input type="text" placeholder="Enter Expenses Name" class="form-control inputDisabled" name='expenses_name' required id='expenses_name' value="" >
                            </div>
                        </div>
                      <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">From Year</label>
                                <select name='from_year' required id='from_year' class="form-control inputDisabled" >
                                     <option value="">Please select</option>
                                    <?php
                                    $now=date('Y');
                                    $before=$now-10;
                                    $after=$now+1;
                                    for ($index = $before; $index <= $after; $index++) {
                                        
                                    
                                    ?>
                                   
                                    <option value="<?php echo @$index;?>"><?php echo @$index;?></option>
                                   <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">To Year</label>
                                <select name='to_year' required id='to_year' class="form-control inputDisabled" >
                                    <option value="">Please select</option>
                                    <?php
                                    $now=date('Y');
                                    $before=$now-10;
                                    $after=$now+1;
                                    for ($index = $before; $index <= $after; $index++) {
                                        
                                    
                                    ?>
                                   
                                    <option value="<?php echo @$index;?>"><?php echo @$index;?></option>
                                   <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Visa Cost</label>
                                <input type="text" placeholder="Enter Visa Cost" class="form-control inputDisabled" name='visa_cost'  id='visa_cost' value="" >
                            </div>
                        </div>
                    
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Insurance Cost</label>
                                <input type="text" placeholder="Enter Insurance Cost" class="form-control inputDisabled" name='insurance_cost' required id='insurance_cost' value="">
                            </div>
                        </div>
                         <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Others Cost</label>
                                <input type="text" placeholder="Enter Others Cost" class="form-control inputDisabled" name='other_cost' required id='other_cost' value="">
                            </div>
                        </div>
                    </div>
                    
                </div>
                    </form>
                    <div class="">
                        <div class="form-group mt-3 mb-5">
<!--                            <button type="btn" class="btn btn-primary edit-profile-btn">Edit</button>-->
                            <a onclick="expenses_form_submit('<?php echo $id; ?>')" class="btn btn-success">Update & Save</a>
<!--                            <button type="reset" class="btn btn-outline-secondary ks-light reset-profile-btn" style="display: none;">Reset</button>-->
                        </div>
                    </div>
            </div>
                
                <script>
                    function openaddFormnew(){
                     $('#expenseaddForm').show();   
                    }
                </script>
                <div class="form-box">
                	<h6 class="form-box-heading">Full Expenses</h6>
                        <a href="javascript:void(0);" onclick="openaddFormnew();" type="btn" class="btn btn-outline-primary mt-2 btn-add-loan btnDisabled">Add Expenses</a>

                            <div class="ks-user-list-view-table mt-4">
                                <div class="table-responsiveX">
                                    <table id="ks-datatable44" class="table table-bordered table-list mb-0">
                                        
                                   <?php
                                   if(!empty($expenses))
                                   {
                                   ?>
                                        <thead>
                                            
                                            <tr>
                                                <th></th>
                                                <th>Year</th>
                                                <th>Visa Cost</th>
                                                <th>Insurance Cost</th>
                                                <th>Others Costs</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                       foreach ($expenses as $value) {
                                           
                                       
                                            ?>
                                            <tr id="deleteexpen<?php echo @$value->id;?>">
                                                <td>
                                                    <?php echo @$value->expenses_name;?>
                                                </td>
                                                <td>
                                                     <?php echo @$value->from_year;?>- <?php echo @$value->to_year;?> 
                                                </td>
                                                <td>
                                                    $<?php echo @$value->visa_cost;?>
                                                </td>
                                                <td>
                                                    $<?php echo @$value->insurance_cost;?>
                                                </td>
                                                <td>
                                                    $<?php echo @$value->other_cost;?>
                                                </td>
                                                <td class="table-action">
                                                    <div class="dropdown">
                                                        <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="la la-ellipsis-v"></span>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                            <a class="dropdown-item" onclick="goforexpensesedit('<?php echo @$value->id;?>')">
                                                                <span class="la la-pencil icon text-info"></span> Edit
                                                            </a>
                                                            <a class="dropdown-item" onclick="goforexpensesdelete('<?php echo @$value->id;?>')"><span class="la la-trash icon text-danger"></span> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                       }
                                       ?>
                                            
                                        </tbody>
                                        <?php
                                   }
                                   ?>
                                    </table>
                                </div>
                            </div>
                    
                </div>

                
            </div>
            
            
            <div class="tab-pane fade p-0" id="pills-bank" role="tabpanel" aria-labelledby="pills-bank-tab">
                
                
                <div style="display:none;" id="bankForm">
                <form name="bank" id="bank"   method="post">
                    
                    <input type="hidden" name="bank_edit_id" id="bank_edit_id" value=""> 
                    <div class="form-box">
                	<h6 class="form-box-heading">Bank Details</h6>
                    <div class="row">
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Bank Name</label>
                                <input type="text" placeholder="Enter Bank Name" class="form-control inputDisabled" name='bank_name' required id='bank_name' value="" >
                            </div>
                        </div>
                      
                        
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Account Number</label>
                                <input type="text" placeholder="Enter Account Number" class="form-control inputDisabled" name='account_no'  id='account_no' value="" >
                            </div>
                        </div>
                    
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">IFSC CODE</label>
                                <input type="text" placeholder="Enter IFSC CODE" class="form-control inputDisabled" name='agent_rtn_code' required id='agent_rtn_code' value="">
                            </div>
                        </div>
                         <div class="col-sm-6 col-xl-6">
                            <div class="form-group">
                                <div class="d-inline-block mt-2 ml-3">
                                    <div class="custom-control custom-radio ks-radio ks-purple">
                                        <input id="default" type="radio" class="custom-control-input inputDisabled" value="1"  name='default'   <?php if(@$data_single->default_bank=='1'){ ?> checked="checked" <?php } ?> 
                                               data-validation="radio_group"
                                               data-validation-qty="min1">
                                        <label class="custom-control-label" for="default">Default</label>
                                    </div>
                                </div>
                                
                                <div class="d-inline-block mt-2 ml-3">
                                    <div class="custom-control custom-radio ks-radio ks-purple">
                                        <input id="default_no" type="radio" class="custom-control-input inputDisabled" value="0"  name='default'   <?php if(@$data_single->default=='0'){ ?> checked="checked" <?php } ?> 
                                               data-validation="radio_group"
                                               data-validation-qty="min1">
                                        <label class="custom-control-label" for="default_no">Not Default</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                    </form>
                    <div class="">
                        <div class="form-group mt-3 mb-5">
<!--                            <button type="btn" class="btn btn-primary edit-profile-btn">Edit</button>-->
                            <a onclick="bank_form_submit('<?php echo $id; ?>')" class="btn btn-success">Update & Save</a>
<!--                            <button type="reset" class="btn btn-outline-secondary ks-light reset-profile-btn" style="display: none;">Reset</button>-->
                        </div>
                    </div>
            </div>
                
                <script>
                    function openaddForm(){
                     $('#bankForm').show();   
                    }
                </script>
                <div class="form-box">
                	<h6 class="form-box-heading">Bank Details</h6>
                        <a href="javascript:void(0);" onclick="openaddForm();" type="btn" class="btn btn-outline-primary mt-2 btn-add-loan btnDisabled">Add Bank Deatils</a>

                            <div class="ks-user-list-view-table mt-4">
                                <div class="table-responsiveX">
                                    <table id="ks-datatable71" class="table table-bordered table-list mb-0">
                                        
                                   <?php
                                   if(!empty($bank))
                                   {
                                   ?>
                                        <thead>
                                            
                                            <tr>
<!--                                                <th></th>-->
                                                <th>Bank Name</th>
                                                <th>IFSC CODE</th>
                                                <th>Account Number</th>
                                                <th>Default</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(!empty($bank))
                                            {
                                       foreach ($bank as $value) {
                                           if($value->default_bank==1)
                                           {
                                               $default='default';
                                           }
                                           else{
                                              $default='';  
                                           }
                                       
                                            ?>
                                            <tr id="deletebank<?php echo @$value->id;?>">
                                                <td>
                                                    <?php echo @$value->bank_name;?>
                                                </td>
                                                <td>
                                                   <?php echo @$value->agent_rtn_code;?> 
                                                </td>
                                                <td>
                                                    <?php echo @$value->account_no;?>
                                                </td>
                                               <td>
                                                    <?php echo @$default;?>
                                                </td>
                                                <td class="table-action">
                                                    <div class="dropdown">
                                                        <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="la la-ellipsis-v"></span>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                            <a class="dropdown-item" onclick="goforbankedit('<?php echo @$value->id;?>')">
                                                                <span class="la la-pencil icon text-info"></span> Edit
                                                            </a>
                                                            <a class="dropdown-item" onclick="goforbankdelete('<?php echo @$value->id;?>')"><span class="la la-trash icon text-danger"></span> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                       }
                                            }
                                       ?>
                                            
                                        </tbody>
                                        <?php
                                   }
                                   ?>
                                    </table>
                                </div>
                            </div>
                    
                </div>

                
            </div>
            
            <div class="tab-pane fade p-0" id="pills-loans" role="tabpanel" aria-labelledby="pills-loans-tab">
                
                 <div style="display:none;" id="loanapplicationaddForm">
                <form name="loanapplication" id="loanapplication"   method="post" enctype="multipart/form-data" >
                    
                    <input type="hidden" name="loan_application_edit_id" id="loan_application_edit_id" value=""> 
                    <div class="form-box">
                	<h6 class="form-box-heading">Loan Application</h6>
                    <div class="row">
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Reference Name</label>
                                <input type="text" placeholder="Enter Reference Name" class="form-control inputDisabled" name='reference_name'  id='reference_name' value="" >
                            </div>
                        </div>
                      
                        
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Request Amount</label>
                                <input type="text" placeholder="Enter Visa Cost" required class="form-control inputDisabled" name='request_amount'  id='request_amount' value="" >
                            </div>
                        </div>                    
                    
                        
                       
                        <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Supporting Attachment</label>
                                    <div class="input-group">
<!--                                        <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" name="select" id="" required value="Society Id Front Image" >-->
                                        <div class="custom-file replaceCustomFile" >
                                            <input type="file" multiple class="custom-file-input" name="attachment[]" id="attachment">
                                            <label class="custom-file-label" for="attachment">Upload Multiple file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#attachment_modal" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                        </div>
                                        <!-- Society Id Front Modal -->
                                        <div class="modal fade" id="attachment_modal" tabindex="-1" role="dialog"aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Supporting Attachment</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div id="docs" class="text-center">
<!--                                                            <img src="<?php echo base_url(); ?>uploads/<?php echo @$data_qualification->society_id_front; ?>" alt="" class="img-fluid">-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="col-sm-12 col-xl-8">
                            <div class="form-group">
                                <label for="" class="form-control-label">Purpose Of Loan Note</label>
                                <textarea rows="4"  placeholder="Loan Requirement Note" class="form-control inputDisabled" name='loan_requirement_note'  id='loan_requirement_note'></textarea>
                            </div>
                        </div>
                        
                         <script>
                    function approvedform(value){
                        if(value=='Yes')
                        {
                     $('#approve_div').show();  
                     $('#nonapprove_div').hide();  
                        }
                        else{
                     $('#approve_div').hide();  
                     $('#nonapprove_div').show();    
                        }
                    }
                </script>
                    <?php
                                                 if($this->session->userdata('type')=='management')
                                                 {
                                                ?>
                        <div class="col-sm-6 col-xl-4">
                                            <div class="form-group">
                                                <label class="d-block">Loan Approved</label>
                                                <div class="d-inline-block mt-2">
                                                    <div class="custom-control custom-radio ks-radio ks-success">
                                                        <input id="loan_approved" type="radio" class="custom-control-input" onclick="approvedform(this.value);" value="Yes" name="loan_approved"
                                                               data-validation="radio_group"
                                                               data-validation-qty="min1">
                                                        <label class="custom-control-label" for="loan_approved">Yes</label>
                                                    </div>
                                                </div>
                                                <div class="d-inline-block mt-2 ml-3">
                                                    <div class="custom-control custom-radio ks-radio ks-danger">
                                                        <input id="loan_approved1" type="radio" class="custom-control-input" onclick="approvedform(this.value);" value="No" name="loan_approved" 
                                                               data-validation="radio_group"
                                                               data-validation-qty="min1">
                                                        <label class="custom-control-label" for="loan_approved1">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                <?php
                                                 }
                                                 ?>
                <div style="display:none;" class="row" id="approve_div">
                         <div class="col-sm-6 col-xl-5"> 
                            <div class="form-group">
                                <label for="" class="form-control-label">Loan Sanction Note</label>
                                <textarea rows="6"  placeholder="Loan Sanction Note" class="form-control inputDisabled" name='loan_sanction_note'  id='loan_sanction_note'></textarea>
                            </div>
                        </div>
                         
                        
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Loan Sanction Amount</label>
                                <input type="text" placeholder="Enter Loan Sanction Amount" onblur="gotocalculate(this.value)" class="form-control inputDisabled" name='sanction_amount'  id='sanction_amount' value="">
                            </div>
                        </div>
                        
                         
                        
                         <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Installment Start Date</label>
                                <input type="text" placeholder="Enter Installment Start Date" onblur="gotocalculate(this.value)" class="form-control flatpickrDate inputDisabled" name='installment_start_date'  id='installment_start_date' value="">
                            </div>
                        </div>
                        
                         <div class="col-sm-6 col-xl-4">
                                            <div class="form-group">
                                                <label class="d-block">Deduction From Salary</label>
                                                <div class="d-inline-block mt-2">
                                                    <div class="custom-control custom-radio ks-radio ks-success">
                                                        <input id="deduction_from_salary" type="radio" class="custom-control-input" value="Yes" name="deduction_from_salary"
                                                               data-validation="radio_group"
                                                               data-validation-qty="min1">
                                                        <label class="custom-control-label" for="deduction_from_salary">Yes</label>
                                                    </div>
                                                </div>
                                                <div class="d-inline-block mt-2 ml-3">
                                                    <div class="custom-control custom-radio ks-radio ks-danger">
                                                        <input id="deduction_from_salary1" type="radio" class="custom-control-input" value="No" name="deduction_from_salary" 
                                                               data-validation="radio_group"
                                                               data-validation-qty="min1">
                                                        <label class="custom-control-label" for="deduction_from_salary1">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                        
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Loan Issue Date</label>
                                <input type="text" placeholder="Enter Loan Issue Date"  class="form-control flatpickrDate inputDisabled" name='loan_issue_date'  id='loan_issue_date' value="" >
                            </div>
                        </div>
                    
                    <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Tenure In Months</label>
                                <input type="text" placeholder="Enter Tenure In Months" onblur="gotocalculate(this.value)" class="form-control  inputDisabled" name='tenure_in_months'  id='tenure_in_months' value="" >
                            </div>
                        </div>
                    
                    <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Installment amount</label>
                                <input type="text" readonly placeholder="Enter Installment amount" class="form-control inputDisabled" name='installment_amount'  id='installment_amount' value="">
                            </div>
                        </div>
                    
                     <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Loan End Date</label>
                                <input type="text" readonly  placeholder="Enter Loan End Date" class="form-control inputDisabled" name='loan_end_date'  id='loan_end_date' value="" >
                            </div>
                        </div>
                        
                </div>
                <div style="display:none;" class="col-xl-12" id="nonapprove_div">
                        <div class="col-sm-6 col-xl-5">
                            <div class="form-group">
                                <label for="" class="form-control-label">Loan Cancel Note</label>
                                <textarea rows="6"  placeholder="Loan Cancel Note" class="form-control inputDisabled" name='loan_cancel_note'  id='loan_cancel_note'></textarea>
                            </div>
                        </div>
                             </div>
                    </div>
                </div>
                    </form>
                    <div class="">
                        <div class="form-group mb-5">
<!--                            <button type="btn" class="btn btn-primary edit-profile-btn">Edit</button>-->
                            <a onclick="loan_application_form_submit('<?php echo $id; ?>')" class="btn btn-success">Update & Save</a>
<!--                            <button type="reset" class="btn btn-outline-secondary ks-light reset-profile-btn" style="display: none;">Reset</button>-->
                        </div>
                    </div>
            </div>
                
                
             
                
                
                <div style="display:none;" id="loanpaymentaddForm">
                <form name="loanpayment" id="loanpayment"   method="post" enctype="multipart/form-data" >
                    
                    <input type="hidden" name="loanpayment_edit_id" id="loanpayment_edit_id" value=""> 
                    <div class="form-box pb-0">
                	<h6 class="form-box-heading">Loan Payment Receive</h6>
                    <div class="row">
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Loan Id</label>
                                <select name='loan_id' required id='loan_id' onchange="loandetails(this.value)" class="form-control inputDisabled" >
                                     <option value="">Please select</option>
                                    <?php
                                   if(!empty($loan_application))
                                   {
                                       foreach ($loan_application as $value) {
                                         
                                    
                                    ?>
                                   
                                    <option value="<?php echo @$value->id;?>"><?php echo @$value->id;?></option>
                                   <?php
                                       }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                         <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Payment Date</label>
                                <input type="text"  placeholder="Enter Payment Date" class="form-control flatpickrDate inputDisabled" name='payment_date'  id='payment_date' value="" >
                            </div>
                        </div>
                    
                    <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Installment amount</label>
                                <input type="text"  placeholder="Enter Installment amount" class="form-control inputDisabled" name='installment_amount_pay'  id='installment_amount_pay' value="">
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                        <div class="xx">
                            <label for="" class="form-control-label">&nbsp;</label>
<!--                            <button type="btn" class="btn btn-primary edit-profile-btn">Edit</button>-->
                            <a style="margin-top: 10px;" onclick="loan_payment_form_submit('<?php echo $id; ?>')" class="btn btn-success">Payment</a>
<!--                            <button type="reset" class="btn btn-outline-secondary ks-light reset-profile-btn" style="display: none;">Reset</button>-->
                        </div>
                        </div>
                    
                  
                        <div id="loan_details_div" style="display:none;" class="col-sm-6 col-xl-5">
                            <div class="form-group">
                                <label style="color:red;font-weight: bold;" id="loan_details" for="" class="form-control-label"></label>
                                
                            </div>
                        </div>
                        
                        
                    </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="ks-user-list-view-table">
                                <div  class="table-responsive table-responsive">
                                    <table id="ks-datatable50"  class="table table-list table-bordered ">
                                        
                                  <?php
                                   if(!empty($loan_payment))
                                   {
                                   ?>
                                        <thead>
                                        
                                        <tr>
                                            <th>SL No</th>
                                            <th>Payment Date</th>
                                            <th>Amount</th>
                                            <th></th>
                                          
                                        </tr>
                                    </thead>
                                        <tbody>
                                            <?php
                                            $i=0;
                                       foreach ($loan_payment as $value) {
                                           $i++;
                                       
                                            ?>
                                            <tr id="deleteloan<?php echo @$value->id;?>">
                                                <td>
                                               <?php echo @$i; ?>
                                            </td>
                                            
                                            <td>
                                               <?php echo @$value->payment_date; ?>
                                            </td>
                                            <td>
                                                <?php echo @$value->amount; ?>
                                            </td>
                                            
                                                <td class="table-action">
                                                    <div class="dropdown">
                                                        <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="la la-ellipsis-v"></span>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">                                                            
                                                            <a class="dropdown-item" onclick="goforloanpaymentdelete('<?php echo @$value->id;?>')"><span class="la la-trash icon text-danger"></span> Delete</a>                                                           
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                       }
                                       ?>
                                            
                                        </tbody>
                                        <?php
                                   }
                                   ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                </div>
                </div>
                    </form>
                    
                   
            </div>
                
                
                
                <script>
                    function openaddLoanapplicationForm(){
                        $("#loanapplication").find("input[type=text], select, textarea, file, radio").val("");
                        
                     $('#loanapplicationaddForm').show();   
                    $('#loanpaymentaddForm').hide();
                    }
                    function openaddLoanpaymentForm(){
                        $("#loanpayment").find("input[type=text], select, textarea, file, radio").val("");
                     $('#loanapplicationaddForm').hide();   
                    $('#loanpaymentaddForm').show();
                    }
                </script>
                <div class="form-box">
                	<h6 class="form-box-heading">Loan Application List</h6>
                        <a href="javascript:void(0);" onclick="openaddLoanapplicationForm();" type="btn" class="btn btn-outline-primary btn-add-loan btnDisabled">Add Loan Application</a>
                        <?php
                                                 if($this->session->userdata('type')=='management')
                                                 {
                                                ?>
                        <a href="javascript:void(0);" onclick="openaddLoanpaymentForm();" type="btn" class="btn btn-outline-primary btn-add-loan btnDisabled">Add Loan Payment</a>
<?php
                                                 }
                                                 ?>
<div class="">
                        <div>
                            <div style="overflow-x: scroll;" class="ks-user-list-view-table mt-4">
                                <div class="table-responsiveX">
                                    <table id="ks-datatable49" class="table loan_application table-bordered table-list mb-0">
                                        
                                   <?php
                                   if(!empty($loan_application))
                                   {
                                   ?>
                                        <thead>
                                            <tr>
                                                <th>Loan<br>Id</th>
<!--                                            <th>Employee<br>Name</th>
                                            <th>Employee<br>No.</th>-->
                                            <th>Reference</th>
                                            <th>Issue<br>Date</th>
                                            <th>Loan<br>Amount</th>
                                            <th>Installment<br>Start Date</th>
                                            <th>Loan<br>End Date</th>
                                            <th>Installment<br>Amount</th>
                                            <th>Approved</th>
                                            <?php
                                                 if($this->session->userdata('type')=='management')
                                                 {
                                                ?>
                                            <th></th>
                                            <?php
                                                 }
                                                 ?>
                                        </tr>
                                            
                                        </thead>
                                        <tbody>
                                            <?php
                                       foreach ($loan_application as $value) {
                                           
                                       
                                            ?>
                                            <tr id="deleteapplication<?php echo @$value->id;?>">
                                                <td>
                                               <?php echo @$value->id; ?>
                                            </td>
<!--                                            <td>
                                                <?php echo @$value->first_name.' '.@$value->middle_name.' '.@$value->last_name; ?>
                                            </td>
                                            <td>
                                               <?php echo @$value->employee_no; ?>
                                            </td>-->
                                            <td>
                                                <?php echo @$value->reference_name; ?>
                                            </td>
                                            <td>
                                               <?php echo date("d M-Y", strtotime(@$value->loan_issue_date)); ?>
                                            </td>
                                            <td>
                                                <?php echo @$value->sanction_amount; ?>
                                            </td>
                                            <td>
                                                <?php echo date("d M-Y", strtotime(@$value->installment_start_date)); ?>
                                            </td>
                                            <td>
                                               <?php echo date("d M-Y", strtotime(@$value->loan_end_date)); ?>
                                            </td>
                                            <td>
                                               <?php echo @$value->installment_amount; ?>
                                            </td>
                                            <td>
                                               <?php echo @$value->loan_approved; ?>
                                            </td>
                                            <?php
                                                 if($this->session->userdata('type')=='management')
                                                 {
                                                ?>
                                                <td class="table-action">
                                                    <div class="dropdown">
                                                        <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="la la-ellipsis-v"></span>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                            <a class="dropdown-item" onclick="goforloan_applicationedit('<?php echo @$value->id;?>')">
                                                                <span class="la la-pencil icon text-info"></span> Edit
                                                            </a>
                                                            <a class="dropdown-item" onclick="goforloanapplicationdelete('<?php echo @$value->id;?>')"><span class="la la-trash icon text-danger"></span> Delete</a>
                                                        <?php
                                                            if($value->loan_close=='0')
                                                            {
                                                            ?>
                                                            <a class="dropdown-item" onclick="goforloanclose('<?php echo @$value->id;?>','<?php echo @$value->employee_id;?>')">Make Loan Close</a>
                                                        <?php
                                                            }
                                                            else{
                                                            ?>
                                                            <a style="cursor:pointer;color:red" class="dropdown-item" >Loan Has Closed</a>
                                                            <?php
                                                            }
                                                            ?>
                                                            <a class="dropdown-item" onclick="getallpayment('<?php echo @$value->id;?>')"  title="View">View Payment</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <?php
                                                 }
                                                 ?>
                                            </tr>
                                            <?php
                                       }
                                       ?>
                                            
                                        </tbody>
                                        <?php
                                   }
                                   ?>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="modal fade" id="loan_payment_details_modal" tabindex="-1" role="dialog"aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Loan Payment details</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div id="loan_payment_details" class="modal-body">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="tab-pane fade p-0" id="pills-warnings" role="tabpanel" aria-labelledby="pills-warnings-tab">
                <div class="card panel">
                    <h5 class="card-header">
                        <span class="ks-text mt-2">Warnings & Evaluation</span>
                        <a href="#" onclick="open_WarningsContainer();" class="btn btn-outline-primary ks-light ks-no-text edit-profile-btn"><span class="la la-pencil ks-icon"></span></a>
                        <a href="#" class="btn btn-outline-primary ks-light ks-no-text save-profile-btn" style="display: none;"><span class="la la-save ks-icon"></span></a>
                    </h5>
                    <div class="card-block">
                        <div id="WarningsContainer" style="display: none" >
                            <form closeForm onsubmit="return myfunction('Evaluation') ;" method="post" action="<?php echo  base_url('admin_add_warning_evaluation/'.$id)?>" name="Evaluation" id="Evaluation" enctype="multipart/form-data" >

                                 <div class="row">
                                    <div class="col-sm-6 col-xl-6" id="enter_amount"  >
                                        <input type="hidden" id="evaluation_id" name="evaluation_id" value="">
                                        <div class="form-group">
                                            <label for="" class="form-control-label">Type</label>
                                            <select name="evaluation_type" required="" id="evaluation_type" class="form-control ">
                                                <option value="">Please select</option>
                                                <option value="Superior_Evaluation" selected="selected">Superior Evaluation</option>
                                                <option value="Warning">Warning</option>
                                                <option value="Safety_Warning">Safety Warning</option>
                                                <option value="Complaint_from_Superior">Complaint from Superior</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xl-6" id="enter_amount"  >
                                        <div class="form-group">
                                            <label for="" class="form-control-label">Date</label>
                                            <input type="text" name="date" id="evaluation_date" placeholder="Select date" class="form-control flatpickrDate ks-daterange-single flatpickr-input active" readonly="readonly">
                                        </div>
                                    </div>
                                     <div class="col-sm-6 col-xl-12" id="enter_amount"  >
                                       <div class="form-group">
                                            <label for="" class="form-control-label">Note</label>
                                            <textarea placeholder="Enter note" name="note" id="evaluation_note" class="form-control" style="min-height: 120px; line-height: 20px;"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group form-buttons">
                                             <button type="submit" name="submit" class="btn btn-success save-profile-btn">Save</button>
                                             <a href="javascript:;" class="btn btn-secondary" onclick="close_WarningsContainer();" id="close_id" >Close</a>
                                        </div>
                                    </div>
                                </div>

                            </form>
                            
                        </div>
<!--                        <a href="javascript:void(0);" type="btn" class="btn btn-outline-primary mr-2 btn-add-warning1 disabled btnDisabled">Add New Superior Evaluation</a>
                        <a href="javascript:void(0);" type="btn" class="btn btn-outline-primary mr-2 btn-add-warning2 disabled btnDisabled">Add New Warning</a>
                        <a href="javascript:void(0);" type="btn" class="btn btn-outline-primary mr-2 btn-add-warning2 disabled btnDisabled">Add New Safety Warning</a>
                        <a href="javascript:void(0);" type="btn" class="btn btn-outline-primary mr-2 btn-add-warning2 disabled btnDisabled">Add New Complaint from Superior</a>-->

                        <div class="card panel panel-default add-warning1 mt-4" style="display: none;">
                            <h5 class="card-header" style="font-size: 13px;">
                                Add New Superior Evaluation
                            </h5>
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-sm-6 col-xl-4">
                                        <div class="form-group">
                                            <label for="" class="form-control-label">Warning Date</label>
                                            <input type="text" placeholder="Select date" class="form-control ks-daterange-single">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="" class="form-control-label">Note</label>
                                            <textarea placeholder="Enter note" class="form-control inputDisabled" style="min-height: 60px; line-height: 20px;" disabled="disabled"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="btn" class="btn btn-success">Add</button>
                                <a href="javascript:void(0);" type="btn" class="btn btn-outline-secondary ks-light btn-add-warning1-close ml-3">Close</a>
                            </div>
                        </div>
                        <div class="ks-user-list-view-table mt-4">
                            <div class="table-responsiveX">
                                <?php if($warning_evaluation) { ?>
                                <table id="ks-datatable4" class="table table-bordered table-list mb-0">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Date</th>
                                            <th>Remarks</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                      <tbody>
                                    <?php foreach ($warning_evaluation as $key => $each_warning_evaluation) {
                                        
                                      ?>
                                  
                                        <tr>
                                            <td>
                                                 <?php echo  str_replace("_"," ",$each_warning_evaluation->type);  ?>
                                            </td>
                                            <td>
                                                <?php echo  $each_warning_evaluation->warning_date  ?>
                                            </td>
                                            <td>
                                                 <?php echo  $each_warning_evaluation->note  ?>
                                            </td>
                                            <td class="table-action">
                                                <div class="dropdown">
                                                    <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="la la-ellipsis-v"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                        <a class="dropdown-item" href="javascript:void(0)"  data-value="<?php echo $each_warning_evaluation->id ; ?>" onclick="editEvaluation(<?php echo  $each_warning_evaluation->id;  ?>)" >
                                                            <span class="la la-pencil icon text-info"></span> Edit
                                                        </a>
                                                        <a class="dropdown-item" href="#" onclick="delete_this(<?php echo $each_warning_evaluation->id; ?>)" ><span class="la la-trash icon text-danger"></span> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                       
                                    <?php } ?>
                                    </tbody>
                                </table>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">                        
                            <button type="btn" class="btn btn-primary edit-profile-btn">Edit</button>
                            <button type="submit" class="btn btn-success save-profile-btn" style="display: none;">Update & Save</button>
                            <button type="reset" class="btn btn-outline-secondary ks-light reset-profile-btn" style="display: none;">Reset</button>                        
                    </div>
                </div>
            </div>
            <div class="tab-pane fade p-0" id="pills-complaints" role="tabpanel" aria-labelledby="pills-complaints-tab">
                <div class="card panel">
                    <h5 class="card-header">
                        <span class="ks-text mt-2">Complaints</span>
<!--                        <a href="#" class="btn btn-outline-primary ks-light ks-no-text edit-profile-btn"><span class="la la-pencil ks-icon"></span></a>-->
                        <a href="#" class="btn btn-outline-primary ks-light ks-no-text save-profile-btn" style="display: none;"><span class="la la-save ks-icon"></span></a>
                    </h5>
                    <div class="card-block pb-1">
                       class="table table-list" >                
                        <thead>
                        <tr>
                            <th>Type</th>
                            <th>Employee Name</th>
                             <th>Details</th>
                             <th>Date</th>
                             <th>Document</th>
<!--                            <th></th>-->
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                    $sl = 1;
                    if (!empty($all_data_complaints)) {
                      foreach ($all_data_complaints as $data) {
                    ?>

                            <tr>
                                <td><?php echo $data->type; ?></td>
                                <td><?php echo $data->first_name.' '.$data->middle_name.' '.$data->last_name.' ('.$data->employee_no.')'; ?></td>
                                <td><?php echo @$data->details; ?></td>
                                <td><?php echo @$data->entry_date; ?></td>
                                <td><a href="<?php echo base_url('employees_loanapplication_download/').@$data->image; ?>"> <?php echo $data->image; ?> </a></td>
<!--                                <td class="table-action">
                                    <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="la la-ellipsis-v"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                        <a class="dropdown-item pjaxCls" href="<?php echo base_url('page/69/'); ?><?php echo $data->id; ?>">
                                                <span class="la la-eye icon text-primary-on-hover"></span> View
                                            </a>
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="openForm(<?php echo $data->id; ?>);">
                                                <span class="la la-pencil icon text-info"></span> Edit
                                            </a>
                                    </div>                                                
                                </td>                     -->
                            </tr>                         
                            <?php $sl++; } } ?>                             
                        </tbody>
                    </table>
                    </div>
<!--                    <div class="card-footer">                        
                            <button type="btn" class="btn btn-primary edit-profile-btn">Edit</button>
                            <button type="submit" class="btn btn-success save-profile-btn" style="display: none;">Update & Save</button>
                            <button type="reset" class="btn btn-outline-secondary ks-light reset-profile-btn" style="display: none;">Reset</button>                        
                    </div>-->
                </div>
            </div>
            <div class="tab-pane fade p-0" id="pills-closure" role="tabpanel" aria-labelledby="pills-closure-tab">
                <div class="card panel">
                    <h5 class="card-header">
                        <span class="ks-text mt-2">Closure</span>
                        <a href="#" style="display: none;" onclick="openForm(' ');" class="btn btn-outline-primary ks-light ks-no-text edit-profile-btn btn-add-closure"><span class="la la-pencil ks-icon"></span></a>
                        <a href="#" class="btn btn-outline-primary ks-light ks-no-text save-profile-btn" style="display: none;"><span class="la la-save ks-icon"></span></a>
                    </h5>
                    <div class="card-block pb-1">
                        
                        <div class="add-closure mb-4" >

                            <form closeForm onsubmit="return myfunction('closure_form') ;" method="post" action="<?php echo  base_url('admin_add_closure/'.$id)?>" name="closure_form" id="closure_form" enctype="multipart/form-data" >

                                <div class="row">
                                    <div class="col-sm-6 col-xl-6" id="enter_amount"  >
                                        <div class="form-group">
                                            <label for="" class="form-control-label">Type</label>
                                            <select name="closure_type" required="" id="closure_type" class="form-control ">
                                                <option value="">Please select</option>
                                                <?php  if($closure){ ?>
                                                  
                                                <option value="Resignation" <?php echo ((isset($closure[0]->type) && ($closure[0]->type=="Resignation")) ? 'selected' : ''); ?> >Resignation</option>
                                                <option value="Termination" <?php echo ((isset($closure[0]->type) && ($closure[0]->type=="Termination")) ? 'selected' : ''); ?> >Termination</option>
                                                  <?php }else{ ?>
                                                  <option value="" selected >Please select</option>  
                                                  <option value="Resignation" selected="selected">Resignation</option>
                                                  <option value="Termination">Termination</option>
                                                  <?php }  ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xl-6" id="enter_amount"  >
                                        <div class="form-group">
                                            <label for="" class="form-control-label">Last day of work</label>
                                            <input type="text" name="last_day_of_work" id="last_day_of_work" placeholder="Select date" class="form-control flatpickrDate ks-daterange-single flatpickr-input active" readonly="readonly" value="<?php echo ((isset($closure[0]->entry_date)) ? $closure[0]->entry_date : ''); ?>" >
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xl-6" id="enter_amount"  >
                                        <div class="form-group">
                                            <label for="" class="form-control-label">Upload Documents</label>
                                            <div class="input-group">
                                                <div class="custom-file replaceCustomFile" style="">
                                                    <input type="file" name="closure_documents[]" multiple="" class="custom-file-input" id="closure_documents">
                                                    <label class="custom-file-label" for="closure_documents">Upload</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#closureModel" id="" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                                </div>
                                                <!-- Employment Offer Modal -->
                                                <div class="modal fade" id="closureModel" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="closure_documentsTitle">Documents</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <?php $value='1550229397_file_women.jpg'; ?>
                                                            <div class="modal-body">
                                                                <div class="text-center">
                                                                      <?php
                                                                        if(!empty($closure[0]->document))
                                                                        {
                                                                            $images=  explode(',', $closure[0]->document);
                                                                            foreach ($images as $value) {



                                                                        ?>
                                                                        <a href="<?php echo base_url('employees_loanapplication_download/').@$value; ?>">    <img src="<?php echo base_url(); ?>uploads/<?php echo @$value; ?>" alt="" class="img-fluid">
                                                                        <?php
                                                                        $ext=explode(".",@$value);
                                                                         if(end($ext)!="png" && end($ext)!="PNG" && end($ext)!="JPEG" &&  end($ext)!="jpeg" && end($ext)!="JPG"  && end($ext)!="jpg"  && end($ext)!="GIF"  && end($ext)!="gif" && end($ext)!="GIF"  && end($ext)!="gif" && end($ext)!="PSD"  && end($ext)!="psd"){ 

                                                                            echo @$value;
                                                                         }
                                                                           ?></a><br>
                                                                       
                                                                        <?php
                                                                        }
                                                                        }
                                                                        ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-sm-6 col-xl-6" id="enter_amount"  >
                                       <div class="form-group">
                                            <label for="" class="form-control-label">Note</label>
                                            <textarea placeholder="Enter note" name="note" id="note" class="form-control" style="min-height: 120px; line-height: 20px;"  ><?php echo ((isset($closure[0]->note)) ? $closure[0]->note : ''); ?> </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group form-buttons">
                                             <button type="submit" name="submit" class="btn btn-success save-profile-btn">Save</button>
                                             <a href="javascript:;" class="btn btn-secondary" onclick="closeForm();" style="display: none;">Close</a>
                                        </div>
                                    </div>
                                </div>

                            </form>
                                            
                        </div> 
                        <?php
                        if($closure=="no need "){
                         ?>
                       
                        <h6 class="mb-3"><?php echo $closure[0]->type ?></h6>
                        <hr>  
                        <div class="row">
                            <div class="col-sm-6  col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Upload Documents</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" value="Document List" disabled="disabled">
                                        <div class="custom-file replaceCustomFile" style="display: none;">
                                            <input type="file" class="custom-file-input" id="inputGroupFile26" value="<?php echo $closure[0]->document ?>">
                                            <label class="custom-file-label" for="inputGroupFile26">Upload</label>
                                        </div>
                                        <div class="input-group-append">
                                            <a href="http://www.kdp.org/resources/pdf/careercenter/Compiling_a_Curriculum_Vitae.pdf" class="btn btn-outline-secondary" type="button" title="View" target="_blank"><span class="la la-eye ks-icon ml-2"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="col-sm-6  col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Last Day of Work</label>
                                    <input type="text" placeholder="Select date" class="form-control ks-daterange-single inputDisabled" value="<?php echo $closure[0]->entry_date ?>" disabled="disabled">
                                </div>
                            </div>
                            <div class="col-sm-6  col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Final Gratuity</label>
                                    <input type="text" placeholder="Calculate" class="form-control inputDisabled" value="$650" disabled="disabled">
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                    <div class="card-footer">                        
                        <button type="btn" class="btn btn-primary edit-profile-btn" style="display: none;" >Edit</button>
                        <button type="submit" class="btn btn-success save-profile-btn" style="display: none;">Update & Save</button>
                        <button type="reset" class="btn btn-outline-secondary ks-light reset-profile-btn" style="display: none;">Reset</button>                        
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
        <h4 class="modal-title" id="notification_heading"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" >
       <p id="notification_body"></p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <a data-dismiss="modal" id="modal_confirm" class="btn btn-primary" href="#">Confirm</a> 
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- [end] Notification DIV -->
 <script>
     $('.flatpickrDate').flatpickr();
function openForm(id){
    
   $.post("<?php echo base_url('admin_get_edit_form_closure'); ?>", {id: id}, function(result){
      //console.log(result);
   $(".add-closure").html(result);
   $(".add-closure").show(); 
   $(".btn-add-closure").hide(); 
   $('.flatpickrDate').flatpickr();
  });
}


function closeForm() {
    $(".add-closure").html('');
    $(".add-closure").hide();
    $(".btn-add-closure").show(); 
}


function open_WarningsContainer(){
    $("#WarningsContainer").show();
}

function close_WarningsContainer(){
    $("#WarningsContainer").hide();
}

function editEvaluation(id){
    $.ajax({
        url : '<?php echo base_url('edit_warning_evaluation'); ?>',
        type : 'POST',
        data : {id:id},
      
        success : function(data) {

            var data = $.parseJSON(data);
           var type=data[0]['type'];
           $("#evaluation_id").val(data[0]['id']);

           $("#evaluation_date").val(data[0]['warning_date']);

           $("#evaluation_note").val(data[0]['note']);

           $("#evaluation_type option[value="+type+"]").attr("selected","selected") ;

           $("#WarningsContainer").show();

           console.log(data);
          
        }
    });
}


function delete_this(Eva_id) {
    var employee_id="<?php echo $id; ?>";
    
    $("#myModal").on('shown.bs.modal', function() {
        $("#modal_confirm").click(function() {
           var url = "<?php echo base_url('admin_delete_warning'); ?>/" +Eva_id;
            $("#pjax-container").load(url,function(response,status){       
                $('#ks-datatable').bootstrapTable({
                    icons: {
                        refresh: 'la la-refresh icon-refresh',
                        toggle: 'la la-list-alt icon-list-alt',
                        columns: 'la la-th icon-th',
                        share: 'la la-download icon-share'
                    }
                });
                notification(status);
            });
        });

        $("#notification_heading").html("Confirmation");
        $("#notification_body").html("Do you want to Delete this Increement Details?");
    }).modal("show");
}

function salarydivopen(){
    $('#add_salary').show();
    $('#mode').val('Add');
    $('#saveDiv').show();
     $('#updateDiv').hide();
     //$("#net_salary").show();
    $('#edit_net_salary').hide();
}

function getexistNetSalary(employee_id) {
    $('#add_salary').hide();
    $("#net_salary").hide();
    $('#mode').val('Edit');
    $('#saveDiv').hide();
    $('#updateDiv').show();
    var salary_structure_val = $("#salary_structure option:selected").val();
    var ctcVal = $("#ctc").val();

    if(salary_structure_val!='' && ctcVal!=''){
        $('.salary_structure_err').html('');
        $('.CTC_err').html('');

        $.post("<?php echo base_url('admin_get_net_salary_div_edit'); ?>", {'id': employee_id,'salary_structure_val':salary_structure_val,'ctcVal':ctcVal}, function(result){
          //console.log(result);
       $("#edit_net_salary").html(result);
       $("#edit_net_salary").show();
       $(".NetSalaryClose").show();


       /******* check ctc amount and calculated amount *******/
       var calculatedAmt = $('.net_amt_yearly_cls').val();
       calculatedAmt = calculatedAmt.replace(/\,/g,'');
       calculatedAmt = parseFloat(calculatedAmt);

       //console.log('calculatedAmt--'+calculatedAmt);
       //console.log('ctcVal--'+ctcVal);

       if(calculatedAmt!=ctcVal){
        $('.updateSalary').prop('disabled', true);
        $('.net_amt_yearly_cls_span').show();

       }else{
        $('.updateSalary').prop('disabled', false);
        $('.net_amt_yearly_cls_span').hide();
       }



       
        });
    }else{
        $('.salary_structure_err').html('Select salary structure');
        $('.CTC_err').html('CTC Field required');
    }
}

</script>

<script>

    function checkEmployeeno(id){
  var employee_no = $("#employee_no").val();
  $("#emp_no_err").html('');
   $("#save").prop( "disabled", false );
  if(employee_no!=''){
  $.post("<?php echo base_url('check_employee_no'); ?>", {'employee_no': employee_no,'id':id}, function(result){
            console.log(result);
            if(result!='done'){
              $("#emp_no_err").html(result);
              $("#save").prop( "disabled", true );
            }
         
         
    });
  }
}

function checkRFno(id){
  var rf_no = $("#rf_no").val().trim();
  //alert(rf_no);
  $("#rf_no_err").html('');
   $("#save").prop( "disabled", false );
  if(employee_no!=''){
  $.post("<?php echo base_url('check_rf_no'); ?>", {'rf_no': rf_no,'id':id}, function(result){
            console.log(result);
            if(result!='done'){
              $("#rf_no_err").html(result);
              $("#save").prop( "disabled", true );
            }
         
         
    });
  }
} 

    $(document).ready(function(){
        $('#pf_checkbox').click(function(){
            if($(this).prop("checked") == true){
                $('#pf_div').show();
                $("#employee_pf_no").attr("required", "true");
                $('#pf_checkbox').val('1');
                
            }
            else if($(this).prop("checked") == false){
               $('#pf_div').hide();
               $('#employee_pf_no').removeAttr('required');
               $('#employee_pf_no').val('');
               $('#pf_checkbox').val('0');
            }
        });

        $('#esi_checkbox').click(function(){
            if($(this).prop("checked") == true){
                $('#esi_div').show();
                $("#esi_no").attr("required", "true");
                $('#esi_checkbox').val('1');
                
            }
            else if($(this).prop("checked") == false){
               $('#esi_div').hide();
               $('#esi_no').removeAttr('required');
                $('#esi_no').val('');
                $('#esi_checkbox').val('0');
            }
        });

        $('#ptax_checkbox').click(function(){
            if($(this).prop("checked") == true){
                $('#ptax_div').show();
                $("#ptax_no").attr("required", "true");
                $('#ptax_checkbox').val('1');
            }
            else if($(this).prop("checked") == false){
               $('#ptax_div').hide();
               $('#ptax_no').removeAttr('required');
               $('#ptax_no').val('');
               $('#ptax_checkbox').val('0');
            }
        });

         $('#enable_wfh').click(function(){
            if($(this).prop("checked") == true){
                $('#enable_wfh').val('1');
                
            }
            else if($(this).prop("checked") == false){
               $('#enable_wfh').val('0');
            }
        });
    });

    /*function get_div(){
        var leavetype = $('#leavetype').val();
        var opening_balance = $('#opening_balance').val();
        var myList = [];

        $('.sel').each(function() {

        myList.push($(this).val())
        });
        if(leavetype != '' && opening_balance !=''){
            $.post("<?php echo base_url('div_colon_for_opening_balance'); ?>", {leavetype: leavetype,value: myList}, function(result){ 
            //console.log(result);
            $('#add_leaves').append(result);  
                //$(".repeat_sal_component").append(result);
                //$("#experience_div").val(div_id);
                //$("#experience_div_type").val(div_id_type);
                });
            //$('#add_leaves').append('<tr></tr>');
        }else{
            alert('Please select leave type and leave balance');
        }

    }*/

 $(document).ready(function () {

    $("#submit_exp").click(function (event) {

        //stop submit the form, we will post it manually.
        event.preventDefault();
        var Company = $("#Company").val();
        var job_title = $("#job_title").val();
        var from_date = $("#from_date").val();
        var to_date = $("#to_date").val();
         
         if(Company == ''){
            //$("#prjname_err").text('Please enter project name');
            alert('Please enter Company');
            $("#Company").focus(); 
            //$(".save").attr('disabled',true);
            return false;
         } else if(job_title == ""){
           alert('Please enter Job Title');
            $("#job_title").focus(); 
            //$(".save").attr('disabled',true);
            return false;
         } else if(from_date == ''){
            alert('Please select From Date');
             $("#from_date").focus(); 
            return false;
         }else if(to_date == ''){
            alert('Please select To Date');
             $("#to_date").focus(); 
            return false;
         }

         

        // Get form
        var form = $('#general_edit')[0];

    // Create an FormData object 
        var data = new FormData(form);
        //console.log(data); 
    // If you want to add an extra field for the FormData
        data.append("CustomField", "This is some extra data, testing");

    // disabled the submit button
        //$("#submit_exp").prop("disabled", true);

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "<?php echo base_url('add_work_experience'); ?>",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (data) {
                //console.log(data);
                //$("#result").text(data);
                //console.log("SUCCESS : ", data);
                //window.location.href = "<?php echo base_url('lead'); ?>";
                //$("#btnSubmit").prop("disabled", false);
                 $("#add_experience").html(data);

            },
           /* error: function (e) {

                $("#result").text(e.responseText);
                console.log("ERROR : ", e);
                $("#btnSubmit").prop("disabled", false);

            }*/
        });

    });

});


$(document).ready(function () {

    $("#submit_edu").click(function (event) {

        //stop submit the form, we will post it manually.
        event.preventDefault();
        var Level = $("#Level").val();
        var Institute = $("#Institute").val();
        var year = $("#year").val();
        var marks = $("#marks").val();
         
         if(Level == ''){
            //$("#prjname_err").text('Please enter project name');
            alert('Please enter Level');
            $("#Level").focus(); 
            //$(".save").attr('disabled',true);
            return false;
         } else if(Institute == ""){
           alert('Please enter Institute');
            $("#Institute").focus(); 
            //$(".save").attr('disabled',true);
            return false;
         } else if(year == ''){
            alert('Please select year');
             $("#year").focus(); 
            return false;
         }else if(to_date == ''){
            alert('Please enter marks');
             $("#marks").focus(); 
            return false;
         }

         

        // Get form
        var form = $('#general_edit')[0];

    // Create an FormData object 
        var data = new FormData(form);
        //console.log(data); 
    // If you want to add an extra field for the FormData
        data.append("CustomField", "This is some extra data, testing");

    // disabled the submit button
        //$("#submit_exp").prop("disabled", true);

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "<?php echo base_url('add_education'); ?>",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (data) {
                //console.log(data);
                //$("#result").text(data);
                //console.log("SUCCESS : ", data);
                //window.location.href = "<?php echo base_url('lead'); ?>";
                //$("#btnSubmit").prop("disabled", false);
                 $("#add_education").html(data);

            },
           /* error: function (e) {

                $("#result").text(e.responseText);
                console.log("ERROR : ", e);
                $("#btnSubmit").prop("disabled", false);

            }*/
        });

    });

});


</script>
        