<div class="ks-page-header">
    <section class="ks-title">
        <h3>Attendance Rules</h3>
        <div class="ks-controls">            
        </div>
    </section>
</div>

<div class="ks-page-content">
    <div class="ks-page-content-body">
        <div class="container-fluid">
        <div class="content-wrapper">
        
            
            <div class="form-wrapper">
                <form onsubmit="return myFunction('attendance_rules_form')" method="post" action="<?php echo base_url('admin_add_attendance_rules'); ?>" name="attendance_rules_form" id="attendance_rules_form" enctype="multipart/form-data" >
                  <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                              <label>Minimum Hrs for half day</label>
                              <input required type="text" class="form-control flatpickr" name="min_hrs_for_half_day" value="<?php echo (isset($data_single->min_hrs_for_half_day) ? $data_single->min_hrs_for_half_day : ''); ?>">HH : MM
                          </div>
                      </div>

                      <!-- <div class="col-md-6">
                          <div class="form-group">
                              <label>Minimum Hrs for full day</label>
                              <input type="text" class="form-control flatpickr"  name="min_hrs_for_full_day" value="<?php echo (isset($data_single->min_hrs_for_full_day) ? $data_single->min_hrs_for_full_day : ''); ?>">HH : MM
                          </div>        
                      </div> -->
                      <!-- </div>
                      <div class="row"> -->

                      <div class="col-md-4">
                          <div class="form-group">
                              <label>Incomplete present for less then</label>
                              <input type="text" class="form-control flatpickr"  name="incomplete_present_for_less_then" value="<?php echo (isset($data_single->incomplete_present_for_less_then) ? $data_single->incomplete_present_for_less_then : ''); ?>">HH : MM
                          </div>        
                      </div> 

                      <div class="col-md-4">
                          <div class="form-group">
                              <label>Over Time After Hour</label>
                              <input type="text" class="form-control flatpickr"  name="over_time_after_hour" value="<?php echo (isset($data_single->over_time_after_hour) ? $data_single->over_time_after_hour : ''); ?>">HH : MM
                          </div>        
                      </div>                      

                      </div> 
                      <div class="row">
                      <div class="col-md-12">
                      <div class="form-group text-right">
                           <button type="submit" name="submit" class="btn btn-dark">Save</button>
                      </div>
                      </div>
                  </div>
                  <hr>
                  </form>
            </div>
            
          
        </div>
        </div>
    </div>
</div>