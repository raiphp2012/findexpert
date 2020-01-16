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
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><div class="logo"></div>
                    <div class="logo_text">TAX & LEGAL SERVICES REDEFINED</div></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                    	<li ><a href="<?php echo base_url() .'Expertdetails'; ?>" >Home</a></li>
                        <li class="active"><a href="<?php echo base_url() . 'Expertdetails/search/1'; ?>" class="active">Expert Search</a></li>
                        <li><a href="<?php echo base_url() . 'ClientAppointments'; ?>">My Appointment</a></li>
                        <li><a href="<?php echo base_url() . 'ClientDocument'; ?>">E-Lockers</a></li>
                        <li><a href="<?php echo base_url() . 'ClientProfile'; ?>">My Profile</a></li>
                         <li><a href = "<?php echo base_url() ?>ClientHome/logout">Logout</a></li>
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
        <div class="container">
            <div class="row table-row">
                <!-- Sidebar START -->
                <div class="col-xs-12 col-sm-4 sidenav">            
                    <div class="row">
                        <div class="col-xs-6 col-xs-offset-3 text-center">
                            <?php if ($categoryId == 1) { ?>
                            <img class="categoryLogo" src="<?php echo base_url(); ?>assets/img/logo_ca.svg" alt="CA Logo" >
                            <?php } 
                                if ($categoryId == 2) {?>
                            
                                    <img class="categoryLogo" src="<?php echo base_url(); ?>assets/img/logo_cs.svg" alt="CS Logo" >
                                <?php
                                
                                } 
                                  if ($categoryId == 4) {
                                ?>      
                                    <img class="categoryLogo" src="<?php echo base_url(); ?>assets/img/logo_cma.png" alt="CMA Logo" >
                                    <?php
                                
                                } 
                                  if ($categoryId == 3) {
                                ?>   
                                    <img class="categoryLogo"  src="<?php echo base_url(); ?>assets/img/logo_law.svg" alt="Lawyers Logo" >
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
                                    <input type="checkbox"  checked value="<?php echo $subCategory->subCategoryId; ?>">
                                    <?php
                                        } else {
                                            ?>
                                     <input type="checkbox" value="<?php echo $subCategory->subCategoryId; ?>">
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
                            <input type="submit"  class="btn btn-primary btn-lg active" role="button" value="Search Expert">
                        </div>
                    </div>
                    <div class="rowGap">&nbsp;</div>

                </div> 
                </form>
                  <!-- Sidebar END -->

                <!-- Main Area Start -->
                <div class="col-xs-12 col-sm-8">
                    <div class="rowGap">&nbsp;</div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="categoryBtnBar text-right">
                                <a href="<?php echo base_url() . "Expertdetails/search/1"; ?>"    class="btn <?php if ($categoryId == 1) { ?> active <?php } ?>"  >Chartered Accountant</a>
                                <a href="<?php echo base_url() . "Expertdetails/search/2"; ?>"   class="btn <?php if ($categoryId == 2) { ?> active <?php } ?>"  >Company Secretary</a>
                                <a href="<?php echo base_url() . "Expertdetails/search/4"; ?>"  class="btn <?php if ($categoryId == 4) { ?> active <?php } ?>" >Certified Management Accountant</a>
                                <a href="<?php echo base_url() . "Expertdetails/search/3"; ?>"  class="btn <?php if ($categoryId == 3) { ?>  active <?php } ?>" >Lawyer</a>
                            </div>        
                        </div>      
                    </div>
                    <div class="rowGap">&nbsp;</div>


                    <?php foreach ($expertPersonalData as $expertData) {
                           
                       ?>
                    <!-- Expert Block START -->
                    <div class="ExpertBlock">
                       
                        <div class="row">
                            <div class="col-xs-3">
                                <div class="expertImage">
                                    <img src="<?php
                                                            if (trim($expertData->expertProfileImageName) == "") {
                                                                echo base_url() . "assets/img/default.jpg";
                                                            } else {
                                                                echo base_url() . $expertData->expertProfileImageName;
                                                            }
                                                            ?>" alt="Expert Image"  class="pull-left img-responsive" style="    width: 165px;
    height: 165px;">
                                </div>
                            </div>
                            <div class="col-xs-9">
                                <h2 class="expertName">
                                    <?php echo $expertData->expertName; ?>
                                    <div class="pull-right">
                                        <div class="expertVerifiedIcon" title="Verified Expert">
                                            <img src="<?php echo base_url(); ?>assets/img/verify.svg" alt="Verified Expert">            
                                        </div>
                                    </div>              
                                </h2>
                                <h5><i class="fa fa-graduation-cap" aria-hidden="true"></i> Since, <?php
                                                                        $parts = explode('-', $expertData->expertProfessionalCareerStartYear);
                                                                        echo $parts[0];
                                                                        ?></h5>
                                <h5 class="ExpertSkills">
                                     <?php
                            foreach (explode(",", $expertData->skills) as $skills) {
                                ?>
                           
                                    <span class="label label-primary"><?php echo $skills;  ?></span>
         
                            <?php } ?>
                                    <span class="label label-default">Other Expertise</span>
                                </h5>
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="expertSummary">
                                    <p><?php echo $expertData->expertProfileSummary; ?></p>
                                    </div>
                            </div>          
                        </div>
                        <div class="row">
                            <div class="col-xs-12 text-right">
                                <ul class="consultationFee">
                                    <li><i class="fa fa-video-camera" aria-hidden="true"></i>&nbsp;&#x20B9;<span><?php echo $expertData->Video; ?></span></li>
                                    <li><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&#x20B9;<span><?php echo $expertData->Audio; ?></span></li>
                                    <li><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&#x20B9;<span><?php echo $expertData->InPerson; ?></span></li>
                                    <li><a href="<?php echo base_url() ?>Expertdetails/viewProfile/<?php echo $expertData->expertId; ?>"  class="btn btn-info btn-lg ">View Profile</a></li>                   
                                    <li><a href="<?php echo base_url() . 'Searchexpertdetails/clientBookingAppointment/' . $expertData->expertId . '/' . $expertData->expertName . '/' . $expertData->categoryName; ?>" class="btn btn-primary btn-lg active" role="button">Book Appointment</a></li>
                                </ul>            
                            </div>
                        </div>
                        <hr>
                    </div>
                    <!-- Expert Block END -->
                    <?php } 
                    echo  $this->pagination->create_links(); ?>

                    
                    

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