<div class="ks-page-header">
                <section class="ks-title">
                    <h3><span>Payroll > </span> Gratuity Formula</h3>
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
                                <a class="nav-link pjaxCls <?php if($this->uri->segment(1)=='payroll-overtime'){ ?> ks-active <?php } ?>" href="<?php echo base_url('page/52'); ?>">
                                    <span>
                                        Overtime Formula
                                    </span>
                                    <span class="ks-icon la la-clock-o"  style="font-size: 20px; color: #666;"></span>
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
                                                <td>Gratuity Rule Name</td>
                                                <td></td>
                                                <td>Condition</td>
                                                <td>Year</td>
                                                <td></td>
                                                <td>Days</td>
                                                <td>Component</td>                                                
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control"></td>
                                                <td>If</td>                                                
                                                <td><select class="form-control">                                            
                                                    <option><</option>
                                                    <option><=</option>                                            
                                                    <option>=</option>                                            
                                                    <option>></option>                                            
                                                    <option>>=</option>                                            
                                                  </select>
                                                </td>                                                
                                                <td><input type="text" class="form-control"></td>                                                
                                                <td>=</td>                                                
                                                <td><input type="text" class="form-control"></td>                                                
                                                <td><select class="form-control">                                            
                                                    <option>Salary</option>
                                                    <option>Basic Salary</option>                                                    
                                                  </select>
                                                    
                                                </td>                                                
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
                                <th style="width:240px">Name</th>                                
                                <th>Formula</th>                                
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Gratuity Rule#1 - Resignation </td>                                
                                <td>If < 1 Year = 0 Days (Basic Salary) </td>
                              </tr>                              
                              <tr>
                                <td>Gratuity Rule#1 - Resignation </td>                                
                                <td>If >= 1 Year = 7 Days (Basic Salary) </td>
                              </tr>                              
                              <tr>
                                <td>Gratuity Rule#1 - Resignation </td>                                
                                <td>If >= 2 Year = 7 Days (Basic Salary)  </td>
                              </tr>                              
                              <tr>
                                <td>Gratuity Rule#2 - Termination </td>                                
                                <td> If <= 5 Year = 21 Days (Basic Salary) </td>
                              </tr>                              
                              <tr>
                                <td>Gratuity Rule#2 - Termination</td>                                
                                <td> If > 5 Year = 30 Days (Basic Salary) </td>
                              </tr>                              
                            </tbody>
                          </table>
                    </div>
                    
                </div>
            </div>