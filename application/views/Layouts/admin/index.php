<!DOCTYPE html>
<html lang="en">

<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8">
    <title>Payroll</title>
	 <link rel="stylesheet" href="<?php echo base_url(); ?>themes/blue/pace-theme-center-simple.css" />

  <script>
    paceOptions = {
      elements: true
    };
  </script>
  <script src="<?php echo base_url(); ?>pace.js"></script>
  <script>
    function load(time){
      var x = new XMLHttpRequest()
      x.open('GET', "http://localhost:5646/walter/" + time, true);
      x.send();
    };

    load(20);
    load(100);
    load(500);
    load(2000);
    load(3000);

    setTimeout(function(){
      Pace.ignore(function(){
        load(3100);
      });
    }, 4000);

    Pace.on('hide', function(){
      console.log('done');
    });
  </script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link rel='manifest' href='<?php echo base_url(); ?>manifest.json'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/long-press-event.min.js"></script>
	 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css">     
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"> 
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/fonts/montserrat/styles.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/libs/tether/css/tether.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/libs/jscrollpane/jquery.jscrollpane.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/libs/flag-icon-css/css/flag-icon.min.css">    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/styles/common.css">    
    <!--Datatable-net-->    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/libs/datatables-net/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/libs/datatables-net/media/css/dataTables.bootstrap4.min.css">     
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/libs/datatables-net/extensions/buttons/css/buttons.bootstrap4.css"> 
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/libs/datatables-net/extensions/responsive/css/responsive.bootstrap4.css"> 
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/libs/datatables-net/extensions/select/css/select.bootstrap4.min.css"> 
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/libs/datatables-net/extensions/scroller/css/scroller.bootstrap4.min.css"> 
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/libs/datatables-net/extensions/colreorder/css/colReorder.bootstrap4.min.css">	
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/libs/datatables-net/extensions/fixed-columns/css/fixedColumns.bootstrap4.min.css">     
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/libs/datatables-net/extensions/fixed-header/css/fixedHeader.bootstrap4.css">     
    
    
    <!-- BEGIN THEME STYLES -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/styles/themes/primary.css">    
    <!-- END THEME STYLES -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/styles/profile/settings.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/styles/apps/crm/users-list.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/styles/apps/projects/grid-board.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/charts/radial-progress/radial-progress.chart.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/libs/c3js/c3.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/styles/widgets/panels.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/styles/dashboard/mail.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/libs/select2/css/select2.min.css"> <!-- Original -->    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/libs/noty/noty.css"> 
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/switch.css">
    <!--custom by Anup-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custom-ap.css">        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    </head>
    
    <body class="ks-navbar-fixed ks-sidebar-default ks-sidebar-position-fixed ks-page-header-fixed ks-theme-primary ks-page-loading">
	<script>
    range.addEventListener('input', function(){
      document.querySelector('.pace').classList.remove('pace-inactive');
      document.querySelector('.pace').classList.add('pace-active');

      document.querySelector('.pace-progress').setAttribute('data-progress-text', range.value + '%');
      document.querySelector('.pace-progress').setAttribute('style', '-webkit-transform: translate3d(' + range.value + '%, 0px, 0px)');
    });
  </script>
        <?php if ($header) echo $header; ?>
        <!-- END HEADER -->
    <?php $SysConfigauthenticaton = checkConfig1();?>
        <div class="ks-page-container">            
            <?php            
            if($this->session->userdata('type')=='management')
            {
            if ($sidebar) echo $sidebar; 
            }
            ?>
            <!-- END DEFAULT SIDEBAR -->
            <div class="ks-column ks-page" id="pjax-container"> 
                <?php if ($middle) echo $middle; ?>
            </div> 
        </div>

        <!-- BEGIN PAGE LEVEL PLUGINS -->        
        <script src="<?php echo base_url(); ?>assets/libs/responsejs/response.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/loading-overlay/loadingoverlay.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/tether/js/tether.min.js"></script>        
        <script src="<?php echo base_url(); ?>assets/libs/jscrollpane/jquery.jscrollpane.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/jscrollpane/jquery.mousewheel.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/flexibility/flexibility.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/noty/noty.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/velocity/velocity.min.js"></script>
                
        <!--Datatable-net-->        
        <script src="<?php echo base_url(); ?>assets/libs/datatables-net/media/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables-net/media/js/dataTables.bootstrap4.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables-net/extensions/buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables-net/extensions/buttons/js/buttons.bootstrap4.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/jszip/jszip.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/pdfmake/pdfmake.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/pdfmake/vfs_fonts.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables-net/extensions/buttons/js/buttons.html5.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables-net/extensions/buttons/js/buttons.print.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables-net/extensions/buttons/js/buttons.colVis.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables-net/extensions/responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables-net/extensions/responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables-net/extensions/select/js/dataTables.select.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables-net/extensions/scroller/js/dataTables.scroller.min.js"></script>        
        <script src="<?php echo base_url(); ?>assets/libs/datatables-net/extensions/colreorder/js/dataTables.colReorder.min.js"></script>                
        <script src="<?php echo base_url(); ?>assets/libs/datatables-net/extensions/gotopage/input.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables-net/extensions/fixed-columns/js/dataTables.fixedColumns.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables-net/extensions/fixed-header/js/dataTables.fixedHeader.js"></script>
