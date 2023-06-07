<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
  | -------------------------------------------------------------------------
  | URI ROUTING
  | -------------------------------------------------------------------------
  | This file lets you re-map URI requests to specific controller functions.
  |
  | Typically there is a one-to-one relationship between a URL string
  | and its corresponding controller class/method. The segments in a
  | URL normally follow this pattern:
  |
  |	example.com/class/method/id/
  |da
  | In some instances, however, you may want to remap this relationship
  | so that a different class/function is called than the one
  | corresponding to the URL.
  |
  | Please see the user guide for complete details:
  |
  |	https://codeigniter.com/user_guide/general/routing.html
  |
  | -------------------------------------------------------------------------
  | RESERVED ROUTES
  | -------------------------------------------------------------------------
  |
  | There are three reserved routes:
  |
  |	$route['default_controller'] = 'welcome';
  |
  | This route indicates which controller class should be loaded if the
  | URI contains no data. In the above example, the "welcome" class
  | would be loaded.
  |
  |	$route['404_override'] = 'errors/page_missing';
  |
  | This route will tell the Router which controller/method to use if those
  | provided in the URL cannot be matched to a valid route.
  |
  |	$route['translate_uri_dashes'] = FALSE;
  |
  | This is not exactly a route, but allows you to automatically route
  | controller and method names that contain dashes. '-' isn't a valid
  | class or method name character, so it requires translation.
  | When you set this option to TRUE, it will replace ALL dashes in the
  | controller and method URI segments.
  |
  | Examples:	my-controller/index	-> my_controller/index
  |		my-controller/my-method	-> my_controller/my_method
 */
$route['default_controller'] = 'Admin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin'] = 'Admin';
$route['logout'] = "admin/logout";
$route['check_old_password'] = "admin/check_old_password";

// $route['dashboard'] = "admin/dashboard";
// $route['dashboard/(:any)'] = "admin/dashboard/$1"; // used to stop reload
$route['dashboard_new'] = "dashboard/admin/new_index";
$route['menu_set/(:any)'] = "dashboard/admin/menu_set/$1";
$route['change_password'] = "admin/change_password";
$route['change_password/(:any)'] = "admin/change_password/$1"; // used to stop reload
$route['save_change_password'] = "admin/save_change_password";

$route['page/(:any)'] = "admin/page/$1";
$route['page/(:any)/(:any)'] = "admin/page/$1/$2";
$route['page/(:any)/(:any)/(:any)'] = "admin/page/$1/$2/$3";

$route['admin_get_image'] = "admin/get_image";
$route['admin_get_image_new'] = "admin/get_image_new";
$route['admin_get_image_profile'] = "admin/get_image_profile";
$route['admin_upload_files/(:any)'] = "admin/upload_files/$1";
$route['admin_get_image_dynamic_name/(:any)'] = "admin/get_image_dynamic_name/$1";

/* * ************************************** */
$route['employee-list'] = "admin/employee_list";
$route['employee-list/(:any)'] = "admin/employee_list/$1"; // used to stop reload

$route['labour-list'] = "admin/labour_list";
$route['labour-list/(:any)'] = "admin/labour_list/$1"; // used to stop reload


// $route['attendance'] = "admin/attendance";
// $route['attendance/(:any)'] = "admin/attendance/$1"; // used to stop reload

// $route['payroll'] = "admin/payroll";
// $route['payroll/(:any)'] = "admin/payroll/$1"; // used to stop reload


$route['projects'] = "project/Admin/index";
$route['admin_projects_search'] = "project/Admin/projects_search_result";
$route['projects/(:any)'] = "project/Admin/index/$1"; // used to stop reload
$route['admin_get_edit_form_project'] = "project/Admin/get_form";
$route['admin_delete_project/(:any)'] = "project/Admin/delete/$1";
$route['admin_edit_project/(:any)'] = "project/Admin/form/$1";
$route['admin_add_project'] = 'project/Admin/form';
$route['admin_add_employee_project'] = 'project/Admin/admin_add_employee_project';
$route['admin_assigned_employee'] = 'project/Admin/admin_assigned_employee';

$route['payroll-wps'] = "admin/payroll_wps";
$route['payroll-wps/(:any)'] = "admin/payroll_wps/$1"; // used to stop reload

$route['payroll-overtime'] = "admin/payroll_overtime";
$route['payroll-overtime/(:any)'] = "admin/payroll_overtime/$1"; // used to stop reload

$route['payroll-gratuity'] = "admin/payroll_gratuity";
$route['payroll-gratuity/(:any)'] = "admin/payroll_gratuity/$1"; // used to stop reload

$route['add-labour'] = "admin/add_labour";
$route['add-labour/(:any)'] = "admin/add_labour/$1"; // used to stop reload


$route['labour-profile'] = "admin/labour_profile";
$route['labour-profile/(:any)'] = "admin/labour_profile/$1"; // used to stop reload


$route['add-employee'] = "admin/add_employee";
$route['add-employee/(:any)'] = "admin/add_employee/$1"; // used to stop reload


$route['employee-profile'] = "admin/employee_profile";
$route['employee-profile/(:any)'] = "admin/employee_profile/$1"; // used to stop reload

/* * ************************************* */

// For qualification-skill
$route['qualification-skill'] = 'qualification-skill/Admin/index';
$route['qualification-skill/(:any)'] = "qualification-skill/Admin/index/$1"; // used to load only middle content 
$route['admin_add_skill'] = 'qualification-skill/Admin/form';
$route['admin_edit_skill/(:any)'] = "qualification-skill/Admin/form/$1";
$route['admin_get_edit_form_skill'] = "qualification-skill/Admin/get_form";
$route['admin_status_skill/(:any)'] = "qualification-skill/Admin/status/$1";
$route['admin_delete_skill/(:any)'] = "qualification-skill/Admin/delete/$1";


// For qualification-education
$route['qualification-education'] = 'qualification-education/Admin/index';
$route['qualification-education/(:any)'] = "qualification-education/Admin/index/$1"; // used to load only middle content 
$route['admin_add_education'] = 'qualification-education/Admin/form';
$route['admin_edit_education/(:any)'] = "qualification-education/Admin/form/$1";
$route['admin_get_edit_form_education'] = "qualification-education/Admin/get_form";
$route['admin_status_education/(:any)'] = "qualification-education/Admin/status/$1";
$route['admin_delete_education/(:any)'] = "qualification-education/Admin/delete/$1";

// For qualification-licence
$route['qualification-licence'] = 'qualification-licence/Admin/index';
$route['qualification-licence/(:any)'] = "qualification-licence/Admin/index/$1"; // used to load only middle content 
$route['admin_add_licence'] = 'qualification-licence/Admin/form';
$route['admin_edit_licence/(:any)'] = "qualification-licence/Admin/form/$1";
$route['admin_get_edit_form_licence'] = "qualification-licence/Admin/get_form";
$route['admin_status_licence/(:any)'] = "qualification-licence/Admin/status/$1";
$route['admin_delete_licence/(:any)'] = "qualification-licence/Admin/delete/$1";

