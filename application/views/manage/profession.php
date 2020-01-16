<!DOCTYPE html>

<html lang="en">
<?php $this->load->view('manage/head.php'); ?>
<body>

<div id="wrapper">

  <!-- Navigation -->

  <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

    <div class="navbar-header">

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

      <a class="navbar-brand" href="<?php echo base_url('manage/admin');?>"><img src="<?php echo ASSETS;?>images/logo.png" class="logo" /></a> </div>

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

        <div class="panel-heading"><?php echo $page_title;?></div>

        <div class="panel-body">

<?php if(!empty($categoryId)){$action_url = base_url('manage/admin/profession/id/'.$categoryId);}else{$action_url = base_url('manage/admin/profession');}?>			

          <form role="form" name="frmAgent" id="frmAgent" method="post" action="<?php echo $action_url;?>" enctype="multipart/form-data">

            <div class="form-group">

              <label>Category Name</label>

			  <span class="error"><?php echo form_error('categoryName'); ?></span>

              <input placeholder="Category Name" name="categoryName" id="categoryName" value="<?php echo $categoryName;?>" class="form-control">

            </div>
			
			      <input class="btn btn-default btn-add" name="submit" type="submit" value="<?php echo $action;?>">

			<input name="categoryId" type="hidden" value="<?php echo $categoryId;?>">


            <button class="btn btn-default btn-cancel" type="button" onClick="window.location.href='<?php echo base_url('manage/admin/location_list');?>'">Cancel</button>

          </form>

          </div>

          </div>

        </div>

        <!-- /.col-lg-12 -->

      </div>

      <!-- /.row -->

    </div>

    <!-- /.container-fluid -->

  </div>

  <!-- /#page-wrapper -->

</div>

<!-- /#wrapper -->

<?php $this->load->view('manage/footer.php'); ?>

</body>

</html>

