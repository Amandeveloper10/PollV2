<?php $SysConfig = checkConfig();
//echo "<pre>"; print_r($SysConfig); die;
 ?>
 <style>
/*    .repeat_sal_component .row,.row{margin-bottom: 0 !important; margin-top: 0 !important; padding-top: 10px}
    .repeat_sal_component .row{border-top: 1px solid #e5e5e5;}
    .repeat_sal_component .row .row{border-top: 0; margin-bottom: 0 !important; margin-top: 0 !important}*/
</style>

<form onsubmit="return myFunction('salary_structure_form')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_salary_structure').'/'.$id : base_url('admin_add_salary_structure'); ?>" name="salary_structure_form" id="salary_structure_form" enctype="multipart/form-data" >
    <div class="row">
    <div class="col-sm-6 col-xl-3">
        <div class="form-group">
            <label>Salary Structure for</label>
            <input required type="text" class="form-control" name="structure_name" value="<?php echo (isset($data_single->structure_name) ? $data_single->structure_name : ''); ?>">
        </div>
    </div>

     <div class="col-sm-6 col-xl-3">
        <div class="form-group">
            <label>Grade</label>
            <select class="form-control"  name="grade_id" required>
                <option value="">Select</option>
                  <?php
                  if (!empty($all_grade)) {
                    foreach ($all_grade as $grade) {
                  ?>
                  <option value="<?php echo $grade->id; ?>" <?php echo ((isset($data_single->grade_id) && ($data_single->grade_id==$grade->id)) ? 'selected' : ''); ?>><?php echo $grade->grade_name; ?></option>
                  <?php } } ?>     
              </select>

        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="form-group">
            <label>Department</label>
            <select class="form-control"  name="dept_id" required>
                <option value="">Select</option>
                  <?php
                  if (!empty($all_dept)) {
                    foreach ($all_dept as $department) {
                  ?>
                  <option value="<?php echo $department->id; ?>" <?php echo ((isset($data_single->dept_id) && ($data_single->dept_id==$department->id)) ? 'selected' : ''); ?>><?php echo $department->department_name; ?></option>
                  <?php } } ?>
              </select>

        </div>
    </div>
<div class="col-sm-6 col-xl-3">
        <div class="form-group">
            <label style="color:green;">Example CTC</label>
            <input  type="text" class="form-control" onblur="blank_percentage();" name="ctc_amount" id="ctc_amount" value="500000">
        </div>
    </div>
</div>
    <!--2ndRow-->
    <div class="row">
        <div class="col-xl-2">
            <label>Component</label>
        </div>
        <div class="col-xl-2">
            <label>Type & Mode</label>
        </div>
        <div class="col-xl-6">
            <div class="row">
                <div class="col-xl-3">
            <label>Formula</label>
        </div>
        <div class="col-xl-3">
            <label>Oparetor</label>
        </div>
        <div class="col-xl-3">
            <label>Percentage</label>
        </div>  
            </div>
            
        </div>
              
        <div class="col-xl-2 text-right">
            <input type="hidden" name="experience_div" id="experience_div" value="<?php echo ((isset($data_single_exp) && (count($data_single_exp)) > 0) ? count($data_single_exp) : '1'); ?>">
            <input type="hidden" name="experience_div_type" id="experience_div_type" value="<?php echo ((isset($data_single_exp) && (count($data_single_exp)) > 0) ? count($data_single_exp) : '0'); ?>">
            <label><a href="javascript:void(0)" class="text-primary" onclick="get_div_experience();">Add</a></label>
        </div>    
    </div>
    
    
   <!--3rdRow--> 
   <?php
