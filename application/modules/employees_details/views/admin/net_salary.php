<h6 class="mb-4">Net Salary Calculation</h6>
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
                                                <td>Earnings<input type="hidden" name="edit_id" id="edit_id" value=""></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <?php //echo "<pre>"; print_r($salary_component_Earning); die;
                                            $ctcVal_monthly = ($ctcVal/12);
                                            $master_salary_structureid = '';
                                             $net_amt =  $basic_amt = $net_amt1 =  $basic_amt1 = $house_rent_amt1 = $house_rent_amt = $pf_amt = $pf_amt1 = $TEexceptSA = 0;
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

                                                if($component_Earning->alias == 'Basic Salary'){
                                                        $basic_amt = $amt;
                                                        $basic_amt1 = $amt1;
                                                    }

                                                if(!empty($component_Earning->alias) && $component_Earning->alias == 'House Rent Allowance'){
                                                        $house_rent_amt = $amt;
                                                        $house_rent_amt1 = $amt1;
                                                    }

                                                 if(!empty($component_Earning->alias) && $component_Earning->pf == 'Yes'){
                                                        $pf_amt += $amt;
                                                        $pf_amt1 += $amt1;
                                                    }
                                                if(!empty($component_Earning->alias) && $component_Earning->component_id != '20'){
                                                    $TEexceptSA += $amt1;
                                                    
                                                }


                                                    $net_amt += $amt;
                                                    $net_amt1 += $amt1;

                                                   ?>
                                            <tr>
                                                <td><?php echo $component_Earning->component; ?><?php if($component_Earning->fixed_amount==0) { ?> (<?php echo @$component_Earning->base_on; ?><?php echo 'x'//@$component_Earning->operator; ?><?php echo round(@$component_Earning->amount).'%'; ?>)<?php }else{ if($component_Earning->component_id == '20'){ echo ' (Balancing Amount)';}else{echo ' (Fixed)';} } ?></td>
                                                <td>

                                                    <input style="text-align: right;" type="text" class="form-control inputDisabled monthlySalaryClass  <?php  if($component_Earning->alias == 'Basic Salary'){ echo 'basicamount'; } ?> monthly_<?php echo $component_Earning->id; ?> sAmonthly_<?php echo $component_Earning->component_id; ?>" value="<?php echo number_format(round($amt),2,'.', ''); ?>" disabled="disabled"></td>
                                                    <?php if($component_Earning->amount != '0.00'){ ?>
                                                <td>
                                                    <input style="text-align: right;" type="text" class="form-control inputDisabled yearlySalaryClass <?php if($component_Earning->pf == 'Yes'){ echo 'pfcount';} ?> yearlyamount yearly_<?php echo $component_Earning->id; ?>" data-id="<?php echo $component_Earning->id; ?>" value="<?php echo number_format(round($amt1),2,'.', ''); ?>" disabled="disabled"></td>
                                                    <?php }else{ ?>
                                                    <td>
                                                    <input onkeypress="isNumberKey(event,this.value);" onkeyup="calculateSalary(),calculateAmout('<?php echo $component_Earning->id; ?>');" disabled="disabled" style="text-align: right;" type="text" data-id="<?php echo $component_Earning->id; ?>"  class="form-control fixedamount yearlySalaryClass <?php if($component_Earning->pf == 'Yes'){ echo 'pfcount';} ?> sAyearly_<?php echo $component_Earning->component_id; ?> yearlyamount yearly_<?php echo $component_Earning->id; ?>" value="<?php echo number_format(round($amt1),2,'.', ''); ?>"></td>
                                                    <?php  } ?>
                                            </tr>
                                        <?php }} ?>  

                                        <tr>
                                                <td><b>Gross Earning</b></td>
                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled" id="monthly_gross_earning" value="<?php echo number_format(round($net_amt),2); ?>" disabled="disabled"></td>
                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled" id="yearly_gross_earning" value="<?php echo number_format(round($net_amt1),2); ?>" disabled="disabled">
                                                </td>
                                            </tr>

                                        <?php
                                             $net_amt2 =  $basic_amt2 = $net_amt21 =  $basic_amt21 =  0;
                                              ?>
                                            <tr>
                                                <td>Deductions</td>
                                                <td></td>
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

                                                    if($component_Deduction->alias == 'Basic Salary'){
                                                        $basic_amt2 = $amt2;
                                                        $basic_amt21 = $amt21;
                                                    }

                                                    $net_amt2 += $amt2;
                                                    $net_amt21 += $amt21;

                                                   ?>
                                            <tr>
                                                <td><?php echo $component_Deduction->component; ?><?php if($component_Deduction->fixed_amount==0) { ?> (<?php echo @$component_Deduction->base_on; ?><?php echo @$component_Deduction->operator; ?><?php echo @$component_Deduction->amount; ?>)<?php } ?></td>
                                                <td>
                                                    <input style="text-align: right;" type="text" class="form-control inputDisabled" value="<?php echo number_format(round($amt2),2,'.', ''); ?>" disabled="disabled"></td>
                                                <td>
                                                    <input style="text-align: right;" type="text" class="form-control inputDisabled totaldeductions" value="<?php echo number_format(round($amt21),2,'.', ''); ?>" disabled="disabled"></td>
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
                                                        $pf_monthly_house_rent=$pf_amt*$employee_pf_percent/100;
                                                        $choiceofpf = 'N';
                                                        $pfAmountatjust = 'Y';
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

                                                <td>PF (Employee Contribution <?=$employee_pf_percent.'%'?>)<?php if($choiceofpf == 'Y'){ ?><input type="checkbox" name="pf_show_checkbox" id="pfcheck" onclick="calculateSalary(),adjust();" value="1" checked="checked" ><?php } else{ ?><input type="checkbox" name="pf_show_checkbox" id="pfcheck" disabled="" value="1" checked="checked" ><?php } ?> 
                                                <?php if($pfAmountatjust == 'Y'){ ?><button type="button" id="pf_button" class="btn btn-info" data-toggle="modal" data-target="#myModalpf">Open Modal</button><? } ?>
                                                <input type="hidden"  id="percentage_employee" name="percentage_employee" value="<?php echo $employee_pf_percent;?>">
                                                 <input type="hidden" id="percentage_employer" id="percentage_employer" value="<?php echo $employer_pf_percent; ?>">
                                                 <input type="hidden" name="pf_based_on" id="pf_based_on" value="Actual">

                                                 
                                                </td>
                                                
                                                <td><input style="text-align: right;" type="text" class="form-control" id="employeemothlypf" disabled="disabled" name="employeemothlypf" onkeyup="calculatepfAmout();" <?php if($pfAmountatjust == 'N'){ echo 'disabled';}else{ echo '';}?> value="<?php echo number_format(round($pf_monthly_house_rent),2,'.', ''); ?>"></td>

                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled totaldeductions" id="employeeyearlypf"  name="employeeyearlypf" onkeyup="calculatepf();" readonly="readonly" value="<?php echo number_format(round($pf_yearly_house_rent),2,'.', ''); ?>">
                                                    <input style="text-align: right;" type="hidden" class="form-control inputDisabled" id="employeeyearlypfhidden" value="<?php echo number_format(round($pf_yearly_house_rent),2,'.', ''); ?>">
                                                </td>


                                            </tr>
                                        <?php }else{ ?>
                                        <input type="hidden" id="pfcheck" value="0" >
                                        <?php } ?>

                                         <?php 
                                            $ESI = $this->EmployeesModel->check_esi_exist($master_salary_structureid);
											//print_r($ESI); //die;
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

                                                <td>ESI (Employee Contribution <?=$employee_esi_percent.'%'?>)<?php if($checkedesi == 'Y'){ ?><input type="checkbox" name="esi_show_checkbox" id="esicheck" onclick="calculateSalary(),adjust();" value="1" checked="checked" ><?php } else{ ?><input type="checkbox" name="esi_show_checkbox" id="esicheck" disabled="" value="1" checked="checked" ><?php } ?>

                                                <input type="hidden" name="percentage_esi_employee" id="percentage_esi_employee" value="<?php echo $employee_esi_percent;?>">
                                                <input type="hidden" name="percentage_esi_employer" id="percentage_esi_employer" value="<?php echo $employer_esi_percent;?>">
                                                </td>
                                               
                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled " id="employeemothlyesi" name="employeemothlyesi"  value="<?php echo number_format(round($esi_monthly_house_rent),2,'.', ''); ?>" readonly="readonly"></td>

                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled totaldeductions" id="employeeyearlyesi" name="employeeyearlyesi" value="<?php echo number_format(round($esi_yearly_house_rent),2,'.', ''); ?>" readonly="readonly">

                                                     <input style="text-align: right;" type="hidden" class="form-control inputDisabled" id="employeeyearlyesihidden" value="<?php echo number_format(round($esi_yearly_house_rent),2,'.', ''); ?>">
                                                </td>
                                            </tr>
                                        <?php } else { ?>
                                        <input type="hidden" id="esicheck" value="0" >
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
                                              
                                                <td><input style="text-align: right;" id="mothlyptax" type="text" class="form-control inputDisabled" value="<?php echo number_format(round($monthly_ptax),2,'.', ''); ?>" disabled="disabled"></td>

                                                <td><input style="text-align: right;" id="yearlyptax" type="text" class="form-control inputDisabled totaldeductions" value="<?php echo number_format(round($yearly_ptax),2,'.', ''); ?>" disabled="disabled"></td>
                                            </tr>
                                         <?php }else{ ?>
                                        <input type="hidden" id="ptaxcheck"  value="0" >
                                        <input type="hidden" id="ptax_state" value="">
                                        <?php } ?>
                                           <tr>
                                                <td><b>Total Deduction</b></td>
                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled" id="total_deduction_monthly" value="<?php echo number_format(round($net_amt2),2); ?>" disabled="disabled"></td>
                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled" id="total_deduction_yearly" value="<?php echo number_format(round($net_amt21),2); ?>" disabled="disabled">
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
                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled " id="total_takehome_monthly" value="<?php echo number_format(round($takehome_monthly),2); ?>" disabled="disabled"></td>
                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled " id="total_takehome_yearly" value="<?php echo number_format(round($takehome_yearly),2); ?>" disabled="disabled">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Benefits</td>
                                                <td></td>
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
                                                        $pf_monthly_house_rent=$pf_amt*$employer_pf_percent/100;
                                                        $choiceofpf = 'N';
                                                        $pfAmountatjust = 'Y';
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

                                                <td>PF (Employer Contribution <?=$employer_pf_percent.'%'?>)</td>
                                                
                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled totalbenefitmonthly" id="employermothlypf" name="employermothlypf" onkeyup="calculatepf();" readonly="readonly" value="<?php echo number_format(round($pf_monthly_house_rent),2,'.', ''); ?>"></td>

                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled totalbenefityearly" id="employeryearlypf" name="employeryearlypf" onkeyup="calculatepf();" readonly="readonly" value="<?php echo number_format(round($pf_yearly_house_rent),2,'.', ''); ?>">
                                                    <input style="text-align: right;" type="hidden" class="form-control inputDisabled" id="employeryearlypfhidden" value="<?php echo number_format(round($pf_yearly_house_rent),2,'.', ''); ?>">
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

                                                <td>ESI (Employer Contribution <?=$employer_esi_percent.'%'?>)<input type="hidden" name="esi_emper_per" id="esi_emper_per" value="<?php echo $employer_esi_percent ?>"><input type="hidden" name="esi_empeee_per" id="esi_empeee_per" value="<?php echo $employee_esi_percent ?>"></td>
                                               
                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled totalbenefitmonthly" id="employermothlyesi" name="employermothlyesi"  value="<?php echo number_format(round($esi_monthly_house_rent),2,'.', ''); ?>" readonly="readonly"></td>

                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled totalbenefityearly" id="employeryearlyesi" name="employeryearlyesi" value="<?php echo number_format(round($esi_yearly_house_rent),2,'.', ''); ?>" readonly="readonly">
                                                     <input style="text-align: right;" type="hidden" class="form-control inputDisabled" id="employeryearlyesihidden" value="<?php echo number_format(round($esi_yearly_house_rent),2,'.', ''); ?>">
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
                                                    <input style="text-align: right;" type="text" class="form-control inputDisabled  totalbenefitmonthly" value="<?php echo number_format(round($amtbenefit),2,'.', ''); ?>" disabled="disabled"></td>
                                                <td>
                                                    <input style="text-align: right;" type="text" class="form-control inputDisabled yearlyamount totalbenefityearly" data-id="<?php echo $component_benefit->id; ?>" value="<?php echo number_format(round($amtbenefit1),2,'.', ''); ?>" disabled="disabled"></td>
                                            </tr>
                                            <?php }} ?>

                                              <tr>
                                                <td><b>Total Benefit</b></td>
                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled" id="total_benefit_monthly" value="<?php echo number_format(round($net_amt3),2); ?>" disabled="disabled"></td>
                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled" id="total_benefit_yearly" value="<?php echo number_format(round($net_amt31),2); ?>" disabled="disabled">
                                                </td>
                                            </tr>
                                            <?php $total_monthly_ctc = $net_amt + $net_amt3;
                                                  $total_yearly_ctc = $net_amt1 + $net_amt31; ?>

                                            <tr>
                                                <td><b>Cost to Company (CTC)</b><!-- <br><b>Re-calculate components total</b><input type="checkbox" name="adjust" id="adjust" onclick="adjust();" value="0"><br>
                                                   <!-- <input type="checkbox" name="adjustcheck" onclick="calculateSalary();"  id="adjustcheck" value="1">-->
                                                 </td>
                                                <td><input style="text-align: right;" type="text" class="form-control inputDisabled net_amt_monthly_cls" id="total_monthly_ctc" value="<?php echo number_format(round($total_monthly_ctc),2,'.', ''); ?>" disabled="disabled"></td>
                                                <td><input style="text-align: right;" id="total_yearly_ctc" type="text" class="form-control inputDisabled net_amt_yearly_cls" value="<?php echo number_format(round($total_yearly_ctc),2,'.', ''); ?>" disabled="disabled">
                                                    <span style="color: red; display: none;" class="net_amt_yearly_cls_span">CTC Amount and Given CTC must be same.</span></td>
                                            </tr>

                                            <!--<tr id="pf_modify" style='display: none;'>
                                                <td><input type="radio" name="pf" id="pf_normal" checked="">PAY generated PF<br><br>
                                                <input type="radio" name="pf" id="pf_modify">MODIFY PF value</td>
                                                <td><input type="text" class="form-control inputDisabled pf_modify_amount" name="pf_amount" id="pf_amount" style="display: none; text-align: right;"  value="<?php echo number_format($pf_monthly_house_rent,2); ?>"></td>
                                                <td><input type="text" class="form-control inputDisabled pf_modify_amount" name="pf_amount_yearly" style="display: none; text-align: right;"  value="<?php echo number_format($pf_monthly_house_rent*12,2); ?>"></td>
                                            </tr>-->
                                           <!-- <tr>
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
                                        <?php } } ?>-->
                                        </tbody>
                                    </table>

                                    <?php
 $non_ctc_components = $this->EmployeesModel->check_non_ctc_component_exist($master_salary_structureid);
 //echo '<pre>'; print_r($non_ctc_components); die;
   if (!empty($non_ctc_components)) { 
    $nonctcArr = explode(',', rtrim($non_ctc_components->not_part_ctc_component_id, ","));?>
<div class="row mt-2">
    <div class="col-12">
        <h5>Not part of CTC</h5>
    <div class="card mb-3" style="border-top:0">
    <div class="card-block  p-0" data-widget-content>
    <table class="table table-bordered mb-0">    
   <tbody>
    
     <?php
  
                 
                    foreach ($nonctcArr as $key=>$value) {
                      $formula = '';
                        $data_single_formula = $this->EmployeesModel->get_row_data('master_salary_component_formula',array('component_id'=>$value));
                        $data_component = $this->EmployeesModel->get_row_data('master_salary_component',array('id'=>$value));
                        if(!empty($data_single_formula)){
                          if($data_single_formula->component == 'gross_amount'){
                            $formula = 'Gross / '.$data_single_formula->day_type.' * '.$data_single_formula->day_type_1;
                          }else{
                            $componentArr = explode(',', $data_single_formula->component);
                            $operatorArr = explode(',', $data_single_formula->operator);
                             $com_operator = '';
                            foreach ($componentArr as $key => $value) {
                               $component_name = $this->EmployeesModel->get_row_data('master_salary_component',array('id'=>$value));
                               $com_operator .= $component_name->component.' '.$operatorArr[$key];
                            }
                            $formula = $com_operator.' '.$data_single_formula->fixed_amount.' / '.$data_single_formula->day_type.' * '.$data_single_formula->day_type_1;
                          }
                        }
                  ?>
  <tr>
      <td><div class="custom-control custom-checkbox">            
      <input type="checkbox"  class="custom-control-input" name="not_part_of_ctc" id="not_part_of_ctc<?=$data_component->id?>" onclick="Checknotpartofsalary();" value="<?php echo $data_component->id; ?>">
      <label class="custom-control-label" for="not_part_of_ctc<?=$data_component->id?>"><?php echo $data_component->component;?></label>
      </div>
      <input type="hidden" name="not_part_ctc_component_id" id="not_part_ctc_component_id" value=""> 
      </td>
      <td colspan="2"> <?=$formula?>
      </td>
    </tr>


<?php } ?>
</tbody>


    

  </table>
</div>
</div>
</div>
</div>
<?php } ?>


                <div class="row">
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Applicable From</label>
                               <input class="form-control mysingle_date" id="application_date" name="application_date" type="text" placeholder="Select Date..">
                            </div>
                        </div>
                        <div class="col-xl-12">                            
                                <label for="" class="form-control-label">Note</label>
                                <textarea  placeholder="Enter note" class="form-control" name='note'  id="salary_note" rows="4"></textarea>                            
                        </div> 
                        </div>                                   
             
