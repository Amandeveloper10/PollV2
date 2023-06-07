<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 //////////////////////////////////////// UPLOAD FILE  ////////////////////////////////////////////

    function fileUpload($imageName,$uploadPath,$allowedTypes)
    {

    	$CI = & get_instance();
        if(!empty($imageName['name']))
        {
            
            $CI->load->library('upload');
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = $allowedTypes;
            $config['file_name'] = time();
            $CI->upload->initialize($config);

            if($imageName['error']==0)
            {
                $picName=$imageName['name']; 
                $ext = end((explode(".", $imageName['name']))); 
                $rand = md5(uniqid($picName, true));
                $newPicName=$rand.'.'.$ext;
                $destination=$uploadPath.$newPicName; 

                if (move_uploaded_file($imageName['tmp_name'] ,$destination))
                {   
                    $image_name = $newPicName;
                }
            }
        }
        else
        {
            $image_name = '';
        }

        return $image_name;

    }


    function multiplefileUpload($imageName,$uploadPath,$allowedTypes)
    {

        $CI = & get_instance();
        
        $i = 0;
        $image_name = array();
        for($i=0;$i<count($imageName);$i++)
        {
            if(!empty($imageName['name'][$i]))
            {
                $CI->load->library('upload');
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = $allowedTypes;
                $config['file_name'] = time();
                $CI->upload->initialize($config);

                if($imageName['error'][$i]==0)
                {
                    
                    $picName=$imageName['name'][$i]; 
                    $ext    = end((explode(".", $imageName['name'][$i]))); 
                    $rand   = md5(uniqid($picName, true));
                    $newPicName =$rand.'.'.$ext;
                    $destination=$uploadPath.$newPicName; 

                    if (move_uploaded_file($imageName['tmp_name'][$i] ,$destination))
                    {
                        
                        $image_name[$i] = $newPicName;
                    }

                }
            }
        }

        $image_name = implode(",",$image_name);  
        return $image_name;

    }


    function multiplefileUpload1($imageName,$uploadPath,$allowedTypes)
    {

       
        $CI = & get_instance();
        $i = 0;
        $image_name = array();
        for($i=0;$i<count($imageName);$i++)
        {
           
            if(!empty($imageName[$i]))
            {

                if (filter_var($imageName[$i], FILTER_VALIDATE_URL)) { 
              
                /*$ext='jpeg';
                $rand = md5(uniqid());
                $newPicName=$rand.'.'.$ext; 
                $ch = curl_init($imageName[$i]);
                $fp = fopen($uploadPath.$newPicName, 'wb');
                curl_setopt($ch, CURLOPT_FILE, $fp);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                $result = curl_exec($ch);
                curl_close($ch);
                fclose($fp);
                $image_name[$i] = $newPicName;*/

                $rand       = md5(uniqid());
                $info       = getimagesize($imageName[$i]);
                $extension  = image_type_to_extension($info[2]);
                $newPicName = $rand.$extension; 

                copy($imageName[$i],$uploadPath.$newPicName);

                $image_name[$i] = $newPicName;


            }
            elseif(!empty($imageName['name'][$i]))
            {

                    $CI->load->library('upload');
                    $config['upload_path']      = $uploadPath;
                    $config['allowed_types']    = $allowedTypes;
                    $config['file_name']        = time();
                    $CI->upload->initialize($config);

                    if($imageName['error'][$i]==0)
                    {
                        
                        $picName =$imageName['name'][$i]; 
                        $ext     = end((explode(".", $imageName['name'][$i]))); 
                        $rand    = md5(uniqid($picName, true));
                        $newPicName  =$rand.'.'.$ext;
                        $destination =$uploadPath.$newPicName; 
                        if (move_uploaded_file($imageName['tmp_name'][$i] ,$destination))
                        {   
                            $image_name[$i] = $newPicName;
                        }

                    }

            }
            }
        }

        $image_name = implode(",",$image_name);
        
        return $image_name;

    }




