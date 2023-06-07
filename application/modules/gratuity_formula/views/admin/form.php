<form class="closeForm" onsubmit="return myFunction('gratuity_formula_form')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_gratuity_formula').'/'.$id : base_url('admin_add_gratuity_formula'); ?>" name="gratuity_formula_form" id="gratuity_formula_form" enctype="multipart/form-data" >
    <div class="row" >
    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Type</label>
                 <select required id="type" name="type" class="form-control" onchange="getOtFormulaGratuity();">
                    <option>Select</option>
                  <option value="Resignation" <?php echo ((isset($data_single->type) && ($data_single->type=='Resignation')) ? 'selected' : ''); ?>>Resignation</option>
                  <option value="Termination" <?php echo ((isset($data_single->type) && ($data_single->type=='Termination')) ? 'selected' : ''); ?>>Termination</option>
                  <option value="Other" <?php echo ((isset($data_single->type) && ($data_single->type=='Other')) ? 'selected' : ''); ?>>Other</option>                  
                </select>         

        </div>
    </div>

    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Based On</label>
                 <select id="based_on" name="based_on" class="form-control" onchange="getOtFormulaGratuity();">
                    <!--<option>Select</option>-->
                    <!--<option value="CTC" <?php echo ((isset($data_single->based_on) && ($data_single->based_on=='CTC')) ? 'selected' : ''); ?>>CTC</option>-->
                  <option value="Basic Salary" <?php echo ((isset($data_single->based_on) && ($data_single->based_on=='Basic Salary')) ? 'selected' : ''); ?>>Basic Salary</option>                  
                </select>         

        </div>
    </div>

     <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Based On</label>
                 <select id="based_on_1" name="based_on_1" class="form-control" onchange="getOtFormulaGratuity();">
                    <!--<option>Select</option>-->
                    <!--<option value="CTC" <?php echo ((isset($data_single->based_on) && ($data_single->based_on=='CTC')) ? 'selected' : ''); ?>>CTC</option>-->
                  <option value="DA" <?php echo ((isset($data_single->based_on_1) && ($data_single->based_on_1=='DA')) ? 'selected' : ''); ?>>DA</option>                  
                </select>         

        </div>
    </div>

    <div style="display:none;" class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Operator</label>
                 <select  id="operator" name="operator" class="form-control" onchange="getOtFormulaGratuity();">
                    <option>Select</option>
                    <option value="*" selected >*</option>
<!--                    <option value="<" <?php echo ((isset($data_single->operator) && ($data_single->operator=='<')) ? 'selected' : ''); ?>><</option>
                  <option value=">=" <?php echo ((isset($data_single->operator) && ($data_single->operator=='>=')) ? 'selected' : ''); ?>>>=</option>    
                  <option value="<" <?php echo ((isset($data_single->operator) && ($data_single->operator=='<')) ? 'selected' : ''); ?>><</option>   
                  <option value="<=" <?php echo ((isset($data_single->operator) && ($data_single->operator=='<=')) ? 'selected' : ''); ?>><=</option>-->
                </select>         

        </div>
    </div>


   <!-- <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>No. of Days</label>
            <input onkeyup="numeric(this),getOtFormulaGratuity();" type="text" class="form-control" name="day" id="day" value="<?php echo (isset($data_single->day) ? $data_single->day : ''); ?>">
        </div>
    </div>-->

    <!--<div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Tenure of service completed in the company</label>
            <input onkeyup="numeric(this),getOtFormulaGratuity();" type="text" class="form-control" name="no_of_year" id="no_of_year"  value="<?php echo (isset($data_single->no_of_year) ? $data_single->no_of_year : ''); ?>">
        </div>
    </div>-->
      <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>No of years</label>
                 <select name="no_of_year" id="no_of_year" class="form-control" onchange="getOtFormulaGratuity();">
                    <!--<option>Select</option>-->
                    <!--<option value="CTC" <?php echo ((isset($data_single->based_on) && ($data_single->based_on=='CTC')) ? 'selected' : ''); ?>>CTC</option>-->
                  <option value="Tenure of service completed in the company" <?php echo ((isset($data_single->no_of_year) && ($data_single->no_of_year=='DA')) ? 'selected' : ''); ?>>Tenure of service completed in the company</option>                  
                </select>         

        </div>
    </div>
    <div class="col-sm-6 col-xl-8 align-self-center">
        <div class="form-group mb-3 mb-xl-0">
          <span style="font-size: 15px;" class="text-warning">
          Gratuity = <span id="year_id"><?php echo (isset($data_single->no_of_year) ? $data_single->no_of_year : ''); ?></span> <span id="operator_id"><?php echo (isset($data_single->operator) ? $data_single->operator : ''); ?></span> (<span id="based_on_id"><?php echo (isset($data_single->based_on) ? $data_single->based_on : ''); ?></span><span id="add_id"><?php echo (isset($data_single->operator_1) ? $data_single->operator_1 : ''); ?></span><span id="based_on_id_1"><?php echo (isset($data_single->based_on_1) ? $data_single->based_on_1 : ''); ?></span>) <span id="operator_id_1"><?php echo (isset($data_single->operator) ? $data_single->operator : ''); ?></span> <span>15/26</span>
          </span>
        </div>
    </div>
    

   
        </div>

   
<div class="row">
    <div class="col-md-12">
        <div class="form-group form-buttons">
             <button type="submit" name="submit" class="btn btn-success">Save</button>
             <a href="javascript:;" class="btn btn-secondary" onclick="btnCloseForm();">Close</a>
        </div>
    </div>
</div>
    

</form>
