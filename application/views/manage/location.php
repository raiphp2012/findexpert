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

<?php if(!empty($locationId)){$action_url = base_url('manage/admin/location/id/'.$locationId);}else{$action_url = base_url('manage/admin/location');}?>			

          <form role="form" name="frmAgent" id="frmAgent" method="post" action="<?php echo $action_url;?>" enctype="multipart/form-data">

            <div class="form-group">

              <label>Location Name</label>

			  <span class="error"><?php echo form_error('locationName'); ?></span>

              <input placeholder="Location Name" name="locationName" id="locationName" value="<?php echo $locationName;?>" class="form-control">

            </div>
			
			 <div class="form-group">

              <label>Latitude</label>

			  <span class="error"><?php echo form_error('latitude'); ?></span>

              <input placeholder="Latitude" name="latitude" id="latitude" value="<?php echo $latitude;?>" class="form-control">

            </div>
			
			 <div class="form-group">

              <label>Longitude</label>

        <span class="error"><?php echo form_error('longitude'); ?></span>

              <input placeholder="Longitude" name="longitude" id="longitude" value="<?php echo $longitude;?>" class="form-control">

            </div>
			
			 <div class="form-group">

              <label>Sort Order</label>

			  <span class="error"><?php echo form_error('sortOrder'); ?></span>

              <input placeholder="Sort Order" name="sortOrder" id="sortOrder" value="<?php echo $sortOrder;?>" class="form-control">

            </div>

            <div class="form-group">

              <label>Slug</label>

        <span class="error"><?php echo form_error('slug'); ?></span>

              <input placeholder="Slug" name="slug" id="slug" value="<?php echo $slug;?>" class="form-control">

            </div>



			 

            <input class="btn btn-default btn-add" name="submit" type="submit" value="<?php echo $action;?>">

			<input name="locationId" type="hidden" value="<?php echo $locationId;?>">


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

