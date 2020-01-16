<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('manage/head.php'); ?>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                    	GPI Login
                    </div>
                    <div class="panel-body">
                    	<h3 class="panel-title">Please Sign In</h3>
						<?php if($errMsg){?>
							<span class="common-error"><?php echo $errMsg;?></span>
						<?php } ?>
                        <form role="form" id="frmLogin" name="frmLogin" method="post" action="<?php echo base_url('manage/admin/authenticate');?>">
                            <fieldset>
                            
                            <p class="error"><?php echo form_error('username'); ?></p>
                            <div class="input-group"> <span class="input-group-addon"> <i class="fa  fa-user"></i> </span>
                   				<input class="form-control" placeholder="User Name" name="username" value="<?php echo set_value('username'); ?>" type="username" autofocus>
                 			 </div>
                            
                            <p>&nbsp;</p>
                              
                            <p class="error"><?php echo form_error('password'); ?></p>
                            <div class="input-group"> <span class="input-group-addon"> <i class="fa  fa-key"></i> </span>
                   				<input class="form-control" placeholder="Password" name="password" value="<?php echo set_value('password'); ?>" type="password">
                 			 </div>  
                             
                             <p>&nbsp;</p>
                               
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="submit" value="Login" class="btn btn-lg btn-login btn-block" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
