<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');

class Studentlive extends REST_Controller 
{
    
    public function index_post()
    {
        
        $studId             = $this->input->post('studId');
        $studentClass       = $this->input->post('studentClass');
        
        if($studId==""){
           $data =array('msg'=>'studId is required','code'=>400);   
        }else if ($studentClass==""){
           $data =array('msg'=>'studentClass is required','code'=>400);    
        }else{
        
         date_default_timezone_set('Asia/Kolkata');
        $currentDate = date("Y-m-d");    
         $getsession_data = $this->teacherModel->studentsession_api($studId,$studentClass,$currentDate);
         if($getsession_data) {
	        $data = array('msg' => "Notification Link's data fetch successfully ",'getfeesdata'=>$getsession_data);
	      } else {
	        $data = array('msg' => "Notification Link's data not fetch successfully",'getfeesdata'=>$getsession_data); 
	       }
        }
	       
         $this->response($data, REST_Controller::HTTP_OK);
  
    }
    
   

}

?>
