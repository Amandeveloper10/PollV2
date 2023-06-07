<?php
/**
 * No direct access
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * MY_Controller Class. Handles all the Layout management for Front section of drinkdrop
 *
 * @author  <developer.wiz01@sketchwebsolutions.com>
 * @access   public
 * @link    http://example.com
 * @since   Version 0.0.1
 */
class MY_Controller extends CI_Controller {

    var $template = array();
    var $data = array();
    
    /**
     * The admin layout loader method of this class.
     *
     * @access  public
     * @param   none
     * @return  Loads all the layouts as defined
     */
    public function layout() {
        $this->template['header'] = $this->load->view('Layouts/admin/header', $this->data, true);
        $this->template['sidebar'] = $this->load->view('Layouts/admin/sidebar', $this->data, true);
        $this->template['middle'] = $this->load->view($this->middle, $this->data, true);
        $this->load->view('Layouts/admin/index', $this->template);
    }  
}
