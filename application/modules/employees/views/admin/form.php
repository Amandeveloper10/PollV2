<form onsubmit="return myFunction('employees')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_employees').'/'.$id : base_url('admin_add_employees'); ?>" name="employees" id="employees" enctype="multipart/form-data" >

<h4>Personal details</h4>

<div class="row">

    <div class="col-md-4">
        <div class="form-group">
            <label>First Name</label>
            <input required type="text" class="form-control" id="first_name"  name="first_name" value="<?php echo (isset($data_single->first_name) ? $data_single->first_name : ''); ?>">
        </div>        
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>Middle Name</label>
            <input type="text" class="form-control" id="middle_name"  name="middle_name" value="<?php echo (isset($data_single->middle_name) ? $data_single->middle_name : ''); ?>">
        </div>        
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" class="form-control" id="last_name"  name="last_name" value="<?php echo (isset($data_single->last_name) ? $data_single->last_name : ''); ?>">
        </div>        
    </div>

    
    <div class="col-md-4">
        <div class="form-group">
            <label>PAN Number</label>
            <input type="text" class="form-control" id="pan_no"  name="pan_no" value="<?php echo (isset($data_single->pan_no) ? $data_single->pan_no : ''); ?>">
        </div>        
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>Upload PAN Card Image</label>
            <input onchange="readURLEmployees(this,'employees','pan_no_img')" type="file" class="form-control" id="pan_no_img"  name="pan_no_img" >
            <input type="hidden" id="new_pan_no_img"  name="new_pan_no_img" value="" >
        </div>        
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <img id="blah_pan_no_img" width="100px;" height="100px;" src="<?php echo base_url(); ?>assets/img/images.png">
        </div>        
    </div>






    <div class="col-md-4">
        <div class="form-group">
            <label>Aadhar Number</label>
            <input type="text" class="form-control" id="aadhar_no"  name="aadhar_no" value="<?php echo (isset($data_single->aadhar_no) ? $data_single->aadhar_no : ''); ?>">
        </div>        
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>Upload Aadhar Image</label>
            <input onchange="readURLEmployees(this,'employees','aadhar_no_img')" type="file" class="form-control" id="aadhar_no_img"  name="aadhar_no_img" >
            <input type="hidden" id="new_aadhar_no_img"  name="new_aadhar_no_img" value="" >
        </div>        
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <img id="blah_aadhar_no_img" width="100px;" height="100px;" src="<?php echo base_url(); ?>assets/img/images.png">
        </div>        
    </div>
   
   

    <div class="col-md-4">
        <div class="form-group">
            <label>Passport No</label>
            <input type="text" class="form-control" id="passport_no"  name="passport_no" value="<?php echo (isset($data_single->passport_no) ? $data_single->passport_no : ''); ?>">
        </div>        
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>Upload Passport Image</label>
             <input onchange="readURLEmployees(this,'employees','passport_no_img')" type="file" class="form-control" id="passport_no_img"  name="passport_no_img" >
            <input type="hidden" id="new_passport_no_img"  name="new_passport_no_img" value="" >
        </div>        
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <img id="blah_passport_no_img" width="100px;" height="100px;" src="<?php echo base_url(); ?>assets/img/images.png">
        </div>        
    </div>





    <div class="col-md-4">
        <div class="form-group">
            <label>Voter Card Number</label>
            <input type="text" class="form-control" id="voter_no"  name="voter_no" value="<?php echo (isset($data_single->voter_no) ? $data_single->voter_no : ''); ?>">
        </div>        
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>Upload Voter Card Image</label>
             <input onchange="readURLEmployees(this,'employees','voter_no_img')" type="file" class="form-control" id="voter_no_img"  name="voter_no_img" >
            <input type="hidden" id="new_voter_no_img"  name="new_voter_no_img" value="" >
        </div>        
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <img id="blah_voter_no_img" width="100px;" height="100px;" src="<?php echo base_url(); ?>assets/img/images.png">
        </div>        
    </div>



    <div class="col-md-4">
        <div class="form-group">
            <label>Driving licence Number</label>
            <input type="text" class="form-control" id="driving_no"  name="driving_no" value="<?php echo (isset($data_single->driving_no) ? $data_single->driving_no : ''); ?>">
        </div>        
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>Upload Driving licence Image</label>
            <input onchange="readURLEmployees(this,'employees','driving_no_img')" type="file" class="form-control" id="driving_no_img"  name="driving_no_img" >
            <input type="hidden" id="new_driving_no_img"  name="new_driving_no_img" value="" >

        </div>        
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <img id="blah_driving_no_img" width="100px;" height="100px;" src="<?php echo base_url(); ?>assets/img/images.png">
        </div>        
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>Ration card Number</label>
            <input type="text" class="form-control" id="ration_no"  name="ration_no" value="<?php echo (isset($data_single->ration_no) ? $data_single->ration_no : ''); ?>">
        </div>        
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>Upload Ration card Image</label>
            <input onchange="readURLEmployees(this,'employees','ration_no_img')" type="file" class="form-control" id="ration_no_img"  name="ration_no_img" >
            <input type="hidden" id="new_ration_no_img"  name="new_ration_no_img" value="" >
        </div>        
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <img id="blah_ration_no_img" width="100px;" height="100px;" src="<?php echo base_url(); ?>assets/img/images.png">
        </div>        
    </div>



    </div>

 <hr>



 <div class="row">

    <div class="col-md-4">
        <div class="form-group">
            <label>Gender</label>
             <select class="form-control"  name="gender" required>
                <option value="">Select</option>
                <option value="Male" <?php echo ((isset($data_single->gender) && ($data_single->gender=='Male')) ? 'selected' : ''); ?>>Male</option>
                <option value="Female" <?php echo ((isset($data_single->gender) && ($data_single->gender=='Female')) ? 'selected' : ''); ?>>Female</option>
                <option value="Other" <?php echo ((isset($data_single->gender) && ($data_single->gender=='Other')) ? 'selected' : ''); ?>>Other</option>
              </select> 
        </div>        
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>Marital Status</label>
             <select class="form-control"  name="marital_status" required>
                <option value="">Select</option> 
                <option value="Married" <?php echo ((isset($data_single->marital_status) && ($data_single->marital_status=='Married')) ? 'selected' : ''); ?>>Married</option>
                <option value="Single" <?php echo ((isset($data_single->marital_status) && ($data_single->marital_status=='Single')) ? 'selected' : ''); ?>>Single</option>
                <option value="Divorced" <?php echo ((isset($data_single->marital_status) && ($data_single->marital_status=='Divorced')) ? 'selected' : ''); ?>>Divorced</option>
                <option value="Widowed" <?php echo ((isset($data_single->marital_status) && ($data_single->marital_status=='Widowed')) ? 'selected' : ''); ?>>Widowed</option>

              </select> 
        </div>        
    </div>

     <div class="col-md-4">
        <div class="form-group">
            <label>Nationality</label>
            <input required type="text" class="form-control" id="nationality"  name="nationality" value="<?php echo (isset($data_single->nationality) ? $data_single->nationality : ''); ?>">
        </div>        
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>Date of Birth</label>
            <input required type="text" class="form-control flatpickrDate" id="dob"  name="dob" value="<?php echo (isset($data_single->dob) ? $data_single->dob : ''); ?>">
        </div>        
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>Date of Marriage</label>
            <input type="text" class="form-control flatpickrDate" id="dom"  name="dom" value="<?php echo (isset($data_single->dom) ? $data_single->dom : ''); ?>">
        </div>        
    </div>



