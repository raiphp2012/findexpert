<?php
/*
 * @author Visheshagya
 */

?>
<!DOCTYPE html>
<html lang="en">
    <head>
<link type="text/css" href="/cometchat/cometchatcss.php" rel="stylesheet" charset="utf-8">
<script type="text/javascript" src="/cometchat/cometchatjs.php" charset="utf-8"></script>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Visheshagya">
        <title>Expert Appointments: Visheshagya</title>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/two-column.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">

        <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/font.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="js/moment.min.js"></script>
        <script type="text/javascript">
            $(function () {
                $('#expertDOB').datetimepicker({
                    viewMode: 'years',
                    format: 'YYYY-MM-DD'
                });
            });
             $(document).ready(function() {
           
} );
        </script>
         <script type="text/javascript">
            $(document).ready(function () {
                $("#ChangePassword").click(function () {
                    $("#myModalChangePassword").modal('show');
                });
	//                $("#example").DataTable();
            });
        </script>
        <style>
 @keyframes blink {
  from { opacity: 1; }
  to   { opacity: 0; }
}
@-webkit-keyframes blink {
  from { opacity: 1; }
  to   { opacity: 0; }
}
blink {
  animation-name: blink;
  animation-duration: 1s;
  animation-timing-function: ease-in-out;
  animation-iteration-count: infinite;
  -webkit-animation-name: blink;
  -webkit-animation-duration: 1s;
  -webkit-animation-timing-function: ease-in-out;
  -webkit-animation-iteration-count: infinite;
}
        </style>
        <link rel="stylesheet" href="css/bootstrap-datetimepicker.css"> 
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
                                    <li class="active"><a href ="<?php echo base_url().'ExpertAppointments'; ?>" >My Appointments</a></li>
                                    <li><a href="<?php echo base_url().'ExpertDocument'; ?>">E-Lockers</a></li>
                                    <li><a href="<?php echo base_url().'ExpertProfile';?>" >My Profile</a></li>
                                    <?php if($this->session->userdata('parent_id')!=0){
                                  
                                        if($this->session->userdata('status')=="active")
                                        {
                                         ?>
                                         <li> <a href="<?php echo base_url() .'Ajaxcalls/updateExpertStatus'; ?>/inactive">Busy</a></li>
                                         <?php
                                            
                                        }
                                        else{
                                    ?>
                                    
                                     <li> <a href="<?php echo base_url() .'Ajaxcalls/updateExpertStatus'; ?>/active">Online</a></li>

                                    <?php
                                    
                                        }
                                         }
                                         ?>

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
                        </ul>
                    </div>   
                </div>
            </nav>

             <div class="wide">
                <div class="container">
                    <div class="page-header">
                        <h1>My Appointment</h1>
                    </div>
                </div>
            </div>

            <!-- body content -->
            <div class="content-full-height">
            <div class="two-column-con">
                <div class="container appointment-status slideup">
                    <?php echo $this->session->flashdata('rescheduleSuccess'); ?>
 <?php
                        if (null != $this->session->flashdata('cancelSuccess')) {
                            ?>
                            <div class="alert alert-success">
                                <strong>Success!</strong><?php echo $this->session->flashdata('cancelSuccess'); ?>
                            </div>
                            <?php
                        }
                        ?>
                    <div id="exTab2" class="frm-detail">
                        <div class="tab-content outer marT25">
                        <div class="tab-pane active" id="top1">  




                                 <div class="table-controll">
                                    <form class="form-horizontal">
                                        <fieldset>
                                            <div class="col-md-6 left-tbl-hdr pad0">
                                               <div class="form-group">
                                                    <label class="status-heading" for="selectbasic">APPOINTMENT STATUS</label>
                                                    <!-- <div class="col-md-3">
                                                        <select id="consultationStatusId" name="consultationStatusId" class="form-control" onchange="fetchAppointmentDetails(this.value, this.text)">
                                                            <option>--SELECT--</option>
                                                            <?php foreach ($consultationStatus as $status) { ?>
                                                                <option value=<?php echo $status->consultationStatusId; ?>><?php echo $status->consultationStatusName; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div> -->
                                                    <!--<label class="col-md-1 control-label" for="textinput">Date</label>-->  
                                                    <!--<div class="col-md-4">
                                                        <div class='input-group date' id='clientAppointmentDate'>
                                                            <input type='text' name="clientAppointmentDate"class="form-control" value="" />
                                                            <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar">
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>-->
                                                </div>
                                            </div>
                                            
                                           <!--  <div class="bs-example"> -->
    <!-- Button HTML (to Trigger Modal) -->
   <!--  <a href="#myModal" class="btn btn-lg btn-primary" data-toggle="modal">Tutorial</a> -->
    
    <!-- Modal HTML -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">YouTube Video</h4>
                </div>
                <div class="modal-body">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/4_FErcBZOgE" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div> 
                                            
                                            
                                        </fieldset>
                                    </form>
                                </div>
                            <div class="tab-pane active" id="top1">                             
                                <div class="table-cont">
                                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                               <th>Client Name</th>
                                                <th>Appointment Timings</th>
                                                <th>Consultation Type</th>
                                                <th> Status </th>                                            
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (is_array($appointmentData)) {
                                                foreach ($appointmentData as $appointment) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $appointment->clientName ?></td>
                                                        <td><?php echo $appointment->appointmentDate . '(' . $appointment->appointmentStartTime . '-' . $appointment->appointmentEndTime . ')' ?></td>
                                                        <td><?php echo $appointment->consultationTypeName ?></td>
                                                        <td><?php echo $appointment->consultationStatusName ?></td>
                                                        
                                                        <td>
                                                        <?php  if($appointment->appointmentDate===date('Y-m-d')){ ?> 
                                                            <blink><?php } ?>
                                                            <a href="ExpertAppointmentDetails/showClientData?clientId=<?php echo$appointment->clientId; ?>"><!-- <span class="icon-video"></span> -->View Details</a><?php  if($appointment->appointmentDate===date('Y-m-d')){ ?> 
                                                            </blink><?php } ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            } else {
                                            ?>
                                            <tr>
                                            <td colspan="4">
                                            <div class="alert alert-danger">
                                                            <strong>Sorry! </strong><?php echo"You do not have any appointments as of now."; ?>
                                                        </div>
                                                        </td>
                                                        </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
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

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-datetimepicker.js"></script>
        <script>
                                                             function fetchAppointmentDetails(consultationId, consultationName)
                                    {
                                         var consultationId=consultationId;
          var data= "<a href='ExpertAppointmentDetails/showClientData?clientId=<?php echo 
                                                            $appointment->clientId; ?>'><span class='icon-video'></span>View Details</a>";
                                                             
                                                                 $.ajax({
                                                            url: 'Ajaxcalls/fetchExpertAppointmentDetails',
                                                            type: 'POST',
                                                            data: {'consultationId': consultationId},
                                                            async: false,
                                                            success: function (response) {
                                                                $("#example > tbody").html("");
                                                                //$("#example > tbody tr:last").append("<td>hi</td>");
                                                                console.log(response.appointmentData);
                                                                if(!$.isArray(response.appointmentData))
                                                                {
                                                                    $("#example > tbody").append("<tr><td colspan='5'>"+response.appointmentData+"</td></tr>");
                                                                }
                                                                else{
                                                                    for(var i=0;i<response.appointmentData.length;i++)
                                                                    {
                 $("#example > tbody").append("<tr><td>"+response.appointmentData[i].clientName+"</td><td>"+response.appointmentData[i].appointmentDate
+"("+ response.appointmentData[i].appointmentStartTime+"- "+response.appointmentData[i].appointmentEndTime
 +")</td><td>"+response.appointmentData[i].consultationTypeName+"</td><td>"+response.appointmentData[i].consultationStatusName+"</td><td>"+data+"</td></tr>");
                                                                   
                                                                    }
                                                                    
                                                                }
                                                                
                                                            }
                                                        });
                                                                
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
        ?>
        <?php include('popUp/ChangePassword_view.php'); 
        include('analytics/googleAnalytics.php');
        ?>
        <script src=<?php echo base_url() . "assets/js/script.js"; ?>></script>
    </body>
</html>