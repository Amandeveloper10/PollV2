<div class="ks-page-header">
                <section class="ks-title">
                    <h3>Payroll</h3>
                </section>
            </div>
            <div class="ks-page-content">
                <div class="ks-page-content-body ks-content-nav ks-user-list-view">

                    <div class="ks-nav ks-browse">                        
                        <ul class="nav">                           
                            <li class="nav-item">
                                <a class="nav-link pjaxCls <?php if($this->uri->segment(1)=='payroll-wps'){ ?> ks-active <?php } ?>" href="<?php echo base_url('page/51'); ?>">
                                    <span>
                                        Download WPS File
                                    </span>
                                    <span class=" ks-icon la la-file-text-o" style="font-size: 20px; color: #666;"></span>
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
                    <div class="ks-nav-body">
                        
                        <div class="payroll-dashboard p-1">
                            <div class="row">
                                <div class="col-lg-12">
                                   <div class="ks-tabs-container ks-tabs-default ks-tabs-no-separator">
                                    <ul class="nav ks-nav-tabs">
                                        <li class="nav-item complete">
                                            <a class="nav-link" href="#" data-toggle="tab" data-target="#tab1">
                                                <div class="month">Apr <br> 2018 </div><span>Complete</span>
                                            </a>
                                        </li>
                                        <li class="nav-item complete">
                                            <a class="nav-link" href="#" data-toggle="tab" data-target="#tab2">
                                                <div class="month">May <br> 2018 </div><span>Complete</span>
                                            </a>
                                        </li>
                                        <li class="nav-item complete">
                                            <a class="nav-link" href="#" data-toggle="tab" data-target="#tab3">
                                                <div class="month">Jun <br> 2018 </div><span>Complete</span>
                                            </a>
                                        </li>
                                        <li class="nav-item complete">
                                            <a class="nav-link" href="#" data-toggle="tab" data-target="#tab4">
                                                <div class="month">Jul <br> 2018 </div><span>Complete</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active show" href="#" data-toggle="tab" data-target="#tab5">
                                               <div class="month"> Aug <br> 2018 </div><span>Complete</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="tab" data-target="#tab6">
                                                <div class="month">Sept <br> 2018 </div><span>Pending</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="tab" data-target="#tab7">
                                                <div class="month">Oct <br> 2018 </div><span>Pending</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="tab" data-target="#tab8">
                                                <div class="month">Nov <br> 2018 </div><span>Pending</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="tab" data-target="#tab9">
                                                <div class="month">Dec <br> 2018 </div><span>Pending</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="tab" data-target="#tab10">
                                                <div class="month">Jan <br> 2018 </div><span>Pending</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="tab" data-target="#tab11">
                                               <div class="month"> Feb <br> 2018 </div><span>Pending</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="tab" data-target="#tab12">
                                                <div class="month">Mar <br> 2018 </div><span>Pending</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane" id="tab1" role="tabpanel">
                                            Content 1
                                        </div>
                                        <div class="tab-pane" id="tab2" role="tabpanel">
                                            Content 2
                                        </div>
                                        <div class="tab-pane" id="tab3" role="tabpanel">
                                            Content 3
                                        </div>
                                        <div class="tab-pane" id="tab4" role="tabpanel">
                                            Content 3
                                        </div>
                                        <div class="tab-pane active show" id="tab5" role="tabpanel">
                                            Aug
                                        </div>
                                        <div class="tab-pane" id="tab6" role="tabpanel">
                                            Content 3
                                        </div>
                                        <div class="tab-pane" id="tab7" role="tabpanel">
                                            Content 3
                                        </div>
                                        <div class="tab-pane" id="tab8" role="tabpanel">
                                            Content 3
                                        </div>
                                        <div class="tab-pane" id="tab9" role="tabpanel">
                                            Content 3
                                        </div>
                                        <div class="tab-pane" id="tab10" role="tabpanel">
                                            Content 3
                                        </div>
                                        <div class="tab-pane" id="tab11" role="tabpanel">
                                            Content 3
                                        </div>
                                        <div class="tab-pane" id="tab12" role="tabpanel">
                                            Content 3
                                        </div>                                        
                                    </div>
                                </div> 
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="payroll-dashboard p-4">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card panel panel-purple ks-amount-widget" data-type="purple">
                                        <div class="card-header">
                                            This Month

                                            <div class="ks-controls">
                                                <a href="#" class="ks-control ks-update"><span class="ks-icon la la-refresh"></span></a>
                                            </div>
                                        </div>
                                        <div class="card-block panel-body">
                                            <div class="ks-amount">1,540</div>
                                            <div class="ks-progress">
                                                <div class="progress ks-progress-xs">
                                                    <div class="progress-bar bg-white" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="ks-desc ks-up">
                                                4% more than last month
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card panel panel-info ks-amount-widget" data-type="info">
                                        <div class="card-header">
                                            Previous Month

                                            <div class="ks-controls">
                                                <a href="#" class="ks-control ks-update"><span class="ks-icon la la-refresh"></span></a>
                                            </div>
                                        </div>
                                        <div class="card-block panel-body">
                                            <div class="ks-amount">756</div>
                                            <div class="ks-progress">
                                                <div class="progress ks-progress-xs">
                                                    <div class="progress-bar bg-white" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="ks-desc ks-down">
                                                8% less than last month
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card panel panel-success ks-amount-widget" data-type="success">
                                        <div class="card-header">
                                            New Payroll

                                            <div class="ks-controls">
                                                <a href="#" class="ks-control ks-update"><span class="ks-icon la la-refresh"></span></a>
                                            </div>
                                        </div>
                                        <div class="card-block panel-body">
                                            <div class="ks-amount">2,200</div>
                                            <div class="ks-progress">
                                                <div class="progress ks-progress-xs">
                                                    <div class="progress-bar bg-white" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="ks-desc ks-up">
                                                12% less than last month
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ks-user-list-view-header-block">
                            <h4 class="ks-user-list-view-header-block-name">
                                <span class="d-none d-sm-block">November, 2018</span>
                                <span class="ks-user-list-view-header-block-amount">
                                    <span class="ks-icon la la-users"></span>
                                    <span>280 emplyoees</span>
                                </span>
                            </h4>

                            <div class="ks-user-list-view-header-control">
                                <a href="#" class="btn btn-primary">Select Month</a>
                            </div>
                        </div>

                        <div class="ks-user-list-view-table">
                            <div class="ks-full-table">
                                <table id="ks-datatable" class="table ks-table-info dt-responsive nowrap" width="100%" data-pagination="true">
                                    <thead>
                                    <tr>
                                        <th>Employee No.</th>
                                        <th>Name</th>
                                        <th>Salary</th>
                                        <th>Overtime</th>
                                        <th>Bonus</th>
                                        <th>Status</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                0A-124
                                            </td>
                                            <td>
                                                <img src="<?php echo base_url(); ?>assets/img/avatars/avatar-1.jpg" class="ks-avatar" alt="" width="36" height="36">
                                                Scarlett Johansson
                                            </td>
                                            <td>
                                                $480
                                            </td>
                                            <td>
                                                $100
                                            </td>
                                            <td>
                                                $50
                                            </td>
                                            <td>
                                                <span class="badge badge-success">Sent</span>
                                            </td>
                                            <td class="table-action">
                                                <div class="dropdown">
                                                    <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="la la-ellipsis-v"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                        <a class="dropdown-item" href="#">
                                                            <span class="la la-eye icon text-primary-on-hover"></span> View
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                        </a>
                                                        <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                0A-124
                                            </td>
                                            <td>
                                                <img src="<?php echo base_url(); ?>assets/img/avatars/avatar-1.jpg" class="ks-avatar" alt="" width="36" height="36">
                                                Scarlett Johansson
                                            </td>
                                            <td>
                                                $480
                                            </td>
                                            <td>
                                                $100
                                            </td>
                                            <td>
                                                $50
                                            </td>
                                            <td>
                                                <span class="badge badge-danger">Due</span>
                                            </td>
                                            <td class="table-action">
                                                <div class="dropdown">
                                                    <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="la la-ellipsis-v"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                        <a class="dropdown-item" href="#">
                                                            <span class="la la-eye icon text-primary-on-hover"></span> View
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                        </a>
                                                        <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                0A-124
                                            </td>
                                            <td>
                                                <img src="<?php echo base_url(); ?>assets/img/avatars/avatar-1.jpg" class="ks-avatar" alt="" width="36" height="36">
                                                Scarlett Johansson
                                            </td>
                                            <td>
                                                $480
                                            </td>
                                            <td>
                                                $100
                                            </td>
                                            <td>
                                                $50
                                            </td>
                                            <td>
                                                <span class="badge badge-success">Sent</span>
                                            </td>
                                            <td class="table-action">
                                                <div class="dropdown">
                                                    <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="la la-ellipsis-v"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                        <a class="dropdown-item" href="#">
                                                            <span class="la la-eye icon text-primary-on-hover"></span> View
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                        </a>
                                                        <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                0A-124
                                            </td>
                                            <td>
                                                <img src="<?php echo base_url(); ?>assets/img/avatars/avatar-1.jpg" class="ks-avatar" alt="" width="36" height="36">
                                                Scarlett Johansson
                                            </td>
                                            <td>
                                                $480
                                            </td>
                                            <td>
                                                $100
                                            </td>
                                            <td>
                                                $50
                                            </td>
                                            <td>
                                                <span class="badge badge-success">Sent</span>
                                            </td>
                                            <td class="table-action">
                                                <div class="dropdown">
                                                    <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="la la-ellipsis-v"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                        <a class="dropdown-item" href="#">
                                                            <span class="la la-eye icon text-primary-on-hover"></span> View
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                        </a>
                                                        <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                0A-124
                                            </td>
                                            <td>
                                                <img src="<?php echo base_url(); ?>assets/img/avatars/avatar-1.jpg" class="ks-avatar" alt="" width="36" height="36">
                                                Scarlett Johansson
                                            </td>
                                            <td>
                                                $480
                                            </td>
                                            <td>
                                                $100
                                            </td>
                                            <td>
                                                $50
                                            </td>
                                            <td>
                                                <span class="badge badge-success">Sent</span>
                                            </td>
                                            <td class="table-action">
                                                <div class="dropdown">
                                                    <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="la la-ellipsis-v"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                        <a class="dropdown-item" href="#">
                                                            <span class="la la-eye icon text-primary-on-hover"></span> View
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                        </a>
                                                        <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                0A-124
                                            </td>
                                            <td>
                                                <img src="<?php echo base_url(); ?>assets/img/avatars/avatar-1.jpg" class="ks-avatar" alt="" width="36" height="36">
                                                Scarlett Johansson
                                            </td>
                                            <td>
                                                $480
                                            </td>
                                            <td>
                                                $100
                                            </td>
                                            <td>
                                                $50
                                            </td>
                                            <td>
                                                <span class="badge badge-success">Sent</span>
                                            </td>
                                            <td class="table-action">
                                                <div class="dropdown">
                                                    <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="la la-ellipsis-v"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                        <a class="dropdown-item" href="#">
                                                            <span class="la la-eye icon text-primary-on-hover"></span> View
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                        </a>
                                                        <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                0A-124
                                            </td>
                                            <td>
                                                <img src="<?php echo base_url(); ?>assets/img/avatars/avatar-1.jpg" class="ks-avatar" alt="" width="36" height="36">
                                                Scarlett Johansson
                                            </td>
                                            <td>
                                                $480
                                            </td>
                                            <td>
                                                $100
                                            </td>
                                            <td>
                                                $50
                                            </td>
                                            <td>
                                                <span class="badge badge-success">Sent</span>
                                            </td>
                                            <td class="table-action">
                                                <div class="dropdown">
                                                    <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="la la-ellipsis-v"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                        <a class="dropdown-item" href="#">
                                                            <span class="la la-eye icon text-primary-on-hover"></span> View
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                        </a>
                                                        <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                0A-124
                                            </td>
                                            <td>
                                                <img src="<?php echo base_url(); ?>assets/img/avatars/avatar-1.jpg" class="ks-avatar" alt="" width="36" height="36">
                                                Scarlett Johansson
                                            </td>
                                            <td>
                                                $480
                                            </td>
                                            <td>
                                                $100
                                            </td>
                                            <td>
                                                $50
                                            </td>
                                            <td>
                                                <span class="badge badge-success">Sent</span>
                                            </td>
                                            <td class="table-action">
                                                <div class="dropdown">
                                                    <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="la la-ellipsis-v"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                        <a class="dropdown-item" href="#">
                                                            <span class="la la-eye icon text-primary-on-hover"></span> View
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                        </a>
                                                        <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                0A-124
                                            </td>
                                            <td>
                                                <img src="<?php echo base_url(); ?>assets/img/avatars/avatar-1.jpg" class="ks-avatar" alt="" width="36" height="36">
                                                Scarlett Johansson
                                            </td>
                                            <td>
                                                $480
                                            </td>
                                            <td>
                                                $100
                                            </td>
                                            <td>
                                                $50
                                            </td>
                                            <td>
                                                <span class="badge badge-success">Sent</span>
                                            </td>
                                            <td class="table-action">
                                                <div class="dropdown">
                                                    <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="la la-ellipsis-v"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                        <a class="dropdown-item" href="#">
                                                            <span class="la la-eye icon text-primary-on-hover"></span> View
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                        </a>
                                                        <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                0A-124
                                            </td>
                                            <td>
                                                <img src="<?php echo base_url(); ?>assets/img/avatars/avatar-1.jpg" class="ks-avatar" alt="" width="36" height="36">
                                                Scarlett Johansson
                                            </td>
                                            <td>
                                                $480
                                            </td>
                                            <td>
                                                $100
                                            </td>
                                            <td>
                                                $50
                                            </td>
                                            <td>
                                                <span class="badge badge-success">Sent</span>
                                            </td>
                                            <td class="table-action">
                                                <div class="dropdown">
                                                    <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="la la-ellipsis-v"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                        <a class="dropdown-item" href="#">
                                                            <span class="la la-eye icon text-primary-on-hover"></span> View
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                        </a>
                                                        <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>