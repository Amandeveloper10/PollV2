<?php
/**
 *
 * This helper is used for sending Email
 *
 * @author : <developer.wiz01@sketchwebsolutions.com>
 * @param : none
 * @return : Success or Failure of sending an Email
 * @since : Version 0.0.1
 *
 */

function send_email($to, $subject, $message) {
    $config['protocol'] = 'smtp';
    $config['smtp_host'] = 'smtp.gmail.com';
    $config['smtp_crypto'] = 'tls';
    $config['smtp_port'] = '587';
    $config['smtp_timeout'] = '7';
    $config['smtp_user'] = 'sketchwebsolutions.mail@gmail.com';
    $config['smtp_pass'] = '$k%86$@^*';
    $config['charset'] = 'utf-8';
    $config['newline'] = "\r\n";
    $config['mailtype'] = 'html'; // or html
    $config['validation'] = TRUE; // bool whether to validate email or not

    $CI = & get_instance();
    $CI->load->library('email');
    $CI->email->initialize($config);
    $CI->email->from('admin@future.com', 'future');
    $CI->email->to($to);
    $CI->email->subject($subject);
    $CI->email->message($message);
    $CI->email->send();
}

/**
 *
 * This helper is used for sending Email with attachment
 *
 * @author : <developer.wiz01@sketchwebsolutions.com>
 * @param : none
 * @return : Success or Failure of sending an Email
 * @since : Version 0.0.1
 *
 */
function send_email_attachment($to, $subject, $data) {
    if (is_array($to)) {
        $to = implode(',', $to);
    }
    $msg = '';
    $config['protocol'] = 'smtp';
    $config['smtp_host'] = 'smtp.gmail.com';
    $config['smtp_crypto'] = 'tls';
    $config['smtp_port'] = '587';
    $config['smtp_timeout'] = '7';
    $config['smtp_user'] = 'sketchwebsolutions.mail@gmail.com';
    $config['smtp_pass'] = '$k%86$@^*';
    $config['charset'] = 'utf-8';
    $config['newline'] = "\r\n";
    $config['mailtype'] = 'html'; // or html
    $config['validation'] = TRUE; // bool whether to validate email or not
    $CI = & get_instance();
    $CI->load->library('email');
    $CI->email->initialize($config);
    $CI->email->from('admin@future.com', 'future');
    $CI->email->to('developer.wiz01@sketchwebsolutions.com,' . $to);
    $CI->email->subject($subject);
    $CI->email->message($data['body']);
    if (isset($data['attach_file']) && $data['attach_file'] != '' && count($data['attach_file']) > 0) {
        foreach ($data['attach_file'] AS $attach_file) {
            $CI->email->attach($attach_file);
        }
    }
    $CI->email->send();
}
