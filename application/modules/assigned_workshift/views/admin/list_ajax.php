 <table id="payrolltable" class="table table-list2">
<thead>
                  <tr>
                    <th>Employee Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                   
                    <?php
                    $cd = array();
                    $c_year = $year;
                    $c_month = $month;
					$curdate = '01-'.$month.'-'.$year;
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
                       //echo '<pre>'; print_r($load_all_workshift);  die;
                    ?>
                  <tr>
                      <td class="d-flex align-items-center">
                        <img <?php if (isset($data->personal_image) && $data->personal_image != '') { ?> src="<?php echo base_url(); ?>uploads/<?php echo (isset($data->personal_image) && $data->personal_image != '') ? $data->personal_image : ''; ?>" <?php } else { ?> src="<?php echo base_url(); ?>/assets/img/avatars/placeholders/ava-128.png" <?php } ?>class="ks-avatar" alt="" width="36" height="36">
                        <div><?php echo @$data->first_name . ' ' . @$data->middle_name . ' ' . @$data->last_name; ?><br>
                            <small><?php if(!empty($data->employee_no)) { echo '('.$data->employee_no.')'; } ?></small></div>
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
					$load_all_workshift = $this->AssignedworkshiftModel->get_all_data($data->id,$k,$c_month,$c_year);
					//echo '<pre>'; print_r($load_all_workshift);
					?>
					<td><?php 
					if(!empty($wfh['wfh']) && (in_array(sprintf('%02d', $k),$wfh['wfh'])) ){
                       echo '<span class="ks-icon la la-life-ring" title="Work From Home"></span>';
						}
					if(!empty($load_all_workshift)) {
							$work_hour_start  = '';
							$day = $c_year.'-'.$c_month.'-'.$k;
							$stweekname = date('l',strtotime($day));
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
					<a href="javascript:void(0)" title="<?=$load_all_workshift->work_shift_name?>" onclick="openFormLoc(<?=$load_all_workshift->id?>);" ><?=$work_hour_start?></a>
					
					<?php } else { ?>
					<?php 
					$work_hour_start  = '';
							$day = $c_year.'-'.$c_month.'-'.$k;
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
					//$default_workshift->work_shift_name?>
					<?php } ?></td>
					<?php } ?>
                  </tr>
                  <?php $sl++; } } ?>
				  </tbody>
				  </table>