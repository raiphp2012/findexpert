<!DOCTYPE html>
<html>
    <head>
    <!--
<link type="text/css" href="/cometchat/cometchatcss.php" rel="stylesheet" charset="utf-8">
<script type="text/javascript" src="/cometchat/cometchatjs.php" charset="utf-8"></script>-->
        <meta charset='utf-8' />
        <title>Appointment Calendar</title>
        <link href='../css/fullcalendar.css' rel='stylesheet' />
        <link href='../css/fullcalendar.print.css' rel='stylesheet' media='print' />
        <link rel="icon" href="<?php echo base_url(); ?>favicon.ico" type="image/gif">

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/two-column.css" rel="stylesheet">
        <link href="../css/responsive.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/font-awesome.min.css" type="text/css">
        <link href="../assets/css/styles.css" rel="stylesheet">
        <link href="../assets/css/font.css" rel="stylesheet">
        <!-- Custom JS -->
        <!-- Bootstrap Core JavaScript -->
         <script src='../js/jquery.min.js'></script>
  <script src='../js/bootstrap.min.js'></script>
         <link href='../css/fullcalendar.css' rel='stylesheet' />
<link href='../css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='../lib/moment.min.js'></script>
<script src='../js/fullcalendar.js'></script>
<script type='text/javascript' src='../js/gcal.js'></script>
<link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet">
        <script type='text/javascript'>

