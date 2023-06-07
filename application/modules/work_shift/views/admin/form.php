<form onsubmit="return myFunction('work_shift_form')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_work_shift').'/'.$id : base_url('admin_add_work_shift'); ?>" name="work_shift_form" id="work_shift_form" enctype="multipart/form-data" >
<div class="row">
    <div class="col-sm-6 col-xl-6">
        <div class="form-group">
            <label>Shift Name</label>
            <input required type="text" class="form-control" name="work_shift_name" value="<?php echo (isset($data_single->work_shift_name) ? $data_single->work_shift_name : ''); ?>">
        </div>
    </div>
       <div class="col-sm-6 col-xl-6"> 
        <div class="form-group">
            <label>Grace</label>
            <input type="text" class="mytime_picker form-control" required name="grace" value="<?php echo (isset($data_single->work_hour_grace) ? $data_single->work_hour_grace : ''); ?>">
            </div>
    </div>
  
       <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Rule(For Full Working Days)</label>
                <select class="form-control" name="rule_1" id="rule_1">
                <option value="rule_1">Rule 1</option>
                </select>         
        </div>        
    </div>
    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Work hour</label>
            <div class="row">
                <div class="col-5"><input type="text" class="form-control mytime_picker" required Placeholder="From" id="work_hour_start_1"  name="work_hour_start_1" onchange="get_duration_1();"  value="<?php echo (isset($data_single->work_hour_start_1) ? $data_single->work_hour_start_1 : ''); ?>"></div>
                <div class="col-2 text-center align-self-center "> to </div>
                <div class="col-5"><input type="text" required onchange="get_duration_1();" class="form-control mytime_picker" Placeholder="To" id="work_hour_end_1" name="work_hour_end_1" value="<?php echo (isset($data_single->work_hour_end_1) ? $data_single->work_hour_end_1 : ''); ?>"></div>
            </div>            
        </div>        
    </div>

    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Duration</label>
            <input type="text" class="form-control onlynumber" readonly name="duration_1" id="duration_1" value="<?php echo (isset($data_single->work_hour_duration_1) ? $data_single->work_hour_duration_1 : ''); ?>">
        </div>
    </div>

    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Rule For Half Working Day</label>
              <select class="form-control" name="rule_2" id="rule_2">
                <option value="rule_2">Rule 2</option>
                </select>         
        </div>        
    </div>
    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Work hour</label>
            <div class="row">
                <div class="col-5"><input type="text" required class="form-control mytime_picker" Placeholder="From" id="work_hour_start_2"  name="work_hour_start_2"  onchange="get_duration_2();" value="<?php echo (isset($data_single->work_hour_start_2) ? $data_single->work_hour_start_2 : ''); ?>"></div>
                <div class="col-2 text-center align-self-center "> to </div>
                <div class="col-5"><input type="text" required onchange="get_duration_2();" class="form-control mytime_picker" Placeholder="To" id="work_hour_end_2" name="work_hour_end_2" value="<?php echo (isset($data_single->work_hour_end_2) ? $data_single->work_hour_end_2 : ''); ?>"></div>
            </div>            
        </div>        
    </div>

    <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Duration</label>
            <input type="text" class="form-control onlynumber" readonly name="duration_2" id="duration_2" value="<?php echo (isset($data_single->work_hour_duration_2) ? $data_single->work_hour_duration_2 : ''); ?>">
        </div>
    </div>
	
	
	
	 <div class="col-sm-6 col-xl-4">
        <div class="form-group">
            <label>Weekoff</label>
              <select class="form-control" required name="Weekoff" id="Weekoff">
                <option value="rule_1" <?php if(!empty($data_single->weekoff) && $data_single->weekoff == 'rule_1'){ echo 'selected'; } ?>>Rule 1</option>
				<option value="rule_2" <?php if(!empty($data_single->weekoff) && $data_single->weekoff == 'rule_2'){ echo 'selected'; } ?>>Rule 2</option>
                </select>         
        </div>        
    </div>

 

     
    <div class="col-sm-12">
        <h5>Off Days</h5>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Weeks</th>
            <th>Sunday</th>
            <th>Monday</th>
            <th>Tuesday</th>
            <th>Wednesday</th>
            <th>Thursday</th>
            <th>Friday</th>
            <th>Saturday</th>
            </tr>
          </thead>
          <tbody>
            <?php for($i=1;$i<=5; $i++){
             ?>
            <tr>
              <td><?=$i?></td>
            <td>
            <?php  if(!empty($id) && $id != ''){
                $weeks_sun = $this->WorkShiftModel->get_row_data('master_work_shift_off_day',array('work_shift_id'=>$id,'week_no'=>$i,'weekname'=>'Sunday'));
              } ?>
              <select required class="form-control <?php if(!empty($weeks_sun)){ echo 'weekselect'; } ?>"  onclick="getvalues('Sunday',<?=$i?>);" id="Sunday_<?=$i?>" name="Sunday_<?=$i?>">
               <option value="">Select</option>
                <!--<option value="Half" <?php if(!empty($weeks_sun) && $weeks_sun->weekvalue == 'Half'){ echo 'selected'; } ?>>Half</option>-->
				<option value="rule_1" <?php if(!empty($weeks_sun) && $weeks_sun->weekvalue == 'rule_1'){ echo 'selected'; } ?>>Rule 1</option>
                <option value="rule_2" <?php if(!empty($weeks_sun) && $weeks_sun->weekvalue == 'rule_2'){ echo 'selected'; } ?>>Rule 2</option>
                <option value="Full" <?php if(!empty($weeks_sun) && $weeks_sun->weekvalue == 'Full'){ echo 'selected'; } ?>>Week Off</option>
                 
              </select>
            </td>
             <td>
              <?php  if(!empty($id) && $id != ''){
                $weeks_mon = $this->WorkShiftModel->get_row_data('master_work_shift_off_day',array('work_shift_id'=>$id,'week_no'=>$i,'weekname'=>'Monday'));
              } ?>
              <select required class="form-control <?php if(!empty($weeks_mon)){ echo 'weekselect'; } ?>" onclick="getvalues('Monday',<?=$i?>)" name="Monday_<?=$i?>" id="Monday_<?=$i?>">
                <option value="">Select</option>
                <!--<option value="Half" <?php if(!empty($weeks_mon) && $weeks_mon->weekvalue == 'Half'){ echo 'selected'; } ?>>Half</option>-->
				<option value="rule_1" <?php if(!empty($weeks_mon) && $weeks_mon->weekvalue == 'rule_1'){ echo 'selected'; } ?>>Rule 1</option>
                <option value="rule_2" <?php if(!empty($weeks_mon) && $weeks_mon->weekvalue == 'rule_2'){ echo 'selected'; } ?>>Rule 2</option>
                <option value="Full" <?php if(!empty($weeks_mon) && $weeks_mon->weekvalue == 'Full'){ echo 'selected'; } ?>>Week Off</option>
                
              </select>
            </td>
             <td>
              <?php  if(!empty($id) && $id != ''){
                $weeks_tus = $this->WorkShiftModel->get_row_data('master_work_shift_off_day',array('work_shift_id'=>$id,'week_no'=>$i,'weekname'=>'Tuesday'));
              } ?>
              <select required name="Tuesday_<?=$i?>"  id="Tuesday_<?=$i?>" onclick="getvalues('Tuesday',<?=$i?>)" class="form-control <?php if(!empty($weeks_tus)){ echo 'weekselect'; } ?>">
               <option value="">Select</option>
                <!--<option value="Half" <?php if(!empty($weeks_tus) && $weeks_tus->weekvalue == 'Half'){ echo 'selected'; } ?>>Half</option>-->
				<option value="rule_1" <?php if(!empty($weeks_tus) && $weeks_tus->weekvalue == 'rule_1'){ echo 'selected'; } ?>>Rule 1</option>
                <option value="rule_2" <?php if(!empty($weeks_tus) && $weeks_tus->weekvalue == 'rule_2'){ echo 'selected'; } ?>>Rule 2</option>
                <option value="Full" <?php if(!empty($weeks_tus) && $weeks_tus->weekvalue == 'Full'){ echo 'selected'; } ?>>Week Off</option>
                 
              </select>
            </td>
             <td>
          <?php  if(!empty($id) && $id != ''){
                $weeks_wed = $this->WorkShiftModel->get_row_data('master_work_shift_off_day',array('work_shift_id'=>$id,'week_no'=>$i,'weekname'=>'Wednesday'));
              } ?>
              <select required name="Wednesday_<?=$i?>"  id="Wednesday_<?=$i?>" onclick="getvalues('Wednesday',<?=$i?>)" class="form-control  <?php if(!empty($weeks_wed)){ echo 'weekselect'; } ?>">
                <option value="">Select</option>
                <!--<option value="Half" <?php if(!empty($weeks_wed) && $weeks_wed->weekvalue == 'Half'){ echo 'selected'; } ?>>Half</option>-->
				<option value="rule_1" <?php if(!empty($weeks_wed) && $weeks_wed->weekvalue == 'rule_1'){ echo 'selected'; } ?>>Rule 1</option>
                <option value="rule_2" <?php if(!empty($weeks_wed) && $weeks_wed->weekvalue == 'rule_2'){ echo 'selected'; } ?>>Rule 2</option>
                <option value="Full" <?php if(!empty($weeks_wed) && $weeks_wed->weekvalue == 'Full'){ echo 'selected'; } ?>>Week Off</option>
                 
              </select>
            </td>
            <td>
                <?php  if(!empty($id) && $id != ''){
                $weeks_thu = $this->WorkShiftModel->get_row_data('master_work_shift_off_day',array('work_shift_id'=>$id,'week_no'=>$i,'weekname'=>'Thursday'));
              } ?>
              <select required name="Thursday_<?=$i?>"  id="Thursday_<?=$i?>"  onclick="getvalues('Thursday',<?=$i?>)" class="form-control <?php if(!empty($weeks_thu)){ echo 'weekselect'; } ?>">
              <option value="">Select</option>
               <!--<option value="Half"  <?php if(!empty($weeks_thu) && $weeks_thu->weekvalue == 'Half'){ echo 'selected'; } ?>>Half</option>-->
			   <option value="rule_1" <?php if(!empty($weeks_thu) && $weeks_thu->weekvalue == 'rule_1'){ echo 'selected'; } ?>>Rule 1</option>
                <option value="rule_2" <?php if(!empty($weeks_thu) && $weeks_thu->weekvalue == 'rule_2'){ echo 'selected'; } ?>>Rule 2</option>
               <option value="Full"  <?php if(!empty($weeks_thu) && $weeks_thu->weekvalue == 'Full'){ echo 'selected'; } ?>>Week Off</option></select>
              </td>
            <td>
                <?php  if(!empty($id) && $id != ''){
                $weeks_fri = $this->WorkShiftModel->get_row_data('master_work_shift_off_day',array('work_shift_id'=>$id,'week_no'=>$i,'weekname'=>'Friday'));
              } ?>
              <select required name="Friday_<?=$i?>" id="Friday_<?=$i?>"  onclick="getvalues('Friday',<?=$i?>)" class="form-control <?php if(!empty($weeks_fri)){ echo 'weekselect'; } ?>">
			  <option value="">Select</option>
                <!--<option value="Half" <?php if(!empty($weeks_fri) && $weeweeks_friks_thu->weekvalue == 'Half'){ echo 'selected'; } ?>>Half</option>-->
				 <option value="rule_1" <?php if(!empty($weeks_fri) && $weeks_fri->weekvalue == 'rule_1'){ echo 'selected'; } ?>>Rule 1</option>
                <option value="rule_2" <?php if(!empty($weeks_fri) && $weeks_fri->weekvalue == 'rule_2'){ echo 'selected'; } ?>>Rule 2</option>
                <option value="Full" <?php if(!empty($weeks_fri) && $weeks_fri->weekvalue == 'Full'){ echo 'selected'; } ?>>Week Off</option>
                
              </select></td>
            <td>
               <?php  if(!empty($id) && $id != ''){
                $weeks_sat = $this->WorkShiftModel->get_row_data('master_work_shift_off_day',array('work_shift_id'=>$id,'week_no'=>$i,'weekname'=>'Saturday'));
              } ?>
              <select required name="Saturday_<?=$i?>" id="Saturday_<?=$i?>"  onclick="getvalues('Saturday',<?=$i?>)" class="form-control <?php if(!empty($weeks_sat)){ echo 'weekselect'; } ?>">
               <option value="">Select</option>
               <!-- <option value="Half" <?php if(!empty($weeks_sat) && $weeks_sat->weekvalue == 'Half'){ echo 'selected'; } ?>>Half</option>-->
			    <option value="rule_1" <?php if(!empty($weeks_sat) && $weeks_sat->weekvalue == 'rule_1'){ echo 'selected'; } ?>>Rule 1</option>
                <option value="rule_2" <?php if(!empty($weeks_sat) && $weeks_sat->weekvalue == 'rule_2'){ echo 'selected'; } ?>>Rule 2</option>
                <option value="Full" <?php if(!empty($weeks_sat) && $weeks_sat->weekvalue == 'Full'){ echo 'selected'; } ?>>Week Off</option>
                
              </select></td>
            </tr>
            
          <?php } ?>
          <input type="hidden" name="offdays" id="offdays" value="<?php if(!empty($offdays)){ echo implode(',', $offdays);}else{ echo '';} ?>">  
          </tbody>
      
        </table>
      </div>
    <div class="col-md-12">
        <div class="form-group form-buttons">
             <button type="submit" name="submit" class="btn btn-success">Save</button>
             <a href="javascript:;" class="btn btn-secondary" onclick="btnCloseForm();">Close</a>
        </div>
    </div>

