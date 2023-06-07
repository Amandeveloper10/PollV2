<style>
.table-loader{
   visibility:hidden;
}
.table-loader:before {
    visibility:visible;
    display:table-caption;
    content: " ";
    width: 100%;
		height: 600px;
		background-image:
		linear-gradient( rgba(235, 235, 235, 1) 1px, transparent 0 ),
      linear-gradient(90deg, rgba(235, 235, 235, 1) 1px, transparent 0 ),
      linear-gradient( 90deg, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0.5) 15%, rgba(255, 255, 255, 0) 30% ),
      linear-gradient( rgba(240, 240, 242, 1) 35px, transparent 0 )
			;

		background-repeat: repeat;

		background-size:
			1px 35px,
			calc(100% * 0.1666666666) 1px,
      30% 100%,
      2px 70px;

		background-position:
			0 0,
      0 0,
      0 0,
			0 0;

		animation: shine 0.5s infinite;
	}

	@keyframes shine {
		to {
			background-position:
				0 0,
        0 0,
        40% 0,
				0 0;
		}
	}
</style>
<div class="ks-page-header">
    <section class="ks-title">
	<h3 id="title_sk"><span></h3>
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
            <div class="table-responsiveX">
            <table id="payrolltable" class="table table-list table-loader dataTable display">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Description</th>
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
                    <td><a class="pjaxcls" href="javascript:void(0)" onclick="openForm(<?php echo $data->id; ?>);"><?php echo $data->designation_name; ?></a></td>
                    <td><?php echo $data->description; ?></td>
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
<script>


$(document).ready(function() {
	
	    $('#title_sk').html(title_skeleton());

    setTimeout(function(){
      //load_content(5);
	  $('#title_sk').html('<span>Settings > Employee Master ></span> Designation');
    }, 3000);

    function title_skeleton()
    {
      var output = '';
        output += '<h3><span></span></h3>';
      return output;
    }
	
  $('#payrolltable').on('init.dt',function() {
        $("#payrolltable").removeClass('table-loader').show();
      });
  setTimeout(function(){
    $('#payrolltable').DataTable({
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
	//table.buttons().container().appendTo('.dataTable_buttons');
   // $('.dataTables_filter').find('input').attr('placeholder', 'Search here...');
  }, 3000);
    
} );
  /*$(document).ready(function(){

    $('#dynamic_content').html(make_skeleton());

    setTimeout(function(){
      load_content(11);
    }, 5000);

    function make_skeleton()
    {
      var output = '';
      for(var count = 0; count < 11; count++)
      {
		output += '<tr>';
        output += '<td><a class="pjaxcls" href="javascript:void(0)"></a>';
        output += '</td>';
        output += '<td>';
        output += '</td>';
        output += '<td class="table-action"><a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="la la-ellipsis-v"></span></a><div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1"><a class="dropdown-item" href="javascript:void(0)" ><span class="la la-pencil icon text-info"></span> Edit</a><a class="dropdown-item" href="javascript:void(0)"><span class="la la-trash icon text-danger"></span> Delete</a></div>';
        output += '</td>';
       output += '</tr>';
		
      }
      return output;
    }

    function load_content(limit)
    {
      $.ajax({
        url:"<?php echo base_url('designation_skelitan');?>",
        method:"POST",
        data:{limit:limit},
        success:function(data)
        {
			console.log(data);
          $('#dynamic_content').html(data);
        }
      })
    }

  });*/
</script>
<script type="text/javascript">
    // datatable start
   /* $(document).ready(function() {
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
});*/
// datatable end 

    function btnCloseForm(){
        $('form').remove();
        $('.form-wrapper').css('display','none');
    }

    function openForm(id){
			$(".form-wrapper").show();
			$('.form-wrapper').html(form_skeleton());

			setTimeout(function(){
			//load_content(5);
			//$('.form-wrapper').html('<span>Settings > Employee Master ></span> Designation');
				$.post("<?php echo base_url('admin_get_edit_form_designation'); ?>", {id: id}, function(result){
				//console.log(result);
				$(".form-wrapper").html(result);
				$(".form-wrapper").show();
				});
			}, 3000);

			function form_skeleton()
			{
			var output = '';
			output += '<form method="post" action="" name="" id="" enctype="multipart/form-data"><div class="row"><div class="col-sm-6 col-xl-4"><div class="form-group"><label></label><input disabled required type="text" class="form-control" name="" id="" value=""></div><span style="color: red;" id=""></span></div><div class="col-sm-6 col-xl-8"><div class="form-group"><label></label><textarea disabled class="form-control" rows="3" name=""></textarea></div></div><div class="col-md-12"><div class="form-group form-buttons"><button type="submit" name="submit" class="btn btn-success" id="save" disabled>Save</button><a href="javascript:;" class="btn btn-secondary" onclick="btnCloseForm();" disabled>Close</a></div></div></div></form>';
			return output;
			}
        
    }


    function change_status(id) {
        $("#myModal").on('shown.bs.modal', function() {
            $("#modal_confirm").click(function() {
                var url = "<?php echo base_url('admin_status_designation'); ?>/" + id;
                $("#pjax-container").load(url,function(response,status){                           
                    notification(status);
                });
            });

            $("#notification_heading").html("Confirmation");
            $("#notification_body").html("Do you want to change status of this designation?");
        }).modal("show");
    }

     function delete_this(id) {
        $("#myModal").on('shown.bs.modal', function() {
            $("#modal_confirm").click(function() {
               var url = "<?php echo base_url('admin_delete_designation'); ?>/" + id;
                $("#pjax-container").load(url,function(response,status){                           
                    notification(status);
                });
            });

            $("#notification_heading").html("Confirmation");
            $("#notification_body").html("Do you want to Delete this designation?");
        }).modal("show");
    }
</script>