// For qualification-membership
$route['qualification-membership'] = 'qualification-membership/Admin/index';
$route['qualification-membership/(:any)'] = "qualification-membership/Admin/index/$1"; // used to load only middle content 
$route['admin_add_membership'] = 'qualification-membership/Admin/form';
$route['admin_edit_membership/(:any)'] = "qualification-membership/Admin/form/$1";
$route['admin_get_edit_form_membership'] = "qualification-membership/Admin/get_form";
$route['admin_status_membership/(:any)'] = "qualification-membership/Admin/status/$1";
$route['admin_delete_membership/(:any)'] = "qualification-membership/Admin/delete/$1";

// For department
$route['department'] = 'department/Admin/index';
$route['department/(:any)'] = "department/Admin/index/$1"; // used to load only middle content 
$route['admin_add_department'] = 'department/Admin/form';
$route['admin_edit_department/(:any)'] = "department/Admin/form/$1";
$route['admin_get_edit_form_department'] = "department/Admin/get_form";
$route['admin_status_department/(:any)'] = "department/Admin/status/$1";
$route['admin_delete_department/(:any)'] = "department/Admin/delete/$1";

// For designation
$route['designation'] = 'designation/Admin/index';
$route['designation/(:any)'] = "designation/Admin/index/$1"; // used to load only middle content 
$route['admin_add_designation'] = 'designation/Admin/form';
$route['admin_edit_designation/(:any)'] = "designation/Admin/form/$1";
$route['admin_get_edit_form_designation'] = "designation/Admin/get_form";
$route['admin_status_designation/(:any)'] = "designation/Admin/status/$1";
$route['admin_delete_designation/(:any)'] = "designation/Admin/delete/$1";

// For grade
$route['grade'] = 'grade/Admin/index';
$route['grade/(:any)'] = "grade/Admin/index/$1"; // used to load only middle content 
$route['admin_add_grade'] = 'grade/Admin/form';
$route['admin_edit_grade/(:any)'] = "grade/Admin/form/$1";
$route['admin_get_edit_form_grade'] = "grade/Admin/get_form";
$route['admin_status_grade/(:any)'] = "grade/Admin/status/$1";
$route['admin_delete_grade/(:any)'] = "grade/Admin/delete/$1";

// For work_shift
$route['work_shift'] = 'work_shift/Admin/index';
$route['work_shift/(:any)'] = "work_shift/Admin/index/$1"; // used to load only middle content 
$route['admin_add_work_shift'] = 'work_shift/Admin/form';
$route['admin_edit_work_shift/(:any)'] = "work_shift/Admin/form/$1";
$route['admin_get_edit_form_work_shift'] = "work_shift/Admin/get_form";
$route['admin_status_work_shift/(:any)'] = "work_shift/Admin/status/$1";
$route['admin_delete_work_shift/(:any)'] = "work_shift/Admin/delete/$1";

// For work_week
$route['work_week'] = 'work_week/Admin/index';
$route['work_week/(:any)'] = "work_week/Admin/index/$1"; // used to load only middle content 
$route['admin_save_work_week'] = 'work_week/Admin/form';


// For holidays
$route['holidays'] = 'holidays/Admin/index';
$route['holidays/(:any)'] = "holidays/Admin/index/$1"; // used to load only middle content 
$route['admin_add_holidays'] = 'holidays/Admin/form';
$route['admin_edit_holidays/(:any)'] = "holidays/Admin/form/$1";
$route['admin_get_edit_form_holidays'] = "holidays/Admin/get_form";
$route['admin_status_holidays/(:any)'] = "holidays/Admin/status/$1";
$route['admin_delete_holidays/(:any)'] = "holidays/Admin/delete/$1";


// For salary_component
$route['salary_component'] = 'salary_component/Admin/index';
$route['salary_component/(:any)'] = "salary_component/Admin/index/$1"; // used to load only middle content 
$route['admin_add_salary_component'] = 'salary_component/Admin/form';
$route['admin_edit_salary_component/(:any)'] = "salary_component/Admin/form/$1";
$route['admin_get_edit_form_salary_component'] = "salary_component/Admin/get_form";
$route['admin_status_salary_component/(:any)'] = "salary_component/Admin/status/$1";
$route['admin_delete_salary_component/(:any)'] = "salary_component/Admin/delete/$1";


// For salary_structure
$route['salary_structure'] = 'salary_structure/Admin/index';
$route['salary_structure/(:any)'] = "salary_structure/Admin/index/$1"; // used to load only middle content 
$route['admin_add_salary_structure'] = 'salary_structure/Admin/form';
$route['admin_edit_salary_structure/(:any)'] = "salary_structure/Admin/form/$1";
$route['admin_get_edit_form_salary_structure'] = "salary_structure/Admin/get_form";
$route['admin_status_salary_structure/(:any)'] = "salary_structure/Admin/status/$1";
$route['admin_delete_salary_structure/(:any)'] = "salary_structure/Admin/delete/$1";
$route['get_component_type'] = "salary_structure/Admin/get_component_type";
$route['get_component_deduction'] = "salary_structure/Admin/get_component_deduction";
$route['get_component_benefit'] = "salary_structure/Admin/get_component_benefit";
$route['ptax_deduction'] = "salary_structure/Admin/ptax_deduction";
$route['div_colon'] = "salary_structure/Admin/div_colon";
$route['div_deduction_colon'] = "salary_structure/Admin/div_deduction_colon";
$route['div_benefit_colon'] = "salary_structure/Admin/div_benefit_colon";

$route['delete_salary_structure'] = "salary_structure/Admin/delete_salary_structure";

// For benefits_insurance_policy
$route['benefits_insurance_policy'] = 'benefits_insurance_policy/Admin/index';
$route['benefits_insurance_policy/(:any)'] = "benefits_insurance_policy/Admin/index/$1"; // used to load only middle content 
$route['admin_add_benefits_insurance_policy'] = 'benefits_insurance_policy/Admin/form';
$route['admin_edit_benefits_insurance_policy/(:any)'] = "benefits_insurance_policy/Admin/form/$1";
$route['admin_get_edit_form_benefits_insurance_policy'] = "benefits_insurance_policy/Admin/get_form";
$route['admin_status_benefits_insurance_policy/(:any)'] = "benefits_insurance_policy/Admin/status/$1";
$route['admin_delete_benefits_insurance_policy/(:any)'] = "benefits_insurance_policy/Admin/delete/$1";

// For benefits_workman_compensation
$route['benefits_workman_compensation'] = 'benefits_workman_compensation/Admin/index';
$route['benefits_workman_compensation/(:any)'] = "benefits_workman_compensation/Admin/index/$1"; // used to load only middle content 
$route['admin_add_benefits_workman_compensation'] = 'benefits_workman_compensation/Admin/form';
$route['admin_edit_benefits_workman_compensation/(:any)'] = "benefits_workman_compensation/Admin/form/$1";
$route['admin_get_edit_form_benefits_workman_compensation'] = "benefits_workman_compensation/Admin/get_form";
$route['admin_status_benefits_workman_compensation/(:any)'] = "benefits_workman_compensation/Admin/status/$1";
$route['admin_delete_benefits_workman_compensation/(:any)'] = "benefits_workman_compensation/Admin/delete/$1";

