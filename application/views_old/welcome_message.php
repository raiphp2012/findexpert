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
  <link href="<?php echo  base_url();?>css/style1.css" rel="stylesheet" type="text/css" media="all" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Heebo:400,700|Oswald:400,700" type="text/css" media="all">
	
	  <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/animate.css" type="text/css">

	
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/bootstrap.min.css" type="text/css">

	<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/styles.css" type="text/css">

	  <script type="text/javascript" src="<?php echo  base_url();?>js/jquery.min.js"></script>
        <script src="<?php echo  base_url();?>js/jquery-ui.min.js"></script>
        <script src="<?php echo  base_url();?>js/bootstrap.js"></script>
        <script src="<?php echo  base_url();?>js/css3-mediaqueries.js"></script>

	
	<!-- old code -->

	<script type="text/javascript">
$(document).ready(function() {  

var id = '#dialog';
    
//Get the screen height and width
var maskHeight = $(document).height();
var maskWidth = $(window).width();
    
//Set heigth and width to mask to fill up the whole screen
$('#mask').css({'width':maskWidth,'height':maskHeight});

//transition effect
$('#mask').fadeIn(500); 
$('#mask').fadeTo("slow",0.9);  
    
//Get the window height and width
var winH = $(window).height();
var winW = $(window).width();
              
//Set the popup window to center
$(id).css('top',  winH/2-$(id).height()/2);
$(id).css('left', winW/2-$(id).width()/2);
    
//transition effect
$(id).fadeIn(2000);     
    
//if close button is clicked
$('.window .close').click(function (e) {
//Cancel the link behavior
e.preventDefault();

$('#mask').hide();
$('.window').hide();
});

//if mask is clicked
$('#mask').click(function () {
$(this).hide();
$('.window').hide();
});
    
});
</script>
            <script>
                $(function () {
                    var input = $('#search'); // input text field
                    var default_value = input.val();
                    input.focus(function () {
                        if ($.trim($(input).val()) == default_value)
                            input.val('');
                    });
                    input.blur(function () {
                        if ($.trim($(input).val()) == '')
                            input.val(default_value);
                    });
                });
            </script>



            <script  type="text/javascript">
    $(document).ready(function(){
        $("#myModalOffer").modal('show');
    });
</script>
        
                 
       
            <!-- old code end -->
</head>
<body>

 <div id="myModalOffer" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Offer Of the Month</h4>
            </div>
            <div class="modal-body">
                <a href="http://www.visheshagya.in"  a class="launch-modal" href="#" data-modal-id="modal-login"><img src="<?php echo base_url();?>assets/images/offers.png"></a>


                
                      
                
            </div>
        </div>
    </div>
</div>
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
      <div class="collapse navbar-collapse">

        <ul class="nav navbar-nav navbar-right">
        
        
          <li><a class="launch-modal" href="#" data-modal-id="modal-login">Login</a></li>
          <li><a href="<?php echo base_url();?>Expert">For Experts</a></li>
          <li><a href="http://visheshagya.in/blog/contact-us/">Contact</a></li>

           <li><a href="#" class="btn btn-primary navbar-btn active navBarBtnContact">Offers </a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
  
  <!-- Banner START -->
  <div class="wide">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="bannerSearchForm">
            <div class="input-group" id="adv-search">
              <input type="text" class="form-control bannerSearchInput" placeholder="What are you looking for?" />
              <div class="input-group-btn">
                <div class="btn-group" role="group">
                  <div class="dropdown dropdown-lg">
                    <button type="button" class="bannerSearchDD btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <form class="form-horizontal" role="form">
                        
                        
                       
                      </form>
                    </div>
                  </div>
                  <div class="bannerSearchBtnGap"></div>
                  <button type="button" class="bannerSearchGo btn btn-primary" onclick="searchExpert()">Search an Expert</button>
                </div>
              </div>
            </div>
          </div>


