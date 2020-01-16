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
          <li class="active"><a href="#" class="active">Expert Search</a></li>
          <li><a href="#">My Appointment</a></li>
          <li><a href="#">E-Lockers</a></li>
          <li><a href="#">My Profile</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
  <div class="wide">
    <div class="container">
      <div class="page-header">
        <h1>Expert Search</h1>
      </div>
    </div>
  </div>
  <div class="rowGap">&nbsp;</div>
 
  <!--  Layout container START -->
  <div class="container">   
    <div class="row content">
      <!-- Sidebar START -->
      <div class="col-xs-12 col-sm-5 col-md-4 sidenav">    
        
        <div class="row">                
          <div class="col-xs-3"> <!-- required for floating -->
              <!-- Nav tabs -->
              <ul class="nav nav-tabs tabs-left sideways">
                <li class="active"><a href="<?php echo base_url();?>Expertdetails/search/1" data-toggle="tab"  data-target="#tab_ca">Chartered Accountant</a></li>
                <li><a href="<?php echo base_url();?>Expertdetails/search/2" data-toggle="tab"  data-target="#tab_cs">Company Secretary</a> </a></li>
                <li><a href="<?php echo base_url();?>Expertdetails/search/4" data-toggle="tab"  data-target="#tab_cma">Certified Management Accountant</a></a></li>
                <li><a href="<?php echo base_url();?>Expertdetails/search/3" data-toggle="tab"  data-target="#tab_law">Lawyer</a></a></li>
              </ul>
          </div>
          
          <div class="col-xs-9">
              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane active" id="tab_ca">
                  <div class="row">
                    <div class="col-xs-6 col-xs-offset-3">
                      <img src="<?php echo base_url(); ?>assets/img/logo_ca.svg" alt="CA Logo" >
                    </div>
                  </div>
                  <div class="row">
                    <h4 class="text-center greyColor">Select Services</h4>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                       <?php
                             foreach ($subCategoryDetails as $subCategory) {
                                ?>
                      <!-- Checkbox List START -->
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"  name="subCategoryIds[]" value="<?php echo $subCategory->subCategoryId; ?>">
                          <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                           <?php echo $subCategory->subCategoryName; ?>
                        </label>
                      </div>
                             <?php }  ?>
                      
                      <!-- Checkbox List END -->
                      
                    </div>
                  </div>
                  <div class="row">
                    <h4 class="text-center greyColor">Years of Experience</h4>
                  </div>                  
                  <div class="row">
                    <div class="col-xs-12 text-center">
                      <input type="text" class="slider" value="" data-slider-min="0" data-slider-max="25" data-slider-step="1" data-slider-value="5" data-slider-orientation="horizontal" data-slider-selection="after" data-slider-tooltip="show">
                    </div>                    
                  </div>
                  <div class="rowGap">&nbsp;</div>
                  <div class="row">
                    <div class="text-center">
                      <a href="#" class="btn btn-primary btn-lg active" role="button">Search Expert</a>
                    </div>
                  </div>
                  

                  
                </div>
                <div class="tab-pane" id="tab_cs">
                  <div class="col-xs-6 col-xs-offset-3">
                    <img src="<?php echo base_url(); ?>assets/img/logo_cs.svg" alt="CS Logo" >
                  </div>
                  
                </div>
                <div class="tab-pane" id="tab_cma">
                  <div class="col-xs-6 col-xs-offset-3">
                    <img src="<?php echo base_url(); ?>assets/img/logo_cma.png" alt="CMA Logo" >
                  </div>
                  
                </div>
                <div class="tab-pane" id="tab_law">
                  <div class="col-xs-6 col-xs-offset-3">
                    <img src="<?php echo base_url(); ?>assets/img/logo_law.svg" alt="CS Logo" >
                  </div>
                  
                </div>
              </div>
          </div>       
          
        </div>
        
      </div>   <!-- Sidebar END -->
      
      <!-- Main Area Start -->
      <div class="col-xs-12 col-sm-7 col-md-8">
        
        <!-- Expert Block START -->
        <div class="ExpertBlock">
          <div class="row">
            <div class="col-xs-3">
              <div class="expertImage">
                <img src="<?php echo base_url(); ?>assets/img/default.jpg" alt="Expert Image" class="pull-left img-responsive">
              </div>
            </div>
            <div class="col-xs-9">
              <h2 class="expertName">
                Experts Name
                <div class="pull-right">
                  <div class="expertVerifiedIcon" title="Verified Expert">
                    <img src="<?php echo base_url(); ?>assets/img/verify.svg" alt="Verified Expert">            
                  </div>
                </div>              
              </h2>
              <h5><i class="fa fa-graduation-cap" aria-hidden="true"></i> Since, 2003</h5>
              <h5 class="ExpertSkills">
                <span class="label label-primary">Income Tax</span>
                <span class="label label-default">Service Tax</span>
                <span class="label label-default">ST/VAT</span>
                <span class="label label-default">Other Expertise</span>
              </h5>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="expertSummary">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>              
              </div>
            </div>          
          </div>
          <div class="row">
            <div class="col-xs-12 text-right">
              <ul class="consultationFee">
                <li><i class="fa fa-video-camera" aria-hidden="true"></i>&nbsp;&#x20B9;<span>1000</span></li>
                <li><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&#x20B9;<span>750</span></li>
                <li><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&#x20B9;<span>1500</span></li>
                <li><a href="#" class="btn btn-primary btn-lg active" role="button">Book Appointment</a></li>
              </ul>            
            </div>
          </div>
          <hr>
        </div>
        <!-- Expert Block END -->

        <!-- Expert Block START -->
        <div class="ExpertBlock">
          <div class="row">
            <div class="col-xs-3">
              <div class="expertImage">
                <img src="<?php echo base_url(); ?>assets/img/default.jpg" alt="Expert Image" class="pull-left img-responsive">
              </div>
            </div>
            <div class="col-xs-9">
              <h2 class="expertName">
                Experts Name
              </h2>
              <h5><i class="fa fa-graduation-cap" aria-hidden="true"></i> Since, 2003</h5>
              <h5 class="ExpertSkills">
                <span class="label label-primary">Income Tax</span>
                <span class="label label-default">Service Tax</span>
                <span class="label label-default">ST/VAT</span>
                <span class="label label-default">Other Expertise</span>
              </h5>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="expertSummary">
                <p>Lorem ipsum dolor sit amet, </p>              
              </div>
            </div>          
          </div>
          <div class="row">
            <div class="col-xs-12 text-right">
              <ul class="consultationFee">
                <li><i class="fa fa-video-camera" aria-hidden="true"></i>&nbsp;&#x20B9;<span>1000</span></li>
                <li><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&#x20B9;<span>750</span></li>
                <li><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&#x20B9;<span>1500</span></li>
                <li><a href="#" class="btn btn-primary btn-lg active" role="button">Book Appointment</a></li>
              </ul>            
            </div>
          </div>
          <hr>
        </div>
        <!-- Expert Block END -->

        <!-- Expert Block START -->
        <div class="ExpertBlock">
          <div class="row">
            <div class="col-xs-3">
              <div class="expertImage">
                <img src="<?php echo base_url(); ?>assets/img/default.jpg" alt="Expert Image" class="pull-left img-responsive">
              </div>
            </div>
            <div class="col-xs-9">
              <h2 class="expertName">
                Experts Name
                <div class="pull-right">
                  <div class="expertVerifiedIcon" title="Verified Expert">
                    <img src="<?php echo base_url(); ?>assets/img/verify.svg" alt="Verified Expert">            
                  </div>
                </div>              
              </h2>
              <h5><i class="fa fa-graduation-cap" aria-hidden="true"></i> Since, 2003</h5>
              <h5 class="ExpertSkills">
                <span class="label label-primary">Income Tax</span>
                <span class="label label-default">Service Tax</span>
                <span class="label label-default">ST/VAT</span>
                <span class="label label-default">Other Expertise</span>
              </h5>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="expertSummary">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>              
              </div>
            </div>          
          </div>
          <div class="row">
            <div class="col-xs-12 text-right">
              <ul class="consultationFee">
                <li><i class="fa fa-video-camera" aria-hidden="true"></i>&nbsp;&#x20B9;<span>1000</span></li>
                <li><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&#x20B9;<span>750</span></li>
                <li><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&#x20B9;<span>1500</span></li>
                <li><a href="#" class="btn btn-primary btn-lg active" role="button">Book Appointment</a></li>
              </ul>            
            </div>
          </div>
          <hr>
        </div>
        <!-- Expert Block END -->


      </div>   <!-- Main Area END -->
    </div>
  </div> <!--  Layout container END -->
  

      
  
 
  <footer id="footer" class="fullWidthSection greyColor">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <ul class="list-inline social-buttons">
            <li>Follow Us On:</li>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
          </ul>

        </div>
        <div class="col-md-6 col-sm-6 textright">
          Visheshagya.in  |  <a href="">Terms of Use</a> | <a href="">Privacy Policy</a>
        </div>
      </div>
    </div>
  </footer>

	<!-- script references -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/matchheight.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/typeit.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap-slider.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/readmore.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/site.js"></script>		
	</body>
</html>