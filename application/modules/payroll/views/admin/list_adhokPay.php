<?php $freez = $this->PayrollModel->get_row_data('adhoc_freeze_payroll', array('month' => $month,'year' => $year)); ?>
<div class="table-responsive">
                        <table id="table_adhokpay" class="table table-list-payroll">
                            <thead>
                                <tr>
                                <th style="width:15px!important;">
                                <div class="custom-control custom-checkbox">
                                <input onclick="CheckAllChkadhoc(this);" <?php if(!empty($freez)){ echo 'disabled'; }?>  id="c2" type="checkbox" class="custom-control-input" >
                                <label class="custom-control-label" for="c2"></label>
                                </div>
                                </th>
                                <th>Employee &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--do not remove &nbsp; this is required for fixed column --></th>
                                <th>Deptt. & Designation</th>                
                                <?php 
                                $pay_component = $this->PayrollModel->get_result_data('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N','type'=>'Incentive','mode'=>'Adhoc'));
                                $Deduction_component = $this->PayrollModel->get_result_data('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N','type'=>'Deduction','mode'=>'Adhoc'));
                                ?>
                                <?php if(!empty($pay_component)){ 
                                foreach($pay_component as $pay){?>
                                <th><?=$pay->component?></th>
                                <?php } } ?>
                                <?php if(!empty($Deduction_component)){ 
                                foreach($Deduction_component as $Deduction){?>
                                <th><?=$Deduction->component?></th>
                                <?php } } ?>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($all_employee)) {
                            foreach ($all_employee as $data) {
                            $department = $this->PayrollModel->get_row_data('master_department', array('id' => $data->department));

                            $designation = $this->PayrollModel->get_row_data('master_designation', array('id' => $data->designation));
                             $emp_salary = $this->PayrollModel->get_row_data('employee_salary', array('employee_id' => $data->id,'delete_flag'=>'N','is_active'=>'Y')); 
                              $check_adhoc_freeze = $this->PayrollModel->check_adhoc_freeze($month, $year,$data->id);?>
                              <tr <?php if(!empty($check_adhoc_freeze) && $check_adhoc_freeze->employee_id == $data->id){ echo 'style="background-color:#f8f2ec"'; }?>>
                                    <td style="width:15px!important;"><div class="custom-control custom-checkbox">
                                    <input id="employee_check<?php echo $data->id; ?>" name="mail"  type="checkbox" value="<?php echo $data->id; ?>" class="custom-control-input checkBoxClassadhoc lichi" <?php if(!empty($check_adhoc_freeze) && $check_adhoc_freeze->employee_id == $data->id){ echo 'disabled'; }?> >
                                    <label class="custom-control-label" for="employee_check<?php echo $data->id; ?>"></label>
                                    </div></td>                                
                                    <td class="d-flex align-items-center">                            
                                        <img <?php if (isset($value->personal_image) && $value->personal_image != '') { ?> src="<?php echo base_url(); ?>uploads/<?php echo (isset($value->personal_image) && $value->personal_image != '') ? $value->personal_image : ''; ?>" <?php } else { ?> src="<?php echo base_url(); ?>/assets/img/avatars/placeholders/ava-128.png" <?php } ?>class="ks-avatar" alt="" width="36" height="36">
                                        <div> <?php if(empty($emp_salary)){ echo '<i title="Salary Not Setup" class="la text-warning la-exclamation"></i>'; }?><?php echo $data->first_name . ' ' . @$data->middle_name . ' ' . @$data->last_name; ?><br>
                                            <small><?php echo $data->employee_no; ?></small></div>
                                    </td>
                                    <td>
                                        <?php echo @$department->department_name; ?><br>
                                        <small><?php echo @$designation->designation_name; ?></small>
                                    </td>                                                                        
                                    <?php if(!empty($pay_component)){ 
                                    foreach($pay_component as $pay){
                                    $addhocpay = $this->PayrollModel->load_all_employee_with_addhoc($month,$year,$data->id,$pay->id);?>
                                    <td><?=@$addhocpay->credit?></td>
                                    <?php } } ?>
                                    <?php if(!empty($Deduction_component)){ 
                                    foreach($Deduction_component as $Deduction){
                                    $addhocded = $this->PayrollModel->load_all_employee_with_addhoc($month,$year,$data->id,@$Deduction->id);
                                    //echo '<pre>'; print_r($addhocded); die;?>
                                    <td><?=@$addhocded->debit?></td>
                                    <?php } } ?>
                                   
                                </tr>
                            <?php } } ?>
                               
                            </tbody>
                        </table>
</div>
<div class="payroll_footer_button">
    <div class="row">            
            <div class="col-sm-12 text-center text-sm-right">
                <button  onclick="adhoc_pay('pay')" class="btn btn-success adhoc_button" data-toggle="modal" data-target="#modalAdhoc">Pay</button>
<button onclick="adhoc_pay('deduction')" class="btn btn-warning adhoc_button" data-toggle="modal" data-target="#modalAdhoc">Deduction</button>
<a class="btn btn-primary attendance_freeze" onclick="freeze_component()">Freeze</a>
<a class="btn btn-warning" onclick="get_HoldSalary();">Next</a>
            </div>
        </div>    
</div>


<script>    
    $(document).ready(function() {
    var table = $('#table_adhokpay').DataTable({        
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
//            }
            {
                extend: 'colvis', text: '<i class="la la-eye"></i>'        
            }
        ],
        columnDefs: [
            {orderable: false, targets: -1}         
        ]
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
