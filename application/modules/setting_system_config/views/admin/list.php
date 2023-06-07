<div class="ks-page-header">
    <section class="ks-title">
        <h3><span>Settings > </span> System Config</h3>
        <div class="ks-controls">
            <a href="javascript:;" class="btn btn-icon btn-light btn_maximize"><i class="far fa-window-maximize"></i></a>
        </div>
    </section>
</div>


<div class="ks-page-content">
    <div class="ks-page-content-body">
        <div class="container-fluid">
        <div class="content-wrapper">            
            <div class="form-wrapper">
                <form onsubmit="return myFunction('setting_system_config')" method="post" action="<?php echo base_url('admin_add_setting_system_config'); ?>" name="setting_system_config" id="setting_system_config" enctype="multipart/form-data" >
                    <div class="row">                 

                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label>Default Currency</label>

                                <select class="form-control" id="default_currency"  name="default_currency">
                                    <option value="INR" <?php if ($data_single->default_currency == 'INR')  ?>>INR</option>
                                    <option value="JOD" <?php if ($data_single->default_currency == 'JOD')  ?>>JOD </option>
                                    <option value="THBAED" <?php if ($data_single->default_currency == 'AED')  ?>>AED</option>
                                    <option value="THB" <?php if ($data_single->default_currency == 'THB')  ?>>THB</option>
                                    <option value="Tk" <?php if ($data_single->default_currency == 'Tk')  ?>>Tk</option>
                                    <option value="SAR" <?php if ($data_single->default_currency == 'SAR')  ?>>SAR</option>
                                    <option value="EUR" <?php if ($data_single->default_currency == 'EUR')  ?>>EUR</option>
                                    <option value="USD" <?php if ($data_single->default_currency == 'USD')  ?>>USD</option>
                                    <option value="MYR" <?php if ($data_single->default_currency == 'MYR')  ?>>MYR</option>
                                    <option value="IRR" <?php if ($data_single->default_currency == 'IRR')  ?>>IRR</option>
                                    <option value="JMD" <?php if ($data_single->default_currency == 'JMD')  ?>>JMD</option>
                                    <option value="AUD" <?php if ($data_single->default_currency == 'AUD')  ?>>AUD</option>
                                    <option value="MAD" <?php if ($data_single->default_currency == 'MAD')  ?>>MAD</option>
                                    <option value="PKR" <?php if ($data_single->default_currency == 'PKR')  ?>>PKR</option>
                                     <option value="OMR" <?php if ($data_single->default_currency == 'OMR')  ?>>OMR</option>
                                     <option value="NZD" <?php if ($data_single->default_currency == 'NZD')  ?>>NZD</option>
                                    
                                </select>

<!--                                <input required type="text" class="form-control" id="default_currency"  name="default_currency" value="<?php echo (isset($data_single->default_currency) ? $data_single->default_currency : ''); ?>">-->
                            </div>        
                        </div>


                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label>Currency Symbol</label>
<!--                                <select class="form-control" id="default_currency_symbol"  name="default_currency_symbol">
                                    <option value="$" <?php if ($data_single->default_currency_symbol == '$')  ?>>$</option>
                                    <option value="€" <?php if ($data_single->default_currency_symbol == '€')  ?>>€</option>
                                    <option value="₹" <?php if ($data_single->default_currency_symbol == '₹')  ?>>₹</option>
                                    <option value="﷼" <?php if ($data_single->default_currency_symbol == '﷼')  ?>>﷼</option>
                                    <option value="د.إ" <?php if ($data_single->default_currency_symbol == 'د.إ')  ?>>د.إ</option>
                                    <option value="RM" <?php if ($data_single->default_currency_symbol == 'RM')  ?>>RM</option>
                                    <option value="دينار‎" <?php if ($data_single->default_currency_symbol == 'دينار‎')  ?>>دينار‎</option>
                                    <option value="₨" <?php if ($data_single->default_currency_symbol == '₨')  ?>>₨</option>
                                    <option value="£" <?php if ($data_single->default_currency_symbol == '£')  ?>>£</option>
                                   
                                    
                                </select>-->
                                <input required type="text" class="form-control" id="default_currency_symbol"  name="default_currency_symbol" value="<?php echo (isset($data_single->default_currency_symbol) ? $data_single->default_currency_symbol : ''); ?>">
                            </div>        
                        </div>

                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label>Currency Position</label>
                                 <select class="form-control" id="currency_position"  name="currency_position">
                                    <option value="Left" <?php if ($data_single->currency_position == 'Left')  ?>>Left</option>
                                    <option value="Right" <?php if ($data_single->currency_position == 'Right')  ?>>Right</option>
                                   
                                   
                                    
                                </select>
