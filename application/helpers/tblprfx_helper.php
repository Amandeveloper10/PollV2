<?php
/**
 *
 * This helper is used for adding the table prefix after table name
 *
 * @author : <developer.wiz01@sketchwebsolutions.com>
 * @param : tablename
 * @return : string. Table name concatinated with the table prefix. e.g. if give users, o/p is dd_users
 * @since	Version 1.0.0
 *
 */
function tablename($tablename) {
    $CI = & get_instance();
    $CI->load->database();
    return $CI->db->dbprefix($tablename);
}

/* End of file tblprfx_helper.php */
/* Location: ./application/helpers/tblprfx_helper.php */