<!--        <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.3/flatpickr.min.js" integrity="sha256-/irFIZmSo2CKXJ4rxHWfrI+yGJuI16Z005X/bENdpTY=" crossorigin="anonymous"></script>-->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/d3/d3.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/charts/radial-progress/radial-progress.chart.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/select2/js/select2.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/custom-ap.js"></script>
		<script src="<?php echo base_url(); ?>assets/imagecrop/croppie.js"></script>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/imagecrop/croppie.css" />
		<?php $this->load->view('Layouts/admin/web-push-notification'); ?>
        <script>
		var dateformat = '<?php echo $SysConfigauthenticaton->jquery_date_format;?>';
		var jquerydateformat = '<?php echo $SysConfigauthenticaton->jquery_date_format;?>';
			/*$(document).ready(function() {
        window.history.pushState(null, "", window.location.href);        
        window.onpopstate = function() {
            window.history.pushState(null, "", window.location.href);
        };
    });*/
	
            $(document).ready(function () {
           $('.mydate_range').daterangepicker({           
           locale: {format: dateformat},
        }, function(start, end, label) {
			console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
			leave_due_calculate_new(start.format('YYYY-MM-DD'),end.format('YYYY-MM-DD'));
		});
           /* $('.flatpickrnew').daterangepicker({
//$('.flatpickrnew').daterangepicker({
    //dateFormat: '<?=$SysConfigauthenticaton->date_format;?>',
                   onChange: function(selectedDates, dateStr, instance) {
       leave_due_calculate(); 
       var from=$('#leave_from').val();
      var employee_id ='<?php echo @$id;  ?>';
      // alert(from);
       
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
                                
         alert('You have allready took or applied leave for this date');
         $('#leave_add').hide();
        }
        else{
           $('#leave_add').show(); 
            
        }
                        }
                    });
       
                   }
                 });*/
                 });
				 
		function leave_due_calculate_new(from,to) {
		var leave_type = $("#leave_type").val();
		var start = new Date(from);
		var end = new Date(to);
		var timeDiff  = new Date(end - start);
		var  daysDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
		var original=daysDiff+1;
		//console.log(daysDiff);	
		if(from!='' && to!='' && leave_type!='' && (typeof to != "undefined") && (typeof from != "undefined") && (Date.parse(from) <= Date.parse(to))){

		var due_leave=$('#due_leave'+leave_type).val();

		if(Math.floor(due_leave)>=original){
		$('#leave_total_days').val(original);
		//$('#leave_add').show();
		$("#leave_add").prop('disabled', false);
		$('#leave_error').text('');
		}else if(due_leave == '0' ||due_leave == '0.5'){

		$('#leave_total_days').val(original);
		$('#leave_error').text('Your Balance leave is less than required leave.');
		$("#leave_add").prop('disabled', true);
		//alert('sd');
		}else{
		//alert('Your due leave is less than required leave.');
		$('#leave_error').text('Your Balance leave is less than required leave.');

		$('#leave_total_days').val(original);
		$("#leave_add").prop('disabled', 'disabled');
		//alert('s22d');
		}

		}else{
		$('#leave_total_days').val(original);
		$("#leave_add").prop('disabled', false);
		}

		}

            function getaddnew(className) {
                $("." + className).toggle();
            }
            $(document).ready(function () {

                var radialProgress = new KosmoCharts.RadialProgress('#ks-projects-progress-chart', {
                    amount: 75,
                    postfix: '%',
                    cornerRadius: 10,
                    lineWidth: 7,
                    size: 150,
                    description: 'work done'
                });
                radialProgress.render();

                var radialProgress1 = new KosmoCharts.RadialProgress('#ks-projects-progress-chart1', {
                    amount: 75,
                    postfix: '%',
                    cornerRadius: 10,
                    lineWidth: 7,
                    description: 'Attendance',
                    size: 120
                });
                radialProgress1.render();

                var radialProgress2 = new KosmoCharts.RadialProgress('#ks-projects-progress-chart2', {
                    amount: 28,
                    postfix: '',
                    cornerRadius: 10,
                    lineWidth: 7,
                    description: 'Holidays',
                    size: 120
                });
                radialProgress2.render();


                // timepicker 24 hr format
                $('.flatpickr').daterangepicker({                    
                    enableTime: true,
                    noCalendar: true,
                    dateFormat: "H:i",
                    time_24hr: true
                });
                $('.flatpickrDate').daterangepicker({
                    //dateFormat: '<?=$SysConfigauthenticaton->date_format;?>',
                    //yearSelectorType: static
                });
                //// notification ////

<?php if ($this->session->flashdata('successmessage')) { ?>
                    setTimeout(function () {
                        new Noty({
                            text: '<strong>Success!</strong> <?php echo $this->session->flashdata('successmessage'); ?>.',
                            type: 'success',
                            theme: 'mint',
                            layout: 'topCenter',
                            timeout: 2000
                        }).show();
                    }, 1500);
<?php } ?>

<?php if ($this->session->flashdata('errormessage')) { ?>
                    setTimeout(function () {
                        new Noty({
                            text: '<strong>Error!</strong> <?php echo $this->session->flashdata('errormessage'); ?>.',
                            type: 'error',
                            theme: 'mint',
                            layout: 'topCenter',
                            timeout: 2000
                        }).show();
                    }, 1500);
<?php } ?>
                //// end notification ////


            });
        </script>

        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/js/common.min.js"></script>
        <!-- END THEME LAYOUT SCRIPTS -->

        <div class="ks-mobile-overlay"></div>


        <script type="text/javascript">

            function notification(statusForm) {
                if (statusForm == 'success') {
                    setTimeout(function () {
                        new Noty({
                            text: '<strong>Success!</strong>',
                            type: 'success',
                            theme: 'mint',
                            layout: 'topCenter',
                            timeout: 2000
                        }).show();
                    }, 1500);
                } else {
                    setTimeout(function () {
                        new Noty({
                            text: '<strong>Error!</strong>',
                            type: 'error',
                            theme: 'mint',
                            layout: 'topCenter',
                            timeout: 2000
                        }).show();
                    }, 1500);
                }
            }

            /****************** form submit without loading page ****************/

            function myFunctionAtt(formname) {
                event.preventDefault();
                var data = formToJSON('#' + formname);
                //console.log(data);
                $('#date').css('border-color', '');
                $('#dateErr').html('');
                $('#employee_id').css('border-color', '');
                //$('#type_valErr').html('');
                $('#entry_time').css('border-color', '');
                //$('#out_time').css('border-color', ''); 
                //alert(data['entry_time']); 
                if (data['date'] == '') {
                    $('#date').css('border-color', 'red');
                    $('#dateErr').html('Select Date');
                }else if (data['employee_id'] == '') {
                    $('#employee_id').css('border-color', 'red');
                }else if (data['entry_time'] == '') {
                     $('#entry_time').css('border-color', 'red');
              // } else if (data['att_type_val'] == '') {
                    //$('#atttype_valErr').html('Select Type.');
                //}
               // else if (data['type_val'] == 'Present' && data['entry_time'] == '') {
                     //$('#entry_time').css('border-color', 'red');     
               // }else if (data['type_val'] == 'Present' && data['out_time'] == '') {
                    // $('#out_time').css('border-color', 'red');                    
                }else{
                    adddetails(data, formname);
                }              

            }
			
			
			    function myFunctiontimeoff(formname) {
                event.preventDefault();
                var data = formToJSON('#' + formname);
                //console.log(data);
                
               
                if (data['type_val'] == '') {
					//console.log(data['type_val']);
                   // $('#date').css('border-color', 'red');
                    $('#type_valErr').html('Please Select Type');
				   
               
				}else{
                    adddetails(data, formname);
                }              

            }
			
			


            function myFunction1(formname) {
                event.preventDefault();
                var data = formToJSON('#' + formname);
                //console.log(data);

                if (data['new_password'] == data['confirm_password']) {
                    adddetails(data, formname);
                } else {
                    $(".confirm_password_err").html('Password Not matched.')
                }

            }
            function myFunction(formname) {
                event.preventDefault();
                var data = formToJSON('#' + formname);
                adddetails(data, formname);
            }
			
			function myFunctiontemp(formname) {
                event.preventDefault();
                var data = formToJSON('#' + formname);
                adddetails(data, formname);
            }

            function adddetails(data, formname) {
                var url = $('#' + formname).attr('action');
                $('.btn-success').prop( "disabled", true );
                $("#pjax-container").load(url, data, function (response, status) {
                    //console.log(status);
                    //console.log(response);    
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
                    $('.flatpickr').daterangepicker({
                        enableTime: true,
                        noCalendar: true,
                        dateFormat: "H:i",
                        time_24hr: true
                    });

                    //// notification ////
                    notification(status);
                    //// end notification ////




                });
            }

            function formToJSON(selector)
            {
                var form = {};
                $(selector).find(':input[name]:enabled').each(function () {
                    var self = $(this);
                    var name = self.attr('name');
                    if (form[name]) {
                        form[name] = form[name] + ',' + self.val();
                    }
                    else {
                        form[name] = self.val();
                    }
                });

                return form;
            }

            /****************** end form submit without loading page ****************/


            //preview the image
            function readURL(input, formname) {
                //console.log(input);
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }

                // save image
                $.ajax({
                    url: '<?php echo base_url('admin_get_image_new'); ?>',
                    type: 'POST',
                    data: new FormData($("#" + formname)[0]),
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                       // alert(data);
                        //console.log(data);
                        $("#imagenew").val(data);
                    }
                });

            }
            function readURLprofile(input, formname) {
            
                //console.log(input);
                if (input.files && input.files[0]) {
                   
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }

                // save image
                $.ajax({
                    url: '<?php echo base_url('admin_get_image_profile'); ?>',
                    type: 'POST',
                    data: new FormData($("#" + formname)[0]),
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                         //alert(data);
                      //  console.log(data);
                        $("#imagenew").val(data);
                        notification('success');
                    }
                });

            }



            function isNumberKey(event, vall)
            {
//alert(vall);
                if (((event.which != 46 || (event.which == 46 && vall == '')) ||
                        vall.indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                    event.preventDefault();
                }
            }



		function numeric(e) {
		e.value = e.value.replace(/[^-+.0-9]+/g, '');

		}
		
		function only_charecter(e) {
		e.value = e.value.replace(/[^A-z]/g, '');

		}
		
	


    function calculateAmout(id)
    {
        $('#edit_net_salary').html('');
        $("#notification_body_salary").html('');
        var yearlyAmt = $(".yearly_"+id).val();
        yearlyAmt = yearlyAmt.replace(/\,/g,'');
        yearlyAmt = parseFloat(yearlyAmt);
        //console.log(yearlyAmt);

        if(yearlyAmt!='' && yearlyAmt!=='NaN' && yearlyAmt!=='0' && yearlyAmt!=='0.00'){
            var amtCal = yearlyAmt/12;
           // alert(amtCal);
            $(".monthly_"+id).val(Math.round(amtCal).toFixed(2));
        }else{
            $(".monthly_"+id).val(0.00);
        }
calculateSalary();
       
        
    }


    function calculateAmoutEdit(id)
    {
        $('#net_salary').html('');
        $("#notification_body_salary").html('');
        var yearlyAmt = $(".yearly_"+id).val();
        yearlyAmt = yearlyAmt.replace(/\,/g,'');
        yearlyAmt = parseFloat(yearlyAmt);
        //console.log(yearlyAmt);

        if(yearlyAmt!='' && yearlyAmt!=='NaN' && yearlyAmt!=='0' && yearlyAmt!=='0.00'){
            var amtCal = yearlyAmt/12;
           // alert(amtCal);
            $(".monthly_"+id).val(Math.round(amtCal).toFixed(2));
        }else{
            $(".monthly_"+id).val(0.00);
        }
calculateSalaryEdit();
       
        
    }

    function calculatepfAmout()
    {
        var ctcAmt = $(".ctcAmtClass").val();
        var employeemothlypf = $("#employeemothlypf").val();
        //alert(employeemothlypf);
        var employeeyearlypf = parseFloat(employeemothlypf)*12;
        //console.log(yearlyAmt);
        $('#employermothlypf').val(Math.round(employeemothlypf));
        $('#employeemothlypf').val(Math.round(employeemothlypf));
        $('#employeryearlypf').val(Math.round(employeeyearlypf));
        $('#employeeyearlypf').val(Math.round(employeeyearlypf));
       
         var yearlySalaryClass = 0;
        var monthlySalaryClass = 0;
        $(".yearlySalaryClass").each(function(){            
            var vall = $(this).val();
            vall = vall.replace(/\,/g,'');
            vall = parseFloat(vall);
            //console.log('vall--'+vall);
            yearlySalaryClass = (yearlySalaryClass + vall);
            
          })
        var monthlySalaryClass = parseFloat(yearlySalaryClass)/parseFloat(12);
        
        $('#monthly_gross_earning').val(Math.round(monthlySalaryClass).toFixed(2));
        $('#yearly_gross_earning').val(Math.round(yearlySalaryClass).toFixed(2));

        var totalbenefit = 0;
                  $('.totalbenefityearly').each(function() {

                  totalbenefit += parseFloat($(this).val());

                  });
        var totalbenefitmonthly = parseFloat(totalbenefit)/12;
         $('#total_benefit_yearly').val(Math.round(totalbenefit).toFixed(2));
        $('#total_benefit_monthly').val(Math.round(totalbenefitmonthly).toFixed(2));

        

        var totaldeduction = 0;
                  $('.totaldeductions').each(function() {

                  totaldeduction += parseFloat($(this).val());

                  });
        var totaldeductionmonthly = parseFloat(totaldeduction)/12;
         $('#total_deduction_yearly').val(Math.round(totaldeduction).toFixed(2));
        $('#total_deduction_monthly').val(Math.round(totaldeductionmonthly).toFixed(2));
        
       // alert(yearly_gross_earning);

        //var totalctcmontly = parseFloat($('#total_monthly_ctc').val()) + parseFloat(monthlySalaryClass);
        var totalctcyearly = parseFloat(totalbenefit) + parseFloat(yearlySalaryClass);
        var totalctcmontly = parseFloat(totalctcyearly)/12;
       // alert(totalctcyearly.toFixed(2));
        $('#total_monthly_ctc').val(Math.round(totalctcmontly).toFixed(2));
        $('#total_yearly_ctc').val(Math.round(totalctcyearly).toFixed(2));

        var monthlyearning = parseFloat(yearlySalaryClass)/12;
        var takehomemonthly = parseFloat(monthlyearning) - parseFloat(totaldeductionmonthly);
        var takehomeyearly = parseFloat(yearlySalaryClass) - parseFloat(totaldeduction);
         $('#total_takehome_monthly').val(Math.round(takehomemonthly).toFixed(2));
         $('#total_takehome_yearly').val(Math.round(takehomeyearly).toFixed(2));
        

        /*if($('#esicheck').prop("checked") == true){
            var mothlyesi = $('#mothlyesi').val();
            var yearlyesi = $('#yearlyesi').val();
            yearlySalaryClass = (yearlySalaryClass + parseFloat(yearlyesi));
             $('#esicheck').val(1);
        }else{
             $('#esicheck').val(0);
        }

        if($('#ptaxcheck').prop("checked") == true){
            var mothlyptax = $('#mothlyptax').val();
            var yearlyptax = $('#yearlyptax').val();
            yearlySalaryClass = (yearlySalaryClass + parseFloat(yearlyptax));
             $('#ptaxcheck').val(1);
        }else{
             $('#ptaxcheck').val(0);
        }*/

        //alert(yearlySalaryClass);
        //console.log('yearlySalaryClass--'+yearlySalaryClass);

        if(totalctcyearly<ctcAmt){
            var net_amt_monthly = totalctcyearly/12;
            $('.net_amt_yearly_cls').val(Math.round(totalctcyearly));
            $('.net_amt_monthly_cls').val(Math.round(net_amt_monthly).toFixed(2));

            $('.saveSalary').prop('disabled', true);
            $('.net_amt_yearly_cls_span').show();
        }else if(totalctcyearly==ctcAmt){
            var net_amt_monthly = totalctcyearly/12;
            $('.net_amt_yearly_cls').val(Math.round(totalctcyearly));
            $('.net_amt_monthly_cls').val(Math.round(net_amt_monthly).toFixed(2));
            
            $('.saveSalary').prop('disabled', false);
            $('.net_amt_yearly_cls_span').hide();
        }else if(totalctcyearly>ctcAmt){
            var net_amt_monthly = totalctcyearly/12;
            $('.net_amt_yearly_cls').val(Math.round(totalctcyearly));
            $('.net_amt_monthly_cls').val(Math.round(net_amt_monthly).toFixed(2));

            $('.saveSalary').prop('disabled', true);
            $('.net_amt_yearly_cls_span').show();
        }else{

            var net_amt_monthly = ctcAmt/12;
            $('.net_amt_yearly_cls').val(Math.round(ctcAmt));
            $('.net_amt_monthly_cls').val(Math.round(net_amt_monthly).toFixed(2));
            
            $('.saveSalary').prop('disabled', true);
            $('.net_amt_yearly_cls_span').show();
        }

       // calculateSalary();

       
        
    }


    function calculateSalary()
    {

        $('#edit_net_salary').html('');
        $("#notification_body_salary").html('');
        var ctcAmt = $(".ctcAmtClass").val();
        var totalctcyearly = 0;
        
        //alert(ctcAmt);
        //console.log('ctc--'+ctcAmt);
        var yearlySalaryClass = 0;
        var monthlySalaryClass = 0;
        $(".yearlySalaryClass").each(function(){            
            var vall = $(this).val();
            vall = vall.replace(/\,/g,'');
            vall = parseFloat(vall);
            //console.log('vall--'+vall);
            yearlySalaryClass = (yearlySalaryClass + vall);
            
          })
        var monthlySalaryClass = parseFloat(yearlySalaryClass)/parseFloat(12);
        
        $('#monthly_gross_earning').val(Math.round(monthlySalaryClass).toFixed(2));
        $('#yearly_gross_earning').val(Math.round(yearlySalaryClass).toFixed(2));

        var basicAmount = $('.basicamount').val();

        var percentage_employee = $('#percentage_employee').val();
        var percentage_employer = $('#percentage_employer').val();

        var percentage_esi_employee = $('#percentage_esi_employee').val();
        var percentage_esi_employer = $('#percentage_esi_employer').val();

        
       // alert(monthlySalaryClass);
        var totalpf = 0;
        $('.pfcount').each(function() {

        totalpf += parseFloat($(this).val());

        });

        if($('#pfcheck').prop("checked") == true){
          
            //var mothlypf = $('#employeeyearlypfhidden').val();
            //var yearlypf = $('#employeryearlypfhidden').val();
            if($("#pf_based_on").val() != 'Fixed'){
            var letpfamount = '15000';
             if(parseFloat(basicAmount) >= parseFloat(letpfamount)){

                  var employer_deduction=basicAmount * (parseFloat(percentage_employer)/100);
                  var employee_deduction=basicAmount * (parseFloat(percentage_employee)/100);

                  $("#employermothlypf").val(Math.round(employer_deduction).toFixed(2));
                  $("#employeemothlypf").val(Math.round(employee_deduction).toFixed(2));

                  $("#employeryearlypf").val(Math.round(employer_deduction*12).toFixed(2));
                  $("#employeeyearlypf").val(Math.round(employee_deduction*12).toFixed(2));
                  $("#pf_button").css("display","block");
                  
                }else if(parseFloat(totalpf) >= parseFloat(letpfamount)){
                  var employer_deduction=totalpf * (parseFloat(percentage_employer)/100);
                  var employee_deduction=totalpf * (parseFloat(percentage_employee)/100);

                  $("#employermothlypf").val(Math.round(employer_deduction/12).toFixed(2));
                  $("#employeemothlypf").val(Math.round(employee_deduction/12).toFixed(2));

                  $("#employeryearlypf").val(Math.round(employer_deduction).toFixed(2));
                  $("#employeeyearlypf").val(Math.round(employee_deduction).toFixed(2));
                   $("#pf_button").css("display","block");
                }else if(parseFloat(totalpf) < parseFloat(letpfamount)){
                  var employer_deduction= parseFloat(totalpf) * (parseFloat(percentage_employer)/100);
                  var employee_deduction=parseFloat(totalpf) * (parseFloat(percentage_employee)/100);
                  $("#pf_button").css("display","none");
                 // alert(percentage_employer);
                 // alert(employer_deduction);

                  $("#employermothlypf").val(Math.round(employer_deduction/12).toFixed(2));
                  $("#employeemothlypf").val(Math.round(employee_deduction/12).toFixed(2));

                  $("#employeryearlypf").val(Math.round(employer_deduction).toFixed(2));
                  $("#employeeyearlypf").val(Math.round(employee_deduction).toFixed(2));
                }





            //$('#employermothlypf').val($('#employeryearlypfhidden').val()/12);
            // $('#employeemothlypf').val($('#employeeyearlypfhidden').val()/12);
            //$('#employeryearlypf').val($('#employeryearlypfhidden').val());
            //$('#employeeyearlypf').val($('#employeeyearlypfhidden').val());
            $('#pfcheck').val(1);
            
            
        }
    }else{
            $('#pfcheck').val(0);
            //$("#adjust"). prop("checked", false);
            $('#employermothlypf').val('0.00');
            $('#employeemothlypf').val('0.00');
            $('#employeryearlypf').val('0.00');
            $('#employeeyearlypf').val('0.00');
            
        }
    

         if($('#esicheck').prop("checked") == true){
            //var mothlypf = $('#employeeyearlypfhidden').val();
            //var yearlypf = $('#employeryearlypfhidden').val();
            var letesi = '21000';
            if(parseFloat(monthlySalaryClass) <= parseFloat(letesi)){percentage_esi_employer
                var employer_esi=parseFloat(monthlySalaryClass) * (parseFloat(percentage_esi_employer)/100);
                var employee_esi=parseFloat(monthlySalaryClass) * (parseFloat(percentage_esi_employee)/100);

                $('#employermothlyesi').val(Math.round(employer_esi).toFixed(2));
                $('#employeemothlyesi').val(Math.round(employee_esi).toFixed(2));

                $('#employeryearlyesi').val(Math.round(parseFloat(employer_esi)*12).toFixed(2));
                $('#employeeyearlyesi').val(Math.round(parseFloat(employee_esi)*12).toFixed(2));
                $( "#esicheck" ).prop( "disabled",true);

            }else{
                var employer_esi=parseFloat(monthlySalaryClass) * (parseFloat(percentage_esi_employer)/100);
                var employee_esi=parseFloat(monthlySalaryClass) * (parseFloat(percentage_esi_employee)/100);

                $('#employermothlyesi').val(Math.round(employer_esi).toFixed(2));
                $('#employeemothlyesi').val(Math.round(employee_esi).toFixed(2));

                $('#employeryearlyesi').val(Math.round(parseFloat(employer_esi)*12).toFixed(2));
                $('#employeeyearlyesi').val(Math.round(parseFloat(employee_esi)*12).toFixed(2));
                 $( "#esicheck" ).prop( "disabled",false);
            }


           //  $('#employermothlyesi').val($('#employeryearlyesihidden').val()/12);
           // $('#employeemothlyesi').val($('#employeeyearlyesihidden').val()/12);
           // $('#employeryearlyesi').val($('#employeryearlyesihidden').val());
          //  $('#employeeyearlyesi').val($('#employeeyearlyesihidden').val());
            $('#esicheck').val(1);
            
        }else{
           // $("#adjust"). prop("checked", false);
            $('#esicheck').val(0);
            $('#employermothlyesi').val('0.00');
            $('#employeemothlyesi').val('0.00');
            $('#employeryearlyesi').val('0.00');
            $('#employeeyearlyesi').val('0.00');
            
        }

         if($('#ptaxcheck').val() == '1'){
            var ptax_state = $('#ptax_state').val();
             $.post("<?php echo base_url('ptax_deduction'); ?>", {state: ptax_state,total:monthlySalaryClass}, function(result){
             //alert(result);
             if(result!="no_data"){
                 var type=result.split(',');
                 $("#mothlyptax").val(Math.round(type[1]));
                 $("#yearlyptax").val(Math.round(12*type[1]));
             }
         });
         }

        /* if($('#adjustcheck').prop("checked") == true){
        var totalearning = $('#yearly_gross_earning').val();
        var totalBenefit = $('#total_benefit_yearly').val();
        var totalCTCYear = parseFloat(totalearning) + parseFloat(totalBenefit);
        if(parseFloat(totalCTCYear)>parseFloat(ctcAmt)){
        var fixedid = $('.fixedamount').attr("data-id");  
        var balance = parseFloat(totalCTCYear) - parseFloat(ctcAmt);
        var adjustment = $('.fixedamount').val() - parseFloat(balance);
        $(".yearly_"+fixedid).val(adjustment.toFixed(2));
        $(".monthly_"+fixedid).val(parseFloat(adjustment)/12);
        }
        }*/

        var totalbenefit = 0;
                  $('.totalbenefityearly').each(function() {

                  totalbenefit += parseFloat($(this).val());

                  });
        var totalbenefitmonthly = parseFloat(totalbenefit)/12;
         $('#total_benefit_yearly').val(Math.round(totalbenefit).toFixed(2));
        $('#total_benefit_monthly').val(Math.round(totalbenefitmonthly).toFixed(2));

        

        var totaldeduction = 0;
                  $('.totaldeductions').each(function() {

                  totaldeduction += parseFloat($(this).val());

                  });
        var totaldeductionmonthly = parseFloat(totaldeduction)/12;
         $('#total_deduction_yearly').val(Math.round(totaldeduction).toFixed(2));
        $('#total_deduction_monthly').val(Math.round(totaldeductionmonthly).toFixed(2));
        
       // alert(yearly_gross_earning);

        //var totalctcmontly = parseFloat($('#total_monthly_ctc').val()) + parseFloat(monthlySalaryClass);
        var totalctcyearly = parseFloat(totalbenefit) + parseFloat(yearlySalaryClass);
        var totalctcmontly = parseFloat(totalctcyearly)/12;


       // alert(totalctcyearly.toFixed(2));
        $('#total_monthly_ctc').val(Math.round(totalctcmontly).toFixed(2));
        $('#total_yearly_ctc').val(Math.round(totalctcyearly).toFixed(2));

        var monthlyearning = parseFloat(yearlySalaryClass)/12;
        var takehomemonthly = parseFloat(monthlyearning) - parseFloat(totaldeductionmonthly);
        var takehomeyearly = parseFloat(yearlySalaryClass) - parseFloat(totaldeduction);
         $('#total_takehome_monthly').val(Math.round(takehomemonthly).toFixed(2));
         $('#total_takehome_yearly').val(Math.round(takehomeyearly).toFixed(2));
        

        /*if($('#esicheck').prop("checked") == true){
            var mothlyesi = $('#mothlyesi').val();
            var yearlyesi = $('#yearlyesi').val();
            yearlySalaryClass = (yearlySalaryClass + parseFloat(yearlyesi));
             $('#esicheck').val(1);
        }else{
             $('#esicheck').val(0);
        }

        if($('#ptaxcheck').prop("checked") == true){
            var mothlyptax = $('#mothlyptax').val();
            var yearlyptax = $('#yearlyptax').val();
            yearlySalaryClass = (yearlySalaryClass + parseFloat(yearlyptax));
             $('#ptaxcheck').val(1);
        }else{
             $('#ptaxcheck').val(0);
        }*/

        //alert(yearlySalaryClass);
        //console.log('yearlySalaryClass--'+yearlySalaryClass);

        if(totalctcyearly<ctcAmt){
            var net_amt_monthly = totalctcyearly/12;
            $('.net_amt_yearly_cls').val(Math.round(totalctcyearly).toFixed(2));
            $('.net_amt_monthly_cls').val(Math.round(net_amt_monthly).toFixed(2));

            $('.saveSalary').prop('disabled', true);
            $('.net_amt_yearly_cls_span').show();
        }else if(totalctcyearly==ctcAmt){
            var net_amt_monthly = totalctcyearly/12;
            $('.net_amt_yearly_cls').val(Math.round(totalctcyearly).toFixed(2));
            $('.net_amt_monthly_cls').val(Math.round(net_amt_monthly).toFixed(2));
            
            $('.saveSalary').prop('disabled', false);
            $('.net_amt_yearly_cls_span').hide();
        }else if(totalctcyearly>ctcAmt){
            var net_amt_monthly = totalctcyearly/12;
            $('.net_amt_yearly_cls').val(Math.round(totalctcyearly).toFixed(2));
            $('.net_amt_monthly_cls').val(Math.round(net_amt_monthly).toFixed(2));

            $('.saveSalary').prop('disabled', true);
            $('.net_amt_yearly_cls_span').show();
        }else{

            var net_amt_monthly = ctcAmt/12;
            $('.net_amt_yearly_cls').val(Math.round(ctcAmt));
            $('.net_amt_monthly_cls').val(Math.round(net_amt_monthly).toFixed(2));
            
            $('.saveSalary').prop('disabled', true);
            $('.net_amt_yearly_cls_span').show();
        }
        
    }



function calculateSalaryEdit()
    {

        $('#net_salary').html('');
        $("#notification_body_salary").html('');
        var ctcAmt = $("#ctc1").val();
        var totalctcyearly = 0;
        
        //alert(ctcAmt);
        //console.log('ctc--'+ctcAmt);
        var yearlySalaryClass = 0;
        var monthlySalaryClass = 0;
        $(".yearlySalaryClass").each(function(){            
            var vall = $(this).val();
            vall = vall.replace(/\,/g,'');
            vall = parseFloat(vall);
            //console.log('vall--'+vall);
            yearlySalaryClass = (yearlySalaryClass + vall);
            
          })
        var monthlySalaryClass = parseFloat(yearlySalaryClass)/parseFloat(12);
        
        $('#monthly_gross_earning').val(Math.round(monthlySalaryClass).toFixed(2));
        $('#yearly_gross_earning').val(Math.round(yearlySalaryClass).toFixed(2));

        var basicAmount = $('.basicamount').val();

        var percentage_employee = $('#percentage_employee').val();
        var percentage_employer = $('#percentage_employer').val();

        var percentage_esi_employee = $('#percentage_esi_employee').val();
        var percentage_esi_employer = $('#percentage_esi_employer').val();

        
       // alert(monthlySalaryClass);
        var totalpf = 0;
        $('.pfcount').each(function() {

        totalpf += parseFloat($(this).val());

        });

        if($('#pfcheck').prop("checked") == true){
          
            //var mothlypf = $('#employeeyearlypfhidden').val();
            //var yearlypf = $('#employeryearlypfhidden').val();
            if($("#employeemothlypf").val() != '1800'){
            var letpfamount = '15000';
             if(parseFloat(basicAmount) >= parseFloat(letpfamount)){

                  var employer_deduction=basicAmount * (parseFloat(percentage_employer)/100);
                  var employee_deduction=basicAmount * (parseFloat(percentage_employee)/100);

                  $("#employermothlypf").val(Math.round(employer_deduction).toFixed(2));
                  $("#employeemothlypf").val(Math.round(employee_deduction).toFixed(2));

                  $("#employeryearlypf").val(Math.round(employer_deduction*12).toFixed(2));
                  $("#employeeyearlypf").val(Math.round(employee_deduction*12).toFixed(2));
                }else if(parseFloat(totalpf) >= parseFloat(letpfamount)){
                  var employer_deduction=totalpf * (parseFloat(percentage_employer)/100);
                  var employee_deduction=totalpf * (parseFloat(percentage_employee)/100);

                  $("#employermothlypf").val(Math.round(employer_deduction).toFixed(2));
                  $("#employeemothlypf").val(Math.round(employee_deduction).toFixed(2));

                  $("#employeryearlypf").val(Math.round(employer_deduction*12).toFixed(2));
                  $("#employeeyearlypf").val(Math.round(employee_deduction*12).toFixed(2));
                }else if(parseFloat(totalpf) < parseFloat(letpfamount)){
                  var employer_deduction= parseFloat(totalpf) * (parseFloat(percentage_employer)/100);
                  var employee_deduction=parseFloat(totalpf) * (parseFloat(percentage_employee)/100);
                 // alert(totalpf);
                 // alert(percentage_employer);
                 // alert(employer_deduction);

                  $("#employermothlypf").val(Math.round(employer_deduction).toFixed(2));
                  $("#employeemothlypf").val(Math.round(employee_deduction).toFixed(2));

                  $("#employeryearlypf").val(Math.round(employer_deduction*12).toFixed(2));
                  $("#employeeyearlypf").val(Math.round(employee_deduction*12).toFixed(2));
                }





            //$('#employermothlypf').val($('#employeryearlypfhidden').val()/12);
            // $('#employeemothlypf').val($('#employeeyearlypfhidden').val()/12);
            //$('#employeryearlypf').val($('#employeryearlypfhidden').val());
            //$('#employeeyearlypf').val($('#employeeyearlypfhidden').val());
            $('#pfcheck').val(1);
            
            
        }
    }else{
            $('#pfcheck').val(0);
            $('#employermothlypf').val('0.00');
            $('#employeemothlypf').val('0.00');
            $('#employeryearlypf').val('0.00');
            $('#employeeyearlypf').val('0.00');
            
        }
    

         if($('#esicheck').prop("checked") == true){
            //var mothlypf = $('#employeeyearlypfhidden').val();
            //var yearlypf = $('#employeryearlypfhidden').val();
            var letesi = '21000';
            if(parseFloat(monthlySalaryClass) <= parseFloat(letesi)){percentage_esi_employer
                var employer_esi=parseFloat(monthlySalaryClass) * (parseFloat(percentage_esi_employer)/100);
                var employee_esi=parseFloat(monthlySalaryClass) * (parseFloat(percentage_esi_employee)/100);

                $('#employermothlyesi').val(Math.round(employer_esi).toFixed(2));
                $('#employeemothlyesi').val(Math.round(employee_esi).toFixed(2));

                $('#employeryearlyesi').val(Math.round(parseFloat(employer_esi)*12).toFixed(2));
                $('#employeeyearlyesi').val(Math.round(parseFloat(employee_esi)*12).toFixed(2));
                $( "#esicheck" ).prop( "disabled",true);

            }else{
                var employer_esi=parseFloat(monthlySalaryClass) * (parseFloat(percentage_esi_employer)/100);
                var employee_esi=parseFloat(monthlySalaryClass) * (parseFloat(percentage_esi_employee)/100);

                $('#employermothlyesi').val(Math.round(employer_esi).toFixed(2));
                $('#employeemothlyesi').val(Math.round(employee_esi).toFixed(2));

                $('#employeryearlyesi').val(Math.round(parseFloat(employer_esi)*12).toFixed(2));
                $('#employeeyearlyesi').val(Math.round(parseFloat(employee_esi)*12).toFixed(2));
                 $( "#esicheck" ).prop( "disabled",false);
            }


           //  $('#employermothlyesi').val($('#employeryearlyesihidden').val()/12);
           // $('#employeemothlyesi').val($('#employeeyearlyesihidden').val()/12);
           // $('#employeryearlyesi').val($('#employeryearlyesihidden').val());
          //  $('#employeeyearlyesi').val($('#employeeyearlyesihidden').val());
            $('#esicheck').val(1);
            
        }else{
            $('#esicheck').val(0);
            $('#employermothlyesi').val('0.00');
            $('#employeemothlyesi').val('0.00');
            $('#employeryearlyesi').val('0.00');
            $('#employeeyearlyesi').val('0.00');
            
        }

         if($('#ptaxcheck').val() == '1'){
            var ptax_state = $('#ptax_state').val();
             $.post("<?php echo base_url('ptax_deduction'); ?>", {state: ptax_state,total:monthlySalaryClass}, function(result){
             //alert(result);
             if(result!="no_data"){
                 var type=result.split(',');
                 $("#mothlyptax").val(Math.round(type[1]));
                 $("#yearlyptax").val(Math.round(12*type[1]));
             }
         });
         }

        /* if($('#adjustcheck').prop("checked") == true){
        var totalearning = $('#yearly_gross_earning').val();
        var totalBenefit = $('#total_benefit_yearly').val();
        var totalCTCYear = parseFloat(totalearning) + parseFloat(totalBenefit);
        if(parseFloat(totalCTCYear)>parseFloat(ctcAmt)){
        var fixedid = $('.fixedamount').attr("data-id");  
        var balance = parseFloat(totalCTCYear) - parseFloat(ctcAmt);
        var adjustment = $('.fixedamount').val() - parseFloat(balance);
        $(".yearly_"+fixedid).val(adjustment.toFixed(2));
        $(".monthly_"+fixedid).val(parseFloat(adjustment)/12);
        }
        }*/

        var totalbenefit = 0;
                  $('.totalbenefityearly').each(function() {

                  totalbenefit += parseFloat($(this).val());

                  });
        var totalbenefitmonthly = parseFloat(totalbenefit)/12;
         $('#total_benefit_yearly').val(Math.round(totalbenefit).toFixed(2));
        $('#total_benefit_monthly').val(Math.round(totalbenefitmonthly).toFixed(2));

        

        var totaldeduction = 0;
                  $('.totaldeductions').each(function() {

                  totaldeduction += parseFloat($(this).val());

                  });
        var totaldeductionmonthly = parseFloat(totaldeduction)/12;
         $('#total_deduction_yearly').val(Math.round(totaldeduction).toFixed(2));
        $('#total_deduction_monthly').val(Math.round(totaldeductionmonthly).toFixed(2));
        
       // alert(yearly_gross_earning);

        //var totalctcmontly = parseFloat($('#total_monthly_ctc').val()) + parseFloat(monthlySalaryClass);
        var totalctcyearly = parseFloat(totalbenefit) + parseFloat(yearlySalaryClass);
        var totalctcmontly = parseFloat(totalctcyearly)/12;


       // alert(totalctcyearly.toFixed(2));
        $('#total_monthly_ctc').val(Math.round(totalctcmontly).toFixed(2));
        $('#total_yearly_ctc').val(Math.round(totalctcyearly).toFixed(2));

        var monthlyearning = parseFloat(yearlySalaryClass)/12;
        var takehomemonthly = parseFloat(monthlyearning) - parseFloat(totaldeductionmonthly);
        var takehomeyearly = parseFloat(yearlySalaryClass) - parseFloat(totaldeduction);
         $('#total_takehome_monthly').val(Math.round(takehomemonthly).toFixed(2));
         $('#total_takehome_yearly').val(Math.round(takehomeyearly).toFixed(2));
        

        /*if($('#esicheck').prop("checked") == true){
            var mothlyesi = $('#mothlyesi').val();
            var yearlyesi = $('#yearlyesi').val();
            yearlySalaryClass = (yearlySalaryClass + parseFloat(yearlyesi));
             $('#esicheck').val(1);
        }else{
             $('#esicheck').val(0);
        }

        if($('#ptaxcheck').prop("checked") == true){
            var mothlyptax = $('#mothlyptax').val();
            var yearlyptax = $('#yearlyptax').val();
            yearlySalaryClass = (yearlySalaryClass + parseFloat(yearlyptax));
             $('#ptaxcheck').val(1);
        }else{
             $('#ptaxcheck').val(0);
        }*/

        //alert(yearlySalaryClass);
        //console.log('yearlySalaryClass--'+yearlySalaryClass);

        if(totalctcyearly<ctcAmt){
            var net_amt_monthly = totalctcyearly/12;
            $('.net_amt_yearly_cls').val(Math.round(totalctcyearly).toFixed(2));
            $('.net_amt_monthly_cls').val(Math.round(net_amt_monthly).toFixed(2));

            $('.saveSalary').prop('disabled', true);
            $('.net_amt_yearly_cls_span').show();
        }else if(totalctcyearly==ctcAmt){
            var net_amt_monthly = totalctcyearly/12;
            $('.net_amt_yearly_cls').val(Math.round(totalctcyearly).toFixed(2));
            $('.net_amt_monthly_cls').val(Math.round(net_amt_monthly).toFixed(2));
            
            $('.saveSalary').prop('disabled', false);
            $('.net_amt_yearly_cls_span').hide();
        }else if(totalctcyearly>ctcAmt){
            var net_amt_monthly = totalctcyearly/12;
            $('.net_amt_yearly_cls').val(Math.round(totalctcyearly).toFixed(2));
            $('.net_amt_monthly_cls').val(Math.round(net_amt_monthly).toFixed(2));

            $('.saveSalary').prop('disabled', true);
            $('.net_amt_yearly_cls_span').show();
        }else{

            var net_amt_monthly = ctcAmt/12;
            $('.net_amt_yearly_cls').val(Math.round(ctcAmt));
            $('.net_amt_monthly_cls').val(Math.round(net_amt_monthly).toFixed(2));
            
            $('.saveSalary').prop('disabled', true);
            $('.net_amt_yearly_cls_span').show();
        }
        
    }




     function calculateSalary_for_edit()
    {
        var ctcAmt = $(".ctcAmtClass").val();
        //alert(ctcAmt);
        //console.log('ctc--'+ctcAmt);
        var yearlySalaryClass = 0;
        $(".yearlyeditSalaryClass").each(function(){            
            var vall = $(this).val();
            vall = vall.replace(/\,/g,'');
            vall = parseFloat(vall);
            //console.log('vall--'+vall);
            yearlySalaryClass = (yearlySalaryClass + vall);
          })

         if($('#pfcheck').prop("checked") == true){
            var mothlypf = $('#mothlypf').val();
            var yearlypf = $('#yearlypf').val();
            $('#pfcheck').val(1);
            yearlySalaryClass = (yearlySalaryClass + parseFloat(yearlypf));
            
        }else{
            $('#pfcheck').val(0);
        }

        if($('#esicheck').prop("checked") == true){
            var mothlyesi = $('#mothlyesi').val();
            var yearlyesi = $('#yearlyesi').val();
            yearlySalaryClass = (yearlySalaryClass + parseFloat(yearlyesi));
             $('#esicheck').val(1);
        }else{
             $('#esicheck').val(0);
        }

        if($('#ptaxcheck').prop("checked") == true){
            var mothlyptax = $('#mothlyptax').val();
            var yearlyptax = $('#yearlyptax').val();
            yearlySalaryClass = (yearlySalaryClass + parseFloat(yearlyptax));
             $('#ptaxcheck').val(1);
        }else{
             $('#ptaxcheck').val(0);
        }
        //alert(yearlySalaryClass);
        //console.log('yearlySalaryClass--'+yearlySalaryClass);

        if(yearlySalaryClass<ctcAmt){
            var net_amt_monthly = yearlySalaryClass/12;
            $('.net_amt_yearly_cls').val(yearlySalaryClass.toFixed(2));
            $('.net_amt_monthly_cls').val(net_amt_monthly.toFixed(2));

            $('.updateSalary').prop('disabled', true);
            $('.net_amt_yearly_cls_span').show();
        }else if(yearlySalaryClass==ctcAmt){
            var net_amt_monthly = yearlySalaryClass/12;
            $('.net_amt_yearly_cls').val(yearlySalaryClass.toFixed(2));
            $('.net_amt_monthly_cls').val(net_amt_monthly.toFixed(2));
            
            $('.updateSalary').prop('disabled', false);
            $('.net_amt_yearly_cls_span').hide();
        }else if(yearlySalaryClass>ctcAmt){
            var net_amt_monthly = yearlySalaryClass/12;
            $('.net_amt_yearly_cls').val(yearlySalaryClass.toFixed(2));
            $('.net_amt_monthly_cls').val(net_amt_monthly.toFixed(2));

            $('.saveSalary').prop('disabled', true);
            $('.net_amt_yearly_cls_span').show();
        }else{
            var net_amt_monthly = ctcAmt/12;
            $('.net_amt_yearly_cls').val(ctcAmt);
            $('.net_amt_monthly_cls').val(net_amt_monthly.toFixed(2));
            
            $('.updateSalary').prop('disabled', true);
            $('.net_amt_yearly_cls_span').show();
        }
        
    }


            function expenses_form_submit(id) {

                $.ajax({
                    url: '<?php echo base_url('modify_employees_expenses'); ?>/' + id,
                    type: 'POST',
                    data: new FormData($("#expenses")[0]),
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        notification('success');
                        // alert(data);
                        //console.log(data);
                        $("#ks-datatable44").html(data);
                        $('#ks-datatable44').bootstrapTable({
                            icons: {
                                refresh: 'la la-refresh icon-refresh',
                                toggle: 'la la-list-alt icon-list-alt',
                                columns: 'la la-th icon-th',
                                share: 'la la-download icon-share'
                            }
                        });
                        $("#expenses").find("input[type=text], select").val("");
                        $('#expenseaddForm').hide();
                    }
                });

            }
            
            function bank_form_submit(id) {
//alert(1);
                $.ajax({
                    url: '<?php echo base_url('modify_employees_bank'); ?>/' + id,
                    type: 'POST',
                    data: new FormData($("#bank")[0]),
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        notification('success');
                        // alert(data);
                        //console.log(data);
                        $("#ks-datatable71").html(data);
                        $('#ks-datatable71').bootstrapTable({
                            icons: {
                                refresh: 'la la-refresh icon-refresh',
                                toggle: 'la la-list-alt icon-list-alt',
                                columns: 'la la-th icon-th',
                                share: 'la la-download icon-share'
                            }
                        });
                        $("#bank").find("input[type=text], select").val("");
                        $('#bankForm').hide();
                    }
                });

            }
            
            function goforexpensesedit(id) {

                $.ajax({
                    url: '<?php echo base_url('employees_expenses_data'); ?>/' + id,
                    type: 'POST',
                    //data : new FormData( $("#expenses")[0]),
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        // notification('success');
                        //  alert(data);
                        var obj = JSON.parse(data);
                        console.log(obj);
                        console.log(obj.expenses_name);
                        $("html, body").animate({scrollTop: 0}, "slow");

                        $("#expenses_edit_id").val(obj.id);
                        // window.scrollTo(x-coord, y-coord);
                        $("#expenses_name").val(obj.expenses_name);
                        $("#from_year").val(obj.from_year);
                        $("#to_year").val(obj.to_year);
                        $("#visa_cost").val(obj.visa_cost);
                        $("#insurance_cost").val(obj.insurance_cost);
                        $("#other_cost").val(obj.other_cost);
                        $('#expenseaddForm').show();

                    }
                });

            }

            function goforexpensesdelete(id) {
                if (confirm('Are you sure ?')) {
                    $.ajax({
                        url: '<?php echo base_url('employees_expenses_delete'); ?>/' + id,
                        type: 'POST',
                        //data : new FormData( $("#expenses")[0]),
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            $("#deleteexpen" + id).hide();
                            notification('success');
                        }
                    });
                }


            }
            
             function goforbankedit(id) {

                $.ajax({
                    url: '<?php echo base_url('employees_bank_data'); ?>/' + id,
                    type: 'POST',
                    //data : new FormData( $("#expenses")[0]),
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        // notification('success');
                        //  alert(data);
                        var obj = JSON.parse(data);
                        console.log(obj);
                        console.log(obj.expenses_name);
                        $("html, body").animate({scrollTop: 0}, "slow");

                        $("#bank_edit_id").val(obj.id);
                        // window.scrollTo(x-coord, y-coord);
                        $("#bank_name").val(obj.bank_name);
                        $("#account_no").val(obj.account_no);
                        $("#agent_rtn_code").val(obj.agent_rtn_code);
                        $("#default").val(obj.default);
                      //  $("#insurance_cost").val(obj.insurance_cost);
                      //  $("#other_cost").val(obj.other_cost);
                        $('#bankForm').show();

                    }
                });

            }

            function goforbankdelete(id) {
                if (confirm('Are you sure ?')) {
                    $.ajax({
                        url: '<?php echo base_url('employees_bank_delete'); ?>/' + id,
                        type: 'POST',
                        //data : new FormData( $("#expenses")[0]),
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            $("#deletebank" + id).hide();
                            notification('success');
                        }
                    });
                }


            }


            function goforloanapplicationdelete(id) {
                if (confirm('Are you sure ?')) {
                    $.ajax({
                        url: '<?php echo base_url('employees_loanapplication_delete'); ?>/' + id,
                        type: 'POST',
                        //data : new FormData( $("#expenses")[0]),
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            $("#deleteapplication" + id).hide();
                            notification('success');
                        }
                    });
                }


            }
            function goforloanpaymentdelete(id) {
                if (confirm('Are you sure ?')) {
                    $.ajax({
                        url: '<?php echo base_url('employees_loanpayment_delete'); ?>/' + id,
                        type: 'POST',
                        //data : new FormData( $("#expenses")[0]),
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            $("#deleteloan" + id).hide();
                            notification('success');
                        }
                    });
                }


            }
            function gotocalculate(value) {
                //  alert(value);
                var amount = 0.00;
                var enddate = 000 - 00 - 00;
                var installmentdate = $('#installment_start_date').val();
                var sanction = parseFloat($('#sanction_amount').val());
                if (sanction != '' && value != '')
                {
                    var amount = parseFloat(sanction / value);

                    $.ajax({
                        url: '<?php echo base_url('employees_loan_end_date_calculate'); ?>/' + installmentdate + '/' + value,
                        type: 'POST',
                        //data : new FormData( $("#expenses")[0]),
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            // alert(data);
                            var enddate = data;
                            $('#loan_end_date').val(enddate);
                            $('#installment_amount').val(amount);
                            notification('success');
                        }
                    });



                }
            }

            function goforloanapplicationdocsdelete(no) {
                var id = $("#loan_application_edit_id").val();
                var name = $("#dcname" + no).html();
                //  alert(name);
                //  alert(id);
                //  alert(no);
                if (confirm('Are you sure ?')) {
                    $.ajax({
                        url: '<?php echo base_url('employees_loanapplication_doc_delete'); ?>/' + id + '/' + name,
                        type: 'POST',
                        //data : new FormData( $("#expenses")[0]),
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            // alert(data);
                            $("#del" + no).hide();
                            notification('success');
                        }
                    });
                }


            }

            function goforloan_applicationedit(id) {
//alert(id);
                $("#docs").html('');
                $.ajax({
                    url: '<?php echo base_url('employees_loan_application_data'); ?>/' + id,
                    type: 'POST',
                    //data : new FormData( $("#expenses")[0]),
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        // notification('success');
                        //  alert(data);
                        var obj = JSON.parse(data);
                        //    console.log(obj);
                        //  console.log(obj.attachment);
                        //  alert(obj.attachment);
                        if (obj.attachment)
                        {
                            var traingIdsf = obj.attachment.split(',');

                        }
                        else {

                            traingIdsf = '';
                        }
                        $("html, body").animate({scrollTop: 0}, "slow");

                        $("#loan_application_edit_id").val(obj.id);
                        // window.scrollTo(x-coord, y-coord);
                        //$("#employee_id").val(obj.employee_id);
                        $("#reference_name").val(obj.reference_name);
                        $("#request_amount").val(obj.request_amount);
                        $("#loan_requirement_note").val(obj.loan_requirement_note);
                        //  $("#loan_approved").val(obj.loan_approved);
                        $("input[name=loan_approved][value=" + obj.loan_approved + "]").attr('checked', 'checked').trigger("click");
                        // $("#attachment").val(obj.attachment);

                        //  console.log(traingIdsf);
                        if (traingIdsf != '')
                        {
                            var i;
                            var v = 0;
                            for (i = 0; i < traingIdsf.length; ++i) {
                                // do something with `substr[i]`
                                var v = ++v;
                                var name = "  <span id='del" + v + "' >" + v + ") <a href='<?php echo base_url('employees_loanapplication_download'); ?>/" + traingIdsf[i] + "'> <strong id='dcname" + v + "'>" + traingIdsf[i] + "</strong></a> &nbsp;&nbsp; <span style='cursor:pointer;' class='' onclick='goforloanapplicationdocsdelete(" + v + ")'> <span title='Delete' class='la la-trash icon text-danger-on-hover'></span> </span></span><br>";
                                $("#docs").append(name);
                            }
                        }
                        //$('#docs').html(name);
                        $("#loan_sanction_note").val(obj.loan_sanction_note);
                        $("#sanction_amount").val(obj.sanction_amount);
                        $("#installment_amount").val(obj.installment_amount);
                        $("#installment_start_date").val(obj.installment_start_date);
                        // $("#deduction_from_salary").val(obj.deduction_from_salary);
                        $("input[name=deduction_from_salary][value=" + obj.deduction_from_salary + "]").attr('checked', 'checked');
                        $("#loan_issue_date").val(obj.loan_issue_date);
                        $("#tenure_in_months").val(obj.tenure_in_months);
                        $("#loan_end_date").val(obj.loan_end_date);
                        $("#loan_cancel_note").val(obj.loan_cancel_note);
                        $("#loan_requirement_note").val(obj.loan_requirement_note);
                        $("#loan_approved").val(obj.loan_approved);


                        $('#loanapplicationaddForm').show();


                    }
                });

            }




            function loan_application_form_submit(id) {

                $.ajax({
                    url: '<?php echo base_url('modify_employees_loan_application'); ?>/' + id,
                    type: 'POST',
                    data: new FormData($("#loanapplication")[0]),
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        notification('success');
                        // alert(data);
                        //console.log(data);
						location.reload();
                        
						
                    }
                });

            }

            function goforloanclose(value, employee) {

                if (confirm('Do you want to close this Loan ?')) {
                    $.ajax({
                        url: '<?php echo base_url('goforloanclose'); ?>/' + value + '/' + employee,
                        type: 'POST',
                        //data : new FormData( $("#expenses")[0]),
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            $("#ks-datatable49").html(data);
                        }
                    });
                }


            }

            function loandetails(value) {

                $("#ks-datatable50").html('');
                $.ajax({
                    url: '<?php echo base_url('loan_details'); ?>/' + value,
                    type: 'POST',
                    //data : new FormData( $("#expenses")[0]),
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {

                        var newdata = data.split('@');
                        $('#loan_details').html(newdata[0]);
                        $('#installment_amount_pay').val(newdata[1]);


                        $("#ks-datatable50").html(newdata[2]);
                        $('#ks-datatable50').bootstrapTable({
                            icons: {
                                refresh: 'la la-refresh icon-refresh',
                                toggle: 'la la-list-alt icon-list-alt',
                                columns: 'la la-th icon-th',
                                share: 'la la-download icon-share'
                            }
                        });


                        $('#loan_details_div').show();
                        // $('#loanapplicationaddForm').hide();
                        //  $('#loanpaymentaddForm').show();
                    }
                });



            }

            function loan_payment_form_submit(id) {

                $.ajax({
                    url: '<?php echo base_url('modify_employees_loan_payment'); ?>/' + id,
                    type: 'POST',
                    data: new FormData($("#loanpayment")[0]),
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        notification('success');
                        // alert(data);
                        //console.log(data);
//                        $("#ks-datatable50").html(data);
//                        $('#ks-datatable50').bootstrapTable({
//                            icons: {
//                                refresh: 'la la-refresh icon-refresh',
//                                toggle: 'la la-list-alt icon-list-alt',
//                                columns: 'la la-th icon-th',
//                                share: 'la la-download icon-share'
//                            }
//                        });
                        $("#loanpayment").find("input[type=text], select, textarea, file, radio").val("");
                        $('#loanpaymentaddForm').hide();
                        $('#loan_details').html('');
                    }
                });

            }
            function passport_form_submit(id) {

                $.ajax({
                    url: '<?php echo base_url('modify_passport_visa'); ?>/' + id,
                    type: 'POST',
                    data: new FormData($("#passport_form")[0]),
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        $('#passport_div').html(data);
                        notification('success');
                        // alert(data);
                        console.log(data);

                    }
                });

            }


            function getpolicydetails(value) {

                $("#policy_details").html('');
				if(value != ''){
                $.ajax({
                    url: '<?php echo base_url('policy_details'); ?>/' + value,
                    type: 'POST',
                    //data : new FormData( $("#expenses")[0]),
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {

                        // var newdata=data.split('@');
                        $('#policy_details').html(data);
						$('#benefit_save').show();

                    }
                });

				}

            }

            function benifit_form_submit(id) {

                $.ajax({
                    url: '<?php echo base_url('modify_benifit'); ?>/' + id,
                    type: 'POST',
                    data: new FormData($("#benifit")[0]),
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        $('#benifit_table').html(data);
                        //  alert(data);
                        notification('success');
                        $("#policy_name").val('');
						$("#policy_details").html('');
						$('#benefit_save').hide();
                    }
                });

            }
            function daysdifference(date1, date2) {
            // The number of milliseconds in one day
            var ONEDAY = 1000 * 60 * 60 * 24;
            // Convert both dates to milliseconds
            var date1_ms = date1.getTime();
            var date2_ms = date2.getTime();
            // Calculate the difference in milliseconds
            var difference_ms = Math.abs(date1_ms - date2_ms);

            // Convert back to days and return
            return Math.round(difference_ms/ONEDAY);
        }
 function leave_due_calculate(id) {
    // alert(id);
  var from=$('#leave_from').val();
             var to=$('#leave_to').val();
              var leave_type=$('#leave_type').val();
              var due_leave=$('#due_leave'+leave_type).val();
              //datediff(from,to);
              if(from!='' && to!=''){
var startDate = Date.parse(from);
            var endDate = Date.parse(to);
            var timeDiff = endDate - startDate;
          var  daysDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
          var original=daysDiff+1;
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
              }
            // var to=$('#leave_from').val();
 
 
    }
   
            function leave_application_form_submit(id) {
             var from=$('#leave_from').val();
             var to=$('#leave_from').val();
              var leave_type=$('#leave_type').val();
             if(from=='')
             {
                 alert("Please enter from date");
             }
             else if(to==''){
                  alert("Please enter to date");
        }
           else if(leave_type==''){
                  alert("Please choose leave type");
        }
        else{
                $.ajax({
                    url: '<?php echo base_url('modify_leave_application'); ?>/' + id,
                    type: 'POST',
                    data: new FormData($("#leave_application_form")[0]),
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (datanew) {
                       var data=datanew.split("`");
                      // console.log(data[0]);
                     //  console.log(data[1]);
                        $('#leave_application_table').html(data[0]);
                        $('#leave_type').html(data[1]);
                        //  alert(data);
                        notification('success');
                      //  $("#policy_name").val('');
     $("#leave_application_form").find("input[type=text], select, textarea, file, radio").val("");

                    }
                });
                }
                

            }
            function goforbenifitedit(id) {

                $.ajax({
                    url: '<?php echo base_url('employees_benifit_data'); ?>/' + id,
                    type: 'POST',
                    //data : new FormData( $("#expenses")[0]),
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        // notification('success');
                        //  alert(data);
                        var obj = JSON.parse(data);
                        console.log(obj);
                        console.log(obj.expenses_name);
                        $("html, body").animate({scrollTop: 0}, "slow");

                        $("#benifit_edit_id").val(obj.id);
                        $("#policy_name").val(obj.policy_id);
                        // window.scrollTo(x-coord, y-coord);

                        // $('#expenseaddForm').show();

                    }
                });

            }

            function goforbenifitdelete(id) {
                if (confirm('Are you sure ?')) {
                    $.ajax({
                        url: '<?php echo base_url('employees_benifit_delete'); ?>/' + id,
                        type: 'POST',
                        //data : new FormData( $("#expenses")[0]),
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            $("#benifit_delete" + id).hide();
                            notification('success');
                        }
                    });
                }


            }
 function goforleaveapplicationdit(id) {
 $("#leave_application_form").find("input[type=text], select, textarea, file, radio").val("");
                $.ajax({
                    url: '<?php echo base_url('employees_leave_application_data'); ?>/' + id,
                    type: 'POST',
                    //data : new FormData( $("#expenses")[0]),
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        // notification('success');
                        //  alert(data);
                        var obj = JSON.parse(data);
                        console.log(obj);
                        console.log(obj.expenses_name);
                        $("html, body").animate({scrollTop: 0}, "slow");

                        $("#leave_application_edit_id").val(obj.id);
                        // window.scrollTo(x-coord, y-coord);
                        $("#leave_type").val(obj.leave_type_id);
                        $("#leave_from").val(obj.date_range);
                        $("#leave_to").val(obj.leave_to);
                        $("#leave_total_days").val(obj.leave_total_days);
                     //   $("#leave_ticket").val(obj.leave_ticket);
                        $("input[name=leave_ticket][value=" + obj.leave_ticket + "]").attr('checked', 'checked');
                        $("#leave_ticket_amount").val(obj.leave_ticket_amount);
                        $("#leave_note").val(obj.leave_note);
                        $('#leave_application_form_div').show();

                    }
                });

            }
            
             function goforleaveapplicationdelete(id) {
                if (confirm('Are you sure ?')) {
                    $.ajax({
                        url: '<?php echo base_url('employees_leave_application_delete'); ?>/' + id,
                        type: 'POST',
                        //data : new FormData( $("#expenses")[0]),
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            $("#leave_application_delete" + id).hide();
                            notification('success');
                        }
                    });
                }


            }
            
             function goforleaveapproval(id,status,employee_id) {
                if (confirm('Are you sure ?')) {
                    $.ajax({
                        url: '<?php echo base_url('employees_leave_approval'); ?>/' + id+'/'+status+'/'+employee_id,
                        type: 'POST',
                        //data : new FormData( $("#expenses")[0]),
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (datanew) {
                            // alert(datanew);
                            if(datanew!='no'){
                                var data=datanew.split("`");
                               
                      // console.log(data[0]);
                     //  console.log(data[1]);
                       $('#leave_type').html(data[1]);
                          //  $("#leave_application_delete" + id).hide();
                          $('#leave_application_table').html(data[0]);
                            notification('success');
                        }
                        else{
                      alert('Your this type leave balance is 0');      
        }
                        }
                    });
                }


            }
           
           



            function getAttData(yr,eid) {
                //alert(yr);

                 $.post("<?php echo base_url('get_employee_attendance'); ?>", {'year':yr,'employee_id': eid}, function(result){
                    $("#AttData").html(result);
                    alert(result);
                  });
            }
            
