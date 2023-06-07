 <?php
                                   if(!empty($bank))
                                   {
                                   ?>
                                        <thead>
                                            
                                            <tr>
<!--                                               <th></th>-->
                                                <th>Bank Name</th>
                                                <th>IFSC CODE</th>
                                                <th>Account Number</th>
                                                <th>Default</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(!empty($bank))
                                            {
                                       foreach ($bank as $value) {
                                            if($value->default_bank==1)
                                           {
                                               $default='default';
                                           }
                                           else{
                                              $default='';  
                                           }
                                       
                                            ?>
                                            <tr id="deletebank<?php echo @$value->id;?>">
                                                <td>
                                                    <?php echo @$value->bank_name;?>
                                                </td>
                                                <td>
                                                   <?php echo @$value->agent_rtn_code;?> 
                                                </td>
                                                <td>
                                                    <?php echo @$value->account_no;?>
                                                </td>
                                                <td>
                                                    <?php echo @$default;?>
                                                </td>
                                               
                                                <td class="table-action">
                                                    <div class="dropdown">
                                                        <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="la la-ellipsis-v"></span>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                            <a class="dropdown-item" onclick="goforbankedit('<?php echo @$value->id;?>')">
                                                                <span class="la la-pencil icon text-info"></span> Edit
                                                            </a>
                                                            <a class="dropdown-item" onclick="goforbankdelete('<?php echo @$value->id;?>')"><span class="la la-trash icon text-danger"></span> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                       }
                                            }
                                       ?>
                                            
                                        </tbody>
                                        <?php
                                   }
                                   ?>
 