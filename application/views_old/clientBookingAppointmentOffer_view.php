<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Visheshagya">
        <title>Visheshagya</title>
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/two-column.css" rel="stylesheet">
        
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Heebo:400,700|Oswald:400,700" type="text/css" media="all">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">
        
        <!--[if lt IE 9]>
                <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
        <base href="/"/>
       
        <script>
            $(function () {
                $("#consultationDateValue").datepicker({
                    dateFormat: 'yy-mm-dd',
                    minDate: 0
                });
            });
        </script>
        <style>
              body{
       background-color:none;
        }
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
                    <a class="navbar-brand" href="<?php echo base_url(); ?>"><div class="logo"></div>
                    <div class="logo_text">TAX & LEGAL SERVICES REDEFINED</div></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                    <li ><a href="<?php echo base_url() .'Expertdetails'; ?>" >Home</a></li>   
                    <li class="active"><a href="<?php echo base_url() .'Expertdetails/search/1'; ?>" >Expert Search</a></li>
                        <li><a  
                            <?php
                            if (empty($this->session->userdata('clientId'))) {
                                ?> 
                                    role="button"
                                    class="launch-modal"
                                    href="#"  
                                    data-modal-id="modal-login" data-modal-value="<?php echo base_url() . 'ClientAppointments'; ?>"
                                <?php
                                }
                                if (!empty($this->session->userdata('clientId'))) {
                                    ?>
                                    href="<?php echo base_url() . 'ClientAppointments'; ?>"
                                    <?php
                                }
                                ?>
                                > My Appointment </a></li>
                                <li> <a  <?php
                                    if (empty($this->session->userdata('clientId'))) {
                                        ?> 
                                            role="button"
                                            class="launch-modal"
                                            href="#"  
                                            data-modal-id="modal-login" data-modal-value="<?php echo base_url() . 'ClientDocument'; ?>"
                                        <?php
                                        }
                                        if (!empty($this->session->userdata('clientId'))) {
                                            ?>
                                            href="<?php echo base_url() . 'ClientDocument'; ?>"
                                            <?php
                                        }
                                        ?>
                                        >E-Lockers</a></li>
                                        <li><a  <?php
                                            if (empty($this->session->userdata('clientId'))) {
                                                ?> 
                                                    role="button"
                                                    class="launch-modal"
                                                    href="#"  
                                                    data-modal-id="modal-login" data-modal-value="<?php echo base_url() . 'ClientProfile'; ?>"
                                                <?php
                                                }
                                                if (!empty($this->session->userdata('clientId'))) {
                                                    ?>
                                                    href="<?php echo base_url() . 'ClientProfile'; ?>"
                                                    <?php
                                                }
                                                ?>
                                                >My Profile</a></li>
                        <li><?php
                            if (empty($this->session->userdata('clientId'))) {
                                ?> 
                                <a  role="button"
                                    class="launch-modal"
                                    href="#"  
                                    data-modal-id="modal-login" data-modal-value="<?php echo base_url(uri_string()); ?>">Login</a>
                                    <?php }
                                    
                            if(!empty($this->session->userdata('clientId')))
                            {
                            ?>
                            <a href="<?php echo base_url() ?>ClientHome/logout">Logout</a> 
                            <?php
                            }
                            ?></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
        <div class="wide">
            <div class="container">
                <div class="page-header">
                    <h1> Appointment Booking </h1>
                </div>
            </div>
        </div>
        <div class="content-full-height">
            
            <!-- body content -->
            <div class="two-column-con">
                <div class="container">
                    <div id="exTab2" class="frm-detail">
                        <div class="tab-content ">
                            <div class="tab-pane downarrow active">
                               
                                <ul class="nav nav-tabs">
                                    <li id="Step1" class="active">
                                        <a  href="#"  data-toggle="tab">Step1</a>
                                    </li>
                                    <li id="Step2">
                                        <a  href="#"  data-toggle="tab">Step2</a>
                                    </li>
                                   
                                </ul>
                                <div class="main-content detail-view">
                                    <div class="detail-view-cont">
                                        <form class="form-horizontal" action="<?php echo base_url() . 'Ajaxcalls/saveAppointmentInstantDetails'; ?>" method="POST" onSubmit="return checkConsultationType();">
                                            <input type="hidden" name="expertName" value="<?php echo urldecode($expertName); ?>">
                                             <?php
                                                    function sentence_cap($impexp, $sentence_split) {
                                                     $textbad=explode($impexp, $sentence_split);
                                                    $newtext = array();
                                                    foreach ($textbad as $sentence) {
                                                        $sentencegood=ucfirst(strtolower($sentence));
                                                        $newtext[] = $sentencegood;
                                                        }
                                                         $textgood = implode($impexp, $newtext);
                                                             return $textgood;
                                                        }
                                                          $displayExpertName=sentence_cap(" ",urldecode($expertName));
                                                    ?>
                                            <fieldset>
                                                <div id="StepTab1">
                                                    <div class="alert alert-info text-center">Booking Appointment with Expert: <b>
                                                            Tax & Legal Expert</b>
                                                    </div>
                                                    <div class="alert alert-danger" id="errorMessageQuery" style="display: none;"></div>
                                                    <input type="hidden" id='expertId' name="expertId"value="<?php echo $expertId; ?>">
                                                    <input type="hidden" id='expertName' name="expertName" value="<?php echo $expertName; ?>">
                                                    <input type="hidden" id='type' name="type" value="<?php echo $type; ?>">
                                                    <div class="col-md-10 col-md-offset-1 frm-bdr">
                                                        <div class="form-group">
                                                            <center>
                                                                <textarea name="appointmentNotes" id="appointmentNotes" maxlength="2000"  style="background:white; border-radius:5px;" rows="5" cols="50" class="ask-questn-text" placeholder="Please write your query here for better understanding of expert"></textarea>
                                                            </center>
                                                        </div>
                                                        <!--<div class="col-md-12 text-center form-group">-->
                                                        <div class="col-md-9 col-md-offset-3 text-center">
                                                            <div class="col-md-2" >                    
                                                                <a role="button" class="btn btn-sm btn-primary" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">BACK</a>
                                                            </div>
                                                            <div class="col-md-9" >  
                                                                 <?php 
                                                          
                                                             if(empty($this->session->userdata('clientId')))
                                                             {
                                                                ?>
                                                                 <a role="button" class="launch-modal" href="#" style="background-color:#ed1c24;border-radius: 0 !important;
    box-shadow: none !important;padding: 5px 10px;font-size: 14px;line-height: 1.5;color: white; font-weight: normal;" data-modal-id="modal-login" data-modal-value="<?php  echo base_url(uri_string()); ?>"> Login to continue </a>
                                                             <?php   

                                                            } 
                                                              if(!empty($this->session->userdata('clientId')))
                                                             {
                                                                ?>
                                                                  <a role="button" class="btn btn-sm btn-primary" onclick="showNextTab(1)">NEXT</a>

                                                              <?php
                                                             }   
                                                            ?> 
                                                         </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div id="StepTab2" style="display: none;" >
                                                    <!--<div class="alert alert-info text-center">Expert:<?php echo urldecode($expertName); ?></div>-->
                                                   
                                                    <div class="alert alert-info text-center">Booking Appointment with Expert: <b><?php echo 'Tax & Legal Expert'; ?></b></div>
                                                    <div class="alert alert-danger" id="errorMessageType" style="display: none;"></div>
                                                    <div class="col-md-10 col-md-offset-1 frm-bdr">
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Appointment Date</label>  
                                                            <div class="col-md-4">
                                                                <input id="appointmentDate" readonly name="appointmentDate" value="<?php echo date("Y-m-d"); ?>" type="text" class="form-control input-md">
                                                            </div>
                                                        </div>
                                                        <div class="form-group hidden">
                                                            <label class="col-md-4 control-label" for="textinput">Time Slot</label> 
                                                            <?php
                                                             date_default_timezone_set('Asia/Kolkata');
                                                           
 ?>
                                                            <div class="col-md-4">
                                                                <input id="appointmentStartTime" readonly name="appointmentStartTime" type="text" value="<?php echo  date("H:i", strtotime('+15 minutes', strtotime(date('H:i')))) ?>" class="form-control input-md">
                                                            </div>
                                                        </div>
                                                        <input type='hidden' name='chagre' id="chagre" value="<?php echo $fees; ?>">
                                                        
                                                         
                         
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="selectbasic">Consultation Type</label>
                                                            <div class="col-md-4">
                                                                <select id="categoryId" name="categoryId" class="form-control" onChange="fetchConsultationTypes(this.value)">
                                                                    <option value="0">--SELECT--</option>
                                                                    <?php
                                                                    foreach ($consultationtypes as $consultationtypes) {
                                                                        if ($consultationtypes->consultationTypeId != 3) {
                                                                            ?>
                                                                            <option value=<?php echo $consultationtypes->consultationTypeId; ?>><?php echo $consultationtypes->consultationTypeName; ?>
                                                                            </option>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                         <div class="form-group" id="fetchConsultationDiv">
                                                            <label class="col-md-4 control-label" for="selectbasic">Consultation  Fees</label>
                                                            <div class="col-md-4">
                                                                
                                                                <input type="text" readonly  id="fetchConsultationAmount" name="ConsultationFees" readonly id="ConsultationFees" class="form-control">
                                                                
                                                                <input type="hidden" name="amountPaid" id="amount" >
                                                                
                                                            </div>
                                                        </div> 
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="selectbasic">Payment Mode</label>
                                                            <div class="col-md-4">
                                                                
                                                                <select id="PaymentMode" name="PaymentMode" class="form-control">
                                                                    <option value="null"> Select Payment Mode</option>
                                                                    <option value="Paytm">Paytm Wallet</option>
                                                                    <option value="PayU">PayU</option>
                                                             
                                                                </select>
                                                                
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 col-md-offset-3 text-center">
                                                            <div class="col-md-2 text-center">                    
                                                                <a role="button" class="btn btn-sm btn-primary" onClick="showPreviousTab(1)">BACK</a>
                                                            </div>
                                                            <div class="col-md-6 text-center">              
                                                                <input type="submit" class="btn btn-success" value="Book Appointment">
                                                            </div>
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
        <footer id="footer" class="fullWidthSection greyColor">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <ul class="list-inline social-buttons">
                            <li>Follow Us On:</li>
                            <li><a href="https://www.facebook.com/visheshagya/">
                            <i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://twitter.com/Visheshagya_IN">
                            <i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://in.linkedin.com/in/visheshagya-india-a35780117"><i class="fa fa-linkedin"></i></a></li>
                        </ul>

                    </div>
                    <div class="col-md-6 col-sm-6 textright">
                        Visheshagya.in  |  <a href="">Terms of Use</a> | <a href="">Privacy Policy</a>
                    </div>
                </div>
            </div>
        </footer>
        <?php include("popUp/ClientLogin_view.php");?>
          <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/matchheight.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/typeit.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-slider.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/readmore.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/site.js"></script>

        <script>
            
           
            var data = [];
            $("#fetchConsultationAmount").val($("#chagre").val());
            $("#amount").val($("#chagre").val());
             function showNextTab(id)
            {
                data = {"consultationDate": $("#consultationDateValue").val(), "slots": $("#slots option:selected").val()};
                $("#errorMessageType2").hide();
                $("#errorMessageType2").empty();
               
                  if(id==1)
                    {
                        $("#errorMessageQuery").hide();
                        if ($("#appointmentNotes").val() == '')
                        {
                            $("#errorMessageQuery").append("<strong>Error! </strong>Write your Query.");
                            $('#appointmentNotes').parent('div').addClass('has-error');
                            $("#appointmentNotes").focus();
                            $("#errorMessageQuery").show();
                              
                                $("#Step" + id).addClass('active');
                                $("#StepTab" +id).show();
                        }
                        else
                        {
                        $("#StepTab" + id).hide();
                        $("#Step" + id).removeClass('active');
                        $("#Step" + (id + 1)).addClass('active');
                        $("#StepTab" + (id + 1)).show(); 
                        }

                    }
                    else{

                    $("#StepTab" + id).hide();
                    $("#Step" + id).removeClass('active');
                    $("#Step" + (id + 1)).addClass('active');
                    $("#StepTab" + (id + 1)).show();
                    }
               
            }
            function checkConsultationType()
            {
                $("#errorMessageType").hide();
                $("#errorMessageType").empty();
                if ($("#categoryId").val() == 0)
                {
                    $("#errorMessageType").append("<strong>Error! </strong>Select Consultation Type.");
                    $('#categoryId').parent('div').addClass('has-error');
                    $("#categoryId").focus();
                    $("#errorMessageType").show();
                    return false;
                }
                else if ($("#PaymentMode").val() == 'null')
                {
                    $("#errorMessageType").append("<strong>Error! </strong>Select Payment Mode.");
                    $('#PaymentMode').parent('div').addClass('has-error');
                    $("#PaymentMode").focus();
                    $("#errorMessageType").show();
                    return false;
                }
                else
                {
                  return true;   
                }  
               
            }
            function showPreviousTab(id)
            {
                $("#Step" + parseInt(id + 1)).removeClass('active');
                $("#Step" + parseInt(id - 1)).removeClass('active');
                $("#StepTab" + parseInt(id + 1)).hide();
                $("#StepTab" + parseInt(id - 1)).hide();
                $("#StepTab" + parseInt(id)).show();
                $("#Step" + id).addClass('active');
            }
            //  To fetch the fetchConsultationFees details based on the ConsultationTypesid
           
           
           /*function fetchPersonCategory(value)
           {
               $("#fetchConsultationDiv").hide();
                if( value== "Income Tax Return")
               {
                  $("#fetchConsultationAmount").val($("#chagre").val());
                   var finalAmount = parseInt($("#chagre").val());
                          $("#amount").val(finalAmount);
                    $("#fetchConsultationDiv").show();
                   
               }   
               else{
                   $("#fetchConsultationAmount").val("Free");
                   $("#amount").val(0);
                    $("#fetchConsultationDiv").show();
               }
           }
*/
        </script>
        <?php include('analytics/googleAnalytics.php'); ?>
    </body>
</html>