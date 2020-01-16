<?php
/*
 * Visheshagya
 */
error_reporting(0);
?>
<!-- to display the pop up -->
<div id="ExpertBankAccountdetails" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>                    
            <div class="container">
               
                <fieldset>
                    <legend>Add/Update Bank Account Details</legend>
                    <form class="form-horizontal" method="POST" action="../ExpertProfile/updateBankAccountDetails" id="updateBankAccountDetails" name="updateBankAccountDetails"  onsubmit="return submitForm();">
                        <fieldset>
                            <div id="professionalDataTab">
                                <div class="col-md-12 col-md-offset-1 frm-bdr">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label" for="selectbasic">Account Number</label>
                                        <div class="col-md-5">
                                            <input  id="accountNumber"  name="accountNumber" type="text" placeholder="Account Number" value="<?php echo empty($accountData->accountNumber)? '': $accountData->accountNumber; ?>" class="form-control input-md">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label" for="selectmultiple">Account Holder Name</label>
                                        <div class="col-md-5" >
                                            <input id="nameAsPerRecords" required name="nameAsPerRecords" type="text" placeholder="Account Holder Name" value="<?php echo empty($accountData->nameAsPerRecords)? '': $accountData->nameAsPerRecords; ?>" class="form-control input-md">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label" for="textinput">IFSC Code#</label>  
                                        <div class="col-md-5">
                                            <input id="ifscCode" required name="ifscCode" value="<?php echo  empty($accountData->ifscCode)? '':$accountData->ifscCode; ?>" type="text" placeholder="IFSC Code" class="form-control input-md">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label" for="selectbasic">Bank Name</label>
                                        <div class="col-md-5">
                                            <input type="text"  name="bankName" id="bankName" value="<?php echo empty($accountData->bankName)? '': $accountData->bankName; ?>" placeholder="Bank Name" class="form-control input-md">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label" for="textinput">Bank Address</label>  
                                        <div class="col-md-5">
                                            <input id="bankAddress" required name="bankAddress" type="text" placeholder="Bank Address" value="<?php echo empty($accountData->bankAddress)?'':$accountData->bankAddress; ?>" class="form-control input-md">
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label class="col-md-5 control-label" for="textinput">MICR Code</label>  
                                        <div class="col-md-5">
                                            <input id="micrCode" required name="micrCode" type="text" 
                                            value="<?php echo empty($accountData->micrCode)?'':$accountData->micrCode; ?>" placeholder="MICR Code" class="form-control input-md">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label" for="textinput">Account Type </label>  
                                        <div class="col-md-5">
                        <label class="radio-inline"><input type="radio" name="accountType" 
                        <?php if(empty($accountData->accountType)) {
                            echo "checked='checked'";
                            }  
                            else{ 
                                if($accountData->accountType =='1')  
                                    "checked='checked'";
                                } ?>  value='1' 
                        checked="checked">Savings</label>
                        <label class="radio-inline"><input type="radio" name="accountType" <?php if($accountData->accountType =='2') {echo "checked='checked'";}
                        if(trim($accountData->accountType)==""){ echo "";} ?>    value='2'>Current</label>

                                        </div>
                                    </div>                                                                                         
                                    <div class="col-md-12 text-center form-group">                               
                                        <button class="btn btn-sm btn-primary" onclick="submitForm()">Update Account Detail</button>                                 
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </fieldset>
            </div>
        </div>
    </div>
</div>
<!--End -->