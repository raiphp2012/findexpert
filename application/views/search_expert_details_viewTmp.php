<?php
/*
 * @author Visheshagya
 */
include('analytics/googleAnalytics.php');

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Avinash Raj">

        <title>Client Personal Details : Visheshagya</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/two-column.css" rel="stylesheet">
        <!--<link href="css/responsive.css" rel="stylesheet">-->
        <link href="css/style.css" rel="stylesheet">

        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>
        <script src="js/moment.min.js"></script>
        <script src="js/bootstrap-datetimepicker.js"></script>
        <!--<script src="js/custom.js"></script>-->
        <link rel="stylesheet" href="css/bootstrap-datetimepicker.css">   

        <link href=<?php echo base_url() . "css/bootstrap.min.css"; ?> rel="stylesheet" type="text/css">
        <link href=<?php echo base_url() . "css/bootstrap-theme.min.css"; ?> rel="stylesheet" type="text/css">
        <!-- Custom CSS -->

        <link href=<?php echo base_url() . "css/style.css"; ?> rel="stylesheet" type="text/css">
        <link href=<?php echo base_url() . "css/two-column.css"; ?> rel="stylesheet" type="text/css">

        <!-- Datepicker CSS -->
        <link href=<?php echo base_url() . "css/bootstrap-datetimepicker.css"; ?> rel="stylesheet" type="text/css">
        <!--<link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">-->

        <style type="text/css"> 

            #map_wrapper {
                height: 400px;
            }

            #map_canvas {
                width: 50%;
                height: 100%;
            }
        </style>     

        <script type="text/javascript">
            $(function () {
                $('#clientDOBB').datetimepicker({
                    viewMode: 'years',
                    format: 'YYYY-MM-DD'
                });
                var panProof = <?php echo "'" . $clientPersonalDetails->clientPanNumberImageName . "'"; ?>;
                panProof = panProof.trim();
                if (panProof !== "")
                {
                    $("#clientPanNumberImageName").prop("required", false);
                }
                var addressProof = <?php echo "'" . $clientPersonalDetails->clientAddressProofImageName . "'"; ?>;
                addressProof = addressProof.trim();
                if ($.trim(addressProof) !== "")
                {
                    $("#clientPanNumberImageName").prop("required", false);
                }
            });
        </script>

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
            <!--<nav class="navbar navbar-default navbar-fixed-top" id="header_nav">-->
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                       
                        <a class="navbar-brand" id="logo" href="<?php echo base_url().'ClientProfile';?>"></a> 
                    </div>
                                       <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <div class="dropdown">
                                    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                        <span class="login-icon pull-left"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                        <li role="presentation" class="dropdown-header">Action</li>
                                        <li> </li>
                                        <li><a href="<?php echo base_url() ?>ClientProfile" class="btn btn-primary btn-xs" role="button" data-toggle="modal">My Profile</a></li>
                                        </li>
                                        <li><a href="Logout" class="btn btn-primary btn-xs" role="button" data-toggle="modal" id="ChangePassword">Change Password</a>
                                        </li>
                                        <li><a href="clientHome/clientLogout" class="btn btn-danger btn-xs" role="button" data-toggle="modal">Logout</a></li>
                                    </ul>
                                </div>
                            </li>
                            <div class="top-nav-tab downarrow">
                                <ul class="nav nav-tabs">

                                    <li><a style="cursor: pointer"onclick="location.href = 'Expertdetails/search/1';" data-toggle="tab">Search Expert</a></li>

                                    <li><a style="cursor: pointer"onclick="location.href = 'ClientAppointments';" data-toggle="tab">My Appointments</a></li>
                                    <li><a style="cursor: pointer"onclick="location.href = 'ClientDocument';" data-toggle="tab">My Documents</a></li>
                                    <!--<li><a style="cursor: pointer"onclick="location.href = 'MyClients';" data-toggle="tab">My Clients</a></li>-->
                                    <li class="active"><a style="cursor: pointer"onclick="location.href = 'ClientProfile';" data-toggle="tab">My Profile</a></li>
                                </ul>
                            </div>
                        </ul>
                    </div>
                    <div class="top-nav-tab downarrow">
                        <ul class="nav nav-tabs">
                            <li><a style="cursor: pointer"onclick="location.href = 'ClientAppointments';" data-toggle="tab">My Appointments</a></li>
                            <li><a style="cursor: pointer"onclick="location.href = 'ClientDocument';" data-toggle="tab">My Documents</a></li>
                            <li class="active"><a style="cursor: pointer"onclick="location.href = 'ClientProfile';" data-toggle="tab">My Profile</a></li>
                        </ul>
                    </div>
                </div>
            </nav>





        <!-- body content -->
        <div class="two-column-con">
            <div class="container">
                <div id="exTab2">	
                    <ul class="nav nav-tabs">

                        <li <?php  if ($categoryId == 1) { ?>class="active"<?php } ?>>                            
                            <a  href=<?php echo base_url() . "Expertdetails/search/1"; ?> >Chartered Accountant</a>
                        </li>
                        <li  <?php if ($categoryId == 2) { ?>class="active"<?php } ?>>
                            <a href=<?php echo base_url() . "Expertdetails/search/2"; ?>  >Company Secretary</a>
                        </li>
                        <li  <?php if ($categoryId == 3) { ?>class="active"<?php } ?>>
                            <a href=<?php echo base_url() . "Expertdetails/search/3"; ?> >Lawyer</a>
                        </li>
                    </ul>

                    <div class="tab-content ">
                        <div class="tab-pane active" id="1">
                            <div class="sidebar">
                                <!-- left form -->
                                <div class="col-xs-12">
                                    <form class="form-horizontal" action=<?php echo base_url() . "Searchexpertdetails/"; ?> method="POST">
                                        <fieldset>
                                            <!-- Form Name -->
                                            <legend>Search Expert</legend>

                                            <!-- Multiple Checkboxes -->
                                            <div class="form-group">
                                                <label class="col-md-12 control-label" for="checkboxes">Service Type</label>
                                                <div class="col-md-12">
                                                    <?php
                                                    

                                                    foreach ($subCategoryDetails as $subCategory) {

                                                        ?>
                                                        <div class="checkbox">
                                                            <label for="checkboxes-0">
                                                                <input type="checkbox" name="subCategoryIds[]" id="checkboxes-0"  value="<?php echo $subCategory->subCategoryId; ?>">
                                                            <?php echo $subCategory->subCategoryName; ?>
                                                            </label>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?> 
                                                </div>
                                        </fieldset>
                                        <hr>
                                        <fieldset>

                                            <!-- Form Name city-->
                                            <!-- Multiple Checkboxes -->
                                            <div class="form-group">
                                                <label class="col-md-12 control-label" for="checkboxes">Experience in Years</label>
                                                <div class="col-md-12">
                                                   
                                                        <div class="checkbox">
                                                            <label for="checkboxes-0">
    <input type="checkbox" name="experinceInYear[]" id="checkboxes-0"  
    value="5">0- 5 
                                                              
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label for="checkboxes-0">
    <input type="checkbox" name="experinceInYear[]" id="checkboxes-0"  
    value="6">6- 10 
                                                              
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label for="checkboxes-0">
    <input type="checkbox" name="experinceInYear[]" id="checkboxes-0"  
    value="15">11- 15 
                                                              
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label for="checkboxes-0">
    <input type="checkbox" name="experinceInYear[]" id="checkboxes-0"  
    value="20">16- 20 
                                                              
                                                            </label>
                                                        </div>
                                                         <div class="checkbox">
                                                            <label for="checkboxes-0">
    <input type="checkbox" name="experinceInYear[]" id="checkboxes-0"  
    value="20+">More than 20 
                                                              
                                                            </label>
                                                        </div>
                                                       
                                                </div>
                                            </div>
                                        </fieldset>
                                        <!-- Button -->
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input type="submit" class="btn btn-block btn-primary" value="Search Expert">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- end left form -->
                            </div>
                            <div class="main-content detail-view">
                                <div class="detail-view-cont">
                                    <div style="width:90%; float: left">
                                        <?php
                                        if(count($SubCategoryName) !=0)
                                        {
                                        
                                        foreach ($SubCategoryName as $name) {
                                            echo $name;
                                            ?>
                                            <a href="#"><img src="<?php echo base_url(); ?>img/cancel-button.png" class="m-left"></a> 
                                            <?php
                                        }
                                    }
                                    if(count($selectedexperinceInYear) !=0)
                                        {
                                        foreach ($selectedexperinceInYear as $city) {
                                            echo $city;
                                            ?>
                                            <a href="#"><img src="<?php echo base_url(); ?>img/cancel-button.png" class="m-left"></a> 
                                        <?php } }?>
                                        <!--New Delhi <a href="#"><img src="img/cancel-button.png" class="m-left"></a>-->
                                    </div>
                                    <div>
                                        <input type="button" class="btn btn-info" onclick="showMap()" value="showMap">
                                    </div>
                                    <?php
                                    //print_r($expertPersonalData);
                                    //exit();
                                    foreach ($expertPersonalData as $expertData) {
                                        ?>
                                        <div class="media">
                                            <!--<hr class="style1">-->
                                            <a class="pull-left text-center" href="#">
                                                <img class="media-object" src="<?php
                                                 if(trim($expertData->expertImageName)=="") {
                                                   
                                                   echo base_url() ."img/default.jpg";
                                                 }
                                                 else{
                                                    echo base_url() . "img/".$expertData->expertImageName; 
                                                   
                                                    } ?>" alt="">
                                                 <!--<div class="object-detail">First Name</div>-->
                                            </a>
                                            <div class="media-body">
                                                <div class="col-xs-6">
                                                    <h4 class="media-heading">
                                                    <?php echo $expertData->expertName; ?>, <?php echo $expertData->categoryName; ?><br>
                                                        <small>Professional Since, <?php
                                                            $parts = explode('-', $expertData->expertProfessionalCareerStartYear);
                                                            echo $parts[0];
                                                            ?></small>
                                                    </h4>
                                                    <h4>Service</h4>
                                                    <!-- <p>
                                                        <?php
                                                        /*if (isset($expertData->subCategoryName)) {
                                                            $subName = "";
                                                            foreach ($expertData->subCategoryName as $sName) {
                                                                $subName .= $sName . ",";
                                                            }
                                                            $subName = rtrim($subName, ',');
                                                            echo $subName;
                                                        }*/
                                                        ?>
                                                    </p> -->
                                                    <!--<p>Income Tax, VAT, Service Tax</p>-->											

                                                    <h4>Consultation Fees</h4>
                                                    <ul class="consultation-fees">
                                                        <li><i class="icon-rs"></i>
                                                        <?php echo $expertData->consultationFees;?>
                                                        </li>
                                                        <li><i class="icon-rs"></i>500</li>
                                                        <li><i class="icon-rs"></i>100</li>
                                                    </ul>											
                                                </div>
                                                <div class="col-xs-6 media-right-detail text-right">
                                                    <button class="btn btn-sm btn-success">VERIFIED</button>
                                                    <div class="summary-detail">
                                                        <h4>Summary</h4>
                                                        <p><?php echo $expertData->expertProfileSummary;?> <a href="">more </a></p>
                                                    </div>
                                                    <button id="bookAppointment" class="btn btn-sm btn-primary">Book Appointment</button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } 
                                     ?>                                    
                                </div>
                            </div>		
                        </div>
                        <div class="tab-pane" id="2">
                            <div class="sidebar">layout2</div>
                            <div class="main-content">middle2</div>
                        </div>
                        <div class="tab-pane" id="3">
                            <div class="sidebar">layout3</div>
                            <div class="main-content">middle3</div>
                        </div>
                        <!--<div id="map_wrapper" style="display:none">-->
                        <div id="map_wrapper"  style="display:none" >
                            <div id="map_canvas" class="mapping pull-right"></div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!-- end body content -->
        <!-- Footer -->
       <?php include('loginFooter.php') ?>
        <!-- jQuery -->
        <script src=<?php echo base_url() . "js/jquery.min.js"; ?>></script>

        <!-- Bootstrap Core JavaScript -->
        <script src=<?php echo base_url() . "js/bootstrap.min.js"; ?>></script>


        <!--<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>-->
        <script src=<?php echo base_url() . "js/moment-with-locales.js"; ?>></script>
        <script src=<?php echo base_url() . "js/bootstrap-datetimepicker.js"; ?>></script>
        <!--<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>-->

        <script type="text/javascript">
            $(document).ready(function () {
                $("#bookAppointment").click(function () {
                    <?php 
                    if(empty($this->session->userdata('clientId'))){
                        ?>
                         $("#myModal").modal('show');
                    <?php
                        
                    }
                    else{ ?>

                    $("#bookAppointmentModal").modal('show');
                    <?php } ?>
                });
            });

        </script>
        <script>
            jQuery(function ($) {
                // Asynchronously Load the map API 
                var script = document.createElement('script');
                script.src = "http://maps.googleapis.com/maps/api/js?sensor=false&callback=initialize";
                document.body.appendChild(script);
            });

            function initialize() {
                var map;
                var bounds = new google.maps.LatLngBounds();
                var mapOptions = {
                    mapTypeId: 'roadmap'
                };

                // Display a map on the page
                map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
                map.setTilt(45);

                // Multiple Markers
                var markers = [
                    ['Gold Sukh, Gurgaon', 28.450759, 77.077704]

                ];

                // Info Window Content
                var infoWindowContent = [
                    ['<div class="info_content">' +
                                '<h3>Gold Sukh</h3>' +
                                '<p>The London Eye is a giant Ferris wheel situated on the banks of the River Thames. The entire structure is 135 metres (443 ft) tall and the wheel has a diameter of 120 metres (394 ft).</p>' + '</div>']

                ];

                // Display multiple markers on a map
                var infoWindow = new google.maps.InfoWindow(), marker, i;

                // Loop through our array of markers & place each one on the map  
                for (i = 0; i < markers.length; i++) {
                    var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
                    bounds.extend(position);
                    marker = new google.maps.Marker({
                        position: position,
                        map: map,
                        title: markers[i][0]
                    });

                    // Allow each marker to have an info window    
                    google.maps.event.addListener(marker, 'click', (function (marker, i) {
                        return function () {
                            infoWindow.setContent(infoWindowContent[i][0]);
                            infoWindow.open(map, marker);
                        }
                    })(marker, i));

                    // Automatically center the map fitting all markers on the screen
                    map.fitBounds(bounds);
                }

                // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
                var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function (event) {
                    this.setZoom(14);
                    google.maps.event.removeListener(boundsListener);
                });

            }
        </script>
        <?php include("ClientLoginPopUp_view.php");?>

        <!-- to display the pop up -->
        <div id="bookAppointmentModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Confirmation</h4>
                    </div>
                    <div class="modal-body">
                        <p>Select Appointment Date</p>
                        <div class="container">
                            <div class="row">
                                <div class='col-sm-6'>
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker1'>
                                            <input type='text' id="appointmentDateTime"class="form-control" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $('#datetimepicker1').datetimepicker(
                                                {
                                                    /*format: "YYYY-MM-DD H:I",
                                                     /*minDate: 0*/

                                                });
                                    });
                                </script>
                            </div>
                        </div>
                        <p class="text-warning"><small></small></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" onclick="saveAppointment()" class="btn btn-primary">Book</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function saveAppointment()
            {
                var appointmentDate = $("#appointmentDateTime").val();
                $.ajax({url: "SaveAppointment",
                    data: {'appointmentDate': appointmentDate},
                    type: 'POST',
                    success: function (result) {
                        $("#myModal").modal('hide');
                    }});
            }
            function showMap()
            {
                $("#map_wrapper").show();
            }
        </script>
    </body>
</html>