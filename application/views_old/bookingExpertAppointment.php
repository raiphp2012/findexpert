<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link type="text/css" href="/cometchat/cometchatcss.php" rel="stylesheet" charset="utf-8">
<script type="text/javascript" src="/cometchat/cometchatjs.php" charset="utf-8"></script>
        
        <meta name="description" content="Visheshagya is an ecommerce portal for search and video/audio appointment with various experts like CA,CS,CMA,Lawyers etc.">
        <meta name="keywords" content="CA,CS,CMA,Lawyers,CA in India,CS in India,CMA  in India,Lawyer in India">
        <meta name="author" content="Visheshagya">
        <link rel="icon" href="<?php echo base_url(); ?>favicon.ico" type="image/gif">
        <title>Visheshagya</title>
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/two-column.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/normalize.css" rel="stylesheet">
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src=<?php echo base_url() . "js/bootstrap.min.js"; ?>></script>
        <!--<link rel="stylesheet" href="http://resources/demos/style.css">-->
        <script>
            $(function () {
                $("#consultationDateValue").datepicker({
                    dateFormat: 'yy-mm-dd',
                    minDate: 0
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
                        <a class="navbar-brand" id="logo" href="<?php echo base_url() . 'Expert'; ?>"></a> 
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            
                            <div class="top-nav-tab downarrow">
                                <ul class="nav nav-tabs">
                                    <li><a style="cursor: pointer"onclick="location.href = '<?php echo base_url() . 'ExpertAppointments'; ?>.';" data-toggle="tab">My Appointments</a></li>
                                    <li><a style="cursor: pointer"onclick="location.href = '<?php echo base_url() . 'ExpertDocument'; ?>.';" data-toggle="tab">E-Lockers</a></li>
                                    <li><a style="cursor: pointer"onclick="location.href = '<?php echo base_url() . 'ExpertProfile'; ?>.';" data-toggle="tab">My Profile</a></li>

                                    <li class="active"><a style="cursor: pointer"onclick="location.href = 'MyOffice';" data-toggle="tab">My Office</a></li>
                                    <li>
                                    
                                <div class="dropdown">
                                    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                        <span class="login-icon pull-left"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                        <li role="presentation" class="dropdown-header">Action</li>
                                        <li><a href="Logout" class="btn btn-primary btn-xs" role="button" data-toggle="modal" id="ChangePassword">Change Password</a></li>
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
            <!-- body content -->
            <div class="two-column-con">
                <div class="container">
                    <div id="exTab2" class="frm-detail">
                        <div class="tab-content ">
                            <div class="tab-pane downarrow active">
                                <ul class="nav nav-tabs">
                                    <li id="Step1" class="active">
                                        <a  href="#"  data-toggle="tab">Step1</a>
                                    </li>
                                    <li id="Step2">
                                        <a  href="#"  data-toggle="tab">Step2</a>
                                    </li>
                                    <li id="Step3">
                                        <a data-toggle="tab">Step3</a>
                                    </li>
                                </ul>
                                <div class="main-content detail-view">
                                    <div class="detail-view-cont">
                                        <form class="form-horizontal" action="<?php echo base_url() . 'MyOffice/saveExpertAppointmentDetails'; ?>" method="POST" onsubmit="return checkConsultationType();">
                                           

                                            <fieldset>
                                                <div id="StepTab2" style="display:none;">
                                                    <input type="hidden" id='expertId' name="expertId"value="<?php echo $expertId; ?>">
                                                    <input type="hidden" id='clinetId' name="clientId"value="<?php echo $clinetId; ?>">
                                                    
                                                    <div class="col-md-10 col-md-offset-1 frm-bdr">
                                                        <div class="form-group">
                                                            <center>
                                                                <textarea name="appointmentNotes" id="appointmentNotes" maxlength="2000"  style="background:white; border-radius:5px;" rows="5" cols="50" class="ask-questn-text" placeholder="Please write your query here for better understanding of expert"></textarea>
                                                            </center>
                                                        </div>
                                                        <!--<div class="col-md-12 text-center form-group">-->
                                                        <div class="col-md-9 col-md-offset-3 text-center">
                                                            <div class="col-md-2" >                    
                                                               <a role="button" class="btn btn-sm btn-primary" onclick="showPreviousTab(1)">BACK</a>
                                                            </div>
                                                            <div class="col-md-9" >                    
                                                                <a role="button" class="btn btn-sm btn-primary" onclick="showNextTab(2)">NEXT</a>  </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="StepTab1" >
                                                    
                                                    <div class="alert alert-danger" id="errorMessageType2" style="display: none;"></div>
                                                    <input type="hidden" id='expertId' name="expertId"value="<?php echo $expertId; ?>">
                                                    <input type="hidden" id='clinetId' name="clinetId"value="<?php echo $clinetId; ?>">
                                                    <div class="col-md-10 col-md-offset-1 frm-bdr">
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="selectbasic">Consultation Date</label>
                                                            <div class="col-md-4">
                                                                <div class='input-group date'>
                                                                    <input type='text' style="width: 100%;" name="consultationDate" id="consultationDateValue" class="form-control" value="<?php echo date("Y-m-d"); ?>" onchange="fetchNewConsultationTimings()"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                         <div class="form-group">
                                                            <label class="col-md-4 control-label" for="selectbasic">Team Member</label>
                                                            <div class="col-md-4">
                                                                <div class='input-group date'>
                                                                    
                                                                    <select  class="form-control" id="teamMember" name="teamMember" onchange="fetchNewConsultationTimings()">
                                                                    <option value="<?php 
                                                                    echo $expertId; ?>">
                                                                            Self
                                                                        </option>
                                                                        
                                                                        <?php
                                                                    foreach ($TeamMember as $TeamMember) {
                                                                        ?>
                                                                        <option value="<?php echo $TeamMember->expertId; ?>">
                                                                            <?php echo $TeamMember->expertName; ?>
                                                                        </option>
                                                                    <?php }
                                                                    ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Available Slots</label>  
                                                            <div class="col-md-4">
                                                                <select class="form-control" id='slots' >
                                                                    <?php
                                                                    foreach ($consultationSlots as $slots) {
                                                                        ?>
                                                                        <option value="<?php echo $slots; ?>">
                                                                            <?php echo $slots; ?>
                                                                        </option>
                                                                    <?php }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 col-md-offset-3 text-center">
                                                            <div class="col-md-4 text-center"> 
                                                            <a role="button" class="btn btn-sm btn-primary" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">BACK</a>                   
                                                                
                                                            </div>
                                                            <div class="col-md-4 text-center">                    
                                                                <a role="button" class="btn btn-sm btn-primary" id="nextButton" name="nextButton"   onclick="showNextTab(1)">Next</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="StepTab3" style="display: none;" >
                                                    
                                                   
                                                    <div class="alert alert-danger" id="errorMessageType" style="display: none;"></div>
                                                    <div class="col-md-10 col-md-offset-1 frm-bdr">
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Appointment Date</label>  
                                                            <div class="col-md-4">
                                                                <input id="appointmentDate" readonly name="appointmentDate" type="text" class="form-control input-md">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Selected Time Slot</label>  
                                                            <div class="col-md-4">
                                                                <input id="appointmentStartTime" readonly name="appointmentStartTime" type="text" class="form-control input-md">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="selectbasic">Consultation Type</label>
                                                            <div class="col-md-4">
                                                                <select id="categoryId" name="categoryId" class="form-control" onchange="fetchConsultationTypes(this.value)">
                                                                    <option value="0">--SELECT--</option>
                                                                    <?php
                                                                    foreach ($consultationtypes as $consultationtypes) {
                                                                       
                                                                            ?>
                                                                            <option value=<?php echo $consultationtypes->consultationTypeId; ?>><?php echo $consultationtypes->consultationTypeName; ?>
                                                                            </option>
                                                                            <?php
                                                                        
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                       <div class="form-group">
                                                            <label class="col-md-4 control-label" for="selectbasic">Consultation Fees </label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="ConsultationFees" readonly id="ConsultationFees" class="form-control">
                                                                <input type="hidden" name="amountPaid" id="amount" >
                                                                <span>+10% service Charge</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 col-md-offset-3 text-center">
                                                            <div class="col-md-2 text-center">                    
                                                                <a role="button" class="btn btn-sm btn-primary" onclick="showPreviousTab(2)">BACK</a>
                                                            </div>
                                                            <div class="col-md-6 text-center">                    
                                                                <input type="submit" class="btn btn-success" value="Book Appointment">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
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

        <script>
            fetchNewConsultationTimings();
            var data = [];
            function showNextTab(id)
            {
                data = {"consultationDate": $("#consultationDateValue").val(), "slots": $("#slots option:selected").val()};
                $("#errorMessageType2").hide();
                $("#errorMessageType2").empty();
                if (id == 1)
                {
                    if ($("#slots").val() == "null")
                    {
                        $("#errorMessageType2").append("<strong>Error! </strong>Select Available time.");
                        $('#slots').parent('div').addClass('has-error');
                        $("#slots").focus();
                        $("#errorMessageType2").show();
                    } else
                    {
                        $("#StepTab" + id).hide();
                        $("#Step" + id).removeClass('active');
                        $("#Step" + (id + 1)).addClass('active');
                        $("#StepTab" + (id + 1)).show();
                        $("#appointmentDate").val($("#consultationDateValue").val());
                        $("#appointmentStartTime").val($("#slots").val());
                    }
                } else {
                    $("#StepTab" + id).hide();
                    $("#Step" + id).removeClass('active');
                    $("#Step" + (id + 1)).addClass('active');
                    $("#StepTab" + (id + 1)).show();
                    $("#appointmentDate").val($("#consultationDateValue").val());
                    $("#appointmentStartTime").val($("#slots").val());
                }
            }
            function checkConsultationType()
            {
                $("#errorMessageType").hide();
                if ($("#categoryId").val() == 0)
                {
                    $("#errorMessageType").append("<strong>Error! </strong>Select Consultation Type.");
                    $('#categoryId').parent('div').addClass('has-error');
                    $("#categoryId").focus();
                    $("#errorMessageType").show();
                    return false;
                }
                return true;
            }
            function showPreviousTab(id)
            {
                $("#Step" + parseInt(id + 1)).removeClass('active');
                $("#Step" + parseInt(id - 1)).removeClass('active');
                $("#StepTab" + parseInt(id + 1)).hide();
                $("#StepTab" + parseInt(id - 1)).hide();
                $("#StepTab" + parseInt(id)).show();
                $("#Step" + id).addClass('active');
            }
            //  To fetch the fetchConsultationFees details based on the ConsultationTypesid
            function fetchConsultationTypes(ConsultationTypeid)
            {
                var expertId = $("#expertId").val();
                if (ConsultationTypeid > 0)
                {
                    $.ajax(
                            {
                                url: '<?php echo base_url() . "Ajaxcalls/fetchConsultationFee"; ?>',
                                type: 'POST',
                                data: {'ConsultationTypesid': ConsultationTypeid, 'expertId': expertId},
                                success: function (response) {
                                    if (response == -1)
                                    {
                                        $("#ConsultationFees").val(0);
                                        $("#amount").val(0);
//                                                                                            alert("This consultation mode is not availabe ");
                                    } else
                                    {
                                        $("#ConsultationFees").val(parseInt(response));
                                        var finalAmount = parseInt(response) + (parseInt(response) * .1);
                                        $("#amount").val(finalAmount);
                                    }
                                }
                            });
                }
            }
            function fetchConsultationFees(ConsultationTypeid)
            {
                var expertId = $("#expertId").val();
                if (ConsultationTypeid > 0)
                {
                    $.ajax(
                            {
                                url: '<?php echo base_url() . "Ajaxcalls/fetchConsultationFees"; ?>',
                                type: 'POST',
                                data: {'ConsultationTypesid': ConsultationTypeid, 'expertId': expertId},
                                success: function (response) {
                                    if (response === -1)
                                    {
//                                                                                            alert("This consultation mode is not availabe ");
                                    } else
                                    {
                                        $("#ConsultationFees").val(parseInt(response));
                                    }
                                }
                            });
                } else
                {
                }
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
                            data: {'selectedDate': $("#consultationDateValue").val(), 'expertId': $( "#teamMember option:selected" ).val()},
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
        <?php include('analytics/googleAnalytics.php'); ?>
        
        <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5785c7a1c287f8ca2cbd0e66/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
    </body>
</html>