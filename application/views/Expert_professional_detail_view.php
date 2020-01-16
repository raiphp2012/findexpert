
<?php
/*
 * @author Visheshagya
 */

$existingCategoriesId = array();
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
        <title>Expert Professional: Visheshagya</title>
        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/two-column.css" rel="stylesheet">
        <link href="../css/responsive.css" rel="stylesheet">
                <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/font-awesome.min.css" type="text/css">
        <link href="../assets/css/styles.css" rel="stylesheet">
        <link href="../assets/css/font.css" rel="stylesheet">
        <link href="../assets/css/style.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>
        <!-- Custom JS -->
        <script src="../js/custom.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>
         <script type="text/javascript">
            $(document).ready(function () {
                $("#ChangePassword").click(function () {
                    $("#myModalChangePassword").modal('show');
                });
            });
        </script>
        
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
                                         $profileImage=$this->session->userdata('profileImage');
                                          echo $profileImage;
                                        ?>" class="img-responsive img-circle img-thumbnail" width="50px" height="10px;">
                                    </a>
                                    <!--END to display profile images -->
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                        
                                        <li> </li>
                                        
                                        <li><a href="<?php echo base_url() ?>Logout" class="btn btn-danger btn-xs" role="button" data-toggle="modal">Logout</a></li>
                                    </ul>
                                </div>
                            </li>
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
            <div class="content-full-height personal-details expert-personal-details">
            <!-- body content -->
            <div class="two-column-con">
                <div class="container-fluid">
                    <div id="exTab2" class="frm-detail">
                        <div class="tab-pane downarrow" id="top4">
                            <ul class="nav nav-tabs">
                                <li><a style="cursor: pointer"onclick="location.href = '../ExpertProfile';" data-toggle="tab">Personal</a></li>
                                <li class="active"><a style="cursor: pointer"onclick="location.href = '../ExpertProfile/professional';" data-toggle="tab">Professional</a></li>
                                <li><a style="cursor: pointer"onclick="location.href = '../ExpertProfile/consulting';" data-toggle="tab">Consulting</a></li>
                                <li><a style="cursor: pointer"onclick="location.href = '../ExpertProfile/calendar';" data-toggle="tab">Calendar</a></li>
                                <li><a style="cursor: pointer"onclick="location.href = '../ExpertProfile/accounts';" data-toggle="tab">Accounts</a></li>
                            </ul>
                        </div>
                    </div>
                    <?php
                    if (null != $this->session->flashdata('AddProfessionalDetailsSuccess')) {
                        ?>
                        <div class="alert alert-success">
                            <strong>Success!</strong><?php echo $this->session->flashdata('AddProfessionalDetailsSuccess'); ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div id="exTab2" class="frm-detail">
                        <div class="tab-content ">
                            <div class="tab-pane active">
                                <div class="pd-wrapper">
                                    <div class="pd-input-wrapper">
                                    <table class="table"> 
                                        <thead>
                                            <tr>
                                                <th>#</th> 
                                                <th>Professional Category</th> 
                                                <th>Action</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($expertProfessionalDetails as $details) {
                                                $existingCategoriesId[] = $details->categoryId;
                                                ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $details->categoryName; ?></td>
                                                    <td><input type='button' class='btn btn-info' onclick="editProfessionalDetails(<?php echo "'" . $details->categoryId . "'"; ?>,<?php echo "'" . $details->categoryName . "'"; ?>,<?php echo "'" . $details->expertProfessionalDetailsId . "'"; ?>,<?php echo "'" . $details->expertMembershipNumber . "'"; ?>,<?php echo "'" . $details->expertInstituteName . "'"; ?>,<?php echo "'" . $details->expertProfessionalCareerStartYear . "'"; ?>,<?php echo "'" . $details->expertImageName . "'"; ?>)" value='Edit'></td>
                                                </tr>
                                                <?php
                                                $i++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php
                                    if (sizeof($existingCategoriesId) < sizeof($expertCategories)) {
                                        include('AddProfessionalDetails_view.php');
                                    }
                                    ?>
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
        <?php include('popUp/EditProfessionalDetails_view.php'); ?>

        <script>
            expertImageFileName = 'abc';
            editFormName = "";
            function editProfessionalDetails(categoryId, categoryName, expertProfessionalDetailsId, expertMembershipNumber, expertInstituteName, expertProfessionalCareerStartYear, imageName)
            {
                expertImageFileName = imageName;
                editFormName = "#editExpertProfessionalForm";
                $("#newcategoryId").val(categoryId);
                $("#newcategoryName").val(categoryName);
                $("#newexpertProfessionalDetailsId").val(expertProfessionalDetailsId);
                $("#newexpertMembershipNumber").val(expertMembershipNumber);
                $("#newexpertInstituteName").val(expertInstituteName);
                $("#newexpertProfessionalCareerStartYear").val(expertProfessionalCareerStartYear);
 if( expertImageFileName != ""){
                    
                   $('input[name^="expertProfessionalFile').removeAttr('required');

//                   
                }
                var expertExistingSubCategoryDetails = new Array();

<?php
foreach ($expertExistingSubCategoryDetails as $subCategory) {
    $xxxxx = $subCategory->expertProfessionalDetailsId;
    $yyy = $subCategory->subCategoryId;
    ?>
                    var existingexpertProfessionalDetailsId = <?php echo $xxxxx; ?>;
                    if (expertProfessionalDetailsId == existingexpertProfessionalDetailsId)
                    {
                        expertExistingSubCategoryDetails.push(<?php echo $yyy; ?>);
                    }
<?php } ?>
                $.ajax({
                    url: "../Ajaxcalls/fetchSubCategoryDetails",
                    type: 'POST',
                    data: {'categoryId': categoryId},
                    success: function (subCategoryDetails) {
                        var subCatgoryData = JSON.parse(subCategoryDetails);
                        var checkboxes = '';
                        $.each(subCatgoryData, function (i, item) {

                            if (jQuery.inArray(parseInt(subCatgoryData[i].subCategoryId), expertExistingSubCategoryDetails) > -1)
                            {
                                checkboxes += '<div class="checkbox"><label for="checkboxes-0"><input type="checkbox" checked name="subCategoryId[]" value=' + subCatgoryData[i].subCategoryId + '>' + subCatgoryData[i].subCategoryName + '</label></div>';

                            } else
                            {
                                checkboxes += '<div class="checkbox"><label for="checkboxes-0"><input type="checkbox" name="subCategoryId[]" value=' + subCatgoryData[i].subCategoryId + '>' + subCatgoryData[i].subCategoryName + '</label></div>';
                            }
                        });
                        document.getElementById('newsubCat').innerHTML = checkboxes;
                    }});
                $("#editExpertProfessionalInformation").modal('show');
            }

            function submitForm()
            {
                var fflag = 1;
                var categoryId = $("#categoryId").val();
                if (categoryId === 0)
                {
                    $('#categoryId').parent('div').addClass('has-error');
                    $('#categoryId').focus();
                    fflag = 0;
                    return false;
                }
//                alert(categoryId);
//                var okay = -1;
//                if ($("#subCategoryId").is(':checked'))
//                {
//                    okay = 1;
//                }
//                if (okay === -1)
//                {
//                    $('#subCategoryId').parent('div').addClass('has-error');
//                    $('#subCategoryId').focus();
//                    fflag = 0;
//                    return false;
//                }
                var expertMembershipNumber = $("#expertMembershipNumber").val().trim();
                if (expertMembershipNumber === "")
                {
                    $("#expertMembershipNumber").parent('div').addClass('has-error');
                    $("#expertMembershipNumber").focus();
                    fflag = 0;
                    return false;
                }
                var expertProfessionalCareerStartYear = $("#expertProfessionalCareerStartYear").val().trim();
                if (expertProfessionalCareerStartYear === "")
                {
                    $("#expertProfessionalCareerStartYear").parent('div').addClass('has-error');
                    $("#expertProfessionalCareerStartYear").focus();
                    fflag = 0;
                    return false;
                }
                var expertInstituteName = $("#expertInstituteName").val().trim();
                if (expertInstituteName === "")
                {
                    $("#expertInstituteName").parent('div').addClass('has-error');
                    $("#expertInstituteName").focus();
                    fflag = 0;
                    return false;
                }
                if (expertImageFileName === 'abc')
                {
                    var imgVal = $('[type=file]').val();
                    if (imgVal == '')
                    {
                        alert("Please upload the supporting document");
                        return false;
                    }
                }
                if ((editFormName == "") && (fflag === 1)) {
                    return true;
                }

                var checkedAtLeastOne = -1;
                $('input[type="checkbox"]').each(function () {
                    if ($(this).is(":checked")) {
                        checkedAtLeastOne = 1;
                    }
                });
                if ((checkedAtLeastOne == -1) && (fflag == 0))
                {
                    return false;
                } else
                {
                }
            }
//  To fetch the subcategory details based on the category id
            function fetchSubCategoryDetails(categoryId)
            {
                if (categoryId > 0)
                {
                    $.ajax({
                        url: "../Ajaxcalls/fetchSubCategoryDetails",
                        type: 'POST',
                        data: {'categoryId': categoryId},
                        success: function (subCategoryDetails) {
                            var subCatgoryData = JSON.parse(subCategoryDetails);
                            var checkboxes = '';
                            $.each(subCatgoryData, function (i, item) {
                                checkboxes += '<div class="checkbox"><label for="checkboxes-0"><input type="checkbox" d="subCategoryId" name="subCategoryId[]" value=' + subCatgoryData[i].subCategoryId + '>' + subCatgoryData[i].subCategoryName + '</label></div>';
                            });
                            document.getElementById('subCat').innerHTML = checkboxes;
                        }});
                }
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
        <script src=<?php echo base_url() . "assets/js/script.js"; ?></script>
    </body>
</html>