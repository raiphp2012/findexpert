<?php
/*
 * @author Visheshagya
 */
include('analytics/googleAnalytics.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Visheshagya">
        <title>Client : Visheshagya</title>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/style.css" rel="stylesheet">

        <script type="text/javascript" src="js/jquery.min.js"></script>
        <!--<script src="js/jquery-ui.min.js"></script>-->
        <script src="js/bootstrap.js"></script>
        <script src="js/css3-mediaqueries.js"></script>
    </head>
    <body>
        <div class="content-full-height">
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="welcome"></a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <div class="navbar-query"  style="color: lightblue">Have a Query? | Call 7862800600</div>
                        <ul class="nav navbar-nav navbar-right">
                            <?php if (NULL === $this->session->userdata('emailId')) { ?>
                                <li><a style="cursor: pointer" id="login">Login</a></li>
                                <li><a style="cursor: pointer" id="register">Signup</a></li>
                            <?php } ?>
                            <li><a href="Expert">Expert</a></li>
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
            if (NULL !== $this->session->userdata('clientResetPasswordError')) {
                include('popUp/clientResetPasswordError_view.php');
                ?>
                <script>
                    $("#clientResetPasswordError").modal('show');
                </script>
    <?php
}
?>
            <!-- Intro Header -->
            <header>
                <div class="intro-body intro-body-bg">
                    <div class="container">
                        <div class="intro-content">
                            <h1 class="intro-text">Consult with our verified Expert panel through our Video, Audio and Text channels anywhere and anytime in 4 easy steps
                            </h1>
                        </div>
                        <div class="row infoInImages">
                            <div class="col-xs-12">
                                <ul class="iconedBulletPoints row">
                                    <li class="text-center col-xs-3"><img src="img/expert.png">
                                        <div class="d-point">Search An Expert</div></li>
                                    <li class="text-center col-xs-3"><img src="img/icon-appointment.png">
                                        <div class="d-point">Book Appointment</div></li>
                                    <li class="text-center col-xs-3"><img src="img/icon-money.png">
                                        <div class="d-point">Pay Fees</div></li>								
                                    <li class="text-center col-xs-3"><img src="img/icon-consult.png">
                                        <div class="d-point">Consult</div></li>
                                </ul>
                            </div>
                        </div>
                    </div>			
                </div>
                <div class="clearfix"></div>
                <div class="myriadpro-light" id="reasons_block">
                    <div class="container">
                        <div class="row-fluid">Don't Let Appointments Ruin Your Plans - Check Out Our Latest Video</div>
                    </div>
                </div>
            </header>
            <!-- body content -->
            <div id="whyVisheshagya" class="text-center container myriadpro-light">
                <h2>Our experts</h2>
                <div class="row">
                    <a href="ExpertdetailsTmp/search/1">
                        <div class="col-sm-6 col-md-3 a-whyVisheshagya">
                            <div class="d-image">
                                <img src="img/icon-user.png">
                            </div>
                            <div class="d-title">
                                Chartered Accountant
                            </div>
                            <div class="d-text">
                            </div>
                        </div> 
                    </a>
                    <a href="ExpertdetailsTmp/search/2">
                        <div class="col-sm-6 col-md-3">
                            <div class="d-image">
                                <img src="img/icon-user1.png">
                            </div>
                            <div class="d-title">
                                Company Secretary
                            </div>
                            <div class="d-text">
                                <!--Loram Ipsum <br>-->
                            </div>
                        </div>
                    </a>

                      <a href="ExpertdetailsTmp/search/4">
                        <div class="col-sm-6 col-md-3">
                            <div class="d-image">
                                <img src="img/icon-user1.png">
                            </div>
                            <div class="d-title">
                                CMA
                            </div>
                            <div class="d-text">
                                <!--Loram Ipsum <br>-->
                            </div>
                        </div>
                    </a>
                    <a href="ExpertdetailsTmp/search/3">
                        <div class="col-sm-6 col-md-3">
                            <div class="d-image">
                                <img src="img/icon-user2.png">
                            </div>
                            <div class="d-title">
                                Lawyer
                            </div>
                            <div class="d-text">
                                <!--Loram ipsum <br>-->
                            </div>
                        </div>
                    </a>

                    
                </div>
            </div>
        </div>
        <!-- end body content -->
        <!-- Footer -->
        <footer>
            <div class="container text-center">
                <p>Copyright &copy; Visheshagya 2016</p>
            </div>
        </footer>
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

                $(document).ready(function () {
                    $("#register").click(function () {
                        $("#myModalregister").modal('show');
                    });
                });
        </script>
<?php include('ClientSignupPopUp_view.php'); ?>

    </body>
</html>

