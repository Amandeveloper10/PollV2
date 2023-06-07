 <option value="">Please select</option>
                    <?php
                    if(!empty($all_employee))
                    {
                        $employee=explode(',',$assigned_employee->employee_id);
                    foreach ($all_employee as $value) {
                        
                   
                    ?>
                    <option value="<?php echo @$value->id ?>" <?php if (in_array(@$value->id, $employee)) { echo 'selected'; } ?>><?php echo @$value->first_name.'' .@$value->middle_name.''.@$value->last_name; ?> (<?php echo @$value->employee_no; ?>)</option>
                  <?php
                    }
                    }
                    ?>
                                                           