// For benefits_project_insurance
$route['benefits_project_insurance'] = 'benefits_project_insurance/Admin/index';
$route['benefits_project_insurance/(:any)'] = "benefits_project_insurance/Admin/index/$1"; // used to load only middle content 
$route['admin_add_benefits_project_insurance'] = 'benefits_project_insurance/Admin/form';
$route['admin_edit_benefits_project_insurance/(:any)'] = "benefits_project_insurance/Admin/form/$1";
$route['admin_get_edit_form_benefits_project_insurance'] = "benefits_project_insurance/Admin/get_form";
$route['admin_status_benefits_project_insurance/(:any)'] = "benefits_project_insurance/Admin/status/$1";
$route['admin_delete_benefits_project_insurance/(:any)'] = "benefits_project_insurance/Admin/delete/$1";

// For benefits_vehicle_insurance
$route['benefits_vehicle_insurance'] = 'benefits_vehicle_insurance/Admin/index';
$route['benefits_vehicle_insurance/(:any)'] = "benefits_vehicle_insurance/Admin/index/$1"; // used to load only middle content 
$route['admin_add_benefits_vehicle_insurance'] = 'benefits_vehicle_insurance/Admin/form';
$route['admin_edit_benefits_vehicle_insurance/(:any)'] = "benefits_vehicle_insurance/Admin/form/$1";
$route['admin_get_edit_form_benefits_vehicle_insurance'] = "benefits_vehicle_insurance/Admin/get_form";
$route['admin_status_benefits_vehicle_insurance/(:any)'] = "benefits_vehicle_insurance/Admin/status/$1";
$route['admin_delete_benefits_vehicle_insurance/(:any)'] = "benefits_vehicle_insurance/Admin/delete/$1";

// For benefits_bonus_incentive
$route['benefits_bonus_incentive'] = 'benefits_bonus_incentive/Admin/index';
$route['benefits_bonus_incentive/(:any)'] = "benefits_bonus_incentive/Admin/index/$1"; // used to load only middle content 
$route['admin_add_benefits_bonus_incentive'] = 'benefits_bonus_incentive/Admin/form';
$route['admin_edit_benefits_bonus_incentive/(:any)'] = "benefits_bonus_incentive/Admin/form/$1";
$route['admin_get_edit_form_benefits_bonus_incentive'] = "benefits_bonus_incentive/Admin/get_form";
$route['admin_status_benefits_bonus_incentive/(:any)'] = "benefits_bonus_incentive/Admin/status/$1";
$route['admin_delete_benefits_bonus_incentive/(:any)'] = "benefits_bonus_incentive/Admin/delete/$1";

// For benefits_LTC
$route['benefits_LTC'] = 'benefits_LTC/Admin/index';
$route['benefits_LTC/(:any)'] = "benefits_LTC/Admin/index/$1"; // used to load only middle content 
$route['admin_add_benefits_LTC'] = 'benefits_LTC/Admin/form';
$route['admin_edit_benefits_LTC/(:any)'] = "benefits_LTC/Admin/form/$1";
$route['admin_get_edit_form_benefits_LTC'] = "benefits_LTC/Admin/get_form";
$route['admin_status_benefits_LTC/(:any)'] = "benefits_LTC/Admin/status/$1";
$route['admin_delete_benefits_LTC/(:any)'] = "benefits_LTC/Admin/delete/$1";

// For benefits_tenancy
$route['benefits_tenancy'] = 'benefits_tenancy/Admin/index';
$route['benefits_tenancy/(:any)'] = "benefits_tenancy/Admin/index/$1"; // used to load only middle content 
$route['admin_add_benefits_tenancy'] = 'benefits_tenancy/Admin/form';
$route['admin_edit_benefits_tenancy/(:any)'] = "benefits_tenancy/Admin/form/$1";
$route['admin_get_edit_form_benefits_tenancy'] = "benefits_tenancy/Admin/get_form";
$route['admin_status_benefits_tenancy/(:any)'] = "benefits_tenancy/Admin/status/$1";
$route['admin_delete_benefits_tenancy/(:any)'] = "benefits_tenancy/Admin/delete/$1";

// For benefits_vehicles
$route['benefits_vehicles'] = 'benefits_vehicles/Admin/index';
$route['benefits_vehicles/(:any)'] = "benefits_vehicles/Admin/index/$1"; // used to load only middle content 
$route['admin_add_benefits_vehicles'] = 'benefits_vehicles/Admin/form';
$route['admin_edit_benefits_vehicles/(:any)'] = "benefits_vehicles/Admin/form/$1";
$route['admin_get_edit_form_benefits_vehicles'] = "benefits_vehicles/Admin/get_form";
$route['admin_status_benefits_vehicles/(:any)'] = "benefits_vehicles/Admin/status/$1";
$route['admin_delete_benefits_vehicles/(:any)'] = "benefits_vehicles/Admin/delete/$1";

// For benefits_gratuity
$route['benefits_gratuity'] = 'benefits_gratuity/Admin/index';
$route['benefits_gratuity/(:any)'] = "benefits_gratuity/Admin/index/$1"; // used to load only middle content 
$route['admin_add_benefits_gratuity'] = 'benefits_gratuity/Admin/form';
$route['admin_edit_benefits_gratuity/(:any)'] = "benefits_gratuity/Admin/form/$1";
$route['admin_get_edit_form_benefits_gratuity'] = "benefits_gratuity/Admin/get_form";
$route['admin_status_benefits_gratuity/(:any)'] = "benefits_gratuity/Admin/status/$1";
$route['admin_delete_benefits_gratuity/(:any)'] = "benefits_gratuity/Admin/delete/$1";

// For late_rules
$route['late_rules'] = 'late_rules/Admin/index';
$route['late_rules/(:any)'] = "late_rules/Admin/index/$1"; // used to load only middle content 
$route['admin_add_late_rules'] = 'late_rules/Admin/form';
$route['admin_edit_late_rules/(:any)'] = "late_rules/Admin/form/$1";
$route['admin_get_edit_form_late_rules'] = "late_rules/Admin/get_form";
$route['admin_status_late_rules/(:any)'] = "late_rules/Admin/status/$1";
$route['admin_delete_late_rules/(:any)'] = "late_rules/Admin/delete/$1";

// For attendance_rules
$route['attendance_rules'] = 'attendance_rules/Admin/index';
$route['attendance_rules/(:any)'] = "attendance_rules/Admin/index/$1"; // used to load only middle content 
$route['admin_add_attendance_rules'] = 'attendance_rules/Admin/form';
$route['admin_edit_attendance_rules/(:any)'] = "attendance_rules/Admin/form/$1";
$route['admin_get_edit_form_attendance_rules'] = "attendance_rules/Admin/get_form";
$route['check_grade_attendance_rules'] = "attendance_rules/Admin/check_grade";
$route['admin_status_attendance_rules/(:any)'] = "attendance_rules/Admin/status/$1";
$route['admin_delete_attendance_rules/(:any)'] = "attendance_rules/Admin/delete/$1";



