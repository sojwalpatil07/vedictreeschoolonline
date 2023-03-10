<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');

class Register extends REST_Controller 
{
    
    public function index_post()
    {
        
        $teacherMobile     = $this->input->post('teacherMobile');
        $teacherPass       = sha1($this->input->post('teacherPass'));
        $teacherClass       = $this->input->post('teacherClass');
        $teacherEmail       = $this->input->post('teacherEmail');
        
        if($teacherMobile==""){
           $data =array('msg'=>'teacherMobile is required','code'=>400);   
        }else if ($teacherPass==""){
           $data =array('msg'=>'teacherPass is required','code'=>400);    
        }else if($teacherClass==""){
           $data =array('msg'=>'teacherClass is required','code'=>400); 
        }else if($teacherEmail==""){
           $data =array('msg'=>'teacherEmail is required','code'=>400);  
        }else{
        
          $res = $this->teacherModel->teacher_login($teacherMobile,$teacherPass,$teacherClass);
          if(empty($res)){
                 $getsession_data = $this->teacherModel->teacher_register($teacherMobile,$teacherPass,$teacherClass,$teacherEmail);
                 if($getsession_data) {
        	        $data = array('msg' => "Teacher Register successfully Wait for activation ",'getfeesdata'=>$getsession_data);
        	      } else {
        	        $data = array('msg' => " Not Register",'getfeesdata'=>$getsession_data); 
        	       }
            }else{
                    $data = array('msg' => " Already Register Phone number with email id",'getfeesdata'=>$res); 
        	    
            }
	       
         $this->response($data, REST_Controller::HTTP_OK);
  
    }
}
   

}

?>