</div>


<div class="emergency_contact clearfix">
    <h4>Emergency Contact</h4>
    <div class="row">

        <div class="col-md-3">
            <div class="form-group">
                <label>Name</label>
            </div>        
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>Relation</label>
            </div>        
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label>Phone</label>
            </div>        
        </div>


        <div class="col-md-2">
            <div class="form-group">
                <label>Mobile</label>
            </div>        
        </div>


        <div class="col-md-2">
            <div class="form-group">
                <label>E-mail</label>               
            </div>        
        </div>


    </div>

    

    <div class="row" id="con_1">

        <div class="col-md-3">
            <div class="form-group">
                <input type="text" class="form-control" name="contact_name[]" value="">
            </div>        
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <input type="text" class="form-control" name="contact_relation[]" value="">
            </div>        
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control" name="contact_phone[]" value="">
            </div>        
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control" name="contact_mobile[]" value="">
            </div>        
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control" name="contact_email[]" value="">
            </div>        
        </div>        


    </div>



    <div class="row" id="con_2">

        <div class="col-md-3">
            <div class="form-group">
                <input type="text" class="form-control" name="contact_name[]" value="">
            </div>        
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <input type="text" class="form-control" name="contact_relation[]" value="">
            </div>        
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control" name="contact_phone[]" value="">
            </div>        
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control" name="contact_mobile[]" value="">
            </div>        
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control" name="contact_email[]" value="">
            </div>        
        </div>        


    </div>


     <div class="row" id="con_3">

        <div class="col-md-3">
            <div class="form-group">
                <input type="text" class="form-control" name="contact_name[]" value="">
            </div>        
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <input type="text" class="form-control" name="contact_relation[]" value="">
            </div>        
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control" name="contact_phone[]" value="">
            </div>        
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control" name="contact_mobile[]" value="">
            </div>        
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control" name="contact_email[]" value="">
            </div>        
        </div>        


    </div>


    </div>




