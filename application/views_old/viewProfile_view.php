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

  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Heebo:400,700|Oswald:400,700" type="text/css" media="all">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/animate.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/bootstrap.min.css" type="text/css">
  <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <link href="css/styles.css" rel="stylesheet">

  <link href="<?php echo  base_url();?>assets1/css/styles.css" rel="stylesheet" type="text/css" media="all" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" type="text/css">
  
 
  
    

  
  
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
           <li class="active"> <a style="cursor: pointer" href="<?php echo base_url() . 'Expertdetails'; ?>">Home</a> </li>
                                    <li> <a style="cursor: pointer" href="<?php echo base_url() . 'Expertdetails/search/1'; ?>">Expert Search</a> </li>
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
  <div class="wide">
    <div class="container">
      <div class="page-header">
        <h1>Expert Profile</h1>
      </div>
    </div>
  </div>
          <?php

        function sentence_cap($impexp, $sentence_split) {
            $textbad = explode($impexp, $sentence_split);
            $newtext = array();
            foreach ($textbad as $sentence) {
                $sentencegood = ucfirst(strtolower($sentence));
                $newtext[] = $sentencegood;
            }
            $textgood = implode($impexp, $newtext);
            return $textgood;
        }
        ?>
 
  <!--  Layout container START -->
  <div class="container view-profile">   
    <div class="row table-row">
      <!-- Sidebar START -->
      <div class="col-xs-12 col-sm-4 col-md-4 sidenavDark ">  
       <div class="expertProfileVerified">
                                <img src="<?php echo base_url(); ?>assets/img/verifyWt.svg" alt="Verified Expert Icon">
                                <!-- <h4 class="verify">Verified Expert</h4> -->
                            </div>   
        <div class="rowGap">&nbsp;</div>
        <div class="row">                
          <div class="col-xs-6 col-xs-offset-3">
            <div class="expertImageRound">
              <img src="<?php
                                if (trim($expertPersonalData->expertProfileImageName) == "") {
                                    echo base_url() . "assets/img/default.jpg";
                                } else {
                                    echo base_url() .$expertPersonalData->expertProfileImageName;
                                }
                                ?>" alt="Expert Image" class="img-responsive">
            </div>
          </div>
        </div>
        <div class="row">                
          <div class="col-xs-12 text-center">
            
           <h2 class="expertProfileName"><?php echo sentence_cap(" ", $expertPersonalData->expertName); ?></h2>
                            <h4 class="expertProfileTitle"><?php echo $expertPersonalData->categoryName; ?></h4>
                            <h4 class="expertProfileTitle">Since, <?php echo $expertPersonalData->expertProfessionalCareerStartYear; ?></h4>
                                      
                            <!-- <ul class="expertProfileSkills">
                                <li><?php /*echo $expertPersonalData->skills;*/ ?></li>

                            </ul> -->
                            <!--<ul class="expertProfileAvailable">
                                <li>Mon</li>
                                <li>Wed</li>
                                <li>Fri</li>
                            </ul>-->
                            <ul class="expertProfileFee">
                                <li><i class="fa fa-video-camera" aria-hidden="true"></i>&nbsp;&#x20B9;&nbsp;<?php echo $expertPersonalData->Video; ?></li>
                                <li><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&#x20B9;&nbsp;<?php echo $expertPersonalData->Audio; ?></li>
                                <li><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&#x20B9;&nbsp;<?php echo $expertPersonalData->InPerson; ?></li>
                            </ul>            
                            <a href="<?php echo base_url() . 'Searchexpertdetails/clientBookingAppointment/' . $expertPersonalData->expertId . '/' . $expertPersonalData->expertName . '/' . $expertPersonalData->categoryName; ?>" class="btn btn-success btn-lg active book-appointment" role="button">Book Appointment</a>
                        </div>
                    </div>

                </div>   <!-- Sidebar END -->
      
      <!-- Main Area Start -->
      <div class="col-xs-12 col-sm-8 col-md-8 profile-details-wrapper">
        <ul class="nav nav-pills">
          <li class="active"><a data-toggle="pill" href="#professional">Professional</a></li>
          <li><a data-toggle="pill" href="#experience">Experience</a></li>
          <li><a data-toggle="pill" href="#officeStaff">Office Staff</a></li>
        </ul>
        <hr/>
          <div class="tab-content">
            <div id="professional" class="tab-pane fade in active">
               <h3 class="headings">Professional Summary</h3>
              <p class="pro-para"><?php echo $expertPersonalData->expertProfileSummary; ?></p>
              <h3 class="headings">Address</h3>
              <address>

                                <?php echo $expertPersonalData->expertAddressLine1; ?>
                                <?php echo $expertPersonalData->expertAddressLine2; ?>
                                <?php echo $expertPersonalData->expertCity; ?>
                                <?php echo $expertPersonalData->expertPincode; ?>

              </address>
            </div>
            <div id="experience" class="tab-pane fade">
               <h3 class="headings">Experience</h3>
                <ul class="custom-bullet">
                    <?php
                    foreach (explode(",", $expertPersonalData->skills) as $skills) {
                        echo "<li>" . $skills . "</li>";
                    }
                    ?>            
                </ul>
            </div>
          <div id="officeStaff" class="tab-pane fade">
            <div class="row">
             <?php if(count($expertTeamData)==0){?>
          <h3 class="headings">No data Available</h3>
          <?php 
        }else{?>
           <h3 class="headings">Office Staff</h3>
         <?php for ($i=0; $i <count($expertTeamData) ; $i++) { 
            # code...
          
            //foreach ($expertTeamData[$i] as $expertTeamData) {

              //print_r($expertTeamData);


          ?>
         
          <div class="col-md-6">
            <div class="expertStaffBlock">
                        <div class="row">
            <div class="col-md-2 pad0">
              <div class="expertStaffImg">
                <img src="<?php
                                if (trim($expertTeamData[$i]->expertProfileImageName) == "") {
                                    echo base_url() . "assets/img/default.jpg";
                                } else {
                                    echo base_url() .$expertTeamData[$i]->expertProfileImageName;
                                }
                                ?>" alt="Expert Image" class="img-responsive">
              </div>
              </div>
              <div class="col-md-10 pad0">
              <h6 class="expertStaffName"><?php echo $expertTeamData[$i]->expertName; ?></h6>
              <p>
               <a href="<?php echo base_url() . 'Searchexpertdetails/clientBookingAppointment/' . $expertTeamData[$i]->expertId . '/' . $expertTeamData[$i]->expertName . '/' . $expertPersonalData->categoryName; ?>" class="btn btn-success active expertStaffBookBtn" role="button">Book Appointment</a>
               </p>
               </div>
            </div>
           <!--  <div class="col-sm-12 col-md-4 text-right">
              <a href="<?php /*echo base_url() . 'Searchexpertdetails/clientBookingAppointment/' . $expertTeamData[$i]->expertId . '/' . $expertTeamData[$i]->expertName . '/' . $expertPersonalData->categoryName; */?>" class="btn btn-success active expertStaffBookBtn" role="button">Book Appointment</a>
            </div>     -->          
          </div>
          </div>
          <!-- <hr> -->
          <?php } }?>
            </div>
          </div>
          </div>
          </div>
          </div>
      
  </div>
 
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
  <?php include("popUp/ClientLogin_view.php");?>

  <!-- script references -->
    

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    
    <script src="<?php echo base_url(); ?>assets1/js/bootstrap.min.js"></script>  
    <script src="<?php echo base_url(); ?>assets1/js/matchheight.js"></script>
    <script src="<?php echo base_url(); ?>assets1/js/typeit.min.js"></script>
    <script src="<?php echo base_url(); ?>assets1/js/bootstrap-slider.js"></script>
    <script src="<?php echo base_url(); ?>assets1/js/readmore.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/site.js"></script>  
    <script src=<?php echo base_url() . "assets/js/script.js"; ?>></script>
  </body>
</html>