<style>
    div.dataTables_wrapper > .row:last-child{padding: 0!important; border: 0}    
</style>
<div class="table-responsiveX">
    <table id="table_payable" class="table table-list-payroll table-bordered nowrap"  style="width:100%">
        <thead>
            <tr>
            <th>Employee &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            <th>Deptt. & Designation</th>               
            <th>Opening</th>
            <th>Taken</th>
            <th>Credit</th>
            <th>Balance</th>
            <th>Pay day</th>
            <th>Without Pay</th>                               
            </tr>
        </thead>
        <tbody>
             <?php 

        if (!empty($all_employee)) {
        foreach ($all_employee as $data) {
            $totalopening = 0;
              $totaltaken = 0;
              $totalcredit = 0;

        $department = $this->PayrollModel->get_row_data('master_department', array('id' => $data->department));
        $all_leave_type = $this->PayrollModel->get_result_data('master_leave_rules',array('delete_flag'=>'N','is_active'=>'Y'));
        $designation = $this->PayrollModel->get_row_data('master_designation', array('id' => $data->designation)); 
         $totallop = $this->PayrollModel->get_all_nos_lop($data->id,$month,$year,$From_date,$To_date);
       //  print_r($totallop); die;
        $emp_salary = $this->PayrollModel->get_row_data('employee_salary', array('employee_id' => $data->id,'delete_flag'=>'N','is_active'=>'Y'));
        $check_leave_freeze = $this->PayrollModel->check_leave_freeze($month, $year,$data->id);
         if(!empty($all_leave_type)){
                foreach ($all_leave_type as $leave_type) {
                $totalopening += $this->PayrollModel->get_all_nos_opening($leave_type->id,$data->id,$month,$year,$From_date,$To_date);
                $totaltaken += $this->PayrollModel->get_all_nos_taken($leave_type->id,$data->id,$month,$year,$From_date,$To_date);
                $totalcredit += $this->PayrollModel->get_all_nos_credit($leave_type->id,$data->id,$month,$year,$From_date,$To_date);
            }
        }
          ?>
            <tr id="parent_<?=@$data->id?>" class="parent" data-parent="<?=@$data->id?>" <?php if(!empty($check_leave_freeze) && $check_leave_freeze->employee_id == $data->id){ echo 'style="background-color:#f8f2ec"'; }?>>
                <td class="d-flex align-items-center">                            
                    <img <?php if (isset($value->personal_image) && $value->personal_image != '') { ?> src="<?php echo base_url(); ?>uploads/<?php echo (isset($value->personal_image) && $value->personal_image != '') ? $value->personal_image : ''; ?>" <?php } else { ?> src="<?php echo base_url(); ?>/assets/img/avatars/placeholders/ava-128.png" <?php } ?>class="ks-avatar" alt="" width="36" height="36">
                    <div> <?php if(empty($emp_salary)){ echo '<i title="Salary Not Setup" class="las la-exclamation"></i>'; }?><?php echo $data->first_name.' '.@$data->middle_name.' '.@$data->last_name; ?><br>
                        <small><?php echo $data->employee_no; ?></small></div>
                </td>
                <td>
                    <?php echo @$department->department_name; ?><br>
                    <small><?php echo @$designation->designation_name; ?></small>
                </td>
                <td><?=$totalopening?></td>                                    
                <td><?=$totaltaken?></td>
                <td><?=$totalcredit?></td>
                <td><?=$totalopening+$totalcredit-$totaltaken?></td>
                <td><?=$CalenderDays-$totallop?><input type="hidden" class="totaldays" name="totaldays<?=$data->id?>" data-id="<?=$data->id?>" id="totaldays<?=$data->id?>" value="<?=$CalenderDays-$totallop?>"></td>
                <td><?=$totallop?><input type="hidden" name="losofpay<?=$data->id?>" id="losofpay<?=$data->id?>" data-id="<?=$data->id?>" class="losofpay" id="<?=$data->id?>" value="<?=$totallop?>"></td>

            </tr>
            <?php if(!empty($all_leave_type)){
                foreach ($all_leave_type as $leave_type) {
                $opening = $this->PayrollModel->get_all_nos_opening($leave_type->id,$data->id,$month,$year,$From_date,$To_date);
                $taken = $this->PayrollModel->get_all_nos_taken($leave_type->id,$data->id,$month,$year,$From_date,$To_date);
                $credit = $this->PayrollModel->get_all_nos_credit($leave_type->id,$data->id,$month,$year,$From_date,$To_date);
                  ?>
                    <tr class="exp_<?=@$data->id?> child" data-child="<?=@$data->id?>" style="display: none !important; <?php if(!empty($check_leave_freeze) && $check_leave_freeze->employee_id == $data->id){ echo 'background-color:#f0f0f0'; }?>" >
                    <td><strong><?=$leave_type->rule_name?></strong></td>                                        
                    <td></td>                                        
                    <td><?php echo $opening;?></td>                                        
                    <td><?=$taken?></td>
                    <td><?=$credit?></td>
                    <td><?=$opening+$credit-$taken?></td>
                     <td style="display:none;"><?php echo $data->first_name.' '.@$data->middle_name.' '.@$data->last_name; ?></td>
                     <td></td>
                    <td></td>
                    </tr>
              <?php  } } ?>


        <?php } } ?>
        </tbody>
    </table>
</div>
            <div class="payroll_footer_button">
                <div class="row">            
            <div class="col-sm-12 text-center text-sm-right">
                <a class="btn btn-primary" onclick="freeze_leaves();">Freeze</a>
				<a class="btn btn-warning" onclick="get_AdhokPay();">Next</a>
            </div>
        </div>
            </div>


<script>
     $(document).ready(function() {
    var table = $('#table_payable').DataTable({        
         bPaginate: false,
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
        bInfo: false,
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
        scrollY:        "350px",
        scrollX:        true,
        scrollCollapse: true,        
        fixedColumns:   {
            leftColumns: 1
        }
    });
});

$( document ).ready(function() {
$(".child").hide();
$("body").delegate(".parent", 'click', function(e) {
	e.preventDefault();
	var parent = $(this).attr('data-parent');
	$(".child"+"[data-child="+parent+"]").slideToggle("slow");
});	
});
</script> 