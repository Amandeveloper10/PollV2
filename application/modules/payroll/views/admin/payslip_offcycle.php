<!doctype html>
<html>
    <head>
        <meta name="viewport" content="width=device-width">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Simple Transactional Email</title>
        <style>
            .table td{border: 0;}
            .table-payslip-main{width:100%; font-family: 'Arial', Arial, sans-serif; border:0; margin: 0}            
            .table-payslip-main>tbody>tr>td{padding:0;}            
            .table{width:100%; font-family: 'Arial', Arial, sans-serif; border:0; margin: 0}
            .table-ps-header>tbody>tr>td{border:0;padding:0;}
            .table-ps-header>tbody>tr>td h1{font-size: 18px; margin: 0 0 10px}
            .table-ps-header>tbody>tr>td p{font-size: 13px; margin: 0}
            
            .table-emp-dtls{border: 1px solid #999; margin: 5px 0}
            .table-emp-dtls>tbody>tr>td{padding: 4px 6px;}
            
            .table-attendance-leave{border: 1px solid #999; margin: 5px 0}
            .table-attendance-leave>tbody>tr:first-child>td{border-bottom: 1px solid #999; text-transform: uppercase}
            .table-attendance-leave>tbody>tr>td{padding: 4px 6px;}
            .table-attendance-leave>tbody>tr>td:first-child,.table-attendance-leave>tbody>tr>td:nth-child(3){width:200px}
            .table-attendance-leave>tbody>tr>td:nth-child(2),.table-attendance-leave>tbody>tr>td:nth-child(4){width:100px; text-align: right}
            .table-attendance-leave>tbody>tr>td:nth-child(2){border-right: 1px solid #999}
                       
            .table-ed-main{margin: 5px 0}
            .table-ed-main>tbody>tr>td{width:50%;padding: 0; border:1px solid #999; vertical-align: top}
            
            .table-earning>tbody>tr>td,.table-deduction>tbody>tr>td{padding: 4px 6px;}
            .table-earning>tbody>tr>td:last-child,.table-earning>tbody>tr>td:nth-child(2),.table-deduction>tbody>tr>td:last-child{text-align: right}            
            .table-earning>tbody>tr:first-child>td,.table-deduction>tbody>tr:first-child>td{text-align: left; border-bottom: 1px solid #999; text-transform: uppercase}
            
            .table-earning2>tbody>tr>td,.table-deduction2>tbody>tr>td{padding: 4px 6px;}
            .table-earning2>tbody>tr>td:last-child,.table-earning2>tbody>tr>td:nth-child(2),.table-deduction>tbody>tr>td:last-child{text-align: right}            
            .table-earning2>tbody>tr:first-child>td,.table-deduction2>tbody>tr:first-child>td{text-align: left;}
            
            .table-netsalary{border: 1px solid #999; margin: 5px 0}
            .table-netsalary>tbody>tr>td{padding: 4px 6px;}
            
            .comp-generated{text-align: center; font-size: 12px; padding: 5px} 
            
        </style>
        <?php echo (isset($css)) ? $css : ''; ?>
    </head>
    <div id="salaryslipmodaldownload">
    <body>
        <div style="box-sizing: border-box; display: block; margin: 0 auto; max-width: 600px; padding: 10px;" class="payslip-wrapper">
            <table class="table table-payslip-main"> 
                <tr>
                    <td>
                        <table class="table table-ps-header">
                            <tr>
                                <td style="width:90px">
                                   <!--<img src="<?php echo base_url(); ?>uploads/<?php echo @$organization_details->image; ?>" alt="" width="80" height="auto">-->
                                </td>
                                <td><?php $SysConfigauthenticaton = checkConfig1();
								$dateformat = $SysConfigauthenticaton->date_format;?>
                                    <h1><?php echo @$organization_details->company_name; ?></h1>
                                    <p><?php echo @$organization_details->company_name . ' ' . @$organization_details->apt_no . ' ' . @$organization_details->building_name . ',' . @$organization_details->city . ',' . @$organization_details->state . ',' . @$organization_details->country; ?></p>
                                    <p>Phone: <?php echo @$organization_details->telephone; ?>, Email: <?php echo @$organization_details->email; ?> </p>
                                </td>
                            </tr>
                        </table>
                    </td>                
                </tr>

                <tr>
                    <td>
                        <table class="table table-emp-dtls">
                            <tr>
                                <td>
                                    Employee Name:
                                </td>
                                <td>
                                    <strong><?php echo @$employee_details->first_name . ' ' . @$employee_details->middle_name . ' ' . @$employee_details->last_name ?></strong>
                                </td>
                                <td>
                                    Designation:
                                </td>
                                <td>
                                    <strong><?php echo @$employee_details->designation_name; ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Employee Number:
                                </td>
                                <td>
                                    <strong><?php echo @$employee_details->employee_no; ?></strong>
                                </td>
                                <td>
                                    Date of Joining:
                                </td>
                                <td>
                                    <strong><?php echo date($dateformat,strtotime(@$employee_details->hire_date)); ?></strong>
                                </td>
                            </tr>
                           
                        </table>
                    </td>                
                </tr>

                               
               
                    </table>
                 
                
                    <tr>
                        <td>
                            <table class="table table-ed-main">
                                <tr>
                                    <td>
                                        <table class="table table-earning">
                                            <tr>
                                                <td colspan="3">
                                                    <strong>Earnings</strong>
                                                </td>                                  
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Earnings</strong>
                                                </td>
                                                <td>
                                                   
                                                </td>
                                                <td>
                                                    <strong>Amount</strong>
                                                </td>
                                            </tr>
                                            <?php $Earning = $this->PayrollModel->get_result_data('off_cycle_payroll', array('transaction_id' => base64_decode($transaction_id),'employee_id' => $employee_id,'type'=>'pay'));
											$totalpay = 0;
											
                                            if(!empty($Earning)){
                                            foreach ($Earning as $value) {
												$totalpay += $value->amount;
                                             $Component = $this->PayrollModel->get_row_data('master_salary_component', array('id' => $value->component_id));
                                              ?>
    
                                                    <tr>
                                                        <td><?=$Component->component?></td>
                                                        <td></td>
                                                        <td  class="text-right"><?=number_format($value->amount,2)?></td>
                                                    </tr>
                                                   
                                                  <?php } } ?>


                                        </table>
                                    </td>
                                    <td> 
                                        <table class="table table-deduction">
                                            <tr>
                                                <td colspan="3">
                                                   <strong>Deductions</strong>
                                                </td>                                  
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Deductions</strong>
                                                </td>
												 <td>
                                                   
                                                </td>
                                                <td>
                                                    <strong>Amount</strong>
                                                </td>
                                            </tr>

												<?php $Deduction = $this->PayrollModel->get_result_data('off_cycle_payroll', array('transaction_id' => base64_decode($transaction_id),'employee_id' => $employee_id,'type'=>'deduction'));
												$totalduc = 0;
												if(!empty($Deduction)){
												foreach ($Deduction as $value1) {
													$totalduc += $value1->amount;
												$Component1 = $this->PayrollModel->get_row_data('master_salary_component', array('id' => $value1->component_id));
												?>
    
                                                    <tr>
                                                        <td><?=$Component1->component?></td>
                                                        <td></td>
                                                        <td  class="text-right"><?=number_format($value1->amount,2)?></td>
                                                    </tr>
                                                   
                                                  <?php } } ?>

                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table class="table table-earning2">
                                                    <tr>
                                                        <td>Total Earnings</strong></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td class="text-right"><?=number_format($totalpay,2)?></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table class="table table-deduction2">
                                                    <tr>
                                                        <td>Total Deductions</td>
                                                         <td></td>
                                                        <td  class="text-right"><?=number_format($totalduc,2)?></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>                
                            </tr>
          
                
                <?php 
function numberTowords($num)
{ 
$ones = array( 
1 => "one", 
2 => "two", 
3 => "three", 
4 => "four", 
5 => "five", 
6 => "six", 
7 => "seven", 
8 => "eight", 
9 => "nine", 
10 => "ten", 
11 => "eleven", 
12 => "twelve", 
13 => "thirteen", 
14 => "fourteen", 
15 => "fifteen", 
16 => "sixteen", 
17 => "seventeen", 
18 => "eighteen", 
19 => "nineteen" 
); 
$tens = array( 
1 => "ten",
2 => "twenty", 
3 => "thirty", 
4 => "forty", 
5 => "fifty", 
6 => "sixty", 
7 => "seventy", 
8 => "eighty", 
9 => "ninety" 
); 
$hundreds = array( 
"hundred", 
"thousand", 
"million", 
"billion", 
"trillion", 
"quadrillion" 
); //limit t quadrillion 
$num = number_format($num,2,".",","); 
$num_arr = explode(".",$num); 
$wholenum = $num_arr[0]; 
$decnum = $num_arr[1]; 
$whole_arr = array_reverse(explode(",",$wholenum)); 
krsort($whole_arr); 
$rettxt = ""; 
foreach($whole_arr as $key => $i){ 
if($i < 20){ 
$rettxt .= @$ones[$i]; 
}elseif($i < 100){ 
$rettxt .= $tens[substr($i,0,1)]; 
$rettxt .= " ".$ones[substr($i,1,1)]; 
}else{ 
$rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
$rettxt .= " ".@$tens[substr($i,1,1)]; 
$rettxt .= " ".$ones[substr($i,2,1)]; 
} 
if($key > 0){ 
$rettxt .= " ".$hundreds[$key]." "; 
} 
} 
if($decnum > 0){ 
$rettxt .= " and "; 
if($decnum < 20){ 
$rettxt .= $ones[$decnum]; 
}elseif($decnum < 100){ 
$rettxt .= @$tens[substr($decnum,0,1)]; 
$rettxt .= " ".@$ones[substr($decnum,1,1)]; 
} 
} 
return $rettxt; 

}



function priceinwords($number){
         
    $no = round($number);
    $point = round($number - $no, 2) * 100;
    $hundred = null;
    $digits_1 = strlen($no);
    $i = 0;
    $str = array();
    $words = array('0' => '', '1' => 'one', '2' => 'two',
     '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
     '7' => 'seven', '8' => 'eight', '9' => 'nine',
     '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
     '13' => 'thirteen', '14' => 'fourteen',
     '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
     '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
     '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
     '60' => 'sixty', '70' => 'seventy',
     '80' => 'eighty', '90' => 'ninety');
    $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
    while ($i < $digits_1) {
      $divider = ($i == 2) ? 10 : 100;
      $number = floor($no % $divider);
      $no = floor($no / $divider);
      $i += ($divider == 10) ? 1 : 2;
      if ($number) {
         $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
         $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
         $str [] = ($number < 21) ? $words[$number] .
             " " . $digits[$counter] . $plural . " " . $hundred
             :
             $words[floor($number / 10) * 10]
             . " " . $words[$number % 10] . " "
             . $digits[$counter] . $plural . " " . $hundred;
      } else $str[] = null;
   }
   $str = array_reverse($str);
   $result = implode('', $str);
   $points = ($point) ?
     "Point " . $words[$point / 10] . " " . 
           $words[$point = $point % 10] : '';
   return ucwords($result) . "" . ucwords($points)."";
     }
?>

               <!-- <tr>
                    <td>
                        <table class="table table-netsalary">
                            <tr>
                                <td>
                                    <strong>Net Salary</strong>
                                </td>
                                <td>
                                    <strong></strong>
                                </td>                      
                                <td rowspan="2">
                                    Authorized Signatory
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>In Words</strong>
                                </td>
                                <td>
                                    <strong><?php //echo priceinwords(round($emp_payroll->take_home)); ?> Only</strong>
                                </td>                      
                            </tr>                    
                        </table>
                    </td>                
                </tr>-->


                <tr>
                    <td class="comp-generated">
                       This is a computer generated payslip and hence no signature required
                    </td>                
                </tr>

            </table>
        </div>
    </body>
    </div>
</html>
