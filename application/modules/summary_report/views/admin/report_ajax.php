<thead>
  <tr>
    <th>Sl#</th>
    <th>Employee Name</th>
     <th>RF No.</th>

     <?php if(!empty($all_leave_type)){

      foreach($all_leave_type as $leave_type){?>
     <th><?='Opening '.$leave_type->rule_name?></th>
   <?php } } ?>
    <th>Late</th>
    <th>CL Taken</th>
    <th>PL Taken</th>
    <th>LOP</th>
    <th>Total Leave</th>
    <th>WFH</th>
    <th>Half Day</th>
    <th>Outside Duty</th>
    <th>Early Leave</th>
  </tr>
</thead>
<tbody>
  <?php 
  $sl = 1;
  if(!empty($all_employee)){ 
    foreach($all_employee as $employee){
    $att_report = $this->SummaryModel->load_att_month(base64_encode($employee->id),$month,date('Y'));
    $att_leave = $this->SummaryModel->load_att_month_leave($employee->id,$month,date('Y'));
    //print_r($att_leave); die;
    $year = date('Y');
        $curdate = date('m').'-'.$month.'-'.$year;
        $days=date("t",strtotime($curdate));
        $outside = '0';
        $halfday = '0';
        $wfh = '0';
        $late = '0';
        $earlyLeave = '0';
        //echo $days; die;
        for($i=1; $i<=$days; $i++){

        $j = sprintf("%02d", $i) ;
        $date = $j.'-'.$month.'-'.$year;
        $text = '';
        $text2 = '';
        $bg='';
        $holiday ='';
        $weekoff = '';
        
        $dayJan = date('l',strtotime($date));
        if((!empty($att_report)) &&  (array_key_exists($j,$att_report))){
        $attReport = explode('_', @$att_report[sprintf('%02d', $i)]);
        if((!empty($att_report)) && (!empty($attReport[0]) && $attReport[0]=='Full Day')){ // present day
        $text = 'P';
        if(!empty($attReport[1]) && $attReport[1] == 'Late'){ $text.='/L'; $late = $late + 1;} 
        }else{ // absent/half day/o
        $text='A';

        if((!empty($att_report)) && (@$att_report[$i]=='Absent')){
          $text = 'A';
        }


        if((!empty($att_report)) && ($attReport[0]=='Half Day')){
           $text = 'H';
           $halfday = $halfday + 1;
           if($attReport[1] == 'Late'){ $text.='/L'; $late = $late + 1;}
        }

        }
        }else{
        $text='A';

        }
        

        if((!empty($att_report)) && (@$att_report[$j]=='WFH')){
        $text = 'WFH';
        $wfh = $wfh + 1;
        }
        if((!empty($att_report)) && (@$att_report[$j]=='OD')){
        $text = 'OD';
        $outside = $outside+1;
        }

        /*if(array_key_exists($dayJan,$offshiftarr)){
        $weekoff = 'WO';
        $bg='background:yellow;';
         if (strpos($text, 'A') !== false) {
        $text='';
        }
        }*/



        if(!empty($att_report['early_leave']) && (in_array($j,$att_report['early_leave'])) ){
        $text = 'EL';
        $earlyLeave = $earlyLeave + 1;
        }

        if(!empty($att_report['futuredate']) && (in_array($j,$att_report['futuredate'])) ){
        $text = '-';
        }
        if(!empty($att_report['holidays']) && (in_array($j,$att_report['holidays'])) ){
        $bg='background:red;';
        $holiday = 'H';
        if (strpos($text, 'A') !== false) {
        $text='';
        }
        }

        if(!empty($att_report['leaves']) && (in_array($j,$att_report['leaves'])) ){
        $text = 'L';
        }
      }
                  

    ?>
  <tr>
     <td><?=$sl?></td>
    <td><?=$employee->first_name.' '.$employee->last_name?></td>
     <td><?=$employee->rf_no?></td>
       <?php if(!empty($all_leave_type)){
      foreach($all_leave_type as $leave_type){
        $month_name = date("F", mktime(0, 0, 0, $month, 10));
       $openingleave = $this->SummaryModel->get_row_data_orderby('employee_leaves',array('leave_id'=>$leave_type->id,'employee_id'=>$employee->id,'credited_month'=>$month_name));
      $opening = $this->SummaryModel->get_all_nos_opening($leave_type->id,$employee->id,$month);

        ?>
     <td><?php echo $opening;?></td>
   <?php } } ?>
    <td><?=$late?></td>
      <td><?php 
      /*$clcount = '0';
      foreach($att_leave as $kcl => $vcl){
        if($vcl == 'CL'){
          $clcount = $clcount + 1;
        }
      }
      echo $clcount;*/
      $monthname = date("F", mktime(0, 0, 0, $month, 10));
      //echo $monthname; die;
      $cltaken = $this->SummaryModel->get_all_nos_taken($monthname,'1',$employee->id);
      echo $cltaken;
      ?></td>
      <td><?php 
     /* $plcount = '0';
      foreach($att_leave as $kpl => $vpl){
        if($vpl == 'PL'){
          $plcount = $plcount + 1;
        }
      }
      echo $plcount;*/
       $monthname = date("F", mktime(0, 0, 0, $month, 10));
      //echo $monthname; die;
      $pltaken = $this->SummaryModel->get_all_nos_taken($monthname,'2',$employee->id);
      echo $pltaken;
      ?></td>
      <td><?php echo $totallop = $this->SummaryModel->get_all_nos_lop($employee->id,$monthname);?></td>
      <td><?php 
      echo $cltaken+$pltaken + $totallop;
      ?></td>
      <td><?=$wfh?></td>
      <td><?=$halfday?></td>
      <td><?=$outside?></td>
      <td><?=$earlyLeave?></td>
  </tr>
<?php  $sl++; }  } ?>
</tbody>