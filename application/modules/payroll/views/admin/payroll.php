<table id="ks-datatable" class="table ks-table-info dt-responsive nowrap" width="100%" data-pagination="true">
                        <thead>
                        <tr>
                            <th><input style="display:none;" checked onclick="CheckAllChk(this);" name="test" type="checkbox" value="all"></th>
                            <th>Employee No.</th>
                            <th>Name</th>
                            <th>Salary</th>
                            <th>Overtime1</th>
<!--                            <th>Bonus</th>-->
<!--                            <th>Status</th>-->
                            <!-- <th>&nbsp;</th> -->
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            //echo "<pre>"; print_r($all_data); die;
                            $sl = 1;
                            if (!empty($all_data)) {
                                foreach ($all_data as $data) {
                               $addhocpay = $this->PayrollModel->load_all_employee_with_hold($month,$year,$data->id);
                               $addhocamount = $this->PayrollModel->load_all_employee_with_addhoc($month,$year,$data->id);
                           if(@$addhocpay->employee_id !=$data->id) {   
                                    if(!empty($data->ctc_amount))
                                    {
                                    $ctcVal = $data->ctc_amount;
                                    }
                                    else{
                                     $ctcVal =0.00;   
                                    }
                                    $ctcVal_monthly = ($ctcVal / 12);
                                    $net_amt = $basic_amt = $net_amt1 = $basic_amt1 = $earning = $deduction = $amount_per = $fixedamount = 0.00;
                                    $structure_details = ($data->salary_structure_details != '') ? json_decode($data->salary_structure_details) : array();
                                    //echo "<pre>"; print_r($structure_details); die;

                                    if (!empty($structure_details)) {
                                        foreach ($structure_details as $details) {
                                            
                                            
                                            
                                            
                                            $amt = $amt1 = 0;
                                           if($details->amount != 0.00)
                            {
                         $amount_per = (float) (!empty($details->amount)) ? ($details->amount / 100) : 0.00;
                            }
                             if($details->fixed_amount > 0.00){
                              $fixedamount =  (float) $details->fixed_amount / 12 ;
                            }
                            
                          $basic_amt = (float) $ctcVal_monthly * $amount_per;
                           $basic_amt1 = (float) $ctcVal * $amount_per;
                           if($fixedamount == 0.00)
                           {
                              
                            if (@$details->base_on == 'CTC') {
                                if ($details->operator == '*') {
                                    $amt = (float) $ctcVal_monthly * $amount_per;
                                    $amt1 = (float) $ctcVal * $amount_per;
                                } else if ($details->operator == '/') {
                                    $amt = (float) $ctcVal_monthly / $amount_per;
                                    $amt1 = (float) $ctcVal / $amount_per;
                                } else if ($details->operator == '+') {
                                    $amt = (float) $ctcVal_monthly + $amount_per;
                                    $amt1 = (float) $ctcVal + $amount_per;
                                } else if ($details->operator == '-') {
                                    $amt = (float) $ctcVal_monthly - $amount_per;
                                    $amt1 = (float) $ctcVal - $amount_per;
                                }
                            } else if (@$details->base_on == 'Basic Salary') {
                                if ($details->operator == '*') {
                                    $amt = (float) $basic_amt * $amount_per;
                                    $amt1 = (float) $basic_amt1 * $amount_per;
                                } else if (@$details->operator == '/') {
                                    $amt = (float) $basic_amt / $amount_per;
                                    $amt1 = (float) $basic_amt1 / $amount_per;
                                } else if ($details->operator == '+') {
                                    $amt = (float) $basic_amt + $amount_per;
                                    $amt1 = (float) $basic_amt1 + $amount_per;
                                } else if ($details->operator == '-') {
                                    $amt = (float) $basic_amt - $amount_per;
                                    $amt1 = (float) $basic_amt1 - $amount_per;
                                }
                            }
                        }
                        else{
                                    $amt = (float) $fixedamount;
                                    $amt1 = (float) $fixedamount * 12;
                        }



//                                            if (@$details->base_on == 'Basic Salary') {
//                                                $basic_amt = $amt;
//                                                $basic_amt1 = $amt1;
//                                            }

                                            $net_amt += $amt;
                                            $net_amt1 += $amt1;
                                        }
                                    }

                                    $net_amt_monthly = $net_amt;

                                    $overtime = 0.00;

                                    $bonus = 0.00;

                                    $curr_month = date('m');
                                    $curr_year = date('Y');

                                    $savePayroll = $data->id . '##' . $net_amt_monthly . '##' . $overtime . '##' . $bonus . '##' . $ctcVal . '##' . $data->salary_structure_details . '##' . $curr_month . '##' . $curr_year;

                                    $check_current_month_payroll = $this->PayrollModel->get_current_month_payroll($data->id, $curr_month, $curr_year);

                                    //echo "<pre>"; print_r($check_current_month_payroll); die;
                                    ?>

                                    <tr>
<!--                                        <td>
                                            <?php if ($data->salary_structure_id != '' && empty($check_current_month_payroll)) { ?>
                                                <input style="" checked class="checkBoxClass" name="btSelectItem" type="checkbox" value='<?php echo $savePayroll; ?>'><?php } else if ($data->salary_structure_id == '') { ?> <span style="color: red;">Assign Salary</span> <?php } ?>
                                        </td>-->
                                        <td><input style="display:none" checked class="checkBoxClass" name="btSelectItem" type="checkbox" value='<?php echo $savePayroll; ?>'></td>
                                        <td><?php echo $data->employee_no; ?></td>
                                        <td>
        <?php if (isset($data->personal_image) && $data->personal_image != '') { ?>

                                               <img src="<?php echo base_url(); ?>uploads/<?php echo (isset($data->personal_image) && $data->personal_image != '') ? $data->personal_image : ''; ?>" class="ks-avatar" alt="" width="36" height="36">
                                            <?php } else { ?>
                                                <img src="<?php echo base_url(); ?>assets/img/avatars/avatar-1.jpg" class="ks-avatar" alt="" width="36" height="36">
                                            <?php } ?>
                                            <?php echo @$data->first_name . ' ' . @$data->middle_name . ' ' . @$data->last_name; ?>

                                        </td>
                                        <td>
                                            $<?php echo number_format(($net_amt_monthly+@$addhocamount->credit)-@$addhocamount->debit, 2); ?>
                                        </td>
                                        <td>
                                            $0.00
                                        </td>
<!--                                        <td>
                                            $0.00
                                        </td>-->
<!--                                        <td><?php if (!empty($check_current_month_payroll)) { ?>
                                                <span class="badge badge-success">Sent</span>
        <?php } else { ?>
                                                <span class="badge badge-danger">Due</span>
                                            <?php } ?>
                                        </td>-->

                                    </tr>
        <?php $sl++;
    }
}
                            }
?>  
                        </tbody>
                    </table>