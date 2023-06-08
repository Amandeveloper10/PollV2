<script src="<?php echo base_url(); ?>assets/imagecrop/croppie.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/imagecrop/croppie.css" />
<?php $organization_details = checkOrganization1();
 $SysConfigauthenticaton = checkConfig1();

$jquery_date_format = $SysConfigauthenticaton->jquery_date_format; ?>
<style>
    .custom-file-label:after{
        line-height: 26px;
    }
</style>
<div class="ks-page-header">
    <section class="ks-title">
        <h3>Add Employee</h3>
        <div class="ks-controls">            
            <a href="javascript:;" class="btn btn-icon btn-light btn_maximize"><i class="far fa-window-maximize"></i></a>
        </div>
    </section>
</div>


<div class="ks-page-content">
    <div class="ks-page-content-body">
        <div class="content-wrapper">
            <form  class="ks-form ks-settings-tab-form ks-general" method="post" action="" name="general" id="general" enctype="multipart/form-data"> <!-- ks-uppercase ks-light -->
                <div class="row">
                    <div class="col-lg-3 col-md-4 profile_summary align-self-center">
                        <div class="ks-manage-avatar avatar-emp-profile"> 
						<div id="newcrimage">
                        <img id="blah" class="ks-avatar" src="<?php echo base_url(); ?>assets/img/avatars/placeholders/ava-128.png" width="100" height="100">   </div>                     
                                <label class="btn btn-primary ks-btn-file">
                                        <span class="la la-image ks-icon"></span>                    
                                       <!-- <input onchange="readURL(this,'general')" type="file" name="image" id="image">-->
										<input type="file" name="upload_image" id="upload_image" />
                                </label>
								<br />
						        <div id="uploaded_image"></div>
                               
                                <input type="hidden" name="imageold" value="<?php //echo (isset($data_single->personal_image) ? @$data_single->personal_image : ''); ?>">                                
                            </div>
                        <!--<button type="button" onclick="resetprofile();" class="btn btn-success save-profile-btn">Reset</button>-->
                        </div>
						
						
                    
                    <div class="col-lg-9 col-md-8">
                        <div class="row">
                            <div class="col-sm-12">                                
                                <div class="form-group">
                                    <label for="" class="form-control-label"><span style="color:red;">* </span>Full Name</label>
                                    <div class="input-group">
                                    <input type="text" placeholder="Enter first name" onkeyup="only_charecter(this);" class="form-control inputDisabled" maxlength="12" name='first_name' required id='first_name' value="">                                        
                                    <input type="text" name='middle_name' onkeyup="only_charecter(this);" id='middle_name'  maxlength="5" value="" placeholder="Middle Name"  class="form-control">                                        
                                    <input type="text" name='last_name' onkeyup="only_charecter(this);" id='last_name'  maxlength="12" value="" placeholder="Last name" class="form-control">                                    
                                    </div>
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                <label class="d-block">Gender</label>
                                <div class="d-inline-block mt-2">
                                    <div class="custom-control custom-radio ks-radio ks-info">
                                        <input id="r3" type="radio" required class="custom-control-input inputDisabled " value="Male"   name='gender'   <?php if(@$data_single->gender=='Male'){ ?> checked="checked" <?php } ?> 
                                               data-validation="radio_group"
                                               data-validation-qty="min1">
                                        <label class="custom-control-label" for="r3">Male</label>
                                    </div>
                                </div>
                                <div class="d-inline-block mt-2 ml-3">
                                    <div class="custom-control custom-radio ks-radio ks-purple">
                                        <input id="r4" type="radio" required class="custom-control-input inputDisabled" value="Female"  name='gender'   <?php if(@$data_single->gender=='Female'){ ?> checked="checked" <?php } ?> 
                                               data-validation="radio_group"
                                               data-validation-qty="min1">
                                        <label class="custom-control-label" for="r4">Female</label>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                <label for="" class="form-control-label"><span style="color:red;">* </span>Birth Date</label>
                                <input type="text" placeholder="Enter date" class="form-control inputDisabled mysingle_date" name='dob' required="required"  id='dob' value="">
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                <label for="" class="form-control-label"><span style="color:red;">* </span>Joining Date</label>
                                <input type="text" placeholder="Select date" required="required" class="form-control ks-daterange-single inputDisabled mysingle_date" name='hire_date'  id='hire_date'  value="">
                            </div>
                            </div>
							
							<div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label"><span style="color:red;">* </span>Mobile No.</label>
                                <input type="text" placeholder="Enter mobile number" class="form-control inputDisabled" onkeyup="numeric(this)" maxlength="10" value="<?php echo @$data_single->contact_mobile; ?>" name='contact_mobile'  id='contact_mobile'>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label"><span style="color:red;">* </span>Email/Login Email</label>
                                <input type="email" placeholder="Enter email"  class="form-control inputDisabled" name='contact_email'  id='contact_email' value="<?php echo @$data_single->contact_email; ?>" >
                            </div>
                        </div>
                             
                            <div class="col-sm-4">
                                <div class="form-group">
                                <label for="" class="form-control-label">Category</label>
                                <select name='employee_category' required id='employee_category' class="form-control inputDisabled" >
                                    <option value="Employee" <?php if(@$data_single->employee_category=='Employee'){ ?> selected="selected" <?php } ?>>Employee</option>
                                    <option value="Labor" <?php if(@$data_single->employee_category=='Labor'){ ?> selected="selected" <?php } ?>>Labor</option>
                                </select>
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                <label for="" class="form-control-label"><span style="color:red;">* </span>Religion</label>
                                <input type="text" placeholder="Enter relegion" class="form-control inputDisabled" value="<?php echo @$data_single->religion; ?>" required name='religion' id='religion'>
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                <label for="" class="form-control-label"><span style="color:red;">* </span>Status</label>
                                <select name='status' required id='status' class="form-control inputDisabled">
                          
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
                                        <input type="checkbox" class="custom-control-input" <?php if(!empty($data_single->access_permission) && $data_single->access_permission == '1'){ echo 'checked';} else { echo '';} ?> name="access_permission" id="access_permission" value="0">
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
                                <input type="text" placeholder="Enter number of children" class="form-control inputDisabled" onkeyup="numeric(this)"maxlength="2" name='no_of_children'  id='no_of_children' value="<?php echo @$data_single->no_of_children; ?>" >
                            </div>
                        </div>
                    
                    </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card" id="address_card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="m-0">
                                <button class="btn btn-link collapsed btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Address <i class="fa fa-angle-right  float-right"></i>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse fade" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                 <div class="row">
                                     <div class="col-xl-12"><h5>Present Address</h5></div>
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Address 1</label>
                                <input type="text" placeholder="Enter address" class="form-control inputDisabled" value="<?php echo @$data_single->contact_address; ?>" name='contact_address'  id='contact_address' >
                            </div>
                        </div>
						 <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Address 2</label>
                                <input type="text" placeholder="Enter address" class="form-control inputDisabled" value="<?php echo @$data_single->contact_address1; ?>" name='contact_address1'  id='contact_address1' >
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
                                <input type="text" placeholder="Enter Pin Code" class="form-control inputDisabled" onkeyup="numeric(this)" name='contact_pin'  id='contact_pin' value="<?php echo @$data_single->contact_pin; ?>" >
                            </div>
                        </div>
                       
                        
						 <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Alternative Phone No.</label>
                                <input type="text" placeholder="Enter Alternative Phone No." class="form-control inputDisabled" onkeyup="numeric(this)" maxlength="12" value="<?php echo @$data_single->contact_phone; ?>" name='contact_phone'  id='contact_phone'>
                            </div>
                        </div>
						
                        <div class="col-sm-12">                            
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="perma_addr" id="perma_addr" value="1" checked="checked">
                                    <label class="custom-control-label" for="perma_addr">Uncheck if Permanent address is separate </label>
                                </div>                            
                        </div>
                    </div>
                    
                                <div class="row perma_address" style="display:none">
                        <div class="col-xl-12 mt-3"><h5>Permanent Address</h5></div>                            
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Address 1</label>
                                <input type="text" placeholder="Enter address" class="form-control inputDisabled" name='home_address'  id='home_address' value="<?php echo @$data_single->home_address; ?>">
                            </div>
                        </div>
						 <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Address 2</label>
                                <input type="text" placeholder="Enter address" class="form-control inputDisabled" name='home_address1'  id='home_address1' value="<?php echo @$data_single->home_address1; ?>">
                            </div>
                        </div>
						 <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">State</label>
                                <input type="text" placeholder="Enter State" class="form-control inputDisabled" name='home_state'  id='home_state' value="<?php echo @$data_single->home_state; ?>">
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
                                <input type="text" placeholder="Enter city" class="form-control inputDisabled" onkeyup="numeric(this)" name='home_pin'  id='home_pin' value="<?php echo @$data_single->home_pin; ?>">
                            </div>
                        </div>
                    </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card" id="official_card">
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
                                        <button id="voterpaperclip" class="btn btn-secondary" data-toggle="modal" data-target="#modalVoter" type="button"><i class="las la-paperclip"></i></button>
                                    </div>
									</div>
                                </div>
                            </div>
							
							
                              <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Aadhar Card No. </label>
									<div class="input-group">
                                    <input type="text" name='aadhar_card' value="<?php echo @$data_single->aadhar_card; ?>" id='aadhar_card'  placeholder="Enter Aadhar Card No" class="form-control">
									 <div class="input-group-append">
                                        <button id="aadharpaperclip" class="btn btn-secondary" data-toggle="modal" data-target="#myModalaadhar" type="button"><i class="las la-paperclip"></i></button>
                                    </div>
									</div>
                                </div>
                            </div>

                             <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Pan Card No. </label>
									 <div class="input-group">
                                    <input type="text" name='pan_card' value="<?php echo @$data_single->pan_card; ?>" id='pan_card'  placeholder="Enter Pan Card No" class="form-control">
									<div class="input-group-append">
                                        <button id="panpaperclip" class="btn btn-secondary" data-toggle="modal" data-target="#myModalpan" type="button"><i class="las la-paperclip"></i></button>
                                    </div>
									</div>
                                </div>
                            </div>
                        
                        
                           <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label"><span style="color:red;">* </span>Grade</label>
                                <select id="grade" name="grade" class="form-control" required="required">
                                <option value="">Select</option>
                                <?php
                              if (!empty($all_grade)) {
                                foreach ($all_grade as $grade) {
                              ?>
                              <option value="<?php echo $grade->id; ?>" <?php echo ((isset($data_single->grade) && ($data_single->grade==$grade->id)) ? 'selected' : ''); ?>><?php echo $grade->grade_name; ?></option>
                              <?php } } ?>
                            </select>
							<span id="grade_err" style="color:red;"></span>
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
                                <label for="" class="form-control-label"></label>
                                <input type="hidden" placeholder="Select date" class="form-control ks-daterange-single inputDisabled" name='discontinued_date' id='discontinued_date' value="">
                            </div>
                        </div>
                       
                      

                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Reporting Manager</label>

                                <select id="reporting_manager" name="reporting_manager" class="form-control js-example-basic-multiple">
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
                              <option value="<?php echo $ordinate->id; ?>"><?php echo $ordinate->first_name.' '.$ordinate->middle_name.' '.$ordinate->last_name; ?></option>
                              <?php } } ?>
                            </select>

                            </div>
                        </div>
						 
                     <div class="col-sm-6 col-xl-2">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox mt-checkbox">
                                        <input type="checkbox" class="custom-control-input" <?php if(!empty($data_single->wfh) && $data_single->wfh == '1'){ echo 'checked';} else { echo '';} ?> name="enable_wfh" id="enable_wfh" value="0">
                                        <label class="custom-control-label" for="enable_wfh">Enable WFH</label>
                                      </div>                                                                        
                                </div>
                            </div>
							 <div class="col-sm-6 col-xl-2">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox mt-checkbox">
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
                             <div class="col-sm-6 col-xl-1">
                            <div class="form-group">
                                <label for="" class="form-control-label">Action</label>
                                 <button type="button" name="submit_exp" id="submit_exp" class="btn btn-success">Add</button>
                            </div>
                        </div>
                   <div class="col-xl-12" id="experience_div" style="display:none;">
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
                            <td><?=$value->from_date?></td>
                            <td><?=$value->to_date?></td>
                            <td><?php if($value->cv != '') { ?><a href="<?=base_url()?>uploads/<?=$value->cv?>" target="_blank" tabindex="-1"><span class="ks-icon la la-la la-paperclip"></span></a><?php } ?></td>
							<td><td>
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
									<option value="">Select</option>
                                        <?php
                                        $currentYear = date('Y');
                                        foreach (range(1950, $currentYear) as $value) {
                                        echo "<option value= '" . $value . "'>" . $value . "</option > ";

                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                             <div class="col-sm-6 col-xl-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Marks(%)</label>
                                    <input type="text" name='marks' id='marks' maxlength="2" onkeyup="numeric(this)" placeholder="Marks(%)" class="form-control">
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
                             <div class="col-sm-6 col-xl-1">
                            <div class="form-group">
                                <label for="" class="form-control-label">Action</label>
                                 <button type="button" name="submit_edu" id="submit_edu"  class="btn btn-success">Add</button>
                            </div>
                        </div>
                     <div class="col-xl-12" id="education_div" style="display:none;">
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
                            <td><?php if($value->cv != '') { ?><a href="<?=base_url()?>uploads/<?=$value->cv?>" target="_blank" tabindex="-1"><span class="ks-icon la la-la la-paperclip"></span><?php } ?></a></td>
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
                                    <input type="text" placeholder="Enter passport number" class="form-control inputDisabled" value="" name="passport_no" id="passport_no" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Place of Issue</label>
                                    <input type="text" placeholder="Enter place of issue" class="form-control inputDisabled" value="" name="passport_place_of_issue" id="passport_place_of_issue">
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
                                    <input type="text" placeholder="Select date" class="form-control ks-daterange-single mysingle_date inputDisabled" value="<?php echo @$passport_single->passport_issue_date;?>" name="passport_issue_date" id="passport_issue_date">
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Expiry Date</label>
                                    <input type="text" placeholder="Select date" class="form-control ks-daterange-single mysingle_date inputDisabled" value="" name="passport_expiry_date" id="passport_expiry_date">
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
                            <div class="card-body pb-0">
                                <!-- PF -->    
<?php if($organization_details->pf_apply == '1'){?>								
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-3 align-self-center">
                                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="pf_checkbox" id="pf_checkbox" <?php if(!empty($data_single_pf)){ ?> value="1" <?php }else{ ?> value="0" <?php } ?><?php if(!empty($data_single_pf)){ echo 'checked disabled';} else { echo '';} ?>>
                                <label class="custom-control-label" for="pf_checkbox">PF Details (If select can't Edit or delete)</label>
								
                              </div> 
                                        </div>
                                        <div class="col-lg-9">
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
                                    </div>
                                                                
                        
                        </div>
<?php } ?>
                         
                         <!--ESI-->
						 <?php if($organization_details->esi_apply == '1'){?>	
                         <div class="form-group">
                             <div class="row">
                                 <div class="col-lg-3 align-self-center">
                                     <div class="custom-control custom-checkbox">                            
                            <input type="checkbox" class="custom-control-input" name="esi_checkbox" id="esi_checkbox" <?php if(!empty($data_single_esi)){ ?> value="1" <?php }else{ ?> value="0" <?php } ?><?php if(!empty($data_single_esi)){ echo 'checked disabled';} else { echo '';} ?> >
                            <label class="custom-control-label" for="esi_checkbox">ESI Details (If select can't Edit or delete)</label>
                          </div>
                                 </div>
                                 <div class="col-lg-9">
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
                             </div>
                        
                        </div>
						 <?php } ?>
						 
                        <!--PTax-->
						<?php if($organization_details->ptax_apply == '1'){?>	
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-3 align-self-center">
                                    <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="ptax_checkbox" id="ptax_checkbox" <?php if(!empty($data_single_ptax)){ ?> value="1" <?php }else{ ?> value="0" <?php } ?><?php if(!empty($data_single_ptax)){ echo 'checked disabled';} else { echo '';} ?>>
                            <label class="custom-control-label" for="ptax_checkbox">P-Tax Details (If select can't Edit or delete)</label>
                          </div>                         
                                </div>
                                <div class="col-lg-9">
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
                            <div class="card-body pb-0">
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
                                <input type="text" placeholder="Enter IFSC CODE" class="form-control inputDisabled" name='agent_rtn_code'  id='agent_rtn_code' value="<?php echo @$bank->agent_rtn_code; ?>">
                                </div>
                            </div>
                           <div class="col-sm-6 col-xl-4 align-self-center">                            
                                <div class="d-inline-block mt-2 ml-3">
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

                    <!-- <div class="card">
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
                                            <input type="text" name="last_day_of_work" id="last_day_of_work" placeholder="Select date" class="form-control flatpickrDate ks-daterange-single flatpickr-input active" readonly="readonly" value="<?php echo ((isset($closure[0]->entry_date)) ? $closure[0]->entry_date : ''); ?>" >
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
                        
                            
                            <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Note</label>
                                            <textarea placeholder="Enter note" name="note" id="note1" class="form-control" style="min-height: 120px; line-height: 20px;"  ><?php echo ((isset($closure[0]->note)) ? $closure[0]->note : ''); ?> </textarea>
                                </div>
                            </div>
                         
                        
                           
                          
                  </div>
                            </div>
                        </div>
                    </div>--->
                    </div> <!--accordion closed-->

                <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-buttons mb-0">
                                 <button type="button" name="submit" id="save" class="btn btn-success save-profile-btn">Save</button>
                                 <a href="javascript:;" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </div> 
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
						 
                                <img id="blah" src="<?php echo base_url(); ?>assets/img/avatars/placeholders/ava-128.png" class="img-fluid"> 
                           
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
								<img id="blah" src="<?php echo base_url(); ?>assets/img/avatars/placeholders/ava-128.png" class="img-fluid"> 
								</div>                     
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
                                <img id="blah" src="<?php echo base_url(); ?>assets/img/avatars/placeholders/ava-128.png" class="img-fluid"> 
                           </div>                     
                                <label class="btn btn-primary ks-btn-file">
                                        <span class="la la-image ks-icon"></span>                    
                                       <!-- <input onchange="readURL(this,'general')" type="file" name="image" id="image">-->
										<input type="file" name="upload_pan" id="upload_pan" />
                                </label>
								<br />
						        <div id="uploaded_pan"></div>                              
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
				$("#uan_no").attr("required", "true");
                $('#pf_checkbox').val('1');
               
            }
            else if($(this).prop("checked") == false){
               $('#pf_div').hide();
               $('#employee_pf_no').removeAttr('required');
			   $('#uan_no').removeAttr('required');
               $('#employee_pf_no').val('');
			   $('#uan_no').val('');
               $('#pf_checkbox').val('0');
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
		
		$('#access_permission').click(function(){
            if($(this).prop("checked") == true){
                $('#access_permission').val('1');
                alert('Please enter user roll of this employee');
            }
            else if($(this).prop("checked") == false){
               $('#access_permission').val('0');
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

    function get_div(){
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
                });
            //$('#add_leaves').append('<tr></tr>');
        }else{
            alert('Please select leave type and leave balance');
        }

    }




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
        var form = $('#general')[0];

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
				$("#from_date").val('');
				$("#to_date").val('');
				$("#cv1").val('');
				
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
        var form = $('#general')[0];

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
            
				if(data == 'exist'){
				$("#Level").css('border','1px solid red');
				$("#year").css('border','1px solid red');
				alert('Data already exists');
				}else{
				$("#add_education").html(data);
				$("#Level").val('');
				$("#Institute").val('');
				$("#cv").val('');
				$("#year").val('');
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

    });

});




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
                    
$(document).ready(function () {

    $("#save").click(function (event) {

        //stop submit the form, we will post it manually.
        event.preventDefault();
		
		
		
        var first_name = $("#first_name").val();
        var last_name = $("#last_name").val();
        var dob = $("#dob").val();
		var hire_date = $("#hire_date").val();
		var today = new Date($("#dob").val());
		
		var religion = $("#religion").val();
        var status = $("#status").val();
        var contact_mobile = $("#contact_mobile").val();
        var contact_email = $("#contact_email").val();
		var grade = $("#grade").val();
		
		if($("#r3").is(":checked") || $("#r4").is(":checked")){
			//alert('checked');
			//return true;
			var gender_check = 'select';
		}else{
			//alert('Not checked');
			//alert('Please Select gender');
			//return false;
			var gender_check = 'not_salect';
		}
		
		
         if(first_name == ''){
            //$("#prjname_err").text('Please enter project name');
            alert('Please Enter First Name');
            $("#first_name").focus(); 
            //$(".save").attr('disabled',true);
            return false;
         } else if(last_name == ""){
           alert('Please Enter Last Name');
            $("#last_name").focus(); 
            //$(".save").attr('disabled',true);
            return false;
         } else if(last_name == ""){
           alert('Please Enter Last Name');
            $("#last_name").focus(); 
            //$(".save").attr('disabled',true);
            return false;
         }else if(gender_check == "not_salect"){
           alert('Please select Gender');
            //$("#last_name").focus(); 
            //$(".save").attr('disabled',true);
            return false;
         }else if(dob == ''){
            alert('Please Enter Birth Date');
             $("#dob").focus(); 
            return false;
         }else if(hire_date == ''){
            alert('Please Enter Joining Date');
             $("#hire_date").focus(); 
            return false;
         }else if(religion == ''){
            alert('Please Enter Religion');
             $("#religion").focus(); 
            return false;
         }else if(status == ''){
            alert('Please Select Status');
             $("#status").focus(); 
            return false;
         }else if(contact_mobile == ''){
            alert('Please Enter Modile No.');
             $("#contact_mobile").focus();
			 //$("#address_card").css("border","1px solid red");//more efficient
            return false;
         }else if(contact_email == ''){
            alert('Please Enter Email Id.');
             $("#contact_email").focus();
			  //$("#address_card").css("border","1px solid red");//more efficient
            return false;
         }else if(grade == ''){
            alert('Please Select Grade');
			//$("#grade_err").text('Please enter grade');
             $("#grade").focus(); 
			 $("#official_card").css("border","1px solid red");//more efficient
            return false;
         }else if($('#pf_checkbox').val() == '1'){
			   $('#pf_div').show();
			   if($("#employee_pf_no").val() == '' ){
				   alert('Please enter PF No.');
				   $("#employee_pf_no").focus();
				   return false;
			   }else if($("#uan_no").val() == ''){
				   alert('Please enter UAN No.');
				   $("#uan_no").focus();
				    return false;
			   }
			   
				 
		 }else{
			 $("#official_card").css("border","1px solid #dee0e1");
			 $("#address_card").css("border","1px solid #dee0e1");
		 }
		 
		 if($('#esi_checkbox').val() == '1'){
			// alert('dd');
			   $('#esi_div').show();
			   if($("#esi_no").val() == '' ){
				   alert('Please enter ESI No.');
				   $("#esi_no").focus();
				   return false;
			   }
			   
				 
		 }
		 
		 if($('#ptax_checkbox').val() == '1'){
			   $('#ptax_div').show();
			   if($("#ptax_no").val() == '' ){
				   alert('Please enter PTAX No.');
				   $("#ptax_no").focus();
				   return false;
			   }
		 }
		     

       

        // Get form
        var form = $('#general')[0];

    // Create an FormData object 
        var data = new FormData(form);
        //console.log(data); 
    // If you want to add an extra field for the FormData
        data.append("CustomField", "This is some extra data, testing");

    // disabled the submit button
        $("#save").prop("disabled", true);

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "<?php echo base_url('modify_employees_details'); ?>",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (data) {
                //console.log(data);
				 window.location.href = "<?php echo base_url('employees_details'); ?>";
					$("#save").prop("disabled", false);
            },
           /* error: function (e) {

                $("#result").text(e.responseText);
                console.log("ERROR : ", e);
                $("#btnSubmit").prop("disabled", false);

            }*/
        });

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



</script>

<script>  
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
			//console.log(data);
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
		  //$('#blah').html(data);
		  
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
		  //$('#blah').html(data);
		  
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
		  //$('#blah').html(data);
		  
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
}



</script>

