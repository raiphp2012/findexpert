<?php
error_reporting(0);
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
 require_once(APPPATH . "/third_party/paytmlib/config_paytm.php");
 require_once(APPPATH . "/third_party/paytmlib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = FALSE;

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


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
        <link href="<?php echo base_url(); ?>assets/css/font.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
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
                    <a class="navbar-brand" href="<?php echo base_url();?>clientHome/mainHome"><div class="logo"></div>
                    <div class="logo_text">TAX & LEGAL SERVICES REDEFINED</div></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                    <li ><a href="<?php echo base_url() .'Expertdetails'; ?>" >Home</a></li>   
                    <li ><a href="<?php echo base_url() .'Expertdetails/search/1'; ?>" >Expert Search</a></li>
                        <li class="active" ><a href="<?php echo base_url() . 'ClientAppointments'; ?>">My Appointment</a></li>
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
                    <h1>BOOKING CONFIRMATION</h1>
                </div>
            </div>
        </div>
  <div class="content-full-height">
            
            <div>
                <div class="row">
                    <div class="col-sm-12 transaction-reciept">
                        
                        <table class="table-txn-reciept">
                            <thead>
                                <tr>
                                    <th>Appointment ID</th>
                                    <td> <?php echo $this->session->userdata('appointmentId'); ?></td>
                                </tr>
                                
                                <tr>
                                    <th>STATUS </th>



                                    <td> <?php
                                        if (($_POST["STATUS"] == "TXN_SUCCESS") or ($this->session->userdata('ConsultationFees')=="Free")) {
                                            echo "<b> Success</b>" . "<br/>";
                                        } else {
                                            echo "<b> Failed</b>" . "<br/>";
                                        }
                                        ?></td>
                                </tr>
                                 <tr>
                                    <th>Consulting Expert</th>
                                    <td> <?php echo $this->session->userdata('expertName');?></td>
                                </tr>
                                <tr>
                                    <th>Amount</th>
                                    <td> <?php echo  $this->session->userdata('ConsultationFees'); ?></td>
                                </tr>
                               
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Booking Date</th>
                                    <td><?php echo date("d/m/Y", strtotime($this->session->userdata('appointmentBookingDate'))); ?>.</td>
                                </tr>
                                <tr>
                                    <th>Consultation Date</th>
                                    <td><?php echo date("d/m/Y", strtotime($this->session->userdata('appointmentDate'))); ?>.</td>
                                </tr>
                                <tr>
                                    <th>Consultation Time</th>
                                    <td><?php echo 
                                    date('h:i A', strtotime($this->session->userdata('appointmentStartTime')));
                                     ?> – <?php echo date('h:i A',strtotime($this->session->userdata('appointmentEndTime'))); ?>.</td>
                                </tr>
                                <tr>
                                    <th>Consultation Type</th>
                                    <td><?php echo $this->session->userdata('consultationTypeName'); ?></td>
                                </tr>
                            </tbody>
                        </table>
                         <div class="confirm-info">
                         <?php
                                        if (($_POST["STATUS"] == "TXN_SUCCESS")) {
                                           ?>

                         <p> <a href="<?php echo base_url();?>ClientAppointmentDetails/showExpertData?expertId=<?php echo $this->session->userdata('expertId'); ?>">Start Appointment</a> </p>
                                               <?php
                        
                                        } 
                               if($this->session->userdata('ConsultationFees')=="Free"){        
                                        ?>
                                        <p> <a href="<?php echo base_url();?>ClientAppointmentDetails/showExpertData?expertId=<?php echo $this->session->userdata('expertId'); ?>">Start Appointment</a> </p>
                                     <?php } ?>   
                       
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
<?php        include('analytics/googleAnalytics.php'); 

 	   
         
?>
<script src=<?php echo base_url() . "assets/js/script.js"; ?>></script>
    </body>
</html>