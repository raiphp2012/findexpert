<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="description" content="Visheshagya, Services Redefined, is an online e-Commerce portal which acts as an aggregator to connect experts like CA, CS, CMA, Lawyers etc with potential customers.The beauty of the portal is that it not only allows you to search an expert but also allows you to book a real 
  time appointment with that expert and do video and audio consultancy with that expert.Free E - Locker and E - diary facility is available to all.">
  <meta name="keywords" content="CA,CS,CMA,Lawyers,CA in India,CS in India,CMA  in India,Lawyer in India">
  <meta name="author" content="Visheshagya">
  <title>Visheshagya</title>

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Heebo:400,700|Oswald:400,700" type="text/css" media="all">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/animate.css" type="text/css">
  
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/bootstrap.min.css" type="text/css">
   
  <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
 <link href="<?php echo  base_url();?>assets1/css/styles.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
  <div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><div class="logo"></div><div class="logo_text">Tax & Legal Services Redefined</div></a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            
                            <div class="top-nav-tab downarrow">
                                <ul class="nav nav-tabs">
                                <?php if($this->session->userdata('parent_id')==0){?>
                                    <li><a style="cursor: pointer"onclick="location.href = '<?php echo base_url().'ExpertProfile/updateMyMember';?>';" data-toggle="tab">
                                    My Practice</a></li>
                                    <?php } ?> 
                                    <li><a style="cursor: pointer"onclick="location.href = '<?php echo base_url() . 'ExpertAppointments'; ?>.';" data-toggle="tab">My Appointments</a></li>
                                    <li class="active"><a style="cursor: pointer"onclick="location.href = '<?php echo base_url() . 'ExpertDocument'; ?>.';" data-toggle="tab">E-Lockers</a></li>
                                    <li><a style="cursor: pointer"onclick="location.href = '<?php echo base_url() . 'ExpertProfile'; ?>.';" data-toggle="tab">My Profile</a></li>
                                    <li>
                                <div class="dropdown">
                                    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                        <span class="login-icon pull-left"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                        <li role="presentation" class="dropdown-header">Action</li>
                                        <li><a href="Logout" class="btn btn-primary btn-xs" role="button" data-toggle="modal" id="ChangePassword">Change Password</a></li>
                                        <li><a href="<?php echo base_url() ?>Logout" class="btn btn-danger btn-xs" role="button" data-toggle="modal">Logout</a></li>
                                    </ul>
                                </div>
                            </li>
                                </ul>
                            </div>
                        </ul>
                    </div><!--/.nav-collapse -->
    </div>
  </div>
  <div class="wide">
    <div class="container">
      <div class="page-header">
        <h1>E-Dairy</h1>
      </div>
    </div>
  </div>