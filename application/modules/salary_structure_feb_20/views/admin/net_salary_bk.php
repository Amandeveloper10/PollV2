<h6 class="form-box-heading">Net Salary Calculation</h6>
                  <div class="row mt-2">
                        <div class="col-12">
                            <div class="card panel panel-table" data-dashboard-widget>
                                <div class="card-block" data-widget-content>
                                    <table class="table table-bordered table-striped" id="netsalary">
                                        <thead>
                                            <tr>
                                                <th>Description</th>
                                                <th>Based On</th>
                                                <th></th>
                                                <th>%</th>
                                                <th>Monthly</th>
                                                <th>Yearly</th>
                                                <!-- <th>Additions</th>
                                                <th>Deductions</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Additions</td>
                                                <td></td>
                                            </tr>
                                            <?php //echo "<pre>"; print_r($salary_component_Earning); die;
                                            $ctcVal_monthly = ($ctcVal/12);
                                             $master_salary_structureid = '';
                                             $net_amt =  $basic_amt = $net_amt1 =  $basic_amt1 = $house_rent_amt1 = $house_rent_amt = 0;
                                             if(!empty($salary_component_Earning)){
                                                foreach ($salary_component_Earning as $component_Earning) {
                                                    $master_salary_structureid = $component_Earning->master_salary_structure_id;
                                                    $amt = $amt1 = 0;

                                                   if($component_Earning->amount != '0.00'){
                                                         
                                                    $amount_per = (float) (!empty($component_Earning->amount)) ? ($component_Earning->amount/100) : 0;
                                                    if($component_Earning->base_on == 'CTC'){
                                                        if($component_Earning->operator == '*'){
                                                            $amt = (float) $ctcVal_monthly * $amount_per;
                                                            $amt1 = (float) $ctcVal * $amount_per;
                                                        }else if($component_Earning->operator== '/'){
                                                            $amt = (float) $ctcVal_monthly / $amount_per;
                                                            $amt1 = (float) $ctcVal / $amount_per;
                                                        }else if($component_Earning->operator== '+'){
                                                            $amt = (float) $ctcVal_monthly + $amount_per;
                                                            $amt1 = (float) $ctcVal + $amount_per;
                                                        }else if($component_Earning->operator== '-'){
                                                            $amt = (float) $ctcVal_monthly - $amount_per;
                                                            $amt1 = (float) $ctcVal - $amount_per;
                                                        }
                                                    }else if($component_Earning->base_on == 'Basic Salary'){
                                                        if($component_Earning->operator == '*'){
                                                            $amt = (float) $basic_amt * $amount_per;
                                                            $amt1 = (float) $basic_amt1 * $amount_per;
                                                        }else if($component_Earning->operator== '/'){
                                                            $amt = (float) $basic_amt / $amount_per;
                                                            $amt1 = (float) $basic_amt1 / $amount_per;
                                                        }else if($component_Earning->operator== '+'){
                                                            $amt = (float) $basic_amt + $amount_per;
                                                            $amt1 = (float) $basic_amt1 + $amount_per;
                                                        }else if($component_Earning->operator== '-'){
                                                            $amt = (float) $basic_amt - $amount_per;
                                                            $amt1 = (float) $basic_amt1 - $amount_per;
                                                        }
                                                    }



                                                    

                                                }else{
                                                    $amt = $component_Earning->fixed_amount/12;
                                                    $amt1 = $component_Earning->fixed_amount;

                                                }

                                                if($component_Earning->component == 'Basic Salary'){
                                                        $basic_amt = $amt;
                                                        $basic_amt1 = $amt1;
                                                    }

                                                if(!empty($component_Earning->component) && $component_Earning->component == 'House Rent Allowance'){
                                                        $house_rent_amt = $amt;
                                                        $house_rent_amt1 = $amt1;
                                                    }


                                                    $net_amt += $amt;
                                                    $net_amt1 += $amt1;

                                                   ?>
                                            <tr>
                                                <td><?php echo $component_Earning->component; ?>
                                                <?php if($component_Earning->component == 'Basic Salary'){ ?>
                                                    <input type="hidden" class="basicclass" id="besic_<?php echo $component_Earning->id; ?>" value="<?php echo $component_Earning->id; ?>">
                                                <?php } ?>
                                                </td>
                                                 <td><?php if($component_Earning->fixed_amount==0) { ?><?php echo @$component_Earning->base_on; ?><?php } ?>
                                                     <input type="hidden" id="basedon_<?php echo $component_Earning->id; ?>" value="<?php if($component_Earning->fixed_amount==0) { ?><?php echo @$component_Earning->base_on; ?><?php } ?>">
                                                 </td>
                                                  <td><?php if($component_Earning->fixed_amount==0) { ?> <?php echo @$component_Earning->operator; ?><?php } ?>
                                                      <input type="hidden" id="operetor_<?php echo $component_Earning->id; ?>" value="<?php if($component_Earning->fixed_amount==0) { ?> <?php echo @$component_Earning->operator; ?><?php } ?>">
                                                  </td>
                                                   <td><?php if($component_Earning->amount != '0.00'){ ?>
                                                       <input style="text-align: right;" type="text" onkeyup="salarycalculation(this.value,<?php echo $component_Earning->id; ?>)" id="percentage_<?php echo $component_Earning->id; ?>" class="form-control monthly_<?php echo $component_Earning->id; ?>" value="<?php if($component_Earning->fixed_amount==0) { ?><?php echo @$component_Earning->amount; ?><?php } ?>"><?php } ?></td>
                                                   </td>
                                                <td>
                                                    <input style="text-align: right;" type="text" id="monthly_<?php echo $component_Earning->id; ?>" class="form-control monthly_net_amount monthlySalaryClass monthly_<?php echo $component_Earning->id; ?>" value="<?php echo number_format($amt,2,'.', ''); ?>" disabled="disabled"></td>
                                                    <?php if($component_Earning->amount != '0.00'){ ?>
                                                <td>
                                                    <input style="text-align: right;" type="text" id="yearly_<?php echo $component_Earning->id; ?>" class="form-control yearly_net_amount  yearly_<?php echo $component_Earning->id; ?>" data-id="<?php echo $component_Earning->id; ?>" value="<?php echo number_format($amt1,2,'.', ''); ?>" disabled="disabled"></td>
                                                    <?php }else{ ?>
                                                    <td>
                                                    <input onkeypress="isNumberKey(event,this.value);" id="fixedamount_<?php echo $component_Earning->id; ?>" onkeyup="calculateSalary(),salarycalculation(this.value,<?php echo $component_Earning->id; ?>);" style="text-align: right;" type="text" data-id="<?php echo $component_Earning->id; ?>"  class="form-control yearly_net_amount yearlySalaryClass yearly_<?php echo $component_Earning->id; ?>" value="<?php echo number_format($amt1,2,'.', ''); ?>"></td>
                                                    <?php  } ?>
                                            </tr>
                                        <?php }} ?>  
                                        <?php
                                             $net_amt2 =  $basic_amt2 = $net_amt21 =  $basic_amt21 =  0;
                                             if(!empty($salary_component_Deduction)){ ?>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Deductions</td>
                                                <td></td>
                                            </tr> 

                                            <?php
                                                foreach ($salary_component_Deduction as $component_Deduction) {
                                                     $amt2 = $amt21 = 0;
                                                     
                                                        if($component_Deduction->amount != '0.00'){
                                                    $amount_per = (float) (!empty($component_Deduction->amount)) ? ($component_Deduction->amount/100) : 0;
                                                    if($component_Deduction->base_on == 'CTC'){
                                                        if($component_Deduction->operator == '*'){
                                                            $amt2 = (float) $ctcVal_monthly * $amount_per;
                                                            $amt21 = (float) $ctcVal * $amount_per;
                                                        }else if($component_Deduction->operator== '/'){
                                                            $amt2 = (float) $ctcVal_monthly / $amount_per;
                                                            $amt21 = (float) $ctcVal / $amount_per;
                                                        }else if($component_Deduction->operator== '+'){
                                                            $amt2 = (float) $ctcVal_monthly + $amount_per;
                                                            $amt21 = (float) $ctcVal + $amount_per;
                                                        }else if($component_Deduction->operator== '-'){
                                                            $amt2 = (float) $ctcVal_monthly - $amount_per;
                                                            $amt12 = (float) $ctcVal - $amount_per;
                                                        }
                                                    }else if($component_Deduction->base_on == 'Basic Salary'){
                                                        if($component_Deduction->operator == '*'){
                                                            $amt2 = (float) $basic_amt2 * $amount_per;
                                                            $amt21 = (float) $basic_amt21 * $amount_per;
                                                        }else if($component_Deduction->operator== '/'){
                                                            $amt2 = (float) $basic_amt2 / $amount_per;
                                                            $amt21 = (float) $basic_amt21 / $amount_per;
                                                        }else if($component_Deduction->operator== '+'){
                                                            $amt2 = (float) $basic_amt2 + $amount_per;
                                                            $amt21 = (float) $basic_amt21 + $amount_per;
                                                        }else if($component_Deduction->operator== '-'){
                                                            $amt2 = (float) $basic_amt2 - $amount_per;
                                                            $amt21 = (float) $basic_amt21 - $amount_per;
                                                        }
                                                    }

                                                    }else{
                                                    $amt = $component_Deduction->fixed_amount/12;
                                                    $amt1 = $component_Deduction->fixed_amount;

                                                }

                                                    if($component_Deduction->component == 'Basic Salary'){
                                                        $basic_amt2 = $amt2;
                                                        $basic_amt21 = $amt21;
                                                    }

                                                    $net_amt2 += $amt2;
                                                    $net_amt21 += $amt21;

                                                   ?>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><?php echo $component_Deduction->component; ?></td>
                                                <td>
                                                    <input style="text-align: right;" type="text" class="form-control inputDisabled" value="<?php echo number_format($amt2,2); ?>" disabled="disabled"></td>
                                                <td>
                                                    <input style="text-align: right;" type="text" class="form-control inputDisabled" value="<?php echo number_format($amt21,2); ?>" disabled="disabled"></td>
                                            </tr>
                                        <?php }} ?>


                                           <!--  <tr>
                                                <td>Over Time</td>
                                                <td><input type="text" class="form-control inputDisabled" value="0.00" disabled="disabled"></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Deductions</td>
                                                <td></td>
                                                <td><input type="text" class="form-control inputDisabled" value="0.00" disabled="disabled"></td>
                                            </tr>
                                            <tr>
                                                <td>Loan</td>
                                                <td></td>
                                                <td><input type="text"  class="form-control inputDisabled" value="0.00" disabled="disabled"></td>
                                            </tr>
                                            <tr>
                                                <td>Absent</td>
                                                <td></td>
                                                <td><input type="text" class="form-control inputDisabled" value="0.00" disabled="disabled"></td>
                                            </tr> -->
                                            <?php $net_amt_monthly = $net_amt - $net_amt2;
                                                  $net_amt_yearly = $net_amt1 - $net_amt21; ?>

                                            <tr>
                                                <td><b>Net Salary</b></td>
                                                <td></td>
                                                 <td></td>
                                                  <td></td>
                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled net_amt_monthly_cls" value="<?php echo number_format($net_amt_monthly,2,'.', ''); ?>" disabled="disabled"></td>
                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled net_amt_yearly_cls" value="<?php echo number_format($net_amt_yearly,2,'.', '');?>" disabled="disabled">
                                                    <span style="color: red; display: none;" class="net_amt_yearly_cls_span">CTC Amount and Net Salary Yearly must be same.</span></td>
                                            </tr>
                                            <?php 
                                            $PF = $this->EmployeesModel->check_pf_exist($master_salary_structureid);
                                            if(!empty($PF)){
                                                    $employee_pf_percent = $PF->employee_pf_percent; //die;
                                                    $employer_pf_percent = $PF->employer_pf_percent;
                                                    $totalpfpercentage = $employee_pf_percent+$employer_pf_percent;
                                                   $monthly_house_rent=$net_amt_monthly-$house_rent_amt;

                                                   $pf_monthly_house_rent=$totalpfpercentage*$monthly_house_rent/100;


                                                   $yearly_house_rent=$net_amt_yearly-$house_rent_amt1;

                                                   $pf_yearly_house_rent=$totalpfpercentage*$yearly_house_rent/100;

                                                ?>

                                            <tr>

                                                <td>PF <input type="checkbox" name="pf_show_checkbox" id="pfcheck" onclick="calculateSalary();" value="1" ></td>
                                                 <td></td>
                                                  <td></td>
                                                   <td></td>
                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled" id="mothlypf"  value="<?php echo number_format($pf_monthly_house_rent,2,'.', ''); ?>"></td>

                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled" id="yearlypf" value="<?php echo number_format($pf_yearly_house_rent,2,'.', ''); ?>"></td>
                                            </tr>
                                        <?php } ?>

                                        <?php 
                                            $ESI = $this->EmployeesModel->check_esi_exist($master_salary_structureid);
                                            if(!empty($ESI)){
                                                    $employee_esi_percent = $ESI->employee_esi_percent; //die;
                                                    $employer_esi_percent = $ESI->employer_esi_percent;
                                                    $totalesipercentage = $employee_esi_percent+$employer_esi_percent;
                                                   $monthly_house_rent=$net_amt_monthly-$house_rent_amt;

                                                   $esi_monthly_house_rent=$totalesipercentage*$monthly_house_rent/100;


                                                   $yearly_house_rent=$net_amt_yearly-$house_rent_amt1;

                                                   $esi_yearly_house_rent=$totalesipercentage*$yearly_house_rent/100;

                                                ?>

                                            <tr>

                                                <td>ESI <input type="checkbox" name="esi_show_checkbox" id="esicheck" onclick="calculateesi();" value="1" ></td>
                                                 <td></td>
                                                  <td></td>
                                                   <td></td>
                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled" id="mothlyesi" onkeyup="calculateesi();"  value="<?php echo number_format($esi_monthly_house_rent,2,'.', ''); ?>" disabled="disabled"></td>

                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled net_amt_monthly_cls" id="yearlyesi" onkeyup="calculateesi();"value="<?php echo number_format($esi_yearly_house_rent,2,'.', ''); ?>" disabled="disabled"></td>
                                            </tr>
                                        <?php } ?>

                                        <?php 
                                            $Ptax = $this->EmployeesModel->check_ptax_exist($master_salary_structureid);
                                                if(!empty($Ptax)){
                                                   $Ptax_deduction = $this->EmployeesModel->ptax_deduction($Ptax->state,$net_amt_monthly);
                                                   //print_r($Ptax_deduction);
                                          //$ptaxAmount = $Ptax_deduction->p_tax;
                                        $ptaxAmount = (!empty($Ptax_deduction->p_tax)) ? $Ptax_deduction->p_tax : '0';
                                        $monthly_ptax = $ptaxAmount;
                                        $yearly_ptax = $ptaxAmount*12;
                                                ?>

                                            <tr>

                                                <td>Ptax <input type="checkbox" name="ptax_show_checkbox" value="1" ></td>
                                                 <td></td>
                                                  <td></td>
                                                   <td></td>
                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled net_amt_monthly_cls" value="<?php echo number_format($monthly_ptax,2); ?>" disabled="disabled"></td>

                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled net_amt_monthly_cls" value="<?php echo number_format($yearly_ptax,2); ?>" disabled="disabled"></td>
                                            </tr>
                                        <?php } ?>

                                            <tr id="pf_modify" style='display: none;'>
                                                <td><input type="radio" name="pf" id="pf_normal" checked="">PAY generated PF<br><br>
                                                <input type="radio" name="pf" id="pf_modify">MODIFY PF value</td>
                                                <td><input type="text" class="form-control inputDisabled net_amt_monthly_cls pf_modify_amount" name="pf_amount" id="pf_amount" style="display: none; text-align: right;"  value="<?php echo number_format($pf_monthly_house_rent,2); ?>"></td>
                                                <td><input type="text" class="form-control inputDisabled net_amt_monthly_cls pf_modify_amount" name="pf_amount_yearly" style="display: none; text-align: right;"  value="<?php echo number_format($pf_monthly_house_rent*12,2); ?>"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- <div id="pf_modify" style='display: none;'>
                                        <input type="radio" name="pf" id="pf_normal">PAY normal generated PF value
                                        <input type="radio" name="pf" id="pf_modify">MODIFY PF value
                                        <input type="text" class="form-control inputDisabled net_amt_monthly_cls" name="pf_amount" style="display: none;" id="pf_modify_amount" value="<?php echo number_format($pf_monthly_house_rent,2); ?>">
                                    </div> -->

                                </div>
                            </div>
                        </div>
                    </div>


