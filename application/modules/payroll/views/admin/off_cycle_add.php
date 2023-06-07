<form onsubmit="return myFunction('offcycle_form')" method="post" action="<?php echo base_url('admin_add_offcycle'); ?>" name="offcycle_form" id="offcycle_form" enctype="multipart/form-data" >
		<input type="hidden" name="emp_id_hidden" id="emp_id_hidden" value=""/>
		<input type="hidden" name="type" id="type" class="form-control" value=""></th>
<div class="ks-page-content">
    <div class="ks-page-content-body">
        <div class="container-fluid">
        <div class="content-wrapper">            
            <div class="form-wrapper" style="display:none">
                
            </div>            
            <div class="table-responsiveX">
             <table id="table_off_cycle" class="table table-list">
                            <thead>
                                <tr>
                                <th style="width:15px!important;">
                                <div class="custom-control custom-checkbox">
                                <input onclick="CheckAllChkoffcycle(this);"  id="c2" type="checkbox" class="custom-control-input" >
                                <label class="custom-control-label" for="c2"></label>
                                </div>
                                </th>
                                <th>Emp. Name
								
                                <th>Code</th>
                                <th>Department</th>
                                <th>Designation</th>
                               
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($all_employee)) {
                            foreach ($all_employee as $data) {
                            $department = $this->PayrollModel->get_row_data('master_department', array('id' => $data->department));

                            $designation = $this->PayrollModel->get_row_data('master_designation', array('id' => $data->designation));
                             
                              ?>
                              <tr>
                                    <td><div class="custom-control custom-checkbox">
                                    <input id="employee_check<?php echo $data->id; ?>" name="mail"  type="checkbox" value="<?php echo $data->id; ?>" class="custom-control-input checkBoxClassoffcycle lichi" >
									
                                    <label class="custom-control-label" for="employee_check<?php echo $data->id; ?>"></label>
                                    </div></td>
                                
                                   <td><?php echo $data->first_name.' '.@$data->middle_name.' '.@$data->last_name; ?></td>
                                    <td><?php echo $data->employee_no; ?></td>
                                    <td>
                                    <?php echo @$department->department_name; ?>
                                    </td>
                                    <td>
                                    <?php echo @$designation->designation_name; ?>
                                    </td>
                                   
                                </tr>
                            <?php } } ?>
                               
                            </tbody>
                        </table>
<div class="payroll_footer_button">
    <button type="button" onclick="get_type('pay');" class="btn btn-success">Pay</button>
		<button type="button" onclick="get_type('deduction');" class="btn btn-success" >Deduction</button>
<?php $all_data = $this->PayrollModel->load_all_off_cycle(); 
if(empty($all_data)){?>
 <button type="submit" name="submit" class="btn btn-success" id="save">Save</button>
<?php  } ?>
 
 <button onclick="next_page();" type="button" class="btn btn-primary" >Next</button>

</div>
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

<div id="myModalpay" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
     <div class="modal-header">
        <h4 class="modal-title" id="notification_heading_pay">Pay</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
         <div class="row">
              <div class="col-12"><div class="form-group">
                  <table class="table table-bordered table-hover" id="tab_logic">
                <thead>
                    <tr>
                        <th>Component</th>
                        <th>Amount</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <tr id='add_row0' class="sel">
                <td id="component_pay">
               
                </td>
                <td>
                <input type="text" onkeyup="numeric(this)" name="amount_pay" id="amount_pay" class="form-control text-right" placeholder="0.00">
				
               </td>
			   
               <td>
                <button id="submit_pay" type="button" class="btn btn-primary">Add</button>
            </td>
                </tr>
                </tbody>
               
      
   </table>
              
          </div></div>
              <div class="col-12">
				<table id="addheads" class="table table-list">
				<thead>
				<tr>
				<th>Type</th>
				<th>Component</th>
				<th class="text-right">Amount</th>
				</tr>
				</thead>
				<tbody id="add_experience">
				</tbody>
				</table>


				</div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

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

