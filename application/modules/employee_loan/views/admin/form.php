<form onsubmit="return myFunction('employee_loan_form')" method="post" action="<?php echo (isset($id) && $id != '') ? base_url('admin_edit_employee_loan').'/'.$id : base_url('admin_add_employee_loan'); ?>" name="employee_loan_form" id="employee_loan_form" enctype="multipart/form-data" >
  <input type="hidden" name="loan_application_edit_id" id="loan_application_edit_id" value="<?php echo (isset($data_single->id) ? $data_single->id : ''); ?>"> 
                    <div class="row">
                        <div class="col-sm-6 col-xl-4">
                        <div class="form-group">
                        <label>Employee No</label>
                        <select id="employee_id" name="employee_id" class="form-control">
                        <option>Select</option>   
                        <?php
                        if(!empty($all_employee))
                        {
                        foreach ($all_employee as $employee) {
                        ?>
                        <option value="<?php echo $employee->id;?>"  <?php echo ((isset($data_single->employee_id) && ($data_single->employee_id==$employee->id)) ? 'selected' : ''); ?>><?php echo $employee->first_name.' '.$employee->last_name.' ('.$employee->employee_no.')';?></option>
                        <?php
                        }
                        }
                        ?> 
                        </select> 
                        </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Reference Name</label>
                                <input type="text" placeholder="Enter Reference Name" class="form-control inputDisabled" name='reference_name'  id='reference_name' value="<?php echo (isset($data_single->reference_name) ? $data_single->reference_name : ''); ?>" >
                            </div>
                        </div>
                      
                        
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Request Amount</label>
                                <input type="text" placeholder="Enter Visa Cost" required class="form-control inputDisabled" name='request_amount'  id='request_amount' value="<?php echo (isset($data_single->request_amount) ? $data_single->request_amount : ''); ?>" >
                            </div>
                        </div>                    
                    
                        
                       
                        <div class="col-sm-6 col-xl-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Supporting Attachment</label>
                                    <div class="input-group">
<!--                                        <input type="text" class="form-control forCustomFile inputDisabled" placeholder="Upload file" name="select" id="" required value="Society Id Front Image" >-->
                                        <div class="custom-file replaceCustomFile" >
                                            <input type="file" multiple class="custom-file-input" name="attachment[]" id="attachment">
                                            <label class="custom-file-label" for="attachment">Upload Multiple file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#attachment_modal" title="View"><span class="la la-eye ks-icon ml-2"></span></button>
                                        </div>
                                        <!-- Society Id Front Modal -->
                                        <div class="modal fade" id="attachment_modal" tabindex="-1" role="dialog"aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Supporting Attachment</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div id="docs" class="text-center">
