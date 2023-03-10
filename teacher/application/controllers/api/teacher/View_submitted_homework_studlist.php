<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');

class View_submitted_homework_studlist extends REST_Controller 
{
    
    public function index_post()
    {
        
        $teacherId     = $this->input->post('teacherId');
        $fees_id       = sha1($this->input->post('fees_id'));
       
        
        if($teacherId==""){
           $data =array('msg'=>'teacherId is required','code'=>400);   
        }else if ($fees_id==""){
           $data =array('msg'=>'fees_id is required','code'=>400);    
        }else{
        
          
        $data['view_list_homework_all'] = $this->teacherModel->view_studentlistt($teacherId, $fees_id);
         if($data) {
	        $data = array('msg' => "Data Fetched ",'data'=>$data);
	      } else {
	        $data = array('msg' => "Data Not Found",'data'=>$data); 
	       }
        }
	       
         $this->response($data, REST_Controller::HTTP_OK);
  
    }
    
   

}

?>