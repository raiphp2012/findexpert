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
						<h1>Reminders Details</h1>
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
											<div class="panel-heading">Reminders Details
												<a href="<?php echo base_url();?>/MyOffice/reminder" class="btn btn-primary e-dairy pull-right add-btn" style="margin-bottom: 0">Add New<i class="fa fa-plus"></i></a>
											</div>
										<!-- <a	href="<?php echo base_url().'MyOffice/getServicesDetails'; ?>" class="btn btn-info">Worked  Status Details</a>
										<a	href="<?php echo base_url().'MyOffice';?>" class="btn btn-info">Clients Details</a>
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
									
												<table id="example" class="table">
												<thead>
													<th>Sr.No</th>
													<th>Services type</th>
													<th>First Reminder Date</th>
													<th>First Reminder Mode</th>
													<th>Second Reminder Date</th>
													<th>Second Reminder Mode</th>
													<th>Third Reminder Date</th>
													<th>Third Reminder Mode</th>
													<th>Fourth Reminder Date</th>
													<th>Fourth Reminder Mode</th>
													<th>Action</th>


												</thead>
												 <tbody>
												 	<?php 
												 
												 	if(!empty($reminder_details)){
												 		
												 		for ($i=0; $i <count($reminder_details) ; $i++) { 
												 			
												 	?>
													<tr>
														<td><?php echo $i+1; ?></td>
													<td><?php echo $reminder_details[$i]->services_type; ?></td>
													<td>
														<?php echo $reminder_details[$i]->first_reminder_date; ?>												</td>
													<td>
														<?php echo $reminder_details[$i]->first_reminder_type; ?>
													</td>
													<td>
														<?php echo $reminder_details[$i]->second_reminder_date; ?>
													</td>
													<td>
														<?php echo $reminder_details[$i]->second_reminder_type; ?>
													</td>
													<td>
														<?php echo $reminder_details[$i]->third_reminder_date; ?>												</td>
													<td>
														<?php echo $reminder_details[$i]->third_reminder_type; ?>
													</td>
													<td>
														<?php echo $reminder_details[$i]->fourth_reminder_date; ?>
													</td>
													<td>
														<?php echo $reminder_details[$i]->fourth_reminder_type; ?>
													</td>
													
													<td>
														
														<a href="<?php echo base_url().'MyOffice/edit_reminder_details/'.$reminder_details[$i]->reminder_id;?>" >Edit</a>|
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