<script type="text/javascript">
    /*$(document).ready(function(){
        $('input[name="pf_show_checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                //alert("Checkbox is checked.");
                $('#pf_modify').hide(); // change show to hide

            }
            else if($(this).prop("checked") == false){
                //alert("Checkbox is unchecked.");
                $('#pf_modify').hide();

            }
        });

        $('input[id="pf_modify"]').click(function(){
            if($(this).prop("checked") == true){
                //alert("Checkbox is checked.");
                $('.pf_modify_amount').show();
            }
            else if($(this).prop("checked") == false){
                //alert("Checkbox is unchecked.");
                $('.pf_modify_amount').hide();
            }
        });
        $('input[id="pf_normal"]').click(function(){
            if($(this).prop("checked") == true){
                //alert("Checkbox is checked.");
                $('.pf_modify_amount').hide();
            }
            else if($(this).prop("checked") == false){
                //alert("Checkbox is unchecked.");
                $('.pf_modify_amount').show();
            }
        });



    });*/
function salarycalculation(value,id) {
  // alert('jj');
  var ctc='<?php echo $ctcVal; ?>';
  var monthlyctc = parseFloat(ctc)/12;
  var basedOn = $('#basedon_'+id).val();
  var operetor = $('#operetor_'+id).val().trim().toString(2);
  var percentage = $('#percentage_'+id).val();
  var fixedamount = $('#fixedamount_'+id).val();

  
  if(percentage != '0.00'){
    //alert(percentage);
    var amount = parseFloat(percentage) / 100;
    if(basedOn == 'CTC'){
        if(operetor == '*'){
           var monthly_amount = parseFloat(monthlyctc) * parseFloat(amount);
           var yearly_amount = parseFloat(ctc) * parseFloat(amount);
        }else if(operetor == '/'){
            var monthly_amount = parseFloat(monthlyctc) / parseFloat(amount);
           var yearly_amount = parseFloat(ctc) / parseFloat(amount);
        }else if(operetor == '+'){
            var monthly_amount = parseFloat(monthlyctc) + parseFloat(amount);
           var yearly_amount = parseFloat(ctc) + parseFloat(amount);
        }else if(operetor == '+'){
            var monthly_amount = parseFloat(monthlyctc) - parseFloat(amount);
           var yearly_amount = parseFloat(ctc) - parseFloat(amount);
        }
        $('#monthly_'+id).val(monthly_amount.toFixed(2));
        $('#yearly_'+id).val(yearly_amount.toFixed(2));
        
        
        //var yearly_amount = parseFloat(ctc) operetor parseFloat(amount);
  }else if(basedOn == 'Basic Salary'){
        var basic_id = $('#netsalary').find('.basicclass').val();
        var monthlybasic = $('#monthly_'+basic_id).val();
        var yearlybasic = $('#yearly_'+basic_id).val();
        if(operetor == '*'){
            var monthly_amount = parseFloat(monthlybasic) * parseFloat(amount);
            var yearly_amount = parseFloat(yearlybasic) * parseFloat(amount);
        }else if(operetor == '/'){
            var monthly_amount = parseFloat(monthlybasic) / parseFloat(amount);
            var yearly_amount = parseFloat(yearlybasic) / parseFloat(amount);
        }else if(operetor == '+'){
            var monthly_amount = parseFloat(monthlybasic) + parseFloat(amount);
            var yearly_amount = parseFloat(yearlybasic) + parseFloat(amount);
        }else if(operetor == '-'){
            var monthly_amount = parseFloat(monthlybasic) - parseFloat(amount);
            var yearly_amount = parseFloat(yearlybasic) - parseFloat(amount);
        }
        $('#monthly_'+id).val(monthly_amount.toFixed(2));
        $('#yearly_'+id).val(yearly_amount.toFixed(2));
  }
  var total_monthly = 0;
  var total_yearly = 0;
  $('.monthly_net_amount').each(function() {
    // console.log($(this).text());
      total_monthly += parseFloat($(this).val());
      
  });
  $('.net_amt_monthly_cls').val(total_monthly.toFixed(2));
  $('.yearly_net_amount').each(function() {
    // console.log($(this).text());
      total_yearly += parseFloat($(this).val());
      
  });
  $('.net_amt_yearly_cls').val(total_yearly.toFixed(2));

}

}