if(!empty($data_single))
{
    $this->load->model('admin/SalaryStruModel');
    $detail= $this->SalaryStruModel->salary_formula($data_single->id);
    //echo '<pre>'; print_r($detail);exit;
    if(!empty($detail))
    {
        $i=1;
    foreach ($detail as $key => $details) {
$new_amount=0;
if($details->component_id=='3'){
    
    $new_amount=((500000*$details->amount)/100);
}
    
?>
   <div class="row 2" id="exp_<?php echo @$details->id;?>">
        <div class="col-xl-2">
            <div class="form-group">
                <select onchange="fortype(this.value)" data-id="<?php echo @$details->id;?>" id="component<?php echo @$details->id;?>" name="component[]" class="form-control component">
                    <option>Select</option>
                    <?php
                  if (!empty($all_component)) {
                    foreach ($all_component as $component) {
                  ?>
                  <option value="<?php echo $component->id; ?>" <?php echo ((isset($details) && ($details->component_id==$component->id)) ? 'selected' : ''); ?>><?php echo $component->component; ?></option>
                  <?php } } ?>
                </select>
            </div>
        </div>
        <div class="col-xl-2">
            <div class="form-group"><label class="checkvalue" id="component_type_new<?php echo ((isset($data_single_exp) && (count($data_single_exp))>0)  ? count($data_single_exp) : '1'); ?>"><?php echo ((isset($details) && (!empty($details->type))) ? $details->type.', '.@$details->mode : ''); ?></label></div>
        </div>
        <div class="col-xl-6">            
                <?php
               // echo $details->fixed_amount;exit;
                if(@$details->fixed_amount <= 0.00)
                { 
                ?>
               
                <div class="row 3">                    
                    <div class="col-3">
                        <select name="base_on[]" id="base_on<?php echo @$details->id;?>" class="form-control">
                            <option value="CTC" <?php echo ((isset($details) && ($details->base_on=='*')) ? 'CTC' : ''); ?>>CTC</option>
                            <option value="Basic Salary" <?php echo ((isset($details) && ($details->base_on=='Basic Salary')) ? 'selected' : ''); ?> >Basic Salary</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <select name="oparetor[]" id="oparetor<?php echo @$details->id;?>" class="form-control">
                            <option value="*" <?php echo ((isset($details) && ($details->operator=='*')) ? 'selected' : ''); ?>  >*</option>
                            <option value="+" <?php echo ((isset($details) && ($details->operator=='+')) ? 'selected' : ''); ?>  >+</option>
                             <option value="-" <?php echo ((isset($details) && ($details->operator=='-')) ? 'selected' : ''); ?>  >-</option>
<!--                            <option value="/" <?php echo ((isset($details) && ($details->operator=='/')) ? 'selected' : ''); ?>  >/</option>-->
                        </select>
                    </div>
                    <div class="col-3">
                        <input type="text" placeholder="%" name="amount[]" onkeyup="numeric(this),salarycalculation_update(this.value,'<?php echo @$details->id;?>');" id="amount<?php echo @$details->id;?>" value="<?php echo ((isset($details) && (!empty($details->amount))) ? $details->amount : ''); ?>" class="form-control text-right">
                    </div>
                    <div class="col-3">
                        <input type="text" placeholder="formula" name="formula"  id="formula<?php echo @$details->id;?>" value="<?php echo @$details->base_on.''.@$details->operator.''.@$details->amount; ?>" class="form-control text-right">
                    </div>                    
                 <input type="hidden" name="total_hidden[]" id="experience_div_type<?php echo @$details->id;?>" value="<?php echo @$new_amount;?>">
                     
             </div>
           <?php
                }
                else{
                ?>
            <div class="row">
                  <div class="col-3  text-right">
                    <input type="text" placeholder="%" name="fixed_amount[]" onkeyup="numeric(this),salarycalculation_new(this.value,'<?php echo @$details->id;?>');" id="fixed_amount<?php echo @$details->id;?>" value="<?php echo ((isset($details) && (!empty($details->fixed_amount))) ? $details->fixed_amount : '0.00'); ?>" class="form-control">                   
                </div>
                 </div>
                <?php
                }
                ?>

                    
                     
                     
            
        </div>
       
       <div  class="col-xl-1 text-right"><span class="total_amount" id="basic_amount<?php echo @$details->id;?>"></span></div>
       
        <div class="col-xl-1 text-right">
         <button type="button" style="float: right;" name="delete" class="btn btn-danger"><span onclick="deleteDivajax('exp','<?php echo @$details->id;?>');" title="Delete" class="ks-icon la la-trash" aria-hidden="false" ></span></button>
        </div>
    </div>
   <?php
   $i++;
    }
}
   }
   else{
   ?>
   <div class="row 4" id="exp_">
       
        <div class="col-xl-2">
            <div class="form-group">
                <select onchange="fortype(this.value)" id="component" name="component[]" class="form-control">
                    <option>Select</option>
                    <?php
                  if (!empty($all_component)) {
                    foreach ($all_component as $component) {
                        if($component->id=='3')
                        {
                  ?>
                  <option value="<?php echo $component->id; ?>" <?php echo ((isset($data_single->dept_id) && ($data_single->dept_id==$component->id)) ? 'selected' : ''); ?>><?php echo $component->component; ?></option>
                    <?php } } } ?>
                </select>
            </div>
        </div>
        <div class="col-xl-2">
            <div class="form-group"><label class="checkvalue" id="component_type_new<?php echo ((isset($data_single_exp) && (count($data_single_exp))>0)  ? count($data_single_exp) : '1'); ?>"></label></div>
        </div>
        <div class="col-xl-6">            
                <div class="row">                    
                    <div class="col-3">
                      <select name="base_on[]" id="base_on" class="form-control">
                            <option value="CTC">CTC</option>
<!--                            <option value="Basic Salary" >Basic Salary</option>-->
                        </select>
                    </div>
                    <div class="col-3">
                        <select name="oparetor[]" id="oparetor" class="form-control">
                            <option value="*">*</option>
<!--                            <option value="+">+</option>
                             <option value="-">-</option>-->
<!--                            <option value="/">/</option>-->
                        </select></div>
                    <div class="col-3">
                        <input placeholder="%" type="text" name="amount[]" onkeyup="numeric(this),salarycalculation(this.value);" id="amount" class="form-control text-right amount">
                    </div>
                     <div class="col-3">
                         <input type="text" placeholder="formula" readonly name="formula"  id="formula" value="" class="form-control text-right">
                    </div>
                    
                </div>
            </div>   
    
           <div  class="col-xl-1 text-right"><strong class="total_amount" id="basic_amount"> </strong></div>
     
        <div class="col-xl-1 text-right">             
            <!--no button, prevent first item to delete-->
        </div>
    </div>
   
  
   
   
   <?php
   }
   ?>
   <!--Appending here-->
   <div class="repeat_sal_component">
       
   </div>
   
   <!-- <div class="row">
    <div class="text-right col-md-12">Total Amount: <?php echo (isset($SysConfig) && $SysConfig->currency_position=='Left') ? $SysConfig->default_currency_symbol : ''; ?> <strong id="total_calculate_amount">0.00</strong> <?php echo (isset($SysConfig) && $SysConfig->currency_position=='Right') ? $SysConfig->default_currency_symbol : ''; ?> </div>
    </div> -->
