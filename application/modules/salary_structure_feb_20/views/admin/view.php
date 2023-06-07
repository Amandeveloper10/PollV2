<h6 class="form-box-heading">Net Salary Calculation</h6>
                  <div class="row mt-2">
                        <div class="col-12">
                            <div class="card panel panel-table" data-dashboard-widget>
                                <div class="card-block" data-widget-content>
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Description</th>
                                                <th>Monthly</th>
                                                <th>Yearly</th>
                                                <!-- <th>Additions</th>
                                                <th>Deductions</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="hidden" name="edit_id" id="edit_id" value=""></td>
                                                <td>Earnings</td>
                                                <td></td>
                                            </tr>
                                            <?php //echo "<pre>"; print_r($salary_component_Earning); die;
                                            $ctcVal_monthly = ($ctcVal/12);
                                            $master_salary_structureid = '';
                                             $net_amt =  $basic_amt = $net_amt1 =  $basic_amt1 = $house_rent_amt1 = $house_rent_amt = $pf_amt = $pf_amt1 = 0;
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

                                                 if(!empty($component_Earning->component) && $component_Earning->pf == 'Yes'){
                                                        $pf_amt += $amt;
                                                        $pf_amt1 += $amt1;
                                                    }


                                                    $net_amt += $amt;
                                                    $net_amt1 += $amt1;

                                                   ?>
                                            <tr>
                                                <td><?php echo $component_Earning->component; ?><?php if($component_Earning->fixed_amount==0) { ?> (<?php echo @$component_Earning->base_on; ?><?php echo @$component_Earning->operator; ?><?php echo @$component_Earning->amount; ?>)<?php } ?></td>
                                                <td>

                                                    <input style="text-align: right;" type="text" class="form-control inputDisabled monthlySalaryClass <?php if($component_Earning->pf == 'Yes'){ echo 'pfcount';} ?> <?php  if($component_Earning->component == 'Basic Salary'){ echo 'basicamount'; } ?> monthly_<?php echo $component_Earning->id; ?>" value="<?php echo number_format($amt,2,'.', ''); ?>" disabled="disabled"></td>
                                                    <?php if($component_Earning->amount != '0.00'){ ?>
                                                <td>
                                                    <input style="text-align: right;" type="text" class="form-control inputDisabled yearlySalaryClass yearly_<?php echo $component_Earning->id; ?>" data-id="<?php echo $component_Earning->id; ?>" value="<?php echo number_format($amt1,2,'.', ''); ?>" disabled="disabled"></td>
                                                    <?php }else{ ?>
                                                    <td>
                                                    <input onkeypress="isNumberKey(event,this.value);" onkeyup="calculateSalary(),calculateAmout('<?php echo $component_Earning->id; ?>');" style="text-align: right;" type="text" data-id="<?php echo $component_Earning->id; ?>"  class="form-control fixedamount yearlySalaryClass yearly_<?php echo $component_Earning->id; ?>" value="<?php echo number_format($amt1,2,'.', ''); ?>"></td>
                                                    <?php  } ?>
                                            </tr>
                                        <?php }} ?>  

                                        <tr>
                                                <td><b>Gross Earning</b></td>
                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled" id="monthly_gross_earning" value="<?php echo number_format($net_amt,2); ?>" disabled="disabled"></td>
                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled" id="yearly_gross_earning" value="<?php echo number_format($net_amt1,2); ?>" disabled="disabled">
                                                </td>
                                            </tr>

                                        <?php
                                             $net_amt2 =  $basic_amt2 = $net_amt21 =  $basic_amt21 =  0;
                                              ?>
                                            <tr>
                                                <td></td>
                                                <td>Deductions</td>
                                                <td></td>
                                            </tr> 

                                            <?php
                                            if(!empty($salary_component_Deduction)){
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
                                                <td><?php echo $component_Deduction->component; ?><?php if($component_Deduction->fixed_amount==0) { ?> (<?php echo @$component_Deduction->base_on; ?><?php echo @$component_Deduction->operator; ?><?php echo @$component_Deduction->amount; ?>)<?php } ?></td>
                                                <td>
                                                    <input style="text-align: right;" type="text" class="form-control inputDisabled" value="<?php echo number_format($amt2,2,'.', ''); ?>" disabled="disabled"></td>
                                                <td>
                                                    <input style="text-align: right;" type="text" class="form-control inputDisabled totaldeductions" value="<?php echo number_format($amt21,2,'.', ''); ?>" disabled="disabled"></td>
                                            </tr>
                                        <?php }} ?>
                                         <?php $net_amt_monthly = $net_amt - $net_amt2;
                                            $net_amt_yearly = $net_amt1 - $net_amt21; ?>
                                      