<!--                                                            <img src="<?php echo base_url(); ?>uploads/<?php echo @$data_qualification->society_id_front; ?>" alt="" class="img-fluid">-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         <script>
                    function approvedform(value){
                        if(value=='Yes')
                        {
                     $('#approve_div').show();  
                     $('#nonapprove_div').hide();  
                      $('#loan_approved_hidden').val('Yes');  
                     
                        }
                        else{
                     $('#approve_div').hide();  
                     $('#nonapprove_div').show();  
                      $('#loan_approved_hidden').val('No');    
                        }
                    }
                </script>
                    <?php
                                                 if($this->session->userdata('type')=='management')
                                                 {
                                                ?>
                        <div class="col-sm-6 col-xl-4">
                                            <div class="form-group">
                                                <label class="d-block">Loan Approved</label>
                                                <div class="d-inline-block mt-2">
                                                    <div class="custom-control custom-radio ks-radio ks-success">
                                                        <input id="loan_approved" <?php if(isset($data_single->loan_approved) && $data_single->loan_approved == 'Yes'){ echo 'checked';} ?> type="radio" class="custom-control-input" onclick="approvedform(this.value);" value="Yes" name="loan_approved"
                                                               data-validation="radio_group"
                                                               data-validation-qty="min1">
                                                        <label class="custom-control-label" for="loan_approved">Yes</label>
                                                    </div>
                                                </div>
                                                <div class="d-inline-block mt-2 ml-3">
                                                    <div class="custom-control custom-radio ks-radio ks-danger">
                                                        <input id="loan_approved1" type="radio" <?php if(isset($data_single->loan_approved) && $data_single->loan_approved == 'No'){ echo 'checked';} ?> class="custom-control-input" onclick="approvedform(this.value);" value="No" name="loan_approved" 
                                                               data-validation="radio_group"
                                                               data-validation-qty="min1">
                                                        <label class="custom-control-label" for="loan_approved1">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="loan_approved_hidden" id="loan_approved_hidden" value="<?php echo (isset($data_single->loan_approved) ? $data_single->loan_approved : ''); ?>">
                                        </div>
                <?php
                                                 }
                                                 ?>
                
                        <div class="col-sm-12 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Purpose Of Loan Note</label>
                                <textarea rows="3"  placeholder="Loan Requirement Note" class="form-control inputDisabled" name='loan_requirement_note'  id='loan_requirement_note'><?php echo (isset($data_single->loan_requirement_note) ? $data_single->loan_requirement_note : ''); ?></textarea>
                            </div>
                        </div>
                    </div>
                        
                <div <?php if(isset($data_single->loan_approved) && $data_single->loan_approved == 'Yes'){ echo '';}else{?>style="display:none;"<?php } ?> class="row" id="approve_div">
                         <div class="col-sm-6 col-xl-4"> 
                            <div class="form-group">
                                <label for="" class="form-control-label">Loan Sanction Note</label>
                                <textarea rows="2"  placeholder="Loan Sanction Note" class="form-control inputDisabled" name='loan_sanction_note'  id='loan_sanction_note'><?php echo (isset($data_single->loan_sanction_note) ? $data_single->loan_sanction_note : ''); ?></textarea>
                            </div>
                        </div>
                         
                        
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Loan Sanction Amount</label>
                                <input type="text" placeholder="Enter Loan Sanction Amount" onblur="gotocalculate(this.value)" class="form-control inputDisabled" name='sanction_amount'  id='sanction_amount' value="<?php echo (isset($data_single->sanction_amount) ? $data_single->sanction_amount : ''); ?>">
                            </div>
                        </div>
                        
                         
                        
                         <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Installment Start Date</label>
                                <input type="text" placeholder="Enter Installment Start Date" onblur="gotocalculate(this.value)" class="form-control flatpickrDate inputDisabled" name='installment_start_date'  id='installment_start_date' value="<?php echo (isset($data_single->installment_start_date) ? $data_single->installment_start_date : ''); ?>">
                            </div>
                        </div>
                        
                         <div class="col-sm-6 col-xl-4">
                                            <div class="form-group">
                                                <label class="d-block">Deduction From Salary</label>
                                                <div class="d-inline-block mt-2">
                                                    <div class="custom-control custom-radio ks-radio ks-success">
                                                        <input id="deduction_from_salary" <?php if(isset($data_single->deduction_from_salary) && $data_single->deduction_from_salary == 'Yes'){ echo 'checked';} ?> onclick="deductionsalary(this.value);" type="radio" class="custom-control-input" value="Yes" name="deduction_from_salary"
                                                               data-validation="radio_group"
                                                               data-validation-qty="min1">
                                                        <label class="custom-control-label" for="deduction_from_salary">Yes</label>
                                                    </div>
                                                </div>
                                                <div class="d-inline-block mt-2 ml-3">
                                                    <div class="custom-control custom-radio ks-radio ks-danger">
                                                        <input id="deduction_from_salary1" onclick="deductionsalary(this.value);" <?php if(isset($data_single->deduction_from_salary) && $data_single->deduction_from_salary == 'Yes'){ echo 'checked';} ?> type="radio" class="custom-control-input" value="No" name="deduction_from_salary" 
                                                               data-validation="radio_group"
                                                               data-validation-qty="min1">
                                                        <label class="custom-control-label" for="deduction_from_salary1">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                             <input type="hidden" name="deduction_from_salary_hidden" id="deduction_from_salary_hidden" value="<?php echo (isset($data_single->deduction_from_salary) ? $data_single->deduction_from_salary : ''); ?>">
                                        </div>

                         <script>
                    function deductionsalary(value){
                        if(value=='Yes')
                        {
                      
                      $('#deduction_from_salary_hidden').val('Yes');  
                     
                        }
                        else{
                    
                      $('#deduction_from_salary_hidden').val('No');    
                        }
                    }
                </script>
                        
                        <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Loan Issue Date</label>
                                <input type="text" placeholder="Enter Loan Issue Date"  class="form-control flatpickrDate inputDisabled" name='loan_issue_date'  id='loan_issue_date' value="<?php echo (isset($data_single->loan_issue_date) ? $data_single->loan_issue_date : ''); ?>" >
                            </div>
                        </div>
                    
                    <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Tenure In Months</label>
                                <input type="text" placeholder="Enter Tenure In Months" onblur="gotocalculate(this.value)" class="form-control  inputDisabled" name='tenure_in_months'  id='tenure_in_months' value="<?php echo (isset($data_single->tenure_in_months) ? $data_single->tenure_in_months : ''); ?>" >
                            </div>
                        </div>
                    
                    <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Installment amount</label>
                                <input type="text" readonly placeholder="Enter Installment amount" class="form-control inputDisabled" name='installment_amount'  id='installment_amount' value="<?php echo (isset($data_single->installment_amount) ? $data_single->installment_amount : ''); ?>">
                            </div>
                        </div>
                    
                     <div class="col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label for="" class="form-control-label">Loan End Date</label>
                                <input type="text" readonly  placeholder="Enter Loan End Date" class="form-control inputDisabled" name='loan_end_date'  id='loan_end_date' value="<?php echo (isset($data_single->loan_issue_date) ? $data_single->loan_issue_date : ''); ?>" >
                            </div>
                        </div>
                        
               
  
  
                <div <?php if(isset($data_single->loan_approved) && $data_single->loan_approved == 'No'){ echo '';}else{?>style="display:none;"<?php } ?> class="col-sm-6 col-xl-4" id="nonapprove_div">                        
                            <div class="form-group">
                                <label for="" class="form-control-label">Loan Cancel Note</label>
                                <textarea rows="6"  placeholder="Loan Cancel Note" class="form-control inputDisabled" name='loan_cancel_note'  id='loan_cancel_note'><?php echo (isset($data_single->loan_cancel_note) ? $data_single->loan_cancel_note : ''); ?></textarea>
                            </div>
                        </div>
                      </div>        
      
<div class="row">
    <div class="col-md-12">
    <div class="form-group">
         <button type="submit" name="submit" class="btn btn-success" id="leave_add">Save</button>
         <a href="javascript:;" class="btn btn-secondary" onclick="btnCloseForm();">Close</a>
    </div>
    </div>
</div>

    

</form>
