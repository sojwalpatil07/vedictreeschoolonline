<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');

class Createlivesession extends REST_Controller 
{
    
    public function index_post()
    {
        
              $teacherClass       = $this->input->post('teacherClass');
              $microsoft_link    = $this->input->post('link');
              $start_date        = $this->input->post('start_date');
              $start_time        = $this->input->post('start_time');
              $end_date          = $this->input->post('end_date');
              $end_time          = $this->input->post('end_time');
            
            if($teacherClass==""){
           $data =array('msg'=>'fk_teachId is required','code'=>400); 
        }else if($microsoft_link==""){
            $data =array('msg'=>'fees_id is required','code'=>400);
        }else if($start_date==""){
            $data =array('msg'=>'start_date is required','code'=>400);
        }else if($start_time==""){
            $data =array('msg'=>'start_time is required','code'=>400);
        }else if($end_date==""){
            $data =array('msg'=>'end_date is required','code'=>400);
        }else if($end_time==""){
            $data =array('msg'=>'end_time is required','code'=>400);
        }else{
            
            
              $data = array(  
                      'microsoft_link'   => $microsoft_link , 
                      'start_date'       => $start_date , 
                      'start_time'       => $start_time , 
                      'end_date'         => $end_date , 
                      'fkclassId'        => $teacherClass , 
                      'status'           => "1" , 
                      'end_time'         => $end_time  
                  );
              
             $res = $this->teacherModel->add_live_stream($data);
                if($res==1){
                  $data['error']        = array('error' => "Data Inserted Successfully !");
                }else{
                    $data['error']         = array('error' => "Data not Inserted Successfully !");
                }
	       
          $this->response($data, REST_Controller::HTTP_OK);
        }
  
    }
    
    
    public function listlivesession_get()
    {
        
      
         $data['get_live_stream'] = $this->teacherModel->get_live_stream();
         $this->response($data, REST_Controller::HTTP_OK);
  
    }
    
    
    
    
    
   

}

?>