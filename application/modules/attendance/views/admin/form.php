<form onsubmit="return myFunctionAtt('attendance_empp')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_attendance') . '/' . $id : base_url('admin_add_attendance'); ?>" name="attendance_empp" id="attendance_empp" enctype="multipart/form-data" >
    <input type="hidden" name="att_id" id="att_id" value="<?php echo (isset($data_single->id) ? $data_single->id : ''); ?>">

    <input type="hidden" name="start_date" id="start_date" value="<?php echo @$stDate; ?>">

    <div class="row"> 
        <div class="col-sm-6 col-xl-4">
            <div class="form-group">
                <label for="" class="form-control-label">Date</label>
                <input required onchange="checkAtt();" type="text" placeholder="Enter Date" class="form-control mysingle_date" name="date" id="date" value="<?php echo (isset($data_single->date) ? date('d-m-Y', strtotime($data_single->date)) : ''); ?>">
            </div>
            <span id="dateErr" style="color: red;"></span>
        </div>


        <div class="col-sm-6 col-xl-4">
            <div class="form-group">
                <label for="" class="form-control-label">Employee</label>
                <select required name="employee_id" id="employee_id" class="form-control js-example-basic-multiple" onchange="checkAtt();" >
                    <option value="">Please Select Employee</option>
                    <?php
                    if (!empty($all_employee)) {
                        foreach ($all_employee as $employee) {
                            ?>
                            <option value="<?php echo $employee->id; ?>" <?php echo ((isset($data_single->employee_id) && ($data_single->employee_id == $employee->id)) ? 'selected' : ''); ?>><?php echo @$employee->first_name . ' ' . @$employee->middle_name . ' ' . @$employee->last_name . ' (' . @$employee->employee_no . ')'; ?> </option>
                        <?php }
                    } ?>
                </select>
            </div>
        </div>



        <div class="col-sm-6 col-xl-4" style="display: none;">
            <div class="form-group">
                <label class="d-block">Attendance</label>
                <div class="d-inline-block mt-2">
                    <div class="custom-control custom-radio ks-radio ks-info">
                        <input onchange="getvallAtt('Present');" <?php if (@$data_single->type == 'Present') { ?> checked="checked" <?php } ?>  id="r3" type="radio" class="custom-control-input" value="Present" name='type'  
                               data-validation="radio_group"
                               data-validation-qty="min1">
                        <label class="custom-control-label" for="r3">Present</label>
                    </div>
                </div>
                <div class="d-inline-block mt-2 ml-3">
                    <div class="custom-control custom-radio ks-radio ks-purple">
                        <input onchange="getvallAtt('Absent');" <?php if (@$data_single->type == 'Absent') { ?> checked="checked" <?php } ?>  id="r4" type="radio" class="custom-control-input" value="Absent"  name='type'  
                               data-validation="radio_group"
                               data-validation-qty="min1">
                        <label class="custom-control-label" for="r4">Absent</label>
                    </div>
                </div>



                <input type="hidden" name="type_val" id="type_val" value="<?php echo @$data_single->type; ?>">
            </div>
            <span id="type_valErr" style="color: red;"></span>
        </div>

        <div class="col-sm-6 col-xl-2 presentDiv" <?php if (isset($data_single->type) && $data_single->type == 'Absent') { ?> style="display: none;" <?php } else { ?> style="display: block;" <?php } ?>>
            <div class="form-group">
                <label for="" class="form-control-label">Entry Time</label>
                <input type="text" placeholder="Enter Entry Time" class="form-control mytime_picker" name="entry_time" id="entry_time" value="<?php echo (isset($data_single->entry_time) ? date('h:i A',strtotime($data_single->entry_time)) : ''); ?>">
            </div>
        </div>
        <div class="col-sm-6 col-xl-2 presentDiv" <?php if (isset($data_single->type) && $data_single->type == 'Absent') { ?> style="display: none;" <?php } else { ?> style="display: block;" <?php } ?>>
            <div class="form-group">
                <label for="" class="form-control-label">Out Time</label>
                <input type="text" placeholder="Enter Out Time" class="form-control mytime_picker" name="out_time" id="out_time" value="<?php echo (isset($data_single->out_time) && ($data_single->out_time != '00:00:00') ? date('h:i A',strtotime($data_single->out_time)) : ''); ?>">
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group form-buttons">
                <button type="submit" name="submit" class="btn btn-success save-profile-btn saveAtt">Save </button>
                <a href="javascript:void(0)" onclick="closeForm();" class="btn btn-outline-secondary ks-light btn-add-tenancy-contrcts-close">Close</a>
            </div>
        </div>
    </div>    

</form>

<script type="text/javascript">
  /*  $('.flatpickrtime').flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: false,
		minuteIncrement: 1
    });*/

  

    function getatttype(vaal) {
        $("#att_type_val").val(vaal);
    }
</script>