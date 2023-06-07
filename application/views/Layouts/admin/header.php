<?php date_default_timezone_set('Asia/Calcutta');  ?>
<nav class="navbar ks-navbar">
        <div href="#" class="navbar-brand">            
            <div class="ks-navbar-logo">               
                <?php $this->load->model('Adminauthmodel');
                      $logo=  $this->Adminauthmodel->georganizationdetails();
              ?>
                <img src="<?php echo base_url(); ?>uploads/<?php echo @$logo->image;?>" >                    
            </div>
            <span><?php echo @$logo->company_name;?></span>
        </div>
    <a href="#" class="ks-sidebar-toggle"><i class="ks-icon la la-bars" aria-hidden="true"></i></a>
    <a href="#" class="ks-sidebar-mobile-toggle"><i class="ks-icon la la-bars" aria-hidden="true"></i></a>
        <div class="ks-wrapper">
            <nav class="nav navbar-nav">
                <div class="ks-navbar-menu">                    
                </div>
                <div class="ks-navbar-actions">
                    <div class="nav-item toggleRightbar">
                        <a class="nav-link" href="javascript:;"><i class="la la-cog"></i></a>
                    </div>
                    <!-- BEGIN NAVBAR USER -->
                    <div class="nav-item dropdown ks-user header_right">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="ks-avatar">
                             <?php                   
                                if($this->session->userdata('type')=='management')
                                {
                                    ?>
									<?php if(@$this->session->userdata('futureAdmin')->detail->image != ''){ ?>
                                <img src="<?php echo base_url(); ?>uploads/<?php echo @$this->session->userdata('futureAdmin')->detail->image; ?>" alt="">
									<?php } else {  ?>
									<img src="<?php echo base_url(); ?>assets/img/avatars/placeholders/ava-128.png" alt="">
									<?php } ?>
                                <?php
                                }
                                else{
                                ?>
                                <img src="<?php echo base_url(); ?>uploads/<?php echo @$this->session->userdata('futureAdmin')->detail->personal_image; ?>" alt="">
                                <?php
                                }
                                ?>                                    
                            </span>
                            <span class="heade-right-coname"><?php echo @$this->session->userdata('futureAdmin')->detail->name.' '.@$this->session->userdata('futureAdmin')->detail->family_name;?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Preview">
                            <a class="dropdown-item pjaxCls" href="<?php echo base_url('page/1'); ?>">
                                <span class="la la-user ks-icon"></span>
                                <span>Change Password</span>
                            </a>  
                            <a class="dropdown-item" href="<?php echo base_url('logout'); ?>">
                                <span class="la la-sign-out ks-icon" aria-hidden="true"></span>
                                <span>Logout</span>
                            </a>
                        </div>
                    </div>
                </div>
            </nav>

<!--            <nav class="nav navbar-nav ks-navbar-actions-toggle">
                <a class="nav-item nav-link" href="#">
                    <span class="la la-ellipsis-h ks-icon ks-open"></span>
                    <span class="la la-close ks-icon ks-close"></span>
                </a>
            </nav>-->
<!--            <nav class="nav navbar-nav ks-navbar-menu-toggle">
                <a class="nav-item nav-link" href="#">
                    <span class="la la-th ks-icon ks-open"></span>
                    <span class="la la-close ks-icon ks-close"></span>
                </a>
            </nav>-->
        </div>
    </nav>