// For leave_rules
$route['leave_rules'] = 'leave_rules/Admin/index';
$route['leave_rules/(:any)'] = "leave_rules/Admin/index/$1"; // used to load only middle content 
$route['admin_add_leave_rules'] = 'leave_rules/Admin/form';
$route['admin_edit_leave_rules/(:any)'] = "leave_rules/Admin/form/$1";
$route['admin_get_edit_form_leave_rules'] = "leave_rules/Admin/get_form";
$route['admin_status_leave_rules/(:any)'] = "leave_rules/Admin/status/$1";
$route['admin_delete_leave_rules/(:any)'] = "leave_rules/Admin/delete/$1";

// For email_template
$route['email_template'] = 'email_template/Admin/index';
$route['email_template/(:any)'] = "email_template/Admin/index/$1"; // used to load only middle content 
$route['admin_add_email_template'] = 'email_template/Admin/form';
$route['admin_edit_email_template/(:any)'] = "email_template/Admin/form/$1";
$route['admin_get_edit_form_email_template'] = "email_template/Admin/get_form";
$route['admin_status_email_template/(:any)'] = "email_template/Admin/status/$1";
$route['admin_delete_email_template/(:any)'] = "email_template/Admin/delete/$1";

// For docs_template
$route['docs_template'] = 'docs_template/Admin/index';
$route['docs_template/(:any)'] = "docs_template/Admin/index/$1"; // used to load only middle content 
$route['admin_add_docs_template'] = 'docs_template/Admin/form';
$route['admin_edit_docs_template/(:any)'] = "docs_template/Admin/form/$1";
$route['admin_get_edit_form_docs_template'] = "docs_template/Admin/get_form";
$route['admin_status_docs_template/(:any)'] = "docs_template/Admin/status/$1";
$route['admin_delete_docs_template/(:any)'] = "docs_template/Admin/delete/$1";

// For req_job_opening
$route['req_job_opening'] = 'req_job_opening/Admin/index';
$route['req_job_opening/(:any)'] = "req_job_opening/Admin/index/$1"; // used to load only middle content 
$route['admin_add_req_job_opening'] = 'req_job_opening/Admin/form';
$route['admin_edit_req_job_opening/(:any)'] = "req_job_opening/Admin/form/$1";
$route['admin_get_edit_form_req_job_opening'] = "req_job_opening/Admin/get_form";
$route['admin_status_req_job_opening/(:any)'] = "req_job_opening/Admin/status/$1";
$route['admin_delete_req_job_opening/(:any)'] = "req_job_opening/Admin/delete/$1";

// For setting_organization
$route['setting_organization'] = 'setting_organization/Admin/index';
$route['setting_organization/(:any)'] = "setting_organization/Admin/index/$1"; // used to load only middle content 
$route['admin_add_setting_organization'] = 'setting_organization/Admin/form';

// For setting_organization_bank_details
$route['setting_organization_bank_details'] = 'setting_organization_bank_details/Admin/index';
$route['setting_organization_bank_details/(:any)'] = "setting_organization_bank_details/Admin/index/$1"; // used to load only middle content 
$route['admin_add_setting_organization_bank_details'] = 'setting_organization_bank_details/Admin/form';
$route['admin_edit_setting_organization_bank_details/(:any)'] = "setting_organization_bank_details/Admin/form/$1";
$route['admin_get_edit_form_setting_organization_bank_details'] = "setting_organization_bank_details/Admin/get_form";
$route['admin_status_setting_organization_bank_details/(:any)'] = "setting_organization_bank_details/Admin/status/$1";
$route['admin_delete_setting_organization_bank_details/(:any)'] = "setting_organization_bank_details/Admin/delete/$1";

// For setting_system_config
$route['setting_system_config'] = 'setting_system_config/Admin/index';
$route['setting_system_config/(:any)'] = "setting_system_config/Admin/index/$1"; // used to load only middle content 
$route['admin_add_setting_system_config'] = 'setting_system_config/Admin/form';

// For employee_config
$route['employee_config'] = 'employee_config/Admin/index';
$route['employee_config/(:any)'] = "employee_config/Admin/index/$1"; // used to load only middle content 
$route['admin_add_employee_config'] = 'employee_config/Admin/form';

// For req_candidates
$route['req_candidates'] = 'req_candidates/Admin/index';
$route['req_candidates/(:any)'] = "req_candidates/Admin/index/$1"; // used to load only middle content 
$route['admin_add_req_candidates'] = 'req_candidates/Admin/form';
$route['admin_edit_req_candidates/(:any)'] = "req_candidates/Admin/form/$1";
$route['admin_get_edit_form_req_candidates'] = "req_candidates/Admin/get_form";
$route['admin_status_req_candidates/(:any)'] = "req_candidates/Admin/status/$1";
$route['admin_delete_req_candidates/(:any)'] = "req_candidates/Admin/delete/$1";


// For setting_location
$route['setting_location'] = 'setting_location/Admin/index';
$route['setting_location/(:any)'] = "setting_location/Admin/index/$1"; // used to load only middle content 
$route['admin_add_setting_location'] = 'setting_location/Admin/form';
$route['admin_edit_setting_location/(:any)'] = "setting_location/Admin/form/$1";
$route['admin_get_edit_form_setting_location'] = "setting_location/Admin/get_form";
$route['admin_status_setting_location/(:any)'] = "setting_location/Admin/status/$1";
$route['admin_delete_setting_location/(:any)'] = "setting_location/Admin/delete/$1";
$route['admin_check_org_location'] = "setting_location/Admin/check_org_location";

// For req_interviews
$route['req_interviews'] = 'req_interviews/Admin/index';
$route['req_interviews/(:any)'] = "req_interviews/Admin/index/$1"; // used to load only middle content 
$route['admin_add_req_interviews'] = 'req_interviews/Admin/form';
$route['admin_edit_req_interviews/(:any)'] = "req_interviews/Admin/form/$1";
$route['admin_get_edit_form_req_interviews'] = "req_interviews/Admin/get_form";
$route['admin_status_req_interviews/(:any)'] = "req_interviews/Admin/status/$1";
$route['admin_delete_req_interviews/(:any)'] = "req_interviews/Admin/delete/$1";
$route['admin_get_interview_candidate'] = "req_interviews/Admin/interview_candidate";

// For employees
$route['employees'] = 'employees/Admin/index';
$route['employees/(:any)'] = "employees/Admin/index/$1"; // used to load only middle content 
$route['admin_add_employees'] = 'employees/Admin/form';
$route['admin_edit_employees/(:any)'] = "employees/Admin/form/$1";
$route['admin_get_edit_form_employees'] = "employees/Admin/get_form";
$route['admin_status_employees/(:any)'] = "employees/Admin/status/$1";
$route['admin_delete_employees/(:any)'] = "employees/Admin/delete/$1";
//$route['admin_status_employee/(:any)'] = "employees/Admin/status_employee/$1";

 // For tenancy_contracts
