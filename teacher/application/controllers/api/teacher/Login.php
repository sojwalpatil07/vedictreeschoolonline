<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');

class Login extends REST_Controller 
{
    
    public function index_post()
    {
        
        $teacherMobile     = $this->input->post('teacherMobile');
        $teacherPass       = sha1($this->input->post('teacherPass'));
        $teacherClass       = $this->input->post('teacherClass');
        
        if($teacherMobile==""){
           $data =array('msg'=>'teacherMobile is required','code'=>400);   
        }else if ($teacherPass==""){
           $data =array('msg'=>'teacherPass is required','code'=>400);    
        }else if($teacherClass==""){
           $data =array('msg'=>'teacherClass is required','code'=>400); 
        }else{
        
          
         $getsession_data = $this->teacherModel->teacher_login($teacherMobile,$teacherPass,$teacherClass);
         if($getsession_data) {
	        $data = array('msg' => "Teacher login  successfully ",'getfeesdata'=>$getsession_data);
	      } else {
	        $data = array('msg' => "Id Not Found",'getfeesdata'=>$getsession_data); 
	       }
        }
	       
         $this->response($data, REST_Controller::HTTP_OK);
  
    }
    
   

}

?>