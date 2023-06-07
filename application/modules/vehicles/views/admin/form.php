 <form closeForm onsubmit="return myFunction('vehicles')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_vehicles').'/'.$id : base_url('admin_add_vehicles'); ?>" name="vehicles" id="vehicles" enctype="multipart/form-data" >

    <div class="row">
        <div class="col-sm-6 col-xl-4">
            <div class="form-group">
                <label for="" class="form-control-label">Vehicle No.</label>
                <input type="text" placeholder="Enter Vehicle No." class="form-control" name="vehicle_no" value="<?php echo (isset($data_single->vehicle_no) ? $data_single->vehicle_no : ''); ?>">                
            </div>
        </div>
        
          <div class="col-sm-6 col-xl-4">
            <div class="form-group">
                <label for="" class="form-control-label">Insurence</label>
                <select class="form-control" id="insurence_id" name="insurence_id">
                <option value="">Select</option>
                <?php
                if(!empty($all_insurence))
                {
                    foreach ($all_insurence as $value) {
                        
                    
                
                ?>
                <option value="<?php echo $value->id;?>" <?php  if(!empty($data_single) && $data_single->insurence_id==$value->id) { echo 'selected'; } ?> ><?php echo @$value->policy_name;?></option>
                <?php
                    }
                }
                ?>
                </select>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="form-group">
                <label for="" class="form-control-label">Vehicle Registration Code</label>
                <input type="text" placeholder="Enter registration code" class="form-control" name="vehicle_reg_code" value="<?php echo (isset($data_single->vehicle_reg_code) ? $data_single->vehicle_reg_code : ''); ?>">
            </div>
        </div>
    <div class="col-sm-6 col-xl-4">
            <div class="form-group">
                <label for="" class="form-control-label">Vehicle Name</label>
                <input type="text" placeholder="Enter vehicle name" class="form-control" name="vehicle_name" value="<?php echo (isset($data_single->vehicle_name) ? $data_single->vehicle_name : ''); ?>">
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="form-group">
                <label for="" class="form-control-label">Vehicle Model (Year)</label>
                <input type="text" placeholder="Enter vehicle model" class="form-control" name="vehicle_model_year" value="<?php echo (isset($data_single->vehicle_model_year) ? $data_single->vehicle_model_year : ''); ?>">
            </div>
        </div>
    <div class="col-sm-6 col-xl-4">        
            <div class="form-group">
                <label for="" class="form-control-label">Purchased Amount</label>
                <input type="text" placeholder="Enter purchased amount" class="form-control" name="purchase_amount" value="<?php echo (isset($data_single->purchase_amount) ? $data_single->purchase_amount : ''); ?>">
            </div>        
    </div>
    <div class="col-sm-6 col-xl-4">
            <div class="form-group">
                <label for="" class="form-control-label">Registration Documents</label>
                <div class="input-group">
                    <div class="custom-file replaceCustomFile">
                        <input onchange="readURLVehicle(this,'vehicles','reg_doc')" type="file" name="att_file_reg_doc" class="custom-file-input" id="inputGroupFile26">
                        <label class="custom-file-label" for="inputGroupFile26">Upload file</label>
                        <input type="hidden" id="reg_doc_1" name="reg_doc_1" value="<?php echo (isset($data_single->reg_doc) ? $data_single->reg_doc : ''); ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="form-group">
                <label for="" class="form-control-label">Insurance Documents</label>
                <div class="input-group">
                    <div class="custom-file replaceCustomFile">
                        <input onchange="readURLVehicle(this,'vehicles','insur_doc')" name="att_file_insur_doc" type="file" class="custom-file-input" id="inputGroupFile27">
                        <label class="custom-file-label" for="inputGroupFile27">Upload file</label>
                        <input type="hidden" id="insur_doc_1" name="insur_doc_1" value="<?php echo (isset($data_single->insur_doc) ? $data_single->insur_doc : ''); ?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
        <div class="form-group form-buttons">
             <button type="submit" name="submit" class="btn btn-success save-profile-btn">Save</button>
             <a href="javascript:;" class="btn btn-secondary" onclick="closeForm();">Close</a>
        </div>
    </div>
    </div>
     
<!--<div class="card-footer">
    <div class="form-group mt-3">
        <button type="submit" name="submit" class="btn btn-success save-profile-btn">Save vehicle</button>
        <a href="javascript:void(0)" onclick="closeForm();" class="btn btn-outline-secondary ks-light btn-add-tenancy-contrcts-close">Close</a>
    </div>
</div>-->
</form>