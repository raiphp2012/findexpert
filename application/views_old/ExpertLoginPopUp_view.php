<?php
/*
 * @author Visheshagya
 */
include('analytics/googleAnalytics.php');
?>
<script type="text/javascript">
    $(document).ready(function () {
        $("#expertForgotPassword").click(function () {
            // $("#myModal").modal('hide');
            $("#myModalregister").modal('show');
        });
    });

    $(document).ready(function () {
        $("#login").click(function () {
            // $("#myModal").modal('hide');
            $("#myModal").modal('show');
        });
    });
</script>
<!-- to display the pop up -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>                    
            <div class="container">
                <?php echo form_open(base_url() . 'Expert/checkExpertLogin', ['class' => 'form-horizontal']) ?>
                <fieldset>
                    <legend>Login</legend>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-4 control-label">Email</label>
                                <div class="col-lg-7">
                                    <?php echo form_input(['name' => 'expertEmailId', 'type' => 'email', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'abc@xyz.com']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?php echo form_error('expertEmailId'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="inputPassword" class="col-lg-4 control-label">Password</label>
                                <div class="col-lg-7">
                                    <?php echo form_password(['name' => 'expertPassword', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'Password']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?php echo form_error('expertPassword'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-8 pull-right col-lg-offset-2">
                            <?php echo form_submit(['name' => 'submit', 'value' => 'Login', 'class' => 'btn btn-primary']) ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-8 pull-right col-lg-offset-2">
                            <a style="cursor: pointer"id="expertForgotPassword">Forgot Password</a>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $("#expertForgotPassword").click(function () {
                                        $("#myModal").modal('hide');
                                        $("#myModalForgotPassword").modal('show');
                                    });
                                });
                            </script>                    
                        </div>                       
                    </div>
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('expertForgotPassword_view.php'); ?>
<!--End -->