function getNetSalary(employee_id) {
    $("#net_salary").show();
    var salary_structure_val = $("#salary_structure option:selected").val();
    var ctcVal = $("#ctc").val();

    if(salary_structure_val!='' && ctcVal!=''){
        $('.salary_structure_err').html('');
        $('.CTC_err').html('');

        $.post("<?php echo base_url('admin_get_net_salary_div'); ?>", {'id': employee_id,'salary_structure_val':salary_structure_val,'ctcVal':ctcVal}, function(result){
          //console.log(result);
       $("#net_salary").html(result);

       $(".NetSalaryClose").show();
       adjust();

       /******* check ctc amount and calculated amount *******/
       var calculatedAmt = $('.net_amt_yearly_cls').val();
       calculatedAmt = calculatedAmt.replace(/\,/g,'');
       calculatedAmt = parseFloat(calculatedAmt);

       //console.log('calculatedAmt--'+calculatedAmt);
       //console.log('ctcVal--'+ctcVal);

       if(calculatedAmt!=ctcVal){
        $('.saveSalary').prop('disabled', true);
        $('.net_amt_yearly_cls_span').show();

       }else{
        $('.saveSalary').prop('disabled', false);
        $('.net_amt_yearly_cls_span').hide();
       }



       
        });
    }else{
        $('.salary_structure_err').html('Select salary structure');
        $('.CTC_err').html('CTC Field required');
    }
}



            
function getsalarystructure() {
    
    var salary_structure_val = $("#salary_structure1").val();
    var ctcVal = $("#ctc1").val();
    //alert(ctcVal); 

    if(salary_structure_val!='' && ctcVal!=''){
        $('.salary_structure_err').html('');
        $('.CTC_err').html('');

        $.post("<?php echo base_url('admin_get_all_salary_structure'); ?>", {'salary_structure_val':salary_structure_val,'ctcVal':ctcVal}, function(result){
          //console.log(result);
       $("#updatesalaryStucture").html(result);
        });
    }
}