$route['tenancy'] = 'tenancy_contracts/Admin/index';
$route['tenancy/(:any)'] = "tenancy_contracts/Admin/index/$1"; // used to load only middle content 
$route['admin_add_tenancy_contracts'] = 'tenancy_contracts/Admin/form';
$route['admin_edit_tenancy_contracts/(:any)'] = "tenancy_contracts/Admin/form/$1";
$route['admin_get_edit_form_tenancy_contracts'] = "tenancy_contracts/Admin/get_form";
$route['admin_delete_tenancy_contracts/(:any)'] = "tenancy_contracts/Admin/delete/$1";

$route['admin_add_tenancy'] = 'tenancy_contracts/Admin/form_tenancy';
$route['admin_edit_tenancy/(:any)'] = "tenancy_contracts/Admin/form_tenancy/$1";
$route['admin_get_edit_form_tenancy'] = "tenancy_contracts/Admin/get_form_tenancy";

$route['tenancy_contracts/(:any)'] = 'tenancy_contracts/Admin/index_tenancy/$1';
$route['tenancy_contracts/(:any)/(:any)'] = "tenancy_contracts/Admin/index_tenancy/$1/$2"; // used to load only middle content 
$route['tenancy_contracts/(:any)/(:any)/(:any)'] = "tenancy_contracts/Admin/index_tenancy/$1/$2/$3"; // used to load only middle content 
$route['save_index_tenancy/(:any)'] = "tenancy_contracts/Admin/save_index_tenancy/$1/";



// For vehicles
$route['vehicles'] = 'vehicles/Admin/index';
$route['vehicles/(:any)'] = "vehicles/Admin/index/$1"; // used to load only middle content 
$route['admin_add_vehicles'] = 'vehicles/Admin/form';
$route['admin_edit_vehicles/(:any)'] = "vehicles/Admin/form/$1";
$route['admin_get_edit_form_vehicles'] = "vehicles/Admin/get_form";
$route['admin_delete_vehicles/(:any)'] = "vehicles/Admin/delete/$1";

$route['vehicle_maintenance'] = "vehicles/Admin/vehicle_maintenance";
$route['vehicle_maintenance/(:any)'] = "vehicles/Admin/vehicle_maintenance/$1";
$route['vehicle_maintenance_form'] = "vehicles/Admin/vehicle_maintenance_form";

$route['admin_add_vehicles_maintenance'] = 'vehicles/Admin/vehicle_maintenance_add';
$route['admin_edit_vehicles_maintenance/(:any)'] = "vehicles/Admin/vehicle_maintenance_add/$1";
$route['maintenance_delete/(:any)'] = "vehicles/Admin/maintenance_delete/$1";



$route['vehicle_assign_history/(:any)'] = "vehicles/Admin/vehicle_asignment/$1";
$route['vehicle_asignment/(:any)'] = "vehicles/Admin/vehicle_asignment/$1";
$route['vehicle_asignment_form'] = "vehicles/Admin/vehicle_asignment_form";

$route['admin_add_vehicles_asignment'] = 'vehicles/Admin/vehicle_asignment_add';
$route['admin_edit_vehicles_asignment/(:any)'] = "vehicles/Admin/vehicle_asignment_add/$1";
$route['asignment_delete/(:any)'] = "vehicles/Admin/asignment_delete/$1";

$route['vehicle_asignment'] = "vehicles/Admin/vehicle_asignment";


// For insurance_policies
$route['insurance_policies'] = 'insurance_policies/Admin/index';
$route['insurance_policies/(:any)'] = "insurance_policies/Admin/index/$1"; // used to load only middle content 
$route['admin_add_insurance_policies'] = 'insurance_policies/Admin/form';
$route['admin_edit_insurance_policies/(:any)'] = "insurance_policies/Admin/form/$1";
$route['admin_get_edit_form_insurance_policies'] = "insurance_policies/Admin/get_form";
$route['admin_delete_insurance_policies/(:any)'] = "insurance_policies/Admin/delete/$1";

// For admin_settings
$route['admin_settings'] = 'admin_settings/Admin/index';
$route['admin_settings/(:any)'] = "admin_settings/Admin/index/$1"; // used to load only middle content 
$route['admin_add_admin_settings'] = 'admin_settings/Admin/form';
$route['admin_edit_admin_settings/(:any)'] = "admin_settings/Admin/form/$1";
$route['admin_get_edit_form_admin_settings'] = "admin_settings/Admin/get_form";
$route['admin_delete_admin_settings/(:any)'] = "admin_settings/Admin/delete/$1";
// For employees details
$route['employees_details'] = 'employees_details/Admin/index';
$route['employees_details/(:any)'] = "employees_details/Admin/index/$1"; // used to load only middle content 
$route['add_employees_details'] = 'employees_details/Admin/get_form';
$route['edit_employees_details/(:any)'] = "employees_details/Admin/get_profile/$1";
$route['modify_employees_details'] = 'employees_details/Admin/form';
$route['modify_employees_details/(:any)'] = 'employees_details/Admin/form/$1';
$route['modify_employees_qualification/(:any)'] = 'employees_details/Admin/form_qualification/$1';
$route['modify_employees_expenses/(:any)'] = 'employees_details/Admin/form_expenses/$1';
$route['employees_expenses_data/(:any)'] = 'employees_details/Admin/employees_expenses_data/$1';
$route['modify_employees_bank/(:any)'] = 'employees_details/Admin/form_bank/$1';
$route['employees_bank_data/(:any)'] = 'employees_details/Admin/employees_bank_data/$1';
$route['employees_benifit_data/(:any)'] = 'employees_details/Admin/employees_benifit_data/$1';
$route['employees_loan_application_data/(:any)'] = 'employees_details/Admin/employees_loan_application_data/$1';
$route['employees_expenses_delete/(:any)'] = 'employees_details/Admin/employees_expenses_delete/$1';
$route['employees_bank_delete/(:any)'] = 'employees_details/Admin/employees_bank_delete/$1';
$route['employees_benifit_delete/(:any)'] = 'employees_details/Admin/employees_benifit_delete/$1';
$route['employees_loanapplication_delete/(:any)'] = 'employees_details/Admin/employees_loanapplication_delete/$1';
$route['employees_loanapplication_doc_delete/(:any)/(:any)'] = 'employees_details/Admin/employees_loanapplication_doc_delete/$1/$2';
$route['employees_loan_end_date_calculate/(:any)/(:any)'] = 'employees_details/Admin/employees_loan_end_date_calculate/$1/$2';
$route['modify_employees_loan_application/(:any)'] = 'employees_details/Admin/modify_employees_loan_application/$1';
$route['employees_loanapplication_download/(:any)'] = 'employees_details/Admin/employees_loanapplication_download/$1';
$route['loan_details/(:any)'] = 'employees_details/Admin/loan_details/$1';
$route['goforloanclose/(:any)/(:any)'] = 'employees_details/Admin/goforloanclose/$1/$2';
$route['modify_employees_loan_payment/(:any)'] = 'employees_details/Admin/modify_employees_loan_payment/$1';
$route['admin_delete_employee/(:any)'] = "employees_details/Admin/delete/$1";
$route['modify_passport_visa/(:any)'] = 'employees_details/Admin/modify_passport_visa/$1';
$route['modify_benifit/(:any)'] = 'employees_details/Admin/modify_benifit/$1';
$route['modify_leave_application/(:any)'] = 'employees_details/Admin/modify_leave_application/$1';
$route['employees_loanpayment_delete/(:any)'] = 'employees_details/Admin/employees_loanpayment_delete/$1';
$route['get_edit_form_employees_details'] = "employees_details/Admin/get_form";
$route['status_employees_details/(:any)'] = "employees_details/Admin/status/$1";
$route['delete_employees_details/(:any)'] = "employees_details/Admin/delete/$1";
$route['policy_details/(:any)'] = 'employees_details/Admin/policy_details/$1';
$route['employees_leave_application_data/(:any)'] = 'employees_details/Admin/employees_leave_application_data/$1';
$route['employees_leave_application_delete/(:any)'] = 'employees_details/Admin/employees_leave_application_delete/$1';
$route['employees_leave_approval/(:any)/(:any)/(:any)'] = 'employees_details/Admin/employees_leave_approval/$1/$2/$3';
$route['employees_leave_application_duplicate_date/(:any)/(:any)'] = 'employees_details/Admin/employees_leave_application_duplicate_date/$1/$2';
$route['admin_get_subordinate'] = "employees_details/Admin/get_subordinate";
$route['get_employee_attendance'] = "employees_details/Admin/get_employee_attendance";
$route['admin_status_employees_details/(:any)'] = "employees_details/Admin/status/$1";
$route['admin_get_net_salary_div'] = "employees_details/Admin/get_net_salary_div";
$route['admin_get_net_salary_div_edit'] = "employees_details/Admin/get_net_salary_div_edit";
$route['admin_save_emp_salary_structure'] = "employees_details/Admin/save_emp_salary_structure";
$route['loan_payment_details/(:any)'] = 'employees_details/Admin/loan_payment_details/$1';
$route['check_employee_no'] = "employees_details/Admin/check_employee_no";