<!--                                <input required type="text" class="form-control" id="currency_position"  name="currency_position" value="<?php echo (isset($data_single->currency_position) ? $data_single->currency_position : ''); ?>">-->
                            </div>        
                        </div>

                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label>Date format</label>
                                 <select class="form-control" id="date_format"  name="date_format">
                                    <option value="Y-m-d" <?php if ($data_single->date_format == 'Y-m-d'){ echo 'selected';}  ?>>yyyy-mm-dd</option>
                                    <option value="d-m-Y" <?php if ($data_single->date_format == 'd-m-Y'){ echo 'selected';} ?>>dd-mm-yyyy</option>
                                     <option value="m-d-Y" <?php if ($data_single->date_format == 'm-d-Y'){ echo 'selected';}  ?>>mm-dd-yyyy</option>
                                   
                                   
                                    
                                </select>
<!--                                <input required type="text" class="form-control" id="date_format"  name="date_format" value="<?php echo (isset($data_single->date_format) ? $data_single->date_format : ''); ?>">-->
                            </div>        
                        </div>

<!--                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="form-group">
                                <label>Time zone</label>
                                <input required type="text" class="form-control" id="timezone"  name="timezone" value="<?php echo (isset($data_single->timezone) ? $data_single->timezone : ''); ?>">
                            </div>        
                        </div>-->
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label>Financial Year Start Month</label>

                                 <select class="form-control" id="financial_year_start_month"  name="financial_year_start_month">
                                    <option value='01' <?php echo ($data_single->financial_year_start_month=='01') ? 'selected' : ''; ?> >Janaury</option>
                                    <option value='02' <?php echo ($data_single->financial_year_start_month=='02') ? 'selected' : ''; ?>>February</option>
                                    <option value='03' <?php echo ($data_single->financial_year_start_month=='03') ? 'selected' : ''; ?>>March</option>
                                    <option value='04' <?php echo ($data_single->financial_year_start_month=='04') ? 'selected' : ''; ?> >April</option>
                                    <option value='05' <?php echo ($data_single->financial_year_start_month=='05') ? 'selected' : ''; ?> >May</option>
                                    <option value='06' <?php echo ($data_single->financial_year_start_month=='06') ? 'selected' : ''; ?> >June</option>
                                    <option value='07' <?php echo ($data_single->financial_year_start_month=='07') ? 'selected' : ''; ?> >July</option>
                                    <option value='08' <?php echo ($data_single->financial_year_start_month=='08') ? 'selected' : ''; ?> >August</option>
                                    <option value='09' <?php echo ($data_single->financial_year_start_month=='09') ? 'selected' : ''; ?> >September</option>
                                    <option value='10' <?php echo ($data_single->financial_year_start_month=='10') ? 'selected' : ''; ?> >October</option>
                                    <option value='11' <?php echo ($data_single->financial_year_start_month=='11') ? 'selected' : ''; ?> >November</option>
                                    <option value='12' <?php echo ($data_single->financial_year_start_month=='12') ? 'selected' : ''; ?> >December</option> 
                                    
                                </select>

                            </div>        
                        </div>


                    <div class="col-sm-6 col-xl-4">
                        <div class="form-group">  
                            <label for="" class="form-control-label">Pay Frequency</label>                        
                                <select required class="form-control"  name="pay_frequency" required="required">
                                <option value="">Select</option>
                               <option value="Monthly" <?php if(isset($data_single->pay_frequency) && $data_single->pay_frequency == 'Monthly'){ echo 'selected'; }?>>Monthly</option>
                                <option value="Weekly" <?php if(isset($data_single->pay_frequency) && $data_single->pay_frequency == 'Weekly'){ echo 'selected'; }?>>Weekly</option>
                                <option value="Quaterly" <?php if(isset($data_single->pay_frequency) && $data_single->pay_frequency == 'Quaterly'){ echo 'selected'; }?>>Quaterly</option>
                                <option value="Half-Yearly" <?php if(isset($data_single->pay_frequency) && $data_single->pay_frequency == 'Half-Yearly'){ echo 'selected'; }?>>Half-Yearly</option>
                                <option value="Yearly" <?php if(isset($data_single->pay_frequency) && $data_single->pay_frequency == 'Yearly'){ echo 'selected'; }?>>Yearly</option>
                                </select>
                        </div>        
                    </div>

                      <div class="col-sm-6 col-xl-4">
                    <div class="form-group">                        
                    <label for="" class="form-control-label">Pay your employees on</label>
                    <div class="radio"><label>
                            <input type="radio" name="on_days" <?php if(isset($data_single->based_on_days) && $data_single->based_on_days == 'last_working_day'){ echo 'checked'; }?> onclick="return getallpayday('last_working_day');"> Last working day on the month</label>
                    </div>
                    <div class="radio"><label>
                        <input type="radio" name="on_days" <?php if(isset($data_single->based_on_days) && $data_single->based_on_days == 'fixed_day'){ echo 'checked'; }?> onclick="return getallpayday('fixed_day');" > Fixed Day<br>
                        </label>
                    </div>
                        <input type="hidden" class="form-control" id="based_on_days"  name="based_on_days" value="<?php echo (isset($data_single->based_on_days) ? $data_single->based_on_days : ''); ?>">
                        <small style="color:red;">After Salary processed this field can't be modify.</small>
                    </div>        
                </div>

                    <div class="col-sm-6 col-xl-4">
                        <div class="form-group" id="fixedDay" <?php if(isset($data_single->based_on_days) && $data_single->based_on_days == 'fixed_day'){ echo ''; }else{ echo 'style="display:none;"';} ?>>  
                            <label for="" class="form-control-label">Day of Processing</label>                        
                                <select class="form-control"  name="day_of_processing" id="day_of_processing">
                                <option value="">Day</option>
                                <?php for ($i = 1; $i <= 31; $i++) : ?>
                                <option value="<?php echo $i; ?>" <?php echo ((isset($data_single->day_of_processing) && ($data_single->day_of_processing==$i)) ? 'selected' : ''); ?>><?php echo $i; ?></option>
                                <?php endfor; ?>
                                </select>
                        </div>        
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-sm-6 col-xl-4">
                    <div class="form-group">  
                    <label for="" class="form-control-label">Calculate Monthly salary based on:</label>
                       <div class="radio"><label>
                        <input type="radio" name="days" <?php if(isset($data_single->based_on) && $data_single->based_on == 'actual_days'){ echo 'checked'; }?> onclick="return getallvalue('actual_days');"> Actual days in a month
                           </label>
                       </div>
                    <div class="radio"><label>
                        <input type="radio" name="days" <?php if(isset($data_single->based_on) && $data_single->based_on == 'organisation_working_days'){ echo 'checked'; }?> onclick="return getallvalue('organisation_working_days');" > Organisation working days per month
                        </label>
                    </div>
                        <input type="hidden" class="form-control" id="based_on"  name="based_on" value="<?php echo (isset($data_single->based_on) ? $data_single->based_on : ''); ?>">
                         <small style="color:red;">After Salary processed this field can't be modify.</small>
                    </div>        
                </div>

                <div class="col-sm-6 col-xl-4">
                    <div class="form-group" id="workingDays" <?php if(isset($data_single->based_on) && $data_single->based_on == 'organisation_working_days'){ echo ''; }else{ echo 'style="display:none;"';} ?>>  
                        <label for="" class="form-control-label">Working Days</label>  
                        <input type="number"  class="form-control" value="<?php echo (isset($data_single->working_days) ? $data_single->working_days : ''); ?>" name="working_days"  id="working_days"/>
                    </div>        
                </div>
                </div>
                    <div class="row">
                 <div class="col-sm-6 col-xl-4">
                    <div class="form-group">  
                    <label for="" class="form-control-label">Cut of Date</label>
                    <div class="radio"><label>
                        <input type="radio" name="salary_cycle" <?php if(isset($data_single->salary_cycle) && $data_single->salary_cycle == 'Actualdays'){ echo 'checked'; }?> onclick="return getallsalaryday('Actualdays');"> Actual Days of the month
                        </label>
                    </div>
                    <div class="radio"><label>
                        <input type="radio" name="salary_cycle" <?php if(isset($data_single->salary_cycle) && $data_single->salary_cycle == 'fixedday'){ echo 'checked'; }?> onclick="return getallsalaryday('fixedday');" > Fixed Date of the month
                        </label>
                    </div>
                        <input type="hidden" class="form-control" id="salarycycle"  name="salarycycle" value="<?php echo (isset($data_single->salary_cycle) ? $data_single->salary_cycle : ''); ?>">
                         <small style="color:red;">After Salary processed this field can't be modify.</small>
                    </div>        
                </div>

                    <div class="col-sm-6 col-xl-4" id="salaryfixedDay"  <?php if(isset($data_single->salary_cycle) && $data_single->salary_cycle == 'fixedday'){ echo ''; }else{ echo 'style="display:none;"';} ?>>
                        <div class="form-group" >  
                            <label for="" class="form-control-label">Please select cut-off date</label>                        
                                <select class="form-control"  name="cut_of_day" id="cut_of_day">
                                <option value="">Day</option>
                                <?php for ($i = 1; $i <= 27; $i++) : ?>
                                <option value="<?php echo $i; ?>" <?php echo ((isset($data_single->cut_of_day) && ($data_single->cut_of_day==$i)) ? 'selected' : ''); ?>><?php echo $i; ?></option>
                                <?php endfor; ?>
                                </select>
                        </div>        
                    </div>

                <div class="col-sm-6 col-xl-3">
                <div class="form-group">
                <label>Loan Module</label>
                <br>
                <label class="switch">
                <input type="checkbox" name="Loan" onchange="getvall('Loan');" <?php echo ((isset($data_single->loan) && ($data_single->loan=='Yes')) ? 'checked' : ''); ?>>

                <span class="slider round"></span>
                </label>
                <span id="check_Loan"><?php echo ((isset($data_single->loan) && ($data_single->loan=='Yes')) ? 'Active' : 'In-Active'); ?></span> 
                </div>
                </div>
                <input type="hidden" name="Loan1" value="No">

              

                <div class="col-sm-6 col-xl-12">
                    <div class="form-group">  
                        <label for="" class="form-control-label"><strong>Note:</strong></label>  
                       <span class="text-info">When payday falls on a non-working day or a holiday employees will get paid on the previous day.</span>
                    </div>        
                </div>

              

                    <div class="col-md-12">
                            <div class="form-group form-buttons">
                                 <button type="submit" name="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>

                        

                    </div>

                </form>
            </div> 
        </div>
        </div>
    </div>