<!-- old code -->
<div class="content-top" id="support" style="padding: 0%">
                    <div class="wrap">
                        <?php
                        if (NULL !== $this->session->userdata('clientSignUpSuccess')) {
                            include('popUp/SignupSuccessMessage_view.php');
                            ?>
                            <script>
                                $("#signupSuccessMessage").modal('show');
                            </script>
                            <?php
                        }
                        if (NULL !== $this->session->userdata('clientLoginError')) {
                            include('popUp/SignupErrorMessage_view.php')
                            ?> 
                            <script>
                                $("#signupErrorMessage").modal('show');
                            </script>
                            <?php
                        }
                        if (NULL !== $this->session->userdata('clientResetPasswordSuccess')) {
                            include('popUp/clientResetSuccessMessage_view.php');
                            ?>
                            <script>
                                $("#resetSuccessMessage").modal('show');
                            </script>
                            <?php
                        }
                        if (NULL !== $this->session->userdata('clientResetPasswordError')) {
                            include('popUp/clientResetPasswordError_view.php');
                            ?>
                            <script>
                                $("#clientResetPasswordError").modal('show');
                            </script>
                            <?php
                        }
                        ?>
                    </div>
                </div>



<!-- old code end -->

        </div>
      </div>
      <div class="row text-center" style="padding-bottom: 40px;">
        <div class="col-xs-3 col-sm-2 col-sm-offset-2">
          <div class="bannerIconBox">
            

          <img src="<?php echo base_url();?>assets1/img/expert.svg" alt="Book Appointment"   >
          </div>
          <div class="bannerIconText hidden-xs">Search Expert</div>
        </div>
        <div class="col-xs-3 col-sm-2">
          <div class="bannerIconBox">
            <img src="<?php echo base_url();?>assets1/img/appoint1.svg" alt="Book Appointment"  >
          </div>
          <div class="bannerIconText hidden-xs">Book Appointment</div>
        </div>
        <div class="col-xs-3 col-sm-2">
          <div class="bannerIconBox">
            <img src="<?php echo base_url();?>assets1/img/pay.svg" alt="Pay Online">
          </div>
          <div class="bannerIconText hidden-xs">Pay Online</div>
        </div>
        <div class="col-xs-3 col-sm-2">
          <div class="bannerIconBox lastbox">
            <img src="<?php echo base_url();?>assets1/img/consult.svg" alt="Pay Online">
          </div>
          <div class="bannerIconText hidden-xs">Audio/Video Consultation</div>
        </div>
      </div>
      <div class="row">
        <br><h3 class="bannerHead">Our Panel of Experts</h3>
      </div>


      <div class="row" style="padding-bottom: 10px;">

        <div class="col-xs-6 col-sm-3">
          <div class="bannerSquareBox eqHt">
            <div class="bannerSquareLogo">
              
              <a href="ExpertdetailsTmp/search/1"><img src="<?php echo base_url();?>assets1/img/logo_ca.svg" alt="CA Logo" ></a>
            </div>
            <div class="bannerSquareText">Chartered Accountant</div>
          </div>
        </div>
        <div class="col-xs-6 col-sm-3">
          <div class="bannerSquareBox eqHt">
            <div class="bannerSquareLogo">
              
              <a href="ExpertdetailsTmp/search/2"><img src="<?php echo base_url();?>assets1/img/logo_cs.svg" alt="CS Logo" ></a>
            </div>
            <div class="bannerSquareText">Company Secretary</div>
          </div>
        </div>
        <div class="col-xs-6 col-sm-3">
          <div class="bannerSquareBox eqHt">
            <div class="bannerSquareLogo">
              <a href="ExpertdetailsTmp/search/4"><img src="<?php echo base_url();?>assets1/img/logo_cma.png" alt="CMA Logo" ></a>
            </div>
            <div class="bannerSquareText">Certified Management Accountant</div>
          </div>
        </div>
        <div class="col-xs-6 col-sm-3">
          <div class="bannerSquareBox eqHt">
            <div class="bannerSquareLogo">
             <a href="ExpertdetailsTmp/search/3"><img src="<?php echo base_url();?>assets1/img/logo_law.svg" alt="Lawyer Logo" ></a>
            </div>
            <div class="bannerSquareText">Lawyer</div>
          </div>
        </div>


      </div>
    </div>
  </div>
  
  <section id="expertConsultancy" class="fullWidthSection redColor textcenter">
    <div class="container">
      <a href="#"><span id="rotateText"></span>&nbsp;Consultancy Just a click Away !</a>
    </div>
  </section>
  
  <section id="waitInQueue" class="fullWidthSection textcenter padding40">
    <div class="container">
      <h4>Are you struggling with your Taxes?</h4>
      <h5>Book instant appointments with Experts.</h5><br>
      <div class="row">
        <a href="#"  class="btn btn-primary btn-lg active launch-modal " role="button" data-modal-id="modal-login" >Consult Immediately</a>
      </div>
    </div>
  </section>
  <section id="whyVishesagya" class="fullWidthSection padding40 textcenter greyColor">
    <div class="container">
      <h3 class="sectionHead">Why Visheshagya?</h3>
      <div class="rowGap">&nbsp;</div>
      <div class="row">
        <div class="col-lg-3 col-md-6 text-center">
          <div class="service-box">
            <div class="serviceIcon">
             <img src="<?php echo base_url();?>assets1/img/experts.svg" alt="Experts"  >
            </div>
            <h3>Search, Connect &amp; Consult</h3>
            <p class="text-muted">Certified & Verified Experts (CA/CS/CMA/Lawyers).</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="service-box">
            <div class="serviceIcon">
              <img src="<?php echo base_url();?>assets1/img/webcam.svg" alt="Experts"  >
            </div>
            <h3>Audio &amp; Video Consultation<br>Anytime! Anywhere!</h3>
            <p class="text-muted">Conveniently & Comfortably from your home/office or even when you are on the move.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="service-box">
            <div class="serviceIcon">
               <img src="<?php echo base_url();?>assets1/img/saveMoney.svg" alt="Experts"  >
            </div>
            <h3>Work Smarter<br>Achieve More</h3>
            <p class="text-muted">Save on travel time &amp; expenses, Schedule appointments, Manage your calendar</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="service-box">
            <div class="serviceIcon">
               <img src="<?php echo base_url();?>assets1/img/elocker.svg" alt="Experts"  >
            </div>
            <h3>Safe, Secure, Simple and Smarter Document storage</h3>
            <p class="text-muted">Save, View, Organise, Access and Share documents/information anytime</p>
          </div>
        </div>

      </div>
      <div class="rowGap">&nbsp;</div>
      <h3 class="sectionHead">How it Works</h3>
      <div class="rowGap">&nbsp;</div>
      <div class="row">
        <div class="col-sm-12 col-md-8 col-md-offset-2">
          <div class="embed-responsive embed-responsive-16by9 videoBox">
            
            <iframe class="embed-responsive-item" src='https://www.youtube.com/embed/Xz6fkvB0KMc?modestbranding=0&autohide=1&showinfo=0&controls=0" frameborder="0"' ></iframe>
          </div>          
        </div>
      </div>      
      <div class="rowGap">&nbsp;</div>


  
    </div>
  </section>
  
  <section id="recenPost" class="fullWidthSection padding20">
    <div class="container">
      <h3 class="textcenter recenPostHeading">Recent Post</h3>




      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
          <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>
      
        <!-- Wrapper for slides -->

        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <h3>What rights do landlords and tenants have in India, especially w.r.t. to duration of contract and eviction ?</h3>
                <p>Since Lease and License Agreements are designed to escape restrictive regulations, all terms are governed by agreement between landlord and tenant. Aside from the most basic condition that the tenancy is only for 11 months, everything must be stated in the contract.Typical contracts include a provision that, if either party wishes to prematurely terminate the contract, three month’s notice must be given.The typical agreement also prohibits subleasing. To deter tenants from overstaying, we recommend including a clause quadrupling the rent if the tenant does not leave when the contract ends.
                </p>
            <a href="<?php echo base_url();?>blog" style="color:white;"><p >Know More...</p></a></div>
      
          <div class="item">
            <h3>How effective is the legal system to help landlords who have given their homes on rent ?</h3>
            <p>Court proceedings of any type should be avoided at all times. Well-defined contracts will greatly help landlords to convince tenants that they (the landlords) are likely to win the case in court. An eviction cases can last up to 10 or even 20 years.(Legislation)