/******** 12.03.19 **/
// For attendance
$route['attendance'] = 'attendance/Admin/index';
$route['attendance/(:any)'] = "attendance/Admin/index/$1"; // used to load only middle content 
$route['admin_add_attendance'] = 'attendance/Admin/form';
$route['admin_edit_attendance/(:any)'] = "attendance/Admin/form/$1";
$route['admin_get_edit_form_attendance'] = "attendance/Admin/get_form";
$route['admin_check_emp_attendance'] = "attendance/Admin/check_emp_attendance";
$route['admin_employee_attendance'] = "attendance/Admin/employee_attendance";

$route['upload_excel'] = 'attendance/Admin/upload_excel';
$route['ownercsv'] = "attendance/Admin/uploadData";
/*** 23.03.19 **/
// For overtime_name
$route['overtime_rules'] = 'overtime_rules/Admin/index';
$route['overtime_rules/(:any)'] = "overtime_rules/Admin/index/$1"; // used to load only middle content 
$route['admin_add_overtime_rules'] = 'overtime_rules/Admin/form';
$route['admin_edit_overtime_rules/(:any)'] = "overtime_rules/Admin/form/$1";
$route['admin_get_edit_form_overtime_rules'] = "overtime_rules/Admin/get_form";
$route['admin_status_overtime_rules/(:any)'] = "overtime_rules/Admin/status/$1";
$route['admin_delete_overtime_rules/(:any)'] = "overtime_rules/Admin/delete/$1";

/**** 28.03.19 **/
// payroll
$route['payroll'] = 'payroll/Admin/index';
$route['payroll/(:any)'] = "payroll/Admin/index/$1"; // used to load only middle content 
$route['admin_save_emp_payroll'] = 'payroll/Admin/admin_save_emp_payroll'; 
$route['admin_employee_payroll'] = 'payroll/Admin/admin_employee_payroll';
$route['employee_attendance_payroll'] = 'payroll/Admin/employee_attendance';
$route['adhoc_ajax'] = 'payroll/Admin/adhoc_ajax';
$route['hold_ajax'] = 'payroll/Admin/hold_ajax';
$route['save_freeze_month_attendance'] = "payroll/Admin/save_freeze_month_attendance";
$route['get_all_button_details'] = "payroll/Admin/get_all_button_details";
$route['save_adhoc_pay'] = "payroll/Admin/save_adhoc_pay";
$route['save_freeze_month_adhoc'] = "payroll/Admin/save_freeze_month_adhoc";
$route['save_hold'] = "payroll/Admin/save_hold";
$route['save_freeze_month_hold'] = "payroll/Admin/save_freeze_month_hold";
$route['get_salary_freeze_parcent'] = "payroll/Admin/get_salary_freeze_parcent"; 
$route['get_saved_salary_payroll'] = "payroll/Admin/get_saved_salary_payroll";
$route['download_salary_slip'] = "payroll/Admin/download_salary_slip";
$route['down_slip/(:any)/(:any)/(:any)'] = "payroll/Admin/down_slip/$1/$2/$3";
$route['send_salary_slip'] = "payroll/Admin/send_salary_slip";
// For gratuity_formula
$route['gratuity_formula'] = 'gratuity_formula/Admin/index';
$route['gratuity_formula/(:any)'] = "gratuity_formula/Admin/index/$1"; // used to load only middle content 
$route['admin_add_gratuity_formula'] = 'gratuity_formula/Admin/form';
$route['admin_edit_gratuity_formula/(:any)'] = "gratuity_formula/Admin/form/$1";
$route['admin_get_edit_form_gratuity_formula'] = "gratuity_formula/Admin/get_form";
$route['admin_status_gratuity_formula/(:any)'] = "gratuity_formula/Admin/status/$1";
$route['admin_delete_gratuity_formula/(:any)'] = "gratuity_formula/Admin/delete/$1";

$route['relize_hold'] = "payroll/Admin/relize_hold";
// For employee_leave
$route['employee_leave'] = 'employee_leave/Admin/index';
$route['employee_leave/(:any)'] = "employee_leave/Admin/index/$1"; // used to load only middle content 
$route['admin_add_employee_leave'] = 'employee_leave/Admin/form';
$route['admin_edit_employee_leave/(:any)'] = "employee_leave/Admin/form/$1";
$route['admin_get_edit_form_employee_leave'] = "employee_leave/Admin/get_form";
$route['admin_get_employee_leave'] = "employee_leave/Admin/get_employee_leave";
$route['employees_leave_approval_status/(:any)/(:any)/(:any)'] = "employee_leave/Admin/approval_status/$1/$2/$3";
$route['employee_leave_search'] = 'employee_leave/Admin/search';
$route['employee_leave_search_month'] = 'employee_leave/Admin/employee_leave_search_month';
//Dashboard Module
$route['dashboard'] = 'dashboard/Admin/index';
$route['dashboard/(:any)'] = "dashboard/Admin/index/$1"; // used to load only middle content


