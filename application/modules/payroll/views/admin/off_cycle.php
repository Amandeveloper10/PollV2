<?php $SysConfigauthenticaton = checkConfig1();?>
<div class="ks-page-header">
    <section class="ks-title">
        <h3>Off Cycle Payroll for <?=date('F', strtotime(date('Y-m-d'))).' - '.date('Y', strtotime(date('Y-m-d')))?></h3>
		 <div class="ks-controls">
                 
            <!--<a href="javascript:;" class="btn btn-icon btn-light btn_maximize"><i class="far fa-window-maximize"></i></a>-->
        </div>
    </section>
</div>
 <div class="ks-page-content">
    <div class="ks-page-content-body h-100">
        <div class="container-fluid">        
            <div class="content-wrapper">
                <div class="custom-tab payrolltab">
                    <ul class="nav nav-pills">           
                         <li class="nav-item"><a class="nav-link hide" data-toggle="pill" onclick="get_pay_deduction();"> Pay / Deduction </a></li>

                        <li class="nav-item"><a class="nav-link hide" data-toggle="pill" onclick="get_off_cycle_details();"> Transaction </a></li>
                    </ul>
                </div>                
                <div class="tab-content pay_roll_container">
                    <div class="tab-pane fade active show" style="overflow: hidden;" id="tab_All" role="tabpanel" aria-expanded="false">
                    </div>                   
                </div>
				
               
            </div>
        </div>
    </div>
</div>

<!-- [end] Notification DIV -->

<div style="border:1px solid #000;" class="modal" id="salaryslipmodal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
          <div class="row" style="width:calc(100% + 30px)">
              <div class="col-6"><h4 class="modal-title" id="heading_salary">Salary Slip</h4></div>
              
              <div class="col-6 text-right">
			  <!--<button onclick="download();" id="salary_slip_button"  class="btn btn-danger ">Download</button>-->
                  <input type="hidden" name="employee_id_salary" id="employee_id_salary" value="" />
               
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          </div>
      </div>

      <!-- Modal body -->
      <div class="modal-body">          
        <div class="salaryslipmodal">
            
             
      </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
  </div>


<script>    

//attendance
function get_pay_deduction(){
$.post("<?php echo base_url('admin_get_form_off_cycle'); ?>", {}, function (result) {
$('#tab_All').html(result);
});
}

function get_off_cycle_details(){
$.post("<?php echo base_url('off_cycle_details/1'); ?>", {}, function (result) {
$('#tab_All').html(result);
});
}

$( document ).ready(function() {
    get_pay_deduction();
});
</script>