<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.css">
</head>
<body style="background-color: #E31E25;color: #fff;">
	<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <meta name="description" content="Visheshagya is an ecommerce portal for search and video/audio appointment with various experts like CA,CS,CMA,Lawyers etc.">
        <meta name="keywords" content="CA,CS,CMA,Lawyers,CA in India,CS in India,CMA  in India,Lawyer in India">
        <meta name="author" content="Visheshagya">
        <link rel="icon" href="<?php echo base_url(); ?>favicon.ico" type="image/gif">
        <title>Visheshagya</title>
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
       <!-- <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">-->
        <link href="<?php echo base_url(); ?>css/two-column.css" rel="stylesheet">
        <!--<link href="<?php echo base_url(); ?>css/normalize.css" rel="stylesheet">-->
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
         <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Heebo:400,700|Oswald:400,700" type="text/css" media="all">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">
        <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/font.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
        
        <!--[if lt IE 9]>
                <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
         <style type="text/css">
        .noExpert{
            width: 45%;
            padding: 15px 70px;
            border:1px solid #fff;
            margin: 0 auto;
        }

        .noExpert h2{
            text-align: center;
            margin: 10px 10px 5px;
            font-size: 24px;
            font-family: f4;
        }

        .noExpert h3{
            text-align: center;
            margin: 0 10px 5px;
            font-size: 18px;
            font-family: f4;
            color: #000;
        }
        .noExpert .query-btn{
            max-width: 100px;
            display: block;
            font-size: 16px;
            font-family: f8;
            padding: 10px 20px;
            background-color: #fff;
            color: #000;
            margin: 0 auto;
            border-radius: 0;
            outline: 0;
        }

         .noExpert .form-control {
            display: block;
            width: 100%;
            height: 40px;
            padding: 10px 20px;
            font-size: 16px;
            font-family: f4;
            color: #fff;
            background-color: transparent;
            border: 1px solid #fff;
            border-radius: 0;
            box-shadow: none;
        }

         .noExpert textarea {
            color: #fff;
            background-color: transparent;
            border: 1px solid #fff;
            width: 100%;
            padding: 10px 20px;
            font-family: f4;
        }
         .noExpert .form-control::-webkit-input-placeholder ,.noExpert textarea::-webkit-input-placeholder{ /* Chrome/Opera/Safari */
          font-family:f4;
          color: #fff;
        }
         .noExpert .form-control::-moz-placeholder ,.noExpert textarea::-moz-placeholder{ /* Firefox 19+ */
          font-family:f4;
          color: #fff;
        }
         .noExpert .form-control:-ms-input-placeholder ,.noExpert textarea:-ms-input-placeholder{ /* IE 10+ */
          font-family:f4;
          color: #fff;
        }
         .noExpert .form-control:-moz-placeholder ,  .noExpert textarea:-moz-placeholder{ /* Firefox 18- */
          font-family:f4;
          color: #fff;
        }
         .noExpert .form-control:focus,.noExpert .form-control:active,.noExpert .form-control:hover,.noExpert textarea:hover ,.noExpert textarea:focus,.noExpert textarea:active {
            box-shadow: none;
            outline: 0;
        }
    </style>
        <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
       <!--  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script> -->
        <!-- Bootstrap Core JavaScript -->
        <script src=<?php echo base_url() . "js/bootstrap.min.js"; ?>></script>
        <!--<link rel="stylesheet" href="http://resources/demos/style.css">-->
        <script>
            $(function () {
                $("#consultationDateValue").datepicker({
                    dateFormat: 'yy-mm-dd',
                    minDate: 0
                });
            });
        </script>
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
                </div><!--/.nav-collapse -->
            </div>
        </div>
        
    
			<h1 style="padding: 10px 0;text-align: center;"><?php echo $title; ?></h1>
            
            <?php echo form_open(base_url().'Ajaxcalls/createQuery',['class' => 'noExpert']); ?>
             <h2>Please write your query...</h2>
             <?php
            if (!empty($this->session->flashdata('message'))) {
                                                        ?>
                            <h3>We recieved your query.We will get back to you soon</h3>
                                                        <?php
                                                    }
                                                    ?> 
    

                

                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo set_value('name'); ?>" placeholder="Enter Your Name">
                    <?php echo form_error('name', '<div class="error">', '</div>'); ?>
                                                    
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="number" name="phonenumber" placeholder="Enter the Mobile Number" value="<?php echo set_value('phonenumber'); ?>">
                    <?php echo form_error('phonenumber', '<div class="error">', '</div>'); ?>
                                                    
                </div>
                <div class="form-group">
                    <?php echo form_error('query', '<div class="error">', '</div>'); ?>
                    <textarea rows='8' name="query"  placeholder="Your Query...." value="<?php echo set_value('query'); ?>"></textarea>

                </div>
              <button type="submit" class="btn query-btn">Submit</button>
            </form>
            
</body>
</html>