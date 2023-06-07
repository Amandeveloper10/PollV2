   <table id="table_off_cycle_details" class="table table-list">
                <thead>
                  <tr>
				   <th>Employee Name</th>
				   <!--<th>Transaction ID</th>-->
				   <?php  $all_pay = $this->PayrollModel->get_result_data('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N','type !='=>'Deduction','id !='=>'3'));
				   $all_deduction = $this->PayrollModel->get_result_data('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N','type'=>'Deduction'));
				   $pay_head = array();
						$dedu_head = array();
				    if (!empty($all_data)) {
						
                      foreach ($all_data as $data) {
				   $all_paycomponent = $this->PayrollModel->get_all_off_component_head($data->transaction_id,$data->employee_id,'pay');
						  foreach($all_paycomponent as $payhead){
							array_push($pay_head,$payhead->component_id);
						  }
						  //echo '<pre>'; print_r($all_paycomponent);
						  $all_deducomponent = $this->PayrollModel->get_all_off_component_head($data->transaction_id,$data->employee_id,'deduction');
						   foreach($all_deducomponent as $dedhead){
							array_push($dedu_head,$dedhead->component_id);
						  }
						 // echo '<pre>'; print_r($all_deducomponent); die;
					}}
					
					//echo '<pre>'; print_r(array_unique($pay_head)); die;
				   
				   ?>
				   <?php if(!empty(array_unique($pay_head))){ 
				   foreach(array_unique($pay_head) as $pkey=>$pvalue){
					   $paycom = $this->PayrollModel->get_row_data('master_salary_component',array('id'=>$pvalue));?>
                    <th><?php echo $paycom->component;?></th>
				   <?php }} ?>
					 <?php if(!empty(array_unique($dedu_head))){ 
				   foreach(array_unique($dedu_head) as $dkey=>$dvalue){
					   $dedcom = $this->PayrollModel->get_row_data('master_salary_component',array('id'=>$dvalue));?>
                    <th><?php echo $dedcom->component;?></th>
				   <?php }} ?>
				   <th>Total Pay</th>
				   <th>Total Deduction</th>
                    
                  </tr>
                </thead>
                <tbody>
                <?php
                    $sl = 1;
                    if (!empty($all_data)) {
                      foreach ($all_data as $data) {
						  $employee = $this->PayrollModel->get_row_data('employee',array('id'=>$data->employee_id));
						  $pay1 = $this->PayrollModel->get_total_amount_pay($data->transaction_id,$data->employee_id);
						  $deduction1 = $this->PayrollModel->get_total_amount_deduction($data->transaction_id,$data->employee_id);
						  
						  
						  //echo '<pre>'; print_r($all_component); 
                    ?>
                  <tr>
				  <td><?php echo @$employee->first_name . ' ' . @$employee->middle_name . ' ' . @$employee->last_name; ?></a><br><small><?php echo $employee->employee_no; ?></td>
				  <!--<td><span style="color:green; cursor: pointer;" title="To see payslip click" onclick="seemailslip_off_cyclepayroll('<?php echo base64_encode($data->transaction_id); ?>','<?php echo $data->employee_id; ?>');"> <?php echo $data->transaction_id; ?></span></td>-->
                    
                    
                        <?php if(!empty(array_unique($pay_head))){ 
				   foreach(array_unique($pay_head) as $pkey=>$pvalue){
					   $all_paycomponent = $this->PayrollModel->get_all_off_payroll_details($data->transaction_id,$data->employee_id,$pvalue);?>
                    <td>
					<input type="text" name="amount_pay" id="amount_pay" <?php if(empty($all_paycomponent)) { echo 'disabled'; } else { ?> onkeyup="numeric(this),edit_off_cyclepayroll('<?php echo $data->transaction_id; ?>','<?php echo $data->employee_id; ?>','<?php echo $all_paycomponent->component_id; ?>',this.value);" <?php } ?> value="<?php if(!empty($all_paycomponent)) { echo $all_paycomponent->amount;} ?>"/>
					</td>
				   <?php }} ?>
				   
				   <?php if(!empty(array_unique($dedu_head))){ 
				   foreach(array_unique($dedu_head) as $dkey=>$dvalue){
					   $all_dedcomponent = $this->PayrollModel->get_all_off_payroll_details($data->transaction_id,$data->employee_id,$dvalue);?>
                    <td>
					<input type="text" name="amount_deduction"  id="amount_deduction" <?php if(empty($all_dedcomponent)) { echo 'disabled';} else { ?> onkeyup="numeric(this),edit_off_cyclepayroll('<?php echo $data->transaction_id; ?>','<?php echo $data->employee_id; ?>','<?php echo $all_dedcomponent->component_id; ?>',this.value);" <?php } ?> value="<?php if(!empty($all_dedcomponent)) { echo $all_dedcomponent->amount;} ?>"/>
					</td>
				   <?php }} ?>
				   
					 
					<td><?php if(!empty($pay1)){ echo $pay1->pay_amount;} ?></td>
					<td><?php if(!empty($deduction1)){ echo $deduction1->deduction_amount;} ?></td>				   
                  </tr>
                  <?php $sl++; } } ?>    
                </tbody>
              </table>
