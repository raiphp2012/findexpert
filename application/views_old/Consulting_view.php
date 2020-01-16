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

        <title>Expert Consultation Details : Visheshagya</title>

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
                        <a class="navbar-brand" href="<?php echo base_url(); ?>Expert/mainexpertHome"><div class="logo"></div>
                         <div class="logo_text">TAX & LEGAL SERVICES REDEFINED</div></a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            
                            <div class="top-nav-tab downarrow">
                                <ul class="nav nav-tabs">
                                <?php if($this->session->userdata('parent_id')==0){ ?>
                                     <li><a href="<?php echo base_url(); ?>ExpertProfile/updateMyMember">
                                     My  Practice</a></li>
                                    
                                    <?php } ?>
                                    <li><a href = "<?php echo base_url().'MyOffice'; ?>">My Office</a></li>
                                    <li><a href ="<?php echo base_url().'ExpertAppointments'; ?>" >My Appointments</a></li>
                                    <li><a href="<?php echo base_url().'ExpertDocument'; ?>">E-Lockers</a></li>
                                    <li><a href="<?php echo base_url().'ExpertProfile';?>" >My Profile</a></li>
                                    <li>
                                <div class="dropdown">
                                    <!--to display profile images-->
                                    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
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
                            <li><a style="cursor: pointer"onclick="location.href = '../ExpertProfile';" data-toggle="tab">Personal</a></li>
                            <?php if($this->session->userdata('parent_id')==0){?> 
                            <li><a style="cursor: pointer"onclick="location.href = '../ExpertProfile/professional';" data-toggle="tab">Professional</a></li>
                            <li class="active"><a style="cursor: pointer"onclick="location.href = '../ExpertProfile/consulting';" data-toggle="tab">Consulting</a></li>
                            <?php } ?>
                            <li><a style="cursor: pointer"onclick="location.href = '../ExpertProfile/calendar';" data-toggle="tab">Calendar</a></li>
                            <?php if($this->session->userdata('parent_id')==0){?> 
                            <li><a style="cursor: pointer"onclick="location.href = '../ExpertProfile/accounts';" data-toggle="tab">Accounts</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php
                    if (null != $this->session->flashdata('consultationDetailsUpdateSatatus')) {
                        ?>
                        <div class="alert alert-success">
                            <strong>Success!</strong><?php echo $this->session->flashdata('consultationDetailsUpdateSatatus'); ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="tab-content ">
                        <div class="tab-pane active">                            
                            <div class="main-content detail-view">
                                <div class="detail-view-cont">
                                            <form class="form-horizontal" method="POST" action="../ExpertProfile/updateConsultationDetails" id="expertSignupForm" name="expertSignupForm">
                                                <div class="row pd-wrapper">
                                                    <div class="col-md-12 pd-input-wrapper">
                                                <table class="table"> 
                                                    <thead>
                                                        <tr>
                                                            <th>Sl. No.</th> 
                                                            <th>Consultation Type</th> 
                                                            <th>Fees</th> 
                                                            <th>Active</th> 
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php {
                                                            $i = 1;
                                                            if (is_array($consultationTypes)) {
                                                                foreach ($consultationTypes as $type) {
                                                                    ?>
                                                                    <tr>
                                                                        <td scope="row"><?php echo $i; ?></td>
                                                                <input type="hidden" name="consultationTypeId[]" value="<?php echo $type->consultationTypeId; ?>">
                                                                <td><?php echo $type->consultationTypeName; ?></td>
                                                                <?php
                                                                if (isset($type->consultationFees)) {
                                                                    ?>
                                                                    <td><input id="consultationFees" name="consultationFees[]" class="form-control" type="number" value="<?php echo $type->consultationFees ?>"></td>
                                                                <?php } else { ?>
                                                                    <td><input id="consultationFees" name="consultationFees[]" class="form-control" type="number"></td>
                                                                    <?php
                                                                }
                                                                if (isset($type->consultationActiveStatus)) {
                                                                    if ($type->consultationActiveStatus == 1) {
                                                                        ?>
                                                                        <td><input name="isActive<?php echo $i - 1; ?>"type="checkbox" checked ></td>
                                                                    <?php } else { ?>
                                                                        <td><input name="isActive<?php echo $i - 1; ?>" type="checkbox" ></td>
                                                                        <?php
                                                                    }
                                                                } else {
                                                                    ?>
                                                                    <td><input name="isActive<?php echo $i - 1; ?>" type="checkbox" ></td>
                                                                    <?php
                                                                }
                                                                ?>
                                                                </tr>
                                                                <?php
                                                                $i++;
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                    </tbody> 
                                                </table>
                                                <div class="col-md-12 pd-submit">                               
                                                <button class="pd-btn pd-update" onclick="submitForm()">Update Consultation Details</button>                                            
                                            </div>
                                                <div class="col-md-12 guidelines">
                                                   <h4><b> Payment Guidelines for Experts</b></h4>
                                                   <ul>
                                                       <li>Your payment will be credited in your account, only after successful completion of your appointment within 7 working days.</li>
                                                       <li>If due to any emergency, you are unable to keep  the appointment, then you need to  arrange for one of your experts to take the call or contact Visheshagya for assistance by clicking the ‘Contact Us’ icon on the home page.</li>
                                                       <li>Your Consultation Fees should be inclusive of all taxes i.e service tax etc.</li>
                                                       <li>If you are unable to keep your appointment, or if you cancel the appointment less than 2 hours prior to the scheduled appointment, you are liable to provide a free consultation in lieu of the cancelled appointment for any further release of payment.</li>
                                                      
                                                   </ul>
                                        </div>
                                                </div>
                                                </div>
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
        <script src="../js/bootstrap.min.js"></script>
        <script>
                                                    function submitForm()
                                                    {
                                                        $("#expertSignupForm").submit();
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