</div>
<script type="text/javascript">
     function getallvalue(value){
      $('#based_on').val(value);
      if(value == 'organisation_working_days'){
        $('#workingDays').show();
      }else{
        $('#workingDays').hide();
        $('#working_days').val('');
      }
    }

     function getallpayday(value){
      $('#based_on_days').val(value);
      if(value == 'fixed_day'){
        $('#fixedDay').show();
		$('#day_of_processing').attr('required',true);
      }else{
        $('#fixedDay').hide();
        $('#day_of_processing').val('');
		$('#day_of_processing').attr('required',false);
      }
    }


    function getallsalaryday(value){
      $('#salarycycle').val(value);
      if(value == 'fixedday'){
        $('#salaryfixedDay').show();
		$('#cut_of_day').attr('required',true);
      }else{
        $('#salaryfixedDay').hide();
        $('#cut_of_day').val('');
		$('#cut_of_day').attr('required',false);
      }
    }

    function getvall(type) {
      var checkBoxes = $("input[name="+type+"]");
      if(checkBoxes.prop("checked") == true){
          $("input[name="+type+"1]").val('Yes');
          $("#check_"+type).html('Active');
      }
      else if(checkBoxes.prop("checked") == false){
          $("input[name="+type+"1]").val('No');
          $("#check_"+type).html('In-Active');
      }
        
    }
</script> 
           
