<?php
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["payuMoneyId"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];	        
?>
<!DOCTYPE html>
<html lang="en">
    <head>
     
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Visheshagya">
        <title>Client Appointments: Visheshagya</title>
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url();?>css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?php echo base_url();?>css/style.css" rel="stylesheet">
        <link href="<?php echo base_url();?>css/two-column.css" rel="stylesheet">
        <link href="<?php echo base_url();?>css/responsive.css" rel="stylesheet">
         <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Heebo:400,700|Oswald:400,700" type="text/css" media="all">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">
        
        <!--[if lt IE 9]>
                <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="<?php echo base_url();?>js/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#ChangePassword").click(function () {
                    $("#myModalChangePassword").modal('show');
                });
            });
        </script>
        <style>
              body{
    background-color:none;
     }
     .two-column-con{
     padding:0; margin:0;
     }
     .navbar-brand{
        background:none;
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
                    <a class="navbar-brand" href="<?php echo base_url(); ?>"><div class="logo"></div>
                    <div class="logo_text">TAX & LEGAL SERVICES REDEFINED</div></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo base_url() .'Expertdetails'; ?>" >Home</a></li>   
                    <li ><a href="<?php echo base_url() .'Expertdetails/search/1'; ?>" >Expert Search</a></li>
                        <li class="active"><a  
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
                    <h1>BOOKING CONFIRMATION!</h1>
                </div>
            </div>
        </div>
        <div class="content-full-height">
            
            <div>
                <div class="row">
                    <div class="col-sm-12" style="margin-left: 30%;width: 50%;">
                        
                        <p style="color: #0F9D28;font-weight: bold;font-size:2em">CONGRATULATIONS..!! </p>
                        <p> Your Appointment has been booked successfully.</p>
                     
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Transcation ID</th>
                                    <td><?php echo  $this->session->userdata('txn_id'); ?></td>
                                </tr>
                                
                                <tr>
                                    <th>STATUS </th>
                                    <td>Success</td>
                                </tr>
                                <tr>
                                    <th>Amount</th>
                                    <td> <?php echo  $this->session->userdata('amount'); ?></td>
                                </tr>
                               
                                
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Transcation Date</th>
                                    <td><?php echo date("d/m/Y", strtotime($_POST['addedon'])); ?>.</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="confirm-info">
                            <p> A confirmation email with instructions to start the appointment has been sent to your registered email Id.</p>
                            <p> Please ensure the following at the time of appointment:</p>
                            <p> 1. Your have an active Internet connection.</p>
                            <p> 2. Your web-cam is working(In case of Video consultation).</p>
                            <p> 3. You should have headphone-mic to do a VIDEO call.</p>
        
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <?php include('loginFooter.php') ?>
        <?php        include('analytics/googleAnalytics.php');    ?>
    </body>
</html>	