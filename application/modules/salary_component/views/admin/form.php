<form class="closeForm" onsubmit="return myFunction('salary_component_form')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_salary_component').'/'.$id : base_url('admin_add_salary_component'); ?>" name="salary_component_form" id="salary_component_form" enctype="multipart/form-data" >
<div class="row">
    <div class="col-sm-6 col-xl-3">
        <div class="form-group">
            <label>Component</label>
            <input onkeyup="checkcomponent('<?php echo (isset($data_single->id) ? $data_single->id : ''); ?>');" required type="text" class="form-control" name="component" id="components" value="<?php echo (isset($data_single->component) ? $data_single->component : ''); ?>">
             <span style="color: red;" id="component_err"></span>
        </div>
    </div>   

        <div class="col-sm-6 col-xl-3">
        <div class="form-group">
            <label>Type</label>          
            <select class="form-control"  name="type" required id="type" onchange="gettype();">
                <option value="Earning" <?php echo ((isset($data_single->type) && ($data_single->type=='Earning')) ? 'selected' : ''); ?>>Earning</option>
                <option value="Deduction" <?php echo ((isset($data_single->type) && ($data_single->type=='Deduction')) ? 'selected' : ''); ?>>Deduction</option> 
                 <option value="Incentive" <?php echo ((isset($data_single->type) && ($data_single->type=='Incentive')) ? 'selected' : ''); ?>>Incentive</option>  
                  <option value="Reimbursement" <?php echo ((isset($data_single->type) && ($data_single->type=='Reimbursement')) ? 'selected' : ''); ?>>Reimbursement</option>                               
              </select>
        </div>        
    </div>        
        <div class="col-sm-6 col-xl-3">
        <div class="form-group">
            <label>Mode</label>
            <select class="form-control"  required name="mode">
                <option value="Monthly" <?php echo ((isset($data_single->mode) && ($data_single->mode=='Monthly')) ? 'selected' : ''); ?>>Monthly</option>
                <option value="Quarterly" <?php echo ((isset($data_single->mode) && ($data_single->mode=='Quarterly')) ? 'selected' : ''); ?>>Quarterly</option>
                <option value="Half Yearly" <?php echo ((isset($data_single->mode) && ($data_single->mode=='Half Yearly')) ? 'selected' : ''); ?>>Half Yearly</option>
                <option value="Annual" <?php echo ((isset($data_single->mode) && ($data_single->mode=='Annual')) ? 'selected' : ''); ?>>Annual</option>
                <option value="Adhoc" <?php echo ((isset($data_single->mode) && ($data_single->mode=='Adhoc')) ? 'selected' : ''); ?>>Adhoc</option>
              </select>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="form-group">
            <label>Sequence</label>
            <select class="form-control" required  name="sequence">
			<option value="">Select</option>
              <?php for($i=1;$i<=50;$i++){?>
                <option value="<?=$i?>" <?php echo ((isset($data_single->sequence) && ($data_single->sequence==$i)) ? 'selected' : ''); ?>><?=$i?></option>
              <?php } ?>
              </select>
        </div>
    </div>
        
        <div class="col-sm-6 col-xl-3">
        <div class="form-group">
            <label>Fixed</label>
            <br>
            <label class="switch">
              <input type="checkbox" name="fixed" onchange="getvall('fixed');" <?php echo ((isset($data_single->fixed) && ($data_single->fixed=='Yes')) ? 'checked' : ''); ?>>
              <span class="slider round"></span>
            </label>
            <span id="check_fixed"><?php echo ((isset($data_single->fixed) && ($data_single->fixed=='Yes')) ? 'Yes' : 'No'); ?></span> 
        </div>
    </div>
    
         <div class="col-sm-6 col-xl-3">
        <div class="form-group">
            <label>PF</label>
            <br>
            <label class="switch">
              <input type="checkbox" name="pf" onchange="getvall('pf');" <?php echo ((isset($data_single->pf) && ($data_single->pf=='Yes')) ? 'checked' : ''); ?>>
              <span class="slider round"></span>
            </label>
            <span id="check_pf"><?php echo ((isset($data_single->pf) && ($data_single->pf=='Yes')) ? 'Yes' : 'No'); ?></span> 
        </div>
    </div>

      <div class="col-sm-6 col-xl-3">
        <div class="form-group">
            <label>ESI</label>
            <br>
            <label class="switch">
              <input type="checkbox" name="esi" onchange="getvall('esi');" <?php echo ((isset($data_single->esi) && ($data_single->esi=='Yes')) ? 'checked' : ''); ?>>
              <span class="slider round"></span>
            </label>
            <span id="check_esi"><?php echo ((isset($data_single->esi) && ($data_single->esi=='Yes')) ? 'Yes' : 'No'); ?></span> 
        </div>
    </div>

      <div class="col-sm-6 col-xl-3" id="formula" <?php if(isset($data_single->type) && ($data_single->type=='Incentive' || $data_single->type=='Reimbursement')){ echo 'style=""'; }else { echo 'style="display: none;"'; } ?>>
        <div class="form-group">
            <label>Set Formula</label>
            <br>
            <label class="switch">
              <input type="checkbox" name="set_formula" id="set_formula" onchange="getvall('set_formula');" <?php echo ((isset($data_single->set_formula) && ($data_single->set_formula=='Yes')) ? 'checked' : ''); ?>>
              <span class="slider round"></span>
            </label>
            <span id="check_set_formula"><?php echo ((isset($data_single->set_formula) && ($data_single->set_formula=='Yes')) ? 'Yes' : 'No'); ?></span> 
        </div>
    </div>

  
    <div class="col-12 setformula" <?php if(isset($data_single->set_formula) && ($data_single->set_formula=='Yes')){ echo 'style=""'; }else { echo 'style="display: none;"'; } ?>>
    <div class="card panel panel-table mb-3" data-dashboard-widget>
    <div class="card-block" data-widget-content>
    <table class="table table-bordered" width="100%">
    <thead>      
    <tr>
        <th width="60%">Component</th>
        <th>Operator</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>
                <select onchange="fortype(this.value)" id="component" name="componentformula[]" class="form-control addcomp">
                    <option>Select</option>
                     <option value="gross_amount" <?php if(isset($data_single_formula->component) && ($data_single_formula->component=='gross_amount')){ echo 'selected'; }?>>Gross Amount</option>
                    <?php
                  if (!empty($all_component)) {
                    foreach ($all_component as $component) {
                      if(isset($data_single_formula->component) && ($data_single_formula->component!='gross_amount')){
                        $component_arr = explode(',', $data_single_formula->component);
                        //echo $component_arr[0] ; die;
                      }
                        if($component->id=='3')
                        {

                  ?>
                  <option value="<?php echo $component->id; ?>" <?php echo ((isset($data_single->component) && !empty($component_arr[0]) && ($component->id==$component_arr[0])) ? 'selected' : ''); ?>><?php echo $component->component; ?></option>
                    <?php } } } ?>
                </select>            
          </td>
       
         <td> <?php if(isset($data_single_formula->component) && ($data_single_formula->component !='gross_amount')){
             $operator_arr = explode(',', $data_single_formula->operator);
                        //echo $component_arr[0] ; die;
                      ?>
            <select id="operator" name="operator[]" class="form-control addoperator" onclick="add_component_operator();">
              <option>Select</option>
              <option value="+" <?php echo ((isset($data_single_formula->operator) && !empty($operator_arr[0]) && ('+'==$operator_arr[0])) ? 'selected' : ''); ?>>+</option>
              <option value="-" <?php echo ((isset($data_single_formula->operator) && !empty($operator_arr[0]) && ('-'==$operator_arr[0])) ? 'selected' : ''); ?>>-</option>
              <option value="*" <?php echo ((isset($data_single_formula->operator) && !empty($operator_arr[0]) && ('*'==$operator_arr[0])) ? 'selected' : ''); ?>>*</option>
              <option value="/" <?php echo ((isset($data_single_formula->operator) && !empty($operator_arr[0]) && ('/'==$operator_arr[0])) ? 'selected' : ''); ?>>/</option>
            </select>
          <?php }else{ ?>
            <select id="operator" name="operator[]" class="form-control addoperator" onclick="add_component_operator();">
              <option>Select</option>
              <option value="+" >+</option>
              <option value="-">-</option>
              <option value="*" >*</option>
              <option value="/">/</option>
            </select>
          <?php } ?>
          </td>
    </tr>
