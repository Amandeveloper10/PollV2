<div class="table-responsive">  
<table id="table_payregister_1" class="table table-list-payroll">
    <thead>
        <tr>
        <th>Emp. Name</th>
        <th>Code</th>

        <th>Department</th>
        <th>Designation</th>
        <th>Grade</th>
        <th>Sex</th>
        <th>D.O.J</th>
        <th>PAN No.</th>
        <th>With Pay</th>
        <th>Without Pay</th>
          <?php 
        $earning_component1 = $this->PayrollModel->load_component('Earning','Monthly');
        if(!empty($earning_component1)){
        foreach ($earning_component1 as $earning_val1) {
        ?>
        <th><?php echo $earning_val1->component;  ?></th>   
        <?php   
            }
        } ?>

       <?php 
        $pay_adhoc1 = $this->PayrollModel->get_result_data('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N','type'=>'Incentive','mode'=>'Adhoc'));
        if(!empty($pay_adhoc1)){
        foreach ($pay_adhoc1 as $payadhoc) {
        ?>
        <th><?php echo $payadhoc->component;  ?></th>   
        <?php   
            }
        } ?>
         <th class="text-right">Total Gross</th>
        <?php 
        $deduction_adhoc =$this->PayrollModel->get_result_data('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N','type'=>'Deduction','mode'=>'Adhoc'));
        if(!empty($deduction_adhoc)){
        foreach ($deduction_adhoc as $deductionadhoc) {
        ?>
        <th><?php echo $deductionadhoc->component;?></th>   
        <?php   
            }
        } ?>
        <th class="text-right">Employee PF</th>
        <th class="text-right">Employee ESI</th>
        <th class="text-right">Employee PTax</th>
        <th class="text-right">Total Deduction</th>
        <th class="text-right">Take Home</th>
        <th class="text-right">Employer PF</th>
        <th class="text-right">Employer ESI</th>
        <th class="text-right">CTC</th>
        
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($all_employee)) {
                            foreach ($all_employee as $data) {
                            $department = $this->PayrollModel->get_row_data('master_department', array('id' => $data->department));
                            $grade = $this->PayrollModel->get_row_data('master_grade', array('id' => $data->grade));
                             //$hold = $this->PayrollModel->load_all_employee_with_hold(date('m',strtotime($To_date)),date('Y',strtotime($To_date)),$data->id);
                             $emp_payroll = $this->PayrollModel->get_row_data('employee_payroll', array('employee_id' => $data->id,'delete_flag'=>'N','month'=>$month,'year'=>$year,'is_active'=>'Y'));
                           // echo '<pre>'; print_r($emp_payroll);
                             //$salary_employee = $this->PayrollModel->load_all_employee_with_hold(date('m',strtotime($To_date)),date('Y',strtotime($To_date)),$data->id);
                            $designation = $this->PayrollModel->get_row_data('master_designation', array('id' => $data->designation));
                            //$salary = $this->PayrollModel->get_row_data('employee_salary', array('employee_id' => $data->id));
                        //if(!empty($emp_salary_temp)){
                            
                            //$Adhoc_pay = $this->PayrollModel->get_row_data('employee_salary_temp', array('employee_salary_temp_id' => $emp_salary_temp->id,'type'=>'Adhoc_pay'));
                           // $Adhoc_deduction = $this->PayrollModel->get_row_data('employee_salary_temp', array('employee_salary_temp_id' => $emp_salary_temp->id,'type'=>'Adhoc_deduction'));
                          if(!empty($emp_payroll) && $emp_payroll->employee_id == $data->id){
                             ?>
                          
                           
        <tr>
        
                                   <td><span style="color:green; cursor: pointer;" title="To see payslip click" onclick="seemailslip_payroll('<?php echo $data->id;?>');">  <?php echo @$data->first_name . ' ' . @$data->middle_name . ' ' . @$data->last_name; ?> </span></td>
                                    <td><?php echo $data->employee_no; ?></td>
                                    <td>
                                    <?php echo @$department->department_name; ?>
                                    </td>
                                    <td>
                                    <?php echo @$designation->designation_name; ?>
                                    </td>
                                    <td><?php if(!empty($grade)){ echo $grade->grade_name; }?></td>
                                    <td><?php echo $data->gender;?></td>
                                    <td><?php echo date('d-m-Y',strtotime($data->hire_date));?></td>
                                    <td><?php echo $data->pan_card;?></td>
                                    <td><?=$emp_payroll->withday?></td>
                                    <td><?=$emp_payroll->withoutday?></td>
                                    <?php 
                                    $earning_component = $this->PayrollModel->load_component('Earning','Monthly');
                                    if(!empty($earning_component)){
                                    foreach ($earning_component as $earning_val) {
                                       $Earning = $this->PayrollModel->get_row_data('employee_payroll_details', array('employee_payroll_id' => $emp_payroll->id,'type'=>'Earning','component_id'=>$earning_val->id));
                                    ?>
                                    <td class="text-right"><?php if(!empty($Earning)){ echo number_format(round($Earning->amount),2);} else{ echo '0.00';}?></td>   
                                    <?php   
                                    }
                                    } ?>
                                    <?php 
                                    $pay_adhoc = $this->PayrollModel->get_result_data('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N','type'=>'Incentive','mode'=>'Adhoc'));
                                    if(!empty($pay_adhoc)){
                                    foreach ($pay_adhoc as $payadhoc) {
                                        $Adhoc_pay = $this->PayrollModel->get_row_data('employee_payroll_details', array('employee_payroll_id' => $emp_payroll->id,'type'=>'Adhoc_pay','component_id'=>$payadhoc->id));
                                    ?>
                                    <td class="text-right"><?php if(!empty($Adhoc_pay)){ echo number_format(round($Adhoc_pay->amount),2);} else{ echo '0.00';}?></td>   
                                    <?php   
                                    }
                                    } ?>
                                     <td class="text-right"><?=number_format(round($emp_payroll->total_gross),2)?></td>
                                    <?php 
                                    $deduction_adhoc =$this->PayrollModel->get_result_data('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N','type'=>'Deduction','mode'=>'Adhoc'));
                                    if(!empty($deduction_adhoc)){
                                    foreach ($deduction_adhoc as $deductionadhoc) {
                                        $Adhoc_deduction = $this->PayrollModel->get_row_data('employee_payroll_details', array('employee_payroll_id' => $emp_payroll->id,'type'=>'Adhoc_deduction','component_id'=>$deductionadhoc->id));
                                    ?>
                                     <td class="text-right"><?php if(!empty($Adhoc_deduction)){ echo number_format(round($Adhoc_deduction->amount),2);} else{ echo '0.00';}?></td>  
                                    <?php   
                                    }
                                    } ?>
                                    <td class="text-right"><?=number_format(round($emp_payroll->employeemothlypf),2)?></td>
                                    <td class="text-right"><?=number_format(round($emp_payroll->employeemothlyesi),2)?></td>
                                    <td class="text-right"><?=number_format(round($emp_payroll->mothlyptax),2)?></td>
                                    <td class="text-right"><?=number_format(round($emp_payroll->total_deduction),2)?></td>
                                    <td class="text-right"><?=number_format(round($emp_payroll->take_home),2)?></td>
                                     <td class="text-right"><?=number_format(round($emp_payroll->employermothlypf),2)?></td>
                                    <td class="text-right"><?=number_format(round($emp_payroll->employermothlyesi),2)?></td>
                                    <td class="text-right"><?=number_format(round($emp_payroll->total_gross+$emp_payroll->employermothlypf+$emp_payroll->employermothlyesi))?></td>
                                  
                                 
                                    


        </tr>
		
         <?php }  } } ?>
         
    </tbody>
	<tfoot>
            <tr>
        <th class="text-right" colspan="10">Total</th>
          <?php 
		  $earning_count = 0;
        $earning_component1 = $this->PayrollModel->load_component('Earning','Monthly');
        if(!empty($earning_component1)){
        foreach ($earning_component1 as $earning_val1) {
			$earning_count += 1;
        ?>
        <th class="text-right"></th>   
        <?php   
            }
        } ?>

       <?php 
	   $pay_adhoc_count = 0;
        $pay_adhoc1 = $this->PayrollModel->get_result_data('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N','type'=>'Incentive','mode'=>'Adhoc'));
        if(!empty($pay_adhoc1)){
        foreach ($pay_adhoc1 as $payadhoc) {
			$pay_adhoc_count += 1;
        ?>
        <th class="text-right"></th>   
        <?php   
            }
        } ?>
         <th class="text-right"></th>
        <?php 
		$duc_adhoc_count = 0;
        $deduction_adhoc =$this->PayrollModel->get_result_data('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N','type'=>'Deduction','mode'=>'Adhoc'));
        if(!empty($deduction_adhoc)){
        foreach ($deduction_adhoc as $deductionadhoc) {
			$duc_adhoc_count += 1;
        ?>
        <th class="text-right"></th>   
        <?php   
            }
        } ?>
        <th class="text-right"></th>
        <th class="text-right"></th>
        <th class="text-right"></th>
        <th class="text-right"></th>
        <th class="text-right"></th>
        <th class="text-right"></th>
        <th class="text-right"></th>
        <th class="text-right"><input type="hidden" id= "countf" value= "<?php echo 9+$earning_count + $pay_adhoc_count + 1 + $duc_adhoc_count + 8;?>" ></th>
            </tr>
        </tfoot>
