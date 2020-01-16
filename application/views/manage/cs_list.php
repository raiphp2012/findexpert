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

                        <div class="row">
                    <div class="col-md-12">
                      <div id="dataTables-example_filter" class="dataTables_filter">
            <form name="frmCASearch" id="frmCASearch" method="get" action="<?php echo base_url('manage/admin/cs_list');?>">
                        <label>Name:
                        <input type="text" name="expertName" id="expertName" value="<?php echo $expertName;?>" class="form-control input-sm" placeholder="CA Name..." aria-controls="dataTables-example">
                        </label>
                        <label>Email:
                        <input type="text" name="expertEmailId" id="expertEmailId" value="<?php echo $expertEmailId;?>" class="form-control input-sm" placeholder="Email Address..." aria-controls="dataTables-example">
                        </label>
                         <label>Mobile:
                        <input type="text" name="expertMobileNumber" id="exexpertMobileNumber" value="<?php echo $expertMobileNumber;?>" class="form-control input-sm" placeholder="Mobile Number..." aria-controls="dataTables-example">
                        </label>
                         <label>
                         Location:
                       <select name="locationId" id="locationId" class="form-control input-sm">
                       <option value="">Location</option>
                       <?php foreach($location_list as $s){?>
                        <option value="<?php echo $s->locationId;?>" <?php if($locationId == $s->locationId){echo 'selected="selected"';}?>><?php echo $s->locationName;?></option>
                       <?php } ?>
                       </select>
                        </label>
<input type="submit" name="search" id="search" class="btn btn-outline btn-success" value="Search">
</form>
</div>
</div>
</div>

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

                            <th>Name</th>

							<th>Email</th>

							<th>Phone</th>

              <th>Location</th>
							
              <th>Sort By</th>
               <th>Verified</th>
							<th>Action</th>

                          </tr>

                        </thead>

                        <tbody>

						<?php 



						foreach($results as $ca_info){
              if($ca_info->expertId == '')continue;
              $location_info = $this->common->select_scaler_where("location",array("locationId"=>$ca_info->locationId));
              ?>

                          <tr class="gradeA odd" role="row">

                            <td><?php echo $ca_info->expertName;?></td>

							<td><?php echo $ca_info->expertEmailId;?></td>
							
							<td><?php echo $ca_info->expertMobileNumber;?></td>
              <td><?php echo $location_info->locationName;?></td>
							 <td><input type="text" name="sortBy[]" id="sort-<?php echo $ca_info->expertId;?>" value="<?php echo $ca_info->sortBy;?>" class="form-control sort-order"/></td>

                <td><input type="checkbox" name="isVerified[]" id="verified-<?php echo $ca_info->expertId;?>" value="1" class="verified" <?php if($ca_info->isVerified){echo "checked";}?> /></td>



							<td><a href="<?php echo base_url('manage/admin/cs/id/'.$ca_info->expertId);?>">View</a> | <a href="<?php echo base_url('manage/admin/appointment_list?expertId='.$ca_info->expertId);?>">Appointment</a> | <a href="<?php echo base_url('manage/admin/delete_cs/id/'.$ca_info->expertId);?>" onClick="return confirm('Are you sure to delete the CS ?')">Delete</a></td>

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
var sortBy = $(this).val();
var id = $(this).attr('id');
var id_arr = id.split('-');
var expertId = id_arr[1];
$.ajax({
      url: "<?php echo base_url('manage/admin/update_expert_sort_order');?>",
      type: 'post',
      data: {'sortBy': sortBy,'expertId':expertId},
      crossDomain: true,
      success: function(response){
        
      }
       });
  });

  $('.verified').click(function(){
    var isVerified = 0;
if($(this).is(':checked')){
  isVerified =1;
}
var id = $(this).attr('id');
var id_arr = id.split('-');
var expertId = id_arr[1];
$.ajax({
      url: "<?php echo base_url('manage/admin/update_expert_status');?>",
      type: 'post',
      data: {'isVerified': isVerified,'expertId':expertId},
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

