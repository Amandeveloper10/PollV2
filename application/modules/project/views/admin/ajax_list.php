<?php
    $this->load->model('admin/ProjectModel');
            if(!empty($value->employee_id))
            {
                $employee_id=explode(',',$value->employee_id);
                foreach ($employee_id as $value) {


            $res=    $this->ProjectModel->load_employee_details($value);
    ?>


       <img title="<?php echo @$res->first_name.' '.@$res->middle_name.' '.@$res->last_name; ?>" class="ks-avatar" src="<?php echo base_url(); ?>uploads/<?php echo (isset($res->personal_image) && @$res->personal_image != '') ? @$res->personal_image : ''; ?>" width="25" height="25">

    <?php
                }
            }
            ?>
                                                           