<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');

class Pendingfees extends REST_Controller 
{

     public function index_post()
    {
        
            $currentdate = $this->input->post('currentdate');
            $lastdayofmonth = $this->input->post('lastdayofmonth');
            $classId = $this->input->post('classId');
            if($currentdate==""){
                $data = array('msg' => " current date required",'code'=>404);
            }else if($lastdayofmonth==""){
                $data = array('msg' => " last day of month required",'code'=>404);
            } else if($classId==""){
                $data = array('msg' => " class Id required",'code'=>404);
            }else{
            
            $res  = $this->regModel->show_pending_physical_nursery($currentdate,$lastdayofmonth,$classId);
            if(!empty($res)){
                $data = array('msg' => "data found ",'res'=>$res,'code'=>200);
            }else{
                
                $data = array('msg' => "Not found",'res'=>$res,'code'=>404);
            }
            $this->response($data, REST_Controller::HTTP_OK);    
        }
    
    }
    
    
     public function withoutclass_post()
    {
        
            $currentdate = $this->input->post('currentdate');
            $lastdayofmonth = $this->input->post('lastdayofmonth');
            
            if($currentdate==""){
                $data = array('msg' => " current date required",'code'=>404);
            }else if($lastdayofmonth==""){
                $data = array('msg' => " last day of month required",'code'=>404);
            }else{
            
            $res  = $this->regModel->show_pending_physical_nursery_withoutclass($currentdate,$lastdayofmonth);
            if(!empty($res)){
                $data = array('msg' => "data found ",'res'=>$res,'code'=>200);
            }else{
                
                $data = array('msg' => "Not found",'res'=>$res,'code'=>404);
            }
            $this->response($data, REST_Controller::HTTP_OK);    
        }
    
    }
    
    
   
        
    
}
?>