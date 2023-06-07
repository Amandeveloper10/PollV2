<div class="ks-page-header">
    <section class="ks-title">
		<h3><span>Settings > HR Master ></span> Salary Component</h3>
        <div class="ks-controls">            
            <a href="javascript:;" class="btn btn-icon btn-light btn_maximize"><i class="far fa-window-maximize"></i></a>
            <button type="button" class="btn btn-primary btn_header_add" onclick="openForm('');">Add</button>
        </div>
    </section>
</div>

<div class="ks-page-content">
    <div class="ks-page-content-body">
        <div class="container-fluid">
        <div class="content-wrapper">            
            <div class="form-wrapper" style="display:none">
                
            </div>           
            
            <div class="table-responsive">
            <table id="payrolltable" class="table table-list">
                <thead>
                  <tr>
                    <th>Component</th>
                    <th>Type</th>
                    <th>Mode</th>
                    <th>Taxable</th>     
                    <th>Fixed</th> 
                    <th>PF</th>  
                    <th>ESI</th>
                    <th>Set Formula</th> 
                    <th>Sequence</th>   
                    <th>Used</th>  					
                    <th></th> 
                  </tr>
                </thead>
                <tbody>
                <?php
                    $sl = 1;
                    if (!empty($all_data)) {
                      foreach ($all_data as $data) {
						  $salary_str_formula = $this->SalaryCompModel->get_result_data('master_salary_structure_formula',array('component_id'=>$data->id));
						 // echo '<pre>'; print_r($salary_str_formula); die;
						  $adhoc_details = $this->SalaryCompModel->get_result_data('payroll_addhoc_details',array('component_id'=>$data->id));
						 // echo '<pre>'; print_r($adhoc_details); die;
						 $countAll = '0';
						 if(!empty($salary_str_formula) || !empty($adhoc_details)){
							 $countcomad = '0';
							 $countcom = '0';
							 if(!empty($salary_str_formula)){
								 $countcom = count($salary_str_formula);
							 }else{
								 $countcom = '0';
							 }
							 
							 if(!empty($adhoc_details)){
								 $countcomad = count($adhoc_details);
							 }else{
								 $countcomad = '0';
							 }
							  $countAll = $countcomad + $countcom;
							 
						 }
                    ?>
                  <tr>
                    <td><a class="" href="javascript:void(0)" onclick="openForm(<?php echo $data->id; ?>);"><?php echo $data->component; ?></a></td>
                    <td><?php echo $data->type; ?></td>
                     <td><?php echo $data->mode; ?></td>
                    <td><?php echo $data->taxable; ?></td>
                    <td><?php echo $data->fixed; ?></td>
                    <td><?php echo $data->pf; ?></td>
                    <td><?php echo $data->esi; ?></td>
                    <td><?php echo $data->set_formula; ?></td>
                    <td><?php echo $data->sequence; ?></td>
					 <td><?php if($countAll != '0'){ echo $countAll; }else{ echo '0'; }?></td>
                    <td class="table-action">
                       
                        <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="la la-ellipsis-v"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="javascript:void(0)" onclick="openForm(<?php echo $data->id; ?>);"><span class="la la-pencil icon text-info"></span> Edit</a>
                           <?php
					  if($countAll == '0'){
                         if($data->id!='3' && $data->id!='2' && $data->id!='20')
                         {
                         ?>
                            <?php
                                if ($data->is_active == "Y") {
                                    echo '<a class="dropdown-item" href="javascript:void(0)" onclick="change_status(' . $data->id . ');"><span class="ks-icon la la-close text-danger" aria-hidden="false"></span> De-activated</a>';
                                } else {
                                    echo '<a class="dropdown-item" href="javascript:void(0)" onclick="change_status(' . $data->id . ');"><span class="ks-icon la la-check text-success" aria-hidden="false"></span> Activate</a>';
                                }
                            ?>
                          
                           
                           <?php 
                         }
					  }
                         ?>
						 <?php if($countAll == '0'){ ?>
						 <a class="dropdown-item" href="javascript:void(0)" onclick="delete_this(<?php echo $data->id; ?>);"><span class="la la-trash icon text-danger"></span> Delete</a>
						 <?php } else { ?>
						 <a class="dropdown-item" href="javascript:void(0)" onclick="get_alert();"><span class="la la-trash icon text-danger"></span> Delete</a>
						 <?php } ?>
                        </div>                                                
                        
                    </td>                                                    
                  </tr>
                  <?php $sl++; } } ?>    
                </tbody>
              </table>
        </div>
    </div>
</div>
    </div>
</div>


<!--
  Notification DIV 
  This div acts as the notification before performing any action
-->
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="notification_heading"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" >
       <p id="notification_body"></p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <a data-dismiss="modal" id="modal_confirm" class="btn btn-primary" href="#">Confirm</a> 
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- [end] Notification DIV -->

<script type="text/javascript">
    
    // datatable start
    $(document).ready(function() {
    var table = $('#payrolltable').DataTable({
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
            {targets: [ 6, 8], visible: false}
        ]
    });
    table.buttons().container().appendTo('.dataTable_buttons');
    $('.dataTables_filter').find('input').attr('placeholder', 'Search here...');
});
// datatable end 


    function openForm(id){
         $.post("<?php echo base_url('admin_get_edit_form_salary_component'); ?>", {id: id}, function(result){
            //console.log(result);
         $(".form-wrapper").html(result);
         $(".form-wrapper").show();
        
    });
    }


    function change_status(id) {
        $("#myModal").on('shown.bs.modal', function() {
            $("#modal_confirm").click(function() {
                var url = "<?php echo base_url('admin_status_salary_component'); ?>/" + id;
                $("#pjax-container").load(url,function(response,status){                           
                    notification(status);
                });
            });

            $("#notification_heading").html("Confirmation");
            $("#notification_body").html("Do you want to change status of this Salary Component?");
        }).modal("show");
    }

     function delete_this(id) {
        $("#myModal").on('shown.bs.modal', function() {
            $("#modal_confirm").click(function() {
               var url = "<?php echo base_url('admin_delete_salary_component'); ?>/" + id;
                $("#pjax-container").load(url,function(response,status){       
                    notification(status);
                });
            });

            $("#notification_heading").html("Confirmation");
            $("#notification_body").html("Do you want to Delete this Salary Component?");
        }).modal("show");
    }

    function getvall(type) {
      var checkBoxes = $("input[name="+type+"]");
      if(checkBoxes.prop("checked") == true){
          $("input[name="+type+"1]").val('Yes');
          $("#check_"+type).html('Yes');
          if(type == 'set_formula'){
            $('.setformula').show();
          }else{
            $('.setformula').hide();
          }
      }
      else if(checkBoxes.prop("checked") == false){
          $("input[name="+type+"1]").val('No');
          $("#check_"+type).html('No');
           $('.setformula').hide();
      }
        
    }
	
	function get_alert(){
		//alert('Can not delete this component until it is "0"');
		$("#myModal").on('shown.bs.modal', function() {
            $("#modal_confirm").hide();
            $("#notification_heading").html("Delete");
            $("#notification_body").html("Can not delete this component until it is '0'.");
        }).modal("show");
	}


</script>