<?php $SysConfigauthenticaton = checkConfig1();?>
<div class="ks-page-header">
    <section class="ks-title">
        <h3>Leave Register</h3>
        <div class="ks-controls">
            <button type="button" class="btn btn-primary btn_header_add" onclick="openForm('');">Add</button>
            <a href="javascript:;" class="btn btn-icon btn-light btn_maximize"><i class="far fa-window-maximize"></i></a>
        </div>
    </section>
</div>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<div class="ks-page-content">
    <div class="ks-page-content-body">
        <div class="content-wrapper">
          <div class="toggleFilter" style="display: none;">   
               <div class="row">
                       
                        <div class="col-md-4">
                            <div class="form-group">
                                <select id='month' name="month" class="form-control">
                                    <option value=''>Select Month</option>
                                    <option value='01' <?php echo (date('m') == '01') ? 'selected' : ''; ?> >January</option>
                                    <option value='02' <?php echo (date('m') == '02') ? 'selected' : ''; ?>>February</option>
                                    <option value='03' <?php echo (date('m') == '03') ? 'selected' : ''; ?>>March</option>
                                    <option value='04' <?php echo (date('m') == '04') ? 'selected' : ''; ?> >April</option>
                                    <option value='05' <?php echo (date('m') == '05') ? 'selected' : ''; ?> >May</option>
                                    <option value='06' <?php echo (date('m') == '06') ? 'selected' : ''; ?> >June</option>
                                    <option value='07' <?php echo (date('m') == '07') ? 'selected' : ''; ?> >July</option>
                                    <option value='08' <?php echo (date('m') == '08') ? 'selected' : ''; ?> >August</option>
                                    <option value='09' <?php echo (date('m') == '09') ? 'selected' : ''; ?> >September</option>
                                    <option value='10' <?php echo (date('m') == '10') ? 'selected' : ''; ?> >October</option>
                                    <option value='11' <?php echo (date('m') == '11') ? 'selected' : ''; ?> >November</option>
                                    <option value='12' <?php echo (date('m') == '12') ? 'selected' : ''; ?> >December</option> 
                                </select>                        
                            </div>
                        </div>

                       
                        <div class="col-md-4">
                            <div class="form-group">
                                <a href="javascript:void(0)" class="btn btn-danger btn-add-attendance" onclick="opensearch('');">Search</a>
                            </div>
                        </div>

                    </div>     
</div>
             
            <div class="form-wrapper" style="display:none">
                
            </div>
            
            <div id="register_leave_search">
          <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Salary</th>
            </tr>
        </tfoot>
    </table>
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

/* Formatting function for row details - modify as you need */
function format ( d ) {
    // `d` is the original data object for the row
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
            '<td>Full name:</td>'+
            '<td>'+d.name+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Extension number:</td>'+
            '<td>'+d.extn+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Extra info:</td>'+
            '<td>And any further details here (images etc)...</td>'+
        '</tr>'+
    '</table>';
}
 
