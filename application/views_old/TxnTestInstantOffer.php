<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
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
                    <h1>Merchant Check Out Page</h1>
                </div>
            </div>
        </div>
    <div class="content-full-height">
            
            <div>
                <div class="row">
                    <div class="col-sm-12 transaction-reciept" >
                        
                        <table class="table-txn-reciept">
                            <thead>
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
                               
                            </thead>
                            <tbody>
                                
                                <tr>
                                    <th>Consultation Type</th>
                                    <td><?php echo $this->session->userdata('consultationTypeName'); ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><b>Your appointment will start within five Mintues after the payment.</b></td>
                                </tr>
                            </tbody>
                        </table>
                                   
                        <div class="col-sm-12 update-no">
                           <form method="post" action="<?php echo base_url();?>/Ajaxcalls/paytmpost">
                                <input id="ORDER_ID" type="hidden" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo $this->session->userdata('appointmentId'); ?>">
                                <input id="CUST_ID" type="hidden" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $this->session->userdata('clientId');?>">
                                <input id="INDUSTRY_TYPE_ID" type="hidden" tabindex="4" maxlength="20" size="20" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
                                <input id="CHANNEL_ID" type="hidden" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
                                <!-- <br><br> --><input title="TXN_AMOUNT" tabindex="10"
						type="hidden" name="TXN_AMOUNT"
						value="<?php echo $amount; ?>">
                                <input title="TXN_AMOUNT" tabindex="10"
						type="hidden" name="CALLBACK_URL"
                                                value="<?php echo base_url();?>Ajaxcalls/Response">
                                <p>You can change your contact number </p><input type="text" name="phone" value="<?php echo $clientMobileNumber; ?>" />
                                <button  type="submit"  onclick="" class="btn" >Continue<i class="fa fa-hand-o-right"></i></button>
                                
                            </form>
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
        <script src=<?php echo base_url() . "assets/js/script.js"; ?>></script>

</body>
</html>