<?php if(!empty($component_arr) && !empty($operator_arr)){
 for($i=1;$i<count($component_arr);$i++){
  ?>
    <tr>
        <td>
                <select onchange="fortype(this.value)" id="component" name="componentformula[]" class="form-control addcomp">
                    <option>Select</option>
                    
                    <?php
                  if (!empty($all_component)) {
                    foreach ($all_component as $component) {
                      
                  ?>
                  <option value="<?php echo $component->id; ?>" <?php echo ((isset($data_single->component) && ($component->id==$component_arr[$i])) ? 'selected' : ''); ?>><?php echo $component->component; ?></option>
                    <?php  } } ?>
                </select>            
          </td>
       
         <td> <?php if(isset($data_single_formula->component) && ($data_single_formula->component !='gross_amount')){
            
                        //echo $component_arr[0] ; die;
                      ?>
            <select id="operator" name="operator[]" class="form-control addoperator" onclick="add_component_operator();">
              <option>Select</option>
              <option value="+" <?php echo ((isset($data_single_formula->operator) && ('+'==$operator_arr[$i])) ? 'selected' : ''); ?>>+</option>
              <option value="-" <?php echo ((isset($data_single_formula->operator) && ('-'==$operator_arr[$i])) ? 'selected' : ''); ?>>-</option>
              <option value="*" <?php echo ((isset($data_single_formula->operator) && ('*'==$operator_arr[$i])) ? 'selected' : ''); ?>>*</option>
              <option value="/" <?php echo ((isset($data_single_formula->operator) && ('/'==$operator_arr[$i])) ? 'selected' : ''); ?>>/</option>
            </select>
          <?php } ?>
          </td>
    </tr>
    <?php }} ?>

   
  </tbody>
  <tbody class="repeat_sal_component"></tbody>  
