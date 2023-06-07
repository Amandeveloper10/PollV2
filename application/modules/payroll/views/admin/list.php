<div class="ks-page-header">
    <section class="ks-title">
        <h3>Payroll</h3>
    </section>
</div>

<div class="ks-page-content">
    <div class="ks-page-content-body">
        <div class="container-fluid">        
            <div class="content-wrapper">
                <div class="custom-tab">
                    <ul class="nav nav-pills">                     
                        <li class="nav-item"><a class="nav-link active" data-toggle="pill" href="#tab_pending">Pending Process</a></li>                      
                       <!-- <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#tab_history">Payroll History</a></li>   -->                     
                    </ul>
                </div>
                
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="tab_pending" role="tabpanel" aria-expanded="false">
                        <div class="row">
                            <div class="col-lg-7 main-payroll">
                                <!--card 1--->
                               <?php if (!empty($month)) {
								   //echo '<pre>'; print_r($month);
                               foreach($month as $value) {
                                        //echo "<pre>"; print_r(date('F')); die;
                                        $monthName = date('F', mktime(0, 0, 0, $value, 10));
										//echo "<pre>"; print_r($monthName); die;
                                        //$Year = date('Y', mktime(0, 0, 0, $value, 10));
										$Year  = date('Y');
										//echo "<pre>"; print_r($Year); die;
                                        $monthnew =  date('m', mktime(0, 0, 0, $value, 10));
                                        $month_Year = $monthnew.'_'.$Year;
                                        
                                       //if($monthName == date('F')){
                                            if($salarycycle == 'fixedday'){
                                            $prividous_days = date('d M,Y', strtotime(date($Year.'-'.$monthnew.'-'.$cut_of_day)." -1 month +1 day"));
                                            $current_days = date('d M,Y', strtotime(date($Year.'-'.$monthnew.'-'.$cut_of_day))); 
                                            //echo $prividous_days.' To '.$current_days;

                                            $date1=date_create(date('Y-m-d', strtotime(date($Year.'-'.$monthnew.'-'.$cut_of_day)." -1 month +1 day")));
                                            $date2=date_create(date('Y-m-d',strtotime($current_days)));
                                            $diff=date_diff($date1,$date2);
                                            $C_Days = $diff->format("%R%a days");
                                            $Calender_Days = $C_Days+1;

                                            }else{
                                            $prividous_days = date('01-' . $value . '-Y'); // date("d M,Y", strtotime("first day of this month"));
                                            $current_days = date(date('t', strtotime($prividous_days)) .'-' . $value . '-Y');//date("d M,Y", strtotime("last day of this month"));
											
											//$firstday = date('01-' . $value . '-Y');
											//$lastday = date(date('t', strtotime($firstday)) .'-' . $value . '-Y');
											//echo $firstday; 
											//echo ".."; echo $firstday;  die;
                                            $date1=date_create(date('01-' . $value . '-Y'));
                                            $date2=date_create(date(date('t', strtotime($prividous_days)) .'-' . $value . '-Y'));
                                            $diff=date_diff($date1,$date2);
                                            $C_Days = $diff->format("%R%a days");
                                            // var_dump($C_Days); die();
                                            // $Calender_Days = $C_Days+1;
                                            $Calender_Days = $C_Days;
                                            }

                                            if($based_on_days == 'fixed_day'){
                                            $day = $day_of_processing.'-'.date('m-Y',strtotime($current_days));
                                            }else{
                                            $day = date('d-m-Y',strtotime('last day of'.$monthName, time()));
                                            }
											
											$totalemp = 0;
											$salary = 0;
                                            $Payable_PF = 0;
                                            $Payable_ESI = 0;
                                            $PF_Emp_Cont = 0;
                                            $ESI_Emp_Cont = 0;
                                            $totalDeduction = 0;
                                            $contribution = 0;
											$allemp_payroll = $this->PayrollModel->get_result_data('employee_payroll', array('month'=>$monthnew,'year'=>$Year));
                                            if(!empty($all_data)){
                                            
                                            foreach ($all_data as $empp) {
                                            $totalsalary = $this->PayrollModel->get_current_month_approx_salary($empp->id);
                                            if(!empty($totalsalary)){
										    $totalemp += 1;
                                            $salary += $totalsalary->ctc_amount/12;
                                            $Payable_PF += $totalsalary->employermothlypf;
                                            $Payable_ESI += $totalsalary->employermothlyesi;
                                            $PF_Emp_Cont += $totalsalary->employeemothlypf;
                                            $ESI_Emp_Cont += $totalsalary->employeemothlyesi;
                                            $contribution += $totalsalary->employeemothlypf + $totalsalary->employeemothlyesi;
                                            $totalDeduction += $totalsalary->employeemothlypf+$totalsalary->employeemothlyesi+$totalsalary->mothlyptax;
                                            }
                                            }
                                            }
                                        ?>
                                        <div class="card card-payroll">
                                    <div class="card-header">
                                        <h4><?=$monthName.' '.$Year?> <br> <small><?='Pay Period '.$prividous_days.' - '.$current_days?></small></h4>
                                       <?php if(count($allemp_payroll) != $totalemp){ ?> <?php if(strtotime($day)<strtotime(date('d-m-Y'))){ echo "<label class='badge badge-warning'>DUE</label>";}else{ echo "<label class='badge badge-primary'>CURRENT</label>";} ?><?php } ?>
                                    </div>                                    
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="row">
                                                    <div class="col-7">Total Pay Cost</div>
                                                    <div class="col-5 text-right"><?php echo number_format(round($salary));?></div>
                                                    <div class="col-7">Pay To Employee</div>
                                                    <div class="col-5 text-right"><?php echo number_format(round($salary) - $totalDeduction);?></div>
                                                    <div class="col-7">Pay Date</div>
                                                    <div class="col-5 text-right"> <label class='badge badge-warning'><?=$day?></label></div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="row">
                                                    <div class="col-7">Statutory Payable</div>
                                                    <div class="col-5 text-right"><?=number_format($contribution)?></div>
                                                    <div class="col-7">No. of Employee</div>
                                                    <div class="col-5 text-right"><?php echo $totalemp;//if(!empty($totalemployee)) { echo count($totalemployee); }else{ echo '0'; } ?></div>                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-4">
                                                <h3><?php echo number_format(round($salary));?> <br><small><?='Payable days '.$Calender_Days?></small></h3>
                                            </div>

                                            <?php $emp_payroll = $this->PayrollModel->get_row_data('employee_payroll', array('month'=>$monthnew,'year'=>$Year)); 
											
											
											?>

                                            
                                            <div class="col-8 text-right align-self-center">
                                              
                                             <?php if(!empty($emp_payroll)){ ?>
                                            <a href="<?php echo base_url('payroll_register/'.base64_encode($month_Year.'_view')); ?>" class="btn btn-warning pjaxCls">View Register</a>
                                        <?php } ?>
										<?php if(count($allemp_payroll) != $totalemp){ ?>
                                        <?php if(strtotime(date('Y-m-d')) >= strtotime(date($day))){ ?>
                                                <a href="<?php echo base_url('payroll_details/'.base64_encode($month_Year.'_payroll')); ?>" class="btn btn-warning pjaxCls">Process Pay Run</a>
                                        <?php } ?>
										<?php } ?>
                                            </div>                                            
                                        </div>
                                    </div>
                                </div>
									   <?php if($monthName == date('F')){ break; }//}
									  
									  }} ?>
                                <!--card end -->
                               
                                
                            </div>
                            <!--other payroll--->
                            <div class="col-lg-5">
                                <div class="d-block h-100 other-payroll">                                    
                                <h2>Other Payrolls</h2>
                                <!--other 1--->
                              <!--  <div class="card card-payroll">
                                    <div class="card-header">
                                        <h4>Bonus Payroll </h4>
                                        <i class="la la-gift"></i>
                                    </div>
                                    <div class="card-body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</div>
                                    <div class="card-footer text-right">
                                        <a href="<?php echo base_url('payroll_details'); ?>" class="btn btn-outline-success">Run Bonus Payroll</a>
                                    </div>
                                </div>-->
                                
                                <!--other 2--->
                                <div class="card card-payroll">
                                    <div class="card-header">
                                        <h4>Off-Cycle Payroll </h4>
                                        <i class="la la-money"></i>
                                    </div>
                                    <div class="card-body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</div>
									
                                    <div class="card-footer text-right">
									 <a href="<?php echo base_url('off_payroll_list'); ?>" class="btn btn-warning pjaxCls">Off Payroll</a>
                                        <a href="<?php echo base_url('off_cycle'); ?>" class="btn btn-outline-success pjaxCls">Run Off-Cycle Payroll</a>
                                    </div>
                                </div>
                                
                                <!--other 3--->
                                <div class="card card-payroll">
                                    <div class="card-header">
                                        <h4>Dismissal</h4>
                                        <i class="la la-handshake"></i>
                                    </div>
                                    <div class="card-body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</div>
                                    <div class="card-footer text-right">
                                        <a href="<?php echo base_url('payroll_details'); ?>" class="btn btn-outline-success">goto Check List</a>
                                    </div>
                                </div>
                            </div>                            
                            </div>                            
                        </div>
                    </div>
                    <!--history tab-->
                    <div class="tab-pane pt-4 px-4 pb-0" id="tab_history" role="tabpanel" aria-expanded="false">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card card-payroll">
                                    <div class="card-header">
                                        <h4>December 2019 <br> <small>Payroll date 25 Dec' 2019 - 24 Jan' 2020 </small></h4>                                        
                                    </div>                                    
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="row">
                                                    <div class="col-7">Total Pay Cost</div>
                                                    <div class="col-5 text-right">20,50,000</div>
                                                    <div class="col-7">Pay To Employee</div>
                                                    <div class="col-5 text-right">20,00,000</div>
                                                    <div class="col-7">Pay Date</div>
                                                    <div class="col-5 text-right"> <label class='badge badge-primary'>28-02-2020</label></div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="row">
                                                    <div class="col-7">Statutory Payable</div>
                                                    <div class="col-5 text-right">20,50,000</div>
                                                    <div class="col-7">No. of Employee</div>
                                                    <div class="col-5 text-right">280</div>                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-6">
                                                <h3>20,50,000 <br><small>Payable days 31</small></h3>
                                            </div>
                                            <div class="col-6 text-right align-self-center"><a href="#" class="btn btn-primary">Salary Register</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card card-payroll">
                                    <div class="card-header">
                                        <h4>November  2019 <br> <small>Payroll date 25 Jan' 2020 - 24 Feb' 2020 </small></h4>                                        
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="row">
                                                    <div class="col-7">Total Pay Cost</div>
                                                    <div class="col-5 text-right">20,50,000</div>
                                                    <div class="col-7">Pay To Employee</div>
                                                    <div class="col-5 text-right">20,50,000</div>
                                                    <div class="col-7">Pay Date</div>
                                                    <div class="col-5 text-right"> <label class='badge badge-primary'>28-02-2020</label></div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="row">
                                                    <div class="col-7">Statutory Payable</div>
                                                    <div class="col-5 text-right">20,50,000</div>
                                                    <div class="col-7">No. of Employee</div>
                                                    <div class="col-5 text-right">280</div>                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-6">
                                                <h3>20,50,000 <br><small>Payable days 28</small></h3>
                                            </div>
                                            <div class="col-6 text-right align-self-center"><a href="#" class="btn btn-primary">Salary Register</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card card-payroll">
                                    <div class="card-header">
                                        <h4>October 2019  <br> <small>Payroll date 25 Jan' 2020 - 24 Feb' 2020 </small></h4>                                        
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="row">
                                                    <div class="col-7">Total Pay Cost</div>
                                                    <div class="col-5 text-right">20,50,000</div>
                                                    <div class="col-7">Pay To Employee</div>
                                                    <div class="col-5 text-right">20,50,000</div>
                                                    <div class="col-7">Pay Date</div>
                                                    <div class="col-5 text-right"> <label class='badge badge-primary'>28-02-2020</label></div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="row">
                                                    <div class="col-7">Statutory Payable</div>
                                                    <div class="col-5 text-right">20,50,000</div>
                                                    <div class="col-7">No. of Employee</div>
                                                    <div class="col-5 text-right">280</div>                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-6">
                                                <h3>20,50,000 <br><small>Payable days 28</small></h3>
                                            </div>
                                            <div class="col-6 text-right align-self-center"><a href="#" class="btn btn-primary">Salary Register</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card card-payroll">
                                    <div class="card-header">
                                        <h4>September  2019  <br> <small>Payroll date 25 Jan' 2020 - 24 Feb' 2020 </small></h4>                                        
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="row">
                                                    <div class="col-7">Total Pay Cost</div>
                                                    <div class="col-5 text-right">20,50,000</div>
                                                    <div class="col-7">Pay To Employee</div>
                                                    <div class="col-5 text-right">20,50,000</div>
                                                    <div class="col-7">Pay Date</div>
                                                    <div class="col-5 text-right"> <label class='badge badge-primary'>28-02-2020</label></div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="row">
                                                    <div class="col-7">Statutory Payable</div>
                                                    <div class="col-5 text-right">20,50,000</div>
                                                    <div class="col-7">No. of Employee</div>
                                                    <div class="col-5 text-right">280</div>                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-6">
                                                <h3>20,50,000 <br><small>Payable days 28</small></h3>
                                            </div>
                                            <div class="col-6 text-right align-self-center"><a href="#" class="btn btn-primary">Salary Register</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="col-12 pl-4 mt-4"><p><small><span class='text-danger'>*</span> All amount in INR (<i class='fa fa-rupee-sign'></i>)</small></p></div>
                </div>
            </div>
        </div>
    </div>
</div>  

