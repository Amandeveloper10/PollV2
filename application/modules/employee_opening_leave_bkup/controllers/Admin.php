<?php

/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class for employee_leave [HMVC]. Handles all the datatypes and methodes required
 * for employee_leave section of future
 */
class Admin extends MX_Controller {

    /**
     * The constructor method of this class.
     *
     * @access  public
     * @param   none
     * @return  Loads all the method, helper, library etc. required throughout this class
     */
    public function __construct() {
        parent::__construct();
        admin_authenticate();
        $this->load->model('admin/EmpOpeningLeaveModel');
    }

    /**
     * Index Page for this employee_leave controller.
     *
     * @access  public
     * @param   $id = is used to check index is load after add/edit or directly
     * @return  string
     */
    public function index($id=NULL) {
        $all_data = $this->EmpOpeningLeaveModel->load_all_data();
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
       //echo "<pre>"; print_r($all_data); die;
        if($id){
            $this->load->view('employee_opening_leave/admin/list',$this->data);
        }else{
            $this->middle = 'employee_opening_leave/admin/list';
        $this->layout();
        }
    }

    public function admin_employee_opening_leave_monthwise(){

        $month= $_POST['month'];
        $month_name = date("F", mktime(0, 0, 0, $month, 10));
        $this->data['all_data'] = $this->EmpOpeningLeaveModel->load_all_data_monthwise($month_name);
        $this->data['month'] = $month_name;
      $view = $this->load->view('employee_opening_leave/admin/list_ajax', $this->data, TRUE);
     echo $view;
        exit();
    }

    /**
     * add/edit save for this employee_leave controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */

     public function form($id = NULL) {        
        if (isset($_POST['submit'])) {
        //echo "<pre>"; print_r($_POST); die;           
        $flg = $this->EmpOpeningLeaveModel->modify($id);            
        }        
    }


    /**
     * edit Page load for this employee_leave controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */
     public function get_opening_form() {
        $this->data = array();
        $id = $_POST['id'];  
        if (!empty($id)) {
            $this->data['data_single'] = $this->EmpOpeningLeaveModel->load_single_data($id);
            $this->data['id'] = $id;  
            $this->data['all_leave_type'] = $this->EmpOpeningLeaveModel->get_result_data('master_leave_rules',array('is_active'=>'Y','delete_flag'=>'N'));
            $employee_details = $this->EmpOpeningLeaveModel->get_row_data('employee',array('id'=>$this->data['data_single']->employee_id));
        $leave_details = $this->EmpOpeningLeaveModel->get_row_data('master_grade',array('id'=>@$employee_details->grade));
        $emp_leave = explode(',', $leave_details->leave_rule_id);
        $this->data['emp_leave'] = $emp_leave;
        } 

        $this->data['all_leaves'] = $this->EmpOpeningLeaveModel->get_result_data('master_leave_rules', array('delete_flag' => 'N', 'is_active' => 'Y'));
        
        $this->data['all_employee'] = $this->EmpOpeningLeaveModel->get_result_data('employee',array('is_active'=>'Y','delete_flag'=>'N'));
        //echo "<pre>"; print_r($this->data['data_single']); //die;
        $view = $this->load->view('employee_opening_leave/admin/form',$this->data, TRUE);
        echo $view; exit();         
    }
	
