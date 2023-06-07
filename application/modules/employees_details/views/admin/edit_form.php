<?php $SysConfig = checkConfig();
$organization_details = checkOrganization1();
$SysConfigauthenticaton = checkConfig1();
//echo "<pre>"; print_r($SysConfig); die;
 ?>

<?php  $this->load->model('admin/EmployeesModel'); ?>
<style>
    .input-group > .custom-file:not(:first-child) .custom-file-label, .input-group > .custom-file:not(:first-child) .custom-file-label::before{border-top-left-radius:3px!important;border-bottom-left-radius:3px !important}
</style>

<div class="ks-page-header">
    <section class="ks-title">
        <h3>Profile - <?php echo @$data_single->first_name . ' ' . @$data_single->middle_name . ' ' . @$data_single->last_name; ?></h3>
        <div class="ks-controls">
            <a href="javascript:;" class="btn btn-icon btn-light btn_maximize"><i class="far fa-window-maximize"></i></a>
        </div>
    </section>
</div>

    <?php //echo @$id; exit; ?>

    <input type="hidden" name="id" id="id" value="<?php echo @$id; ?>">
    <div class="ks-page-content">
        <div class="ks-page-content-body">
        <div class="container-fluid">
            <div class="content-wrapper">
                <!--tabs-->
                <div class="custom-tab position-relative">
                <ul class="nav nav-pills">                    
                     <?php
                        if($this->session->userdata('type')=='management')
                        {
                            ?>
                    <li class="nav-item"><a class="nav-link active" id="pills-general-tab" data-toggle="pill" href="#pills-general" role="tab" aria-controls="pills-general" aria-selected="false">General</a></li>                    
                    <li class="nav-item"><a class="nav-link" id="pills-salary-tab2" data-toggle="pill" href="#pills-salary2" role="tab" aria-controls="pills-salary2" aria-selected="false">Salary</a></li>                    
                    <li class="nav-item"><a class="nav-link" id="pills-benefits-tab" data-toggle="pill" href="#pills-benefits" role="tab" aria-controls="pills-benefits" aria-selected="false">Benefits</a></li>
                    <?php
                        }
                    ?>
                    <li class="nav-item"><a class="nav-link" id="pills-leave-tab" data-toggle="pill" href="#pills-leave-application" role="tab" aria-controls="pills-leave-application" aria-selected="false">Leave</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#tab-attendance">Attendance</a></li>
                      
                    <!--<li class="nav-item">
                        <a class="nav-link" id="pills-loans-tab" data-toggle="pill" href="#pills-loans" role="tab" aria-controls="pills-loans" aria-selected="false">Loans</a>
                    </li> -->                  
                </ul>
                    <a href="javascript:;" class="btn btn-sm btn-info btnEnable mb-2"><i class="la la-pencil"></i></a>
                    </div>                
        
        
        
        <div class="ks-tabs-container ks-tabs-default ks-tabs-no-separator ks-full ks-light">
        <div class="tab-content">
        <div class="tab-pane active" id="settings" role="tabpanel" aria-expanded="false">
        <div class="ks-settings-tab">        
    <div class="ks-settings-form-wrapper">    
        <div class="tab-content" id="pills-tabContent">            
            <!--tab 1-->
            <div class="tab-pane fade p-0 active show" id="pills-general" role="tabpanel" aria-labelledby="pills-general-tab">  
                <form  class="" method="post" action="<?php echo base_url('modify_employees_details/'.$id)?>" name="general_edit" id="general_edit" enctype="multipart/form-data">
                <script>				
				$(document).ready(function($) {				
				$('#perma_addr').change(function() {				
				if($(this).prop("checked") == true){
				$('#perma_addr').val('1');
				}
				else if($(this).prop("checked") == false){
				$('#perma_addr').val('0');
				}
				});
				});
                </script>
                 
                
                <div class="row">
                    <div class="col-lg-3 col-md-4 profile_summary align-self-center">
                            <div class="ks-manage-avatar avatar-emp-profile"> 
							<div id="newcrimage">
                                <?php if(!empty($data_single->personal_image)){ ?>
                                <img id="blah" src="<?php echo base_url(); ?>uploads/<?php echo @$data_single->personal_image; ?>" class="img-fluid" > 
								<input type="hidden" name="imagenew" id="imagenew" value="<?php echo @$data_single->personal_image; ?>">
                            <?php } else{ ?>
                                <img id="blah" src="<?php echo base_url(); ?>assets/img/avatars/placeholders/ava-128.png" class="img-fluid"> 
                            <?php } ?>
							</div>
                                <?php if(!empty($data_single->personal_image)){ ?>
                               <!-- <button type="button" onclick="resetprofile();" class="btn btn-sm btn-danger save-profile-btn"><i class="la la-times"></i></button>-->
								 <label class="btn btn-primary ks-btn-file">
                                        <span class="la la-image ks-icon"></span>                    
                                        <!--<input onchange="readURLprofile(this, 'general_edit')" type="file" name="image" id="image">-->
										<input type="file" name="upload_image" id="upload_image" />
                                </label>
                                <?php } else{ ?>
                                <label class="btn btn-primary ks-btn-file">
                                        <span class="la la-image ks-icon"></span>                    
                                        <!--<input onchange="readURLprofile(this, 'general_edit')" type="file" name="image" id="image">-->
										<input type="file" name="upload_image" id="upload_image" />
                                </label>
                                <?php } ?>
                                </div>
                                <p><?php echo @$data_single->first_name . ' ' . @$data_single->middle_name . ' ' . @$data_single->last_name; ?><br>
                                    <small><?php echo @$emp_designation->designation_name; ?></small></p>
                                <p>Employee#: <b><?php echo @$data_single->employee_no; ?></b></p>
                                <p>RF No#: <b><?php echo @$data_single->rf_no; ?></b></p>
                            <div class="employee-avatar new d-none">
                            <div class="profile-img">        
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <div class="row">
                            <div class="col-sm-12">                                
                                <div class="form-group">
                                    <label for="" class="form-control-label"><span style="color:red;">* </span> Full Name</label> 
                                    <div class="input-group">
                                    <input type="text" placeholder="Enter first name" onkeyup="only_charecter(this);" class="form-control inputDisabled" maxlength="12" name='first_name' required id='first_name' value="<?php echo @$data_single->first_name; ?>">
                                    <input type="text" name='middle_name'  onkeyup="only_charecter(this);" id='middle_name' maxlength="5" value="<?php echo @$data_single->middle_name; ?>" placeholder="Middle Name"  class="form-control">                                        
                                    <input type="text" name='last_name' onkeyup="only_charecter(this);" id='last_name'  maxlength="12" value="<?php echo @$data_single->last_name; ?>" placeholder="Last name" class="form-control">                                    
                            </div>
                            </div>
                            </div>
                            <div class="col-sm-4">
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
                            <div class="col-sm-4">
                                <div class="form-group">
                                <label for="" class="form-control-label"><span style="color:red;">* </span> Birth Date</label>
                                <input type="text" placeholder="Enter date" class="form-control inputDisabled mysingle_date" name='dob'  id='dob' value="<?php if(@$data_single->dob != '1970-01-01') { echo date($SysConfigauthenticaton->date_format,strtotime(@$data_single->dob));} else { echo ''; }?>">
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                <label for="" class="form-control-label"><span style="color:red;">* </span> Joining Date</label>
                                <input type="text" placeholder="Select date" class="form-control ks-daterange-single inputDisabled mysingle_date" name='hire_date' readonly required id='hire_date' value="<?php if(@$data_single->hire_date != '1970-01-01') { echo date($SysConfigauthenticaton->date_format,strtotime(@$data_single->hire_date));} else { echo ''; } ?>">
                            </div>
                            </div>
                           <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label"><span style="color:red;">* </span> Mobile No.</label>
                                <input type="text" placeholder="Enter mobile number" class="form-control inputDisabled" onkeyup="numeric(this)" maxlength="10" value="<?php echo @$data_single->contact_mobile; ?>" name='contact_mobile' required  id='contact_mobile'>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label"><span style="color:red;">* </span> Email/Login Email</label>
                                <input type="email" placeholder="Enter email" class="form-control inputDisabled" required name='contact_email'  id='contact_email' value="<?php echo @$data_single->contact_email; ?>" >
                            </div>
                        </div> 
                            <div class="col-sm-4">
                                <div class="form-group">
                                <label for="" class="form-control-label">Category</label>
                                <select name='employee_category' required id='employee_category' class="form-control inputDisabled" >
                                    <option value="">Please select</option>
                                    <option value="Employee" <?php if(@$data_single->employee_category=='Employee'){ ?> selected="selected" <?php } ?>>Employee</option>
                                    <option value="Labor" <?php if(@$data_single->employee_category=='Labor'){ ?> selected="selected" <?php } ?>>Labor</option>
                                </select>
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                <label for="" class="form-control-label"><span style="color:red;">* </span> Religion</label>
                                <input type="text" placeholder="Enter relegion" required class="form-control inputDisabled" value="<?php echo @$data_single->religion; ?>" name='religion' id='religion'>
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                <label for="" class="form-control-label"><span style="color:red;">* </span> Status</label>
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
							<div class="col-sm-6 col-xl-3">
							<div class="form-group">
							<div class="custom-control custom-checkbox mt-checkbox">
							<input type="checkbox" class="custom-control-input" <?php if(!empty($data_single->access_permission) && $data_single->access_permission == '1'){ echo 'checked';} else { echo '';} ?> name="access_permission" id="access_permission" value="<?php if(!empty($data_single->access_permission) && $data_single->access_permission == '1'){ echo $data_single->access_permission; } ?>">
							<label class="custom-control-label" for="access_permission">Enable Access Permission</label>
							</div>                                                                        
							</div>
							</div>							
                        </div>
                </div>
                </div>

                 <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="m-0">
                                <button class="btn btn-link collapsed btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Family Details <i class="fa fa-angle-right float-right"></i>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseOne" class="collapse fade" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body pb-0">
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
                    
                        <div class="col-sm-6 col-xl-4">
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
                                <input type="text" placeholder="Enter number of children" class="form-control inputDisabled" onkeyup="numeric(this)" name='no_of_children' maxlength="2" id='no_of_children' value="<?php echo @$data_single->no_of_children; ?>" >
                            </div>
                        </div>
                    
                    </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="m-0">
                                <button class="btn btn-link collapsed btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Address <i class="fa fa-angle-right  float-right"></i>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse fade" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body  pb-0">
                                 <div class="row">
                                     <div class="col-xl-12"><h5>Present Address</h5></div>                            
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Address 1</label>
                                <input type="text" placeholder="Enter address 1" class="form-control inputDisabled" value="<?php echo @$data_single->contact_address; ?>" name='contact_address'  id='contact_address' >
                            </div>
                        </div>
						 <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Address 2</label>
                                <input type="text" placeholder="Enter address 2" class="form-control inputDisabled" value="<?php echo @$data_single->contact_address1; ?>" name='contact_address1'  id='contact_address1' >
                            </div>
                        </div>
						 <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">State</label>
                                <input type="text" placeholder="Enter State" class="form-control inputDisabled"  name='contact_state'  id='contact_state' value="<?php echo @$data_single->contact_state; ?>" >
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
						
						 <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Pin Code</label>
                                <input type="text" placeholder="Enter pin Code" class="form-control inputDisabled"  name='contact_pin'  id='contact_pin' value="<?php echo @$data_single->contact_pin; ?>" >
                            </div>
                        </div>
                    
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Alternative Phone No.</label>
                                <input type="text" placeholder="Enter Alternative Phone No." class="form-control inputDisabled" onkeyup="numeric(this)" maxlength="12" value="<?php echo @$data_single->contact_phone; ?>" name='contact_phone'  id='contact_phone'>
                            </div>
                        </div>
                        
                                     <div class="col-sm-12">     
                                         <div class="form-group">
                                <div class="custom-control custom-checkbox ml-0">
                                    <input type="checkbox" class="custom-control-input" name="perma_addr" id="perma_addr" value="<?php echo @$data_single->perma_addr; ?>" <?php if(@$data_single->perma_addr == '1') { echo 'checked'; } ?>>
                                    <label class="custom-control-label" for="perma_addr">Uncheck if Permanent address is separate </label>
                                </div>                            
                                </div>                            
                        </div>
                        </div>
                    
                    <div class="row perma_address"  <?php if(@$data_single->perma_addr == '1') { echo 'style="display:none"'; } ?>>
                        <div class="col-xl-12"><h5>Permanent Address</h5></div>                            
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Address 1</label>
                                <input type="text" placeholder="Enter address 1" class="form-control inputDisabled" name='home_address'  id='home_address' value="<?php echo @$data_single->home_address; ?>">
                            </div>
                        </div>
						<div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Address 2</label>
                                <input type="text" placeholder="Enter address 2" class="form-control inputDisabled" name='home_address1'  id='home_address1' value="<?php echo @$data_single->home_address1; ?>">
                            </div>
                        </div>
						 <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">State</label>
                                <input type="text" placeholder="Enter Sate" class="form-control inputDisabled" name='home_state'  id='home_state' value="<?php echo @$data_single->home_state; ?>">
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
						 <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Pin Code</label>
                                <input type="text" placeholder="Enter city" class="form-control inputDisabled" name='home_pin'  id='home_pin' value="<?php echo @$data_single->home_pin; ?>">
                            </div>
                        </div>
                    
                        
                       
                    </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <h5 class="m-0">
                                <button class="btn btn-link collapsed btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Official Details <i class="fa fa-angle-right  float-right"></i>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseFour" class="collapse fade" aria-labelledby="headingFour" data-parent="#accordionExample">
                            <div class="card-body">
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
                                    <div class="input-group">
                                    <input type="text" name='voter_card'  id='voter_card' placeholder="Enter Voter Card No" class="form-control" value="<?php echo @$data_single->voter_card; ?>">
                                    <div class="input-group-append">
                                        <button id="voterpaperclip" class="btn <?php if(!empty($data_single->voter_image)){ echo 'btn-success';} else { echo 'btn-secondary';} ?>" data-toggle="modal" data-target="#modalVoter" type="button"><i class="las la-paperclip"></i></button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                              <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Aadhar Card No.</label>
                                    <div class="input-group">
                                    <input type="text" name='aadhar_card' value="<?php echo @$data_single->aadhar_card; ?>" id='aadhar_card'  placeholder="Enter Aadhar Card No" class="form-control">
                                    <div class="input-group-append">
                                        <button id="aadharpaperclip" class="btn <?php if(!empty($data_single->aadhar_image)){ echo 'btn-success';} else { echo 'btn-secondary';} ?>" data-toggle="modal" data-target="#myModalaadhar" type="button"><i class="las la-paperclip"></i></button>
                                    </div>
                                    </div>                                    
                                </div>
                            </div>

                             <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Pan Card No.</label>
                                    <div class="input-group">
                                    <input type="text" name='pan_card' value="<?php echo @$data_single->pan_card; ?>" id='pan_card'  placeholder="Enter Pan Card No" class="form-control">
                                    <div class="input-group-append">
                                        <button id="panpaperclip" class="btn <?php if(!empty($data_single->pan_image)){ echo 'btn-success';} else { echo 'btn-secondary';} ?>" data-toggle="modal" data-target="#myModalpan" type="button"><i class="las la-paperclip"></i></button>
                                    </div>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        
                        
                             <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Grade</label>
                                <select id="grade" name="grade" required class="form-control">
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
                                <label for="" class="form-control-label">Official Email</label>
                                <input type="email" placeholder="Enter Official Email" class="form-control inputDisabled" name='office_email'  id='office_email' value="<?php echo @$data_single->office_email; ?>" >
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
                                <input type="text" placeholder="Select date" class="form-control ks-daterange-single inputDisabled mysingle_date" name='discontinued_date' id='discontinued_date' value="<?php if(@$data_single->discontinued_date != '1970-01-01') { echo date($SysConfigauthenticaton->date_format,strtotime(@$data_single->discontinued_date));} else { echo ''; } ?>">
                            </div>
                        </div>
                       
                      

                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Reporting Manager</label>

                                <select id="reporting_manager" name="reporting_manager" class="form-control js-example-basic-multiple" onchange="getSubordinate(this.value,'<?php echo @$data_single->id; ?>');">
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
                     <div class="col-sm-6 col-xl-2 align-self-center">
                                <div class="form-group my-2">
                                    <div class="custom-control custom-checkbox ml-lg-0">
                                        <input type="checkbox" class="custom-control-input" <?php if(!empty($data_single->wfh) && $data_single->wfh == '1'){ echo 'checked';} else { echo '';} ?> name="enable_wfh" id="enable_wfh" value="0">
                                        <label class="custom-control-label" for="enable_wfh">Enable WFH</label>
                                      </div>                                                                        
                                </div>
                            </div>
							 <div class="col-sm-6 col-xl-2 align-self-center">
                                <div class="form-group my-2">
                                    <div class="custom-control custom-checkbox ml-lg-0">
                                        <input type="checkbox" class="custom-control-input" <?php if(!empty($data_single->overtime) && $data_single->overtime == '1'){ echo 'checked';} else { echo '';} ?> name="enable_overtime" id="enable_overtime" value="0">
                                        <label class="custom-control-label" for="enable_overtime">Enable Overtime</label>
                                      </div>                                                                        
                                </div>
                            </div>
                        <div class="col-12">                            
                                <label for="" class="form-control-label">Note</label>
                                <textarea placeholder="Enter note" class="form-control inputDisabled" name='note'  id='note' rows="3"><?php echo @$data_single->note; ?></textarea>                            
                        </div>              
                                                          
                  </div>
                            </div>
                        </div>
                    </div>
                     
                     
                     <div class="card">
                        <div class="card-header" id="headingFive">
                            <h5 class="m-0">
                                <button class="btn btn-link collapsed btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Work Experience <i class="fa fa-angle-right  float-right"></i>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseFive" class="collapse fade" aria-labelledby="headingFive" data-parent="#accordionExample">
                            <div class="card-body">
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
                                    <input type="text" name='from_date' id='from_date' placeholder="Enter From Date" class="form-control mysingle_date">
                                </div>
                            </div>
                             <div class="col-sm-6 col-xl-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label">To</label>
                                    <input type="text" name='to_date' id='to_date' placeholder="Enter To Date" class="form-control mysingle_date">
                                </div>
                            </div>
                             <div class="col-sm-6 col-xl-3">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Upload</label>
                                    <div class="input-group">
                                        <div class="custom-file replaceCustomFile" >
                                            <input type="file" class="custom-file-input" name="cv" id="cv1" >
                                            <label class="custom-file-label" for="cv">Upload</label>
                                        </div>
                                        <!--<div class="input-group-append">
                                            <a href="<?php echo base_url(); ?>uploads/<?php echo @$data_qualification->cv; ?>" class="btn btn-outline-secondary" type="button" title="View" target="_blank"><span class="la la-eye ks-icon ml-2 pr-2"></span></a>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                             <div class="col-sm-6 col-xl-1 align-self-center">
                            <div class="form-group">
                                <label for="" class="form-control-label">Action</label><br>
                                 <button type="button" name="submit_exp" id="submit_exp" onclick="submitexp();" class="btn btn-success">Add</button>
                            </div>
                        </div>
                   <div class="col-xl-12" id="experience_div" >
                        <table id="" class="table table-bordered mb-0">
                    <thead>
                       
                    <tr>
                        <th>Company</th>
                        <th>Job Title</th>
                        <th>From Date</th>
                        <th>To Date</th>
                        <th>Document</th>
						<th>Action</th>
                    </tr>
                    </thead>
                    <?php if(!empty($experience)){

                    foreach ($experience as $value) {
                    ?>
                    <tbody> 
                        <td><?=$value->company?></td>
                            <td><?=$value->job_title?></td>
                            <td><?=date($SysConfigauthenticaton->date_format,strtotime($value->from_date))?></td>
                            <td><?=date($SysConfigauthenticaton->date_format,strtotime($value->to_date))?></td>
                            <td><?php if($value->cv != '') { ?><a href="<?=base_url()?>uploads/<?=$value->cv?>" target="_blank" tabindex="-1"><span class="ks-icon la la-la la-paperclip"></span></a><?php } ?></td>
							<td></td>
                        </tbody>
                    <?php } } ?>
                    <tbody id="add_experience">
                       
                    </tbody>
                </table>
           
            
                    </div>
                    </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-header" id="headingSix">
                            <h5 class="m-0">
                                <button class="btn btn-link collapsed btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    Education<i class="fa fa-angle-right  float-right"></i>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseSix" class="collapse fade" aria-labelledby="headingSix" data-parent="#accordionExample">
                            <div class="card-body">
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
                                    <input type="text" name='marks' maxlength="2" id='marks'  onkeyup="numeric(this)" placeholder="Marks(%)" class="form-control">
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
                                            <a href="<?php echo base_url(); ?>uploads/<?php echo @$data_qualification->cv; ?>" class="btn btn-outline-secondary" type="button" title="View" target="_blank"><span class="la la-eye ks-icon ml-2 pr-2"></span></a>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                             
                                 <div class="col-sm-6 col-xl-1 align-self-center">
                            <div class="form-group">
                                <label for="" class="form-control-label">Action</label><br>
                                 <button type="button" name="submit_edu" id="submit_edu"   onclick="submitedu();" class="btn btn-success">Add</button>
                            </div>
                        </div>
                     <div class="col-xl-12">
                        <table id="" class="table table-bordered mb-0">
                    <thead>
                    <tr>
                        <th>Level</th>
                        <th>Institute</th>
                        <th>Year</th>
                        <th>Marks(%)</th>
                        <th>Document</th>
						<th>Action</th>
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
                            <td><?php if($value->cv != '') { ?><a href="<?=base_url()?>uploads/<?=$value->cv?>" target="_blank" tabindex="-1"><span class="ks-icon la la-la la-paperclip"></span></a><?php } ?></td>
							<td></td>
                    </tbody>
                <?php } } ?>
                    <tbody id="add_education">
                       
                    </tbody>
                </table>
            
                    </div>
                    </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-header" id="headingSeven">
                            <h5 class="m-0">
                                <button class="btn btn-link collapsed btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                    Passport / Visa<i class="fa fa-angle-right  float-right"></i>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseSeven" class="collapse fade" aria-labelledby="headingSeven" data-parent="#accordionExample">
                            <div class="card-body">
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
                                    <input type="text" placeholder="Select date" class="form-control ks-daterange-single mysingle_date inputDisabled" value="<?php if(@$passport_single->passport_issue_date != '') { echo date($SysConfigauthenticaton->date_format,strtotime(@$passport_single->passport_issue_date));} else { echo ''; } ?>" name="passport_issue_date" id="passport_issue_date">
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Expiry Date</label>
                                    <input type="text" placeholder="Select date" class="form-control ks-daterange-single mysingle_date inputDisabled" value="<?php if(@$passport_single->passport_expiry_date != '') { echo date($SysConfigauthenticaton->date_format,strtotime(@$passport_single->passport_expiry_date));} else { echo ''; } ?>" name="passport_expiry_date" id="passport_expiry_date">
                                </div>
                            </div>
                        
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label class="d-block">Retained with Company</label>
                                    <div class="d-inline-block mt-2 ml-0">
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
                                
                                    <label for="" class="form-control-label">Upload Passport (5 pages)</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control forCustomFile inputDisabled" style="display:none;" placeholder="Upload file" value="Passport Images">
                                        <div class="custom-file replaceCustomFile" style="">
                                            <input type="file" name="passport_image[]" multiple class="custom-file-input" id="passport_image">
                                            <label class="custom-file-label" for="passport_image">Upload</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#idPassport" title="View"><span class="la la-eye ks-icon ml-2 pr-2 pr-2"></span></button>
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
                    </div>
                     <div class="card">
                        <div class="card-header" id="headingEight">
                            <h5 class="m-0">
                                <button class="btn btn-link collapsed btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                    Deductions<i class="fa fa-angle-right  float-right"></i>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseEight" class="collapse fade" aria-labelledby="headingEight" data-parent="#accordionExample">
                            <div class="card-body">
                                <!-- PF --> 
