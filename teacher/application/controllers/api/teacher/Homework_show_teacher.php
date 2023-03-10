<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');

class Homework_show_teacher extends REST_Controller 
{
    
    public function index_post()
    {
        
        
        
        $fk_teachId        = $this->input->post('fk_teachId');
       
        if($fk_teachId==""){
           $data =array('msg'=>'fk_teachId is required','code'=>400); 
        }else{
        
           
            $data['homework_show'] = $this->teacherModel->list_of_homework_teacher($fk_teachId);
        }
            
             $this->response($data, REST_Controller::HTTP_OK);
    }
    
    
    
   

}

?>