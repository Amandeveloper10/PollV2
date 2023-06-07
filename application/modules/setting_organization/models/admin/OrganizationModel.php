<?php
/**
 * setting_organization Model Class. Handles all the datatypes and methodes required for handling setting_organization
 */
class OrganizationModel extends CI_Model {

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
     * <p>This function Used for add/edit setting_organization</p>
     *
     * @access  public
     * @param   id
     * @return string
     */

     public function modify() {  
      //echo "<pre>"; print_r($_POST); die;

        $company_name = $this->input->post('company_name');
        $mailing_name = $this->input->post('mailing_name');
        $nick_name = $this->input->post('nick_name');

        $incorporation_date = date('Y-m-d',strtotime($this->input->post('incorporation_date')));
        $corporate_no = $this->input->post('corporate_no');
        $pan_no = $this->input->post('pan_no');
        $tan_no = $this->input->post('tan_no');
        $cit = $this->input->post('cit');
        $tan_circle = $this->input->post('tan_circle');
		
		$pf_apply = $this->input->post('pf_apply');
		if($pf_apply == '1'){
			$pf_no = $this->input->post('pf_no');
			$pf_reg_date = date('Y-m-d',strtotime($this->input->post('pf_reg_date')));
			$pf_rule_all_employee = $this->input->post('pf_rule_all_employee');
			$pf_rule_all_employee1 = $this->input->post('pf_rule_all_employee1');
			$pf_signatory_name = $this->input->post('pf_signatory_name');
			$pf_signatory_designation = $this->input->post('pf_signatory_designation');
			$pf_signatory_father_name = $this->input->post('pf_signatory_father_name');
			
			$datapf = array(
			'status' => 1);
			$this->db->where('id', '206')->update(tablename('admin_left_menu'), $datapf);
			
		}else{
			$pf_no = '';
			$pf_reg_date = '';
			$pf_rule_all_employee = '';
			$pf_rule_all_employee1 = '';
			$pf_signatory_name = '';
			$pf_signatory_designation ='';
			$pf_signatory_father_name = '';
			
			$datapf = array(
			'status' => 0);
			$this->db->where('id', '206')->update(tablename('admin_left_menu'), $datapf);
		}
        $esi_apply = $this->input->post('esi_apply');
		if($esi_apply == '1'){
			$esi_no = $this->input->post('esi_no');
			$esi_reg_date = date('Y-m-d',strtotime($this->input->post('esi_reg_date')));
			$esi_signatory_name = $this->input->post('esi_signatory_name');
			$esi_signatory_designation = $this->input->post('esi_signatory_designation');
			$esi_signatory_father_name = $this->input->post('esi_signatory_father_name');
			
			$dataesi = array(
			'status' => 1);
			$this->db->where('id', '216')->update(tablename('admin_left_menu'), $dataesi);
		}else{
			$esi_no = '';
			$esi_reg_date = '';
			$esi_signatory_name ='';
			$esi_signatory_designation ='';
			$esi_signatory_father_name ='';
			$dataesi = array(
			'status' => 0);
			$this->db->where('id', '216')->update(tablename('admin_left_menu'), $dataesi);
		}
		
		 $ptax_apply = $this->input->post('ptax_apply');
		if($ptax_apply == '1'){
			$p_tax_no = $this->input->post('p_tax_no');
			$p_tax_reg_date = date('Y-m-d',strtotime($this->input->post('p_tax_reg_date')));
			$p_tax_signatory_name = $this->input->post('p_tax_signatory_name');
			$other_details = $this->input->post('other_details');
			$dataptax = array(
			'status' => 1);
			$this->db->where('id', '204')->update(tablename('admin_left_menu'), $dataptax);
		}else{
			$p_tax_no = '';
			$p_tax_reg_date = '';
			$p_tax_signatory_name = '';
			$other_details = '';
			$dataptax = array(
			'status' => 0);
			$this->db->where('id', '204')->update(tablename('admin_left_menu'), $dataptax);
		}
       
        $gratuity_apply = $this->input->post('gratuity_apply');
		if($gratuity_apply == '1'){
			$datagratuity = array(
			'status' => 1);
			$this->db->where('id', '192')->update(tablename('admin_left_menu'), $datagratuity);
		}else{
			$datagratuity = array(
			'status' => 0);
			$this->db->where('id', '192')->update(tablename('admin_left_menu'), $datagratuity);
		}
	   
        $form16_signatory_name = $this->input->post('form16_signatory_name');
        $form16_signatory_designation = $this->input->post('form16_signatory_designation');
        $form16_signatory_pan = $this->input->post('form16_signatory_pan');
        $form16_apt_no = $this->input->post('form16_apt_no');
        $form16_building_name = $this->input->post('form16_building_name');
        $form16_country = $this->input->post('form16_country');
        $form16_city = $this->input->post('form16_city');
        $form16_state = $this->input->post('form16_state');
        $form16_zip = $this->input->post('form16_zip');
        $form16_telephone = $this->input->post('form16_telephone');
        $form16_mobile = $this->input->post('form16_mobile');
        $form16_email = $this->input->post('form16_email');

        $imagenew= $this->input->post('imagenew');
        $imageold= $this->input->post('imageold');


        $bank_name = $this->input->post('bank_name');
        $branch = $this->input->post('branch');
        $org_apt_no = $this->input->post('org_apt_no');
        $org_building_name = $this->input->post('org_building_name');
        $org_country = $this->input->post('org_country');
        $org_city = $this->input->post('org_city');
        $org_state = $this->input->post('org_state');
        $org_zip = $this->input->post('org_zip');
        $org_telephone = $this->input->post('org_telephone');
        $org_mobile = $this->input->post('org_mobile');
        $org_email = $this->input->post('org_email');
        $acc_type = $this->input->post('acc_type');
        $acc_no = $this->input->post('acc_no');
        $ifsc_code = $this->input->post('ifsc_code');

        $location_heading = $this->input->post('location_heading');
        $apt_no = $this->input->post('apt_no');
        $building_name = $this->input->post('building_name');
        $country = $this->input->post('country');
        $city = $this->input->post('city');
        $state = $this->input->post('state');
        $zip = $this->input->post('zip');
        $telephone = $this->input->post('telephone');
        $mobile = $this->input->post('mobile');
        $email = $this->input->post('email');

        if ($imagenew!='') {
            $image = $imagenew;
        }else {
            $image = $imageold;
        }

        $date = date("Y-m-d H:i:s");

       $data = array(
            'image' =>  $image,
            'parent_id' => '0',
            'company_name' =>  $company_name,
            'mailing_name' =>  $mailing_name,
            'nick_name' =>  $nick_name,
           /* 'apt_no' =>  $apt_no,
            'building_name' =>  $building_name,
            'country' =>  $country,
            'city' =>  $city,
            'state' =>  $state,
            'zip' =>  $zip,
            'telephone' =>  $telephone,
            'mobile' =>  $mobile,
            'email' =>  $email,*/
            'incorporation_date' =>  $incorporation_date,
            'corporate_no' =>  $corporate_no,
            'pan_no' =>  $pan_no,
            'tan_no' =>  $tan_no,
            'cit' =>  $cit,
            'tan_circle' =>  $tan_circle,
            'pf_no' =>  $pf_no,
            'pf_reg_date' =>  $pf_reg_date,
            'pf_rule_all_employee' =>  $pf_rule_all_employee1,
            'pf_signatory_name' =>  $pf_signatory_name,
            'pf_signatory_designation' =>  $pf_signatory_designation,
            'pf_signatory_father_name' =>  $pf_signatory_father_name,
            'esi_no' =>  $esi_no,
            'esi_reg_date' =>  $esi_reg_date,
            'esi_signatory_name' =>  $esi_signatory_name,
            'esi_signatory_designation' =>  $esi_signatory_designation,
            'esi_signatory_father_name' =>  $esi_signatory_father_name,
            'p_tax_no' =>  $p_tax_no,
            'p_tax_reg_date' =>  $p_tax_reg_date,
            'p_tax_signatory_name' =>  $p_tax_signatory_name,
            'other_details' =>  $other_details,
            'form16_signatory_name' =>  $form16_signatory_name,
            'form16_signatory_designation' =>  $form16_signatory_designation,
            'form16_signatory_pan' =>  $form16_signatory_pan,
            'form16_apt_no' =>  $form16_apt_no,
            'form16_building_name' =>  $form16_building_name,
            'form16_country' =>  $form16_country,
            'form16_city' =>  $form16_city,
            'form16_state' =>  $form16_state,
            'form16_zip' =>  $form16_zip,
            'form16_telephone' =>  $form16_telephone,
            'form16_mobile' =>  $form16_mobile,
            'form16_email' =>  $form16_email,
            'modified_date' => $date,
			'pf_apply' =>  $pf_apply,
            'esi_apply' =>  $esi_apply,
            'ptax_apply' =>  $ptax_apply,
            'gratuity_apply' => $gratuity_apply
        );
       //echo "<pre>"; print_r($data); die;
 
        $this->db->where('id', 1)->update(tablename('setting_organization'), $data);

        $databank = array(
                    'org_id' => 1,
                    'bank_name' => $bank_name,
                    'branch' => $branch,
                    'apt_no' => $org_apt_no,
                    'building_name' => $org_building_name,
                    'country' => $org_country,
                    'city' =>$org_city,
                    'state' => $org_state,
                    'zip' => $org_zip,
                    'telephone' => $org_telephone,
                    'mobile' => $org_mobile,
                    'email' => $org_email,
                    'acc_type' => $acc_type,
                    'acc_no' => $acc_no,
                    'ifsc_code' => $ifsc_code,
                    'modified_date' => $date
                );
           
        $this->db->where('org_id', 1)->update(tablename('setting_organization_bank_details'), $databank);

        $datalocation = array(
                    'org_id' => 1,
                    'location_heading' => $location_heading,
                    'apt_no' => $apt_no,
                    'building_name' => $building_name,
                    'country' => $country,
                    'city' =>$city,
                    'state' => $state,
                    'zip' => $zip,
                    'telephone' => $telephone,
                    'mobile' => $mobile,
                    'email' => $email,
                    'modified_date' => $date
                );
           
        $this->db->where('org_id', 1)->update(tablename('setting_org_location'), $datalocation);
        $this->session->set_flashdata('successmessage', 'Organization modified successfully');
        redirect(base_url('page/36/1'));
        
    }



    /**
     * Used for get setting_organization by id
     *
     * <p>Description</p>
     *
     * <p>This function get setting_organization by id from table [Table: setting_organization]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_single_data($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('setting_organization'));
        $this->db->where('id', $id);
        $this->db->where('parent_id', '0');
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {           
            return $result;
        } else {
            return array();
        }
    }

    public function load_single_data_location() {
        $this->db->select('*');
        $this->db->from(tablename('setting_org_location'));
        $this->db->where('org_id', 1);
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {           
            return $result;
        } else {
            return array();
        }
    }

    public function load_single_data_bank() {
        $this->db->select('*');
        $this->db->from(tablename('setting_organization_bank_details'));
        $this->db->where('org_id', 1);
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {           
            return $result;
        } else {
            return array();
        }
    }
 
}
/* End of file OrganizationModel.php */
/* Location: ./application/modules/setting_organization/models/admin/OrganizationModel.php */