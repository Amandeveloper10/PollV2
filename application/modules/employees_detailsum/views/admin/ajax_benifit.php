 <table  class="table table-bordered mb-0 mt-4">
<thead>
    <tr>
        <th width="10"></th>
        <th>Policy Name</th>
        <th></th>
    </tr>
    </thead>
    <tbody>

        <?php
		$sl = 1;
        if(!empty($all_employee_policy))
        {
            foreach ($all_employee_policy as $value) {


        ?>
        <tr id="benifit_delete<?php echo @$value->id; ?>">
        <td scope="row"><?=$sl?></td>
        <td><?php echo @$value->policy_name;?></td>
        <td class="table-action">
            <div class="dropdown">
            <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="la la-ellipsis-v"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                <a class="dropdown-item text-primary" onclick="goforbenifitedit('<?php echo @$value->id;?>')"><span title="Delete" class="la la-pencil"></span> Edit</a>
                <a class="dropdown-item text-danger" onclick="goforbenifitdelete('<?php echo @$value->id;?>')"><span title="Delete" class="la la-trash"></span> Delete</a>
            </div>
        </div>
        </td>
        
    </tr>
    <?php $sl ++;
            }
        }
        ?>

    </tbody>
	</table>