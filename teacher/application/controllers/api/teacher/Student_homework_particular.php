<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');

class Student_homework_particular extends REST_Controller 
{
    
    public function index_post()
    {
    
  
        $fk_studId       = $this->input->post('fk_studId');
        if($fk_studId==""){
           $data =array('msg'=>'fk_studId is required','code'=>400);   
        }else{
            
            $get_course_info = $this->teacherModel->get_course_infomation_t($fk_studId);
            if(!empty($get_course_info)){
                $class_id = $get_course_info[0]['fk_classId'];
                $plan_id  = $get_course_info[0]['fk_feesId'];
                $data['student_homeworks'] = $this->teacherModel->get_student_homeworks_t($class_id,$plan_id,$fk_studId);
            }else{
                $data =array('msg'=>'Student is not allocated to teacher','code'=>400);                   
            }
        }
        $this->response($data, REST_Controller::HTTP_OK);
       
    }
}
       ?>