function calculatepf(){
    if($('#pfcheck').prop("checked") == true){
         var total_monthly = 0;
         var total_yearly = 0;
                $('.monthly_net_amount').each(function() {
                // console.log($(this).text());
                total_monthly += parseFloat($(this).val());

                });
               var net_amt_monthly = total_monthly;
               var totalmothlypf = parseFloat(net_amt_monthly) + parseFloat($('#mothlypf').val());
                $('.net_amt_monthly_cls').val(totalmothlypf.toFixed(2));

                $('.yearly_net_amount').each(function() {
                // console.log($(this).text());
                total_yearly += parseFloat($(this).val());

                });

                var net_amt_yearly = total_yearly;
                var totalyearlypf = parseFloat(net_amt_yearly) + parseFloat($('#yearlypf').val());
                $('.net_amt_yearly_cls').val(totalyearlypf.toFixed(2));
            }
            else if($('#pfcheck').prop("checked") == false){
                var total_monthly = 0;
                var total_yearly = 0;
                $('.monthly_net_amount').each(function() {
                // console.log($(this).text());
                total_monthly += parseFloat($(this).val());

                });
                $('.net_amt_monthly_cls').val(total_monthly.toFixed(2));
                $('.yearly_net_amount').each(function() {
                // console.log($(this).text());
                total_yearly += parseFloat($(this).val());

                });
                $('.net_amt_yearly_cls').val(total_yearly.toFixed(2));

            }
}

