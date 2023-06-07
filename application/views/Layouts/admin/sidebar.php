 <link rel='manifest' href='<?php echo base_url(); ?>manifest.json'>
 <?php
$this->load->model('Adminauthmodel');
if($this->session->userdata('futureAdmin')->detail->id!=1)
{
	$user_menu_array = explode(",", $this->session->userdata('futureAdmin')->detail->menu);
	$mainactiveMenu= $this->Adminauthmodel->getmainactiveMenuuserwise($user_menu_array);
	//print_r($mainactiveMenu); die;
}else{
	
	$mainactiveMenu= $this->Adminauthmodel->getmainactiveMenu();
}


?>

<?php 
if($this->session->userdata('futureAdmin')->detail->id!=1)
{
	
?>
 
<div class="ks-column ks-sidebar ks-primary">
            <div class="ks-wrapper ks-sidebar-wrapper">
                <div class="menu-bg-blue"></div>
                <ul class="nav nav-pills nav-stacked">
                   
                    
                              <!--new side menu -->
<?php 
if(!empty($mainactiveMenu)){
  foreach($mainactiveMenu as $value){
      $allactiveMenu= $this->Adminauthmodel->getallactiveMenu($value->id);
      if(!empty($allactiveMenu)){ ?>
        <li class="nav-item dropdown">
            <a class="nav-link pjaxCls <?php if($this->uri->segment(1)==$value->routes_function){ ?> ks-active <?php } ?> dropdown-toggle"  href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <?php echo @$value->icon;?>
                <span class="menu-item"><?php echo $value->name;?></span>
            </a>
            <?php if(!empty($allactiveMenu)){
                    foreach($allactiveMenu as $valuechild){
                      $allactiveSubMenu = $this->Adminauthmodel->getallactiveMenu($valuechild->id);
                      if(!empty($allactiveSubMenu)){ ?>
                        <div class="dropdown-menu">
                            <div class="nav-item dropdown level3">
                                <a class="nav-link pjaxCls <?php if($this->uri->segment(1)==$valuechild->routes_function){ ?> ks-active <?php } ?> dropdown-toggle"  href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="menu-item"><?php echo $valuechild->name;?></span>
                                </a>
                                <?php if(!empty($allactiveSubMenu)){
                                foreach ($allactiveSubMenu as $valuesubchild) {
									
                                ?>
                                  <div class="dropdown-menu">
                                      <a class="dropdown-item pjaxCls" href="<?php echo base_url('page/'.@$valuesubchild->page_no); ?>" target="_blank"><?php echo $valuesubchild->name;?></a>
                                  </div>
                                <?php 
                               
								}								
                              }
                            ?>
                            </div>
                        </div>
                      <?php }else{ if (in_array($valuechild->id, $user_menu_array)){ ?>
                        <div class="dropdown-menu">
                            <a class="dropdown-item pjaxCls" href="<?php echo base_url('page/'.@$valuechild->page_no); ?>"><?php echo $valuechild->name;?></a>
                        </div>
                      <?php
					  }
                       }
                    }
                  }
                  ?>
        </li>
      <?php }else{ ?>
         <li class="nav-item">
            <a class="nav-link pjaxCls" <?php if(!empty($value->routes_function)){ ?> href="<?php echo base_url('page/'.@$value->page_no); ?>" <?php }else{ ?> href="javascript:void(0)" <?php } ?> role="button" aria-haspopup="true" aria-expanded="false">
                <?php echo @$value->icon;?>
                <span class="menu-item"><?php echo $value->name;?></span>
            </a>
        </li>
<?php 
    }
  }
}
?>



<!-- end sidemenu -->  
              
                </ul>
            </div>
        </div>





<?php
}
else{
?>
<?php
                $this->load->model('Adminauthmodel');
              $logo=  $this->Adminauthmodel->georganizationdetails();
                ?>


<div class="ks-column ks-sidebar ks-primary">
            <div class="ks-wrapper ks-sidebar-wrapper">
                <div class="menu-bg-blue"></div>
                <ul class="nav nav-pills nav-stacked">
                   
                    
                              <!--new side menu -->
<?php 
if(!empty($mainactiveMenu)){
  foreach($mainactiveMenu as $value){
      $allactiveMenu= $this->Adminauthmodel->getallactiveMenu($value->id);
      if(!empty($allactiveMenu)){ ?>
        <li class="nav-item dropdown">
            <a class="nav-link pjaxCls <?php if($this->uri->segment(1)==$value->routes_function){ ?> ks-active <?php } ?> dropdown-toggle"  href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <?php echo @$value->icon;?>
                <span class="menu-item"><?php echo $value->name;?></span>
            </a>
            <?php if(!empty($allactiveMenu)){
                    foreach($allactiveMenu as $valuechild){
                      $allactiveSubMenu = $this->Adminauthmodel->getallactiveMenu($valuechild->id);
                      if(!empty($allactiveSubMenu)){ ?>
                        <div class="dropdown-menu">
                            <div class="nav-item dropdown level3">
                                <a class="nav-link pjaxCls <?php if($this->uri->segment(1)==$valuechild->routes_function){ ?> ks-active <?php } ?> dropdown-toggle"  href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="menu-item"><?php echo $valuechild->name;?></span>
                                </a>
                                <?php if(!empty($allactiveSubMenu)){
                                foreach ($allactiveSubMenu as $valuesubchild) {
                                ?>
                                  <div class="dropdown-menu">
                                      <a class="dropdown-item pjaxCls" href="<?php echo base_url('page/'.@$valuesubchild->page_no); ?>" target="_blank"><?php echo $valuesubchild->name;?></a>
                                  </div>
                                <?php 
                                }   
                              }
                            ?>
                            </div>
                        </div>
                      <?php }else{ ?>
                        <div class="dropdown-menu">
                            <a class="dropdown-item pjaxCls" href="<?php echo base_url('page/'.@$valuechild->page_no); ?>"><?php echo $valuechild->name;?></a>
                        </div>
                      <?php
                       }
                    }
                  }
                  ?>
        </li>
      <?php }else{ ?>
         <li class="nav-item">
            <a class="nav-link pjaxCls" <?php if(!empty($value->routes_function)){ ?> href="<?php echo base_url('page/'.@$value->page_no); ?>" <?php }else{ ?> href="javascript:void(0)" <?php } ?> role="button" aria-haspopup="true" aria-expanded="false">
                <?php echo @$value->icon;?>
                <span class="menu-item"><?php echo $value->name;?></span>
            </a>
        </li>
<?php 
    }
  }
}
?>



<!-- end sidemenu -->  
              
                </ul>
            </div>
        </div>
<?php
}
?>