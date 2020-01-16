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

        <title>Expert Accounts Details : Visheshagya</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/two-column.css" rel="stylesheet">
        <link href="../css/responsive.css" rel="stylesheet">
        <link href="../assets/css/styles.css" rel="stylesheet">
        <link href="../assets/css/font.css" rel="stylesheet">
        <link href="../assets/css/style.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>
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



            <!-- body content --> 
            <div class="content-full-height  personal-details expert-personal-details">       
            <div class="two-column-con">
                <div class="container-fluid">
                    <div id="exTab2" class="frm-detail">            
                        <div class="tab-pane downarrow" id="top4">
                            <ul class="nav nav-tabs">
                                <li><a style="cursor: pointer"onclick="location.href = '../ExpertProfile';" data-toggle="tab">Personal</a></li>
                                <li><a style="cursor: pointer"onclick="location.href = '../ExpertProfile/professional';" data-toggle="tab">Professional</a></li>
                                <li><a style="cursor: pointer"onclick="location.href = '../ExpertProfile/consulting';" data-toggle="tab">Consulting</a></li>
                                <li><a style="cursor: pointer"onclick="location.href = '../ExpertProfile/calendar';" data-toggle="tab">Calendar</a></li>
                                <li class="active"><a style="cursor: pointer"onclick="location.href = '../ExpertProfile/accounts';" data-toggle="tab">Accounts</a></li>
                            </ul>
                        </div>
                         <?php
                        if (null != $this->session->flashdata('BankAccountDetailsSuccess')) {
                            ?>
                            <div class="alert alert-success">
                                <strong>Success!</strong><?php echo $this->session->flashdata('BankAccountDetailsSuccess'); ?>
                            </div>
                            <?php
                        }
                        ?> 
                        <div class="tab-content ">
                            <div class="tab-pane active">      
                                <div class="pd-wrapper">      
                                <div class="pd-input-wrapper">                
                                <div class="main-content detail-view">
                                    <div class="detail-view-cont"></div>
                                </div>
                                <div>
                                    <div>
                                        <a role="button" onclick="showBankAccountDetailsForm()" class="btn btn-primary"
                                        style="margin-bottom:20px;">Bank Account Details</a>
                                    </div>
                                    <div class="panel panel-default">
                                        <form class="form-horizontal" method="POST" action="../ExpertProfile/updateConsultationDetails" id="expertSignupForm"name="expertSignupForm">
                                            <table class="table" style="width:100%;"> 
                                                <thead>
                                                    <tr>
                                                        <th>Sl. No.</th> 
                                                        <th>Date</th> 
                                                        <th>Customer name</th> 
                                                        <th>Category</th> 
                                                        <th>Type</th> 
                                                        <th>Status</th> 
                                                        <th>Amount</th> 

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody> 
                                            </table>
                                        </form>
                                    </div>
                                </div>
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
                <p>Copyright &copy; Visheshagya 2016</p>
            </div>
        </footer>
        <?php include('popUp/ExpertBankAccountDetails_view.php'); ?>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>
        <script>
 var status=1;
    function submitForm()
                                {
                                   
                                    var accountNumber=$("#accountNumber").val();
                                    var nameAsPerRecords=$("#nameAsPerRecords").val();
                                    var ifscCode=$("#ifscCode").val();
                                    var bankName =$("#bankName").val();
                                     var bankAddress=$("#bankAddress").val();
                                     var micrCode=$("#micrCode").val();
                                     var accountType=$("#accountType").val();
                                     if($.trim(accountNumber)==='')
                                     {
                                         alert("Enter Account Number");
                                         status=0;
                                         return false;
                                     }
                                     if($.trim(nameAsPerRecords)==='')
                                     {
                                         alert("Enter  Account Holder Name");
                                         status=0;
                                         return false;
                                     }
                                     if($.trim(ifscCode)==='')
                                     {
                                         alert("Enter IFSC Code");
                                         status=0;
                                         return false;
                                     }
                                     if($.trim(bankName)==='')
                                     {
                                         alert("Enter  bank Name");
                                         status=0
                                         return false;
                                     }
                                      if($.trim(micrCode)==='')
                                     {
                                         alert("Enter  Micr Code");
                                         status=0;
                                         return false;
                                     }
                                     if($.trim(bankAddress)==='')
                                     {
                                         alert("Enter  Bank Address");
                                         status=0;
                                         return false;
                                     }                                 
                                    return ture;
    
                                }
        </script> 
        <script>
            function showBankAccountDetailsForm()
            {
                $("#ExpertBankAccountdetails").modal('show');
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
         include('popUp/ChangePassword_view.php'); 
         include('analytics/googleAnalytics.php');
         ?>
         <script src=<?php echo base_url() . "assets/js/script.js"; ?>></script>
    </body>
</html>