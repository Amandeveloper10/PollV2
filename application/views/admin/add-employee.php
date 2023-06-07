<div class="ks-page-header">
                <section class="ks-title">
                    <h3>Add Employee</h3>
                    <div class="ks-controls">
                        <button type="button" class="btn btn-outline-primary ks-light ks-settings-menu-block-toggle" data-block-toggle=".ks-settings-tab > .ks-menu">Profile Tabs</button>
                    </div>
                </section>
            </div>

<div class="ks-page-content">
    <div class="ks-page-content-body">
        
        <div class="ks-tabs-container ks-tabs-default ks-tabs-no-separator ks-full ks-light">
            <div class="tab-content">
                <div class="tab-pane active" id="settings" role="tabpanel" aria-expanded="false">
                    <div class="ks-settings-tab">
                        <div class="ks-menu">
                            <ul class="nav nav-pills nav-stacked">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-general-tab" data-toggle="pill" href="#pills-general" role="tab" aria-controls="pills-general" aria-selected="false">General</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-experience-tab" data-toggle="pill" href="#pills-experience" role="tab" aria-controls="pills-experience" aria-selected="false">Experience & Qualification</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-salary-tab" data-toggle="pill" href="#pills-salary" role="tab" aria-controls="pills-salary" aria-selected="false">Salary</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-passport-tab" data-toggle="pill" href="#pills-passport" role="tab" aria-controls="pills-passport" aria-selected="false">Passport / Visa</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-benefits-tab" data-toggle="pill" href="#pills-benefits" role="tab" aria-controls="pills-benefits" aria-selected="false">Benefits</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-expenses-tab" data-toggle="pill" href="#pills-expenses" role="tab" aria-controls="pills-expenses" aria-selected="false">Full Expenses</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-loans-tab" data-toggle="pill" href="#pills-loans" role="tab" aria-controls="pills-loans" aria-selected="false">Loans</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-warnings-tab" data-toggle="pill" href="#pills-warnings" role="tab" aria-controls="pills-warnings" aria-selected="false">Warnings & Evaluation</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-complaints-tab" data-toggle="pill" href="#pills-complaints" role="tab" aria-controls="pills-complaints" aria-selected="false">Complaints</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-closure-tab" data-toggle="pill" href="#pills-closure" role="tab" aria-controls="pills-closure" aria-selected="false">Closure</a>
                                </li>
                            </ul>
                        </div>
                        <div class="ks-settings-form-wrapper">
                            <form class="ks-form ks-settings-tab-form ks-general"> <!-- ks-uppercase ks-light -->
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade p-0 show active" id="pills-general" role="tabpanel" aria-labelledby="pills-general-tab">
                                        <!-- <h5 class="card-header">
                                            <span class="ks-text mt-2">General</span>
                                            <a href="#" class="btn btn-outline-primary ks-light ks-no-text save-profile-btn"><span class="la la-save ks-icon"></span></a>
                                        </h5> -->
                                        <div class="ks-manage-avatar ks-group mt-3 mb-5">
                                            <img class="ks-avatar" src="<?php echo base_url(); ?>assets/img/avatars/placeholders/ava-128.png" width="100" height="100">
                                            <div class="ks-manage-avatar-body">
                                                <div class="ks-manage-avatar-body-header">Employee Avatar</div>
                                                <div class="ks-manage-avatar-body-description">
                                                    A square image 100x100px is recommended
                                                </div>
                                                <div class="ks-manage-avatar-body-controls">
                                                    <button type="button" class="btn btn-primary">
                                                        <span class="la la-upload ks-icon"></span>
                                                        <span class="ks-text">Upload Image</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-box"> 
                                            <h6 class="form-box-heading">Basic Details</h6>
                                            <div class="row">
                                                <div class="col-sm-6 col-xl-3">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">Employee No.</label>
                                                        <input type="text" placeholder="Enter employee number" class="form-control ">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xl-3">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">File No.</label>
                                                        <input type="text" placeholder="Enter file number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xl-3">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">Category</label>
                                                        <select name="select" class="form-control " >
                                                            <option value="0">Please select</option>
                                                            <option value="1" selected="selected">Option #1</option>
                                                            <option value="2">Option #2</option>
                                                            <option value="3">Option #3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xl-3">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">Title</label>
                                                        <input type="text" placeholder="Enter title" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">First Name</label>
                                                        <input type="text" placeholder="Enter first name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">Middle Name</label>
                                                        <div class="row">
                                                            <div class="col pr-0">
                                                                <input type="text" placeholder="Name 1" class="form-control">
                                                            </div>
                                                            <div class="col">
                                                                <input type="text" placeholder="Name 2" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-sm-6 col-xl-3">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">Department</label>
                                                        <input type="text" placeholder="Enter department" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xl-3">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">Designation</label>
                                                        <input type="text" placeholder="Enter designation" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xl-3">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">Hire Date</label>
                                                        <input type="text" placeholder="Select date" class="form-control ks-daterange-single">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xl-3">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">Status</label>
                                                        <select name="select" class="form-control " >
                                                            <option value="0">Please select</option>
                                                            <option value="1">Option #1</option>
                                                            <option value="2" selected="selected">Option #2</option>
                                                            <option value="3">Option #3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-sm-6 col-xl-3">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">Date Discontinued</label>
                                                        <input type="text" placeholder="Select date" class="form-control ks-daterange-single">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xl-3">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">Gratuity Start Date</label>
                                                        <input type="text" placeholder="Select date" class="form-control ks-daterange-single">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xl-3">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">Gratuity Amount (up-to-date)</label>
                                                        <input type="text" placeholder="Enter amount" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xl-3">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">PRO Name</label>
                                                        <input type="text" placeholder="Enter PRO Name" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-sm-6 col-xl-3">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">Leave Per Month</label>
                                                        <input type="text" placeholder="Enter leave per month" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xl-3">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">Next Leave Due Date</label>
                                                        <input type="text" placeholder="Select date" class="form-control ks-daterange-single">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xl-3">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">Increment Due Date</label>
                                                        <input type="text" placeholder="Select date" class="form-control ks-daterange-single">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">Note</label>
                                                        <textarea placeholder="Enter note" class="form-control" style="min-height: 120px; line-height: 20px;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-box">
                                            <h6 class="form-box-heading">Personal Details</h6>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">Father's Name</label>
                                                        <input type="text" placeholder="Enter father's name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">Mother's Name</label>
                                                        <input type="text" placeholder="Enter mother's name" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-sm-6 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="d-block">Marital Status</label>
                                                        <div class="d-inline-block mt-2">
                                                            <div class="custom-control custom-radio ks-radio ks-primary">
                                                                <input id="r1" type="radio" class="custom-control-input " name="maritalStatus"  
                                                                       data-validation="radio_group"
                                                                       data-validation-qty="min1">
                                                                <label class="custom-control-label" for="r1">Married</label>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block mt-2 ml-3">
                                                            <div class="custom-control custom-radio ks-radio ks-primary">
                                                                <input id="r2" type="radio" class="custom-control-input " name="maritalStatus"  
                                                                       data-validation="radio_group"
                                                                       data-validation-qty="min1">
                                                                <label class="custom-control-label" for="r2">Unmarried</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xl-4">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">Spouce Name (if married)</label>
                                                        <input type="text" placeholder="Enter spouce name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xl-4">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">No. of Children</label>
                                                        <input type="text" placeholder="Enter number of children" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-sm-6 col-xl-4">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">Birth Date</label>
                                                        <input type="text" placeholder="Enter date" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="d-block">Gender</label>
                                                        <div class="d-inline-block mt-2">
                                                            <div class="custom-control custom-radio ks-radio ks-info">
                                                                <input id="r3" type="radio" class="custom-control-input" name="gender"  
                                                                       data-validation="radio_group"
                                                                       data-validation-qty="min1">
                                                                <label class="custom-control-label" for="r3">Male</label>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block mt-2 ml-3">
                                                            <div class="custom-control custom-radio ks-radio ks-purple">
                                                                <input id="r4" type="radio" class="custom-control-input " name="gender"  
                                                                       data-validation="radio_group"
                                                                       data-validation-qty="min1">
                                                                <label class="custom-control-label" for="r4">Female</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xl-4">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">Relegion</label>
                                                        <input type="text" placeholder="Enter relegion" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-box">
                                            <h6 class="form-box-heading">Contact Details</h6>
                                            <div class="row">
                                                <div class="col-sm-6 col-xl-4">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">Address 1</label>
                                                        <input type="text" placeholder="Enter address" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xl-4">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">City</label>
                                                        <input type="text" placeholder="Enter city" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xl-4">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">Country</label>
                                                        <select name="select" class="form-control " >
                                                            <option value="0">Please select</option>
                                                            <option value="1">Option #1</option>
                                                            <option value="2">Option #2</option>
                                                            <option value="3">Option #3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-sm-6 col-xl-4">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">Telphone No.</label>
                                                        <input type="text" placeholder="Enter telephone number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xl-4">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">Mobile No.</label>
                                                        <input type="text" placeholder="Enter mobile number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xl-4">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">Email</label>
                                                        <input type="text" placeholder="Enter email" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-box">
                                            <h6 class="form-box-heading">Home Contact Details</h6>
                                            <div class="row">
                                                <div class="col-sm-6 col-xl-4">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">Address 1</label>
                                                        <input type="text" placeholder="Enter address" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xl-4">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">City</label>
                                                        <input type="text" placeholder="Enter city" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xl-4">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">Country</label>
                                                        <select name="select" class="form-control " >
                                                            <option value="0">Please select</option>
                                                            <option value="1">Option #1</option>
                                                            <option value="2">Option #2</option>
                                                            <option value="3" selected="selected">Option #3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-sm-6 col-xl-4">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">Telphone No.</label>
                                                        <input type="text" placeholder="Enter telephone number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xl-4">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">Mobile No.</label>
                                                        <input type="text" placeholder="Enter mobile number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xl-4">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">Email</label>
                                                        <input type="text" placeholder="Enter email" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-3">
                                            <button type="submit" class="btn btn-success save-profile-btn">Save</button>
                                            <button type="reset" class="btn btn-outline-secondary ks-light reset-profile-btn">Reset</button>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade p-0" id="pills-experience" role="tabpanel" aria-labelledby="pills-experience-tab">
                                        <div class="card panel">
                                            <h5 class="card-header">
                                                <span class="ks-text mt-2">Experience & Qualification</span>
                                                <a href="#" class="btn btn-outline-primary ks-light ks-no-text save-profile-btn"><span class="la la-save ks-icon"></span></a>
                                            </h5>
                                            <div class="card-block">
                                                <div class="row">
                                                    <div class="col-sm-6 col-xl-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">Category</label>
                                                            <select name="select" class="form-control " >
                                                                <option value="0">Please select</option>
                                                                <option value="1">Engineer</option>
                                                                <option value="2">PRO</option>
                                                                <option value="3">Safty Officer</option>
                                                                <option value="4">Other</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">University Name</label>
                                                            <input type="text" placeholder="Enter university name" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">Certificate Type</label>
                                                            <select name="select" class="form-control " >
                                                                <option value="0">Please select</option>
                                                                <option value="1">MBA</option>
                                                                <option value="2">BA</option>
                                                                <option value="3">Diploma</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-sm-6 col-xl-4">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">Year of Graduation</label>
                                                            <input type="text" placeholder="Select date" class="form-control ks-daterange-single">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-4">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">No. of Years Experience</label>
                                                            <input type="text" placeholder="Enter nuber of Years Experience" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-4">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">No. of Projects Executed</label>
                                                            <input type="text" placeholder="Enter number of Projects Executed" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="d-block">Society of Engineers</label>
                                                            <div class="d-inline-block mt-2">
                                                                <div class="custom-control custom-radio ks-radio ks-success">
                                                                    <input id="r5" type="radio" class="custom-control-input" name="society"  
                                                                           data-validation="radio_group"
                                                                           data-validation-qty="min1">
                                                                    <label class="custom-control-label" for="r5">Yes</label>
                                                                </div>
                                                            </div>
                                                            <div class="d-inline-block mt-2 ml-3">
                                                                <div class="custom-control custom-radio ks-radio ks-danger">
                                                                    <input id="r6" type="radio" class="custom-control-input " name="society"  
                                                                           data-validation="radio_group"
                                                                           data-validation-qty="min1">
                                                                    <label class="custom-control-label" for="r6">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-sm-6 col-xl-2">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">Expiry Date</label>
                                                            <input type="text" placeholder="Select date" class="form-control ks-daterange-single">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-4">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">Society Id Front</label>
                                                            <div class="input-group">
                                                                <div class="custom-file replaceCustomFile">
                                                                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                                                                    <label class="custom-file-label" for="inputGroupFile01">Upload file</label>
                                                                </div>
                                                                <!-- <div class="input-group-append">
                                                                    <button class="btn btn-outline-secondary" type="button" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-4">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">Society Id Back</label>
                                                            <div class="input-group">
                                                                <div class="custom-file replaceCustomFile">
                                                                    <input type="file" class="custom-file-input" id="inputGroupFile02">
                                                                    <label class="custom-file-label" for="inputGroupFile02">Upload file</label>
                                                                </div>
                                                                <!-- <div class="input-group-append">
                                                                    <button class="btn btn-outline-secondary" type="button" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-2">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">Uploaded Date</label>
                                                            <input type="text" placeholder="Select date" class="form-control ks-daterange-single">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="d-block">Dubai Municipality</label>
                                                            <div class="d-inline-block mt-2">
                                                                <div class="custom-control custom-radio ks-radio ks-success">
                                                                    <input id="r7" type="radio" class="custom-control-input" name="municipality"  
                                                                           data-validation="radio_group"
                                                                           data-validation-qty="min1">
                                                                    <label class="custom-control-label" for="r7">Yes</label>
                                                                </div>
                                                            </div>
                                                            <div class="d-inline-block mt-2 ml-3">
                                                                <div class="custom-control custom-radio ks-radio ks-danger">
                                                                    <input id="r8" type="radio" class="custom-control-input" name="municipality"  
                                                                           data-validation="radio_group"
                                                                           data-validation-qty="min1">
                                                                    <label class="custom-control-label" for="r8">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">Category</label>
                                                            <select name="select" class="form-control">
                                                                <option value="0">Please select</option>
                                                                <option value="1">Option 1</option>
                                                                <option value="2">Option 2</option>
                                                                <option value="3">Option 3</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">Expiry Date</label>
                                                            <input type="text" placeholder="Select date" class="form-control ks-daterange-single" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-sm-6 col-xl-4">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">Municipality Id Front</label>
                                                            <div class="input-group">
                                                                <div class="custom-file replaceCustomFile">
                                                                    <input type="file" class="custom-file-input" id="inputGroupFile03">
                                                                    <label class="custom-file-label" for="inputGroupFile03">Upload file</label>
                                                                </div>
                                                                <!-- <div class="input-group-append">
                                                                    <button class="btn btn-outline-secondary" type="button" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-4">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">Municipality Id Back</label>
                                                            <div class="input-group">
                                                                <div class="custom-file replaceCustomFile">
                                                                    <input type="file" class="custom-file-input" id="inputGroupFile04">
                                                                    <label class="custom-file-label" for="inputGroupFile04">Upload file</label>
                                                                </div>
                                                                <!-- <div class="input-group-append">
                                                                    <button class="btn btn-outline-secondary" type="button" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-4">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">Uploaded Date</label>
                                                            <input type="text" placeholder="Select date" class="form-control ks-daterange-single">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="d-block">Trakhees</label>
                                                            <div class="d-inline-block mt-2">
                                                                <div class="custom-control custom-radio ks-radio ks-success">
                                                                    <input id="r9" type="radio" class="custom-control-input " name="trakhees"  
                                                                           data-validation="radio_group"
                                                                           data-validation-qty="min1">
                                                                    <label class="custom-control-label" for="r9">Yes</label>
                                                                </div>
                                                            </div>
                                                            <div class="d-inline-block mt-2 ml-3">
                                                                <div class="custom-control custom-radio ks-radio ks-danger">
                                                                    <input id="r10" type="radio" class="custom-control-input" name="trakhees"  
                                                                           data-validation="radio_group"
                                                                           data-validation-qty="min1">
                                                                    <label class="custom-control-label" for="r10">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">No. of Cards</label>
                                                            <input type="text" placeholder="No. of Cards" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">1st Card Color</label>
                                                            <input type="text" placeholder="Card Color" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">1st Card Expiry Date</label>
                                                            <input type="text" placeholder="Select date" class="form-control ks-daterange-single">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-sm-6 col-xl-4">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">1st Card Front</label>
                                                            <div class="input-group">
                                                                <div class="custom-file replaceCustomFile">
                                                                    <input type="file" class="custom-file-input" id="inputGroupFile05">
                                                                    <label class="custom-file-label" for="inputGroupFile05">Upload file</label>
                                                                </div>
                                                                <!-- <div class="input-group-append">
                                                                    <button class="btn btn-outline-secondary" type="button" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-4">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">1st Card Back</label>
                                                            <div class="input-group">
                                                                <div class="custom-file replaceCustomFile">
                                                                    <input type="file" class="custom-file-input" id="inputGroupFile06">
                                                                    <label class="custom-file-label" for="inputGroupFile06">Upload file</label>
                                                                </div>
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-outline-secondary" type="button" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-4">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">Uploaded Date</label>
                                                            <input type="text" placeholder="Select date" class="form-control ks-daterange-single">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">2nd Card Color</label>
                                                            <input type="text" placeholder="Card Color" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">2nd Card Expiry Date</label>
                                                            <input type="text" placeholder="Select date" class="form-control ks-daterange-single">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-sm-6 col-xl-4">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">2nd Card Front</label>
                                                            <div class="input-group">
                                                                <div class="custom-file replaceCustomFile">
                                                                    <input type="file" class="custom-file-input" id="inputGroupFile07">
                                                                    <label class="custom-file-label" for="inputGroupFile07">Upload file</label>
                                                                </div>
                                                                <!-- <div class="input-group-append">
                                                                    <button class="btn btn-outline-secondary" type="button" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-4">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">2nd Card Back</label>
                                                            <div class="input-group">
                                                                <div class="custom-file replaceCustomFile">
                                                                    <input type="file" class="custom-file-input" id="inputGroupFile08">
                                                                    <label class="custom-file-label" for="inputGroupFile08">Upload file</label>
                                                                </div>
                                                                <!-- <div class="input-group-append">
                                                                    <button class="btn btn-outline-secondary" type="button" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-4">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">Uploaded Date</label>
                                                            <input type="text" placeholder="Select date" class="form-control ks-daterange-single">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">CV</label>
                                                            <div class="input-group">
                                                                <div class="custom-file replaceCustomFile">
                                                                    <input type="file" class="custom-file-input" id="inputGroupFile09">
                                                                    <label class="custom-file-label" for="inputGroupFile09">Upload CV</label>
                                                                </div>
                                                                <!-- <div class="input-group-append">
                                                                    <a href="http://www.kdp.org/resources/pdf/careercenter/Compiling_a_Curriculum_Vitae.pdf" class="btn btn-outline-secondary" type="button" title="View" target="_blank"><span class="la la-eye ks-icon ml-2"></span></a>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="form-group mt-3">
                                                    <button type="submit" class="btn btn-success save-profile-btn">Save</button>
                                                    <button type="reset" class="btn btn-outline-secondary ks-light reset-profile-btn">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade p-0" id="pills-salary" role="tabpanel" aria-labelledby="pills-salary-tab">
                                        <div class="card panel">
                                            <h4 class="card-header">
                                                <span class="ks-text mt-2">Salary</span>
                                                <a href="#" class="btn btn-outline-primary ks-light ks-no-text save-profile-btn"><span class="la la-save ks-icon"></span></a>
                                            </h4>
                                            <div class="card-block">
                                                <h6 class="mt-2 mb-3">Salary Details</h6>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">Pay Currency</label>
                                                            <select name="select" class="form-control">
                                                                <option value="0">Please select</option>
                                                                <option value="1">$ Dolor</option>
                                                                <option value="2">Option 2</option>
                                                                <option value="3">Option 3</option>
                                                                <option value="4">Option 4</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">Basic Salary</label>
                                                            <input type="text" placeholder="Enter basic salary amount" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="d-block">Allowances</label>
                                                            <div class="d-inline-block mt-2">
                                                                <div class="custom-control custom-checkbox ks-checkbox ks-checkbox-success">
                                                                    <input type="checkbox" class="custom-control-input " id="customCheck1" checked="checked" >
                                                                    <label class="custom-control-label" for="customCheck1">House Allowance</label>
                                                                </div>
                                                            </div>
                                                            <div class="d-inline-block mt-2 ml-3">
                                                                <div class="custom-control custom-checkbox ks-checkbox ks-checkbox-success">
                                                                    <input type="checkbox" class="custom-control-input " id="customCheck2" checked="checked" >
                                                                    <label class="custom-control-label" for="customCheck2">Transportation Allowance</label>
                                                                </div>
                                                            </div>
                                                            <div class="d-inline-block mt-2 ml-3">
                                                                <div class="custom-control custom-checkbox ks-checkbox ks-checkbox-success">
                                                                    <input type="checkbox" class="custom-control-input " id="customCheck3" >
                                                                    <label class="custom-control-label" for="customCheck3">Petrol/Salik Allowance</label>
                                                                </div>
                                                            </div>
                                                            <div class="d-inline-block mt-2 ml-3">
                                                                <div class="custom-control custom-checkbox ks-checkbox ks-checkbox-success">
                                                                    <input type="checkbox" class="custom-control-input " id="customCheck4" >
                                                                    <label class="custom-control-label" for="customCheck4">Phone Allowance</label>
                                                                </div>
                                                            </div>
                                                            <div class="d-inline-block mt-2 ml-3">
                                                                <div class="custom-control custom-checkbox ks-checkbox ks-checkbox-success">
                                                                    <input type="checkbox" class="custom-control-input " id="customCheck4" >
                                                                    <label class="custom-control-label" for="customCheck4">Other Allowances</label>
                                                                </div>
                                                            </div>
                                                        </div>    
                                                    </div>
                                                </div>
                                                <div class="pt-2 px-4 pb-0 mb-3" style="border: 1px solid rgba(0,0,0,0.1);">
                                                    <h6 class="mt-2 mb-3">Howse Allowance</h6>
                                                    <hr>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="d-block">Provided by Company</label>
                                                                <div class="d-inline-block mt-2">
                                                                    <div class="custom-control custom-radio ks-radio ks-success">
                                                                        <input id="r11" type="radio" class="custom-control-input " name="houseallowance" checked="checked"  
                                                                               data-validation="radio_group"
                                                                               data-validation-qty="min1">
                                                                        <label class="custom-control-label" for="r11">Yes</label>
                                                                    </div>
                                                                </div>
                                                                <div class="d-inline-block mt-2 ml-3">
                                                                    <div class="custom-control custom-radio ks-radio ks-danger">
                                                                        <input id="r12" type="radio" class="custom-control-input " name="houseallowance"  
                                                                               data-validation="radio_group"
                                                                               data-validation-qty="min1">
                                                                        <label class="custom-control-label" for="r12">No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Tenency Contracts</label>
                                                                <select name="select" class="form-control " >
                                                                    <option value="0">Please select</option>
                                                                    <option value="1">Option 1</option>
                                                                    <option value="2">Option 2</option>
                                                                    <option value="3">Option 3</option>
                                                                    <option value="4">Option 4</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>    
                                                </div>
                                                <div class="pt-2 px-4 pb-0 mb-3" style="border: 1px solid rgba(0,0,0,0.1);">
                                                    <h6 class="mt-2 mb-3">Transportation Allowance</h6>
                                                    <hr>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="d-block">Provided by Company</label>
                                                                <div class="d-inline-block mt-2">
                                                                    <div class="custom-control custom-radio ks-radio ks-success">
                                                                        <input id="r13" type="radio" class="custom-control-input " name="transportationallowance"  
                                                                               data-validation="radio_group"
                                                                               data-validation-qty="min1">
                                                                        <label class="custom-control-label" for="r13">Yes</label>
                                                                    </div>
                                                                </div>
                                                                <div class="d-inline-block mt-2 ml-3">
                                                                    <div class="custom-control custom-radio ks-radio ks-danger">
                                                                        <input id="r14" type="radio" class="custom-control-input " name="transportationallowance" checked="checked"  
                                                                               data-validation="radio_group"
                                                                               data-validation-qty="min1">
                                                                        <label class="custom-control-label" for="r14">No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Enter Amount</label>
                                                                <input type="text" placeholder="Enter amount" class="form-control">
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
                                                                    <input type="checkbox" class="custom-control-input" id="customCheck6" checked="checked" >
                                                                    <label class="custom-control-label" for="customCheck6">Insurance</label>
                                                                </div>
                                                            </div>
                                                            <div class="d-inline-block mt-2 ml-3">
                                                                <div class="custom-control custom-checkbox ks-checkbox ks-checkbox-success">
                                                                    <input type="checkbox" class="custom-control-input" id="customCheck7" checked="checked" >
                                                                    <label class="custom-control-label" for="customCheck7">Loan/Advance</label>
                                                                </div>
                                                            </div>
                                                        </div>    
                                                    </div>
                                                </div>
                                                <div class="pt-2 px-4 pb-0 mb-3" style="border: 1px solid rgba(0,0,0,0.1);">
                                                    <h6 class="mt-2 mb-3">Insurance</h6>
                                                    <hr>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="d-block">Provided by Company</label>
                                                                <div class="d-inline-block mt-2">
                                                                    <div class="custom-control custom-radio ks-radio ks-success">
                                                                        <input id="r17" type="radio" class="custom-control-input" name="insurancededuction" checked="checked"  
                                                                               data-validation="radio_group"
                                                                               data-validation-qty="min1">
                                                                        <label class="custom-control-label" for="r17">Yes</label>
                                                                    </div>
                                                                </div>
                                                                <div class="d-inline-block mt-2 ml-3">
                                                                    <div class="custom-control custom-radio ks-radio ks-danger">
                                                                        <input id="r18" type="radio" class="custom-control-input" name="insurancededuction"  
                                                                               data-validation="radio_group"
                                                                               data-validation-qty="min1">
                                                                        <label class="custom-control-label" for="r18">No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Insurance Type</label>
                                                                <select name="select" class="form-control " >
                                                                    <option value="0">Please select</option>
                                                                    <option value="1">Option 1</option>
                                                                    <option value="2">Option 2</option>
                                                                    <option value="3">Option 3</option>
                                                                    <option value="4">Option 4</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>    
                                                </div>
                                                <div class="pt-2 px-4 pb-0 mb-3" style="border: 1px solid rgba(0,0,0,0.1);">
                                                    <h6 class="mt-2 mb-3">Loan/Advance</h6>
                                                    <hr>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="d-block">Provided by Company</label>
                                                                <div class="d-inline-block mt-2">
                                                                    <div class="custom-control custom-radio ks-radio ks-success">
                                                                        <input id="r15" type="radio" class="custom-control-input" name="loandeduction"  
                                                                               data-validation="radio_group"
                                                                               data-validation-qty="min1">
                                                                        <label class="custom-control-label" for="r15">Yes</label>
                                                                    </div>
                                                                </div>
                                                                <div class="d-inline-block mt-2 ml-3">
                                                                    <div class="custom-control custom-radio ks-radio ks-danger">
                                                                        <input id="r16" type="radio" class="custom-control-input" name="loandeduction" checked="checked"  
                                                                               data-validation="radio_group"
                                                                               data-validation-qty="min1">
                                                                        <label class="custom-control-label" for="r16">No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Enter Amount</label>
                                                                <input type="text" placeholder="Enter amount" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>    
                                                </div>
                                                <div class="row mt-4">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">Gross Salary</label>
                                                            <input type="text" placeholder="Enter gross salary amount" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="d-block">Apply Overtime</label>
                                                            <div class="d-inline-block mt-2">
                                                                <div class="custom-control custom-radio ks-radio ks-success">
                                                                    <input id="r19" type="radio" class="custom-control-input " name="overtime" checked="checked"  
                                                                           data-validation="radio_group"
                                                                           data-validation-qty="min1">
                                                                    <label class="custom-control-label" for="r19">Yes</label>
                                                                </div>
                                                            </div>
                                                            <div class="d-inline-block mt-2 ml-3">
                                                                <div class="custom-control custom-radio ks-radio ks-danger">
                                                                    <input id="r20" type="radio" class="custom-control-input " name="overtime"  
                                                                           data-validation="radio_group"
                                                                           data-validation-qty="min1">
                                                                    <label class="custom-control-label" for="r20">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h6 class="mt-2 mb-3">Bank Details</h6>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">Bank Name</label>
                                                            <select name="select" class="form-control " >
                                                                <option value="0">Please select</option>
                                                                <option value="1">Option 1</option>
                                                                <option value="2">Option 2</option>
                                                                <option value="3">Option 3</option>
                                                                <option value="4">Other</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">Account No.</label>
                                                            <input type="text" placeholder="Enter account number" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">IBAN No.</label>
                                                            <input type="text" placeholder="Enter IBAN number" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <div class="d-inline-block mt-2">
                                                                <div class="custom-control custom-checkbox ks-checkbox ks-checkbox-success">
                                                                    <input type="checkbox" class="custom-control-input " id="customCheck8" checked="checked">
                                                                    <label class="custom-control-label" for="customCheck8">Include in Monthly WPS File</label>
                                                                </div>
                                                            </div>
                                                        </div>    
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <div class="d-inline-block mt-2">
                                                                <div class="custom-control custom-checkbox ks-checkbox ks-checkbox-success">
                                                                    <input type="checkbox" class="custom-control-input " id="customCheck9" checked="checked" >
                                                                    <label class="custom-control-label" for="customCheck9">Save this Bank Account as a Default</label>
                                                                </div>
                                                            </div>
                                                        </div>    
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="form-group mt-3">
                                                    <button type="submit" class="btn btn-success save-profile-btn">Save</button>
                                                    <button type="reset" class="btn btn-outline-secondary ks-light reset-profile-btn">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade p-0" id="pills-passport" role="tabpanel" aria-labelledby="pills-passport-tab">
                                        <div class="card panel">
                                            <h5 class="card-header">
                                                <span class="ks-text mt-2">Passport / Visa</span>
                                                <a href="#" class="btn btn-outline-primary ks-light ks-no-text save-profile-btn"><span class="la la-save ks-icon"></span></a>
                                            </h5>
                                            <div class="card-block">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">Passport No.</label>
                                                            <input type="text" placeholder="Enter passport number" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">Place of Issue</label>
                                                            <input type="text" placeholder="Enter place of issue" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-sm-6 col-xl-4">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">Country</label>
                                                            <select name="select" class="form-control " >
                                                                <option value="0">Please select</option>
                                                                <option value="1">Option 1</option>
                                                                <option value="2">Option 2</option>
                                                                <option value="3">Option 3</option>
                                                                <option value="4">Option 4</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-4">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">Issue Date</label>
                                                            <input type="text" placeholder="Select date" class="form-control ks-daterange-single">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-4">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">Expiry Date</label>
                                                            <input type="text" placeholder="Select date" class="form-control ks-daterange-single">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="d-block">Retained with Company</label>
                                                            <div class="d-inline-block mt-2">
                                                                <div class="custom-control custom-radio ks-radio ks-success">
                                                                    <input id="r21" type="radio" class="custom-control-input " name="retainedWithCompany"  
                                                                           data-validation="radio_group"
                                                                           data-validation-qty="min1">
                                                                    <label class="custom-control-label" for="r21">Yes</label>
                                                                </div>
                                                            </div>
                                                            <div class="d-inline-block mt-2 ml-3">
                                                                <div class="custom-control custom-radio ks-radio ks-danger">
                                                                    <input id="r22" type="radio" class="custom-control-input " name="retainedWithCompany"  
                                                                           data-validation="radio_group"
                                                                           data-validation-qty="min1">
                                                                    <label class="custom-control-label" for="r22">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">Upload Passport (5 pages)</label>
                                                            <div class="input-group">
                                                                <div class="custom-file replaceCustomFile">
                                                                    <input type="file" class="custom-file-input" id="inputGroupFile10">
                                                                    <label class="custom-file-label" for="inputGroupFile10">Upload file</label>
                                                                </div>
                                                                <!-- <div class="input-group-append">
                                                                    <button class="btn btn-outline-secondary" type="button" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="mt-2 mb-3">Employment Offer</h6>
                                                    <hr>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Upload Employment Offer (5 pages)</label>
                                                                <div class="input-group">
                                                                    <div class="custom-file replaceCustomFile">
                                                                        <input type="file" class="custom-file-input" id="inputGroupFile11">
                                                                        <label class="custom-file-label" for="inputGroupFile11">Upload file (5 pages)</label>
                                                                    </div>
                                                                    <!-- <div class="input-group-append">
                                                                        <button class="btn btn-outline-secondary" type="button" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                                                    </div> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Employment Offer Date</label>
                                                                <input type="text" placeholder="Select date" class="form-control ks-daterange-single">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Employment Offer Cost</label>
                                                                <input type="text" placeholder="Enter employment offer cost" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="mt-2 mb-3">Typing Electronic Pre-Approval Work Permit Application</h6>
                                                    <hr>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Upload Application (2 pages)</label>
                                                                <div class="input-group">
                                                                    <div class="custom-file replaceCustomFile">
                                                                        <input type="file" class="custom-file-input" id="inputGroupFile12">
                                                                        <label class="custom-file-label" for="inputGroupFile12">Upload file (2 pages)</label>
                                                                    </div>
                                                                    <!-- <div class="input-group-append">
                                                                        <button class="btn btn-outline-secondary" type="button" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                                                    </div> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Application Date</label>
                                                                <input type="text" placeholder="Select date" class="form-control ks-daterange-single">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Application Cost</label>
                                                                <input type="text" placeholder="Enter application cost" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="mt-2 mb-3">Employment Contract (Outside the Country)</h6>
                                                    <hr>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Upload Employment Contract (5 pages)</label>
                                                                <div class="input-group">
                                                                    <div class="custom-file replaceCustomFile">
                                                                        <input type="file" class="custom-file-input" id="inputGroupFile13">
                                                                        <label class="custom-file-label" for="inputGroupFile13">Upload file (5 pages)</label>
                                                                    </div>
                                                                    <!-- <div class="input-group-append">
                                                                        <button class="btn btn-outline-secondary" type="button" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                                                    </div> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Employment Contract Date</label>
                                                                <input type="text" placeholder="Select date" class="form-control ks-daterange-single">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Employment Contract Cost</label>
                                                                <input type="text" placeholder="Enter application cost" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="mt-2 mb-3">Bank Guarantee (Returned after Labour Cancels)</h6>
                                                    <hr>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Policy No.</label>
                                                                <input type="text" placeholder="Enter policy no." class="form-control">
                                                            </div>   
                                                        </div>
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Name of Finance Instituton</label>
                                                                <input type="text" placeholder="Enter name of finance instituton" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Amount</label>
                                                                <input type="text" placeholder="Enter amount" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="mt-2 mb-3">Electronic Work Permit</h6>
                                                    <hr>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Upload Work Permit (2 pages)</label>
                                                                <div class="input-group">
                                                                    <div class="custom-file replaceCustomFile">
                                                                        <input type="file" class="custom-file-input" id="inputGroupFile14">
                                                                        <label class="custom-file-label" for="inputGroupFile14">Upload file (2 pages)</label>
                                                                    </div>
                                                                    <!-- <div class="input-group-append">
                                                                        <button class="btn btn-outline-secondary" type="button" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                                                    </div> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Work Permit Date</label>
                                                                <input type="text" placeholder="Select date" class="form-control ks-daterange-single">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Work Permit Cost</label>
                                                                <input type="text" placeholder="Enter application cost" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="mt-2 mb-3">Ministry of Labor Card</h6>
                                                    <hr>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Card No.</label>
                                                                <input type="text" placeholder="Enter Labor Card No." class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Personal Id No.</label>
                                                                <input type="text" placeholder="Enter Personal Id No" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Issue Date</label>
                                                                <input type="text" placeholder="Select date" class="form-control ks-daterange-single">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Expiry Date</label>
                                                                <input type="text" placeholder="Select date" class="form-control ks-daterange-single">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Labor Card Cost</label>
                                                                <input type="text" placeholder="Enter labor card cost" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Upload Card</label>
                                                                <div class="input-group">
                                                                    <div class="custom-file replaceCustomFile">
                                                                        <input type="file" class="custom-file-input" id="inputGroupFile15">
                                                                        <label class="custom-file-label" for="inputGroupFile15">Upload file</label>
                                                                    </div>
                                                                    <!-- <div class="input-group-append">
                                                                        <button class="btn btn-outline-secondary" type="button" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                                                    </div> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="mt-2 mb-3">Employment Visa (Inside the Country)</h6>
                                                    <hr>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Issue Date</label>
                                                                <input type="text" placeholder="Select date" class="form-control ks-daterange-single">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Expiry Date</label>
                                                                <input type="text" placeholder="Select date" class="form-control ks-daterange-single">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Visa Cost</label>
                                                                <input type="text" placeholder="Enter visa card cost" class="form-control ">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Upload Employment Visa</label>
                                                                <div class="input-group">
                                                                    <div class="custom-file replaceCustomFile">
                                                                        <input type="file" class="custom-file-input" id="inputGroupFile16">
                                                                        <label class="custom-file-label" for="inputGroupFile16">Upload file</label>
                                                                    </div>
                                                                    <!-- <div class="input-group-append">
                                                                        <button class="btn btn-outline-secondary" type="button" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                                                    </div> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="mt-2 mb-3">Employment Visa (Outside the Country)</h6>
                                                    <hr>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Issue Date</label>
                                                                <input type="text" placeholder="Select date" class="form-control ks-daterange-single">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Expiry Date</label>
                                                                <input type="text" placeholder="Select date" class="form-control ks-daterange-single">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Visa Cost</label>
                                                                <input type="text" placeholder="Enter visa card cost" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Upload Employment Visa</label>
                                                                <div class="input-group">
                                                                    <div class="custom-file replaceCustomFile">
                                                                        <input type="file" class="custom-file-input" id="inputGroupFile17">
                                                                        <label class="custom-file-label" for="inputGroupFile17">Upload file</label>
                                                                    </div>
                                                                    <!-- <div class="input-group-append">
                                                                        <button class="btn btn-outline-secondary" type="button" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                                                    </div> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Entry Date</label>
                                                                <input type="text" placeholder="Select date" class="form-control ks-daterange-single">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="mt-2 mb-3">Medical</h6>
                                                    <hr>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Upload Test Application</label>
                                                                <div class="input-group">
                                                                    <div class="custom-file replaceCustomFile">
                                                                        <input type="file" class="custom-file-input" id="inputGroupFile18">
                                                                        <label class="custom-file-label" for="inputGroupFile18">Upload file</label>
                                                                    </div>
                                                                    <!-- <div class="input-group-append">
                                                                        <button class="btn btn-outline-secondary" type="button" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                                                    </div> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Test Application Cost</label>
                                                                <input type="text" placeholder="Enter visa card cost" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Upload Test Result</label>
                                                                <div class="input-group">
                                                                    <div class="custom-file replaceCustomFile">
                                                                        <input type="file" class="custom-file-input" id="inputGroupFile19">
                                                                        <label class="custom-file-label" for="inputGroupFile19">Upload file</label>
                                                                    </div>
                                                                    <!-- <div class="input-group-append">
                                                                        <button class="btn btn-outline-secondary" type="button" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                                                    </div> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="mt-2 mb-3">Emirates ID</h6>
                                                    <hr>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Upload Emirates ID Application</label>
                                                                <div class="input-group">
                                                                    <div class="custom-file replaceCustomFile">
                                                                        <input type="file" class="custom-file-input" id="inputGroupFile20">
                                                                        <label class="custom-file-label" for="inputGroupFile20">Upload file</label>
                                                                    </div>
                                                                    <!-- <div class="input-group-append">
                                                                        <button class="btn btn-outline-secondary" type="button" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                                                    </div> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Emirates ID Application Cost</label>
                                                                <input type="text" placeholder="Enter Application cost" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">ID No.</label>
                                                                <input type="text" placeholder="Enter application ID No." class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Issue Date</label>
                                                                <input type="text" placeholder="Select date" class="form-control ks-daterange-single" >
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Expiry Date</label>
                                                                <input type="text" placeholder="Select date" class="form-control ks-daterange-single">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">EID Card Front</label>
                                                                <div class="input-group">
                                                                    <div class="custom-file replaceCustomFile">
                                                                        <input type="file" class="custom-file-input" id="inputGroupFile21">
                                                                        <label class="custom-file-label" for="inputGroupFile21">Upload file</label>
                                                                    </div>
                                                                    <!-- <div class="input-group-append">
                                                                        <button class="btn btn-outline-secondary" type="button" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                                                    </div> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">EID Card Back</label>
                                                                <div class="custom-file replaceCustomFile">
                                                                    <input type="file" class="custom-file-input" id="inputGroupFile22">
                                                                    <label class="custom-file-label" for="inputGroupFile22">Upload file</label>
                                                                </div>
                                                                <!-- <div class="input-group-append">
                                                                    <button class="btn btn-outline-secondary" type="button" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="mt-2 mb-3">Permanent Visa</h6>
                                                    <hr>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Application for Permanent Visa</label>
                                                                <div class="input-group">
                                                                    <div class="custom-file replaceCustomFile">
                                                                        <input type="file" class="custom-file-input" id="inputGroupFile23">
                                                                        <label class="custom-file-label" for="inputGroupFile23">Upload file</label>
                                                                    </div>
                                                                    <!-- <div class="input-group-append">
                                                                        <button class="btn btn-outline-secondary" type="button" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                                                    </div> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Visa Cost</label>
                                                                <input type="text" placeholder="Enter Visa cost" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">UID No.</label>
                                                                <input type="text" placeholder="Enter UID No." class="form-control" value="AB-0123456" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Issue Date</label>
                                                                <input type="text" placeholder="Select date" class="form-control ks-daterange-single">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Expiry Date</label>
                                                                <input type="text" placeholder="Select date" class="form-control ks-daterange-single">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Upload Permanent Visa</label>
                                                                <div class="input-group">
                                                                    <div class="custom-file replaceCustomFile">
                                                                        <input type="file" class="custom-file-input" id="inputGroupFile24">
                                                                        <label class="custom-file-label" for="inputGroupFile24">Upload file</label>
                                                                    </div>
                                                                    <!-- <div class="input-group-append">
                                                                        <button class="btn btn-outline-secondary" type="button" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                                                    </div> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="mt-2 mb-3">Employment Contract (Inside the Country)</h6>
                                                    <hr>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Employment Contract (5 pages)</label>
                                                                <div class="input-group">
                                                                    <div class="custom-file replaceCustomFile">
                                                                        <input type="file" class="custom-file-input" id="inputGroupFile25">
                                                                        <label class="custom-file-label" for="inputGroupFile25">Upload file (5 pages)</label>
                                                                    </div>
                                                                    <!-- <div class="input-group-append">
                                                                        <button class="btn btn-outline-secondary" type="button" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                                                    </div> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Date Submitted</label>
                                                                <input type="text" placeholder="Select date" class="form-control ks-daterange-single">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Employment Contract Cost</label>
                                                                <input type="text" placeholder="Enter Visa cost" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="d-inline-block mt-2">
                                                                <div class="custom-control custom-checkbox ks-checkbox ks-checkbox-success">
                                                                    <input type="checkbox" class="custom-control-input " id="customCheck10" checked="checked" >
                                                                    <label class="custom-control-label" for="customCheck10">Process to be re-confirmed or can always be changable by Ministry</label>
                                                                </div>
                                                            </div>
                                                        </div>    
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="form-group mt-3">
                                                    <button type="submit" class="btn btn-success save-profile-btn">Save</button>
                                                    <button type="reset" class="btn btn-outline-secondary ks-light reset-profile-btn">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade p-0" id="pills-benefits" role="tabpanel" aria-labelledby="pills-benefits-tab">
                                        <div class="card panel">
                                            <h5 class="card-header">
                                                <span class="ks-text mt-2">Benefits</span>
                                                <a href="#" class="btn btn-outline-primary ks-light ks-no-text save-profile-btn"><span class="la la-save ks-icon"></span></a>
                                            </h5>
                                            <div class="card-block">
                                                <div>
                                                    <h6 class="mt-2 mb-3">Health Insurance</h6>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Policy Name</label>
                                                                <input type="text" placeholder="Enter policy name" class="form-control ">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Expiry Date</label>
                                                                <input type="text" placeholder="Select date" class="form-control ks-daterange-single">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-12 ks-draggable-column">
                                                            <div class="card panel panel-table" data-dashboard-widget>
                                                                <div class="card-block ks-scrollable" data-height="210" data-widget-content>
                                                                    <table class="table table-bordered table-striped">
                                                                        <thead>
                                                                        <tr>
                                                                            <th width="1"></th>
                                                                            <th>Policy Usage List</th>
                                                                            <th width="100" class="text-center">Details</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <tr>
                                                                            <td scope="row">1</td>
                                                                            <td>The Dark Knight Rises (Google Russia)</td>
                                                                            <td class="text-center"><a href="#" class="ks-color-success">View</a></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td scope="row">2</td>
                                                                            <td>The Dark Knight Rises (Google Russia)</td>
                                                                            <td class="text-center"><a href="#" class="ks-color-success">View</a></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td scope="row">3</td>
                                                                            <td>The Dark Knight Rises (Google Russia)</td>
                                                                            <td class="text-center"><a href="#" class="ks-color-success">View</a></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td scope="row">4</td>
                                                                            <td>The Dark Knight Rises (Google Russia)</td>
                                                                            <td class="text-center"><a href="#" class="ks-color-success">View</a></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td scope="row">5</td>
                                                                            <td>The Dark Knight Rises (Google Russia)</td>
                                                                            <td class="text-center"><a href="#" class="ks-color-success">View</a></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td scope="row">6</td>
                                                                            <td>The Dark Knight Rises (Google Russia)</td>
                                                                            <td class="text-center"><a href="#" class="ks-color-success">View</a></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td scope="row">7</td>
                                                                            <td>The Dark Knight Rises (Google Russia)</td>
                                                                            <td class="text-center"><a href="#" class="ks-color-success">View</a></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td scope="row">8</td>
                                                                            <td>The Dark Knight Rises (Google Russia)</td>
                                                                            <td class="text-center"><a href="#" class="ks-color-success">View</a></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td scope="row">9</td>
                                                                            <td>The Dark Knight Rises (Google Russia)</td>
                                                                            <td class="text-center"><a href="#" class="ks-color-success">View</a></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td scope="row">10</td>
                                                                            <td>The Dark Knight Rises (Google Russia)</td>
                                                                            <td class="text-center"><a href="#" class="ks-color-success">View</a></td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <a href="#" type="btn" class="btn btn-outline-danger float-right mt-4">Stop Coverage</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-5">
                                                    <h6 class="mt-2 mb-3">Increments / Bonuses</h6>
                                                    <hr>
                                                    <div class="ks-user-list-view-table">
                                                        <div class="ks-full-table">
                                                            <table id="ks-datatable1" class="table ks-table-info dt-responsive nowrap" width="100%" data-pagination="false">
                                                                <thead>
                                                                <tr>
                                                                    <th>Increments / Bonuses</th>
                                                                    <th>Increment Basic</th>
                                                                    <th>Increment Gross</th>
                                                                    <th>Bonus Amount</th>
                                                                    <th>Date</th>
                                                                    <th>Due Date</th>
                                                                    <th>&nbsp;</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            Permanent Increment
                                                                        </td>
                                                                        <td>
                                                                            $240
                                                                        </td>
                                                                        <td>
                                                                            $320
                                                                        </td>
                                                                        <td>
                                                                            
                                                                        </td>
                                                                        <td>
                                                                            01/12/2017
                                                                        </td>
                                                                        <td>
                                                                            From 01/01/2018
                                                                        </td>
                                                                        <td class="table-action">
                                                                            <div class="dropdown">
                                                                                <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <span class="la la-ellipsis-v"></span>
                                                                                </a>
                                                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                                                    <a class="dropdown-item" href="#">
                                                                                        <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                                                    </a>
                                                                                    <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            One Time Increment
                                                                        </td>
                                                                        <td>
                                                                            $240
                                                                        </td>
                                                                        <td>
                                                                            $320
                                                                        </td>
                                                                        <td>
                                                                            
                                                                        </td>
                                                                        <td>
                                                                            01/12/2017
                                                                        </td>
                                                                        <td>
                                                                            
                                                                        </td>
                                                                        <td class="table-action">
                                                                            <div class="dropdown">
                                                                                <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <span class="la la-ellipsis-v"></span>
                                                                                </a>
                                                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                                                    <a class="dropdown-item" href="#">
                                                                                        <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                                                    </a>
                                                                                    <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Bonus
                                                                        </td>
                                                                        <td>
                                                                            
                                                                        </td>
                                                                        <td>
                                                                            
                                                                        </td>
                                                                        <td>
                                                                            $50
                                                                        </td>
                                                                        <td>
                                                                            05/12/2018
                                                                        </td>
                                                                        <td>
                                                                            
                                                                        </td>
                                                                        <td class="table-action">
                                                                            <div class="dropdown">
                                                                                <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <span class="la la-ellipsis-v"></span>
                                                                                </a>
                                                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                                                    <a class="dropdown-item" href="#">
                                                                                        <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                                                    </a>
                                                                                    <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Permanent Increment
                                                                        </td>
                                                                        <td>
                                                                            $240
                                                                        </td>
                                                                        <td>
                                                                            $320
                                                                        </td>
                                                                        <td>
                                                                            
                                                                        </td>
                                                                        <td>
                                                                            01/12/2017
                                                                        </td>
                                                                        <td>
                                                                            From 01/01/2018
                                                                        </td>
                                                                        <td class="table-action">
                                                                            <div class="dropdown">
                                                                                <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <span class="la la-ellipsis-v"></span>
                                                                                </a>
                                                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                                                    <a class="dropdown-item" href="#">
                                                                                        <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                                                    </a>
                                                                                    <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            One Time Increment
                                                                        </td>
                                                                        <td>
                                                                            $240
                                                                        </td>
                                                                        <td>
                                                                            $320
                                                                        </td>
                                                                        <td>
                                                                            
                                                                        </td>
                                                                        <td>
                                                                            01/12/2017
                                                                        </td>
                                                                        <td>
                                                                            
                                                                        </td>
                                                                        <td class="table-action">
                                                                            <div class="dropdown">
                                                                                <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <span class="la la-ellipsis-v"></span>
                                                                                </a>
                                                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                                                    <a class="dropdown-item" href="#">
                                                                                        <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                                                    </a>
                                                                                    <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Bonus
                                                                        </td>
                                                                        <td>
                                                                            
                                                                        </td>
                                                                        <td>
                                                                            
                                                                        </td>
                                                                        <td>
                                                                            $50
                                                                        </td>
                                                                        <td>
                                                                            05/12/2018
                                                                        </td>
                                                                        <td>
                                                                            
                                                                        </td>
                                                                        <td class="table-action">
                                                                            <div class="dropdown">
                                                                                <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <span class="la la-ellipsis-v"></span>
                                                                                </a>
                                                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                                                    <a class="dropdown-item" href="#">
                                                                                        <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                                                    </a>
                                                                                    <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-5">
                                                    <h6 class="mt-2 mb-3">Leaves</h6>
                                                    <hr>
                                                    <div class="ks-user-list-view-table">
                                                        <div class="ks-full-table">
                                                            <table id="ks-datatable2" class="table ks-table-info dt-responsive nowrap" width="100%" data-pagination="false">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Join Date</th>
                                                                        <th>Entitled Days</th>
                                                                        <th>Taken Days</th>
                                                                        <th>Balnace Days</th>
                                                                        <th>Total Paid</th>
                                                                        <th>Entitled Settlement</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            22/12/2015
                                                                        </td>
                                                                        <td>
                                                                            14
                                                                        </td>
                                                                        <td>
                                                                            20
                                                                        </td>
                                                                        <td>
                                                                            5
                                                                        </td>
                                                                        <td>
                                                                            $120
                                                                        </td>
                                                                        <td>
                                                                            $40
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                    <a href="javascript:void(0);" type="btn" class="btn btn-outline-primary mt-4 btn-add-leave">Add Leave</a>
                                                    <a href="javascript:void(0);" type="btn" class="btn btn-outline-primary mt-4 ml-3 btn-add-leave-settlement">Add Leave Settlement</a>

                                                    <div class="card panel panel-default add-leave mt-4" style="display: none;">
                                                        <h5 class="card-header" style="font-size: 13px;">
                                                            Add Leave
                                                        </h5>
                                                        <div class="card-block">
                                                            <div class="row">
                                                                <div class="col-sm-6 col-xl-4">
                                                                    <div class="form-group">
                                                                        <label for="" class="form-control-label">From Date</label>
                                                                        <input type="text" placeholder="Select date" class="form-control ks-daterange-single">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 col-xl-4">
                                                                    <div class="form-group">
                                                                        <label for="" class="form-control-label">To Date</label>
                                                                        <input type="text" placeholder="Select date" class="form-control ks-daterange-single">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 col-xl-4">
                                                                    <div class="form-group">
                                                                        <label for="" class="form-control-label">Total Days</label>
                                                                        <input type="text" placeholder="Enter total days" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-2">
                                                                <div class="col-sm-6 col-xl-4">
                                                                    <div class="form-group">
                                                                        <label class="d-block">Ticket</label>
                                                                        <div class="d-inline-block mt-2">
                                                                            <div class="custom-control custom-radio ks-radio ks-success">
                                                                                <input id="r23" type="radio" class="custom-control-input" name="ticket"
                                                                                       data-validation="radio_group"
                                                                                       data-validation-qty="min1">
                                                                                <label class="custom-control-label" for="r23">Yes</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-inline-block mt-2 ml-3">
                                                                            <div class="custom-control custom-radio ks-radio ks-danger">
                                                                                <input id="r24" type="radio" class="custom-control-input" name="ticket" 
                                                                                       data-validation="radio_group"
                                                                                       data-validation-qty="min1">
                                                                                <label class="custom-control-label" for="r24">No</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 col-xl-4">
                                                                    <div class="form-group">
                                                                        <label for="" class="form-control-label">Ticket Amount</label>
                                                                        <input type="text" placeholder="Enter ticket amount" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 col-xl-4">
                                                                    <div class="form-group">
                                                                        <label for="" class="form-control-label">Leave Salary Amount</label>
                                                                        <input type="text" placeholder="Enter leave salary amount" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-2">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="" class="form-control-label">Note</label>
                                                                        <textarea placeholder="Enter note" class="form-control " style="min-height: 60px; line-height: 20px;" ></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button type="btn" class="btn btn-success">Add</button>
                                                            <a href="javascript:void(0);" type="btn" class="btn btn-outline-secondary ks-light btn-add-leave-close ml-3">Close</a>
                                                        </div>
                                                    </div>

                                                    <div class="card panel panel-default add-leave-settlement mt-4" style="display: none;">
                                                        <h5 class="card-header" style="font-size: 13px;">
                                                            Add Leave Settlement
                                                        </h5>
                                                        <div class="card-block">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="" class="form-control-label">Date</label>
                                                                        <input type="text" placeholder="Select date" class="form-control ks-daterange-single">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="" class="form-control-label">Paid Amount</label>
                                                                        <input type="text" placeholder="Enter paid amount" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-2">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="" class="form-control-label">Note</label>
                                                                        <textarea placeholder="Enter note" class="form-control " style="min-height: 60px; line-height: 20px;" ></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button type="btn" class="btn btn-success">Add</button>
                                                            <a href="javascript:void(0);" type="btn" class="btn btn-outline-secondary ks-light btn-add-leave-settlement-close ml-3">Close</a>
                                                        </div>
                                                    </div>

                                                    <div class="ks-user-list-view-table mt-4">
                                                        <div class="ks-full-table">
                                                            <table id="ks-datatable3" class="table ks-table-info dt-responsive nowrap" width="100%" data-pagination="false">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="9">Leave List</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>From<br>Date</th>
                                                                        <th>To<br>Date</th>
                                                                        <th>Total<br>Days</th>
                                                                        <th>Ticket</th>
                                                                        <th>Ticket<br>Amount</th>
                                                                        <th>Paid<br>Amount</th>
                                                                        <th>Credited<br>Amount</th>
                                                                        <th>Remarks</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            02/05/2018
                                                                        </td>
                                                                        <td>
                                                                            05/05/2018
                                                                        </td>
                                                                        <td>
                                                                            4 days
                                                                        </td>
                                                                        <td>
                                                                            Ticket
                                                                        </td>
                                                                        <td>
                                                                            $30
                                                                        </td>
                                                                        <td>
                                                                            $20
                                                                        </td>
                                                                        <td>
                                                                            $20
                                                                        </td>
                                                                        <td>
                                                                            Lorem ipsum dolor sit amet
                                                                        </td>
                                                                        <td class="table-action">
                                                                            <div class="dropdown">
                                                                                <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <span class="la la-ellipsis-v"></span>
                                                                                </a>
                                                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                                                    <a class="dropdown-item" href="#">
                                                                                        <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                                                    </a>
                                                                                    <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            02/05/2018
                                                                        </td>
                                                                        <td>
                                                                            05/05/2018
                                                                        </td>
                                                                        <td>
                                                                            4 days
                                                                        </td>
                                                                        <td>
                                                                            Ticket
                                                                        </td>
                                                                        <td>
                                                                            $30
                                                                        </td>
                                                                        <td>
                                                                            $20
                                                                        </td>
                                                                        <td>
                                                                            $20
                                                                        </td>
                                                                        <td>
                                                                            Lorem ipsum dolor sit amet
                                                                        </td>
                                                                        <td class="table-action">
                                                                            <div class="dropdown">
                                                                                <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <span class="la la-ellipsis-v"></span>
                                                                                </a>
                                                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                                                    <a class="dropdown-item" href="#">
                                                                                        <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                                                    </a>
                                                                                    <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            02/05/2018
                                                                        </td>
                                                                        <td>
                                                                            05/05/2018
                                                                        </td>
                                                                        <td>
                                                                            4 days
                                                                        </td>
                                                                        <td>
                                                                            Ticket
                                                                        </td>
                                                                        <td>
                                                                            $30
                                                                        </td>
                                                                        <td>
                                                                            $20
                                                                        </td>
                                                                        <td>
                                                                            $20
                                                                        </td>
                                                                        <td>
                                                                            Lorem ipsum dolor sit amet
                                                                        </td>
                                                                        <td class="table-action">
                                                                            <div class="dropdown">
                                                                                <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <span class="la la-ellipsis-v"></span>
                                                                                </a>
                                                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                                                    <a class="dropdown-item" href="#">
                                                                                        <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                                                    </a>
                                                                                    <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            02/05/2018
                                                                        </td>
                                                                        <td>
                                                                            05/05/2018
                                                                        </td>
                                                                        <td>
                                                                            4 days
                                                                        </td>
                                                                        <td>
                                                                            Ticket
                                                                        </td>
                                                                        <td>
                                                                            $30
                                                                        </td>
                                                                        <td>
                                                                            $20
                                                                        </td>
                                                                        <td>
                                                                            $20
                                                                        </td>
                                                                        <td>
                                                                            Lorem ipsum dolor sit amet
                                                                        </td>
                                                                        <td class="table-action">
                                                                            <div class="dropdown">
                                                                                <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <span class="la la-ellipsis-v"></span>
                                                                                </a>
                                                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                                                    <a class="dropdown-item" href="#">
                                                                                        <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                                                    </a>
                                                                                    <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            02/05/2018
                                                                        </td>
                                                                        <td>
                                                                            05/05/2018
                                                                        </td>
                                                                        <td>
                                                                            4 days
                                                                        </td>
                                                                        <td>
                                                                            Ticket
                                                                        </td>
                                                                        <td>
                                                                            $30
                                                                        </td>
                                                                        <td>
                                                                            $20
                                                                        </td>
                                                                        <td>
                                                                            $20
                                                                        </td>
                                                                        <td>
                                                                            Lorem ipsum dolor sit amet
                                                                        </td>
                                                                        <td class="table-action">
                                                                            <div class="dropdown">
                                                                                <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <span class="la la-ellipsis-v"></span>
                                                                                </a>
                                                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                                                    <a class="dropdown-item" href="#">
                                                                                        <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                                                    </a>
                                                                                    <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                    <div class="ks-user-list-view-table mt-4">
                                                        <div class="ks-full-table">
                                                            <table id="ks-datatable4" class="table ks-table-info dt-responsive nowrap" width="100%" data-pagination="false">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="9">Casual leave List for the Year of 2017-2018</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Date</th>
                                                                        <th>Remarks</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            02/05/2017
                                                                        </td>
                                                                        <td>
                                                                            Lorem ipsum dolor sit amet
                                                                        </td>
                                                                        <td class="table-action">
                                                                            <div class="dropdown">
                                                                                <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <span class="la la-ellipsis-v"></span>
                                                                                </a>
                                                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                                                    <a class="dropdown-item" href="#">
                                                                                        <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                                                    </a>
                                                                                    <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            02/05/2017
                                                                        </td>
                                                                        <td>
                                                                            Lorem ipsum dolor sit amet
                                                                        </td>
                                                                        <td class="table-action">
                                                                            <div class="dropdown">
                                                                                <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <span class="la la-ellipsis-v"></span>
                                                                                </a>
                                                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                                                    <a class="dropdown-item" href="#">
                                                                                        <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                                                    </a>
                                                                                    <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            02/05/2017
                                                                        </td>
                                                                        <td>
                                                                            Lorem ipsum dolor sit amet
                                                                        </td>
                                                                        <td class="table-action">
                                                                            <div class="dropdown">
                                                                                <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <span class="la la-ellipsis-v"></span>
                                                                                </a>
                                                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                                                    <a class="dropdown-item" href="#">
                                                                                        <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                                                    </a>
                                                                                    <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            02/05/2017
                                                                        </td>
                                                                        <td>
                                                                            Lorem ipsum dolor sit amet
                                                                        </td>
                                                                        <td class="table-action">
                                                                            <div class="dropdown">
                                                                                <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <span class="la la-ellipsis-v"></span>
                                                                                </a>
                                                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                                                    <a class="dropdown-item" href="#">
                                                                                        <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                                                    </a>
                                                                                    <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            02/05/2017
                                                                        </td>
                                                                        <td>
                                                                            Lorem ipsum dolor sit amet
                                                                        </td>
                                                                        <td class="table-action">
                                                                            <div class="dropdown">
                                                                                <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <span class="la la-ellipsis-v"></span>
                                                                                </a>
                                                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                                                    <a class="dropdown-item" href="#">
                                                                                        <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                                                    </a>
                                                                                    <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="form-group mt-3">
                                                    <button type="submit" class="btn btn-success save-profile-btn">Save</button>
                                                    <button type="reset" class="btn btn-outline-secondary ks-light reset-profile-btn">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade p-0" id="pills-expenses" role="tabpanel" aria-labelledby="pills-expenses-tab">
                                        <div class="card panel">
                                            <h5 class="card-header">
                                                <span class="ks-text mt-2">Full Expenses</span>
                                                <a href="#" class="btn btn-outline-primary ks-light ks-no-text save-profile-btn"><span class="la la-save ks-icon"></span></a>
                                            </h5>
                                            <div class="card-block">
                                                <div>
                                                    <div class="ks-user-list-view-table mt-4">
                                                        <div class="ks-full-table">
                                                            <table id="ks-datatable4" class="table ks-table-info dt-responsive nowrap" width="100%" data-pagination="false">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="9">List of full Administritive Expenses</th>
                                                                    </tr>
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
                                                                    <tr>
                                                                        <td>
                                                                            Beginning
                                                                        </td>
                                                                        <td>
                                                                            2015-2016 
                                                                        </td>
                                                                        <td>
                                                                            $90
                                                                        </td>
                                                                        <td>
                                                                            $120
                                                                        </td>
                                                                        <td>
                                                                            $160
                                                                        </td>
                                                                        <td class="table-action">
                                                                            <div class="dropdown">
                                                                                <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <span class="la la-ellipsis-v"></span>
                                                                                </a>
                                                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                                                    <a class="dropdown-item" href="#">
                                                                                        <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                                                    </a>
                                                                                    <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Renewal 1 
                                                                        </td>
                                                                        <td>
                                                                            2016-2017 
                                                                        </td>
                                                                        <td>
                                                                            $90
                                                                        </td>
                                                                        <td>
                                                                            $120
                                                                        </td>
                                                                        <td>
                                                                            $160
                                                                        </td>
                                                                        <td class="table-action">
                                                                            <div class="dropdown">
                                                                                <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <span class="la la-ellipsis-v"></span>
                                                                                </a>
                                                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                                                    <a class="dropdown-item" href="#">
                                                                                        <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                                                    </a>
                                                                                    <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="form-group mt-3">
                                                    <button type="submit" class="btn btn-success save-profile-btn">Save</button>
                                                    <button type="reset" class="btn btn-outline-secondary ks-light reset-profile-btn">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade p-0" id="pills-loans" role="tabpanel" aria-labelledby="pills-loans-tab">
                                        <div class="card panel">
                                            <h5 class="card-header">
                                                <span class="ks-text mt-2">Loans</span>
                                                <a href="#" class="btn btn-outline-primary ks-light ks-no-text save-profile-btn"><span class="la la-save ks-icon"></span></a>
                                            </h5>
                                            <div class="card-block">
                                                <a href="javascript:void(0);" type="btn" class="btn btn-outline-primary mt-4 btn-add-loan">Add Loan</a>

                                                <div class="card panel panel-default add-loan mt-4" style="display: none;">
                                                    <h5 class="card-header" style="font-size: 13px;">
                                                        Add Loan
                                                    </h5>
                                                    <div class="card-block">
                                                        <div class="row">
                                                            <div class="col-sm-6 col-xl-3">
                                                                <div class="form-group">
                                                                    <label for="" class="form-control-label">Employee Name</label>
                                                                    <input type="text" placeholder="Enter employee name" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-xl-3">
                                                                <div class="form-group">
                                                                    <label for="" class="form-control-label">Employee No.</label>
                                                                    <input type="text" placeholder="Enter employee no." class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-xl-3">
                                                                <div class="form-group">
                                                                    <label for="" class="form-control-label">Loan Reference</label>
                                                                    <input type="text" placeholder="Enter loan reference name" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-xl-3">
                                                                <div class="form-group">
                                                                    <label for="" class="form-control-label">Issue Date</label>
                                                                    <input type="text" placeholder="Select date" class="form-control ks-daterange-single">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-sm-6 col-xl-3">
                                                                <div class="form-group">
                                                                    <label for="" class="form-control-label">Loan Amount</label>
                                                                    <input type="text" placeholder="Enter loan amount" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-xl-3">
                                                                <div class="form-group">
                                                                    <label for="" class="form-control-label">Installment Start Date</label>
                                                                    <input type="text" placeholder="Select date" class="form-control ks-daterange-single">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-xl-3">
                                                                <div class="form-group">
                                                                    <label for="" class="form-control-label">Max Allowed Installment</label>
                                                                    <input type="text" placeholder="10% from Gross Salary" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-xl-3">
                                                                <div class="form-group">
                                                                    <label for="" class="form-control-label">Installment Amount</label>
                                                                    <input type="text" placeholder="Enter Installment amount" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="" class="form-control-label">Note</label>
                                                                    <textarea placeholder="Enter note" class="form-control " style="min-height: 60px; line-height: 20px;" ></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="btn" class="btn btn-success">Add</button>
                                                        <a href="javascript:void(0);" type="btn" class="btn btn-outline-secondary ks-light btn-add-loan-close ml-3">Close</a>
                                                    </div>
                                                </div>
                                                <div class="ks-user-list-view-table mt-4">
                                                    <div class="ks-full-table">
                                                        <table id="ks-datatable4" class="table ks-table-info dt-responsive nowrap" width="100%" data-pagination="false">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="10">Current Loan</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Employee<br>Name</th>
                                                                    <th>Employee<br>No.</th>
                                                                    <th>Reference</th>
                                                                    <th>Issue<br>Date</th>
                                                                    <th>Loan<br>Amount</th>
                                                                    <th>Installment<br>Start Date</th>
                                                                    <th>Max<br>Allowed Installment</th>
                                                                    <th>Installment<br>Amount</th>
                                                                    <th>Remarks</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        Amy Gonzales
                                                                    </td>
                                                                    <td>
                                                                        0A-124 
                                                                    </td>
                                                                    <td>
                                                                        Reference Name
                                                                    </td>
                                                                    <td>
                                                                        22/12/2017
                                                                    </td>
                                                                    <td>
                                                                        $5000
                                                                    </td>
                                                                    <td>
                                                                        01/01/2018
                                                                    </td>
                                                                    <td>
                                                                        $500
                                                                    </td>
                                                                    <td>
                                                                        $200
                                                                    </td>
                                                                    <td>
                                                                        Lorem ipsum dolor sit amet
                                                                    </td>
                                                                    <td class="table-action">
                                                                        <div class="dropdown">
                                                                            <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <span class="la la-ellipsis-v"></span>
                                                                            </a>
                                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                                                <a class="dropdown-item" href="#">
                                                                                    <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                                                </a>
                                                                                <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="form-group mt-3">
                                                    <button type="submit" class="btn btn-success save-profile-btn">Save</button>
                                                    <button type="reset" class="btn btn-outline-secondary ks-light reset-profile-btn">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade p-0" id="pills-warnings" role="tabpanel" aria-labelledby="pills-warnings-tab">
                                        <div class="card panel">
                                            <h5 class="card-header">
                                                <span class="ks-text mt-2">Warnings & Evaluation</span>
                                                <a href="#" class="btn btn-outline-primary ks-light ks-no-text save-profile-btn"><span class="la la-save ks-icon"></span></a>
                                            </h5>
                                            <div class="card-block">
                                                <a href="javascript:void(0);" type="btn" class="btn btn-outline-primary mt-4 ml-2 btn-add-warning1">Add New Superior Evaluation</a>
                                                <a href="javascript:void(0);" type="btn" class="btn btn-outline-primary mt-4 ml-2 btn-add-warning2">Add New Warning</a>
                                                <a href="javascript:void(0);" type="btn" class="btn btn-outline-primary mt-4 ml-2 btn-add-warning2">Add New Safety Warning</a>
                                                <a href="javascript:void(0);" type="btn" class="btn btn-outline-primary mt-4 ml-2 btn-add-warning2">Add New Complaint from Superior</a>

                                                <div class="card panel panel-default add-warning1 mt-4" style="display: none;">
                                                    <h5 class="card-header" style="font-size: 13px;">
                                                        Add New Superior Evaluation
                                                    </h5>
                                                    <div class="card-block">
                                                        <div class="row">
                                                            <div class="col-sm-6">
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
                                                                    <textarea placeholder="Enter note" class="form-control " style="min-height: 60px; line-height: 20px;" ></textarea>
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
                                                    <div class="ks-full-table">
                                                        <table id="ks-datatable4" class="table ks-table-info dt-responsive nowrap" width="100%" data-pagination="false">
                                                            <thead>
                                                                <tr>
                                                                    <th></th>
                                                                    <th>Date</th>
                                                                    <th>Remarks</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        Superior Evaluation
                                                                    </td>
                                                                    <td>
                                                                        22/05/18 
                                                                    </td>
                                                                    <td>
                                                                        Lorem ipsum dolor sit amet lorem ipsum dolor sit amet, lorem ipsum dolor sit amet.
                                                                    </td>
                                                                    <td class="table-action">
                                                                        <div class="dropdown">
                                                                            <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <span class="la la-ellipsis-v"></span>
                                                                            </a>
                                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                                                <a class="dropdown-item" href="#">
                                                                                    <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                                                </a>
                                                                                <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        Warning
                                                                    </td>
                                                                    <td>
                                                                        22/05/18 
                                                                    </td>
                                                                    <td>
                                                                        Lorem ipsum dolor sit amet lorem ipsum dolor sit amet, lorem ipsum dolor sit amet.
                                                                    </td>
                                                                    <td class="table-action">
                                                                        <div class="dropdown">
                                                                            <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <span class="la la-ellipsis-v"></span>
                                                                            </a>
                                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                                                <a class="dropdown-item" href="#">
                                                                                    <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                                                </a>
                                                                                <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        Safety Warning
                                                                    </td>
                                                                    <td>
                                                                        22/05/18 
                                                                    </td>
                                                                    <td>
                                                                        Lorem ipsum dolor sit amet lorem ipsum dolor sit amet, lorem ipsum dolor sit amet.
                                                                    </td>
                                                                    <td class="table-action">
                                                                        <div class="dropdown">
                                                                            <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <span class="la la-ellipsis-v"></span>
                                                                            </a>
                                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                                                <a class="dropdown-item" href="#">
                                                                                    <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                                                </a>
                                                                                <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        Complaint from Superior
                                                                    </td>
                                                                    <td>
                                                                        22/05/18 
                                                                    </td>
                                                                    <td>
                                                                        Lorem ipsum dolor sit amet lorem ipsum dolor sit amet, lorem ipsum dolor sit amet.
                                                                    </td>
                                                                    <td class="table-action">
                                                                        <div class="dropdown">
                                                                            <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <span class="la la-ellipsis-v"></span>
                                                                            </a>
                                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                                                <a class="dropdown-item" href="#">
                                                                                    <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                                                </a>
                                                                                <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="form-group mt-3">
                                                    <button type="submit" class="btn btn-success save-profile-btn">Save</button>
                                                    <button type="reset" class="btn btn-outline-secondary ks-light reset-profile-btn">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade p-0" id="pills-complaints" role="tabpanel" aria-labelledby="pills-complaints-tab">
                                        <div class="card panel">
                                            <h5 class="card-header">
                                                <span class="ks-text mt-2">Complaints</span>
                                                <a href="#" class="btn btn-outline-primary ks-light ks-no-text save-profile-btn"><span class="la la-save ks-icon"></span></a>
                                            </h5>
                                            <div class="card-block">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">Complaints from Company / Employee</label>
                                                            <select name="select" class="form-control " >
                                                                <option value="0">Please select</option>
                                                                <option value="1">Option #1</option>
                                                                <option value="2">Option #2</option>
                                                                <option value="3">Option #3</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">Ministry of Human Resources</label>
                                                            <select name="select" class="form-control " >
                                                                <option value="0">Please select</option>
                                                                <option value="1">Option #1</option>
                                                                <option value="2">Option #2</option>
                                                                <option value="3">Option #3</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">Court</label>
                                                            <select name="select" class="form-control " >
                                                                <option value="0">Please select</option>
                                                                <option value="1">Option #1</option>
                                                                <option value="2">Option #2</option>
                                                                <option value="3">Option #3</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="form-group mt-3">
                                                    <button type="submit" class="btn btn-success save-profile-btn">Save</button>
                                                    <button type="reset" class="btn btn-outline-secondary ks-light reset-profile-btn">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade p-0" id="pills-closure" role="tabpanel" aria-labelledby="pills-closure-tab">
                                        <div class="card panel">
                                            <h5 class="card-header">
                                                <span class="ks-text mt-2">Closure</span>
                                                <a href="#" class="btn btn-outline-primary ks-light ks-no-text save-profile-btn"><span class="la la-save ks-icon"></span></a>
                                            </h5>
                                            <div class="card-block">
                                                <h6 class="mt-2 mb-3">Resignation</h6>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">Upload Documents</label>
                                                            <div class="input-group">
                                                                <div class="custom-file replaceCustomFile">
                                                                    <input type="file" class="custom-file-input" id="inputGroupFile26">
                                                                    <label class="custom-file-label" for="inputGroupFile26">Upload file</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">Last Day of Work</label>
                                                            <input type="text" placeholder="Select date" class="form-control ks-daterange-single">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">Final Gratuity</label>
                                                            <input type="text" placeholder="Calculate" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="form-group mt-3">
                                                    <button type="submit" class="btn btn-success save-profile-btn">Save</button>
                                                    <button type="reset" class="btn btn-outline-secondary ks-light reset-profile-btn">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>