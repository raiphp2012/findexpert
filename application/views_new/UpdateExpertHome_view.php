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

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Heebo:400,700|Oswald:400,700" type="text/css" media="all">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
  <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/font.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
  <style>
  .wide {
    width: 100%;
    height: auto;
    background: url(assets/img/topBannerExpert.jpg) center center no-repeat;
    background-size: cover;
}

.logo_text {
    display: block;
    width: 200px;
    text-align: right;
    font-family: 'Oswald', sans-serif;
    font-size: 14px;
    line-height: 20px;
    text-transform: uppercase;
    font-weight: 700;
    color: #888888;
    margin: 0;
    padding: 0;
}
  </style>
  <!-- script references -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/matchheight.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/typeit.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-slider.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/readmore.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/site.js"></script>   
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
        <a class="navbar-brand" href="#"><div class="logo"></div></a>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a class="launch-modal" href="#" data-modal-id="modal-login">Login</a></li>
          <li><a href="<?php echo base_url();?>">For Clients</a></li>
          <li><a href="<?php echo base_url();?>Contact">Contact Us</a></li>
          <li><a href="#" class="btn btn-primary navbar-btn active navBarBtnContact">786-280-0600<i class="fa fa-phone" aria-hidden="true"></i></a></li>

        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
  
  <!-- Banner START -->
  <div class="wide">
    <div class="container"  style="background-color: rgba(51, 51, 51, 0.9);width:100%">
    <div class="row">
    <div class="wrap">
                <?php
                if (NULL !== $this->session->userdata('expertSignUpSuccess')) {
                    include('popUp/SignupSuccessMessage_view.php');
                    ?>
                    <script>
                        $("#signupSuccessMessage").modal('show');
                    </script>
                    <?php
                }
                if (NULL !== $this->session->flashdata('expertLoginError')) {
                    include('popUp/LoginError_view.php');
                    ?>
                    <script>
                        $("#LoginError").modal('show');
                    </script>
                    <?php
                }

                if (NULL !== $this->session->userdata('expertResetPasswordSuccess')) {

                    include('popUp/expertResetSuccessMessage_view.php');
                    ?>
                    <script>
                        $("#resetSuccessMessage").modal('show');
                    </script>
                    <?php
                }
                if (NULL !== $this->session->userdata('expertResetPasswordError')) {
                    include('popUp/expertResetPasswordError_view.php');
                    ?>
                    <script>
                        $("#expertResetPasswordError").modal('show');
                    </script>
                    <?php
                }
                ?> 
            </div>
    </div>
    <div class="row text-center" style="padding-bottom: 40px;">
        <div class="col-xs-3 col-sm-2 col-sm-offset-2">
          <div class="bannerIconBox">
            <img src="<?php echo base_url(); ?>assets/img/expert.svg" alt="Book Appointment"   >
          </div>
          <div class="bannerIconText hidden-xs">Register as an Expert</div>
        </div>
        <div class="col-xs-3 col-sm-2">
          <div class="bannerIconBox">
            <img src="<?php echo base_url(); ?>assets/img/expert.svg" alt="Book Appointment"  >
          </div>
          <div class="bannerIconText hidden-xs">Complete your Profile</div>
        </div>
        <div class="col-xs-3 col-sm-2">
          <div class="bannerIconBox">
            <img src="<?php echo base_url(); ?>assets/img/appoint1.svg" alt="Pay Online">
          </div>
          <div class="bannerIconText hidden-xs">Get Appointment</div>
        </div>
        <div class="col-xs-3 col-sm-2">
          <div class="bannerIconBox lastbox">
            <img src="<?php echo base_url(); ?>assets/img/consult.svg" alt="Pay Online">
          </div>
          <div class="bannerIconText hidden-xs">Audio/Video Consultation</div>
        </div>
      </div>
    
    </div>
  </div>
   
  <section id="whyVishesagya">
    <div class="container">
      <h1>Why Visheshagya?</h1>
      <div class="row row-pad">
        <div class="col-md-4 text-center">
          <div class="service-box">
            <div class="serviceIcon">
              <img src="<?php echo base_url(); ?>assets/img/experts.svg" alt="Experts"  >
            </div>
            <h3>Global Reach</h3>
            <p >Network without borders Create your global identity Connect & Collaborate with clients globally</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 text-center">
          <div class="service-box">
            <div class="serviceIcon">
              <img src="<?php echo base_url(); ?>assets/img/clock.png" alt="Experts"  >
            </div>
            <h3>Time Management </h3>
            <p class="text-muted">Work smarter, Achieve more Manage your time effectively & efficiently</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 text-center">
          <div class="service-box">
            <div class="serviceIcon">
              <img src="<?php echo base_url(); ?>assets/img/webcam.svg" alt="Experts"  >
            </div>
            <h3>Video Consultation</h3>
            <p class="text-muted">Out of office does not mean Out of action Manage your tasks & appointments on the go</p>
          </div>
        </div>
        

      </div>
     <div class="row">
        <div class="col-lg-4 col-md-6 text-center">
          <div class="service-box">
            <div class="serviceIcon"> 
              <img src="<?php echo base_url(); ?>assets/img/customer.png" alt="Experts"  style="height: 138px;width:150px;">
            </div>
            <h3>Audio Consultation</h3>
            <p class="text-muted">Out of office does not mean Out of action Manage your tasks & appointments on the go</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 text-center">
          <div class="service-box">
            <div class="serviceIcon">
              <img src="<?php echo base_url(); ?>assets/img/payment-1.png" alt="Experts"  >
            </div>
            <h3>Payment Assurance</h3>
            <p class="text-muted">Accelerate payments processing Secure, Simple and Speedy payment gateway to get your business running</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 text-center">
          <div class="service-box">
            <div class="serviceIcon">
              <img src="<?php echo base_url(); ?>assets/img/elocker.svg" alt="Experts"  >
            </div>
            <h3>E-Locker</h3>
            <p class="text-muted">Safe, Secure, Simple and Smarter storage facility for documents View, Organise, Access and Share information anytime, anywhere</p>
          </div>
        </div>
      </div>
    </div>
    </section>
     <!--  <div class="rowGap">&nbsp;</div>
      <div class="rowGap">&nbsp;</div>
                    <h3 class="sectionHead">Our Expert Experience</h3>
                    <div class="rowGap">&nbsp;</div>
                    <div class="row">
                        <div class="col-sm-12 col-md-8 col-md-offset-2">
                            <div class="embed-responsive embed-responsive-16by9 videoBox">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/0pG1a_BIUP0?autoplay=0&loop=0&playlist=mUikDhd4QF4,WSYavZAqLvM,TrjGTpaPEa8" frameborder="0" allowfullscreen></iframe>
                            </div>          
                        </div>
                    </div>    -->  

              <section  class="you-videos"> 
                     <article class="container">
                        <h3>How it Works</h3>
                        <div class="row">
                           <div class="col-md-6">
                               <div class="embed-responsive embed-responsive-16by9 videoBox">
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/4PHPwgMOVwQ" frameborder="0" allowfullscreen></iframe>
                                </div>
                           </div>
                           <div class="col-md-6">
                               <div class="embed-responsive embed-responsive-16by9 videoBox">
                                   <iframe width="560" height="315" src="https://www.youtube.com/embed/0pG1a_BIUP0" frameborder="0" allowfullscreen></iframe>
                                </div>
                           </div>
                           <div class="col-md-6">
                               <div class="embed-responsive embed-responsive-16by9 videoBox">
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/mUikDhd4QF4" frameborder="0" allowfullscreen></iframe>
                                </div>
                           </div>
                           <div class="col-md-6">
                               <div class="embed-responsive embed-responsive-16by9 videoBox">
                                  <iframe width="560" height="315" src="https://www.youtube.com/embed/WSYavZAqLvM" frameborder="0" allowfullscreen></iframe>
                                </div>
                           </div>
                        </div>      
                    </article>
                    <div class="rowGap">&nbsp;</div>
   
  </section>
  
  <section class="blog-post">
                <div class="container-fluid">
                    <h1>Recent Post</h1>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="blog-wrapper">
                                <div class="head-wrapper">
                                    <h2>What rights do landlords and tenants have in India, especially w.r.t. to duration of contract and eviction ?</h2>
                                    <div class="category-date">Service Tax<span>17 march 2016</span></div>
                                </div>
                                <p>Court proceedings of any type should be avoided at all times. Well-defined contracts will greatly help landlords to convince tenants that they (the landlords) are likely to win the case in court. An eviction cases can last up to 10 or even 20 years.(Legislation)
                                    Local laws cover landlord and tenant agreements. Many local rent control laws such as the Maharashtra Rent Act 1999, Delhi Rent Act 1995, Tamil Nadu Buildings (Lease and Rent Control) Act 1960, strictly regulate rental agreements that are 12 months or longer in favor of tenants. If the monthly rent payable on a property exceeds Rs3,500 (US$76), the agreement is subject to the Transfer of Property Act (TPA), which assigns the landlord responsibilities including i) disclosure of information regarding material defects in the property and ii) uninterrupted occupation of the property for the agreed period (subject to periodic visits by the landlord for inspection).</p>
                                    <a href="<?php echo base_url(); ?>blog" class="btn btn-default">Know more</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="blog-wrapper">
                                <div class="head-wrapper">
                                    <h2>How effective is the legal system to help landlords who have given their homes on rent ?</h2>
                                    <div class="category-date">Service Tax<span>17 march 2016</span></div>
                                </div>
                                <p>The Indian law of Arbitration and Conciliation act 1996, under section 61 provides the scope and application of conciliation (alternate dispute redressal). Interminable, time consuming, complex and expensive Court procedures have led parties to settle their disputes out of the court.  It would be the right answer for people who want  their disputes to be settled expeditiously and through an option which is cost effective and simple.However;it is non-binding in nature!</p>
                                <a href="<?php echo base_url(); ?>blog" class="btn btn-default">Know more</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="blog-wrapper">
                                <div class="head-wrapper">
                                    <h2>Statutory explanation of will and its features !</h2>
                                    <div class="category-date">Service Tax<span>17 march 2016</span></div>
                                </div>
                                <p>The Indian Succession Act 1925 under Section 2(h) provides the statutory explanation of a will and its features. Will means the legal declaration of the intention of a person with respect to his property, which he desires to take effect after his death. It is a unilateral document and takes effect after the death of the person making it. It can be revoked or altered by the maker of it at any time he is competent to dispose of his property.</p>
                                <a href="<?php echo base_url(); ?>blog" class="btn btn-default">Know more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
  
  <section class="about-us container">
     <h1>About Us</h1>
      <h4><b>About Visheshagya</b></h4>
      <p><b class="new">Visheshagya, Tax & Legal Services Redefined</b> is a one stop e-commerce portal in the taxation, legal and the accounting space.
          Visheshagya empowers clients by helping them search, connect, consult certified & verified CA/CS/CMA/Lawyers at a click. 
          Clients can schedule appointments, seek advice through audio/video consultation and even pay conveniently through a secure payment gateway.
          Visheshagya offers multiple services at the convenience of both client & experts in the comfort of their office, home and even when one is on the go. Visheshagya’s USP of transparency and confidentiality is all set to digitize operations helping everyone manage their time & documents efficiently.</p>
      <h4><b>Our Vision</b></h4>
      <p>
        Visheshagya aims to bring about a paradigm shift in the way professional services for taxation, accounting and legal are rendered to clients!<br>  
