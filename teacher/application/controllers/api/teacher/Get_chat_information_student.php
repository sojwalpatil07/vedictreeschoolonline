<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');

class Get_chat_information_student extends REST_Controller 
{
    
    public function index_post()
    {
        
        $studId         = $this->input->post('studId');
        $fk_teachId     = $this->input->post('fk_teachId');
        $fees_id        = $this->input->post('fees_id');
    
        
        if($studId==""){
           $data =array('msg'=>'studId is required','code'=>400);   
        }else if($fk_teachId==""){
           $data =array('msg'=>'fk_teachId is required','code'=>400); 
        }else if($fees_id==""){
            $data =array('msg'=>'fees_id is required','code'=>400);
        }else{
        
            $fees_id                              = $fees_id;
            $studId                               = $studId;
            $readMsg                              = 2;
            $teacher_session                      = $fk_teachId;
            $data['group_chat_get_info']          = $this->teacherModel->group_chat_get_info($fees_id);
            $data['chat_student_list_response']   = $this->teacherModel->chat_studentListsub_attdence($teacher_session, $fees_id);
            $data['chat_full_info_student']       = $this->teacherModel->chat_to_student($studId,$teacher_session,$fees_id);
            $data['all_chat_data']                = $this->teacherModel->get_chat_Particular_student_allchat($studId,$teacher_session);

        }
	       
         $this->response($data, REST_Controller::HTTP_OK);
  
    }
    
    
    
   

}

?>