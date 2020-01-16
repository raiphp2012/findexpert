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
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Heebo:400,700|Oswald:400,700" type="text/css" media="all">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">
        <link rel="icon" href="<?php echo base_url(); ?>favicon.ico" type="image/gif">
        
        <!--[if lt IE 9]>
                <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/font.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
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
<!-- -->
       
        <!-- -->
        
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
  strong{
  color: #e4000e;
  }
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
.btn-primary {
    color: #fff;
    background-color: #337ab7;
    border-color: #2e6da4;
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
                    <a class="navbar-brand" href="<?php echo base_url(); ?>clientHome/mainHome"><div class="logo"></div>
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
                    <h1>My Appointment</h1>
                </div>
            </div>
        </div>
        <div class="content-full-height">
            <!-- body content -->
            <div class="two-column-con">
                <div class="container appointment-status  slideUp">
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
                                <div class="table-control">
                                    <form class="form-horizontal">
                                        <fieldset>
                                            <div class="col-md-6 left-tbl-hdr pad0">
                                               <div class="form-group">
                                                    <label class="status-heading" for="selectbasic">Appointment Status</label>
                                                   <!--  <div class="col-md-6">
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
                                            

                                            <div class="bs-example">
    <!-- Button HTML (to Trigger Modal) -->
    <a href="#myModal" class="btn btn-lg btn-primary" data-toggle="modal">Tutorial</a>
    
    <!-- Modal HTML -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">YouTube Video</h4>
                </div>
                <div class="modal-body">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/O6HSB2QTy9A" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
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
                                                            <a href="ClientAppointmentDetails/showExpertData?expertId=<?php echo $appointment->expertId; ?>">View Details</a><?php  if($appointment->appointmentDate===date('Y-m-d') and  $appointment->consultationStatusName==" Pending" ){ ?> 
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
<script src=<?php echo base_url() . "assets/js/script.js"; ?>></script>
<!--End of Tawk.to Script-->
    </body>
</html>