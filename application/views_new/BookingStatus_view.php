<?php
/*
 * @author Visheshagya
 */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html lang="en">
    <head>
        <!--<link type="text/css" href="/cometchat/cometchatcss.php" rel="stylesheet" charset="utf-8">-->
        <!--<script type="text/javascript" src="/cometchat/cometchatjs.php" charset="utf-8"></script>-->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Visheshagya is an ecommerce portal for search and video/audio appointment with various experts like CA,CS,CMA,Lawyers etc.">
        <meta name="keywords" content="CA,CS,CMA,Lawyers,CA in India,CS in India,CMA  in India,Lawyer in India">
        <meta name="author" content="Visheshagya">
        <link rel="icon" href="<?php echo base_url(); ?>favicon.ico" type="image/gif">
        <title>Client Appointments: Visheshagya</title>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?php echo base_url();?>css/style.css" rel="stylesheet">
        <link href="<?php echo base_url();?>css/two-column.css" rel="stylesheet">
        <link href="<?php echo base_url();?>css/responsive.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/css/styles.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/css/font.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="<?php echo base_url();?>js/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#ChangePassword").click(function () {
                    $("#myModalChangePassword").modal('show');
                });
            });
        </script>
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
                        <a class="navbar-brand" href="<?php echo base_url(); ?>Expert/mainexpertHome"><div class="logo"></div></a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav navbar-right navigation">
                                <?php if($this->session->userdata('parent_id')==0){ ?>
                                     <li><a href="<?php echo base_url(); ?>ExpertProfile/updateMyMember">
                                     My  Practice</a></li>
                                    
                                    <?php } ?>
                                    <li><a href = "<?php echo base_url().'MyOffice'; ?>">My Office</a></li>
                                    <li><a href ="<?php echo base_url().'ExpertAppointments'; ?>" >My Appointments</a></li>
                                    <li class="active"><a href="<?php echo base_url().'ExpertDocument'; ?>">E-Lockers</a></li>
                                    <li><a href="<?php echo base_url().'ExpertProfile';?>" >My Profile</a></li>
                                    <li>
                                <div class="dropdown">
                                    <!--to display profile images-->
                                    <a class="btn dropdown-toggle profile-img" data-toggle="dropdown" href="#">
                                        <img src="<?php 
                                         $profileImage=$this->session->userdata('profileImage');
                                          echo $profileImage;
                                        ?>" class="img-responsive img-circle img-thumbnail" width="50px" height="10px;">
                                    </a>
                                    <!--END to display profile images -->
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                        
                                        <li> </li>
                                        
                                        <li><a href="<?php echo base_url() ?>Logout" class="btn btn-danger btn-xs" role="button" data-toggle="modal">Logout</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>   
                </div>
            </nav>
            <div class="wide">
                <div class="container">
                    <div class="page-header">
                        <h1>Booking Status Page</h1>
                    </div>
                </div>
            </div>
            <div class="content-full-height">
                <div class="row">
                    <div class="col-sm-12 transaction-reciept">
                        
                        <!-- <p style="color: #0F9D28;font-weight: bold;font-size:2em">CONGRATULATIONS..!! </p>
                        <p> Your Appointment has been booked successfully.</p> -->
                        <table class="table table-txn-reciept">
                            <thead>
                                <tr style="border-top: 1px solid #e4e4e4;">
                                    <th>Appointment ID</th>
                                    <td  class="receiptId"> <?php echo $this->session->userdata('appointmentId'); ?></td>
                                </tr>
                                <tr>
                                    <th>Consulting Client </th>
                                    <td> <?php echo $this->session->userdata('clientName'); ?></td>
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
                                     ?> – <?php echo date('h:i A',strtotime($this->session->flashdata('appointmentEndTime'))); ?>.</td>
                                </tr>
                                <tr>
                                    <th>Consultation Type</th>
                                    <td><?php echo $this->session->userdata('consultationTypeName'); ?></td>
                                </tr>
                            </tbody>
                        </table>
                         <div class="confirm-info">
                            <p> <a href="<?php echo base_url();?>ExpertAppointmentDetails/showClientData?clientId=<?php echo $this->session->userdata('clientId'); ?>">Start Appointment</a> </p>
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
<?php        include('analytics/googleAnalytics.php'); ?>
    </body>
</html>