function calculateesi(){
    if($('#esicheck').prop("checked") == true){
         var total_monthly = 0;
         var total_yearly = 0;
                $('.monthly_net_amount').each(function() {
                // console.log($(this).text());
                total_monthly += parseFloat($(this).val());

                });
               var net_amt_monthly = total_monthly;
               var totalmothlyesi = parseFloat(net_amt_monthly) + parseFloat($('#mothlyesi').val());
                $('.net_amt_monthly_cls').val(totalmothlyesi.toFixed(2));

                $('.yearly_net_amount').each(function() {
                // console.log($(this).text());
                total_yearly += parseFloat($(this).val());

                });

                var net_amt_yearly = total_yearly;
                var totalyearlyesi = parseFloat(net_amt_yearly) + parseFloat($('#yearlyesi').val());
                $('.net_amt_yearly_cls').val(totalyearlyesi.toFixed(2));
            }
            else if($('#esicheck').prop("checked") == false){
                var total_monthly = 0;
                var total_yearly = 0;
                $('.monthly_net_amount').each(function() {
                // console.log($(this).text());
                total_monthly += parseFloat($(this).val());

                });
                $('.net_amt_monthly_cls').val(total_monthly.toFixed(2));
                $('.yearly_net_amount').each(function() {
                // console.log($(this).text());
                total_yearly += parseFloat($(this).val());

                });
                $('.net_amt_yearly_cls').val(total_yearly.toFixed(2));

            }
}

</script>