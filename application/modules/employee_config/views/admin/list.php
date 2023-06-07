<div class="ks-page-header">
    <section class="ks-title">
        <h3>System Config</h3>
        <div class="ks-controls">
            <!-- <button type="button" class="btn btn-primary btn_header_add" onclick="openForm('');">Add</button> -->
        </div>
    </section>
</div>

<div class="ks-page-content">
    <div class="ks-page-content-body">
        <div class="content-wrapper">
            
            <div class="form-wrapper" >
               
                <form onsubmit="return myFunction('employee_config')" method="post" action="<?php echo base_url('admin_add_employee_config'); ?>" name="employee_config" id="employee_config" enctype="multipart/form-data" >
                  <div class="row">  

                  <div class="col-md-12">
                    <div class="form-group">
                        <label>Generate Employee Code automatically</label>
                        
                        <label class="switch">
                          <input type="checkbox" name="auto" onchange="getvall('auto');" <?php echo ((isset($data_single->auto) && ($data_single->auto=='Yes')) ? 'checked' : ''); ?>>
                          
                          <span class="slider round"></span>
                        </label> 
                        <span>Yes</span>         
                    </div>
                </div>



                      <div class="col-md-4">
                          <div class="form-group">
                              <input required placeholder="Prefix" type="text" class="form-control" id="prefix"  name="prefix" value="<?php echo (isset($data_single->prefix) ? $data_single->prefix : ''); ?>">
                          </div>        
                      </div>


                      <div class="col-md-4">
                          <div class="form-group">
                              <input required placeholder="Nos" type="text" class="form-control" id="no"  name="no" value="<?php echo (isset($data_single->no) ? $data_single->no : ''); ?>">
                          </div>        
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                              <input required placeholder="Suffix" type="text" class="form-control" id="suffix"  name="suffix" value="<?php echo (isset($data_single->suffix) ? $data_single->suffix : ''); ?>">
                          </div>        
                      </div>

                      </div>
                      <h4>Advanced Settings</h4>
                      <div class="row">


                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Calculation of Basic Salary</label>
                              <select class="form-control"  name="cal_basic_salary" required>
                                <option value="CTC" <?php echo ((isset($data_single->cal_basic_salary) && ($data_single->cal_basic_salary=='CTC')) ? 'selected' : ''); ?>>CTC</option>
                                <option value="Basic" <?php echo ((isset($data_single->cal_basic_salary) && ($data_single->cal_basic_salary=='Basic')) ? 'selected' : ''); ?>>Basic</option>
                              </select>
                          </div>        
                      </div>


                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Minimum Basic Salary</label>
                              <select class="form-control"  name="min_basic_salary" required>
                                <option value="CTC" <?php echo ((isset($data_single->min_basic_salary) && ($data_single->min_basic_salary=='CTC')) ? 'selected' : ''); ?>>CTC</option>
                                <option value="Basic" <?php echo ((isset($data_single->min_basic_salary) && ($data_single->min_basic_salary=='Basic')) ? 'selected' : ''); ?>>Basic</option>
                              </select>
                          </div>        
                      </div>




                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Basic as % of CTC</label>
                              <select class="form-control"  name="basic_per_ctc" required>
                                <option value="CTC" <?php echo ((isset($data_single->basic_per_ctc) && ($data_single->basic_per_ctc=='CTC')) ? 'selected' : ''); ?>>CTC</option>
                                <option value="Basic" <?php echo ((isset($data_single->basic_per_ctc) && ($data_single->basic_per_ctc=='Basic')) ? 'selected' : ''); ?>>Basic</option>
                              </select>
                          </div>        
                      </div>


                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Payslip format</label>
                              <select class="form-control"  name="payslip_format" required>
                                <option value="CTC" <?php echo ((isset($data_single->payslip_format) && ($data_single->payslip_format=='CTC')) ? 'selected' : ''); ?>>CTC</option>
                                <option value="Basic" <?php echo ((isset($data_single->payslip_format) && ($data_single->payslip_format=='Basic')) ? 'selected' : ''); ?>>Basic</option>
                              </select>
                          </div>        
                      </div>


                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Maximum restricted Holiday</label>
                              <select class="form-control"  name="max_res_holiday" required>
                                <option value="CTC" <?php echo ((isset($data_single->max_res_holiday) && ($data_single->max_res_holiday=='CTC')) ? 'selected' : ''); ?>>CTC</option>
                                <option value="Basic" <?php echo ((isset($data_single->max_res_holiday) && ($data_single->max_res_holiday=='Basic')) ? 'selected' : ''); ?>>Basic</option>
                              </select>
                          </div>        
                      </div>


                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Base Days</label>
                              <select class="form-control"  name="base_day" required>
                                <option value="Actual Days in Month" <?php echo ((isset($data_single->base_day) && ($data_single->base_day=='Actual Days in Month')) ? 'selected' : ''); ?>>Actual Days in Month</option>
                                <option value="Fixed Days" <?php echo ((isset($data_single->base_day) && ($data_single->base_day=='Fixed Days')) ? 'selected' : ''); ?>>Fixed Days</option>
                              </select>
                          </div>        
                      </div>


                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Cut off Day</label>
                              <select class="form-control"  name="cut_off_day" required>
                                <option value="Actual Days in Month" <?php echo ((isset($data_single->cut_off_day) && ($data_single->cut_off_day=='Actual Days in Month')) ? 'selected' : ''); ?>>Actual Days in Month</option>
                                <option value="Fixed Days" <?php echo ((isset($data_single->cut_off_day) && ($data_single->cut_off_day=='Fixed Days')) ? 'selected' : ''); ?>>Fixed Days</option>
                              </select>
                          </div>        
                      </div>

                       <div class="col-md-6">
                          <div class="form-group">
                              <label>Cut off Rules</label>
                              <input required type="text" class="form-control flatpickrDate" id="cut_off_rule_start"  name="cut_off_rule_start" value="<?php echo (isset($data_single->cut_off_rule_start) ? $data_single->cut_off_rule_start : ''); ?>"> 
                          </div>        
                      </div>

                      

                      <div class="col-md-12">
                      <div class="form-group text-right">
                           <input type="hidden" name="auto1" value="<?php echo (isset($data_single->auto) ? $data_single->auto : 'No'); ?>">
                           <button type="submit" name="submit" class="btn btn-dark">Save</button>
                      </div>
                      </div>

                      </div>

                  <hr>
                  </form>

            </div>     
        </div>
    </div>
</div>
<script type="text/javascript">
   function getvall(type) {
    //console.log(type);
      var checkBoxes = $("input[name="+type+"]");
      if(checkBoxes.prop("checked") == true){
          $("input[name="+type+"1]").val('Yes');
      }
      else if(checkBoxes.prop("checked") == false){
          $("input[name="+type+"1]").val('No');
      }        
    }
</script>