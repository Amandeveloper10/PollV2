<?php
/**
 * setting_location Model Class. Handles all the datatypes and methodes required for handling setting_location
 */
class LocationModel extends CI_Model {

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
     * Used for loading functionality of setting_location for an admin
     *
     * <p>Description</p>
     *
     * <p>This function loads all the setting_location that has been added by current admin [Table: setting_org_location]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_all_data() {
        $this->db->select('t1.*,t2.bank_name,t2.branch,t2.acc_no,t2.ifsc_code,t3.location_heading,t3.building_name as buildingName,t3.apt_no as aptNo,t3.country as Country,t3.state as State,t3.city as City,t3.zip as Zip');
        $this->db->from(tablename('setting_organization') . ' as t1');
        $this->db->join('setting_organization_bank_details as t2', 't1.id = t2.org_id', 'left');
        $this->db->join('setting_org_location as t3', 't1.id = t3.org_id', 'left');

        $this->db->where('t1.delete_flag', 'N'); 
         $this->db->where('t1.parent_id !=', '0'); 
        $query = $this->db->get();
        $result = $query->result();
        //echo $this->db->last_query() ; die;
        //echo "<pre>";print_r($result);exit;

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



  /**
     * Used for add/edit rows from a table
     *
     * <p>Description</p>
     *
     * <p>This function Used for add/edit setting_location</p>
     *
     * @access  public
     * @param   id
     * @return string
     */

     public function modify($id) {  
      //echo "<pre>"; print_r($_POST); die;

        $company_name = $this->input->post('company_name');
        $mailing_name = $this->input->post('mailing_name');
        $nick_name = $this->input->post('nick_name');

        $incorporation_date = $this->input->post('incorporation_date');
        $corporate_no = $this->input->post('corporate_no');
        $pan_no = $this->input->post('pan_no');
        $tan_no = $this->input->post('tan_no');
        $cit = $this->input->post('cit');
        $tan_circle = $this->input->post('tan_circle');
		
        $pf_apply = $this->input->post('pf_apply');
		if($pf_apply == '1'){
			$pf_no = $this->input->post('pf_no');
			$pf_reg_date = $this->input->post('pf_reg_date');
			$pf_rule_all_employee = $this->input->post('pf_rule_all_employee');
			$pf_rule_all_employee1 = $this->input->post('pf_rule_all_employee1');
			$pf_signatory_name = $this->input->post('pf_signatory_name');
			$pf_signatory_designation = $this->input->post('pf_signatory_designation');
			$pf_signatory_father_name = $this->input->post('pf_signatory_father_name');
		}else{
			$pf_no = '';
			$pf_reg_date = '';
			$pf_rule_all_employee = '';
			$pf_rule_all_employee1 = '';
			$pf_signatory_name = '';
			$pf_signatory_designation ='';
			$pf_signatory_father_name = '';
		}
        $esi_apply = $this->input->post('esi_apply');
		if($esi_apply == '1'){
			$esi_no = $this->input->post('esi_no');
			$esi_reg_date = $this->input->post('esi_reg_date');
			$esi_signatory_name = $this->input->post('esi_signatory_name');
			$esi_signatory_designation = $this->input->post('esi_signatory_designation');
			$esi_signatory_father_name = $this->input->post('esi_signatory_father_name');
		}else{
			$esi_no = '';
			$esi_reg_date = '';
			$esi_signatory_name ='';
			$esi_signatory_designation ='';
			$esi_signatory_father_name ='';
		}
		
		 $ptax_apply = $this->input->post('ptax_apply');
		if($ptax_apply == '1'){
			$p_tax_no = $this->input->post('p_tax_no');
			$p_tax_reg_date = $this->input->post('p_tax_reg_date');
			$p_tax_signatory_name = $this->input->post('p_tax_signatory_name');
			$other_details = $this->input->post('other_details');
		}else{
			$p_tax_no = '';
			$p_tax_reg_date = '';
			$p_tax_signatory_name = '';
			$other_details = '';
		}
       
        $gratuity_apply = $this->input->post('gratuity_apply');
		
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
        


        if (!empty($id)) {
               $data = array(
            'image' =>  $image,
            'parent_id' => '1',
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
            $this->db->where('id', $id)->update(tablename('setting_organization'), $data);

            $databank = array(
                    'org_id' => $id,
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
            $this->db->where('org_id', $id)->update(tablename('setting_organization_bank_details'), $databank);
           $datalocation = array(
               'org_id' => $id,
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
          
             $this->db->where('org_id', $id)->update(tablename('setting_org_location'), $datalocation);

            $this->session->set_flashdata('successmessage', 'Location modified successfully');
            redirect(base_url('page/38/1'));
        } else {
         
                $data = array(
            'image' =>  $image,
            'parent_id' => '1',
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
        $this->db->insert(tablename('setting_organization'), $data);
        $insert_id = $this->db->insert_id();
       $databank = array(
                    'org_id' => $insert_id,
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
           $this->db->insert(tablename('setting_organization_bank_details'), $databank);

            $datalocation = array(
               'org_id' => $insert_id,
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
            $this->db->insert(tablename('setting_org_location'), $datalocation);
            
           

            
             $this->session->set_flashdata('successmessage', 'Location added successfully');
            redirect(base_url('page/38/1'));
        }
    }



    /**
     * Used for get setting_location by id
     *
     * <p>Description</p>
     *
     * <p>This function get setting_location by id from table [Table: setting_org_location]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_single_data($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('setting_organization'));
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {           
            return $result;
        } else {
            return array();
        }
    }

    public function load_single_data_bank($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('setting_organization_bank_details'));
        $this->db->where('org_id', $id);
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {           
            return $result;
        } else {
            return array();
        }
    }

     public function load_single_data_location($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('setting_org_location'));
        $this->db->where('org_id', $id);
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {           
            return $result;
        } else {
            return array();
        }
    }

    /**
     * Used for get org location by id
     *
     * <p>Description</p>
     *
     * <p>This function get org location by id from table [Table: setting_org_location]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function check_location($location = "") {
        $this->db->select('*');
        $this->db->from(tablename('setting_org_location'));
        $this->db->where('location_type', $location);
        $query = $this->db->get();
        $result = $query->result();

        if (!empty($result)) {           
            return $result;
        } else {
            return array();
        }
    }

 /**
     * Used for status setting_location
     *
     * <p>Description</p>
     *
     * <p>This function status setting_location [Table: setting_org_location]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function status_change($id) {
        $this->db->select('*');
        $this->db->from(tablename('setting_org_location'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');

        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {
            $is_active = $result->is_active;

            if ($is_active == "N") {
                $new_is_active = "Y";
            } else {
                $new_is_active = "N";
            }
            $update_faq = array('is_active' => $new_is_active);
            $this->db->where('id', $id);
            if ($this->db->update('setting_org_location', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'Location Status changed successfully');
            redirect(base_url('page/38/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/38/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Location not matched');
            redirect(base_url('page/38/1'));
        }
    }

    /**
     * Used for delete setting_location
     *
     * <p>Description</p>
     *
     * <p>This function delete setting_location [Table: setting_org_location]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function delete_this($id) {
		//echo $id; die;
        $this->db->select('*');
        $this->db->from(tablename('setting_organization'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
		
        if (!empty($result)) {            
            $update_faq = array('is_active' => 'N','delete_flag'=> 'Y');
            $this->db->where('id', $id);
            if ($this->db->update('setting_organization', $update_faq)) {
				$this->db->delete('HR_setting_organization_bank_details', array('org_id' => $id));
				$this->db->delete('HR_setting_org_location', array('org_id' => $id));
				
            $this->session->set_flashdata('successmessage', 'Location Deleted successfully');
            redirect(base_url('page/38/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/38/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Location not matched');
            redirect(base_url('page/38/1'));
        }
    }
 
}
/* End of file LocationModel.php */
/* Location: ./application/modules/setting_location/models/admin/LocationModel.php */