<?php if($organization_details->pf_apply == '1'){?>									
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input <?php if(!empty($data_single_pf)){ echo 'check-disable';} else { echo '';} ?>" name="pf_checkbox" id="pf_checkbox" <?php if(!empty($data_single_pf)){ ?> value="1" <?php }else{ ?> value="0" <?php } ?><?php if(!empty($data_single_pf)){ echo 'checked disabled';} else { echo '';} ?>>
                                <label class="custom-control-label" for="pf_checkbox">PF Details (If select can't Edit or delete)</label>
                              </div> 
                                        </div>
                                        <div class="col-lg-9">
                                             <?php if(!empty($data_single_pf)){ ?> <input type="hidden" name='pf_checkbox' id='pf_checkbox' value="1"> <?php } ?>
                        <div class="row" id="pf_div"  <?php if(!empty($data_single_pf)){ ?> style="" <?php }else{ ?> style="display: none;" <?php } ?> >
                             <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Employee PF No.</label>
                                    <input type="text" <?php if(!empty($data_single_pf)){ echo 'required';} else { echo '';} ?> name='employee_pf_no' value="<?php echo @$data_single_pf->employee_pf_no; ?>" id='employee_pf_no' placeholder="Enter employee pf number" class="form-control">
                                </div>
                            </div>
                             <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">UAN No.</label>
                                    <input type="text" name='uan_no' <?php if(!empty($data_single_pf)){ echo 'required';} else { echo '';} ?> id='uan_no' value="<?php echo @$data_single_pf->uan_no; ?>" placeholder="Enter UAN number" class="form-control ">
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
                                    </div>
                                                                
                        
                        </div>
<?php } ?>
                         
                         <!--ESI-->
						 <?php if($organization_details->esi_apply == '1'){?>	
                         <div class="form-group">
                             <div class="row">
                                 <div class="col-lg-3">
                                     <div class="custom-control custom-checkbox">                            
                            <input type="checkbox" class="custom-control-input <?php if(!empty($data_single_esi)){ echo 'check-disable';} else { echo '';} ?>" name="esi_checkbox" id="esi_checkbox" <?php if(!empty($data_single_esi)){ ?> value="1" <?php }else{ ?> value="0" <?php } ?><?php if(!empty($data_single_esi)){ echo 'checked disabled';} else { echo '';} ?> >
                            <label class="custom-control-label" for="esi_checkbox">ESI Details (If select can't Edit or delete)</label>
                          </div>
                                 </div>
                                 <div class="col-lg-9">
                                     <?php if(!empty($data_single_esi)){ ?> <input type="hidden" name='esi_checkbox' id='esi_checkbox' value="1"> <?php } ?>
                        <div class="row" id="esi_div" <?php if(!empty($data_single_esi)){ ?> style="" <?php }else{ ?> style="display: none;" <?php } ?> >
                             <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">ESI No.</label>
                                    <input type="text" name='esi_no' <?php if(!empty($data_single_esi)){ echo 'required';} else { echo '';} ?> id='esi_no' value="<?php echo @$data_single_esi->esi_no; ?>" placeholder="Enter ESI number" class="form-control">
                                </div>
                            </div>
                        </div>
                                 </div>
                             </div>
                        
                        </div>
						
						 <?php } ?>
                        
                        <!--PTax-->
						<?php if($organization_details->ptax_apply == '1'){?>	
                        <div class="form-group mb-0">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="custom-control custom-checkbox">
                            <input  type="checkbox" class="custom-control-input <?php if(!empty($data_single_ptax)){ echo 'check-disable';} else { echo '';} ?>" name="ptax_checkbox" id="ptax_checkbox" <?php if(!empty($data_single_ptax)){ ?> value="1" <?php }else{ ?> value="0" <?php } ?><?php if(!empty($data_single_ptax)){ echo 'checked disabled';} else { echo '';} ?>>
                            <label class="custom-control-label" for="ptax_checkbox">P-Tax Details (If select can't Edit or delete)</label>
                          </div>                         
                                </div>
                                <div class="col-lg-9">
                                     <?php if(!empty($data_single_ptax)){ ?> <input type="hidden" name='ptax_checkbox' id='ptax_checkbox' value="1"> <?php } ?>
                        <div class="row" id="ptax_div" <?php if(!empty($data_single_ptax)){ ?> style="" <?php }else{ ?> style="display: none;" <?php } ?>>
                             <div class="col-sm-6 col-xl-4">
                                <div class="form-group mb-0">
                                    <label for="" class="form-control-label">PTAX No.</label>
                                    <input type="text" name='ptax_no'  <?php if(!empty($data_single_ptax)){ echo 'required';} else { echo '';} ?> id='ptax_no' value="<?php echo @$data_single_ptax->ptax_no; ?>" placeholder="Enter PTAX number" class="form-control">
                                </div>
                            </div>
                        </div>
                                </div>
                             </div>
                        
                        </div>
						<?php } ?>
                            </div>
                        </div>
                    </div> 
                
                    
                    <div class="card">
                        <div class="card-header" id="headingNine">
                            <h5 class="m-0">
                                <button class="btn btn-link collapsed btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                    Bank Details<i class="fa fa-angle-right  float-right"></i>
                                </button>
                            </h5>
                        </div>
                         <div id="collapseNine" class="collapse fade" aria-labelledby="headingNine" data-parent="#accordionExample">
                            <div class="card-body">
                                 <div class="row">
								  <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Branch Name</label>
                                    <input type="text" placeholder="Enter Branch Name" class="form-control inputDisabled" name='branch_name' id='branch_name' value="<?php echo @$bank->branch_name; ?>" >
                                </div>
                            </div>
                         <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Bank Name</label>
                                    <input type="text" placeholder="Enter Bank Name" class="form-control inputDisabled" name='bank_name' id='bank_name' value="<?php echo @$bank->bank_name; ?>" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Account Number</label>
                                <input type="text" placeholder="Enter Account Number" class="form-control inputDisabled" name='account_no'  id='account_no' value="<?php echo @$bank->account_no; ?>" >
                                </div>
                            </div>
                        
                            
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                   <label for="" class="form-control-label">IFSC Code</label>
                                <input type="text" placeholder="Enter IFSC CODE" class="form-control inputDisabled" name='agent_rtn_code' id='agent_rtn_code' value="<?php echo @$bank->agent_rtn_code; ?>">
                                </div>
                            </div>
                           <div class="col-sm-6 col-xl-4 align-self-center">                            
                                <div class="d-inline-block mt-2">
                                    <div class="custom-control custom-radio ks-radio ks-purple">
                                        <input id="default" type="radio" class="custom-control-input inputDisabled" value="1"  name='default'   <?php if(@$bank->default_bank=='1'){ ?> checked="checked" <?php } ?> 
                                               data-validation="radio_group"
                                               data-validation-qty="min1">
                                        <label class="custom-control-label" for="default">Default</label>
                                    </div>
                                </div>
                                
                                <div class="d-inline-block mt-2 ml-3">
                                    <div class="custom-control custom-radio ks-radio ks-purple">
                                        <input id="default_no" type="radio" class="custom-control-input inputDisabled" value="0"  name='default'   <?php if(@$bank->default=='0'){ ?> checked="checked" <?php } ?> 
                                               data-validation="radio_group"
                                               data-validation-qty="min1">
                                        <label class="custom-control-label" for="default_no">Not Default</label>
                                    </div>
                                </div>                            
                        </div>
                        
                           
                          
                  </div>
                            </div>
                        </div>
                    </div>  

                     <!--<div class="card">
                        <div class="card-header" id="headingTen">
                            <h5 class="m-0">
                                <button class="btn btn-link collapsed btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                    Closure<i class="fa fa-angle-right  float-right"></i>
                                </button>
                            </h5>
                        </div>
                         <div id="collapseTen" class="collapse fade" aria-labelledby="headingTen" data-parent="#accordionExample">
                            <div class="card-body">
                                 <div class="row">
                         <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                     <label for="" class="form-control-label">Type</label>
                                            <select name="closure_type" id="closure_type" class="form-control ">
                                                <option value="">Please select</option>
                                                <?php  if($closure){ ?>
                                                   <option value="" >Please select</option> 
                                                <option value="Resignation" <?php echo ((isset($closure[0]->type) && ($closure[0]->type=="Resignation")) ? 'selected' : ''); ?> >Resignation</option>
                                                <option value="Termination" <?php echo ((isset($closure[0]->type) && ($closure[0]->type=="Termination")) ? 'selected' : ''); ?> >Termination</option>
                                                  <?php }else{ ?>
                                                  
                                               
                                                  <?php }  ?>
                                            </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                       <label for="" class="form-control-label">Last day of work</label>
                                            <input type="text" name="last_day_of_work" id="last_day_of_work" placeholder="Select date" class="form-control mysingle_date ks-daterange-single  active" readonly="readonly" value="<?php echo ((isset($closure[0]->entry_date)) ? $closure[0]->entry_date : ''); ?>" >
                                </div>
                            </div>
                              <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                            <label for="" class="form-control-label">Upload Documents</label>
                                            <div class="input-group">
                                                <div class="custom-file replaceCustomFile" style="">
                                                    <input type="file" name="closure_documents[]" multiple="" class="custom-file-input" id="closure_documents">
                                                    <label class="custom-file-label" for="closure_documents">Upload</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#closureModel" id="" title="View"><span class="la la-eye ks-icon ml-2 pr-2"></span></button>
                                                </div>
                                               
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
                        
                            
                            <div class="col-xl-12">                                
                                    <label for="" class="form-control-label">Note</label>
                                    <textarea placeholder="Enter note" name="note" id="note" class="form-control" rows="3"  ><?php echo ((isset($closure[0]->note)) ? $closure[0]->note : ''); ?> </textarea>                                
                            </div>
                         
                        
                           
                          
                  </div>
                            </div>
                        </div>
                    </div>-->
                    </div> <!--accordion closed-->

                <button type="submit" id="save" class="btn btn-success save-profile-btn">Update & Save</button>
                    <button type="reset" class="btn btn-outline-secondary ks-light reset-profile-btn" style="display: none;">Reset</button>
					<div id="modalVoter" class="modal fade" role="dialog">
				<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				<div class="modal-header">
                    <h4 class="modal-title">Upload Voter Card</h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="la la-times"></i> </button>				
				</div>
				<div class="modal-body">
				<div class="d-block profile_summary align-self-center">
                        <div class="ks-manage-avatar avatar-document mx-auto"> 
						<div id="votercrimage">
						 <?php if(!empty($data_single->voter_image)){ ?>
                               <a href="<?php echo base_url(); ?>uploads/<?php echo @$data_single->voter_image; ?>" download> <img id="blah" src="<?php echo base_url(); ?>uploads/<?php echo @$data_single->voter_image; ?>" class="img-fluid" ></a>
								<input type="hidden" name="voter_image" id="voter_image" value="<?php echo @$data_single->voter_image; ?>"> 								
                            <?php } else{ ?>
                                <img id="blah" src="<?php echo base_url(); ?>assets/img/avatars/placeholders/ava-128.png" class="img-fluid"> 
                            <?php } ?>
                          </div>                     
                                <label class="btn btn-primary ks-btn-file">
                                        <span class="la la-image ks-icon"></span>                    
                                       <!-- <input onchange="readURL(this,'general')" type="file" name="image" id="image">-->
										<input type="file" name="upload_voter" id="upload_voter" />
                                </label>
								<br />
						        <div id="uploaded_voter"></div>                              
                                <input type="hidden" name="imageold" value="<?php //echo (isset($data_single->personal_image) ? @$data_single->personal_image : ''); ?>">                                
                            </div>
                        
                        </div>
				</div>
				<div class="modal-footer">
                <button type="button" onclick="resetvoter();" class="btn btn-warning save-profile-btn">Reset</button>
                <button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
				</div>
				</div>

				</div>
				</div>
				
				<div id="myModalaadhar" class="modal fade" role="dialog">
				<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				<div class="modal-header">
				<h4 class="modal-title">Upload Aadhar Card</h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="la la-times"></i> </button>
				</div>
				<div class="modal-body">
                    <div class="ks-manage-avatar avatar-document mx-auto"> 
						<div id="aadharcrimage">
                         <?php if(!empty($data_single->aadhar_image)){ ?>
                                <a href="<?php echo base_url(); ?>uploads/<?php echo @$data_single->aadhar_image; ?>" download><img id="blah" src="<?php echo base_url(); ?>uploads/<?php echo @$data_single->aadhar_image; ?>" class="img-fluid" > 
								<input type="hidden" name="aadhar_image" id="aadhar_image" value="<?php echo @$data_single->aadhar_image; ?>"> </a>
                            <?php } else{ ?>
                                <img id="blah" src="<?php echo base_url(); ?>assets/img/avatars/placeholders/ava-128.png" class="img-fluid"> 
                            <?php } ?>   </div>                     
                                <label class="btn btn-primary ks-btn-file">
                                        <span class="la la-image ks-icon"></span>                    
                                       <!-- <input onchange="readURL(this,'general')" type="file" name="image" id="image">-->
										<input type="file" name="upload_aadhar" id="upload_aadhar" />
                                </label>
                            </div>
                    
				</div>
				<div class="modal-footer">
                    <button type="button" onclick="resetaadhar();" class="btn btn-warning save-profile-btn">Reset</button>
				<button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
				</div>
				</div>

				</div>
				</div>
				
				<div id="myModalpan" class="modal fade" role="dialog">
				<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				<div class="modal-header">
				<h4 class="modal-title">Upload PAN Card</h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="la la-times"></i> </button>
				</div>
				<div class="modal-body">				
                        <div class="ks-manage-avatar avatar-document mx-auto"> 
						<div id="pancrimage">
						 <?php if(!empty($data_single->pan_image)){ ?>
                                <a href="<?php echo base_url(); ?>uploads/<?php echo @$data_single->pan_image; ?>" download><img id="blah" src="<?php echo base_url(); ?>uploads/<?php echo @$data_single->pan_image; ?>" class="img-fluid" > </a>
								<input type="hidden" name="pan_image" id="pan_image" value="<?php echo @$data_single->pan_image; ?>">
                            <?php } else{ ?>
                                <img id="blah" src="<?php echo base_url(); ?>assets/img/avatars/placeholders/ava-128.png" class="img-fluid"> 
                            <?php } ?>
                           </div>                     
                                <label class="btn btn-primary ks-btn-file">
                                        <span class="la la-image ks-icon"></span>                    
                                       <!-- <input onchange="readURL(this,'general')" type="file" name="image" id="image">-->
										<input type="file" name="upload_pan" id="upload_pan" />
                                </label>
								<br />
						        <div id="uploaded_pan"></div>
                              
                                <input type="hidden" name="imageold" value="<?php //echo (isset($data_single->personal_image) ? @$data_single->personal_image : ''); ?>">                                
                            </div>						
				</div>
				<div class="modal-footer">
				<button type="button" onclick="resetpan();" class="btn btn-warning save-profile-btn">Reset</button>
                <button type="button" class="btn btn-success" data-dismiss="modal">Save</button>                
				</div>
				</div>

				</div>
				</div>
                </form>
                </form>
            </div>            
          
            <div class="tab-pane fade p-0" id="pills-salary2" role="tabpanel" aria-labelledby="pills-salary-tab2">
                <div class="row">
                    <div class="col-6 align-self-center"><h6 class="mb-0">Salary</h6></div>
                    <div class="col-6 text-right">
                     <?php if(empty($all_salary_history)) { ?>
                    <button type="button" class="btn btn-primary" onclick="return salarydivopen();">Add</button>
                <?php }?>
                    <?php
                        if($this->session->userdata('type')=='management')
                        {
                       ?>
                       <button type="button" id="updatesalary" style="display:none;" class="btn btn-primary" onclick="return salarydivopen();">Update</button>
                       <?php
                        }
                        ?>
                    <input type="hidden" name="mode" id="mode" value="">
                </div>
                </div>
                <hr>
            	<div class="form-boxXX">
				<?php if(!empty($emp_salary)){ ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card shadow1">
                                <div class="card-header">
                                    Current CTS
                                        <div class="pull-right">
                                            <div class="dropdown">
                                                <a class="btn py-0 px-2" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="la la-ellipsis-v"></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                    <a class="dropdown-item" onclick="salaryView('<?php echo @$emp_salary->id;?>','<?php echo @$id;?>','<?php echo @$emp_salary->salary_structure_id; ?>','<?php echo @$emp_salary->ctc_amount;?>')">View</a>
													<a class="dropdown-item" onclick="getupdatedive();">Update</a>
													<?php if(!empty($all_salary_history)) { ?>
													<a class="dropdown-item" onclick="gethistorydiv();">History</a>
													<?php } ?>
                                                </div>
                                            </div>
                                        </div>                                    
                                </div>
                                <div class="card-body">
                                    <h4><i class="la la-rupee"></i><?=number_format($emp_salary->ctc_amount,2)?></h4>
                                    <p class="m-0">Applicable from : <?=date($SysConfigauthenticaton->date_format,strtotime($emp_salary->application_date))?></p>
                                </div>
                            </div>
                        </div>
                    </div>
				<?php } ?>
                    
                    <?php if(!empty($all_salary_history)) { ?>
                    <div class="ks-user-list-view-table mt-4" id="sal_history_div" style="display:none;">
                                <div class="table-responsiveX">
                                    <table id="salary_table" class="table table-bordered mb-0" data-pagination="true">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>CTC</th>
                                                <th>Applicable From</th>
                                                <th>Approval Status</th>
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
                                                    if(!empty($all_salary_history))
                                                    {
                                                    foreach ($all_salary_history as $salary_history) {
                                                        ?>
                                                    
                                            <tr>
                                                <td>
                                                    <?php echo date('d-m-Y',strtotime(@$salary_history->create_date)); ?>
                                                </td>
                                                <td>
                                                   <?php echo number_format(@$salary_history->ctc_amount,2); ?>
                                                </td>
                                                 <td>
                                                    <?php echo date('d-m-Y',strtotime(@$salary_history->application_date)); ?>
                                                </td>
                                                <td>
                                                   <?php if($salary_history->flag == '1'){
                                                    echo 'Approved';
                                                   }else{
                                                     echo 'Not Approved';
                                                   } ?>
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
                                                            <a onclick="geteditNetSalary('<?php echo @$data_single->id; ?>','<?php echo @$salary_history->ctc_amount; ?>','<?php echo @$salary_history->salary_structure_id; ?>','<?php echo @$salary_history->id; ?>');" class="dropdown-item" style="cursor:pointer;">
                                                                <span class="la la-pencil icon text-info"></span> Revision
                                                            </a>
                                                            <!-- <a class="dropdown-item" onclick="goforleaveapplicationdelete('<?php echo @$value->id;?>')"><span class="la la-trash icon text-danger"></span> Delete</a> -->
                                                           
                                                            <a class="dropdown-item" onclick="salaryView('<?php echo @$salary_history->id;?>','<?php echo @$id;?>','<?php echo @$salary_history->salary_structure_id; ?>','<?php echo @$salary_history->ctc_amount;?>')">View</a>
                                                           
                                                           
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
                        <?php } ?>
    

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
                           // $all_salary_structure  = $this->EmployeesModel->get_result_data('master_salary_structure',array('is_active'=>'Y','delete_flag'=>'N','grade_id'=>$data_single->grade,'dept_id'=>$data_single->department));
                             $all_salary_structure  = $this->EmployeesModel->get_result_data('master_salary_structure',array('is_active'=>'Y','delete_flag'=>'N'));

                           }else{

                            $all_salary_structure  = array();
                           }

                         ?>


                	<div class="row mt-2 add_salary"  style="display: none;">
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

                    <div class="form-group mt-3 add_salary" style="display: none;">
                    <button type="button" class="btn btn-info edit-profile-btn NetSalaryCls" onclick="getNetSalary('<?php echo @$data_single->id; ?>');">Calculate Net Salary</button>
                    <button style="display: none;" type="button" class="btn btn-warning edit-profile-btn NetSalaryClose" onclick="CloseNetSalary();">Close Calculation</button>
                </div>          
                    
                <div class="form-group mt-3">
                    <spna style="color:green; font-size: 16px;" id="net_salary_save"></spna>
                </div>
                    <div class="form-box" id="net_salary"> </div>
                
                    <div class="form-box" id="edit_net_salary" style="display: none;"> </div>
                <div class="form-group mt-3" >
                    <button type="button" id="saveDiv" style="display:none;" class="btn btn-success edit-profile-btn saveSalary" onclick="saveSalaryStructure('<?php echo @$data_single->id; ?>');">Save</button>
                      <button type="button" id="updateDiv" style="display: none;" class="btn btn-primary edit-profile-btn updateSalary" onclick="saveSalaryStructure('<?php echo @$data_single->id; ?>');">Update</button>
                    <button type="submit" class="btn btn-success save-profile-btn" style="display: none;">Update & Save</button>
                    <button type="reset" class="btn btn-outline-secondary ks-light reset-profile-btn" style="display: none;">Reset</button>
                </div>
 <?php 
                        if(!empty($all_payroll))
                        { ?>
                    <table id="payroll_table" class="table table-bordered mb-0">
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
						<?php } ?>
                
              
            </div>
              
            </div>
            
            
            <div class="tab-pane fade p-0" id="pills-benefits" role="tabpanel" aria-labelledby="pills-benefits-tab">
                
                        <form name="benifit" id="benifit"   method="post">
                             <input type="hidden" name="benifit_edit_id" id="benifit_edit_id" value=""> 
                        
                            <h6 class="mb-3">Benefits</h6>
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
                                <div class="col-sm-6 col-xl-8 align-self-center">
                                    <span id="policy_details"> </span>
                                </div>
                                
                                
                        <div class="form-group mb-0 col-md-12">
<!--                            <button type="btn" class="btn btn-primary edit-profile-btn">Edit</button>-->
<a onclick="benifit_form_submit('<?php echo $id; ?>');" id="benefit_save" class="btn btn-success save-profile-btn" style="display:none;">Save</a>
<!--                            <button type="reset" class="btn btn-outline-secondary ks-light reset-profile-btn" style="display: none;">Reset</button>-->
                        </div>                    
                            </div>
                            
                                
                                
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsiveX" id="benifit_table">
                                        <?php
										$sl = 1;
										if(!empty($all_employee_policy)) {?>
                                    <table  class="table table-bordered mb-0 mt-4">
                                                <thead>
                                                <tr>
                                                    <th width="20">#</th>
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
                                                    <td scope="row"><?=$sl?></td>
                                                    <td><?php echo @$value->policy_name;?></td>
                                                    <td class="table-action">
                                                        <div class="dropdown">
                                                        <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="la la-ellipsis-v"></span>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                            <a class="dropdown-item text-primary" onclick="goforbenifitedit('<?php echo @$value->id;?>')"><span title="Delete" class="la la-pencil"></span> Edit</a>
                                                            <a class="dropdown-item text-danger" onclick="goforbenifitdelete('<?php echo @$value->id;?>')"><span title="Delete" class="la la-trash"></span> Delete</a>
                                                        </div>
                                                    </div>
                                                        
                                                        
                                                    </td>
                                                </tr>
                                                <?php
												$sl ++;
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        <?php
                            }

                        ?>
                                        </div>
                                </div>
                            </div>
                        
                    </form>
                </div>
            
            <div class="tab-pane fade p-0" id="pills-leave-application" role="tabpanel" aria-labelledby="pills-leave-application-tab">
                <div class="row">
                    <div class="col-6 align-self-center">
                        <h6>Leave</h6>
                    </div>
                    <div class="col-6 text-right">
                      <a href="#" class="btn btn-outline-primary ks-light ks-no-text save-profile-btn" style="display: none;"><span class="la la-save ks-icon"></span></a>  
                      <a href="javascript:void(0);" onclick="openaddform();" type="btn" class="btn btn-primary btn-add-leave btnDisabled">Add</a>
                    </div>
                </div>
                <hr>
                    
                       
                            <script>
                                function openaddform(){
                                   $('#leave_application_form_div').show(); 
                                }
                            </script>
                            <form name="leave_application_form" id="leave_application_form" method="post">
                             <input type="hidden" name="leave_application_edit_id" id="leave_application_edit_id" value="">

                            <div class="add-leave mt-2" id="leave_application_form_div" style="display: none;">                                
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
                                
                                    <div class="row">
                                        
                                         <div class="col-sm-6 col-xl-3">
                                            <div class="form-group">
                                                <label for="" class="form-control-label">Leave Type</label>
                                                <select name="leave_type" id="leave_type" onchange="check_available_leave();"class="form-control">
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
											<span id="leave_error" style="color:red"></span>
                                        </div>
                                        
                                        <div class="col-sm-6 col-xl-3">
                                            <div class="form-group">
                                                <label for="" class="form-control-label">From Date</label> 
                                                <input type="text" name="leave_from"   id="leave_from"  value="" placeholder="Select date" class="form-control mydate_range">
                                            </div>
                                        </div>
                                        <!--<div class="col-sm-6 col-xl-3">
                                            <div class="form-group">
                                                <label for="" class="form-control-label">To Date</label>
                                                <input type="text" name="leave_to" id="leave_to" value=""  placeholder="Select date" class="form-control ks-daterange-single mysingle_date">
                                            </div>
                                        </div>-->
                                        <div class="col-sm-6 col-xl-3">
                                            <div class="form-group">
                                                <label for="" class="form-control-label">Total Days</label>
                                                <input type="text" name="leave_total_days" readonly id="leave_total_days" value="" placeholder="Enter total days" class="form-control">
                                            </div>
                                        </div>
                                    
                                        <div class="col-sm-6 col-xl-3" style="display: none;">
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
                                        <div class="col-sm-6 col-xl-3" style="display: none;">
                                            <div class="form-group">
                                                <label for="" class="form-control-label">Ticket Amount</label>
                                                <input type="text" name="leave_ticket_amount" id="leave_ticket_amount" placeholder="Enter ticket amount" class="form-control">
                                            </div>
                                        </div>                                    
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="" class="form-control-label">Note</label>
                                                <textarea name="leave_note" id="leave_note" placeholder="Enter note" class="form-control inputDisabled" style="min-height: 60px; line-height: 20px;"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-1 mt-2">
                                   
									<button type="button" onclick="leave_application_form_submit('<?php echo $id; ?>')" name="submit" class="btn btn-success" id="leave_add">Save</button>
                                    <a href="javascript:void(0);" onclick="closeaddform();" type="btn" class="btn btn-outline-secondary ks-light btn-add-leave-close ml-2">Close</a>
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
                                <div class="table-responsiveX" id="leave_application_table">
								<?php if(!empty($all_employee_leave_application))
                                                    { ?>
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th>From Date</th>
                                                <th>To Date</th>
                                                <th>Total Days</th>
                                               <!-- <th>Ticket</th>
                                                <!--<th>Ticket Amount</th>-->
                                                 <th>Approval Status</th>
<!--                                                <th>Paid Amount</th>-->
<!--                                                <th>Credited Amount</th>-->
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
                                                            <a onclick="goforleaveapplicationdit('<?php echo @$value->id;?>')" class="dropdown-item text-primary" style="cursor:pointer;">
                                                                <span class="la la-pencil icon text-info"></span> Edit
                                                            </a>
                                                            <!-- <a class="dropdown-item" onclick="goforleaveapplicationdelete('<?php echo @$value->id;?>')"><span class="la la-trash icon text-danger"></span> Delete</a> -->
                                                           <?php /*?> <?php
                                                            if(@$value->approved=='No')
                                                            {
                                                            ?>
                                                            <a class="dropdown-item text-primary" onclick="goforleaveapproval('<?php echo @$value->id;?>','Yes','<?php echo @$id;?>')">Make Approve</a>
                                                            <?php
                                                            }
                                                            ?>
                                                             <?php
                                                            if(@$value->approved=='')
                                                            {
                                                            ?>
                                                            <a class="dropdown-item text-success" onclick="goforleaveapproval('<?php echo @$value->id;?>','Yes','<?php echo @$id;?>')">Make Approve(New)</a>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if(@$value->approved=='Yes')
                                                            {
                                                            ?>
                                                            <a class="dropdown-item text-danger" onclick="goforleaveapproval('<?php echo @$value->id;?>','No','<?php echo @$id;?>')">Make Not Approve</a>
                                                       <?php
                                                            }
                                                            ?><?php */?>
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
													<?php } ?>
                                </div>
                            </div>
													

                    
            </div>
            
            
            <div class="tab-pane fade p-0" id="tab-attendance">
                
                	<h5>Attendance Legends</h5>
                    <div class="row mt-4">
                        <div class="col-sm-6">                            
                            <div class="row">
                                <div class="col-3"><span class="attendance_present">P</span> - Present</div>
                                <div class="col-3"><span class="attendance_absent">A</span> - Absent</div>
                               <!-- <div class="col-3"><span class="attendance_holiday">H</span> - Holiday</div>-->
							   <div class="col-3"><span class="attendance_halfday">Hd</span> - Half day</div>
                                <div class="col-3"><span class="attendance_earlyleave">E</span> - Early leave</div>                                
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                
                                <div class="col-3"><span class="attendance_late">Lt</span> - Late</div>
                                <div class="col-3"><span class="attendance_outside">O</span> - Outside</div>
                                <div class="col-3"><span class="attendance_wfh">W</span> - Work from home</div>                                
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                    <table class="table table-bordered table-empattendance mt-4">
                        <thead>
                            <tr>
                                <th class="text-left">Months/Days</th>
                                <th>Jan</th>
                                <th>Feb</th>
                                <th>Mar</th>
                                <th>Apr</th>
                                <th>May</th>
                                <th>Jun</th>
                                <th>Jul</th>
                                <th>Aug</th>
                                <th>Sept</th>
                                <th>Oct</th>
                                <th>Nov</th>
                                <th>Dec</th>
                            </tr>                            
                        </thead>
                        <tbody>
						<?php for ($i=01; $i <= 31 ; $i++) { ?>
                            <tr>
                                <td><?=$i?></td>
								<?php 
								$text = '';
								$text2 = '';
								$bg='';
								$holiday = array();
								$dayJan = date('l',strtotime('2020-01-'.$i));   
								$curdate = date('Y-m-d',strtotime('2020-01-'.$i));
								$weekNo = getWeeks($curdate,$dayJan);
								//echo '<pre>'; print_r($att_january); die;
								$i = str_pad($i, 2, "0", STR_PAD_LEFT);
								  if((!empty($att_january)) &&  (array_key_exists(sprintf('%02d', $i),$att_january))){
									$attJanuary = explode('_', @$att_january[sprintf('%02d', $i)]);
									if((!empty($att_january)) && (!empty($attJanuary[0]) && $attJanuary[0]=='Full Day')){ // present day
										$text = '<span class="attendance_present">P</span>';
										//$bg='background:#a950af';
										//array_push($holiday,'#a950af');;
									   if(!empty($attJanuary[1]) && $attJanuary[1] == 'Late'){ $text.='<span class="attendance_late">/Lt</span>';  } 
									   


										}else{ // absent/half day/o
											$text='<span class="attendance_absent">A</span>';
											//$bg='background:#c0a7c2';
											if((!empty($att_january)) && (@$att_january[$i]=='Absent')){
												$text = '<span class="attendance_absent">A</span>';
												//$bg='background:#c0a7c2';
											}
											
											if((!empty($att_january)) && (@$att_january[$i]=='Over Time')){
												$text = 'OT';
												//$bg='background:#c0a7c2';
											}

										   
											if((!empty($att_january)) && ($attJanuary[0]=='Half Day')){
												 $text = '<span class="attendance_halfday">Hd</span> ';
												 //$bg='background:#da9090';
												 //array_push($holiday,'#da9090');
												 if($attJanuary[1] == 'Late'){ $text.='<span class="attendance_late">/Lt</span>';}
											}
											
											if((!empty($att_january)) && ($attJanuary[0]=='EarlyLeave')){
												 $text = '<span class="attendance_earlyleave">E</span>';
												 //$bg='background:#da9090';
												 //array_push($holiday,'#da9090');
												 //if($attJanuary[1] == 'Late'){ $text.='<span class="attendance_late">/Lt</span>';}
											}

										}
								}else{
									$text='<span class="attendance_absent">A</span>';
								   
								}
								$j = str_pad($i, 2, "0", STR_PAD_LEFT);

								if((!empty($att_january)) && (@$att_january[$j]=='WFH')){
									$text = '<span class="attendance_wfh">W</span>';
									//$bg='background:#2c80d6';
									//array_push($holiday,'#2c80d6');
								}
								if((!empty($att_january)) && (@$att_january[$j]=='OD')){
									$text = '<span class="attendance_outside">O</span>';
									//$bg='background:#a5c3de';
									//array_push($holiday,'#a5c3de');
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

							   

								/* if(!empty($att_january['early_leave']) && (in_array(sprintf('%02d', $i),$att_january['early_leave'])) ){
									$text = '<span class="attendance_earlyleave">E</span> ';
									 //$bg='background:#5c5c5d';
									  //array_push($holiday,'#5c5c5d');
								}*/

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
									//$bg='background:#54af50';
									//array_push($holiday,'#54af50');
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
                                                
                              <?php $text_f = '';
                                                    $text2 = '';
                                                    $bg_f='';
                                                    $holiday_f = array();
                                                    $dayfeb = date('l',strtotime('2020-02-'.$i));   
                                                    $curdate_f = date('Y-m-d',strtotime('2020-02-'.$i));
                                                    $weekNo_f = getWeeks($curdate_f,$dayfeb);
                                                   

                                                        if(date('Y')>='2020' && date('m') < '02'){
                                                            $text_f = '-';
                                                        }else{
														$i = str_pad($i, 2, "0", STR_PAD_LEFT);
                                                      if((!empty($att_february)) &&  (array_key_exists(sprintf('%02d', $i),$att_february))){

                                                        $attFeb = explode('_', @$att_february[sprintf('%02d', $i)]);
                                                        //echo '<pre>'; print_r($att_february); die;
                                                        if((!empty($att_february)) && (!empty($attFeb[0]) && $attFeb[0]=='Full Day')){ // present day

                                                            $text_f = '<span class="attendance_present">P</span>';
                                                            //$bg_f='background:#a950af';
                                                            //array_push($holiday_f,'#a950af');;
                                                           if(!empty($attFeb[1]) && $attFeb[1] == 'Late'){ $text_f.='<span class="attendance_late">/Lt</span>'; } 
                                                           


                                                            }else{ // absent/half day/o
                                                                $text_f='<span class="attendance_absent">A</span>';
                                                                //$bg='background:#c0a7c2';
                                                                if((!empty($att_february)) && (@$att_february[$i]=='Absent')){
                                                                    $text_f = '<span class="attendance_absent">A</span>';
                                                                    //$bg='background:#c0a7c2';
                                                                }
																if((!empty($att_february)) && (@$att_february[$i]=='Over Time')){
                                                                    $text_f = 'OT';
                                                                    //$bg='background:#c0a7c2';
                                                                }

                                                               
                                                                if((!empty($att_february)) && ($attFeb[0]=='Half Day')){
                                                                     $text_f = '<span class="attendance_halfday">Hd</span>';
                                                                     //$bg_f='background:#da9090';
                                                                     //array_push($holiday_f,'#da9090');
                                                                     if($attFeb[1] == 'Late'){ $text_f.='<span class="attendance_late">/Lt</span>';}
                                                                }
																
																if((!empty($att_february)) && ($attFeb[0]=='EarlyLeave')){
                                                                     $text_f = '<span class="attendance_earlyleave">E</span>';
                                                                     //$bg_f='background:#da9090';
                                                                     //array_push($holiday_f,'#da9090');
                                                                     //if($attFeb[1] == 'Late'){ $text_f.='<span class="attendance_late">/Lt</span>';}
                                                                }

                                                            }
                                                    }else{
                                                        $text_f='<span class="attendance_absent">A</span>';
                                                       
                                                    }
                                                    $j = str_pad($i, 2, "0", STR_PAD_LEFT);

                                                    if((!empty($att_february)) && (@$att_february[$j]=='WFH')){
                                                        $text_f = '<span class="attendance_wfh">W</span>';
                                                        //$bg_f='background:#2c80d6';
                                                       // array_push($holiday_f,'#2c80d6');
                                                    }
                                                    if((!empty($att_february)) && (@$att_february[$j]=='OD')){
                                                        $text_f = '<span class="attendance_outside">O</span>';
                                                        //$bg_f='background:#a5c3de';
                                                        //array_push($holiday_f,'#a5c3de');
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

                                                   

                                                    /* if(!empty($att_february['early_leave']) && (in_array(sprintf('%02d', $i),$att_february['early_leave'])) ){
                                                        $text_f = 'E<span class="attendance_earlyleave">E</span>L';
                                                         //$bg_f='background:#5c5c5d';
                                                         // array_push($holiday_f,'#5c5c5d');
                                                    }*/

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
                                                       // $bg_f='background:#54af50';
                                                       // array_push($holiday_f,'#54af50');
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
                               
                              
                                  <?php $text_m = '';
                                                    $text2 = '';
                                                    $bg_m='';
                                                    $holiday_m = array();
                                                    $daymar = date('l',strtotime('2020-03-'.$i));   
                                                    $curdate_m = date('Y-m-d',strtotime('2020-03-'.$i));
                                                    $weekNo_m = getWeeks($curdate_m,$daymar);
                                                   

                                                        if(date('Y')>='2020' && date('m') < '03'){
                                                            $text_m = '-';
                                                        }else{
														$i = str_pad($i, 2, "0", STR_PAD_LEFT);
                                                      if((!empty($att_march)) &&  (array_key_exists(sprintf('%02d', $i),$att_march))){

                                                        $attMar = explode('_', @$att_march[sprintf('%02d', $i)]);
                                                        //echo '<pre>'; print_r($att_february); die;
                                                        if((!empty($att_march)) && (!empty($attMar[0]) && $attMar[0]=='Full Day')){ // present day

                                                            $text_m = '<span class="attendance_present">P</span>';
                                                            //$bg_m='background:#a950af';
                                                            //array_push($holiday_m,'#a950af');;
                                                           if(!empty($attMar[1]) && $attMar[1] == 'Late'){ $text_m.='<span class="attendance_late">/Lt</span>';} 
                                                           


                                                            }else{ // absent/half day/o
                                                                $text_m='<span class="attendance_absent">A</span>';
                                                                //$bg='background:#c0a7c2';
                                                                if((!empty($att_march)) && (@$att_march[$i]=='Absent')){
                                                                    $text_m = '<span class="attendance_absent">A</span>';
                                                                    //$bg='background:#c0a7c2';
                                                                }
																
																if((!empty($att_march)) && (@$att_march[$i]=='Over Time')){
                                                                    $text_m = 'OT';
                                                                    //$bg='background:#c0a7c2';
                                                                }

                                                               
                                                                if((!empty($att_march)) && ($attMar[0]=='Half Day')){
                                                                     $text_m = '<span class="attendance_halfday">Hd</span>';
                                                                     //$bg_m='background:#da9090';
                                                                     //array_push($holiday_m,'#da9090');
                                                                     if($attMar[1] == 'Late'){ $text_m.='<span class="attendance_late">/Lt</span>';}
                                                                }
																
																if((!empty($att_march)) && ($attMar[0]=='EarlyLeave')){
                                                                     $text_m = '<span class="attendance_earlyleave">E</span>';
                                                                     //$bg_m='background:#da9090';
                                                                     //array_push($holiday_m,'#da9090');
                                                                     //if($attMar[1] == 'Late'){ $text_m.='<span class="attendance_late">/Lt</span>';}
                                                                }
																
																

                                                            }
                                                    }else{
                                                        $text_m='<span class="attendance_absent">A</span>';
                                                       
                                                    }
                                                    $j = str_pad($i, 2, "0", STR_PAD_LEFT);

                                                    if((!empty($att_march)) && (@$att_march[$j]=='WFH')){
                                                        $text_m = '<span class="attendance_wfh">W</span>';
                                                       // $bg_m='background:#2c80d6';
                                                       // array_push($holiday_m,'#2c80d6');
                                                    }
                                                    if((!empty($att_march)) && (@$att_march[$j]=='OD')){
                                                        $text_m = '<span class="attendance_outside">O</span>';
                                                        //$bg_m='background:#a5c3de';
                                                       // array_push($holiday_m,'#a5c3de');
                                                    }

                                                   
                                                    if(!empty($offshiftarr)){
                                                      
                                                       foreach ($offshiftarr as $key => $variable) {
                                                         //echo '<pre>'; print_r($variable); die;
                                                            if($key == $weekNo_m){
                                                                //echo '<pre>'; print_r($key); die;
                                                                foreach ($variable as $key => $value) {
                                                                //echo $dayJan;
                                                                    if($daymar == $key){
                                                                       //#6c3cc1->half//#yellow->full
                                                                        if($value == 'Half'){
                                                                        $bg_m='background:#6c3cc1;';
                                                                         array_push($holiday,'#6c3cc1');
                                                                        }else{
                                                                        $bg_m='background:yellow;';   
                                                                        if (strpos($text_m, 'A') !== false) {
                                                                        $text_m='';
                                                                        }
                                                                        }
                                                                    array_push($holiday_m,$bg_m);
                                                                    }
                                                                    }
                                                                }
                                                          
                                                       }
                                                   }
                                                          //  $text = '';
                                                            
                                                        //$bg = 'background-image: linear-gradient(to right, red , yellow);';

                                                    //}

                                                   

                                                    /* if(!empty($att_march['early_leave']) && (in_array(sprintf('%02d', $i),$att_march['early_leave'])) ){
                                                        $text_m = '<span class="attendance_earlyleave">E</span>';
                                                        // $bg_m='background:#5c5c5d';
                                                         /// array_push($holiday_m,'#5c5c5d');
                                                    }*/

                                                    if(!empty($att_march['futuredate']) && (in_array(sprintf('%02d', $i),$att_march['futuredate'])) ){
                                                        $text_m = '-';
                                                    }
													
                                                    if(!empty($att_march['holidays']) && (in_array(sprintf('%02d', $i),$att_march['holidays'])) ){
                                                        $bg_m='background:red;';
                                                         array_push($holiday_m,'red');
                                                        if (strpos($text_m, 'A') !== false) {
                                                            $text_m='';
                                                        }
                                                    }

                                                   

                                                    if(!empty($att_march['leaves']) && (in_array(sprintf('%02d', $i),$att_march['leaves'])) ){
                                                        $text_m = 'L';
                                                        //$bg_m='background:#54af50';
                                                       // array_push($holiday_m,'#54af50');
                                                    }

                                                    
                                                }
                                                    
                                                ?>

                                                <!--<td style="<?=$bg?>"><?=$text?></td>-->
                                                <td 
                                                 style="<?php if(!empty($holiday_m) && count($holiday_m) > '1'){
                                                    $strholiday_m = implode(',', $holiday_m);
                                                    echo 'background-image: linear-gradient(to right,'.$strholiday_m.');';
                                                 }else{
                                                    echo $bg_m;
                                                 }
												 ?>"><?=$text_m?>
												 
												 
												 <?php  $text_a = '';
                                                    $text2 = '';
                                                    $bg_a='';
                                                    $holiday_a = array();
                                                    $dayapr = date('l',strtotime('2020-04-'.$i));   
                                                    $curdate_a = date('Y-m-d',strtotime('2020-04-'.$i));
                                                    $weekNo_a = getWeeks($curdate_a,$dayapr);
                                                   

                                                        if(date('Y')>='2020' && date('m') < '04' ){
                                                            $text_a = '-';
                                                        }else{
//echo '<pre>'; print_r($att_april);
                                                     $i = str_pad($i, 2, "0", STR_PAD_LEFT);
                                                      if((!empty($att_april)) &&  (array_key_exists(sprintf('%02d', $i),$att_april))){

                                                        $attApr = explode('_', @$att_april[sprintf('%02d', $i)]);
                                                        //echo '<pre>'; print_r($att_february); die;
                                                        if((!empty($att_april)) && (!empty($attApr[0]) && $attApr[0]=='Full Day')){ // present day

                                                            $text_a = '<span class="attendance_present">P</span>';
                                                            //$bg_a='background:#a950af';
                                                           // array_push($holiday_a,'#a950af');;
                                                           if(!empty($attApr[1]) && $attApr[1] == 'Late'){ $text_a.='<span class="attendance_late">/Lt</span>'; } 
                                                           


                                                            }else{ // absent/half day/o
                                                                $text_a='<span class="attendance_absent">A</span> ';
                                                                //$bg='background:#c0a7c2';
                                                                if((!empty($att_april)) && (@$att_april[$i]=='Absent')){
                                                                    $text_a = '<span class="attendance_absent">A</span> ';
                                                                    //$bg='background:#c0a7c2';
                                                                }
																
																if((!empty($att_april)) && (@$att_april[$i]=='Over Time')){
                                                                    $text_a = 'OT';
																	 //echo $att_april[$i]; 
                                                                    //$bg='background:#c0a7c2';
                                                                }

                                                               
                                                                if((!empty($att_april)) && ($attApr[0]=='Half Day')){
                                                                     $text_a = '<span class="attendance_halfday">Hd</span>';
                                                                     //$bg_a='background:#da9090';
                                                                     //array_push($holiday_a,'#da9090');
                                                                     if($attApr[1] == 'Late'){ $text_a.='<span class="attendance_late">/Lt</span>';}
                                                                }
																
																 if((!empty($att_april)) && ($attApr[0]=='EarlyLeave')){
                                                                     $text_a = '<span class="attendance_earlyleave">E</span>';
                                                                     //$bg_a='background:#da9090';
                                                                     //array_push($holiday_a,'#da9090');
                                                                     //if($attApr[1] == 'Late'){ $text_a.='<span class="attendance_late">/Lt</span>';}
                                                                }

                                                            }
                                                    }else{
                                                        $text_a='<span class="attendance_absent">A</span>';
                                                       
                                                    }
                                                    $j = str_pad($i, 2, "0", STR_PAD_LEFT);

                                                    if((!empty($att_april)) && (@$att_april[$j]=='WFH')){
                                                        $text_a = '<span class="attendance_wfh">W</span>';
                                                        //$bg_a='background:#2c80d6';
                                                       // array_push($holiday_a,'#2c80d6');
                                                    }
                                                    if((!empty($att_april)) && (@$att_april[$j]=='OD')){
                                                        $text_a = '<span class="attendance_outside">O</span>';
                                                        //$bg_a='background:#a5c3de';
                                                        //array_push($holiday_a,'#a5c3de');
                                                    }

                                                   
                                                    if(!empty($offshiftarr)){
                                                      
                                                       foreach ($offshiftarr as $key => $variable) {
                                                        // echo '<pre>'; print_r($variable); die;
                                                            if($key == $weekNo_a){
                                                                //echo '<pre>'; print_r($key); die;
                                                                foreach ($variable as $key => $value) {
                                                                //echo $dayJan;
                                                                    if($dayapr == $key){
                                                                       //#6c3cc1->half//#yellow->full
                                                                        if($value == 'Half'){
                                                                        $bg_a='background:#6c3cc1;';
                                                                        // array_push($holiday,'#6c3cc1');
                                                                        }else{
                                                                        $bg_a='background:yellow;';   
                                                                        if (strpos($text_a, 'A') !== false) {
                                                                        $text_a='';
                                                                        }
                                                                        }
                                                                    array_push($holiday_a,$bg_a);
                                                                    }
                                                                    }
                                                                }
                                                          
                                                       }
                                                   }
                                                          //  $text = '';
                                                            
                                                        //$bg = 'background-image: linear-gradient(to right, red , yellow);';

                                                    //}

                                                   

                                                    /* if(!empty($att_april['early_leave']) && (in_array(sprintf('%02d', $i),$att_april['early_leave'])) ){
                                                        $text_a = '<span class="attendance_earlyleave">E</span>';
                                                         //$bg_a='background:#5c5c5d';
                                                         // array_push($holiday_a,'#5c5c5d');
                                                    }*/

                                                    if(!empty($att_april['futuredate']) && (in_array(sprintf('%02d', $i),$att_april['futuredate'])) ){
                                                        $text_a = '-';
                                                    }
                                                    if(!empty($att_april['holidays']) && (in_array(sprintf('%02d', $i),$att_april['holidays'])) ){
                                                        $bg_a='background:red;';
                                                         array_push($holiday_a,'red');
                                                        if (strpos($text_a, 'A') !== false) {
                                                            $text_a='';
                                                        }
                                                    }

                                                   

                                                    if(!empty($att_april['leaves']) && (in_array(sprintf('%02d', $i),$att_april['leaves'])) ){
                                                        $text_a = 'L';
                                                        //$bg_a='background:#54af50';
                                                       // array_push($holiday_a,'#54af50');
                                                    }

                                                    
                                                }
                                                    
                                                ?>

                                                <!--<td style="<?=$bg?>"><?=$text?></td>-->
                                                <td 
                                                 style="<?php if(!empty($holiday_a) && count($holiday_a) > '1'){
                                                    $strholiday_a = implode(',', $holiday_a);
                                                    echo 'background-image: linear-gradient(to right,'.$strholiday_a.');';
                                                 }else{
                                                    echo $bg_a;
                                                 }?>"><?=$text_a?></td>
                               
                                 <?php  $text_ma = '';
                                                    $text2 = '';
                                                    $bg_ma='';
                                                    $holiday_ma = array();
                                                    $daymay = date('l',strtotime('2020-05-'.$i));   
                                                    $curdate_ma = date('Y-m-d',strtotime('2020-05-'.$i));
                                                    $weekNo_ma = getWeeks($curdate_ma,$daymay);
                                                   

                                                        if(date('Y')>='2020' && date('m') < '05'){
                                                            $text_ma = '-';
                                                        }else{
														$i = str_pad($i, 2, "0", STR_PAD_LEFT);
                                                      if((!empty($att_may)) &&  (array_key_exists(sprintf('%02d', $i),$att_may))){

                                                        $attMay = explode('_', @$att_may[sprintf('%02d', $i)]);
                                                        //echo '<pre>'; print_r($att_february); die;
                                                        if((!empty($att_may)) && (!empty($attMay[0]) && $attMay[0]=='Full Day')){ // present day

                                                            $text_ma = 'P';
                                                            $bg_ma='background:#a950af';
                                                            array_push($holiday_ma,'#a950af');;
                                                           if(!empty($attMay[1]) && $attMay[1] == 'Late'){ $text_ma.='/L'; $bg_ma='background:#4bbcd8'; array_push($holiday_ma,'#4bbcd8'); } 
                                                           


                                                            }else{ // absent/half day/o
                                                                $text_ma='A';
                                                                //$bg='background:#c0a7c2';
                                                                if((!empty($att_may)) && (@$att_may[$i]=='Absent')){
                                                                    $text_ma = 'A';
                                                                    //$bg='background:#c0a7c2';
                                                                }
																
																if((!empty($att_may)) && (@$att_may[$i]=='Over Time')){
                                                                    $text_ma = 'OT';
                                                                    //$bg='background:#c0a7c2';
                                                                }

                                                               
                                                                if((!empty($att_may)) && ($attMay[0]=='Half Day')){
                                                                     $text_ma = 'H';
                                                                     $bg_ma='background:#da9090';
                                                                     array_push($holiday_ma,'#da9090');
                                                                     if($attMay[1] == 'Late'){ $text_ma.='/L'; $bg_ma='background:#4bbcd8'; array_push($holiday_ma,'#4bbcd8');}
                                                                }
																
																if((!empty($att_may)) && ($attMay[0]=='EarlyLeave')){
                                                                     $text_ma = 'H';
                                                                     $bg_ma='background:#da9090';
                                                                     array_push($holiday_ma,'#da9090');
                                                                     if($attMay[1] == 'Late'){ $text_ma.='/L'; $bg_ma='background:#4bbcd8'; array_push($holiday_ma,'#4bbcd8');}
                                                                }

                                                            }
                                                    }else{
                                                        $text_ma='A';
                                                       
                                                    }
                                                    $j = str_pad($i, 2, "0", STR_PAD_LEFT);

                                                    if((!empty($att_may)) && (@$att_may[$j]=='WFH')){
                                                        $text_ma = '<span class="attendance_wfh">W</span>';
                                                        $bg_ma='background:#2c80d6';
                                                        array_push($holiday_ma,'#2c80d6');
                                                    }
                                                    if((!empty($att_may)) && (@$att_may[$j]=='OD')){
                                                        $text_ma = 'OD';
                                                        $bg_ma='background:#a5c3de';
                                                        array_push($holiday_ma,'#a5c3de');
                                                    }

                                                   
                                                    if(!empty($offshiftarr)){
                                                      
                                                       foreach ($offshiftarr as $key => $variable) {
                                                         //echo '<pre>'; print_r($variable); die;
                                                            if($key == $weekNo_ma){
                                                                //echo '<pre>'; print_r($key); die;
                                                                foreach ($variable as $key => $value) {
                                                                //echo $dayJan;
                                                                    if($daymay == $key){
                                                                       //#6c3cc1->half//#yellow->full
                                                                        if($value == 'Half'){
                                                                        $bg_ma='background:#6c3cc1;';
                                                                        // array_push($holiday,'#6c3cc1');
                                                                        }else{
                                                                        $bg_a='background:yellow;';   
                                                                        if (strpos($text_ma, 'A') !== false) {
                                                                        $text_ma='';
                                                                        }
                                                                        }
                                                                    array_push($holiday_ma,$bg_ma);
                                                                    }
                                                                    }
                                                                }
                                                          
                                                       }
                                                   }
                                                          //  $text = '';
                                                            
                                                        //$bg = 'background-image: linear-gradient(to right, red , yellow);';

                                                    //}

                                                   

                                                     /*if(!empty($att_may['early_leave']) && (in_array(sprintf('%02d', $i),$att_may['early_leave'])) ){
                                                        $text_ma = 'EL';
                                                         $bg_ma='background:#5c5c5d';
                                                          array_push($holiday_ma,'#5c5c5d');
                                                    }*/

                                                    if(!empty($att_may['futuredate']) && (in_array(sprintf('%02d', $i),$att_may['futuredate'])) ){
                                                        $text_ma = '-';
                                                    }
                                                    if(!empty($att_may['holidays']) && (in_array(sprintf('%02d', $i),$att_may['holidays'])) ){
                                                        $bg_ma='background:red;';
                                                         array_push($holiday_ma,'red');
                                                        if (strpos($text_ma, 'A') !== false) {
                                                            $text_ma='';
                                                        }
                                                    }

                                                   

                                                    if(!empty($att_may['leaves']) && (in_array(sprintf('%02d', $i),$att_may['leaves'])) ){
                                                        $text_ma = 'L';
                                                        $bg_ma='background:#54af50';
                                                        array_push($holiday_ma,'#54af50');
                                                    }

                                                    
                                                }
                                                    
                                                ?>

                                                <!--<td style="<?=$bg?>"><?=$text?></td>-->
                                                <td 
                                                 style="<?php if(!empty($holiday_ma) && count($holiday_ma) > '1'){
                                                    $strholiday_ma = implode(',', $holiday_ma);
                                                    echo 'background-image: linear-gradient(to right,'.$strholiday_ma.');';
                                                 }else{
                                                    echo $bg_ma;
                                                 }?>"><?=$text_ma?></td>
												  <?php  $text_jn = '';
                                                    $text2 = '';
                                                    $bg_jn='';
                                                    $holiday_jn = array();
                                                    $dayjune = date('l',strtotime('2020-06-'.$i));   
                                                    $curdate_jn = date('Y-m-d',strtotime('2020-06-'.$i));
                                                    $weekNo_jn = getWeeks($curdate_jn,$dayjune);
                                                   

                                                        if(date('Y')>='2020' && date('m') < '06'){
                                                            $text_jn = '-';
                                                        }else{
															$i = str_pad($i, 2, "0", STR_PAD_LEFT);

                                                      if((!empty($att_june)) &&  (array_key_exists(sprintf('%02d', $i),$att_june))){

                                                        $attJun = explode('_', @$att_june[sprintf('%02d', $i)]);
                                                        //echo '<pre>'; print_r($att_february); die;
                                                        if((!empty($att_jun)) && (!empty($attJun[0]) && $attJun[0]=='Full Day')){ // present day

                                                            $text_jn = 'P';
                                                            $bg_jn='background:#a950af';
                                                            array_push($holiday_jn,'#a950af');;
                                                           if(!empty($attJun[1]) && $attJun[1] == 'Late'){ $text_jn.='/L'; $bg_jn='background:#4bbcd8'; array_push($holiday_jn,'#4bbcd8'); } 
                                                           


                                                            }else{ // absent/half day/o
                                                                $text_jn='A';
                                                                //$bg='background:#c0a7c2';
                                                                if((!empty($att_june)) && (@$att_june[$i]=='Absent')){
                                                                    $text_jn = 'A';
                                                                    //$bg='background:#c0a7c2';
                                                                }
																
																if((!empty($att_june)) && (@$att_june[$i]=='Over Time')){
                                                                    $text_jn = 'OT';
                                                                    //$bg='background:#c0a7c2';
                                                                }

                                                               
                                                                if((!empty($att_june)) && ($attJun[0]=='Half Day')){
                                                                     $text_jn = 'H';
                                                                     $bg_jn='background:#da9090';
                                                                     array_push($holiday_jn,'#da9090');
                                                                     if($attJun[1] == 'Late'){ $text_jn.='/L'; $bg_jn='background:#4bbcd8'; array_push($holiday_jn,'#4bbcd8');}
                                                                }

                                                            }
                                                    }else{
                                                        $text_jn='A';
                                                       
                                                    }
                                                    $j = str_pad($i, 2, "0", STR_PAD_LEFT);

                                                    if((!empty($att_june)) && (@$att_june[$j]=='WFH')){
                                                        $text_jn = '<span class="attendance_wfh">W</span>';
                                                        $bg_jn='background:#2c80d6';
                                                        array_push($holiday_jn,'#2c80d6');
                                                    }
                                                    if((!empty($att_june)) && (@$att_june[$j]=='OD')){
                                                        $text_jn = 'OD';
                                                        $bg_jn='background:#a5c3de';
                                                        array_push($holiday_jn,'#a5c3de');
                                                    }

                                                   
                                                    if(!empty($offshiftarr)){
                                                      
                                                       foreach ($offshiftarr as $key => $variable) {
                                                         //echo '<pre>'; print_r($variable); die;
                                                            if($key == $weekNo_jn){
                                                                //echo '<pre>'; print_r($key); die;
                                                                foreach ($variable as $key => $value) {
                                                                //echo $dayJan;
                                                                    if($dayjune == $key){
                                                                       //#6c3cc1->half//#yellow->full
                                                                        if($value == 'Half'){
                                                                        $bg_jn='background:#6c3cc1;';
                                                                        // array_push($holiday,'#6c3cc1');
                                                                        }else{
                                                                        $bg_jn='background:yellow;';   
                                                                        if (strpos($text_jn, 'A') !== false) {
                                                                        $text_jn='';
                                                                        }
                                                                        }
                                                                    array_push($holiday_jn,$bg_jn);
                                                                    }
                                                                    }
                                                                }
                                                          
                                                       }
                                                   }
                                                          //  $text = '';
                                                            
                                                        //$bg = 'background-image: linear-gradient(to right, red , yellow);';

                                                    //}

                                                   

                                                     if(!empty($att_june['early_leave']) && (in_array(sprintf('%02d', $i),$att_june['early_leave'])) ){
                                                        $text_jn = 'EL';
                                                         $bg_jn='background:#5c5c5d';
                                                          array_push($holiday_jn,'#5c5c5d');
                                                    }

                                                    if(!empty($att_june['futuredate']) && (in_array(sprintf('%02d', $i),$att_june['futuredate'])) ){
                                                        $text_jn = '-';
                                                    }
                                                    if(!empty($att_june['holidays']) && (in_array(sprintf('%02d', $i),$att_june['holidays'])) ){
                                                        $bg_jn='background:red;';
                                                         array_push($holiday_jn,'red');
                                                        if (strpos($text_jn, 'A') !== false) {
                                                            $text_jn='';
                                                        }
                                                    }

                                                   

                                                    if(!empty($att_june['leaves']) && (in_array(sprintf('%02d', $i),$att_june['leaves'])) ){
                                                        $text_jn = 'L';
                                                        $bg_jn='background:#54af50';
                                                        array_push($holiday_jn,'#54af50');
                                                    }

                                                    
                                                }
                                                    
                                                ?>

                                                <!--<td style="<?=$bg?>"><?=$text?></td>-->
                                                <td 
                                                 style="<?php if(!empty($holiday_jn) && count($holiday_jn) > '1'){
                                                    $strholiday_jn = implode(',', $holiday_jn);
                                                    echo 'background-image: linear-gradient(to right,'.$strholiday_jn.');';
                                                 }else{
                                                    echo $bg_jn;
                                                 }?>"><?=$text_jn?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
						<?php } ?>                            
                            
                        </tbody>
                    </table>
                    
                    </div>
                            <div class="ks-user-list-view-table mt-4" style="display:none;">
                                <div class="table-responsive" style="overflow-x:auto;">
                                    <table id="example" class="table table-bordered dt-responsive table-emp-attendance mb-0">
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
                                                    $text_m = '';
                                                    $text2 = '';
                                                    $bg_m='';
                                                    $holiday_m = array();
                                                    $daymar = date('l',strtotime('2020-03-'.$i));   
                                                    $curdate_m = date('Y-m-d',strtotime('2020-02-'.$i));
                                                    $weekNo_m = getWeeks($curdate_m,$daymar);
                                                   

                                                        if(date('Y')>='2020' && date('m') < '03'){
                                                            $text_m = '-';
                                                        }else{

                                                      if((!empty($att_march)) &&  (array_key_exists(sprintf('%02d', $i),$att_march))){

                                                        $attMar = explode('_', @$att_march[sprintf('%02d', $i)]);
                                                        //echo '<pre>'; print_r($att_february); die;
                                                        if((!empty($att_march)) && (!empty($attMar[0]) && $attMar[0]=='Full Day')){ // present day

                                                            $text_m = 'P';
                                                            $bg_m='background:#a950af';
                                                            array_push($holiday_m,'#a950af');;
                                                           if(!empty($attMar[1]) && $attMar[1] == 'Late'){ $text_m.='/L'; $bg_m='background:#4bbcd8'; array_push($holiday_m,'#4bbcd8'); } 
                                                           


                                                            }else{ // absent/half day/o
                                                                $text_m='A';
                                                                //$bg='background:#c0a7c2';
                                                                if((!empty($att_march)) && (@$att_march[$i]=='Absent')){
                                                                    $text_m = 'A';
                                                                    //$bg='background:#c0a7c2';
                                                                }

                                                               
                                                                if((!empty($att_march)) && ($attMar[0]=='Half Day')){
                                                                     $text_f = 'H';
                                                                     $bg_f='background:#da9090';
                                                                     array_push($holiday_m,'#da9090');
                                                                     if($attMar[1] == 'Late'){ $text_m.='/L'; $bg_m='background:#4bbcd8'; array_push($holiday_m,'#4bbcd8');}
                                                                }

                                                            }
                                                    }else{
                                                        $text_m='A';
                                                       
                                                    }
                                                    $j = str_pad($i, 2, "0", STR_PAD_LEFT);

                                                    if((!empty($att_march)) && (@$att_march[$j]=='WFH')){
                                                        $text_f = 'WFH';
                                                        $bg_f='background:#2c80d6';
                                                        array_push($holiday_m,'#2c80d6');
                                                    }
                                                    if((!empty($att_march)) && (@$att_march[$j]=='OD')){
                                                        $text_m = 'OD';
                                                        $bg_m='background:#a5c3de';
                                                        array_push($holiday_m,'#a5c3de');
                                                    }

                                                   
                                                    if(!empty($offshiftarr)){
                                                      
                                                       foreach ($offshiftarr as $key => $variable) {
                                                         //echo '<pre>'; print_r($variable); die;
                                                            if($key == $weekNo_m){
                                                                //echo '<pre>'; print_r($key); die;
                                                                foreach ($variable as $key => $value) {
                                                                //echo $dayJan;
                                                                    if($daymar == $key){
                                                                       //#6c3cc1->half//#yellow->full
                                                                        if($value == 'Half'){
                                                                        $bg_m='background:#6c3cc1;';
                                                                        // array_push($holiday,'#6c3cc1');
                                                                        }else{
                                                                        $bg_m='background:yellow;';   
                                                                        if (strpos($text_m, 'A') !== false) {
                                                                        $text_m='';
                                                                        }
                                                                        }
                                                                    array_push($holiday_m,$bg_m);
                                                                    }
                                                                    }
                                                                }
                                                          
                                                       }
                                                   }
                                                          //  $text = '';
                                                            
                                                        //$bg = 'background-image: linear-gradient(to right, red , yellow);';

                                                    //}

                                                   

                                                     if(!empty($att_march['early_leave']) && (in_array(sprintf('%02d', $i),$att_march['early_leave'])) ){
                                                        $text_m = 'EL';
                                                         $bg_m='background:#5c5c5d';
                                                          array_push($holiday_m,'#5c5c5d');
                                                    }

                                                    if(!empty($att_march['futuredate']) && (in_array(sprintf('%02d', $i),$att_march['futuredate'])) ){
                                                        $text_m = '-';
                                                    }
                                                    if(!empty($att_march['holidays']) && (in_array(sprintf('%02d', $i),$att_march['holidays'])) ){
                                                        $bg_m='background:red;';
                                                         array_push($holiday_m,'red');
                                                        if (strpos($text_m, 'A') !== false) {
                                                            $text_m='';
                                                        }
                                                    }

                                                   

                                                    if(!empty($att_march['leaves']) && (in_array(sprintf('%02d', $i),$att_march['leaves'])) ){
                                                        $text_m = 'L';
                                                        $bg_m='background:#54af50';
                                                        array_push($holiday_m,'#54af50');
                                                    }

                                                    
                                                }
                                                    
                                                ?>

                                                <!--<td style="<?=$bg?>"><?=$text?></td>-->
                                                <td 
                                                 style="<?php if(!empty($holiday_m) && count($holiday_m) > '1'){
                                                    $strholiday_m = implode(',', $holiday_m);
                                                    echo 'background-image: linear-gradient(to right,'.$strholiday_m.');';
                                                 }else{
                                                    echo $bg_m;
                                                 }?>"><?=$text_m?></td>
                                                 <?php } ?>
                                             
                                            </tr>

                                            <tr>
                                                <td class="" nowrap>April</td>
                                                
                                              <?php for ($i=01; $i <= 31 ; $i++) {
                                                $text = '';
                                                    $bg='';
													

													//echo '<pre>'; print_r($att_april); die;
                                                if(date('Y')>='2020' && date('m') < '04'){
                                                          $text = '-';
                                                        }else{
                                                     $i = str_pad($i, 2, "0", STR_PAD_LEFT);
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
            
             
            <div class="tab-pane fade p-0" id="pills-loans" role="tabpanel" aria-labelledby="pills-loans-tab">
                
                <div class="row">
                    <div class="col-6 align-self-center">
                        <h6>Loan</h6>
                    </div>
                    <div class="col-6 text-right">
                        <a href="javascript:void(0);" onclick="openaddLoanapplicationForm();" type="btn" class="btn btn-primary btn-add-loan btnDisabled">Add</a>
                        <?php
                                                 if($this->session->userdata('type')=='management')
                                                 {
                                                ?>
                        <a href="javascript:void(0);" onclick="openaddLoanpaymentForm();" type="btn" class="btn btn-info btn-add-loan btnDisabled">Loan Payment</a>
<?php
                                                 }
                                                 ?>
                    </div>
                </div>
                <hr>
                
                 <div style="display:none;" id="loanapplicationaddForm">
                <form name="loanapplication" id="loanapplication"   method="post" enctype="multipart/form-data" >
                    
                    <input type="hidden" name="loan_application_edit_id" id="loan_application_edit_id" value=""> 
                    <div class="form-box">
                        <h6>Loan Application</h6>
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
                                            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#attachment_modal" title="View" style="width:45px"><span class="la la-eye ks-icon ml-2 pr-2"></span></button>
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
                                <label for="" class="form-control-label">Purpose Of Loan</label>
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
                
                </div>
                <div style="display:none;" class="row" id="approve_div">
                         <div class="col-sm-6 col-xl-5"> 
                            <div class="form-group">
                                <label for="" class="form-control-label">Loan Sanction Note</label>
                                <textarea rows="3"  placeholder="Loan Sanction Note" class="form-control inputDisabled" name='loan_sanction_note'  id='loan_sanction_note'></textarea>
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
                                <input type="text" placeholder="Enter Installment Start Date" onblur="gotocalculate(this.value)" class="form-control mysingle_date inputDisabled" name='installment_start_date'  id='installment_start_date' value="">
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
                                <input type="text" placeholder="Enter Loan Issue Date"  class="form-control mysingle_date inputDisabled" name='loan_issue_date'  id='loan_issue_date' value="" >
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
                    <a onclick="loan_application_form_submit('<?php echo $id; ?>')" class="btn btn-success">Save</a>
           
                
                
             
                
                
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
                                <input type="text"  placeholder="Enter Payment Date" class="form-control mysingle_date inputDisabled" name='payment_date'  id='payment_date' value="" >
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
                                    <table id="ks-datatable50"  class="table table-list table-bordered mb-0">
                                        
                                  <?php
                                   if(!empty($loan_payment))
                                   {
                                   ?>
                                        <thead>
                                        
                                        <tr>
                                            <th>#</th>
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
			 <div class="ks-user-list-view-table">
                                <div class="table-responsiveX">
                                    <table id="ks-datatable49" class="table loan_application table-bordered mb-0">
                                        
                                   <?php
                                   if(!empty($loan_application))
                                   {
                                   ?>
                                        <thead>
                                            <tr>
                                                <th>Loan Id</th>
<!--                                            <th>Employee Name</th>
                                            <th>Employee No.</th>-->
                                            <th>Reference</th>
                                            <th>Issue Date</th>
                                            <th>Loan Amount</th>
                                            <th>Installment Start Date</th>
                                            <th>Loan End Date</th>
                                            <th>Installment Amount</th>
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



<div class="modal" id="myModalsalary">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="notification_heading_salary"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" >
       <p id="notification_body_salary"></p>
      </div>

    </div>
  </div>
</div>

<div id="uploadimageModal" class="modal" role="dialog">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
        <div class="modal-header">          
          <h4 class="modal-title">Upload & Crop Image</h4>
          <button type="button" class="close" data-dismiss="modal"><i class="la la-times"></i></button>
        </div>
        <div class="modal-body">
            <div id="image_demo"></div>            
     </div>     
        <div class="modal-footer">
		<!--<button type="button" onclick="resetprofile();" class="btn btn-sm btn-danger save-profile-btn"><i class="la la-times"></i></button>-->
		 <button type="button" onclick="resetprofile();"  class="btn btn-danger" data-dismiss="modal">Reset</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button class="btn btn-success crop_image">Save</button>
        </div>
     </div>
    </div>
</div>

<div id="uploadvoterModal" class="modal" role="dialog">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Upload & Crop Image</h4>
          <button type="button" class="close" data-dismiss="modal"><i class="la la-times"></i></button>
        </div>
        <div class="modal-body">
            <div id="image_voter"></div>          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button class="btn btn-success crop_v_image">Save</button>
        </div>
     </div>
    </div>
</div>

<div id="uploadaadharModal" class="modal" role="dialog">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Upload & Crop Image</h4>
          <button type="button" class="close" data-dismiss="modal"><i class="la la-times"></i></button>
        </div>
        <div class="modal-body">
            <div id="image_aadhar"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button class="btn btn-success crop_a_image">Save</button>
        </div>
     </div>
    </div>
</div>

<div id="uploadpanModal" class="modal" role="dialog">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Upload & Crop Image</h4>
          <button type="button" class="close" data-dismiss="modal"><i class="la la-times"></i></button>
        </div>
        <div class="modal-body">
            <div id="image_pan"></div>       
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button class="btn btn-success crop_p_image">Save</button>
        </div>
     </div>
    </div>
</div>
<!-- [end] Notification DIV -->
  
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
 <script>
 
function openForm(id){
    
   $.post("<?php echo base_url('admin_get_edit_form_closure'); ?>", {id: id}, function(result){
      //console.log(result);
   $(".add-closure").html(result);
   $(".add-closure").show(); 
   $(".btn-add-closure").hide(); 
   
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
				alert('If select can not Edit or delete');
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
		
		$('#access_permission').click(function(){
            if($(this).prop("checked") == true){
				
                $('#access_permission').val('1');
                alert('Please enter user roll of this employee');
            }
            else if($(this).prop("checked") == false){
               $('#access_permission').val('0');
            }
        });

        $('#esi_checkbox').click(function(){
            if($(this).prop("checked") == true){
				alert('If select can not Edit or delete');
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
				alert('If select can not Edit or delete');
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
		
		 $('#enable_overtime').click(function(){
            if($(this).prop("checked") == true){
                $('#enable_overtime').val('1');
                
            }
            else if($(this).prop("checked") == false){
               $('#enable_overtime').val('0');
            }
        });
    });



 //$(document).ready(function () {

    //$("#submit_exp").click(function (event) {

        //stop submit the form, we will post it manually.
        //event.preventDefault();
		function submitexp(){
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
               if(data == 'exist'){
					$("#Company").css('border','1px solid red');
					$("#from_date").css('border','1px solid red');
					$("#to_date").css('border','1px solid red');
					alert('Data already exists');
				}else{
				$("#add_experience").html(data);
				$("#Company").val('');
				$("#job_title").val('');
				$("#cv1").val('');
				$("#from_date").val('');
				$("#to_date").val('');
				$("#experience_div").show();
				$("#Company").css('border','');
				$("#from_date").css('border','');
				$("#to_date").css('border','');
				}
            },
           /* error: function (e) {

                $("#result").text(e.responseText);
                console.log("ERROR : ", e);
                $("#btnSubmit").prop("disabled", false);

            }*/
        });
	}
    //});

//});


//$(document).ready(function () {

   //$("#submit_edu").click(function (event) {
function submitedu(){
        //stop submit the form, we will post it manually.
        //event.preventDefault();
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
				if(data == 'exist'){
				$("#Level").css('border','1px solid red');
				$("#year").css('border','1px solid red');
				alert('Data already exists');
				}else{
				$("#add_education").html(data);
				$("#Level").val('');
				$("#Institute").val('');
				$("#year").val('');
				$("#cv").val('');
				$("#marks").val('');
				$("#education_div").show();
				$("#Level").css('border','');
				$("#year").css('border','');
				}

            },
           /* error: function (e) {

                $("#result").text(e.responseText);
                console.log("ERROR : ", e);
                $("#btnSubmit").prop("disabled", false);

            }*/
        });
}
   // });

//});

function salaryEdit(id,empid,salary){
              $("#myModalsalary").on('shown.bs.modal', function() {
                $.post("<?php echo base_url('admin_get_net_salary_div_edit'); ?>", {'id': id,'empid':empid,'salary':salary}, function(result){
                $("#notification_body_salary").html(result);
                });
                
              }).modal("show");

            }



   function salaryView(id,empid,salary_structure_val,salary){
              $("#myModalsalary").on('shown.bs.modal', function() {
                $.post("<?php echo base_url('admin_get_net_salary_div_view'); ?>", {'id':id,'salary_structure_val': salary_structure_val,'employee_id':empid,'ctcVal':salary}, function(result){
                $("#notification_body_salary").html(result);
                 $("#notification_heading_salary").html('Net Salary Calculation');
                });
                
              }).modal("show");

            }





$(document).ready(function($) {
				
    $('#perma_addr').change(function() {
        $('.perma_address').slideToggle();
        if($(this).prop("checked") == true){
        $('#perma_addr').val('1');
        }
        else if($(this).prop("checked") == false){
        $('#perma_addr').val('0');
        }
    });				
		
});
				
function delete_exp(id){
$.post("<?php echo base_url('delete_experience'); ?>", {'id': id}, function (result) {
$("#add_experience").html(result);
notification('success');   
});
}

function delete_edu(id){
$.post("<?php echo base_url('delete_education'); ?>", {'id': id}, function (result) {
$("#add_education").html(result);
notification('success');   
});
}


//(function($) {
//    $.fn.toggleDisabled = function(){
//        return this.each(function(){
//            this.disabled = !this.disabled;
//        });
//    };
//})(jQuery);

$(document).ready(function(){
    $('input').prop('disabled','disabled');
    $('select').prop('disabled','disabled');
	 $('button').prop('disabled','disabled');
	 //$('.dropdown-item').attr("disabled","disabled");
});
$('.btnEnable').click(function(){
    $('input').prop('disabled','');
    $('select').prop('disabled','');
	$('button').prop('disabled','');
	$('input.check-disable').prop('disabled', 'disabled');
	//$('.dropdown-item').attr("disabled","");
    $('.btnEnable').remove();
});


$(document).ready(function(){

 $image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:200,
      height:200,
      type:'circle' //circle
    },
    boundary:{
      width:300,
      height:300
    }
  });
  
  

  $('#upload_image').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
  });

  $('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
		//alert(response);
      $.ajax({
        url:"<?php echo base_url('upload_crop_image'); ?>",
        type: "POST",
        data:{"image": response},
        success:function(data)
        {
			console.log(data);
          $('#uploadimageModal').modal('hide');
          $('#newcrimage').html(data);
		  //$('#blah').html(data);
		  
        }
      });
    })
  });
  
  
    $image_crop_voter = $('#image_voter').croppie({
    enableExif: true,
    viewport: {
      width:200,
      height:200,
      type:'square' //circle
    },
    boundary:{
      width:300,
      height:300
    }
  });
  
  $('#upload_voter').on('change', function(){
    var reader1 = new FileReader();
    reader1.onload = function (event) {
      $image_crop_voter.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader1.readAsDataURL(this.files[0]);
    $('#uploadvoterModal').modal('show');
  });
  
   $('.crop_v_image').click(function(event){
    $image_crop_voter.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
		//alert(response);
      $.ajax({
        url:"<?php echo base_url('upload_voter_crop_image'); ?>",
        type: "POST",
        data:{"image": response},
        success:function(data)
        {
			//console.log(data);
          $('#uploadvoterModal').modal('hide');
          $('#votercrimage').html(data);
		  $('#voterpaperclip').addClass('btn-success');
		  $('#voterpaperclip').removeClass('btn-secondary');
		  
		  //$('#blah').html(data);btn-success//btn-secondary
		  
        }
      });
    })
  });
  
  $image_crop_aadhar = $('#image_aadhar').croppie({
    enableExif: true,
    viewport: {
      width:200,
      height:200,
      type:'square' //circle
    },
    boundary:{
      width:300,
      height:300
    }
  });
  
   $('#upload_aadhar').on('change', function(){
    var reader2 = new FileReader();
    reader2.onload = function (event) {
      $image_crop_aadhar.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader2.readAsDataURL(this.files[0]);
    $('#uploadaadharModal').modal('show');
  });
  
   $('.crop_a_image').click(function(event){
    $image_crop_aadhar.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
		//alert(response);
      $.ajax({
        url:"<?php echo base_url('upload_aadhar_crop_image'); ?>",
        type: "POST",
        data:{"image": response},
        success:function(data)
        {
			//console.log(data);
          $('#uploadaadharModal').modal('hide');
          $('#aadharcrimage').html(data);
		  $('#aadharpaperclip').addClass('btn-success');
		  $('#aadharpaperclip').removeClass('btn-secondary');
		  
        }
      });
    })
  });
  
   $image_crop_pan = $('#image_pan').croppie({
    enableExif: true,
    viewport: {
      width:200,
      height:200,
      type:'square' //circle
    },
    boundary:{
      width:300,
      height:300
    }
  });
  
   $('#upload_pan').on('change', function(){
    var reader3 = new FileReader();
    reader3.onload = function (event) {
      $image_crop_pan.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader3.readAsDataURL(this.files[0]);
    $('#uploadpanModal').modal('show');
  });
  
  $('.crop_p_image').click(function(event){
    $image_crop_pan.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
		//alert(response);
      $.ajax({
        url:"<?php echo base_url('upload_pan_crop_image'); ?>",
        type: "POST",
        data:{"image": response},
        success:function(data)
        {
			//console.log(data);
          $('#uploadpanModal').modal('hide');
          $('#pancrimage').html(data);
		  $('#panpaperclip').addClass('btn-success');
		  $('#panpaperclip').removeClass('btn-secondary');
		  
        }
      });
    })
  });

});

