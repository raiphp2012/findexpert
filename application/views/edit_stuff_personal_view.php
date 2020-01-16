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
                                            <li><a href="<?php echo base_url().'MyOffice/get_stuff_personal_details';?>">Staff Details</a></li>
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
					<h1>Update the Personal Details User/Team Member</h1>
				</div>
			</div>
		</div>

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
                                        <form class="form-horizontal" method="post" action="<?php echo base_url();?>MyOffice/update_stuff_personal_details" enctype="multipart/form-data">
                                       
                                            <fieldset>
                                                <div id="personalDataTab">
            
                                                    <!-- Form Name -->
                                                     <div class="col-md-12 form-wrapper">
                                                   <div class="alert alert-info text-center">Edit Personal Details</div>
                                                    <div class="col-md-12 pad0">
                                                        <div class="col-md-6 pad0">
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">User Name</label>  
                                                            <div class="col-md-8">
                                                                <input type="hidden" name="stuff_id" class="form-control" value="<?php echo $personalData->stuff_id;?>">
                                                               
                                                                <input type="text" name="username" class="form-control" value="<?php echo $personalData->stuff_name;?>">
                                                               
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                        <div class="col-md-6 pad0">
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">User Email/Login</label>  
                                                            <div class="col-md-8">
                                                               <input type="text" name="useremail" class="form-control" value="<?php echo $personalData->stuff_email;?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">User Phone:</label>  
                                                            <div class="col-md-8">
                                                                <input type="text" name="contact_number" class="form-control" value="<?php echo $personalData->contact_number;?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">User/Stuff Type </label>  
                                                            <div class="col-md-8">
                                       						<select class="form-control" name="staff_type">
                                       							<option <?php if($personalData->staff_type=="FULL TIME"){echo "selected"; }?>>FULL TIME</option>
                                       							<option <?php if($personalData->staff_type=="PART TIME"){echo "selected"; }?>>PART TIME </option>
                              
                                       						</select>	
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 pad0">
                                                         <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Monthly Salary</label>  
                                                            <div class="col-md-8">
                											<input class="form-control" type="text" name="salary" value="<?php echo $personalData->month_salary;?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Date of Joining</label>  
                                                            <div class="col-md-8">
                											<input type="date" class="form-control" name="doj" value="<?php echo $personalData->date_joining;?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                   <label class="col-md-4 control-label" for="textinput">Status</label>  
                                                            <div class="col-md-8">
                                                            <select class="form-control" name="staff_status">
                                                                <option value="1" <?php if($personalData->status=="1"){echo "selected"; }?> >Active</option>
                                                                <option value="0" <?php if($personalData->status=="0"){echo "selected"; }?>>De-active</option>
                              
                                                            </select>   
                                                            </div>
                                                        </div>

                                                 </div>
                                                 <div class="col-md-12 text-center form-group">                               
                                                    <button class="btn btn-sm btn-primary">Update</button>
                                                    <button class="btn btn-sm btn-primary" style="background-color: red">Cancel </button>                                            
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

        <?php
        include('analytics/googleAnalytics.php');
        include('popUp/clientChangePassword_view.php');
        ?>     
        <script src="<?php echo base_url() . 'js/bootstrap.min.js'; ?>"></script>
        <script src="<?php echo base_url() . 'js/jquery.smartmenus.min.js'; ?>"></script>
        <script src="<?php echo base_url() . 'js/jquery.smartmenus.bootstrap.min.js'; ?>"></script>
        <script src=<?php echo base_url() . "assets/js/script.js"; ?>></script>
    </body>
</html>