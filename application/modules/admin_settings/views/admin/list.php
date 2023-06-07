<div class="ks-page-header">
    <section class="ks-title">
        <h3><span>Settings > </span> User Role <small>(<?php echo count($all_data); ?> candidates)</small></h3>
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
            <div class="add-admin form-wrapper" style="display:none">
                
            </div>            
				<div class="table-responsiveX">
           <!-- <table id="payrolltable" class="table table-list table-loader dataTable display">-->
		   <table id="payrolltable" class="table table-list table-loader dataTable display">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email ID</th>
                    <th></th>                               
                  </tr>
                </thead>
               <!-- <tbody id='dynamic_content'>-->
			    <tbody>
                <?php
                    $sl = 1;
                    if (!empty($all_data)) {
                      foreach ($all_data as $data) {
                    ?>
                  <tr>
				   <td class="d-flex align-items-center">
                        <img <?php if (isset($data->image) && $data->image != '') { ?> src="<?php echo base_url(); ?>uploads/<?php echo (isset($data->image) && $data->image != '') ? $data->image : ''; ?>" <?php } else { ?> src="<?php echo base_url(); ?>/assets/img/avatars/placeholders/ava-128.png" <?php } ?>class="ks-avatar" alt="" width="36" height="36">
                        <div><a class="pjaxcls" href="javascript:void(0)" onclick="openForm(<?php echo $data->id; ?>);"><?php echo @$data->name.' '.@$data->family_name; ?><br>
                          </a></div>
                    </td>
                   
                    <td><?php echo $data->emailid; ?></td>
                     <td class="table-action">
                        <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="la la-ellipsis-v"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="javascript:void(0)" onclick="openForm(<?php echo $data->id; ?>);"><span class="la la-pencil icon text-info"></span> Edit</a>
                            <?php
                                if ($data->is_active == "Y") {
                                    echo '<a class="dropdown-item" href="javascript:void(0)" onclick="change_status(' . $data->id . ');"><span class="ks-icon la la-close text-danger" aria-hidden="false"></span> De-activated</a>';
                                } else {
                                    echo '<a class="dropdown-item" href="javascript:void(0)" onclick="change_status(' . $data->id . ');"><span class="ks-icon la la-check text-success" aria-hidden="false"></span> Activate</a>';
                                }
                            ?>
                            <a class="dropdown-item" href="javascript:void(0)" onclick="delete_this(<?php echo $data->id; ?>);"><span class="la la-trash icon text-danger"></span> Delete</a>
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
  function openForm(id){
       $.post("<?php echo base_url('admin_get_edit_form_admin_settings'); ?>", {id: id}, function(result){
          //console.log(result);
       $(".add-admin").html(result);
       $(".add-admin").show(); 
       $(".btn-add-admin").hide(); 
       //$('.flatpickrDate').flatpickr();
  });
  }

 function opennewgroup(item){
    if(item=='other'){
    $('#opengroup').show();  
    $('#selectgroup').hide(); 
     } 
       
    } 
    function repit(){
   $('#opengroup').hide();  
    $('#selectgroup').show();
    }
    
  function closeForm() {
    $(".add-admin").html('');
    $(".add-admin").hide();
    $(".btn-add-admin").show(); 
  }

  function checkpassword() {
      
      if ($('#password').val() == $('#confirm_password').val()) {
        $('#confirm_password').css('color', 'green');
        $(".submit").attr('disabled',false);
      } else {
        $('#confirm_password').css('color', 'red');
        $(".submit").attr('disabled',true);
    }

  }

  function checkmainpassword() {
      $("#confirm_password").attr('required',true);
      $("#confirm_password").val('');
  }
  function add_user_permission(){           
    $("#amountModal").on('shown.bs.modal', function() { 
      $("#amount_modal_confirm").click(function() { 
       $("#amountModal").modal("close");       
      });
      $("#amount_notification_heading").html("Add/Edit User Permission");
      $("#amount_notification_body").html("Corect");
    }).modal("show");
    //clickAndKeyPressing();                       
}
function close_modal(){
	$("#permissionCheck").removeAttr('checked');
}
function set_user_menu(menu_id){
	//alert(menu_id);
	var obj = menu_id.split("-");
	 if($("#"+menu_id).prop("checked"))
	  { 
	  	$("#"+menu_id).val(parseInt(obj[1])) ; 
	    // alert($("#"+menu_id).val()); 
	  }
	else{ 
		$("#"+menu_id).val(0); 
		//alert($("#"+menu_id).val()); 
	   }
}

function check_all_sub_menu(e,id){
   if($(e).prop("checked")) {
  	  $('.sub_menus-'+id).prop('checked',true);
  	  var menu_id="";
  	  $(".sub_menus-"+id).each(function() {
  	  	  menu_id = this.id;
  	  	  //alert(menu_id);
  	  	  var obj = menu_id.split("-");
  	  	  //alert(obj); 
          if($(this).prop("checked")){ 		  	
		  	$("#"+menu_id).val(parseInt(obj[1])) ; 
		     //alert($("#"+menu_id).val()); 
		  }else{ 
			$("#"+menu_id).val(0); 
			//alert($("#"+menu_id).val()); 
		  }
	  });
   } else {
  	   $('.sub_menus-'+id).prop('checked', false);
  	   $(".sub_menus-"+id).each(function() {
  	   	  menu_id = $(this).id;
		  $("#"+menu_id).val(0); 
  	   });	
   }        
}


 function change_status(id) {
        $("#myModal").on('shown.bs.modal', function() {
            $("#modal_confirm").click(function() {
                var url = "<?php echo base_url('admin_status_admin_settings'); ?>/" + id;
                $("#pjax-container").load(url,function(response,status){                           
                    notification(status);
                });
            });

            $("#notification_heading").html("Confirmation");
            $("#notification_body").html("Do you want to change status of this candidate?");
        }).modal("show");
    }
	
	 function delete_this(id) {
        $("#myModal").on('shown.bs.modal', function() {
            $("#modal_confirm").click(function() {
               var url = "<?php echo base_url('admin_delete_admin_settings'); ?>/" + id;
                $("#pjax-container").load(url,function(response,status){                           
                    notification(status);
                });
            });

            $("#notification_heading").html("Confirmation");
            $("#notification_body").html("Do you want to Delete this candidate?");
        }).modal("show");
    }


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
            //{targets: [ 1, 5], visible: false}
        ]
    });
    table.buttons().container().appendTo('.dataTable_buttons');
    $('.dataTables_filter').find('input').attr('placeholder', 'Search here...');
});
// datatable end 
</script>