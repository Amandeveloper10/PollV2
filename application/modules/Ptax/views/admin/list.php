<div class="ks-page-header">
    <section class="ks-title">
      
		<h3><span>Settings > HR Master ></span> P TAX</h3>
        <div class="ks-controls">            
           <!-- <a class="btn btn-info" href="<?php echo  base_url('statutory');?>">Back</a>-->
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
            <table id="payrolltable" class="table table-list">
                <thead>
                  <tr>  
                    <!-- <th>From Amount</th>
                    <th>To Amount</th> -->
                    <th>Ptax Number</th>  
                    <th>State</th>                         
                    <th></th> 
                  </tr>
                </thead>
                <tbody>
                <?php
                    $sl = 1;
                    if (!empty($all_data)) {
                      foreach ($all_data as $data) {
                    ?>
                  <tr>
                    <!-- <td><?php echo $data->amount_from; ?></td>
                    <td><?php echo $data->amount_to; ?></td> -->
                    <td><a class="" href="javascript:void(0)" onclick="openForm('<?php echo $data->p_tax_no; ?>');"><?php echo $data->p_tax_no; ?></a></td>
                    <td><?php echo $data->state; ?></td>
                   
                    <td class="table-action">
                        <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="la la-ellipsis-v"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="javascript:void(0)" onclick="openForm('<?php echo $data->p_tax_no; ?>');"><span class="la la-pencil icon text-info"></span> Edit</a>
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
            //{targets: [ 1, 5], visible: false}
        ]
    });
    table.buttons().container().appendTo('.dataTable_buttons');
    $('.dataTables_filter').find('input').attr('placeholder', 'Search here...');
});
// datatable end 


    $(document).ready(function(){
         //var field_no=0;
        //$('#ptax_field_no').val('0');
    });

    function openForm(p_tax_no){
         $.post("<?php echo base_url('admin_get_edit_form_p_tax'); ?>", {p_tax_no: p_tax_no}, function(result){
            //console.log(result);
         $(".form-wrapper").html(result);
         $(".form-wrapper").show();
         $('.js-example-basic-multiple').select2(); // select 2
    });
    }

    function add_ptax_field(){
      
      var field_no= parseInt($('#ptax_field_no').val());
      if(field_no){

        field_no = field_no+1;
        $('#ptax_field_no').val(field_no);
        

    }else{
        field_no=1;
        field_no = field_no+1;
        $('#ptax_field_no').val(field_no);
        
    }

    // for loop purpose  and as the field starts from zero the class of fields sould be one less than the no of field
    field_no=field_no-1;
    


    if(field_no==1){
    //var successive_ammount_from =parseInt($('#amount_to_0').val())+1;
     //alert (1);
     //alert(field_no);
    var successive_ammount_to =parseInt($('#amount_to_0').val());
    }else{
      //alert (field_no-1);
      successive_field_no=field_no-1;
      var successive_ammount_to =parseInt($('#amount_to_'+successive_field_no).val());
      //alert ($('#amount_to_'+field_no).val());
    }
    //alert (successive_ammount_to);
    $.post("<?php echo base_url('div_add_ptax_field'); ?>", {field_no: field_no,successive_ammount_to}, function(result){   
                 //alert(result);
                $("#insert_ptax_field").append(result);
                 //$("#insert_ptax_field").html(result);
       
                });
    }

    function remove_ptax_field(field_no){
		//alert(field_no);
     // var field_no= parseInt($('#ptax_field_no').val());
	  var field_no= field_no;
      if(field_no){
        console.log(field_no);
        $('#p_tax_row'+field_no).remove();
        // $('#div_amount_from_'+field_no).remove();
        // $('#div_amount_to_'+field_no).remove();
        // $('#div_p_tax_'+field_no).remove();
        field_no = field_no-1;
        $('#ptax_field_no').val(field_no);

        

    }else{
        console.log(field_no);
        field_no=0;
        //field_no = field_no+1;
        $('#ptax_field_no').val(field_no);
        
    }

        // var i;
        // for (i = 1; i <= field_no+1; i++) { 
        // $('#state_'+i).hide();
        // $('#amount_from_'+i).hide();
        // $('#amount_to_'+i).hide();
        // $('#p_tax_'+i).hide();
        // console.log(i);
        // }


        



    }


    function change_status(id) {
        $("#myModal").on('shown.bs.modal', function() {
            $("#modal_confirm").click(function() {
                var url = "<?php echo base_url('admin_status_p_tax'); ?>/" + id;
                $("#pjax-container").load(url,function(response,status){                    
                    notification(status);
                });
            });

            $("#notification_heading").html("Confirmation");
            $("#notification_body").html("Do you want to change status of this P-tax?");
        }).modal("show");
    }

     function delete_this(id) {
        $("#myModal").on('shown.bs.modal', function() {
            $("#modal_confirm").click(function() {
               var url = "<?php echo base_url('admin_delete_p_tax'); ?>/" + id;
                $("#pjax-container").load(url,function(response,status){                           
                    notification(status);
                });
            });

            $("#notification_heading").html("Confirmation");
            $("#notification_body").html("Do you want to Delete this P tax Details?");
        }).modal("show");
    }
    
</script>