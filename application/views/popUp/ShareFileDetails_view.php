<?php
/*
 * Visheshagya
 */
?>
<!-- to display the File Sharing pop up -->
<div id="SharedFileDetailsPop" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>                    
            <div class="container">
                <fieldset>
                    <legend>Shared File Details</legend>
                    <form class="form-horizontal" method="POST" action="<?php echo base_url() . 'Ajaxcalls/shareExpertDocument'; ?>"id="shareExpertDocumentForm" name="shareExpertDocumentForm" onsubmit="return shareExpertDocument()">
                        <fieldset>                                            
                            <div id="professionalDataTab">
                                <div class="col-md-12 col-md-offset-1 frm-bdr">
                                    <input type="hidden" value="" name="path" id="path">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label" for="textinput">File Name</label>  
                                        <div class="col-md-5">
                                            <input id="fileName" readonly name="fileName" value="" type="text" placeholder="Membership Number" class="form-control input-md">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label" for="selectmultiple">Share With</label>
                                        <div class="col-md-5" >
                                            <div style="border: 1px solid lightgray; border-radius: 2%;padding: 2%">
                                                <p id="clientName" name="clientName"></p>
                                            </div>
                                        </div>
                                    </div>                                                   
                                    <div class="col-md-12 text-center form-group">								 
                                        <button class="btn btn-sm btn-primary" onclick="shareExpertDocument()">Share File</button>								  
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