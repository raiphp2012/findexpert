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
  <link rel="icon" href="<?php echo base_url(); ?>favicon.ico" type="image/gif">
  <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
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
  background: url(<?php echo base_url() . 'assets/img/topBanner1.jpg'; ?>) center center repeat;
  background-size: cover;
}
.offer{
    border: 10px solid lightblue;
    
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
                    <li ><a href="<?php echo base_url() .'Expertdetails'; ?>" >Home</a></li>   
                    <li ><a href="<?php echo base_url() .'Expertdetails/search/1'; ?>" >Expert Search</a></li>
                      
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
	<!--  -------------------Offer Div------------------------->	

	 <div class="container-fluid bg-3 text-center"> 
    <h1 style="color: white;"><img src="<?php echo base_url();?>img/TimeOffer.png" class="img-rounded" width="60px">Offer of the Month</h1>
  <h4 style="color: white;">Avail Special Hassle Free Income Tax Return filing offer of the month.</h4>
  <div class="row">
       <div class="col-sm-12" >
           <h2>Choose Your Income Tax Return form(ITR)</h2>
       </div>
	   </div>
	   <!--  -------------------Offer Table------------------------->	
<table style="width:100%" align="center">
 <tr class="row container-fluid">
 
 	   <!--  -------------------Offer 1------------------------->	
<td class="tabrow">

    <div>
	  <h4>ITR - 1 (SAHAJ)</h4>

             <ul>
		       <li>Income from Salary/Pension.</li>
		       <li>Income from One House Property.</li>
		       <li>Income from Other Sources(Interest Only).</li>
		       <li>Get One Video Consultation ABSOLUTELY FREE from our Tax expert.</li>
		       <li>Charges:<b>&nbsp;<i class="fa fa-inr" aria-hidden="true"></i>. 1,099/-</b></li></br><br>
               
		<a href="<?php echo base_url() ?>Searchexpertdetails/clientBookingAppointmentOffer/1099/Free" class='btn btn-info'> Book an Appointment</a>
		
	         </ul>  
    </div>
</td>
		   <!--  -------------------Offer 2------------------------->	
<td class="tabrow">
    <div>
		 <h4 >ITR - 2</h4>
		 <ul>
		 <li> Income from Salary/Pension.</li>
		 <li> Income from One House Property.</li>
		 <li> Income from Other Sources.</li>
		 <li> Income from Capital Gains.</li>
		 <li> Get Two Video Consultation ABSOLUTELY FREE from our Tax expert.</li>
		 <li>Charges:<b> &nbsp;<i class="fa fa-inr" aria-hidden="true"></i>. 1,499/-</b></li></br><br>
    
		 <a href="<?php echo base_url() ?>Searchexpertdetails/clientBookingAppointmentOffer/1499/Free" class='btn btn-info'> Book an Appointment</a>
		
	</ul>
    </div>
	</td>

		   <!--  -------------------Offer 3------------------------->	

	<td class="tabrow">
	<div>
		<h4>ITR-2A </h4>
		<ul>
		<li> Income from Salary/Pension.</li>
		<li> Income from One House Property(More than One) .</li>
		<li> Income from Other Sources.</li>
		<li> Get Two Video Consultation  ABSOLUTELY FREE from our Tax expert.</li>
		
		<li>Charges:<b> &nbsp;<i class="fa fa-inr" aria-hidden="true"></i>. 1499/-</b></li>
    </br><br>
		<a href="<?php echo base_url() ?>Searchexpertdetails/clientBookingAppointmentOffer/1499/Free" class='btn btn-info'> Book an Appointment</a>
	</ul>
    </div>
	</td>
  </tr>
  <tr class="empty-row"></tr>
  </table>
 <div align="center">
  <table>
  <tr class="row container-fluid">
  	   <!--  -------------------Offer 4------------------------->	

	  <td class="tabrow ">
      <div >
    <h4>ITR -4</h4>
    <ul>
    <li>Income from Salary/Pension.</li>
    <li>Income from One House Property.</li>
    <li>Income from Business and Profession.</li>
    <li>Income from Capital Gains.</li>
    <li>Income from Other Sources.</li>
    <li>Get FIVE Video Consultation ABSOLUTELY FREE from our Tax expert.</li>
    
    <li>Charges:<b> &nbsp;<i class="fa fa-inr" aria-hidden="true"></i>. 4,999/-</b></li>
    </br>
    <a href="<?php echo base_url() ?>Searchexpertdetails/clientBookingAppointmentOffer/4999/Free" class='btn btn-info'> Book an Appointment</a>
  </ul>
    </div>
	</td>
	
		   <!--  -------------------Offer 5------------------------->	

	<td class="tabrow">
       <div >
		<h4>ITR- 4S(SUGAM)</h4>
		<ul>
		<li>Income from Salary/Pension. </li>
		<li>Income from One House Property.</li>
		<li>Income from Business (Presumptive Business).</li>
		<li>Get THREE Video Consultation ABSOLUTELY FREE from our Tax expert.</li>
		
		<li>Charges:<b> &nbsp;<i class="fa fa-inr" aria-hidden="true"></i>. 2,499/-</b></li>
    </br>
    </br>
		<a href="<?php echo base_url() ?>Searchexpertdetails/clientBookingAppointmentOffer/2499/Free" class='btn btn-info'> Book an Appointment</a>
	</ul>
    </div>
	</td>
  </tr>

</table>
 </div>
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