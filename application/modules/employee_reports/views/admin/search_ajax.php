<thead>
                  <tr>
                    <th>Date</th>
                    <th>Days</th>
                    <th>IN</th>
                    <th>OUT</th>
                    <th>Work Hour</th>
                    <th>Holiday</th>
                    <th>Week Off</th>
                    <th>Remarks</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $year = date('Y');
                  $curdate = $j.'-'.$month_id.'-'.$year;
                  $days=date("t",strtotime($curdate));

                  //echo $days; die;
                  for($i=1; $i<=$days; $i++){

                  $j = sprintf("%02d", $i) ;
                  $date = $j.'-'.$month_id.'-'.$year;
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
                  if(!empty($attReport[1]) && $attReport[1] == 'Late'){ $text.='/L';} 



                  }else{ // absent/half day/o
                  $text='A';

                  if((!empty($att_report)) && (@$att_report[$i]=='Absent')){
                    $text = 'A';
                  }


                  if((!empty($att_report)) && ($attReport[0]=='Half Day')){
                     $text = 'H';
                     if($attReport[1] == 'Late'){ $text.='/L';}
                  }

                  }
                  }else{
                  $text='A';

                  }
                  

                  if((!empty($att_report)) && (@$att_report[$j]=='WFH')){
                  $text = 'WFH';
                  }
                  if((!empty($att_report)) && (@$att_report[$j]=='OD')){
                  $text = 'OD';
                  }

                  if(array_key_exists($dayJan,$offshiftarr)){
                  $weekoff = 'WO';
                  $bg='background:yellow;';
                   if (strpos($text, 'A') !== false) {
                  $text='';
                  }
                  }



                  if(!empty($att_report['early_leave']) && (in_array($j,$att_report['early_leave'])) ){
                  $text = 'EL';
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
                  ?>
                  <tr>
                    <td><?=$j?></td>
                    <td><?=date('l',strtotime($date))?></td>
                     <td>
                      <?php 
                      if(!empty($att_report['entryTime'])){
                        $flag = 0;
                        foreach ($att_report['entryTime'] as $key => $value) {
                          if($key == $j){
                             echo $value; 
                             $flag ++;
                           }
                        }
                        if($flag == '0'){
                          echo '00:00';
                        }
                       }
                      ?>
                      </td>
                       <td>
                      <?php 
                      if(!empty($att_report['outTime'])){
                        $flag1 = 0;
                        foreach ($att_report['outTime'] as $k => $v) {
                          if($k == $j){
                             echo $v; 
                             $flag1 ++;
                           }
                        }
                         if($flag1 == '0'){
                          echo '00:00';
                        }
                       }
                      ?>
                      </td>
                      <td>
                        <?php 
                        if(!empty($att_report['entryTime']) && !empty($att_report['outTime'])){
                          $flag2 = 0;
                           foreach ($att_report['entryTime'] as $keyentry => $valueentry) {
                                 foreach ($att_report['outTime'] as $keyout => $valueout) {
                              if($keyentry == $j && $keyout == $j){
                                                $timeDiff = strtotime($valueentry) - strtotime($valueout);

                                                $Hours = substr('00'.($timeDiff / 3600 % 24),-2);
                                                $Hours = str_replace("-","",$Hours);
                                                $Hours = sprintf("%02d", $Hours);

                                                $Mint = substr('00'.($timeDiff / 60 % 60),-2);

                                                $timme = $Hours.':'.$Mint;

                                                $total_hour = str_replace("-","",$timme);
                                                echo $total_hour;
                                                $flag2 ++;
                                            } } }  
                              if($flag2 == '0'){
                              echo '00:00';
                              }
                             }
                        ?>
                      </td>
                      <td><?=$holiday?></td>
                      <td><?=$weekoff?></td>
                      <td><?=$text?></td>

                  </tr>
                <?php } ?>
              
                </tbody>
             