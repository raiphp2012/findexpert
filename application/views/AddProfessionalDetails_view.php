<?php
/*
 * @author Visheshagya
 */

?>
<div class="main-content detail-view" style="width:60%;display: block;margin: 0 auto;" >
    <div class="detail-view-cont">
        <form class="form-horizontal" method="POST" action="../ExpertProfile/addProfessionalDetails" id="expertSignupForm"name="expertSignupForm" enctype="multipart/form-data" onsubmit="return (submitForm())">
            <fieldset style="background-color: rgba(169, 169, 169, 0.58);">  
                <h1 style="font-size: 24px;font-weight: 600;color: #497182;margin: 0 0 20px;padding: 10px;font-family: f4;text-align: center;letter-spacing: 0.5px;">Add Category</h1>                                          
                <div id="professionalDataTab">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="selectbasic">Primary Professional Category</label>
                            <div class="col-md-8">
                                <select id="categoryId" name="categoryId" class="form-control" onchange="fetchSubCategoryDetails(this.value)">
                                    <option value="0">--SELECT--</option>
                                    <?php
                                    foreach ($expertCategories as $eCategory) {
                                        if (!in_array($eCategory->categoryId, $existingCategoriesId)) {
                                            ?>
                                            <option value=<?php echo $eCategory->categoryId; ?>><?php echo $eCategory->categoryName; ?></option>
                                        <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="selectmultiple">What Types of service you offer?</label>
                            <div class="col-md-8" >
                                <div style="border: 1px solid lightgray; border-radius: 0;padding: 3%;background-color: #fff;">
                                    <p id="subCat" name="subCat"></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">Membership No.</label>  
                            <div class="col-md-8">
                                <input id="expertMembershipNumber" required name="expertMembershipNumber" type="text" placeholder="e.g 1234ABCS" class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="selectbasic">Practicing Since</label>
                            <div class="col-md-8">
                                <input type="number" required min="1947" name="expertProfessionalCareerStartYear" id="expertProfessionalCareerStartYear" placeholder="e.g 2016" class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">Institute/Bar Council Name</label>  
                            <div class="col-md-8">
                                <input id="expertInstituteName" required name="expertInstituteName" type="text" placeholder=" e.g ICAI" class="form-control input-md">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">Degree</label>
                            <div class="col-md-8">
                                <input id="expertProfessionalFile" required name="expertProfessionalFile" type="file" class="form-control input-md custom-file-input">
                            </div>
                        </div>                                                    
                        <div class="col-md-12 text-center form-group pd-submit" style="margin-top:20px; ">								 
                            <button class="btn btn-sm btn-primary pd-btn pd-update" onclick="submitForm()">Add Professional Detail</button>								  
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
