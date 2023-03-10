<?php
 $this->load->view('header');
 $monthdata =  required_data();

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
                <div class="col-md-12">
                    <div class="card">
                          <div class="card-body">
                               <h1>Add Events</h1>
                            <form method="POST" action="<?php echo base_url('dashboard/addeventsdata'); ?>">
                                <div class="row">
                                    
                                   
                                    <div class="col-xl-4 col-md-6">
                                       <div class="form-group" >
                                            <div class="form-group">
                                                <label>Enter Event Name </label>
                                                <input type="text" class="form-control" name="eventName" placeholder="Event Name ">
                                            </div>
                                            <span style="color:red"><?php echo form_error('eventName');?></span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xl-4 col-md-6">
                                       <div class="form-group" >
                                            <div class="form-group">
                                                <label>Enter Event Url </label>
                                                <input type="url" class="form-control" name="eventurl" placeholder="eventurl  ">
                                            </div>
                                            <span style="color:red"><?php echo form_error('eventurl');?></span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xl-4 col-md-6">
                                       <div class="form-group" >
                                            <div class="form-group">
                                                <label>Enter Event Date </label>
                                                <input type="date" class="form-control" name="eventDate" placeholder="Event Date ">
                                            </div>
                                            <span style="color:red"><?php echo form_error('eventDate');?></span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xl-12 col-md-6" style="top:12px;">
                                        <div class="form-group" >
                                           <button class="btn btn-primary w-md waves-effect waves-light" name="submit" value="submit" type="submit">submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                          </div>
                    </div>
                </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Package List</h4>
                            <table id="datatable" class="table table-bordered " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th class="thclass">#Id</th>
                                    <th class="thclass">Event Name</th>
                                    <th class="thclass">Event Url</th>
                                    <th class="thclass">Date</th>
                                    <th class="thclass">Action</th>
                                   
                                </tr>
                                </thead>  
                                <tbody>
                                   <?php if($eventlist){
                                    $i=1;
                                    foreach ($eventlist as $key => $value) { 
                                    ?> 
                                <tr>
                                    <td><?php echo $i++;?></td>
                                    <td><?php echo $value['eventName']; ?></td>
                                    <td><?php echo $value['eventurl']; ?></td>
                                    <td><?php echo $value['eventDate']; ?></td>
                                    <td>
                                    <form class="" method="POST" onclick="return check();" action="<?php echo base_url('dashboard/delete_events'); ?>">
                                                        <input type="hidden" value="<?php echo $value['eventId']; ?>" name="eventId">
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
      
      setTimeout(function() {
                    window.location.href = '<?php echo base_url('dashboard/addevents')?>';
       }, 2000);

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
</script>
