<?php 
error_reporting(0);
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
                    <a class="navbar-brand" href=""<?php echo base_url();?>clientHome/mainHome""><div class="logo"></div>
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
                                <tr>
                                    <th>Appointment ID</th>
                                    <td> <?php echo $this->session->userdata('appointmentId'); ?></td>
                                </tr>
                                
                                <tr>
                                    <th>Consulting Expert</th>
                                    <td> <?php echo $clientName;?></td>
                                </tr>
                                <tr>
                                    <th>Amount</th>
                                    <td> <?php echo $amount; ?></td>
                                </tr>
                                
                                
                                <tr>
                                    <th>Consultation Type</th>
                                    <td><?php echo $this->session->userdata('consultationTypeName'); ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><b>Your appointment has been start within five Mintues after the payment.</b></td>
                                    
                                </tr>
                        </table>
                                    <?php
                        $price = $amount;
                        // Merchant key here as provided by Payu
                        $MERCHANT_KEY = 'r42B13KZ';
                        // Merchant Salt as provided by Payu
                        $SALT = "9csXZBXmrD";
                        $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
                        $hash_string = $MERCHANT_KEY . "|" . $txnid . "|" . $price . "|Subscription fess MCQUES|" . $clientName . "|" . $clientEmailId . "|" . $txnid . "||||||||||" . $SALT;
                        $hash = hash('sha512', $hash_string);
                        ?>
                        <div class="col-sm-12 update-no">
                            <form method="POST" action="https://secure.payu.in/_payment">
                                <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY; ?>" />
                                <input type="hidden" name="hash" value="<?php echo $hash; ?>"/>
                                <input type="hidden" name="txnid" value="<?php echo $txnid; ?>" />
                                <p>You can change your contact number </p><input type="text" name="phone" value="<?php echo $clientMobileNumber; ?>" />
                                <!-- <br><br> --><input type="hidden" name="amount" value="<?php echo $price; ?>" />
                                <input type="hidden" name="firstname" id="firstname" value="<?php echo $clientName; ?>" >
                                <input type="hidden"  name="email" id="email" value="<?php echo $clientEmailId; ?>"  />
                                <input type="hidden"  name="productinfo" value="Subscription fess MCQUES">
                                <input type="hidden"  name="surl" value="<?php echo base_url(); ?>Ajaxcalls/PayUSucces" size="64" />
                                <input type="hidden"  name="furl" value="<?php echo base_url(); ?>Ajaxcalls/PayUfailure" size="64" />
                                <input type="hidden"   name="service_provider" value="payu_paisa" size="64" />
                                <input  type="hidden"  name="udf1" value="<?php echo $txnid; ?>">
                                 <button  type="submit"  onclick="" class="btn" >Continue<i class="fa fa-hand-o-right"></i></button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
       <?php include('loginFooter.php') ?>
<?php        include('analytics/googleAnalytics.php'); 

 	   
         
?>
        <script src=<?php echo base_url() . "assets/js/script.js"; ?>></script>
    </body>
</html>
