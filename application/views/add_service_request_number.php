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

      <!--   <link rel="stylesheet" href="css/bootstrap-datetimepicker.css">  -->       

 
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
            <!-- body content -->
        <div class="content-full-height booking-appointment-form">        
            <div class="two-column-con">
                <div class="container booking-form-wrapper">
                    <div id="exTab2" class="frm-detail">                    
                        <div class="tab-pane downarrow" id="top4">
                            <ul class="nav nav-tabs">
                                <li><a style="cursor: pointer;display: none;"onclick="location.href = 'ClientProfile/accounts';" data-toggle="tab">Accounts</a></li>
                            </ul>
                        </div>
                        <div class="tab-content ">
                            <div class="tab-pane active">
                                <div class="main-content detail-view">
                                    <div class="detail-view-cont">
                                        <?php //echo form_open(base_url() . "MyOffice/client_update/{$clientEdit->clientId}", ['class' => 'form-horizontal']) ?>
                                        <form class="form-horizontal" method="post" action="<?php echo base_url();?>MyOffice/addServicesRequestNumber" enctype="multipart/form-data">
                                       
                                                <div id="personalDataTab">
            
                                                    <!-- Form Name -->
                                                    <div class="col-md-12  form-wrapper">
                                                        <div class="alert alert-info text-center">Create New Services  Request(SRN)</div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Client Name</label>  
                                                            <div class="col-md-8">
                                                                <select name="clientId" class="form-control">
                                                                    <option value="-1">--Select ----</option>
                                                                    <?php 
                                                                        for($i=0;$i<count($clientlist);$i++){echo "<option value=".$clientlist[$i]->clientId.">".$clientlist[$i]->clientName."</option>";
                                                                    }?> 
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Services Type </label>  
                                                            <div class="col-md-8">
                                                                <select name="serviceId" class="form-control">
                                                                    <?php 
                                                                        for($i=0;$i<count($Servicelist);$i++){echo "<option value=".$Servicelist[$i]->serviceId.">".$Servicelist[$i]->serviceName."</option>";
                                                                    }?>          
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Task </label>  
                                                            <div class="col-md-8">
                                                                <textarea name="task" class="form-control" rows="5" cols="20" style="width:100%;"></textarea>
                                                            </div>
                                                        </div>
														<div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Directory List </label>  
                                                            <div class="col-md-8">
                                                               <?php 
															   $dirRef=opendir('./expertdocuments/' . $this->session->userdata('expertId'));
															while($res=readdir($dirRef))
															{
																if($res!="." and $res!=".." ){
																?>	
																<input type="checkbox" name="shared_dir[]" value="<?php echo './expertdocuments/' .$this->session->userdata('expertId').'/'.$res ?>">
																<?php 
																echo $res."</br>";																
																}
																 
															}
															?>
                                                            </div>
                                                        </div>
														
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Add Document</label>  
                                                            <div class="col-md-8">
                                                                <form id='upload' action="upload.php" method="post" enctype="multipart/form-data">
                                                                    <input type="file" name="filename" onchange="javascript:document.getElementById('upload').submit();" multiple>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Assign  To Team </label>  
                                                            <div class="col-md-8">
                                                                <select name="assign_member" class="form-control">
                                                                    <option value="-1">--Select ----</option>
                                                                    <option value="<?php echo $this->session->userdata('expertId');?>">self</option> 
                                                                    <?php 
                                                                        for($i=0;$i<count($teamMember);$i++){echo "<option value=".$teamMember[$i]->expertId.">".$teamMember[$i]->expertName."</option>";
                                                                    }?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 text-center form-group">
                                                            <button class="btn btn-sm btn-primary" onclick="submitForm()">CREATE NEW SRN</button>                             
                                                        </div>

                                                 </div>
                                                </div>      
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