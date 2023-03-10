<?php
 $this->load->view('header');
?>
<style type="text/css">
    .thclass{
        width:400px;
    }
    
</style>
      
        <div id="layout-wrapper">
            <?php $this->load->view('topbar'); ?>
            <?php $this->load->view('sidebar'); ?>

            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <div class="card">
                              <div class="card-body" >
                                  <!--<h2>Fee Receipt</h2>-->
                                  <div class="row">
                                      <div class="col-md-2">
                                         <img src="<?php echo base_url('assets/images/logo.png')?>" style="height: 128px;" alt="" >
                                      </div>
                                      <div class="col-md-10">
                                          <h1 style="text-align:center;margin-right: 400px;color:red">VEDIC TREE</h1>
                                          <p style="margin-left:90px;font-size:large">Amrut Height,Plot No:23,Sec-4 Karanjade,Panvel. Mob:9320067800 Email :Vedictree@gmail.com</p>
                                          <p style="margin-left:23%;font-size:large">Contact No: 93200 67800</p>
                                      </div>
                                  </div>
                                  <hr>
                                <form method="POST" action="<?php echo base_url('dashboard'); ?>">
                                    <div class="row">
                                        <div class="col-md-12">
                                        <p style="float:right"><u style="font-size:larger">Date:<?php echo date("Y-m-d");?></u></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <h1 style="text-align:center;margin-left: 30%;"><u>BONAFIDE CERTIFICATE</u></h1>
                                        </div>
                                        
                                    <div class="row">
                                        <div class="col-md-10">
                                            <p style="font-size: x-large;margin-left: 21%;">
                                                This is to certify that <u><?php echo $studdata[0]['studentName'];?></u> is a bonafide student of this school studying in Senior KG (Year <?php  if(date("m") < 7 ) { echo date("Y",strtotime('-1 year')) ?> - <?php echo substr(date('Y'),-2);  }else { echo date("Y") ?> - <?php echo substr(date('Y', strtotime('+1 year')),-2); } ?>). Child has taken
                                                admission for <?php if($studdata[0]['studentClass']==1){ echo "Nursery KG"; }else if($studdata[0]['studentClass']== 2) { echo "Junior KG"; }else if($studdata[0]['studentClass']==3){ echo "Senior KG"; }else{ echo "No Class Found";} ?>  in year <?php  if(date("m") < 7 ) { echo date("Y",strtotime('-1 year')) ?> - <?php echo substr(date('Y'),-2);  }else { echo date("Y") ?> - <?php echo substr(date('Y', strtotime('+1 year')),-2); } ?>.</p>
                                                <p style="font-size: x-large;margin-left: 21%;" ><?php if(['studentGender']=="Male" || ['studentGender']=="Boy") { echo "His"; }else{ echo "She"; }?> birth date as recorded in the General Register of the school is <?php echo date("d",strtotime($studdata[0]['usr_dob'])); ?> 
                                            <?php $month_num = date("m",strtotime($studdata[0]['usr_dob'])); echo date("F", mktime(0, 0, 0, $month_num, 10)); ?>, <?php echo date("Y",strtotime($studdata[0]['usr_dob'])); ?>.
                                            </p>
                                            <p style="font-size: x-large;margin-left: 21%;">To the best of our knowledge <?php if($studdata[0]['studentGender']=="Male" || $studdata[0]['studentGender']=="Boy") { echo "he"; }else{ echo "She"; }?> bears a good moral character.</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                            <p style="margin-top:30px;margin-left: 21%;"></p>
                                    </div>    
                                    <div class="row">
                                        <div class="col-md-10">
                                            <p style="font-size: x-large;margin-left: 21%;">Thank You!</p>
                                            <p style="font-size: x-large;margin-left: 21%;">For Vedic Tree Pre School,</p>
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                          <div class="col-md-10">
                                            <p style="margin-top:50px;margin-left: 21%;"></p>
                                          </div>
                                    </div> 
                                    
                                    <div class="row">        
                                        <div class="col-md-10">
                                            <p style="font-size: x-large;margin-left: 21%;">Authorised Signature</p>
                                        </div>        
                                    </div>        
                                    <div class="row">
                                        <div class="col-md-10">
                                            <p style="font-size: x-large;margin-left: 21%;">Place: - Karanjade</p>
                                        </div>
                                    </div>
                                    <button style="font-size: smaller; opacity: 0.3;border: none;" onClick="window.print()"><i class="fa fa-print" aria-hidden="true"></i></button>
                                    </div>
                                </form>
                              </div>
                        </div>
                           
                        
                        

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
        
        
        
        
            
                
              <?php $this->load->view('footer'); ?>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

       <?php $this->load->view('footd');?>

    


