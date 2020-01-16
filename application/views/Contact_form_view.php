
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="description" content="Visheshagya, Services Redefined, is an online e-Commerce portal which acts as an aggregator to connect experts like CA, CS, CMA, Lawyers etc with potential customers.The beauty of the portal is that it not only allows you to search an expert but also allows you to book a real 
  time appointment with that expert and do video and audio consultancy with that expert.Free E - Locker and E - diary facility is available to all.">
  <meta name="keywords" content="CA,CS,CMA,Lawyers,CA in India,CS in India,CMA  in India,Lawyer in India">
  <meta name="author" content="Visheshagya">
  <title>Visheshagya</title>

   <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Heebo:400,700|Oswald:400,700" type="text/css" media="all">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/animate.css" type="text/css">
  
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/bootstrap.min.css" type="text/css">
   
  <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
 <link href="<?php echo  base_url();?>assets1/css/styles.css" rel="stylesheet" type="text/css" media="all" />

  
  
  
  <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  

  
 

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
        
        <a class="navbar-brand" href="<?php echo base_url().'ClientHome';?>"><div class="logo"></div><div class="logo_text">Tax & Legal Services Redefined</div></a>
       
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          
            <li><a href="<?php echo base_url().'ClientHome';?>">Home</a></li>
          <li><a href="<?php echo base_url();?>Expert">For Experts</a></li>
          
          
          
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
  <div class="wide">
    <div class="container">
      <div class="page-header">
      <h1>Contact Us</h1>
        
      </div>
    </div>
  </div>
 
  <!--  Layout container START -->
  <div class="container">   
    <div class="row table-row">
      <!-- Sidebar START -->
      <div class="col-xs-12 col-sm-4 sidenavDark ">    
        <div class="rowGap">&nbsp;</div>


       
        <div class="row">                
          <div class="col-xs-12 text-center">
            <h2 class="expertProfileName">Visheshagya Services Pvt Ltd.</h2>
            <h4 class="expertProfileTitle">E-Mail: support@visheshagya.in

            </h4>
            <h4 class="expertProfileTitle">Contact No.: 786-2800-600</h4>
            <div class="expertProfileVerified">
              
              

              <h4>Head Office(Gurgaon):</h4>
              <h5>Visheshagya Services Pvt. Ltd<br>

             C-1291, Sushant Lok-I

             Gurgaon- 122009<br>

            </h5>
           
            </div>            
            
            
            
                      

          </div>
        </div>
        
      </div>   <!-- Sidebar END -->
      
      <!-- Main Area Start -->
      <div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 well">
            <?php $attributes = array("class" => "form-horizontal", "name" => "contactform");
            echo form_open("contactform/index", $attributes);?>
            <fieldset>
            <legend>Contact Form</legend>
            <div class="form-group">
                <div class="col-md-12">
                    <label for="name" class="control-label">Name</label>
                </div>
                <div class="col-md-12">
                    <input class="form-control" name="name" placeholder="Your Full Name" type="text" value="<?php echo set_value('name'); ?>" />
                    <span class="text-danger"><?php echo form_error('name'); ?></span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <label for="email" class="control-label">Email ID</label>
                </div>
                <div class="col-md-12">
                    <input class="form-control" name="email" placeholder="Your Email ID" type="text" value="<?php echo set_value('email'); ?>" />
                    <span class="text-danger"><?php echo form_error('email'); ?></span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <label for="subject" class="control-label">Subject</label>
                </div>
                <div class="col-md-12">
                    <input class="form-control" name="subject" placeholder="Your Subject" type="text" value="<?php echo set_value('subject'); ?>" />
                    <span class="text-danger"><?php echo form_error('subject'); ?></span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <label for="message" class="control-label">Message</label>
                </div>
                <div class="col-md-12">
                    <textarea class="form-control" name="message" rows="4" placeholder="Your Message"><?php echo set_value('message'); ?></textarea>
                    <span class="text-danger"><?php echo form_error('message'); ?></span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <input name="submit" type="submit" class="btn btn-primary" value="Send" />
                </div>
            </div>
            </fieldset>
            <?php echo form_close(); ?>
            <?php echo $this->session->flashdata('msg'); ?>
        </div>
    </div>
