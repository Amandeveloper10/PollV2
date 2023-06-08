 <?php
                                   if(!empty($loan_application))
                                   {
                                   ?>
<table id="ks-datatable49" class="table loan_application table-bordered table-list mb-0">
                                        <thead>
                                        
                                        <tr>
                                            <th>Loan<br>Id</th>
<!--                                            <th>Employee<br>Name</th>
                                            <th>Employee<br>No.</th>-->
                                            <th>Reference</th>
                                            <th>Issue<br>Date</th>
                                            <th>Loan<br>Amount</th>
                                            <th>Installment<br>Start Date</th>
                                            <th>Loan<br>End Date</th>
                                            <th>Installment<br>Amount</th>
                                            <th>Approved</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                            <?php
                                       foreach ($loan_application as $value) {
                                           
                                       
                                            ?>
                                            <tr id="delete<?php echo @$value->id;?>">
                                                <td>
                                               <?php echo @$value->id; ?>
                                            </td>
<!--                                            <td>
                                                <?php echo @$value->first_name.' '.@$value->middle_name.' '.@$value->last_name; ?>
                                            </td>
                                            <td>
                                               <?php echo @$value->employee_no; ?>
                                            </td>-->
                                            <td>
                                                <?php echo @$value->reference_name; ?>
                                            </td>
                                            <td>
                                               <?php echo date("d M-Y", strtotime(@$value->loan_issue_date)); ?>
                                            </td>
                                            <td>
                                                <?php echo @$value->sanction_amount; ?>
                                            </td>
                                            <td>
                                                <?php echo date("d M-Y", strtotime(@$value->installment_start_date)); ?>
                                            </td>
                                            <td>
                                               <?php echo date("d M-Y", strtotime(@$value->loan_end_date)); ?>
                                            </td>
                                            <td>
                                               <?php echo @$value->installment_amount; ?>
                                            </td>
                                            <td>
                                               <?php echo @$value->loan_approved; ?>
                                            </td>
                                                <td class="table-action">
                                                    <div class="dropdown">
                                                        <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="la la-ellipsis-v"></span>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                            <a style="cursor:pointer;" class="dropdown-item" onclick="goforloan_applicationedit('<?php echo @$value->id;?>')">
                                                                <span class="la la-pencil icon text-info"></span> Edit
                                                            </a>
                                                            <a style="cursor:pointer;" class="dropdown-item" onclick="goforloanapplicationdelete('<?php echo @$value->id;?>')"><span class="la la-trash icon text-danger"></span> Delete</a>
                                                            <?php
                                                            if($value->loan_close='0')
                                                            {
                                                            ?>
                                                            <a style="cursor:pointer;" class="dropdown-item" onclick="goforloanclose('<?php echo @$value->id;?>','<?php echo @$value->employee_id;?>')">Make Loan Close</a>
                                                        <?php
                                                            }
                                                            else{
                                                            ?>
                                                            <a style="cursor:pointer;color:red" class="dropdown-item" >Loan Has Closed</a>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                       }
                                       ?>
                                            
                                        </tbody>
</table>
                                        <?php
                                   }
                                   ?>