</table>        
</div>
</div>
</div>
<div class="col-xl-12 setformula" <?php if(isset($data_single_formula->component) && ($data_single_formula->component!='gross_amount')){ echo 'style=""'; }else{ echo 'style="display: none;"';} ?>>
    <input type="hidden" name="experience_div" id="experience_div" value="<?php echo ((isset($data_single_exp) && (count($data_single_exp)) > 0) ? count($data_single_exp) : '1'); ?>">
    <input type="hidden" name="experience_div_type" id="experience_div_type" value="<?php echo ((isset($data_single_exp) && (count($data_single_exp)) > 0) ? count($data_single_exp) : '0'); ?>">
    <label id="addclone"><a href="javascript:void(0)" class="btn btn-secondary" onclick="get_div_experience();">Add</a></label>
    <input type="hidden" name="add_component" id="add_component">
</div>


    <div class="col-sm-6 col-xl-4 setformula" <?php if(isset($data_single_formula->component) && ($data_single_formula->component!='')){ echo 'style=""'; }else{ echo 'style="display: none;"';} ?>>
        <div class="form-group">
            <label>Days</label>
            <select id="days_type" name="days_type" class="form-control" onchange="get_days_type(this.value);">
              <option>Select</option>
              <option value="No of OverTime Days" <?php if(isset($data_single_formula->day_type) && ($data_single_formula->day_type=='No of OverTime Days')){ echo 'selected'; }?>>No of OverTime Days</option>
              <option value="No of Days"  <?php if(isset($data_single_formula->day_type) && ($data_single_formula->day_type=='No of Days')){ echo 'selected'; }?>>No of Days</option>
              <option value="No of Holidays" <?php if(isset($data_single_formula->day_type) && ($data_single_formula->day_type=='No of Holidays')){ echo 'selected'; }?>>No of Holidays</option>
            </select>
        </div>
    </div>
    <div class="col-sm-6 col-xl-4 setformula" <?php if(isset($data_single_formula->component) && ($data_single_formula->component!='')){ echo 'style=""'; }else{ echo 'style="display: none;"';} ?>>
        <div class="form-group">
            <label>Type of Day</label>
            <select id="days_type_1" name="days_type_1" class="form-control" onchange="get_days_type_1(this.value);">
              <option>Select</option>
              <option value="No of OverTime Days" <?php if(isset($data_single_formula->day_type_1) && ($data_single_formula->day_type_1=='No of OverTime Days')){ echo 'selected'; }?>>No of OverTime Days</option>
              <option value="No of Days" <?php if(isset($data_single_formula->day_type_1) && ($data_single_formula->day_type_1=='No of Days')){ echo 'selected'; }?>>No of Days</option>
              <option value="No of Holidays" <?php if(isset($data_single_formula->day_type_1) && ($data_single_formula->day_type_1=='No of Holidays')){ echo 'selected'; }?>>No of Holidays</option>
            </select>
        </div>
    </div>
     <div class="col-sm-6 col-xl-4 setformula" <?php if(isset($data_single_formula->component) && ($data_single_formula->component!='gross_amount')){ echo 'style=""'; }else{ echo 'style="display: none;"';} ?>>
        <div class="form-group" id="fixedAmount">
            <label>Fixed Amount</label>
            <input type="text" name="fixed_amount" id="fixed_amount" class="form-control" value="<?php if(isset($data_single_formula->fixed_amount)){ echo $data_single_formula->fixed_amount; }?>" onkeyup="add_component_operator();">
        </div>
    </div>

<div class="col-md-12 setformula" id="formulashow" style="display: none; color: red;">
  <span>Formula: </span><span id="component_formula"></span>/<span id="daystype_formula"></span>*<span id="daystype_formula_1"></span>