<h4>Contact details</h4>
    <div class="row">

    <div class="col-md-12">
        <div class="form-group">
            <label>Address</label>
            <textarea class="form-control" id="address"  name="address"><?php echo (isset($data_single->address) ? $data_single->address : ''); ?></textarea>
        </div>        
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>State</label>
            <input type="text" class="form-control" id="state"  name="state" value="<?php echo (isset($data_single->state) ? $data_single->state : ''); ?>">
        </div>        
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>City</label>
            <input type="text" class="form-control" id="city"  name="city" value="<?php echo (isset($data_single->city) ? $data_single->city : ''); ?>">
        </div>        
    </div>


    <div class="col-md-4">
        <div class="form-group">
            <label>Pin</label>
            <input type="text" class="form-control" id="pin"  name="pin" value="<?php echo (isset($data_single->pin) ? $data_single->pin : ''); ?>">
        </div>        
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>Country</label>
            <input type="text" class="form-control" id="country"  name="country" value="<?php echo (isset($data_single->country) ? $data_single->country : ''); ?>">
        </div>        
    </div>


    <div class="col-md-8">
        <div class="form-group">
            <label>E-mail (Personal)</label>
            <input type="email" class="form-control" id="email_personal"  name="email_personal" value="<?php echo (isset($data_single->email_personal) ? $data_single->email_personal : ''); ?>">
        </div>        
    </div>


    <div class="col-md-4">
        <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" id="phone"  name="phone" value="<?php echo (isset($data_single->phone) ? $data_single->phone : ''); ?>">
        </div>        
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>Mobile 1</label>
            <input type="text" class="form-control" id="mobile_1"  name="mobile_1" value="<?php echo (isset($data_single->mobile_1) ? $data_single->mobile_1 : ''); ?>">
        </div>        
    </div>


    <div class="col-md-4">
        <div class="form-group">
            <label>Mobile 2</label>
            <input type="text" class="form-control" id="mobile_2"  name="mobile_2" value="<?php echo (isset($data_single->mobile_2) ? $data_single->mobile_2 : ''); ?>">
        </div>        
    </div>


    </div>

<hr>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Employee code</label>
                <input type="text" class="form-control" id="employee_code"  name="employee_code" value="<?php echo (isset($data_single->employee_code) ? $data_single->employee_code : ''); ?>">
            </div>        
        </div>

        <div class="col-md-8">
            <div class="form-group">
                <label>E-mail (Work)</label>
                <input type="email" class="form-control" id="email_work"  name="email_work" value="<?php echo (isset($data_single->email_work) ? $data_single->email_work : ''); ?>">
            </div>        
        </div>



        <div class="col-md-2">
            <div class="form-group">
                <label>Grade</label>
                <input type="text" class="form-control" id="grade"  name="grade" value="<?php echo (isset($data_single->grade) ? $data_single->grade : ''); ?>">
            </div>        
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>Designation</label>
                <input type="text" class="form-control" id="designation"  name="designation" value="<?php echo (isset($data_single->designation) ? $data_single->designation : ''); ?>">
            </div>        
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>Department</label>
                <input type="text" class="form-control" id="department"  name="department" value="<?php echo (isset($data_single->department) ? $data_single->department : ''); ?>">
            </div>        
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label>Status</label>
                <input type="text" class="form-control" id="status"  name="status" value="<?php echo (isset($data_single->status) ? $data_single->status : ''); ?>">
            </div>        
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label>Location</label>
                <input type="text" class="form-control" id="location"  name="location" value="<?php echo (isset($data_single->location) ? $data_single->location : ''); ?>">
            </div>        
        </div>


         <div class="col-md-3">
            <div class="form-group">
                <label>Report to</label>
                <input type="text" class="form-control" id="report_to"  name="report_to" value="<?php echo (isset($data_single->report_to) ? $data_single->report_to : ''); ?>">
            </div>        
        </div>


        <div class="col-md-3">
            <div class="form-group">
                <label>Joining date</label>
                <input type="text" class="form-control flatpickrDate" id="joining_date"  name="joining_date" value="<?php echo (isset($data_single->joining_date) ? $data_single->joining_date : ''); ?>">
            </div>        
        </div>


        <div class="col-md-3">
            <div class="form-group">
                <label>Confirmation date</label>
                <input type="text" class="form-control flatpickrDate" id="confirmation_date"  name="confirmation_date" value="<?php echo (isset($data_single->confirmation_date) ? $data_single->confirmation_date : ''); ?>">
            </div>        
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>Probation period</label>
                <input type="text" class="form-control" id="probation_period"  name="probation_period" value="<?php echo (isset($data_single->probation_period) ? $data_single->probation_period : ''); ?>">
            </div>        
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>Contract start date</label>
                <input type="text" class="form-control flatpickrDate" id="contract_start_date"  name="contract_start_date" value="<?php echo (isset($data_single->contract_start_date) ? $data_single->contract_start_date : ''); ?>">
            </div>        
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>Contract end date</label>
                <input type="text" class="form-control flatpickrDate" id="contract_end_date"  name="contract_end_date" value="<?php echo (isset($data_single->contract_end_date) ? $data_single->contract_end_date : ''); ?>">
            </div>        
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>Notice period</label>
                <input type="text" class="form-control" id="notice_period"  name="notice_period" value="<?php echo (isset($data_single->notice_period) ? $data_single->notice_period : ''); ?>">
            </div>        
        </div>


    </div>

   


<div class="row">

    <div class="col-md-12">
    <div class="form-group text-right">
         
         <button type="submit" name="submit" class="btn btn-dark">Save</button>
    </div>
    </div>
</div>
<hr>
</form>