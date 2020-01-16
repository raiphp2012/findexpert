<?php
/*
 * @author Visheshagya
 */

?>
<!DOCTYPE html>
<html lang="en">
    <head>
<link type="text/css" href="/cometchat/cometchatcss.php" rel="stylesheet" charset="utf-8">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Visheshagya">
        <title>Client Appointments: Visheshagya</title>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/two-column.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
         <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="js/moment.min.js"></script>
        <script type="text/javascript">
            $(function () {
                $('#clientAppointmentDate').datetimepicker({
                    viewMode: 'years',
                    format: 'YYYY-MM-DD'
                });
            });
            $(document).ready(function() {
            $('#example').DataTable();
} );
        </script>
        <link rel="stylesheet" href="css/bootstrap-datetimepicker.css"> 
        <script type="text/javascript">
            $(document).ready(function () {
                $("#ChangePassword").click(function () {

                    $("#myModalChangePassword").modal('show');
                });
            });
            $(function () {
                $('#clientAppointmentDate').datetimepicker({
                    viewMode: 'years',
                    format: 'YYYY-MM-DD'
                });
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
                                	<li > <a style="cursor: pointer" href="<?php echo base_url() . 'Expertdetails'; ?>">Home</a> </li>
                                    <li> <a style="cursor: pointer" href="<?php echo base_url() . 'Expertdetails/search/1'; ?>">Expert Search</a> </li>
                                    <li class="active"> <a style="cursor: pointer" href="<?php echo base_url() . 'ClientAppointments'; ?>">My Appointments</a> </li>
                                    <li> <a style="cursor: pointer" href="<?php echo base_url() . 'ClientDocument'; ?>">E-Lockers</a> </li>
                                    <li> <a style="cursor: pointer" href="<?php echo base_url() . 'ClientProfile'; ?>">My Profile</a> </li>
                            <?php include('clientProfileIconMenu.php'); ?>                                    
                                </ul>
                            </div>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- body content -->
            <div class="two-column-con">
                <div class="container">
                    <?php echo $this->session->flashdata('clientSignUpSuccess'); ?>
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
                                            <div class="col-md-6 left-tbl-hdr">
                                               <div class="form-group">
                                                    <label class="col-md-4 control-label" for="selectbasic">APPOINTMENT STATUS</label>
                                                    <div class="col-md-3">
                                                        <select id="consultationStatusId" name="consultationStatusId" class="form-control" onchange="fetchAppointmentDetails(this.value, this.text)">
                                                            <option>--SELECT--</option>
                                                            <?php foreach ($consultationStatus as $status) { ?>
                                                                <option value=<?php echo $status->consultationStatusId; ?>><?php echo $status->consultationStatusName; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
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
                                            
                                            
                                        </fieldset>
                                    </form>
                                </div>
                                <div class="table-cont">
                                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Expert Name</th>
                                                <th>Appointment Timings</th>
                                                <th>Consultation Type</th>
                                                <th>Status</th>
                                               <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            
                                            if (is_array($appointmentData)) {
                                                foreach ($appointmentData as $appointment) {
                                                $date = new DateTime( $appointment->appointmentDate);
							//echo $date->format('d-m-Y');
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $appointment->expertName.",".$appointment->categoryName; ?></td>
                                                        <td><?php echo $date->format('d-m-Y') . '(' . $appointment->appointmentStartTime . '-' . $appointment->appointmentEndTime . ')' ?></td>
                                                        
                                                        <td><?php echo $appointment->consultationTypeName ?></td>
                                                        <td><?php echo $appointment->consultationStatusName; ?></td>
                                                        <td>
                                                        <?php  if($appointment->appointmentDate===date('Y-m-d') and $appointment->consultationStatusName=="Pending" ){ ?> <blink><?php } ?>
                                                            <a href="ClientAppointmentDetails/showExpertData?expertId=<?php echo $appointment->expertId; ?>"><span class="icon-video"></span>View Details</a><?php  if($appointment->appointmentDate===date('Y-m-d') and  $appointment->consultationStatusName==" Pending" ){ ?> 
                                                            </blink><?php } ?>
                                                      
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            } else {
                                                echo"No records found";
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
                                                                var data= "<a href='ClientAppointmentDetails/showExpertData?expertId=<?php echo$appointment->expertId; ?>'><span class='icon-video'></span>START</a>";
                                                             
                                                                 $.ajax({
                                                            url: 'Ajaxcalls/fetchAppointmentDetails',
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
                                                                        $("#example > tbody").append("<tr><td>"+response.appointmentData[i].expertName+","+response.appointmentData[i].categoryName+"</td><td>"+response.appointmentData[i].appointmentDate
+"("+ response.appointmentData[i].appointmentStartTime+"- "+response.appointmentData[i].appointmentEndTime
 +")</td><td>"+response.appointmentData[i].consultationTypeName+"</td><td>"+response.appointmentData[i].consultationStatusName+"</td><td>"+data+"</td></tr>");
                                                                   
                                                                    }
                                                                    
                                                                }
                                                                
                                                            }
                                                        });
                                                                
                                                            }
                          function selectdataByDate(data)
                          {
                              alert(data);
                          }                                                            
        </script>
        <?php
        include('popUp/clientChangePasswordSuccess_view.php');

        include('popUp/clientChangePasswordError_view.php');

        if (NULL !== $this->session->userdata('clientChangePasswordSuccess')) {
            ?>
            <script>
                $("#changeSuccessMessage").modal('show');
            </script>
            <?php
        }
        if (NULL !== $this->session->userdata('clientChangePasswordError')) {
            ?>
            <script>
                $("#clientChangePasswordError").modal('show');
            </script>
            <?php
        }
        include('popUp/clientChangePassword_view.php'); 
        
        include('analytics/googleAnalytics.php');
        ?>
    </body>
</html>