	  public function leavedata() {
        $this->data = array();
		$myObj = array();
		$all_data = $this->EmpOpeningLeaveModel->load_all_data();
		if(!empty($all_data))
     
		{
			foreach ($all_data as $k=> $value) {
						$emp_leave = '';
						$totalopening = '0';
						$totalcredit = '0';
						$totaltaken = '0';
						$totallop = '0';
						$leave_details = $this->EmpOpeningLeaveModel->get_row_data('master_grade',array('id'=>@$value->grade));
						//print_r($leave_details); die;
						if(!empty($leave_details->leave_rule_id)){
						$emp_leave = explode(',', $leave_details->leave_rule_id);
						}

						$all_leave_type = $this->EmpOpeningLeaveModel->get_row_data('master_leave_rules',array('is_active'=>'Y','delete_flag'=>'N'));
						$empID = @$value->empid;
						if(!empty($emp_leave)){
						foreach ($emp_leave as $key => $values) {
						$totalopening += $this->EmpOpeningLeaveModel->get_all_nos_opening($values,@$empID);
						$totalcredit += $this->EmpOpeningLeaveModel->get_all_nos_credit($values,@$empID);
						$totaltaken += $this->EmpOpeningLeaveModel->get_all_nos_taken($values,@$empID);
						$totallop = $this->EmpOpeningLeaveModel->get_all_nos_lop(@$empID);
						}
						}
						
						if(!empty($emp_leave)){
                      foreach ($emp_leave as $key => $values) {
                      $all_leave_type = $this->EmpOpeningLeaveModel->get_row_data('master_leave_rules',array('is_active'=>'Y','delete_flag'=>'N','id'=>$values));
                      //$opening = $this->EmpOpeningLeaveModel->get_row_data('employee_leaves',array('leave_id'=>$values,'type' => 'opening leave','employee_id' => @$empID));
                      $opening = $this->EmpOpeningLeaveModel->get_all_nos_opening($values,@$empID);
                      $credit = $this->EmpOpeningLeaveModel->get_all_nos_credit($values,@$empID);
                      $taken = $this->EmpOpeningLeaveModel->get_all_nos_taken($values,@$empID);
					  
                      $myObj['data'][$k]['leave'][$key]['leavetype'] =  $all_leave_type->rule_name;
					  $myObj['data'][$k]['leave'][$key]['open'] =  $opening;
					  $myObj['data'][$k]['leave'][$key]['credit'] =  $credit;
					  $myObj['data'][$k]['leave'][$key]['take'] =  $taken;
                     
                      } }
				
				$myObj['data'][$k]['name'] =  @$value->first_name.' '.@$value->last_name.' ('.@$value->employee_no.')';
				$myObj['data'][$k]['opening'] =  $totalopening;
				$myObj['data'][$k]['credited'] =  $totalcredit;
				$myObj['data'][$k]['taken'] =  $totaltaken;
				$myObj['data'][$k]['closing'] =  $totalopening + $totalcredit - $totaltaken;
				$myObj['data'][$k]['lop'] =  $totallop;
				
			}
		}
		//echo '<pre>';print_r($myObj);
       $this->data['data'] = json_encode($myObj);

//echo $myJSON;

		
        $view = $this->load->view('employee_opening_leave/admin/data',$this->data, TRUE);
        echo $view; exit();         
    }


    public function get_all_leaves() {
        //echo "<pre>"; print_r($_POST); die;
        $employee_details = $this->EmpOpeningLeaveModel->get_row_data('employee',array('id'=>$_POST['id']));
        $leave_details = $this->EmpOpeningLeaveModel->get_row_data('master_grade',array('id'=>@$employee_details->grade));
        $emp_leave = explode(',', @$leave_details->leave_rule_id);
        $all_leave_type = $this->EmpOpeningLeaveModel->get_result_data('master_leave_rules',array('is_active'=>'Y','delete_flag'=>'N'));

            $html = '<thead>
                <tr>
                    <th width="30%"> <label for="" class="form-control-label">Leave Type</label></th>
                    <th width="20%"><label for="" class="form-control-label">Opening Balance</label></th>
                    
                </tr>
                </thead>
                <tbody>
                    ';
                       if(!empty($all_leave_type))
                       {
                           foreach ($all_leave_type as $value) {
                              if(in_array($value->id, @$emp_leave)){
                       
                   $html .= '<tr>
                        <td><div class="form-group">
                         <input type="hidden"  value="'.$value->id.'" name="leave_id[]" id="leave_id">
                         <input type="text" placeholder="Enter Rule Name" readonly class="form-control" value="'. $value->rule_name.'" name="rulename[]" id="rulename"></div></td>
                        </div>
                        </td>
                        <td><div class="form-group"> <input type="text" placeholder="Enter opening balance" class="form-control" value="0" name="opening_balance[]" id="opening_balance"></div></td>
                       
                        </tr>';
                           }
                        }
                    }

            $html .= '</tbody>';

            echo $html; exit();
    }

    public function check_emp_opening() {
        //echo "<pre>"; print_r($_POST); die;
        $chk_opening = $this->EmpOpeningLeaveModel->get_row_data('employee_leaves',array('employee_id'=>$_POST['empVal'],'type'=>'opening leave'));

        if(!empty($chk_opening)){
            echo "Opening leaves allready exist."; exit();
        }else{
             echo "no"; exit();
        }


    }
	
			public function leavedata_details() {
			if(!empty($_POST['obj'])){
			   $html = '';
			   //$html = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
				foreach($_POST['obj'] as $data){
					$html .= '<tr>
						<td>'.$data['leavetype'].'</td>
						<td>"'.$data['open'].'</td>
						<td>'.$data['credit'].'</td>
						<td>'.$data['take'].'</td>
							</tr>';
				}
				//$html .='</table>';
				
			}

			echo $html; die;

			}

    

    
    



    
       

}
/* End of file admin.php */
/* Location: ./application/modules/employee_leave/controllers/admin.php */
