<?php
 $this->load->view('header');
?>
<style type="text/css">
    .thclass{
        width:400px;
    }
</style>
        <!-- Begin page -->
        <div id="layout-wrapper">
            <?php $this->load->view('topbar'); ?>
            <?php $this->load->view('sidebar'); ?>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                                <div class="card">
                                      <div class="card-body">
                                        <form method="POST" enctype="multipart/form-data" action="<?php echo base_url('dashboard/add_international_review'); ?>">
                                            <div class="row">
                                                <div class="col-xl-4 col-md-6">
                                                    <div class="form-group">
                                                        <label for="username"> Review Name</label>
                                                        <input type="text" class="form-control" value="<?php echo set_value('rname');  ?>" name="rname" id="rname" placeholder="Enter  rname">
                                                        <span style="color:red"><?php echo form_error('studentMobile');?></span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-md-6">
                                                    <div class="form-group">
                                                        <label for="username"> Review Description</label>
                                                        <input type="text" class="form-control" value="<?php echo set_value('rdesc');  ?>" name="rdesc"  id="rdesc" placeholder="Enter  rdesc">
                                                        <span style="color:red"><?php echo form_error('gdate');?></span>
                                                    </div>
                                                </div>
                                                 <div class="col-xl-4 col-md-6">
                                                    <div class="form-group">
                                                        <label for="username"> Review Date</label>
                                                        <input type="date" class="form-control" value="<?php echo set_value('rdate');  ?>" name="rdate"  id="rdate" placeholder="Enter  rdate">
                                                        <span style="color:red"><?php echo form_error('rdate');?></span>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-xl-4 col-md-6">
                                                    <div class="form-group">
                                                        <label for="username"> Uplaod Pic</label>
                                                        <input type="file" class="form-control" value="<?php echo set_value('rpics');  ?>" name="rpics"  id="rpics" >
                                                        <span style="color:red"><?php echo form_error('rpics');?></span>
                                                    </div>
                                                </div>

                                                
                                                <div class="col-xl-12 col-md-6" style="top:12px;">
                                                    <div class="form-group" >
                                                       <button class="btn btn-primary w-md waves-effect waves-light" name="submit" value="submit" type="submit">search</button>
                                                    </div>
                                                </div>

                                            </div>

                                        </form>
                                      </div>
                                </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Student List</h4>
                                        <table id="datatable" class="table table-bordered  " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th class="thclass">#Id</th>
                                                <th class="thclass">Name</th>                                                
                                                <th class="thclass"> Discription</th>                                                
                                                <th class="thclass"> Date</th>                                                
                                                <th class="thclass">Pics</th>                                                
                                                <th class="thclass">Action</th>
                                            </tr>
                                            </thead>  
                                            <tbody>
                                               <?php if($international_review){
                                                $i=1;
                                                foreach ($international_review as $key => $value) { 
                                                ?> 
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                <td><?php echo $value['rname']; ?></td>                                              
                                                <td><?php echo $value['rdesc']; ?></td>                                              
                                                <td><?php echo $value['rdate']; ?></td>                                              
                                                <td><img src="<?php echo base_url('uploads/international_review/').$value['rpics']; ?>" height="200px" width="200px"></td>  
                                                <td>
                                                    <form action="<?php echo base_url('dashboard/delete_international_review'); ?>" method="post">
                                                        <input type="hidden" value="<?php echo $value['rid']; ?>" name="rid">
                                                        <button type="submit" name="submit" value="submit" class="btn btn-sm p-0"><i style="font-size: 25px;position: relative;top: 0px;color:#626ed4;" class="mdi mdi-delete"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                               <?php }} ?> 
                                         
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
              <?php $this->load->view('footer'); ?>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

       <?php $this->load->view('footd');?>

       

<?php if(isset($error)){ ?>
  <script type="text/javascript">
    color = Math.floor((Math.random() * 4) + 1);

      $.notify({
          icon: "tim-icons icon-bell-55",
          message: "<?php if(isset($error)){ echo $error['error']; } ?>"

        },{
            type: type[color],
            timer: 8000,
        });
     
  </script>

<?php } ?>

<script>
    function check() {
        if(confirm("Are You Sure You Want To Delete")==true)
        {
            return true;
        }else{
            return false;
        }
    }

     function checkstu() {
        if(confirm("Are You Sure You Want Activate Student ? ")==true)
        {
            return true;
        }else{
            return false;
        }
    }
</script>