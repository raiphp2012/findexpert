<?php
/*
 * @author Visheshagya
 */
include('analytics/googleAnalytics.php');
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

        <title>Expert Available Time: Visheshagya</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
                <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/font-awesome.min.css" type="text/css">
        <!-- Custom CSS -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/two-column.css" rel="stylesheet">

        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>
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
                    <a class="navbar-brand" href="Expert"></a>
                </div>
                <?php
                if ((null === $this->session->userdata('expertId'))) {
                    ?>
                    <div id="navbar" class="navbar-collapse collapse">
                        <div class="navbar-query-expert">EXPERT SIGNUP </div>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#" id="login">Login</a></li>
                            <li class="active"><a href="./">Signup</a></li>
                            <li><a href="welcome">Client</a></li>                                             
                        </ul>
                    </div>
                <?php } ?>
            </div>
        </nav>

        <!-- body content -->        
        <div class="two-column-con">
            <div class="container">
                <div id="exTab2" class="frm-detail">
                    <div class="tab-content ">
                        <div class="tab-pane active">                            
                            <div class="main-content detail-view">
                                <div class="detail-view-cont">
                                    <form class="form-horizontal" method="POST" action="ExpertSignup/addExpert" id="expertSignupForm"name="expertSignupForm">
                                        <fieldset>
                                            <div id="personalDataTab">
                                                <div class="alert alert-info text-center">Enter/Edit Personal Information</div>
                                                <div class="col-md-10 col-md-offset-1 frm-bdr">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label" for="textinput">Name</label>  
                                                        <div class="col-md-4">
                                                            <input autofocus="true" id="expertName" name="expertName" type="text" placeholder="Name" required class="form-control input-md" value=<?php echo $expertPersonalDetails->expertName; ?>>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label" for="textinput">Email</label>  
                                                        <div class="col-md-4">
                                                            <input name="expertEmailId" id="expertEmailId" type="email" placeholder="abc@xyz.com" required class="form-control input-md" onchange="checkEmailId(this.value)">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label" for="prependedtext">Mobile</label>
                                                        <div class="col-md-4">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">+91</span>
                                                                <input name="expertMobileNumber" id="expertMobileNumber" class="form-control" placeholder="Mobile Number" type="number" min="1111111111" max="9999999999">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label" for="textinput">Gender</label>  
                                                        <div class="col-md-4">
                                                            <input id="expertGender" required name="expertGender" type="radio" value="1" checked="true">Male
                                                            <input id="expertGender" required name="expertGender" type="radio" >Female
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label" for="selectbasic">Date of Birth</label>
                                                        <div class="col-md-4">
                                                            <input type="date" required name="expertProfessionalCareerStartYear" id="expertProfessionalCareerStartYear"placeholder="e.g. 2016" class="form-control input-md">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label" for="textinput">PAN Number</label>  
                                                        <div class="col-md-4">
                                                            <input id="expertInstitueName" required name="expertInstitueName" type="text" placeholder="ABCDE1234F" class="form-control input-md">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label" for="textinput">PAN Proof</label>  
                                                        <div class="col-md-4">
                                                            <input id="expertInstitueName" required name="expertInstitueName" type="file" placeholder="ABCDE1234F" class="form-control input-md">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label" for="selectmultiple">Personal Identification Number</label>
                                                        <div class="col-md-4" >
                                                            <input type="text" required name="expertProfessionalCareerStartYear" id="expertP"placeholder="" class="form-control input-md">
                                                        </div>
                                                    </div>                                 
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label" for="selectmultiple">Personal Identification Number</label>
                                                        <div class="col-md-4" >
                                                            <input type="file" required name="expertProfessionalCareerStartYear" id="expertP"placeholder="" class="form-control input-md">
                                                        </div>
                                                    </div>    
                                                    <div class="col-md-12 text-center form-group">								 
                                                        <button class="btn btn-sm btn-primary" onclick="submitForm()">SIGNUP</button>								  
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
        <!-- end body content -->
        <!-- Footer -->
               <?php include('loginFooter.php') ?>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <script>

                                                            function submitForm()
                                                            {
                                                                $("#expertSignupForm").submit();
                                                            }
                                                            function checkEmailId(emailId)
                                                            {
                                                                $.ajax({
                                                                    url: 'Ajaxcalls/checkEmailId',
                                                                    type: 'POST',
                                                                    data: {'emailId': emailId},
                                                                    success: function (response) {
                                                                        var verifyResult = JSON.parse(response);
                                                                        if (verifyResult.verificationResult !== 0)
                                                                        {
                                                                            alert("Email already exist");
                                                                            $("#expertEmailId").focus();
                                                                            return false;
                                                                        }
                                                                    }
                                                                });
                                                            }
        </script> 
    </body>
</html>
