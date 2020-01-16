<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<meta name="description" content="Visheshagya is an ecommerce portal for search and video/audio appointment with various experts like CA,CS,CMA,Lawyers etc.">
		<meta name="keywords" content="CA,CS,CMA,Lawyers,CA in India,CS in India,CMA  in India,Lawyer in India">
		<meta name="author" content="Visheshagya">
		<link rel="icon" href="<?php echo base_url(); ?>favicon.ico" type="image/gif">
		<title>Visheshagya</title>
		<!-- Bootstrap Core CSS -->
		<link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
		<!-- Custom CSS -->
	   <!-- <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">-->
		<link href="<?php echo base_url(); ?>css/two-column.css" rel="stylesheet">
		<!--<link href="<?php echo base_url(); ?>css/normalize.css" rel="stylesheet">-->
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" type="text/css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Heebo:400,700|Oswald:400,700" type="text/css" media="all">
<!-- 		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css"> -->
		<link href="<?php echo base_url(); ?>assets/css/font.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
		
		<!--[if lt IE 9]>
				<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
		<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
		<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src=<?php echo base_url() . "js/bootstrap.min.js"; ?>></script>
		<!--<link rel="stylesheet" href="http://resources/demos/style.css">-->
		<script>
			$(function () {
				$("#consultationDateValue").datepicker({
					dateFormat: 'yy-mm-dd',
					minDate: 0
				});
			});
		</script>
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
					<a class="navbar-brand" href="<?php echo base_url(); ?>"><div class="logo"></div></a>
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

        <div class="content-full-height booking-appointment-form">
           
            <!-- body content -->
            <div class="two-column-con">
                <div class="container  booking-form-wrapper booking-instant">
                    <div id="exTab2" class="frm-detail">
                        <div class="tab-content ">
                            <div class="tab-pane downarrow active">
                                <div class="main-content detail-view">
                                    <div class="detail-view-cont">
                                        <form class="form-horizontal" action="<?php echo base_url();?>Ajaxcalls/makePaymentViaTaken" method="POST" >
                                            
                                            <fieldset>
               
                                                <div id="StepTab2">
                                                    <div class="alert alert-danger" id="errorMessageType" style="display: none;"></div>
                                                    <div class="col-md-12 form-wrapper">
                                                        <div class="alert alert-info text-center">Make Payment</div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Subject</label>  
                                                            <div class="col-md-8">
                                                            	<input   name="txn_id" type="hidden" value="<?php echo $id;?>" class="form-control input-md">
                                                                <input  readonly name="comment" type="text" value="<?php echo $comment;?>" class="form-control input-md">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Payment Amount</label>  
                                                            <div class="col-md-8">
                                                                <input id="amount" readonly name="amount" value="<?php echo $amount;?>" type="text" class="form-control input-md">
                                                            </div>
                                                        </div>
                                                        
                                                  
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="selectbasic">Payment Mode</label>
                                                            <div class="col-md-8">
                                                                
                                                                <select id="PaymentMode" name="PaymentMode" class="form-control">
                                                                    <option value="null"> Select Payment Mode</option>
                                                                    <option value="Paytm">Paytm Wallet</option>
                                                                    <option value="PayU">PayU</option>
                                                             
                                                                </select>
                                                                
                                                                
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-12 text-center">
                                                            <a role="button" class="btn" onClick="showPreviousTab(1)"><i class="fa fa-hand-o-left"></i>BACK</a>
                                                            <!-- <div class="col-md-2 text-center">                    
                                                                <a role="button" class="btn btn-sm btn-primary" onclick="showPreviousTab(1)">BACK</a>
                                                            </div> -->
                                                            <button type="submit" class="btn next-btn" value="Make Payment">Make Payment<i class="fa fa-hand-o-right"></i></button>
                                                            <!-- <div class="col-md-6 text-center">
                                                           
                                                            
                                                                <input type="submit" class="btn btn-success" value="Make Payment">

                                                                               
                                                                
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                     <div class="col-md-12 refund">
                                                    <h5><b> Refund and Cancellations</b></h5> 
                                        <ul><li>Relax! Your payment is secure with us (Visheshagya), until your appointment is successfully completed.</li>
                                            <li>In case you  cancel or reschedule your appointment 24 hours prior to the scheduled appointment, your full payment shall be refunded.</li>
                                            <li>If you cancel or reschedule your appointment after 24 hours, but 2 hours prior to your scheduled appointment, only 40% payment shall be refunded.</li>
                                            <li>No refund is applicable for cancellations initiated less than 2 hours before  the scheduled appointment.</li>
                                            <li>If for any reason, the Expert cancels the appointment, then your full payment shall be refunded.</li>
                                            <li>Feel free to contact us for any support or queries related to refund.</li>
                                            <li>Transaction charges will not be refunded in any case.</li>
                                            <li> Refund timelines are approximately 15 days from the date of cancellation of the appointment.</li>
                                        </ul>
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
        <footer>
            
              
            
            <div class="container text-center">
                <p>Copyright &copy; Visheshagya 2016</p>
            </div>
        </footer>
        <!-- script references -->
   
    
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>  
    <script src="<?php echo base_url(); ?>assets/js/matchheight.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/typeit.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-slider.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/readmore.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/site.js"></script>
    <script src=<?php echo base_url() . "assets/js/script.js"; ?>></script>
    <script src=<?php echo base_url() . "assets/js/script.js"; ?>></script>
    </body>
</html>