</div>

</form>

<script type="text/javascript">
  

    function getval(id,value){
    $('#'+id+'_small').text(value);
    if(value != ''){
    $("#"+id).addClass("weekselect");
    }else{
     $("#"+id).removeClass("weekselect");
    }
    var myObj = [];var myObj1 = [];
    $('.weekselect').each(function (index, value){
    var weekname = $(this).text().trim();
    var input_id = weekname+'_small';
    var weekval =  $('#'+input_id).text();
    //console.log(weekval);
    myObj.push(weekname);
    myObj1.push(weekval);
    });
    $('#weekname').val(myObj);
    $('#weekvalue').val(myObj1);
    }

    function getvalues(weekname,week){ 
    var queryArr = [];
    var field = weekname+'_'+week;
    var value =  $('#'+field).val();
    if(value != ''){
      $('#'+field).addClass("weekselect");
    }else{
      $('#'+field).removeClass("weekselect");
    }
    $('.weekselect').each(function (index, value){
    var type = $(this).val().trim();
    var result = $(this).attr('name'); 
    var res = result.split("_");
     var pieces = [type+'@'+res[0]+'@'+res[1]];
     var arr = $.makeArray(pieces);
      queryArr.push(arr);
    });
    $('#offdays').val(queryArr);
    }

    $(document).ready(function() {
    $(".onlynumber").keypress(function (e) {
    if(e.which == 46){
      if($(this).val().indexOf('.') != -1) {
          return false;
      }
    }

    if (e.which != 8 && e.which != 0 && e.which != 46 && (e.which < 48 || e.which > 57)) {
      return false;
    }
    });
    });

    function get_duration_1(){
    /* var start = $('#work_hour_start_1').val();
     var end = $('#work_hour_end_1').val();
     if(start != '' && end != ''){
      s = start.split(':');
     e = end.split(':');
     min = e[1]-s[1];
     hour_carry = 0;
     if(min < 0){
         min += 60;
         hour_carry += 1;
     }
     hour = e[0]-s[0]-hour_carry;
     min = ((min/60)*100).toString()
     diff = hour + ":" + min.substring(0,2);
     
     $('#duration_1').val(diff);
    }else{
     $('#duration_1').val('');
    }*/
	if(time1 != '' && time2 != ''){
	 var time1 = $("#work_hour_start_1").val().split(':'), time2 = $("#work_hour_end_1").val().split(':');
     var hours1 = parseInt(time1[0], 10), 
         hours2 = parseInt(time2[0], 10),
         mins1 = parseInt(time1[1], 10),
         mins2 = parseInt(time2[1], 10);
     var hours = hours2 - hours1, mins = 0;

     // get hours
     if(hours < 0) hours = 24 + hours;

     // get minutes
     if(mins2 >= mins1) {
         mins = mins2 - mins1;
     }
     else {
         mins = (mins2 + 60) - mins1;
         hours--;
     }

     // convert to fraction of 60
     mins = mins / 60; 

     hours += mins;
     hours = hours.toFixed(2);
		$("#duration_1").val(hours);
	}else{
		$("#duration_1").val('');
	}
    }

