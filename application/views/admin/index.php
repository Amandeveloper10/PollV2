<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payroll</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- BEGIN GLOBAL MANDATORY STYLES -->

     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>	
	 <link rel='manifest' href='<?php echo base_url(); ?>manifest.json'>
     <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">     
    <link href='https://unpkg.com/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/styles/common.css">    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/noty.css"> 
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custom-ap.css">    
</head>
<!-- END HEAD --> 

<body class="page-login-registration">
        <div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-12">
                    <div class="login_wrapper">
                        
                    <div class="login_sectn">
                        <div class="login_logo">
                            <div class="row">
                                <div class="col-12">
                                    <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="" class="mx-auto d-block">
                                </div>
                            </div>
                        </div>
                        <p>Please login to your Account</p>
                        <form class="form-container" method="post" action="<?php echo base_url('admin'); ?>">
                            
                            <!--<div class="form-group">
                                <label>Select User Type</label>
                                <select class="form-control" name="type" id="type">
                                <option value="management">Management</option>
                                <option value="employee">Employee</option>
                                </select>
                                <?php echo form_error('type', '<div class="alert">', '</div>'); ?>
                            </div>-->
                            <input type="hidden" class="form-control" placeholder="" value="management" name="type" id="type">
                            <div class="form-group">          
                                <i class='bx bx-envelope' ></i>
                                <span class="has-float-label">                                    
                                  <input type="text" class="form-control" placeholder="" name="emailid" id="emailid">
                                  <label for="emailid">Email Id</label>                                  
                                </span>
                                <?php echo form_error('emailid', '<div class="validation danger">', '</div>'); ?>
                            </div>
                            <div class="form-group">          
                                <i class='bx bxs-key' ></i>                                
                                <span class="has-float-label">                                    
                                    <input type="password" class="form-control" placeholder="" name="password" id="password">                    
                                  <label for="password">Password</label>                                  
                                </span>
                                <?php echo form_error('password', '<div class="validation danger">', '</div>'); ?>
                                <a class="forgot_pass" href="" title="Lost password? Click to get assistance" data-toggle="tooltip"><i class='bx bx-info-circle'></i></a>
                            </div>
                            <div class="form-group m-0 text-right">
                                <button type="submit" name="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div> 
    
      <!-- BEGIN PAGE LEVEL PLUGINS -->

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!--    <script src="<?php echo base_url(); ?>assets/js/jquery.jscrollpane.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.mousewheel.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/flexibility.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/noty.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/velocity.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/common.min.js"></script>-->



    <script type="application/javascript">

       (function ($) {
            $(document).ready(function() {              
                //// notification ////

        <?php if ($this->session->flashdata('successmessage')) { ?>
        setTimeout(function () {
            new Noty({
                text: '<strong>Success!</strong> <?php echo $this->session->flashdata('successmessage'); ?>.',
                type   : 'success',
                theme  : 'mint',
                layout : 'topCenter',
                timeout: 2000
            }).show();
        }, 1500);
    <?php } ?>

    <?php if ($this->session->flashdata('errormessage')) { ?>
        setTimeout(function () {
            new Noty({
                text: '<strong>Error!</strong> <?php echo $this->session->flashdata('errormessage'); ?>.',
                type   : 'error',
                theme  : 'mint',
                layout : 'topCenter',
                timeout: 2000
            }).show();
        }, 1500);
    <?php } ?>
     //// end notification ////
            });
        })(jQuery);
    </script>
<script>
 if (!navigator.serviceWorker.controller) {
     navigator.serviceWorker.register("/pwabuilder-sw.js").then(function(reg) {
         console.log("Service worker has been registered for scope: " + reg.scope);
     });
 }
</script>
</body>
</html>