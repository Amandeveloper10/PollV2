<div>
                    <h6 class="form-box-heading">Passport / Visa</h6>
<!--                    <h5 class="card-header">
                        <span class="ks-text mt-2">Passport / Visa</span>
                        <a href="#" class="btn btn-outline-primary ks-light ks-no-text edit-profile-btn"><span class="la la-pencil ks-icon"></span></a>
                        <a href="#" class="btn btn-outline-primary ks-light ks-no-text save-profile-btn" style="display: none;"><span class="la la-save ks-icon"></span></a>
                    </h5>-->
                    <form  class="ks-form ks-settings-tab-form ks-general" method="post" action="" name="passport_form" id="passport_form" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id" value="<?php echo @$id;  ?>">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Passport No.</label>
                                    <input type="text" placeholder="Enter passport number" class="form-control inputDisabled" value="<?php echo @$passport_single->passport_no;?>" name="passport_no" id="passport_no" >
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Place of Issue</label>
                                    <input type="text" placeholder="Enter place of issue" class="form-control inputDisabled" value="<?php echo @$passport_single->passport_place_of_issue;?>" name="passport_place_of_issue" id="passport_place_of_issue">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
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
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-6">
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
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Upload Passport (5 pages)</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control forCustomFile inputDisabled" style="display:none;" placeholder="Upload file" value="Passport Images">
                                        <div class="custom-file replaceCustomFile" style="">
                                            <input type="file" name="passport_image[]" multiple class="custom-file-input" id="passport_image">
                                            <label class="custom-file-label" for="passport_image">Upload file</label>
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
                                                                $images=  explode(',', $passport_single->passport_image);
                                                                foreach ($images as $value) {



                                                            ?>
                                                            <a href="<?php echo base_url('employees_loanapplication_download/').@$value; ?>">    <img src="<?php echo base_url(); ?>uploads/<?php echo @$value; ?>" alt="" class="img-fluid"></a><br>
                                                           
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
                        <div class="form-group mt-3">
<!--                            <button type="btn" class="btn btn-primary edit-profile-btn">Edit</button>-->
                            <a onclick="passport_form_submit('<?php echo $id; ?>')" class="btn btn-success save-profile-btn" style="">Update & Save</a>
<!--                            <button type="reset" class="btn btn-outline-secondary ks-light reset-profile-btn" style="display: none;">Reset</button>-->
                        </div>
                    </div>
                        <div style="display: none;">
                            <h6 class="mt-2 mb-3">Employment Offer</h6>
                            <hr>
                            <div class="row mt-2">
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Upload Employment Offer (5 pages)</label>
                                        <div class="input-group">
<!--                                            <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" value="Employment Offer Images" disabled="disabled">-->
                                            <div class="custom-file replaceCustomFile" style="">
                                                <input type="file" name="employment_offer_image[]" multiple class="custom-file-input" class="custom-file-input" id="employment_offer_image">
                                                <label class="custom-file-label" for="employment_offer_image">Upload file (5 pages)</label>
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
                                                                $images=  explode(',', $passport_single->employment_offer_image);
                                                                foreach ($images as $value) {



                                                            ?>
                                                                <a href="<?php echo base_url('employees_loanapplication_download/').@$value; ?>">    <img src="<?php echo base_url(); ?>uploads/<?php echo @$value; ?>" alt="" class="img-fluid"></a><br>
                                                           
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
                            <h6 class="mt-2 mb-3">Typing Electronic Pre-Approval Work Permit Application</h6>
                            <hr>
                            <div class="row mt-2">
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Upload Application (2 pages)</label>
                                        <div class="input-group">
<!--                                            <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" value="Work Permit Application Images" disabled="disabled">-->
                                            <div class="custom-file replaceCustomFile" style="">
                                                <input type="file" name="work_permit_application_image[]" multiple class="custom-file-input" id="work_permit_application_image">
                                                <label class="custom-file-label" for="work_permit_application_image">Upload file (2 pages)</label>
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
                                                                $images=  explode(',', $passport_single->work_permit_application_image);
                                                                foreach ($images as $value) {



                                                            ?>
                                                            <a href="<?php echo base_url('employees_loanapplication_download/').@$value; ?>">    <img src="<?php echo base_url(); ?>uploads/<?php echo @$value; ?>" alt="" class="img-fluid"></a><br>
                                                           
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
                            <h6 class="mt-2 mb-3">Employment Contract (Outside the Country)</h6>
                            <hr>
                            <div class="row mt-2">
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Upload Employment Contract (5 pages)</label>
                                        <div class="input-group">
<!--                                            <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" value="Employment Contract Images" disabled="disabled">-->
                                            <div class="custom-file replaceCustomFile" style="">
                                                <input type="file" class="custom-file-input" multiple name="employment_contact_image[]" multiple id="employment_contact_image">
                                                <label class="custom-file-label" for="employment_contact_image">Upload file (5 pages)</label>
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
                                                                $images=  explode(',', $passport_single->employment_contact_image);
                                                                foreach ($images as $value) {



                                                            ?>
                                                            <a href="<?php echo base_url('employees_loanapplication_download/').@$value; ?>">    <img src="<?php echo base_url(); ?>uploads/<?php echo @$value; ?>" alt="" class="img-fluid"></a><br>
                                                           
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
                            <h6 class="mt-2 mb-3">Bank Guarantee (Returned after Labor Cancels)</h6>
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
                            <h6 class="mt-2 mb-3">Electronic Work Permit</h6>
                            <hr>
                            <div class="row mt-2">
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Upload Work Permit (2 pages)</label>
                                        <div class="input-group">
<!--                                            <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" value="Work Permit Images" disabled="disabled">-->
                                            <div class="custom-file replaceCustomFile" style="">
                                                <input type="file" name="electronic_work_permit[]" multiple class="custom-file-input" id="electronic_work_permit">
                                                <label class="custom-file-label" for="electronic_work_permit">Upload file (2 pages)</label>
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
                                                                $images=  explode(',', $passport_single->electronic_work_permit);
                                                                foreach ($images as $value) {



                                                            ?>
                                                            <a href="<?php echo base_url('employees_loanapplication_download/').@$value; ?>">    <img src="<?php echo base_url(); ?>uploads/<?php echo @$value; ?>" alt="" class="img-fluid"></a><br>
                                                           
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
                        <div style="display: none;">
                            <h6 class="mt-2 mb-3">Ministry of Labor Card</h6>
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
                                                <label class="custom-file-label" for="labor_card_image">Upload file</label>
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
                                                                <a href="<?php echo base_url('employees_loanapplication_download/').@$passport_single->labor_card_image; ?>">     <img src="<?php echo base_url(); ?>uploads/<?php echo @$passport_single->labor_card_image; ?>" alt="" class="img-fluid"></a>
<!--                                                                <img src="http://www.fixituae.com/wp-content/uploads/2014/06/EID300x182.jpg" alt="" class="img-fluid">-->
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
                            <h6 class="mt-2 mb-3">Employment Visa (Inside the Country)</h6>
                            <hr>
                            <div class="row mt-2">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Issue Date</label>
                                        <input type="text" placeholder="Select date" class="form-control flatpickrDate ks-daterange-single inputDisabled" value="<?php echo @$passport_single->employment_visa_in_country_issue_date;?>" name="employment_visa_in_country_issue_date" id="employment_visa_in_country_issue_date">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Expiry Date</label>
                                        <input type="text" placeholder="Select date" class="form-control flatpickrDate ks-daterange-single inputDisabled" value="<?php echo @$passport_single->employment_visa_in_country_expiry_date;?>" name="employment_visa_in_country_expiry_date" id="employment_visa_in_country_expiry_date">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Visa Cost</label>
                                        <input type="text" placeholder="Enter visa card cost" class="form-control inputDisabled" value="<?php echo @$passport_single->employment_visa_in_country_cost;?>" name="employment_visa_in_country_cost" id="employment_visa_in_country_cost">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Upload Employment Visa</label>
                                        <div class="input-group">
<!--                                            <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" value="Employment Visa Image" disabled="disabled">-->
                                            <div class="custom-file replaceCustomFile" style="">
                                                <input type="file" name="employment_visa_in_country_image" class="custom-file-input" id="employment_visa_in_country_image">
                                                <label class="custom-file-label" for="employment_visa_in_country_image">Upload file</label>
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
                                                                <a href="<?php echo base_url('employees_loanapplication_download/').@$passport_single->employment_visa_in_country_image; ?>">     <img src="<?php echo base_url(); ?>uploads/<?php echo @$passport_single->employment_visa_in_country_image; ?>" alt="" class="img-fluid"></a>
<!--                                                                <img src="http://www.fixituae.com/wp-content/uploads/2014/06/EID300x182.jpg" alt="" class="img-fluid">-->
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
                            <h6 class="mt-2 mb-3">Employment Visa (Outside the Country)</h6>
                            <hr>
                            <div class="row mt-2">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Issue Date</label>
                                        <input type="text" placeholder="Select date" class="form-control flatpickrDate ks-daterange-single inputDisabled" value="<?php echo @$passport_single->employment_visa_out_country_issue_date;?>" name="employment_visa_out_country_issue_date" id="employment_visa_out_country_issue_date">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Expiry Date</label>
                                        <input type="text" placeholder="Select date" class="form-control flatpickrDate ks-daterange-single inputDisabled" value="<?php echo @$passport_single->employment_visa_out_country_expiry_date;?>" name="employment_visa_out_country_expiry_date" id="employment_visa_out_country_expiry_date">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
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
                                                <label class="custom-file-label" for="employment_visa_out_country_image">Upload file</label>
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
                                                                <a href="<?php echo base_url('employees_loanapplication_download/').@$passport_single->employment_visa_out_country_image; ?>">     <img src="<?php echo base_url(); ?>uploads/<?php echo @$passport_single->employment_visa_out_country_image; ?>" alt="" class="img-fluid"></a>
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
                            <h6 class="mt-2 mb-3">Medical</h6>
                            <hr>
                            <div class="row mt-2">
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Upload Test Application</label>
                                        <div class="input-group">
<!--                                            <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" value="Test Application Image" disabled="disabled">-->
                                            <div class="custom-file replaceCustomFile" style="">
                                                <input type="file" name="medical_test_application_image" class="custom-file-input" id="medical_test_application_image">
                                                <label class="custom-file-label" for="medical_test_application_image">Upload file</label>
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
                                                                <a href="<?php echo base_url('employees_loanapplication_download/').@$passport_single->medical_test_application_image; ?>">     <img src="<?php echo base_url(); ?>uploads/<?php echo @$passport_single->medical_test_application_image; ?>" alt="" class="img-fluid"></a>
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
<!--                                            <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" value="Test Result Image" disabled="disabled">-->
                                            <div class="custom-file replaceCustomFile" style="display: none;">
                                                <input type="file" class="custom-file-input" name="medical_test_result_image" id="medical_test_result_image">
                                                <label class="custom-file-label" for="medical_test_result_image">Upload file</label>
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
                                                                <a href="<?php echo base_url('employees_loanapplication_download/').@$passport_single->medical_test_result_image; ?>">     <img src="<?php echo base_url(); ?>uploads/<?php echo @$passport_single->medical_test_result_image; ?>" alt="" class="img-fluid"></a>
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
                            <h6 class="mt-2 mb-3">Emirates ID</h6>
                            <hr>
                            <div class="row mt-2">
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Upload Emirates ID Application</label>
                                        <div class="input-group">
<!--                                            <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" value="Emirates ID Application Image" disabled="disabled">-->
                                            <div class="custom-file replaceCustomFile" style="">
                                                <input type="file" class="custom-file-input" name="emirates_id_application_image" id="emirates_id_application_image">
                                                <label class="custom-file-label" for="emirates_id_application_image">Upload file</label>
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
                                                                <a href="<?php echo base_url('employees_loanapplication_download/').@$passport_single->emirates_id_application_image; ?>">     <img src="<?php echo base_url(); ?>uploads/<?php echo @$passport_single->emirates_id_application_image; ?>" alt="" class="img-fluid"></a>
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
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Issue Date</label>
                                        <input type="text" placeholder="Select date" class="form-control flatpickrDate ks-daterange-single inputDisabled" value="<?php echo @$passport_single->emirates_id_application_issue_date;?>" name="emirates_id_application_issue_date" id="emirates_id_application_issue_date">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Expiry Date</label>
                                        <input type="text" placeholder="Select date" class="form-control flatpickrDate ks-daterange-single inputDisabled" value="<?php echo @$passport_single->mirates_id_application_expiry_date;?>" name="mirates_id_application_expiry_date" id="mirates_id_application_expiry_date">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">EID Card Front</label>
                                        <div class="input-group">
<!--                                            <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" value="EID Card Front Image" disabled="disabled">-->
                                            <div class="custom-file replaceCustomFile" style="">
                                                <input type="file" class="custom-file-input" name="eid_card_front_image" id="eid_card_front_image">
                                                <label class="custom-file-label" for="eid_card_front_image">Upload file</label>
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
                                                                <a href="<?php echo base_url('employees_loanapplication_download/').@$passport_single->eid_card_front_image; ?>">     <img src="<?php echo base_url(); ?>uploads/<?php echo @$passport_single->eid_card_front_image; ?>" alt="" class="img-fluid"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">EID Card Back</label>
                                        <div class="input-group">
<!--                                            <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" value="EID Card Back Image" disabled="disabled">-->
                                            <div class="custom-file replaceCustomFile" style="">
                                                <input type="file" class="custom-file-input" name="eid_card_back_image" id="eid_card_back_image">
                                                <label class="custom-file-label" for="eid_card_back_image">Upload file</label>
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
                                                               <a href="<?php echo base_url('employees_loanapplication_download/').@$passport_single->eid_card_back_image; ?>">     <img src="<?php echo base_url(); ?>uploads/<?php echo @$passport_single->eid_card_back_image; ?>" alt="" class="img-fluid"></a>
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
                            <h6 class="mt-2 mb-3">Permanent Visa</h6>
                            <hr>
                            <div class="row mt-2">
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Application for Permanent Visa</label>
                                        <div class="input-group">
<!--                                            <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" value="Application for Permanent Visa Image" disabled="disabled">-->
                                            <div class="custom-file replaceCustomFile" style="">
                                                <input type="file" name="permanent_visa_application" class="custom-file-input" id="permanent_visa_application">
                                                <label class="custom-file-label" for="permanent_visa_application">Upload file</label>
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
                                                                <a href="<?php echo base_url('employees_loanapplication_download/').@$passport_single->permanent_visa_application; ?>">     <img src="<?php echo base_url(); ?>uploads/<?php echo @$passport_single->permanent_visa_application; ?>" alt="" class="img-fluid"></a>
<!--                                                                <img src="http://www.fixituae.com/wp-content/uploads/2014/06/EID300x182.jpg" alt="" class="img-fluid">-->
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
                            </div>
                            <div class="row mt-2">
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
<!--                                            <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" value="EID Card Front Image" disabled="disabled">-->
                                            <div class="custom-file replaceCustomFile" style="">
                                                <input type="file" name="permanent_visa_image" class="custom-file-input" id="permanent_visa_image">
                                                <label class="custom-file-label" for="permanent_visa_image">Upload file</label>
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
                                                                <a href="<?php echo base_url('employees_loanapplication_download/').@$passport_single->permanent_visa_image; ?>">     <img src="<?php echo base_url(); ?>uploads/<?php echo @$passport_single->permanent_visa_image; ?>" alt="" class="img-fluid"></a>
<!--                                                                <img src="http://www.fixituae.com/wp-content/uploads/2014/06/EID300x182.jpg" alt="" class="img-fluid">-->
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
                            <h6 class="mt-2 mb-3">Employment Contract (Inside the Country)</h6>
                            <hr>
                            <div class="row mt-2">
                                <div class="col-sm-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Employment Contract (5 pages)</label>
                                        <div class="input-group">
<!--                                            <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" value="Employment Contract Image" disabled="disabled">-->
                                            <div class="custom-file replaceCustomFile" style="">
                                                <input type="file" multiple name="emplyment_in_country_contact_image[]" class="custom-file-input" id="emplyment_in_country_contact_image">
                                                <label class="custom-file-label"  for="emplyment_in_country_contact_image">Upload file (5 pages)</label>
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
                                                                $images=  explode(',', $passport_single->emplyment_in_country_contact_image);
                                                                foreach ($images as $value) {



                                                            ?>
                                                            <a href="<?php echo base_url('employees_loanapplication_download/').@$value; ?>">    <img src="<?php echo base_url(); ?>uploads/<?php echo @$value; ?>" alt="" class="img-fluid"></a><br>
                                                           
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
                        </div>
                        <div class="row mt-2" style="display: none;">
                            <div class="col-12">
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
<script>
     $('.flatpickrDate').flatpickr();
    </script>