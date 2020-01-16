<?php
/*
 * @author Visheshagya
 */

?>
<!DOCTYPE html>
<html lang="en">
	<head>
<link type="text/css" href="/cometchat/cometchatcss.php" rel="stylesheet" charset="utf-8">

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

			<nav class="navbar navbar-default navbar-fixed-top">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="<?php echo base_url(); ?>Expert/mainexpertHome"><div class="logo"></div>
						 <div class="logo_text">TAX & LEGAL SERVICES REDEFINED</div></a>
					</div>
					<div id="navbar" class="navbar-collapse collapse">
						<ul class="nav navbar-nav navbar-right">
							
							<div class="top-nav-tab downarrow">
								<ul class="nav nav-tabs">
								<?php if($this->session->userdata('parent_id')==0){ ?>
									 <li><a href="<?php echo base_url(); ?>ExpertProfile/updateMyMember">
									 My  Practice</a></li>
									
									<?php } ?>
									<li><a href = "<?php echo base_url().'MyOffice'; ?>">My Office</a></li>
									<li><a href ="<?php echo base_url().'ExpertAppointments'; ?>" >My Appointments</a></li>
									<li><a href="<?php echo base_url().'ExpertDocument'; ?>">E-Lockers</a></li>
									<li><a href="<?php echo base_url().'ExpertProfile';?>" >My Profile</a></li>
									<li>
								<div class="dropdown">
									<!--to display profile images-->
									<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
										<img src="<?php 
										 $profileImage=$this->session->userdata('profileImage');
										  echo $profileImage;
										?>" class="img-responsive img-circle img-thumbnail" width="50px" height="10px;">
									</a>
									<!--END to display profile images -->
									<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
										
										<li> </li>
										
										<li><a href="<?php echo base_url() ?>Logout" class="btn btn-danger btn-xs" role="button" data-toggle="modal">Logout</a></li>
									</ul>
								</div>
							</li>
								</ul>
							</div>
						</ul>
					</div>   
				</div>
			</nav>

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

							 			<form class="form-horizontal well" action="<?php echo base_url(); ?>ExpertProfile/import" method="post" name="upload_excel" enctype="multipart/form-data">
											<input type="file" name="file" id="file" class="input-large custom-file-input" required="true">

											<button type="submit"  name="Import" class="btn upload-btn">Upload</button>
											<div>
											<a href="<?php base_url();?>assets/client_personal_details.csv" download>Download Sample Here</a>
											</div>
										</form>
										
											
									 <div class="appointment-status" data-simplebar-direction="vertical" style="height: 450px;">
									
												<table id="example" class="table">
												<thead>
													<th>Sr.No</th>
													<th>Name</th>
													<th>Email</th>
													<th>Mobile</th>
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

		<footer>
			<div class="container text-center">
				<p>Copyright &copy; Visheshagya 2016</p>
			</div>
		</footer>
		<?php include('popUp/NoAppointmentRecord_view.php'); ?>
		<?php include('popUp/ShareFileDetails_view.php'); ?>
		<?php include('popUp/UploadFileExpert_view.php'); ?>
		<!-- Bootstrap Core JavaScript -->
		<script src="<?php echo base_url() . 'js/bootstrap.min.js'; ?>"></script>

		<script>
													function showUploadFom()
													{
														$("#UploadFileExpert").modal('show');
													}
													function fetchExistingClientList(path, fileName)
													{
														$.ajax(
																{
																	url: <?php echo "'" . base_url() . 'Ajaxcalls/fetchExistingClientList' . "'"; ?>,
																	type: 'POST',
																	data: {'expertId': <?php echo $this->session->userdata('expertId'); ?>, 'fileName': fileName, 'path': path},
																	success: function (clientcount)
																	{
																		if (clientcount != -1)
																		{
																			var clientList = JSON.parse(clientcount);
																			var checkboxes = '';
																			$("#fileName").val(fileName);
																			$.each(clientList, function (i, item)
																			{
																				checkboxes += '<div class="checkbox"><label for="checkboxes-0"><input type="checkbox" name="clientId[]" value=' + clientList[i].clientId + '>' + clientList[i].clientName + '</label></div>';
																			});
																			document.getElementById('clientName').innerHTML = checkboxes;
																			$("#path").val(path);
																			$("#SharedFileDetailsPop").modal('show');
																		} else
																		{
																			$("#noAppointmentRecord").modal('show');
																		}
																	}
																});
													}
													function shareExpertDocument()
													{
														var path = $("#path").val();
														var fileName = $("#fileName").val();
														var clientId = document.getElementsByName("clientId");
														$.ajax({
															url:<?php echo "'" . base_url() . 'Ajaxcalls/shareExpertDocument' . "'"; ?>,
															type: 'POST',
															data: {'clientId': clientId, 'fileName': fileName, 'path': path},
															success: function (shareStatus) {
																return false;
																window.location.reload(true);
															}
														});
													}
													function deleteExpertDocument(path, fileName)
													{
														if (confirm("Are you sure to delete this file") == true)
														{
															$.ajax({
																url:<?php echo "'" . base_url() . 'Ajaxcalls/deleteExpertDocument' . "'"; ?>,
																type: 'POST',
																data: {'expertId': '<?php echo $this->session->userdata('expertId'); ?>', 'fileName': fileName, 'path': path},
																success: function (deleteStatus) {
//                                                                    return true;
																	window.location.reload(true);
																}
															});
														}
													}
													function showCreateFolder()
													{
														$("#createFolderForm").show();
													}
		</script>
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
        <script src="js/simplebar.js"></script>
	  <script src=<?php echo base_url() . "assets/js/script.js"; ?>></script>
	</body>
</html>