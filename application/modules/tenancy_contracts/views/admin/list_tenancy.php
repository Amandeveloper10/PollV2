<div class="ks-page-header">
    <section class="ks-title">
        <h3><span>HR > </span> Tenancy Contracts</h3>
        <div class="ks-controls">
            <a href="javascript:void(0)" class="btn btn-primary btn-add-tenancy" onclick="openForm('');">Add</a>
        </div>
    </section>
</div>

<div class="ks-page-content">
    <div class="ks-page-content-body">
        <div class="container-fluid">
        <div class="content-wrapper">            
            <div class="add-tenancy mb-4" style="display:none">
                
            </div>           
            
            <div class="table-responsiveX">
            <table id="ksdatatable" class="table table-list">  
                        <thead>
                        <tr>
                            <th>Room Type</th>
                            <th>Name</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                    $sl = 1;
                    if (!empty($all_data)) {
                      foreach ($all_data as $data) {
                    ?>

                            <tr>
                                <td><?php echo $data->type; ?></td>
                                <td><?php echo $data->name; ?></td>
                                <td class="table-action">
                                    <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="la la-ellipsis-v"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                        <a class="dropdown-item pjaxCls" href="<?php echo base_url('page/61/'); ?><?php echo $data->id; ?>">
                                                <span class="la la-eye icon text-primary-on-hover"></span> View
                                            </a>
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="openForm(<?php echo $data->id; ?>);">
                                                <span class="la la-pencil icon text-info"></span> Edit
                                            </a>
                                    </div>                                                
                                </td>                     
                            </tr>                         
                            <?php $sl++; } } ?>                             
                        </tbody>
                    </table>
            </div>
        </div>
        </div>
    </div>
</div>       
                
<script type="text/javascript">
  function openForm(id){
       $.post("<?php echo base_url('admin_get_edit_form_tenancy'); ?>", {id: id}, function(result){
          //console.log(result);
       $(".add-tenancy").html(result);
       $(".add-tenancy").show(); 
       $(".btn-add-tenancy").hide(); 
    });
  }
  function closeForm() {
    $(".add-tenancy").html('');
    $(".add-tenancy").hide();
    $(".btn-add-tenancy").show(); 
  }

  function getTenType(TypeId) {
      if(TypeId=='Office'){
        $(".campDiv").hide(); 
        $(".allDiv").hide();  
      }else if(TypeId=='Camp'){
        $(".campDiv").show();
        $(".allDiv").hide();   
      }else if(TypeId=='Store'){
        $(".campDiv").hide();
        $(".allDiv").hide();   
      }else if(TypeId=='Villa'){
        $(".campDiv").hide();
        $(".allDiv").show();   
      }else if(TypeId=='Apartment'){
         $(".campDiv").hide();
        $(".allDiv").show();    
      }else if(TypeId=='Studio'){
         $(".campDiv").hide();
        $(".allDiv").show();     
      }else{
        $(".campDiv").hide(); 
        $(".allDiv").hide();  
      }
  }
</script>