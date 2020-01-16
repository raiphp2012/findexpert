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

        <title>Client Appointment Details : Visheshagya</title>

        <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
       <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/two-column.css" rel="stylesheet">
        <!--<link href="<?php echo base_url(); ?>css/normalize.css" rel="stylesheet">-->
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
         <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Heebo:400,700|Oswald:400,700" type="text/css" media="all">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">
        <link href="<?php echo base_url(); ?>assets/css/font.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
        
        <!--[if lt IE 9]>
                <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/font.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
        <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src=<?php echo base_url() . "js/bootstrap.min.js"; ?>></script>
        

  
        <script type="text/javascript">
            $(document).ready(function () {
                $("#ChangePassword").click(function () {

                    $("#myModalChangePassword").modal('show');
                });
            });
           
        </script>
         <script>

        function addZero(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}

function myFunction() {
    var time1=9;
    var time2=19;
    var d = new Date();
  
    var h = addZero(d.getHours());
    console.log(h);
  
    if(h>=time1 && (h+1)<=time2)
    {
    	
       $('#FinanceConsulting').show();
        $('#Query').hide();
     
    }
    else
    {
    
        
         $('#FinanceConsulting').hide();
        $('#Query').show();
      
    }
}
</script>
        <style>
        body{
       background-color:none;
        }
        .two-column-con{
        padding:0; margin:0;
        }
 
    
  
  .navbar-brand{
  background:none;
  }

 
            
        </style>
        
           
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
                    <a class="navbar-brand" href="<?php echo base_url(); ?>clientHome/mainHome"><div class="logo"></div>
                    <div class="logo_text">TAX & LEGAL SERVICES REDEFINED</div></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                    <li class="active" ><a href="<?php echo base_url() .'Expertdetails'; ?>" >Home</a></li>   
                    <li ><a href="<?php echo base_url() .'Expertdetails/search/1'; ?>" >Expert Search</a></li>
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
        <div class="wide" style="display: none;">
            <div class="container">
                <div class="page-header">
                    <h1>Home</h1>
                </div>
            </div>
        </div>
        <div class="content-full-height cl-bg">
           
            <!-- body content -->        
            <div class="two-column-con bg-transparent">
                <div class="container">
                    <div id="exTab2" class="frm-detail">
                        <div class="tab-content" style="border:none">
                            <div class="tab-panel active">                            
                                <div class="main-content detail-view">
                                    <div class="detail-view-cont"></div>
                                </div>
                                <div>
                                    <div class="panel">
                                        <div class="row">
                                                                      
                                            <div class="col-md-6">
                                                <div class="cl-home-view slideUp"> 
                                            <div class="panel Instantly" >
                                            <h2 class="cl-view-head">Get connected <strong>Instantly</strong></h2>
                                            
                                            </div>
                                  <img class="img-responsive handshake" src="<?php echo base_url();?>images/meet.png"> 
                                  
                                  
                           <!--  <a href="<?php echo base_url() ?>Searchexpertdetails/clientBookingAppointmentInstant" class="btn btn-info" id="FinanceConsulting" 
                                    style=" font-size: 18px; margin: 5%;">
                                <span class="glyphicon glyphicon-facetime-video" style=" font-size: 18px;">
                                    
                                </span>
                            Connect with An  Tax Expert Now
                            <span class="glyphicon glyphicon-earphone" style=" font-size: 18px;"> </span></a> -->

                          <!--   <a href="<?php echo base_url() ?>Searchexpertdetails/clientBookingAppointmentInstant" class="btn ad-vd-btn">
                                <i class="fa fa-phone connect-icon"></i>
                                <span class="expert-tag">Connect with An  Tax Expert Now</span>
                                <i class="fa fa-video-camera connect-icon video-icon"></i>
                            </a>
                             <a href="<?php echo base_url() ?>Searchexpertdetails/clientBookingAppointmentInstant" class="btn ad-vd-btn">
                                <i class="fa fa-phone connect-icon"></i>
                                <span class="expert-tag">Connect with An Legal Expert Now</span>
                                <i class="fa fa-video-camera connect-icon video-icon"></i>
                            </a> -->
                             
                           <!--  <a href="<?php echo base_url() ?>Searchexpertdetails/clientBookingAppointmentInstant" class="btn btn-info" id="FinanceConsulting" 
                                    style=" font-size: 18px; margin: 5%;">
                                <span class="glyphicon glyphicon-facetime-video" style=" font-size: 18px;">
                                    
                                </span>
                               
                            Connect with An Legal Expert Now
                            <span class="glyphicon glyphicon-earphone" style=" font-size: 18px;"> </span></a> -->
                            <div class="row" id="FinanceConsulting">
                                <div class="col-md-6">
                                <div class="hovereffect">
                                    <img class="img-responsive" src="<?php echo base_url();?>/images/tax_expert.jpeg" alt="">
                                    <div class="overlay">
                                       <h2>Tax Expert</h2>
                                       <a class="info" href="<?php echo base_url() ?>Searchexpertdetails/clientBookingAppointmentInstant">
                                           <h3>Connect Now</h3>
                                           <p>
                                           <i class="material-icons video-icon">video_call</i>
                                           <i class="material-icons phone-icon">contact_phone</i></p>
                                       </a>
                                    </div>
                                </div>
                                </div>
                                 <div class="col-md-6">
                                <div class="hovereffect">
                                    <img class="img-responsive" src="<?php echo base_url();?>/images/legal_expert.jpg" alt="">
                                    <div class="overlay">
                                       <h2>Legal Expert </h2>
                                       <a class="info" href="<?php echo base_url() ?>Searchexpertdetails/clientBookingAppointmentInstant">
                                           <h3>Connect Now</h3>
                                           <p>
                                           <i class="material-icons video-icon">video_call</i>
                                           <i class="material-icons phone-icon">contact_phone</i></p>
                                       </a>
                                    </div>
                                </div>
                                </div>
                            </div>
                             <div id="Query" style=" font-size: 18px; margin: 5%; display: none;">
                                <p style="font-size:16px;font-family:f1;">All our experts are available from 9 AM to 7 PM.</p>
                                <a href="<?php echo base_url();?>Ajaxcalls/timeOver" type="button" class="btn btn-default" style="font-size: 16px;font-family:f8;outline: 0;color: #fff;background-color: #52739c;" >Submit Your Query</a>
                            </div>
                                          
                                        </div>
                                        </div>
                        <div class="col-md-6">
                            <div class="cl-home-view slideUp">
                            <div class="panel Instantly" >
                            <h2 class="cl-view-head">Schedule an <strong>Appointment</strong></h2>
                            </div>
                            <div class="row row-mar">
                                <div class="col-md-6 expert-tags">
                                <div class="hovereffect">
                                    <img class="img-responsive" src="<?php echo base_url();?>/images/ca.jpg" alt="">
                                    <div class="overlay">
                                       <h2>Chartered Accountant</h2>
                                       <a class="info" href="<?php echo base_url();?>Expertdetails/search/1">
                                           <h3>Connect Now</h3>
                                           <p>
                                           <i class="material-icons video-icon">video_call</i>
                                           <i class="material-icons phone-icon">contact_phone</i></p>
                                       </a>
                                    </div>
                                </div>
                                </div>
                                 <div class="col-md-6 expert-tags">
                                <div class="hovereffect">
                                    <img class="img-responsive" src="<?php echo base_url();?>/images/tax_expert.jpeg" alt="">
                                    <div class="overlay">
                                       <h2>Company Secretary</h2>
                                       <a class="info" href="<?php echo base_url();?>Expertdetails/search/4">
                                            <h3>Connect Now</h3>
                                            <p>
                                           <i class="material-icons video-icon">video_call</i>
                                           <i class="material-icons phone-icon">contact_phone</i></p>
                                       </a>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 expert-tags">
                                <div class="hovereffect">
                                    <img class="img-responsive" src="<?php echo base_url();?>/images/cma.jpg" alt="">
                                    <div class="overlay">
                                       <h2>Certified Management Accountant</h2>
                                       <a class="info" href="<?php echo base_url();?>Expertdetails/search/4">
                                           <h3>Connect Now</h3>
                                           <p>
                                           <i class="material-icons video-icon">video_call</i>
                                           <i class="material-icons phone-icon">contact_phone</i></p>
                                       </a>
                                    </div>
                                </div>
                                </div>
                                 <div class="col-md-6 expert-tags">
                                <div class="hovereffect">
                                    <img class="img-responsive" src="<?php echo base_url();?>/images/lawyer.jpg" alt="">
                                    <div class="overlay">
                                       <h2>Lawyer</h2>
                                       <a class="info" href="<?php echo base_url();?>Expertdetails/search/3">
                                           <h3>Connect Now</h3>
                                           <p>
                                           <i class="material-icons video-icon">video_call</i>
                                           <i class="material-icons phone-icon">contact_phone</i></p>
                                       </a>
                                    </div>
                                </div>
                                </div>
                            </div><!-- 
                                            <a href="<?php echo base_url();?>Expertdetails/search/1" class="btn btn-info" id="FinanceConsulting" 
                                                        style=" font-size: 18px; margin: 5%;">
                            <span class="glyphicon glyphicon-facetime-video" style=" font-size: 18px;"></span>
                           Chartered Accountant
                            <span class="glyphicon glyphicon-earphone" style=" font-size: 18px;"> </span></a>
                            <a href="<?php echo base_url();?>Expertdetails/search/2" class="btn btn-info" style=" font-size: 18px; margin: 5%; ">
                                <span class="glyphicon glyphicon-facetime-video" style="font-size: 18px;"></span>
                            Company Secretary 
                            <span class="glyphicon glyphicon-earphone" style="font-size: 18px;"> </span></a>
                              <a href="<?php echo base_url();?>Expertdetails/search/4" class="btn btn-info" id="FinanceConsulting" 
                                                        style=" font-size: 18px; margin: 5%;">
                            <span class="glyphicon glyphicon-facetime-video" style="font-size: 18px;"></span>
                            Certified Management Accountant
                            <span class="glyphicon glyphicon-earphone" style="font-size: 18px;"> </span></a>
                            <a href="<?php echo base_url();?>Expertdetails/search/3" class="btn btn-info" style=" font-size: 18px; margin: 5%; ">
                                <span class="glyphicon glyphicon-facetime-video" 
                                      style=" font-size: 18px;"></span>
                            Lawyer 
                            <span class="glyphicon glyphicon-earphone" 
                                style=" font-size: 18px;"> </span></a>  -->
                                            
                                            
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
        <footer id="footer" class="fullWidthSection greyColor">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <ul class="list-inline social-buttons">
                            <li>Follow Us On:</li>
                            <li><a href="https://www.facebook.com/visheshagya/">
                            <i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://twitter.com/Visheshagya_IN">
                            <i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://in.linkedin.com/in/visheshagya-india-a35780117"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="http://visheshagya.in/blog"> Blog</a> </li>
                        </ul>

                    </div>
                    <div class="col-md-6 col-sm-6 textright">
                        Visheshagya.in  |  <a href="">Terms of Use</a> | <a href="">Privacy Policy</a>
                    </div>
                </div>
            </div>
        </footer>
         <?php include("popUp/ClientLogin_view.php");?>

	<!-- script references -->
		

		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		
		<script src="<?php echo base_url(); ?>assets1/js/bootstrap.min.js"></script>	
		<script src="<?php echo base_url(); ?>assets1/js/matchheight.js"></script>
		<script src="<?php echo base_url(); ?>assets1/js/typeit.min.js"></script>
		<script src="<?php echo base_url(); ?>assets1/js/bootstrap-slider.js"></script>
		<script src="<?php echo base_url(); ?>assets1/js/readmore.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/site.js"></script>

       
        <?php include('ClientAppointmentCancelPopUp_view.php'); ?>

        <script>
                                                            
                                                          
        </script> 
        <?php
        include('popUp/clientChangePasswordSuccess_view.php');

        include('popUp/clientChangePasswordError_view.php');

        if (NULL !== $this->session->userdata('clientChangePasswordSuccess')) {
            ?>
            <script>
                $("#changeSuccessMessage").modal('show');
            </script>
            <?php
        }
        if (NULL !== $this->session->userdata('clientChangePasswordError')) {
            // echo $this->session->flashdata('expertLoginError');
            ?>
            <script>
                $("#clientChangePasswordError").modal('show');
            </script>
            <?php
        }
        
        include('popUp/clientChangePassword_view.php');
        include('analytics/googleAnalytics.php');
        ?>

  
  <script src=<?php echo base_url() . "assets/js/script.js"; ?>></script>

<script>
  myFunction();
  </script>  
    </body>
</html>
