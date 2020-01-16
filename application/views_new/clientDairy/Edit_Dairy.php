<?php include('DairyHeader.php'); ?>


<?php
/*
 * @author Visheshagya
 */
?>
    <div class="modal-login">
    <div class="modal-body">
                <?php echo form_open(base_url()."ClientDocument/updateDairy/{$edairy->eDairyId}", ['class' => 'form-horizontal']);
                echo form_hidden('updateId',date('Y-m-d H:i:s')) ?>
                
                <fieldset>
                    <legend>Edit/View</legend>
                    <legend class="active"><a style="cursor: pointer"onclick="location.href = '<?php echo base_url() . 'ClientDocument'; ?>.';" data-toggle="tab">Back</a></legend>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="eDairyTitle" class="col-lg-4 control-label">Title</label>
                                <div class="col-lg-7">
                                    <?php echo form_input(['name' => 'eDairyTitle','autofocus'=>'true', 'type' => 'eDairyTitle', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'abc', 'value'=>set_value('eDairyTitle', $edairy->eDairyTitle)]); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?php echo form_error('eDairyTitle'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="inputPassword" class="col-lg-4 control-label">Body</label>
                                <div class="col-lg-7">
                                    <?php echo form_textArea(['name' => 'eDairyBody', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'abcd', 'value'=>set_value('eDairyBody', $edairy->eDairyBody)]); ?>
                                </div>
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
<?php include('DairyFooter.php'); ?>