<?php
  if(!empty($all_data))
  {
  foreach ($all_data as $value) {
      ?>
  
<tr>
  <td>
        <?php echo @$value->employee_no; ?>
    </td>
    <td>
        <?php echo @$value->leave_from; ?>
    </td>
    <td>
       <?php echo @$value->leave_to; ?>
    </td>
    <td>
       <?php echo @$value->leave_total_days; ?>
    </td>
   <!-- <td>
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
                <span style="color: red;"><?php echo @$value->approved;?></span>
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
               <span style="color: green;"> <?php echo @$value->approved;?></span>
           <?php
                }
                ?>
    </td>
    <td>
        <?php echo @$value->leave_note; ?>
    </td>


     <td class="table-action">
      <?php if($type!='registered'){ ?>
        <div class="dropdown">
            <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="la la-ellipsis-v"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
              <?php
                if(@$value->approved=='')
                {
                ?>
                <a href="javascript:void(0)" onclick="openForm('<?php echo @$value->id;?>')" class="dropdown-item" style="cursor:pointer;">
                    <span class="la la-pencil icon text-info"></span> Edit
                </a>
                <?php
                }
                ?>
                
                <!-- <a href="javascript:void(0)" class="dropdown-item" style="cursor:pointer;" onclick="employees_leave_application_delete('<?php echo @$value->id;?>')"><span class="la la-trash icon text-danger"></span> Delete</a> -->
                <?php
                if(@$value->approved=='No')
                {
                ?>
                <a class="dropdown-item" style="cursor:pointer;" onclick="change_status('<?php echo @$value->id;?>','Yes','<?php echo @$value->employee_id;?>')">Make Approve</a>
                <?php
                }
                ?>
                 <?php
                if(@$value->approved=='')
                {
                ?>
                <a class="dropdown-item" style="cursor:pointer;" onclick="change_status('<?php echo @$value->id;?>','Yes','<?php echo @$value->employee_id;?>')">Make Approve(New)</a>
                <?php
                }
                ?>
                <?php
                if(@$value->approved=='Yes')
                {
                ?>
                <a class="dropdown-item" style="cursor:pointer;" onclick="change_status('<?php echo @$value->id;?>','No','<?php echo @$value->employee_id;?>')">Make Not Approve</a>
           <?php
                }
                ?>
            </div>
        </div>
      <?php } ?>
    </td> 
</tr>
<?php
  }
  }
  ?> 