<?php 
                                            $PF = $this->EmployeesModel->check_pf_exist($master_salary_structureid);
                                            if(!empty($PF)){
                                                    $employee_pf_percent = $PF->employee_pf_percent; //die;
                                                    $employer_pf_percent = $PF->employer_pf_percent;
                                                    $letPfamount = '15000';
                                                    if((float)$basic_amt >= (float)$letPfamount){
                                                        $pf_monthly_house_rent=$basic_amt*$employee_pf_percent/100;
                                                        $choiceofpf = 'Y';
                                                        $pfAmountatjust = 'Y';
                                                    }elseif((float)$basic_amt < (float)$letPfamount && (float)$pf_amt >= (float)$letPfamount){
                                                        $pf_monthly_house_rent=$letPfamount*$employee_pf_percent/100;
                                                        $choiceofpf = 'N';
                                                        $pfAmountatjust = 'N';
                                                    }elseif((float)$basic_amt < (float)$letPfamount && (float)$pf_amt < (float)$letPfamount){
                                                        $pf_monthly_house_rent=$pf_amt*$employee_pf_percent/100;
                                                        $choiceofpf = 'N';
                                                        $pfAmountatjust = 'N';
                                                    }
                                                    $pf_yearly_house_rent=$pf_monthly_house_rent*12;
                                                    
                                                
                                                    $net_amt2 += $pf_monthly_house_rent;
                                                    $net_amt21 += $pf_yearly_house_rent;
                                               
                                                   
                                               

                                                ?>

                                            <tr>

                                                <td>PF (Employee Contribution)<?php if($choiceofpf == 'Y'){ ?><input type="checkbox" name="pf_show_checkbox" id="pfcheck" onclick="calculateSalary();" value="1" checked="checked" ><?php } else{ ?><input type="checkbox" name="pf_show_checkbox" id="pfcheck" disabled="" value="1" checked="checked" ><?php } ?>
                                                <input type="hidden"  id="percentage_employee" name="percentage_employee" value="<?php echo $employee_pf_percent;?>">
                                                 <input type="hidden" id="percentage_employer" id="percentage_employer" value="<?php echo $employer_pf_percent; ?>">
                                                </td>
                                                
                                                <td><input style="text-align: right;" type="text" class="form-control" id="employeemothlypf" name="employeemothlypf" onkeyup="calculatepfAmout();" <?php if($pfAmountatjust == 'N'){ echo 'disabled';}else{ echo '';}?> value="<?php echo number_format($pf_monthly_house_rent,2,'.', ''); ?>"></td>

                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled totaldeductions" id="employeeyearlypf"  name="employeeyearlypf" onkeyup="calculatepf();" disabled="disabled" value="<?php echo number_format($pf_yearly_house_rent,2,'.', ''); ?>">
                                                    <input style="text-align: right;" type="hidden" class="form-control inputDisabled" id="employeeyearlypfhidden" value="<?php echo number_format($pf_yearly_house_rent,2,'.', ''); ?>">
                                                </td>


                                            </tr>
                                        <?php } ?>

                                         <?php 
                                            $ESI = $this->EmployeesModel->check_esi_exist($master_salary_structureid);
                                            if(!empty($ESI)){
                                                    $employee_esi_percent = $ESI->employee_esi_percent; //die;
                                                    $employer_esi_percent = $ESI->employer_esi_percent;
                                                    $letesi = '21000';
                                                if($net_amt <= $letesi){
                                                    $checkedesi = 'N';
                                                    $esi_monthly_house_rent=$employee_esi_percent*$net_amt/100;
                                                    $esi_yearly_house_rent=$esi_monthly_house_rent*12;
                                                }else{
                                                    $checkedesi = 'Y';
                                                    $esi_monthly_house_rent=$employee_esi_percent*$net_amt/100;
                                                    $esi_yearly_house_rent=$esi_monthly_house_rent*12;
                                                }

                                                $net_amt2 += $esi_monthly_house_rent;
                                                $net_amt21 += $esi_yearly_house_rent;

                                                ?>

                                            <tr>

                                                <td>ESI (Employee Contribution)<?php if($checkedesi == 'Y'){ ?><input type="checkbox" name="esi_show_checkbox" id="esicheck" onclick="calculateSalary();" value="1" checked="checked" ><?php } else{ ?><input type="checkbox" name="esi_show_checkbox" id="esicheck" disabled="" value="1" checked="checked" ><?php } ?>

                                                <input type="hidden" name="percentage_esi_employee" id="percentage_esi_employee" value="<?php echo $employee_esi_percent;?>">
                                                <input type="hidden" name="percentage_esi_employer" id="percentage_esi_employer" value="<?php echo $employer_esi_percent;?>">
                                                </td>
                                               
                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled " id="employeemothlyesi"  value="<?php echo number_format($esi_monthly_house_rent,2,'.', ''); ?>" disabled="disabled"></td>

                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled totaldeductions" id="employeeyearlyesi" value="<?php echo number_format($esi_yearly_house_rent,2,'.', ''); ?>" disabled="disabled">

                                                     <input style="text-align: right;" type="hidden" class="form-control inputDisabled" id="employeeyearlyesihidden" value="<?php echo number_format($esi_yearly_house_rent,2,'.', ''); ?>">
                                                </td>
                                            </tr>
                                        <?php } ?>

                                        <?php 
                                            $Ptax = $this->EmployeesModel->check_ptax_exist($master_salary_structureid);
                                                if(!empty($Ptax)){
                                                   $Ptax_deduction = $this->EmployeesModel->ptax_deduction($Ptax->state,$net_amt);
                                                   //print_r($Ptax_deduction);
                                          //$ptaxAmount = $Ptax_deduction->p_tax;
                                        $ptaxAmount = (!empty($Ptax_deduction->p_tax)) ? $Ptax_deduction->p_tax : '0';
                                        $monthly_ptax = $ptaxAmount;
                                        $yearly_ptax = $ptaxAmount*12;
                                        $net_amt2 += $monthly_ptax;
                                        $net_amt21 += $yearly_ptax;
                                                ?>

                                            <tr>

                                                <td>Ptax <input type="hidden" id="ptaxcheck" onclick="calculateSalary();"  name="ptax_show_checkbox" value="1" >
                                                <input type="hidden" name="ptax_state" id="ptax_state" value="<?php echo $Ptax->state;?>">
                                                </td>
                                              
                                                <td><input style="text-align: right;" id="mothlyptax" type="text" class="form-control inputDisabled" value="<?php echo number_format($monthly_ptax,2,'.', ''); ?>" disabled="disabled"></td>

                                                <td><input style="text-align: right;" id="yearlyptax" type="text" class="form-control inputDisabled totaldeductions" value="<?php echo number_format($yearly_ptax,2,'.', ''); ?>" disabled="disabled"></td>
                                            </tr>
                                        <?php } ?>
                                           <tr>
                                                <td><b>Total Deduction</b></td>
                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled" id="total_deduction_monthly" value="<?php echo number_format($net_amt2,2); ?>" disabled="disabled"></td>
                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled" id="total_deduction_yearly" value="<?php echo number_format($net_amt21,2); ?>" disabled="disabled">
                                                </td>
                                            </tr>


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
                                           
                                            <?php $takehome_monthly = $net_amt - $net_amt2;
                                            $takehome_yearly = $net_amt1 - $net_amt21; ?>
                                            <tr>
                                                <td><b>Take Home</b></td>
                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled " id="total_takehome_monthly" value="<?php echo number_format($takehome_monthly,2); ?>" disabled="disabled"></td>
                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled " id="total_takehome_yearly" value="<?php echo number_format($takehome_yearly,2); ?>" disabled="disabled">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Benefits</td>
                                                <td></td>
                                            </tr> 

