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

            <div class="panel-heading"><?php echo $page_title;?> </div>

            <!-- /.panel-heading -->

            <div class="panel-body">

              <div class="dataTable_wrapper">

                <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">

                 
	<?php $flash_message = $this->session->flashdata('save_record');			  

	 if($flash_message){?>

      <div class="save-records"><div class="col-sm-6 save-record"><?php echo $this->session->flashdata('save_record');?></div></div>

	  <?php } ?>

            <div class="row">

                    <div class="col-sm-12">

                      <table id="dataTables-example" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dataTables-example_info">

                        <thead>

                          <tr role="row">

              <th>Service Name</th>
              <th>Sort Order</th>
              <th>Action</th>
							

							 

                          </tr>

                        </thead>

                        <tbody>

						<?php 
						foreach($results as $service_info){
              ?>

                          <tr class="gradeA odd" role="row">

                            <td><?php echo $service_info->subCategoryName;?></td>
                             <td><input type="text" name="sortOrder[]" id="sort-<?php echo $service_info->subCategoryId;?>" value="<?php echo $service_info->sortOrder;?>" class="form-control sort-order"/></td>

  <td><a href="<?php echo base_url('manage/admin/service/id/'.$service_info->subCategoryId.'?categoryId='.$service_info->categoryId);?>">Edit</a> | <a href="<?php echo base_url('manage/admin/delete_service/id/'.$service_info->subCategoryId.'?categoryId='.$service_info->categoryId);?>" onClick="return confirm('Are you sure to delete the service ?')">Delete</a></td>							


							

                          </tr>

                         <?php } ?>

                        </tbody>

                      </table>

                    </div>

                  </div>

                  <div class="row">

                    <div class="col-sm-6">

                      <div class="dataTables_info" id="dataTables-example_info" role="status" aria-live="polite">Showing <?php echo $page_no+1;?> to <?php echo $last_record_per_page;?> of <?php echo $total_rows;?> entries</div>

                    </div>

                    <div class="col-sm-6">

                      <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">

                        <?php echo $links;?>

                      </div>

                    </div>

                  </div>

                </div>

              </div>

              <!-- /.table-responsive -->

            </div>

            <!-- /.panel-body -->

          </div>

          <!-- /.panel -->

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

<script>
$(document).ready(function(){

  $('.sort-order').blur(function(){
var sortOrder = $(this).val();
var id = $(this).attr('id');
var id_arr = id.split('-');
var subCategoryId = id_arr[1];
$.ajax({
      url: "<?php echo base_url('manage/admin/update_service_sort_order');?>",
      type: 'post',
      data: {'sortOrder': sortOrder,'subCategoryId':subCategoryId},
      crossDomain: true,
      success: function(response){
        
      }
       });
  });

});
</script>

<?php $this->load->view('manage/footer.php'); ?>

</body>

</html>

