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

        <title>Expert Personal Details : Visheshagya</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" type="text/css">
        <link href="css/two-column.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="assets/css/styles.css" rel="stylesheet">
        <link href="assets/css/font.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">

        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>
        <script src="js/moment.min.js"></script>
        <script src="js/bootstrap-datetimepicker.js"></script>
        <!--<script src="js/custom.js"></script>-->
        <link rel="stylesheet" href="css/bootstrap-datetimepicker.css">        

        <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
            <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

            <script>
              $(function () {
                  $("#expertDOB").datepicker({
                      changeMonth: true,
                      changeYear: true,
                      dateFormat: 'yy-mm-dd',
                      yearRange: "1950:2016"
                      
                  });
              });
            </script>

        <script type="text/javascript">
            $(function () {
                 var panProof = <?php echo "'" . $expertPersonalDetails->expertPanNumberImageName . "'"; ?>;
                panProof = panProof.trim();
                if (panProof !== "")
                {
                    $("#expertPanNumberImageName").prop("required", false);
                }
                var addressProof = <?php echo "'" . $expertPersonalDetails->expertAddressProofImageName . "'"; ?>;
                addressProof = addressProof.trim();
                if ($.trim(addressProof) !== "")
                {
                    $("#expertAddressProofImageName ").prop("required", false);
                }
            });
        </script>
        <!-- javascript for change password -->
        <script type="text/javascript">
            $(document).ready(function () {
                $("#ChangePassword").click(function () {
                    $("#myModalChangePassword").modal('show');
                });
            });
        </script>
        <style>
        	#ui-datepicker-div{
        		z-index:10 !important;
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
                            
                            <!-- <div class="top-nav-tab downarrow">
                                <ul class="nav nav-tabs"> -->
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
                                        if(trim($expertPersonalDetails->expertProfileImageName) == ""){
                                            
                                            $profileImage=base_url() . "img/default.jpg";
                                          

                                        }
                                        else if(!empty($expertPersonalDetails->oauth_provider)){
                                       
                                        $profileImage=$expertPersonalDetails->expertProfileImageName;    
                                        }
                                        else {
                                         
                                        $profileImage=base_url().$expertPersonalDetails->expertProfileImageName;     
                                        }
                                          $this->session->set_userdata('profileImage',$profileImage);
                                          echo $this->session->userdata('profileImage');
                                        ?>" class="img-responsive img-circle img-thumbnail" width="50px" height="10px;">
                                    </a>
                                    <!--END to display profile images -->
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                        
                                        <li> </li>
                                        
                                        <li><a href="<?php echo base_url() ?>Logout" class="btn btn-danger btn-xs" role="button" data-toggle="modal">Logout</a></li>
                                    </ul>
                                </div>
                            </li>
                                <!-- </ul>
                            </div> -->
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
            <!-- body content -->    
            <div class="content-full-height personal-details expert-personal-details">    
            <div class="two-column-con">
                <div class="container-fluid">
                    <div id="exTab2" class="frm-detail">                    
                        <div class="tab-pane downarrow" id="top4">
                            <ul class="nav nav-tabs">
                                <li class="active"><a style="cursor: pointer"onclick="location.href = 'ExpertProfile';" data-toggle="tab">Personal</a></li>
                                <?php if($this->session->userdata('parent_id')==0){?> 
                                <li><a style="cursor: pointer"onclick="location.href = 'ExpertProfile/professional';" data-toggle="tab">Professional</a></li>
                                <li><a style="cursor: pointer"onclick="location.href = 'ExpertProfile/consulting';" data-toggle="tab">Consulting</a></li>
                                <?php } ?>
                                <li><a style="cursor: pointer"onclick="location.href = 'ExpertProfile/calendar';" data-toggle="tab">Calendar</a></li>
                                <?php if($this->session->userdata('parent_id')==0){?> 
                                <li><a style="cursor: pointer"onclick="location.href = 'ExpertProfile/accounts';" data-toggle="tab">Accounts</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="tab-content ">
                            <div class="tab-pane active">
                                <div class="main-content detail-view">
                                    <div class="detail-view-cont">
                                        <form class="form-horizontal" method="POST" action="ExpertProfile/updatePersonalDetails" id="expertSignupForm" name="expertSignupForm" enctype="multipart/form-data" onsubmit="return(submitForm())">
                                             <?php
                                                if (null != $this->session->flashdata('personalDetailsUpdateMessage')) {
                                                    ?>
                                                    <div class="alert alert-success">
                                                        <strong>Success!</strong><?php echo $this->session->flashdata('personalDetailsUpdateMessage'); ?>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            <fieldset class="row pd-wrapper">
                                                <div class="col-md-6">
                                                    <div class="pd-input-wrapper">
                                                        <div id="personalDataTab">
                                                           
                                                            <!-- Form Name -->
                                                            <h1>Enter/Edit Personal Information</h1>
                                                            <div class="col-md-12">
                                                            <!-- <a href="Logout" class="btn btn-primary btn-xs" role="button" data-toggle="modal" id="ChangePassword">Change Password</a> -->
                                                
                                                            
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label" for="textinput">Name</label>  
                                                                    <div class="col-md-8">
                                                                        <input autofocus="true" id="expertName" name="expertName" type="text" placeholder="Name" required class="form-control input-md" value="<?php echo $expertPersonalDetails->expertName; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label" for="textinput">Email</label>  
                                                                    <div class="col-md-8">
                                                                        <input name="expertEmailId" id="expertEmailId" readonly type="email" required class="form-control input-md" onchange="checkEmailId(this.value)" value="<?php echo $expertPersonalDetails->expertEmailId; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label" for="prependedtext">Mobile</label>
                                                                    <div class="col-md-8">
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon">+91</span>
                                                                            <input name="expertMobileNumber" id="expertMobileNumber" class="form-control" placeholder="e.g 9999999999" type="text" pattern="[1-9]{1}[0-9]{9}" oninvalid="setCustomValidity(Mobile Number shoulid be 10 digit .')" value="<?php echo $expertPersonalDetails->expertMobileNumber; ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label" for="textinput">Gender</label>  
                                                                    <div class="col-md-8">
                                                                        <?php if ($expertPersonalDetails->expertGender == 1) { ?>
                                                                            <label class="radio-inline">
                                                                            <input id="expertGender" name="expertGender" type="radio" value="1" checked="true">Male
                                                                            </label>
                                                                            <label class="radio-inline">
                                                                            <input id="expertGender" name="expertGender" type="radio" value="2" >Female
                                                                            </label>
                                                                        <?php } else { ?>
                                                                            <label class="radio-inline">
                                                                            <input id="expertGender" name="expertGender" type="radio" value="1">Male
                                                                            </label>
                                                                            <label class="radio-inline">
                                                                            <input id="expertGender" name="expertGender" type="radio" value="2" checked="true" class="radio-inline">Female
                                                                            </label>

                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label" for="selectbasic">Date of Birth</label>
                                                                    <div class="col-md-8">
                                                                        
                                 <input type='text' name="expertDOB" id="expertDOB" class="form-control" value="<?php echo $expertPersonalDetails->expertDOB; ?>" />
                                                                            
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-4 control-label">Password</label>
                                                                    <div class="col-sm-8">
                                                                        <div class="update-pass">
                                                                            <!-- <button class="pd-password" role = "button" data-toggle = "modal" id = "ChangePassword">Change Password</button> -->
                                                                            <a href="logout" class="pd-password" role="button" data-toggle="modal" id="ChangePassword">Change Password</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                        <label class="col-md-4 control-label" for="textinput">Profile Image</label>  
                                                                        <div class="col-md-8">
                                                                            <input id="expertProfileImageName"  name="expertProfileImageName" type="file" class="custom-file-input">
                                                                        </div>
                                                                    </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label" for="textinput">PAN Number</label>  
                                                                    <div class="col-md-8">
                                                                        <input id="expertPanNumber" required name="expertPanNumber" type="text" placeholder=" e.g ABCDE1234F" class="form-control input-md" value="<?php echo $expertPersonalDetails->expertPanNumber; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label" for="textinput">PAN Proof</label>  
                                                                    <div class="col-md-8">
                                                                        <input id="expertPanNumberImageName" required name="expertPanNumberImageName" type="file" class="custom-file-input">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- MAILING ADDRESS-->
                                                <div class="col-md-6">
                                                    <div class="pd-input-wrapper">
                                                        <div class="col-md-12">
                                                            <h1>Mailing Address</h1>
                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label" for="textinput">Address Line 1</label>  
                                                                <div class="col-md-8">
                                                                    <input id="expertAddressLine1" name="expertAddressLine1" type="text" placeholder="e.g Area Name" required class="form-control input-md" value="<?php echo $expertPersonalDetails->expertAddressLine1; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label" for="textinput">Address Line 2</label>  
                                                                <div class="col-md-8">
                                                                    <input id="expertAddressLine2" name="expertAddressLine2" type="text" placeholder="e.g Locality Name" required class="form-control input-md" value="<?php echo $expertPersonalDetails->expertAddressLine2; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label" for="textinput">City</label>  
                                                                <div class="col-md-8">
                                                                    <input id="expertCity" name="expertCity" type="text" placeholder="e.g Gurgaon" required class="form-control input-md" value="<?php echo $expertPersonalDetails->expertCity; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label" for="textinput">Country</label>  
                                                                <div class="col-md-8">
                                                                    <input id="expertCountry" name="expertCountry" type="text" placeholder="e.g India" required class="form-control input-md" value="<?php echo $expertPersonalDetails->expertCountry; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label" for="textinput">Pincode</label>  
                                                                <div class="col-md-8">
                                                                    <input id="expertPincode" name="expertPincode" type="text" placeholder="e.g 111111" required class="form-control input-md" value="<?php echo $expertPersonalDetails->expertPincode; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label" for="selectmultiple">Address Proof</label>
                                                                <div class="col-md-8" >
                                                                    <input type="file" required name="expertAddressProofImageName" id="expertAddressProofImageName" class="custom-file-input">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label" for="textinput">Profile Summary</label>  
                                                                <div class="col-md-8">
                                                                    <textarea id="expertProfileSummary" name="expertProfileSummary" required class="form-control input-md" cols="10" rows="5"><?php echo $expertPersonalDetails->expertProfileSummary; ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Professional Summary-->
                                                <!-- <div class="col-md-12 frm-bdr">
                                                    <div class="alert alert-info text-center">Profile Summary</div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label" for="textinput">Profile Summary</label>  
                                                        <div class="col-md-4">
                                                            <textarea id="expertProfileSummary" name="expertProfileSummary" required class="form-control input-md" cols="10" rows="5"><?php /*echo $expertPersonalDetails->expertProfileSummary; */?></textarea>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <div class="col-md-12 pd-submit">								 
                                                    <button class="pd-btn pd-update" onclick="submitForm()">Update Personal Information</button>                                            
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
                <p>Copyright &copy; Visheshagya 2015</p>
            </div>
        </footer>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <script>
                                                        function submitForm()
                                                        {
                                                            var updateFlag = 1;
                                                            var expertName = $("#expertName").val().trim();
                                                            if (expertName === "")
                                                            {
                                                                updateFlag = -1;
                                                                $('#expertName').parent('div').addClass('has-error');
                                                                $("#expertName").focus();
                                                                return false;
                                                            }
                                                            var expertEmailId = $("#expertEmailId").val().trim();
                                                            if (expertEmailId === "")
                                                            {
                                                                updateFlag = -1;
                                                                $('#expertEmailId').parent('div').addClass('has-error');
                                                                $("#expertEmailId").focus();
                                                                return false;
                                                            }
                                                            var expertMobileNumber = $("#expertMobileNumber").val().trim();
                                                            if (expertMobileNumber === "")
                                                            {
                                                                updateFlag = -1;
                                                                $('#expertMobileNumber').parent('div').addClass('has-error');
                                                                $("#expertMobileNumber").focus();
                                                                return false;
                                                            }
                                                            var expertDOB = $("#expertDOB").val().trim();
                                                            if (expertDOB === "")
                                                            {
                                                                updateFlag = -1;
                                                                $('#expertDOB').parent('div').addClass('has-error');
                                                                $("#expertDOB").focus();
                                                                return false;
                                                            }
                                                            var expertPanNumber = $("#expertPanNumber").val().trim();
                                                            if (expertPanNumber === "")
                                                            {
                                                                updateFlag = -1;
                                                                $('#expertPanNumber').parent('div').addClass('has-error');
                                                                $("#expertPanNumber").focus();
                                                                return false;
                                                            }
                                                            var expertAddressLine1 = $("#expertAddressLine1").val().trim();
                                                            if (expertAddressLine1 === "")
                                                            {
                                                                updateFlag = -1;
                                                                $('#expertAddressLine1').parent('div').addClass('has-error');
                                                                $("#expertAddressLine1").focus();
                                                                return false;
                                                            }
                                                            var expertAddressLine2 = $("#expertAddressLine2").val().trim();
                                                            if (expertAddressLine2 === "")
                                                            {
                                                                updateFlag = -1;
                                                                $('#expertAddressLine2').parent('div').addClass('has-error');
                                                                $("#expertAddressLine2").focus();
                                                                return false;
                                                            }
                                                            var expertCity = $("#expertCity").val().trim();
                                                            if (expertCity === "")
                                                            {
                                                                updateFlag = -1;
                                                                $('#expertCity').parent('div').addClass('has-error');
                                                                $("#expertCity").focus();
                                                                return false;
                                                            }
                                                            var expertCountry = $("#expertCountry").val().trim();
                                                            if (expertCountry === "")
                                                            {
                                                                updateFlag = -1;
                                                                $('#expertCountry').parent('div').addClass('has-error');
                                                                $("#expertCountry").focus();
                                                                return false;
                                                            }
                                                            var expertPincode = $("#expertPincode").val().trim();
                                                            if (isNan(expertPincode))
                                                            {
                                                                updateFlag = -1;
                                                                $('#expertPincode').parent('div').addClass('has-error');
                                                                $("#expertPincode").focus();
                                                                return false;
                                                            }
                                                            if (expertPincode.length !== 6)
                                                            {
                                                                updateFlag = -1;
                                                                $('#expertPincode').parent('div').addClass('has-error');
                                                                $("#expertPincode").focus();
                                                                return false;
                                                            }
                                                            var expertProfileSummary = $("#expertProfileSummary").val().trim();
//                                                            alert("expertProfileSummary : "+expertProfileSummary);
                                                            if (expertProfileSummary === "")
                                                            {
                                                                updateFlag = -1;
                                                                $('#expertProfileSummary').parent('div').addClass('has-error');
                                                                $("#expertProfileSummary").focus();
                                                                return false;
                                                            }
                                                            if (updateFlag === 1)
                                                            {
                                                                return true;
                                                            } else
                                                            {
                                                                return false;
                                                            }

//                                                            var flag = 0;
//                                                            if (flag == 0)
//                                                                    {
//                                                                        $('#expertEmailId').parent('div').addClass('has-error');
//                                                                        $("#expertEmailId").focus();
//                                                                        $("#emailError").modal('show');
//                                                                        return false;
//                                                                    }
//                                                            $("#expertSignupForm").submit();
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