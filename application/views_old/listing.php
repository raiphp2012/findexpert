<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="description" content="Visheshagya, Services Redefined, is an online e-Commerce portal which acts as an aggregator to connect experts like CA, CS, CMA, Lawyers etc with potential customers.The beauty of the portal is that it not only allows you to search an expert but also allows you to book a real time appointment with that expert and do video and audio consultancy with that expert.Free E - Locker and E - diary facility is available to all.">
        <meta name="keywords" content="CA,CS,CMA,Lawyers,CA in India,CS in India,CMA  in India,Lawyer in India">
        <meta name="author" content="Visheshagya">
        <title>Visheshagya</title>

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Heebo:400,700|Oswald:400,700" type="text/css" media="all">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
        <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
        <!--[if lt IE 9]>
                <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/font.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
        <style>
            .categoryBtnBar .btn.active {
                color: #FFFFFF;
                background-color: #204d74;
            }
            .categoryBtnBar .btn {
                    border: 1px solid #204d74;
                    display: inline-block;
                    margin: 2px 0;
                }
        </style>
    </head>
    <body>
        <a href="#" class="scrollup">Scroll</a>
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
                         <li ><a href="<?php echo base_url() .'Expertdetails'; ?>" >Home</a></li>  
                        <li class="active"><a href="<?php echo base_url() .'Expertdetails/search/1'; ?>" class="active">Expert Search</a></li>
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
                    <h1>Expert Search</h1>
                </div>
            </div>
        </div>

        <!--  Layout container START -->
        <section class="content-full-height expert-listing">
            <article class="container">
                <div class="row">
                    <div class="col-md-4 sidenav"> 
                    <div class="sidenav-wrapper">        
                    <div class="row">
                        <div class="col-xs-12">
                            <?php if ($categoryId == 1) { ?>
                            <img class="categoryLogo img-responsive" src="<?php echo base_url(); ?>assets/img/logo_ca.svg" alt="CA Logo" >
                            <?php } 
                                if ($categoryId == 2) {?>
                            
                                    <img class="categoryLogo img-responsive" src="<?php echo base_url(); ?>assets/img/logo_cs.svg" alt="CS Logo" >
                                <?php
                                
                                } 
                                  if ($categoryId == 4) {
                                ?>      
                                    <img class="categoryLogo img-responsive" src="<?php echo base_url(); ?>assets/img/logo_cma.png" alt="CMA Logo" >
                                    <?php
                                
                                } 
                                  if ($categoryId == 3) {
                                ?>   
                                    <img class="categoryLogo img-responsive
                                    "  src="<?php echo base_url(); ?>assets/img/logo_law.svg" alt="Lawyers Logo" >
                                 <?php
                                
                                } 
                                  
                                ?>      
                           

                        </div>
                    </div>
                    <div class="row">
                        <h4 class="text-center greyColor">Select Services</h4>
                        
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <form class="form-horizontal" action="<?php echo base_url() . "Searchexpertdetails/index/" . $categoryId; ?>" method="POST">

                            <!-- Checkbox List START -->
                             <?php
                                       foreach ($subCategoryDetails as $subCategory) {
                                   ?>
                            <div class="checkbox">
                                <label>
                                        <?php
                                        if (!empty($selectedSubCategoryIds) && in_array($subCategory->subCategoryId, $selectedSubCategoryIds)) {
                                            ?>     
                                    <input type="checkbox"  name="subCategoryIds[]" checked value="<?php echo $subCategory->subCategoryId; ?>">
                                    <?php
                                        } else {
                                            ?>
                                     <input type="checkbox" name="subCategoryIds[]"  value="<?php echo $subCategory->subCategoryId; ?>">
                                     <?php
                                         }
                                         ?>
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    <?php echo $subCategory->subCategoryName;?>
                                </label>
                            </div>
                              <?php
                                         }
                                 ?> 
                            
                            <!-- Checkbox List END -->

                                </div>
                            </div>
                            <!--<div class="row">
                                <h4 class="text-center greyColor">Years of Experience</h4>
                            </div>                  
                            <div class="row">
                                <div class="col-xs-12 text-center">
                                    <input type="text" class="slider" name="experinceInYear" value="" data-slider-min="0" data-slider-max="25" data-slider-step="1" data-slider-value="5" data-slider-orientation="horizontal" data-slider-selection="after" data-slider-tooltip="show">
                                </div>                    
                            </div>-->
                            <div class="rowGap">&nbsp;</div> 
                            <div class="row">
                                <div class="text-center">
                                    <input type="submit"  class="btn btn-primary btn-lg submit-btn" role="button" value="Search Expert">
                                </div>
                            </div>
                            </div>
                            <div class="rowGap">&nbsp;</div>
                            
                        </form>
                            </div><!-- col-end -->
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-xs-12 pad0">
                                <div class="categoryBtnBar">
                                    <a href="<?php echo base_url() . "Expertdetails/search/1"; ?>"    class="btn <?php if ($categoryId == 1) { ?> active <?php } ?>"  >Chartered Accountant</a>
                                    <a href="<?php echo base_url() . "Expertdetails/search/2"; ?>"   class="btn <?php if ($categoryId == 2) { ?> active <?php } ?>"  >Company Secretary</a>
                                    <a href="<?php echo base_url() . "Expertdetails/search/4"; ?>"  class="btn <?php if ($categoryId == 4) { ?> active <?php } ?>" >Certified Management Accountant</a>
                                    <a href="<?php echo base_url() . "Expertdetails/search/3"; ?>"  class="btn <?php if ($categoryId == 3) { ?>  active <?php } ?>" >Lawyer</a>
                                </div>        
                            </div>      
                        </div>
                        <?php foreach ($expertPersonalData as $expertData) {
                           
                        ?>
                        <div class="expert-wrapper">
                            <div class="expert-block">
                                <div class="row">
                                    <div class="col-md-2 pad0">
                                        <img src="<?php
                                            if (trim($expertData->expertProfileImageName) == "") {
                                                echo base_url() . "assets/img/default.jpg";
                                            } else {
                                                echo base_url() . $expertData->expertProfileImageName;
                                            }
                                            ?>" class="img-expert"/>
                                    </div>
                                    <div class="col-md-10 pad0">
                                        <h1 class="exp-name"><?php echo $expertData->expertName; ?></h1>
                                        <span><img class="verified-img" src="<?php echo base_url(); ?>assets/img/verify.svg" alt="Verified Expert"></span>
                                        <h2 class="since"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Since, <?php
                                            $parts = explode('-', $expertData->expertProfessionalCareerStartYear);
                                              echo $parts[0];?>
                                        </h2>
                                        <div class="expertSkills">
                                            <?php
                                                // $i=0;
                                                    foreach (explode(",", $expertData->skills) as $skills) {
                                                // if($i<3)
                                                // {
                                            ?>
                                            <span><?php echo $skills;  ?>,</span>
                                            <?php
                                             } ?>
                                        </div>
                                        <!-- <div class="view-more" id="view-more">View more</div> -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="expertSummary">
                                            <p><?php echo $expertData->expertProfileSummary; ?></p>
                                        </div>
                                    </div>          
                                </div>
                                <div class="row fees">
                                    <div class="col-md-12 pad0">
                                         <div class="fee-wrapper">
                                            <div class="fee-icon-wrapper"><i class="material-icons">videocam</i><i class="fa fa-rupee" aria-hidden="true"></i><span><?php echo $expertData->Video; ?></span></div>
                                            <div class="fee-icon-wrapper"><i class="material-icons">phone</i><i class="fa fa-rupee" aria-hidden="true"></i><span><?php echo $expertData->Audio; ?></span></span></div>
                                            <div class="fee-icon-wrapper"><i class="material-icons">people</i><i class="fa fa-rupee" aria-hidden="true"></i><span><?php echo $expertData->InPerson; ?></span></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row btn-border-wrapper">
                                <div class="col-md-6 pr-app-btn-wrapper pr-btn">
                                    <a href="<?php echo base_url() ?>Expertdetails/viewProfile/<?php echo $expertData->expertId; ?>">View Profile</a>
                                </div>
                                <div class="col-md-6 pr-app-btn-wrapper app-btn">
                                   <a href="<?php echo base_url() . 'Searchexpertdetails/clientBookingAppointment/' . $expertData->expertId . '/' . $expertData->expertName . '/' . $expertData->categoryName; ?>" role="button">Book Appointment</a>
                                </div>          
                            </div>
                        </div><!-- expert-wrapper end -->
                        <?php } echo  $this->pagination->create_links();?>
                    </div><!-- col-end -->
                </div><!-- row-end -->
            </article><!-- container end -->
        </section><!-- expert listing end -->

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
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/matchheight.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/typeit.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-slider.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/readmore.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/site.js"></script>		
        <!-- <script type="text/javascript">
            $('.view-more').on('click',function(){
                // $('.expertSkills').addClass('expertSkillsheight');
                $(this).addClass('expertSkillsheight');
                var text = $('#view-more').text();
                if(text == 'View more'){
                    $('#view-more').text('View less');
                }else{
                    $('#view-more').text('View more');
                }
                
            })
        </script> -->
        <script src=<?php echo base_url() . "assets/js/script.js"; ?>></script>
        <script type="text/javascript">
            $(window).scroll(function () {
                if ($(this).scrollTop() > 100) {
                    $('.scrollup').fadeIn();
                } else {
                    $('.scrollup').fadeOut();
                }
            });

            $('.scrollup').click(function () {
                $("html, body").animate({
                    scrollTop: 0
                }, 600);
                return false;
            });

        </script>
    </body>
</html>