<?php
/**
 * attendance Model Class. Handles all the datatypes and methodes required for handling attendance
 */
class AttendanceModel extends CI_Model {

    /**
     * The constructor method of this class.
     *
     * @access  public
     * @param none
     * @return  Loads all the method, helper, library etc. required throughout this class
     */
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library("session");
        $this->load->helper('string');
		$this->load->model('Adminauthmodel');
    }

    /**
     * Used for loading functionality of attendance for an admin
     *
     * <p>Description</p>
     *
     * <p>This function loads all the attendance that has been added by current admin [Table: attendance]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_all_data() {
        //echo "<pre>";print_r($_GET);exit;
        $this->db->select('t1.*,t2.first_name,t2.middle_name,t2.last_name,t2.employee_no,t2.department,t2.designation'); 

        $this->db->from(tablename('attendance') . ' as t1');
        $this->db->join(tablename('employee'). ' as t2', 't1.employee_id = t2.id');
        $this->db->where('t1.delete_flag', 'N');

        if(isset($_GET['start_date']) && isset($_GET['end_date'])){
            $where = "(t1.date >= '".$_GET['start_date']."' AND t1.date <= '".$_GET['end_date']."')";
            $this->db->where($where); 
            $this->db->order_by('t1.date', 'desc'); 
        }else{
            $this->db->where('t1.date', date('Y-m-d')); 
        }        



        $query = $this->db->get();
        $result = $query->result();
       // echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
    
   
    
    

    /**
     * Used for fetching rows from a table
     *
     * <p>Description</p>
     *
     * <p>This function fetches rows from any table depending upon condition</p>
     *
     * @access  public
     * @param   {string} table - the table name whose data will be fetched
     * @param   {array[]} where - the where clause parameter for the sql
     * @return array
     */
    public function get_result_data($table, $where = "1=1") {
        $query = $this->db->get_where(tablename($table), $where);
        return $query->result();
    }

    /**
     * Used for fetching row from a table
     *
     * <p>Description</p>
     *
     * <p>This function Used for fetching row</p>
     *
     * @access  public
     * @param   {string} table - the table name whose data will be fetched
     * @param   {array[]} where - the where clause parameter for the sql
     * @return  array
     */
    public function get_row_data($table, $where) {
        $query = $this->db->get_where(tablename($table), $where);
        return $query->row();
    }
	
	public function get_row_data_idorderby($table, $where) {
		$this->db->order_by("id", "desc");
        $query = $this->db->get_where(tablename($table), $where);
        return $query->row();
    }

	public function get_result_data_with_order_by($table, $where = "1=1") {
		
		$this->db->order_by("first_name", "asc");
        $query = $this->db->get_where(tablename($table), $where);
        return $query->result();
    }


  /**
     * Used for add/edit rows from a table
     *
     * <p>Description</p>
     *
     * <p>This function Used for add/edit attendance</p>
     *
     * @access  public
     * @param   id
     * @return string
     */

     public function modify($id) {  
      
        $month = date('m',strtotime($this->input->post('date')));
        $year = date('Y',strtotime($this->input->post('date')));
        $stDate= $this->input->post('start_date');
        $att_date= date('Y-m-d',strtotime($this->input->post('date')));
        $employee_id= $this->input->post('employee_id');
        $type= $this->input->post('type_val');
        //$att_type_val= $this->input->post('att_type_val');
        $entry_time= date('H:i',strtotime($this->input->post('entry_time')));
        $out_time = date('H:i',strtotime($this->input->post('out_time')));
        $organization_id= $this->input->post('organization_id');
        $out_time = ($this->input->post('out_time')) ? date('H:i',strtotime($this->input->post('out_time'))) :'' ;
		 
        $Hours = '';
        $inss_type = 0;
        $employee_grade = $this->AttendanceModel->get_row_data('employee',array('id'=>$employee_id,'delete_flag'=>'N'));
        $assigned_workshift = $this->AttendanceModel->get_row_data('assigned_workshift',array('employee_id'=>$employee_id,'delete_flag'=>'N','start_date'=>date('Y-m-d',strtotime($att_date))));
        if(!empty($assigned_workshift)){
        $workshift =  $assigned_workshift->work_shift_id;
        }else{
        $workshift =  $employee_grade->work_shift_id;
        }


  

        if(!empty($employee_grade) && $employee_grade->grade!=''){
			$stweekname = date('l',strtotime($att_date));
			$curdate = date('Y-m-d',strtotime($att_date));
            $weekNo = getWeeks($curdate,$stweekname);
			$attendance_rules = '';
            $workshiftdetails = $this->AttendanceModel->get_workshift_details($workshift,$weekNo,$stweekname);
			//echo  '<pre>'; print_r($workshiftdetails); die;
			
            //echo '<pre>'; print_r($attendance_rules); die; 
			//die;
			if($workshiftdetails->weekvalue == 'rule_1'){
				$work_hour_start = $workshiftdetails->work_hour_start_1;
				$work_hour_end = $workshiftdetails->work_hour_end_1;
				$work_hour_duration = $workshiftdetails->work_hour_duration_1;
				$attendance_rules = $this->AttendanceModel->get_attendance_rule_workshiftwise($workshift,'Full');
				//echo '<pre>'; print_r($attendance_rules); die;
			}elseif($workshiftdetails->weekvalue == 'rule_2'){
				$work_hour_start = $workshiftdetails->work_hour_start_2;
				$work_hour_end = $workshiftdetails->work_hour_end_2;
				$work_hour_duration = $workshiftdetails->work_hour_duration_2;
				$attendance_rules = $this->AttendanceModel->get_attendance_rule_workshiftwise($workshift,'Half');
			}elseif($workshiftdetails->weekvalue == 'Full'){
				if($workshiftdetails->weekoff == 'rule_1'){
					$work_hour_start = $workshiftdetails->work_hour_start_1;
					$work_hour_end = $workshiftdetails->work_hour_end_1;
					$work_hour_duration = $workshiftdetails->work_hour_duration_1;
					$attendance_rules = $this->AttendanceModel->get_attendance_rule_workshiftwise($workshift,'Full');
				}else{
					$work_hour_start = $workshiftdetails->work_hour_start_2;
					$work_hour_end = $workshiftdetails->work_hour_end_2;
					$work_hour_duration = $workshiftdetails->work_hour_duration_2;
					$attendance_rules = $this->AttendanceModel->get_attendance_rule_workshiftwise($workshift,'Half');
				}
				
			}
			
			//echo '<pre>'; print_r($attendance_rules); die;
            $work_hour_grace = substr($workshiftdetails->work_hour_grace,3,2);
            //echo $work_hour_grace; die;
            $requiredtime=strtotime(date($work_hour_start))+($work_hour_grace*60);//15*60=900 seconds
            $requiredTime=date("h:i",$requiredtime);
///echo $requiredTime; die;
            if(strtotime($entry_time) <= strtotime($requiredTime)){
            $late_type = 'Not Late';
            }else{
            $late_type = 'Late';
            }
            //echo $late_type; die;
            $firstlaterule = $this->AttendanceModel->get_row_data('master_late_rules',array('delete_flag'=>'N','is_active' =>'Y','occurrence_type' =>'First Occurence'));

            $Afterfirstlaterule = $this->AttendanceModel->get_row_data('master_late_rules',array('delete_flag'=>'N','is_active' =>'Y','occurrence_type' =>'After First Occurence'));


            $leave_details = $this->AttendanceModel->get_row_data('master_grade',array('id'=>@$employee_grade->grade));
            $emp_leave = explode(',', @$leave_details->leave_rule_id);
           
            if($entry_time!="" && $out_time!=""){
                // calcaulate diff of entry_time and out_time

            //$timeDiff = strtotime($entry_time) - strtotime($out_time);

            //$Hours = substr('00'.($timeDiff / 3600 % 24),-2);
           // $Hours = str_replace("-","",$Hours);
            //$Hours = sprintf("%02d", $Hours);

            //$Mint = substr('00'.($timeDiff / 60 % 60),-2);

           // $timme = $Hours.':'.$Mint;

           // $total_hour = str_replace("-","",$timme);
            $total_hour = getTimeDiff($entry_time,$out_time);
            $overTime = "";
        // echo $attendance_rules->min_hrs_for_full_day; die;
		$total_after_timeoff ="";
		   $check_eaarly_leave = $this->AttendanceModel->get_row_data('timeoff',array('employee_id'=>$employee_id,'date'=>$att_date,'approved' =>'Yes','delete_flag'=>'N','is_active' => 'Y'));
		   if(!empty($check_eaarly_leave)){
			   $check_timeoff_rule = $this->AttendanceModel->get_row_data('master_wfh_rules',array('type'=>'personal'));
			   if(!empty($check_timeoff_rule)){
				   $min_hrs_app_day = $check_timeoff_rule->max_hrs_apply_per_day;
				   $total_after_timeoff = $total_hour + $min_hrs_app_day;
				   //echo $total_after_timeoff; die;
			   }
			   
		   }
		   if($total_after_timeoff >= $total_hour){
			    $inss_type = 2;
                $day_type = 'EarlyLeave';
		   }else{
				//echo '<pre>';print_r($attendance_rules->min_hrs_for_half_day); die;
				if(@$attendance_rules->incomplete_present_for_less_then != '00:00'){
					$rules_for_apsent_hrs = @$attendance_rules->incomplete_present_for_less_then;
				}else{
					$rules_for_apsent_hrs = @$attendance_rules->min_hrs_for_full_day;
				}
				
            if((@$attendance_rules->min_hrs_for_half_day != '00:00') && ($total_hour >= @$attendance_rules->min_hrs_for_half_day) && ($total_hour < @$attendance_rules->min_hrs_for_full_day) ){
                //half day insert
                $inss_type = 1;
                $day_type = 'Half Day';
            }else if((@$attendance_rules->over_time_after_hour != '00:00') && ($total_hour >= @$attendance_rules->min_hrs_for_full_day) && ($total_hour <= @$attendance_rules->over_time_after_hour)){
                //full day insert
                $inss_type = 2;
                $day_type = 'Full Day';
            }elseif($total_hour < $rules_for_apsent_hrs){
                $inss_type = 4;
                $day_type = 'Absent';
            }else if((@$attendance_rules->over_time_after_hour != '00:00') && ($total_hour > @$attendance_rules->min_hrs_for_full_day) && ($total_hour > @$attendance_rules->over_time_after_hour)){
                //over time insert
                $inss_type = 3;
                $day_type = 'Over Time';
                $overTime = $total_hour - @$attendance_rules->over_time_after_hour;
            }else if(($total_hour >= @$attendance_rules->min_hrs_for_full_day) && (@$attendance_rules->over_time_after_hour == '00:00')){
				$inss_type = 2;
                $day_type = 'Full Day';
			}
		   }

            }
            //echo $day_type; die;

        }

//echo '<pre>'; print_r($attendance_rules); die;    
        $date = date("Y-m-d H:i:s");

        if (!empty($id)) {
                $data = array(
                    'date' => date('Y-m-d',strtotime($att_date)),
                    'employee_id' => $employee_id,
                    //'flag'=>'1',
                    'entry_time' => $entry_time,
                    'out_time' => $out_time,
                    'total_hour' => @$total_hour,
                    'day_type' => @$day_type,
                    'late_type' => @$late_type,
                    'overTime' => @$overTime,
                    'modified_date' => $date
                );
           
            $this->db->where('id', $id)->update(tablename('attendance'), $data);

            $this->db->delete('HR_employee_leaves', array('attendance_id' => $id)); 

            if($inss_type==1){

                $check_half_day = $this->AttendanceModel->get_row_data('attendance_half_day',array('employee_id'=>$employee_id,'attendance_id'=>$id));
                if(!empty($check_half_day)){
                $data_half_day = array(
                    'attendance_id' => $id,
                    'date' => date('Y-m-d',strtotime($att_date)),
                    'employee_id' => $employee_id,
                    'total_hour' => @$total_hour,
                    'minimum_hour' => @$attendance_rules->min_hrs_for_half_day,
                    'modified_date' => $date
                );
           
                $this->db->where('attendance_id', $id)->where('employee_id', $employee_id)->update(tablename('attendance_half_day'), $data_half_day);
				
				  $leaveTypeArrhalf =  explode(',', $attendance_rules->leave_type_half);
               if(!empty($leaveTypeArrhalf)){
                for($i=0; $i<count($leaveTypeArrhalf); $i++){
                    $j = $i+1;

                     $empleave = $this->AttendanceModel->leave_balance($leaveTypeArrhalf[$i],$employee_id);
                    
                     if(!empty($empleave) && $empleave >= '1'){

                     $dataleavehalf = array(
                        'employee_id' =>  $employee_id,
                        'attendance_id' => $id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Half',
                         //'closing_balance' => $empleave->closing_balance - 1,
                        'note' => 'deduction',
                        );
                       
                        $dataleavehalf['taken_leaves'] = $attendance_rules->nos_half;
                        $dataleavehalf['leave_id'] = $leaveTypeArrhalf[$i];
                       // $dataleave['closing_balance'] = $empleave->closing_balance - 1;
                        $dataleavehalf['opening_balance'] = '-'.$attendance_rules->nos_half;
                      
                        //$dataleave['lop'] = '1';
                        //$dataleave['closing_balance'] = '0';
                        
                        $this->db->insert(tablename('employee_leaves'), $dataleavehalf);
                        break;
                    }

                    if(count($leaveTypeArrhalf) == $j){
                       //  print_r(count($leaveTypeArr)); die;
                        $dataleavehalf = array(
                        'employee_id' =>  $employee_id,
                        'attendance_id' => $id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Half',
                        'note' => 'deduction',
                        );
                        $dataleavehalf['lop'] = $attendance_rules->nos_half;
                        $dataleavehalf['closing_balance'] = '0';
                        $this->db->insert(tablename('employee_leaves'), $dataleavehalf);
                         break;
                    }
                }

               }
            }else{
                $data_half_day = array(
                    'attendance_id' => $id,
                    'date' => date('Y-m-d',strtotime($att_date)),
                    'employee_id' => $employee_id,
                    'total_hour' => @$total_hour,
                    'minimum_hour' => @$attendance_rules->min_hrs_for_half_day,
                    'entry_date' => $date
                );
           
                $this->db->insert(tablename('attendance_half_day'), $data_half_day);
				$leaveTypeArrhalf =  explode(',', $attendance_rules->leave_type_half);
               if(!empty($leaveTypeArrhalf)){
                for($i=0; $i<count($leaveTypeArrhalf); $i++){
                    $j = $i+1;

                     $empleave = $this->AttendanceModel->leave_balance($leaveTypeArrhalf[$i],$employee_id);
                    
                     if(!empty($empleave) && $empleave >= '1'){

                     $dataleavehalf = array(
                        'employee_id' =>  $employee_id,
                        'attendance_id' => $id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Half',
                         //'closing_balance' => $empleave->closing_balance - 1,
                        'note' => 'deduction',
                        );
                       
                        $dataleavehalf['taken_leaves'] = $attendance_rules->nos_half;
                        $dataleavehalf['leave_id'] = $leaveTypeArrhalf[$i];
                       // $dataleave['closing_balance'] = $empleave->closing_balance - 1;
                        $dataleavehalf['opening_balance'] = '-'.$attendance_rules->nos_half;
                      
                        //$dataleave['lop'] = '1';
                        //$dataleave['closing_balance'] = '0';
                        
                        $this->db->insert(tablename('employee_leaves'), $dataleavehalf);
                        break;
                    }

                    if(count($leaveTypeArrhalf) == $j){
                       //  print_r(count($leaveTypeArr)); die;
                        $dataleavehalf = array(
                        'employee_id' =>  $employee_id,
                        'attendance_id' => $id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Half',
                        'note' => 'deduction',
                        );
                        $dataleavehalf['lop'] = $attendance_rules->nos_half;
                        $dataleavehalf['closing_balance'] = '0';
                        $this->db->insert(tablename('employee_leaves'), $dataleavehalf);
                         break;
                    }
                }

               }
			   
            }
            $delete = array(
                    'delete_flag' => "Y",
                    'is_active' => "N",
                    'modified_date' => $date
                );
                $this->db->where('attendance_id', $id)->where('employee_id', $employee_id)->update(tablename('attendance_overtime'), $delete);
                $this->db->where('attendance_id', $id)->where('employee_id', $employee_id)->update(tablename('attendance_incomplete_present'), $delete);


            }else if($inss_type==3){
                $check_overtime = $this->AttendanceModel->get_row_data('attendance_overtime',array('employee_id'=>$employee_id,'attendance_id'=>$id));
                if(!empty($check_overtime)){
                 $data_overtime = array(
                    'attendance_id' => $id,
                    'date' => date('Y-m-d',strtotime($att_date)),
                    'employee_id' => $employee_id,
                    'total_hour' => @$total_hour,
                    'minimum_hour' => @$attendance_rules->over_time_after_hour,
                    'modified_date' => $date
                );
           
                $this->db->where('attendance_id', $id)->where('employee_id', $employee_id)->update(tablename('attendance_overtime'), $data_overtime);
                }else{
                     $data_overtime = array(
                    'attendance_id' => $id,
                    'date' => date('Y-m-d',strtotime($att_date)),
                    'employee_id' => $employee_id,
                    'total_hour' => @$total_hour,
                    'minimum_hour' => @$attendance_rules->over_time_after_hour,
                    'entry_date' => $date
                );
           
                $this->db->insert(tablename('attendance_overtime'), $data_overtime);
                }

                $delete = array(
                    'delete_flag' => "Y",
                    'is_active' => "N",
                    'modified_date' => $date
                );
           
                $this->db->where('attendance_id', $id)->where('employee_id', $employee_id)->update(tablename('attendance_half_day'), $delete);
                $this->db->where('attendance_id', $id)->where('employee_id', $employee_id)->update(tablename('attendance_incomplete_present'), $delete);

            }else if($inss_type==4){
                $check_incomplete_present = $this->AttendanceModel->get_row_data('attendance_incomplete_present',array('employee_id'=>$employee_id,'attendance_id'=>$id));
                if(!empty($check_incomplete_present)){
                 $data_incomplete_present = array(
                    'attendance_id' => $id,
                    'date' => date('Y-m-d',strtotime($att_date)),
                    'employee_id' => $employee_id,
                    'total_hour' => @$total_hour,
                    'minimum_hour' => $rules_for_apsent_hrs,
                    'modified_date' => $date
                );
           
                $this->db->where('attendance_id', $id)->where('employee_id', $employee_id)->update(tablename('attendance_incomplete_present'), $data_incomplete_present);

                $leaveTypeArr =  explode(',', $attendance_rules->leave_type);
               if(!empty($leaveTypeArr)){
                for($i=0; $i<count($leaveTypeArr); $i++){
                    $j = $i+1;

                     $empleave = $this->AttendanceModel->leave_balance($leaveTypeArr[$i],$employee_id);
                    
                     if(!empty($empleave) && $empleave >= '1'){

                     $dataleave = array(
                        'employee_id' =>  $employee_id,
                        'attendance_id' => $id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Absent',
                         //'closing_balance' => $empleave->closing_balance - 1,
                        'note' => 'deduction',
                        );
                       
                        $dataleave['taken_leaves'] = $attendance_rules->nos;
                        $dataleave['leave_id'] = $leaveTypeArr[$i];
                       // $dataleave['closing_balance'] = $empleave->closing_balance - 1;
                        $dataleave['opening_balance'] = '-'.$attendance_rules->nos;
                      
                        //$dataleave['lop'] = '1';
                        //$dataleave['closing_balance'] = '0';
                        
                        $this->db->insert(tablename('employee_leaves'), $dataleave);
                        break;
                    }

                    if(count($leaveTypeArr) == $j){
                       //  print_r(count($leaveTypeArr)); die;
                        $dataleave = array(
                        'employee_id' =>  $employee_id,
                        'attendance_id' => $id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Absent',
                        'note' => 'deduction',
                        );
                        $dataleave['lop'] = $attendance_rules->nos;
                        $dataleave['closing_balance'] = '0';
                        $this->db->insert(tablename('employee_leaves'), $dataleave);
                         break;
                    }
                }

               }
                }else{
                     $data_incomplete_present = array(
                    'attendance_id' => $id,
                    'date' => date('Y-m-d',strtotime($att_date)),
                    'employee_id' => $employee_id,
                    'total_hour' => @$total_hour,
                    'minimum_hour' => $rules_for_apsent_hrs,
                    'entry_date' => $date
                );
           
                $this->db->insert(tablename('attendance_incomplete_present'), $data_incomplete_present);

                $leaveTypeArr =  explode(',', $attendance_rules->leave_type);
               if(!empty($leaveTypeArr)){
                for($i=0; $i<count($leaveTypeArr); $i++){
                    $j = $i+1;

                     $empleave = $this->AttendanceModel->leave_balance($leaveTypeArr[$i],$employee_id);
                    
                     if(!empty($empleave) && $empleave >= '1'){

                     $dataleave = array(
                        'employee_id' =>  $employee_id,
                        'attendance_id' => $id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Absent',
                         //'closing_balance' => $empleave->closing_balance - 1,
                        'note' => 'deduction',
                        );
                       
                        $dataleave['taken_leaves'] = $attendance_rules->nos;
                        $dataleave['leave_id'] = $leaveTypeArr[$i];
                       // $dataleave['closing_balance'] = $empleave->closing_balance - 1;
                        $dataleave['opening_balance'] = '-'.$attendance_rules->nos;
                      
                        //$dataleave['lop'] = '1';
                        //$dataleave['closing_balance'] = '0';
                        
                        $this->db->insert(tablename('employee_leaves'), $dataleave);
                        break;
                    }

                    if(count($leaveTypeArr) == $j){
                       //  print_r(count($leaveTypeArr)); die;
                        $dataleave = array(
                        'employee_id' =>  $employee_id,
                        'attendance_id' => $id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Absent',
                        'note' => 'deduction',
                        );
                        $dataleave['lop'] = $attendance_rules->nos;
                        $dataleave['closing_balance'] = '0';
                        $this->db->insert(tablename('employee_leaves'), $dataleave);
                         break;
                    }
                }

               }
                }

                $delete = array(
                    'delete_flag' => "Y",
                    'is_active' => "N",
                    'modified_date' => $date
                );
           
                $this->db->where('attendance_id', $id)->where('employee_id', $employee_id)->update(tablename('attendance_overtime'), $delete);
                 $this->db->where('attendance_id', $id)->where('employee_id', $employee_id)->update(tablename('attendance_half_day'), $delete);

            }else{

                $delete = array(
                    'delete_flag' => "Y",
                    'is_active' => "N",
                    'modified_date' => $date
                );
           
                $this->db->where('attendance_id', $id)->where('employee_id', $employee_id)->update(tablename('attendance_half_day'), $delete);
                $this->db->where('attendance_id', $id)->where('employee_id', $employee_id)->update(tablename('attendance_overtime'), $delete);
                 $this->db->where('attendance_id', $id)->where('employee_id', $employee_id)->update(tablename('attendance_incomplete_present'), $delete);

            }


            $lateCountup = $this->AttendanceModel->latecount($month,$year,$employee_id);
            //echo $lateCountup ; die;

            if(!empty($firstlaterule)){
                //print_r($firstlaterule->no_of_occu_allowed);
                if($firstlaterule->no_of_occu_allowed == $lateCountup && $firstlaterule->deduction_apply == 'Y'){
                    

                    $countlatededuction = $this->AttendanceModel->get_row_data_orderby('employee_leaves',array('credited_month'=>date('F',strtotime($att_date)),'employee_id'=>$employee_id,'type' => 'Late Deduction'));

                 //echo '<pre>'; print_r($empleave); die;
                    if(empty($countlatededuction)){
                        $firstLateeArr =  explode(',', $firstlaterule->leave_type);

                        if(!empty($firstLateeArr)){
                        for($i=0; $i<count($firstLateeArr); $i++){
                        $j = $i+1;

                    //$empleave = $this->AttendanceModel->get_row_data_orderby('employee_leaves',array('leave_id'=>$firstLateeArr[$i],'employee_id'=>$employee_id));
                    $empleave = $this->AttendanceModel->leave_balance($firstLateeArr[$i],$employee_id);
                    
                     if(!empty($empleave) && $empleave >= '1'){

                    $dataleave = array(
                        'employee_id' =>  $employee_id,
                        //'attendance_id' => $insert_id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Late Deduction',
                        'note' => 'deduction',
                        'flag' => '100'
                        );
                       
                        $dataleave['taken_leaves'] = $firstlaterule->nos;
                        $dataleave['leave_id'] = $firstLateeArr[$i];
                        //$dataleave['closing_balance'] = $empleave->closing_balance - $firstlaterule->nos;
                        $dataleave['opening_balance'] = '-'.$firstlaterule->nos;
                    
                        
                        $this->db->insert(tablename('employee_leaves'), $dataleave);
                        break;
                    }

                    if(count($firstLateeArr) == $j){
                       //  print_r(count($leaveTypeArr)); die;
                        $dataleave = array(
                        'employee_id' =>  $employee_id,
                       // 'attendance_id' => $insert_id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Late Deduction',
                        'note' => 'deduction',
                        'flag' => '100'
                        );
                        $dataleave['lop'] = $firstlaterule->nos;
                        //$dataleave['closing_balance'] = '0';
                        $this->db->insert(tablename('employee_leaves'), $dataleave);
                         break;
                                }
                             }

                         }
                     }
                }elseif($lateCountup < $firstlaterule->no_of_occu_allowed && $firstlaterule->deduction_apply == 'Y'){
                    //echo $lateCountup; die;
                    $this->db->delete('HR_employee_leaves', array('credited_month'=>date('F',strtotime($att_date)),'employee_id'=>$employee_id,'type' => 'Late Deduction','flag' => '100')); 
                    //echo $this->db->last_query(); die;

                }

            }


            if(!empty($Afterfirstlaterule)){
                if($lateCountup > $firstlaterule->no_of_occu_allowed+$Afterfirstlaterule->no_of_occu_allowed -2 ){
                    $countafterfist = ($lateCountup - $firstlaterule->no_of_occu_allowed)/ $Afterfirstlaterule->no_of_occu_allowed;
                   // echo $countafterfist; die;
                 $flag = $this->AttendanceModel->get_row_data_orderby('employee_leaves',array('credited_month'=>date('F',strtotime($att_date)),'employee_id'=>$employee_id,'type' => 'Late Deduction'));
                //echo 'yyy'; print_r($countafterfist); echo 'pre'; echo $flag->flag; //die;
                if(!empty($flag) && $flag->flag != $countafterfist){
                     //print_r($countafterfist); echo 'pre'; echo $flag->flag; //die;
                if($countafterfist == '1' || $countafterfist == '2' || $countafterfist == '3' || $countafterfist == '4' || $countafterfist == '5' || $countafterfist == '6' || $countafterfist == '7' || $countafterfist == '8' || $countafterfist == '9' || $countafterfist == '10' && $Afterfirstlaterule->deduction_apply == 'Y'){
                         $AfterfirstLateArr =  explode(',', $Afterfirstlaterule->leave_type);
    
                        if(!empty($AfterfirstLateArr)){
                        for($i=0; $i<count($AfterfirstLateArr); $i++){
                        $j = $i+1;

                        //$empleave = $this->AttendanceModel->get_row_data_orderby('employee_leaves',array('leave_id'=>$AfterfirstLateArr[$i],'employee_id'=>$employee_id));
                        $empleave = $this->AttendanceModel->leave_balance($AfterfirstLateArr[$i],$employee_id);

                        if(!empty($empleave) && $empleave >= '1'){

                        $dataleave = array(
                        'employee_id' =>  $employee_id,
                        //'attendance_id' => $insert_id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Late Deduction',
                        'note' => 'deduction',
                        'flag' => $countafterfist,
                        );

                        $dataleave['taken_leaves'] = $Afterfirstlaterule->nos;
                         $dataleave['leave_id'] = $AfterfirstLateArr[$i];
                         $dataleave['opening_balance'] = '-'.$Afterfirstlaterule->nos;
                       // $dataleave['closing_balance'] = $empleave->closing_balance - $Afterfirstlaterule->nos;


                        $this->db->insert(tablename('employee_leaves'), $dataleave);
                        break;
                        }

                        if(count($AfterfirstLateArr) == $j &&  !empty($empleave) && $empleave == '0' || $empleave == '0.5'){
                        //  print_r(count($leaveTypeArr)); die;
                        $dataleave = array(
                        'employee_id' =>  $employee_id,
                        //'attendance_id' => $insert_id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Late Deduction',
                        'note' => 'deduction',
                        'flag' => $countafterfist,
                        );
                        $dataleave['lop'] = $Afterfirstlaterule->nos;
                        //$dataleave['closing_balance'] = '0';
                        $this->db->insert(tablename('employee_leaves'), $dataleave);
                         break;
                                }
                             }

                         }
                    
                }elseif($countafterfist < $flag->flag){
                //print_r($countafterfist); echo 'pre'; echo $flag->flag; //die;
                 $this->db->delete('HR_employee_leaves', array('credited_month'=>date('F',strtotime($att_date)),'employee_id'=>$employee_id,'type' => 'Late Deduction','flag' => $flag->flag, 'flag !=' => '100'));
            }
            }
        }
            }



            $this->session->set_flashdata('successmessage', 'Attendance modified successfully');

            if(isset($stDate) && $stDate!=''){
                $url = 'attendance/1?start_date='.$stDate.'&submit=';
            }else{
                $url = 'attendance/1';
            }
            redirect(base_url($url));
        } else {
         
                $data = array(
                     'date' => date('Y-m-d',strtotime($att_date)),
                    'employee_id' => $employee_id,
                   // 'type' => $type,
                    //'att_type' => $att_type_val,
                    'flag'=>'1',
                    'entry_time' => $entry_time,
                    'out_time' => $out_time,
                    'total_hour' => @$total_hour,
                    'day_type' => @$day_type,
                    'late_type' => @$late_type,
                    'overTime' => @$overTime,
                    'entry_date' => $date
                );
            
            $this->db->insert(tablename('attendance'), $data);
            $insert_id = $this->db->insert_id();
			
			
             if($inss_type==1){

                $data_half_day = array(
                    'attendance_id' => $insert_id,
                    'date' => date('Y-m-d',strtotime($att_date)),
                    'employee_id' => $employee_id,
                    'total_hour' => @$total_hour,
                    'minimum_hour' => @$attendance_rules->min_hrs_for_half_day,
                    'entry_date' => $date
                );
           
                $this->db->insert(tablename('attendance_half_day'), $data_half_day);
				
				 $leaveTypeArrhalf =  explode(',', $attendance_rules->leave_type_half);
               if(!empty($leaveTypeArrhalf)){
                for($i=0; $i<count($leaveTypeArrhalf); $i++){
                    $j = $i+1;

                     $empleave = $this->AttendanceModel->leave_balance($leaveTypeArrhalf[$i],$employee_id);
                    
                     if(!empty($empleave) && $empleave >= '1'){

                     $dataleavehalf = array(
                        'employee_id' =>  $employee_id,
                        'attendance_id' => $insert_id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Half',
                         //'closing_balance' => $empleave->closing_balance - 1,
                        'note' => 'deduction',
                        );
                       
                        $dataleavehalf['taken_leaves'] = $attendance_rules->nos_half;
                        $dataleavehalf['leave_id'] = $leaveTypeArrhalf[$i];
                       // $dataleave['closing_balance'] = $empleave->closing_balance - 1;
                        $dataleavehalf['opening_balance'] = '-'.$attendance_rules->nos_half;
                      
                        //$dataleave['lop'] = '1';
                        //$dataleave['closing_balance'] = '0';
                        
                        $this->db->insert(tablename('employee_leaves'), $dataleavehalf);
                        break;
                    }

                    if(count($leaveTypeArr) == $j){
                       //  print_r(count($leaveTypeArr)); die;
                        $dataleavehalf = array(
                        'employee_id' =>  $employee_id,
                        'attendance_id' => $insert_id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Half',
                        'note' => 'deduction',
                        );
                        $dataleavehalf['lop'] = $attendance_rules->nos_half;
                        $dataleavehalf['closing_balance'] = '0';
                        $this->db->insert(tablename('employee_leaves'), $dataleavehalf);
                         break;
                    }
                }

               }


            }else if($inss_type==3){
                 $data_overtime = array(
                    'attendance_id' => $insert_id,
                    'date' => date('Y-m-d',strtotime($att_date)),
                    'employee_id' => $employee_id,
                    'total_hour' => @$total_hour,
                    'minimum_hour' => @$attendance_rules->over_time_after_hour,
                    'entry_date' => $date
                );
           
                $this->db->insert(tablename('attendance_overtime'), $data_overtime);
            }else if($inss_type==4){
               $leaveTypeArr =  explode(',', $attendance_rules->leave_type);
               if(!empty($leaveTypeArr)){
                for($i=0; $i<count($leaveTypeArr); $i++){
                    $j = $i+1;

                     $empleave = $this->AttendanceModel->leave_balance($leaveTypeArr[$i],$employee_id);
                    
                     if(!empty($empleave) && $empleave >= '1'){

                     $dataleave = array(
                        'employee_id' =>  $employee_id,
                        'attendance_id' => $insert_id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Absent',
                         //'closing_balance' => $empleave->closing_balance - 1,
                        'note' => 'deduction',
                        );
                       
                        $dataleave['taken_leaves'] = $attendance_rules->nos;
                        $dataleave['leave_id'] = $leaveTypeArr[$i];
                       // $dataleave['closing_balance'] = $empleave->closing_balance - 1;
                        $dataleave['opening_balance'] = '-'.$attendance_rules->nos;
                      
                        //$dataleave['lop'] = '1';
                        //$dataleave['closing_balance'] = '0';
                        
                        $this->db->insert(tablename('employee_leaves'), $dataleave);
                        break;
                    }

                    if(count($leaveTypeArr) == $j){
                       //  print_r(count($leaveTypeArr)); die;
                        $dataleave = array(
                        'employee_id' =>  $employee_id,
                        'attendance_id' => $insert_id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Absent',
                        'note' => 'deduction',
                        );
                        $dataleave['lop'] = $attendance_rules->nos;
                        $dataleave['closing_balance'] = '0';
                        $this->db->insert(tablename('employee_leaves'), $dataleave);
                         break;
                    }
                }

               }

                 $data_incom = array(
                    'attendance_id' => $insert_id,
                    'date' => date('Y-m-d',strtotime($att_date)),
                    'employee_id' => $employee_id,
                    'total_hour' => @$total_hour,
                    'minimum_hour' => $rules_for_apsent_hrs,
                    'entry_date' => $date
                );
           
                $this->db->insert(tablename('attendance_incomplete_present'), $data_incom);
            }


            $lateCount = $this->AttendanceModel->latecount($month,$year,$employee_id);

            if(!empty($firstlaterule)){
                //print_r($firstlaterule->no_of_occu_allowed);
                if($firstlaterule->no_of_occu_allowed == $lateCount && $firstlaterule->deduction_apply == 'Y'){
                    

                    $countlatededuction = $this->AttendanceModel->get_row_data_orderby('employee_leaves',array('credited_month'=>date('F',strtotime($att_date)),'employee_id'=>$employee_id,'type' => 'Late Deduction'));

                 //echo '<pre>'; print_r($empleave); die;
                    if(empty($countlatededuction)){
                        $firstLateeArr =  explode(',', $firstlaterule->leave_type);

                        if(!empty($firstLateeArr)){
                        for($i=0; $i<count($firstLateeArr); $i++){
                        $j = $i+1;

                    //$empleave = $this->AttendanceModel->get_row_data_orderby('employee_leaves',array('leave_id'=>$firstLateeArr[$i],'employee_id'=>$employee_id));
                    $empleave = $this->AttendanceModel->leave_balance($firstLateeArr[$i],$employee_id);
                    
                     if(!empty($empleave) && $empleave >= '1'){

                    $dataleave = array(
                        'employee_id' =>  $employee_id,
                        //'attendance_id' => $insert_id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Late Deduction',
                        'note' => 'deduction',
                        'flag' => '100'
                        );
                       
                        $dataleave['taken_leaves'] = $firstlaterule->nos;
                        $dataleave['leave_id'] = $firstLateeArr[$i];
                        //$dataleave['closing_balance'] = $empleave->closing_balance - $firstlaterule->nos;
                        $dataleave['opening_balance'] = '-'.$firstlaterule->nos;
                    
                        
                        $this->db->insert(tablename('employee_leaves'), $dataleave);
                        break;
                    }

                    if(count($firstLateeArr) == $j){
                       //  print_r(count($leaveTypeArr)); die;
                        $dataleave = array(
                        'employee_id' =>  $employee_id,
                       // 'attendance_id' => $insert_id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Late Deduction',
                        'note' => 'deduction',
                        'flag' => '100'
                        );
                        $dataleave['lop'] = $firstlaterule->nos;
                        //$dataleave['closing_balance'] = '0';
                        $this->db->insert(tablename('employee_leaves'), $dataleave);
                         break;
                                }
                             }

                         }
                     }
                }

            }


            if(!empty($Afterfirstlaterule)){
                //print_r($lateCount); die;
                if($lateCount > $firstlaterule->no_of_occu_allowed){
                    $countafterfist = ($lateCount - $firstlaterule->no_of_occu_allowed)/ $Afterfirstlaterule->no_of_occu_allowed;
                    //print_r($countafterfist); //die;
                 $flag = $this->AttendanceModel->get_row_data_orderby('employee_leaves',array('credited_month'=>date('F',strtotime($att_date)),'employee_id'=>$employee_id,'type' => 'Late Deduction'));
                // echo '<pre>';  print_r($flag->flag); die;
                if(!empty($flag) && trim($flag->flag) != $countafterfist){
                     //echo '<pre>';  print_r($flag); die;
                if($countafterfist == '1' || $countafterfist == '2' || $countafterfist == '3' || $countafterfist == '4' || $countafterfist == '5' || $countafterfist == '6' || $countafterfist == '7' || $countafterfist == '8' || $countafterfist == '9' || $countafterfist == '10' && $Afterfirstlaterule->deduction_apply == 'Y'){
                         $AfterfirstLateArr =  explode(',', $Afterfirstlaterule->leave_type);
    
                        if(!empty($AfterfirstLateArr)){
                        for($i=0; $i<count($AfterfirstLateArr); $i++){
                        $j = $i+1;

                        //$empleave = $this->AttendanceModel->get_row_data_orderby('employee_leaves',array('leave_id'=>$AfterfirstLateArr[$i],'employee_id'=>$employee_id));
                        $empleave = $this->AttendanceModel->leave_balance($AfterfirstLateArr[$i],$employee_id);
                      //echo 'empleave';      echo $empleave ; die;
                        if(!empty($empleave) && $empleave >= '1'){

                        $dataleave = array(
                        'employee_id' =>  $employee_id,
                        //'attendance_id' => $insert_id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Late Deduction',
                        'note' => 'deduction',
                        'flag' => $countafterfist,
                        );

                        $dataleave['taken_leaves'] = $Afterfirstlaterule->nos;
                         $dataleave['leave_id'] = $AfterfirstLateArr[$i];
                         $dataleave['opening_balance'] = '-'.$Afterfirstlaterule->nos;
                       // $dataleave['closing_balance'] = $empleave->closing_balance - $Afterfirstlaterule->nos;


                        $this->db->insert(tablename('employee_leaves'), $dataleave);
                        break;
                        }

                        if(count($AfterfirstLateArr) == $j &&  !empty($empleave) && $empleave == '0' || $empleave == '0.5'){
                        //  print_r(count($leaveTypeArr)); die;
                        $dataleave = array(
                        'employee_id' =>  $employee_id,
                        //'attendance_id' => $insert_id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Late Deduction',
                        'note' => 'deduction',
                        'flag' => $countafterfist,
                        );
                        $dataleave['lop'] = $Afterfirstlaterule->nos;
                        //$dataleave['closing_balance'] = '0';
                        $this->db->insert(tablename('employee_leaves'), $dataleave);
                         break;
                                }
                             }

                         }
                    
                }
            }
        }
            }
            
             $this->session->set_flashdata('successmessage', 'Attendance added successfully');
            redirect(base_url('page/45/1'));
        }
    }
    


    /**
     * Used for get attendance by id
     *
     * <p>Description</p>
     *
     * <p>This function get attendance by id from table [Table: attendance]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_single_data($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('attendance'));
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {           
            return $result;
        } else {
            return array();
        }
    }


   /* public function get_attendance_rule_and_workshift($workshiftid = "") {
        $this->db->select('master_attendance_rules.*,master_work_shift.rule_1,master_work_shift.work_hour_start_1,master_work_shift.work_hour_end_1,master_work_shift.work_hour_start_2,master_work_shift.work_hour_end_2,master_work_shift.rule_2,master_work_shift.work_hour_grace');
        $this->db->from(tablename('master_attendance_rules'));
        $this->db->join('master_work_shift', 'master_work_shift.id = master_attendance_rules.work_shift_id', 'left');
        $this->db->where('work_shift_id', $workshiftid);

        $query = $this->db->get();
        $result = $query->row();
       // echo $this->db->last_query(); die;

        if (!empty($result)) {           
            return $result;
        } else {
            return array();
        }
    }*/
	
	
	public function get_attendance_rule_workshiftwise($workshift = "",$day_type = "") {
        $this->db->select('master_attendance_rules.*');
        $this->db->from(tablename('master_attendance_rules'));
        $this->db->where('work_shift_id', $workshift);
		$this->db->where('day_type', $day_type);
        $query = $this->db->get();
        $result = $query->row();
       ///echo $this->db->last_query(); die;

        if (!empty($result)) {           
            return $result;
        } else {
            return array();
        }
    }
	
	
    
      public function get_workshift_details($workshift = "",$weekNo = "",$stweekname = "") {
		  //echo $workshift; echo '<br>';  echo $weekNo; echo '<br>'; echo $stweekname; echo '<br>'; die;
        $this->db->select('master_work_shift.*,master_work_shift_off_day.weekvalue');
        $this->db->from(tablename('master_work_shift_off_day'));
		$this->db->join('master_work_shift', 'master_work_shift.id = master_work_shift_off_day.work_shift_id', 'left');
        $this->db->where('work_shift_id', $workshift);
		$this->db->where('week_no', $weekNo);
		$this->db->like('weekname', $stweekname);
		$this->db->where('master_work_shift_off_day.delete_flag', 'N');
		$this->db->where('master_work_shift_off_day.is_active', 'Y');
        $query = $this->db->get();
        $result = $query->row();
     //  echo '<pre>'; print_r($result); die;
		 if (!empty($result)) {
			 return $result;
        } else {
            return array();
        }
        
    }
 

    /**
     * Used for delete attendance
     *
     * <p>Description</p>
     *
     * <p>This function delete attendance [Table: attendance]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function delete_this($id) {
        $this->db->select('*');
        $this->db->from(tablename('attendance'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result)) {            
            $update_faq = array('is_active' => 'N','delete_flag'=> 'Y');
            $this->db->where('id', $id);
            if ($this->db->update('attendance', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'attendance Deleted successfully');
            redirect(base_url('page/45/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/45/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'attendance not matched');
            redirect(base_url('page/45/1'));
        }
    }
    
   public function load_att_month_year($id = "",$month = "",$year="") {
        $from = $year.'-'.$month.'-01';
        $to = $year.'-'.$month.'-31';
        $where = "(date >= '".$from."' AND date <= '".$to."')";
        $this->db->select('*');
        $this->db->from(tablename('attendance'));
        $this->db->where('employee_id', $id);
        $this->db->where($where);
        $this->db->order_by('date', 'asc');
        $query = $this->db->get();
        $result = $query->result();
     //   echo '<pre>';
      //  print_r($result);  exit;
//echo $this->db->last_query();exit;
        if (!empty($result)) {
            $rVal = array();

            foreach ($result as $value) {
                $dateVal = explode('-', $value->date);
                $rVal[$dateVal[2]] = $value->type;
            }
            
            return $rVal;
            
        } else {
            return array();
        }
    }
    


      public function load_all_empp() {
        //echo "<pre>";print_r($_GET);exit;
        $this->db->select('t1.*,t2.first_name,t2.middle_name,t2.last_name,t2.employee_no,t2.department,t2.designation'); 

        $this->db->from(tablename('attendance') . ' as t1');
        $this->db->join(tablename('employee'). ' as t2', 't1.employee_id = t2.id');
        $this->db->where('t1.delete_flag', 'N');

        if(isset($_GET['start_date'])){
            $this->db->where('t1.date', $_GET['start_date']);
           // $where = "t1.date = '".$_GET['start_date']."''";
            //$this->db->where($where); 
            //$this->db->order_by('t1.date', 'desc'); 
        }else{
            $this->db->where('t1.date', date('Y-m-d')); 
        }   
        $query = $this->db->get();
        $result = $query->result();
       // echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

     function uploadData() {
        $count = 0;
        $fp = fopen($_FILES['userfile']['tmp_name'], 'r') or die("can't open file");
        $samecode=array();
        //print_r($fp); die;
        while ($csv_line = fgetcsv($fp, 1024)) {
            $count++;
            if ($count == 1) {
                continue;
            }//keep this if condition if you want to remove the first row
            //echo '<pre>';print_r($csv_line);exit;
            for ($i = 0, $j = count($csv_line); $i < $j; $i++) {
                $insert_csv = array();
                //$insert_csv['member_type'] = $csv_line[0];//remove if you want to have primary key,
                $insert_csv['employee_rf_no'] = $csv_line[1];
                $all_employee = $this->AttendanceModel->get_row_data('employee',array('delete_flag'=>'N','is_active'=>'Y','rf_no'=>$insert_csv['employee_rf_no']));
                $insert_csv['date'] = $csv_line[2];
                $insert_csv['entry_time'] = $csv_line[3];
                $insert_csv['out_time'] = $csv_line[4];
            }
            $i++;
if(!empty($insert_csv['employee_rf_no'])){
             $Hours = '';
        $inss_type = 0;
        $date = date("Y-m-d H:i:s");
		//echo '<pre>'; print_r($all_employee); die;
        if(!empty($all_employee)  && $insert_csv['entry_time']!="" && $insert_csv['out_time']!="" && ($insert_csv['entry_time']!="00:00" && $insert_csv['out_time']!="00:00")){
		//	echo $insert_csv['entry_time']; die;
         $employee_grade = $this->AttendanceModel->get_row_data('employee',array('id'=>$all_employee->id,'delete_flag'=>'N'));
        
        $assigned_workshift = $this->AttendanceModel->get_row_data('assigned_workshift',array('employee_id'=>$all_employee->id,'delete_flag'=>'N','start_date'=>date('Y-m-d',strtotime($insert_csv['date']))));
        if(!empty($assigned_workshift)){
           $workshift =  $assigned_workshift->work_shift_id;
        }else{
            $workshift =  $employee_grade->work_shift_id;
        }
        
//echo $workshift; die;
       

        if(!empty($employee_grade) && $employee_grade->grade!=''){

       // $attendance_rules = $this->AttendanceModel->get_row_data('master_attendance_rules',array('work_shift_id'=>$workshift));
        //$attendance_rules = $this->AttendanceModel->get_attendance_rule_and_workshift($workshift);
		$stweekname = date('l',strtotime($insert_csv['date']));
			$curdate = date('Y-m-d',strtotime($insert_csv['date']));
            $weekNo = getWeeks($curdate,$stweekname);
			
			$attendance_rules = '';
            $workshiftdetails = $this->AttendanceModel->get_workshift_details($workshift,$weekNo,$stweekname);
			///echo  '<pre>'; print_r($workshiftdetails); die;
			
            //echo '<pre>'; print_r($attendance_rules); die; 
			//die;
			if($workshiftdetails->weekvalue == 'rule_1'){
				$work_hour_start = $workshiftdetails->work_hour_start_1;
				$work_hour_end = $workshiftdetails->work_hour_end_1;
				$work_hour_duration = $workshiftdetails->work_hour_duration_1;
				$attendance_rules = $this->AttendanceModel->get_attendance_rule_workshiftwise($workshift,'Full');
				//echo '<pre>'; print_r($attendance_rules); die;
			}elseif($workshiftdetails->weekvalue == 'rule_2'){
				$work_hour_start = $workshiftdetails->work_hour_start_2;
				$work_hour_end = $workshiftdetails->work_hour_end_2;
				$work_hour_duration = $workshiftdetails->work_hour_duration_2;
				$attendance_rules = $this->AttendanceModel->get_attendance_rule_workshiftwise($workshift,'Half');
				//echo '<pre>'; print_r($attendance_rules); die;
			}elseif($workshiftdetails->weekvalue == 'Full'){
				if($workshiftdetails->weekoff == 'rule_1'){
				$work_hour_start = $workshiftdetails->work_hour_start_1;
				$work_hour_end = $workshiftdetails->work_hour_end_1;
				$work_hour_duration = $workshiftdetails->work_hour_duration_1;
				$attendance_rules = $this->AttendanceModel->get_attendance_rule_workshiftwise($workshift,'Full');
				}else{ 
				$work_hour_start = $workshiftdetails->work_hour_start_2;
				$work_hour_end = $workshiftdetails->work_hour_end_2;
				$work_hour_duration = $workshiftdetails->work_hour_duration_2;
				$attendance_rules = $this->AttendanceModel->get_attendance_rule_workshiftwise($workshift,'Half');
				} 
			}
			
			//echo '<pre>'; print_r($attendance_rules); die;
            $work_hour_grace = substr($workshiftdetails->work_hour_grace,3,2);
            //echo $work_hour_grace; die;
            $requiredtime=strtotime(date($work_hour_start))+($work_hour_grace*60);//15*60=900 seconds
			//echo $work_hour_start; die;
        if($insert_csv['entry_time']!="" && $insert_csv['out_time']!="" || ($insert_csv['entry_time']!="00:00" && $insert_csv['out_time']!="00:00")){
            //$work_hour_grace = substr($attendance_rules->work_hour_grace,3,2);
           // $requiredtime=strtotime(date($attendance_rules->work_hour_start))+($work_hour_grace*60);//15*60=900 seconds
            //$requiredTime=date("h:i",$requiredtime);

            if(strtotime($insert_csv['entry_time']) <= $requiredtime){
            $late_type = 'Not Late';
            }else{
            $late_type = 'Late';
            }
			//echo $late_type; echo '--'; die;
			//echo strtotime($insert_csv['entry_time']); die;

            $leave_details = $this->AttendanceModel->get_row_data('master_grade',array('id'=>@$employee_grade->grade));
            $emp_leave = explode(',', @$leave_details->leave_rule_id);
           
        $total_hour = getTimeDiff($insert_csv['entry_time'],$insert_csv['out_time']);
        $overTime = "";
		$total_after_timeoff ="";
		$check_eaarly_leave = $this->AttendanceModel->get_row_data('timeoff',array('employee_id'=>$all_employee->id,'date'=>date('Y-m-d',strtotime($insert_csv['date'])),'approved' =>'Yes','delete_flag'=>'N','is_active' => 'Y'));
		   if(!empty($check_eaarly_leave)){
			   $check_timeoff_rule = $this->AttendanceModel->get_row_data('master_wfh_rules',array('type'=>'personal'));
			   if(!empty($check_timeoff_rule)){
				   $min_hrs_app_day = $check_timeoff_rule->max_hrs_apply_per_day;
				   $total_after_timeoff = $total_hour + $min_hrs_app_day;
				   //echo $total_after_timeoff; die;
			   }
			   
		   }
		   
		   if($total_after_timeoff >= $total_hour){
			    $inss_type = 2;
                $day_type = 'EarlyLeave';
		   }else{

        
        if(@$attendance_rules->incomplete_present_for_less_then != '00:00'){
					$rules_for_apsent_hrs = @$attendance_rules->incomplete_present_for_less_then;
				}else{
					$rules_for_apsent_hrs = @$attendance_rules->min_hrs_for_full_day;
				}
				
            if((@$attendance_rules->min_hrs_for_half_day != '00:00') && ($total_hour >= @$attendance_rules->min_hrs_for_half_day) && ($total_hour < @$attendance_rules->min_hrs_for_full_day) ){
                //half day insert
                $inss_type = 1;
                $day_type = 'Half Day';
            }else if((@$attendance_rules->over_time_after_hour != '00:00') && ($total_hour >= @$attendance_rules->min_hrs_for_full_day) && ($total_hour <= @$attendance_rules->over_time_after_hour)){
                //full day insert
                $inss_type = 2;
                $day_type = 'Full Day';
            }elseif($total_hour < $rules_for_apsent_hrs){
                $inss_type = 4;
                $day_type = 'Absent';
            }else if((@$attendance_rules->over_time_after_hour != '00:00') && ($total_hour > @$attendance_rules->min_hrs_for_full_day) && ($total_hour > @$attendance_rules->over_time_after_hour)){
                //over time insert
                $inss_type = 3;
                $day_type = 'Over Time';
                $overTime = $total_hour - @$attendance_rules->over_time_after_hour;
            }else if(($total_hour >= @$attendance_rules->min_hrs_for_full_day) && (@$attendance_rules->over_time_after_hour == '00:00')){
				$inss_type = 2;
                $day_type = 'Full Day';
			}
		   }
        
    }

}

        

        $employee_attandance = $this->AttendanceModel->get_row_data('attendance',array('employee_id'=>$all_employee->id,'date'=>date('Y-m-d',strtotime($insert_csv['date']))));

        $employee_attandance_edit = $this->AttendanceModel->get_row_data('attendance',array('employee_id'=>$all_employee->id,'entry_time'=>$insert_csv['entry_time'],'date'=>date('Y-m-d',strtotime($insert_csv['date']))));
        //echo '<pre>'; print_r($employee_attandance); die;
        if(empty($employee_attandance) && empty($employee_attandance_edit && !empty($all_employee))){
            $data = array(
                'employee_id' => $all_employee->id,
                'date' => date('Y-m-d',strtotime($insert_csv['date'])),
                'entry_time' =>date('H:i',strtotime($insert_csv['entry_time'])),
                'out_time' =>date('H:i',strtotime($insert_csv['out_time'])),
                'flag'=>'0',
                'total_hour' => @$total_hour,
                'day_type' => @$day_type,
                'late_type' => @$late_type,
                'overTime' => @$overTime,
                'entry_date' => $date
            );
            //print_r($data); die;
            $this->db->insert('HR_attendance', $data);
            $insert_id = $this->db->insert_id();
             if($inss_type==1){

                $data_half_day = array(
                    'attendance_id' => $insert_id,
                    'date' => date('Y-m-d',strtotime($insert_csv['date'])),
                    'employee_id' => $all_employee->id,
                    'total_hour' => @$total_hour,
                    'minimum_hour' => @$attendance_rules->min_hrs_for_half_day,
                    'entry_date' => $date
                );
           
                $this->db->insert(tablename('attendance_half_day'), $data_half_day);
				 $leaveTArrhalf =  explode(',', $attendance_rules->leave_type_half);
                if(!empty($leaveTArrhalf)){
                 for($i=0; $i<count($leaveTArrhalf); $i++){
                    $j = $i+1;

                     //$empleave = $this->AttendanceModel->get_row_data_orderby('employee_leaves',array('leave_id'=>$leaveTArr[$i],'employee_id'=>$all_employee->id));
                    
                     //if(!empty($empleave->closing_balance) && $empleave->closing_balance >= '1'){
						 
				   $empleave = $this->AttendanceModel->leave_balance($leaveTArrhalf[$i],$all_employee->id);
                    
                     if(!empty($empleave) && $empleave >= '1'){


                     $dataleaveh = array(
                        'employee_id' =>  $all_employee->id,
                        'attendance_id' => $insert_id,
                        'entry_date' => date('Y-m-d',strtotime($insert_csv['date'])),
                        'date' =>date('Y-m-d',strtotime($insert_csv['date'])),
                        'credited_month' =>date('F',strtotime($insert_csv['date'])),
                        'type' => 'Half',
                         //'closing_balance' => $empleave->closing_balance - 1,
                        'note' => 'deduction',
                        );
                       
                       $dataleaveh['taken_leaves'] = $attendance_rules->nos_half;
                       $dataleaveh['leave_id'] = $leaveTArrhalf[$i];
                       // $dataleave['closing_balance'] = $empleave->closing_balance - 1;
                        $dataleaveh['opening_balance'] = '-'.$attendance_rules->nos_half;
                        
                        $this->db->insert(tablename('employee_leaves'), $dataleaveh);
                        break;
                    }

                    if(count($leaveTArrhalf) == $j){
                       //  print_r(count($leaveTypeArr)); die;
                         $dataleaveh = array(
                        'employee_id' =>  $all_employee->id,
                        'attendance_id' => $insert_id,
                        'entry_date' => date('Y-m-d',strtotime($insert_csv['date'])),
                        'date' =>date('Y-m-d',strtotime($insert_csv['date'])),
                        'credited_month' =>date('F',strtotime($insert_csv['date'])),
                        'type' => 'Half',
                        'note' => 'deduction',
                        );
                        $dataleaveh['lop'] = $attendance_rules->nos_half;
                        $dataleaveh['closing_balance'] = '0';
                        $this->db->insert(tablename('employee_leaves'), $dataleaveh);
                         break;
                    }
                }

               }

            }else if($inss_type==3){
                 $data_overtime = array(
                    'attendance_id' => $insert_id,
                    'date' => date('Y-m-d',strtotime($insert_csv['date'])),
                    'employee_id' => $all_employee->id,
                    'total_hour' => @$total_hour,
                    'minimum_hour' => @$attendance_rules->over_time_after_hour,
                    'entry_date' => $date
                );
           
                $this->db->insert(tablename('attendance_overtime'), $data_overtime);
            }else if($inss_type==4){
                $leaveTArr =  explode(',', $attendance_rules->leave_type);
                if(!empty($leaveTArr)){
                 for($i=0; $i<count($leaveTArr); $i++){
                    $j = $i+1;

                     //$empleave = $this->AttendanceModel->get_row_data_orderby('employee_leaves',array('leave_id'=>$leaveTArr[$i],'employee_id'=>$all_employee->id));
                    
                     //if(!empty($empleave->closing_balance) && $empleave->closing_balance >= '1'){
						 $empleave = $this->AttendanceModel->leave_balance($leaveTArr[$i],$all_employee->id);
                    
                     if(!empty($empleave) && $empleave >= '1'){

                     $dataleave = array(
                        'employee_id' =>  $all_employee->id,
                        'attendance_id' => $insert_id,
                        'entry_date' => date('Y-m-d',strtotime($insert_csv['date'])),
                        'date' =>date('Y-m-d',strtotime($insert_csv['date'])),
                        'credited_month' =>date('F',strtotime($insert_csv['date'])),
                        'type' => 'Absent',
                         //'closing_balance' => $empleave->closing_balance - 1,
                        'note' => 'deduction',
                        );
                       
                       $dataleave['taken_leaves'] = $attendance_rules->nos;
                       $dataleave['leave_id'] = $leaveTArr[$i];
                       // $dataleave['closing_balance'] = $empleave->closing_balance - 1;
                        $dataleave['opening_balance'] = '-'.$attendance_rules->nos;
                        
                        $this->db->insert(tablename('employee_leaves'), $dataleave);
                        break;
                    }

                    if(count($leaveTArr) == $j){
                       //  print_r(count($leaveTypeArr)); die;
                         $dataleave = array(
                        'employee_id' =>  $all_employee->id,
                        'attendance_id' => $insert_id,
                        'entry_date' => date('Y-m-d',strtotime($insert_csv['date'])),
                        'date' =>date('Y-m-d',strtotime($insert_csv['date'])),
                        'credited_month' =>date('F',strtotime($insert_csv['date'])),
                        'type' => 'Absent',
                        'note' => 'deduction',
                        );
                        $dataleave['lop'] = $attendance_rules->nos;
                        $dataleave['closing_balance'] = '0';
                        $this->db->insert(tablename('employee_leaves'), $dataleave);
                         break;
                    }
                }

               }

                   
                  
                 $data_incom = array(
                    'attendance_id' => $insert_id,
                    'date' => date('Y-m-d',strtotime($insert_csv['date'])),
                    'employee_id' => $all_employee->id,
                    'total_hour' => @$total_hour,
                    'minimum_hour' => $rules_for_apsent_hrs,
                    'entry_date' => $date
                );
           
                $this->db->insert(tablename('attendance_incomplete_present'), $data_incom);
            }

              $firstlaterule = $this->AttendanceModel->get_row_data('master_late_rules',array('delete_flag'=>'N','is_active' =>'Y','occurrence_type' =>'First Occurence'));

            $Afterfirstlaterule = $this->AttendanceModel->get_row_data('master_late_rules',array('delete_flag'=>'N','is_active' =>'Y','occurrence_type' =>'After First Occurence'));

            $month = date('m',strtotime($insert_csv['date']));
            $year = date('Y',strtotime($insert_csv['date']));
             $lateCount = $this->AttendanceModel->latecount($month,$year,$all_employee->id);

            if(!empty($firstlaterule)){
                //print_r($firstlaterule->no_of_occu_allowed);
                if($firstlaterule->no_of_occu_allowed == $lateCount && $firstlaterule->deduction_apply == 'Y'){
                   

                    $countlatededuction = $this->AttendanceModel->get_row_data_orderby('employee_leaves',array('credited_month'=>date('F',strtotime($insert_csv['date'])),'employee_id'=>$all_employee->id,'type' => 'Late Deduction'));
                 //echo '<pre>'; print_r($empleave); die;
                    if(empty($countlatededuction)){

                    $firstLateeArr =  explode(',', $firstlaterule->leave_type);

                        if(!empty($firstLateeArr)){
                        for($i=0; $i<count($firstLateeArr); $i++){
                        $j = $i+1;

                    //$empleave = $this->AttendanceModel->get_row_data_orderby('employee_leaves',array('leave_id'=>$firstLateeArr[$i],'employee_id'=>$all_employee->id));
                    
                    // if(!empty($empleave->closing_balance) && $empleave->closing_balance >= '1'){
					$empleave = $this->AttendanceModel->leave_balance($firstLateeArr[$i],$all_employee->id);
                    
                     if(!empty($empleave) && $empleave >= '1'){

                     $dataleave = array(
                        'employee_id' =>  $all_employee->id,
                        //'attendance_id' => $insert_id,
                        'entry_date' => date('Y-m-d',strtotime($insert_csv['date'])),
                        'date' =>date('Y-m-d',strtotime($insert_csv['date'])),
                        'credited_month' =>date('F',strtotime($insert_csv['date'])),
                        'type' => 'Late Deduction',
                        'note' => 'deduction',
                        'flag' => '100'
                        );
                       
                    $dataleave['taken_leaves'] = $firstlaterule->nos;
                    $dataleave['leave_id'] = $firstLateeArr[$i];
                    //$dataleave['closing_balance'] = $empleave->closing_balance - $firstlaterule->nos;
                    $dataleave['opening_balance'] = '-'.$firstlaterule->nos;
                    
                        
                        $this->db->insert(tablename('employee_leaves'), $dataleave);
                        break;
                    }

                    if(count($firstLateeArr) == $j){
                       //  print_r(count($leaveTypeArr)); die;
                        $dataleave = array(
                        'employee_id' =>  $all_employee->id,
                        //'attendance_id' => $insert_id,
                        'entry_date' => date('Y-m-d',strtotime($insert_csv['date'])),
                        'date' =>date('Y-m-d',strtotime($insert_csv['date'])),
                        'credited_month' =>date('F',strtotime($insert_csv['date'])),
                        'type' => 'Late Deduction',
                        'note' => 'deduction',
                         'flag' => '100'
                        );
                        $dataleave['lop'] = $firstlaterule->nos;
                        $dataleave['closing_balance'] = '0';
                        $this->db->insert(tablename('employee_leaves'), $dataleave);
                         break;
                                }
                             }

                         }


                    }
                }
                
            }


            if(!empty($Afterfirstlaterule)){
                //print_r($firstlaterule->no_of_occu_allowed);
                if($lateCount > $firstlaterule->no_of_occu_allowed){
                    $countafterfist = ($lateCount - $firstlaterule->no_of_occu_allowed)/ $Afterfirstlaterule->no_of_occu_allowed;
                 $flag = $this->AttendanceModel->get_row_data_orderby('employee_leaves',array('credited_month'=>date('F',strtotime($insert_csv['date'])),'employee_id'=>$all_employee->id,'type' => 'Late Deduction'));
                if(!empty($flag) && $flag->flag != $countafterfist){
                if($countafterfist == '1' || $countafterfist == '2' || $countafterfist == '3' || $countafterfist == '4' || $countafterfist == '5' || $countafterfist == '6' || $countafterfist == '7' || $countafterfist == '8' || $countafterfist == '9' || $countafterfist == '10' && $Afterfirstlaterule->deduction_apply == 'Y'){
                  
                       

                        $AfterFirstLateArr =  explode(',',$Afterfirstlaterule->leave_type);
    
                        if(!empty($AfterFirstLateArr)){
                        for($i=0; $i<count($AfterFirstLateArr); $i++){
                        $j = $i+1;

                        // $empleave = $this->AttendanceModel->get_row_data_orderby('employee_leaves',array('leave_id'=>$AfterFirstLateArr[$i],'employee_id'=>$all_employee->id));

                       // if(!empty($empleave->closing_balance) && $empleave->closing_balance >= '1'){
						   $empleave = $this->AttendanceModel->leave_balance($AfterFirstLateArr[$i],$all_employee->id);
                    
                     if(!empty($empleave) && $empleave >= '1'){

                       $dataleave = array(
                        'employee_id' =>  $all_employee->id,
                        //'attendance_id' => $insert_id,
                        'entry_date' => date('Y-m-d',strtotime($insert_csv['date'])),
                        'date' =>date('Y-m-d',strtotime($insert_csv['date'])),
                        'credited_month' =>date('F',strtotime($insert_csv['date'])),
                        'type' => 'Late Deduction',
                        'note' => 'deduction',
                        'flag' => $countafterfist,
                        );

                         $dataleave['taken_leaves'] = $Afterfirstlaterule->nos;
                         $dataleave['leave_id'] = $AfterFirstLateArr[$i];
                         $dataleave['opening_balance'] = '-'.$Afterfirstlaterule->nos;
                         //$dataleave['closing_balance'] = $empleave->closing_balance - $Afterfirstlaterule->nos;
                        $this->db->insert(tablename('employee_leaves'), $dataleave);
                        break;
                        }

                        if(count($AfterFirstLateArr) == $j  &&  !empty($empleave) && $empleave == '0' || $empleave == '0.5'){
                        //  print_r(count($leaveTypeArr)); die;
                        $dataleave = array(
                        'employee_id' =>  $all_employee->id,
                       // 'attendance_id' => $insert_id,
                        'entry_date' => date('Y-m-d',strtotime($insert_csv['date'])),
                        'date' =>date('Y-m-d',strtotime($insert_csv['date'])),
                        'credited_month' =>date('F',strtotime($insert_csv['date'])),
                        'type' => 'Late Deduction',
                        'note' => 'deduction',
                        'flag' => $countafterfist,
                        );
                         $dataleave['lop'] = $Afterfirstlaterule->nos;
                        $dataleave['closing_balance'] = '0';
                        $this->db->insert(tablename('employee_leaves'), $dataleave);
                         break;
                                }
                             }

                         }
                    
                }
            }
            }
            }


        }elseif(!empty($employee_attandance_edit)){
                $data = array(
                    'date' => date('Y-m-d',strtotime($insert_csv['date'])),
                    'employee_id' => $employee_attandance_edit->employee_id,
                    'flag'=>'0',
                    'entry_time' =>date('H:i',strtotime($insert_csv['entry_time'])),
                    'out_time' =>date('H:i',strtotime($insert_csv['out_time'])),
                    'flag'=>'0',
                    'total_hour' => @$total_hour,
                    'day_type' => @$day_type,
                     'late_type' => @$late_type,
                    'overTime' => @$overTime,
                    'modified_date' => $date
                );
           
            $this->db->where('id', $employee_attandance_edit->id)->update(tablename('attendance'), $data);



            if($inss_type==1){

                $check_half_day = $this->AttendanceModel->get_row_data('attendance_half_day',array('employee_id'=>$employee_attandance_edit->employee_id,'attendance_id'=>$employee_attandance_edit->id));
                if(!empty($check_half_day)){
                $data_half_day = array(
                    'attendance_id' => $employee_attandance_edit->id,
                    'date' => date('Y-m-d',strtotime($insert_csv['date'])),
                    'employee_id' => $employee_attandance_edit->employee_id,
                    'total_hour' => @$total_hour,
                    'minimum_hour' => @$attendance_rules->min_hrs_for_half_day,
                    'modified_date' => $date
                );
           
                $this->db->where('attendance_id', $employee_attandance_edit->id)->where('employee_id', $employee_attandance_edit->employee_id)->update(tablename('attendance_half_day'), $data_half_day);

                


            }else{
                $data_half_day = array(
                    'attendance_id' => $employee_attandance_edit->id,
                    'date' => date('Y-m-d',strtotime($insert_csv['date'])),
                    'employee_id' => $employee_attandance_edit->employee_id,
                    'total_hour' => @$total_hour,
                    'minimum_hour' => @$attendance_rules->min_hrs_for_half_day,
                    'entry_date' => $date
                );
           
                $this->db->insert(tablename('attendance_half_day'), $data_half_day);
            }

            $delete = array(
                    'delete_flag' => "Y",
                    'is_active' => "N",
                    'modified_date' => $date
                );
           
                $this->db->where('attendance_id', $employee_attandance_edit->id)->where('employee_id', $employee_attandance_edit->employee_id)->update(tablename('attendance_overtime'), $delete);
                 $this->db->where('attendance_id', $employee_attandance_edit->id)->where('employee_id', $employee_attandance_edit->employee_id)->update(tablename('attendance_incomplete_present'), $delete);


            }else if($inss_type==3){


                $check_overtime = $this->AttendanceModel->get_row_data('attendance_overtime',array('employee_id'=>$employee_attandance_edit->employee_id,'attendance_id'=>$employee_attandance_edit->id));
                if(!empty($check_overtime)){
                 $data_overtime = array(
                    'attendance_id' => $employee_attandance_edit->id,
                    'date' => date('Y-m-d',strtotime($insert_csv['date'])),
                    'employee_id' => $employee_attandance_edit->employee_id,
                    'total_hour' => @$total_hour,
                    'minimum_hour' => @$attendance_rules->over_time_after_hour,
                    'modified_date' => $date
                );
           
                $this->db->where('attendance_id', $employee_attandance_edit->id)->where('employee_id', $employee_attandance_edit->employee_id)->update(tablename('attendance_overtime'), $data_overtime);



                }else{
                     $data_overtime = array(
                    'attendance_id' => $employee_attandance_edit->id,
                    'date' => date('Y-m-d',strtotime($insert_csv['date'])),
                    'employee_id' => $employee_attandance_edit->employee_id,
                    'total_hour' => @$total_hour,
                    'minimum_hour' => @$attendance_rules->over_time_after_hour,
                    'entry_date' => $date
                );
           
                $this->db->insert(tablename('attendance_overtime'), $data_overtime);
                }


                $delete = array(
                    'delete_flag' => "Y",
                    'is_active' => "N",
                    'modified_date' => $date
                );
           
                $this->db->where('attendance_id', $employee_attandance_edit->id)->where('employee_id', $employee_attandance_edit->employee_id)->update(tablename('attendance_half_day'), $delete);
                 $this->db->where('attendance_id', $employee_attandance_edit->id)->where('employee_id', $employee_attandance_edit->employee_id)->update(tablename('attendance_incomplete_present'), $delete);
             


            }else if($inss_type==4){


                $check_incomplete_present = $this->AttendanceModel->get_row_data('attendance_incomplete_present',array('employee_id'=>$employee_attandance_edit->employee_id,'attendance_id'=>$employee_attandance_edit->id));
                if(!empty($check_incomplete_present)){
                 $data_incomplete_present = array(
                    'attendance_id' => $employee_attandance_edit->id,
                    'date' => date('Y-m-d',strtotime($insert_csv['date'])),
                    'employee_id' => $employee_attandance_edit->employee_id,
                    'total_hour' => @$total_hour,
                    'minimum_hour' => $rules_for_apsent_hrs,
                    'modified_date' => $date
                );
           
                $this->db->where('attendance_id', $employee_attandance_edit->id)->where('employee_id', $employee_attandance_edit->employee_id)->update(tablename('attendance_incomplete_present'), $data_incomplete_present);



                }else{

                     $data_incomplete_present = array(
                    'attendance_id' => $employee_attandance_edit->id,
                    'date' => date('Y-m-d',strtotime($insert_csv['date'])),
                    'employee_id' => $employee_attandance_edit->employee_id,
                    'total_hour' => @$total_hour,
                    'minimum_hour' => $rules_for_apsent_hrs,
                    'entry_date' => $date
                );
           
                $this->db->insert(tablename('attendance_incomplete_present'), $data_incomplete_present);
                }


                $delete = array(
                    'delete_flag' => "Y",
                    'is_active' => "N",
                    'modified_date' => $date
                );
           
                $this->db->where('attendance_id', $employee_attandance_edit->id)->where('employee_id', $employee_attandance_edit->employee_id)->update(tablename('attendance_half_day'), $delete);
                 $this->db->where('attendance_id', $employee_attandance_edit->id)->where('employee_id', $employee_attandance_edit->employee_id)->update(tablename('attendance_half_day'), $delete);

            }else{

                $delete = array(
                    'delete_flag' => "Y",
                    'is_active' => "N",
                    'modified_date' => $date
                );
           
                $this->db->where('attendance_id', $employee_attandance_edit->id)->where('employee_id', $employee_attandance_edit->employee_id)->update(tablename('attendance_half_day'), $delete);
                $this->db->where('attendance_id', $employee_attandance_edit->id)->where('employee_id', $employee_attandance_edit->employee_id)->update(tablename('attendance_overtime'), $delete);
                $this->db->where('attendance_id', $employee_attandance_edit->id)->where('employee_id', $employee_attandance_edit->employee_id)->update(tablename('attendance_incomplete_present'), $delete);

            }
           
        }else{
            $samecode[] = $all_employee->employee_no;
        }
    }else{
        $samecode[] = 'Does Not exist';
    }
             //print_r($samecode); die;
            
       /* if(empty($result))
        {
            $response = $this->db->insert('user', $data);
                $insert_id = $this->db->insert_id();
                if(!empty($insert_id))
                {
                 $data_details = array(
                    'user_id' => $insert_id,
                   
                    'complex_id' =>  backend_user_id(),
                   
                    'flat_id' => $insert_csv['flat_no']
                );
                $response_details = $this->db->insert('user_flat_complex', $data_details);
                }
        }
        else{
            $samenumber[]=$insert_csv['mobile'];
            $this->session->set_userdata('flash', $samenumber);
        }*/
           } 
        }
        //fclose($fp) or die("can't close file");
        //$data['success']="success";
        //return $data;
        //$this->session->set_userdata('flash', "Csv Uploaded");
        if(!empty($samecode)){
            $sameCODE = implode(',', $samecode);
            //$this->session->set_userdata('flash_attandance', 'Already Exists '.$sameCODE);
            //$flg = $this->session->set_flashdata('errormessage', 'Already Exists '.$sameCODE);
            $flg = $this->session->set_flashdata('successmessage', 'Attendance Uploaded');
        }else{ 
            //$this->session->set_userdata('flash_attandance', 'Attendance Uploaded');
            $flg = $this->session->set_flashdata('successmessage', 'Attendance Uploaded');
        }
        //redirect('attendance');
        return $flg;
   
    }

     public function leave_due_day_empwise($leave_id =NULL,$employee_id=NULL) {
        $this->db->select('sum(t1.opening_balance) as totalday');
        $this->db->from(tablename('employee_leaves') . ' as t1');
        $this->db->where('t1.leave_id', $leave_id);
        $this->db->where('t1.employee_id', $employee_id);
        //$this->db->group_by('leave_id');
        //$this->db->where('t1.approved', 'Yes');
        $query = $this->db->get();
        $result = $query->row();
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result->totalday;
        } else {
            return 0;
        }
    }

     public function get_row_data_orderby($table, $where) {
        $this->db->order_by("id", "desc"); 
        $this->db->limit(1);
        $query = $this->db->get_where(tablename($table), $where);
       //echo  $this->db->last_query(); exit;
        return $query->row();

    }

    public function latecount($month,$year,$empid){
        $from = $year.'-'.$month.'-01';
        $to = $year.'-'.$month.'-31';
        $where = "(date >= '".$from."' AND date <= '".$to."')";
        $this->db->select('*');
        $this->db->from(tablename('attendance'));
        $this->db->where('employee_id', $empid);
        $this->db->where('late_type', 'Late');
        $this->db->where($where);
        $this->db->order_by('date', 'asc');
        $query = $this->db->get();
        $result = count($query->result());
        return $result;
    }

    public function leave_balance($leave_id=NULL,$employee_id=NULL) {
        $this->db->select('sum(t1.opening_balance) as totalday');
        $this->db->from(tablename('employee_leaves') . ' as t1');
        $this->db->where('t1.leave_id', $leave_id);
        $this->db->where('t1.employee_id', $employee_id);
        //$this->db->where('t1.approved', 'Yes');
        $query = $this->db->get();
        $result = $query->row();
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result->totalday;
        } else {
            return 0;
        }
    }
	
	
	//for dashboard attendace entry_date
	
	
	public function modify_from_dashbord($employeeid,$datetime,$time) {  
	   
        $id = '';
        $month = date('m',strtotime($datetime));
        $year = date('Y',strtotime($datetime));
        $stDate= $datetime;
        $att_date= date('Y-m-d',strtotime($datetime));
        $employee_id= $employeeid;
        //$type= $this->input->post('type_val');
        //$att_type_val= $this->input->post('att_type_val');
        $entry_time= '';
        $out_time = '';
        $organization_id= '1';
        //$out_time = ($this->input->post('out_time')) ? date('H:i',strtotime('00:00')) :'' ;
		
		$check_attendance = $this->AttendanceModel->get_row_data('attendance',array('employee_id'=>$employeeid,'date'=>$att_date));
		if(!empty($check_attendance)){
			$id = $check_attendance->id;
			$out_time= date('H:i',strtotime($time));
			$entry_time= date('H:i',strtotime($check_attendance->entry_time));
			$this->db->select('*');
		$this->db->from(tablename('user_tokens'));
		$this->db->where('user_id', backend_user_id());
		$query = $this->db->get();
		$result = $query->result();
		
		if(!empty($result)){
				$SERVER_API_KEY = 'AAAAgOm36Ho:APA91bEd26HnlE4zgSjR1EMt9Ez80kdWiCP_0j5yq7NJCPCJrEUlmd64uEO5jTTilcp_6hAWxuqDAWr2CsK6pzJt7lGqk9bGRSMG5mYjCJe1bRyaN5YRNGMzkd-wJjnJuS2U0nu-VJMI';
			//$tokens = ['cL2p6WfhuXk:APA91bEsl-ngRjhUxRnkQBPT-FeCSmmVD210Gs-ncBOb1UXJYFRfcSSZdeQHhLoCv-25YzZn8QWVRs_f8zmTRYVEs8p-hh3hfx4Vpy-8OOElVI2bF4X9Kz30C9mYWK-5Cg4vKbPSJxAd'];
			
			foreach ($result as $token) {
			$registrationIds[] = $token->token;
			}
			
			$header = [
			'Authorization: Key=' . $SERVER_API_KEY,
			'Content-Type: Application/json'
			];
			
			
			$logo=  $this->Adminauthmodel->georganizationdetails();
			
			if(@$logo->image != ''){
				$logoimage = base_url().'uploads/'.@$logo->image;
			}else{
				$logoimage = base_url().'assets/img/avatars/placeholders/ava-128.png';
			}

			$msg = [
			'title' => 'Punch Out - '.$out_time,
			'body' => 'Thank You',
			'icon' => $logoimage,
			'image' => '',
			];

			$payload = [
			'registration_ids' 	=> $registrationIds,
			'data'				=> $msg
			];

			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => json_encode( $payload ),
			CURLOPT_HTTPHEADER => $header
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			echo "cURL Error #:" . $err;
			} else {
			echo $response;
			}
			}
			
		}else{
			$id = '';
			$entry_time= date('H:i',strtotime($time));
			//$entry_time= date('H:i',strtotime('10:00'));
			
			$this->db->select('*');
		$this->db->from(tablename('user_tokens'));
		$this->db->where('user_id', backend_user_id());
		$query = $this->db->get();
		$result = $query->result();
		
		if(!empty($result)){
				$SERVER_API_KEY = 'AAAAgOm36Ho:APA91bEd26HnlE4zgSjR1EMt9Ez80kdWiCP_0j5yq7NJCPCJrEUlmd64uEO5jTTilcp_6hAWxuqDAWr2CsK6pzJt7lGqk9bGRSMG5mYjCJe1bRyaN5YRNGMzkd-wJjnJuS2U0nu-VJMI';
			//$tokens = ['cL2p6WfhuXk:APA91bEsl-ngRjhUxRnkQBPT-FeCSmmVD210Gs-ncBOb1UXJYFRfcSSZdeQHhLoCv-25YzZn8QWVRs_f8zmTRYVEs8p-hh3hfx4Vpy-8OOElVI2bF4X9Kz30C9mYWK-5Cg4vKbPSJxAd'];
			
			foreach ($result as $token) {
			$registrationIds[] = $token->token;
			}
			
			$header = [
			'Authorization: Key=' . $SERVER_API_KEY,
			'Content-Type: Application/json'
			];
			

			$logo=  $this->Adminauthmodel->georganizationdetails();
			
			if(@$logo->image != ''){
				$logoimage = base_url().'uploads/'.@$logo->image;
			}else{
				$logoimage = base_url().'assets/img/avatars/placeholders/ava-128.png';
			}

			$msg = [
			'title' => 'Punch In - '.$entry_time,
			'body' => 'Thank You',
			'icon' => $logoimage,
			'image' => '',
			];

			$payload = [
			'registration_ids' 	=> $registrationIds,
			'data'				=> $msg
			];

			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => json_encode( $payload ),
			CURLOPT_HTTPHEADER => $header
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			echo "cURL Error #:" . $err;
			} else {
			echo $response;
			}
			}
		}
		// echo $entry_time; die;
        $Hours = '';
        $inss_type = 0;
        $employee_grade = $this->AttendanceModel->get_row_data('employee',array('id'=>$employee_id,'delete_flag'=>'N'));
        $assigned_workshift = $this->AttendanceModel->get_row_data('assigned_workshift',array('employee_id'=>$employee_id,'delete_flag'=>'N','start_date'=>date('Y-m-d',strtotime($att_date))));
        if(!empty($assigned_workshift)){
        $workshift =  $assigned_workshift->work_shift_id;
        }else{
        $workshift =  $employee_grade->work_shift_id;
        }
		
		


  

        if(!empty($employee_grade) && $employee_grade->grade!=''){
			$stweekname = date('l',strtotime($att_date));
			$curdate = date('Y-m-d',strtotime($att_date));
            $weekNo = getWeeks($curdate,$stweekname);
			$attendance_rules = '';
            $workshiftdetails = $this->AttendanceModel->get_workshift_details($workshift,$weekNo,$stweekname);
			//echo  '<pre>'; print_r($workshiftdetails); die;
			
            //echo '<pre>'; print_r($attendance_rules); die; 
			//die;
			if($workshiftdetails->weekvalue == 'rule_1'){
				$work_hour_start = $workshiftdetails->work_hour_start_1;
				$work_hour_end = $workshiftdetails->work_hour_end_1;
				$work_hour_duration = $workshiftdetails->work_hour_duration_1;
				$attendance_rules = $this->AttendanceModel->get_attendance_rule_workshiftwise($workshift,'Full');
				//echo '<pre>'; print_r($attendance_rules); die;
			}elseif($workshiftdetails->weekvalue == 'rule_2'){
				$work_hour_start = $workshiftdetails->work_hour_start_2;
				$work_hour_end = $workshiftdetails->work_hour_end_2;
				$work_hour_duration = $workshiftdetails->work_hour_duration_2;
				$attendance_rules = $this->AttendanceModel->get_attendance_rule_workshiftwise($workshift,'Half');
			}elseif($workshiftdetails->weekvalue == 'Full'){
				if($workshiftdetails->weekoff == 'rule_1'){
					$work_hour_start = $workshiftdetails->work_hour_start_1;
					$work_hour_end = $workshiftdetails->work_hour_end_1;
					$work_hour_duration = $workshiftdetails->work_hour_duration_1;
					$attendance_rules = $this->AttendanceModel->get_attendance_rule_workshiftwise($workshift,'Full');
				}else{
					$work_hour_start = $workshiftdetails->work_hour_start_2;
					$work_hour_end = $workshiftdetails->work_hour_end_2;
					$work_hour_duration = $workshiftdetails->work_hour_duration_2;
					$attendance_rules = $this->AttendanceModel->get_attendance_rule_workshiftwise($workshift,'Half');
				}
				
			}
			
			//echo '<pre>'; print_r($attendance_rules); die;
            $work_hour_grace = substr($workshiftdetails->work_hour_grace,3,2);
            //echo $work_hour_grace; die;
            $requiredtime=strtotime(date($work_hour_start))+($work_hour_grace*60);//15*60=900 seconds
            $requiredTime=date("h:i",$requiredtime);
           //echo $requiredTime; die;
            if(strtotime($entry_time) <= strtotime($requiredTime)){
            $late_type = 'Not Late';
            }else{
            $late_type = 'Late';
            }
            //echo $late_type; die;
            $firstlaterule = $this->AttendanceModel->get_row_data('master_late_rules',array('delete_flag'=>'N','is_active' =>'Y','occurrence_type' =>'First Occurence'));

            $Afterfirstlaterule = $this->AttendanceModel->get_row_data('master_late_rules',array('delete_flag'=>'N','is_active' =>'Y','occurrence_type' =>'After First Occurence'));


            $leave_details = $this->AttendanceModel->get_row_data('master_grade',array('id'=>@$employee_grade->grade));
            $emp_leave = explode(',', @$leave_details->leave_rule_id);
           
            if($entry_time!="" && $out_time!=""){
                // calcaulate diff of entry_time and out_time

            //$timeDiff = strtotime($entry_time) - strtotime($out_time);

            //$Hours = substr('00'.($timeDiff / 3600 % 24),-2);
           // $Hours = str_replace("-","",$Hours);
            //$Hours = sprintf("%02d", $Hours);

            //$Mint = substr('00'.($timeDiff / 60 % 60),-2);

           // $timme = $Hours.':'.$Mint;

           // $total_hour = str_replace("-","",$timme);
            $total_hour = getTimeDiff($entry_time,$out_time);
            $overTime = "";
			$day_type = 'Full Day';
        // echo $attendance_rules->min_hrs_for_full_day; die;
		$total_after_timeoff ="";
		   $check_eaarly_leave = $this->AttendanceModel->get_row_data('timeoff',array('employee_id'=>$employee_id,'date'=>$att_date,'approved' =>'Yes','delete_flag'=>'N','is_active' => 'Y'));
		   if(!empty($check_eaarly_leave)){
			   $check_timeoff_rule = $this->AttendanceModel->get_row_data('master_wfh_rules',array('type'=>'personal'));
			   if(!empty($check_timeoff_rule)){
				   $min_hrs_app_day = $check_timeoff_rule->max_hrs_apply_per_day;
				   $total_after_timeoff = $total_hour + $min_hrs_app_day;
				   //echo $total_after_timeoff; die;
			   }
			   
		   }
		   if($total_after_timeoff >= $total_hour){
			    $inss_type = 2;
                $day_type = 'EarlyLeave';
		   }else{
				//echo '<pre>';print_r($check_eaarly_leave); die;
            if(@$attendance_rules->incomplete_present_for_less_then != '00:00'){
					$rules_for_apsent_hrs = @$attendance_rules->incomplete_present_for_less_then;
				}else{
					$rules_for_apsent_hrs = @$attendance_rules->min_hrs_for_full_day;
				}
				
            if((@$attendance_rules->min_hrs_for_half_day != '00:00') && ($total_hour >= @$attendance_rules->min_hrs_for_half_day) && ($total_hour < @$attendance_rules->min_hrs_for_full_day) ){
                //half day insert
                $inss_type = 1;
                $day_type = 'Half Day';
            }else if((@$attendance_rules->over_time_after_hour != '00:00') && ($total_hour >= @$attendance_rules->min_hrs_for_full_day) && ($total_hour <= @$attendance_rules->over_time_after_hour)){
                //full day insert
                $inss_type = 2;
                $day_type = 'Full Day';
            }elseif($total_hour < $rules_for_apsent_hrs){
                $inss_type = 4;
                $day_type = 'Absent';
            }else if((@$attendance_rules->over_time_after_hour != '00:00') && ($total_hour > @$attendance_rules->min_hrs_for_full_day) && ($total_hour > @$attendance_rules->over_time_after_hour)){
                //over time insert
                $inss_type = 3;
                $day_type = 'Over Time';
                $overTime = $total_hour - @$attendance_rules->over_time_after_hour;
            }else if(($total_hour >= @$attendance_rules->min_hrs_for_full_day) && (@$attendance_rules->over_time_after_hour == '00:00')){
				$inss_type = 2;
                $day_type = 'Full Day';
			}
		   }

            }
            //echo $day_type; die;

        }

