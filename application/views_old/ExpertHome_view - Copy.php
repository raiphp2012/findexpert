<?php
/*
 * @author Visheshagya
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Visheshagya">
        <title>Visheshagya - Home Page Expert</title>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/two-column.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
    </head>

    <body>
        <div class="content-full-height">
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
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#" id="login">Login</a></li>
                                <li class="active"><a href="ExpertSignup">Signup</a></li>
                                <?php
                                if (NULL !== $this->session->userdata('expertSignUpSuccess')) {
                                    include('popUp/SignupSuccessMessage_view.php');
                                    ?>
                                    <script>
                                        $("#signupSuccessMessage").modal('show');
                                    </script>
<?php } ?>                                             
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </nav>

                <!-- Intro Header -->
                <header>
<?php echo $this->session->flashdata('expertSignUpSuccess'); ?>
                    <div class="intro-body intro-body-bg">
                        <div class="container">
                            <div class="intro-content">
                                <h1 class="intro-text-inner">COLLABORATE AND GROW</h1>
                            </div>
                            <div class="row infoInImages">
                                <div class="col-xs-12">
                                    <ul class="iconedBulletPoints row">
                                        <li class="text-center col-xs-3"><img src="img/expert.png">
                                            <div class="d-point">SELECT YOUR BUSINESS HOURS</div>
                                        </li>
                                        <li class="text-center col-xs-3"><img src="img/icon-appointment.png">
                                            <div class="d-point">SELECT CONSULTATION CHANNELS (VIDEO, AUDIO, IN-PERSON)</div>
                                        </li>
                                        <li class="text-center col-xs-3"><img src="img/icon-money.png">
                                            <div class="d-point">SET CONSULTATION FEES</div>
                                        </li>								
                                        <li class="text-center col-xs-3"><img src="img/icon-consult.png">
                                            <div class="d-point">SUCCEED</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>	
                    </div>
                    <div class="clearfix"></div>
                    <div class="myriadpro-light" id="reasons_block">
                        <div class="container">
                            <div class="row-fluid">TAKE A DEMO TOUR</div>
                        </div>
                    </div>
                </header>
                <!-- body content -->
                <div id="whyLybrate" class="text-center container myriadpro-light">
                    <h2></h2>
                    <div class="row">
                        <div class="col-sm-6 col-md-4 a-whyLybrate">
                            <div class="d-image">
                                <img src="img/icon-user.png">
                            </div>
                            <div class="d-title">
                                PROMOTE
                            </div>
                            <!--<div class="d-text">
                                loram ipsum <br>
                            </div>-->
                        </div>
                        <div class="col-sm-6 col-md-4 a-whyLybrate">
                            <div class="d-image">
                                <img src="img/icon-user1.png">
                            </div>
                            <div class="d-title">
                                GROW
                            </div>
                            <!--                    <div class="d-text">
                                                    Loram Ipsum <br>
                                                </div>-->
                        </div>
                        <div class="col-sm-6 col-md-4 a-whyLybrate">
                            <div class="d-image">
                                <img src="img/icon-user2.png">
                            </div>
                            <div class="d-title">
                                MANAGE
                            </div>
                            <!--<div class="d-text">Loram ipsum <br>                    </div>-->
                        </div>
                    </div>
                    <!--<div class="exp-button"> <button class="btn btn-sm btn-primary">EXPERT SIGNUP</button></div>-->
                </div>
            </div>
        </div>
        <!-- end body content -->
        <!-- Footer -->
        <footer>
            <div class="container text-center">
                <p>Copyright &copy; Visheshagya 2015</p>
            </div>
        </footer>
        <!-- jQuery -->
        <script src=<?php echo base_url() . "js/jquery.min.js"; ?>></script>

        <!-- Bootstrap Core JavaScript -->
        <script src=<?php echo base_url() . "js/bootstrap.min.js"; ?>></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#login").click(function () {
                    $("#myModal").modal('show');
                });
            });
        </script>
        <!-- to display the pop up login -->
        <!--
        <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>                    
                    <div class="container">
<?php // echo form_open('Welcome/checkUserLogin', ['class' => 'form-horizontal'])  ?>
                        <fieldset>
                            <legend>Login</legend>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-lg-4 control-label">Email</label>
                                        <div class="col-lg-7">
<?php // echo form_input(['name' => 'emailId', 'type' => 'email', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'abc@xyz.com']);  ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
<?php // echo form_error('emailId');  ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="inputPassword" class="col-lg-4 control-label">Password</label>
                                        <div class="col-lg-7">
<?php // echo form_password(['name' => 'password', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'Password']);  ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
<?php // echo form_error('password');  ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-10">
                                    <div class="radio">
                                        <label>
                                            <input name="loginType" value="1" checked="true" type="radio">
                                            Expert
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input name="optionsRadios" value="2" type="radio">
                                            Client
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-8 pull-right col-lg-offset-2">
        <?php // echo form_reset(['name' => 'reset', 'value' => 'Reset', 'class' => 'btn btn-default']) ?>
<?php // echo form_submit(['name' => 'submit', 'value' => 'Login', 'class' => 'btn btn-primary'])  ?>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
        -->
        <!--end -->
<?php include('ExpertLoginPopUp_view.php'); ?>
    </body>
</html>