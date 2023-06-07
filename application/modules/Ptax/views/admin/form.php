<form class="closeForm" onsubmit="return myFunction('p_tax')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_p_tax').'/'.$id : base_url('admin_add_p_tax'); ?>" name="p_tax" id="p_tax" enctype="multipart/form-data" >
<?php  if(isset($data_single->id)){ ?>
<!-- <input type="hidden" class="form-control" name="id"  value="" > --><?php } ?>
<div class="row">
<input type="hidden" name="ptax_id" value="<?php echo (isset($data_single->p_tax_no) ? $data_single->p_tax_no : ''); ?>"/>
<!--  <?php echo '<pre>'; print_r($data_single); ?> -->

   <div class="col-sm-6 col-xl-4">
      <div class="form-group">                              
          <div class="form-group">
                <label for="" class="form-control-label">State</label>
                 <select name="state" required id="state" onchange="checkstate('<?php echo (isset($data_single->id) ? $data_single->id : ''); ?>');" class="form-control js-example-basic-multiple" <?php if(!empty($data_single)){?> disabled <?php } ?>  >
                    <option value="">Please select</option>

                    <?php foreach($state as $value) { ?>
                      

                    <option value="<?php echo $value->name; ?>" <?php echo ((isset($data_single->state) && ($data_single->state== $value->name) ) ? 'selected' : ''); ?>><?php echo $value->name; ?></option>
                    

                  <?php } ?>
                </select> 
                <span style="color: red;" id="state_err"></span>
                <?php if(isset($data_single)){?><input type="hidden" name="state" value="<?php echo $data_single->state ?>"> <?php } ?>
            </div>
      </div>        
  </div>



  <div class="col-sm-6 col-xl-4">
          <div class="form-group"> 
          <label for="" class="form-control-label">Ptax Number</label>                             
              <input placeholder="Ptax Number" type="text" class="form-control" id="p_tax_no"  name="p_tax_no" value="<?php echo (isset($data_single->p_tax_no) ? $data_single->p_tax_no : ''); ?>" required>
          </div>        
      </div>

      <div class="col-sm-6 col-xl-4">
          <div class="form-group"> 
          <label for="" class="form-control-label">Deduction Cycle</label>                             
              <input placeholder="Deduction Cycle" type="text" class="form-control" id="deduction_cycle"  name="deduction_cycle" value="<?php echo (isset($data_single->deduction_cycle) ? $data_single->deduction_cycle : 'Monthly'); ?>" disabled>
          </div>        
      </div>

  </div>

    
  <?php if(empty($data_single)){?>  
<div class="row">
    <div class="col-sm-6 col-xl-4">
          <div class="form-group">  
          <label for="" class="form-control-label">Start Range</label>                            
              <input placeholder="Start Range" type="text" class="form-control" id="amount_from_0"  name="amount_from_0" value="<?php echo (isset($data_single->amount_from) ? $data_single->amount_from : '1'); ?>" readonly>
          </div>

    </div> 


      <div class="col-sm-6 col-xl-4">
          <div class="form-group">  
          <label for="" class="form-control-label">End Range</label>                            
              <input placeholder="End Range" type="text" class="form-control" id="amount_to_0"  name="amount_to_0" value="<?php echo (isset($data_single->amount_to) ? $data_single->amount_to : '10000'); ?>">
          </div>        
      </div>



        <div class="col-sm-6 col-xl-3">
          <div class="form-group"> 
          <label for="" class="form-control-label">Ptax Amount</label>                             
              <input placeholder="Ptax Amount" type="text" required class="form-control" id="p_tax_0"  name="p_tax_0" value="<?php echo (isset($data_single->p_tax) ? $data_single->p_tax : ''); ?>">
          </div>        
      </div>
        
     
</div>
<?php } ?>  


<div  id="insert_ptax_field">
  <?php if(isset($fields) && $fields!=''){
    foreach ($fields as $no) {
     print_r( $no);
    }
    //print_r($fields);
  }?>
</div>





 <input type="hidden" name="ptax_field_no" id="ptax_field_no"  value="<?php echo (isset($num_rows) ? $num_rows : 1 ); ?>" >
         

<div class="row">
<div class="col-md-12">
        <div class="form-group form-buttons">
          <a href="javascript:void(0)" class="btn btn-info" onclick="add_ptax_field()">ADD ROW</a>         
             <button type="submit" name="submit" class="btn btn-success" id="save">Save</button>
             <a href="javascript:;" class="btn btn-secondary" onclick="btnCloseForm();">Close</a>
        </div>
    </div> 
  </div>

</form>
<script>
 $('.select2').select2({
        width: '100%'
    });

 function checkstate(id){
  //alert(id);
        var state = $("#state").val().trim();
        //alert(rf_no);
        $("#state_err").html('');
        $("#save").prop( "disabled", false );
        if(state!=''){
        $.post("<?php echo base_url('check_state'); ?>", {'state': state,'id':id}, function(result){
            console.log(result);
            if(result!='done'){
              $("#state_err").html(result);
              $("#save").prop( "disabled", true );
            }
         
         
        });
        }
        }
  </script>