//////////////////////////////////////// GET MODIFIER OPTION NAME  ////////////////////////////////////////////

function missedCallNumber()
{
   $CI = & get_instance();
   $CI->load->model('admin/adminsmodel');
  
   $where = array();
   $where['id'] = '1';
   $a = $CI->adminsmodel->content_get($where);

   return $a->contact_number;
}


//////////////////////////////////////// COUNT POS DEVICES ////////////////////////////////////////////

function countPosDevices($store_id)
{
   $CI = & get_instance();
   $CI->load->model('store/admin/storemodel');
   $where = array();
   $where['store_id'] = $store_id;
   $a = $CI->storemodel->pos_count($where);


   return count($a);
}

    //////////////////////////////////////// GET USER DEVICE DETAILS ////////////////////////////////////////////

    function customerDeviceDetails($uid)
    {
       $CI = & get_instance();
       $CI->load->model('customer/admin/customermodel');

       $where = array();
       $where['id'] = $uid;
       $a = $CI->customermodel->customer_get($where);
       return $a;
    }

    //////////////////////////////////////// PUSH NOTIFICATION  ////////////////////////////////////////////

    function pushNotification($type,$id,$message)
    {
        //$CI = & get_instance();

        if($type == 'android')
        {
            //$android =& sendNotificationToAndroid($id,$message);
            $android = sendNotificationToAndroid($id,$message);
            //$android = $CI->sendNotificationToAndroid($id,$message);
        }

        return true;
    }


    //////////////////////////////////////// NOTIFICATION FOR ANDROID ////////////////////////////////////////////

    function sendNotificationToAndroid($id,$message){


        //////////////////////////////////// DEVELOPMENT AUTH KEY /////////////////////////////////////

       // $mssg = array('title'=>'Test Data','body'=>$message);

        $auth_key = 'AAAA_-O_4UY:APA91bGgkndjSRiGO00VE1WE4YfTiXx1d-IV7sx50glAykHYGp_GYZuiqshhziObbnrRwamlYGVuL_gn70HnjZeWVeewdenevIEyUOVWHY5egViTvLzrREMAPxuYLJtkLVuIRhmO5k-l';

       // $id = 'dwCy6eKuFPY:APA91bHeqroRj2Ojeau69T4rfdkiluxl9GgHyor5pO0svVGCcQR-uqYbkhWKL7oflLHythNZAmp98HlSJmL0wMZPCVQqxNlzOOsfb1hxEI5HR_4lyOe3e-MFTgY2afONr6xsKo8Aji3B';

        //$data = array('title' => 'HBHG','body' => $message);

        $url = 'https://fcm.googleapis.com/fcm/send';

        //$message = 'Data Testing';

        //echo $id; exit;

        $fields = array(

            'registration_ids'  => array ($id),
            'data'              => array( "message" => 'hello' ),
         );
        
        if(is_array($message)){
            foreach ($message as $key => $value) {
                $fields['data'][$key] = $value;
            }
         }


        $fields = json_encode ( $fields );


         /*$headers = array (
                  'Authorization: key=' . "AAAAvcesO8E:APA91bGpG8rhK_uPkW1HU7vLLVVUwHlcHExlrz-txjeFwygPLcPFYw7ZW-FwDYpyrgzsvk5jjD6eaCu39LZG59gJirc4SO-4pr7FSH0-R5321GI-zK9YXQIPrTYUtAmxMwtnX5AMu6kv",
                  'Content-Type: application/json'
          ); */
          

          $headers = array (
                  'Authorization: key=' .$auth_key,
                  'Content-Type: application/json'
          );

          $ch = curl_init ();
          curl_setopt ( $ch, CURLOPT_URL, $url );
          curl_setopt ( $ch, CURLOPT_POST, true );
          curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
          curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
          curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

          $result = curl_exec($ch);
          //echo $result; exit;
          curl_close ( $ch );
       
        return true;


    }



    