$(document).ready(function() {
   $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listWeek'
            },
            eventClick:  function(event, jsEvent, view) {
        var d = new Date(event.start);
        d.toLocaleString()  
        $('#event_id').val(event.id);
        $("#eventInfo").html(event.title+' on '+d.toLocaleString() );d
        $("#eventLink").attr('href', event.urls);
        $("#eventEditLink").attr('onclick', "edit_event('"+event.id+"')");
        $("#eventDeleteLink").attr('onclick', "delete_appointment('"+event.id+"')");
        
        $("#eventContent").dialog({ modal: true, title: 'Appointment Summay' });
        
    },
            defaultDate: '<?php echo date("Y-m-d");?>',
            navLinks: true, // can click day/week names to navigate views

            weekNumbers: true,
            weekNumbersWithinDays: true,
            weekNumberCalculation: 'ISO',

            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [
            <?php foreach($event_list as $event){if($event['start']['dateTime'] != ''){
$event['summary'] = trim(preg_replace('/\s+/', ' ', $event['summary']));
$appointment_info = $this->db->query("SELECT * FROM appointment_details WHERE event_id = '".$event['id']."'")->row();
if($appointment_info->clientId != ''){$url = base_url('ExpertAppointmentDetails/showClientData?clientId='.$appointment_info->clientId);}else{$url = $event['htmlLink']; }
                ?>
                {
                    id: "<?php echo $event['id'];?>",
                    title: "<?php echo $event['summary'];?>",
                    urls: "<?php echo $url;?>",
                    start: "<?php echo $event['start']['dateTime'];?>",
                    end: "<?php echo $event['end']['dateTime'];?>"
                },
               <?php }} ?>
               ]
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
                                    <li><a href="<?php echo base_url().'ExpertDocument'; ?>">E-Lockers</a></li>
                                    <li class="active"><a href="<?php echo base_url().'ExpertProfile';?>" >My Profile</a></li>
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
                        
                      <div id='calendar' style="margin-top: 3%"></div>

                      <div id="eventContent" title="Event Details">
    <div id="eventInfo"></div>
    <p><strong><a id="eventLink" target="_blank"><i class="fa fa-eye"></i></a></strong><strong><a id="eventEditLink" href="javascript:void(0)"><i class="fa fa-edit"></i></a></strong><strong><a id="eventDeleteLink" href="javascript:void(0)"><i class="fa fa-trash"></i></a></strong></p>
</div>

 <div id="eventEditContent" title="Event Details" class="modal">
   
   <div class="row">
                                                    <div class="col-md-12 form-wrapper">
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="selectbasic">Consultation Date</label>
                                                            <div class="col-md-8">
                                                                <div class='input-group date'>
                                                                    <input type='text' style="width: 100%;" name="consultationDate" id="consultationDateValue" class="form-control" value="<?php echo date("Y-m-d"); ?>" onchange="fetchNewConsultationTimings()" style="z-index:99999 !important;"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                          </div>
                                                        </div>
   <div class="row">
            <div class="col-md-12 form-wrapper">
 <div class="form-group">
 <label class="col-md-4 control-label" for="textinput">Available Slots</label>  
 <div class="col-md-12 form-wrapper">
  <select class="form-control" id='slots' >
    <option value="">Select Time</option>
    </select>
 </div>
 </div>
    </div>
    </div>

    <div class="row">
            <div class="col-md-12 form-wrapper">
 <div class="form-group">
 <div class="col-md-12 form-wrapper">
 <button name="btnReschedule" id="btn-reschedule" onclick="reschedule_appointment()">Reschedule Now</button>
 </div>
 </div>
    </div>
    </div>
    <input type="hidden" name="event_id" id="event_id" />
                                                        </div>
</div>
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
        <?php include('loginFooter.php') ?>
          
             
                    <script src="../js/custom.js"></script>
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

         <script src= "../assets/js/script.js"></script>
         <script>

  function edit_event(event_id)
   {
        $.ajax({
            url: "<?php echo base_url('ExpertProfile/edit_event');?>", 
            type: 'post',
            dataType: 'json',
            data: {'event_id': event_id},
            success: function(response){
            $("#eventEditContent").dialog({ modal: true, title: 'Reschedule Appointment' });
              $("#consultationDateValue").val(response.appointmentDate);
              fetchNewConsultationTimings();
             $( "#eventContent" ).dialog('close');
            },
        });
   }


function reschedule_appointment()
{
     var event_id = $('#event_id').val();
     var consultationDateValue = $('#consultationDateValue').val();
     var slots = $('#slots').val();
      $.ajax({
            url: "<?php echo base_url('ExpertProfile/reschedule_appointment');?>", 
            type: 'post',
            dataType: 'json',
            data: {'event_id': event_id,'consultationDateValue': consultationDateValue,'slots': slots},
            success: function(response){
            alert("Appoitment has been rescheduled");
            window.location.reload();
              
            },
        });
}


function delete_appointment()
{
     var event_id = $('#event_id').val();
      $.ajax({
            url: "<?php echo base_url('ExpertProfile/delete_appointment');?>", 
            type: 'post',
            dataType: 'json',
            data: {'event_id': event_id},
            success: function(response){
            alert("Appoitment has been deleted");
            window.location.reload();
              
            },
        });
}

   function fetchNewConsultationTimings()
            {
                var ddlSlots = $("#slots");
                ddlSlots.find('option').remove();
                var param1 = new Date();
                var twoDigitMonth = ((param1.getMonth().toString().length) == 1) ? '0' + (param1.getMonth() + 1) : (param1.getMonth() + 1);
                var twoDigitDate = ((param1.getDate().toString().length) == 1) ? '0' + (param1.getDate()) : (param1.getDate());
                var Currentdate = param1.getFullYear() + "-" + twoDigitMonth + "-" + twoDigitDate;
                var selectedDate = $("#consultationDateValue").val();
                var twoDigitHours = ((param1.getHours().toString().length) == 1) ? '0' + (param1.getHours()) : (param1.getHours());
                var twoDigitMinutes = ((param1.getMinutes().toString().length) == 1) ? '0' + (param1.getMinutes()) : (param1.getMinutes());

                var ttime = twoDigitHours + ":" + twoDigitMinutes;

                $.ajax(
                        {
                            url: '<?php echo base_url() . "Ajaxcalls/fetchAvailableConsultationSlots"; ?>',
                            type: 'POST',
                            data: {'selectedDate': $("#consultationDateValue").val(), 'expertId': '<?php echo $expertId;?>'},
                            success: function (newData)
                            {
                                ddlSlots.find('option').remove();
                                console.log(newData.consultationSlots);
                                console.log(newData.previouslyBookedAppointments);
                                if (typeof newData.consultationSlots === 'string') {
                                    ddlSlots.append($('<option></option>', {
                                        text: newData.consultationSlots,
                                    }));
                                    if (newData.consultaionSlots == "" || !newData.consultationSlots)
                                    {
                                        document.getElementById("nextButton").style.display = 'none';
                                       /// alert("No appointment available for the selected day");
                                    } else
                                    {
                                        document.getElementById("nextButton").style.display = 'none';
                                        //alert(newData.consultationSlots);
                                    }
                                } else
                                {
                                    ddlSlots.append('<option value=null>Select Available time </option>');
                                    for (var i = 0; i < newData.consultationSlots.length; i++)
                                    {
                                    if(newData.consultationSlots[i].starts==undefined) continue;
                                        ddlSlots.append('<option value=' + newData.consultationSlots[i].starts + '>' + newData.consultationSlots[i].starts + '-' + newData.consultationSlots[i].ends + '</option>');
                                    }
                                    for (var i = 0; i < newData.consultationSlots.length; i++)
                                    {
                                        $.each(newData.previouslyBookedAppointments, function (index, value) {
                                            if (value == newData.consultationSlots[i].starts)
                                            {
                                                $('#slots option[value="' + newData.consultationSlots[i].starts + '"]').remove();
                                            }
                                        });
                                    }
                                    
                                }
                            }
                        });
            }
         </script>

            <script>
            $(function () {
                $("#consultationDateValue").datepicker({
                    dateFormat: 'yy-mm-dd',
                    minDate: 0
                });
                $('#consultationDateValue').css('zIndex',9999);
            });
        </script>
    </body>
</html>