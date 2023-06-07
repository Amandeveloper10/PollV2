  <div class="">
        <div class="ks-page-header">
            <section class="ks-title">
                <h3>Change Password</h3>
            </section>
        </div>

        <div class="ks-page-content">
            <div class="ks-page-content-body ks-content-nav">
                <div class="ks-nav-body">
                    <div class="ks-nav-body-wrapper">
                        <div class="container-fluid">                           
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card panel">
                                        <div class="card-block">
                                            <form onsubmit="return myFunction1('password_form')"  method="post" action="<?php echo base_url('save_change_password'); ?>" name="password_form" id="password_form">
                                                <div class="form-group">
                                                    <label>Old Password</label>
                                                    <input required onkeyup="checkOldPassword(this.value);" onblur="checkOldPassword(this.value);" type="password" class="form-control" placeholder="Enter Old Password" name="old_password" value="">
                                                    <?php echo form_error('old_password', '<div style="color:red;">', '</div>'); ?>
                                                <span class="old_password_err" style="color: red;"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label>New Password</label>
                                                    <input required type="password" class="form-control" placeholder="Enter New Password" name="new_password" value="">
                                                    <?php echo form_error('new_password', '<div style="color:red;">', '</div>'); ?>

                                                    <!-- <small class="form-text text-muted">Please note: The password must contain numbers, letters, and at least 6 characters total.</small> -->
                                                </div>
                                                <div class="form-group">
                                                    <label>Confirm Password</label>
                                                    <input required type="password" class="form-control" placeholder="Enter Confirm Password" name="confirm_password" value="">
                                                    <?php echo form_error('confirm_password', '<div style="color:red;">', '</div>'); ?>
                                                <span class="confirm_password_err" style="color: red;"></span>
                                                </div>
                                                <div class="form-group">
                                                    <!-- <button type="button" class="btn btn-secondary">Cancel</button> -->
                                                    <button type="submit" name="submit" class="btn btn-primary save">Change Password</button>
                                                    <a onclick="history.back();" class="btn btn-primary save">Back</a>
                                                </div>
                                            </form>
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

<script type="text/javascript">
function checkOldPassword(PassVal){
    $(".old_password_err").html('');
    $(".save").attr('disabled',false); 
    $.post("<?php echo base_url('check_old_password'); ?>", {passVal: PassVal}, function(result){
        console.log(result); 
		  // notification('success');  
           if(result!=''){
            $(".old_password_err").html(result);
            $(".save").attr('disabled',true); 
           }           

    });
}
</script>