function geteditNetSalary(employee_id,ctc,salary_structure_val,id) {
    $("#edit_net_salary").show();
    var salary_structure_val = salary_structure_val;
    var ctcVal = ctc;

    if(salary_structure_val!='' && ctcVal!=''){
        $('.salary_structure_err').html('');
        $('.CTC_err').html('');

        $.post("<?php echo base_url('admin_get_net_salary_div_edit'); ?>", {'employee_id': employee_id,'salary_structure_val':salary_structure_val,'ctcVal':ctcVal,'id':id}, function(result){
          //console.log(result);
        $("#edit_net_salary").show();
        $("#edit_net_salary").html(result);

        $(".NetSalaryClose").hide();
        $('.add_salary').hide();
        $('#mode').val('Edit');
        $('#saveDiv').hide();
        $('#updateDiv').hide();


       /******* check ctc amount and calculated amount *******/
       var calculatedAmt = $('.net_amt_yearly_cls').val();
       calculatedAmt = calculatedAmt.replace(/\,/g,'');
       calculatedAmt = parseFloat(calculatedAmt);

       //console.log('calculatedAmt--'+calculatedAmt);
       //console.log('ctcVal--'+ctcVal);

       if(calculatedAmt!=ctcVal){
        $('.saveSalary').prop('disabled', true);
        $('.net_amt_yearly_cls_span').show();

       }else{
        $('.saveSalary').prop('disabled', false);
        $('.net_amt_yearly_cls_span').hide();
       }



       
        });
    }else{
        $('.salary_structure_err').html('Select salary structure');
        $('.CTC_err').html('CTC Field required');
    }
}

    function checkCTCgrade(minSal='',maxSal='',all){
        var ctcVal = $(all).val();
        // console.log('ctcVal--'+ctcVal);
        // console.log('minSal--'+minSal);
        // console.log('maxSal--'+maxSal);
        if(parseFloat(ctcVal) < parseFloat(minSal)){
            $('.CTC_err').html('CTC will not less then '+ minSal);
            $(".NetSalaryCls").prop("disabled", true);
        }else if(parseFloat(ctcVal) > parseFloat(maxSal)){
            $('.CTC_err').html('CTC will not more then '+ maxSal);
            $(".NetSalaryCls").prop("disabled", true);
        }else{
            $('.CTC_err').html('');
            $(".NetSalaryCls").prop("disabled", false);
        }
    }



    function saveSalaryStructure(emid) {
        //alert(emid);
        var salary_structure_val = $("#salary_structure option:selected").val();
        var ctcVal = $("#ctc").val();
       
        var mode = 'Add';
        var edit_id = $('#edit_id').val();
        var pfcheck_1 = $('#pfcheck').val();
        var pfcheck = '0';
        
        if(pfcheck_1 != ''){
			 pfcheck = pfcheck_1;
		}else if(pfcheck_1 == 'undefined'){
			 pfcheck = '0';
		}
        var pf_based_on = $('#pf_based_on').val();
        var employeemothlypf = $('#employeemothlypf').val();
        var employeeyearlypf = $('#employeeyearlypf').val();

        var employermothlypf = $('#employermothlypf').val();
        var employeryearlypf = $('#employeryearlypf').val();

        var esicheck_1 = $('#esicheck').val(); 
		var esicheck = '0';
		
		if(esicheck_1 != '' || esicheck_1 != 'undefined'){
			var esicheck = esicheck_1;
		}else{
			var esicheck = '0';
		}
        var employeemothlyesi = $('#employeemothlyesi').val();
        var employeeyearlyesi = $('#employeeyearlyesi').val();

        var employermothlyesi = $('#employermothlyesi').val();
        var employeryearlyesi = $('#employeryearlyesi').val();

        var esi_per_employer = $('#esi_emper_per').val();
        var esi_per_employee = $('#esi_empeee_per').val();

      
        var ptaxcheck_1 = $('#ptaxcheck').val();
		//alert(ptaxcheck_1);
		var ptaxcheck = '';
		if(ptaxcheck_1 != ''){
			var ptaxcheck = ptaxcheck_1;
		}else{
			var ptaxcheck = '';
		}
		
        var mothlyptax = $('#mothlyptax').val();
        var yearlyptax = $('#yearlyptax').val();

        var application_date = $('#application_date').val();
        var note = $('#salary_note').val();
		
        var ptax_state_1 = $('#ptax_state').val();
		var ptax_state = '';
		if(ptax_state_1 != ''){
			var ptax_state = ptax_state_1;
		}else{
			var ptax_state = '';
		}
        var not_part_ctc_component_id = $('#not_part_ctc_component_id').val();
        //alert(ptax_state);

         //pfcheck//mothlypf//yearlypf//esicheck//mothlyesi//yearlyesi//ptaxcheck//mothlyptax//yearlyptax
        var salary_structure_breakup = new Array();
        
        
        
        $(".yearlyamount").each(function(){            
            var vall = $(this).val();
            vall = vall.replace(/\,/g,'');
            vall = parseFloat(vall);
            //console.log('vall--'+vall);
            var valId = $(this).data('id');
            var finalVal = valId+'##'+vall;

            salary_structure_breakup.push(finalVal);
            
          })
         // alert(salary_structure_breakup);
        //console.log('salary_structure_breakup--'+salary_structure_breakup);

        //alert(esicheck_1); 
		$('#saveDiv').prop('disabled', true);
        if(salary_structure_val!='' && ctcVal!=''){
            $('.salary_structure_err').html('');
            $('.CTC_err').html('');

            $.post("<?php echo base_url('admin_save_emp_salary_structure'); ?>", {'id': emid,'salary_structure_val':salary_structure_val,'ctcVal':ctcVal,'salary_structure_breakup':salary_structure_breakup,'mode' : mode,'edit_id': edit_id,'pfcheck':pfcheck,'employeemothlypf':employeemothlypf,'employeeyearlypf':employeeyearlypf,'employermothlypf':employermothlypf,'employeryearlypf':employeryearlypf,'esicheck':esicheck,'employeemothlyesi':employeemothlyesi,'employeeyearlyesi':employeeyearlyesi,'employermothlyesi':employermothlyesi,'employeryearlyesi':employeryearlyesi,'esi_per_employer':esi_per_employer,'esi_per_employee':esi_per_employee,'ptaxcheck':ptaxcheck,'mothlyptax':mothlyptax,'yearlyptax':yearlyptax,'application_date':application_date,'note':note,'pf_based_on':pf_based_on,'ptax_state':ptax_state,'not_part_ctc_component_id':not_part_ctc_component_id}, function(result){
             // console.log(result);
              //console.log(result);
                $("#net_salary_save").html('Saved successfully');
				//$('#saveDiv').prop('disabled', false);
                location.reload();
           
            });
        }else{
            $('.salary_structure_err').html('Select salary structure');
            $('.CTC_err').html('CTC Field required');
        }
    }


    function updateSalaryStructure(emid) {
        //alert(emid);
        $("#net_salary").html('');
        
        var salary_structure_val = $("#salary_structure1").val();
        var ctcVal = $("#ctc1").val();
        var mode = 'Edit';
        var edit_id = $('#edit_id1').val();

        var pfcheck = $('#pfcheck').val();
        var employeemothlypf = $('#employeemothlypf').val();
        var employeeyearlypf = $('#employeeyearlypf').val();

        var employermothlypf = $('#employermothlypf').val();
        var employeryearlypf = $('#employeryearlypf').val();

        var esicheck = $('#esicheck').val(); 
        var employeemothlyesi = $('#employeemothlyesi').val();
        var employeeyearlyesi = $('#employeeyearlyesi').val();

        var employermothlyesi = $('#employermothlyesi').val();
        var employeryearlyesi = $('#employeryearlyesi').val();

        var esi_per_employer = $('#esi_emper_per').val();
        var esi_per_employee = $('#esi_empeee_per').val();

      
        var ptaxcheck = $('#ptaxcheck').val();
        var mothlyptax = $('#mothlyptax').val();
        var yearlyptax = $('#yearlyptax').val();

        var application_date = $('#application_date').val();
        var note = $('#note1').val();
        //alert(note);

         //pfcheck//mothlypf//yearlypf//esicheck//mothlyesi//yearlyesi//ptaxcheck//mothlyptax//yearlyptax
        var salary_structure_breakup = new Array();
        
        $(".yearlyamount").each(function(){            
            var vall = $(this).val();
            vall = vall.replace(/\,/g,'');
            vall = parseFloat(vall);
            //console.log('vall--'+vall);
            var valId = $(this).data('id');
            var finalVal = valId+'##'+vall;

            salary_structure_breakup.push(finalVal);
            
          })
        //console.log('salary_structure_breakup--'+salary_structure_breakup);


        if(salary_structure_val!='' && ctcVal!=''){
            $('.salary_structure_err').html('');
            $('.CTC_err').html('');

            $.post("<?php echo base_url('admin_save_emp_salary_structure'); ?>", {'id': emid,'salary_structure_val':salary_structure_val,'ctcVal':ctcVal,'salary_structure_breakup':salary_structure_breakup,'mode' : mode,'edit_id': edit_id,'pfcheck':pfcheck,'employeemothlypf':employeemothlypf,'employeeyearlypf':employeeyearlypf,'employermothlypf':employermothlypf,'employeryearlypf':employeryearlypf,'esicheck':esicheck,'employeemothlyesi':employeemothlyesi,'employeeyearlyesi':employeeyearlyesi,'employermothlyesi':employermothlyesi,'employeryearlyesi':employeryearlyesi,'esi_per_employer':esi_per_employer,'esi_per_employee':esi_per_employee,'ptaxcheck':ptaxcheck,'mothlyptax':mothlyptax,'yearlyptax':yearlyptax,'application_date':application_date,'note':note}, function(result){
              console.log(result);
                $("#net_salary_save").html('Saved successfully');
                location.reload();
           
            });
        }else{
            $('.salary_structure_err').html('Select salary structure');
            $('.CTC_err').html('CTC Field required');
        }
    }