</div>
    </div>
  </div> <!--  Layout container END -->
  

      
  
 
          <?php include('loginFooter.php') ?>

<div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> <span id="frmLoginTitle">Login</span></h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <div id="frmLogin">
            <form role="form" action="<?php echo base_url();?>clientHome/clientLogin" method="post">
              <div class="form-group">
                <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
                <input type="text" class="form-control" id="usrname" name="clientEmailId" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                <input type="password" class="form-control" id="psw" name="clientPassword" placeholder="Enter password">
              </div>
              <div class="loginFormPopup checkbox">
                <label>
                  <input type="checkbox" value="">
                  <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                  Remember me
                </label>
              </div>
              <button type="submit" name="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
            </form>
          </div>
          <!--forgot -->


          <!--forgot end -->
           <div id="frmRegister">
            
            <?php echo form_open(base_url() . 'clientHome/addClient', ['class' => 'form-horizontal']) ?>

              <div class="form-group">
                <label for="usrname"><i class="fa fa-user" aria-hidden="true"></i> Full Name</label>
                <?php echo form_input(['name' => 'clientName', 'type' => 'name', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'Enter Your name']); ?>
              </div>
              <div class="form-group">
                <label for="email"><i class="fa fa-envelope" aria-hidden="true"></i> Email Id</label>
               <?php echo form_input(['name' => 'clientEmailId', 'id' => 'clientEmailId', 'type' => 'email', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'abc@xyz.com',
                                        'onchange' => 'checkClientEmailId(this.value)']);
                                    ?>
                                      </div>
                <div class="form-group">
                <label for="phone"><i class="glyphicon glyphicon-phone" aria-hidden="true"></i> Mobile No.</label>
               
<?php echo form_input(['name' => 'clientMobileNumber', 'type' => 'text', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'Mobile Number']); ?>
              </div>

              <div class="loginFormPopup checkbox">
                <label>
                  <input type="checkbox" value="">
                  <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                  I agree with the <a href="<?= base_url(); ?>ExpertTermsAndCondition" title="Click here to read Terms and Conditions">terms and conditions</a> for Registration.
                </label>
              </div>

              
              <?php echo form_submit(['name' => 'submit', 'value' => 'Sign-Up', 'class' => 'btn btn-success btn-block']) ?>
            </form>

          </div>
        </div>
        <div class="modal-footer">
          
         
 
  <?php 
            
            echo '<a href="'.$authUrl.'"><img src="'.base_url().'assets/images/flogin.png" alt=""/></a>';
            ?>
 
  


          <div id="frmLoginFooter">
            <p>New to Visheshagya? <a id="btnShowSignup" href="#">Sign Up</a></p>
          </div>
          <div id="frmRegisterFooter">
            <p>Already a member? <a id="btnShowLogin" href="#">Login</a></p>
          </div>
          <div id="frmForgotFooter">
          <p>Forgot <a id="btnShowForgot" href="#">Password?</a></p>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- script references -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    
    <script src="<?php echo base_url(); ?>assets1/js/bootstrap.min.js"></script>  
    <script src="<?php echo base_url(); ?>assets1/js/matchheight.js"></script>
    <script src="<?php echo base_url(); ?>assets1/js/typeit.min.js"></script>
    <script src="<?php echo base_url(); ?>assets1/js/bootstrap-slider.js"></script>
    <script src="<?php echo base_url(); ?>assets1/js/readmore.min.js"></script>
    <script src="<?php echo base_url(); ?>assets1/js/site.js"></script>
   

  <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5785c7a1c287f8ca2cbd0e66/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>
</html>