// For certificate
$route['certificate'] = 'certificate/Admin/index';
$route['certificate/(:any)'] = "certificate/Admin/index/$1"; // used to load only middle content 
$route['admin_add_certificate'] = 'certificate/Admin/form';
$route['admin_edit_certificate/(:any)'] = "certificate/Admin/form/$1";
$route['admin_get_edit_form_certificate'] = "certificate/Admin/get_form";
$route['admin_status_certificate/(:any)'] = "certificate/Admin/status/$1";
$route['admin_delete_certificate/(:any)'] = "certificate/Admin/delete/$1";

// For Increement
$route['increement'] = 'increement/Admin/index';
$route['increement/(:any)'] = "increement/Admin/index/$1"; // used to load only middle content 
$route['admin_add_increement'] = 'increement/Admin/form';
$route['admin_edit_increement/(:any)'] = "increement/Admin/form/$1";
$route['admin_delete_increement/(:any)'] = "increement/Admin/delete/$1";
$route['admin_get_edit_form_increement'] = "increement/Admin/get_form";

$route['increement_check_salary_stracture'] = "increement/Admin/increement_check_salary_stracture";


// For Complaints
$route['complaints'] = 'complaints/Admin/index';
//$route['tenancy/(:any)'] = "tenancy_contracts/Admin/index/$1"; // used to load only middle content 
$route['complaints/(:any)'] = "complaints/Admin/index/$1"; // used to load only middle content 
$route['admin_add_complaints_details'] = 'complaints/Admin/form';
$route['admin_edit_complaints_details/(:any)'] = "complaints/Admin/form/$1";
$route['admin_get_edit_form_complaints_details'] = "complaints/Admin/get_form";
$route['admin_delete_complaints_details/(:any)'] = "complaints/Admin/delete/$1";

$route['admin_add_complaints'] = 'complaints/Admin/form_tenancy';
$route['admin_edit_complaints/(:any)'] = "complaints/Admin/form_tenancy/$1";
$route['admin_get_edit_form_complaints'] = "complaints/Admin/get_form_tenancy";

$route['complaints_details/(:any)'] = 'complaints/Admin/index_tenancy/$1';
$route['complaints_details/(:any)/(:any)'] = "complaints/Admin/index_tenancy/$1/$2"; // used to load only middle content 
$route['complaints_details/(:any)/(:any)/(:any)'] = "complaints/Admin/index_tenancy/$1/$2/$3"; // used to load only middle content 
$route['save_index_complaints/(:any)'] = "complaints/Admin/save_index_tenancy/$1/";


// For employee_gratuity
$route['employee_gratuity'] = 'employee_gratuity/Admin/index';
$route['employee_gratuity/(:any)'] = "employee_gratuity/Admin/index/$1"; // used to load only middle content 
//$route['admin_add_designation'] = 'employee_gratuity/Admin/form';
//$route['admin_edit_designation/(:any)'] = "employee_gratuity/Admin/form/$1";
//$route['admin_get_edit_form_designation'] = "designation/Admin/get_form";
//$route['admin_status_designation/(:any)'] = "designation/Admin/status/$1";
//$route['admin_delete_designation/(:any)'] = "designation/Admin/delete/$1";

// For Leave_settlement
$route['leave_settlement'] = 'leave_settlement/Admin/index';
$route['leave_settlement/(:any)'] = "leave_settlement/Admin/index/$1"; // used to load only middle content 
$route['admin_add_leave_settlement'] = 'leave_settlement/Admin/form';
$route['admin_edit_leave_settlement/(:any)'] = "leave_settlement/Admin/form/$1";
$route['admin_get_edit_form_leave_settlement'] = "leave_settlement/Admin/get_form";
$route['admin_status_leave_settlement/(:any)'] = "leave_settlement/Admin/status/$1";
$route['admin_delete_leave_settlement/(:any)'] = "leave_settlement/Admin/delete/$1";
$route['admin_get_employee_leave_settlement'] = "leave_settlement/Admin/get_employee_leave";

// For equipment
$route['equipment'] = 'equipment/Admin/index';
$route['equipment/(:any)'] = "equipment/Admin/index/$1"; // used to load only middle content 
$route['admin_add_equipment'] = 'equipment/Admin/form';
$route['admin_edit_equipment/(:any)'] = "equipment/Admin/form/$1";
$route['admin_get_edit_form_equipment'] = "equipment/Admin/get_form";
$route['admin_status_equipment/(:any)'] = "equipment/Admin/status/$1";
$route['admin_delete_equipment/(:any)'] = "equipment/Admin/delete/$1";



// For Closure


$route['admin_add_closure/(:any)'] = 'employees_details/Admin/form_closure/$1';

// $route['admin_edit_closure/(:any)'] = "employees_details/Admin/form_closure/$1";
// $route['admin_delete_closure/(:any)'] = "employees_details/Admin/delete/$1";
// $route['admin_get_edit_form_closure'] = "employees_details/Admin/get_closure_form";


// For  Warning & evaluation 

$route['admin_add_warning_evaluation/(:any)'] = 'employees_details/Admin/form_evaluation/$1';
$route['edit_warning_evaluation'] = 'employees_details/Admin/edit_warning_evaluation';

$route['admin_delete_warning/(:any)'] = "employees_details/Admin/delete_evaluation/$1";

////////For employee details ////////////////////////////


$route['employee_details'] = 'employee_details/Admin/index';
$route['employee_details/(:any)'] = "employee_details/Admin/index/$1"; // used to load only middle content
$route['search_leave_from_to'] = 'employee_details/Admin/search_leave_from_to';
//$route['admin_add_assigned_employee'] = 'employee_details/Admin/form';
// $route['admin_edit_assigned_employee/(:any)'] = "employee_details/Admin/form/$1";
// $route['admin_get_edit_form_assigned_employee'] = "employee_details/Admin/get_form";
// $route['admin_status_assigned_employee/(:any)'] = "employee_details/Admin/status/$1";
// $route['admin_delete_assigned_employee/(:any)'] = "employee_details/Admin/delete/$1"; 
//  

// For assigned  equipment
$route['assigned_employee'] = 'assigned_employee/Admin/index';
$route['assigned_employee/(:any)'] = "assigned_employee/Admin/index/$1"; // used to load only middle content 
$route['admin_add_assigned_employee'] = 'assigned_employee/Admin/form';
$route['admin_edit_assigned_employee/(:any)'] = "assigned_employee/Admin/form/$1";
$route['admin_get_edit_form_assigned_employee'] = "assigned_employee/Admin/get_form";
$route['admin_status_assigned_employee/(:any)'] = "assigned_employee/Admin/status/$1";
$route['admin_delete_assigned_employee/(:any)'] = "assigned_employee/Admin/delete/$1";

 ////////////P TAX //////////////////

