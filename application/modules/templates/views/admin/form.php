<form onsubmit="return myFunctiontemp('template_form')" method="post" autocomplete="off" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_templates').'/'.$id : base_url('admin_add_templates'); ?>" autocomplete="off" name="template_form" id="template_form" enctype="multipart/form-data" >
<div class="row">

 <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Template Name</label>
            <input required type="text" class="form-control" autocomplete="off" placeholder="Enter Template Name" name="template_name" id="template_name" onkeyup="checktemplates('<?php echo (isset($data_single->id) ? $data_single->id : ''); ?>');" value="<?php echo (isset($data_single->template_name) ? $data_single->template_name : ''); ?>">
        </div>
        <span style="color: red;" id="template_err"></span>
    </div>
	
	 <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>From Email</label>
            <input required type="email" class="form-control" autocomplete="off" placeholder="Enter Email From" placeholder="Enter Template Name" name="email_from" id="email_from" value="<?php echo (isset($data_single->email_from) ? $data_single->email_from : ''); ?>">
        </div>
    </div>
	
	 <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Subject</label>
            <input required type="text" autocomplete="off" placeholder="Enter Email Subject" class="form-control" placeholder="Enter Email From" placeholder="Enter Template Name" name="email_subject" id="email_subject" value="<?php echo (isset($data_single->email_subject) ? $data_single->email_subject : ''); ?>">
        </div>
    </div>
	
	    <div class="col-sm-6 col-xl-4">
       
		<div class="form-group">
            <label>Variable</label>
			<select class="form-control" name="variable" onchange="insertIntoCkeditor(this.value)">
				<option value="">Select Variable</option>
				<option value="[var.first_name]">[var.first_name]</option>
				<option value="[var.last_name]">[var.last_name]</option>
				<option value="[var.department]">[var.department]</option>
				<option value="[var.designation]">[var.designation]</option>
				<option value="[var.employee_code]">[var.employee_code]</option>
				<option value="[var.phone_number]">[var.phone_number]</option>
				<option value="[var.reporting_time]">[var.reporting_time]</option>
				<option value="[var.date]">[var.date]</option>
				<option value="[var.company_name]">[var.company_name]</option>  
				<option value="[var.company_address]">[var.company_address]</option>
				<option value="[var.joining_date]">[var.joining_date]</option>
                <option value="[var.shift_time]">[var.shift_time]</option>
				<option value="[var.reporting_person]">[var.reporting_person]</option>
				<option value="[var.salary_package]">[var.salary_package]</option>
				<option value="[var.location]">[var.location]</option>
			</select>
        </div>
		</div>
    

		
		<div class="col-xl-12">
		<div class="form-group">
		<label>Descrption</label>
		<textarea required class="form-control" name="editor1" id="editor1"><?php echo (isset($data_single->description) ? $data_single->description : ''); ?></textarea>

		</div>
		<textarea  style="display:none;" type="hidden" class="form-control" name="description" id="description"><?php echo (isset($data_single->description) ? $data_single->description : ''); ?></textarea>
		</div>
	
    <div class="col-md-12">
        <div class="form-group form-buttons">
		<button  type="button" class="btn btn-success" onclick="getpreviewdata();" id="previewButton">Preview</button>
             <button type="submit" name="submit" class="btn btn-success" onclick="geteditordata();" id="save">Save</button>
             <a href="javascript:;" class="btn btn-secondary" onclick="btnCloseForm();">Close</a>
        </div>
    </div>

</form>

	<script>
	CKEDITOR.replace( 'editor1' );
	
	 function insertIntoCkeditor(str)
    {
        CKEDITOR.instances['editor1'].insertText(str);
    }
	
	function geteditordata()
    {
		var editorData= CKEDITOR.instances['editor1'].getData();
		$('#description').val(editorData);
    }
	
	function checktemplates(id){
        var template_name = $("#template_name").val().trim();
        $("#template_err").html('');
        $("#save").prop( "disabled", false );
        if(template_name!=''){
        $.post("<?php echo base_url('check_templates'); ?>", {'template_name': template_name,'id':id}, function(result){
            if(result!='done'){
              $("#template_err").html(result);
              $("#save").prop( "disabled", true );
            }
        });
        }
        }
		
		
		
		function getpreviewdata() {
        $("#myModalpreview").on('shown.bs.modal', function() {
			
			var editorData= CKEDITOR.instances['editor1'].getData();
			//var res = editorData.replace("[var.first_name]", "Tripti");
			var res = editorData.replace('[var.first_name]','Tripti').replace('[var.last_name]', 'De').replace('[var.department]', 'IT Depatment').replace('[var.designation]', 'Developer').replace('[var.company_name]', 'Payroll').replace('[var.employee_code]', 'EM0001').replace('[var.phone_number]', '9830978676').replace('[var.company_address]', 'Flat no 9,Minerva Garden,Kolkata - 700104').replace('[var.joining_date]', '12-01-2020').replace('[var.shift_time]', '10.00 Am to 7.00 PM').replace('[var.reporting_person]', 'Arpita Das').replace('[var.salary_package]', '3,00,000/-').replace('[var.location]', 'Flat no 9,Minerva Garden,Kolkata - 700104');
        /*    $("#modal_confirm").click(function() {
               var url = "<?php echo base_url('admin_delete_templates'); ?>/" + id;
                $("#pjax-container").load(url,function(response,status){                     
                    notification(status);
                });
            });*/

            $("#notification_heading_preview").html("Demo Template");
            $("#notification_body_preview").html(res);
        }).modal("show");
    }
		
		 
	</script>

