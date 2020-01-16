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
                        <li> <a style="cursor: pointer" href="<?php echo base_url() . 'Expertdetails'; ?>">Home</a> </li>
                        <li class="active"><a href="<?php echo base_url() . 'Expertdetails/search/1'; ?>" class="active">Expert Search</a></li>
                        <li><a href="<?php echo base_url() . 'ClientAppointments'; ?>">My Appointment</a></li>
                        <li><a href="<?php echo base_url() . 'ClientDocument'; ?>">E-Lockers</a></li>
                        <li><a href="<?php echo base_url() . 'ClientProfile'; ?>">My Profile</a></li>
                        <?php include('clientProfileIconMenu.php'); ?>
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
        <div class="container">   
            <div class="row table-row">
                <!-- Sidebar START -->
                <div class="col-xs-12 col-sm-4 sidenavDark ">    
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
                            <div class="expertProfileVerified">
                                <img src="<?php echo base_url(); ?>assets/img/verifyWt.svg" alt="Verified Expert Icon">
                                <h4>Verified Expert</h4>
                            </div>            
                            <ul class="expertProfileSkills">
                                <li><?php echo $expertPersonalData->skills; ?></li>

                            </ul>
                            <!--<ul class="expertProfileAvailable">
                                <li>Mon</li>
                                <li>Wed</li>
                                <li>Fri</li>
                            </ul>-->
                            <a href="<?php echo base_url() . 'Searchexpertdetails/clientBookingAppointment/' . $expertPersonalData->expertId . '/' . $expertPersonalData->expertName . '/' . $expertPersonalData->categoryName; ?>" class="btn btn-success btn-lg active " role="button">Book Appointment</a>
                            <ul class="expertProfileFee">
                                <li><i class="fa fa-video-camera" aria-hidden="true"></i>&nbsp;&#x20B9;&nbsp;<?php echo $expertPersonalData->Video; ?></li>
                                <li><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&#x20B9;&nbsp;<?php echo $expertPersonalData->Audio; ?></li>
                                <li><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&#x20B9;&nbsp;<?php echo $expertPersonalData->InPerson; ?></li>
                            </ul>            

                        </div>
                    </div>

                </div>   <!-- Sidebar END -->

                <!-- Main Area Start -->
                <div class="col-xs-12 col-sm-8">
                    <div class="rowGap">&nbsp;</div>
                    <div class="container-fluid">
                        <h3>Professional Summary</h3>
                        <p><?php echo $expertPersonalData->expertProfileSummary; ?></p>
                        <hr>

                        <h3>Qualification</h3>
                        <ul class="custom-bullet">
                            <li>Chartered Accountant, 2010</li>
                            <li>B.Com (Hons), 2005</li>
                        </ul>
                        <hr>

                        <h3>Experience</h3>
                        <ul class="custom-bullet">
                            <?php
                            foreach (explode(",", $expertPersonalData->skills) as $skills) {
                                echo "<li>" . $skills . "</li>";
                            }
                            ?>            
                        </ul>
                        <hr>

                        <h3>Address</h3>
                        <address>
                            <?php echo $expertPersonalData->expertAddressLine1; ?>
                            <?php echo $expertPersonalData->expertAddressLine2; ?>
                            <?php echo $expertPersonalData->expertCity; ?>
                            <?php echo $expertPersonalData->expertPincode; ?>

                        </address>

                    </div>

                </div>   <!-- Main Area END -->
            </div>
        </div> <!--  Layout container END -->

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