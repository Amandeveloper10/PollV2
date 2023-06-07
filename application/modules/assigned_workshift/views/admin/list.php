<?php $SysConfigauthenticaton = checkConfig1();
$jquery_date_format = $SysConfigauthenticaton->jquery_date_format;
?>
<style>
    div.dataTables_wrapper > .row:first-child{padding-top: 0!important}
    table tr td,table tr th {white-space: nowrap}
    .table tr td{border-bottom: 1px solid #dee0e1; border-top:0}
    .table tr:first-child td{border-top: 1px solid #dee0e1;}
    div.dataTables_wrapper > .row:last-child{border: 0}
    .table-list thead tr th{min-width: 60px; text-align: right!important}
    .table-list tbody tr td{text-align: right;}    
    .DTFC_LeftBodyLiner{overflow-x: hidden}
    .col-fixed-400{-ms-flex: 0 0 190px;flex: 0 0 190px;max-width: 190px;}
</style>
<div class="ks-page-header">
    <section class="ks-title">
        <h3><span>Shift Roster</span> </h3>
        <div class="ks-controls">            
            <a href="javascript:;" class="btn btn-icon btn-light btn_maximize"><i class="far fa-window-maximize"></i></a>
            <div class="header-search">
                <a href="javascript:void(0)" class="btn btn-warning btn-icon" onclick="$('.drop_search').slideToggle();">
                    <i class="fa fa-search"></i>
                </a>
                <div class="drop_search" id="calAtt">                    
                        <?php
                        $start_yr = '2018';
                        $end_yr = date('Y');
                        ?>
                        <div class="form-group">
                            <select id='month_id' name="month_id" class="form-control">
                                <option value=''>Select Month</option>
                                <option value='01' <?php echo (date('m') == '01') ? 'selected' : ''; ?> >Janaury</option>
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
                        <div class="form-group">
                            <select id='year_id' name="year_id" class="form-control">
                                <option value=''>Select Year</option>                               
                                <?php for ($i = 2018; $i <= $end_yr; $i++) { ?>
                                    <option value='<?php echo $i; ?>' <?php echo (date('Y') == $i) ? 'selected' : ''; ?>><?php echo $i; ?></option>
                                <?php } ?> 
                            </select>
                        </div>
                        <a href="javascript:void(0)" class="btn btn-warning closeSearch btn-add-attendance" onclick="openworkshift('');">Search</a>
                        </div>
                        
                    </div>                
<!--			<a href="javascript:void(0)" class="btn btn-info btn-icon" data-toggle="modal" data-target="#searchmodal">
                <i class="fa fa-search"></i>
            </a>-->
            <button type="button" class="btn btn-primary" onclick="openFormLoc('');">Add</button>  
        </div>
    </section>
</div>

<div class="ks-page-content">
    <div class="ks-page-content-body">
        <div class="container-fluid">
        <div class="content-wrapper">            
            <div class="form-wrapper" style="display:none">
                
            </div> 
			
            <div class="d-block" style="padding: 15px 15px 0;">
			
           
					
                    </div>          
           
            <div class="table-responsive" id="new_table_search">
          <!-- class="table table-list" >-->
           	 <table id="payrolltable" class="table table-list2">
                <thead>
                  <tr>
                    <th>Employee Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                   
                    <?php
                    $cd = array();
                    $c_year = date("Y");
                    $c_month = date("m");
                    $no_day = date('t',strtotime($c_year.'-'.$c_month.'-01')); 
                    //$cd = $c_year.'-'.$c_month.'-'.$i;
					//$date_val = json_encode($cd);
                   					
                    for($i=1; $i<=$no_day; $i++){  ?>
                    <th class="text-left">
                        <?=$i?>                        
                        <?=date("D",strtotime($c_year.'-'.$c_month.'-'.$i))?>                        
                    </th> 
                    <?php } ?>           
                   
                  </tr>
                </thead>
                <tbody>
                <?php
                    $sl = 1;
                   // echo "<pre>"; print_r($all_data); die;
                    if (!empty($all_data)) {
                      foreach ($all_data as $data) {
                      	
						$default_workshift = $this->AssignedworkshiftModel->get_all_default_shift_data($data->id);
						$wfh = $this->AssignedworkshiftModel->get_all_wfh_details($data->id,$c_month,$c_year);
						
                    ?>
                  <tr>
                      <td class="d-flex align-items-center">
                        <img <?php if (isset($data->personal_image) && $data->personal_image != '') { ?> src="<?php echo base_url(); ?>uploads/<?php echo (isset($data->personal_image) && $data->personal_image != '') ? $data->personal_image : ''; ?>" <?php } else { ?> src="<?php echo base_url(); ?>/assets/img/avatars/placeholders/ava-128.png" <?php } ?>class="ks-avatar" alt="" width="36" height="36">
                        <div><?php echo @$data->first_name . ' ' . @$data->middle_name . ' ' . @$data->last_name; ?><br>
                            <small><?php if(!empty($data->employee_no)) { echo '('.$data->employee_no.')'; } ?></small>                        </div>
                    </td>
                    
                    <?php /*?><?php  for($j=1; $j<=$no_day; $j++){  ?>
                    <td <?php foreach ($load_all_workshift as $value) { if($j == date('d',strtotime($value->start_date))){ ?>
                        style="background-color:<?=$value->color?>";
                   <?php }
                    }?>>
                    <a href="javascript:void(0)"  <?php  foreach ($load_all_workshift as $value) { if($j == date('d',strtotime($value->start_date))){ ?> onclick="openFormLoc(<?=$value->id?>);" <?php } }?>>
                         <?php foreach ($load_all_workshift as $value) { 
						 if($j == date('d',strtotime($value->start_date))){ ?>
                         <?php if(date('l', strtotime($value->start_date)) == $value->off_day){ echo 'OFF DAY'; } else { echo $value->work_shift_name; } ?>
                            
                         <?php } } ?>
                    </td>
                    <?php } ?><?php */?>
					<?php  for($j=1; $j<=$no_day; $j++){ 
					$k = str_pad($j, 2, "0", STR_PAD_LEFT);
					$load_all_workshift = $this->AssignedworkshiftModel->get_all_data($data->id,$k,date('m'),date('Y'));
					
					//echo '<pre>'; print_r($load_all_workshift);
					?>
					<td>
					
					<?php 
					//echo '<pre>'; print_r($wfh); //die;
					if(!empty($wfh['wfh']) && (in_array(sprintf('%02d', $j),$wfh['wfh'])) ){
                       echo '<span class="ks-icon la la-life-ring" title="Work From Home"></span>';
						}
					if(!empty($load_all_workshift)) {
						   $work_hour_start  = '';
							$day = date('Y').'-'.date('m').'-'.$k;
							$stweekname = date('l',strtotime($day));
							$daytype = $load_all_workshift->off_day;
							$curdate = date('Y-m-d',strtotime($day));
							$weekNo = getWeeks($curdate,$stweekname);
							$workshiftdetails = $this->AssignedworkshiftModel->get_workshift_details($load_all_workshift->workshiftid,$weekNo,$stweekname);
							//echo '<pre>'; print_r($workshiftdetails);
							if(!empty($workshiftdetails)){
							if($workshiftdetails->weekvalue == 'rule_1'){
							$work_hour_start = $workshiftdetails->work_hour_start_1;
							}elseif($workshiftdetails->weekvalue == 'rule_2'){
							$work_hour_start = $workshiftdetails->work_hour_start_2;
							}elseif($workshiftdetails->weekvalue == 'Full'){
							if($workshiftdetails->weekoff == 'rule_1'){
							$work_hour_start = $workshiftdetails->work_hour_start_1;
							}else{
							$work_hour_start = $workshiftdetails->work_hour_start_2;
							}

							}
							}
			
						?>
					<a  <?php if(@$load_all_workshift->off_day == $stweekname){ ?> title="Weekoff" style="color: red;" <?php } else { ?> title="<?=$load_all_workshift->work_shift_name?>" href="javascript:void(0)" onclick="openFormLoc(<?=$load_all_workshift->id?>);" <?php } ?> > <?php if(@$load_all_workshift->off_day == $stweekname){ echo 'Weekoff'; } else { echo $work_hour_start;} ?></a>
					
					<?php } else { ?>
					<?php 
					$work_hour_start  = '';
							$day = date('Y').'-'.date('m').'-'.$k;
							$stweekname = date('l',strtotime($day));
							$curdate = date('Y-m-d',strtotime($day));
							$weekNo = getWeeks($curdate,$stweekname);
							$workshiftdetails = $this->AssignedworkshiftModel->get_workshift_details($default_workshift->workshiftid,$weekNo,$stweekname);
							//echo '<pre>'; print_r($workshiftdetails);
							if(!empty($workshiftdetails)){
							if($workshiftdetails->weekvalue == 'rule_1'){
							$work_hour_start = $workshiftdetails->work_hour_start_1;
							}elseif($workshiftdetails->weekvalue == 'rule_2'){
							$work_hour_start = $workshiftdetails->work_hour_start_2;
							}elseif($workshiftdetails->weekvalue == 'Full'){
							if($workshiftdetails->weekoff == 'rule_1'){
							$work_hour_start = $workshiftdetails->work_hour_start_1;
							}else{
							$work_hour_start = $workshiftdetails->work_hour_start_2;
							}

							}
							}
					//$default_workshift->work_shift_name
					echo '<span title="'.$default_workshift->work_shift_name.'">'.$work_hour_start.'</span>'; 
					?>
					<?php } ?></td>
					<?php } ?>
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

<div id="searchmodal" class="modal fade" role="dialog">
				<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Search</h4>
				</div>
				<div class="modal-body">
				 <div class="row" id="calAtt">
                        <?php
                        $start_yr = '2018';
                        $end_yr = date('Y');
                        ?>

                        <div class="col-sm-4 col">
                            <div class="form-group">
                                <select id='month_id' name="month_id" class="form-control">
                                    <option value=''>Select Month</option>
                                    <option value='01' <?php echo (date('m') == '01') ? 'selected' : ''; ?> >Janaury</option>
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

                        <div class="col-sm-4 col">
                            <div class="form-group">
                                <select id='year_id' name="year_id" class="form-control">
                                    <option value=''>Select Year</option>                               
                                    <?php for ($i = 2018; $i <= $end_yr; $i++) { ?>
                                        <option value='<?php echo $i; ?>' <?php echo (date('Y') == $i) ? 'selected' : ''; ?>><?php echo $i; ?></option>
                                    <?php } ?> 
                                </select>
                            </div>                 
                        </div>
                        <div class="col-sm-4 col">
                            <div class="form-group">
                                <a href="javascript:void(0)" class="btn btn-danger btn-add-attendance" onclick="openworkshift('');">Search</a>
                            </div>
                        </div>
                    </div> 
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
				</div>

				</div>
				</div>
<!-- [end] Notification DIV -->

<script type="text/javascript">
    var jquerydateformat = '<?php echo $jquery_date_format;?>';
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
        bSort: false,
        bInfo: true,
        bAutoWidth: true,        
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
//            {
//                extend: 'pdfHtml5', text: '<i class="la la-file-pdf"></i>',
//                exportOptions: {
//                    columns: ':visible',
//                    search: 'applied',
//                    order: 'applied'
//                }
//            },
//            {
//                extend: 'print', text: '<i class="la la-print"></i>',
//                exportOptions: {
//                    columns: ':visible',
//                    search: 'applied',
//                    order: 'applied'
//                }
//            },
             {
                extend: 'colvis', text: '<i class="la la-eye"></i>'        
            }
        ],
        columnDefs: [
            {orderable: false, targets: -1}         
        ],
//        scrollY:        "100%",
//        scrollX:        true,
        //scrollCollapse: true,        
//        fixedColumns:   {
//            leftColumns: 1
//        }
    });
    table.buttons().container().appendTo('.dataTable_buttons');
    $('.dataTables_filter').find('input').attr('placeholder', 'Search here...');
});
// datatable end 

    
    function openFormLoc(id = ''){
         $.post("<?php echo base_url('admin_get_edit_form_assigned_work_shift'); ?>", {id: id}, function(result){
            //alert(result);
            //console.log(result);
         $(".form-wrapper").html(result);
         $(".form-wrapper").show();
        $('.mydate_range').daterangepicker({           
           locale: {format: jquerydateformat},
           //minDate:'01-01-2020',
           //maxDate:'01-05-2021'
        });
   
         
    });
    }


    function change_status(id) {
        $("#myModal").on('shown.bs.modal', function() {
            $("#modal_confirm").click(function() {
                var url = "<?php echo base_url('admin_status_setting_location'); ?>/" + id;
                $("#pjax-container").load(url,function(response,status){
                    notification(status);
                });
            });

            $("#notification_heading").html("Confirmation");
            $("#notification_body").html("Do you want to change status of this Location?");
        }).modal("show");
    }

     function delete_this(id) {
        $("#myModal").on('shown.bs.modal', function() {
            $("#modal_confirm").click(function() {
               var url = "<?php echo base_url('admin_delete_assigned_work_shift'); ?>/" + id;
                $("#pjax-container").load(url,function(response,status){       
                    notification(status);
                });
            });

            $("#notification_heading").html("Confirmation");
            $("#notification_body").html("Do you want to Delete this Employee from this Workshift?");
        }).modal("show");
    }

    function checkOfficeLocation(Location) {
      $.post("<?php echo base_url('admin_check_org_location'); ?>", {'location': Location}, function(result){
            //console.log(result);
         $(".location_type_err").html(result);
      });
    }


    function openworkshift() {
        var month = $("#month_id option:selected").val();
        var year = $("#year_id option:selected").val();
        var d = new Date(),
                n = d.getMonth() + 1,
                y = d.getFullYear();

        $.post("<?php echo base_url('admin_employee_worksheet'); ?>", {'month': month, 'year': year}, function (result) {
            //console.log(result);
            $("#new_table_search").html(result);
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
        bSort: false,
        bInfo: true,
        bAutoWidth: true,        
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
//            {
//                extend: 'pdfHtml5', text: '<i class="la la-file-pdf"></i>',
//                exportOptions: {
//                    columns: ':visible',
//                    search: 'applied',
//                    order: 'applied'
//                }
//            },
//            {
//                extend: 'print', text: '<i class="la la-print"></i>',
//                exportOptions: {
//                    columns: ':visible',
//                    search: 'applied',
//                    order: 'applied'
//                }
//            },
             {
                extend: 'colvis', text: '<i class="la la-eye"></i>'        
            }
        ],
        columnDefs: [
            {orderable: false, targets: -1}         
        ],
//        scrollY:        "100%",
//        scrollX:        true,
        //scrollCollapse: true,        
//        fixedColumns:   {
//            leftColumns: 1
//        }
    });
    table.buttons().container().appendTo('.dataTable_buttons');
    $('.dataTables_filter').find('input').attr('placeholder', 'Search here...');
});
            // console.log('month--'+month);
            // console.log('month--**'+n);
            if (month != '') {
                $("#month_id").val(month);
            } else {
                $("#month_id").val(n);
            }

            if (year != '') {
                $("#year_id").val(year);
            } else {
                $("#year_id").val(y);
            }
			$('#searchmodal').modal('hide');

        });
    }

$(".closeSearch").click(function(){
        $('.drop_search').slideToggle();
    });
        
</script>

