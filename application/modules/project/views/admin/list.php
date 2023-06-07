<div class="ks-page-header">
    <section class="ks-title">
        <h3>Projects</h3>
        <div class="ks-controls">
            <button onclick="openForm('');" class="btn btn-primary btn-add-project">Add</button>
        </div>
    </section>
</div>


            <div class="ks-page-content">
                <div class="ks-page-content-body ks-projects-grid-board">
                    <div class="ks-projects-grid-board-projects">
                        <div class="ks-projects-grid-board-header">
                            <form style="width: 100%;" onsubmit="return myFunction('projects_search')" method="post" action="<?php echo  base_url('admin_projects_search'); ?>" name="projects_search" id="projects_search" >
                            <div class="ks-search">
                                <div class="input-icon icon-right icon icon-lg icon-color-primary">
                                    <input id="input-group-icon-text" type="text" name="search" class="form-control " placeholder="Search">
                                    <span class="icon-addon">
                                        <button class="btn btn-secondary" title="click to search" type="submit" style="padding: 10px 14px !important" > <span class="la la-search"></span> </button>
                                    </span>
                                </div>
                            </div>
                                
                            </form>
                            
                        </div>
                        
                        <div class="add-project p-3 mb-3" style="display: none;">
                        </div>
                        
<!--                        <div class="row">
                            <div class="col-xl-8">
                                xx
                            </div>
                            <div class="col-xl-4">
                                yy
                            </div>
                        </div>-->
                        
                        <div class="ks-projects-grid-board-body ks-scrollable">
                            <div  class="ks-scroll-wrapper ks-rows-section">
                                
                                    <?php
                                    if(!empty($all_data)){
                                        $i=1;
                                        foreach ($all_data as $value) {
                                         if ($i%3 == 1)
                                        {  
                                             echo '<div class="row">';
                                        }
                                    ?>
                                    <div  class="col-xl-4 col-lg-6 project-card">
                                        <div class="card panel panel-default ks-project">
                                            <div class="ks-project-header">
                                                <a href="#" class=""></a>
                                                <div class="dropdown ks-control">
                                                    <a class="btn btn-link ks-no-text ks-no-arrow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="la la-ellipsis-v ks-icon"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                        <a class="dropdown-item" href="javascript:void(0)" onclick="openForm(<?php echo $value->id; ?>);" >Edit</a>
<!--                                                        <a class="dropdown-item" href="#">Add Card</a>-->
                                                        <a class="dropdown-item" href="javascript:void(0)" onclick="delete_this(<?php echo $value->id; ?>);">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ks-project-body">
                                                <a href="#" class="ks-name">
                                                    <img src="<?php echo base_url(); ?>uploads/<?php echo (isset($value->image) && $value->image != '') ? $value->image : ''; ?>" width="55" height="55" class="ks-image">
                                                    <span class="ks-text"><?php echo $value->project_name; ?></span>
                                                </a>
                                                <div class="ks-description">
                                                    <?php echo substr($value->description,'0','60'); ?>…
                                                </div>
                                                <div class="ks-meta">
                                                    <div class="ks-item">
                                                        <div class="ks-name">
                                                            Deadline
                                                        </div>
                                                        <div class="ks-description">
                                                            <?php echo date("d M-Y", strtotime(@$value->end_date)); ?>
                                                        </div>
                                                    </div>
<!--                                                    <div class="ks-item">
                                                        <div class="ks-name">
                                                            Progress
                                                        </div>
                                                        <div class="ks-description">
                                                            <div class="ks-progress ks-progress-inline">
                                                                <div class="progress ks-progress-xs">
                                                                    <div class="progress-bar bg-info" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                                <span class="ks-amount">75%</span>
                                                            </div>
                                                        </div>
                                                    </div>-->
                                                    <div class="ks-item ks-images">
                                                        <div class="ks-name">
                                                            Assigned to
                                                        </div>
                                                        <div  class="ks-description">
                                                       <a class="ks-image project_div_<?php echo $value->id; ?>"  href="#" >
                                                            <?php
                                                            $this->load->model('admin/ProjectModel');
                                                                    if(!empty($value->employee_id))
                                                                    {
                                                                        $employee_id=explode(',',@$value->employee_id);
                                                                        foreach ($employee_id as $valuenew) {
                                                                            
                                                                        
                                                                     $res=   $this->ProjectModel->load_employee_details(@$valuenew);
                                                            ?>
                                                            
                                                           
                                                                <img title="<?php echo @$res->first_name.' '.@$res->middle_name.' '.@$res->last_name; ?>" class="ks-avatar" src="<?php echo base_url(); ?>uploads/<?php echo (isset($res->personal_image) && @$res->personal_image != '') ? @$res->personal_image : ''; ?>" width="25" height="25">
                                                           
                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                          </a>
                                                            <a href="" data-toggle="modal" onclick="projrctid('<?php echo @$value->id; ?>')" data-target="#myModal_employee" title="Add Employee" class="ks-add">+</a>
                                                        </div>
                                                    </div>
                                                </div>
<!--                                                <div class="ks-tags">
                                                    <span class="badge badge-success-outline">Design</span>
                                                    <span class="badge badge-info-outline">Development</span>
                                                    <span class="badge badge-pink-outline">front-end</span>
                                                </div>-->
                                                <div class="ks-controls">
                                                    <a href="#" class="ks-control" data-toggle="tooltip" data-placement="top" title="" data-original-title="Comments">
                                                        <span class="la la-comment-o ks-icon"></span>
                                                        <span class="ks-amount">2</span>
                                                    </a>
                                                    <a href="#" class="ks-control" data-toggle="tooltip" data-placement="top" title="" data-original-title="Documents">
                                                        <span class="la la-file-o ks-icon"></span>
                                                        <span class="ks-amount">16</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                     if ($i%3 == 0)
                                        {
                                            echo "</div>";
                                        }
                                    $i++;
                                        }
                                    }
                                        ?>

                                </div>
                                
                                

                            </div>
                        </div>
                  </div>
                    <div class="ks-projects-grid-board-tasks">
                        <div class="ks-projects-grid-board-tasks-list">
                            <div class="ks-projects-grid-board-tasks-header">
                                <span class="ks-text">Projects & Deadline</span>
<!--                                <div class="ks-progress ks-progress-inline">
                                    <div class="progress ks-progress-xs">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="ks-amount">75%</span>
                                </div>-->
                            </div>
                            <div class="ks-projects-grid-board-tasks-body ks-scrollable">
                                <div class="jspPane-padding" style="padding:10px 0">
                                     <?php
                                    if(!empty($all_data)){
                                       
                                        foreach ($all_data as $value) {
                                        
                                    ?>
                                    <div class="custom-control">
<!--                                        <input id="c5" type="checkbox" class="custom-control-input">-->
                                        <label class="" for="c5"><?php echo ' <b style="color:red">* '.$value->project_name .'</b>&nbsp;&nbsp;'.$value->end_date; ?></label>
                                    </div>
                                    <?php
                                    }
                                    }
                                    ?>
<!--                                    <div class="custom-control custom-checkbox ks-checkbox ks-checkbox-success">
                                        <input id="c6" type="checkbox" class="custom-control-input">
                                        <label class="custom-control-label" for="c6">iOS app design</label>
                                    </div>-->
                                    
                                </div>
                            </div>
                        </div>
<!--                        <table class="ks-projects-grid-board-tasks-statistics">
                            <tr>
                                <td rowspan="2" class="ks-chart">
                                    <div id="ks-projects-progress-chart" class="ks-radial-progress-chart ks-purple"></div>
                                </td>
                                <td class="ks-statistic-item">
                                    <span class="ks-amount">22</span>
                                    <span class="ks-text">projects finished</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="ks-statistic-item">
                                    <span class="ks-amount">4</span>
                                    <span class="ks-text">projects in progress</span>
                                </td>
                            </tr>
                        </table>-->
                    </div>
                </div>
            
           

<!--
  Notification DIV 
  This div acts as the notification before performing any action
-->
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="notification_heading"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" >
       <p id="notification_body"></p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <a data-dismiss="modal" id="modal_confirm" class="btn btn-primary" href="#">Confirm</a> 
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- [end] Notification DIV -->

<script type="text/javascript">
  function openForm(id){
      //alert()
       $.post("<?php echo base_url('admin_get_edit_form_project'); ?>", {id: id}, function(result){
          //console.log(result);
       $(".add-project").html(result);
       $(".add-project").show(); 
       $(".btn-add-project").hide(); 
       $('.flatpickrDate').flatpickr();
  });
  }
 

  function closeForm() {
    $(".add-project").html('');
    $(".add-project").hide();
    $(".btn-add-project").show(); 
  }


  function delete_this(id) {
        $("#myModal").on('shown.bs.modal', function() {
            $("#modal_confirm").click(function() {
               var url = "<?php echo base_url('admin_delete_project'); ?>/" + id;
                $("#pjax-container").load(url,function(response,status){       
                    $('#ks-datatable').bootstrapTable({
                        icons: {
                            refresh: 'la la-refresh icon-refresh',
                            toggle: 'la la-list-alt icon-list-alt',
                            columns: 'la la-th icon-th',
                            share: 'la la-download icon-share'
                        }
                    });
                    notification(status);
                });
            });

            $("#notification_heading").html("Confirmation");
            $("#notification_body").html("Do you want to Delete this project?");
        }).modal("show");
    }

</script>
<!-- Modal -->
<div id="myModal_employee" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
<!--      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Employee</h4>
      </div>-->
      <div class="modal-body">
          <form method="post" name="employee_form" id="employee_form">
          <div class="row">
              <div class="col-sm-12">
            <div class="form-group">
                <label for="" class="form-control-label">Employee Name</label>
<!--                <input type="text" placeholder="Enter Vehicle No." class="form-control" name="vehicle_no" value="<?php echo (isset($data_single->vehicle_no) ? $data_single->vehicle_no : ''); ?>">-->

                <select name="employee_id[]" multiple id="employee_id" class="form-control js-example-basic-multiple" multiple>>
                    <option value="">Please select</option>
                    <?php
                    if(!empty($all_employee)) 
                    {
                    foreach ($all_employee as $value) {
                        
                   
                    ?>
                    <option value="<?php echo @$value->id ?>" <?php echo ((!empty($data_single->employe_id) && ($value->id==$data_single->employe_id)) ? 'selected' : ''); ?>><?php echo @$value->first_name.'' .@$value->middle_name.''.@$value->last_name; ?> (<?php echo @$value->employee_no; ?>)</option>
                  <?php
                    }
                    }
                    ?>
                </select> 
            </div>
        </div>
          </div>
              <input type="hidden" name="project_id" id="project_id" value=""/>
          </form>
      </div>
      <div class="modal-footer">
          <a  onclick="employee_assign();" class="btn btn-primary" >Add</a> 
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script>
    function employee_assign(){ 
      //  alert(1);
     var id=   $('#project_id').val();
    //  $(".project_div_"+id).html('');
   //  alert(id);
        $.ajax({
                    url: '<?php echo base_url('admin_add_employee_project'); ?>',
                    type: 'POST',
                    data: new FormData($("#employee_form")[0]),
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        console.log(data);
                       
                        $(".project_div_"+id).html(data);
                        $('#myModal_employee').modal('hide');
                    }
                
                });
                }
              function projrctid(value){
             $('#project_id').val(value); 
             
              var id=   $('#project_id').val();
    // alert(id);
        $.ajax({
                    url: '<?php echo base_url('admin_assigned_employee'); ?>',
                    type: 'POST',
                    data: new FormData($("#employee_form")[0]),
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        console.log(data);
                        $("#employee_id").html(data);
                      //  $('#myModal_employee').modal('hide');
                    }
                
                });
             
    }
    </script>
    