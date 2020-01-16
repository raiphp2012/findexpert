<!DOCTYPE html>
<html lang="en">

    <head>
    <!--
<link type="text/css" href="/cometchat/cometchatcss.php" rel="stylesheet" charset="utf-8">
<script type="text/javascript" src="/cometchat/cometchatjs.php" charset="utf-8"></script>-->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Visheshagya</title>

        <!-- Bootstrap Core CSS -->
        <link href=<?php echo base_url() . "css/bootstrap.min.css"; ?> rel="stylesheet" type="text/css">
                <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/font-awesome.min.css" type="text/css">
        <!-- Custom CSS -->
        <link href=<?php echo base_url() . "css/effect.css"; ?> rel="stylesheet" type="text/css">
        <link href=<?php echo base_url() . "css/style.css"; ?> rel="stylesheet" type="text/css">
        <link href=<?php echo base_url() . "css/two-column.css"; ?> rel="stylesheet" type="text/css">

        <!-- jQuery -->
        <script src=<?php echo base_url() . "js/jquery.min.js"; ?>></script>

        <!-- Bootstrap Core JavaScript -->
        <script src=<?php echo base_url() . "js/bootstrap.min.js"; ?>></script>

    </head>

    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                    <a class="navbar-brand" id="logo" href="<?php echo base_url() . 'Welcome'; ?>"></a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <div class="navbar-query"  style="color: black">Have a Query? | Call <span style="color:#E31E24;">7862800600</span></div>
                        <div style="font-size:23px;     margin-left: 31%;
    margin-top: -4%;">Have a Query? | Call <span style="color:#E31E24;">7862800600</span></div>
                        <ul class="nav navbar-nav navbar-right">
                            <?php if (NULL === $this->session->userdata('emailId')) { ?>
                            <li><a style="cursor: pointer" id="login">Login</a></li>
                                <li><a style="cursor: pointer" id="register">Signup</a></li>
                            <?php } ?>
                            
                           <li> <a href="<?php echo base_url() . 'Expert'; ?>">Expert</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </nav>
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
                            if(NULL !== $this->session->userdata('clientResetPasswordError'))
                            {
                            // echo $this->session->flashdata('expertLoginError');
                            include('popUp/clientResetPasswordError_view.php');
                                ?>
                                <script>
                                    $("#clientResetPasswordError").modal('show');
                                </script>
                      <?php
                        }
                            ?>
        <!-- body content -->
        <div class="two-column-con">
            <div class="container">
                <div id="exTab2">	
                    <ul class="nav nav-tabs">                        
                        <li <?php if ($categoryId == 1) { ?>class="active"<?php } ?>>                            
                            <a  href=<?php echo base_url() . "ExpertdetailsTmp/search/1"; ?> >Chartered Accountant</a>
                        </li>
                        <li  <?php if ($categoryId == 2) { ?>class="active"<?php } ?>>
                            <a href=<?php echo base_url() . "ExpertdetailsTmp/search/2"; ?>  >Company Secretary</a>
                        </li>
                        

                        <li  <?php if ($categoryId == 4) { ?>class="active"<?php } ?>>
                            <a href=<?php echo base_url() . "ExpertdetailsTmp/search/4"; ?> >CMA</a>
                        </li>
                        
                        <li  <?php if ($categoryId == 3) { ?>class="active"<?php } ?>>
                            <a href=<?php echo base_url() . "ExpertdetailsTmp/search/3"; ?> >Lawyer</a>
                        </li>
                    </ul>

                    <div class="tab-content ">
                        <div class="tab-pane active" id="1">
                            <div class="sidebar">
                                <!-- left form -->
                                <div class="col-xs-12">
                                    <form class="form-horizontal" action=<?php echo base_url() . "SearchexpertdetailsTmp"; ?> method="POST">
                                        <fieldset>
                                            <!-- Form Name -->
                                            <legend>Search Expert</legend>
                                            <!-- Multiple Checkboxes -->
                                            <div class="form-group" style="max-height:200px;overFlow-y:auto;">
                                                <label class="col-md-12 control-label" for="checkboxes">Service Type</label>
                                                <div class="col-md-12">
                                                    <?php
                                                    foreach ($subCategoryDetails as $subCategory) {
                                                        ?>
                                                        <div class="checkbox">
                                                            <label for="checkboxes-0">
                                                                <input type="checkbox" name="subCategoryIds[]" id="checkboxes-0" value="<?php echo $subCategory->subCategoryId; ?>">
                                                                <?php echo $subCategory->subCategoryName; ?>
                                                            </label>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>                                                    
                                                </div>
                                            </div>
                                        </fieldset>
                                        <hr>
                                        <fieldset>

                                            <!-- Form Name city-->
                                            <!-- Multiple Checkboxes -->
                                             <div class="form-group">
                                                <label class="col-md-12 control-label" for="checkboxes">Experience in Years</label>
                                                <div class="col-md-12">
                                                   
                                                        <div class="checkbox">
                                                            <label for="checkboxes-0">
    <input type="checkbox" name="experinceInYear[]" id="checkboxes-0"  
    value="5">0- 5 
                                                              
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label for="checkboxes-0">
    <input type="checkbox" name="experinceInYear[]" id="checkboxes-0"  
    value="6">6- 10 
                                                              
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label for="checkboxes-0">
    <input type="checkbox" name="experinceInYear[]" id="checkboxes-0"  
    value="15">11- 15 
                                                              
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label for="checkboxes-0">
    <input type="checkbox" name="experinceInYear[]" id="checkboxes-0"  
    value="20">16- 20 
                                                              
                                                            </label>
                                                        </div>
                                                         <div class="checkbox">
                                                            <label for="checkboxes-0">
    <input type="checkbox" name="experinceInYear[]" id="checkboxes-0"  
    value="20+">More than 20 
                                                              
                                                            </label>
                                                        </div>
                                                       
                                                </div>
                                            </div>
                                        </fieldset>
                                        <!-- Button -->
                                        <div class="form-group">
                                            <div class="col-md-12">
<!--                                                <input type="submit" class="btn btn-block btn-primary" value="Search Expert">-->
                                                <a role="button" class="btn btn-primary" style="cursor: pointer"  onclick="showLogin()"id="login1">Search Expert</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- end left form -->
                            </div>
                            <div class="main-content baner-grids">
                                <div class="col-md-6 baner-top">
                                    <figure class="effect-bubba">
                                        <img src=<?php echo base_url() . "img/img1.jpg"; ?> alt=""/>
                                        <figcaption>
                                            <h4>SEARCH  AN EXPERT</h4> <p>from our panel by Service Type</p>	
                                        </figcaption>			
                                    </figure>	
                                </div>
                                <div class="col-md-6 baner-top">
                                    <figure class="effect-bubba">
                                        <img src=<?php echo base_url() . "img/img2.jpg"; ?> alt=""/>
                                        <figcaption>
                                           <h4>SELECT AN EXPERT </h4><p>to Consult and Book An Appoinment</p>	
                                        </figcaption>			
                                    </figure>	
                                </div>
                                <div class="col-md-6 baner-top">
                                    <figure class="effect-bubba">
                                        <img src=<?php echo base_url() . "img/img3.jpg"; ?> alt=""/>
                                        <figcaption>
                                            <h4>CHANNEL (VIDEO,AUDIO, IN PERSON) </h4><p>and Pay Consultation Fees</p>	
                                        </figcaption>			
                                    </figure>	
                                </div>
                                <div class="col-md-6 baner-top">
                                    <figure class="effect-bubba">
                                        <img src=<?php echo base_url() . "img/img4.jpg"; ?> alt=""/>
                                        <figcaption>
                                            <h4>READY TO CONSULT</h4><p>with your selected Expert at scheduled time.</p>	
                                        </figcaption>			
                                    </figure>	
                                </div>
                            </div>		
                        </div>
                        <div class="tab-pane" id="2">
                            <div class="sidebar">layout2</div>
                            <div class="main-content">middle2</div>
                        </div>
                        <div class="tab-pane" id="3">
                            <div class="sidebar">layout3</div>
                            <div class="main-content">middle3</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end body content -->
        <!-- Footer -->
        <footer>
            <?php include('ClientLoginPopUp_view.php'); ?>
        <!-- jQuery -->
        <script src="<?php echo base_url() . "js/jquery.min.js"; ?>"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url() . "js/bootstrap.min.js"; ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#login").click(function () {
                    $("#myModal").modal('show');
                });
            });

           function showLogin()
           {
               $("#myModal").modal('show');
           }

            $(document).ready(function () {
                $("#register").click(function () {
                    $("#myModalregister").modal('show');
                });
            });
        </script>
        <?php include('ClientSignupPopUp_view.php'); ?>
        
    </body>
</html>