<?php
/*
 * @author Visheshagya
 */
?>
<!DOCTYPE HTML  PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html lang="en">
    <head>
        <link type="text/css" href="/cometchat/cometchatcss.php" rel="stylesheet" charset="utf-8">
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <meta name="author" content="Visheshagya">
        <meta name="description" content="Visheshagya is an ecommerce portal for search and video/audio appointment with various experts like CA,CS,CMA,Lawyers etc.">
        <meta name="keywords" content="CA,CS,CMA,Lawyers,CA in India,CS in India,CMA  in India,Lawyer in India">

        <title>Client Personal Details : Visheshagya</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/two-column.css" rel="stylesheet">
        <!--<link href="css/responsive.css" rel="stylesheet">-->
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Heebo:400,700|Oswald:400,700" type="text/css" media="all">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">
        
        <!--[if lt IE 9]>
                <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/font.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>
        <script src="js/moment.min.js"></script>
        <script src="js/bootstrap-datetimepicker.js"></script>
        <!--<script src="js/custom.js"></script>-->
        <link rel="stylesheet" href="css/bootstrap-datetimepicker.css">        

        <script type="text/javascript">
            $(function () {
                $('#clientDOBnew').datetimepicker({
                    viewMode: 'years',
                    format: 'YYYY-MM-DD'
                });
//                var panProof = <?php echo "'" . $clientPersonalDetails->clientPanNumberImageName . "'"; ?>;
//                panProof = panProof.trim();
//                if (panProof !== "")
//                {
//                    $("#clientPanNumberImageName").prop("required", false);
//                }
//                var addressProof = <?php echo "'" . $clientPersonalDetails->clientAddressProofImageName . "'"; ?>;
//                addressProof = addressProof.trim();
//                if ($.trim(addressProof) !== "")
//                {
//                    $("#clientPanNumberImageName").prop("required", false);
//                }
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function () {
                $("#ChangePassword").click(function () {
                    $("#myModalChangePassword").modal('show');
                    // alert('hello');
                });
            });
        </script>
        <style>
        .two-column-con{
        padding:0; margin:0;
        }
        .navbar-brand{
  background:none;
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
                    <a class="navbar-brand" href="<?php echo base_url(); ?>clientHome/mainHome"><div class="logo"></div></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                    <li ><a href="<?php echo base_url() .'Expertdetails'; ?>" >Home<?php //echo $this->session->userdata('clientId'); ?></a></li>   
                    <li ><a href="<?php echo base_url("expert/chartered-accountant") ; ?>" class="active">Expert Search</a></li>
                        <li  ><a href="<?php echo base_url() . 'ClientAppointments'; ?>">My Appointment</a></li>
                        <li  ><a href="<?php echo base_url() . 'ClientDocument'; ?>">E-Lockers</a></li>
                        <li class="active" ><a href="<?php echo base_url() . 'ClientProfile'; ?>">My Profile</a></li>
                        <li><a href = "<?php echo base_url() ?>ClientHome/logout">Logout</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
        <div class="wide">
            <div class="container">
                <div class="page-header">
                    <h1>My Profile</h1>
                </div>
            </div>
        </div>
<!--         <div class="content-full-height" style="display: none;"> -->
           
            <!-- body content -->        
            <!-- <div class="two-column-con">
                <div class="container">
                    <div id="exTab2" class="frm-detail">                    
                        <div class="tab-pane downarrow" id="top4">
                            <ul class="nav nav-tabs">
                                <li><a style="cursor: pointer;display: none;"onclick="location.href = 'ClientProfile/accounts';" data-toggle="tab">Accounts</a></li>
                            </ul>
                        </div>
                        <div class="tab-content ">
                            <div class="tab-pane active">
                                <div class="main-content detail-view">
                                    <div class="detail-view-cont">
                                        <form class="form-horizontal" method="POST" action="ClientProfile/updatePersonalDetails" id="clientSignupForm" name="clientSignupForm" enctype="multipart/form-data" onsubmit="return(submitForm())">
                                            <fieldset>
                                                <div id="personalDataTab">
                                                    <?php
                                                    if (null != $this->session->flashdata('personalDetailsUpdateMessage')) {
                                                        ?>
                                                        <div class="alert alert-success">
                                                            <strong>Success!</strong><?php echo $this->session->flashdata('personalDetailsUpdateMessage'); ?>
                                                        </div>
                                                        <?php
                                                    }if (null != $this->session->flashdata('personalDetailsErrorMessage')) {
                                                        ?>
                                                        <div class="alert alert-danger">
                                                            <strong>Error! </strong><?php echo $this->session->flashdata('personalDetailsErrorMessage'); ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?> -->
                                                    <!-- Form Name -->
                                                   <!--  <div class="alert alert-info text-center">Enter/Edit Personal Information</div>
                                                    <div class="col-md-10 col-md-offset-1 frm-bdr">
                                                    <a href = "" class = "btn btn-info btn-xs" role = "button" data-toggle = "modal" id = "ChangePassword">Change Password</a>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Name</label>  
                                                            <div class="col-md-4">
                                                                <input autofocus="true" id="clientName" name="clientName" type="text" placeholder="Name" required class="form-control input-md" value="<?php echo empty($clientPersonalDetails->clientName)?'': $clientPersonalDetails->clientName; ?>">
                                                               
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Email</label>  
                                                            <div class="col-md-4">
                                                                <input name="clientEmailId" id="clientEmailId" readonly type="email" required class="form-control input-md" value="<?php echo empty( $clientPersonalDetails->clientEmailId)?'': $clientPersonalDetails->clientEmailId; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="prependedtext">Mobile</label>
                                                            <div class="col-md-4">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">+91</span>
                                                                    <input name="clientMobileNumber" id="clientMobileNumber" class="form-control" placeholder="e.g 9999999999" type="text" pattern="[1-9]{1}[0-9]{9}" oninvalid="setCustomValidity(Mobile Number shoulid be 10 digit .')"  value="<?php echo empty($clientPersonalDetails->clientMobileNumber)?'':$clientPersonalDetails->clientMobileNumber; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Gender</label>  
                                                            <div class="col-md-4">
                                                                <?php if ($clientPersonalDetails->clientGender == 1) { ?>
                                                                    <input id="clientGender" name="clientGender" type="radio" value="1" checked="true">Male
                                                                    <input id="clientGender" name="clientGender" type="radio" value="2" >Female
                                                                <?php } else { ?>
                                                                    <input id="clientGend   er" name="clientGender" type="radio" value="1">Male
                                                                    <input id="clientGender" name="clientGender" type="radio" value="2" checked="true">Female

                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="selectbasic">Date of Birth</label>
                                                            <div class="col-md-4">
                                                                <div class='input-group date' id='clientDOBB'>
                                                                    <input type='text' name="clientDOB" id="clientDOB" class="form-control" value="<?php echo  empty($clientPersonalDetails->clientDOB)? '': $clientPersonalDetails->clientDOB; ?>" />
                                                                    <span class="input-group-addon">
                                                                        <span class="glyphicon glyphicon-calendar">
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">PAN Number</label>  
                                                            <div class="col-md-4">
                                                                <input id="clientPanNumber" name="clientPanNumber" type="text" placeholder=" e.g ABCDE1234F" class="form-control input-md" value="<?php echo empty($clientPersonalDetails->clientPanNumber)?'': $clientPersonalDetails->clientPanNumber; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">PAN Proof</label>  
                                                            <div class="col-md-4">
                                                                <input id="clientPanNumberImageName"  name="clientPanNumberImageName" type="file" class="form-control input-md">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <!-- MAILING ADDRESS-->
                                                <!-- <div class="col-md-12  frm-bdr">
                                                    <div class="alert alert-info text-center">Mailing Address</div>
                                                    <div class="form-group" style="padding-top:1%">
                                                        <label class="col-md-4 control-label" for="textinput">Address Line 1</label>  
                                                        <div class="col-md-4">
                                                            <input id="clientAddressLine1" name="clientAddressLine1" type="text" placeholder="e.g Area Name" required class="form-control input-md" value="<?php echo empty($clientPersonalDetails->clientAddressLine1)?'': $clientPersonalDetails->clientAddressLine1; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label" for="textinput">Address Line 2</label>  
                                                        <div class="col-md-4">
                                                            <input id="clientAddressLine2" name="clientAddressLine2" type="text" placeholder="e.g Locality Name" required class="form-control input-md" value="<?php echo empty($clientPersonalDetails->clientAddressLine2)?'':  $clientPersonalDetails->clientAddressLine2; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label" for="textinput">City</label>  
                                                        <div class="col-md-4">
                                                            <input id="clientCity" name="clientCity" type="text" placeholder="e.g Gurgaon" required class="form-control input-md" value="<?php echo empty($clientPersonalDetails->clientCity)?'': $clientPersonalDetails->clientCity; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label" for="textinput">Country</label>  
                                                        <div class="col-md-4">
                                                            <input id="clientCountry" name="clientCountry" type="text" placeholder="e.g India" required class="form-control input-md" value="<?php echo empty($clientPersonalDetails->clientCountry)?'': $clientPersonalDetails->clientCountry; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label" for="textinput">Pincode</label>  
                                                        <div class="col-md-4">
                                                            <input id="clientPincode" name="clientPincode" type="text" placeholder="e.g 111111" required class="form-control input-md" value="<?php echo empty($clientPersonalDetails->clientPincode)?'': $clientPersonalDetails->clientPincode; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label" for="selectmultiple">Address Proof</label>
                                                        <div class="col-md-4" >
                                                            <input type="file"  name="clientAddressProofImageName" id="clientAddressProofImageName" class="form-control input-md">
                                                        </div>
                                                    </div>
                                                </div>                                               
                                                <div class="col-md-12 text-center form-group">                               
                                                    <button class="btn btn-sm btn-primary" onclick="submitForm()">Update Personal Information</button>                                            
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
 -->
        <main class="container-fluid personal-details content-full-height">
            <section class="row">
                <article class="col-md-12 pad0">
                    <form  class="form-horizontal" method="POST" action="ClientProfile/updatePersonalDetails" id="clientSignupForm" name="clientSignupForm" enctype="multipart/form-data" onsubmit="return(submitForm())">
                        <div class="row pd-wrapper">
                            <?php
                                if (null != $this->session->flashdata('personalDetailsUpdateMessage')) {
                            ?>
                                <div class="alert alert-success">
                                    <strong>Success!</strong><?php echo $this->session->flashdata('personalDetailsUpdateMessage'); ?>
                                </div>
                            <?php
                                }if (null != $this->session->flashdata('personalDetailsErrorMessage')) {
                            ?>
                                <div class="alert alert-danger">
                                    <strong>Error! </strong><?php echo $this->session->flashdata('personalDetailsErrorMessage'); ?>
                                </div>
                            <?php
                                }
                            ?>
                           <div class="col-md-6">
                                <div class="pd-input-wrapper">
                                    <h1>Enter/Edit Personal Information</h1>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Name" id="clientName" name="clientName" value="<?php echo empty($clientPersonalDetails->clientName)?'': $clientPersonalDetails->clientName; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Email</label>
                                        <div class="col-sm-9">
                                          <input type="email" class="form-control" placeholder="Email" name="clientEmailId" id="clientEmailId" value="<?php echo empty( $clientPersonalDetails->clientEmailId)?'': $clientPersonalDetails->clientEmailId; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Mobile</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">+91</span>
                                                <input type="text" class="form-control" placeholder="Mobile Number" name="clientMobileNumber" id="clientMobileNumber" pattern="[1-9]{1}[0-9]{9}" oninvalid="setCustomValidity('Mobile Number shoulid be 10 digit .')"  value="<?php echo empty($clientPersonalDetails->clientMobileNumber)?'':$clientPersonalDetails->clientMobileNumber; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Gender</label>
                                        <div class="col-sm-9">
                                            <?php if ($clientPersonalDetails->clientGender == 1) { ?>
                                                <label class="radio-inline">
                                                    <input id="clientGender" name="clientGender" type="radio" value="1" checked="true">Male
                                                </label>
                                                <label class="radio-inline">
                                                    <input id="clientGender" name="clientGender" type="radio" value="2" >Female
                                                </label>
                                            <?php } else { ?>
                                                <label class="radio-inline">
                                                    <input id="clientGend   er" name="clientGender" type="radio" value="1">Male
                                                </label>
                                                <label class="radio-inline">
                                                    <input id="clientGender" name="clientGender" type="radio" value="2" checked="true">Female
                                                </label>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">D.O.B</label>
                                        <div class="col-sm-9">
                                            <div class="input-group date" id='clientDOBnew'>
                                                <input type="text" class="form-control" placeholder="Date Of Birth" name="clientDOB" id="clientDOB" value="<?php echo  empty($clientPersonalDetails->clientDOB)? '': $clientPersonalDetails->clientDOB; ?>"  >
                                                <span class="input-group-addon" ><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">PAN Number</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" placeholder="PAN Number" id="clientPanNumber" name="clientPanNumber" value="<?php echo empty($clientPersonalDetails->clientPanNumber)?'': $clientPersonalDetails->clientPanNumber; ?>">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-sm-3 control-label">Password</label>
                                        <div class="col-sm-9">
                                            <div class="update-pass">
                                                <!-- <button class="pd-password" role = "button" data-toggle = "modal" id = "ChangePassword">Change Password</button> -->
                                                <a  class ="pd-password" role = "button" data-toggle = "modal" id = "ChangePassword">Change Password</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">PAN Proof</label>
                                        <div class="col-sm-9">
                                          <input type="file" name="clientPanNumberImageName" class="custom-file-input" accept=".jpg, .png, .jpeg, .pdf, .doc, .docx">
                                        </div>
                                    </div>
                                </div><!-- pd-input-wrapper end -->
                           </div>
                           <div class="col-md-6">
                                <div class="pd-input-wrapper">
                                <h1>Mailing Address</h1>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Address Line 1</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" placeholder="Address Line 1" id="clientAddressLine1" name="clientAddressLine1" value="<?php echo empty($clientPersonalDetails->clientAddressLine1)?'': $clientPersonalDetails->clientAddressLine1; ?>"reqiured>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Address Line 1</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" placeholder="Address Line 2" id="clientAddressLine2" name="clientAddressLine2" value="<?php echo empty($clientPersonalDetails->clientAddressLine2)?'':  $clientPersonalDetails->clientAddressLine2; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">City</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" placeholder="City" id="clientCity" name="clientCity" value="<?php echo empty($clientPersonalDetails->clientCity)?'': $clientPersonalDetails->clientCity; ?>"   required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Country</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" placeholder="Country" id="clientCountry" name="clientCountry" value="<?php echo empty($clientPersonalDetails->clientCountry)?'': $clientPersonalDetails->clientCountry; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Pincode</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" placeholder="eg 110072" id="clientPincode" name="clientPincode" value="<?php echo empty($clientPersonalDetails->clientPincode)?'': $clientPersonalDetails->clientPincode; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Address Proof</label>
                                        <div class="col-sm-9">
                                          <input type="file" name="clientAddressProofImageName" class="custom-file-input" accept=".jpg, .png, .jpeg, .pdf, .doc, .docx">
                                        </div>
                                    </div>
                                </div><!-- pd-input-wrapper end -->
                            </div>
                            <div class="col-md-12 pd-submit">
                                <button class="pd-btn pd-update" onclick="submitForm()">Update Personal Information</button>
                            </div>
                       </div><!-- row end -->
                    </form>
                </article>
            </section>
        </main>
        <!-- end body content -->
        <!-- Footer -->
                <?php include('loginFooter.php') ?>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <script>
                                                        function submitForm()
                                                        {
                                                            console.log('hello');
                                                            var updateFlag = 1;
                                                            var clientName = $("#clientName").val().trim();
                                                            if (clientName === "")
                                                            {
                                                                updateFlag = -1;
                                                                $('#clientName').parent('div').addClass('has-error');
                                                                $("#clientName").focus();
                                                                return false;
                                                            }
                                                            var clientEmailId = $("#clientEmailId").val().trim();
                                                            if (clientEmailId === "")
                                                            {
                                                                updateFlag = -1;
                                                                $('#clientEmailId').parent('div').addClass('has-error');
                                                                $("#clientEmailId").focus();
                                                                return false;
                                                            }
                                                            var clientMobileNumber = $("#clientMobileNumber").val().trim();
                                                            if (clientMobileNumber === "")
                                                            {
                                                                updateFlag = -1;
                                                                $('#clientMobileNumber').parent('div').addClass('has-error');
                                                                $("#clientMobileNumber").focus();
                                                                return false;
                                                            }
                                                            var clientDOB = $("#clientDOB").val().trim();
                                                            if (clientDOB === "")
                                                            {
                                                                updateFlag = -1;
                                                                $('#clientDOB').parent('div').addClass('has-error');
                                                                $("#clientDOB").focus();
                                                                return false;
                                                            }
                                                            var clientPanNumber = $("#clientPanNumber").val().trim();
                                                            if (clientPanNumber === "")
                                                            {
                                                                updateFlag = -1;
                                                                $('#clientPanNumber').parent('div').addClass('has-error');
                                                                $("#clientPanNumber").focus();
                                                                return false;
                                                            }
                                                            var clientAddressLine1 = $("#clientAddressLine1").val().trim();
                                                            if (clientAddressLine1 === "")
                                                            {
                                                                updateFlag = -1;
                                                                $('#clientAddressLine1').parent('div').addClass('has-error');
                                                                $("#clientAddressLine1").focus();
                                                                return false;
                                                            }
                                                            var clientAddressLine2 = $("#clientAddressLine2").val().trim();
                                                            if (clientAddressLine2 === "")
                                                            {
                                                                updateFlag = -1;
                                                                $('#clientAddressLine2').parent('div').addClass('has-error');
                                                                $("#clientAddressLine2").focus();
                                                                return false;
                                                            }
                                                            var clientCity = $("#clientCity").val().trim();
                                                            if (clientCity === "")
                                                            {
                                                                updateFlag = -1;
                                                                $('#clientCity').parent('div').addClass('has-error');
                                                                $("#clientCity").focus();
                                                                return false;
                                                            }
                                                            var clientCountry = $("#clientCountry").val().trim();
                                                            if (clientCountry === "")
                                                            {
                                                                updateFlag = -1;
                                                                $('#clientCountry').parent('div').addClass('has-error');
                                                                $("#clientCountry").focus();
                                                                return false;
                                                            }
                                                            var clientPincode = $("#clientPincode").val().trim();
                                                            if (isNan(clientPincode))
                                                            {
                                                                updateFlag = -1;
                                                                $('#clientPincode').parent('div').addClass('has-error');
                                                                $("#clientPincode").focus();
                                                                return false;
                                                            }
                                                            if (clientPincode.length !== 6)
                                                            {
                                                                updateFlag = -1;
                                                                $('#clientPincode').parent('div').addClass('has-error');
                                                                $("#clientPincode").focus();
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
//                                                                        $('#clientEmailId').parent('div').addClass('has-error');
//                                                                        $("#clientEmailId").focus();
//                                                                        $("#emailError").modal('show');
//                                                                        return false;
//                                                                    }
//                                                            $("#clientSignupForm").submit();
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
        ?>

        <?php
        include('analytics/googleAnalytics.php');
        include('popUp/clientChangePassword_view.php');
        ?>     
        <script src=<?php echo base_url() . "assets/js/script.js"; ?>></script>
    </body>
</html>