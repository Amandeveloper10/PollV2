<?php 
$searchReplaceArray = array(
  '[var.first_name]' => @$employee->first_name, 
  '[var.last_name]' => @$employee->last_name,
  '[var.date]' => date('d-m-Y'),
  '[var.joining_date]' => date('d-m-Y',strtotime(@$employee->hire_date)),
  
);
//echo '<pre>'; print_r($organization_details->company_name); die;
$department = $this->EmployeesModel->get_row_data('master_department', array('id' => @$employee->department));
$designation = $this->EmployeesModel->get_row_data('master_designation', array('id' => @$employee->designation));
$reporting_manager = $this->EmployeesModel->get_row_data('employee', array('id' => @$employee->reporting_manager));
$workshift = $this->EmployeesModel->get_row_data('master_work_shift', array('id' => @$employee->work_shift_id));
$salary = $this->EmployeesModel->get_row_data('employee_salary', array('employee_id' => @$employee->id,'delete_flag' => 'N','is_active' => 'Y'));

if(!empty($salary)){
	$searchReplaceArray['[var.salary_package]'] = number_format(@$salary->ctc_amount);
}else{
	$searchReplaceArray['[var.salary_package]'] = '';
}

if(!empty($workshift)){
	$searchReplaceArray['[var.shift_time]'] = @$workshift->work_hour_start_1.' To '.@$workshift->work_hour_end_1;
}else{
	$searchReplaceArray['[var.shift_time]'] = '';
}

if(!empty($reporting_manager)){
	$searchReplaceArray['[var.reporting_person]'] = @$reporting_manager->first_name.' '.@$reporting_manager->last_name;
}else{
	$searchReplaceArray['[var.reporting_person]'] = '';
}
if(!empty($department)){
	$searchReplaceArray['[var.department]'] = $department->department_name;
}else{
	$searchReplaceArray['[var.department]'] = '';
}

if(!empty($designation)){
	$searchReplaceArray['[var.designation]'] = $designation->designation_name;
}else{
	$searchReplaceArray['[var.designation]'] = '';
}

if(!empty(@$employee->employee_no)){
	$searchReplaceArray['[var.employee_code]'] = $employee->employee_no;
}else{
	$searchReplaceArray['[var.employee_code]'] = '';
}

if(!empty(@$employee->contact_mobile)){
	$searchReplaceArray['[var.phone_number]'] = $employee->contact_mobile;
}else{
	$searchReplaceArray['[var.phone_number]'] = '';
}

if(!empty(@$employee->contact_mobile)){
	$searchReplaceArray['[var.phone_number]'] = $employee->contact_mobile;
}else{
	$searchReplaceArray['[var.phone_number]'] = '';
}

if(!empty(@$organization_details->company_name)){
	$searchReplaceArray['[var.company_name]'] = $organization_details->company_name;
}else{
	$searchReplaceArray['[var.company_name]'] = '';
}

if(!empty(@$organization_details->apt_no)){
	$searchReplaceArray['[var.company_address]'] = @$organization_details->apt_no.','.@$organization_details->building_name.'<br>'.@$organization_details->country.','.@$organization_details->state.','.@$organization_details->city.','.@$organization_details->zip;
}else{
	$searchReplaceArray['[var.company_address]'] = '';
}

if(!empty(@$organization_details->apt_no)){
	$searchReplaceArray['[var.location]'] = @$organization_details->apt_no.','.@$organization_details->building_name.'<br>'.@$organization_details->country.','.@$organization_details->state.','.@$organization_details->city.','.@$organization_details->zip;
}else{
	$searchReplaceArray['[var.location]'] = '';
}


$string = $templates_view->description;
$result = str_replace(
  array_keys($searchReplaceArray), 
  array_values($searchReplaceArray), 
  $string
); 

echo $result;

?>