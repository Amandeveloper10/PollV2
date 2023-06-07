<div class="row"> 
	   <div class="col-sm-12">
            <div class="form-group">
                <label for="" class="form-control-label">Templates</label>
                <select required name="templates_id" id="templates_id" class="form-control select2"  required>
                    <option value="">Please Select Templates</option>
                    <?php
					
                    if (!empty($all_templates)) {
                        foreach ($all_templates as $templates) {
                            ?>
                            <option value="<?php echo $templates->id; ?>"><?php echo @$templates->template_name; ?> </option>
                        <?php }
                    } ?>
                </select>
				<input type="hidden" name="emp_id" id="emp_id" value="<?=$emp_id?>"/>
            </div>
        </div>
		<div class="col-sm-12">
            <div class="form-group form-buttons">
                <button type="button" name="submit" onclick="genarate_temp();" class="btn btn-success save-profile-btn save">Genarate</button>
                <a href="javascript:void(0)"  data-dismiss="modal" class="btn btn-outline-secondary ks-light btn-add-tenancy-contrcts-close">Close</a>
            </div>
        </div>
	 </div>

<script>
$('.select2').select2({
        width: '100%'
    });
</script>