function getlength(number) {
    return number.toString().length;
}
     function CloseNetSalary(){
            $('#net_salary').html('');
            $(".NetSalaryClose").hide();
            
    }
 
 function btnCloseForm(){
    $('.closeForm').remove();
    $('.form-wrapper').css('display','none');
}      




function getSubordinate(mid,eid){
    //alert(eid);
    $.post("<?php echo base_url('admin_get_subordinate'); ?>", {'id': eid,'mid':mid}, function(result){
          //console.log(result);
       $(".SubordinateDiv").html(result);
       $('.js-example-basic-multiple').select2({
                  multiple:true
                });
       
        });

    }
   $('.js-example-basic-multiple').select2();

     </script>
                 

        <?php if (!empty($data_qualification->basic_category)) { ?>
            <script>
                var value = $('#basic_category').val();
                //alert(value);
                changethediv(value);



            </script>
            <?php
        }
        ?>
        <!-- pjax -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.pjax.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
<!--<script>
    $(function () {
       
    if ($.support.pjax) {
         var tableold = $('#ksdatatable').DataTable();
        tableold.destroy();
        $(document).pjax('.pjaxCls', '#pjax-container')
        $(document).on("ready pjax:end", function () {
            $('.flatpickrDateNew').daterangepicker();
            $('.js-example-basic-multiple').select2();
            var table = $('#ksdatatable').DataTable({
                bPaginate: true,
                responsive: true,
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],               
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
//                   {
//                      extend: 'pdfHtml5', text: '<i class="la la-file-pdf-o"></i>', orientation: 'portrait', pageSize: 'A3',
//                        exportOptions: {
//                            columns: ':visible',
//                            search: 'applied',
//                            order: 'applied'
//                        }
//                    },
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
                    { orderable: false, targets: -1 }
                 ]
            });
            table.buttons().container().appendTo( '.dataTable_buttons' );
            $('.dataTables_filter').find('input').attr('placeholder','Search here...');
            


            


            
//            $('#ks-datatable').bootstrapTable({
//                classes: 'table table-list',
//                pagination: true,
//                search: true,
//                sortable: true,
//                order: 'asc', // asc, desc
//                pageNumber: 1,
//                pageSize: 10,
//                showRefresh: true,
//                showSortable: true,
//                //showExport:true,
//                showPrint:true,
//                showExcel:true,                
//                //showColumns: true, // column toggle by checkbox
//                buttonsAlign: 'right',
//                //showToggle: true, // col2row, row2col
//                icons: {
//                    refresh: 'la la-refresh icon-refresh',
//                    toggle: 'la la-list-alt icon-list-alt',
//                    columns: 'la la-th icon-th',
//                    share: 'la la-download icon-share',
//                    export: 'la la-download icon-share',
//                    print: 'la la-print icon-share'
//                }
//            });
        });
    }
});
    </script>-->

