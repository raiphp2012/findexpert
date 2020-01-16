<?php
/*
 * @author Visheshagya
 */

?>
<!DOCTYPE html>
<html>
    <head>
    <!--
<link type="text/css" href="/cometchat/cometchatcss.php" rel="stylesheet" charset="utf-8">
<script type="text/javascript" src="/cometchat/cometchatjs.php" charset="utf-8"></script>-->
        <meta charset='utf-8' />
        <link href='../css/fullcalendar.css' rel='stylesheet' />
        <link href='../css/fullcalendar.print.css' rel='stylesheet' media='print' />
        <link rel="icon" href="<?php echo base_url(); ?>favicon.ico" type="image/gif">
        <script src='../js/moment.min.js'></script>
        <script src='../js/jquery.min.js'></script>
        <script src='../js/fullcalendar.min.js'></script>
        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/two-column.css" rel="stylesheet">
        <link href="../css/responsive.css" rel="stylesheet">
        <link href="../assets/css/styles.css" rel="stylesheet">
        <link href="../assets/css/font.css" rel="stylesheet">
        <link href="../assets/css/style.css" rel="stylesheet">
        <!-- Custom JS -->
        <script src="../js/custom.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src=<?php echo base_url() . "js/bootstrap.min.js"; ?>></script>
        <script>
            var expertEvents = [
                {
                    title: 'All Day Event',
                    start: '2016-03-16'
                },
                {
                    title: 'Long Event',
                    start: '2016-03-07',
                    end: '2016-03-10'
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: '2016-03-09T16:00:00'
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: '2016-03-16T16:00:00'
                },
                {
                    title: 'Conference',
                    start: '2016-03-11',
                    end: '2016-03-13'
                },
                {
                    title: 'Meeting',
                    start: '2016-03-12T10:30:00',
                    end: '2016-03-12T12:30:00'
                },
                {
                    title: 'Lunch',
                    start: '2016-03-12T12:00:00'
                },
                {
                    title: 'Meeting',
                    start: '2016-03-12T14:30:00'
                },
                {
                    title: 'Happy Hour',
                    start: '2016-03-12T17:30:00'
                },
                {
                    title: 'Dinner',
                    start: '2016-03-12T20:00:00'
                },
                {
                    title: 'Birthday Party',
                    start: '2016-03-13T07:00:00'
                },
                {
                    title: 'HOLI',
                    start: '2016-03-23',
                    rendering: 'background',
                    color: '#ff1a1a'

                },
                {
                    title: 'Click for Google',
                    url: 'http://google.com/',
                    start: '2016-03-28'
                }
            ];
            var expertConsultationTypes = [
                {id: 'audio', title: 'Audio'},
                {id: 'video', title: 'Video'},
                {id: 'person', title: 'In Person'}
            ];
            $(document).ready(function () {
                $('#calendar').fullCalendar({
                    customButtons: {
                        myCustomButton: {
                            text: 'Block Day',
                            click: function () {
                                alert('clicked the block day button!');
                            }
                        }
                    },
//                    hiddenDays: [ 2, 4 ] ,
                    
                    defaultView: 'agendaDay',
//                    weekends: false,
                    header: {
                        left: 'prev,next today myCustomButton',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    eventColor: '#378006',
                    nowIndicator: true,
                    businessHours: true,
                    start: '07:00', // a start time (10am in this example)
                    end: '19:00', // an end time (6pm in this example)
                    dow: [1, 2, 3, 4],
                    defaultDate: new Date().toISOString().slice(0, 10),
                    editable: true,
                    eventLimit: true, // allow "more" link when too many events
                    events: expertEvents,
                    resources: expertConsultationTypes,
                    dayRender: function( date, cell ) { },
                    dayClick: function (date, jsEvent, view) {
                        $("#currentDate").val(date.format());
                        $("#myModal").modal('show');

                        /*                        alert('Clicked on: ' + date.format());////                    alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);////                    alert('Current view: ' + view.name);////                    // change the day's background color just for fun                  $(this).css('background-color', 'red');
                         //*/
                    }
                    /*,
                     eventClick: function (calEvent, jsEvent, view) {
                     
                     //                        alert('Event: ' + calEvent.title);
                     //                        alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
                     //                        alert('View: ' + view.name);
                     
                     // change the border color just for fun
                     $(this).css('border-color', 'red');
                     
                     }*/
                });

            });

        </script>
         <script type="text/javascript">
            $(document).ready(function () {
                $("#ChangePassword").click(function () {
                    $("#myModalChangePassword").modal('show');
                });
            });
        </script>
        <style>

            #calendar {
                max-width: 900px;
                margin: 0 auto;
            }

        </style>
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
                        <a class="navbar-brand" href="<?php echo base_url(); ?>Expert/mainexpertHome"><div class="logo"></div>
                         <div class="logo_text">TAX & LEGAL SERVICES REDEFINED</div></a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            
                            <div class="top-nav-tab downarrow">
                                <ul class="nav nav-tabs">
                                <?php if($this->session->userdata('parent_id')==0){ ?>
                                     <li><a href="<?php echo base_url(); ?>ExpertProfile/updateMyMember">
                                     My  Practice</a></li>
                                    
                                    <?php } ?>
                                    <li><a href = "<?php echo base_url().'MyOffice'; ?>">My Office</a></li>
                                    <li><a href ="<?php echo base_url().'ExpertAppointments'; ?>" >My Appointments</a></li>
                                    <li><a href="<?php echo base_url().'ExpertDocument'; ?>">E-Lockers</a></li>
                                    <li><a href="<?php echo base_url().'ExpertProfile';?>" >My Profile</a></li>
                                    <li>
                                <div class="dropdown">
                                    <!--to display profile images-->
                                    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
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
                        </ul>
                    </div>   
                </div>
            </nav>

            <div class="wide">
                <div class="container">
                    <div class="page-header">
                        <h1>Personal and Professional Details</h1>
                    </div>
                </div>
            </div>


            <div class="content-full-height personal-details expert-personal-details">
            <div class="two-column-con">
                <div class="container-fluid">
                    <div id="exTab2" class="frm-detail">          
                        <div class="tab-pane downarrow" id="top4">
                            <ul class="nav nav-tabs">
                                <li><a style="cursor: pointer"onclick="location.href = '../ExpertProfile';" data-toggle="tab">Personal</a></li>
                                <?php if($this->session->userdata('parent_id')==0){?> 
                                <li><a style="cursor: pointer"onclick="location.href = '../ExpertProfile/professional';" data-toggle="tab">Professional</a></li>
                                <li><a style="cursor: pointer"onclick="location.href = '../ExpertProfile/consulting';" data-toggle="tab">Consulting</a></li>
                                <?php } ?>
                                <li class="active"><a style="cursor: pointer"onclick="location.href = '../ExpertProfile/calendar';" data-toggle="tab">Calendar</a></li>
                                <?php if($this->session->userdata('parent_id')==0){?> 
                                <li><a style="cursor: pointer"onclick="location.href = '../ExpertProfile/accounts';" data-toggle="tab">Accounts</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <?php
                        if (null != $this->session->flashdata('consultationDetailsSuccess')) {
                            ?>
                            <div class="alert alert-success">
                                <strong>Success!</strong><?php echo $this->session->flashdata('consultationDetailsSuccess'); ?>
                            </div>
                            <?php
                        }
                        ?>
<br>
                        
                       <!-- <div id='calendar' style="margin-top: 3%"></div>-->
<div class="page-header">

  <h1>Click here to complete your Calender. <br><div>
                            <a role="button" onclick="showConsultationTimingForm()" class="btn btn-primary" postion="center">Consultation Timings</a>
                        </div></h1>
</div>
                        <?php //include('DaySelection_view.php'); ?>
                    </div>
                </div>
            </div>
            <?php include('popUp/ExpertAddConsultationTimings_view.php'); ?>
        </div> 
        <!-- Footer -->
        <footer>
            <div class="container text-center">
                <p>Copyright &copy; Visheshagya 2015</p>
            </div>
        </footer>
        <script>
        
            function showConsultationTimingForm()
            {
                $("#showConsultationTimingForm").modal('show');
            }
        </script>
     <?php
        if (NULL !== $this->session->userdata('expertChangePasswordSuccess')) {
            include('popUp/expertChangePasswordSuccess_view.php');
            ?>
            <script>
                $("#changeSuccessMessage").modal('show');
            </script>
            <?php
        }
        if (NULL !== $this->session->userdata('expertChangePasswordError')) {
            // echo $this->session->flashdata('expertLoginError');
            include('popUp/expertChangePasswordError_view.php');
            ?>
            <script>
                $("#expertChangePasswordError").modal('show');
            </script>
            <?php
        }
         include('popUp/ChangePassword_view.php'); 
         include('analytics/googleAnalytics.php');
         ?>
         <script src=<?php echo base_url() . "assets/js/script.js"; ?>></script>
    </body>
</html>