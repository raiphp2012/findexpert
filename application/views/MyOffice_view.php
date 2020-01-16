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
		<!-- <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo base_url(); ?>Expert/mainexpertHome"><div class="logo"></div></a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right navigation">
						<?php if($this->session->userdata('parent_id')==0){ ?>
							<li><a href="<?php echo base_url(); ?>ExpertProfile/updateMyMember">My  Practice</a></li>
						<?php } ?>
						<li class="active"><a href="#">My Office <span class="caret"></span></a>
				            <ul class="dropdown-menu">
				                <li>
				                	<a href="#">CLIENT<span class="caret"></span></a>
				                	<ul class="dropdown-menu">
				                      	<li><a href="<?php echo base_url().'MyOffice';?>">Personal Details</a></li>
				                      	<li><a href="<?php echo base_url().'MyOffice/reminder_details'; ?>">Reminder</a></li>
				                    </ul>
				                  	<li><a href="<?php echo base_url().'MyOffice/getServicesDetails'; ?>">SRN</a></li>
									<li><a href="#">STAFF<span class="caret"></span></a>
					                    <ul class="dropdown-menu">
					                      	<li><a href="<?php echo base_url().'MyOffice/get_staff_personal_details';?>">Staff Details</a></li>
					                      	<li><a href="<?php echo base_url().'MyOffice/get_user_time_off'; ?>">Leave Details</a></li>
					                    </ul>
					                </li>
					                <li><a href="#">CALENDAR<span class="caret"></span></a>
					                    <ul class="dropdown-menu">
					                      	<li><a href="<?php echo base_url().'MyOffice/calender'; ?>">My</a></li>
					                      	<li><a href="#">Staff</a></li>
					                    </ul>
					                </li>
					            </li>
				            </ul>
				        </li>
						<li><a href ="<?php echo base_url().'ExpertAppointments'; ?>" >My Appointments</a></li>
						<li><a href="<?php echo base_url().'ExpertDocument'; ?>">E-Lockers</a></li>
						<li><a href="<?php echo base_url().'ExpertProfile';?>" >My Profile</a></li>
						<li class="dropdown">
							<a class="btn dropdown-toggle profile-img" data-toggle="dropdown" href="#">
								<img src="<?php $profileImage=$this->session->userdata('profileImage');echo $profileImage;?>" class="img-responsive img-circle img-thumbnail" width="50px" height="10px;">
							</a>
							<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
								<li><a href="<?php echo base_url() ?>Logout" class="btn btn-danger btn-xs" role="button" data-toggle="modal">Logout</a></li>
							</ul>
						</li>
					</ul>
				</div>   
			</div>
		</nav> -->

			<div class="wide">
				<div class="container">
					<div class="page-header">
						<h1>My Client</h1>
					</div>
				</div>
			</div>

			<!-- body content --> 
			<div class="content-full-height">       
			<div class="two-column-con">
				<div class="container appointment-status">
					<?php
					if (null != $this->session->flashdata('ShareSuccessful')) {
						?>
						<div class="alert alert-success">
							<strong>Success!</strong><?php echo $this->session->flashdata('ShareSuccessful'); ?>                    
						</div>
						<?php
					}
					if (null != $this->session->flashdata('DeleteSuccessful')) {
						?>
						<div class="alert alert-danger">
							<strong>Error!</strong><?php echo $this->session->flashdata('DeleteSuccessful'); ?>
						</div>
						<?php
					}
					if (null != $this->session->flashdata('FolderCreateSuccessMessage')) {
						?>
						<div class="alert alert-success">
							<strong>Success!</strong><?php echo $this->session->flashdata('FolderCreateSuccessMessage'); ?>
						</div>
						<?php
					}
					if (null != $this->session->flashdata('FolderCreateErrorMessage')) {
						?>
						<div class="alert alert-danger">
							<strong>Error!</strong><?php echo $this->session->flashdata('FolderCreateErrorMessage'); ?>
						</div>
						<?php
					}
					?>

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
											<div class="panel-heading">My-Client
												<a href="#" class="btn btn-primary e-dairy pull-right add-btn" id="expertClientAdd">Add New<i class="fa fa-plus"></i></a>
											</div>
										<!-- <a	href="<?php echo base_url().'MyOffice/getServicesDetails'; ?>" class="btn btn-info">Worked Status Details</a>
										<a	href="<?php echo base_url().'MyOffice';?>" class="btn btn-info">Clients Details</a>
										<a	href="<?php echo base_url().'MyOffice/get_staff_personal_details';?>" class="btn btn-info">Staff Details</a>
										<a	href="<?php echo base_url().'MyOffice/get_user_time_off'; ?>" class="btn btn-info">Leaves Details</a>
										<a	href="<?php echo base_url().'MyOffice/calender'; ?>" class="btn btn-info">Manage Your Calender</a>
										<a	href="<?php echo base_url().'MyOffice/reminder_details'; ?>" class="btn btn-info">Reminder Details</a> -->

								 			<form class="form-horizontal well" action="<?php echo base_url(); ?>ExpertProfile/import" method="post" name="upload_excel" enctype="multipart/form-data">
											<input type="file" name="file" id="file" class="input-large custom-file-input" required="true">

											<button type="submit"  name="Import" class="btn upload-btn">Upload</button>
											<div>
											<a href="<?php base_url();?>assets/client_personal_details.csv" download>Download Sample Here</a>
											</div>
										</form>
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
													<th>Name</th>
													<th>Email</th>
													<th>Mobile</th>
													<th>Services Taken</th>
													<th>Action</th>
												</thead>
												 <tbody>
												 <?php
												 error_reporting(0);
												 if( count($clientList) ):
													$count = $this->uri->segment(3, 0);

												
												  foreach($clientList as $clientLists ): ?>
													<tr>
													<td><?= ++$count ?></td>
													<td>
														<?= $clientLists->clientName ?>
													</td>
													<td>
														<?= $clientLists->clientEmailId ?>
													</td>
													<td>
														<?= $clientLists->clientMobileNumber ?>
													</td>
													<td>
														<?= $clientLists->serviceName ?>
													</td>
													
													<td>
														<a href="<?php echo base_url().'MyOffice/client_store/'.$clientLists->clientId; ?>" class="black"><i class="material-icons">edit</i></a>
														<a href="<?php echo base_url().'MyOffice/delete_client/'.$clientLists->clientId; ?>"  onclick="return confirm('Are you sure you want to delete this client. ?');" class="red"><i class="material-icons">delete</i></a>
														<a href="<?php echo base_url() ?>MyOffice/ExpertBookingAppointment/<?php echo  $clientLists->clientId; ?>"><i class="material-icons">event</i></a>
													 
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
		<!-- <footer>
			<div class="container text-center">
				<p>Copyright &copy; Visheshagya 2016</p>
			</div>
		</footer> -->
		<?php include('popUp/NoAppointmentRecord_view.php'); ?>
		<?php include('popUp/ShareFileDetails_view.php'); ?>
		<?php include('popUp/UploadFileExpert_view.php'); ?>
		<!-- Bootstrap Core JavaScript -->
		<script src="<?php echo base_url() . 'js/bootstrap.min.js'; ?>"></script>
		<script src="<?php echo base_url() . 'js/jquery.smartmenus.min.js'; ?>"></script>
		<script src="<?php echo base_url() . 'js/jquery.smartmenus.bootstrap.min.js'; ?>"></script>

		
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
        <script src="<?php echo base_url();?>js/simplebar.js"></script>
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
	  <script type="text/javascript">
	  	$(document).ready(function(){
		$('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
			event.preventDefault(); 
			event.stopPropagation(); 
			$(this).parent().siblings().removeClass('open');
			$(this).parent().toggleClass('open');
		});
	});
	  </script>
	</body>
</html>