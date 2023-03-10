<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');

class Showfees extends REST_Controller 
{

     public function index_get()
    {
    
            $res  = $this->regModel->getphysicalfees();
            if(!empty($res)){
                $data = array('msg' => " Fees list",'res'=>$res,'code'=>200);
            }else{
                
                $data = array('msg' => "Not found",'res'=>$res,'code'=>404);
            }
        $this->response($data, REST_Controller::HTTP_OK);    
    
    }
    
    function filterclasswise_receipt_post(){
        
            $fk_classId = $this->input->post('fk_classId');
            if($fk_classId==""){
                $data = array('msg' => " fk_classId required",'code'=>200);
            }else{
            
            $res  = $this->regModel->getphysicalfees();
            if(!empty($res)){
                $data = array('msg' => " Fees list",'res'=>$res,'code'=>200);
            }else{
                
                $data = array('msg' => "Not found",'res'=>$res,'code'=>404);
            }
            $this->response($data, REST_Controller::HTTP_OK);    
        }
    }
        
    
}
?>