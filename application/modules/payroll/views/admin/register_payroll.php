<?php $SysConfig = checkConfig();
//echo "<pre>"; print_r($SysConfig); die;
function in_array_multi($needle, $haystack) {
    if(!empty($haystack)){
    foreach ($haystack as $item) {
        //echo "<pre>"; print_r($item); die;
        if ($item === $needle || (is_array($item) && in_array_multi($needle, $item))) {
            if(!empty($item)){ $amount_val = @$item['amount']; } else { $amount_val = 0.00; }
            return $amount_val;
        }
    }
}
 
    return 0.00;
}
 ?>
<style>
    .table > tbody > tr > td,.table > thead > tr > th {
        white-space: nowrap;
    }
    
</style>
<table id="ksdatatable_register" class="table table-list table-bordered"  >
            
                        <thead>
                            <tr>
                                <th> <input onclick="CheckAllChkregister(this);"  class="" name="test" type="checkbox" value="">All</th>
                                <th>Employee No.</th>
                                <th>Name</th>
                               
                                <?php if(!empty($earning_component)){
                                        foreach ($earning_component as $earning_val) {
                                            ?>
                                         <th><?php echo $earning_val->component;  ?></th>   
                                <?php   }
                                } ?>
                                <!-- <th>Earning Details</th> -->
                                <th>Adhoc Pay</th>
                                <th>Total Earning</th>
                                
                                <?php if(!empty($deduction_component)){
                                        foreach ($deduction_component as $deduction_val) {
                                            ?>
                                         <th><?php echo $deduction_val->component;  ?></th>   
                                <?php   }
                                } ?>

                                <!-- <th>Deduction Details</th> -->
                                <th>Adhoc Deduction</th>
                                <th>PF</th>
                                <th>PTax</th>
                                <th>Total Deduction</th>
                                 <th>Net Payable </th>
                                <th>Opening Leave</th> 
                                <th>Earn Leave</th>
                                <th>Taken Leave</th>
                                <th>Closing Leave</th>                          
                                
                                <!-- <th>&nbsp;</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            //echo "<pre>"; print_r($all_data); die;
                            $key_value=0;
                             $component = array();
                            $component_deduction = array();
                            $sl = 1;

                            $amount_earning = 0.00; 

                            $amount_eduction = 0.00; 
                             
                            if (!empty($all_data)) {
                             
                                foreach ($all_data as $data) {
                                  $mdate = $year.'-'.$month;

                                  $pre_mth = strtoupper(date("Y-m", strtotime($mdate . " last month"))); //die;
                                  $exp_pre_mth = explode('-', $pre_mth);
                                  $pre_month = $exp_pre_mth[1];
                                  $pre_year =  $exp_pre_mth[0];

                                  //echo date('Y-m',strtotime("first day of last month")); die;

                                    /**** leave ****/

                                    // check previous year month leave balance 
                                    $check_leave_balance=$this->PayrollModel->get_row_data('employee_payroll_leave_info',array('is_active'=>'Y','delete_flag'=>'N','employee_id'=>$data->employee_id,'month'=>@$pre_month,'year'=>@$pre_year));

                                    //echo "<pre>"; print_r($check_leave_balance); die;

                                    if(empty($check_leave_balance)){
                                      $opening_leave = 0;
                                    }else{
                                      $opening_leave = @$check_leave_balance->balance_leave;
                                    }


                                    $totaldayofthismonth=cal_days_in_month(CAL_GREGORIAN, @$month, @$year);
                                    //echo $totaldayofthismonth; die;
                                    $total_attendance=$this->PayrollModel->get_total_attendence_of_employee($data->employee_id,@$month,@$year);
                                   // echo "<pre>"; print_r($total_attendance); die;
                                    $absent_day=$totaldayofthismonth - $total_attendance;
                                    //echo $absent_day; exit();
                                    if($total_attendance!=$totaldayofthismonth){
                                    // echo '1';exit;
                                     $total_leave_taken = $this->PayrollModel->total_leave_taken($data->employee_id,@$month,@$year); 
                                    //echo '<pre>';print_r($total_leave_taken);exit;
                                     $leavetakeArr=array();
                                     if(!empty($total_leave_taken))
                                     {
                                        foreach ($total_leave_taken as $leave_take) {
                                         $allleavedates = new DatePeriod(
                                     new DateTime($leave_take->leave_from),
                                     new DateInterval('P1D'),
                                     new DateTime($leave_take->leave_to)
                                );
                                   
                                     foreach ($allleavedates as $key => $value) {
                                       // echo $value->format('Y-m-d').'@'; exit;           
                                       if(date('m',strtotime($value->format('Y-m-d'))) == date('m')){                           
                                        $leavetakeArr[]=$value->format('Y-m-d');
                                    }
                                        }

                                        if(date('m',strtotime($leave_take->leave_to)) == date('m')){                           
                                         array_push($leavetakeArr,$leave_take->leave_to);
                                    }
                                       

                                     } }
                                    
                                     }

                                     //echo '<pre>';print_r($leavetakeArr);exit;


                                     if(!empty($leavetakeArr))
                                     {
                                        $leavetake = count($leavetakeArr);
                                     }
                                     else{
                                         $leavetake = 0;
                                     }


                                     $leave_type_for_this_employee= $this->PayrollModel->leave_type_for_this_employee(@$data->grade);

                                     //echo '<pre>';print_r($leave_type_for_this_employee);exit;

                                    $leave_type=array();
                                    if(!empty($leave_type_for_this_employee)){
                                       
                                        $leave_type=explode(',',$leave_type_for_this_employee->leave_rule_id);
                                        
                                    }
                                    //$leave_type_details_arr=array();
                                    $earn_leave_monthly = 0;
                                    
                                    if(!empty($leave_type))
                                    {
                                        foreach ($leave_type as $value) {
                                          $leave_type_details = $this->PayrollModel->leave_type_details(@$value); 

                                          //echo '<pre>';print_r($leave_type_details);//exit;

                                          if(!empty($leave_type_details)){
                                            $num_padded = sprintf("%02d", $leave_type_details->period_day);
                                            $ddt = date('d');
                                            $mmt = $month;
                                            $mmtt = date('m',strtotime($leave_type_details->period_month));
                                           // echo $num_padded; //exit;
                                            //echo "<br>".$ddt;

                                            if(($leave_type_details->credit_month=='Monthly') && ((int)$ddt >= (int)$num_padded)){
                                                $earn_leave_monthly += 1;  
                                            }

                                        

                                            if(($leave_type_details->credit_month=='Yearly') && ((int)$ddt >= (int)$num_padded)  && ((int)$mmt == (int)$mmtt)){
                                            $opening_leave += $leave_type_details->unit;
                                          }
                                         
                                          }

                                        } 
                                    }

                                  
                                    $balance_leave = (($opening_leave + $earn_leave_monthly) - $leavetake);
                                    /**** end leave ****/



                                    $component = $component_deduction = array();

                                     $addhocamount = $this->PayrollModel->load_all_employee_with_addhoc(@$month,@$year,$data->employee_id);
                                      

                                    if(!empty($data->ctc_amount))
                                    {
                                    $ctcVal = $data->ctc_amount;
                                    }
                                    else{
                                     $ctcVal =0.00;   
                                    }
                                    $ctcVal_monthly = ($ctcVal / 12);
                                    $net_amt = $basic_amt = $net_amt1 = $basic_amt1 = $earning = $deduction = $amount_per = $fixedamount = 0.00;
                                    $structure_details = ($data->salary_details != '') ? json_decode($data->salary_details) : array();
                                    //echo "<pre>"; print_r($structure_details); die;
                                 
                                    if (!empty($structure_details)) {
                                          $key_value = 0;
                                          $total_earning=0.00;
                                $total_deduction=0.00;
                                $master_salary_structureid = '';
                                        foreach ($structure_details as $details) {
                                            $master_salary_structureid = $details->master_salary_structure_id;
                                             $componentdetails = $this->PayrollModel->load_componentdetails($details->component_id);
                                          
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
                          if ($componentdetails->type == 'Earning') {
                                $component[$key_value]['com_id'] = $componentdetails->id;
                                $component[$key_value]['name'] = $componentdetails->component;
                                $component[$key_value]['amount'] = $amt;
                                $earning += $amt;
                            } else {
                                $component_deduction[$key_value]['com_id'] = $componentdetails->id;
                                $component_deduction[$key_value]['deduction_name'] = $componentdetails->component;
                                $component_deduction[$key_value]['deduction_amount'] = $amt;
                                $deduction += $amt;
                            }

                                            $net_amt += $amt;
                                            $net_amt1 += $amt1;
                                             $key_value++;
                                        }
                                    }

                                    $net_amt_monthly = $net_amt;

                                    $overtime = 0.00;

                                    $bonus = 0.00;

                                    $curr_month = date('m');
                                    $curr_year = date('Y');

                                    $savePayroll = $data->id . '##' . $net_amt_monthly . '##' . $overtime . '##' . $bonus . '##' . $ctcVal . '##' . $data->salary_details . '##' . $curr_month . '##' . $curr_year;

                                    $check_current_month_payroll = $this->PayrollModel->get_current_month_payroll($data->id, $curr_month, $curr_year);

                                  
                                    ?>

                                    <tr>
<!--                                        <td><?php if ($data->salary_details != '' && empty($check_current_month_payroll)) { ?>
                                            <input class="checkBoxClass" name="btSelectItem" type="checkbox" value='<?php echo $savePayroll; ?>'><?php } else if ($data->salary_details == '') { ?> <span style="color: red;">Assign Salary</span> <?php } ?>&nbsp;<?php echo $sl;?></td>-->
<td>
    
       <input class="checkBoxClassregister lichi_register" name="registeremployee_id" type="checkbox" value='<?php echo $data->employee_id; ?>'>&nbsp;<?php echo $sl;?>
</td>
                                        <td><?php echo $data->employee_no; ?></td>
                                        <td>
        <?php if (isset($data->personal_image) && $data->personal_image != '') { ?>

                            
<!--                 <img src="<?php echo base_url(); ?>uploads/<?php echo (isset($data->personal_image) && $data->personal_image != '') ? $data->personal_image : ''; ?>" class="ks-avatar" alt="" width="36" height="36">-->
                                            <?php } else { ?>
<!--                                                <img src="<?php echo base_url(); ?>assets/img/avatars/avatar-1.jpg" class="ks-avatar" alt="" width="36" height="36">-->
                                            <?php } ?>
                                                <span style="color:green; cursor: pointer;" title="To see payslip click" onclick="seemailslip('<?php echo $data->employee_id;?>');">  <?php echo @$data->first_name . ' ' . @$data->middle_name . ' ' . @$data->last_name; ?> </span>

                                        </td>
                                        
                                        <?php $total_earning_com =0.00;
                                          if(!empty($earning_component)){

                                        foreach ($earning_component as $earning_val) {
                                            ?>
                                         <td><?php $amount_earning = in_array_multi($earning_val->id, $component);
                                         $p12 = number_format(@$amount_earning, 2);
                                         $total_earning_com += $p12;?>

                                           <?php echo (isset($SysConfig) && $SysConfig->currency_position=='Left') ? $SysConfig->default_currency_symbol : ''; ?> <?php echo $p12; ?><?php echo (isset($SysConfig) && $SysConfig->currency_position=='Right') ? $SysConfig->default_currency_symbol : ''; ?>
                                                   </td>   
                                <?php   }
                                } ?>

                                 <td>
                                            <?php echo (isset($SysConfig) && $SysConfig->currency_position=='Left') ? $SysConfig->default_currency_symbol : ''; ?> <?php echo number_format(@$addhocamount->credit, 2); ?><?php echo (isset($SysConfig) && $SysConfig->currency_position=='Right') ? $SysConfig->default_currency_symbol : ''; ?>
                                        </td>


                                        <!-- <td>
                                             <table class="table table-list table-bordered">
                                             <?php
    
    if (!empty($component)) {
$total_earning=0.00;
        foreach ($component as $key => $valuebb) {
$total_earning +=number_format(@$valuebb['amount'], 2);
            ?>
                                           
                                            <tr>
                                                        <td style=" vertical-align: top;font-family: sans-serif; font-size: 12px; font-weight: normal; padding: 2px 0;"><?php echo @$valuebb['name']; ?></td>
                                                        <td style=" vertical-align: top;font-family: sans-serif; font-size: 12px; font-weight: normal; padding: 2px 0;"><?php echo number_format(@$valuebb['amount'], 2); ?></td>
                                                        
                                                    </tr>
                                           
                                        </td>
                                         <?php
                                                }
                                            }
                                            ?>
                                         </table>
                                        </td> -->
                                        <td> <?php $totEar = 0;
                                        $totEar = $total_earning_com+@$addhocamount->credit;

                                         echo (isset($SysConfig) && $SysConfig->currency_position=='Left') ? $SysConfig->default_currency_symbol : ''; ?> <?php echo number_format($totEar, 2); ?> <?php echo (isset($SysConfig) && $SysConfig->currency_position=='Right') ? $SysConfig->default_currency_symbol : ''; ?>
                                            
                                        </td>

                                <?php $total_deduction_com =0.00;
                                if(!empty($deduction_component)){
                                        foreach ($deduction_component as $deduction_val) {
                                            ?>
                                         <td><?php $amount_eduction = in_array_multi($deduction_val->id, $component_deduction);
                                                    
                                            $p121 = number_format(@$amount_earning, 2);
                                         $total_deduction_com += $p121;?>

                                           <?php echo (isset($SysConfig) && $SysConfig->currency_position=='Left') ? $SysConfig->default_currency_symbol : ''; ?> <?php echo $p121; ?><?php echo (isset($SysConfig) && $SysConfig->currency_position=='Right') ? $SysConfig->default_currency_symbol : ''; ?></td>   
                                <?php   }
                                } ?>


                                        <!-- <td>
                                             <table class="table table-list table-bordered">
                                              <?php
     
    if (!empty($component_deduction)) {
$total_deduction=0.00;
        foreach ($component_deduction as $key => $valuebb) {
$total_deduction += number_format(@$valuebb['amount'], 2);
            //  echo $valuebb['name'];    
            //echo '<pre>';print_r($valuebb['name']);
            ?>
                                           
                                            <tr>
                                                        <td style=" vertical-align: top;font-family: sans-serif; font-size: 12px; font-weight: normal; padding: 2px 0;"><?php echo @$valuebb['name']; ?></td>
                                                        <td style=" vertical-align: top;font-family: sans-serif; font-size: 12px; font-weight: normal; padding: 2px 0;"><?php echo number_format(@$valuebb['amount'], 2); ?></td>
                                                        
                                                    </tr>
                                           
                                      
                                         <?php
                                                }
                                            }
                                            else{
                                                echo 'None';
                                            }
                                            ?>
                                         </table>
                                        </td> -->
                                        
                                        
                                         
                                        <td>  <?php echo (isset($SysConfig) && $SysConfig->currency_position=='Left') ? $SysConfig->default_currency_symbol : ''; ?> <?php echo number_format(@$addhocamount->debit, 2); ?>  <?php echo (isset($SysConfig) && $SysConfig->currency_position=='Right') ? $SysConfig->default_currency_symbol : ''; ?>

                                        </td>
                                        <td>
                                        <?php //echo $master_salary_structureid;
                                        $PF = $this->PayrollModel->check_pf_exist($master_salary_structureid);
                                        if(!empty($PF)){
                                          //print_r($PF);
                                         
                                          $employee_pf_percent = $PF->employee_pf_percent; //die;
                                          $employer_pf_percent = $PF->employer_pf_percent;
                                          $netAmount  = ($net_amt_monthly+@$addhocamount->credit)-@$addhocamount->debit;
                                          $total_pf = 0;

                                          $empPfAmount = (float) ($netAmount * $employee_pf_percent)/100;
                                          $empyeerPfAmount = (float) ($netAmount * $employer_pf_percent)/100;
                                          $total_pf = $empPfAmount + $empyeerPfAmount;
                                          echo number_format($total_pf,2);
                                        }
                                        ?></td>

                                         <td>
                                        <?php //echo $master_salary_structureid;
                                        $Ptax = $this->PayrollModel->check_ptax_exist($master_salary_structureid);
                                        if(!empty($Ptax)){
                                          //print_r($PF);// 
                                          $netAmount  = ($net_amt_monthly+@$addhocamount->credit)-@$addhocamount->debit;
                                          $Ptax_deduction = $this->PayrollModel->ptax_deduction($Ptax->state,$netAmount);
                                          //$ptaxAmount = $Ptax_deduction->p_tax;
                                          $ptaxAmount = (!empty($Ptax_deduction->p_tax)) ? $Ptax_deduction->p_tax : '0';
                                          echo $ptaxAmount;
                                        }
                                        ?></td>


                                        <td>  <?php $totDeb = 0;
                                        $totDeb = $total_deduction_com+@$addhocamount->debit;

echo (isset($SysConfig) && $SysConfig->currency_position=='Left') ? $SysConfig->default_currency_symbol : ''; ?> <?php echo number_format($totDeb+@$ptaxAmount+@$total_pf, 2); ?>  <?php echo (isset($SysConfig) && $SysConfig->currency_position=='Right') ? $SysConfig->default_currency_symbol : ''; ?>
                                           
                                        </td>
                                        
                                        
<!--                                        <td><?php if (!empty($check_current_month_payroll)) { ?>
                                                <span class="badge badge-success">Sent</span>
        <?php } else { ?>
                                                <span class="badge badge-danger">Due</span>
                                            <?php } ?>
                                        </td>-->
                                        <td>
                                              <?php echo (isset($SysConfig) && $SysConfig->currency_position=='Left') ? $SysConfig->default_currency_symbol : ''; ?> <?php echo number_format(($net_amt_monthly+@$addhocamount->credit)-@$addhocamount->debit-@$total_pf-@$ptaxAmount, 2); ?><?php echo (isset($SysConfig) && $SysConfig->currency_position=='Right') ? $SysConfig->default_currency_symbol : ''; ?>
                                        </td>

                                        <td><?php echo @$opening_leave; ?></td>
                                        <td><?php echo @$earn_leave_monthly; ?></td>
                                        <td><?php echo @$leavetake; ?></td>
                                        <td><?php echo @$balance_leave; ?></td>                                        

                                    </tr>
        <?php $sl++;
    }
                                    
                            }
?>  
                        </tbody>
                    </table>
<script>
    $(function () {   
        //$('.flatpickrDateNew').flatpickr();            
        var table = $('#ksdatatable_register').DataTable({
            bPaginate: false,
            responsive: true,
            pageLength: 10,                
            oLanguage: {                  
              "sSearch":""
            },
            bLengthChange: true,
            bFilter: true,
            bSort: true,
            bInfo: true,
            bAutoWidth: false,
            lengthChange: false,
            buttons: [                    
                {
                    extend: 'pdfHtml5', text: '<i class="la la-file-pdf-o"></i>',
                     //orientation: 'landscape',
                     orientation: 'protrait',
                pageSize: 'A3',
                    exportOptions: {
                        columns: ':visible',
               
                    }
                },
                {
                    extend: 'excelHtml5', text: '<i class="la la-file-excel-o"></i>',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'print', text: '<i class="la la-print"></i>',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'colvis', text: '<i class="la la-eye"></i>'                        
                }
            ],
            columnDefs: [
                { orderable: false, targets: [0,-1] } 
             ]
        });
        table.buttons().container().appendTo( '.dataTable_buttons' );
        $('.dataTables_filter').find('input').attr('placeholder','Search here...'); 
});

</script>