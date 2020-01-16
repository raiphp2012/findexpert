<?php
/*
 * Visheshagya
 */
?>
<!-- to display the pop up -->
<div id="editExpertProfessionalInformation" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>                    
            <div class="container">
                <fieldset>
                    <legend>Update Professional Details</legend>
                    <form class="form-horizontal" method="POST" action="../ExpertProfile/updateProfessionalDetails" id="editExpertProfessionalForm" name="editExpertProfessionalForm" enctype="multipart/form-data">
                        <fieldset>                                            
                            <div id="professionalDataTab">
                                <div class="col-md-12 col-md-offset-1 frm-bdr">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label" for="selectbasic">Primary Professional Category</label>
                                        <div class="col-md-5">
                                            <input id="newcategoryName" readonly="true" name="categoryName" type="text" class="form-control input-md">
                                            <input id="newcategoryId" name="categoryId" type="hidden" class="form-control input-md">
                                            <input id="newexpertProfessionalDetailsId" name="expertProfessionalDetailsId" type="hidden" class="form-control input-md">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label" for="selectmultiple">What Types of service you offer?</label>
                                        <div class="col-md-5" >
                                            <div style="border: 1px solid lightgray; border-radius: 2%;padding: 2%">
                                                <p id="newsubCat" name="subCat"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label" for="textinput">Membership #</label>  
                                        <div class="col-md-5">
                                            <input id="newexpertMembershipNumber" required name="expertMembershipNumber" value="" type="text" placeholder="Membership Number" class="form-control input-md">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label" for="selectbasic">Practicing Since</label>
                                        <div class="col-md-5">
                                            <input type="number" required min="1947" name="expertProfessionalCareerStartYear" id="newexpertProfessionalCareerStartYear" placeholder="e.g. 2016" class="form-control input-md">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label" for="textinput">Institute/Bar Council Name</label>  
                                        <div class="col-md-5">
                                            <input id="newexpertInstituteName" required name="expertInstituteName" type="text" placeholder="ICAI" class="form-control input-md">
                                        </div>
                                    </div>                                    
                                    <div class="form-group">
                                        <label class="col-md-5 control-label" for="textinput">Degree</label>
                                        <div class="col-md-5">
                                            <input id="newexpertProfessionalFile" required name="expertProfessionalFile" type="file" placeholder="Membership Number" class="form-control input-md">
                                        </div>
                                    </div>                                                    
                                    <div class="col-md-12 text-center form-group">								 
                                        <button class="btn btn-sm btn-primary" onclick="submitForm()">Update Professional Detail</button>								  
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