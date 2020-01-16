<!DOCTYPE html>
<html lang="en">
<head>
  <title>Offer of this months</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Heebo:400,700|Oswald:400,700" type="text/css" media="all">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
  <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <!-- script references -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/matchheight.js"></script>
  <script src="<?php echo base_url(); ?>js/css3-mediaqueries.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/site.js"></script>
  <style>
.container-fluid {
    padding-top: 70px;
    padding-bottom: 70px;
	border: 2px solid white;

}
.tabrow {
    border-radius: 10px;
    border-color:#000000;
	border-width:2px;
	background:#142329;
	opacity: 0.8;
	
	}
	.empty-row{
		background:#FFFFFF;
		height:10px;
	}
.row{
    text-align: left;
        color: white;
}
 h4{
margin-left: 5%;
}
.wide {
  width:100%;
  height:auto;
  background: url(<?php echo base_url().'assets/img/topBanner1.jpg'; ?>) center center repeat;
  background-size: cover;
}
.offer{
    border: 10px solid lightblue;
    
}
.table{
       border-style: hidden;

}
td{
  border-style: hidden;
}
</style>
</head>
<body style='background: url(<?php echo base_url().'assets1/img/topBanner2.jpg'; ?>) center center;background-repeat: repeat-y; ' >
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
                    <li> <a style="cursor: pointer" href="<?php echo base_url() . 'Expertdetails'; ?>">Home</a> </li>
                    <li class="active"><a href="<?php echo base_url() . 'Expertdetails/search/1'; ?>" class="active">Expert Search</a></li>
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
	
		   <!--  -------------------Offer Div------------------- ------>	

	 <div class="container-fluid bg-3 text-center"> 
    <h1 style="color:white;"><img src="<?php echo base_url();?>img/TimeOffer.png" class="img-rounded" width="60px">Offer of the Month</h1>
  <h4 style="color:white;" >Avail our special offer of the month; Get your Will drafted today hassle free.</h4>
  <div class="row">
       <div class="col-sm-12" >
           <h2>Choose your Will</h2>
       </div>
	   </div>
	   <!--  -------------------Offer Table--------------------  ----->	
<table class="table ">
    <tr class="row container-fluid">
<td>
 <table class="table ">
  <tr class="row container-fluid">
    <td class="tabrow">
    <h4>UNREGISTERED WILL</h4>
     <ul>
    <!--<li>Valid Document.</li>
    <li>On a stamp paper, duly notarized and witnessed by two persons.</li>
    <li> Easy to make.</li>-->
    <p>An unregistered will is a VALID DOCUMENT provided; <br>it is made on a stamp paper duly
    notarized and is at least witnessed by two people.</p>
    <li> Get one Video Consultation ABSOLUTELY FREE from our Law Expert .</li>
    <li>Charges:<b>&nbsp;Rs.2,449/--</b></li>
      <a href="<?php echo base_url() ?>Searchexpertdetails/clientBookingAppointmentOffer/2449/Free" class='btn btn-info'> Book an Appointment</a>
    </ul>
    </td></tr>
  <tr class="row container-fluid">
  <td class="tabrow">
  <h4 >REGISTERED WILL</h4>
    <ul>
    <p> Formal way to divide property.The Testator (person who has made a will) has to <br>visit the office of the Sub-Registrar of the said

jurisdiction to get his/her Will registered<br> along with two witnesses.</p>
    
    
    <li> Get one Video Consultation ABSOLUTELY FREE from our Law Expert.</li>
    <li>Charges:<b> &nbsp;Rs.10,999/-</b></li>
      <a href="<?php echo base_url() ?>Searchexpertdetails/clientBookingAppointmentOffer/10999/Free" class='btn btn-info'> Book an Appointment</a>
    
  </ul>
  </td></tr>
  </table>
  
</td>
<td rowspan="2"> <img src="<?php echo base_url();?>img/offer.png" class="img-responsive" style="height: 90%;"></td>
</tr>
  </table>
 
</div>
   <?php include("popUp/ClientLogin_view.php");?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <script src="<?php echo base_url(); ?>assets1/js/bootstrap.min.js"></script>  
    <script src="<?php echo base_url(); ?>assets1/js/matchheight.js"></script>
    <script src="<?php echo base_url(); ?>assets1/js/typeit.min.js"></script>
    <script src="<?php echo base_url(); ?>assets1/js/bootstrap-slider.js"></script>
    <script src="<?php echo base_url(); ?>assets1/js/readmore.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/site.js"></script>                  
</body>
</html>