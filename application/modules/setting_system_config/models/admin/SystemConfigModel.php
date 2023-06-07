<?php
/**
 * setting_system_config Model Class. Handles all the datatypes and methodes required for handling setting_system_config
 */
class SystemConfigModel extends CI_Model {

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



  /**
     * Used for add/edit rows from a table
     *
     * <p>Description</p>
     *
     * <p>This function Used for add/edit setting_system_config</p>
     *
     * @access  public
     * @param   id
     * @return string
     */

     public function modify() {  
     // echo "<pre>"; print_r($_POST); die;

        $default_currency = $this->input->post('default_currency');
        $default_currency_symbol = $this->input->post('default_currency_symbol');
        $currency_position = $this->input->post('currency_position');
        $date_format = $this->input->post('date_format');
        $timezone = $this->input->post('timezone');
        $financial_year_start_month = $this->input->post('financial_year_start_month');

        $based_on_days = $this->input->post('based_on_days');
        $day_of_processing = $this->input->post('day_of_processing');

        $pay_frequency = $this->input->post('pay_frequency');
        $based_on = $this->input->post('based_on');
        $working_days = $this->input->post('working_days');

        $salarycycle = $this->input->post('salarycycle');
        $cut_of_day = $this->input->post('cut_of_day');
        $Loan1= $this->input->post('Loan1'); 

        $date = date("Y-m-d H:i:s");
		
		if($date_format == 'Y-m-d'){
			$jquery_date_format = 'YYYY-M-DD';
		}elseif($date_format == 'd-m-Y'){
			$jquery_date_format = 'DD-M-YYYY';
		}elseif($date_format == 'm-d-Y'){
			$jquery_date_format = 'M-DD-YYYY';
		}

       $data = array(
            'default_currency' =>  $default_currency,
            'default_currency_symbol' =>  $default_currency_symbol,
            'currency_position' =>  $currency_position,
            'date_format' =>  $date_format,
			'jquery_date_format' => $jquery_date_format,
            'timezone' =>  $timezone,
            'financial_year_start_month' =>  $financial_year_start_month,
            'salary_cycle' => $salary_cycle,
            //'day_of_processing' =>  $day_of_processing,
            'pay_frequency' =>  $pay_frequency,
           // 'based_on' =>  $based_on,
            'loan' => $Loan1,
            'modified_date' => $date
        );
       if($based_on_days == 'fixed_day'){
        $data['based_on_days']= $based_on_days;
        $data['day_of_processing']= $day_of_processing;
       }else{
        $data['based_on_days']= $based_on_days;
        $data['day_of_processing']= '';
       }

        if($based_on == 'organisation_working_days'){
        $data['based_on']= $based_on;
        $data['working_days']= $working_days;
       }else{
        $data['based_on']= $based_on;
        $data['working_days']= '';
       }


        if($salarycycle == 'fixedday'){
        $data['salary_cycle']= $salarycycle;
        $data['cut_of_day']= $cut_of_day;
        }else{
        $data['salary_cycle']= $salarycycle;
        $data['cut_of_day']= '';
        }

        if(!empty($Loan1)){
            if($Loan1 == 'Yes'){
            $data_loan = array(
            'status' =>'1',
            );
            
            }else{
            $data_loan = array(
            'status' =>'0',
            );
            }
            $this->db->where('id', '217');
            $this->db->update('HR_admin_left_menu', $data_loan); 
        }

       //echo "<pre>"; print_r($data); die;
   
        $this->db->where('id', 1)->update(tablename('setting_system_config'), $data);
        $this->session->set_flashdata('successmessage', 'System Config modified successfully');
        redirect(base_url('page/39/1'));
        
    }



    /**
     * Used for get setting_system_config by id
     *
     * <p>Description</p>
     *
     * <p>This function get setting_system_config by id from table [Table: setting_system_config]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_single_data($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('setting_system_config'));
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {           
            return $result;
        } else {
            return array();
        }
    }
 
}
/* End of file SystemConfigModel.php */
/* Location: ./application/modules/setting_system_config/models/admin/SystemConfigModel.php */