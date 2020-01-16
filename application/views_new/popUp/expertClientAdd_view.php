<?php
/*
 * @author Visheshagya
 */
?>
<?php
        include('popUp/expertClientAdd_view.php');
         ?>

          <script type="text/javascript">
            $(document).ready(function () {
                $("#expertClientAdd").click(function () {
                    $("#expertClientAddModal").modal('show');
                });
            });
        </script>
<!-- to display the pop up -->
<div id="expertClientAddModal" class="modal fade modal-login">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4> Add Client</h4>
            </div>                    
            <div class="modal-body">
                <?php echo form_open(base_url() . 'MyOffice/addClient', ['class' => 'form-horizontal']) ?>
                <?php echo form_hidden('expertId', $this->session->userdata('expertId')); ?>
                <fieldset>
                    <div class="alert alert-danger" id="emailMessage" style="display: none;">
                        <strong>Error! </strong>Email already exists.
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                              <!--   <label for="inputEmail" class="col-lg-4 control-label">Name</label>
                                <div class="col-lg-7"> -->
                                    <?php echo form_input(['name' => 'clientName', 'type' => 'name', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'Enter Client name']); ?>
                                <!-- </div> -->
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?php echo form_error('clientName'); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <!-- <label for="inputEmail" class="col-lg-4 control-label">Email</label>
                                <div class="col-lg-7"> -->
                                    <?php echo form_input(['name' => 'clientEmailId', 'id' => 'clientEmailId', 'type' => 'email', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'abc@xyz.com',
                                        'onchange' => 'checkClientEmailId(this.value)']);
                                    ?>
                             <!--    </div> -->
                            </div>
                        </div>
                        <div class="col-lg-6">
<?php echo form_error('clientEmailId'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                             <!--    <label for="inputPassword" class="col-lg-4 control-label">Mobile</label>
                                <div class="col-md-5"> -->
                                    <div class="input-group">
                                        <span class="input-group-addon" style="border-radius:0;">+91</span> 
                                                                                
<?php echo form_input(['name' => 'clientMobileNumber', 'type' => 'text', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'Mobile Number']); ?>
                                    <!-- </div> -->
                                </div>
                            </div>
                            <div class="col-lg-6">
<?php echo form_error('clientMobileNumber'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12 text-center">

<?php echo form_submit(['name' => 'submit', 'value' => 'Add -Client', 'class' => 'btn btn-primary']) ?>
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