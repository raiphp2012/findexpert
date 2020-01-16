<?php
/*
 * @author Visheshagya
 */
?>
<!DOCTYPE HTML  PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html lang="en">
    <head>

        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <meta name="author" content="Visheshagya">
        <meta name="description" content="Visheshagya is an ecommerce portal for search and video/audio appointment with various experts like CA,CS,CMA,Lawyers etc.">
        <meta name="keywords" content="CA,CS,CMA,Lawyers,CA in India,CS in India,CMA  in India,Lawyer in India">

        <title>Client Personal Details : Visheshagya</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url() . 'css/bootstrap.css'; ?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" type="text/css">
        <!-- Custom CSS -->
        <link href="<?php echo base_url() . 'css/style.css'; ?>" rel="stylesheet">
        <link href="<?php echo base_url() . 'css/two-column.css'; ?>" rel="stylesheet">
        <link href="<?php echo base_url() . 'css/responsive.css'; ?>" rel="stylesheet">
         <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/font.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="<?php echo base_url() . 'js/jquery.min.js'; ?>"></script>

        <!-- jQuery -->
        
        
        <!--<script src="js/custom.js"></script>-->
        <link rel="stylesheet" href="css/bootstrap-datetimepicker.css">        

 
    </head>

    <body>
        <?php include('expertnav.php') ?>
        <!-- <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
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
                            <li><a href="<?php echo base_url(); ?>ExpertProfile/updateMyMember">My  Practice</a></li>
                        <?php } ?>
                        <li class="active"><a href="#">My Office <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">CLIENT<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url().'MyOffice';?>">Personal Details</a></li>
                                        <li><a href="<?php echo base_url().'MyOffice/reminder_details'; ?>">Reminder</a></li>
                                    </ul>
                                    <li><a href="<?php echo base_url().'MyOffice/getServicesDetails'; ?>">SRN</a></li>
                                    <li><a href="#">STAFF<span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?php echo base_url().'MyOffice/get_stuff_personal_details';?>">Staff Details</a></li>
                                            <li><a href="<?php echo base_url().'MyOffice/get_user_time_off'; ?>">Leave Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">CALENDAR<span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?php echo base_url().'MyOffice/calender'; ?>">My</a></li>
                                            <li><a href="#">Staff</a></li>
                                        </ul>
                                    </li>
                                </li>
                            </ul>
                        </li>
                        <li><a href ="<?php echo base_url().'ExpertAppointments'; ?>" >My Appointments</a></li>
                        <li><a href="<?php echo base_url().'ExpertDocument'; ?>">E-Lockers</a></li>
                        <li><a href="<?php echo base_url().'ExpertProfile';?>" >My Profile</a></li>
                        <li class="dropdown">
                            <a class="btn dropdown-toggle profile-img" data-toggle="dropdown" href="#">
                                <img src="<?php $profileImage=$this->session->userdata('profileImage');echo $profileImage;?>" class="img-responsive img-circle img-thumbnail" width="50px" height="10px;">
                            </a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                <li><a href="<?php echo base_url() ?>Logout" class="btn btn-danger btn-xs" role="button" data-toggle="modal">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>   
            </div>
        </nav> -->
         <div class="wide">
            <div class="container">
                <div class="page-header">
                    <h1>Edit Client</h1>
                </div>
            </div>
        </div>
        <!-- body content -->    
        <div class="content-full-height booking-appointment-form">       
            <div class="two-column-con">
                <div class="container booking-form-wrapper">
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
                                        
                                        
                                       
                                            <fieldset>
                                                <div id="personalDataTab">
                                                    
                                                    <!-- Form Name -->
                                                    <div class="alert alert-info text-center">Enter/Edit Personal Information</div>
                                                    <div class="col-md-12 form-wrapper">
                                                   
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Name</label>  
                                                            <div class="col-md-8">
                                                                <?php echo form_input(['name' => 'clientName', 'type' => 'name', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'Enter Client name','value'=>set_value('clientName', $clientEdit->clientName)]); ?>
                                                               
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Email</label>  
                                                            <div class="col-md-8">
                                                                <?php echo form_input(['name' => 'clientEmailId', 'id' => 'clientEmailId', 'type' => 'email', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'abc@xyz.com',
                                        'onchange' => 'checkClientEmailId(this.value)','value'=>set_value('clientEmailId', $clientEdit->clientEmailId)]);
                                    ?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="prependedtext">Mobile</label>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">+91</span>
                                                                    <?php echo form_input(['name' => 'clientMobileNumber', 'type' => 'text', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'Mobile Number','value'=>set_value('clientMobileNumber', $clientEdit->clientMobileNumber)]); ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <?php
                                                        //officeaotuomation code
                                                        ?>
                                                        
                                                         <div class="col-lg-12" align="center">
                        <?php
                            //print_r($SelectedServices);
                            for ($j=0; $j <count($SelectedServices) ; $j++) { 
                                $Services[$j]=$SelectedServices[$j]['serviceId'];
                            }
                           //exit();
                                for ($i=0; $i<count($ServicesList); $i++) { 
                                    ?>
                                    <div class="checkbox3 checkbox-inline" >
                                  <label>
                                  <?php 
                                  if (!empty($Services) && in_array($ServicesList[$i]->serviceId,
                                   $Services)){
                                     
                                        ?>
                                        <input type="checkbox" checked name="ServicesList[]" value="<?php echo $ServicesList[$i]->serviceId;?>"> 
                                    <?php echo $ServicesList[$i]->serviceName;?>    
                                            <?php
                                            
                                        
                                        

                                        }
                                   
                                  else{
                                    ?>
                                    <input type="checkbox" name="ServicesList[]" value="<?php echo $ServicesList[$i]->serviceId;?>"> 
                                    <?php echo $ServicesList[$i]->serviceName;?>
                                   <?php 
                                  }

                                  ?>
                                    
                                  </label>
                                </div>
                                    <?php
                                     
                                }

                            ?>
                         
                            
                        </div>
                                  
                                  <?php
                                  //officeautomation end code
                                  ?>                    
                                                <div class="col-md-12 text-center">                               
                                                    <button class="btn btn-sm btn-primary next-btn" onclick="submitForm()">Update Client Information<i class="fa fa-hand-o-right"></i></button>                                            
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
        <!-- <footer>
            <div class="container text-center">
                <p>Copyright &copy; Visheshagya 2016</p>
            </div>
        </footer> -->

        <?php
        include('analytics/googleAnalytics.php');
        include('popUp/clientChangePassword_view.php');
        ?>     
        <script src="<?php echo base_url() . 'js/bootstrap.min.js'; ?>"></script>
        <script src="<?php echo base_url() . 'js/jquery.smartmenus.min.js'; ?>"></script>
        <script src="<?php echo base_url() . 'js/jquery.smartmenus.bootstrap.min.js'; ?>"></script>
        <script src=<?php echo base_url() . "assets/js/script.js"; ?>></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("input[type=checkbox]").change(function() {
           var isNotSel = !this.checked;
           var clientId="<?php echo $clientEdit->clientId; ?>";
            $.ajax({
           url: "<?php echo base_url();?>Ajaxcalls/update_services_details",
           type: 'POST',
          dataType: 'json',
          data: {
            clientId :clientId,
            services: this.value,
            isNotSelected : isNotSel

        },
        success: function(data) {
            //alert('updated');
        },
        error: function() {
            //alert('error');
        }
    });
});
});
        </script>>
    </body>
</html>