Local laws cover landlord and tenant agreements. Many local rent control laws such as the Maharashtra Rent Act 1999, Delhi Rent Act 1995, Tamil Nadu Buildings (Lease and Rent Control) Act 1960, strictly regulate rental agreements that are 12 months or longer in favor of tenants. If the monthly rent payable on a property exceeds Rs3,500 (US$76), the agreement is subject to the Transfer of Property Act (TPA), which assigns the landlord responsibilities including i) disclosure of information regarding material defects in the property and ii) uninterrupted occupation of the property for the agreed period (subject to periodic visits by the landlord for inspection).</p>
          <a href="<?php echo base_url();?>blog" style="color:white;"><p >Know More...</p></a>
          </div>
      
          <div class="item">
            <h3>Tired of time consuming, expensive court battles ? We've got the right solution for you...</h3>
            <p>The Indian law of Arbitration and Conciliation act 1996, under section 61 provides the scope and application of conciliation (alternate dispute redressal). Interminable, time consuming, complex and expensive Court procedures have led parties to settle their disputes out of the court.  It would be the right answer for people who want  their disputes to be settled expeditiously and through an option which is cost effective and simple.However;it is non-binding in nature!</p>
          <a href="<?php echo base_url();?>blog" style="color:white;"><p >Know More...</p></a>
          </div>
      
          <div class="item">
            <h3>Statutory explanation of will and its features ! </h3>
            <p>The Indian Succession Act 1925 under Section 2(h) provides the statutory explanation of a will and its features. Will means the legal declaration of the intention of a person with respect to his property, which he desires to take effect after his death. It is a unilateral document and takes effect after the death of the person making it. It can be revoked or altered by the maker of it at any time he is competent to dispose of his property. </p>
            <a href="<?php echo base_url();?>blog" style="color:white;"><p >Know More...</p></a>
          </div>
        </div>
        
      
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>



    </div>
  </section>
  <section class="fullWidthSection greyColor padding40">
    <div class="container">
      <h3 class="textcenter areuExpertHeading">Are You An Expert?</h3><br>
  
      <p style="text-align: center;">Come be a part of our journey, revolutionize taxation, financial and legal services Create a hassle free life for everyone. </p>
      <a href="<?php echo base_url();?>Expert"><p class="textright">Know More...
      </p></a>
    </div>
  </section>
  
  <section class="fullWidthSection padding40">
    <div class="container">
     <h3 class="textcenter">About Us</h3><br>
      <br>
      <br>
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
      <p><b>Ms. Rashmmi Khetrapal</b> – a dynamic and enterprising CA is a senior partner of <b class="new">M/s ARBN & Associates</b>. She has 16 + years of experience in Accounting & Finance. She has held the esteemed post of the Chairperson of the Gurgaon Branch of the NIRC of the ICAI during 2009-10. She was also the first lady to be elected as NIRC member of ICAI in 2010-13. During her tenure as a NIRC member, she has held various prestigious positions like NICASA Chairperson, Chairperson for CA members in Industry, Chairperson for Branch Coordination Committee and Chairperson for VAT Committee etc. Her area of expertise lies in the field of assessment & appeal cases for VAT, Service & Income Tax for corporate & high net worth individuals.</p>
    </div>
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
            <!--counter start -->
             <li><a href="http://www.hitwebcounter.com" target="_blank">
