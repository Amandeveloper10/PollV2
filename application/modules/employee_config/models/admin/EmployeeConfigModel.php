<?php
/**
 * employee_config Model Class. Handles all the datatypes and methodes required for handling employee_config
 */
class EmployeeConfigModel extends CI_Model {

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
     * <p>This function Used for add/edit employee_config</p>
     *
     * @access  public
     * @param   id
     * @return string
     */

     public function modify() {  
      //echo "<pre>"; print_r($_POST); die;

        $auto = $this->input->post('auto1');
        $prefix = $this->input->post('prefix');
        $no = $this->input->post('no');
        $suffix = $this->input->post('suffix');
        $cal_basic_salary = $this->input->post('cal_basic_salary');
        $min_basic_salary = $this->input->post('min_basic_salary');
        $basic_per_ctc = $this->input->post('basic_per_ctc');
        $payslip_format = $this->input->post('payslip_format');
        $max_res_holiday = $this->input->post('max_res_holiday');
        $base_day = $this->input->post('base_day');
        $cut_off_day = $this->input->post('cut_off_day');
        $cut_off_rule_start = $this->input->post('cut_off_rule_start');

        $date = date("Y-m-d H:i:s");

       $data = array(
            'auto' => $auto,
            'prefix' => $prefix,
            'no' => $no,
            'suffix' => $suffix,
            'cal_basic_salary' => $cal_basic_salary,
            'min_basic_salary' => $min_basic_salary,
            'basic_per_ctc' => $basic_per_ctc,
            'payslip_format' => $payslip_format,
            'max_res_holiday' => $max_res_holiday,
            'base_day' => $base_day,
            'cut_off_day' => $cut_off_day,
            'cut_off_rule_start' => $cut_off_rule_start,
            'modified_date' => $date
        );
       //echo "<pre>"; print_r($data); die;
   
        $this->db->where('id', 1)->update(tablename('maste_employee_system_config'), $data);
        $this->session->set_flashdata('successmessage', 'System Config modified successfully');
        redirect(base_url('page/26/1'));
        
    }



    /**
     * Used for get employee_config by id
     *
     * <p>Description</p>
     *
     * <p>This function get employee_config by id from table [Table: employee_config]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_single_data($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('maste_employee_system_config'));
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
/* End of file EmployeeConfigModel.php */
/* Location: ./application/modules/employee_config/models/admin/EmployeeConfigModel.php */