<div class="ks-page-header">
    <section class="ks-title">
        <h3><span>HR > </span> Salary Structure</h3>
        <div class="ks-controls">
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
            <table id="ksdatatable" class="table table-list">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Grade</th>
                    <th>Department</th>                    
                    <th></th> 
                  </tr>
                </thead>
                <tbody>
                <?php
                    $sl = 1;
                    if (!empty($all_data)) {
                      foreach ($all_data as $data) {
                      $grade = $this->SalaryStruModel->get_row_data('master_grade',array('id'=>$data->grade_id));
                      
                      $dept = $this->SalaryStruModel->get_row_data('master_department',array('id'=>$data->dept_id));
                    ?>
                  <tr>
                    <td><?php echo $data->structure_name; ?></td>
                    <td><?php echo @$grade->grade_name; ?></td>
                    <td><?php echo @$dept->department_name; ?></td>
                    <td class="table-action">
                        <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="la la-ellipsis-v"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                            <!--<a class="dropdown-item" href="javascript:void(0)" onclick="openForm(<?php echo $data->id; ?>);"><span class="la la-pencil icon text-info"></span> Edit</a>-->
                            <!--<a class="dropdown-item" href="javascript:void(0)" onclick="viewForm(<?php echo $data->id; ?>);"><span class="la la-eye icon text-primary-on-hover"></span> View</a>-->
                            <?php
                                if ($data->is_active == "Y") {
                                    echo '<a class="dropdown-item" href="javascript:void(0)" onclick="change_status(' . $data->id . ');"><span class="ks-icon la la-check text-success" aria-hidden="false"></span> Activate</a>';
                                } else {
                                    echo '<a class="dropdown-item" href="javascript:void(0)" onclick="change_status(' . $data->id . ');"><span class="ks-icon la la-close text-danger" aria-hidden="false"></span> De-activated</a>';
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

<div class="modal" id="myModalview">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="notification_heading_view"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" >
       <p id="notification_body_view"></p>
      </div>


    </div>
  </div>
</div>
<!-- [end] Notification DIV -->

<script type="text/javascript">
  var ptax_state="";
    function btnCloseForm(){
    $('form').remove();
    $('.form-wrapper').css('display','none');
}
 function get_div_experience() {
    var experience_div = $("#experience_div").val();
   var div_id = (parseInt(experience_div) + 1 );
    var div_id_new = (parseInt(experience_div));
        var dropDown = $("#component"+experience_div).val();


       
var myList = [];

$('.sel').each(function() {
    
    myList.push($(this).val())
});

                  var component_type_new = $("#component_type_new"+div_id_new).html();
               
                   if(component_type_new!='') 
                   {
                   
var experience_div_type = $("#experience_div_type").val();
   
      var div_id_type = (parseInt(experience_div_type) + 1 );
    
          
$.post("<?php echo base_url('div_colon'); ?>", {id: div_id,value: myList}, function(result){   
                 //alert(result);


                $(".repeat_sal_component").append(result);
      $("#experience_div").val(div_id);
      $("#experience_div_type").val(div_id_type);
      // $("#duration_start_exp_"+div_id).flatpickr();
      // $("#duration_end_exp_"+div_id).flatpickr();
       
//          var table = $('#ksdatatable').DataTable({
//                bPaginate: true,
//                responsive: true,
//                pageLength: 10,                
//                oLanguage: {
//                  oPaginate: {
//                  "sNext": "<span class='la la-angle-right'></span>",
//                  "sPrevious": "<span class='la la-angle-left'></span>"
//                  },
//                  "sSearch":""
//                },
//                bLengthChange: true,
//                bFilter: true,
//                bSort: true,
//                bInfo: true,
//                bAutoWidth: false,
//                lengthChange: false,
//                buttons: [
//                   // 'excelHtml5',
//                   // 'pdfHtml5',                    
//                    {
//                        extend: 'print', text: '<i class="la la-print"></i>',
//                        exportOptions: {
//                            columns: ':visible'
//                        }
//                    },
//                    {
//                        extend: 'colvis', text: '<i class="la la-eye"></i>'                        
//                    }
//                ],
//                columnDefs: [
//                    { orderable: false, targets: -1 }
//                 ]
//            });
//            table.buttons().container().appendTo( '.dataTable_buttons' );
//            $('.dataTables_filter').find('input').attr('placeholder','Search here...');

       
                });
        
        }
        
        else{
        alert('Please choose component then add more.');
        
        }
     
    }

    function get_div_deduction() {
    var deduction_div = $("#deduction_div").val();
    var div_id = (parseInt(deduction_div) + 1 );
    var div_id_new = (parseInt(deduction_div));
    var dropDown = $("#component_deduction"+deduction_div).val();


       
var myList = [];

$('.seldeduction').each(function() {
    
    myList.push($(this).val())
});

                  var component_deduction_new = $("#component_deduction_new"+div_id_new).html();
               
                   if(component_deduction_new!='') 
                   {
                   
var deduction_div_type = $("#deduction_div_type").val();
   
      var div_id_type = (parseInt(deduction_div_type) + 1 );
    
          
$.post("<?php echo base_url('div_deduction_colon'); ?>", {id: div_id,value: myList}, function(result){   
                 //alert(result);


                $(".deduction_sal_repeat").append(result);
      $("#deduction_div").val(div_id);
      $("#deduction_div_type").val(div_id_type);
                });
        
        }
        
        else{
        alert('Please choose component then add more.');
        
        }
     
    }


    function get_div_benefit() {
    var benefit_div = $("#benefit_div").val();
    var div_id = (parseInt(benefit_div) + 1 );
    var div_id_new = (parseInt(benefit_div));
    var dropDown = $("#component_benefit"+benefit_div).val();


       
var myList = [];

$('.selbenefit').each(function() {
    
    myList.push($(this).val())
});

                  var component_benefit_new = $("#component_benefit_new"+div_id_new).html();
               
                   if(component_benefit_new!='') 
                   {
                   
var benefit_div_type = $("#benefit_div_type").val();
   
      var div_id_type = (parseInt(deduction_div_type) + 1 );
    
          
$.post("<?php echo base_url('div_benefit_colon'); ?>", {id: div_id,value: myList}, function(result){   
                 //alert(result);


                $(".benefit_sal_repeat").append(result);
      $("#benefit_div").val(div_id);
      $("#benefit_div_type").val(div_id_type);
                });
        
        }
        
        else{
        alert('Please choose component then add more.');
        
        }
     
    }
    function openForm(id){
         $.post("<?php echo base_url('admin_get_edit_form_salary_structure'); ?>", {id: id}, function(result){
            //console.log(result);
         $(".form-wrapper").html(result);
         $(".form-wrapper").show();
         $('.flatpickrDate').flatpickr();
         
//         if(id=''){
//             setTimeout(function(){ edit_calculation(); }, 3000);
//             
//        }
    });
    }

    function viewForm(id){
      $("#myModalview").on('shown.bs.modal', function() {
         $.post("<?php echo base_url('admin_get_view_form_salary_structure'); ?>", {id: id}, function(result){
            console.log(result);
             $("#notification_body_view").html(result);
        // $(".form-wrapper").html(result);
         //$(".form-wrapper").show();
         //$('.flatpickrDate').flatpickr();
          //$("#notification_heading").html("Confirmation");
            //$("#notification_body").html(result);
         
//         if(id=''){
//             setTimeout(function(){ edit_calculation(); }, 3000);
//             
//        }notification_body_view
    });
         //$("#notification_body_view").html(result);
         }).modal("show");
         
    }


    function change_status(id) {
        $("#myModal").on('shown.bs.modal', function() {
            $("#modal_confirm").click(function() {
                var url = "<?php echo base_url('admin_status_salary_structure'); ?>/" + id;
                $("#pjax-container").load(url,function(response,status){       
                    var table = $('#ksdatatable').DataTable({
                bPaginate: true,
                responsive: true,
                pageLength: 10,                
                oLanguage: {
                  oPaginate: {
                  "sNext": "<span class='la la-angle-right'></span>",
                  "sPrevious": "<span class='la la-angle-left'></span>"
                  },
                  "sSearch":""
                },
                bLengthChange: true,
                bFilter: true,
                bSort: true,
                bInfo: true,
                bAutoWidth: false,
                lengthChange: false,
                buttons: [
                   // 'excelHtml5',
                   // 'pdfHtml5',                    
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
                    { orderable: false, targets: -1 }
                 ]
            });
            table.buttons().container().appendTo( '.dataTable_buttons' );
            $('.dataTables_filter').find('input').attr('placeholder','Search here...');


                    notification(status);
                });
            });

            $("#notification_heading").html("Confirmation");
            $("#notification_body").html("Do you want to change status of this Salary Structure?");
        }).modal("show");
    }

     function delete_this(id) {
        $("#myModal").on('shown.bs.modal', function() {
            $("#modal_confirm").click(function() {
               var url = "<?php echo base_url('admin_delete_salary_structure'); ?>/" + id;
                $("#pjax-container").load(url,function(response,status){       
                    var table = $('#ksdatatable').DataTable({
                bPaginate: true,
                responsive: true,
                pageLength: 10,                
                oLanguage: {
                  oPaginate: {
                  "sNext": "<span class='la la-angle-right'></span>",
                  "sPrevious": "<span class='la la-angle-left'></span>"
                  },
                  "sSearch":""
                },
                bLengthChange: true,
                bFilter: true,
                bSort: true,
                bInfo: true,
                bAutoWidth: false,
                lengthChange: false,
                buttons: [
                   // 'excelHtml5',
                   // 'pdfHtml5',                    
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
                    { orderable: false, targets: -1 }
                 ]
            });
            table.buttons().container().appendTo( '.dataTable_buttons' );
            $('.dataTables_filter').find('input').attr('placeholder','Search here...');

                    notification(status);
                });
            });

            $("#notification_heading").html("Confirmation");
            $("#notification_body").html("Do you want to Delete this Salary Structure?");
        }).modal("show");
    }

    function getvall(type) {
      var checkBoxes = $("input[name="+type+"]");
      if(checkBoxes.prop("checked") == true){
          $("input[name="+type+"1]").val('Yes');
      }
      else if(checkBoxes.prop("checked") == false){
          $("input[name="+type+"1]").val('No');
      }
        
    }
    
// duplicate row     
  function blank_percentage(){
       var basic_amount=$('.amount').val();
   var ctc=$('#ctc_amount').val();
   //alert(ctc);
   
      var r = confirm("If you want to change this example CTC, You have to enter again all percentage. Are you sure to change this amount?");
/*if (r == true) {
 if(basic_amount){
      alert('Please give new percentage for all type component');
       }
       $('.amount').each(function() {
    $(this).val('');
});
      $('.total_amount').each(function() {
    $(this).text('');
});
} 
  else {
      setTimeout(function(){ $('#ctc_amount').val(ctc);}, 1000);
 
}   */ 
if (r == true) {
salarycalculation();
       }
    }
function salarycalculation(value,id) {
    if (typeof id == 'undefined') {
        var id='';
        }
   // alert(value);
   //alert(id);
  var House_Rent_Allowance=0;  
  var ctc=$('#ctc_amount').val();
  var basic_amount=$('#basic_amount').html();
  var component=$('#component'+id).val();

  var base_on=$('#base_on'+id).val();
  var oparetor=$('#oparetor'+id).val();
  var amount=$('#amount'+id).val();
  $('#amounthidden'+id).val(amount+'_'+component);
 //  var amount=value;
  //alert(amount);

  
 
  if(component!='' && base_on!='' &&oparetor!='' && amount!=''){
     // var res = str1.concat(str2);
     var basicnow='';
      var type='';
      
       if(id==''){
           
       if(oparetor=='*'){
       var basicnow= Math.round(parseFloat((amount/100)* parseFloat(ctc)));
        }
         if(oparetor=='+'){
           //  alert(type)
       var basicnow= Math.round(parseFloat((amount/100) + parseFloat(ctc)));
        }
         if(oparetor=='-'){
      var basicnow= Math.round(parseFloat((parseFloat(ctc) - parseFloat(amount/100))));
        }
           
         // var basicnow= parseFloat(((amount/100)*ctc));
         $('#basic_amount').html(Math.round(basicnow));
         $('#basic_amount_monthly').html(Math.round(basicnow/12));
            }
            else{
                
               if(base_on=='CTC'){
         var type=ctc;
         
            }
            else{
               // alert(id);
                 var type=Math.round(basic_amount);
                }
                if(oparetor=='*'){
       var calculate_amount= Math.round(parseFloat((amount/100)* parseFloat(type)));
        }
         if(oparetor=='+'){
           //  alert(type)
       var calculate_amount= Math.round(parseFloat((amount/100) + parseFloat(type)));
        }
         if(oparetor=='-'){
      var calculate_amount= Math.round(parseFloat((parseFloat(type) - parseFloat(amount/100))));
        }
           
         $('#calculate_amount'+id).html(Math.round(calculate_amount));    
          $('#monthly_calculate_amount'+id).html(Math.round(calculate_amount/12));      
            }
           
     
      var input_value= base_on+oparetor+amount+'%';
     // alert(basicnow);
    

    

     
    var total = 0.00;

  $('.total_amount').each(function() {
    // console.log($(this).text());
      total += parseFloat($(this).text());
  });

  
  $('#total_gross_earning').text(Math.round(total));


   var monthlyearning = 0.00;

  $('.total_amount_monthly').each(function() {
    // console.log($(this).text());
      monthlyearning += parseFloat($(this).text());
  });
  $('#monthly_gross_earning').text(Math.round(monthlyearning));

if($('input[name="adjustment"]').prop("checked") == true){
      var totalAmoutctc = parseFloat($('#total_gross_earning').text()) +  parseFloat($("#total_benefit_amount").text());
      if(parseFloat(totalAmoutctc)>parseFloat(ctc)){
        var balancing_amount  = parseFloat(ctc) - parseFloat(totalctc);
           var  adjustment_amount = parseFloat($('#adjustment_amount').val()) + parseFloat(balancing_amount);
           //alert(adjustment_amount);
           $('#adjustment_amount').val(Math.round(adjustment_amount));
            $('#total_adjustment_amount').text(Math.round(adjustment_amount));
            $('#monthly_adjustment_amount').text(Math.round(adjustment_amount/12));


    }
    var earning = 0;
    $('.total_amount').each(function() {
    // console.log($(this).text());
    earning += parseFloat($(this).text());
    });


    $('#total_gross_earning').text(earning);
              var monthlyearning = 0.00;

              $('.total_amount_monthly').each(function() {
              // console.log($(this).text());
              monthlyearning += parseFloat($(this).text());
              });
              $('#monthly_gross_earning').text(Math.round(monthlyearning));
              }

  ////// if pf include ////////////// 
  if ($('#pf_include').prop('checked')) {
      ///House_Rent_Allowance=parseFloat($(".House_Rent_Allowance").text());
      
      //if(!House_Rent_Allowance){
       // House_Rent_Allowance=0;
      //}
      //alert($('.basicAmount').text());
      var basicAmount = $('.basicAmount').text(); 
      $('.pf_deduction_lable').show();
                $('.pf_percent').show();
                $('input[name="pf"]').val('1');
                $("#employee_deduction").show();
                $("#employer_deduction").show();

                var totalpf = 0;
                  $('.pfYes').each(function() {

                  totalpf += parseFloat($(this).text());

                  });

                 var Employer_pf=$("#Employer_pf").val();
                  var employee_pf=$("#employee_pf").val();
                  var letpfamount  = '180000';

                if(parseFloat(basicAmount) >= parseFloat(letpfamount)){
                 

                  var employer_deduction=basicAmount * (Employer_pf/100);
                  var employee_deduction=basicAmount * (employee_pf/100);

                  $("#employer_deduction").val(Math.round(employer_deduction));
                  $("#employee_deduction").val(Math.round(employee_deduction));
                }else if(totalpf >= parseFloat(letpfamount)){
                   var employer_deduction=totalpf * (Employer_pf/100);
                  var employee_deduction=totalpf * (employee_pf/100);

                  $("#employer_deduction").val(Math.round(employer_deduction));
                  $("#employee_deduction").val(Math.round(employee_deduction));
                }else if(totalpf < parseFloat(letpfamount)){
                    var employer_deduction=totalpf * (Employer_pf/100);
                  var employee_deduction=totalpf * (employee_pf/100);

                  $("#employer_deduction").val(Math.round(employer_deduction));
                  $("#employee_deduction").val(Math.round(employee_deduction));
                }
                  $("#pf_employee_deduction").text(Math.round(employee_deduction));
                  $("#pf_employee_deduction_benefit").text(Math.round(employer_deduction));
                  var totaldeduction = 0;
                  $('.total_deduction').each(function() {

                  totaldeduction += parseFloat($(this).text());

                  });
                  $("#total_deduction_amount").text(Math.round(totaldeduction));

                   var monthlydeduction = 0;
                  $('.monthly_deduction').each(function() {

                  monthlydeduction += parseFloat($(this).text());

                  });
                  $("#monthly_deduction_amount").text(Math.round(monthlydeduction));

                  var totalbenefit = 0;
                  $('.total_benefit').each(function() {

                  totalbenefit += parseFloat($(this).text());

                  });
                  $("#total_benefit_amount").text(Math.round(totalbenefit));
                   var monthlybenefit = 0;
                  $('.monthly_benefit').each(function() {

                  monthlybenefit += parseFloat($(this).text());

                  });
                  $("#monthly_benefit_amount").text(Math.round(monthlybenefit));

                  var totaltakehome = $('#total_gross_earning').text() - $('#total_deduction_amount').text();
                  $('#total_taken_amount').text(Math.round(totaltakehome));
                  $('#monthly_taken_amount').text(Math.round(totaltakehome/12));
                  var totalctc = parseFloat($('#total_gross_earning').text()) +  parseFloat($("#total_benefit_amount").text());
                  $('#total_ctc_amount').text(Math.round(totalctc));
                  $('#monthly_ctc_amount').text(Math.round(totalctc/12));
               // }
      
  }

   if ($('#esi_include').prop('checked')) {
      $('.esi_deduction_lable').show();
                $('.esi_percent').show();
                $('input[name="esi"]').val('1');
                $("#employee_esi_deduction").show();
                $("#employer_esi_deduction").show();
                var totalgross = parseFloat($('#total_gross_earning').text());
                var Employer_esi=$("#Employer_esi").val();

                var employee_esi=$("#employee_esi").val();

                var employer_deduction=totalgross * (Employer_esi/100);

                var employee_deduction=totalgross * (employee_esi/100);

            $("#employer_esi_deduction").val(Math.round(employer_deduction));
            $("#employee_esi_deduction").val(Math.round(employee_deduction));

            $("#esi_employee_deduction").text(Math.round(employee_deduction));
            $("#esi_employee_deduction_monthly").text(Math.round(employee_deduction/12));
            
            $("#esi_employee_deduction_benefit").text(Math.round(employer_deduction));
            $("#esi_employee_deduction_benefit_monthly").text(Math.round(employer_deduction/12));
             var totaldeduction = 0;
                  $('.total_deduction').each(function() {

                  totaldeduction += parseFloat($(this).text());

                  });
                  $("#total_deduction_amount").text(Math.round(totaldeduction));
                   var monthlydeduction = 0;
                  $('.monthly_deduction').each(function() {

                  monthlydeduction += parseFloat($(this).text());

                  });
                  $("#monthly_deduction_amount").text(Math.round(monthlydeduction));
                  var totalbenefit = 0;
                  $('.total_benefit').each(function() {

                  totalbenefit += parseFloat($(this).text());

                  });
                  $("#total_benefit_amount").text(Math.round(totalbenefit));
                   var monthlybenefit = 0;
                  $('.monthly_benefit').each(function() {

                  monthlybenefit += parseFloat($(this).text());

                  });
                  $("#monthly_benefit_amount").text(Math.round(monthlybenefit));

                  var totaltakehome = $('#total_gross_earning').text() - $('#total_deduction_amount').text();
                  $('#total_taken_amount').text(Math.round(totaltakehome));
                  $('#monthly_taken_amount').text(Math.round(totaltakehome/12));
                  var totalctc = parseFloat($('#total_gross_earning').text()) +  parseFloat($("#total_benefit_amount").text());
                  $('#total_ctc_amount').text(Math.round(totalctc));
                  $('#monthly_ctc_amount').text(Math.round(totalctc/12));
      
  }
  if(ptax_state!=""){

      $.post("<?php echo base_url('ptax_deduction'); ?>", {state: ptax_state,total:total}, function(result){
             
             if(result!="no_data"){
                 $(".ptax_details").show();
                 var type=result.split(',');
                 $("#ptax_num").val(Math.round(type[0]));
                 $("#ptax_monthly").val(Math.round(type[1]));
                 $("#ptax_amount").val(Math.round(type[1]*12));
                
                  $("#ptax_amount_deduction").text(Math.round(type[1]*12));
                   $("#ptax_amount_deduction_monthly").text(Math.round(type[1]));
                
                    var totaldeduction = 0;
                    $('.total_deduction').each(function() {

                    totaldeduction += parseFloat($(this).text());

                    });
                    $("#total_deduction_amount").text(Math.round(totaldeduction));
                     var monthlydeduction = 0;
                  $('.monthly_deduction').each(function() {

                  monthlydeduction += parseFloat($(this).text());

                  });
                  $("#monthly_deduction_amount").text(Math.round(monthlydeduction));
                    var totalbenefit = 0;
                  $('.total_benefit').each(function() {

                  totalbenefit += parseFloat($(this).text());

                  });
                  $("#total_benefit_amount").text(Math.round(totalbenefit));
                   var monthlybenefit = 0;
                  $('.monthly_benefit').each(function() {

                  monthlybenefit += parseFloat($(this).text());

                  });
                  $("#monthly_benefit_amount").text(Math.round(monthlybenefit));

                   var totaltakehome = $('#total_gross_earning').text() - $('#total_deduction_amount').text();
                  $('#total_taken_amount').text(Math.round(totaltakehome));
                  $('#monthly_taken_amount').text(Math.round(totaltakehome/12));

                  var totalctc = parseFloat($('#total_gross_earning').text()) +  parseFloat($("#total_benefit_amount").text());
                  $('#total_ctc_amount').text(Math.round(totalctc));
                  $('#monthly_ctc_amount').text(Math.round(totalctc/12));


             }else{
              
              alert("Amount is out of Ptax range please create Range of this type amount in Ptax section ");
               $("#ptax_div").hide();
               $("#ptax"). prop("checked", false);

             }

        });
       
    }

    

var totalAmoutctc = parseFloat($('#total_gross_earning').text()) +  parseFloat($("#total_benefit_amount").text());
$('#total_ctc_amount').text(Math.round(totalAmoutctc));
$('#monthly_ctc_amount').text(Math.round(totalAmoutctc/12));

var totalctc = $('#total_ctc_amount').text();


     
      $('#formula'+id).val(Math.round(input_value));
      
      if(parseFloat(totalctc)>parseFloat(ctc)){
          alert('Your CTC amount is less than total amount');
         $("#submit").attr("disabled", true); 
    }
    else if(parseFloat(totalctc)<parseFloat(ctc)){
        //alert('Your CTC amount is less than total amount');
         $("#submit").attr("disabled", true); 
    }else{
      $("#submit").attr("disabled", false);
      
    }
        }
        else{
            
        alert('Please choose all field');  

        }
  

  
    }
     function salarycalculation_new(value,id) {
         if(value==''){
         value   =0; 
        }
        var component=$('#component'+id).val();
         //alert(id);
         var total=0;
         $('#amounthiddenfix'+id).val(value+'_'+component);
          var basicnow= parseFloat(Math.round(value));
         $('#calculate_amount'+id).html(Math.round(basicnow));
          $('#monthly_calculate_amount'+id).html(Math.round(basicnow/12));
        $('.total_amount').each(function() {
        // console.log($(this).text());
        total += parseFloat($(this).text());
        });

        var monthlyearning = 0.00;
    $('.total_amount_monthly').each(function() {
    // console.log($(this).text());
      monthlyearning += parseFloat($(this).text());
  });
  $('#monthly_gross_earning').text(Math.round(monthlyearning));
     salarycalculation();
         
    }
    function salarycalculation_update(value,id) {
    if (typeof id == 'undefined') {
        var id='';
        }
   // alert(value);
   
    
  var ctc=$('#ctc_amount').val();
  var basic_amount=$('#basic_amount'+id).html();
  var component=$('#component'+id).val();
  var base_on=$('#base_on'+id).val();
  var oparetor=$('#oparetor'+id).val();
  var amount=$('#amount'+id).val();
  var type='';
  var new_id='0';
  //alert(base_on);
  if(base_on=='Basic Salary')
  {
      $('.component').each(function() {
  // console.log($(this).text());
    var component_value =$(this).val();
    
    if(component_value=='3'){
   new_id=  $(this).attr("data-id");
 // alert(new_id);
  //return false;
  
    }
});
//alert(new_id);
      var basic_amount=$('#basic_amount'+new_id).html();
      var type=basic_amount;
      }
      
      else{
          
          var type=ctc;
          
        }
  
  
 //  var amount=value;
  //alert(amount);
  if(component!='' && base_on!='' &&oparetor!='' && amount!=''){
     // var res = str1.concat(str2);
     var basicnow='';
      if(oparetor=='*'){
       var basicnow= parseFloat((amount/100)* parseFloat(type));
        }
         if(oparetor=='+'){
             alert(type)
       var basicnow= parseFloat((amount/100) + parseFloat(type));
        }
         if(oparetor=='-'){
      var basicnow= parseFloat((parseFloat(type) - parseFloat(amount/100)));
        }
    // var basicnow= parseFloat(((amount/100)*type));
         $('#basic_amount'+id).html(basicnow);
                //alert(type);
                 
              if(oparetor=='*'){
       var calculate_amount= parseFloat((amount/100)* parseFloat(type));
        }
         if(oparetor=='+'){
             alert(type)
       var calculate_amount= parseFloat((amount/100) + parseFloat(type));
        }
         if(oparetor=='-'){
      var calculate_amount= parseFloat((parseFloat(type) - parseFloat(amount/100)));
        }   
          //  var calculate_amount= parseFloat(((amount/100)*type));
       //  $('#calculate_amount'+id).html(calculate_amount); 
      
      
           
     
      var input_value= base_on+oparetor+amount+'%';
     // alert(basicnow);
    
     
    var total = 0.00;

$('.total_amount').each(function() {
  // console.log($(this).text());
    total += parseFloat($(this).text());
});

var monthlyearning = 0.00;
    $('.total_amount_monthly').each(function() {
    // console.log($(this).text());
      monthlyearning += parseFloat($(this).text());
  });
  $('#monthly_gross_earning').text(monthlyearning);
$('#total_calculate_amount').text(total);
     
      $('#formula'+id).val(input_value);
      
      if(total>ctc){
          alert('Your CTC amount is less than total amount');
         $('#submit').hide(); 
    }
    else{
        $('#submit').show();  
    }
        }
        else{
            
        alert('Please choose all field');    
        }
  

  
    }
 

    function deleteDiv(type,div_id) {
      //alert(div_id);
      var total=0;
      $("#"+type+"_"+div_id).remove();

       $('.total_amount').each(function() {
          // console.log($(this).text());
            total += parseFloat($(this).text());
        });

       var monthlyearning = 0.00;
    $('.total_amount_monthly').each(function() {
    // console.log($(this).text());
      monthlyearning += parseFloat($(this).text());
  });
  $('#monthly_gross_earning').text(monthlyearning);
        ////// if pf include ////////////// 
   if ($('#pf_include').prop('checked')) {
      ///House_Rent_Allowance=parseFloat($(".House_Rent_Allowance").text());
      
      //if(!House_Rent_Allowance){
       // House_Rent_Allowance=0;
      //}
      //alert($('.basicAmount').text());
      var basicAmount = $('.basicAmount').text(); 
      $('.pf_deduction_lable').show();
                $('.pf_percent').show();
                $('input[name="pf"]').val('1');
                $("#employee_deduction").show();
                $("#employer_deduction").show();

               
                var totalpf = 0;
                  $('.pfYes').each(function() {

                  totalpf += parseFloat($(this).text());

                  });

                 var Employer_pf=$("#Employer_pf").val();
                  var employee_pf=$("#employee_pf").val();
                  var letpfamount  = '180000';

                if(parseFloat(basicAmount) >= parseFloat(letpfamount)){
                 

                  var employer_deduction=basicAmount * (Employer_pf/100);
                  var employee_deduction=basicAmount * (employee_pf/100);

                  $("#employer_deduction").val(employer_deduction);
                  $("#employee_deduction").val(employee_deduction);
                }else if(totalpf >= parseFloat(letpfamount)){
                   var employer_deduction=totalpf * (Employer_pf/100);
                  var employee_deduction=totalpf * (employee_pf/100);

                  $("#employer_deduction").val(employer_deduction);
                  $("#employee_deduction").val(employee_deduction);
                }else if(totalpf < parseFloat(letpfamount)){
                    var employer_deduction=totalpf * (Employer_pf/100);
                  var employee_deduction=totalpf * (employee_pf/100);

                  $("#employer_deduction").val(employer_deduction);
                  $("#employee_deduction").val(employee_deduction);
                }

                  $("#pf_employee_deduction").text(employee_deduction);
                  $("#pf_employee_deduction_benefit").text(employer_deduction);
                  var totaldeduction = 0;
                  $('.total_deduction').each(function() {

                  totaldeduction += parseFloat($(this).text());

                  });
                  $("#total_deduction_amount").text(totaldeduction);

                   var monthlydeduction = 0;
                  $('.monthly_deduction').each(function() {

                  monthlydeduction += parseFloat($(this).text());

                  });
                  $("#monthly_deduction_amount").text(monthlydeduction);

                  var totalbenefit = 0;
                  $('.total_benefit').each(function() {

                  totalbenefit += parseFloat($(this).text());

                  });
                  $("#total_benefit_amount").text(totalbenefit);
                   var monthlybenefit = 0;
                  $('.monthly_benefit').each(function() {

                  monthlybenefit += parseFloat($(this).text());

                  });
                  $("#monthly_benefit_amount").text(monthlybenefit);

                  var totaltakehome = $('#total_gross_earning').text() - $('#total_deduction_amount').text();
                  $('#total_taken_amount').text(totaltakehome);
                  $('#monthly_taken_amount').text(totaltakehome/12);
                  var totalctc = parseFloat($('#total_gross_earning').text()) +  parseFloat($("#total_benefit_amount").text());
                  $('#total_ctc_amount').text(totalctc);
                  $('#monthly_ctc_amount').text(totalctc/12);
               // }
      
  }

   if ($('#esi_include').prop('checked')) {
      $('.esi_deduction_lable').show();
                $('.esi_percent').show();
                $('input[name="esi"]').val('1');
                $("#employee_esi_deduction").show();
                $("#employer_esi_deduction").show();
                var totalgross = parseFloat($('#total_gross_earning').text());
                var Employer_esi=$("#Employer_esi").val();

                var employee_esi=$("#employee_esi").val();

                var employer_deduction=totalgross * (Employer_esi/100);

                var employee_deduction=totalgross * (employee_esi/100);

            $("#employer_esi_deduction").val(employer_deduction);
            $("#employee_esi_deduction").val(employee_deduction);

            $("#esi_employee_deduction").text(employee_deduction);
            $("#esi_employee_deduction_benefit").text(employer_deduction);
             var totaldeduction = 0;
                  $('.total_deduction').each(function() {

                  totaldeduction += parseFloat($(this).text());

                  });
                  $("#total_deduction_amount").text(totaldeduction);

                   var monthlydeduction = 0;
                  $('.monthly_deduction').each(function() {

                  monthlydeduction += parseFloat($(this).text());

                  });
                  $("#monthly_deduction_amount").text(monthlydeduction);

                  var totalbenefit = 0;
                  $('.total_benefit').each(function() {

                  totalbenefit += parseFloat($(this).text());

                  });
                  $("#total_benefit_amount").text(totalbenefit);
                   var monthlybenefit = 0;
                  $('.monthly_benefit').each(function() {

                  monthlybenefit += parseFloat($(this).text());

                  });
                  $("#monthly_benefit_amount").text(monthlybenefit);

                  var totaltakehome = $('#total_gross_earning').text() - $('#total_deduction_amount').text();
                  $('#total_taken_amount').text(totaltakehome);
                  $('#monthly_taken_amount').text(totaltakehome/12);
                  var totalctc = parseFloat($('#total_gross_earning').text()) +  parseFloat($("#total_benefit_amount").text());
                  $('#total_ctc_amount').text(totalctc);
                  $('#monthly_ctc_amount').text(totalctc/12);
      
  }
  $('#total_gross_earning').text(total);
  var totaldeduction = 0;
                  $('.total_deduction').each(function() {

                  totaldeduction += parseFloat($(this).text());

                  });
                  $("#total_deduction_amount").text(totaldeduction);
                   var monthlydeduction = 0;
                  $('.monthly_deduction').each(function() {

                  monthlydeduction += parseFloat($(this).text());

                  });
                  $("#monthly_deduction_amount").text(monthlydeduction);
                  var totalbenefit = 0;
                  $('.total_benefit').each(function() {

                  totalbenefit += parseFloat($(this).text());

                  });
                  $("#total_benefit_amount").text(totalbenefit);
                   var monthlybenefit = 0;
                  $('.monthly_benefit').each(function() {

                  monthlybenefit += parseFloat($(this).text());

                  });
                  $("#monthly_benefit_amount").text(monthlybenefit);

                  var totaltakehome = $('#total_gross_earning').text() - $('#total_deduction_amount').text();
                  $('#total_taken_amount').text(totaltakehome);
                  $('#monthly_taken_amount').text(totaltakehome/12);
                  var totalctc = parseFloat($('#total_gross_earning').text()) +  parseFloat($("#total_benefit_amount").text());
                  $('#total_ctc_amount').text(totalctc);
                  $('#monthly_ctc_amount').text(totalctc/12);

    }



     function deletedeductionDiv(type,div_id) {
      //alert(div_id);
      var total=0;
      $("#"+type+"_"+div_id).remove();

      var totaldeduction = 0;
                  $('.total_deduction').each(function() {

                  totaldeduction += parseFloat($(this).text());

                  });
                  $("#total_deduction_amount").text(totaldeduction);
                   var monthlydeduction = 0;
                  $('.monthly_deduction').each(function() {

                  monthlydeduction += parseFloat($(this).text());

                  });
                  $("#monthly_deduction_amount").text(monthlydeduction);
                  var totalbenefit = 0;
                  $('.total_benefit').each(function() {

                  totalbenefit += parseFloat($(this).text());

                  });
                  $("#total_benefit_amount").text(totalbenefit);
                   var monthlybenefit = 0;
                  $('.monthly_benefit').each(function() {

                  monthlybenefit += parseFloat($(this).text());

                  });
                  $("#monthly_benefit_amount").text(monthlybenefit);

                  var totaltakehome = $('#total_gross_earning').text() - $('#total_deduction_amount').text();
                  $('#total_taken_amount').text(totaltakehome);
                  $('#monthly_taken_amount').text(totaltakehome/12);
                  var totalctc = parseFloat($('#total_gross_earning').text()) +  parseFloat($("#total_benefit_amount").text());
                  $('#total_ctc_amount').text(totalctc);
                  $('#monthly_ctc_amount').text(totalctc/12);
        ////// if pf include ////////////// 
   if ($('#pf_include').prop('checked')) {
      ///House_Rent_Allowance=parseFloat($(".House_Rent_Allowance").text());
      
      //if(!House_Rent_Allowance){
       // House_Rent_Allowance=0;
      //}
      //alert($('.basicAmount').text());
      var basicAmount = $('.basicAmount').text(); 
      $('.pf_deduction_lable').show();
                $('.pf_percent').show();
                $('input[name="pf"]').val('1');
                $("#employee_deduction").show();
                $("#employer_deduction").show();

               
                var totalpf = 0;
                  $('.pfYes').each(function() {

                  totalpf += parseFloat($(this).text());

                  });

                 var Employer_pf=$("#Employer_pf").val();
                  var employee_pf=$("#employee_pf").val();
                  var letpfamount  = '180000';

                if(parseFloat(basicAmount) >= parseFloat(letpfamount)){
                 

                  var employer_deduction=basicAmount * (Employer_pf/100);
                  var employee_deduction=basicAmount * (employee_pf/100);

                  $("#employer_deduction").val(employer_deduction);
                  $("#employee_deduction").val(employee_deduction);
                }else if(totalpf >= parseFloat(letpfamount)){
                   var employer_deduction=totalpf * (Employer_pf/100);
                  var employee_deduction=totalpf * (employee_pf/100);

                  $("#employer_deduction").val(employer_deduction);
                  $("#employee_deduction").val(employee_deduction);
                }else if(totalpf < parseFloat(letpfamount)){
                    var employer_deduction=totalpf * (Employer_pf/100);
                  var employee_deduction=totalpf * (employee_pf/100);

                  $("#employer_deduction").val(employer_deduction);
                  $("#employee_deduction").val(employee_deduction);
                }
                  $("#pf_employee_deduction").text(employee_deduction);
                  $("#pf_employee_deduction_benefit").text(employer_deduction);
                  var totaldeduction = 0;
                  $('.total_deduction').each(function() {

                  totaldeduction += parseFloat($(this).text());

                  });
                  $("#total_deduction_amount").text(totaldeduction);

                   var monthlydeduction = 0;
                  $('.monthly_deduction').each(function() {

                  monthlydeduction += parseFloat($(this).text());

                  });
                  $("#monthly_deduction_amount").text(monthlydeduction);

                  var totalbenefit = 0;
                  $('.total_benefit').each(function() {

                  totalbenefit += parseFloat($(this).text());

                  });
                  $("#total_benefit_amount").text(totalbenefit);
                   var monthlybenefit = 0;
                  $('.monthly_benefit').each(function() {

                  monthlybenefit += parseFloat($(this).text());

                  });
                  $("#monthly_benefit_amount").text(monthlybenefit);

                  var totaltakehome = $('#total_gross_earning').text() - $('#total_deduction_amount').text();
                  $('#total_taken_amount').text(totaltakehome);
                  $('#monthly_taken_amount').text(totaltakehome/12);
                  var totalctc = parseFloat($('#total_gross_earning').text()) +  parseFloat($("#total_benefit_amount").text());
                  $('#total_ctc_amount').text(totalctc);
                  $('#monthly_ctc_amount').text(totalctc/12);
              //  }
      
  }

   if ($('#esi_include').prop('checked')) {
      $('.esi_deduction_lable').show();
                $('.esi_percent').show();
                $('input[name="esi"]').val('1');
                $("#employee_esi_deduction").show();
                $("#employer_esi_deduction").show();
                var totalgross = parseFloat($('#total_gross_earning').text());
                var Employer_esi=$("#Employer_esi").val();

                var employee_esi=$("#employee_esi").val();

                var employer_deduction=totalgross * (Employer_esi/100);

                var employee_deduction=totalgross * (employee_esi/100);

            $("#employer_esi_deduction").val(employer_deduction);
            $("#employee_esi_deduction").val(employee_deduction);

            $("#esi_employee_deduction").text(employee_deduction);
            $("#esi_employee_deduction_benefit").text(employer_deduction);
             var totaldeduction = 0;
                  $('.total_deduction').each(function() {

                  totaldeduction += parseFloat($(this).text());

                  });
                  $("#total_deduction_amount").text(totaldeduction);

                   var monthlydeduction = 0;
                  $('.monthly_deduction').each(function() {

                  monthlydeduction += parseFloat($(this).text());

                  });
                  $("#monthly_deduction_amount").text(monthlydeduction);

                  var totalbenefit = 0;
                  $('.total_benefit').each(function() {

                  totalbenefit += parseFloat($(this).text());

                  });
                  $("#total_benefit_amount").text(totalbenefit);
                   var monthlybenefit = 0;
                  $('.monthly_benefit').each(function() {

                  monthlybenefit += parseFloat($(this).text());

                  });
                  $("#monthly_benefit_amount").text(monthlybenefit);

                  var totaltakehome = $('#total_gross_earning').text() - $('#total_deduction_amount').text();
                  $('#total_taken_amount').text(totaltakehome);
                  $('#monthly_taken_amount').text(totaltakehome/12);
                  var totalctc = parseFloat($('#total_gross_earning').text()) +  parseFloat($("#total_benefit_amount").text());
                  $('#total_ctc_amount').text(totalctc);
                  $('#monthly_ctc_amount').text(totalctc/12);
      
  }
  //$('#total_gross_earning').text(total);

    }

    function deletebenefitDiv(type,div_id) {
      //alert(div_id);
      var total=0;
      $("#"+type+"_"+div_id).remove();

      var totaldeduction = 0;
                  $('.total_deduction').each(function() {

                  totaldeduction += parseFloat($(this).text());

                  });
                  $("#total_deduction_amount").text(totaldeduction);

                   var monthlydeduction = 0;
                  $('.monthly_deduction').each(function() {

                  monthlydeduction += parseFloat($(this).text());

                  });
                  $("#monthly_deduction_amount").text(monthlydeduction);

                  var totalbenefit = 0;
                  $('.total_benefit').each(function() {

                  totalbenefit += parseFloat($(this).text());

                  });
                  $("#total_benefit_amount").text(totalbenefit);
                   var monthlybenefit = 0;
                  $('.monthly_benefit').each(function() {

                  monthlybenefit += parseFloat($(this).text());

                  });
                  $("#monthly_benefit_amount").text(monthlybenefit);

                  var totaltakehome = $('#total_gross_earning').text() - $('#total_deduction_amount').text();
                  $('#total_taken_amount').text(totaltakehome);
                  $('#monthly_taken_amount').text(totaltakehome/12);
                  var totalctc = parseFloat($('#total_gross_earning').text()) +  parseFloat($("#total_benefit_amount").text());
                  $('#total_ctc_amount').text(totalctc);
                  $('#monthly_ctc_amount').text(totalctc/12);
        ////// if pf include ////////////// 
   if ($('#pf_include').prop('checked')) {
      ///House_Rent_Allowance=parseFloat($(".House_Rent_Allowance").text());
      
      //if(!House_Rent_Allowance){
       // House_Rent_Allowance=0;
      //}
      //alert($('.basicAmount').text());
      var basicAmount = $('.basicAmount').text(); 
      $('.pf_deduction_lable').show();
                $('.pf_percent').show();
                $('input[name="pf"]').val('1');
                $("#employee_deduction").show();
                $("#employer_deduction").show();

                
                var totalpf = 0;
                  $('.pfYes').each(function() {

                  totalpf += parseFloat($(this).text());

                  });

                 var Employer_pf=$("#Employer_pf").val();
                  var employee_pf=$("#employee_pf").val();
                  var letpfamount  = '180000';

                if(parseFloat(basicAmount) >= parseFloat(letpfamount)){
                 

                  var employer_deduction=basicAmount * (Employer_pf/100);
                  var employee_deduction=basicAmount * (employee_pf/100);

                  $("#employer_deduction").val(employer_deduction);
                  $("#employee_deduction").val(employee_deduction);
                }else if(totalpf >= parseFloat(letpfamount)){
                   var employer_deduction=totalpf * (Employer_pf/100);
                  var employee_deduction=totalpf * (employee_pf/100);

                  $("#employer_deduction").val(employer_deduction);
                  $("#employee_deduction").val(employee_deduction);
                }else if(totalpf < parseFloat(letpfamount)){
                    var employer_deduction=totalpf * (Employer_pf/100);
                  var employee_deduction=totalpf * (employee_pf/100);

                  $("#employer_deduction").val(employer_deduction);
                  $("#employee_deduction").val(employee_deduction);
                }

                  $("#pf_employee_deduction").text(employee_deduction);
                  $("#pf_employee_deduction_benefit").text(employer_deduction);
                  var totaldeduction = 0;
                  $('.total_deduction').each(function() {

                  totaldeduction += parseFloat($(this).text());

                  });
                  $("#total_deduction_amount").text(totaldeduction);

                   var monthlydeduction = 0;
                  $('.monthly_deduction').each(function() {

                  monthlydeduction += parseFloat($(this).text());

                  });
                  $("#monthly_deduction_amount").text(monthlydeduction);

                  var totalbenefit = 0;
                  $('.total_benefit').each(function() {

                  totalbenefit += parseFloat($(this).text());

                  });
                  $("#total_benefit_amount").text(totalbenefit);
                   var monthlybenefit = 0;
                  $('.monthly_benefit').each(function() {

                  monthlybenefit += parseFloat($(this).text());

                  });
                  $("#monthly_benefit_amount").text(monthlybenefit);

                  var totaltakehome = $('#total_gross_earning').text() - $('#total_deduction_amount').text();
                  $('#total_taken_amount').text(totaltakehome);
                  $('#monthly_taken_amount').text(totaltakehome/12);
                  var totalctc = parseFloat($('#total_gross_earning').text()) +  parseFloat($("#total_benefit_amount").text());
                  $('#total_ctc_amount').text(totalctc);
                  $('#monthly_ctc_amount').text(totalctc/12);
               // }
      
  }

   if ($('#esi_include').prop('checked')) {
      $('.esi_deduction_lable').show();
                $('.esi_percent').show();
                $('input[name="esi"]').val('1');
                $("#employee_esi_deduction").show();
                $("#employer_esi_deduction").show();
                var totalgross = parseFloat($('#total_gross_earning').text());
                var Employer_esi=$("#Employer_esi").val();

                var employee_esi=$("#employee_esi").val();

                var employer_deduction=totalgross * (Employer_esi/100);

                var employee_deduction=totalgross * (employee_esi/100);

            $("#employer_esi_deduction").val(employer_deduction);
            $("#employee_esi_deduction").val(employee_deduction);

            $("#esi_employee_deduction").text(employee_deduction);
            $("#esi_employee_deduction_benefit").text(employer_deduction);
             var totaldeduction = 0;
                  $('.total_deduction').each(function() {

                  totaldeduction += parseFloat($(this).text());

                  });
                  $("#total_deduction_amount").text(totaldeduction);

                   var monthlydeduction = 0;
                  $('.monthly_deduction').each(function() {

                  monthlydeduction += parseFloat($(this).text());

                  });
                  $("#monthly_deduction_amount").text(monthlydeduction);

                  var totalbenefit = 0;
                  $('.total_benefit').each(function() {

                  totalbenefit += parseFloat($(this).text());

                  });
                  $("#total_benefit_amount").text(totalbenefit);
                   var monthlybenefit = 0;
                  $('.monthly_benefit').each(function() {

                  monthlybenefit += parseFloat($(this).text());

                  });
                  $("#monthly_benefit_amount").text(monthlybenefit);

                  var totaltakehome = $('#total_gross_earning').text() - $('#total_deduction_amount').text();
                  $('#total_taken_amount').text(totaltakehome);
                  $('#monthly_taken_amount').text(totaltakehome/12);
                  var totalctc = parseFloat($('#total_gross_earning').text()) +  parseFloat($("#total_benefit_amount").text());
                  $('#total_ctc_amount').text(totalctc);
                  $('#monthly_ctc_amount').text(totalctc/12);
      
  }
  //$('#total_gross_earning').text(total);

    }
    
      function deleteDivajax(type,div_id) {
      //alert(div_id);
       $.post("<?php echo base_url('delete_salary_structure'); ?>", {id: div_id}, function(result){   
                  // alert(result);
            $("#"+type+"_"+div_id).remove();
                   
                });
           
      
    }
    
</script>
<script>

    function fortype(id) {
        var experience_div = $("#experience_div_type").val();
        var comtype = [];
       
        var div_id = (parseInt(experience_div) + 1 );
             // alert(div_id);
               $.post("<?php echo base_url('get_component_type'); ?>", {id: id}, function(result){   
                   //alert(result);
                 
                  var type=result.split(',');
              $('#component_type_new'+div_id).html(type[0]+','+type[1]);
                  // alert(type[2]);
                  if(type[3].trim()=='House Rent Allowance'){
                      $(".total_amount").removeClass("House_Rent_Allowance");
                     $('#calculate_amount'+div_id).addClass("House_Rent_Allowance");
                  }

                   if(type[3].trim()=='Basic Salary' && type[4].trim()=='Yes'){
                     $('#basic_amount').addClass("pfYes");
                     $('#basic_amount').addClass("basicAmount");
                  }

                  if(type[3].trim()=='Basic Salary' && type[5].trim()=='Yes'){
                     $('#basic_amount').addClass("esiYes");
                  }

                  

                  if(type[4].trim()=='Yes'){
                     $('#calculate_amount'+div_id).addClass("pfYes");
                  }else{
                     $('#calculate_amount'+div_id).removeClass("pfYes");
                  }
                   if(type[5].trim()=='Yes'){
                     $('#calculate_amount'+div_id).addClass("esiYes");
                  }else{
                    $('#calculate_amount'+div_id).removeClass("esiYes");
                  }
                  

                  if(type[2].trim()=='Yes'){
                  // $('#exp_'+div_id).find('.not_fixed').hide(); 
                  $('.not_fixed'+div_id).hide();   
                  $('.fixed_new'+div_id).show();  
                  //  alert(div_id);    
                  // comtype.push(type[2].trim()); 
                  }
                  else{
                  $('.not_fixed'+div_id).show();   
                  $('.fixed_new'+div_id).hide(); 
                  //comtype.push(type[2].trim());
                  }
        //alert(comtype);
                });
           

    }
    function ptax_deduction(state){
      var total=0;
      if(state!=""){

        ptax_state=state;
        total += parseFloat($('#total_gross_earning').text());
        total =parseInt(total/12);
        
         $.post("<?php echo base_url('ptax_deduction'); ?>", {state: state,total:total}, function(result){
               console.log(result);
               if(result!="no_data"){
                   $(".ptax_details").show();
                   var type=result.split(',');
                   $("#ptax_num").val(type[0]);
                   $("#ptax_monthly").val(type[1]);
                   $("#ptax_amount").val(type[1]*12);
                    $("#ptax_amount_deduction").text(type[1]*12);
                     $("#ptax_amount_deduction_monthly").text(type[1]);
                
                    var totaldeduction = 0;
                    $('.total_deduction').each(function() {

                    totaldeduction += parseFloat($(this).text());

                    });
                    $("#total_deduction_amount").text(totaldeduction);

                     var monthlydeduction = 0;
                  $('.monthly_deduction').each(function() {

                  monthlydeduction += parseFloat($(this).text());

                  });
                  $("#monthly_deduction_amount").text(monthlydeduction);

                    var totalbenefit = 0;
                  $('.total_benefit').each(function() {

                  totalbenefit += parseFloat($(this).text());

                  });
                  $("#total_benefit_amount").text(totalbenefit);
                   var monthlybenefit = 0;
                  $('.monthly_benefit').each(function() {

                  monthlybenefit += parseFloat($(this).text());

                  });
                  $("#monthly_benefit_amount").text(monthlybenefit);

                   var totaltakehome = $('#total_gross_earning').text() - $('#total_deduction_amount').text();
                  $('#total_taken_amount').text(totaltakehome);
                  $('#monthly_taken_amount').text(totaltakehome/12);
                  var totalctc = parseFloat($('#total_gross_earning').text()) +  parseFloat($("#total_benefit_amount").text());
                  $('#total_ctc_amount').text(totalctc);
                  $('#monthly_ctc_amount').text(totalctc/12);
                    //$("#total_calculate_amount").text(parseFloat(total*12) - parseFloat(deduction));


               }else{

                alert("Amount is out of Ptax range please create Range of this type amount in Ptax section ");
               $("#ptax_div").hide();
               $("#ptax"). prop("checked", false);
               }

          });

      }
      
    }


     function fordeductiontype(id) {
        var deduction_div = $("#deduction_div_type").val();
       
        var div_id = (parseInt(deduction_div) + 1 );
             // alert(div_id);
               $.post("<?php echo base_url('get_component_deduction'); ?>", {id: id}, function(result){   
                   //alert(result);
                 
                  var type=result.split(',');
              $('#component_deduction_new'+div_id).html(type[0]+','+type[1]);
                if(type[2].trim()=='Yes'){
                      // $('#exp_'+div_id).find('.not_fixed').hide(); 
                $('.dednot_fixed'+div_id).hide();   
                $('.dedfixed_new'+div_id).show();  
                //  alert(div_id);     
        }
        else{
            $('.dednot_fixed'+div_id).show();   
            $('.dedfixed_new'+div_id).hide(); 
        }
                });
           

    }

    function forbenefittype(id) {
        var benefit_div = $("#benefit_div_type").val();
       
        var div_id = (parseInt(benefit_div) + 1 );
             // alert(div_id);
               $.post("<?php echo base_url('get_component_benefit'); ?>", {id: id}, function(result){   
                   //alert(result);
                 
                  var type=result.split(',');
              $('#component_benefit_new'+div_id).html(type[0]+','+type[1]);
                if(type[2].trim()=='Yes'){
                      // $('#exp_'+div_id).find('.not_fixed').hide(); 
                $('.benefitnot_fixed'+div_id).hide();   
                $('.benefitfixed_new'+div_id).show();  
                //  alert(div_id);     
        }
        else{
            $('.benefitnot_fixed'+div_id).show();   
            $('.benefitfixed_new'+div_id).hide(); 
        }
                });
           

    }

    function salarydeductioncalculation(value,id) {
    if (typeof id == 'undefined') {
        var id='';
        }
   // alert(value);
   //alert(id);
  var House_Rent_Allowance=0;  
  var ctc=$('#ctc_amount').val();
  var basic_amount=$('#basic_amount').html();
  var component=$('#component_deduction'+id).val();
  var base_on=$('#deduction_base_on'+id).val();
  var oparetor=$('#deduction_oparetor'+id).val();
  var amount=$('#amountdeduction'+id).val();
 //  var amount=value;

  
 
  if(component!='' && base_on!='' &&oparetor!='' && amount!=''){
     // var res = str1.concat(str2);
     var basicnow='';
      var type='';
      
       if(id==''){
           
       if(oparetor=='*'){
       var basicnow= parseFloat((amount/100)* parseFloat(ctc));
        }
         if(oparetor=='+'){
           //  alert(type)
       var basicnow= parseFloat((amount/100) + parseFloat(ctc));
        }
         if(oparetor=='-'){
      var basicnow= parseFloat((parseFloat(ctc) - parseFloat(amount/100)));
        }
           
         // var basicnow= parseFloat(((amount/100)*ctc));
         $('#deduction_amount').html(basicnow);
            }
            else{
                
               if(base_on=='CTC'){
         var type=ctc;
         
            }
            else{
               // alert(id);
                 var type=basic_amount;
                }
                if(oparetor=='*'){
       var calculate_amount= parseFloat((amount/100)* parseFloat(type));
        }
         if(oparetor=='+'){
           //  alert(type)
       var calculate_amount= parseFloat((amount/100) + parseFloat(type));
        }
         if(oparetor=='-'){
      var calculate_amount= parseFloat((parseFloat(type) - parseFloat(amount/100)));
        }
           
         $('#calculate_deductionamount'+id).html(calculate_amount);    
                
            }
           
     
      var input_value= base_on+oparetor+amount+'%';
     // alert(basicnow);
    
     
    var total = 0.00;

  $('.total_amount').each(function() {
    // console.log($(this).text());
      total += parseFloat($(this).text());
  });

 

  
  $('#total_gross_earning').text(total);

    var monthlyearning = 0.00;
    $('.total_amount_monthly').each(function() {
    // console.log($(this).text());
      monthlyearning += parseFloat($(this).text());
  });
  $('#monthly_gross_earning').text(monthlyearning);
  ////// if pf include ////////////// 
  if ($('#pf_include').prop('checked')) {
      ///House_Rent_Allowance=parseFloat($(".House_Rent_Allowance").text());
      
      //if(!House_Rent_Allowance){
       // House_Rent_Allowance=0;
      //}
      //alert($('.basicAmount').text());
      var basicAmount = $('.basicAmount').text(); 
      $('.pf_deduction_lable').show();
                $('.pf_percent').show();
                $('input[name="pf"]').val('1');
                $("#employee_deduction").show();
                $("#employer_deduction").show();

                
                var totalpf = 0;
                  $('.pfYes').each(function() {

                  totalpf += parseFloat($(this).text());

                  });

                 var Employer_pf=$("#Employer_pf").val();
                  var employee_pf=$("#employee_pf").val();
                  var letpfamount  = '180000';

                if(parseFloat(basicAmount) >= parseFloat(letpfamount)){
                 

                  var employer_deduction=basicAmount * (Employer_pf/100);
                  var employee_deduction=basicAmount * (employee_pf/100);

                  $("#employer_deduction").val(employer_deduction);
                  $("#employee_deduction").val(employee_deduction);
                }else if(totalpf >= parseFloat(letpfamount)){
                   var employer_deduction=totalpf * (Employer_pf/100);
                  var employee_deduction=totalpf * (employee_pf/100);

                  $("#employer_deduction").val(employer_deduction);
                  $("#employee_deduction").val(employee_deduction);
                }else if(totalpf < parseFloat(letpfamount)){
                    var employer_deduction=totalpf * (Employer_pf/100);
                  var employee_deduction=totalpf * (employee_pf/100);

                  $("#employer_deduction").val(employer_deduction);
                  $("#employee_deduction").val(employee_deduction);
                }

                  $("#pf_employee_deduction").text(employee_deduction);
                  $("#pf_employee_deduction_benefit").text(employer_deduction);
                  var totaldeduction = 0;
                  $('.total_deduction').each(function() {

                  totaldeduction += parseFloat($(this).text());

                  });
                  $("#total_deduction_amount").text(totaldeduction);

                   var monthlydeduction = 0;
                  $('.monthly_deduction').each(function() {

                  monthlydeduction += parseFloat($(this).text());

                  });
                  $("#monthly_deduction_amount").text(monthlydeduction);

                  var totalbenefit = 0;
                  $('.total_benefit').each(function() {

                  totalbenefit += parseFloat($(this).text());

                  });
                  $("#total_benefit_amount").text(totalbenefit);
                   var monthlybenefit = 0;
                  $('.monthly_benefit').each(function() {

                  monthlybenefit += parseFloat($(this).text());

                  });
                  $("#monthly_benefit_amount").text(monthlybenefit);

                  var totaltakehome = $('#total_gross_earning').text() - $('#total_deduction_amount').text();
                  $('#total_taken_amount').text(totaltakehome);
                  $('#monthly_taken_amount').text(totaltakehome/12);
                  var totalctc = parseFloat($('#total_gross_earning').text()) +  parseFloat($("#total_benefit_amount").text());
                  $('#total_ctc_amount').text(totalctc);
                  $('#monthly_ctc_amount').text(totalctc/12);
                //}
      
  }

   if ($('#esi_include').prop('checked')) {
      $('.esi_deduction_lable').show();
                $('.esi_percent').show();
                $('input[name="esi"]').val('1');
                $("#employee_esi_deduction").show();
                $("#employer_esi_deduction").show();
                var totalgross = parseFloat($('#total_gross_earning').text());
                var Employer_esi=$("#Employer_esi").val();

                var employee_esi=$("#employee_esi").val();

                var employer_deduction=totalgross * (Employer_esi/100);

                var employee_deduction=totalgross * (employee_esi/100);

            $("#employer_esi_deduction").val(employer_deduction);
            $("#employee_esi_deduction").val(employee_deduction);

            $("#esi_employee_deduction").text(employee_deduction);
            $("#esi_employee_deduction_benefit").text(employer_deduction);
             var totaldeduction = 0;
                  $('.total_deduction').each(function() {

                  totaldeduction += parseFloat($(this).text());

                  });
                  $("#total_deduction_amount").text(totaldeduction);
                   var monthlydeduction = 0;
                  $('.monthly_deduction').each(function() {

                  monthlydeduction += parseFloat($(this).text());

                  });
                  $("#monthly_deduction_amount").text(monthlydeduction);
                  var totalbenefit = 0;
                  $('.total_benefit').each(function() {

                  totalbenefit += parseFloat($(this).text());

                  });
                  $("#total_benefit_amount").text(totalbenefit);
                   var monthlybenefit = 0;
                  $('.monthly_benefit').each(function() {

                  monthlybenefit += parseFloat($(this).text());

                  });
                  $("#monthly_benefit_amount").text(monthlybenefit);

                  var totaltakehome = $('#total_gross_earning').text() - $('#total_deduction_amount').text();
                  $('#total_taken_amount').text(totaltakehome);
                  $('#monthly_taken_amount').text(totaltakehome/12);
                  var totalctc = parseFloat($('#total_gross_earning').text()) +  parseFloat($("#total_benefit_amount").text());
                  $('#total_ctc_amount').text(totalctc);
                  $('#monthly_ctc_amount').text(totalctc/12);
      
  }
  if(ptax_state!=""){

      $.post("<?php echo base_url('ptax_deduction'); ?>", {state: ptax_state,total:total}, function(result){
             
             if(result!="no_data"){
                 $(".ptax_details").show();
                 var type=result.split(',');
                 $("#ptax_num").val(type[0]);
                 $("#ptax_monthly").val(type[1]);
                 $("#ptax_amount").val(type[1]*12);
                
                  $("#ptax_amount_deduction").text(type[1]*12);
                   $("#ptax_amount_deduction_monthly").text(type[1]);
                
                    var totaldeduction = 0;
                    $('.total_deduction').each(function() {

                    totaldeduction += parseFloat($(this).text());

                    });
                    $("#total_deduction_amount").text(totaldeduction);
                     var monthlydeduction = 0;
                  $('.monthly_deduction').each(function() {

                  monthlydeduction += parseFloat($(this).text());

                  });
                  $("#monthly_deduction_amount").text(monthlydeduction);
                    var totalbenefit = 0;
                  $('.total_benefit').each(function() {

                  totalbenefit += parseFloat($(this).text());

                  });
                  $("#total_benefit_amount").text(totalbenefit);
                   var monthlybenefit = 0;
                  $('.monthly_benefit').each(function() {

                  monthlybenefit += parseFloat($(this).text());

                  });
                  $("#monthly_benefit_amount").text(monthlybenefit);

                   var totaltakehome = $('#total_gross_earning').text() - $('#total_deduction_amount').text();
                  $('#total_taken_amount').text(totaltakehome);
                  $('#monthly_taken_amount').text(totaltakehome/12);
                  var totalctc = parseFloat($('#total_gross_earning').text()) +  parseFloat($("#total_benefit_amount").text());
                  $('#total_ctc_amount').text(totalctc);
                  $('#monthly_ctc_amount').text(totalctc/12);


             }else{
              
              alert("Amount is out of Ptax range please create Range of this type amount in Ptax section ");
               $("#ptax_div").hide();
               $("#ptax"). prop("checked", false);

             }

        });
       
    }

 var totaldeduction = 0;
                    $('.total_deduction').each(function() {

                    totaldeduction += parseFloat($(this).text());

                    });
                    $("#total_deduction_amount").text(totaldeduction);
                     var monthlydeduction = 0;
                  $('.monthly_deduction').each(function() {

                  monthlydeduction += parseFloat($(this).text());

                  });
                  $("#monthly_deduction_amount").text(monthlydeduction);
                    var totalbenefit = 0;
                  $('.total_benefit').each(function() {

                  totalbenefit += parseFloat($(this).text());

                  });
                  $("#total_benefit_amount").text(totalbenefit);
                   var monthlybenefit = 0;
                  $('.monthly_benefit').each(function() {

                  monthlybenefit += parseFloat($(this).text());

                  });
                  $("#monthly_benefit_amount").text(monthlybenefit);

                   var totaltakehome = $('#total_gross_earning').text() - $('#total_deduction_amount').text();
                  $('#total_taken_amount').text(totaltakehome);
                  $('#monthly_taken_amount').text(totaltakehome/12);

var totalAmoutctc = parseFloat($('#total_gross_earning').text()) +  parseFloat($("#total_benefit_amount").text());
$('#total_ctc_amount').text(totalAmoutctc);
$('#monthly_ctc_amount').text(totalctc/12);

var totalctc = $('#total_ctc_amount').text();
     
      $('#formuladeduction'+id).val(input_value);
      
      if(parseFloat(totalctc)>parseFloat(ctc)){
          alert('Your CTC amount is less than total amount');
         $("#submit").attr("disabled", true); 
    }
    else if(parseFloat(totalctc)<parseFloat(ctc)){
        //alert('Your CTC amount is less than total amount');
         $("#submit").attr("disabled", true); 
    }else{
      $("#submit").attr("disabled", false);
    }
        }
        else{
            
        alert('Please choose all field');    
        }
  

  
    }

     function salarybenefitcalculation(value,id) {
    if (typeof id == 'undefined') {
        var id='';
        }
   // alert(value);
   //alert(id);
  var House_Rent_Allowance=0;  
  var ctc=$('#ctc_amount').val();
  var basic_amount=$('#basic_amount').html();
  var component=$('#component_benefit'+id).val();
  var base_on=$('#benefit_base_on'+id).val();
  var oparetor=$('#benefit_oparetor'+id).val();
  var amount=$('#amountbenefit'+id).val();
 //  var amount=value;

  
 
  if(component!='' && base_on!='' &&oparetor!='' && amount!=''){
     // var res = str1.concat(str2);
     var basicnow='';
      var type='';
      
       if(id==''){
           
       if(oparetor=='*'){
       var basicnow= parseFloat((amount/100)* parseFloat(ctc));
        }
         if(oparetor=='+'){
           //  alert(type)
       var basicnow= parseFloat((amount/100) + parseFloat(ctc));
        }
         if(oparetor=='-'){
      var basicnow= parseFloat((parseFloat(ctc) - parseFloat(amount/100)));
        }
           
         // var basicnow= parseFloat(((amount/100)*ctc));
         $('#benefit_amount').html(basicnow);
            }
            else{
                
               if(base_on=='CTC'){
         var type=ctc;
         
            }
            else{
               // alert(id);
                 var type=basic_amount;
                }
                if(oparetor=='*'){
       var calculate_amount= parseFloat((amount/100)* parseFloat(type));
        }
         if(oparetor=='+'){
           //  alert(type)
       var calculate_amount= parseFloat((amount/100) + parseFloat(type));
        }
         if(oparetor=='-'){
      var calculate_amount= parseFloat((parseFloat(type) - parseFloat(amount/100)));
        }
           
         $('#calculate_benefitamount'+id).html(calculate_amount);    
                
            }
           
     
      var input_value= base_on+oparetor+amount+'%';
     // alert(basicnow);
    
     
    var total = 0.00;

  $('.total_amount').each(function() {
    // console.log($(this).text());
      total += parseFloat($(this).text());
  });

 

  
  $('#total_gross_earning').text(total);
var monthlyearning = 0.00;
    $('.total_amount_monthly').each(function() {
    // console.log($(this).text());
      monthlyearning += parseFloat($(this).text());
  });
  $('#monthly_gross_earning').text(monthlyearning);
  ////// if pf include ////////////// 
  if ($('#pf_include').prop('checked')) {
      ///House_Rent_Allowance=parseFloat($(".House_Rent_Allowance").text());
      
      //if(!House_Rent_Allowance){
       // House_Rent_Allowance=0;
      //}
      //alert($('.basicAmount').text());
      var basicAmount = $('.basicAmount').text(); 
      $('.pf_deduction_lable').show();
                $('.pf_percent').show();
                $('input[name="pf"]').val('1');
                $("#employee_deduction").show();
                $("#employer_deduction").show();

               
                var totalpf = 0;
                  $('.pfYes').each(function() {

                  totalpf += parseFloat($(this).text());

                  });

                 var Employer_pf=$("#Employer_pf").val();
                  var employee_pf=$("#employee_pf").val();
                  var letpfamount  = '180000';

                if(parseFloat(basicAmount) >= parseFloat(letpfamount)){
                 

                  var employer_deduction=basicAmount * (Employer_pf/100);
                  var employee_deduction=basicAmount * (employee_pf/100);

                  $("#employer_deduction").val(employer_deduction);
                  $("#employee_deduction").val(employee_deduction);
                }else if(totalpf >= parseFloat(letpfamount)){
                   var employer_deduction=totalpf * (Employer_pf/100);
                  var employee_deduction=totalpf * (employee_pf/100);

                  $("#employer_deduction").val(employer_deduction);
                  $("#employee_deduction").val(employee_deduction);
                }else if(totalpf < parseFloat(letpfamount)){
                    var employer_deduction=totalpf * (Employer_pf/100);
                  var employee_deduction=totalpf * (employee_pf/100);

                  $("#employer_deduction").val(employer_deduction);
                  $("#employee_deduction").val(employee_deduction);
                }

                  $("#pf_employee_deduction").text(employee_deduction);
                  $("#pf_employee_deduction_benefit").text(employer_deduction);
                  var totaldeduction = 0;
                  $('.total_deduction').each(function() {

                  totaldeduction += parseFloat($(this).text());

                  });
                  $("#total_deduction_amount").text(totaldeduction);
                   var monthlydeduction = 0;
                  $('.monthly_deduction').each(function() {

                  monthlydeduction += parseFloat($(this).text());

                  });
                  $("#monthly_deduction_amount").text(monthlydeduction);

                  var totalbenefit = 0;
                  $('.total_benefit').each(function() {

                  totalbenefit += parseFloat($(this).text());

                  });
                  $("#total_benefit_amount").text(totalbenefit);
                   var monthlybenefit = 0;
                  $('.monthly_benefit').each(function() {

                  monthlybenefit += parseFloat($(this).text());

                  });
                  $("#monthly_benefit_amount").text(monthlybenefit);

                  var totaltakehome = $('#total_gross_earning').text() - $('#total_deduction_amount').text();
                  $('#total_taken_amount').text(totaltakehome);
                  $('#monthly_taken_amount').text(totaltakehome/12);
                  var totalctc = parseFloat($('#total_gross_earning').text()) +  parseFloat($("#total_benefit_amount").text());
                  $('#total_ctc_amount').text(totalctc);
                  $('#monthly_ctc_amount').text(totalctc/12);
                //}
      
  }

   if ($('#esi_include').prop('checked')) {
      $('.esi_deduction_lable').show();
                $('.esi_percent').show();
                $('input[name="esi"]').val('1');
                $("#employee_esi_deduction").show();
                $("#employer_esi_deduction").show();
                var totalgross = parseFloat($('#total_gross_earning').text());
                var Employer_esi=$("#Employer_esi").val();

                var employee_esi=$("#employee_esi").val();

                var employer_deduction=totalgross * (Employer_esi/100);

                var employee_deduction=totalgross * (employee_esi/100);

            $("#employer_esi_deduction").val(employer_deduction);
            $("#employee_esi_deduction").val(employee_deduction);

            $("#esi_employee_deduction").text(employee_deduction);
            $("#esi_employee_deduction_benefit").text(employer_deduction);
             var totaldeduction = 0;
                  $('.total_deduction').each(function() {

                  totaldeduction += parseFloat($(this).text());

                  });
                  $("#total_deduction_amount").text(totaldeduction);

                   var monthlydeduction = 0;
                  $('.monthly_deduction').each(function() {

                  monthlydeduction += parseFloat($(this).text());

                  });
                  $("#monthly_deduction_amount").text(monthlydeduction);

                  var totalbenefit = 0;
                  $('.total_benefit').each(function() {

                  totalbenefit += parseFloat($(this).text());

                  });
                  $("#total_benefit_amount").text(totalbenefit);
                   var monthlybenefit = 0;
                  $('.monthly_benefit').each(function() {

                  monthlybenefit += parseFloat($(this).text());

                  });
                  $("#monthly_benefit_amount").text(monthlybenefit);

                  var totaltakehome = $('#total_gross_earning').text() - $('#total_deduction_amount').text();
                  $('#total_taken_amount').text(totaltakehome);
                  $('#monthly_taken_amount').text(totaltakehome/12);
                  var totalctc = parseFloat($('#total_gross_earning').text()) +  parseFloat($("#total_benefit_amount").text());
                  $('#total_ctc_amount').text(totalctc);
                  $('#monthly_ctc_amount').text(totalctc/12);
      
  }
  if(ptax_state!=""){

      $.post("<?php echo base_url('ptax_deduction'); ?>", {state: ptax_state,total:total}, function(result){
             
             if(result!="no_data"){
                 $(".ptax_details").show();
                 var type=result.split(',');
                 $("#ptax_num").val(type[0]);
                 $("#ptax_monthly").val(type[1]);
                 $("#ptax_amount").val(type[1]*12);
                
                  $("#ptax_amount_deduction").text(type[1]*12);
                  $("#ptax_amount_deduction_monthly").text(type[1]);

                  
                    var totaldeduction = 0;
                    $('.total_deduction').each(function() {

                    totaldeduction += parseFloat($(this).text());

                    });
                    $("#total_deduction_amount").text(totaldeduction);

                     var monthlydeduction = 0;
                  $('.monthly_deduction').each(function() {

                  monthlydeduction += parseFloat($(this).text());

                  });
                  $("#monthly_deduction_amount").text(monthlydeduction); 

                    var totalbenefit = 0;
                  $('.total_benefit').each(function() {

                  totalbenefit += parseFloat($(this).text());

                  });
                  $("#total_benefit_amount").text(totalbenefit);
                   var monthlybenefit = 0;
                  $('.monthly_benefit').each(function() {

                  monthlybenefit += parseFloat($(this).text());

                  });
                  $("#monthly_benefit_amount").text(monthlybenefit);

                   var totaltakehome = $('#total_gross_earning').text() - $('#total_deduction_amount').text();
                  $('#total_taken_amount').text(totaltakehome);
                  $('#monthly_taken_amount').text(totaltakehome/12);
                  var totalctc = parseFloat($('#total_gross_earning').text()) +  parseFloat($("#total_benefit_amount").text());
                  $('#total_ctc_amount').text(totalctc);
                  $('#monthly_ctc_amount').text(totalctc/12);


             }else{
              
              alert("Amount is out of Ptax range please create Range of this type amount in Ptax section ");
               $("#ptax_div").hide();
               $("#ptax"). prop("checked", false);

             }

        });
       
    }

 var totaldeduction = 0;
                    $('.total_deduction').each(function() {

                    totaldeduction += parseFloat($(this).text());

                    });
                    $("#total_deduction_amount").text(totaldeduction);

                     var monthlydeduction = 0;
                  $('.monthly_deduction').each(function() {

                  monthlydeduction += parseFloat($(this).text());

                  });
                  $("#monthly_deduction_amount").text(monthlydeduction);

                    var totalbenefit = 0;
                  $('.total_benefit').each(function() {

                  totalbenefit += parseFloat($(this).text());

                  });
                  $("#total_benefit_amount").text(totalbenefit);
                   var monthlybenefit = 0;
                  $('.monthly_benefit').each(function() {

                  monthlybenefit += parseFloat($(this).text());

                  });
                  $("#monthly_benefit_amount").text(monthlybenefit);

                   var totaltakehome = $('#total_gross_earning').text() - $('#total_deduction_amount').text();
                  $('#total_taken_amount').text(totaltakehome);
                  $('#monthly_taken_amount').text(totaltakehome/12);

var totalAmoutctc = parseFloat($('#total_gross_earning').text()) +  parseFloat($("#total_benefit_amount").text());
$('#total_ctc_amount').text(totalAmoutctc);
$('#monthly_ctc_amount').text(totalctc/12);

var totalctc = $('#total_ctc_amount').text();
     
      $('#formulabenefit'+id).val(input_value);
      
      if(parseFloat(totalctc)>parseFloat(ctc)){
          alert('Your CTC amount is less than total amount');
         $("#submit").attr("disabled", true); 
    }
    else if(parseFloat(totalctc)<parseFloat(ctc)){
        //alert('Your CTC amount is less than total amount');
         $("#submit").attr("disabled", true); 
    }else{
      $("#submit").attr("disabled", false);
    }
        }
        else{
            
        alert('Please choose all field');    
        }
  

  
    }

    function salarydeductioncalculation_new(value,id) {
         if(value==''){
         value   =0; 
        }
         alert(value);
         var total=0;
          var basicnow= parseFloat(value);
         $('#calculate_deductionamount'+id).html(basicnow);
        var totaldeduction = 0;
                    $('.total_deduction').each(function() {

                    totaldeduction += parseFloat($(this).text());

                    });
                    $("#total_deduction_amount").text(totaldeduction);
                     var monthlydeduction = 0;
                  $('.monthly_deduction').each(function() {

                  monthlydeduction += parseFloat($(this).text());

                  });
                  $("#monthly_deduction_amount").text(monthlydeduction);

                    var totalbenefit = 0;
                  $('.total_benefit').each(function() {

                  totalbenefit += parseFloat($(this).text());

                  });
                  $("#total_benefit_amount").text(totalbenefit);
                   var monthlybenefit = 0;
                  $('.monthly_benefit').each(function() {

                  monthlybenefit += parseFloat($(this).text());

                  });
                  $("#monthly_benefit_amount").text(monthlybenefit);

                   var totaltakehome = $('#total_gross_earning').text() - $('#total_deduction_amount').text();
                  $('#total_taken_amount').text(totaltakehome);
                  $('#monthly_taken_amount').text(totaltakehome/12);
         //var ptaxtotal=total/12;
         ////// if pf include ////////////// 
      if ($('#pf_include').prop('checked')) {
           var basicAmount = $('.basicAmount').text(); 
      $('.pf_deduction_lable').show();
                $('.pf_percent').show();
                $('input[name="pf"]').val('1');
                $("#employee_deduction").show();
                $("#employer_deduction").show();

                
                var totalpf = 0;
                  $('.pfYes').each(function() {

                  totalpf += parseFloat($(this).text());

                  });

                 var Employer_pf=$("#Employer_pf").val();
                  var employee_pf=$("#employee_pf").val();
                  var letpfamount  = '180000';

                if(parseFloat(basicAmount) >= parseFloat(letpfamount)){
                 

                  var employer_deduction=basicAmount * (Employer_pf/100);
                  var employee_deduction=basicAmount * (employee_pf/100);

                  $("#employer_deduction").val(employer_deduction);
                  $("#employee_deduction").val(employee_deduction);
                }else if(totalpf >= parseFloat(letpfamount)){
                   var employer_deduction=totalpf * (Employer_pf/100);
                  var employee_deduction=totalpf * (employee_pf/100);

                  $("#employer_deduction").val(employer_deduction);
                  $("#employee_deduction").val(employee_deduction);
                }else if(totalpf < parseFloat(letpfamount)){
                    var employer_deduction=totalpf * (Employer_pf/100);
                  var employee_deduction=totalpf * (employee_pf/100);

                  $("#employer_deduction").val(employer_deduction);
                  $("#employee_deduction").val(employee_deduction);
                }

                  $("#pf_employee_deduction").text(employee_deduction);
                  $("#pf_employee_deduction_benefit").text(employer_deduction);
                  var totaldeduction = 0;
                  $('.total_deduction').each(function() {

                  totaldeduction += parseFloat($(this).text());

                  });
                  $("#total_deduction_amount").text(totaldeduction);

                   var monthlydeduction = 0;
                  $('.monthly_deduction').each(function() {

                  monthlydeduction += parseFloat($(this).text());

                  });
                  $("#monthly_deduction_amount").text(monthlydeduction);

                  var totalbenefit = 0;
                  $('.total_benefit').each(function() {

                  totalbenefit += parseFloat($(this).text());

                  });
                  $("#total_benefit_amount").text(totalbenefit);
                   var monthlybenefit = 0;
                  $('.monthly_benefit').each(function() {

                  monthlybenefit += parseFloat($(this).text());

                  });
                  $("#monthly_benefit_amount").text(monthlybenefit);

                  var totaltakehome = $('#total_gross_earning').text() - $('#total_deduction_amount').text();
                  $('#total_taken_amount').text(totaltakehome);
                  $('#monthly_taken_amount').text(totaltakehome/12);
                  var totalctc = parseFloat($('#total_gross_earning').text()) +  parseFloat($("#total_benefit_amount").text());
                  $('#total_ctc_amount').text(totalctc);
                  $('#monthly_ctc_amount').text(totalctc/12);
               // }
      
      
  }

   if ($('#esi_include').prop('checked')) {
      $('.esi_deduction_lable').show();
                $('.esi_percent').show();
                $('input[name="esi"]').val('1');
                $("#employee_esi_deduction").show();
                $("#employer_esi_deduction").show();
                var totalgross = parseFloat($('#total_gross_earning').text());
                var Employer_esi=$("#Employer_esi").val();

                var employee_esi=$("#employee_esi").val();

                var employer_deduction=totalgross * (Employer_esi/100);

                var employee_deduction=totalgross * (employee_esi/100);

            $("#employer_esi_deduction").val(employer_deduction);
            $("#employee_esi_deduction").val(employee_deduction);

            $("#esi_employee_deduction").text(employee_deduction);
            $("#esi_employee_deduction_benefit").text(employer_deduction);
             var totaldeduction = 0;
                  $('.total_deduction').each(function() {

                  totaldeduction += parseFloat($(this).text());

                  });
                  $("#total_deduction_amount").text(totaldeduction);
                   var monthlydeduction = 0;
                  $('.monthly_deduction').each(function() {

                  monthlydeduction += parseFloat($(this).text());

                  });
                  $("#monthly_deduction_amount").text(monthlydeduction);
                  var totalbenefit = 0;
                  $('.total_benefit').each(function() {

                  totalbenefit += parseFloat($(this).text());

                  });
                  $("#total_benefit_amount").text(totalbenefit);
                   var monthlybenefit = 0;
                  $('.monthly_benefit').each(function() {

                  monthlybenefit += parseFloat($(this).text());

                  });
                  $("#monthly_benefit_amount").text(monthlybenefit);

                  var totaltakehome = $('#total_gross_earning').text() - $('#total_deduction_amount').text();
                  $('#total_taken_amount').text(totaltakehome);
                  $('#monthly_taken_amount').text(totaltakehome/12);
                  var totalctc = parseFloat($('#total_gross_earning').text()) +  parseFloat($("#total_benefit_amount").text());
                  $('#total_ctc_amount').text(totalctc);
                  $('#monthly_ctc_amount').text(totalctc/12);
      
  }
      if(ptax_state!=""){

        $.post("<?php echo base_url('ptax_deduction'); ?>", {state: ptax_state,total:total}, function(result){
             
             if(result!="no_data"){
                 $(".ptax_details").show();
                 var type=result.split(',');
                 $("#ptax_num").val(type[0]);
                 $("#ptax_monthly").val(type[1]);
                 $("#ptax_amount").val(type[1]*12);
                
                  $("#ptax_amount_deduction").text(type[1]*12);
                   $("#ptax_amount_deduction_monthly").text(type[1]);
                
                    var totaldeduction = 0;
                    $('.total_deduction').each(function() {

                    totaldeduction += parseFloat($(this).text());

                    });
                    $("#total_deduction_amount").text(totaldeduction);
                     var monthlydeduction = 0;
                  $('.monthly_deduction').each(function() {

                  monthlydeduction += parseFloat($(this).text());

                  });
                  $("#monthly_deduction_amount").text(monthlydeduction);
                    var totalbenefit = 0;
                  $('.total_benefit').each(function() {

                  totalbenefit += parseFloat($(this).text());

                  });
                  $("#total_benefit_amount").text(totalbenefit);
                   var monthlybenefit = 0;
                  $('.monthly_benefit').each(function() {

                  monthlybenefit += parseFloat($(this).text());

                  });
                  $("#monthly_benefit_amount").text(monthlybenefit);

                   var totaltakehome = $('#total_gross_earning').text() - $('#total_deduction_amount').text();
                  $('#total_taken_amount').text(totaltakehome);
                  $('#monthly_taken_amount').text(totaltakehome/12);
                  var totalctc = parseFloat($('#total_gross_earning').text()) +  parseFloat($("#total_benefit_amount").text());
                  $('#total_ctc_amount').text(totalctc);
                  $('#monthly_ctc_amount').text(totalctc/12);


             }else{
              
              alert("Amount is out of Ptax range please create Range of this type amount in Ptax section ");
               $("#ptax_div").hide();
               $("#ptax"). prop("checked", false);

             }

        });
         
      }
      var totalctc = parseFloat($('#total_gross_earning').text()) +  parseFloat($("#total_benefit_amount").text());
      $('#total_ctc_amount').text(totalctc);
      $('#monthly_ctc_amount').text(totalctc/12);
     salarydeductioncalculation();
         
    }

     function salarybenefitcalculation_new(value,id) {
         if(value==''){
         value   =0; 
        }
         alert(value);
         var total=0;
          var basicnow= parseFloat(value);
         $('#calculate_benefitamount'+id).html(basicnow);
        var totaldeduction = 0;
                    $('.total_deduction').each(function() {

                    totaldeduction += parseFloat($(this).text());

                    });
                    $("#total_deduction_amount").text(totaldeduction);
                     var monthlydeduction = 0;
                  $('.monthly_deduction').each(function() {

                  monthlydeduction += parseFloat($(this).text());

                  });
                  $("#monthly_deduction_amount").text(monthlydeduction);
                    var totalbenefit = 0;
                  $('.total_benefit').each(function() {

                  totalbenefit += parseFloat($(this).text());

                  });
                  $("#total_benefit_amount").text(totalbenefit);
                   var monthlybenefit = 0;
                  $('.monthly_benefit').each(function() {

                  monthlybenefit += parseFloat($(this).text());

                  });
                  $("#monthly_benefit_amount").text(monthlybenefit);

                   var totaltakehome = $('#total_gross_earning').text() - $('#total_deduction_amount').text();
                  $('#total_taken_amount').text(totaltakehome);
                  $('#monthly_taken_amount').text(totaltakehome/12);
         //var ptaxtotal=total/12;
         ////// if pf include ////////////// 
      if ($('#pf_include').prop('checked')) {
           var basicAmount = $('.basicAmount').text(); 
      $('.pf_deduction_lable').show();
                $('.pf_percent').show();
                $('input[name="pf"]').val('1');
                $("#employee_deduction").show();
                $("#employer_deduction").show();

               
                var totalpf = 0;
                  $('.pfYes').each(function() {

                  totalpf += parseFloat($(this).text());

                  });

                 var Employer_pf=$("#Employer_pf").val();
                  var employee_pf=$("#employee_pf").val();
                  var letpfamount  = '180000';

                if(parseFloat(basicAmount) >= parseFloat(letpfamount)){
                 

                  var employer_deduction=basicAmount * (Employer_pf/100);
                  var employee_deduction=basicAmount * (employee_pf/100);

                  $("#employer_deduction").val(employer_deduction);
                  $("#employee_deduction").val(employee_deduction);
                }else if(totalpf >= parseFloat(letpfamount)){
                   var employer_deduction=totalpf * (Employer_pf/100);
                  var employee_deduction=totalpf * (employee_pf/100);

                  $("#employer_deduction").val(employer_deduction);
                  $("#employee_deduction").val(employee_deduction);
                }else if(totalpf < parseFloat(letpfamount)){
                    var employer_deduction=letpfamount * (Employer_pf/100);
                  var employee_deduction=letpfamount * (employee_pf/100);

                  $("#employer_deduction").val(employer_deduction);
                  $("#employee_deduction").val(employee_deduction);
                }

                  $("#pf_employee_deduction").text(employee_deduction);
                  $("#pf_employee_deduction_benefit").text(employer_deduction);
                  var totaldeduction = 0;
                  $('.total_deduction').each(function() {

                  totaldeduction += parseFloat($(this).text());

                  });
                  $("#total_deduction_amount").text(totaldeduction);
                   var monthlydeduction = 0;
                  $('.monthly_deduction').each(function() {

                  monthlydeduction += parseFloat($(this).text());

                  });
                  $("#monthly_deduction_amount").text(monthlydeduction);

                  var totalbenefit = 0;
                  $('.total_benefit').each(function() {

                  totalbenefit += parseFloat($(this).text());

                  });
                  $("#total_benefit_amount").text(totalbenefit);
                   var monthlybenefit = 0;
                  $('.monthly_benefit').each(function() {

                  monthlybenefit += parseFloat($(this).text());

                  });
                  $("#monthly_benefit_amount").text(monthlybenefit);

                  var totaltakehome = $('#total_gross_earning').text() - $('#total_deduction_amount').text();
                  $('#total_taken_amount').text(totaltakehome);
                  $('#monthly_taken_amount').text(totaltakehome/12);
                  var totalctc = parseFloat($('#total_gross_earning').text()) +  parseFloat($("#total_benefit_amount").text());
                  $('#total_ctc_amount').text(totalctc);
                  $('#monthly_ctc_amount').text(totalctc/12);
                //}
      
      
  }

   if ($('#esi_include').prop('checked')) {
      $('.esi_deduction_lable').show();
                $('.esi_percent').show();
                $('input[name="esi"]').val('1');
                $("#employee_esi_deduction").show();
                $("#employer_esi_deduction").show();
                var totalgross = parseFloat($('#total_gross_earning').text());
                var Employer_esi=$("#Employer_esi").val();

                var employee_esi=$("#employee_esi").val();

                var employer_deduction=totalgross * (Employer_esi/100);

                var employee_deduction=totalgross * (employee_esi/100);

            $("#employer_esi_deduction").val(employer_deduction);
            $("#employee_esi_deduction").val(employee_deduction);

            $("#esi_employee_deduction").text(employee_deduction);
            $("#esi_employee_deduction_benefit").text(employer_deduction);
             var totaldeduction = 0;
                  $('.total_deduction').each(function() {

                  totaldeduction += parseFloat($(this).text());

                  });
                  $("#total_deduction_amount").text(totaldeduction);

                   var monthlydeduction = 0;
                  $('.monthly_deduction').each(function() {

                  monthlydeduction += parseFloat($(this).text());

                  });
                  $("#monthly_deduction_amount").text(monthlydeduction);
                  var totalbenefit = 0;
                  $('.total_benefit').each(function() {

                  totalbenefit += parseFloat($(this).text());

                  });
                  $("#total_benefit_amount").text(totalbenefit);
                   var monthlybenefit = 0;
                  $('.monthly_benefit').each(function() {

                  monthlybenefit += parseFloat($(this).text());

                  });
                  $("#monthly_benefit_amount").text(monthlybenefit);

                  var totaltakehome = $('#total_gross_earning').text() - $('#total_deduction_amount').text();
                  $('#total_taken_amount').text(totaltakehome);
                  $('#monthly_taken_amount').text(totaltakehome/12);
                  var totalctc = parseFloat($('#total_gross_earning').text()) +  parseFloat($("#total_benefit_amount").text());
                  $('#total_ctc_amount').text(totalctc);
                  $('#monthly_ctc_amount').text(totalctc/12);
      
  }
      if(ptax_state!=""){

        $.post("<?php echo base_url('ptax_deduction'); ?>", {state: ptax_state,total:total}, function(result){
             
             if(result!="no_data"){
                 $(".ptax_details").show();
                 var type=result.split(',');
                 $("#ptax_num").val(type[0]);
                 $("#ptax_monthly").val(type[1]);
                 $("#ptax_amount").val(type[1]*12);
                
                  $("#ptax_amount_deduction").text(type[1]*12);
                   $("#ptax_amount_deduction_monthly").text(type[1]);
                
                    var totaldeduction = 0;
                    $('.total_deduction').each(function() {

                    totaldeduction += parseFloat($(this).text());

                    });
                    $("#total_deduction_amount").text(totaldeduction);

                     var monthlydeduction = 0;
                  $('.monthly_deduction').each(function() {

                  monthlydeduction += parseFloat($(this).text());

                  });
                  $("#monthly_deduction_amount").text(monthlydeduction);
                    var totalbenefit = 0;
                  $('.total_benefit').each(function() {

                  totalbenefit += parseFloat($(this).text());

                  });
                  $("#total_benefit_amount").text(totalbenefit);
                   var monthlybenefit = 0;
                  $('.monthly_benefit').each(function() {

                  monthlybenefit += parseFloat($(this).text());

                  });
                  $("#monthly_benefit_amount").text(monthlybenefit);

                   var totaltakehome = $('#total_gross_earning').text() - $('#total_deduction_amount').text();
                  $('#total_taken_amount').text(totaltakehome);
                  $('#monthly_taken_amount').text(totaltakehome/12);
                  var totalctc = parseFloat($('#total_gross_earning').text()) +  parseFloat($("#total_benefit_amount").text());
                  $('#total_ctc_amount').text(totalctc);
                  $('#monthly_ctc_amount').text(totalctc/12);


             }else{
              
              alert("Amount is out of Ptax range please create Range of this type amount in Ptax section ");
               $("#ptax_div").hide();
               $("#ptax"). prop("checked", false);

             }

        });
         
      }
      var totalctc = parseFloat($('#total_gross_earning').text()) +  parseFloat($("#total_benefit_amount").text());
      $('#total_ctc_amount').text(totalctc);
      $('#monthly_ctc_amount').text(totalctc/12);
     salarybenefitcalculation();
         
    }


    </script>
    