Visheshagya’s vision is to<b class="new"> empower clients</b> by providing easy accessibility, convenience, transparency through technology driven, state of the art professional services and <b class="new">enable experts</b> to adapt to newer & smarter ways of doing & growing business. 
      </p>
      <h4><b>About The Founder</b></h4>
      <p><b>Ms. Rashmmi Khetrapal</b> – a dynamic and enterprising CA. She has 16 + years of experience in Accounting & Finance. She has held the esteemed post of the Chairperson of the Gurgaon Branch of the NIRC of the ICAI during 2009-10. She was also the first lady to be elected as NIRC member of ICAI in 2010-13. During her tenure as a NIRC member, she has held various prestigious positions like NICASA Chairperson, Chairperson for CA members in Industry, Chairperson for Branch Coordination Committee and Chairperson for VAT Committee etc. Her area of expertise lies in the field of assessment & appeal cases for VAT, Service & Income Tax for corporate & high net worth individuals.</p>
  </section>
 <footer id="footer" class="fullWidthSection greyColor">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <ul class="list-inline social-buttons">
            <li>Follow Us On:</li>
            <li><a href="https://www.facebook.com/visheshagya/"><i class="fa fa-facebook"></i></a></li>
            <li><a href="https://twitter.com/Visheshagya_IN"><i class="fa fa-twitter"></i></a></li>
            <li><a href="https://in.linkedin.com/in/visheshagya-india-a35780117"><i class="fa fa-linkedin"></i></a></li>
                         
          </ul>

        </div>
        <div class="col-md-6 col-sm-6 textright">
            <a href="http://visheshagya.in">  Visheshagya.in</a>  |  <a href="<?php echo base_url();?>ExpertTermsAndCondition">Terms of Use</a> | <a href="<?= base_url() ?>Privacy">Privacy Policy</a>
        </div>
      </div>
        
    </div>
  </footer>

  <!-- MODAL -->
  <div class="modal fade modal-login" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> <span id="frmLoginTitle">Login</span></h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <div id="frmLogin">
            <form role="form" action="<?php echo base_url() .'Expert/checkExpertLogin';?>" method="post">
              <div class="form-group">
                <input type="email" class="form-control" id="usrname" name="expertEmailId" placeholder="Enter email" required>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="psw" name="expertPassword" placeholder="Enter password">
              </div>
              <div class="loginFormPopup checkbox">
                <label>
                  <input type="checkbox" value="">
                  <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                  Remember me
                </label>
              </div>
              <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
            </form>
          </div>
          <div id="frmRegister">
            <form role="form">
              <div class="form-group">
                <input type="text" class="form-control" id="usrname" placeholder="Enter email">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="psw" placeholder="Enter password">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="psw" placeholder="Confirm password">
              </div>
              <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Register</button>
            </form>
          </div>
      <div id="frmForgot" style="display:none;">
                <form role="form" action="<?php echo base_url() . 'ExpertForgotPass/expertPasswordRecover';?>" method="post">
              <div class="form-group">
                <input type="email" class="form-control" id="usrname" name="expertEmailId" placeholder="Enter email" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="expertMobileNumber" id="psw" placeholder="Enter Mobile Number" pattern="[1-9]{1}[0-9]{9}" oninvalid="setCustomValidity('Mobile Number with 6-9 and remaing 9 digit with 0-9')" >
              </div>
              
              <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Reset Password</button>
            </form>
          </div>
        </div>
        <div class="modal-footer">
            <?php
            //$response= 'http'.(empty($_SERVER['HTTPS'])?'':'s').'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
   
  // $this->session->set_userdata('response',$response);
             
           $authExpertUrl=$this->session->userdata('authExpertUrl');
            ?>
            <a  id="btnFBlogin" href="<?php echo $authExpertUrl; ?>"  class="btn btn-default pull-left" ><i class="fa fa-facebook-official" aria-hidden="true"></i>Login with Facebook</a>
          <div id="frmLoginFooter">
            <p>New to Visheshagya? <a  href="<?php echo base_url();?>ExpertSignup">Sign Up</a></p>
          </div>
          <div id="frmRegisterFooter">
            <p>Already a member? <a id="btnShowLogin" href="#">Login</a></p>
          </div>
          <p>Forgot <a href="#" id="btnShowForgot">Password?</a></p>
        </div>
      </div>

    </div>
  </div>

   
  </body>
</html>