//echo '<pre>'; print_r($attendance_rules); die;    
        $date = date("Y-m-d H:i:s");

        if (!empty($id)) {
                $data = array(
                    'date' => date('Y-m-d',strtotime($att_date)),
                    'employee_id' => $employee_id,
                    //'flag'=>'1',
                    'entry_time' => $entry_time,
                    'out_time' => $out_time,
                    'total_hour' => @$total_hour,
                    'day_type' => @$day_type,
                    'late_type' => @$late_type,
                    'overTime' => @$overTime,
                    'modified_date' => $date
                );
           
            $this->db->where('id', $id)->update(tablename('attendance'), $data);

            $this->db->delete('HR_employee_leaves', array('attendance_id' => $id)); 

            if($inss_type==1){

                $check_half_day = $this->AttendanceModel->get_row_data('attendance_half_day',array('employee_id'=>$employee_id,'attendance_id'=>$id));
                if(!empty($check_half_day)){
                $data_half_day = array(
                    'attendance_id' => $id,
                    'date' => date('Y-m-d',strtotime($att_date)),
                    'employee_id' => $employee_id,
                    'total_hour' => @$total_hour,
                    'minimum_hour' => @$attendance_rules->min_hrs_for_half_day,
                    'modified_date' => $date
                );
           
                $this->db->where('attendance_id', $id)->where('employee_id', $employee_id)->update(tablename('attendance_half_day'), $data_half_day);
				
				  $leaveTypeArrhalf =  explode(',', $attendance_rules->leave_type_half);
               if(!empty($leaveTypeArrhalf)){
                for($i=0; $i<count($leaveTypeArrhalf); $i++){
                    $j = $i+1;

                     $empleave = $this->AttendanceModel->leave_balance($leaveTypeArrhalf[$i],$employee_id);
                    
                     if(!empty($empleave) && $empleave >= '1'){

                     $dataleavehalf = array(
                        'employee_id' =>  $employee_id,
                        'attendance_id' => $id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Half',
                         //'closing_balance' => $empleave->closing_balance - 1,
                        'note' => 'deduction',
                        );
                       
                        $dataleavehalf['taken_leaves'] = $attendance_rules->nos_half;
                        $dataleavehalf['leave_id'] = $leaveTypeArrhalf[$i];
                       // $dataleave['closing_balance'] = $empleave->closing_balance - 1;
                        $dataleavehalf['opening_balance'] = '-'.$attendance_rules->nos_half;
                      
                        //$dataleave['lop'] = '1';
                        //$dataleave['closing_balance'] = '0';
                        
                        $this->db->insert(tablename('employee_leaves'), $dataleavehalf);
                        break;
                    }

                    if(count($leaveTypeArrhalf) == $j){
                       //  print_r(count($leaveTypeArr)); die;
                        $dataleavehalf = array(
                        'employee_id' =>  $employee_id,
                        'attendance_id' => $id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Half',
                        'note' => 'deduction',
                        );
                        $dataleavehalf['lop'] = $attendance_rules->nos_half;
                        $dataleavehalf['closing_balance'] = '0';
                        $this->db->insert(tablename('employee_leaves'), $dataleavehalf);
                         break;
                    }
                }

               }
            }else{
                $data_half_day = array(
                    'attendance_id' => $id,
                    'date' => date('Y-m-d',strtotime($att_date)),
                    'employee_id' => $employee_id,
                    'total_hour' => @$total_hour,
                    'minimum_hour' => @$attendance_rules->min_hrs_for_half_day,
                    'entry_date' => $date
                );
           
                $this->db->insert(tablename('attendance_half_day'), $data_half_day);
				$leaveTypeArrhalf =  explode(',', $attendance_rules->leave_type_half);
               if(!empty($leaveTypeArrhalf)){
                for($i=0; $i<count($leaveTypeArrhalf); $i++){
                    $j = $i+1;

                     $empleave = $this->AttendanceModel->leave_balance($leaveTypeArrhalf[$i],$employee_id);
                    
                     if(!empty($empleave) && $empleave >= '1'){

                     $dataleavehalf = array(
                        'employee_id' =>  $employee_id,
                        'attendance_id' => $id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Half',
                         //'closing_balance' => $empleave->closing_balance - 1,
                        'note' => 'deduction',
                        );
                       
                        $dataleavehalf['taken_leaves'] = $attendance_rules->nos_half;
                        $dataleavehalf['leave_id'] = $leaveTypeArrhalf[$i];
                       // $dataleave['closing_balance'] = $empleave->closing_balance - 1;
                        $dataleavehalf['opening_balance'] = '-'.$attendance_rules->nos_half;
                      
                        //$dataleave['lop'] = '1';
                        //$dataleave['closing_balance'] = '0';
                        
                        $this->db->insert(tablename('employee_leaves'), $dataleavehalf);
                        break;
                    }

                    if(count($leaveTypeArrhalf) == $j){
                       //  print_r(count($leaveTypeArr)); die;
                        $dataleavehalf = array(
                        'employee_id' =>  $employee_id,
                        'attendance_id' => $id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Half',
                        'note' => 'deduction',
                        );
                        $dataleavehalf['lop'] = $attendance_rules->nos_half;
                        $dataleavehalf['closing_balance'] = '0';
                        $this->db->insert(tablename('employee_leaves'), $dataleavehalf);
                         break;
                    }
                }

               }
			   
            }
            $delete = array(
                    'delete_flag' => "Y",
                    'is_active' => "N",
                    'modified_date' => $date
                );
                $this->db->where('attendance_id', $id)->where('employee_id', $employee_id)->update(tablename('attendance_overtime'), $delete);
                $this->db->where('attendance_id', $id)->where('employee_id', $employee_id)->update(tablename('attendance_incomplete_present'), $delete);


            }else if($inss_type==3){
                $check_overtime = $this->AttendanceModel->get_row_data('attendance_overtime',array('employee_id'=>$employee_id,'attendance_id'=>$id));
                if(!empty($check_overtime)){
                 $data_overtime = array(
                    'attendance_id' => $id,
                    'date' => date('Y-m-d',strtotime($att_date)),
                    'employee_id' => $employee_id,
                    'total_hour' => @$total_hour,
                    'minimum_hour' => @$attendance_rules->over_time_after_hour,
                    'modified_date' => $date
                );
           
                $this->db->where('attendance_id', $id)->where('employee_id', $employee_id)->update(tablename('attendance_overtime'), $data_overtime);
                }else{
                     $data_overtime = array(
                    'attendance_id' => $id,
                    'date' => date('Y-m-d',strtotime($att_date)),
                    'employee_id' => $employee_id,
                    'total_hour' => @$total_hour,
                    'minimum_hour' => @$attendance_rules->over_time_after_hour,
                    'entry_date' => $date
                );
           
                $this->db->insert(tablename('attendance_overtime'), $data_overtime);
                }

                $delete = array(
                    'delete_flag' => "Y",
                    'is_active' => "N",
                    'modified_date' => $date
                );
           
                $this->db->where('attendance_id', $id)->where('employee_id', $employee_id)->update(tablename('attendance_half_day'), $delete);
                $this->db->where('attendance_id', $id)->where('employee_id', $employee_id)->update(tablename('attendance_incomplete_present'), $delete);

            }else if($inss_type==4){
                $check_incomplete_present = $this->AttendanceModel->get_row_data('attendance_incomplete_present',array('employee_id'=>$employee_id,'attendance_id'=>$id));
                if(!empty($check_incomplete_present)){
                 $data_incomplete_present = array(
                    'attendance_id' => $id,
                    'date' => date('Y-m-d',strtotime($att_date)),
                    'employee_id' => $employee_id,
                    'total_hour' => @$total_hour,
                    'minimum_hour' => $rules_for_apsent_hrs,
                    'modified_date' => $date
                );
           
                $this->db->where('attendance_id', $id)->where('employee_id', $employee_id)->update(tablename('attendance_incomplete_present'), $data_incomplete_present);

                $leaveTypeArr =  explode(',', $attendance_rules->leave_type);
               if(!empty($leaveTypeArr)){
                for($i=0; $i<count($leaveTypeArr); $i++){
                    $j = $i+1;

                     $empleave = $this->AttendanceModel->leave_balance($leaveTypeArr[$i],$employee_id);
                    
                     if(!empty($empleave) && $empleave >= '1'){

                     $dataleave = array(
                        'employee_id' =>  $employee_id,
                        'attendance_id' => $id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Absent',
                         //'closing_balance' => $empleave->closing_balance - 1,
                        'note' => 'deduction',
                        );
                       
                        $dataleave['taken_leaves'] = $attendance_rules->nos;
                        $dataleave['leave_id'] = $leaveTypeArr[$i];
                       // $dataleave['closing_balance'] = $empleave->closing_balance - 1;
                        $dataleave['opening_balance'] = '-'.$attendance_rules->nos;
                      
                        //$dataleave['lop'] = '1';
                        //$dataleave['closing_balance'] = '0';
                        
                        $this->db->insert(tablename('employee_leaves'), $dataleave);
                        break;
                    }

                    if(count($leaveTypeArr) == $j){
                       //  print_r(count($leaveTypeArr)); die;
                        $dataleave = array(
                        'employee_id' =>  $employee_id,
                        'attendance_id' => $id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Absent',
                        'note' => 'deduction',
                        );
                        $dataleave['lop'] = $attendance_rules->nos;
                        $dataleave['closing_balance'] = '0';
                        $this->db->insert(tablename('employee_leaves'), $dataleave);
                         break;
                    }
                }

               }
                }else{
                     $data_incomplete_present = array(
                    'attendance_id' => $id,
                    'date' => date('Y-m-d',strtotime($att_date)),
                    'employee_id' => $employee_id,
                    'total_hour' => @$total_hour,
                    'minimum_hour' => $rules_for_apsent_hrs,
                    'entry_date' => $date
                );
           
                $this->db->insert(tablename('attendance_incomplete_present'), $data_incomplete_present);

                $leaveTypeArr =  explode(',', $attendance_rules->leave_type);
               if(!empty($leaveTypeArr)){
                for($i=0; $i<count($leaveTypeArr); $i++){
                    $j = $i+1;

                     $empleave = $this->AttendanceModel->leave_balance($leaveTypeArr[$i],$employee_id);
                    
                     if(!empty($empleave) && $empleave >= '1'){

                     $dataleave = array(
                        'employee_id' =>  $employee_id,
                        'attendance_id' => $id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Absent',
                         //'closing_balance' => $empleave->closing_balance - 1,
                        'note' => 'deduction',
                        );
                       
                        $dataleave['taken_leaves'] = $attendance_rules->nos;
                        $dataleave['leave_id'] = $leaveTypeArr[$i];
                       // $dataleave['closing_balance'] = $empleave->closing_balance - 1;
                        $dataleave['opening_balance'] = '-'.$attendance_rules->nos;
                      
                        //$dataleave['lop'] = '1';
                        //$dataleave['closing_balance'] = '0';
                        
                        $this->db->insert(tablename('employee_leaves'), $dataleave);
                        break;
                    }

                    if(count($leaveTypeArr) == $j){
                       //  print_r(count($leaveTypeArr)); die;
                        $dataleave = array(
                        'employee_id' =>  $employee_id,
                        'attendance_id' => $id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Absent',
                        'note' => 'deduction',
                        );
                        $dataleave['lop'] = $attendance_rules->nos;
                        $dataleave['closing_balance'] = '0';
                        $this->db->insert(tablename('employee_leaves'), $dataleave);
                         break;
                    }
                }

               }
                }

                $delete = array(
                    'delete_flag' => "Y",
                    'is_active' => "N",
                    'modified_date' => $date
                );
           
                $this->db->where('attendance_id', $id)->where('employee_id', $employee_id)->update(tablename('attendance_overtime'), $delete);
                 $this->db->where('attendance_id', $id)->where('employee_id', $employee_id)->update(tablename('attendance_half_day'), $delete);

            }else{

                $delete = array(
                    'delete_flag' => "Y",
                    'is_active' => "N",
                    'modified_date' => $date
                );
           
                $this->db->where('attendance_id', $id)->where('employee_id', $employee_id)->update(tablename('attendance_half_day'), $delete);
                $this->db->where('attendance_id', $id)->where('employee_id', $employee_id)->update(tablename('attendance_overtime'), $delete);
                 $this->db->where('attendance_id', $id)->where('employee_id', $employee_id)->update(tablename('attendance_incomplete_present'), $delete);

            }


            $lateCountup = $this->AttendanceModel->latecount($month,$year,$employee_id);
            //echo $lateCountup ; die;

            if(!empty($firstlaterule)){
                //print_r($firstlaterule->no_of_occu_allowed);
                if($firstlaterule->no_of_occu_allowed == $lateCountup && $firstlaterule->deduction_apply == 'Y'){
                    

                    $countlatededuction = $this->AttendanceModel->get_row_data_orderby('employee_leaves',array('credited_month'=>date('F',strtotime($att_date)),'employee_id'=>$employee_id,'type' => 'Late Deduction'));

                 //echo '<pre>'; print_r($empleave); die;
                    if(empty($countlatededuction)){
                        $firstLateeArr =  explode(',', $firstlaterule->leave_type);

                        if(!empty($firstLateeArr)){
                        for($i=0; $i<count($firstLateeArr); $i++){
                        $j = $i+1;

                    //$empleave = $this->AttendanceModel->get_row_data_orderby('employee_leaves',array('leave_id'=>$firstLateeArr[$i],'employee_id'=>$employee_id));
                    $empleave = $this->AttendanceModel->leave_balance($firstLateeArr[$i],$employee_id);
                    
                     if(!empty($empleave) && $empleave >= '1'){

                    $dataleave = array(
                        'employee_id' =>  $employee_id,
                        //'attendance_id' => $insert_id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Late Deduction',
                        'note' => 'deduction',
                        'flag' => '100'
                        );
                       
                        $dataleave['taken_leaves'] = $firstlaterule->nos;
                        $dataleave['leave_id'] = $firstLateeArr[$i];
                        //$dataleave['closing_balance'] = $empleave->closing_balance - $firstlaterule->nos;
                        $dataleave['opening_balance'] = '-'.$firstlaterule->nos;
                    
                        
                        $this->db->insert(tablename('employee_leaves'), $dataleave);
                        break;
                    }

                    if(count($firstLateeArr) == $j){
                       //  print_r(count($leaveTypeArr)); die;
                        $dataleave = array(
                        'employee_id' =>  $employee_id,
                       // 'attendance_id' => $insert_id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Late Deduction',
                        'note' => 'deduction',
                        'flag' => '100'
                        );
                        $dataleave['lop'] = $firstlaterule->nos;
                        //$dataleave['closing_balance'] = '0';
                        $this->db->insert(tablename('employee_leaves'), $dataleave);
                         break;
                                }
                             }

                         }
                     }
                }elseif($lateCountup < $firstlaterule->no_of_occu_allowed && $firstlaterule->deduction_apply == 'Y'){
                    //echo $lateCountup; die;
                    $this->db->delete('HR_employee_leaves', array('credited_month'=>date('F',strtotime($att_date)),'employee_id'=>$employee_id,'type' => 'Late Deduction','flag' => '100')); 
                    //echo $this->db->last_query(); die;

                }

            }


            if(!empty($Afterfirstlaterule)){
                if($lateCountup > $firstlaterule->no_of_occu_allowed+$Afterfirstlaterule->no_of_occu_allowed -2 ){
                    $countafterfist = ($lateCountup - $firstlaterule->no_of_occu_allowed)/ $Afterfirstlaterule->no_of_occu_allowed;
                   // echo $countafterfist; die;
                 $flag = $this->AttendanceModel->get_row_data_orderby('employee_leaves',array('credited_month'=>date('F',strtotime($att_date)),'employee_id'=>$employee_id,'type' => 'Late Deduction'));
                //echo 'yyy'; print_r($countafterfist); echo 'pre'; echo $flag->flag; //die;
                if(!empty($flag) && $flag->flag != $countafterfist){
                     //print_r($countafterfist); echo 'pre'; echo $flag->flag; //die;
                if($countafterfist == '1' || $countafterfist == '2' || $countafterfist == '3' || $countafterfist == '4' || $countafterfist == '5' || $countafterfist == '6' || $countafterfist == '7' || $countafterfist == '8' || $countafterfist == '9' || $countafterfist == '10' && $Afterfirstlaterule->deduction_apply == 'Y'){
                         $AfterfirstLateArr =  explode(',', $Afterfirstlaterule->leave_type);
    
                        if(!empty($AfterfirstLateArr)){
                        for($i=0; $i<count($AfterfirstLateArr); $i++){
                        $j = $i+1;

                        //$empleave = $this->AttendanceModel->get_row_data_orderby('employee_leaves',array('leave_id'=>$AfterfirstLateArr[$i],'employee_id'=>$employee_id));
                        $empleave = $this->AttendanceModel->leave_balance($AfterfirstLateArr[$i],$employee_id);

                        if(!empty($empleave) && $empleave >= '1'){

                        $dataleave = array(
                        'employee_id' =>  $employee_id,
                        //'attendance_id' => $insert_id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Late Deduction',
                        'note' => 'deduction',
                        'flag' => $countafterfist,
                        );

                        $dataleave['taken_leaves'] = $Afterfirstlaterule->nos;
                         $dataleave['leave_id'] = $AfterfirstLateArr[$i];
                         $dataleave['opening_balance'] = '-'.$Afterfirstlaterule->nos;
                       // $dataleave['closing_balance'] = $empleave->closing_balance - $Afterfirstlaterule->nos;


                        $this->db->insert(tablename('employee_leaves'), $dataleave);
                        break;
                        }

                        if(count($AfterfirstLateArr) == $j &&  !empty($empleave) && $empleave == '0' || $empleave == '0.5'){
                        //  print_r(count($leaveTypeArr)); die;
                        $dataleave = array(
                        'employee_id' =>  $employee_id,
                        //'attendance_id' => $insert_id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Late Deduction',
                        'note' => 'deduction',
                        'flag' => $countafterfist,
                        );
                        $dataleave['lop'] = $Afterfirstlaterule->nos;
                        //$dataleave['closing_balance'] = '0';
                        $this->db->insert(tablename('employee_leaves'), $dataleave);
                         break;
                                }
                             }

                         }
                    
                }elseif($countafterfist < $flag->flag){
                //print_r($countafterfist); echo 'pre'; echo $flag->flag; //die;
                 $this->db->delete('HR_employee_leaves', array('credited_month'=>date('F',strtotime($att_date)),'employee_id'=>$employee_id,'type' => 'Late Deduction','flag' => $flag->flag, 'flag !=' => '100'));
            }
            }
        }
            }



            $this->session->set_flashdata('successmessage', 'Attendance modified successfully');

            if(isset($stDate) && $stDate!=''){
                $url = 'attendance/1?start_date='.$stDate.'&submit=';
            }else{
                $url = 'attendance/1';
            }
            redirect(base_url($url));
        } else {
         
                $data = array(
                     'date' => date('Y-m-d',strtotime($att_date)),
                    'employee_id' => $employee_id,
                   // 'type' => $type,
                    //'att_type' => $att_type_val,
                    'flag'=>'1',
                    'entry_time' => $entry_time,
                    'out_time' => $out_time,
                    'total_hour' => @$total_hour,
                    'day_type' => @$day_type,
                    'late_type' => @$late_type,
                    'overTime' => @$overTime,
                    'entry_date' => $date
                );
            
            $this->db->insert(tablename('attendance'), $data);
            $insert_id = $this->db->insert_id();
			
			
			
             if($inss_type==1){

                $data_half_day = array(
                    'attendance_id' => $insert_id,
                    'date' => date('Y-m-d',strtotime($att_date)),
                    'employee_id' => $employee_id,
                    'total_hour' => @$total_hour,
                    'minimum_hour' => @$attendance_rules->min_hrs_for_half_day,
                    'entry_date' => $date
                );
           
                $this->db->insert(tablename('attendance_half_day'), $data_half_day);
				
				 $leaveTypeArrhalf =  explode(',', $attendance_rules->leave_type_half);
               if(!empty($leaveTypeArrhalf)){
                for($i=0; $i<count($leaveTypeArrhalf); $i++){
                    $j = $i+1;

                     $empleave = $this->AttendanceModel->leave_balance($leaveTypeArrhalf[$i],$employee_id);
                    
                     if(!empty($empleave) && $empleave >= '1'){

                     $dataleavehalf = array(
                        'employee_id' =>  $employee_id,
                        'attendance_id' => $insert_id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Half',
                         //'closing_balance' => $empleave->closing_balance - 1,
                        'note' => 'deduction',
                        );
                       
                        $dataleavehalf['taken_leaves'] = $attendance_rules->nos_half;
                        $dataleavehalf['leave_id'] = $leaveTypeArrhalf[$i];
                       // $dataleave['closing_balance'] = $empleave->closing_balance - 1;
                        $dataleavehalf['opening_balance'] = '-'.$attendance_rules->nos_half;
                      
                        //$dataleave['lop'] = '1';
                        //$dataleave['closing_balance'] = '0';
                        
                        $this->db->insert(tablename('employee_leaves'), $dataleavehalf);
                        break;
                    }

                    if(count($leaveTypeArr) == $j){
                       //  print_r(count($leaveTypeArr)); die;
                        $dataleavehalf = array(
                        'employee_id' =>  $employee_id,
                        'attendance_id' => $insert_id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Half',
                        'note' => 'deduction',
                        );
                        $dataleavehalf['lop'] = $attendance_rules->nos_half;
                        $dataleavehalf['closing_balance'] = '0';
                        $this->db->insert(tablename('employee_leaves'), $dataleavehalf);
                         break;
                    }
                }

               }


            }else if($inss_type==3){
                 $data_overtime = array(
                    'attendance_id' => $insert_id,
                    'date' => date('Y-m-d',strtotime($att_date)),
                    'employee_id' => $employee_id,
                    'total_hour' => @$total_hour,
                    'minimum_hour' => @$attendance_rules->over_time_after_hour,
                    'entry_date' => $date
                );
           
                $this->db->insert(tablename('attendance_overtime'), $data_overtime);
            }else if($inss_type==4){
               $leaveTypeArr =  explode(',', $attendance_rules->leave_type);
               if(!empty($leaveTypeArr)){
                for($i=0; $i<count($leaveTypeArr); $i++){
                    $j = $i+1;

                     $empleave = $this->AttendanceModel->leave_balance($leaveTypeArr[$i],$employee_id);
                    
                     if(!empty($empleave) && $empleave >= '1'){

                     $dataleave = array(
                        'employee_id' =>  $employee_id,
                        'attendance_id' => $insert_id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Absent',
                         //'closing_balance' => $empleave->closing_balance - 1,
                        'note' => 'deduction',
                        );
                       
                        $dataleave['taken_leaves'] = $attendance_rules->nos;
                        $dataleave['leave_id'] = $leaveTypeArr[$i];
                       // $dataleave['closing_balance'] = $empleave->closing_balance - 1;
                        $dataleave['opening_balance'] = '-'.$attendance_rules->nos;
                      
                        //$dataleave['lop'] = '1';
                        //$dataleave['closing_balance'] = '0';
                        
                        $this->db->insert(tablename('employee_leaves'), $dataleave);
                        break;
                    }

                    if(count($leaveTypeArr) == $j){
                       //  print_r(count($leaveTypeArr)); die;
                        $dataleave = array(
                        'employee_id' =>  $employee_id,
                        'attendance_id' => $insert_id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Absent',
                        'note' => 'deduction',
                        );
                        $dataleave['lop'] = $attendance_rules->nos;
                        $dataleave['closing_balance'] = '0';
                        $this->db->insert(tablename('employee_leaves'), $dataleave);
                         break;
                    }
                }

               }

                 $data_incom = array(
                    'attendance_id' => $insert_id,
                    'date' => date('Y-m-d',strtotime($att_date)),
                    'employee_id' => $employee_id,
                    'total_hour' => @$total_hour,
                    'minimum_hour' => $rules_for_apsent_hrs,
                    'entry_date' => $date
                );
           
                $this->db->insert(tablename('attendance_incomplete_present'), $data_incom);
            }


            $lateCount = $this->AttendanceModel->latecount($month,$year,$employee_id);

            if(!empty($firstlaterule)){
                //print_r($firstlaterule->no_of_occu_allowed);
                if($firstlaterule->no_of_occu_allowed == $lateCount && $firstlaterule->deduction_apply == 'Y'){
                    

                    $countlatededuction = $this->AttendanceModel->get_row_data_orderby('employee_leaves',array('credited_month'=>date('F',strtotime($att_date)),'employee_id'=>$employee_id,'type' => 'Late Deduction'));

                 //echo '<pre>'; print_r($empleave); die;
                    if(empty($countlatededuction)){
                        $firstLateeArr =  explode(',', $firstlaterule->leave_type);

                        if(!empty($firstLateeArr)){
                        for($i=0; $i<count($firstLateeArr); $i++){
                        $j = $i+1;

                    //$empleave = $this->AttendanceModel->get_row_data_orderby('employee_leaves',array('leave_id'=>$firstLateeArr[$i],'employee_id'=>$employee_id));
                    $empleave = $this->AttendanceModel->leave_balance($firstLateeArr[$i],$employee_id);
                    
                     if(!empty($empleave) && $empleave >= '1'){

                    $dataleave = array(
                        'employee_id' =>  $employee_id,
                        //'attendance_id' => $insert_id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Late Deduction',
                        'note' => 'deduction',
                        'flag' => '100'
                        );
                       
                        $dataleave['taken_leaves'] = $firstlaterule->nos;
                        $dataleave['leave_id'] = $firstLateeArr[$i];
                        //$dataleave['closing_balance'] = $empleave->closing_balance - $firstlaterule->nos;
                        $dataleave['opening_balance'] = '-'.$firstlaterule->nos;
                    
                        
                        $this->db->insert(tablename('employee_leaves'), $dataleave);
                        break;
                    }

                    if(count($firstLateeArr) == $j){
                       //  print_r(count($leaveTypeArr)); die;
                        $dataleave = array(
                        'employee_id' =>  $employee_id,
                       // 'attendance_id' => $insert_id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Late Deduction',
                        'note' => 'deduction',
                        'flag' => '100'
                        );
                        $dataleave['lop'] = $firstlaterule->nos;
                        //$dataleave['closing_balance'] = '0';
                        $this->db->insert(tablename('employee_leaves'), $dataleave);
                         break;
                                }
                             }

                         }
                     }
                }

            }


            if(!empty($Afterfirstlaterule)){
                //print_r($lateCount); die;
                if($lateCount > $firstlaterule->no_of_occu_allowed){
                    $countafterfist = ($lateCount - $firstlaterule->no_of_occu_allowed)/ $Afterfirstlaterule->no_of_occu_allowed;
                    //print_r($countafterfist); //die;
                 $flag = $this->AttendanceModel->get_row_data_orderby('employee_leaves',array('credited_month'=>date('F',strtotime($att_date)),'employee_id'=>$employee_id,'type' => 'Late Deduction'));
                // echo '<pre>';  print_r($flag->flag); die;
                if(!empty($flag) && trim($flag->flag) != $countafterfist){
                     //echo '<pre>';  print_r($flag); die;
                if($countafterfist == '1' || $countafterfist == '2' || $countafterfist == '3' || $countafterfist == '4' || $countafterfist == '5' || $countafterfist == '6' || $countafterfist == '7' || $countafterfist == '8' || $countafterfist == '9' || $countafterfist == '10' && $Afterfirstlaterule->deduction_apply == 'Y'){
                         $AfterfirstLateArr =  explode(',', $Afterfirstlaterule->leave_type);
    
                        if(!empty($AfterfirstLateArr)){
                        for($i=0; $i<count($AfterfirstLateArr); $i++){
                        $j = $i+1;

                        //$empleave = $this->AttendanceModel->get_row_data_orderby('employee_leaves',array('leave_id'=>$AfterfirstLateArr[$i],'employee_id'=>$employee_id));
                        $empleave = $this->AttendanceModel->leave_balance($AfterfirstLateArr[$i],$employee_id);
                      //echo 'empleave';      echo $empleave ; die;
                        if(!empty($empleave) && $empleave >= '1'){

                        $dataleave = array(
                        'employee_id' =>  $employee_id,
                        //'attendance_id' => $insert_id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Late Deduction',
                        'note' => 'deduction',
                        'flag' => $countafterfist,
                        );

                        $dataleave['taken_leaves'] = $Afterfirstlaterule->nos;
                         $dataleave['leave_id'] = $AfterfirstLateArr[$i];
                         $dataleave['opening_balance'] = '-'.$Afterfirstlaterule->nos;
                       // $dataleave['closing_balance'] = $empleave->closing_balance - $Afterfirstlaterule->nos;


                        $this->db->insert(tablename('employee_leaves'), $dataleave);
                        break;
                        }

                        if(count($AfterfirstLateArr) == $j &&  !empty($empleave) && $empleave == '0' || $empleave == '0.5'){
                        //  print_r(count($leaveTypeArr)); die;
                        $dataleave = array(
                        'employee_id' =>  $employee_id,
                        //'attendance_id' => $insert_id,
                        'entry_date' => date('Y-m-d',strtotime($att_date)),
                        'date' =>date('Y-m-d',strtotime($att_date)),
                        'credited_month' =>date('F',strtotime($att_date)),
                        'type' => 'Late Deduction',
                        'note' => 'deduction',
                        'flag' => $countafterfist,
                        );
                        $dataleave['lop'] = $Afterfirstlaterule->nos;
                        //$dataleave['closing_balance'] = '0';
                        $this->db->insert(tablename('employee_leaves'), $dataleave);
                         break;
                                }
                             }

                         }
                    
                }
            }
        }
            }
            
             $this->session->set_flashdata('successmessage', 'Attendance added successfully');
            redirect(base_url('page/45/1'));
        }
    }
	
	
	
	//For capture break IN Timing
	
	public function modify_from_dashbord_break_in_time($attendance_id,$employeeid,$datetime,$time) {  
	   
        $month = date('m',strtotime($datetime));
        $year = date('Y',strtotime($datetime));
        $stDate= $datetime;
        $att_date= date('Y-m-d',strtotime($datetime));
        $employee_id= $employeeid;
		$entry_time= date('H:i',strtotime($time));
		$date = date("Y-m-d H:i:s");
		
		 $data = array(
                     'date' => date('Y-m-d',strtotime($att_date)),
                     'employee_id' => $employee_id,
                     'attendance_id' => $attendance_id,
                     'entry_time' => $entry_time,
                     'entry_date' => $date
                );
            
        $this->db->insert(tablename('attendance_break_time'), $data);
		 
		$this->db->select('*');
		$this->db->from(tablename('user_tokens'));
		$this->db->where('user_id', backend_user_id());
		$query = $this->db->get();
		$result = $query->result();
		
		if(!empty($result)){
				$SERVER_API_KEY = 'AAAAgOm36Ho:APA91bEd26HnlE4zgSjR1EMt9Ez80kdWiCP_0j5yq7NJCPCJrEUlmd64uEO5jTTilcp_6hAWxuqDAWr2CsK6pzJt7lGqk9bGRSMG5mYjCJe1bRyaN5YRNGMzkd-wJjnJuS2U0nu-VJMI';
			//$tokens = ['cL2p6WfhuXk:APA91bEsl-ngRjhUxRnkQBPT-FeCSmmVD210Gs-ncBOb1UXJYFRfcSSZdeQHhLoCv-25YzZn8QWVRs_f8zmTRYVEs8p-hh3hfx4Vpy-8OOElVI2bF4X9Kz30C9mYWK-5Cg4vKbPSJxAd'];
			
			foreach ($result as $token) {
			$registrationIds[] = $token->token;
			}
			
			$header = [
			'Authorization: Key=' . $SERVER_API_KEY,
			'Content-Type: Application/json'
			];
			
			
			$logo=  $this->Adminauthmodel->georganizationdetails();
			
			if(@$logo->image != ''){
				$logoimage = base_url().'uploads/'.@$logo->image;
			}else{
				$logoimage = base_url().'assets/img/avatars/placeholders/ava-128.png';
			}

			$msg = [
			'title' => 'Break Out - '.$entry_time,
			'body' => 'Thank You',
			'icon' => $logoimage,
			'image' => '',
			];

			$payload = [
			'registration_ids' 	=> $registrationIds,
			'data'				=> $msg
			];

			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => json_encode( $payload ),
			CURLOPT_HTTPHEADER => $header
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			echo "cURL Error #:" . $err;
			} else {
			echo $response;
			}
			}
			
		 
    }
	
	//For capture break OUT Timing
	
	public function modify_from_dashbord_break_out_time($id,$attendance_id,$employeeid,$datetime,$entry_time,$time) {  
	   
        $month = date('m',strtotime($datetime));
        $year = date('Y',strtotime($datetime));
        $stDate= $datetime;
        $att_date= date('Y-m-d',strtotime($datetime));
        $employee_id= $employeeid;
		$entrytime= date('H:i',strtotime($entry_time));
		$out_time= date('H:i',strtotime($time));
		$date = date("Y-m-d H:i:s");
		
		if($entrytime!="" && $out_time!=""){
            $total_hour = getTimeDiff($entrytime,$out_time);
		}
		 $data = array(
                    //'date' => date('Y-m-d',strtotime($att_date)),
                    'total_hour' => $total_hour,
                    'out_time' => $out_time,
                    'modified_date' => $date
                );
           
            $this->db->where('id', $id)->update(tablename('attendance_break_time'), $data);
			
			$this->db->select('*');
		$this->db->from(tablename('user_tokens'));
		$this->db->where('user_id', backend_user_id());
		$query = $this->db->get();
		$result = $query->result();
		
		if(!empty($result)){
				$SERVER_API_KEY = 'AAAAgOm36Ho:APA91bEd26HnlE4zgSjR1EMt9Ez80kdWiCP_0j5yq7NJCPCJrEUlmd64uEO5jTTilcp_6hAWxuqDAWr2CsK6pzJt7lGqk9bGRSMG5mYjCJe1bRyaN5YRNGMzkd-wJjnJuS2U0nu-VJMI';
			//$tokens = ['cL2p6WfhuXk:APA91bEsl-ngRjhUxRnkQBPT-FeCSmmVD210Gs-ncBOb1UXJYFRfcSSZdeQHhLoCv-25YzZn8QWVRs_f8zmTRYVEs8p-hh3hfx4Vpy-8OOElVI2bF4X9Kz30C9mYWK-5Cg4vKbPSJxAd'];
			
			foreach ($result as $token) {
			$registrationIds[] = $token->token;
			}
			
			$header = [
			'Authorization: Key=' . $SERVER_API_KEY,
			'Content-Type: Application/json'
			];
			
			
			$logo=  $this->Adminauthmodel->georganizationdetails();
			
			if(@$logo->image != ''){
				$logoimage = base_url().'uploads/'.@$logo->image;
			}else{
				$logoimage = base_url().'assets/img/avatars/placeholders/ava-128.png';
			}

			

			$msg = [
			'title' => 'Break In - '.$out_time,
			'body' => 'Thank You',
			'icon' => $logoimage,
			'image' => '',
			];

			$payload = [
			'registration_ids' 	=> $registrationIds,
			'data'				=> $msg
			];

			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => json_encode( $payload ),
			CURLOPT_HTTPHEADER => $header
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			echo "cURL Error #:" . $err;
			} else {
			echo $response;
			}
			}
		 
    }
	
	public function get_total_breaktime_daywise($curdate,$employee_id) {
        $this->db->select('SEC_TO_TIME( SUM( TIME_TO_SEC( `total_hour` ) ) ) AS timeSum');
        $this->db->from(tablename('attendance_break_time'));
        $this->db->where('employee_id', $employee_id);
		$this->db->where('date', $curdate);
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    
    
}
/* End of file AttendanceModel.php */
/* Location: ./application/modules/attendance/models/admin/AttendanceModel.php */