 <?php
                                   if(!empty($expenses))
                                   {
                                   ?>
                                        <thead>
                                            
                                            <tr>
                                                <th></th>
                                                <th>Year</th>
                                                <th>Visa Cost</th>
                                                <th>Insurance Cost</th>
                                                <th>Others Costs</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                       foreach ($expenses as $value) {
                                           
                                       
                                            ?>
                                            <tr id="delete<?php echo @$value->id;?>">
                                                <td>
                                                    <?php echo @$value->expenses_name;?>
                                                </td>
                                                <td>
                                                     <?php echo @$value->from_year;?>- <?php echo @$value->to_year;?> 
                                                </td>
                                                <td>
                                                    $<?php echo @$value->visa_cost;?>
                                                </td>
                                                <td>
                                                    $<?php echo @$value->insurance_cost;?>
                                                </td>
                                                <td>
                                                    $<?php echo @$value->other_cost;?>
                                                </td>
                                                <td class="table-action">
                                                    <div class="dropdown">
                                                        <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="la la-ellipsis-v"></span>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                            <a style="cursor:pointer;" class="dropdown-item" onclick="goforexpensesedit('<?php echo @$value->id;?>')">
                                                                <span class="la la-pencil icon text-info"></span> Edit
                                                            </a>
                                                            <a style="cursor:pointer;" class="dropdown-item" onclick="goforexpensesdelete('<?php echo @$value->id;?>')"><span class="la la-trash icon text-danger"></span> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                       }
                                       ?>
                                            
                                        </tbody>
                                        <?php
                                   }
                                   ?>