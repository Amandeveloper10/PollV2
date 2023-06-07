<?php $SysConfigauthenticaton = checkConfig1();?>
<div class="ks-page-header">
    <section class="ks-title">
        <h3>Off Cycle Payroll List</h3>
		 <div class="ks-controls">
                 
            <!--<a href="javascript:;" class="btn btn-icon btn-light btn_maximize"><i class="far fa-window-maximize"></i></a>-->
        </div>
    </section>
</div>
<div class="ks-page-content">
    <div class="ks-page-content-body">
        <div class="container-fluid">
        <div class="content-wrapper">            
            <div class="form-wrapper" style="display:none">
                
            </div>            
            <div class="table-responsiveX">
            <table id="table_off_payroll_list" class="table table-list">
                <thead>
                  <tr>
				  <th>Date</th>
				  <th>Transaction ID</th>
				   <th>Employee Name</th>
				   
				   <?php  $all_pay = $this->PayrollModel->get_result_data('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N','type !='=>'Deduction','id !='=>'3'));
				   $all_deduction = $this->PayrollModel->get_result_data('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N','type'=>'Deduction'));?>
				   <?php if(!empty($all_pay)){ 
				   foreach($all_pay as $pay){?>
                    <th><?php echo $pay->component;?></th>
				   <?php }} ?>
					 <?php if(!empty($all_deduction)){ 
				   foreach($all_deduction as $deduction){?>
                    <th><?php echo $deduction->component;?></th>
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
				  <td><?php echo date('d-m-Y',strtotime($data->off_cycle_date));?></td>
				   <td><span style="color:green; cursor: pointer;" title="To see payslip click" onclick="seemailslip_off_cyclepayroll('<?php echo base64_encode($data->transaction_id); ?>','<?php echo $data->employee_id; ?>');"> <?php echo $data->transaction_id; ?></span></td>
				  <td><?php echo @$employee->first_name . ' ' . @$employee->middle_name . ' ' . @$employee->last_name; ?></a><br><small><?php echo $employee->employee_no; ?></td>
				 
                    
                    
                        <?php if(!empty($all_pay)){ 
				   foreach($all_pay as $pay){
					   $all_paycomponent = $this->PayrollModel->get_all_off_payroll_details($data->transaction_id,$data->employee_id,$pay->id);?>
                    <td>
					<?php if(!empty($all_paycomponent)) { echo $all_paycomponent->amount;} else { echo '0.00';} ?>
					</td>
				   <?php }} ?>
				   
				   <?php if(!empty($all_deduction)){ 
				   foreach($all_deduction as $deduction){
					   $all_dedcomponent = $this->PayrollModel->get_all_off_payroll_details($data->transaction_id,$data->employee_id,$deduction->id);?>
                    <td>
					<?php if(!empty($all_dedcomponent)) { echo $all_dedcomponent->amount;} else { echo '0.00';}?>
					</td>
				   <?php }} ?>
				   
					 
					<td><?php if(!empty($pay1)){ echo $pay1->pay_amount;} ?></td>
					<td><?php if(!empty($deduction1)){ echo $deduction1->deduction_amount;} ?></td>				   
                  </tr>
                  <?php $sl++; } } ?>    
                </tbody>
              </table>
                </div>
        </div>
            </div>
    </div>
</div>

<!-- [end] Notification DIV -->

<div style="border:1px solid #000;" class="modal" id="salaryslipmodal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
          <div class="row" style="width:calc(100% + 30px)">
              <div class="col-6"><h4 class="modal-title" id="heading_salary">Salary Slip</h4></div>
              
              <div class="col-6 text-right">
			  <!--<button onclick="download();" id="salary_slip_button"  class="btn btn-danger ">Download</button>-->
                  <input type="hidden" name="employee_id_salary" id="employee_id_salary" value="" />
               
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          </div>
      </div>

      <!-- Modal body -->
      <div class="modal-body">          
        <div class="salaryslipmodal">
            
             
      </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
  </div>


<script>    
$(document).ready(function() {
    var table = $('#table_off_payroll_list').DataTable({
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


function seemailslip_off_cyclepayroll(transaction_id,employee_id){
		
		//var heading = 'Salary Slip for the month of '+name_month+' '+year;
		$.post("<?php echo base_url('download_off_cycle_payroll'); ?>", {'transaction_id': transaction_id, 'employee_id': employee_id}, function (result) {
		console.log(result);
		$(".salaryslipmodal").html(result);
		$('#salaryslipmodal').modal('show');
		//$('#heading_salary').html(heading);

		}); 
		}
</script>