<img src="http://hitwebcounter.com/counter/counter.php?page=6443082&style=0003&nbdigits=5&type=page&initCount=0" title="website counter" Alt="website counter"   border="0" >
</a>                                        <br/>
                                        <!-- hitwebcounter.com --><a href="http://www.hitwebcounter.com" title="Stats For Free" 
                                        target="_blank" style="font-family: Arial, Helvetica, sans-serif; 
                                        font-size: 9px; color: #736C65; text-decoration: none ;"><em>Stats For Free                                        </em>
                                        </a>   </li>
                                        <!--end -->
          </ul>

        </div>
        <div class="col-md-6 col-sm-6 textright">
            <a href="http://visheshagya.in">  Visheshagya.in</a>  |  <a href="<?php echo base_url();?>ExpertTermsAndCondition">Terms of Use</a> | <a href="<?= base_url() ?>Privacy">Privacy Policy</a>
        </div>
      </div>
        
    </div>
  </footer>
  

  <!-- MODAL -->
  <div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true">
  	<div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> <span id="frmLoginTitle">Login</span></h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <div id="frmLogin">
            <form role="form" action="<?php echo base_url();?>clientHome/clientLogin" method="post">
              <div class="form-group">
                <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
                <input type="text" class="form-control" id="usrname" name="clientEmailId" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                <input type="password" class="form-control" id="psw" name="clientPassword" placeholder="Enter password">
              </div>
              <div class="loginFormPopup checkbox">
                <label>
                  <input type="checkbox" value="">
                  <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                  Remember me
                </label>
              </div>
              <button type="submit" name="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
            </form>
          </div>
          <!--forgot -->


          <!--forgot end -->
           <div id="frmRegister">
            
            <?php echo form_open(base_url() . 'clientHome/addClient', ['class' => 'form-horizontal']) ?>

              <div class="form-group">
                <label for="usrname"><i class="fa fa-user" aria-hidden="true"></i> Full Name</label>
                <?php echo form_input(['name' => 'clientName', 'type' => 'name', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'Enter Your name']); ?>
              </div>
              <div class="form-group">
                <label for="email"><i class="fa fa-envelope" aria-hidden="true"></i> Email Id</label>
               <?php echo form_input(['name' => 'clientEmailId', 'id' => 'clientEmailId', 'type' => 'email', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'abc@xyz.com',
                                        'onchange' => 'checkClientEmailId(this.value)']);
                                    ?>
                                      </div>
                <div class="form-group">
                <label for="phone"><i class="glyphicon glyphicon-phone" aria-hidden="true"></i> Mobile No.</label>
               
