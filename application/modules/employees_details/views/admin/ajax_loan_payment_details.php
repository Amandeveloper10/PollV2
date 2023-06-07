 <?php
                                   if(!empty($loan_payment_details))
                                   {
                                   ?>
<table id="ksdatatable" class="table loan_application table-bordered table-list mb-0">
                                        <thead>
                                            
                                            <tr>
<!--                                               <th></th>-->
                                                <th>Payment date</th>
                                                <th>Amount</th>
<!--                                                <th>Account Number</th>-->
<!--                                                <th>Default</th>
                                                <th></th>-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(!empty($loan_payment_details))
                                            {
                                       foreach ($loan_payment_details as $value) {
                                           
                                       
                                            ?>
                                            <tr id="deletebank<?php echo @$value->id;?>">
                                                <td>
                                                    <?php echo @$value->payment_date;?>
                                                </td>
                                                <td>
                                                   <?php echo @$value->amount;?> 
                                                </td>
                                                
                                               
<!--                                                <td class="table-action">
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
                                                </td>-->
                                            </tr>
                                            <?php
                                       }
                                            }
                                       ?>
                                            
                                        </tbody>
                                        </table>
                                        <?php
                                   }
 else {
     echo 'No Transaction Found';
 }
                                   ?>
 