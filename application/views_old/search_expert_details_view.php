<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Visheshagya">
     

        <title>Search Expert Result : Visheshagya</title>

        <!-- Bootstrap Core CSS -->
        <link href=<?php echo base_url() . "css/bootstrap.css"; ?> rel="stylesheet">
        <link href=<?php echo base_url() . "css/responsive.css"; ?> rel="stylesheet">
        <!-- jQuery -->
        <script src=<?php echo base_url() . "js/jquery.min.js"; ?>></script>

        <!-- Bootstrap Core JavaScript -->
        <script src=<?php echo base_url() . "js/bootstrap.min.js"; ?>></script>
        <link href=<?php echo base_url() . "css/bootstrap.min.css"; ?> rel="stylesheet" type="text/css">
        <!-- Custom CSS -->
        <link href=<?php echo base_url() . "css/two-column.css"; ?> rel="stylesheet">
        <link href=<?php echo base_url() . "css/style.css"; ?> rel="stylesheet">

        <!-- jQuery -->
        <!--<script src=<?php echo base_url() . "js/moment.min.js"; ?>></script>-->
        <script type="text/javascript">
            $(document).ready(function () {
                $("#ChangePassword").click(function () {
                    $("#myModalChangePassword").modal('show');
                });
                
            });
        </script>
        <style>
            .glyphicon-ok {
                color: green;
                font-size: 20px;
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
                                    <li class="active"> <a style="cursor: pointer" href="<?php echo base_url() . 'Expertdetails/search/1'; ?>">Expert Search</a> </li>
                                    <li> <a style="cursor: pointer" href="<?php echo base_url() . 'ClientAppointments'; ?>">My Appointment</a> </li>
                                    <li> <a style="cursor: pointer" href="<?php echo base_url() . 'ClientDocument'; ?>">E-Lockers</a> </li>
                                    <li> <a style="cursor: pointer" href="<?php echo base_url() . 'ClientProfile'; ?>">My Profile</a> </li>
                            <li>
                                <div class = "dropdown">
                                    <a class = "btn dropdown-toggle" data-toggle = "dropdown" href = "#">
                                        <span class = "login-icon pull-left"></span>
                                    </a>
                                    <ul class = "dropdown-menu" role = "menu" aria-labelledby = "menu1">
                                        <li role = "presentation" class = "dropdown-header"></li>
                                        <li> </li>
                                        <li> </li>
                                        <li><a href = "<?php echo base_url() ?>ClientProfile" class = "btn btn-primary btn-xs" role = "button" data-toggle = "modal">My Profile</a></li>
                                        <li><a href = "" class = "btn btn-info btn-xs" role = "button" data-toggle = "modal" id = "ChangePassword">Change Password</a></li>
                                        <li><a href = "<?php echo base_url() ?>Logout/clientLogout" class = "btn btn-danger btn-xs" role = "button" data-toggle = "modal">Logout</a></li>
                                        <li></li>
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
                    <div id="exTab2">	
                        <ul class="nav nav-tabs">
                            <li <?php if ($categoryId == 1) { ?>class="active"<?php } ?>>                            
                                <a  href=<?php echo base_url() . "Expertdetails/search/1"; ?> >Chartered Accountant</a>
                            </li>
                            <li  <?php if ($categoryId == 2) { ?>class="active"<?php } ?>>
                                <a href=<?php echo base_url() . "Expertdetails/search/2"; ?>  >Company Secretary</a>
                            </li>
                            <li  <?php if ($categoryId == 4) { ?>class="active"<?php } ?>>
                                <a href=<?php echo base_url() . "Expertdetails/search/4"; ?> >CMA</a>
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
                                        <form class="form-horizontal" action=<?php echo base_url() . "Searchexpertdetails/index/" . $categoryId; ?> method="POST">
                                            <fieldset>
                                                <input type="hidden" name="selectedCategoryId" value="<?php echo $this->session->userdata('selectedCategoryId'); ?>">
                                                <legend>Search Expert</legend>
                                                <!-- Multiple Checkboxes -->
                                                <div class="form-group" style="max-height:200px;overflow-y:auto;" >
                                                    <label class="col-md-12 control-label" for="checkboxes">Service Type</label>
                                                    <div class="col-md-12">
                                                        <?php
                                                        foreach ($subCategoryDetails as $subCategory) {
                                                            ?>
                                                            <div class="checkbox">
                                                                <label for="checkboxes-0">
                                                                    <?php
                                                                    if (!empty($selectedSubCategoryIds) && in_array($subCategory->subCategoryId, $selectedSubCategoryIds)) {
                                                                        ?>
                                                                        <input type="checkbox" checked name="subCategoryIds[]"   value="<?php echo $subCategory->subCategoryId; ?>">
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <input type="checkbox" name="subCategoryIds[]"   value="<?php echo $subCategory->subCategoryId; ?>">

                                                                        <?php
                                                                    }
                                                                    echo $subCategory->subCategoryName;
                                                                    ?>
                                                                </label>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?> 
                                                    </div>
                                            </fieldset>
                                            <hr>
                                            <fieldset>
                                                <!-- Multiple Checkboxes -->
                                                <div class="form-group">
                                                    <label class="col-md-12 control-label" for="checkboxes">Experience in Years</label>
                                                    <div class="col-md-12">
                                                        <?php
                                                        for ($i = 1; $i < 6; $i++) {
                                                            ?>
                                                            <div class="checkbox">
                                                                <label for="checkboxes-0">
                                                                    <?php
                                                                    if (!empty($selectedexperinceInYear) && in_array($i, $selectedexperinceInYear)) {
                                                                        $exp = (5 * (intval($i) - 1)) . ' - ' . (5 * (intval($i)));
                                                                        ?>
                                                                        <input checked type="checkbox" name="experinceInYear[]"  
                                                                               value=<?php echo $i; ?>><?php echo $exp; ?>
                                                                               <?php
                                                                           } else {
                                                                               ?>
                                                                        <input type="checkbox" name="experinceInYear[]"   
                                                                               value=<?php echo $i; ?>><?php echo (5 * (intval($i) - 1)) . ' - ' . (5 * (intval($i))); ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
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
                                            if (null != $this->session->flashdata('searchExpertError')) {
                                                ?>
                                                <div class="alert alert-info">
                                                    <strong>Sorry!</strong><?php echo $this->session->flashdata('searchExpertError'); ?>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (count($SubCategoryName) != 0) {
                                                foreach ($SubCategoryName as $name) {
                                                    echo $name;
                                                    ?>
                                                    <a href="#"><img src="<?php echo base_url(); ?>img/cancel-button.png" class="m-left"></a> 
                                                    <?php
                                                }
                                            }
                                            if (count($selectedexperinceInYear) != 0) {
                                                foreach ($selectedexperinceInYear as $experience) {
                                                    echo $exp = (5 * (intval($experience) - 1)) . ' - ' . (5 * (intval($experience)));
                                                    ;
                                                    ?>
                                                    <a href="#"><img src="<?php echo base_url(); ?>img/cancel-button.png" class="m-left"></a> 
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                        <?php
                                         function sentence_cap($impexp, $sentence_split) {
                                                $textbad = explode($impexp, $sentence_split);
                                                $newtext = array();
                                                foreach ($textbad as $sentence) {
                                                    $sentencegood = ucfirst(strtolower($sentence));
                                                    $newtext[] = $sentencegood;
                                                }
                                                $textgood = implode($impexp, $newtext);
                                                return $textgood;
                                            }
                                        $expertResultSet = array();
                                        foreach ($expertPersonalData as $expertData) {
                                            if (empty($expertResultSet)) {
                                                $expertResultSet[] = $expertData->expertId;
                                                ?>
                                                <div class="media" style="float:left">
                                                    <a class="pull-left text-center" href="#">
                                                        <img class="media-object" src="<?php
                                                        if (trim($expertData->expertProfileImageName) == "") {
                                                            echo base_url() . "img/default.jpg";
                                                        } else {
                                                            echo base_url() . $expertData->expertProfileImageName;
                                                        }
                                                        ?>" alt="">                                                    
                                                    </a>
                                                    <div class="media-body">
                                                        <div class="col-xs-6">
                                                            <h4 class="media-heading">
                                                                    <?php
                                                                    $displayExpertName = sentence_cap(" ", $expertData->expertName);
                                                                    ?>
                                                                        <?php echo $expertData->categoryName; ?> <?php echo $displayExpertName; ?> <br>
                                                                    <small> <?php
                                                                        echo $expertData->expertInstituteName;
                                                                        ?></small>
                                                                    <br>
                                                                    <small>Practicing Since, <?php
                                                                        $parts = explode('-', $expertData->expertProfessionalCareerStartYear);
                                                                        echo $parts[0];
                                                                        ?></small><br>

                                                                    <small>Service:<b><?php echo $expertData->skills; ?></b></small><br>
                                                                    <small>Location:<b><?php echo $expertData->expertCity; ?></b></small>
                                                                </h4>
                                                            
                                                            <h4>Consultation Fees</h4>
                                                                                                                    <ul class="consultation-fees">
                                                                                                                        <li><i class="icon-rs"></i>
                                                                                                                     <?php  echo $expertData->Video; ?>
                                                                                                                        </li>
                                                                                                                        <li><i class="icon-rs"></i> <?php  echo $expertData->Audio; ?></li> 
                                                                                                                        <li><i class="icon-rs"></i> <?php  echo $expertData->InPerson; ?></li>
                                                                                                                    </ul>										
                                                        </div>
                                                        <div class="col-xs-6 media-right-detail text-right">
                                                            <p ><span class="glyphicon glyphicon-ok"></span>VERIFIED by Team Visheshagya</p>
                                                            <a href="<?php echo base_url() ?>Expertdetails/viewProfile/<?php echo $expertData->expertId; ?>"  class="btn btn-info">View Profile</a>

   
                                                            
                                                            <a id="bookAppointment"role="button" href="<?php echo base_url() . 'Searchexpertdetails/clientBookingAppointment/' . $expertData->expertId . '/' . $expertData->expertName . '/' . $expertData->categoryName; ?>" id="bookAppointment" class="btn btn-sm btn-primary">Book Appointment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            } else if (!(in_array($expertData->expertId, $expertResultSet))) {
                                                $expertResultSet[] = $expertData->expertId;
                                                ?>
                                                <div class="media" style="float:left">
                                                    <a class="pull-left text-center" href="#">
                                                        <img class="media-object" src="<?php
                                                        if (trim($expertData->expertProfileImageName) == "") {
                                                            echo base_url() . "img/default.jpg";
                                                        } else {
                                                            echo base_url() .  $expertData->expertProfileImageName;
                                                        }
                                                        ?>" alt="">                                                    
                                                    </a>
                                                    <div class="media-body">
                                                        <div class="col-xs-6">
                                                            <h4 class="media-heading">
                                                                    <?php
                                                                    $displayExpertName = sentence_cap(" ", $expertData->expertName);
                                                                    ?>
                                                                        <?php echo $expertData->categoryName; ?> <?php echo $displayExpertName; ?> <br>
                                                                    <small> <?php
                                                                        echo $expertData->expertInstituteName;
                                                                        ?></small>
                                                                    <br>
                                                                    <small>Practicing Since, <?php
                                                                        $parts = explode('-', $expertData->expertProfessionalCareerStartYear);
                                                                        echo $parts[0];
                                                                        ?></small><br>

                                                                    <small>Service:<b><?php echo $expertData->skills; ?></b></small><br>
                                                                    <small>Location:<b><?php echo $expertData->expertCity; ?></b></small>
                                                                </h4>
                                                             <h4>Consultation Fees</h4>
                                                                                                                    <ul class="consultation-fees">
                                                                                                                        <li><i class="icon-rs"></i>
                                                                                                                     <?php  echo $expertData->Video; ?>
                                                                                                                        </li>
                                                                                                                        <li><i class="icon-rs"></i> <?php  echo $expertData->Audio; ?></li> 
                                                                                                                        <li><i class="icon-rs"></i> <?php  echo $expertData->InPerson; ?></li>
                                                                                                                    </ul>
                                                        </div>
                                                        <div class="col-xs-6 media-right-detail text-right">
                                                             <p ><span class="glyphicon glyphicon-ok"></span>VERIFIED by Team Visheshagya</p>
                                                            <a href="<?php echo base_url() ?>Expertdetails/viewProfile/<?php echo $expertData->expertId; ?>"  class="btn btn-info">View Profile</a>
                                                           
                                                            <!--<button id="bookAppointment" class="btn btn-sm btn-primary">Book Appointment</button>-->
                                                            <a id="bookAppointment" role="button" href="<?php echo base_url() . 'Searchexpertdetails/clientBookingAppointment/' . $expertData->expertId . '/' . $expertData->expertName . '/' . $expertData->categoryName; ?>" id="bookAppointment" class="btn btn-sm btn-primary">Book Appointment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                         echo  $this->pagination->create_links();
                                        ?>                                    
                                    </div>
                                </div>		
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
            <footer>
                <div class="container text-center">
                    <p>Copyright &copy; Visheshagya 2016</p>
                </div>
            </footer>
          
            <?php include("ClientLoginPopUp_view.php"); ?>

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
                function showProfile(expertName, profileData)
                {
                    document.getElementById("expertName").innerHTML = expertName;
                    document.getElementById("profileData").innerHTML = profileData;
                    $("#showProfileData").modal('show');
                }

            </script>
            <?php
            include('popUp/clientChangePasswordSuccess_view.php');
	include('popUp/ShowExpertProfileContent_view.php');
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
            ?>
    </body>
</html>