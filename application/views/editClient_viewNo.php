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

        <title>Expert Personal Details : Visheshagya</title>

        <!-- Bootstrap Core CSS -->
        
        <!-- Custom CSS -->
        
        

        <!-- jQuery -->
        
        <link href="<?php echo base_url() . 'css/bootstrap.css'; ?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/font-awesome.min.css" type="text/css">
        <!-- Custom CSS -->
        <link href="<?php echo base_url() . 'css/style.css'; ?>" rel="stylesheet">
        <link href="<?php echo base_url() . 'css/two-column.css'; ?>" rel="stylesheet">
        <link href="<?php echo base_url() . 'css/responsive.css'; ?>" rel="stylesheet">
        <!-- jQuery -->
        <script src="<?php echo base_url() . 'js/jquery.min.js'; ?>"></script>
        
       
       
       
        <link rel="stylesheet" href="css/bootstrap-datetimepicker.css">        

        <script type="text/javascript">
            $(function () {
                $('#expertDOBB').datetimepicker({
                    viewMode: 'years',
                    format: 'YYYY-MM-DD'
                });
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
                        <a class="navbar-brand" id="logo" href="Expert"></a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            
                            <div class="top-nav-tab downarrow">
                                <ul class="nav nav-tabs">
                                    <li><a style="cursor: pointer"onclick="location.href = 'ExpertAppointments';" data-toggle="tab">My Appointments</a></li>
                                    <li><a style="cursor: pointer"onclick="location.href = 'ExpertDocument';" data-toggle="tab">E-Lockers</a></li>
                                    <li class="active"><a style="cursor: pointer"onclick="location.href = 'ExpertProfile';" data-toggle="tab">My Profile</a></li>
                                    <li><a style="cursor: pointer"onclick="location.href = 'MyOffice';" data-toggle="tab">My Office</a></li>
                                    <li>
                                    
                                <div class="dropdown">
                                    <!-----------to display profile images------------------- -->
                                    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                        <img src="<?php 
                                        if(trim($expertPersonalDetails->expertProfileImageName) == ""){
                                            echo base_url() . "img/default.jpg";

                                        }
                                        else{
                                        echo base_url().$expertPersonalDetails->expertProfileImageName;     
                                        }
                                        ?>" class="img-responsive img-circle img-thumbnail" width="50px" height="10px;">
                                    </a>
                                    <!-----------END to display profile images------------------- -->
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
                                        <?php echo form_open(base_url() . "MyOffice/client_update/{$clientEdit->clientId}", ['class' => 'form-horizontal']) ?>
                                        <?php// echo form_hidden('clientId',$clientEdit->clientId) ?>
                                        
                                       
                                            <fieldset>
                                                <div id="personalDataTab">
                                                
                                                    <!-- Form Name -->
                                                    <div class="alert alert-info text-center">Enter/Edit Personal Information</div>
                                                    <div class="col-md-10 col-md-offset-1 frm-bdr">
                                                   
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Name</label>  
                                                            <div class="col-md-4">
                                                                <?php echo form_input(['name' => 'clientName', 'type' => 'name', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'Enter Client name','value'=>set_value('clientName', $clientEdit->clientName)]); ?>
                                                               
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Email</label>  
                                                            <div class="col-md-4">
                                                                <?php echo form_input(['name' => 'clientEmailId', 'id' => 'clientEmailId', 'type' => 'email', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'abc@xyz.com',
                                        'onchange' => 'checkClientEmailId(this.value)','value'=>set_value('clientEmailId', $clientEdit->clientEmailId)]);
                                    ?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="prependedtext">Mobile</label>
                                                            <div class="col-md-4">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">+91</span>
                                                                    <?php echo form_input(['name' => 'clientMobileNumber', 'type' => 'text', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'Mobile Number','pattern'=>'[1-9]{1}[0-9]{9}','oninvalid'=>"setCustomValidity('Mobile Number with 6-9 and remaing 9 digit with 0-9')",'value'=>set_value('clientMobileNumber', $clientEdit->clientMobileNumber)]); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                       
                                                    </div>
                                                </div>                                               
                                                <div class="col-md-12 text-center form-group">                               
                                                    <button class="btn btn-sm btn-primary" onclick="submitForm()">Update Client Information</button>                                            
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
        <?php
        include('analytics/googleAnalytics.php');
        include('popUp/clientChangePassword_view.php');
        ?>     

    </body>
</html>