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
        <title><?php echo $page_title;?></title>

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" type="text/css">
                <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/font-awesome.min.css" type="text/css">
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
                    <a class="navbar-brand" href="<?php echo base_url(); ?>clientHome/mainHome"><div class="logo"></div></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                         <li ><a href="<?php echo base_url() .'Expertdetails'; ?>" >Home</a></li>  
                        <li class="active"><a href="<?php echo base_url("expert/chartered-accountant") ; ?>" class="active">Expert Search</a></li>
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
                            <?php if ($expertCategoryId == 1) { ?>
                            <img class="categoryLogo img-responsive" src="<?php echo base_url(); ?>assets/img/logo_ca.svg" alt="CA Logo" >
                            <?php } 
                                if ($expertCategoryId == 2) {?>
                            
                                    <img class="categoryLogo img-responsive" src="<?php echo base_url(); ?>assets/img/logo_cs.svg" alt="CS Logo" >
                                <?php
                                
                                } 
                                  if ($expertCategoryId == 4) {
                                ?>      
                                    <img class="categoryLogo img-responsive" src="<?php echo base_url(); ?>assets/img/logo_cma.png" alt="CMA Logo" >
                                    <?php
                                
                                } 
                                  if ($expertCategoryId == 3) {
                                ?>   
                                    <img class="categoryLogo img-responsive
                                    "  src="<?php echo base_url(); ?>assets/img/logo_law.svg" alt="Lawyers Logo" >
                                 <?php
                                
                                } 
                                  
                                ?>      
                           

                        </div>
                    </div>
                      <form class="form-horizontal" id="frmFilter">
                      <input type="hidden" name="start" id="start" value="0" />
                              <input type="hidden" name="expertCategoryId" id="expertCategoryId" value="<?php echo $expertCategoryId;?>" />
                    <div class="row">
                        <h4 class="text-center greyColor">Select Services</h4>
                        
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                          

                            <!-- Checkbox List START -->
                             <?php
                                       foreach ($subCategoryDetails as $subCategory) {
                                   ?>
                            <div class="checkbox">
                                <label>
                                      
                                     <input type="checkbox" name="subCategoryIds[]"  value="<?php echo $subCategory->subCategoryId; ?>" onclick="filter_list()">
                                    
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
                        <h4 class="text-center greyColor">Select Location</h4>
                        
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                          

                            <!-- Checkbox List START -->
                             <?php

                                       foreach ($location_list as $location) {
                                   ?>
                            <div class="checkbox">
                                <label>
                                       
                                     <input type="checkbox" name="locationId[]"  value="<?php echo $location->locationId; ?>" onclick="filter_list()">
                                    
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    <?php echo $location->locationName;?>
                                </label>
                            </div>
                              <?php
                                        }
                                 ?> 
                            
                            <!-- Checkbox List END -->

                                </div>
                            </div>
                           
                            <div class="rowGap">&nbsp;</div> 
                           
                            </div>
                            <div class="rowGap">&nbsp;</div>
                             
                        </form>
                            </div><!-- col-end -->
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-xs-12 pad0">
                                <div class="categoryBtnBar">
                                    <a href="<?php echo base_url("expert/chartered-accountant"); ?>" class="btn <?php if ($expertCategoryId == 1) { ?> active <?php } ?>"  >Chartered Accountant</a>
                                    <a href="<?php echo base_url("expert/company-secretary"); ?>" class="btn <?php if ($expertCategoryId == 2) { ?> active <?php } ?>"  >Company Secretary</a>
                                    <a href="<?php echo base_url("expert/certified-management-accountant"); ?>" class="btn <?php if ($expertCategoryId == 4) { ?> active <?php } ?>" >Certified Management Accountant</a>
                                    <a href="<?php echo base_url("expert/lawyer"); ?>" class="btn <?php if ($expertCategoryId  == 3) { ?>  active <?php } ?>" >Lawyer</a>
                                </div>        
                            </div>      
                        </div>
                        <div id="listing-content">
                       <?php $this->load->view('list');?>
                        
                        </div>
                       
                        <div id="loading">Loading....</div>
                    </div><!-- col-end -->
                </div><!-- row-end -->
            </article><!-- container end -->
        </section><!-- expert listing end -->

               <?php include('loginFooter.php') ?>
        <?php include("popUp/ClientLogin_view.php");?>    
        <!-- script references -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/matchheight.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/typeit.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-slider.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/readmore.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/site.js"></script>		
        
        <script src=<?php echo base_url() . "assets/js/script.js"; ?>></script>
        <script>
    $(document).ready(function() {
    var win = $(window);
    var request_pending = false;
    win.scroll(function() { 
        if ($(document).height() - win.height() == win.scrollTop()) {
            if(!request_pending){
            request_pending = true;    
            $('#loading').show();
            var start = parseInt($('#start').val());
            start+=20;
            $('#start').val(start.toString());

         $.ajax({
                url: '<?php echo base_url("search/expert_list");?>',
                dataType: 'html',
                type: 'post',
                data: $('#frmFilter').serialize(),
                success: function(html) {
                    $('#listing-content').append(html);
                    $('#loading').hide();
                    
                    request_pending = false;
                }
            });
        }
    }
    }); });

    function filter_list()
    {
        $('#start').val("0");
      
         $.ajax({
                url: '<?php echo base_url("search/expert_list");?>',
                dataType: 'html',
                type: 'post',
                data: $('#frmFilter').serialize(),
                success: function(html) {
                    $('#listing-content').html(html);
                    $('#loading').hide();
                }
            });

    }
</script>
    </body>
</html>