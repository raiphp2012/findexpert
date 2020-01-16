<?php
/*
 * @author Visheshagya
 */
?>
<script type="text/javascript">
    $(document).ready(function () {
        $("#eDairy").click(function () {
            $("#eDairyModal").modal('show');
        });
    });

</script>
<div id="eDairyModal" class="modal fade modal-login">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>E-Dairy</h4>
            </div>                    
            <div class="modal-body">
                <?php echo form_open(base_url().'ClientDocument/addDairy', ['class' => 'form-horizontal']) ?>
                <?php echo form_hidden('clientId', $this->session->userdata('clientId')); ?>
                <?php echo form_hidden('createDate',date('Y-m-d')) ?>
                <fieldset>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
 <!--                                <label for="eDairyTitle" class="col-lg-4 control-label">Title</label>
                                <div class="col-lg-7"> -->
                                    <?php echo form_input(['name' => 'eDairyTitle','autofocus'=>'true', 'type' => 'eDairyTitle', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'abc', 'value'=>set_value('eDairyTitle')]); ?>
                                <!-- </div> -->
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?php echo form_error('eDairyTitle'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
  <!--                               <label for="inputPassword" class="col-lg-4 control-label">Body</label>
                                <div class="col-lg-7"> -->
                                    <textarea name="eDairyBody" class="form-control" style="height: auto" rows="5" required="true" placeholder="Description" required="required"></textarea>
                                   <!--  <?php echo form_textArea(['name' => 'eDairyBody', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'abcd', 'value'=>set_value('eDairyBody')]); ?> -->
                                <!-- </div> -->
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?php echo form_error('eDairyBody'); ?>
                        </div>
                    </div>                           
                    <div class="form-group">
                        <div class="col-lg-8 pull-right col-lg-offset-2">
                            <?php echo form_submit(['name' => 'submit', 'value' => 'Save', 'class' => 'btn btn-primary']) ?>
                        </div>
                    </div>
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>