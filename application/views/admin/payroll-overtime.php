<div class="ks-page-header">
                <section class="ks-title">
                    <h3><span>Payroll > </span> Overtime Formula</h3>
                    <div class="ks-controls">
                        <button type="button" class="btn btn-success" onclick="$('.form-wrapper').slideToggle()">Add</button>
                    </div>
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
                                <a class="nav-link pjaxCls <?php if($this->uri->segment(1)=='payroll-wps'){ ?> ks-active <?php } ?>" href="<?php echo base_url('page/51'); ?>">
                                    <span>
                                        Download WPS File
                                    </span>
                                    <span class=" ks-icon la la-file-text-o" style="font-size: 20px; color: #666;"></span>
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
                        
                        <div class="form-wrapper mb-4" style="display:none">
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <table class="table table-list">
                                        <tbody>
                                            <tr>
                                                <td>Formula Name</td>
                                                <td></td>
                                                <td></td>
                                                <td>Component</td>
                                                <td></td>
                                                <td>Days</td>
                                                <td></td>
                                                <td>Hours</td>
                                                <td></td>
                                                <td></td>
                                                <td>Rate</td>
                                                
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control"></td>
                                                <td>=</td>
                                                <td>(</td>
                                                <td><select class="form-control">                                            
                                                    <option>Salary</option>
                                                    <option>Basic Salary</option>                                            
                                                  </select>
                                                </td>
                                                <td>/</td>
                                                <td><input type="text" class="form-control"></td>
                                                <td>/</td>
                                                <td><input type="text" class="form-control"></td>
                                                <td>)</td>
                                                <td>*</td>
                                                <td><input type="text" class="form-control"></td>                                                
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="button" onclick="$('.form-wrapper').slideToggle()" class="btn btn-secondary">Cancel</button>
                                        <button type="button" class="btn btn-success">Save</button>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                        
                        <table id="table_educations" class="table table-bordered">
                            <thead>
                              <tr>
                                <th style="width:240px">Overtime Name</th>
                                <th style="width:40px"></th>
                                <th>Formula</th>                                
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Labor OT - Normal </td>
                                <td> = </td>
                                <td>(Basic Salary/30/9)*1.25 </td>
                              </tr>
                              <tr>
                                <td>Labor OT - Weekend  </td>
                                <td> = </td>
                                <td> (Basic Salary/30/9)*1.5 </td>
                              </tr>                              
                              <tr>
                                <td>Labor OT - Public Holiday   </td>
                                <td> = </td>
                                <td> (Salary/30/9)*1.75 </td>
                              </tr>
                              
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>