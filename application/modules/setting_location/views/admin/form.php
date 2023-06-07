<form class="closeForm" onsubmit="return myFunction('setting_location')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_setting_location').'/'.$id : base_url('admin_add_setting_location'); ?>" name="setting_location" id="setting_location" enctype="multipart/form-data" >
<div class="row">                      
                  <div class="flex-fixed-width-100">
                        <div class="form-group">
                            <div class="org-avatar-wrapper">
                            <span class="btn btn-info btn-file btn-square-round">
                                <i class="la la-camera"></i>
                                <input type="file" name="image" id="image" onchange="readURL(this,'setting_location')" >
                            </span>                            
                            <?php if(isset($data_single->image) && $data_single->image!=''){ ?>
                                <img id="blah" class="avatar-org" src="<?php echo base_url(); ?>uploads/<?php echo (isset($data_single->image) && $data_single->image != '') ? $data_single->image : ''; ?>">
                            <?php }else{ ?>
                                <img id="blah" class="avatar-org" src="<?php echo base_url(); ?>assets/img/images.png">
                            <?php  } ?>
                            <input type="hidden" name="imagenew" id="imagenew" value="">        
                           <input type="hidden" name="imageold" value="<?php echo (isset($data_single->image) ? $data_single->image : ''); ?>">
                        </div>
                    </div> 
                  </div>
                    <div class="col-12 col-sm">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Name of the company</label>
                                    <input required type="text" class="form-control" id="company_name"  name="company_name" value="<?php echo (isset($data_single->company_name) ? $data_single->company_name : ''); ?>">
                                </div>        
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Mailing Name</label>
                                    <input type="text" class="form-control" id="mailing_name"  name="mailing_name" value="<?php echo (isset($data_single->mailing_name) ? $data_single->mailing_name : ''); ?>">
                                </div>        
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nick Name</label>
                                    <input type="text" class="form-control" id="nick_name"  name="nick_name" value="<?php echo (isset($data_single->nick_name) ? $data_single->nick_name : ''); ?>">
                                </div>        
                            </div>
                        </div>
                    </div>                      
                      </div>
                    
                    
                    
                      <h5>Address</h5>
                      <hr>
                      <div class="row">
                          <div class="col-lg-8">
                              <div class="row">
                                  <div class="col-3">
                                      <div class="form-group">                              
                              <input placeholder="Apt. No" type="text" class="form-control" id="apt_no"  name="apt_no" value="<?php echo (isset($data_single_location->apt_no) ? $data_single_location->apt_no : ''); ?>">
                          </div>        
                                  </div>
                                  <div class="col-9">
                                      <div class="form-group">                              
                              <input placeholder="Building / Road Name" type="text" class="form-control" id="building_name"  name="building_name" value="<?php echo (isset($data_single_location->building_name) ? $data_single_location->building_name : ''); ?>">
                          </div>        
                                  </div>
                              </div>
                          </div>   
                        <div class="col-lg-4">
                        <div class="form-group">                              
                          <input placeholder="Location Heading" type="text" class="form-control" id="location_heading"  name="location_heading" value="<?php echo (isset($data_single_location->location_heading) ? $data_single_location->location_heading : ''); ?>">
                        </div>        
                        </div>                       
                       <div class="col-lg-4">
                          <div class="form-group">                              
                              <input placeholder="Country" type="text" class="form-control" id="country"  name="country" value="<?php echo (isset($data_single_location->country) ? $data_single_location->country : ''); ?>">
                          </div>        
                      </div>


                       <div class="col-lg-4">
                          <div class="form-group">                              
                              <input placeholder="City" type="text" class="form-control" id="city"  name="city" value="<?php echo (isset($data_single_location->city) ? $data_single_location->city : ''); ?>">
                          </div>        
                      </div>

                       <div class="col-lg-4">
                          <div class="form-group">                              
                              <input placeholder="State" type="text" class="form-control" id="state"  name="state" value="<?php echo (isset($data_single_location->state) ? $data_single_location->state : ''); ?>">
                          </div>        
                      </div>

                      <div class="col-lg-4">
                          <div class="form-group">                              
                              <input placeholder="Zip" type="text" class="form-control" id="zip"  name="zip" value="<?php echo (isset($data_single_location->zip) ? $data_single_location->zip : ''); ?>">
                          </div>        
                      </div>

                      <div class="col-lg-4">
                          <div class="form-group">                              
                              <input placeholder="Telephone" type="text" class="form-control" id="telephone"  name="telephone" value="<?php echo (isset($data_single_location->telephone) ? $data_single_location->telephone : ''); ?>">
                          </div>        
                      </div>

                       <div class="col-lg-4">
                          <div class="form-group">                              
                              <input placeholder="Mobile" type="text" class="form-control" id="mobile"  name="mobile" value="<?php echo (isset($data_single_location->mobile) ? $data_single_location->mobile : ''); ?>">
                          </div>        
                      </div>

                      <div class="col-lg-4">
                          <div class="form-group">                              
                              <input placeholder="Email" type="email" class="form-control" id="email"  name="email" value="<?php echo (isset($data_single_location->email) ? $data_single_location->email : ''); ?>">
                          </div>        
                      </div>


                      </div>
                      <h5>Statutory Details</h5>
                      <hr>
                      <div class="row">

                      <div class="col-lg-4">
                          <div class="form-group">                              
                              <input placeholder="Incorporation date" type="text" class="form-control mysingle_date" id="incorporation_date"  name="incorporation_date" value="<?php echo (isset($data_single->incorporation_date) ? $data_single->incorporation_date : ''); ?>">
                          </div>        
                      </div>

                      <div class="col-lg-4">
                          <div class="form-group">                              
                              <input placeholder="Corporate Identification Number" type="text" class="form-control" id="corporate_no"  name="corporate_no" value="<?php echo (isset($data_single->corporate_no) ? $data_single->corporate_no : ''); ?>">
                          </div>        
                      </div>

                       <div class="col-lg-4">
                          <div class="form-group">                              
                              <input placeholder="PAN Number" type="text" class="form-control" id="pan_no"  name="pan_no" value="<?php echo (isset($data_single->pan_no) ? $data_single->pan_no : ''); ?>">
                          </div>        
                      </div>

                      <div class="col-lg-4">
                          <div class="form-group">                              
                              <input placeholder="TAN Number*" type="text" class="form-control" id="tan_no"  name="tan_no" value="<?php echo (isset($data_single->tan_no) ? $data_single->tan_no : ''); ?>">
                          </div>        
                      </div>

                      <div class="col-lg-4">
                          <div class="form-group">                              
                              <input placeholder="CIT (TDS)" type="text" class="form-control" id="cit"  name="cit" value="<?php echo (isset($data_single->cit) ? $data_single->cit : ''); ?>">
                          </div>        
                      </div>

                      <div class="col-lg-4">
                          <div class="form-group">                              
                              <input placeholder="TAN Circle*" type="text" class="form-control" id="tan_circle"  name="tan_circle" value="<?php echo (isset($data_single->tan_circle) ? $data_single->tan_circle : ''); ?>">
                          </div>        
                      </div>

                      </div>
                     <div class="col-lg-12">      
						<div class="form-group">  
						<div class="custom-control custom-checkbox">
						<h5>Provident Fund Account</h5><input type="checkbox" class="custom-control-input" name="pf_apply" id="pf_apply" <?php echo ((isset($data_single->pf_apply) && ($data_single->pf_apply=='1')) ? 'checked' : ''); ?> value="<?php echo (isset($data_single->pf_apply) ? $data_single->pf_apply : '0'); ?>"><label class="custom-control-label" for="pf_apply"></label>
						</div>  
						</div>                            
						</div>
                      <hr>
                      <div class="row pf_datails"  <?php echo ((isset($data_single->pf_apply) && ($data_single->pf_apply=='1')) ? '' : 'style="display:none;"'); ?>>

                      <div class="col-lg-4">
                          <div class="form-group">                              
                              <input placeholder="PF Number" type="text" class="form-control" id="pf_no"  name="pf_no" value="<?php echo (isset($data_single->pf_no) ? $data_single->pf_no : ''); ?>">
                          </div>        
                      </div>

                      <div class="col-lg-4">
                          <div class="form-group">                              
                              <input placeholder="Registration Date" type="text" class="form-control mysingle_date" id="pf_reg_date"  name="pf_reg_date" value="<?php echo (isset($data_single->pf_reg_date) ? $data_single->pf_reg_date : ''); ?>">
                          </div>        
                      </div>

                      <div class="col-lg-4 align-self-center">
                          <div class="form-group">
                              <div class="custom-control custom-checkbox">
                                  <input onchange="getChecked();" type="checkbox" class="custom-control-input" id="pf_rule_all_employee"  name="pf_rule_all_employee" value="Yes" <?php echo ((isset($data_single->pf_rule_all_employee) && ($data_single->pf_rule_all_employee=='Yes')) ? 'checked' : ''); ?>>
                                  <label class="custom-control-label" for="pf_rule_all_employee">PF Rules are same for all employees</label>
                                  <input type="hidden" id="pf_rule_all_employee1"  name="pf_rule_all_employee1" value="No">
                              </div>
                          </div>        
                      </div>

                      <div class="col-lg-4">
                          <div class="form-group">                              
                              <input placeholder="Signatory Name" type="text" class="form-control" id="pf_signatory_name"  name="pf_signatory_name" value="<?php echo (isset($data_single->pf_signatory_name) ? $data_single->pf_signatory_name : ''); ?>">
                          </div>        
                      </div>


                      <div class="col-lg-4">
                          <div class="form-group">                              
                              <input placeholder="Signatory Designation" type="text" class="form-control" id="pf_signatory_designation"  name="pf_signatory_designation" value="<?php echo (isset($data_single->pf_signatory_designation) ? $data_single->pf_signatory_designation : ''); ?>">
                          </div>        
                      </div>

                      <div class="col-lg-4">
                          <div class="form-group">                              
                              <input placeholder="Signatory's Father's Name" type="text" class="form-control" id="pf_signatory_father_name"  name="pf_signatory_father_name" value="<?php echo (isset($data_single->pf_signatory_father_name) ? $data_single->pf_signatory_father_name : ''); ?>">
                          </div>        
                      </div>
                      </div>
                      <div class="col-lg-12">      
						<div class="form-group">  
						<div class="custom-control custom-checkbox">
						<h5>ESI</h5><input type="checkbox" class="custom-control-input" name="esi_apply" id="esi_apply" <?php echo ((isset($data_single->esi_apply) && ($data_single->esi_apply=='1')) ? 'checked' : ''); ?> value="<?php echo (isset($data_single->esi_apply) ? $data_single->esi_apply : '0'); ?>"><label class="custom-control-label" for="esi_apply"></label>
						</div>  
						</div>                            
						</div>
                      
                      <hr>
                      <div class="row esi_datails" <?php echo ((isset($data_single->esi_apply) && ($data_single->esi_apply=='1')) ? '' : 'style="display:none;"'); ?>>

                      <div class="col-lg-4">
                          <div class="form-group">                              
                              <input placeholder="ESI Number" type="text" class="form-control" id="esi_no"  name="esi_no" value="<?php echo (isset($data_single->esi_no) ? $data_single->esi_no : ''); ?>">
                          </div>        
                      </div>

                      <div class="col-lg-4">
                          <div class="form-group">                              
                              <input placeholder="Registration Date" type="text" class="form-control mysingle_date" id="esi_reg_date"  name="esi_reg_date" value="<?php echo (isset($data_single->esi_reg_date) ? $data_single->esi_reg_date : ''); ?>">
                          </div>        
                      </div>                      

                      <div class="col-lg-4">
                          <div class="form-group">                              
                              <input placeholder="Signatory Name" type="text" class="form-control" id="esi_signatory_name"  name="esi_signatory_name" value="<?php echo (isset($data_single->esi_signatory_name) ? $data_single->esi_signatory_name : ''); ?>">
                          </div>        
                      </div>


                      <div class="col-lg-4">
                          <div class="form-group">                              
                              <input placeholder="Signatory Designation" type="text" class="form-control" id="esi_signatory_designation"  name="esi_signatory_designation" value="<?php echo (isset($data_single->esi_signatory_designation) ? $data_single->esi_signatory_designation : ''); ?>">
                          </div>        
                      </div>

                      <div class="col-lg-4">
                          <div class="form-group">                              
                              <input placeholder="Signatory's Father's Name" type="text" class="form-control" id="esi_signatory_father_name"  name="esi_signatory_father_name" value="<?php echo (isset($data_single->esi_signatory_father_name) ? $data_single->esi_signatory_father_name : ''); ?>">
                          </div>        
                      </div>

                      </div>
                     
					  <div class="col-lg-12">      
						<div class="form-group">  
						<div class="custom-control custom-checkbox">
						<h5>Professional Tax Account</h5><input type="checkbox" class="custom-control-input" name="ptax_apply" <?php echo ((isset($data_single->ptax_apply) && ($data_single->ptax_apply=='1')) ? 'checked' : ''); ?> id="ptax_apply" value="<?php echo (isset($data_single->ptax_apply) ? $data_single->ptax_apply : '0'); ?>"><label class="custom-control-label" for="ptax_apply"></label>
						</div>  
						</div>                            
						</div>
                      <hr>
                      <div class="row ptax_datails" <?php echo ((isset($data_single->ptax_apply) && ($data_single->ptax_apply=='1')) ? '' : 'style="display:none;"'); ?>>

                      <div class="col-lg-4">
                          <div class="form-group">                              
                              <input placeholder="P Tax Number" type="text" class="form-control" id="p_tax_no"  name="p_tax_no" value="<?php echo (isset($data_single->p_tax_no) ? $data_single->p_tax_no : ''); ?>">
                          </div>        
                      </div>

                      <div class="col-lg-4">
                          <div class="form-group">                              
                              <input placeholder="Registration Date" type="text" class="form-control mysingle_date" id="p_tax_reg_date"  name="p_tax_reg_date" value="<?php echo (isset($data_single->p_tax_reg_date) ? $data_single->p_tax_reg_date : ''); ?>">
                          </div>        
                      </div>
                     
                      <div class="col-lg-4">
                          <div class="form-group">                              
                              <input placeholder="Signatory Name" type="text" class="form-control" id="p_tax_signatory_name"  name="p_tax_signatory_name" value="<?php echo (isset($data_single->p_tax_signatory_name) ? $data_single->p_tax_signatory_name : ''); ?>">
                          </div>        
                      </div>
                    
                       <div class="col-md-12">
                          <div class="form-group">
                              <label>Other Details</label>
                              <textarea class="form-control" id="other_details"  name="other_details"><?php echo (isset($data_single->other_details) ? $data_single->other_details : ''); ?></textarea>
                          </div>        
                      </div> 

                      </div>
					   <div class="col-lg-12">      
						<div class="form-group">  
						<div class="custom-control custom-checkbox">
						<h5>Gratuity</h5><input type="checkbox" class="custom-control-input" name="gratuity_apply" id="gratuity_apply" <?php echo ((isset($data_single->gratuity_apply) && ($data_single->gratuity_apply=='1')) ? 'checked' : ''); ?> value="<?php echo (isset($data_single->gratuity_apply) ? $data_single->gratuity_apply : '0'); ?>"><label class="custom-control-label" for="gratuity_apply"></label>
						</div>  
						</div>                            
						</div>
                      <h5>Form 16 Signature Info.</h5>
                      <hr>
                      <div class="row">

                      <div class="col-lg-4">
                          <div class="form-group">                              
                              <input placeholder="Signatory Name" type="text" class="form-control" id="form16_signatory_name"  name="form16_signatory_name" value="<?php echo (isset($data_single->form16_signatory_name) ? $data_single->form16_signatory_name : ''); ?>">
                          </div>        
                      </div>


                      <div class="col-lg-4">
                          <div class="form-group">                              
                              <input placeholder="Signatory Designation" type="text" class="form-control" id="form16_signatory_designation"  name="form16_signatory_designation" value="<?php echo (isset($data_single->form16_signatory_designation) ? $data_single->form16_signatory_designation : ''); ?>">
                          </div>        
                      </div>

                      <div class="col-lg-4">
                          <div class="form-group">                              
                              <input placeholder="Signatory’s PAN" type="text" class="form-control" id="form16_signatory_pan"  name="form16_signatory_pan" value="<?php echo (isset($data_single->form16_signatory_pan) ? $data_single->form16_signatory_pan : ''); ?>">
                          </div>        
                      </div>
                          
                          <div class="col-lg-8">
                              <div class="row">
                                  <div class="col-3">
                                      <div class="form-group">                              
                              <input placeholder="Apt. No" type="text" class="form-control" id="form16_apt_no"  name="form16_apt_no" value="<?php echo (isset($data_single->form16_apt_no) ? $data_single->form16_apt_no : ''); ?>">
                          </div>        
                                  </div>
                                  <div class="col-9">
                                      <div class="form-group">                              
                              <input placeholder="Building / Road Name" type="text" class="form-control" id="form16_building_name"  name="form16_building_name" value="<?php echo (isset($data_single->form16_building_name) ? $data_single->form16_building_name : ''); ?>">
                          </div>        
                                  </div>
                              </div>
                          </div>                           


                       <div class="col-lg-4">
                          <div class="form-group">                              
                              <input placeholder="Country" type="text" class="form-control" id="form16_country"  name="form16_country" value="<?php echo (isset($data_single->form16_country) ? $data_single->form16_country : ''); ?>">
                          </div>        
                      </div>


                       <div class="col-lg-4">
                          <div class="form-group">                              
                              <input placeholder="City" type="text" class="form-control" id="form16_city"  name="form16_city" value="<?php echo (isset($data_single->form16_city) ? $data_single->form16_city : ''); ?>">
                          </div>        
                      </div>

                       <div class="col-lg-4">
                          <div class="form-group">                              
                              <input placeholder="State" type="text" class="form-control" id="form16_state"  name="form16_state" value="<?php echo (isset($data_single->form16_state) ? $data_single->form16_state : ''); ?>">
                          </div>        
                      </div>

                      <div class="col-lg-4">
                          <div class="form-group">                              
                              <input placeholder="Zip" type="text" class="form-control" id="form16_zip"  name="form16_zip" value="<?php echo (isset($data_single->form16_zip) ? $data_single->form16_zip : ''); ?>">
                          </div>        
                      </div>

                      <div class="col-lg-4">
                          <div class="form-group">                              
                              <input placeholder="Telephone" type="text" class="form-control" id="form16_telephone"  name="form16_telephone" value="<?php echo (isset($data_single->form16_telephone) ? $data_single->form16_telephone : ''); ?>">
                          </div>        
                      </div>

                       <div class="col-lg-4">
                          <div class="form-group">                              
                              <input placeholder="Mobile" type="text" class="form-control" id="form16_mobile"  name="form16_mobile" value="<?php echo (isset($data_single->form16_mobile) ? $data_single->form16_mobile : ''); ?>">
                          </div>        
                      </div>

                      <div class="col-lg-4">
                          <div class="form-group">                              
                              <input placeholder="Email" type="email" class="form-control" id="form16_email"  name="form16_email" value="<?php echo (isset($data_single->form16_email) ? $data_single->form16_email : ''); ?>">
                          </div>        
                      </div>
                  </div>  

                  <h5>Bank Details</h5>
                  <hr>
                  <div class="row">

                  <div class="col-sm-6 col-xl-4">
                  <div class="form-group">                              
                  <input placeholder="Bank Name" type="text" class="form-control" id="bank_name"  name="bank_name" value="<?php echo (isset($data_single_bank->bank_name) ? $data_single_bank->bank_name : ''); ?>">
                  </div>        
                  </div>

                  <div class="col-sm-6 col-xl-4">
                  <div class="form-group">                              
                  <input placeholder="Branch" type="text" class="form-control" id="branch"  name="branch" value="<?php echo (isset($data_single_bank->branch) ? $data_single_bank->branch : ''); ?>">
                  </div>        
                  </div>


                  <div class="col-sm-6 col-xl-4">
                  <div class="form-group">                              
                  <input placeholder="IFSC Code" type="text" class="form-control" id="ifsc_code"  name="ifsc_code" value="<?php echo (isset($data_single_bank->ifsc_code) ? $data_single_bank->ifsc_code : ''); ?>">
                  </div>        
                  </div>


                  <div class="col-lg-8">
                  <div class="row">
                  <div class="col-3">
                  <div class="form-group">                              
                  <input placeholder="Apt. No" type="text" class="form-control" id="org_apt_no"  name="org_apt_no" value="<?php echo (isset($data_single_bank->apt_no) ? $data_single_bank->apt_no : ''); ?>">
                  </div>        
                  </div>
                  <div class="col-9">
                  <div class="form-group">                              
                  <input placeholder="Building / Road Name" type="text" class="form-control" id="org_building_name"  name="org_building_name" value="<?php echo (isset($data_single_bank->building_name) ? $data_single_bank->building_name : ''); ?>">
                  </div>        
                  </div>
                  </div>
                  </div>


                  <div class="col-sm-6 col-xl-4">
                  <div class="form-group">                              
                  <input placeholder="Country" type="text" class="form-control" id="org_country"  name="org_country" value="<?php echo (isset($data_single_bank->country) ? $data_single_bank->country : ''); ?>">
                  </div>        
                  </div>


                  <div class="col-sm-6 col-xl-4">
                  <div class="form-group">                              
                  <input placeholder="City" type="text" class="form-control" id="org_city"  name="org_city" value="<?php echo (isset($data_single_bank->city) ? $data_single_bank->city : ''); ?>">
                  </div>        
                  </div>

                  <div class="col-sm-6 col-xl-4">
                  <div class="form-group">                              
                  <input placeholder="State" type="text" class="form-control" id="org_state"  name="org_state" value="<?php echo (isset($data_single_bank->state) ? $data_single_bank->state : ''); ?>">
                  </div>        
                  </div>

                  <div class="col-sm-6 col-xl-4">
                  <div class="form-group">                              
                  <input placeholder="Zip" type="text" class="form-control" id="org_zip"  name="org_zip" value="<?php echo (isset($data_single_bank->zip) ? $data_single_bank->zip : ''); ?>">
                  </div>        
                  </div>

                  <div class="col-sm-6 col-xl-4">
                  <div class="form-group">                              
                  <input placeholder="Telephone" type="text" class="form-control" id="org_telephone"  name="org_telephone" value="<?php echo (isset($data_single_bank->telephone) ? $data_single_bank->telephone : ''); ?>">
                  </div>        
                  </div>

                  <div class="col-sm-6 col-xl-4">
                  <div class="form-group">                              
                  <input placeholder="Mobile" type="text" class="form-control" id="org_mobile"  name="org_mobile" value="<?php echo (isset($data_single_bank->mobile) ? $data_single_bank->mobile : ''); ?>">
                  </div>        
                  </div>

                  <div class="col-sm-6 col-xl-4">
                  <div class="form-group">                              
                  <input placeholder="Email" type="email" class="form-control" id="org_email"  name="org_email" value="<?php echo (isset($data_single_bank->email) ? $data_single_bank->email : ''); ?>">
                  </div>        
                  </div>


                  <div class="col-sm-6 col-xl-4">
                  <div class="form-group">                              
                  <input placeholder="Account Type" type="text" class="form-control" id="acc_type"  name="acc_type" value="<?php echo (isset($data_single_bank->acc_type) ? $data_single_bank->acc_type : ''); ?>">
                  </div>        
                  </div>

                  <div class="col-sm-6 col-xl-4">
                  <div class="form-group">                              
                  <input placeholder="Account No" type="text" class="form-control" id="acc_no"  name="acc_no" value="<?php echo (isset($data_single_bank->acc_no) ? $data_single_bank->acc_no : ''); ?>">
                  </div>        
                  </div>
                    <div class="col-md-12">
                    <div class="form-group form-buttons">
                    <button type="submit" name="submit" class="btn btn-success">Save</button>
                    <a href="javascript:;" class="btn btn-secondary" onclick="btnCloseForm();">Close</a>
                    </div>
                    </div>  
                    </div>  

   
 

