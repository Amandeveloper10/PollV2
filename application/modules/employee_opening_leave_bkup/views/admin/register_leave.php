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