$(document).ready(function() {
    var table = $('#example').DataTable( {
        "ajax": [
    {
      "id": "1",
      "name": "Tiger Nixon",
      "position": "System Architect",
      "salary": "$320,800",
      "start_date": "2011/04/25",
      "office": "Edinburgh",
      "extn": "5421"
    }],
        "columns": [
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
            { "data": "name" },
            { "data": "position" },
            { "data": "office" },
            { "data": "salary" }
        ],
        "order": [[1, 'asc']]
    } );
     
    // Add event listener for opening and closing details
    $('#example tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    } );
} );
    function openingbalanceform(id){
         $.post("<?php echo base_url('admin_get_edit_form_employee_opening'); ?>", {'id': id}, function(result){
            //console.log(result);
         $(".form-wrapper").html(result);
         $(".form-wrapper").show();
         $('.flatpickrDateNew').flatpickr({
                   onChange: function(selectedDates, dateStr, instance) {
       leave_due_calculate_new(); 
       var from=$('#leave_from').val();
       
      var employee_id = $("#employee_id option:selected").val();
       //alert(from);
      /* if(from!='' && employee_id!='' && (typeof from != "undefined")){
        $.ajax({
                        url: '<?php echo base_url('employees_leave_application_duplicate_date'); ?>/' + from+'/'+employee_id,
                        type: 'POST',
                        //data : new FormData( $("#expenses")[0]),
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (datanew) {
                         //    alert(datanew);
                            if(datanew=='have'){
                                
         alert('You have all ready took or applied leave for this date');
         $('#leave_add').hide();
        }
        else{
           $('#leave_add').show(); 
            
        }
                        }
                    });

    }*/
       
                   }
                 });
    });

         $('.toggleFilter').hide();
    }

    function openForm(id){
         $.post("<?php echo base_url('admin_get_edit_form_employee_opening_leave'); ?>", {'id': id}, function(result){
            //console.log(result);
          $(".form-wrapper").html(result);
          $(".form-wrapper").show();
          $('.flatpickrDateNew').flatpickr({
            dateFormat: '<?=$SysConfigauthenticaton->date_format;?>'
          });
    });

         $('.toggleFilter').hide();
    }


   

function getLeaveType(){
  var employee_id = $("#employee_id option:selected").val();

//console.log(employee_id);
  $.post("<?php echo base_url('admin_get_employee_leave'); ?>", {'id': employee_id}, function(result){
          //console.log(result);
          var result1 = result.split("##");
       $("#leaveDiv").html(result1[0]);
       $("#due_leave").html(result1[1]);
       
        });

}

function getOpeningLeave(){
  var employee_id = $("#employee_id option:selected").val();

//console.log(employee_id);
  $.post("<?php echo base_url('admin_get_employee_opening_leave'); ?>", {'id': employee_id}, function(result){
          //console.log(result);
          var result1 = result.split("##");
       $("#leaveDiv").html(result1[0]);
       $("#due_leave").html(result1[1]);
       
        });

}



function leave_due_calculate_new() {
  
  var from=$('#leave_from').val();
  var to=$('#leave_to').val();
  var leave_type = $("#leave_type option:selected").val();
  
  console.log("from--"+from);
  console.log("to--"+to);
  console.log("leave_type--"+leave_type);

   if(from!='' && to!='' && leave_type!='' && (typeof to != "undefined") && (typeof from != "undefined") && (Date.parse(from) <= Date.parse(to))){
  var due_leave=$('#due_leave'+leave_type).val();

 
              //datediff(from,to);
          var startDate = Date.parse(from);
            var endDate = Date.parse(to);
            var timeDiff = endDate - startDate;
            console.log("timeDiff--"+timeDiff);
          var  daysDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
          console.log("daysDiff--"+daysDiff);
          var original=daysDiff+1;

            console.log("original--"+original);
//alert(due_leave);
//alert(original);
if(due_leave>=original){
$('#leave_total_days').val(original);
$('#leave_add').show();
}
else{
    alert('Your due leave is less than required leave.');
    $('#leave_add').hide();
            }

    }else{
      $('#leave_total_days').val('');
      $('#leave_add').hide();
    }

  }

  function checkTicket(Ticket_type){
    if(Ticket_type=='Yes'){
      $("#leave_ticket_amount").removeAttr("readonly");      
    }else{
      $('#leave_ticket_amount').val('');
      $("#leave_ticket_amount").attr("readonly", "readonly");
    }
    $("#leave_ticket_val").val(Ticket_type);

  }

  function change_status(id,status,employee_id) {
                if (confirm('Are you sure ?')) {
                    $.ajax({
                        url: '<?php echo base_url('employees_leave_approval_status'); ?>/' + id+'/'+status+'/'+employee_id,
                        type: 'POST',
                        //data : new FormData( $("#expenses")[0]),
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (datanew) {
                            //alert(datanew);
                            if(datanew!='no'){
                                 var url = '<?php echo base_url('employee_leave'); ?>/1';
                                  $("#pjax-container").load(url,function(response,status){                                      
                                      notification(status);
                                  });
                        }
                        else{
                      alert('Your this type leave balance is 0');      
        }
                        }
                    });
                }


            }

    function getSearchleave(type) {
    var st_date = $("#start_date").val();
    var end_date = $("#end_date").val();

    $('#month_id').val('');
    $('#year_id').val('');

    if(st_date!='' && end_date!=''){
      $('#start_date').css('border-color', '');
      $('#end_date').css('border-color', '');
      $("#stdateErr").html('');
      $("#enddateErr").html('');
     // alert("88");
      //$("#searchForm").submit();
      //return true;

        $.post("<?php echo base_url('employee_leave_search'); ?>", {'start_date': st_date,'end_date': end_date,'type': type}, function(result){
            //console.log(result);
         $("#searchData").html(result);         
        });


    }else{
      $('#start_date').css('border-color', 'red');
      $('#end_date').css('border-color', 'red');
      $("#stdateErr").html('Field Required');
      $("#enddateErr").html('Field Required');
      //return false;
      //alert("99");
    }
  }
  //$('.flatpickrDateNew').flatpickr();
  function searchleavedetails() {
    var month = $("#month_id option:selected").val();
    var year = $("#year_id option:selected").val();
    var d = new Date(),
    n = d.getMonth()+1,
    y = d.getFullYear();

    $.post("<?php echo base_url('employee_leave_search_month'); ?>", {'month': month,'year': year}, function(result){
            console.log(result);
           
           $('#register_leave_search').html(result);

            
        
    });
  }

  function opensearch() {
        var month = $("#month option:selected").val();
         if(month == ''){
          alert('Please select Month');
        }
        if(month != ''){
        $.post("<?php echo base_url('admin_employee_opening_leave_monthwise'); ?>", {'month': month}, function (data) {
            console.log(data);
            $("#payrolltable").html(data);
           
        });
      }
    }
</script>
