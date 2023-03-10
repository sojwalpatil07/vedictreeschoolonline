<?php
  $usersession    = $this->session->userdata('usersession');
 
  

?>
<!DOCTYPE html>
<html lang="zxx">
<head>
  
  <!-- Vedic Main header files Start -->
  <?php $this->load->view('teacher_header'); ?>
  <!-- Vedic Main header files End -->
  <style>
  .link_studentref{
    margin-top: 9px;
    margin-left: 10px;
}
  </style>  
</head>
<body>
  <!-- Simulate a smartphone / tablet -->
  <?php $this->load->view('mobilemenu'); ?>
  <!-- Top Navigation Menu -->
  <!-- End smartphone / tablet look -->
  <div class="boxes">
    <?php $this->load->view('teachersidebar'); ?>
    <div class="box11 animated_hero" style="background: #695FFE;">
      <div class="box-inside">
        <div class="desktop-mobile-view">
          <!-- //top header -->
          <?php $this->load->view('teacher_topheader'); ?>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
          <!-- //end top header -->
          <button style="background: #695ffe;border-radius: 30px;color: #fff;" onclick="history.back()"><i class="fa fa-arrow-left mr-2" aria-hidden="true"></i>Go Back</button>
          <h1 class="my-4" style="font-weight: 800;color:darkorange">Studentlist of Report-card</h1>
                                        
          <div class="">
            <table id="myTable">
              <thead>
                <tr>
                  <th class="thclass">#Id</th>
                  <th class="thclass"> Title</th>
                  <th class="thclass">description</th>
                  <th class="thclass">packageName</th>
                  <th class="thclass">Homework files</th>
                  <th class="thclass">Start time</th>
                  <th class="thclass">End  time</th>
                 
                </tr>
              </thead>
              <tbody>   
                <?php if($homework_show) { ?>
                <tr>
                    <?php $incrementId = 1?>
                  <?php foreach($homework_show as $homework) { ?>
                  <td><?php echo $incrementId++ ?></td>
                  <td><?php echo $homework['home_title']; ?></td>
                  <td><?php echo $homework['description']; ?></td>
                  <td><?php echo $homework['packageName']; ?></td>
                  <td>
                      <a download href="<?php echo  base_url('uploads/multiple_pics_loading/'.str_replace(' ', '_', $homework['allocated_file'])); ?>" title="ImageName">
                      <img width="50" height="50" class="img-rounded" src="<?php echo  base_url('uploads/multiple_pics_loading/'.str_replace(' ', '_', $homework['allocated_file'])); ?>" />
                      </a>
                  </td>
                  <td><?php echo $homework['start_time']; ?></td>
                  <td><?php echo $homework['end_time']; ?></td>
                </tr>
                <?php } } ?>
              <tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
    stateSave: true
});
</script>


<?php if(isset($error)){ ?>
    <script type="text/javascript">
        color = Math.floor((Math.random() * 4) + 1);

        $.notify({
        icon: "tim-icons icon-bell-55",
        message: "<?php if(isset($error)){ echo $error['error']; } ?>"
        },{ type: type[color],
            timer: 8000,
        });
    </script>
<?php } ?>