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
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/font-awesome.min.css" type="text/css">
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
        <script type="text/javascript">
            $(function () {
                $('#clientDOBB').datetimepicker({
                    viewMode: 'years',
                    format: 'YYYY-MM-DD'
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
                        <a class="navbar-brand" id="logo" href="<?php echo base_url() . 'ClientProfile'; ?>"></a> 
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <div class="top-nav-tab downarrow">
                            </div>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- body content -->        
            <div class="two-column-con">
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
                                        <form class="form-horizontal" method="POST" action="ClientProfile/updatefbPersonalDetails" id="clientSignupForm" name="clientSignupForm" enctype="multipart/form-data" onsubmit="return(submitForm())">
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
                                                    ?>
                                                    <!-- Form Name -->
                    <div class="alert alert-info text-center" style="color: #e31e24;font-weight: bold;">Please Provide Some Additional Information</div>
                                                    <div class="col-md-10 col-md-offset-1 frm-bdr">
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
                                                                    <input name="clientMobileNumber" id="clientMobileNumber" class="form-control" placeholder="e.g 9999999999" type="text" pattern="[1-9]{1}[0-9]{9}" oninvalid="setCustomValidity(Mobile Number shoulid be 10 digit .')"  value="<?php echo empty($clientPersonalDetails->clientMobileNumber)?'':$clientPersonalDetails->clientMobileNumber; ?>" required>
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
                                                        <label class="col-md-4 control-label" for="textinput"></label> 
                                                        <div class="col-md-4" style="width: 53%;">
                                                            <div class='input-group'>
                                                               <input type="checkbox" name="TermCondition" value="Agree" required autofocus> &nbsp;I agree with the <a href="<?php echo base_url();?>ExpertTermsAndCondition" target="_blank"> terms and conditions</a> for Registration.
                                                            </div>
                                                        </div>
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
        <!-- end body content -->
        <!-- Footer -->
                <?php include('loginFooter.php') ?>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
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
    </body>
</html>