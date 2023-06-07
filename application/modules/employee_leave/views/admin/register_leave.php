<style>
    .table > tbody > tr > td,.table > thead > tr > th {
        white-space: nowrap;
    }
    
</style>
<table id="ksdatatable_leave" class="table table-list table-bordered"  >
            
                <thead>
                  <tr>
                      <th>Employee Name</th>
                    <th>Employee No.</th>
                    <th>Opening Leave</th>
                    <th>Leave Earn</th>
                    <th>Leave taken</th>                   
                    <th>Closing Leave</th>
                    
                </tr>
                </thead>
                
                <tbody>
                <?php
               // echo '<pre>';print_r($data);exit;
                  if(!empty($details) && !empty($details[0]['all_data']->employee_no))
                  {
                  foreach ($details as $value) {
                      ?>
                  
                <tr>
                  <td>
                        <?php echo @$value['all_data']->first_name.''.@$value['all_data']->middle_name.''.@$value['all_data']->last_name; ?>
                    </td>
                    <td>
                        <?php echo @$value['all_data']->employee_no; ?>
                    </td>
                    <td>
                       <?php echo @$value['opening_leave']; ?>
                    </td>
                    <td>
                       <?php echo @$value['earn_leave_monthly']; ?>
                    </td>
                    <td>
                       <?php echo @$value['leavetake']; ?>
                    </td>
                    <td>
                       <?php echo @$value['balance_leave']; ?>
                    </td>
                   
                </tr>
                <?php
                  }
                  }
 else {
     echo '<tr> <td> You can get leave balance after freeze the payroll of the month </td> </tr>';
 }
                  ?>
                </tbody>
                    </table>
<script>
    $(function () {   
        //$('.flatpickrDateNew').flatpickr();            
        var table = $('#ksdatatable_leave').DataTable({
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
        bLengthChange: true,
        bFilter: true,
        bSort: true,
        bInfo: true,
        bAutoWidth: false,        
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
            {orderable: false, targets: -1},
            //{targets: [ 1, 5], visible: false}
        ]
    });
    table.buttons().container().appendTo('.dataTable_buttons');
    $('.dataTables_filter').find('input').attr('placeholder', 'Search here...');
});

</script>