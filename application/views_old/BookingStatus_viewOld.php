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
        <title>Client Appointments: Visheshagya</title>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/two-column.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#ChangePassword").click(function () {
                    $("#myModalChangePassword").modal('show');
                });
            });
        </script>
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
                        <a class="navbar-brand" id="logo" href="<?php echo base_url() . 'ClientProfile'; ?>"></a> 
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">                            
                            <div class="top-nav-tab downarrow">
                                <ul class="nav nav-tabs">
                                    <li> <a style="cursor: pointer" href="<?php echo base_url() . 'Expertdetails/search/1'; ?>">Expert Search</a> </li>
                                    <li class="active"> <a style="cursor: pointer" href="<?php echo base_url() . 'ClientAppointments'; ?>">My Appointment</a> </li>
                                    <li> <a style="cursor: pointer" href="<?php echo base_url() . 'ClientDocument'; ?>">E-Lockers</a> </li>
                                    <li> <a style="cursor: pointer" href="<?php echo base_url() . 'ClientProfile'; ?>">My Profile</a> </li>
                                    <?php include('clientProfileIconMenu.php'); ?>
                                </ul>
                            </div>
                        </ul>
                    </div>
                </div>
            </nav>
            <div>
                <div class="row">
                    <div class="col-sm-12" style="margin-left: 30%;width: 50%;">
                        <h3>BOOKING CONFIRMATION!</h3>
                        <p style="color: #0F9D28;font-weight: bold;font-size:2em">CONGRATULATIONS..!! </p>
                        <p> Your Appointment has been booked successfully.</p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Appointment ID</th>
                                    <td> <?php echo $this->session->flashdata('appointmentId'); ?></td>
                                </tr>
                                <tr>
                                    <th>Consulting Expert</th>
                                    <td> <?php echo "Tax & Legal Expert"; ?></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Booking Date</th>
                                    <td><?php echo date("d/m/Y", strtotime($this->session->flashdata('appointmentBookingDate'))); ?>.</td>
                                </tr>
                                <tr>
                                    <th>Consultation Date</th>
                                    <td><?php echo date("d/m/Y", strtotime($this->session->flashdata('appointmentDate'))); ?>.</td>
                                </tr>
                                <tr>
                                    <th>Consultation Time</th>
                                    <td><?php echo 
                                    date('h:i A', strtotime($this->session->flashdata('appointmentStartTime')));
                                     ?> – <?php echo date('h:i A',strtotime($this->session->flashdata('appointmentEndTime'))); ?>.</td>
                                </tr>
                                <tr>
                                    <th>Consultation Type</th>
                                    <td><?php echo $this->session->flashdata('consultationTypeName'); ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <p> A confirmation email with instructions to start the appointment has been sent to your registered email Id.</p>
                        <p> Please ensure the following at the time of appointment:</p>
                        <p> 1. Your have an active Internet connection.</p>
                        <p> 2. Your web-cam is working(In case of Video consultation).</p>
                        <p> 3. You should have headphone-mic to do a VIDEO call.</p>
                    </div>
                </div>
            </div>
        </div>
<?php        include('analytics/googleAnalytics.php'); ?>
    </body>
</html>