</div>
    
    <div class="col-md-12">
        <div class="form-group form-buttons">
            <input type="hidden" name="taxable1" value="<?php echo ((isset($data_single->taxable) && ($data_single->taxable=='Yes')) ? 'Yes' : 'No'); ?>">
              <input type="hidden" name="fixed1" value="<?php echo ((isset($data_single->fixed) && ($data_single->fixed=='Yes')) ? 'Yes' : 'No'); ?>">
              <input type="hidden" name="pf1" value="<?php echo ((isset($data_single->pf) && ($data_single->pf=='Yes')) ? 'Yes' : 'No'); ?>">
               <input type="hidden" name="esi1" value="<?php echo ((isset($data_single->esi) && ($data_single->esi=='Yes')) ? 'Yes' : 'No'); ?>">
               <input type="hidden" name="set_formula1" value="<?php echo ((isset($data_single->set_formula) && ($data_single->set_formula=='Yes')) ? 'Yes' : 'No'); ?>">
         <button type="submit" name="submit" class="btn btn-success" id="save">Save</button>
             <a href="javascript:;" class="btn btn-secondary" onclick="btnCloseForm();">Close</a>
    </div>
    </div>
</div>

</form>


<script>
  $(document).ready(function(){
    <?php if(isset($id) && $id != ''){ 
      if((isset($data_single->set_formula) && ($data_single->set_formula=='Yes'))){ ?>
    $('#formulashow').show();
 add_component_operator();
<?php } } ?>
});
  function fortype(id) {
      if(id != 'gross_amount'){
       /// alert('sanchari');
        //$('#operator').show();
        $('.addoperator').show();
        $('#fixedAmount').show();
         $('#addclone').show();
        var experience_div = $("#experience_div_type").val();
       
       
        var div_id = (parseInt(experience_div) + 1 );
             // alert(div_id);
               $.post("<?php echo base_url('get_component_type_to_set_formula'); ?>", {id: id}, function(result){   
                   //alert(result);
                 
                  var type=result.split(',');
              $('#component_type_new'+div_id).html(type[0]+','+type[1]);
             
                   
                });
             }else{
              $('#operator').hide();
              $('#fixedAmount').hide();
              $('#addclone').hide();
              $('#component_formula').text('Gross');
             }
           

    }

    function add_component_operator(){
      var components = [];
      $('.addcomp').each(function(index, value) {
      components.push($(this).find("option:selected").text())

      });
      var operators = [];
      $('.addoperator').each(function(index, value) {
      operators.push($(this).val())

      });
      //alert(operators);
      var fixed_amount = $('#fixed_amount').val();

      var days_type = $('#days_type').val();
      var days_type_1 = $('#days_type_1').val();

      $.post("<?php echo base_url('component_operator'); ?>", {components:components,operators:operators}, function(result){   
                 //alert(result);
                 $('#component_formula').text(result+fixed_amount);
                $('#daystype_formula_1').text(days_type_1);
                $('#daystype_formula').text(days_type);
                });
    }

    function get_div_experience() {
     
    var experience_div = $("#experience_div").val();
   var div_id = (parseInt(experience_div) + 1 );
    var div_id_new = (parseInt(experience_div));
        var dropDown = $("#component"+experience_div).val();


        //alert(componentsarr);
       
var myList = [];

$('.sel').each(function() {
    
    myList.push($(this).val())
});

                  var component_type_new = $("#component_type_new"+div_id_new).html();
               
                   if(component_type_new!='') 
                   {
                   
var experience_div_type = $("#experience_div_type").val();
   
      var div_id_type = (parseInt(experience_div_type) + 1 );
    
          
$.post("<?php echo base_url('div_colon_set_formula'); ?>", {id: div_id,value: myList}, function(result){   
                 //alert(result);


                $(".repeat_sal_component").append(result);
      $("#experience_div").val(div_id);
      $("#experience_div_type").val(div_id_type);
      // $("#duration_start_exp_"+div_id).flatpickr();
      // $("#duration_end_exp_"+div_id).flatpickr();       
                });
        
        }
        
        else{
        alert('Please choose component then add more.');
        
        }
     
    }

    function get_days_type(val){
      $('#daystype_formula').text(val);
    }

    function get_days_type_1(val){
      $('#daystype_formula_1').text(val);
    }

    function gettype(){
      var type = $('#type').val();
      if(type == 'Incentive' || type == 'Reimbursement'){
        $('#formula').show();
      }else{
         $('#formula').hide();
         $('#formulashow').hide();
         $('.setformula').hide();
         $("#set_formula").val('No');
         $("input[name=set_formula1]").val('No');
         $("#check_set_formula").html('No');
      }
    }


    
     function checkcomponent(id){
        var components = $("#components").val().trim();
        //alert(rf_no);
        $("#component_err").html('');
        $("#save").prop( "disabled", false );
        if(components!=''){
        $.post("<?php echo base_url('check_component'); ?>", {'components': components,'id':id}, function(result){
            //console.log(result);
            if(result!='done'){
              $("#component_err").html(result);
              $("#save").prop( "disabled", true );
            }
         
         
        });
        }
        }
</script>
