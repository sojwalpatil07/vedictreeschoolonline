<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');

class Getlist extends REST_Controller 
{
    
    public function index_post()
    {
         $fk_teachId        = $this->input->post('fk_teachId');
         $fees_id        = $this->input->post('fees_id');
       
        if($fk_teachId==""){
           $data =array('msg'=>'fk_teachId is required','code'=>400); 
        }else if($fees_id==""){
            $data =array('msg'=>'fees_id is required','code'=>400);
        }else{
        
           
             $data['chat_student_list_response'] = $this->teacherModel->chat_studentListsub_attdence($fk_teachId, $fees_id);
        }
            
             $this->response($data, REST_Controller::HTTP_OK);
    }
}

?>