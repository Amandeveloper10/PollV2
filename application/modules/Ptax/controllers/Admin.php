<?php

/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class for Ptax [HMVC]. Handles all the datatypes and methodes required
 * for Ptax section of future
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
        $this->load->model('admin/PtaxModel');
    }

    /**
     * Index Page for this Ptax controller.
     *
     * @access  public
     * @param   $id = is used to check index is load after add/edit or directly
     * @return  string
     */
    public function index($id=NULL) {
        $all_data = $this->PtaxModel->load_all_data();
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
       // echo "<pre>"; print_r($all_data); //die;
        if($id){
            $this->load->view('Ptax/admin/list',$this->data);
        }else{
            $this->middle = 'Ptax/admin/list';
        $this->layout();
        }
    }

    /**
     * add/edit save for this Ptax controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */

     public function form($id = NULL) {        
        if (isset($_POST['submit'])) {
        //echo "<pre>"; print_r($_POST);  die;  

        $flg = $this->PtaxModel->modify($id);            
        }        
    }


    /**
     * edit Page load for this Ptax controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */
    public function get_form() {
        $this->data = array();
        // echo "<pre>"; print_r($_POST); die;
        $p_tax_no = $_POST['p_tax_no'];  
        //echo 1; exit;
        if (!empty($p_tax_no)) {
            $this->data['data_single'] = $this->PtaxModel->load_single_data($p_tax_no);
            $this->data['p_tax_no'] = $p_tax_no;  
            $num_of_rows=$this->db->SELECT('*')->where('p_tax_no',$p_tax_no)->where('delete_flag','N')->where('is_active','Y')->get('p_tax')->num_rows();
            //echo '<pre>'; print_r($num_of_rows); die;


            //collecting multiple field datas


            $this->data['field_data']=$this->db->SELECT('*')->where('p_tax_no',$p_tax_no)->where('delete_flag','N')->where('is_active','Y')->get('p_tax')->result();

            $this->data['num_rows']=$num_of_rows;

            $i=0;
            $fields = array();
            foreach ($this->data['field_data'] as $no => $value) {
                // echo 'amount from :'.$value->amount_from.'<br>';
                // echo 'amount to :'.$value->amount_to.'<br>';
                
                // echo 'p tax amount :'.$value->p_tax.'<br>';
                // echo $i++.'<br>';
                $this->data['fields'][$no]=$this->div_edit_ptax_field($value->id,$value->amount_from,$value->amount_to,$value->p_tax,$i++);
            }
            //exit;
            //echo $num_of_rows;exit;
            //for ($i=0; $i < $num_of_rows; $i++) { 
                //div_add_ptax_field();
            //}
            
            
        }  
        $this->data['state']=$this->PtaxModel->get_state();

        //echo "<pre>"; print_r($this->data); die;

        $view = $this->load->view('Ptax/admin/form',$this->data, TRUE);
        echo $view; exit();         
    }


     /**
     * DIV Column Add Ptax controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

     function div_add_ptax_field(){
        
        $field_no=$_POST['field_no'];
        //echo $field_no; exit;
        //$successive_ammount_from = $_POST['successive_ammount_from'];
        $successive_ammount_to = $_POST['successive_ammount_to'];

        $successive_ammount_from = $successive_ammount_to + 1;
        $successive_ammount_to = $successive_ammount_to + 10000; 
        //$successive_ammount_from = $successive_ammount_to - 999;

        //echo $id; exit();
        $state=$this->PtaxModel->get_state();
        $div="";
        //echo '<pre>'; print_r($state); exit;

        // $div .='<div class="row">



        //    <div class="col-sm-6 col-xl-4" id="option_state_'.$field_no.'">
        //       <div class="form-group">                              
        //           <div class="form-group">
        //                 <label for="" class="form-control-label">State</label>
        //                  <select name="state_'.$field_no.'" id="state_'.$field_no.'" class="form-control " >
        //                     <option value="">Please select</option>';

        //                     foreach($state as $value) {
                              

        //             $div.=   '<option value="'. $value->name.'" >'.$value->name .' </option>';

        //                     }
                            

        //            $div .=                 '</select> 
        //                         </div>
        //                   </div>        
        //               </div>

        //               </div>';


        $div .='<div id="p_tax_row'.$field_no.'">
                    <div class="row">

                     <div class="col-sm-6 col-xl-4" id="div_amount_from_'.$field_no.'">
                          <div class="form-group">  
                                                      
                              <input placeholder="Start Range" type="text" class="form-control" id="amount_from_'.$field_no.'"  name="amount_from_'.$field_no.'" value="'.$successive_ammount_from.'" readonly>
                          </div>
                    </div> 





                      <div class="col-sm-6 col-xl-4" id="div_amount_to_'.$field_no.'">
                          <div class="form-group">  
                                                     
                              <input placeholder="End Range" type="text" required class="form-control" id="amount_to_'.$field_no.'"  name="amount_to_'.$field_no.'" value="'.$successive_ammount_to.'">
                          </div>        
                      </div>
                        

                      <div class="col-sm-6 col-xl-3" id="div_p_tax_'.$field_no.'">
                          <div class="form-group"> 
                                                      
                              <input placeholder="Ptax" type="text" required class="form-control" id="p_tax_'.$field_no.'"  name="p_tax_'.$field_no.'" value="">
                          </div>        
                      </div>


                      <div class="col-sm-6 col-xl-1 text-right">
                      <button type="button" name="delete" onclick="remove_ptax_field('.$field_no.');" class="btn btn-danger" ><span  title="Delete" class="la la-trash icon text-danger" aria-hidden="false" ></span></button>  
                        </div>

                         </div>
        </div>';

        echo $div; exit();
     }


     function div_edit_ptax_field($id,$amount_from,$amount_to,$p_tax,$field_no){
        // if($field_no==''){
        //$field_no=$_POST['field_no'];
        // }

        // echo 'amount_from: '.$amount_from.'<br>';
        // echo 'amount to: '.$amount_to.'<br>';
        // echo 'ptax amount: '.$p_tax.'<br>';
        // echo 'field no: '.$field_no.'<br>';
        //echo $id; exit();
        //$state=$this->PtaxModel->get_state();
        $div="";


        // $div .='<div class="row">



        //    <div class="col-sm-6 col-xl-4" id="option_state_'.$field_no.'">
        //       <div class="form-group">                              
        //           <div class="form-group">
        //                 <label for="" class="form-control-label">State</label>
        //                  <select name="state_'.$field_no.'" id="state_'.$field_no.'" class="form-control " >
        //                     <option value="">Please select</option>';

        //                     foreach($state as $value) {
                              

        //             $div.=   '<option value="'. $value->name.'" >'.$value->name .' </option>';

        //                     }
                            

        //            $div .=                 '</select> 
        //                         </div>
        //                   </div>        
        //               </div>

        //               </div>';


        $div .='
                    
                    <div class="row"  id="p_tax_row'.$field_no.'">
                    <input type="hidden" name="id_'.$field_no.'" value="'.$id.'" >
                     <div class="col-sm-6 col-xl-4" id="div_amount_from_'.$field_no.'">
                          <div class="form-group">                
                              <input placeholder="Start Range" type="text" class="form-control" id="amount_from_'.$field_no.'"  name="amount_from_'.$field_no.'" value="'.$amount_from.'">
                          </div>
                    </div> 





                      <div class="col-sm-6 col-xl-4" id="div_amount_to_'.$field_no.'">
                          <div class="form-group">  
                                                     
                              <input placeholder="End Range" type="text" class="form-control" id="amount_to_'.$field_no.'"  name="amount_to_'.$field_no.'" value="'.$amount_to.'">
                          </div>        
                      </div>
                        

                      <div class="col-sm-6 col-xl-3" id="div_p_tax_'.$field_no.'">
                          <div class="form-group"> 
                                                      
                              <input placeholder="Ptax" type="text" class="form-control" id="p_tax_'.$field_no.'"  name="p_tax_'.$field_no.'" value="'.$p_tax.'">
                          </div>        
                      </div>


                      <div class="col-sm-6 col-xl-1 text-right">
                      <button type="button" name="delete" onclick="remove_ptax_field('.$field_no.');" class="btn btn-danger" ><span  title="Delete" class="la la-trash icon text-danger" aria-hidden="false" ></span></button>  
                        </div>

                         </div>';
        return $div;
        //echo $div; 
     }






    /**
     * status Ptax controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function status($id) {
        $this->PtaxModel->status_change($id);
    }


    /**
     * delete membership controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function delete($id) {
        $this->PtaxModel->delete_this($id);
    }

     public function check_state() {
      // print_r($_POST); die;
        $state = $_POST['state'];  
        $id = $_POST['id'];


        if(empty($id)){
            $check_state = $this->PtaxModel->get_row_data('p_tax',array('state'=>$state,'delete_flag'=>'N','is_active'=>'Y'));
        }else{
            $check_state = $this->PtaxModel->check_state($grade,$id);
        }


        if(!empty($check_state)){
            echo 'This State is already exist.';
        }else{
            echo 'done';
        }

        exit();         
    }
}
/* End of file admin.php */
/* Location: ./application/modules/Ptax/controllers/admin.php */
