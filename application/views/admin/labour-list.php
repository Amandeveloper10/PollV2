<div class="ks-page-header">
                <section class="ks-title">
                    <h3>Labour List</h3>
                </section>
            </div>
            <div class="ks-page-content">
                <div class="ks-page-content-body ks-content-nav ks-user-list-view">
                    <div class="ks-nav ks-browse">
                        <div class="ks-separator">Browse</div>
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span>
                                        Department One
                                    </span>
                                    <span class="ks-badge badge badge-pill badge-success ks-badge-sm">150</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span>
                                        Department Two
                                    </span>
                                    <span class="ks-badge badge badge-pill badge-danger ks-badge-sm">94</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span>
                                        Department Three
                                    </span>
                                    <span class="ks-badge badge badge-pill badge-warning ks-badge-sm">25</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span>
                                        Department Four
                                    </span>
                                    <span class="ks-badge badge badge-pill badge-info ks-badge-sm">11</span>
                                </a>
                            </li>
                        </ul>

                        <div class="ks-separator">Source</div>
                        <ul class="nav">
                            <li class="nav-item">
                                <div class="nav-link">
                                    <div class="custom-control custom-checkbox">
                                        <input id="c1" type="checkbox" class="custom-control-input">
                                        <label class="custom-control-label" for="c1">Linkedin</label>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="nav-link">
                                    <div class="custom-control custom-checkbox">
                                        <input id="c2" type="checkbox" class="custom-control-input">
                                        <label class="custom-control-label" for="c2">Dribble</label>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="nav-link">
                                    <div class="custom-control custom-checkbox">
                                        <input id="c3" type="checkbox" class="custom-control-input">
                                        <label class="custom-control-label" for="c3">Github</label>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="nav-link">
                                    <div class="custom-control custom-checkbox">
                                        <input id="c4" type="checkbox" class="custom-control-input">
                                        <label class="custom-control-label" for="c4">Referred</label>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <div class="ks-separator">Statuses</div>
                        <ul class="nav">
                            <li class="nav-item">
                                <div class="nav-link">
                                    <div class="custom-control custom-checkbox">
                                        <input id="c5" type="checkbox" class="custom-control-input">
                                        <label class="custom-control-label" for="c5">On Service</label>
                                    </div>
                                    <span class="badge ks-circle badge-success"></span>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="nav-link">
                                    <div class="custom-control custom-checkbox">
                                        <input id="c6" type="checkbox" class="custom-control-input">
                                        <label class="custom-control-label" for="c6">On Vacation</label>
                                    </div>
                                    <span class="badge ks-circle badge-danger"></span>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="nav-link">
                                    <div class="custom-control custom-checkbox">
                                        <input id="c7" type="checkbox" class="custom-control-input">
                                        <label class="custom-control-label" for="c7">On Sick Leave</label>
                                    </div>
                                    <span class="badge ks-circle badge-warning"></span>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="nav-link">
                                    <div class="custom-control custom-checkbox">
                                        <input id="c8" type="checkbox" class="custom-control-input">
                                        <label class="custom-control-label" for="c8">Dispute</label>
                                    </div>
                                    <span class="badge ks-circle badge-info"></span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="ks-nav-body">
                        <div class="ks-user-list-view-header-block">
                            <h4 class="ks-user-list-view-header-block-name">
                                <span class="d-none d-sm-block">All Labour</span>
                                <span class="ks-user-list-view-header-block-amount">
                                    <span class="ks-icon la la-users"></span>
                                    <span>280 labours</span>
                                </span>
                            </h4>

                            <div class="ks-user-list-view-header-control">
                                <!-- <a href="add-labour.html" class="btn btn-success"> -->
                                <a class="btn btn-success pjaxCls" href="<?php echo base_url('page/54'); ?>">Add Labour</a>

                                

                            </div>
                        </div>

                        <div class="ks-user-list-view-table">
                            <div class="ks-full-table">
                                <table id="ks-datatable" class="table ks-table-info dt-responsive nowrap" width="100%" data-pagination="true">
                                    <thead>
                                    <tr>
                                        <th>Employee No.</th>
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Designation</th>
                                        <th>Joining Date</th>
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
                                                Department One
                                            </td>
                                            <td>
                                                Designation Name
                                            </td>
                                            <td>
                                                05/12/2016
                                            </td>
                                            <td>
                                                <span class="badge badge-success">On Service</span>
                                            </td>
                                            <td class="table-action">
                                                <div class="dropdown">
                                                    <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="la la-ellipsis-v"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                        <a class="dropdown-item pjaxCls" href="<?php echo base_url('page/55'); ?>">
                                                            <span class="la la-eye icon text-primary-on-hover"></span> View
                                                        </a>
                                                        <a class="dropdown-item pjaxCls" href="<?php echo base_url('page/55'); ?>">
                                                            <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                        </a>
                                                        <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                0A-125
                                            </td>
                                            <td>
                                                <img src="<?php echo base_url(); ?>assets/img/avatars/avatar-2.jpg" class="ks-avatar" alt="" width="36" height="36">
                                                Scarlett Johansson
                                            </td>
                                            <td>
                                                Department Two
                                            </td>
                                            <td>
                                                Designation Name
                                            </td>
                                            <td>
                                                11/10/2016
                                            </td>
                                            <td>
                                                <span class="badge badge-danger">On Vacation</span>
                                            </td>
                                            <td class="table-action">
                                                <div class="dropdown">
                                                    <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="la la-ellipsis-v"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                        <a class="dropdown-item pjaxCls" href="<?php echo base_url('page/55'); ?>">
                                                            <span class="la la-eye icon text-primary-on-hover"></span> View
                                                        </a>
                                                        <a class="dropdown-item pjaxCls" href="<?php echo base_url('page/55'); ?>">
                                                            <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                        </a>
                                                        <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                0A-126
                                            </td>
                                            <td>
                                                <img src="<?php echo base_url(); ?>assets/img/avatars/avatar-3.jpg" class="ks-avatar" alt="" width="36" height="36">
                                                Scarlett Johansson
                                            </td>
                                            <td>
                                                Department Three
                                            </td>
                                            <td>
                                                Designation Name
                                            </td>
                                            <td>
                                                05/09/2016
                                            </td>
                                            <td>
                                                <span class="badge badge-warning">On Sick Leave</span>
                                            </td>
                                            <td class="table-action">
                                                <div class="dropdown">
                                                    <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="la la-ellipsis-v"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                        <a class="dropdown-item pjaxCls" href="<?php echo base_url('page/55'); ?>">
                                                            <span class="la la-eye icon text-primary-on-hover"></span> View
                                                        </a>
                                                        <a class="dropdown-item pjaxCls" href="<?php echo base_url('page/55'); ?>">
                                                            <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                        </a>
                                                        <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                0A-127
                                            </td>
                                            <td>
                                                <img src="<?php echo base_url(); ?>assets/img/avatars/avatar-4.jpg" class="ks-avatar" alt="" width="36" height="36">
                                                Scarlett Johansson
                                            </td>
                                            <td>
                                                Department Four
                                            </td>
                                            <td>
                                                Designation Name
                                            </td>
                                            <td>
                                                07/12/2016
                                            </td>
                                            <td>
                                                <span class="badge badge-info">Dispute</span>
                                            </td>
                                            <td class="table-action">
                                                <div class="dropdown">
                                                    <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="la la-ellipsis-v"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                        <a class="dropdown-item pjaxCls" href="<?php echo base_url('page/55'); ?>">
                                                            <span class="la la-eye icon text-primary-on-hover"></span> View
                                                        </a>
                                                        <a class="dropdown-item pjaxCls" href="<?php echo base_url('page/55'); ?>">
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
                                                Department One
                                            </td>
                                            <td>
                                                Designation Name
                                            </td>
                                            <td>
                                                05/12/2016
                                            </td>
                                            <td>
                                                <span class="badge badge-success">On Service</span>
                                            </td>
                                            <td class="table-action">
                                                <div class="dropdown">
                                                    <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="la la-ellipsis-v"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                        <a class="dropdown-item pjaxCls" href="<?php echo base_url('page/55'); ?>">
                                                            <span class="la la-eye icon text-primary-on-hover"></span> View
                                                        </a>
                                                        <a class="dropdown-item pjaxCls" href="<?php echo base_url('page/55'); ?>">
                                                            <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                        </a>
                                                        <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                0A-125
                                            </td>
                                            <td>
                                                <img src="<?php echo base_url(); ?>assets/img/avatars/avatar-2.jpg" class="ks-avatar" alt="" width="36" height="36">
                                                Scarlett Johansson
                                            </td>
                                            <td>
                                                Department Two
                                            </td>
                                            <td>
                                                Designation Name
                                            </td>
                                            <td>
                                                11/10/2016
                                            </td>
                                            <td>
                                                <span class="badge badge-danger">On Vacation</span>
                                            </td>
                                            <td class="table-action">
                                                <div class="dropdown">
                                                    <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="la la-ellipsis-v"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                        <a class="dropdown-item pjaxCls" href="<?php echo base_url('page/55'); ?>">
                                                            <span class="la la-eye icon text-primary-on-hover"></span> View
                                                        </a>
                                                        <a class="dropdown-item pjaxCls" href="<?php echo base_url('page/55'); ?>">
                                                            <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                        </a>
                                                        <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                0A-126
                                            </td>
                                            <td>
                                                <img src="<?php echo base_url(); ?>assets/img/avatars/avatar-3.jpg" class="ks-avatar" alt="" width="36" height="36">
                                                Scarlett Johansson
                                            </td>
                                            <td>
                                                Department Three
                                            </td>
                                            <td>
                                                Designation Name
                                            </td>
                                            <td>
                                                05/09/2016
                                            </td>
                                            <td>
                                                <span class="badge badge-warning">On Sick Leave</span>
                                            </td>
                                            <td class="table-action">
                                                <div class="dropdown">
                                                    <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="la la-ellipsis-v"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                        <a class="dropdown-item pjaxCls" href="<?php echo base_url('page/55'); ?>">
                                                            <span class="la la-eye icon text-primary-on-hover"></span> View
                                                        </a>
                                                        <a class="dropdown-item pjaxCls" href="<?php echo base_url('page/55'); ?>">
                                                            <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                        </a>
                                                        <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                0A-127
                                            </td>
                                            <td>
                                                <img src="<?php echo base_url(); ?>assets/img/avatars/avatar-4.jpg" class="ks-avatar" alt="" width="36" height="36">
                                                Scarlett Johansson
                                            </td>
                                            <td>
                                                Department Four
                                            </td>
                                            <td>
                                                Designation Name
                                            </td>
                                            <td>
                                                07/12/2016
                                            </td>
                                            <td>
                                                <span class="badge badge-info">Dispute</span>
                                            </td>
                                            <td class="table-action">
                                                <div class="dropdown">
                                                    <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="la la-ellipsis-v"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                        <a class="dropdown-item pjaxCls" href="<?php echo base_url('page/55'); ?>">
                                                            <span class="la la-eye icon text-primary-on-hover"></span> View
                                                        </a>
                                                        <a class="dropdown-item pjaxCls" href="<?php echo base_url('page/55'); ?>">
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
                                                Department One
                                            </td>
                                            <td>
                                                Designation Name
                                            </td>
                                            <td>
                                                05/12/2016
                                            </td>
                                            <td>
                                                <span class="badge badge-success">On Service</span>
                                            </td>
                                            <td class="table-action">
                                                <div class="dropdown">
                                                    <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="la la-ellipsis-v"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                        <a class="dropdown-item pjaxCls" href="<?php echo base_url('page/55'); ?>">
                                                            <span class="la la-eye icon text-primary-on-hover"></span> View
                                                        </a>
                                                        <a class="dropdown-item pjaxCls" href="<?php echo base_url('page/55'); ?>">
                                                            <span class="la la-pencil icon text-primary-on-hover"></span> Edit
                                                        </a>
                                                        <a class="dropdown-item" href="#"><span class="la la-trash icon text-danger-on-hover"></span> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                0A-125
                                            </td>
                                            <td>
                                                <img src="<?php echo base_url(); ?>assets/img/avatars/avatar-2.jpg" class="ks-avatar" alt="" width="36" height="36">
                                                Scarlett Johansson
                                            </td>
                                            <td>
                                                Department Two
                                            </td>
                                            <td>
                                                Designation Name
                                            </td>
                                            <td>
                                                11/10/2016
                                            </td>
                                            <td>
                                                <span class="badge badge-danger">On Vacation</span>
                                            </td>
                                            <td class="table-action">
                                                <div class="dropdown">
                                                    <a class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="la la-ellipsis-v"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                        <a class="dropdown-item pjaxCls" href="<?php echo base_url('page/55'); ?>">
                                                            <span class="la la-eye icon text-primary-on-hover"></span> View
                                                        </a>
                                                        <a class="dropdown-item pjaxCls" href="<?php echo base_url('page/55'); ?>">
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