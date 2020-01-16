<?php
/*
 * @author Visheshagya
 */
?>
<script type="text/javascript">
    $(document).ready(function () {
        $("#login").click(function () {
            $("#myModal").modal('show');
        });
    });

    $(document).ready(function () {
        $("#register").click(function () {
            $("#myModalRegister").modal('show');
        });
    });
</script>
<!-- to display the pop up -->
<div id="myModalRegister" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>                    
            <div class="container">
                <?php echo form_open(base_url() . 'clientHome/addClient', ['class' => 'form-horizontal']) ?>
                <fieldset>
                    <legend style="display: block;width: 100%;padding: 0;margin-bottom: 20px;
                font-size: 21px;line-height: inherit;color: #333;border: 0;
                                                border-bottom: 1px solid #e5e5e5;"> Client Register</legend>
                    <div class="alert alert-danger" id="emailMessage" style="display: none;">
                        <strong>Error! </strong>Email already exists.
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-4 control-label">Name</label>
                                <div class="col-lg-7">
                                    <?php echo form_input(['name' => 'clientName', 'type' => 'name', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'Enter Your name']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?php echo form_error('clientName'); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-4 control-label">Email</label>
                                <div class="col-lg-7">
                                    <?php echo form_input(['name' => 'clientEmailId', 'id' => 'clientEmailId', 'type' => 'email', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'abc@xyz.com',
                                        'onchange' => 'checkClientEmailId(this.value)']);
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
<?php echo form_error('clientEmailId'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="inputPassword" class="col-lg-4 control-label">Mobile</label>
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <span class="input-group-addon">+91</span> 
                                                                                
<?php echo form_input(['name' => 'clientMobileNumber', 'type' => 'text', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'Mobile Number','pattern'=>'[1-9]{1}[0-9]{9}','oninvalid'=>"setCustomValidity('Mobile Number with 6-9 and remaing 9 digit with 0-9')"]); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
<?php echo form_error('clientMobileNumber'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-8 pull-right col-lg-offset-2">

<?php echo form_submit(['name' => 'submit', 'value' => 'Sign-Up', 'class' => 'btn btn-primary']) ?>
                            </div>
                        </div>
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>


<!--End -->
<script type="text/javascript">
    function checkClientEmailId(emailid) {
        var emailid = emailid;
        $.ajax({
            url: 'Ajaxcalls/checkClientEmailId',
            type: 'POST',
            data: {'emailId': emailid},
            async: false,
            success: function (response) {
                if (response.verificationResult == "1")
                {
                    $('#clientEmailId').parent('div').addClass('has-error');
                    $("#clientEmailId").focus();

                    $("#emailMessage").show();

                } else {
                    $("#emailMessage").hide();
                }
            }
        });
    }
</script>