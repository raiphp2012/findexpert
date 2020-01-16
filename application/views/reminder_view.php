<?php
/*
 * @author Visheshagya
 */
?>
<!DOCTYPE HTML  PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html lang="en">
    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <meta name="author" content="Visheshagya">
        <meta name="description" content="Visheshagya is an ecommerce portal for search and video/audio appointment with various experts like CA,CS,CMA,Lawyers etc.">
        <meta name="keywords" content="CA,CS,CMA,Lawyers,CA in India,CS in India,CMA  in India,Lawyer in India">

        <title>Client Personal Details : Visheshagya</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url() . 'css/bootstrap.css'; ?>" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?php echo base_url() . 'css/style.css'; ?>" rel="stylesheet">
        <link href="<?php echo base_url() . 'css/two-column.css'; ?>" rel="stylesheet">
        <link href="<?php echo base_url() . 'css/responsive.css'; ?>" rel="stylesheet">
        <!-- jQuery -->
        <script src="<?php echo base_url() . 'js/jquery.min.js'; ?>"></script>

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-datetimepicker.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" type="text/css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Heebo:400,700|Oswald:400,700" type="text/css" media="all">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">
		<link href="<?php echo base_url(); ?>assets/css/font.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
		
		
		<!--[if lt IE 9]>
				<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
        

 
    </head>

    <body>
        <?php include('expertnav.php') ?>
    	<!-- <div class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo base_url(); ?>"><div class="logo"></div>
					<div class="logo_text">TAX & LEGAL SERVICES REDEFINED</div></a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
					<li ><a href="<?php echo base_url() .'Expertdetails'; ?>" >Home</a></li>   
					<li class="active"><a href="<?php echo base_url() .'Expertdetails/search/1'; ?>" >Expert Search</a></li>
						<li><a  
							<?php
							if (empty($this->session->userdata('clientId'))) {
								?> 
									role="button"
									class="launch-modal"
									href="#"  
									data-modal-id="modal-login" data-modal-value="<?php echo base_url() . 'ClientAppointments'; ?>"
								<?php
								}
								if (!empty($this->session->userdata('clientId'))) {
									?>
									href="<?php echo base_url() . 'ClientAppointments'; ?>"
									<?php
								}
								?>
								> My Appointment </a></li>
								<li> <a  <?php
									if (empty($this->session->userdata('clientId'))) {
										?> 
											role="button"
											class="launch-modal"
											href="#"  
											data-modal-id="modal-login" data-modal-value="<?php echo base_url() . 'ClientDocument'; ?>"
										<?php
										}
										if (!empty($this->session->userdata('clientId'))) {
											?>
											href="<?php echo base_url() . 'ClientDocument'; ?>"
											<?php
										}
										?>
										>E-Lockers</a></li>
										<li><a  <?php
											if (empty($this->session->userdata('clientId'))) {
												?> 
													role="button"
													class="launch-modal"
													href="#"  
													data-modal-id="modal-login" data-modal-value="<?php echo base_url() . 'ClientProfile'; ?>"
												<?php
												}
												if (!empty($this->session->userdata('clientId'))) {
													?>
													href="<?php echo base_url() . 'ClientProfile'; ?>"
													<?php
												}
												?>
												>My Profile</a></li>
						<li><?php
							if (empty($this->session->userdata('clientId'))) {
								?> 
								<a  role="button"
									class="launch-modal"
									href="#"  
									data-modal-id="modal-login" data-modal-value="<?php echo base_url(uri_string()); ?>">Login</a>
									<?php }
									
							if(!empty($this->session->userdata('clientId')))
							{
							?>
							<a href="<?php echo base_url() ?>ClientHome/logout">Logout</a> 
							<?php
							}
							?></li>
					</ul>
				</div>
			</div>
		</div> -->
		<div class="wide">
			<div class="container">
				<div class="page-header">
					<h1>Reminder details</h1>
				</div>
			</div>
		</div>


            <!-- <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" id="logo" href="<?php echo base_url() . 'ClientProfile'; ?>"></a> 
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">

                            <div class="top-nav-tab downarrow">
                                <ul class="nav nav-tabs">
                                    <li><a style="cursor: pointer"onclick="location.href = 'ExpertAppointments';" data-toggle="tab">My Appointments</a></li>
                                    <li><a style="cursor: pointer"onclick="location.href = 'ExpertDocument';" data-toggle="tab">E-Lockers</a></li>
                                    <li class="active"><a style="cursor: pointer"onclick="location.href = 'ExpertProfile';" data-toggle="tab">My Profile</a></li>
                                    <li><a style="cursor: pointer"onclick="location.href = 'MyOffice';" data-toggle="tab">My Office</a></li>
                            <?php include('clientProfileIconMenu.php'); ?>                                    
                                </ul>
                            </div>
                        </ul>
                    </div>
                </div>
            </nav> -->
            <!-- body content -->  
            <div class="content-full-height booking-appointment-form">      
            <div class="two-column-con">
                <div class="container booking-form-wrapper" style="max-width: 70%">
                    <div id="exTab2" class="frm-detail">                    
                        <div class="tab-pane downarrow" id="top4">
                            <ul class="nav nav-tabs">
                                <li><a style="cursor: pointer;display: none;"onclick="location.href = 'ClientProfile/accounts';" data-toggle="tab">Accounts</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active">
                                <div class="main-content detail-view">
                                    <div class="detail-view-cont">
                                        <?php //echo form_open(base_url() . "MyOffice/client_update/{$clientEdit->clientId}", ['class' => 'form-horizontal']) ?>
                                        <form class="form-horizontal" method="post" action="<?php echo base_url();?>MyOffice/add_reminder_details" enctype="multipart/form-data">
                                       
                                            <fieldset>
                                                <div id="personalDataTab">
                                                    <!-- Form Name -->
                                                     <div class="col-md-12 form-wrapper">
                                                     <div class="alert alert-info text-center">Add Reminders</div>
                                                  <div class="col-md-12 pad0">
                                                    <div class="form-group col-md-6 pad0">
                                                 <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Services Type:</label>  
                                                            <div class="col-md-8">
        
                                                               <select name="services_type" class="form-control">
                                                                <option>Income Tax</option>
                                                                <option>VAT</option>
                                                                <option>Servies</option>
                                                               </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="col-md-6 pad0">
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput"> First Reminder date:</label>  
                                                            <div class="col-md-8">
                                                                <input type="date" name="first_reminder_date" class="form-control" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">First Reminder Mode:</label>  
                                                            <div class="col-md-8">
                                                            <select name="first_reminder_type" class="form-control">
                                                                <option>None</option>
                                                                <option>SMS</option>
                                                                <option>Email</option>
                                                                <option>Both</option>
                                                               </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput"> Second Reminder date:</label>  
                                                            <div class="col-md-8">
                                                                <input type="date" name="second_reminder_date" class="form-control" >
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Second Reminder Mode:</label>  
                                                            <div class="col-md-8">
                                                            <select name="second_reminder_type" class="form-control">
                                                                <option>None</option>
                                                                <option>SMS</option>
                                                                <option>Email</option>
                                                                <option>Both</option>
                                                               </select>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    <div class="col-md-6 pad0">
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput"> Third Reminder date:</label>  
                                                            <div class="col-md-8">
                                                                <input type="date" name="third_reminder_date" class="form-control" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Third Reminder Mode:</label> 
                                                            <div class="col-md-8"> 
                                                            <select name="third_reminder_type" class="form-control">
                                                                <option>None</option>
                                                                <option>SMS</option>
                                                                <option>Email</option>
                                                                <option>Both</option>
                                                               </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput"> Fourth Reminder date:</label>  
                                                            <div class="col-md-8">
                                                                <input type="date" name="fourth_reminder_date" class="form-control" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Fourth Reminder Mode:</label>  
                                                            <div class="col-md-8">
                                                            <select name="fourth_reminder_type" class="form-control">
                                                                <option>None</option>
                                                                <option>SMS</option>
                                                                <option>Email</option>
                                                                <option>Both</option>
                                                               </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <div class="col-md-12 text-center form-group">                               
                                                    <button class="btn btn-sm btn-primary" style="text-align: center;">Add</button>
                                                    <button class="btn btn-sm btn-primary" style="text-align: center;background-color: red;">Cancel </button>                                            
                                                </div>
                                                 </div>
                                                </div>      
											
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>      
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end body content -->
        <!-- Footer -->
        
        <?php include('loginFooter.php') ?>
        <script src="<?php echo base_url() . 'js/bootstrap.min.js'; ?>"></script>
        <script src="<?php echo base_url() . 'js/jquery.smartmenus.min.js'; ?>"></script>
        <script src="<?php echo base_url() . 'js/jquery.smartmenus.bootstrap.min.js'; ?>"></script>
        <script src=<?php echo base_url() . "assets/js/script.js"; ?>></script>
        <?php
        include('analytics/googleAnalytics.php');
        include('popUp/clientChangePassword_view.php');
        ?>     

    </body>
</html>