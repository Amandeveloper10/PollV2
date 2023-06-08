
<?php
                                   if(!empty($loan_payment))
                                   {
                                   ?>
                                        <thead>
                                        
                                        <tr>
                                            <th>SL No</th>
                                            <th>Payment Date</th>
                                            <th>Amount</th>
                                            <th></th>
                                          
                                        </tr>
                                    </thead>
                                        <tbody>
                                            <?php
                                             $i=0;
                                       foreach ($loan_payment as $value) {
                                           $i++;
                                       
                                            ?>
                                            <tr id="delete<?php echo @$value->id;?>">
                                                <td>
                                               <?php echo @$i; ?>
                                            </td>
                                            
                                            <td>
                                               <?php echo @$value->payment_date; ?>
                                            </td>
                                            <td>
                                                <?php echo @$value->amount; ?>
                                            </td>
                                            
                                                <td class="table-action">
                                                    <div class="dropdown">
                                                        <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="la la-ellipsis-v"></span>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                            
                                                            <a style="cursor:pointer;" class="dropdown-item" onclick="goforloanpaymentdelete('<?php echo @$value->id;?>')"><span class="la la-trash icon text-danger"></span> Delete</a>
                                                           
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
 