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
						<h1>Services  Details</h1>
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
											<div class="panel-heading">Service Request Number
												<a href="<?php echo base_url();?>/MyOffice/generateServicesRequestNumber" class="btn btn-primary e-dairy pull-right add-btn" style="margin-bottom: 0;" >Add New<i class="fa fa-plus"></i></a>
											</div>

										
								<!-- <a	href="<?php echo base_url().'MyOffice/getServicesDetails'; ?>" class="btn btn-info">Worked Status Details</a> -->
<!-- <a	href="<?php echo base_url().'MyOffice';?>" class="btn btn-info">Clients Details</a>
<a	href="<?php echo base_url().'MyOffice/get_stuff_personal_details';?>" class="btn btn-info">Staff Details</a>
<a	href="<?php echo base_url().'MyOffice/get_user_time_off'; ?>" class="btn btn-info">Leaves Details</a>	 -->				
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
									
												<table id="example" class="table">
												<thead>
													<th>Sr.No</th>
													<th>clientName </th>
													<th>Service Name</th>
													<th>Team Member Name</th>
													<th>status</th>
													<th>mode</th>
													<th>created_date</th>
													<th>modified_date</th>
													<th>Action</th>


												</thead>
												 <tbody>
												 <?php
												 error_reporting(0);
												 if( count($ServicesDetails) ):
													$count = $this->uri->segment(3, 0);
												  foreach($ServicesDetails as $ServicesData ): ?>
													<tr>
													<td><?= ++$count ?></td>
													<td>
														<?= $ServicesData->clientName ?>
													</td>
													<td>
														<?= $ServicesData->serviceName ?>
													</td>
													<td>
														<?= $ServicesData->expertName ?>
													</td>
													<td>
														<?= $ServicesData->statusName ?>
													</td>
													<td>
														<?= $ServicesData->modeName ?>
													</td>
													<td>
														<?= $ServicesData->created_date ?>
													</td>
													<td>
														<?= $ServicesData->modified_date ?>
													</td>
													
													<td>
														<a href="#" class="black"><i class="material-icons">action</i></a>
											
														<a href="<?php echo base_url().'MyOffice/getServicesRequestDetails/'.$ServicesData->srn_id.'/'.$ServicesData->clientId;?>"><i class="material-icons">event</i></a>
													 
													</div>
													   </div>
														
<!--                                                       <button class="btn btn-danger">Delete</button>
 -->                                                    </td>
														
													</tr>
													<?php
													endforeach; ?>
												<?php else: ?>
													<tr>
													<td colspan="4">
														No records found
														</td>
													</tr>
													<?php
													endif;
													?>
													
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
			
			<?php
		 include('popUp/eDairy.php');
		 ?>

		 <script>
						$(document).ready(function () {
							$("#eDairy").click(function () {
								$("#eDairyModal").modal('show');
							});
						});
		 </script>

		 <?php
		include('popUp/expertClientAdd_view.php');
		 ?>

		  <script type="text/javascript">
			$(document).ready(function () {
				$("#expertClientAdd").click(function () {
					$("#expertClientAddModal").modal('show');
				});
			});
		</script>
		<?php
		include('popUp/clientEdit.php');
		?>
		<script>

			$(document).ready(function () {
				$("#clientEdit").click(function () {
					$("#clientEditModel").modal('show');
				});
			});
			
		</script>
		 
		</div>
		<!-- Footer -->

		<?php include('loginFooter.php') ?>
		<?php include('popUp/NoAppointmentRecord_view.php'); ?>
		<?php include('popUp/ShareFileDetails_view.php'); ?>
		<?php include('popUp/UploadFileExpert_view.php'); ?>
		<!-- Bootstrap Core JavaScript -->
		<script src="<?php echo base_url() . 'js/bootstrap.min.js'; ?>"></script>

		
	 <?php
		if (NULL !== $this->session->userdata('expertChangePasswordSuccess')) {
			include('popUp/expertChangePasswordSuccess_view.php');
			?>
			<script>
				$("#changeSuccessMessage").modal('show');
			</script>
			<?php
		}
		if (NULL !== $this->session->userdata('expertChangePasswordError')) {
			// echo $this->session->flashdata('expertLoginError');
			include('popUp/expertChangePasswordError_view.php');
			?>
			<script>
				$("#expertChangePasswordError").modal('show');
			</script>
			<?php
		}
		?>
		<?php 
		include('popUp/ChangePassword_view.php');
		include('analytics/googleAnalytics.php');
		 ?>
        <script src="<?php echo base_url(); ?>js/simplebar.js"></script>
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