<div id="myModaldec" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="notification_heading_dedu">Deduction</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
         <div class="row">
              <div class="col-12"><div class="form-group">
                  <table class="table table-bordered table-hover" id="tab_logic">
                <thead>
                    <tr>
                        <th>Component</th>
                        <th>Amount</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <tr id='add_row0' class="sel">
                <td id="component_dedu">
               
                </td>
                <td>
                <input type="text" onkeyup="numeric(this)" name="amount_dedu" id="amount_dedu" class="form-control text-right" placeholder="0.00">
				
               </td>
			   
               <td>
                <button id="submit_dedu" type="button" class="btn btn-primary">Add</button>
            </td>
                </tr>
                </tbody>
               
      
   </table>
              
          </div></div>
              <div class="col-12">
				<table id="addheadsdedu" class="table table-list">
				<thead>
				<tr>
				<th>Type</th>
				<th>Component</th>
				<th class="text-right">Amount</th>
				</tr>
				</thead>
				<tbody id="add_deduction">
				</tbody>
				</table>


				</div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</form>

<script>


$(document).ready(function() {
    var table = $('#table_off_cycle').DataTable({
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


function get_type(value){
	
		$('#type').val(value);
		 var ids = [];
		$('input[name=mail]:checked').each(function() {

		ids.push($(this).val());
		});
		 if(ids!='')
           {
		if(value == 'pay'){ 
	$("#myModalpay").on('shown.bs.modal', function() {
           
		$.post("<?php echo base_url('getallcomponentfor_offcycle'); ?>", {value: value}, function(result){   
			 //alert(result);
			 if(value == 'pay'){
				 $('#component_pay').html(result);
				 $("#addheads").show();
			 }else{
				 $('#component_dedu').html(result);
				 $("#addheadsdedu").show();
			 }
		

			});
			}).modal("show");
		}else{
			$("#myModaldec").on('shown.bs.modal', function() {
           
		$.post("<?php echo base_url('getallcomponentfor_offcycle'); ?>", {value: value}, function(result){   
			 //alert(result);
			 if(value == 'pay'){
				 $('#component_pay').html(result);
				 $("#addheads").show();
			 }else{
				 $('#component_dedu').html(result);
				 $("#addheadsdedu").show();
			 }
		

			});
			}).modal("show");
		}
		
}else{
	alert('please check at least anyone employee');
}
		
		}
		
function CheckAllChkoffcycle(all) {
        $(".checkBoxClassoffcycle").prop('checked', $(all).prop('checked'));
       var ids = [];
          $('input[name=mail]:checked').each(function() {
            //  alert($(this).val());
               ids.push($(this).val());

            });
            //alert(ids);
           $("#emp_id_hidden").val(ids);
           

    }
	
		 function checkcomponent_offcycle(){
        var componentpay = $("#componentpay").val();
		//var emp_id = $("#emp_id_hidden").val();
		
        //alert(rf_no);
        $("#com_err").html('');
        $("#submit_pay").prop( "disabled", false );
        if(componentpay!=''){
        $.post("<?php echo base_url('checkcomponent_offcycle'); ?>", {'componentpay': componentpay}, function(result){
           // console.log(result);
            if(result!='done'){
              $("#com_err").html(result);
              $("#submit_pay").prop( "disabled", true );
            }
         
         
        });
        }
        }
		
		 function checkcomponent_offcycle_deduction(){
        var componentdedu = $("#componentdedu").val();
		//var emp_id = $("#emp_id_hidden").val();
		
        //alert(rf_no);
        $("#comdedu_err").html('');
        $("#submit_dedu").prop( "disabled", false );
        if(componentdedu!=''){
        $.post("<?php echo base_url('checkcomponent_offcycle_deduction'); ?>", {'cmdude': componentdedu}, function(result){
           // console.log(result);
            if(result!='done'){
              $("#comdedu_err").html(result);
              $("#submit_dedu").prop( "disabled", true );
            }
         
         
        });
        }
        }
		
		
		$(document).ready(function () {
    $("#submit_pay").click(function (event) {
		var offcycle_type = $('#type').val();
		 var ids = [];
		$('input[name=mail]:checked').each(function() {

		ids.push($(this).val());
		});
		$("#emp_id_hidden").val(ids);
        //stop submit the form, we will post it manually.
        event.preventDefault();
        var component_pay = $("#componentpay").val();
        //alert(component_pay);
        var amount_pay = $("#amount_pay").val();
         if(component_pay == ""){
            //$("#prjname_err").text('Please enter project name');
            alert('Please enter Component');
            $("#component_pay").focus(); 
            //$(".save").attr('disabled',true);
            return false;
         } else if(amount_pay == "" || amount_pay == "0"){
           alert('Please enter Amount');
            $("#amount_pay").focus(); 
            //$(".save").attr('disabled',true);
            return false;
         }
		
	$("#submit_pay").attr('disabled',true);
	
	  if(component_pay!=''){
        $.post("<?php echo base_url('checkcomponent_offcycle'); ?>", {'componentpay': component_pay}, function(result1){
           // console.log(result);
            if(result1!='done'){
              $("#com_err").html(result1);
              $("#submit_pay").prop( "disabled", true );
            }else{
				 if(ids!='')
           {
			   var form = $('#offcycle_form')[0];
    // Create an FormData object 
        var data = new FormData(form);
        data.append("CustomField", "This is some extra data, testing");
        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "<?php echo base_url('add_off_cycle_pay'); ?>",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (data) {
                console.log(data);
             
				if(offcycle_type == 'pay'){
					 $("#add_experience").html(data);
				}else{
					 $("#add_deduction").html(data);
				}
                
				 
				 $("#componentpay").val('');
                 $("#amount_pay").val('');
				 
				 $("#submit_pay").attr('disabled',false);
				 $( "#save" ).prop( "disabled", false );

            },
        });
		   }else{
			    alert('please check at least anyone employee');
		   }
			  
			}
         
         
        });
        }
        // Get form
        
    });
	
	  $("#submit_dedu").click(function (event) {
		var offcycle_type = $('#type').val();
		 var ids = [];
		$('input[name=mail]:checked').each(function() {

		ids.push($(this).val());
		});
		$("#emp_id_hidden").val(ids);
        //stop submit the form, we will post it manually.
        event.preventDefault();
        var component_dude = $("#componentdude").val();
        //alert(component_pay);
        var amount_dude = $("#amount_dedu").val();
		
         if(component_dude == ""){
            //$("#prjname_err").text('Please enter project name');
            alert('Please enter Component');
            $("#component_dude").focus(); 
            //$(".save").attr('disabled',true);
            return false;
         } else if(amount_dude == "" || amount_dude == "0"){
           alert('Please enter Amount');
            $("#amount_dude").focus(); 
            //$(".save").attr('disabled',true);
            return false;
         }

		 if(ids!='')
           {
			   $("#submit_dedu").attr('disabled',true);
	
        // Get form
        var form = $('#offcycle_form')[0];
    // Create an FormData object 
        var data = new FormData(form);
        data.append("CustomField", "This is some extra data, testing");
        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "<?php echo base_url('add_off_cycle_pay'); ?>",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (data) {
               
				if(offcycle_type == 'pay'){
					 $("#add_experience").html(data);
				}else{
					 $("#add_deduction").html(data);
				}
                
				 
				 $("#componentdedu").val('');
                 $("#amount_dedu").val('');
				 
				 $("#submit_dedu").attr('disabled',false);
				 $( "#save" ).prop( "disabled", false );

            },
        });
		   }else{
			    alert('please check at least anyone employee');
		   }
    });

});

function next_page(){
	get_off_cycle_details();
}


</script>