<div class="row">
  <div class="col-lg-4 mb-4 mb-lg-0">
    <?php foreach ($pf_data as $value) { ?>
     
     <div class="row">
    
      <div class="col-12">
         <div class="card">
          <div class="card-body" style="background-color: #f2f4f5; padding: 15px 0 5px 15px;">
            <label><strong>PF</strong></label>
            <input type="checkbox" id="pf_include"  name="pf">
          </div>
        </div>
         </div>
        
      </div>


      <div class="row">   
        <div class="col-xl-12 pf_percent mt-3" style="display: none;">
        <div class="form-group">
            <label>Employer Contribution</label>
            <input type="text" class="form-control" id="Employer_pf" name="Employer_pf" value="<?php echo (isset($value->employer_pf_percent) ? $value->employer_pf_percent : ''); ?>" disabled>
            <input type="hidden" class="form-control" id="Employer_pf" name="Employer_pf" value="<?php echo (isset($value->employer_pf_percent) ? $value->employer_pf_percent : ''); ?>">
        </div>
        </div>
        <div class="col-xl-12">
          <div class="form-group"><label class="checkvalue pf_deduction_lable"  style="display: none; padding: 10px;" >Deduction</label>
             <input type="text" class="form-control" style="display: none;" id="employer_deduction" name="employer_deduction"  disabled="">
          </div>
             
        </div>





      </div>

    <div class="row">  
    <div class="col-xl-12 pf_percent" style="display: none;">
        <div class="form-group">
            <label>Employee Contribution</label>
            <input type="text" class="form-control" id="employee_pf" name="employee_pf" value="<?php echo (isset($value->employee_pf_percent) ? $value->employee_pf_percent : ''); ?>" disabled>
             <input type="hidden" class="form-control" id="employee_pf" name="employee_pf" value="<?php echo (isset($value->employee_pf_percent) ? $value->employee_pf_percent : ''); ?>">
        </div>

    </div>
     <div class="col-xl-12">
          <div class="form-group"><label class="checkvalue pf_deduction_lable"  style="display: none; padding: 10px; " >Deduction</label>
            <input type="text" class="form-control" style="display: none;" id="employee_deduction" name="employee_deduction"  disabled="">
          </div>
              
        </div>
   
    </div>


  <?php } ?>
  </div>
  <div class="col-lg-4 mb-4 mb-lg-0">
    <?php foreach ($esi_data as $value) { ?>
     
     <div class="row">
    
     <div class="col-12">
         <div class="card">
          <div class="card-body" style="background-color: #f2f4f5; padding: 15px 0 5px 15px;">
            <label><strong>ESI</strong></label>
            <input type="checkbox" id="esi_include"  name="esi">
          </div>
        </div>
         </div>
        
      </div>


      <div class="row">   
        <div class="col-xl-12 esi_percent mt-3" style="display: none;">
        <div class="form-group">
            <label>Employer Contribution</label>
            <input type="text" class="form-control" id="Employer_esi" name="Employer_esi" value="<?php echo (isset($value->employer_esi_percent) ? $value->employer_esi_percent : ''); ?>" disabled>
            <input type="hidden" class="form-control" id="Employer_esi" name="Employer_esi" value="<?php echo (isset($value->employer_esi_percent) ? $value->employer_esi_percent : ''); ?>">
        </div>
        </div>
        <div class="col-xl-12">
          <div class="form-group"><label class="checkvalue esi_deduction_lable"  style="display: none; padding: 10px;" >Deduction</label>
             <input type="text" class="form-control" style="display: none;" id="employer_esi_deduction" name="employer_esi_deduction"  disabled="">
          </div>
             
        </div>





      </div>

    <div class="row">  
    <div class="col-xl-12 esi_percent" style="display: none;">
        <div class="form-group">
            <label>Employee Contribution</label>
            <input type="text" class="form-control" id="employee_esi" name="employee_esi" value="<?php echo (isset($value->employee_esi_percent) ? $value->employee_esi_percent : ''); ?>" disabled>
             <input type="hidden" class="form-control" id="employee_esi" name="employee_esi" value="<?php echo (isset($value->employee_esi_percent) ? $value->employee_esi_percent : ''); ?>">
        </div>

    </div>
     <div class="col-xl-12">
          <div class="form-group"><label class="checkvalue esi_deduction_lable"  style="display: none; padding: 10px; " >Deduction</label>
            <input type="text" class="form-control" style="display: none;" id="employee_esi_deduction" name="employee_esi_deduction"  disabled="">
          </div>
              
        </div>
   
    </div>


  <?php } ?>
  </div>
  <div class="col-lg-4 mb-4 mb-lg-0">
     <?php foreach ($pf_data as $value) { ?>
     
     <div class="row">
    
        <div class="col-12">
          <div class="card">
          <div class="card-body" style="background-color: #f2f4f5; padding: 15px 0 5px 15px;">
              <label><strong>P tax</strong></label>
              <input type="checkbox"  name="ptax" id="ptax">
          </div>
        </div>
        </div>
        
     </div>


    <div class="row" id="ptax_div" style="display: none;">   
        <div class="col-xl-12 mt-3">
          <div class="form-group">
            <label class="checkvalue" >Select State</label>
              <select name="ptax_state" onchange="ptax_deduction(this.value)" id="ptax_state" class="form-control" >
                 <option value="">Select State</option>  
                 <?php
                 if (isset($all_state)) {
                   foreach ($all_state as $key => $value) {
                    echo "<option value='".$value->state."' >".$value->state."</option>";
                   }
                 }
                  ?>  
              </select>
          </div>
        </div>
        <div class="col-xl-12 ptax_details" style="display: none;" >
          <div class="form-group" >
            <label class="checkvalue " >Ptax NUMBER</label>
            <input type="text" class="form-control" id="ptax_num" name="ptax_num"  disabled="">
          </div>
        </div> 
        <div class="col-xl-12 ptax_details" style="display: none;">
          <div class="form-group" >
            <label class="checkvalue " >Deduction</label>
            <input type="text" class="form-control" id="ptax_amount" name="ptax_amount"  disabled="">
            <input type="hidden" name="ptax_monthly" id="ptax_monthly">
          </div>
        </div>

    </div>


  
  <?php } ?>
  </div>