<?php if (!empty($all_data)) {?>
<div class="payroll_footer_button">
<a class="btn btn-warning" onclick="save_in_draft()">Save in draft</a>
<a class="btn btn-primary" onclick="final_submission_off_cycle()">Save</a>
</div>
<?php } ?>

<script>
$(document).ready(function() {
    var table = $('#table_off_cycle_details').DataTable({
        //bPaginate: true,
        paging:         false,
        //responsive: true,
        //lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        oLanguage: {            
            "sSearch": ""
        },
        bLengthChange: true,
        bFilter: true,
        bSort: true,
        bInfo: true,
        bAutoWidth: false,        
        //pagingType: "input",
        buttons: [
            {
                extend: 'excelHtml5', text: '<i class="la la-file-excel"></i>',
                exportOptions: {
                    columns: ':visible',
                    search: 'applied',
                    order: 'applied'

                }
            },
            {
                extend: 'pdfHtml5', text: '<i class="la la-file-pdf"></i>',
                exportOptions: {
                    columns: ':visible',
                    search: 'applied',
                    order: 'applied'
                }
            },
            {
                extend: 'print', text: '<i class="la la-print"></i>',
                exportOptions: {
                    columns: ':visible',
                    search: 'applied',
                    order: 'applied'
                }
            },
            {
                extend: 'colvis', text: '<i class="la la-eye"></i>'
            }
        ],
        columnDefs: [
                {orderable: false, targets: [0]}
        ],
        "order": [[1, "asc"]],        
        scrollY:        "300px",
        scrollX:        true,
        scrollCollapse: true,        
//        fixedColumns:   {
//            leftColumns: 2
//        }
    });
    table.buttons().container().appendTo('.dataTable_buttons');
    $('.dataTables_filter').find('input').attr('placeholder', 'Search here...');
    //$(".DTFC_LeftHeadWrapper").css('border-bottom', '1px solid #e5e5e5');
});

function edit_off_cyclepayroll(transaction_id,emp_id,component_id,amount){
	  $.post("<?php echo base_url('admin_edit_off_cycle'); ?>", {'transaction_id': transaction_id, 'emp_id': emp_id,'component_id':component_id,'amount':amount}, function (result) {
		  
		  //alert(result);
    //console.log(result);
    get_off_cycle_details();
    notification('success');   
    }); 
}

function final_submission_off_cycle(){
	 $.post("<?php echo base_url('final_submission_off_cycle'); ?>", {}, function (result) {
		  
	if(result == 'Success'){
		get_off_cycle_details();
    notification('success');   
	}
    
    });
}

function save_in_draft(){
	
    notification('success');   

}


</script>