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
        <meta name="author" content="Visheshagya">

        <title>Expert Signup: Visheshagya</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/two-column.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css">
        <link href="assets/css/styles.css" rel="stylesheet">
        <link href="assets/css/font.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">

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
                        <a class="navbar-brand" href="Expert"><div class="logo"></div></a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#" id="login">Login</a></li>          
                        </ul>
                    </div><!-- nav-collapse -->
                </div>
            </nav>
            <div class="wide">
                <div class="container">
                    <div class="page-header">
                        <h1>Sign Up</h1>
                    </div>
                </div>
            </div>
            <!-- body content -->
            <div class="content-full-height booking-appointment-form">
                <div class="two-column-con">
                    <div class="container booking-form-wrapper booking-instant">
                        <div id="exTab2" class="frm-detail">
                            <div class="tab-content ">
                                <div class="tab-pane downarrow active">
                                    <ul class="nav nav-tabs">
                                        <li id="personalTab" class="active">
                                            <a  href="#" onclick="showPreviousTab()" data-toggle="tab">Personal</a>
                                        </li>
                                        <li id="professionalTab">
                                            <a onclick="showNextTab()"data-toggle="tab">Professional</a>
                                        </li>
                                    </ul>
                                    <div class="main-content detail-view">
                                        <div class="detail-view-cont">
                                            <form class="form-horizontal" method="POST" action="ExpertSignup/addExpert" id="expertSignupForm" name="expertSignupForm" onsubmit="return(submitForm())">
                                                <fieldset>
                                                    <div id="personalDataTab">
                                                        <div class="alert alert-info text-center">Enter Personal Information (STEP 1 OF 2)</div>
                                                        <div class="col-md-12 form-wrapper">
                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label" for="textinput">Name</label>  
                                                                <div class="col-md-8">
                                                                    <input autofocus="true" id="expertName" name="expertName" type="text" placeholder="Name" required class="form-control input-md">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label" for="textinput">Email</label>  
                                                                <div class="col-md-8">
                                                                    <input name="expertEmailId" id="expertEmailId" type="email" placeholder="e.g abc@xyz.com" required class="form-control input-md" onchange="checkEmailId(this.value)">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label" for="prependedtext">Mobile</label>
                                                                <div class="col-md-8">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon">+91</span>
                                                                        <input name="expertMobileNumber" id="expertMobileNumber" class="form-control" placeholder="e.g 9999999999" type="text" pattern="[1-9]{1}[0-9]{9}" oninvalid="setCustomValidity(Mobile Number shoulid be 10 digit .')">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                             <div class="form-group">
                                                                <label class="col-md-4 control-label" for="prependedtext">Location</label>
                                                                <div class="col-md-8">
                                                                    <div class="input-group">
                                                                      
                                                                        <select name="locationId" id="locationId" class="form-control" required>
                                                                        <option value="">Select Location</option>
                                                                        <?php foreach($location_list as $location){?>
                                                                         <option value="<?php echo $location->locationId;?>"><?php echo $location->locationName;?></option>
                                                                        <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 text-center form-group">									  
                                                                <a role="button" class="btn next-btn" onclick="showNextTab()">Next<i class="fa fa-hand-o-right"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>                                            <!--one page -->
                                                    <div id="professionalDataTab" style="display: none" >
                                                        <div class="alert alert-info text-center">Enter Professional Information (STEP 2 OF 2)</div>
                                                        <div class="col-md-12 form-wrapper">
                                                            <div class="form-group">
                                                                <label class="col-md-12 control-label padB10" for="selectbasic">Primary Professional Category</label>
                                                                <div class="col-md-12">
                                                                    <select id="categoryId" name="categoryId" class="form-control" onchange="fetchSubCategoryDetails(this.value)">
                                                                        <option value="0">--SELECT--</option>
                                                                        <?php foreach ($expertCategories as $eCategory) { ?>
                                                                            <option value=<?php echo $eCategory->categoryId; ?>><?php echo $eCategory->categoryName; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-12 control-label padB10" for="selectmultiple">What Types of service you offer?</label>
                                                                <div class="col-md-12 " >
                                                                    <p id="subCat" name="subCat" style="border: 1px solid lightgray; border-radius: 2%;padding: 4%" ></p>
                                                                   <!--  <input id="subCat" name="subCat" class="form-control input-md" disabled="disabled"> -->
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-12 control-label padB10" for="textinput">Membership #</label>  
                                                                <div class="col-md-12 ">
                                                                    <input id="expertMembershipNumber" required name="expertMembershipNumber" type="text" placeholder="e.g ASDC34WE" class="form-control input-md">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-12 control-label padB10" for="selectbasic">Practicing Since</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" required min="1947" name="expertProfessionalCareerStartYear" id="expertProfessionalCareerStartYear"placeholder="e.g 2016" class="form-control input-md">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-12 control-label padB10" for="textinput">Institute/Bar Council Name</label>  
                                                                <div class="col-md-12">
                                                                    <input id="expertInstitueName" required name="expertInstitueName" type="text" placeholder=" e.g Institute Name" class="form-control input-md">
                                                                </div>
                                                            </div>                                                        
                                                            <div class="form-group">
                                                                <!-- <label class="col-md-4 control-label"></label> -->
                                                                <div class="col-md-12">
                                                                    <div class="checkbox">
                                                                        <label for="checkboxes-0">
                                                                            <input type="checkbox" required name="termsAndCondition" id="termsAndCondition" value="1">
                                                                            <a href="ExpertTermsAndCondition" target="_blank">I agree to the Terms and Conditions</a>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 text-center form-group">								 
                                                                <button class="btn next-btn" onclick="submitForm()">Sign Up<i class="fa fa-sign-in"></i></button>								  
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
            </div>
        <!-- end body content -->
        <!-- Footer -->
                <?php include('loginFooter.php') ?>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <script>
                                                                function showNextTab()
                                                                {
                                                                    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                                                                    var expertName = $('#expertName').val();
                                                                    var emailId = $("#expertEmailId").val();
                                                                    emailId = $.trim(emailId);
                                                                    var flag = 1;
                                                                    $.ajax({
                                                                        url: 'Ajaxcalls/checkEmailId',
                                                                        type: 'POST',
                                                                        data: {'emailId': emailId},
                                                                        async: false,
                                                                        success: function (response) {
                                                                            var verifyResult = JSON.parse(response);
                                                                            if (verifyResult.verificationResult !== 0)
                                                                            {
                                                                                $('#expertEmailId').parent('div').addClass('has-error');
                                                                                $("#expertEmailId").focus();
                                                                                $("#emailError").modal('show');
                                                                                flag = 0;
                                                                                return false;
                                                                            }
                                                                        }
                                                                    });
                                                                    if (flag == 0)
                                                                    {
                                                                        $('#expertEmailId').parent('div').addClass('has-error');
                                                                        $("#expertEmailId").focus();
                                                                        $("#emailError").modal('show');
                                                                        return false;
                                                                    } else if ($.trim(expertName) === "")
                                                                    {
                                                                        $('#expertName').parent('div').addClass('has-error');
                                                                        $('#expertName').focus();

                                                                        return false;
                                                                    } else if (isNaN($("#expertMobileNumber").val()))
                                                                    {
                                                                        $("#expertMobileNumber").parent('div').addClass('has-error');
                                                                        return false;
                                                                    } else if ($("#expertMobileNumber").val().length != 10)
                                                                    {
                                                                        $("#expertMobileNumber").parent('div').addClass('has-error');
                                                                        $("#expertMobileNumber").focus();
                                                                        return false;
                                                                    } else if (!re.test($("#expertEmailId").val()))
                                                                    {
                                                                        $('#expertEmailId').parent('div').addClass('has-error');
                                                                        $("#expertEmailId").focus();
                                                                        return false;
                                                                    }
                                                                    if ($("#expertEmailId").val().trim() === "")
                                                                    {
                                                                        $('#expertEmailId').parent('div').addClass('has-error');
                                                                        $("#expertEmailId").focus();
                                                                    } else
                                                                    {
                                                                        $("#personalDataTab").hide();
                                                                        $("#personalTab").removeClass('active');
                                                                        $("#professionalTab").addClass('active');
                                                                        $("#professionalDataTab").show();
                                                                    }
                                                                }
                                                                function showPreviousTab()
                                                                {
                                                                    $("#professionalDataTab").hide();
                                                                    $("#personalDataTab").show();
                                                                    $("#personalTab").addClass('active');
                                                                    $("#professionalTab").removeClass('active');

                                                                }
                                                                function submitForm()
                                                                {
                                                                    var fflag = 1;
                                                                    var categoryId = $("#categoryId").val();
                                                                    if (categoryId == 0)
                                                                    {
                                                                        $('#categoryId').parent('div').addClass('has-error');
                                                                        $('#categoryId').focus();
                                                                        fflag = 0;
                                                                        return false;
                                                                    }
                                                                    var okay = -1;
                                                                    $(".subCategoryId").each(function () {
                                                                        if ($(".subCategoryId").is(':checked'))
                                                                        {
                                                                            okay = 1;
                                                                        }
                                                                    });
                                                                    if (okay === -1)
                                                                    {
                                                                        $('#subCategoryId').parent('div').addClass('has-error');
                                                                        $('#subCategoryId').focus();
                                                                        fflag = 0;
                                                                        return false;
                                                                    }

                                                                    var expertMembershipNumber = $("#expertMembershipNumber").val();
                                                                    if ($.trim(expertMembershipNumber) === "")
                                                                    {
                                                                        $('#expertMembershipNumber').parent('div').addClass('has-error');
                                                                        $('#expertMembershipNumber').focus();
                                                                        fflag = 0;
                                                                        return false;
                                                                    }

                                                                    var expertProfessionalCareerStartYear = $("#expertProfessionalCareerStartYear").val();
                                                                    if ($.trim(expertProfessionalCareerStartYear) === "")
                                                                    {
                                                                        $('#expertProfessionalCareerStartYear').parent('div').addClass('has-error');
                                                                        $('#expertProfessionalCareerStartYear').focus();
                                                                        fflag = 0;
                                                                        return false;
                                                                    }
                                                                    var expertInstitueName = $("#expertInstitueName").val();
                                                                    if ($.trim(expertInstitueName) === "")
                                                                    {
                                                                        $('#expertInstitueName').parent('div').addClass('has-error');
                                                                        $('#expertInstitueName').focus();
                                                                        fflag = 0;
                                                                        return false;
                                                                    }
                                                                    if (document.getElementById('termsAndCondition').checked)
                                                                    {
                                                                    } else
                                                                    {
                                                                        fflag = 0;
                                                                        return false;
                                                                    }
                                                                    if (fflag == 1)
                                                                    {
                                                                        return true;
                                                                        alert("success");
                                                                    }
                                                                }
//  To fetch the subcategory details based on the category id
                                                                function fetchSubCategoryDetails(categoryId)
                                                                {
                                                                    if (categoryId > 0)
                                                                    {
                                                                        // $('#subCat').prop('disabled', false);
                                                                        $.ajax({
                                                                            url: "Ajaxcalls/fetchSubCategoryDetails",
                                                                            type: 'POST',
                                                                            data: {'categoryId': categoryId},
                                                                            success: function (subCategoryDetails) {
                                                                                var subCatgoryData = JSON.parse(subCategoryDetails);
                                                                                var checkboxes = '';
                                                                                $.each(subCatgoryData, function (i, item) {
                                                                                    checkboxes += '<div class="checkbox"><label for="checkboxes-0"><input type="checkbox" id = "subCategoryId" class="subCategoryId" name="subCategoryId[]" value=' + subCatgoryData[i].subCategoryId + '>' + subCatgoryData[i].subCategoryName + '</label></div>';
                                                                                });
                                                                                document.getElementById('subCat').innerHTML = checkboxes;
                                                                            }});
                                                                    } else
                                                                    {
                                                                        document.getElementById('subCat').innerHTML = "";
                                                                    }

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
                                                                                $('#expertEmailId').parent('div').addClass('has-error');
                                                                                $("#expertEmailId").focus();
                                                                                $("#emailError").modal('show');
                                                                                return false;
                                                                            }
                                                                        }
                                                                    });
                                                                }
        </script> 
        <?php include('ExpertLoginPopUp_view.php'); ?>
        <?php include('EmailErrorPopUp_view.php'); ?>
        <script src=<?php echo base_url() . "assets/js/script.js"; ?>></script>
    </body>
</html>