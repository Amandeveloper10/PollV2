<div class="table-responsive">
    <table  id="table_hold_salary" class="table table-list-payroll">
<thead>
    <tr>
    <th style="width:15px!important;">
    <div class="custom-control custom-checkbox">
    <input onclick="CheckAllChkhold(this);" <?php if(!empty($freez_hold_check)){ echo 'disabled';}?> id="hold_check" type="checkbox" class="custom-control-input" >
    <label class="custom-control-label" for="hold_check"></label>
    </div>
    </th>
    <th>Employee</th>    
    <th>Department</th>
    <th>Designation</th>
    </tr>
</thead>
<tbody>
        <?php
   if (!empty($all_employee)) {
   // $this->load->model('admin/PayrollModel');
       foreach ($all_employee as $data) {
    $addhocpay = $this->PayrollModel->load_all_employee_with_hold(date('m',strtotime($To_date)),date('Y',strtotime($To_date)),$data->id);
   $department = $this->PayrollModel->get_row_data('master_department', array('id' => $data->department));

   $designation = $this->PayrollModel->get_row_data('master_designation', array('id' => $data->designation));
    $emp_salary_temp = $this->PayrollModel->get_row_data('employee_salary_temp', array('employee_id' => $data->id,'delete_flag'=>'N','month'=>$month,'year'=>$year,'is_active'=>'Y'));
   //$hold=  $this->PayrollModel->get_all_hold_button_details(date('m',strtotime($To_date)),date('Y',strtotime($To_date)));
   $emp_salary = $this->PayrollModel->get_row_data('employee_salary', array('employee_id' => $data->id,'delete_flag'=>'N','is_active'=>'Y'));

   ?>

    <tr id="row_<?php echo $data->id; ?>"  <?php if(!empty($emp_salary_temp) && $emp_salary_temp->employee_id == $data->id){ echo 'style="background-color:#f3ebe5"'; }?>>

    <td style="width:15px!important;"><div class="custom-control custom-checkbox">
    <input <?php if(!empty($emp_salary_temp) && $emp_salary_temp->employee_id == $data->id){ echo 'disabled'; }?> id="hold_employee_check<?php echo $data->id; ?>" name="mail_hold"  type="checkbox" <?php if(@$addhocpay->employee_id ==$data->id) { echo 'checked'; } ?> value="<?php echo $data->id; ?>" class="custom-control-input checkBoxClasshold lichi_hold" >
    <label class="custom-control-label" for="hold_employee_check<?php echo $data->id; ?>"></label>
    </div></td>

    <td class="d-flex align-items-center">                            
        <img <?php if (isset($value->personal_image) && $value->personal_image != '') { ?> src="<?php echo base_url(); ?>uploads/<?php echo (isset($value->personal_image) && $value->personal_image != '') ? $value->personal_image : ''; ?>" <?php } else { ?> src="<?php echo base_url(); ?>/assets/img/avatars/placeholders/ava-128.png" <?php } ?>class="ks-avatar" alt="" width="36" height="36">
        <div> <?php if(empty($emp_salary)){ echo '<i title="Salary Not Setup" class="la text-warning la-exclamation"></i>'; }?><?php echo $data->first_name . ' ' . @$data->middle_name . ' ' . @$data->last_name; ?><br>
            <small><?php echo $data->employee_no; ?></small></div>
    </td>    
    <td>
    <?php echo @$department->department_name; ?>
    </td>
    <td>
    <?php echo @$designation->designation_name; ?>
    </td>

    </tr>


    <?php
        }
    }
        ?>


   </tbody>
</table>
</div>
<div class="payroll_footer_button">
    <div class="row">            
            <div class="col-sm-12 text-center text-sm-right">
     <?php //$freez_hold_check = $this->PayrollModel->get_result_data('hold_freeze_payroll',array('month'=>$month,'year'=>$year)); 
//if(empty($freez_hold_check)){
?>
 <button  onclick="save_hold()" class="btn btn-warning hold_button_new">Hold</button>
<?php // } ?>
 
<a class="btn btn-primary"  onclick="freeze_holding();">Freeze</a>
<a class="btn btn-warning" onclick="get_Register();">Next</a>

</div>
</div>
</div>


<script>    
    $(document).ready(function() {
    var table = $('#table_hold_salary').DataTable({
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