</table>
</div>

<script> 
   
$(document).ready(function() {
    var table = $('#table_payregister_1').DataTable( {
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
			var countf = $('#countf').val();
			for(var k = 10; k <= countf; k ++){
				console.log(k);
				 // Total over all pages
            total = api
                .column( k )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				//console.log(countf);
 
            // Update footer
            
			$( api.column( k ).footer() ).html(
               parseFloat(total).toFixed(2)
            );
			}
           
        },
		bPaginate: true,
        //responsive: true,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        oLanguage: {
            oPaginate: {
                "sNext": "<span class='la la-angle-right'></span>",
                "sPrevious": "<span class='la la-angle-left'></span>"
            },
            "sSearch": ""
        },
        bLengthChange: false,
        bFilter: true,
        bSort: false,
        bInfo: true,
        bAutoWidth: true,        
        pagingType: "input",
        buttons: [
            {
                extend: 'excelHtml5', text: '<i class="la la-file-excel"></i>',
                exportOptions: {
                    columns: ':visible',
                    search: 'applied',
                    order: 'applied'

                }
            },
//            {
//                extend: 'pdfHtml5', text: '<i class="la la-file-pdf"></i>',
//                exportOptions: {
//                    columns: ':visible',
//                    search: 'applied',
//                    order: 'applied'
//                }
//            },
//            {
//                extend: 'print', text: '<i class="la la-print"></i>',
//                exportOptions: {
//                    columns: ':visible',
//                    search: 'applied',
//                    order: 'applied'
//                }
//            },
            {
                extend: 'colvis', text: '<i class="la la-eye"></i>'        
            }
        ],
        columnDefs: [
            {orderable: false, targets: -1}         
        ],
    } );
	table.buttons().container().appendTo('.dataTable_buttons');
    $('.dataTables_filter').find('input').attr('placeholder', 'Search here...');
} );
</script>