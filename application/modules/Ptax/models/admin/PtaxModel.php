<?php
/**
 * p_tax Model Class. Handles all the datatypes and methodes required for handling p_tax
 */
class PtaxModel extends CI_Model {

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
     * Used for loading functionality of p_tax for an admin
     *
     * <p>Description</p>
     *
     * <p>This function loads all the p_tax that has been added by current admin [Table: p_tax]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_all_data() {
        $this->db->select('t1.*');
        $this->db->from(tablename('p_tax') . ' as t1');
        $this->db->where('t1.delete_flag', 'N');
        $this->db->group_by('p_tax_no'); 
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


    public function get_state(){
        $query = $this->db->where('is_selected','N')->where('is_active','Y')->where('delete_flag','N')->group_by('name')->get('cities')->result();
        return $query;
    }



  /**
     * Used for add/edit rows from a table
     *
     * <p>Description</p>
     *
     * <p>This function Used for add/edit p_tax</p>
     *
     * @access  public
     * @param   id
     * @return string
     */

     public function modify($id) {  
      //echo "<pre>"; print_r($id); die;
	  $ptax_id = $this->input->post('ptax_id');
       // echo "<pre>"; echo $ptax_id; die;
        $ptax_field_no = $this->input->post('ptax_field_no');
        //echo $ptax_field_no; die; //exit;
         $p_tax_no = $this->input->post('p_tax_no');
         $state = $this->input->post('state');
       //exit;
        

        for ($i=0; $i < $ptax_field_no ; $i++) { 
            //echo '<pre>'; print_r($this->input->post());exit;
            //echo $i;
       
        $amount_to = $this->input->post('amount_to_'.$i);
        //echo $amount_to;//exit;
        $amount_from = $this->input->post('amount_from_'.$i);
        $p_tax = $this->input->post('p_tax_'.$i);
        $id = $this->input->post('id_'.$i);

        $date = date("Y-m-d H:i:s");

        if (!empty($id)) {
			//$this->db->delete('HR_p_tax', array('p_tax_no' => $ptax_id));
			//$this->db->last_query(); die;
                $data = array(
                    'amount_to' => $amount_to,
                    'amount_from' => $amount_from,
                    'p_tax' => $p_tax,
                    'state' => $state,
                    'p_tax_no' => $p_tax_no
                   
                );
				
				//echo '<pre>'; print_r($data);
           //$this->db->insert(tablename('p_tax'), $data);
            $this->db->where('id', $id)->update(tablename('p_tax'), $data);
            //$this->session->set_flashdata('successmessage', 'P-tax Details modified successfully');
            //redirect(base_url('page/75/1'));
        } else {
         
                $data = array(
                    'amount_to' => $amount_to,
                    'amount_from' => $amount_from,
                    'p_tax' => $p_tax,
                    'state' => $state,
                    'p_tax_no' => $p_tax_no
                );
            
            $this->db->insert(tablename('p_tax'), $data);
            //$this->db->where('name', $state)->update(tablename('cities'), array('is_selected'=>'Y'));
             //$this->session->set_flashdata('successmessage', 'P-tax Details added successfully');
            //redirect(base_url('page/75/1'));
        }
       // }
        }
		//die;
        $this->session->set_flashdata('successmessage', 'P-tax Details added successfully');
        //exit;
        redirect(base_url('page/75/1'));
    }



    /**
     * Used for get p_tax by id
     *
     * <p>Description</p>
     *
     * <p>This function get p_tax by id from table [Table: p_tax]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_single_data($id = "") {
        //echo $id;
        $this->db->select('*');
        $this->db->from(tablename('p_tax'));
        $this->db->where('p_tax_no', $id);
        $query = $this->db->get();
        
        $result = $query->row();
        //echo '<pre>'; print_r($result);exit;
        if (!empty($result)) {           
            return $result;
        } else {
            return array();
        }
    }
 /**
     * Used for status p_tax
     *
     * <p>Description</p>
     *
     * <p>This function status p_tax [Table: p_tax]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function status_change($id) {

        $this->db->select('*');
        $this->db->from(tablename('p_tax'));
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
            $this->db->where('p_tax_no', $result->p_tax_no);
            if ($this->db->update('p_tax', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'Organization Bank Details Status changed successfully');
            redirect(base_url('page/75/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/75/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Organization Bank Details not matched');
            redirect(base_url('page/75/1'));
        }
    }

    /**
     * Used for delete p_tax
     *
     * <p>Description</p>
     *
     * <p>This function delete p_tax [Table: p_tax]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function delete_this($id) {
        $this->db->select('*');
        $this->db->from(tablename('p_tax'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
        //print_r($result); die;
        if (!empty($result)) {            
            $update_faq = array('is_active' => 'N','delete_flag'=> 'Y');
            $this->db->where('p_tax_no', $result->p_tax_no);
            if ($this->db->update('p_tax', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'Organization Bank Details Deleted successfully');
            redirect(base_url('page/75/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/75/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Organization Bank Details not matched');
            redirect(base_url('page/75/1'));
        }
    }
      public function check_state($state = "",$id = "") {
        $this->db->select('t1.*'); 
        $this->db->from(tablename('p_tax') . ' as t1');
        $this->db->where('t1.delete_flag', 'N');
        $this->db->where('t1.is_active', 'Y');
        $this->db->where('t1.state', $state);
        $this->db->where('t1.id<>', $id);
        $query = $this->db->get();
        $result = $query->row();
       // echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
 
}
/* End of file SetOrgBankModel.php */
/* Location: ./application/modules/p_tax/models/admin/SetOrgBankModel.php */