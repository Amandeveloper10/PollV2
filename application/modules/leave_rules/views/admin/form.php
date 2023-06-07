<form onsubmit="return myFunction('leave_rules_form')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_leave_rules').'/'.$id : base_url('admin_add_leave_rules'); ?>" name="leave_rules_form" id="leave_rules_form" enctype="multipart/form-data" >
<div class="row">
    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Name</label>
            <input required type="text" class="form-control" name="rule_name" value="<?php echo (isset($data_single->rule_name) ? $data_single->rule_name : ''); ?>">
        </div>
    </div>

    <div class="col-sm-6 col-xl-4">
    <div class="form-group">
    <label>Applicable For</label>
    <select class="form-control select2" multiple  name="applicable_for[]" required>
        <?php 
		
        if(isset($data_single->applicable_for)){
            $applicable_forId=  explode(',', @$data_single->applicable_for);
        }?>
    <option value="Trainee" <?php if (isset($data_single->applicable_for) && in_array('Trainee', $applicable_forId)) { echo 'selected';} ?>>Trainee</option>
    <option value="Provisional" <?php if (isset($data_single->applicable_for) && in_array('Provisional', $applicable_forId)) { echo 'selected';} ?>>Provisional</option>
     <option value="Contractual" <?php if (isset($data_single->applicable_for) && in_array('Contractual', $applicable_forId)) { echo 'selected';} ?>>Contractual</option>
      <option value="Permanent" <?php if (isset($data_single->applicable_for) && in_array('Permanent', $applicable_forId)) { echo 'selected';} ?>>Permanent</option>
    </select>
    </div>
    </div>

    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Credit at</label>
            <select class="form-control"  name="credit_month" onchange="get_div(this.value);">
                <option value="Monthly" <?php echo ((isset($data_single->credit_month) && ($data_single->credit_month=='Monthly')) ? 'selected' : ''); ?>>Monthly</option>
                <option value="Yearly" <?php echo ((isset($data_single->credit_month) && ($data_single->credit_month=='Yearly')) ? 'selected' : ''); ?>>Yearly</option>
              </select>
        </div>
    </div>



    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Unit</label>
            <input required onkeypress="return isNumberKey(event,this.value)"  type="text" class="form-control" name="unit" value="<?php echo (isset($data_single->unit) ? $data_single->unit : ''); ?>">
        </div>        
    </div>



     <div class="col-sm-6 col-xl-3">
        <div class="form-group">
            <label>Period</label>
            <select required class="form-control"  name="period_day">
                <option value="">Day</option>
                <?php for ($i = 1; $i <= 31; $i++) : ?>
                    <option value="<?php echo $i; ?>" <?php echo ((isset($data_single->period_day) && ($data_single->period_day==$i)) ? 'selected' : ''); ?>><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
            </div>
            </div>
            <div class="col-sm-6 col-xl-4" id="year_div" <?php echo ((isset($data_single->credit_month) && ($data_single->credit_month=='Yearly')) ? '' : 'style="display: none;"'); ?>>
        <div class="form-group" >
            <label></label>
            <select class="form-control"  name="period_month" style="margin-top: 8px;">
                <option value="">Month</option>               
                <option value='January' <?php echo ((isset($data_single->period_month) && ($data_single->period_month=='January')) ? 'selected' : ''); ?>>January</option>
                <option value='February' <?php echo ((isset($data_single->period_month) && ($data_single->period_month=='February')) ? 'selected' : ''); ?>>February</option>
                <option value='March' <?php echo ((isset($data_single->period_month) && ($data_single->period_month=='March')) ? 'selected' : ''); ?>>March</option>
                <option value='April' <?php echo ((isset($data_single->period_month) && ($data_single->period_month=='April')) ? 'selected' : ''); ?>>April</option>
                <option value='May' <?php echo ((isset($data_single->period_month) && ($data_single->period_month=='May')) ? 'selected' : ''); ?>>May</option>
                <option value='June' <?php echo ((isset($data_single->period_month) && ($data_single->period_month=='June')) ? 'selected' : ''); ?>>June</option>
                <option value='July' <?php echo ((isset($data_single->period_month) && ($data_single->period_month=='July')) ? 'selected' : ''); ?>>July</option>
                <option value='August' <?php echo ((isset($data_single->period_month) && ($data_single->period_month=='August')) ? 'selected' : ''); ?>>August</option>
                <option value='September' <?php echo ((isset($data_single->period_month) && ($data_single->period_month=='September')) ? 'selected' : ''); ?>>September</option>
                <option value='October' <?php echo ((isset($data_single->period_month) && ($data_single->period_month=='October')) ? 'selected' : ''); ?>>October</option>
                <option value='November' <?php echo ((isset($data_single->period_month) && ($data_single->period_month=='November')) ? 'selected' : ''); ?>>November</option>
                <option value='December' <?php echo ((isset($data_single->period_month) && ($data_single->period_month=='December')) ? 'selected' : ''); ?>>December</option>
            </select>

        </div>
    </div>
    
    <div class="col-sm-4 col-xl-3">
        <div class="form-group">
            <div class="custom-control custom-checkbox mt-checkbox">
                <input onchange="getEntitlement();" type="checkbox" class="custom-control-input" id="is_entitlement_situational"  name="is_entitlement_situational" value="Yes" <?php echo ((isset($data_single->is_entitlement_situational) && ($data_single->is_entitlement_situational=='Yes')) ? 'checked' : ''); ?>>
            <input type="hidden" id="is_entitlement_situational1"  name="is_entitlement_situational1" value="<?php echo (isset($data_single->is_entitlement_situational) ? $data_single->is_entitlement_situational : 'No'); ?>">            
                <label class="custom-control-label" for="is_entitlement_situational">Is entitlement situational</label>
              </div>            
        </div>        
    </div>


    <div class="col-sm-4 col-xl-3">
        <div class="form-group">
            <label>Status</label>
            <br>
            <label class="switch">
              <input type="checkbox" name="status" onchange="getvall('status');" <?php echo ((isset($data_single->status) && ($data_single->status=='Yes')) ? 'checked' : ''); ?>>
              <span class="slider round"></span>
            </label>
            <span id="check_status"><?php echo ((isset($data_single->status) && ($data_single->status=='Yes')) ? 'Enable' : 'Disable'); ?></span> 
        </div>
    </div>

     <div class="col-sm-4 col-xl-3">
        <div class="form-group">
            <label>Encahasable</label>
            <br>
            <label class="switch">
              <input type="checkbox" name="encahasable" onchange="getvall('encahasable');" <?php echo ((isset($data_single->encahasable) && ($data_single->encahasable=='Yes')) ? 'checked' : ''); ?>>
              <span class="slider round"></span>
            </label>
            <span id="check_encahasable"><?php echo ((isset($data_single->encahasable) && ($data_single->encahasable=='Yes')) ? 'Yes' : 'No'); ?></span> 
        </div>
    </div>

    <div class="col-sm-4 col-xl-3" id="encahasableType"  <?php echo ((isset($data_single->encahasable) && ($data_single->encahasable=='Yes')) ? '' : 'style="display: none;"'); ?>>
        <div class="form-group">
            <label>Encahasable Type</label>
              <select class="form-control"  name="encahasable_type" id="encahasable_type" onclick="get_encasement_title(this.value)">
                <option value="">Select</option>
                <option value="Fixed" <?php echo ((isset($data_single->encahasable_type) && ($data_single->encahasable_type=='Fixed')) ? 'selected' : ''); ?>>Fixed</option>
                <option value="Percentage" <?php echo ((isset($data_single->encahasable_type) && ($data_single->encahasable_type=='Percentage')) ? 'selected' : ''); ?>>Percentage</option>
              </select>
        </div>
    </div>

    <div class="col-sm-4 col-xl-3" id="encahasablevalue" <?php echo ((isset($data_single->encahasable) && ($data_single->encahasable=='Yes')) ? '' : 'style="display: none;"'); ?>>
        <div class="form-group">
            <label>Value</label>
              <input type="text" class="form-control" name="encahasable_value" id="encahasable_value" value="<?php echo (isset($data_single->encahasable_value) ? $data_single->encahasable_value : ''); ?>">
        </div>
    </div>

    <div class="col-sm-4 col-xl-3">
        <div class="form-group">
            <label>Carried Forward</label>
            <br>
            <label class="switch">
              <input type="checkbox" name="carried_forward" onchange="getvall('carried_forward');" <?php echo ((isset($data_single->carried_forward) && ($data_single->carried_forward=='Yes')) ? 'checked' : ''); ?>>
              <span class="slider round"></span>
            </label>
            <span id="check_carried_forward"><?php echo ((isset($data_single->carried_forward) && ($data_single->carried_forward=='Yes')) ? 'Yes' : 'No'); ?></span> 
        </div>
    </div>

      <div class="col-sm-4 col-xl-3" id="carriedforwardType" <?php echo ((isset($data_single->carried_forward) && ($data_single->carried_forward=='Yes')) ? '' : 'style="display: none;"'); ?>>
        <div class="form-group">
            <label>Carried Forward Type</label>
              <select class="form-control"  name="carried_forward_type" id="carried_forward_type" onclick="get_carried_forward(this.value)">
                <option value="">Select</option>
                <option value="Maxlimit" <?php echo ((isset($data_single->carried_forward_type) && ($data_single->carried_forward_type=='Maxlimit')) ? 'selected' : ''); ?>>Max Limit</option>
                <option value="All balance" <?php echo ((isset($data_single->carried_forward_type) && ($data_single->carried_forward_type=='All balance')) ? 'selected' : ''); ?>>All Balance</option>
              </select>
        </div>
    </div>

    <div class="col-sm-4 col-xl-3" id="carriedforwardvalue" <?php echo ((isset($data_single->carried_forward_type) && ($data_single->carried_forward_type=='Maxlimit')) ? '' : 'style="display: none;"'); ?>>
        <div class="form-group">
            <label>Value</label>
              <input type="text" class="form-control" name="carriedforward_value" id="carriedforward_value" value="<?php echo (isset($data_single->carriedforward_value) ? $data_single->carriedforward_value : ''); ?>">
        </div>
    </div>
    
    
    <div class="col-md-12">
        <div class="form-group form-buttons">
             <button type="submit" name="submit" class="btn btn-success">Save</button>
             <a href="javascript:;" class="btn btn-secondary" onclick="btnCloseForm();">Close</a>
        </div>
    </div>

    <input type="hidden" name="encahasable1" value="<?php echo (isset($data_single->encahasable) ? $data_single->encahasable : 'No'); ?>">
    <input type="hidden" name="carried_forward1" value="<?php echo (isset($data_single->carried_forward) ? $data_single->carried_forward : 'No'); ?>">
    <input type="hidden" name="status1" value="<?php echo (isset($data_single->status) ? $data_single->status : 'No'); ?>">
    
    
</div>
</form>

<script type="text/javascript">
    $('.select2').select2({
    width: '100%'
    })

    function get_div(value){
        if(value == 'Monthly'){
            $('#year_div').hide();
        }else{
            $('#year_div').show();
        }
    }

    function get_encasement_title(value){
        if(value != ''){
            $('#encahasablevalue').show();
        }
    }

    function get_carried_forward(value){
        if(value == 'Maxlimit'){
            $('#carriedforwardvalue').show();
        }else{
             $('#carriedforward_value').val('');
             $('#carriedforwardvalue').hide();
        }
    }

    
</script>