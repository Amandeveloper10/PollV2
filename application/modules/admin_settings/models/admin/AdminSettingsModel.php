<?php
/**
 * admin_settings Model Class. Handles all the datatypes and methodes required for handling admin_settings
 */
class AdminSettingsModel extends CI_Model {

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
     * Used for loading functionality of admin_settings for an admin
     *
     * <p>Description</p>
     *
     * <p>This function loads all the admin_settings that has been added by current admin [Table: admin_settings]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_all_data() {
        $this->db->select('t1.*');
        $this->db->from(tablename('admin') . ' as t1');
        $this->db->where('t1.delete_flag', 'N'); 
       // $this->db->where('t1.id !=', '1');
        $query = $this->db->get();
        $result = $query->result();
        //echo $this->db->last_query() ; die;
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



  /**
     * Used for add/edit rows from a table
     *
     * <p>Description</p>
     *
     * <p>This function Used for add/edit admin_settings</p>
     *
     * @access  public
     * @param   id
     * @return string
     */

     public function modify($id) {  
      //echo "<pre>"; print_r($_POST); die;

         
          $menu_array = $this->input->post('menu_id');
//print_r($menu_array); die;		  
        $array =  explode(",", $menu_array[0]);
       // echo " 1 <pre>";
       // print_r($menu_array);
        foreach ($array as $array_key => $array_item) {
          if ($array_item == 0) {
            unset($array[$array_key]);
          }
        }
       // echo " 2 <pre>";
       // print_r($array);exit;
        $menu_1 = implode(',', $array);
		$a = array();
		foreach($array as $key => $value){
			$mainactiveMenu = $this->AdminSettingsModel->get_row_data('admin_left_menu',array('id'=>$value,'status'=>'1'));
			if($mainactiveMenu->main_menu_id != '0'){
				array_push($a,$mainactiveMenu->main_menu_id);
			}
			
		}
		//print_r(array_unique($a)); die;
		$menu_2 = implode(',', array_unique($a));
		
			$menus =  $menu_1.','.$menu_2;
			if($menus == ','){
				$menu = '188';
			}else{
				$menu = substr_replace($menus ,"", -1);
			}
		
        
		
		//echo  $menu; die;
        $first_name= $this->input->post('first_name');
        $family_name= $this->input->post('family_name');
        //$position= $this->input->post('position');
        $email= $this->input->post('email');
        //$security_level= $this->input->post('security_level');
        //$department_id= $this->input->post('department_id');
        $password= $this->input->post('password');

        $imagenew= $this->input->post('imagenew');
        $imageold= $this->input->post('imageold');
        if ($imagenew!='') {
            $image = $imagenew;
        }else {
            $image = $imageold;
        }


        $date = date("Y-m-d H:i:s");

        if (!empty($id)) {
                $data = array(
                    'name' => $first_name,
                    'family_name' => $family_name,
                    //'position' => $position,
                    'emailid' => $email,
                    'menu' => $menu,
                    //'security_level' => $security_level,
                    //'department_id' => $department_id,
                   // 'password' => md5($password),
                    'image' => $image,
                    'modified_date' => $date
                );
                
                if(!empty($password))
                {
                 $data['password']=   md5($password);
                }
           
            $this->db->where('id', $id)->update(tablename('admin'), $data);
            $this->session->set_flashdata('successmessage', 'Admin modified successfully');
            redirect(base_url('page/42/1'));
        } else {
         
                $data = array(
                    'name' => $first_name,
                    'family_name' => $family_name,
                   // 'position' => $position,
                    'emailid' => $email,
                    'menu' => $menu,
                    //'security_level' => $security_level,
                    //'department_id' => $department_id,
                    'password' => md5($password),
                    'image' => $image,
                    'entry_date' => $date
                );
				
				echo '<pre>'; print_r($data); die;
            
            $this->db->insert(tablename('admin'), $data);
            
             $this->session->set_flashdata('successmessage', 'Admin added successfully');
            redirect(base_url('page/42/1'));
        }
    }



    /**
     * Used for get admin_settings by id
     *
     * <p>Description</p>
     *
     * <p>This function get admin_settings by id from table [Table: admin_settings]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_single_data($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('admin'));
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {           
            return $result;
        } else {
            return array();
        }
    }
    
    public function getallparentmenu() {

        $sql = "select * from HR_admin_left_menu where status='1' and main_menu_id='0' order by orderNo";
        $query = $this->db->query($sql);
        $row = $query->result();
        if (!empty($row)) {
            return $row;
        } else {
            return '';
        }
    }
    
    public function getallsubMenu($id=NULL) {


        $sql = "select * from HR_admin_left_menu where status='1' and main_menu_id='$id' order by orderNo";

        $query = $this->db->query($sql);
        $row = $query->result();
        //echo $this->db->last_query();exit;
        if (!empty($row)) {
            return $row;
        } else {
            return '';
        }
    }
	
	  public function status_change($id) {
        $this->db->select('*');
        $this->db->from(tablename('admin'));
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
            if ($this->db->update('admin', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'candidate Status changed successfully');
            redirect(base_url('page/42/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/42/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'candidate not matched');
            redirect(base_url('page/42/1'));
        }
    }


	  public function delete_this($id) {
        $this->db->select('*');
        $this->db->from(tablename('admin'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result)) {            
            $update_faq = array('is_active' => 'N','delete_flag'=> 'Y');
            $this->db->where('id', $id);
            if ($this->db->update('admin', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'candidate Deleted successfully');
            redirect(base_url('page/42/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/42/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'candidate not matched');
            redirect(base_url('page/42/1'));
        }
    }
}
/* End of file AdminSettingsModel.php */
/* Location: ./application/modules/admin_settings/models/admin/AdminSettingsModel.php */