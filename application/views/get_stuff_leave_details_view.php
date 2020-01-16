<?php
/*
 * @author Visheshagya
 */

?>
<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="Visheshagya">

		<title>Expert E-Lockers, E-Dairy : Visheshagya</title>

		<!-- Bootstrap Core CSS -->
		<link href="<?php echo base_url() . 'css/bootstrap.css'; ?>" rel="stylesheet">
		<!-- Custom CSS -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/simplebar.css" rel="stylesheet">
		<link href="<?php echo base_url() ; ?>css/style.css" rel="stylesheet">
		<link href="<?php echo base_url() ; ?>css/two-column.css" rel="stylesheet">
		<link href="<?php echo base_url() ; ?>css/responsive.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/font.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
		<!-- jQuery -->
		<script src="<?php echo base_url() . 'js/jquery.min.js'; ?>"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$("#ChangePassword").click(function () {
					$("#myModalChangePassword").modal('show');
				});
			});

		</script>
		
	</head>
	<body>

			<?php include('expertnav.php') ?>


			<div class="wide">
				<div class="container">
					<div class="page-header">
						<h1>Stuff Leaves  Details</h1>
					</div>
				</div>
			</div>

			<!-- body content --> 
			<div class="content-full-height">       
			<div class="two-column-con">
				<div class="container appointment-status">
					
					 <?php if( $feedback = $this->session->flashdata('feedback')):
											$feedback_class = $this->session->flashdata('feedback_class');
											 ?>
												<div class="row">
												<div class="col-lg-6 col-lg-offset-3">
												<div class="alert alert-dismissible <?= $feedback_class ?>">
												<?= $feedback ?>
													
												</div>
													
												</div>
													
												</div>
											<?php endif; ?>
					<div id="exTab2" class="frm-detail ">
						<div class="tab-content myOffice">
							<div class="tab-pane active"> 
								<div >
									<div class="panel" >
											<div class="panel-heading">Leave Details
												<a href="<?php echo base_url();?>/MyOffice/apply_leave_form" class="btn btn-primary e-dairy pull-right add-btn" style="margin-bottom: 0;" >Apply Leave <i class="fa fa-plus"></i></a>

											</div>	 
										
<!-- <a	href="<?php echo base_url().'MyOffice/getServicesDetails'; ?>" class="btn btn-info">Worked Status Details</a>
<a	href="<?php echo base_url().'MyOffice';?>" class="btn btn-info">Clients Details</a>
<a	href="<?php echo base_url().'MyOffice/get_stuff_personal_details';?>" class="btn btn-info">Staff Details</a>
<a	href="<?php echo base_url().'MyOffice/get_user_time_off'; ?>" class="btn btn-info">Leaves Details</a> -->
									<!-- <div class="office-nav">
										<a href="<?php echo base_url().'MyOffice/getServicesDetails'; ?>" class="btn">SRN</a>
										<a href="#" class="btn" rel="popover" data-popover-content="#client" data-placement="bottom">CLIENT</a>
										<div id="client" class="hide pop-nav">
											<ul>
												<li><a href="<?php echo base_url().'MyOffice';?>" class="btn">Personal Details</a></li>
												<li><a href="<?php echo base_url().'MyOffice/reminder_details'; ?>" class="btn">Reminder</a></li>
											</ul>
										</div>
										<a href="#" class="btn" rel="popover" data-popover-content="#staff" data-placement="bottom">STAFF</a>
										<div id="staff" class="hide pop-nav">
											<ul>
												<li><a href="<?php echo base_url().'MyOffice/get_stuff_personal_details';?>" class="btn">Staff Details</a></li>
												<li><a href="<?php echo base_url().'MyOffice/get_user_time_off'; ?>" class="btn">Leave Details</a></li>
											</ul>
										</div>
										<a href="#" class="btn" rel="popover" data-popover-content="#calendar" data-placement="bottom">CALENDAR</a>
										<div id="calendar" class="hide pop-nav">
											<ul>
												<li><a href="<?php echo base_url().'MyOffice/calender'; ?>" class="btn">My</a></li>
												<li><a href="" class="btn">Staff</a></li>
											</ul>
										</div>
									</div> -->
									 <div class="appointment-status" data-simplebar-direction="vertical" style="height: 450px;">
										<?php
                                                    if (null != $this->session->flashdata('UpdateMessage')) {
                                                        ?>
                                                        <div class="alert alert-success">
                                                            <strong>Success!</strong><?php echo $this->session->flashdata('UpdateMessage'); ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
									
												<table id="example" class="table">
												<thead>
													<th>Sr.No</th>
													<th>Name</th>
													<th>Leave Start Date</th>
													<th>Leave End Date</th>
													<th>No of Days</th>
													<th>Status</th>
													<th>Applied Date</th>
													<th>Action</th>


												</thead>
												 <tbody>
												 	<?php 
												 
												 	if(!empty($leaveDetails)){
												 		
												 		for ($i=0; $i <count($leaveDetails) ; $i++) { 
												 			
												 	?>
													<tr>
														<td><?php echo $i+1; ?></td>
													<td><?php echo $leaveDetails[$i]->expertName; ?></td>
													<td>
														<?php echo $leaveDetails[$i]->leave_start_date; ?>												</td>
													<td>
														<?php echo $leaveDetails[$i]->leave_end_date; ?>
													</td>
													<td>
														<?php echo $leaveDetails[$i]->no_of_days; ?>
													</td>
													<td>
														<?php echo $leaveDetails[$i]->leave_status; ?>
													</td>
													<td>
														<?php echo $leaveDetails[$i]->applied_date; ?>
													</td>
													
													<td>
														
														<a href="<?php echo base_url().'MyOffice/edit_stuff_leave_details/'.$leaveDetails[$i]->leave_id;?>" >Edit</a>|
														<a href="#" >Details</a>
													 
													</div>
													   </div>
														
<!--                                                       <button class="btn btn-danger">Delete</button>
 -->                                                    </td>
														
													</tr>
													<?php 

														}
												 	}	
												 	else{


													?>
												
													<tr>
													<td colspan="4">
														No records found
														</td>
													</tr>
													<?php } ?>
													
												 </tbody>
												</table>
											</div>
											</div>
										


										
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>      
				</div>
			<!-- end body content -->
 
		</div>
		<!-- Footer -->
		<?php include('loginFooter.php') ?>
		<!-- <footer>
			<div class="container text-center">
				<p>Copyright &copy; Visheshagya 2016</p>
			</div>
		</footer> -->
		<!-- Bootstrap Core JavaScript -->
		<script src="<?php echo base_url() . 'js/bootstrap.min.js'; ?>"></script>
        <script src="<?php echo base_url() ?>js/simplebar.js"></script>
         <script src="<?php echo base_url() . 'js/jquery.smartmenus.min.js'; ?>"></script>
        <script src="<?php echo base_url() . 'js/jquery.smartmenus.bootstrap.min.js'; ?>"></script>
	  <script src=<?php echo base_url() . "assets/js/script.js"; ?>></script>
	  <script type="text/javascript">
	  	$(function(){
		    $('[rel="popover"]').popover({
		        container: 'body',
		        html: true,
		        trigger:'focus',
		        content: function () {
		            var clone = $($(this).data('popover-content')).clone(true).removeClass('hide');
		            return clone;
		        }
		    }).click(function(e) {
		        e.preventDefault();
		    });
		});
	  </script>
	</body>
</html>