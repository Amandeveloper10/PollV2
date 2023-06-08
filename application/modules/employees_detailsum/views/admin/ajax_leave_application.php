<table class="table table-bordered mb-0">
<thead>                                            
    <tr>
        <th>From Date</th>
        <th>To Date</th>
        <th>Total Days</th>
        <th>Approval Status</th>
        <th>Remarks</th>
        <th></th>
    </tr>
</thead>
<tbody>
     <?php
            if(!empty($all_employee_leave_application))
            {
            foreach ($all_employee_leave_application as $value) {
                ?>

    <tr>
        <td>
            <?php echo @$value->leave_from; ?>
        </td>
        <td>
           <?php echo @$value->leave_to; ?>
        </td>
        <td>
           <?php echo @$value->leave_total_days; ?>
        </td>
        <!--<td>
           <?php echo @$value->leave_ticket; ?>
        </td>
        <td>
           <?php echo @$value->leave_ticket_amount; ?>
        </td>-->
        <td>
            <?php
                    if(@$value->approved=='No')
                    {
                    ?>
                    <?php echo @$value->approved;?>
                    <?php
                    }
                    ?>
                     <?php
                    if(@$value->approved=='')
                    {
                    ?>
                    New 
                    <?php
                    }
                    ?>
                    <?php
                    if(@$value->approved=='Yes')
                    {
                    ?>
                    <?php echo @$value->approved;?>
               <?php
                    }
                    ?>
        </td>
<!--                                                <td>
            $20
        </td>-->
<!--                                                <td>
            $20
        </td>-->
        <td>
            <?php echo @$value->leave_note; ?>
        </td>
        <td class="table-action">
            <div class="dropdown">
                <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="la la-ellipsis-v"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                    <a onclick="goforleaveapplicationdit('<?php echo @$value->id;?>')" class="dropdown-item" style="cursor:pointer;">
                        <span class="la la-pencil icon text-info"></span> Edit
                    </a>
                    <a class="dropdown-item" style="cursor:pointer;" onclick="goforleaveapplicationdelete('<?php echo @$value->id;?>')"><span class="la la-trash icon text-danger"></span> Delete</a>
                    <?php /* ?><?php
                    if(@$value->approved=='No')
                    {
                    ?>
                    <a class="dropdown-item" style="cursor:pointer;" onclick="goforleaveapproval('<?php echo @$value->id;?>','Yes','<?php echo @$id;?>')">Make Approve</a>
                    <?php
                    }
                    ?>
                     <?php
                    if(@$value->approved=='')
                    {
                    ?>
                    <a class="dropdown-item" style="cursor:pointer;" onclick="goforleaveapproval('<?php echo @$value->id;?>','Yes','<?php echo @$id;?>')">Make Approve(New)</a>
                    <?php
                    }
                    ?>
                    <?php
                    if(@$value->approved=='Yes')
                    {
                    ?>
                    <a class="dropdown-item" style="cursor:pointer;" onclick="goforleaveapproval('<?php echo @$value->id;?>','No','<?php echo @$id;?>')">Make Not Approve</a>
               <?php
                    }
                    ?> <?php */ ?>
                </div>
            </div>
        </td>
    </tr>
    <?php
            }
            }
            ?>




</tbody>
</table>