<form onsubmit="return myFunction('admin_settings')" autocomplete="off" method="post" autocomplete="off" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_admin_settings').'/'.$id : base_url('admin_add_admin_settings'); ?>" name="admin_settings" id="admin_settings" enctype="multipart/form-data" > 

<!--    <div class="row">
        <div class="col-12">
            <div class="ks-manage-avatar ks-group mt-3 mb-5">
                <?php if(isset($data_single->image) && $data_single->image!=''){ ?>
                <img id="blah" class="ks-avatar" width="100px;" height="100px;" src="<?php echo base_url(); ?>uploads/<?php echo (isset($data_single->image) && $data_single->image != '') ? $data_single->image : ''; ?>">
             <?php }else{ ?>
                <img id="blah" class="ks-avatar" src="<?php echo base_url(); ?>assets/img/avatars/placeholders/ava-128.png" width="100" height="100">
            <?php  } ?>
                <div class="ks-manage-avatar-body ml-3">
                    <div class="ks-manage-avatar-body-header">Admin Avatar</div>
                    <div class="ks-manage-avatar-body-description mb-2">
                        A square image 100x100px is recommended
                    </div>
                    <div class="ks-manage-avatar-body-controls">
                      <label class="btn btn-primary ks-btn-file">
                        <span class="la la-cloud-upload ks-icon"></span>
                        <span class="ks-text">Select Profile Image</span>
                        <input onchange="readURL(this,'admin_settings')" type="file" name="image">
                    </label>
                      <input type="hidden" name="imagenew" id="imagenew" value="">        
                            <input type="hidden" name="imageold" value="<?php echo (isset($data_single->image) ? $data_single->image : ''); ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    
    <div class="row">
        <div class="col-sm-6 col-xl-3 profile_summary">                        
            <div class="ks-manage-avatar avatar-emp-profile"> 
                    <?php if(isset($data_single->image) && $data_single->image!=''){ ?>
                    <img id="blah" src="<?php echo base_url(); ?>uploads/<?php echo (isset($data_single->image) && $data_single->image != '') ? $data_single->image : ''; ?>" class="img-fluid"> 
                <?php } else{ ?>
                    <img id="blah" src="<?php echo base_url(); ?>assets/img/avatars/placeholders/ava-128.png" class="img-fluid"> 
                <?php } ?>
                    <label class="btn btn-primary ks-btn-file">
                            <span class="la la-image ks-icon"></span>                    
                            <input onchange="readURLprofile(this, 'admin_settings')" type="file" name="image" id="image">
                    </label>
                    <input type="hidden" name="imagenew" id="imagenew" value="">        
                    <input type="hidden" name="imageold" value="<?php echo (isset($data_single->image) ? $data_single->image : ''); ?>">
                    </div>                
            <div class="employee-avatar new d-none">
            <div class="profile-img">        
            </div>
        </div>
    </div>
        
        <div class="col-sm-6 col-xl-3">
            <div class="form-group">
                <label for="" class="form-control-label">First Name</label>
                <input type="text" placeholder="Enter first name" onkeyup="only_charecter(this);" class="form-control" maxlength="15" name="first_name" value="<?php echo (isset($data_single->name) ? $data_single->name : ''); ?>" required>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="form-group">
                <label for="" class="form-control-label">Last Name</label>
                <input type="text" placeholder="Enter Last name"  onkeyup="only_charecter(this);" class="form-control"  maxlength="15"  name="family_name" value="<?php echo (isset($data_single->family_name) ? $data_single->family_name : ''); ?>" required>
            </div>
        </div>
    <div class="col-sm-6 col-xl-3">
            <div class="form-group">
                <label for="" class="form-control-label">Email</label>
                <input type="email" autocomplete="off" placeholder="Enter email" class="form-control" name="email" value="<?php echo (isset($data_single->emailid) ? $data_single->emailid : ''); ?>" required>
            </div>
        </div>
        <!--<div class="col-sm-6 col-xl-3">
            <div class="form-group">
                <label for="" class="form-control-label">Position</label>                
                <select name="position" class="form-control" >
                    <option value="">Please select</option>
                    <?php
                  if (!empty($all_designation)) {
                    foreach ($all_designation as $position) {
                  ?>
                  <option value="<?php echo $position->id; ?>" <?php echo ((isset($data_single->position) && ($data_single->position==$position->id)) ? 'selected' : ''); ?>><?php echo $position->designation_name; ?></option>
                  <?php } } ?> 
                </select>
            </div>
        </div>-->
        
    
    
        <div class="col-sm-6 col-xl-3">
            <div class="form-group">
                <label for="" class="form-control-label">Password</label>
                <input type="password" name="password" <?php if(isset($data_single->password)){ echo '';} else { echo 'required'; }?>  autocomplete="off" id="password" placeholder="Enter password" class="form-control" onkeyup="checkmainpassword();">

                <?php if(isset($data_single->password)){ ?><span style="color:red;">*<small> Leave it blank if don't want to change</small></span><?php } ?>

            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="form-group">
                <label for="" class="form-control-label">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Enter confirm password" class="form-control" onkeyup="checkpassword();">
            </div>
        </div>

            <div class="col-sm-6 col-xl-3 align-self-center">                
                   <div class="form-group">                   
                       <div class="custom-control custom-checkbox">                        
                        <input type="checkbox"  <?php if(!empty($data_single->menu)) {  ?> checked <?php } ?> class="custom-control-input"  onclick="add_user_permission()" id="permissionCheck"> 
                        <?php if(( isset($data_single->id) && (@$data_single->id==$this->session->userdata('futureAdmin')->uid) ) || @$data_single->id==1 ) { ?>
                        <label class="custom-control-label" for="permissionCheck">View User Permission</label>
                        <?php }else{ ?> 
                        <label class="custom-control-label" for="permissionCheck">Manage User Permission </label>
                        <?php } ?>
                      </div>
                    </div>                           
                  </div><!-- end row -->
         <!-- </div> --> <!-- end row -->                       
	<!-- NOT And Coin -->
	<div class="modal" id="amountModal">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <!-- Modal Header -->
	      <div class="modal-header">
	        <h4 class="modal-title" id="amount_notification_heading"></h4>
	        <button type="button" class="close" data-dismiss="modal" onclick="close_modal()">&times;</button>
	      </div>
	      <!-- Modal body -->
	      <div class="modal-body" >
	         <div id="rakutenproduct" class="form-group row">
	                    <!-- <label for="Message body" class="col-xs-2 col-form-label">Select Module</label> -->
	                    <div>
	                    <div class="col-xs-8">                        
	                    <?php
	                    //$namenew=array();
	                    if(!empty($data_single->menu)){
	                    	$namenew=  explode(',', @$data_single->menu);
	                    }else
                               {
	                    	$namenew='';   
	                        }
	                    foreach ($all_parent_menu as $value) 
                                {                                      
	                    ?>
	                    <div class="">
	 												
	                        <?php
	                        //$namenew=array();
	                        $this->load->model('AdminSettingsModel');
	                        $allsubmenu= $this->AdminSettingsModel->getallsubMenu($value->id);
	                        if(!empty($allsubmenu))
	                        {
	                        ?>
	                        <?php if(( isset($data_single->id) && (@$data_single->id==$this->session->userdata('futureAdmin')->uid) ) || @$data_single->id==1 ) { ?>
	                        	<h4>&nbsp;<?php echo @$value->name;?></h4> 
	                        <?php }else{ ?>
	                        	
	                        	<h4>&nbsp;<?php echo @$value->name;?>:&nbsp;&nbsp;Check All&nbsp;<input  type="checkbox"  <?php if(!empty($namenew) && !empty($all_parent_menu) && in_array($value->id,$namenew )) {  ?> checked <?php } ?> value="<?php echo @$value->id;?>" id="main_menu-<?php echo @$value->id;?>" onclick="check_all_sub_menu(this,<?php echo @$value->id;?>)"></h4>	 
	                        <?php } ?> 	
	                        	<ul class="list-group">
	                        <?php	
	                        	foreach ($allsubmenu as $valuenew) {
	                        ?>
	                        <?php if(( isset($data_single->id) && (@$data_single->id==$this->session->userdata('futureAdmin')->uid) ) || @$data_single->id==1 ) { ?>	                        
	    							<li class="list-group-item"><?php echo @$valuenew->name;?>&nbsp;<?php if(!empty($namenew) && !empty($all_parent_menu) && in_array($valuenew->id,$namenew )) {  ?> <i class="la la-check" ></i> <?php } ?>
	    					    	</li>
	    					<?php }else{ ?>   	
	    						    <li class="list-group-item"><?php echo @$valuenew->name;?>&nbsp;<input type="checkbox"  name="menu_id[]" <?php if(!empty($namenew) && !empty($all_parent_menu) && in_array($valuenew->id,$namenew )) {  ?> checked value="<?php echo @$valuenew->id;?>" <?php }else{ ?> value="0" <?php } ?> id="menu-<?php echo @$valuenew->id;?>" class="sub_menus-<?php echo @$value->id;?>" onclick="set_user_menu('menu-<?php echo @$valuenew->id;?>')">
	    					    	</li>
	    				    <?php } ?>
	                        <?php
	                            }
	                        ?>
	                        	</ul>
	                        <?php        
	                        }else{
	                        ?>	
	                        <?php
	                         if(( isset($data_single->id) && (@$data_single->id==$this->session->userdata('futureAdmin')->uid) ) || @$data_single->id==1 ) { 
	                        ?>
                                        <h4>&nbsp;<?php echo @$value->name;?>:&nbsp;<?php if(!empty($namenew) && !empty($all_parent_menu) && in_array($value->id,$namenew )) {  ?> <i class="la la-check" ></i> <?php } ?></h4>
	                        <?php }else{ ?>   	
	                        
	                        	<h4>&nbsp;<?php echo @$value->name;?>:&nbsp;<input type="checkbox"  name="menu_id[]" <?php if(!empty($namenew) && !empty($all_parent_menu) && in_array($value->id,$namenew )) {  ?> checked value="<?php echo @$value->id;?>" <?php }else{ ?> value="0" <?php } ?> id="menu-<?php echo @$value->id;?>" onclick="set_user_menu('menu-<?php echo @$value->id;?>')"></h4>
	                        <?php } ?>
	                    <?php } ?>
	  						
						</div>
	                    <?php
	                    }
	                    ?>                        
	                    </div>
	                    </div>
	                  </div>
	              </div>

	      <!-- Modal footer -->
	      <div class="modal-footer">
	        <a data-dismiss="modal" id="amount_modal_confirm" class="btn btn-primary" href="javascript:void(0);" onclick="close_modal()">Confirm</a> 
	      </div>
	    </div>
	  </div>
	</div>
	<!-- [end] NOT And Coin DIV -->


<div class="col-md-12">
        <div class="form-group form-buttons">
             <button type="submit" name="submit" class="btn btn-success save-profile-btn submit">Save</button>
        <a href="javascript:void(0)" onclick="closeForm();" class="btn btn-outline-secondary ks-light btn-add-admin-close">Close</a>
        </div>
    </div>
</div>

</form>