$route['ptax']='Ptax/Admin/index';
$route['ptax/(:any)'] = "Ptax/Admin/index/$1"; // used to load only middle content 
$route['admin_get_edit_form_p_tax']='Ptax/Admin/get_form';
$route['admin_add_p_tax'] = 'Ptax/Admin/form';
$route['admin_edit_p_tax/(:any)'] = "Ptax/Admin/form/$1";
$route['admin_status_p_tax/(:any)']='Ptax/Admin/status/$1';
$route['admin_delete_p_tax/(:any)']='Ptax/Admin/delete/$1';
$route['div_add_ptax_field']='Ptax/Admin/div_add_ptax_field';



///////////// State Add ///////////

$route['state_add']='State/Admin/index';
$route['state_add/(:any)'] = "State/Admin/index/$1"; // used to load only middle content 
$route['admin_get_edit_form_state_add']='State/Admin/get_form';
$route['admin_add_state_add'] = 'State/Admin/form';
$route['admin_edit_state_add/(:any)'] = "State/Admin/form/$1";
$route['admin_status_state_add/(:any)']='State/Admin/status/$1';
$route['admin_delete_state_add/(:any)']='State/Admin/delete/$1';



///////////// PF ///////////

$route['pf']='PF/Admin/index';
$route['pf/(:any)'] = "PF/Admin/index/$1"; // used to load only middle content 
$route['admin_get_edit_form_pf']='PF/Admin/get_form';
$route['admin_add_pf'] = 'PF/Admin/form';
$route['admin_edit_pf/(:any)'] = "PF/Admin/form/$1";
$route['admin_status_pf/(:any)']='PF/Admin/status/$1';
$route['admin_delete_pf/(:any)']='PF/Admin/delete/$1';


// For assigned  location
$route['assigned_location'] = 'assigned_location/Admin/index';
$route['assigned_location/(:any)'] = "assigned_location/Admin/index/$1"; // used to load only middle content 
$route['admin_add_assigned_location'] = 'assigned_location/Admin/form';
$route['admin_edit_assigned_location/(:any)'] = "assigned_location/Admin/form/$1";
$route['admin_get_edit_form_assigned_location'] = "assigned_location/Admin/get_form";
$route['admin_status_assigned_location/(:any)'] = "assigned_location/Admin/status/$1";
$route['admin_delete_assigned_location/(:any)'] = "assigned_location/Admin/delete/$1";


// For Pay Schedule
$route['pay_schedule'] = 'Pay_schedule/Admin/index';
$route['pay_schedule/(:any)'] = "Pay_schedule/Admin/index/$1"; // used to load only middle content 
$route['admin_add_pay_schedule'] = 'Pay_schedule/Admin/form';
$route['admin_edit_pay_schedule/(:any)'] = "Pay_schedule/Admin/form/$1";
$route['admin_get_edit_form_pay_schedule'] = "Pay_schedule/Admin/get_form";
$route['admin_status_pay_schedule/(:any)'] = "Pay_schedule/Admin/status/$1";
$route['admin_delete_pay_schedule/(:any)'] = "Pay_schedule/Admin/delete/$1";

///////////// ESI ///////////

$route['esi']='ESI/Admin/index';
$route['esi/(:any)'] = "ESI/Admin/index/$1"; // used to load only middle content 
$route['admin_get_edit_form_esi']='ESI/Admin/get_form';
$route['admin_add_esi'] = 'ESI/Admin/form';
$route['admin_edit_esi/(:any)'] = "ESI/Admin/form/$1";
$route['admin_status_esi/(:any)']='ESI/Admin/status/$1';
$route['admin_delete_esi/(:any)']='ESI/Admin/delete/$1';

//statutory//
$route['statutory']='ESI/Admin/statutory';

// For assigned  WorkShift
$route['assigned_work_shift'] = 'assigned_workshift/Admin/index';
$route['assigned_work_shift/(:any)'] = "assigned_workshift/Admin/index/$1"; // used to load only middle content 
$route['admin_add_assigned_work_shift'] = 'assigned_workshift/Admin/form';
$route['admin_edit_assigned_work_shift/(:any)'] = "assigned_workshift/Admin/form/$1";
$route['admin_get_edit_form_assigned_work_shift'] = "assigned_workshift/Admin/get_form";
$route['admin_status_assigned_work_shift/(:any)'] = "assigned_workshift/Admin/status/$1";
$route['admin_delete_assigned_work_shift/(:any)'] = "assigned_workshift/Admin/delete/$1";
$route['admin_employee_worksheet'] = 'assigned_workshift/Admin/index_ajax';

// For notice
$route['notice'] = 'notice/Admin/index';
$route['notice/(:any)'] = "notice/Admin/index/$1"; // used to load only middle content 
$route['admin_add_notice'] = 'notice/Admin/form';
$route['admin_edit_notice/(:any)'] = "notice/Admin/form/$1";
$route['admin_get_edit_form_notice'] = "notice/Admin/get_form";
$route['admin_status_notice/(:any)'] = "notice/Admin/status/$1";
$route['admin_delete_notice/(:any)'] = "notice/Admin/delete/$1";

// For Lop_formula
$route['lop'] = 'lop/Admin/index';
$route['lop/(:any)'] = "lop/Admin/index/$1"; // used to load only middle content 
$route['admin_add_lop'] = 'lop/Admin/form';
$route['admin_edit_lop/(:any)'] = "lop/Admin/form/$1";
$route['admin_get_edit_form_lop'] = "lop/Admin/get_form";
$route['admin_status_lop/(:any)'] = "lop/Admin/status/$1";
$route['admin_delete_lop/(:any)'] = "lop/Admin/delete/$1";



// For employee_Loan
$route['employee_loan'] = 'employee_loan/Admin/index';
$route['employee_loan/(:any)'] = "employee_loan/Admin/index/$1"; // used to load only middle content 
$route['admin_add_employee_loan'] = 'employee_loan/Admin/form';
$route['admin_edit_employee_loan/(:any)'] = "employee_loan/Admin/form/$1";
$route['admin_get_edit_form_employee_loan'] = "employee_loan/Admin/get_form";
$route['admin_get_employee_loan'] = "employee_loan/Admin/get_employee_leave";
$route['admin_delete_loan/(:any)'] = "employee_loan/Admin/delete/$1";


//insentive reimbusment rule
$route['incentive_reimbursement_rule'] = 'incentive_reimbursement_rule/Admin/index';
$route['incentive_reimbursement_rule/(:any)'] = "incentive_reimbursement_rule/Admin/index/$1"; // used to load only middle content 
$route['admin_add_incentive_reimbursement_rule'] = 'incentive_reimbursement_rule/Admin/form';
$route['admin_edit_incentive_reimbursement_rule/(:any)'] = "incentive_reimbursement_rule/Admin/form/$1";
$route['admin_get_edit_form_set_formula'] = "incentive_reimbursement_rule/Admin/get_form";
$route['div_colon_set_formula'] = "incentive_reimbursement_rule/Admin/div_colon";

//$route['employees_leave_approval_status/(:any)/(:any)/(:any)'] = "employee_loan/Admin/approval_status/$1/$2/$3";
//$route['employee_leave_search'] = 'employee_loan/Admin/search';
//$route['employee_leave_search_month'] = 'employee_loan/Admin/employee_leave_search_month';

