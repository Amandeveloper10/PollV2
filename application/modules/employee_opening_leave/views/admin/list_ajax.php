<thead>
                   <tr>
                    <th>Employee Name</th>
                    <th>Leave Type</th>
                    <th>Opening Leaves</th>
                    <th>Credited Leaves</th>
                    <th>Taken Leaves</th>
                   <!-- <th>Deduction Leaves</th>-->
                     <th>Closing Balance</th>
                    <th>LOP</th>
                   
                 
                </tr>
                </thead>
               <tbody id="searchData">
                <?php
                //echo '<pre>'; print_r($all_data); die;

                  if(!empty($all_data))
                  {
                  foreach ($all_data as $value) {
                      ?>
                  
                <tr>
                  <td>
                       <?php echo @$value->first_name.' '.@$value->last_name.' ('.@$value->employee_no.')'; ?>
                    </td>
                    <td>
                        <?php echo @$value->rule_name; ?>
                    </td>
                    <td>
                       <?php echo @$value->opening_leaves; ?>
                    </td>
                     <td>
                       <?php echo @$value->credited_leaves; ?>
                    </td>
                     <td>
                       <?php echo @$value->taken_leaves; ?>
                    </td>
                    <td><?= @$value->closing_balance?></td>
                     <!--<td>
                       <?php echo @$value->leave_deduction; ?>
                    </td>-->
                    <td><?php echo @$value->lop; ?></td>
                    
                </tr>
               <?php
                  }
                  }
                  ?>   
                </tbody>
             