<?php 
                                            $net_amt3 =  $net_amt31 =  0;
                                            $PF = $this->EmployeesModel->check_pf_exist($master_salary_structureid);
                                            if(!empty($PF)){
                                                    $employee_pf_percent = $PF->employee_pf_percent; //die;
                                                    $employer_pf_percent = $PF->employer_pf_percent;
                                                    $letPfamountemplyer = '15000';
                                                    if((float)$basic_amt >= (float)$letPfamountemplyer){
                                                        $pf_monthly_house_rent=$basic_amt*$employer_pf_percent/100;
                                                        $choiceofpf = 'Y';
                                                        $pfAmountatjust = 'Y';
                                                    }elseif((float)$basic_amt < (float)$letPfamountemplyer && (float)$pf_amt >= (float)$letPfamountemplyer){
                                                        $pf_monthly_house_rent=$letPfamountemplyer*$employer_pf_percent/100;
                                                        $choiceofpf = 'N';
                                                        $pfAmountatjust = 'N';
                                                    }elseif((float)$basic_amt < (float)$letPfamountemplyer && (float)$pf_amt < (float)$letPfamountemplyer){
                                                        $pf_monthly_house_rent=$pf_amt*$employer_pf_percent/100;
                                                        $choiceofpf = 'N';
                                                        $pfAmountatjust = 'N';
                                                    }
                                                    $pf_yearly_house_rent=$pf_monthly_house_rent*12;
                                                    
                                               
                                                    $net_amt3 += $pf_monthly_house_rent;
                                                    $net_amt31 += $pf_yearly_house_rent;
                                                

                                                ?>

                                            <tr>

                                                <td>PF (Employer Contribution)</td>
                                                
                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled totalbenefitmonthly" id="employermothlypf" onkeyup="calculatepf();" disabled="disabled" value="<?php echo number_format($pf_monthly_house_rent,2,'.', ''); ?>"></td>

                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled totalbenefityearly" id="employeryearlypf" onkeyup="calculatepf();" disabled="disabled" value="<?php echo number_format($pf_yearly_house_rent,2,'.', ''); ?>">
                                                    <input style="text-align: right;" type="hidden" class="form-control inputDisabled" id="employeryearlypfhidden" value="<?php echo number_format($pf_yearly_house_rent,2,'.', ''); ?>">
                                                </td>

                                               
                                            </tr>
                                        <?php } ?>

                                         <?php 
                                            $ESI = $this->EmployeesModel->check_esi_exist($master_salary_structureid);
                                             if(!empty($ESI)){
                                                    $employee_esi_percent = $ESI->employee_esi_percent; //die;
                                                    $employer_esi_percent = $ESI->employer_esi_percent;
                                                    $letesi = '21000';
                                                if($net_amt <= $letesi){
                                                    $checkedesi = 'N';
                                                    $esi_monthly_house_rent=$employer_esi_percent*$net_amt/100;
                                                    $esi_yearly_house_rent=$esi_monthly_house_rent*12;
                                                }else{
                                                    $checkedesi = 'Y';
                                                    $esi_monthly_house_rent=$employer_esi_percent*$net_amt/100;
                                                    $esi_yearly_house_rent=$esi_monthly_house_rent*12;
                                                }

                                                $net_amt3 += $esi_monthly_house_rent;
                                                $net_amt31 += $esi_yearly_house_rent;

                                                ?>

                                            <tr>

                                                <td>ESI (Employer Contribution)</td>
                                               
                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled totalbenefitmonthly" id="employermothlyesi"  value="<?php echo number_format($esi_monthly_house_rent,2,'.', ''); ?>" disabled="disabled"></td>

                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled totalbenefityearly" id="employeryearlyesi" value="<?php echo number_format($esi_yearly_house_rent,2,'.', ''); ?>" disabled="disabled">
                                                     <input style="text-align: right;" type="hidden" class="form-control inputDisabled" id="employeryearlyesihidden" value="<?php echo number_format($esi_yearly_house_rent,2,'.', ''); ?>">
                                                </td>
                                            </tr>
                                        <?php } ?>
                                         <?php
                                         
                                            if(!empty($salary_component_benefit)){
                                                foreach ($salary_component_benefit as $component_benefit) {
                                                     $amtbenefit = $amtbenefit1 = 0;
                                                     
                                                        if($component_benefit->amount != '0.00'){
                                                    $amountper = (float) (!empty($component_benefit->amount)) ? ($component_benefit->amount/100) : 0;
                                                    if($component_benefit->base_on == 'CTC'){
                                                        if($component_benefit->operator == '*'){
                                                            $amtbenefit = (float) $ctcVal_monthly * $amountper;
                                                            $amtbenefit1 = (float) $ctcVal * $amountper;
                                                        }else if($component_benefit->operator== '/'){
                                                            $amtbenefit = (float) $ctcVal_monthly / $amountper;
                                                            $amtbenefit1 = (float) $ctcVal / $amountper;
                                                        }else if($component_benefit->operator== '+'){
                                                            $amtbenefit = (float) $ctcVal_monthly + $amountper;
                                                            $amtbenefit1 = (float) $ctcVal + $amountper;
                                                        }else if($component_benefit->operator== '-'){
                                                            $amtbenefit = (float) $ctcVal_monthly - $amountper;
                                                            $amtbenefit1 = (float) $ctcVal - $amountper;
                                                        }
                                                    }else if($component_benefit->base_on == 'Basic Salary'){
                                                        if($component_benefit->operator == '*'){
                                                            $amtbenefit = (float) $basic_amt2 * $amountper;
                                                            $amtbenefit1 = (float) $basic_amt21 * $amountper;
                                                        }else if($component_benefit->operator== '/'){
                                                            $amtbenefit = (float) $basic_amt2 / $amountper;
                                                            $amtbenefit1 = (float) $basic_amt21 / $amountper;
                                                        }else if($component_benefit->operator== '+'){
                                                            $amtbenefit = (float) $basic_amt2 + $amountper;
                                                            $amtbenefit1 = (float) $basic_amt21 + $amountper;
                                                        }else if($component_benefit->operator== '-'){
                                                            $amtbenefit = (float) $basic_amt2 - $amountper;
                                                            $amtbenefit1 = (float) $basic_amt21 - $amountper;
                                                        }
                                                    }

                                                    }else{
                                                    $amtbenefit = $component_benefit->fixed_amount/12;
                                                    $amtbenefit1 = $component_benefit->fixed_amount;

                                                }

                                                   
                                                    $net_amt3 += $amtbenefit;
                                                    $net_amt31 += $amtbenefit1;

                                                   ?>
                                            <tr>
                                                <td><?php echo $component_benefit->component; ?><?php if($component_benefit->fixed_amount==0) { ?> (<?php echo @$component_benefit->base_on; ?><?php echo @$component_benefit->operator; ?><?php echo @$component_benefit->amount; ?>)<?php } ?></td>
                                                <td>
                                                    <input style="text-align: right;" type="text" class="form-control inputDisabled totalbenefitmonthly" value="<?php echo number_format($amtbenefit,2,'.', ''); ?>" disabled="disabled"></td>
                                                <td>
                                                    <input style="text-align: right;" type="text" class="form-control inputDisabled totalbenefityearly" value="<?php echo number_format($amtbenefit1,2,'.', ''); ?>" disabled="disabled"></td>
                                            </tr>
                                            <?php }} ?>

                                              <tr>
                                                <td><b>Total Benefit</b></td>
                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled" id="total_benefit_monthly" value="<?php echo number_format($net_amt3,2); ?>" disabled="disabled"></td>
                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled" id="total_benefit_yearly" value="<?php echo number_format($net_amt31,2); ?>" disabled="disabled">
                                                </td>
                                            </tr>
                                            <?php $total_monthly_ctc = $net_amt + $net_amt3;
                                                  $total_yearly_ctc = $net_amt1 + $net_amt31; ?>

                                            <tr>
                                                <td><b>CTC</b><br>
                                                   <!-- <input type="checkbox" name="adjustcheck" onclick="calculateSalary();"  id="adjustcheck" value="1">-->
                                                 </td>
                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled net_amt_monthly_cls" id="total_monthly_ctc" value="<?php echo number_format($total_monthly_ctc,2,'.', ''); ?>" disabled="disabled"></td>
                                                <td><input style="text-align: right;" id="total_yearly_ctc" type="text" class="form-control inputDisabled net_amt_yearly_cls" value="<?php echo number_format($total_yearly_ctc,2,'.', ''); ?>" disabled="disabled">
                                                    <span style="color: red; display: none;" class="net_amt_yearly_cls_span">CTC Amount and Given CTC must be same.</span></td>
                                            </tr>

                                            <!--<tr id="pf_modify" style='display: none;'>
                                                <td><input type="radio" name="pf" id="pf_normal" checked="">PAY generated PF<br><br>
                                                <input type="radio" name="pf" id="pf_modify">MODIFY PF value</td>
                                                <td><input type="text" class="form-control inputDisabled pf_modify_amount" name="pf_amount" id="pf_amount" style="display: none; text-align: right;"  value="<?php echo number_format($pf_monthly_house_rent,2); ?>"></td>
                                                <td><input type="text" class="form-control inputDisabled pf_modify_amount" name="pf_amount_yearly" style="display: none; text-align: right;"  value="<?php echo number_format($pf_monthly_house_rent*12,2); ?>"></td>
                                            </tr>-->
                                            <tr>
                                                <td></td>
                                                <td>Incentive / Reimbursement</td>
                                                <td></td>
                                            </tr>
                                            <?php if(!empty($all_component_incentive_reimbursement)){
                                                foreach($all_component_incentive_reimbursement as $incentive_reimbursement){?>
                                             <tr>
                                                <td><?php echo $incentive_reimbursement->component;?><input type="checkbox" name="esi_show_checkbox" id="esicheck" value="1">
                                                </td>
                                               
                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled" id="employeemothlyesi"  value=""></td>

                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled totaldeductions" id="employeeyearlyesi" value="">
                                                </td>
                                            </tr> 
                                        <?php } } ?>
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
    $(document).ready(function(){
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



    });
</script>