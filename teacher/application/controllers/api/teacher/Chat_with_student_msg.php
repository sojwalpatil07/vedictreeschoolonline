<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');

class Chat_with_student_msg extends REST_Controller 
{
    
    public function index_post()
    {
        
        $studId         = $this->input->post('studId');
        $message        = $this->input->post('message');
        $fk_teachId     = $this->input->post('fk_teachId');
        $fees_id        = $this->input->post('fees_id');
        
        if($studId==""){
           $data =array('msg'=>'studId is required','code'=>400);   
        }else if ($message==""){
           $data =array('msg'=>'message is required','code'=>400);    
        }else if($fk_teachId==""){
           $data =array('msg'=>'fk_teachId is required','code'=>400); 
        }else if($fees_id==""){
            $data =array('msg'=>'fees_id is required','code'=>400);
        }else{
        
            date_default_timezone_set('Asia/Kolkata');
             $currentDate   = date('Y-m-d h:i:s');
            $data['data'] = $this->teacherModel->start_chat_to_student($fk_teachId,$studId,$message,$currentDate,$fees_id);

        }
	       
         $this->response($data, REST_Controller::HTTP_OK);
  
    }
    
    
    
   

}

?>