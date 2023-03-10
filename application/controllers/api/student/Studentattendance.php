<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');

class Studentattendance extends REST_Controller 
{


 public function index_post()
 {
      
    $studIds     = $this->input->post('studIds');
    $techerId    = $this->input->post('techerId');
    $classId     = $this->input->post('classId');
    $div         = $this->input->post('div');
    $date        = $this->input->post('date');
	  if($studIds==""){
         $data['error'] = array('error' => "studIds required",'code'=>404);
       
    }else if($techerId==""){
         $data['error'] = array('error' => "techerId required",'code'=>404);
       
    }else if($classId==""){
         $data['error'] = array('error' => "classId required",'code'=>404);
       
    }else if($div==""){
         $data['error'] = array('error' => "div required",'code'=>404);
       
    }else if($date==""){
         $data['error'] = array('error' => "date required",'code'=>404);
       
    }else{
    
            $userinfo = $this->regModel->addAttendance($studIds,$techerId,$classId,$div,$date);
        	  if($userinfo==1) {
        	        $data = array('msg' => "Attendace Added Succeessfully ",'code'=>200,'userinfo'=>$userinfo);
        	  } else {
        	      $data = array('msg' => "Data not add attendace",'code'=>404,'userinfo'=>$userinfo); 
        	  }
    }
            
  $this->response($data, REST_Controller::HTTP_OK);
          

}


function listattd_post(){
    
    
    $techerId    = $this->input->post('techerId');
    $classId     = $this->input->post('classId');
    $div         = $this->input->post('div');
	if($techerId==""){
         $data['error'] = array('error' => "techerId required",'code'=>404);
       
    }else if($classId==""){
         $data['error'] = array('error' => "classId required",'code'=>404);
       
    }else if($div==""){
         $data['error'] = array('error' => "div required",'code'=>404);
         
    }else{
        
        $data = $this->regModel->listattd($techerId,$classId,$div);
         $data = array('msg' => "Attendace list ",'code'=>200,'userinfo'=>$data);
    }
    
    $this->response($data, REST_Controller::HTTP_OK);
    
    
}
   



}

?>