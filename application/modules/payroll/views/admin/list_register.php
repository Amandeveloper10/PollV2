<div class="table-responsive">
<table id="table_payregister" class="table table-list-payroll">
    <thead>
        <tr>
        <th style="width:15px!important;">
        <div class="custom-control custom-checkbox">
        <input onclick="CheckAllChkregister(this);"  id="register_check" type="checkbox" class="custom-control-input" >
        <label class="custom-control-label" for="register_check"></label>
        </div>
        </th>
        <th>Employee</th>        
        <th>Deptt. & Designation</th>        
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
        $pay_adhoc = $this->PayrollModel->get_result_data('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N','type'=>'Incentive','mode'=>'Adhoc'));
        if(!empty($pay_adhoc)){
        foreach ($pay_adhoc as $payadhoc) {
        ?>
        <th><?php echo $payadhoc->component;  ?></th>   
        <?php   
            }
        } ?>
         <th>Total Gross</th>
        <?php 
        $deduction_adhoc =$this->PayrollModel->get_result_data('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N','type'=>'Deduction','mode'=>'Adhoc'));
        if(!empty($deduction_adhoc)){
        foreach ($deduction_adhoc as $deductionadhoc) {
        ?>
        <th><?php echo $deductionadhoc->component;?></th>   
        <?php   
            }
        } ?>
        <th>Employee PF</th>
        <th>Employee ESI</th>
        <th>Employee PTax</th>
        <th>Total Deduction</th>
        <th>Take Home</th>
        <th>Employer PF</th>
        <th>Employer ESI</th>
         <th>CTC</th>
        
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($all_employee)) {
                            foreach ($all_employee as $data) {
                            $department = $this->PayrollModel->get_row_data('master_department', array('id' => $data->department));
                            $grade = $this->PayrollModel->get_row_data('master_grade', array('id' => $data->grade));
                             //$hold = $this->PayrollModel->load_all_employee_with_hold(date('m',strtotime($To_date)),date('Y',strtotime($To_date)),$data->id);
                             $emp_salary_temp = $this->PayrollModel->get_row_data('employee_salary_temp', array('employee_id' => $data->id,'delete_flag'=>'N','month'=>$month,'year'=>$year,'is_active'=>'Y'));
                            // print_r($emp_salary_temp );
                             //$salary_employee = $this->PayrollModel->load_all_employee_with_hold(date('m',strtotime($To_date)),date('Y',strtotime($To_date)),$data->id);
                            $designation = $this->PayrollModel->get_row_data('master_designation', array('id' => $data->designation));
                            //$salary = $this->PayrollModel->get_row_data('employee_salary', array('employee_id' => $data->id));
                        //if(!empty($emp_salary_temp)){
                            
                            //$Adhoc_pay = $this->PayrollModel->get_row_data('employee_salary_temp', array('employee_salary_temp_id' => $emp_salary_temp->id,'type'=>'Adhoc_pay'));
                           // $Adhoc_deduction = $this->PayrollModel->get_row_data('employee_salary_temp', array('employee_salary_temp_id' => $emp_salary_temp->id,'type'=>'Adhoc_deduction'));
                          if(!empty($emp_salary_temp) && $emp_salary_temp->employee_id == $data->id){
                             ?>
                          
                           
        <tr>
<td style="width:15px!important;"><div class="custom-control custom-checkbox">
    <input  id="register_employee_check<?php echo $data->id; ?>" name="mail_register"  type="checkbox"  value="<?php echo $data->id; ?>" class="custom-control-input checkBoxClassregister" >
    <label class="custom-control-label" for="register_employee_check<?php echo $data->id; ?>"></label>
</div></td>

        <td class="d-flex align-items-center">                            
            <img <?php if (isset($value->personal_image) && $value->personal_image != '') { ?> src="<?php echo base_url(); ?>uploads/<?php echo (isset($value->personal_image) && $value->personal_image != '') ? $value->personal_image : ''; ?>" <?php } else { ?> src="<?php echo base_url(); ?>/assets/img/avatars/placeholders/ava-128.png" <?php } ?>class="ks-avatar" alt="" width="36" height="36">
            <div> <span style="color:green; cursor: pointer;" title="To see payslip click" onclick="seemailslip('<?php echo $data->id;?>');">  <?php echo @$data->first_name . ' ' . @$data->middle_name . ' ' . @$data->last_name; ?> </span><br>
                <small><?php echo $data->employee_no; ?></small></div>
        </td>
        <td>
        <?php echo @$department->department_name; ?><br>
        <small><?php echo @$designation->designation_name; ?></small>
        </td>        
        <td><?php if(!empty($grade)){ echo $grade->grade_name; }?></td>
        <td><?php echo $data->gender;?></td>
        <td><?php echo date('d-m-Y',strtotime($data->hire_date));?></td>
        <td><?php echo $data->pan_card;?></td>
        <td><?=$emp_salary_temp->withday?></td>
        <td><?=$emp_salary_temp->withoutday?></td>
        <?php 
        $earning_component = $this->PayrollModel->load_component('Earning','Monthly');
        if(!empty($earning_component)){
        foreach ($earning_component as $earning_val) {
           $Earning = $this->PayrollModel->get_row_data('employee_salary_details_temp', array('employee_salary_temp_id' => $emp_salary_temp->id,'type'=>'Earning','component_id'=>$earning_val->id));
        ?>
        <td><?php if(!empty($Earning)){ echo number_format(round($Earning->amount),2);} else{ echo '0.00';}?></td>   
        <?php   
        }
        } ?>
        <?php 
        $pay_adhoc = $this->PayrollModel->get_result_data('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N','type'=>'Incentive','mode'=>'Adhoc'));
        if(!empty($pay_adhoc)){
        foreach ($pay_adhoc as $payadhoc) {
            $Adhoc_pay = $this->PayrollModel->get_row_data('employee_salary_details_temp', array('employee_salary_temp_id' => $emp_salary_temp->id,'type'=>'Adhoc_pay','component_id'=>$payadhoc->id));
        ?>
        <td><?php if(!empty($Adhoc_pay)){ echo number_format(round($Adhoc_pay->amount),2);} else{ echo '0.00';}?></td>   
        <?php   
        }
        } ?>
         <td><?=number_format(round($emp_salary_temp->total_gross),2)?></td>
        <?php 
        $deduction_adhoc =$this->PayrollModel->get_result_data('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N','type'=>'Deduction','mode'=>'Adhoc'));
        if(!empty($deduction_adhoc)){
        foreach ($deduction_adhoc as $deductionadhoc) {
            $Adhoc_deduction = $this->PayrollModel->get_row_data('employee_salary_details_temp', array('employee_salary_temp_id' => $emp_salary_temp->id,'type'=>'Adhoc_deduction','component_id'=>$deductionadhoc->id));
        ?>
         <td><?php if(!empty($Adhoc_deduction)){ echo number_format(round($Adhoc_deduction->amount),2);} else{ echo '0.00';}?></td>  
        <?php   
        }
        } ?>
        <td><?=number_format(round($emp_salary_temp->employeemothlypf),2)?></td>
        <td><?=number_format(round($emp_salary_temp->employeemothlyesi),2)?></td>
        <td><?=number_format(round($emp_salary_temp->mothlyptax),2)?></td>
        <td><?=number_format(round($emp_salary_temp->total_deduction),2)?></td>
        <td><?=number_format(round($emp_salary_temp->take_home),2)?></td>
         <td><?=number_format(round($emp_salary_temp->employermothlypf),2)?></td>
        <td><?=number_format(round($emp_salary_temp->employermothlyesi),2)?></td>
        <td><?=number_format(round($emp_salary_temp->total_gross+$emp_salary_temp->employermothlypf+$emp_salary_temp->employermothlyesi))?></td>
                                  
        </tr>
         <?php }  } } ?>
         
    </tbody>
</table>
    </div>
<div class="payroll_footer_button pos_relative">
    <div class="row">            
            <div class="col-sm-12 text-center text-sm-right">
    <button  onclick="emp_register_delete();" class="btn btn-danger">Delete</button>
<a class="btn btn-primary" onclick="save_register()">Save</a>
</div>
</div>
</div>


<script>    
    $(document).ready(function() { 
    var table = $('#table_payregister').DataTable({
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
//        scrollY:        "100%",
//        scrollX:        true,
        //scrollCollapse: true,        
       // fixedColumns:   {
            //leftColumns: 1
       // }
    });
    table.buttons().container().appendTo('.dataTable_buttons');
    $('.dataTables_filter').find('input').attr('placeholder', 'Search here...');
});
</script>
