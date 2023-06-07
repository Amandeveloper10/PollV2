<div class="ks-page-header">
                <section class="ks-title">
                    <h3><span>Payroll > </span> Download WPS File</h3>                    
                </section>
            </div>
            <div class="ks-page-content">
                <div class="ks-page-content-body ks-content-nav ks-user-list-view">
                    <div class="ks-nav ks-browse">                        
                        <ul class="nav">                            
                            <li class="nav-item">
                                <a class="nav-link pjaxCls <?php if($this->uri->segment(1)=='payroll'){ ?> ks-active <?php } ?>" href="<?php echo base_url('page/46'); ?>">
                                    <span>
                                        Dashboard
                                    </span>
                                    <span class=" ks-icon la la-dashboard" style="font-size: 20px; color: #666;"></span>
                                </a>
                            </li>                            
                            <li class="nav-item">
                                <a class="nav-link pjaxCls <?php if($this->uri->segment(1)=='payroll-overtime'){ ?> ks-active <?php } ?>" href="<?php echo base_url('page/52'); ?>">
                                    <span>
                                        Overtime Formula
                                    </span>
                                    <span class="ks-icon la la-clock-o"  style="font-size: 20px; color: #666;"></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pjaxCls <?php if($this->uri->segment(1)=='payroll-gratuity'){ ?> ks-active <?php } ?>" href="<?php echo base_url('page/53'); ?>"> 
                                    <span>
                                        Gratuity Formula
                                    </span>
                                    <span class="ks-icon la la-calendar"  style="font-size: 20px; color: #666;"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="ks-nav-body p-4">
                        
                        <div class="row">
                            <div class="col-4">
                                <label>Select Year</label>
                                <select class="form-control">
                                    <option>2018</option>
                                    <option>2017</option>
                                    <option>2015</option>
                                    <option>2014</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label>Select Month</label>
                                <select class="form-control">
                                    <option>April</option>
                                    <option>May</option>
                                    <option>June</option>
                                    <option>July</option>
                                    <option>August</option>
                                </select>
                            </div>                            
                            <div class="col-4">
                                <label>Download</label><br>
                                <a href=""><span class="la la-3x la-cloud-download"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>