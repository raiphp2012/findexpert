<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('manage/head.php'); ?>
<body>
<div id="wrapper">
  <!-- Navigation -->
  <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="<?php echo base_url('admin/dashboard');?>"><img src="<?php echo ASSETS;?>images/logo.png" class="logo" /></a> </div>
    <!-- /.navbar-header -->
    <?php $this->load->view('manage/menu.php'); ?>
    <!-- /.navbar-top-links -->
    <?php $this->load->view('manage/leftnav.php'); ?>
    <!-- /.navbar-static-side -->
  </nav>
  <!-- Page Content -->
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
 		 <div class="panel-heading">Change Password</div>
    
    <div class="panel-body">
	  <?php $flash_message = $this->session->flashdata('save_record');			  
	 if($flash_message){?>
                  <div class="save-records">
                    <div class="col-sm-6 save-record"><?php echo $this->session->flashdata('save_record');?></div>
                  </div>
                  <?php } ?>
      <div class="row">
        <div class="col-lg-12">
          <form role="form" name="frmChangePassword" id="frmChangePassword" method="post" action="<?php echo base_url('manage/admin/change_password');?>" enctype="multipart/form-data">
            <div class="form-group">
              <label>Current Password</label>
			  <span class="error"><?php echo form_error('old_password'); ?></span>
              <input type="password" name="old_password" id="old_password" class="form-control">
            </div>
			  <div class="form-group">
              <label>New Password</label>
			  <span class="error"><?php echo form_error('new_password'); ?></span>
              <input type="password" name="new_password" id="new_password" class="form-control">
            </div>
			  <div class="form-group">
              <label>Confirm Password</label>
			  <span class="error"><?php echo form_error('confirm_password'); ?></span>
              <input type="password" name="confirm_password" id="confirm_password" class="form-control">
            </div>
			
			 <input class="btn btn-default btn-add" name="submit" type="submit" value="Update">
            <button class="btn btn-default btn-cancel" type="button" onClick="window.location.href='<?php echo base_url('admin/dashboard');?>'">Cancel</button>
          </form>
        </div>
        <!-- /.col-lg-12 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </div>
  </div>
  </div>
  </div>
  </div>
  <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<?php $this->load->view('manage/footer.php'); ?>
</body>
</html>