<div class="modal" id="myModalpf">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="notification_heading_pf"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" >
       <p id="notification_body_pf">
            <div class="form-group">
            <label>Pf On</label>
            <select class="form-control" id="pf_on" onclick="getpftype();" name="pf_on">
                   <option value='Actual'>Actual</option>
                   <option value='Fixed'>Fixed</option>                                 
            </select>      
        </div>  
       </p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <a data-dismiss="modal" id="modal_confirm" class="btn btn-primary" href="#">Confirm</a> 
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


<script type="text/javascript">
 $('.mysingle_date').daterangepicker({
           locale: {format: dateformat},
            singleDatePicker:true,
            showDropdowns:true            
        });
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


      function adjust(){
        var ctc = '<?=$ctcVal?>';
        var HRA = '<?=$house_rent_amt1?>';

        var Basic = '<?=$basic_amt1?>';
        var pf = 0;
        var benefitAmount = '<?php if(!empty(@$amtbenefit1)){ echo @$amtbenefit1; }else{ echo '0'; }?>';
       // alert(benefitAmount);
        var Employer_pf_percentage = '<?=@$employer_pf_percent?>';
		
		
        var Employer_esi_percentage = '<?=@$employer_esi_percent?>';
		if(Employer_esi_percentage != ''){
			var pfesi_percentage = parseFloat(Employer_pf_percentage)+parseFloat(Employer_esi_percentage)+100;
		var esi_percentage = parseFloat(Employer_esi_percentage)+100;
		}else{
        var pfesi_percentage = '1';
		var esi_percentage = '1';
		}
        var pf_percentage = parseFloat(Employer_pf_percentage)+100;
        
        var gross = 0;
        var Earning = '<?=$TEexceptSA?>';
        var special_amount = 0;
        var monthly_SA = 0;
        var yearly_SA = 0;

        var pf_type = $('#pf_based_on').val();
        
        if ($('#pfcheck').prop('checked') == true && $('#esicheck').prop('checked') == true) {
            if(pf_type == 'Fixed'){
             gross = (parseFloat(ctc) - parseFloat(21600) - parseFloat(benefitAmount))*100/parseFloat(esi_percentage);
            special_amount = parseFloat(gross) - parseFloat(Earning);
            monthly_SA = Math.round(special_amount/12);

            yearly_SA = Math.round(special_amount);
            //alert(yearly_SA);
            $('.sAmonthly_20').val(monthly_SA);
            $('.sAyearly_20').val(yearly_SA);   
            }else{
            if(parseFloat(Basic) < '180000'){
            gross = (parseFloat(ctc) + parseFloat(HRA)*12/100 - parseFloat(benefitAmount))*100/parseFloat(pfesi_percentage);
           
            special_amount = parseFloat(gross) - parseFloat(Earning);
            monthly_SA = Math.round(special_amount/12);

            yearly_SA = Math.round(special_amount);
            //alert(yearly_SA);
            $('.sAmonthly_20').val(monthly_SA);
            $('.sAyearly_20').val(yearly_SA);
            }else{
                gross = (parseFloat(ctc) - parseFloat(Basic)*12/100 - parseFloat(benefitAmount))*100/parseFloat(esi_percentage);
           
            special_amount = parseFloat(gross) - parseFloat(Earning);
            monthly_SA = Math.round(special_amount/12);

            yearly_SA = Math.round(special_amount);
            //alert(yearly_SA);
            $('.sAmonthly_20').val(monthly_SA);
            $('.sAyearly_20').val(yearly_SA);   
            }
        }

            
        }else if($('#pfcheck').prop('checked') == true && $('#esicheck').prop('checked') == false){
             if(pf_type == 'Fixed'){
                gross = (parseFloat(ctc) - parseFloat(21600) - parseFloat(benefitAmount));
           
            special_amount = parseFloat(gross) - parseFloat(Earning);
            monthly_SA = Math.round(special_amount/12);

            yearly_SA = Math.round(special_amount);
            //alert(yearly_SA);
            $('.sAmonthly_20').val(monthly_SA);
            $('.sAyearly_20').val(yearly_SA);  
            }else{
              if(parseFloat(Basic) < '180000'){
            
            gross = (parseFloat(ctc) + parseFloat(HRA)*12/100 - parseFloat(benefitAmount))*100/parseFloat(pf_percentage);
           
            special_amount = parseFloat(gross) - parseFloat(Earning);
            monthly_SA = Math.round(special_amount/12);

            yearly_SA = Math.round(special_amount);
            //alert(yearly_SA);
            $('.sAmonthly_20').val(monthly_SA);
            $('.sAyearly_20').val(yearly_SA);
            }else{
            gross = (parseFloat(ctc) - parseFloat(Basic)*12/100 - parseFloat(benefitAmount));
           
            special_amount = parseFloat(gross) - parseFloat(Earning);
            monthly_SA = Math.round(special_amount/12);

            yearly_SA = Math.round(special_amount);
            //alert(yearly_SA);
            $('.sAmonthly_20').val(monthly_SA);
            $('.sAyearly_20').val(yearly_SA);   
            }
        }

           
        }else if($('#pfcheck').prop('checked') == false && $('#esicheck').prop('checked') == true){
            gross = (parseFloat(ctc) - parseFloat(benefitAmount))*100/parseFloat(esi_percentage);
            special_amount = parseFloat(gross) - parseFloat(Earning);
            monthly_SA = Math.round(special_amount/12);

            yearly_SA = Math.round(special_amount);
            //alert(yearly_SA);
            $('.sAmonthly_20').val(monthly_SA);
            $('.sAyearly_20').val(yearly_SA); 
        }else if($('#pfcheck').prop('checked') == false && $('#esicheck').prop('checked') == false){
            gross = (parseFloat(ctc) - parseFloat(benefitAmount));
            special_amount = parseFloat(gross) - parseFloat(Earning);
            monthly_SA = Math.round(special_amount/12);

            yearly_SA = Math.round(special_amount);
            //alert(yearly_SA);
            $('.sAmonthly_20').val(monthly_SA);
            $('.sAyearly_20').val(yearly_SA); 
        }else if($('#pfcheck').prop('checked') == true){
			if(pf_type == 'Fixed'){
                gross = (parseFloat(ctc) - parseFloat(21600) - parseFloat(benefitAmount));
           
            special_amount = parseFloat(gross) - parseFloat(Earning);
            monthly_SA = Math.round(special_amount/12);

            yearly_SA = Math.round(special_amount);
            //alert(yearly_SA);
            $('.sAmonthly_20').val(monthly_SA);
            $('.sAyearly_20').val(yearly_SA);  
            }else{
              if(parseFloat(Basic) < '180000'){
            
            gross = (parseFloat(ctc) + parseFloat(HRA)*12/100 - parseFloat(benefitAmount))*100/parseFloat(pf_percentage);
           
            special_amount = parseFloat(gross) - parseFloat(Earning);
            monthly_SA = Math.round(special_amount/12);

            yearly_SA = Math.round(special_amount);
            //alert(yearly_SA);
            $('.sAmonthly_20').val(monthly_SA);
            $('.sAyearly_20').val(yearly_SA);
            }else{
            gross = (parseFloat(ctc) - parseFloat(Basic)*12/100 - parseFloat(benefitAmount));
           
            special_amount = parseFloat(gross) - parseFloat(Earning);
            monthly_SA = Math.round(special_amount/12);

            yearly_SA = Math.round(special_amount);
            //alert(yearly_SA);
            $('.sAmonthly_20').val(monthly_SA);
            $('.sAyearly_20').val(yearly_SA);   
            }
        }
		}else if($('#esicheck').prop('checked') == true){
			gross = (parseFloat(ctc) - parseFloat(benefitAmount))*100/parseFloat(esi_percentage);
            special_amount = parseFloat(gross) - parseFloat(Earning);
            monthly_SA = Math.round(special_amount/12);

            yearly_SA = Math.round(special_amount);
            //alert(yearly_SA);
            $('.sAmonthly_20').val(monthly_SA);
            $('.sAyearly_20').val(yearly_SA); 
		}

        calculateSalary();
      }

    function getpftype(){
    var pf_on = $('#pf_on').val();

    $("#modal_confirm").click(function() {
         $('#pf_based_on').val(pf_on);
        if(pf_on == 'Fixed'){
            var totalpf = 1800*12;
             $('#employeemothlypf').val('1800');
             $('#employeeyearlypf').val(totalpf);

             $('#employermothlypf').val('1800');
             $('#employeryearlypf').val(totalpf);

            
        }
        adjust();
    });
   
    //$("#adjust"). prop("checked", false);
    }

    function Checknotpartofsalary() {
       var ids = [];
          $('input[name=not_part_of_ctc]:checked').each(function() {
            //  alert($(this).val());
               ids.push($(this).val());
            });
            //alert(ids);
           $("#not_part_ctc_component_id").val(ids);
          
    }
</script>