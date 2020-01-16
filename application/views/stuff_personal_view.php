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
		<div class="wide">
			<div class="container">
				<div class="page-header">
					<h1>Add User/Team Member</h1>
				</div>
			</div>
		</div>

        <div class="content-full-height booking-appointment-form">
            <!-- body content -->        
            <div class="two-column-con">
                <div class="container  booking-form-wrapper">
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
                                        <form class="form-horizontal" method="post" action="<?php echo base_url();?>MyOffice/add_stuff_personal_details" enctype="multipart/form-data">
                                       
                                            <fieldset>
                                                <div id="personalDataTab">
            
                                                    <!-- Form Name -->
                                                     <div class="col-md-12 form-wrapper">
                                                    <div class="alert alert-info text-center">Add New Staff Details</div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">User Name</label>  
                                                            <div class="col-md-8">
                                                               
                                                                <input type="text" name="username" class="form-control">
                                                               
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">User Email/Login</label>  
                                                            <div class="col-md-8">
                                                               <input type="text" name="useremail" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">User Phone:</label>  
                                                            <div class="col-md-8">
                                                                <input type="text" name="contact_number" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                   <label class="col-md-4 control-label" for="textinput">User/Stuff Type </label>  
                                                            <div class="col-md-8">
                                       						<select class="form-control" name="staff_type">
                                       							<option>FULL TIME</option>
                                       							<option>PART TIME </option>
                              
                                       						</select>	
                                                            </div>
                                                        </div>
                                                         <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Monthly Salary</label>  
                                                            <div class="col-md-8">
                											<input type="text" name="salary" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Date of Joining</label>  
                                                            <div class="col-md-8">
                											<input type="date" name="doj" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 text-center form-group">                               
                                                    <button class="btn btn-sm btn-primary" style="text-align: center;">Add </button>
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