</div>
    

  




   

    <div class="row">
    <div class="text-right col-md-12">Total Amount: <?php echo (isset($SysConfig) && $SysConfig->currency_position=='Left') ? $SysConfig->default_currency_symbol : ''; ?> <strong id="total_calculate_amount">0.00</strong> <?php echo (isset($SysConfig) && $SysConfig->currency_position=='Right') ? $SysConfig->default_currency_symbol : ''; ?> </div>
    </div>





   
   <div class="row">
    <div class="col-md-12">
            <div class="form-group form-buttons">
                 <button type="submit" name="submit" id="submit" class="btn btn-success">Save</button>
                 <a href="javascript:;" class="btn btn-secondary" onclick="btnCloseForm();">Close</a>
            </div>
    </div>    
   </div>

</form>


<script type="text/javascript">
    $(document).ready(function(){
    	
        $('input[name="pf"]').click(function(){
            if($(this).prop("checked") == true){
                //alert("Checkbox is checked.");
               var total=0;
                //  House_Rent_Allowance=parseFloat($(".House_Rent_Allowance").text());
                
                // console.log(House_Rent_Allowance);
                
                $('.pf_deduction_lable').show();
                $('.pf_percent').show();
                $('input[name="pf"]').val('1');
                $("#employee_deduction").show();
                $("#employer_deduction").show();

                //var total=$("#total_calculate_amount").text();
                 $('.pfYes').each(function() {

                total += parseFloat($(this).text());

                });

                //House_Rent_Allowance=parseFloat($(".House_Rent_Allowance").text());
			    
			    //if(!House_Rent_Allowance){
			      //House_Rent_Allowance=0;
			    //}
			     // var total_without_house_rent=total-House_Rent_Allowance;

            var total_without_house_rent=total;
			      var Employer_pf=$("#Employer_pf").val();

			      var employee_pf=$("#employee_pf").val();

			      var employer_deduction=total_without_house_rent * (Employer_pf/100);

			      var employee_deduction=total_without_house_rent * (employee_pf/100);

			      $("#employer_deduction").val(employer_deduction);
			      $("#employee_deduction").val(employee_deduction);
			      var ptax_deduction=0;
			      if($("#ptax_amount").val()){
			         ptax_deduction=$("#ptax_amount").val();
			      }

			     // $("#total_calculate_amount").text(parseFloat(total) +(parseFloat(employer_deduction)+parseFloat(employee_deduction)+parseFloat(ptax_deduction)));
			     

            }
            else if($(this).prop("checked") == false){
                //alert("Checkbox is unchecked.");
                var total=0;
                $('.pf_deduction_lable').hide();

                $('.pf_percent').hide();
                $('input[name="pf"]').val('0');
               
                 $('.total_amount').each(function() {

                total += parseFloat($(this).text());

                });
                //var total=$("#total_calculate_amount").text();
                var employer_deduction= $("#employer_deduction").val();
			    var employee_deduction=  $("#employee_deduction").val();
			     $("#employee_deduction").hide();
                  $("#employer_deduction").hide();

                   //total =parseFloat(total) +parseFloat(employer_deduction) +parseFloat(employee_deduction);

                //$("#total_calculate_amount").text(total);

            }
        });

         $('input[name="esi"]').click(function(){
            if($(this).prop("checked") == true){
              var total=0;
                //alert("Checkbox is checked.");

                //  House_Rent_Allowance=parseFloat($(".House_Rent_Allowance").text());
                
                // console.log(House_Rent_Allowance);
                
                $('.esi_deduction_lable').show();
                $('.esi_percent').show();
                $('input[name="esi"]').val('1');
                $("#employee_esi_deduction").show();
                $("#employer_esi_deduction").show();
                //var total=$("#total_calculate_amount").text();

                //House_Rent_Allowance=parseFloat($(".House_Rent_Allowance").text());
          
          //if(!House_Rent_Allowance){
           // House_Rent_Allowance=0;
         // }
            //var total_without_house_rent=total-House_Rent_Allowance;
            $('.esiYes').each(function() {

                total += parseFloat($(this).text());

                });
            var total_without_house_rent=total;
            var Employer_esi=$("#Employer_esi").val();

            var employee_esi=$("#employee_esi").val();

            var employer_deduction=total_without_house_rent * (Employer_esi/100);

            var employee_deduction=total_without_house_rent * (employee_esi/100);

            $("#employer_esi_deduction").val(employer_deduction);
            $("#employee_esi_deduction").val(employee_deduction);
            var ptax_deduction=0;
            if($("#ptax_amount").val()){
               ptax_deduction=$("#ptax_amount").val();
            }

            //$("#total_calculate_amount").text(parseFloat(total) +(parseFloat(employer_deduction)+parseFloat(employee_deduction)+parseFloat(ptax_deduction)));
           

            }
            else if($(this).prop("checked") == false){
                //alert("Checkbox is unchecked.");
                var total=0;
                $('.esi_deduction_lable').hide();

                $('.esi_percent').hide();
                $('input[name="esi"]').val('0');
               

                //var total=$("#total_calculate_amount").text();

                 $('.total_amount').each(function() {

                total += parseFloat($(this).text());

                });
                var employer_deduction= $("#employer_esi_deduction").val();
                var employee_deduction=  $("#employee_esi_deduction").val();
           $("#employee_esi_deduction").hide();
                  $("#employer_esi_deduction").hide();

                   //total =parseFloat(total) +parseFloat(employer_deduction) +parseFloat(employee_deduction);

                $("#total_calculate_amount").text(total);

            }
        });

        // $('input[id="pf_modify"]').click(function(){
        //     if($(this).prop("checked") == true){
        //         //alert("Checkbox is checked.");
        //         $('.pf_modify_amount').show();
        //     }
        //     else if($(this).prop("checked") == false){
        //         //alert("Checkbox is unchecked.");
        //         $('.pf_modify_amount').hide();
        //     }
        // });
        // $('input[id="pf_normal"]').click(function(){
        //     if($(this).prop("checked") == true){
        //         //alert("Checkbox is checked.");
        //         $('.pf_modify_amount').hide();
        //     }
        //     else if($(this).prop("checked") == false){
        //         //alert("Checkbox is unchecked.");
        //         $('.pf_modify_amount').show();
        //     }
        // });
         $('input[name="ptax"]').click(function(){
            if($(this).prop("checked") == true){
            	$("#ptax_num").val('');
                 $("#ptax_amount").val('');
                 $('input[name="ptax"]').val('1');
                $("#ptax_div").show();
            }else{
            	ptax_state="";
                 var totalamount=$("#total_calculate_amount").text();
                 if($("#ptax_amount").val()){
                 	// $("#total_calculate_amount").text(parseFloat(totalamount)+parseFloat($("#ptax_amount").val()));
                 }
               $('input[name="ptax"]').val('');
                $("#ptax_div").hide();
                $(".ptax_details").hide();
                 $("#ptax_num").val('');
                 $("#ptax_amount").val('');
            }
        });


    });
</script>
