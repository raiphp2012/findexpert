<?php
/*
 * @author Visheshagya
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        
        <meta name="author" content="Visheshagya">

        <title>Client Appointment Details : Visheshagya</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/two-column.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/responsive.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

  
        <script type="text/javascript">
            $(document).ready(function () {
                $("#ChangePassword").click(function () {

                    $("#myModalChangePassword").modal('show');
                });
            });
           
        </script>
        <style>
  .Instantly{
     margin: 5%;
    margin-left: 10%;
    width: 72%;
    height: 9%;
    text-align: center;
    color: green;
    padding-top: 1%;
    }
    
  .modal-header, .title, .close {
      background-color: #2c2c4e;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
 
            
        </style>
        
           
    </head>

    <body>
        <div class="content-full-height">
            <nav class="navbar navbar-default navbar-fixed-top">
                <!--<nav class="navbar-fixed-top">-->
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
                                    <li class="active"> <a style="cursor: pointer" href="<?php echo base_url() . 'Expertdetails'; ?>">Home</a> </li>
                                    <li> <a style="cursor: pointer" href="<?php echo base_url() . 'Expertdetails/search/1'; ?>">Expert Search</a> </li>
                                    <li > <a style="cursor: pointer" href="<?php echo base_url() . 'ClientAppointments'; ?>">My Appointments</a> </li>
                                    <li> <a style="cursor: pointer" href="<?php echo base_url() . 'ClientDocument'; ?>">My Documents</a> </li>
                                    <li> <a style="cursor: pointer" href="<?php echo base_url() . 'ClientProfile'; ?>">My Profile</a> </li>
                                        <?php include('clientProfileIconMenu.php'); ?>
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
                        <div class="tab-content" style="border:none">
                            <div class="tab-pane active">                            
                                <div class="main-content detail-view">
                                    <div class="detail-view-cont"></div>
                                </div>
                                <div>
                                    <div class="panel panel-default">
                                                                        
                                        <div class="col-md-6" style="border:1px solid lightgray;height:500px;">
                                            <div class="panel panel-default Instantly" >
                                            <h2>Get connected <strong>Instantly</strong></h2>
                                            
                                            </div>
                                  <img class="img-responsive" src="<?php echo base_url();?>images/Instant.jpeg">          
                            <a href="#<?php //echo base_url() ?> <?PHP //'Searchexpertdetails/clientBookingAppointmentInstant' ?>" class="btn btn-info" id="FinanceConsulting" 
                                    style=" font-size: 18px; margin: 5%;">
                                <span class="glyphicon glyphicon-facetime-video" style=" font-size: 18px;">
                                    
                                </span>
                            Connect with An Expert
                            </br>(9 AM to 7 PM) 
                            <span class="glyphicon glyphicon-earphone" style=" font-size: 18px;"> </span></a>
                            

                                               
                                            
                                          
                                        </div>
                                        <div class="col-md-6" style="border:1px solid lightgray; height: 500px">
                                            <div class="panel panel-default Instantly" >
                                            <h2>Schedule an <strong>appointment</strong></h2>
                                            </div>
                                            <a href="<?php echo base_url();?>Expertdetails/search/1" class="btn btn-info" id="FinanceConsulting" 
                                                        style=" font-size: 18px; margin: 5%;">
                            <span class="glyphicon glyphicon-facetime-video" style=" font-size: 18px;"></span>
                           Chartered Accountant
                            <span class="glyphicon glyphicon-earphone" style=" font-size: 18px;"> </span></a>
                            <a href="<?php echo base_url();?>Expertdetails/search/2" class="btn btn-info" style=" font-size: 18px; margin: 5%; ">
                                <span class="glyphicon glyphicon-facetime-video" style=" font-size: 18px;"></span>
                            Company Secretary 
                            <span class="glyphicon glyphicon-earphone" style=" font-size: 18px;"> </span></a>
                              <a href="<?php echo base_url();?>Expertdetails/search/4" class="btn btn-info" id="FinanceConsulting" 
                                                        style=" font-size: 18px; margin: 5%;">
                            <span class="glyphicon glyphicon-facetime-video" style=" font-size: 18px;"></span>
                            Certified Management Accountant
                            <span class="glyphicon glyphicon-earphone" style=" font-size: 18px;"> </span></a>
                            <a href="<?php echo base_url();?>Expertdetails/search/3" class="btn btn-info" style=" font-size: 18px; margin: 5%; ">
                                <span class="glyphicon glyphicon-facetime-video" 
                                      style=" font-size: 18px;"></span>
                            Lawyer 
                            <span class="glyphicon glyphicon-earphone" 
                                style=" font-size: 18px;"> </span></a> 
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>		
                </div>
            </div>
            <!-- end body content -->
        </div>
        <!-- Footer -->
        <footer>
            <div class="container text-center">
                <p>Copyright &copy; Visheshagya 2016</p>
            </div>
        </footer>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
        <?php include('ClientAppointmentCancelPopUp_view.php'); ?>

        <script>
                                                            
                                                          
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
            // echo $this->session->flashdata('expertLoginError');
            ?>
            <script>
                $("#clientChangePasswordError").modal('show');
            </script>
            <?php
        }
        
        include('popUp/clientChangePassword_view.php');
        include('analytics/googleAnalytics.php');
        ?>
     <div class="modal fade" id="offer" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="title"><img src="<?php echo base_url();?>img/TimeOffer.png" class="img-rounded" width="60px">Offer of the Month</h1></h4>
          
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <h4>Avail Special Hassle Free Income Tax Return filing offer of the Month.(9 AM to 7 PM)</h4>
          <div>
              <a href=" #<?php // echo base_url();?> <?PHP //'Expertdetails/offer' ?>" class="btn btn-info">Yes</a><a class="btn btn-info" style="margin-left: 61%;" data-dismiss="modal">Other</a>
          <div>
        </div>
        
      </div>
      
    </div>
         <script>
             $(document).ready(function(){
                 $("#offer").modal('show');
             })
             </script>
  </div>
    </body>
</html>