<script>
    function getallpayment(id) {
            //   alert(id);
              $('#loan_payment_details_modal').modal('show');
                    $.ajax({
                        url: '<?php echo base_url('loan_payment_details'); ?>/' + id,
                        type: 'POST',
                        //data : new FormData( $("#expenses")[0]),
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (datanew) {
                            // alert(datanew);
                            if(datanew){
                              //  var data=datanew.split("`");
                               
                      // console.log(data[0]);
                     //  console.log(data[1]);
                       $('#loan_payment_details').html(datanew);
                          //  $("#leave_application_delete" + id).hide();
                          $('#leave_application_table').html(datanew);
                            //notification('success');
                            
                        }
                        
                        }
                    });
                


            }
            
            $(".dropdown.level3").click(function(){                
                $(".dropdown.level3").removeClass('open');
                $(this).addClass('open');
            });
       
       // single date 
       $('.mysingle_date').daterangepicker({
           locale: {format: dateformat},
            singleDatePicker:true,
            showDropdowns:true            
        });
        // date time
        $('.mydate_time').daterangepicker({
            singleDatePicker:true,
            timePicker:true,
            timePicker24Hour:true,
            locale: {format: 'DD-M-YYYY hh:mm A'}            
        });
        // date range 
       $('.mydate_range').daterangepicker({           
           locale: {format: dateformat},
           minDate:'10-04-2020',
           maxDate:'20-05-2020'
        });
        // range date & time
       $('.mydate_timeRange').daterangepicker({           
           timePicker:true,
            timePicker24Hour:true,
            locale: {format: 'DD-M-YYYY hh:mm A'}            
        });
        
        // time range picker
         $('.mytime_pickerRange').daterangepicker({
                timePicker: true,
                timePickerIncrement: 1,
                locale: {
                    format: 'hh:mm A'
                }
            }, function (start, end, label) { //callback
                start_time = start.format('hh:mm A');
                end_time = end.format('hh:mm A');                
            }).on('show.daterangepicker', function (ev, picker) {
                picker.container.find(".calendar-table").hide(); //Hide calendar
            });
            // single time picker
         $('.mytime_picker').daterangepicker({
                timePicker : true,
            singleDatePicker:true,
            //timePicker24Hour : true,
            timePickerIncrement : 5,            
            locale : {
                format : 'hh:mm A'                
            }
                }).on('show.daterangepicker', function(ev, picker) {
                picker.container.find(".calendar-table").hide();
            });
            
        // button click       
       $('.mybtn_date').daterangepicker({
            ranges: {
              'Today': [moment(), moment()],
              'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
              'Last 7 Days': [moment().subtract(6, 'days'), moment()],
              'Last 30 Days': [moment().subtract(29, 'days'), moment()],
              'This Month': [moment().startOf('month'), moment().endOf('month')],
              'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
          }, function (start, end) {
            //window.alert("You chose: " + start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            $("#selectedDate").text(start.format('d-M-YY') + ' to ' + end.format('d-M-YY'));
          });
       
            
        function salarydivopen(){
        // alert('Ok');
        //console.log('open');
        $('.add_salary').show();
        //$('#mode').val('Add');
        $('#saveDiv').show();
        $('#updateDiv').hide();
        //$("#net_salary").show();

        $('#edit_net_salary').hide();
        $('#edit_net_salary').html('');
        $("#notification_body_salary").html('');
        }
		
		 function viewSalaryDetails(id,ctc) {
    var salary_structure_val = id;
    var ctcVal = ctc;
    $("#myModalsalary").on('shown.bs.modal', function() {
    if(salary_structure_val!='' && ctcVal!=''){
      $.post("<?php echo base_url('admin_get_salary_structure_view'); ?>", {'salary_structure_val':salary_structure_val,'ctcVal':ctcVal}, function(result){
     $("#notification_body_salary").html(result);
     $("#notification_heading_salary").html('Salary Stucture');
     
     
      });
    }
    }).modal("show");
   
}


 function check_available_leave(){
	var leave_type = $("#leave_type").val();
	var due_leave=$('#due_leave'+leave_type).val();
	var original=$('#leave_total_days').val();
	
       if(due_leave > '0'){   
        if(Math.floor(due_leave)>=original){
        $('#leave_total_days').val(original);
        //$('#leave_add').show();
        $("#leave_add").prop('disabled', false);
        $('#leave_error').text('');
        }else if(due_leave == '0' ||due_leave == '0.5'){
         
          $('#leave_total_days').val(original);
          $('#leave_error').text('Your Balance leave is less than required leave.');
          $("#leave_add").prop('disabled', true);
          //alert('sd');
        }else{
        //alert('Your due leave is less than required leave.');
        $('#leave_error').text('Your Balance leave is less than required leave.');
        
        $('#leave_total_days').val(original);
         $("#leave_add").prop('disabled', 'disabled');
         //alert('s22d');
        }

    }else{
      $('#leave_total_days').val(original);
     $("#leave_add").prop('disabled', false);
    }
  }



    </script>
	<script>
 if (!navigator.serviceWorker.controller) {
     navigator.serviceWorker.register("/pwabuilder-sw.js").then(function(reg) {
         console.log("Service worker has been registered for scope: " + reg.scope);
     });
 }
</script>
    </body>
</html>