function get_duration_2(){
  /*var start = $('#work_hour_start_2').val();
   var end = $('#work_hour_end_2').val();
    if(start != '' && end != ''){
   s = start.split(':');
   e = end.split(':');
   min = e[1]-s[1];
   hour_carry = 0;
   if(min < 0){
       min += 60;
       hour_carry += 1;
   }
   hour = e[0]-s[0]-hour_carry;
   min = ((min/60)*100).toString()
   diff = hour + ":" + min.substring(0,2);
   
   $('#duration_2').val(diff);
 }else{
  $('#duration_2').val('');
 }*/
  var time1 = $("#work_hour_start_2").val().split(':'), time2 = $("#work_hour_end_2").val().split(':');
   if(time1 != '' && time2 != ''){
     var hours1 = parseInt(time1[0], 10), 
         hours2 = parseInt(time2[0], 10),
         mins1 = parseInt(time1[1], 10),
         mins2 = parseInt(time2[1], 10);
     var hours = hours2 - hours1, mins = 0;

     // get hours
     if(hours < 0) hours = 24 + hours;

     // get minutes
     if(mins2 >= mins1) {
         mins = mins2 - mins1;
     }
     else {
         mins = (mins2 + 60) - mins1;
         hours--;
     }

     // convert to fraction of 60
     mins = mins / 60; 

     hours += mins;
     hours = hours.toFixed(2);
     $("#duration_2").val(hours);
   }else{
	   $("#duration_2").val('');
   }
}
//work_hour_start_2//work_hour_end_2
 

  //$('#setup_hours').val(diff);
</script>