<?php echo form_input(['name' => 'clientMobileNumber', 'type' => 'text', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'Mobile Number']); ?>
              </div>

              <div class="loginFormPopup checkbox">
                <label>
                  <input type="checkbox" value="">
                  <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                  I agree with the <a href="<?= base_url(); ?>ExpertTermsAndCondition" title="Click here to read Terms and Conditions">terms and conditions</a> for Registration.
                </label>
              </div>

              
              <?php echo form_submit(['name' => 'submit', 'value' => 'Sign-Up', 'class' => 'btn btn-success btn-block']) ?>
            </form>

          </div>
        </div>
        <div class="modal-footer">
          
 
 
  


          <div id="frmLoginFooter">
            <p>New to Visheshagya? <a id="btnShowSignup" href="#">Sign Up</a></p>
          </div>
          <div id="frmRegisterFooter">
            <p>Already a member? <a id="btnShowLogin" href="#">Login</a></p>
          </div>
          <div id="frmForgotFooter">
          <p>Forgot <a id="btnShowForgot" href="#">Password?</a></p>
          </div>
        </div>
      </div>

  	</div>
  </div>

	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		
		<script src="<?php echo base_url(); ?>assets1/js/bootstrap.min.js"></script>	
		<script src="<?php echo base_url(); ?>assets1/js/matchheight.js"></script>
		<script src="<?php echo base_url(); ?>assets1/js/typeit.min.js"></script>
		<script src="<?php echo base_url(); ?>assets1/js/bootstrap-slider.js"></script>
		<script src="<?php echo base_url(); ?>assets1/js/readmore.min.js"></script>
		<script src="<?php echo base_url(); ?>assets1/js/site.js"></script>

		<script type="text/javascript">
    $('#search').keydown(function(e) {
    			             if (e.keyCode == 13) {
    			             searchExpert();
                             }
                            });
                        
        function searchExpert()
        {
            var search = $("#search").val();
            $.ajax({
                url: 'Ajaxcalls/searchExpertCategory',
                type: 'POST',
                data: {'search': search},
                async: false,
                success: function (response) {
                    //console.log(response.categoryId);
                    window.location = "ExpertdetailsTmp/search/" + response.categoryId;
                }
            });
        }
</script>


<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5785c7a1c287f8ca2cbd0e66/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

	</body>
</html>