</form>

<script>

    $(document).ready(function($) {
        $('#pf_apply').change(function() {
            //$('.pf_datails').slideToggle();
			if($(this).prop("checked") == true){
                $('#pf_apply').val('1');
				$('.pf_datails').show();
                
            }
            else if($(this).prop("checked") == false){
               $('#pf_apply').val('0');
			   $('.pf_datails').hide();
            }
        });
		
		$('#esi_apply').change(function() {
            //$('.pf_datails').slideToggle();
			if($(this).prop("checked") == true){
                $('#esi_apply').val('1');
				$('.esi_datails').show();
                
            }
            else if($(this).prop("checked") == false){
               $('#esi_apply').val('0');
			   $('.esi_datails').hide();
            }
        });
		
		$('#ptax_apply').change(function() {
            //$('.pf_datails').slideToggle();
			if($(this).prop("checked") == true){
                $('#ptax_apply').val('1');
				$('.ptax_datails').show();
                
            }
            else if($(this).prop("checked") == false){
               $('#ptax_apply').val('0');
			   $('.ptax_datails').hide();
            }
        });
		$('#gratuity_apply').change(function() {
            //$('.pf_datails').slideToggle();
			if($(this).prop("checked") == true){
                $('#gratuity_apply').val('1');
            }
            else if($(this).prop("checked") == false){
               $('#gratuity_apply').val('0');
            }
        });
    });
</script>