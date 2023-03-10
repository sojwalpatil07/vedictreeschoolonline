<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');

class Homeworkupload extends REST_Controller 
{
    
    public function index_post()
    {
        
        
        
        $usersession = $this->session->userdata('usersession');
          $this->load->library('upload');
          $image = array();
          $ImageCount = count($_FILES['allocated_file']['name']);
          
         
       if($ImageCount >= 1){
            for($i = 0; $i < $ImageCount; $i++){
                $FILENAMES = $_FILES['file']['name'] = $_FILES['allocated_file']['name'][$i];
                $_FILES['file']['type']       = $_FILES['allocated_file']['type'][$i];
                $_FILES['file']['tmp_name']   = $_FILES['allocated_file']['tmp_name'][$i];
                $_FILES['file']['error']      = $_FILES['allocated_file']['error'][$i];
                $_FILES['file']['size']       = $_FILES['allocated_file']['size'][$i];
                $config['encrypt_name']       = TRUE;

                $class_id                 = $this->input->post('teacherClass');
                $teacher_id               = $this->input->post('teacherId');
                $home_title               = $this->input->post('home_title');
                $description              = $this->input->post('description');
                $start_time               = $this->input->post('start_time');
                $end_time                 = $this->input->post('end_time');
                $fk_feesId                = $this->input->post('fk_feesId');
               
                $uploadPath = './uploads/multiple_pics_loading/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|PNG|JPEG';
    
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                $res = 0;
                  
                // Upload file to server
                if($this->upload->do_upload('file')){
                    // Uploaded file data
                    $imageData = $this->upload->data();
                    
              
                  
                   $get_statudents = $this->teacherModel->check_student_package($fk_feesId, $class_id);
              
                      foreach($get_statudents as $studentshomework)
                      {
                         $res = $this->teacherModel->homework_allocated_test($home_title,$description,$start_time,$end_time, $imageData['file_name'], $fk_feesId, $class_id,$studentshomework['fk_studId'],$teacher_id);
                        
                      }
                  
                  
                  
                }
                
            }
              
              if($res==1){
                  $data['data'] =  json_encode(array('success' => 'Homework allocated successfully'));
              }
              else
              {
                  $data['data'] =  json_encode(array('success' => 'Homework not  allocated successfully'));
              }
              
          
             if(!empty($uploadImgData)){
                          
            }
        
      }
      else{
          
          //if no image found else
          
                 $class_id            = $this->input->post('teacherClass');
                 $home_title          = $this->input->post('home_title');
                 $description         = $this->input->post('description');
                 $start_time          = $this->input->post('start_time');
                 $end_time            = $this->input->post('end_time');
                 $fk_feesId            = $this->input->post('fk_feesId');
                 $res = $this->teacherModel->homework_allocated_nofile_uploaded($home_title,$description,$start_time,$end_time,$fk_feesId, $class_id);
                 
             if($res==1){
                 $data['data'] =  json_encode(array('success' => 'Homework allocated successfully'));
              }
              else
              {
                 $data['data'] =  json_encode(array('success' => 'Homework not  allocated successfully'));
              }
      }
      
         $this->response($data, REST_Controller::HTTP_OK);
  
    }
    
    
    
   

}

?>