function resetpan(){
	$('#pancrimage').html('<img id="blah2" class="ks-avatar" src="<?php echo base_url(); ?>assets/img/avatars/placeholders/ava-128.png" width="100" height="100"><input type="hidden" name="pan_image" id="pan_image" value="">');
	$('#panpaperclip').addClass('btn-secondary');
    $('#panpaperclip').removeClass('btn-success');
}
function resetaadhar(){
	$('#aadharcrimage').html('<img id="blah3" class="ks-avatar" src="<?php echo base_url(); ?>assets/img/avatars/placeholders/ava-128.png" width="100" height="100"><input type="hidden" name="aadhar_image" id="aadhar_image" value="">');
	
	$('#aadharpaperclip').addClass('btn-secondary');
    $('#aadharpaperclip').removeClass('btn-success');
}
function resetvoter(){
	$('#votercrimage').html('<img id="blah1" class="ks-avatar" src="<?php echo base_url(); ?>assets/img/avatars/placeholders/ava-128.png" width="100" height="100"><input type="hidden" name="voter_image" id="voter_image" value="">');
	 $('#voterpaperclip').addClass('btn-secondary');
    $('#voterpaperclip').removeClass('btn-success');
}

function resetprofile(){
	$('#newcrimage').html('<img id="blah2" class="ks-avatar" src="<?php echo base_url(); ?>assets/img/avatars/placeholders/ava-128.png" width="100" height="100"><input type="hidden" name="new_image" id="new_image" value="">');
	
	$('#uploadimageModal').modal('hide');
}

function getupdatedive(){
	$('#updatesalary').toggle();
}
function gethistorydiv(){
	$('#sal_history_div').toggle();
}


</script>
        