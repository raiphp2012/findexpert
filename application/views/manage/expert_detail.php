<!DOCTYPE html>

<html lang="en">
<?php $this->load->view('manage/head.php'); ?>
<body>

<div id="wrapper">

  <!-- Navigation -->

  <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

    <div class="navbar-header">

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

      <a class="navbar-brand" href="<?php echo base_url('manage/admin');?>"><img src="<?php echo ASSETS;?>images/logo.png" class="logo" /></a> </div>

    <!-- /.navbar-header -->

    <?php $this->load->view('manage/menu.php'); ?>

    <!-- /.navbar-top-links -->

    <?php $this->load->view('manage/leftnav.php'); ?>

    <!-- /.navbar-static-side -->

  </nav>

  <!-- Page Content -->

  <div id="page-wrapper">

    <div class="container-fluid">

	

      <div class="row">

        <div class="col-lg-12">

        <div class="panel panel-default">

        <div class="panel-heading"><?php echo $page_title;?></div>

        <div class="panel-body">
		<form name="frmExpertProfile" id="frmExpertProfile" method="post" action="<?php echo base_url("manage/admin/expert_detail/id/".$expertPersonalDetails->expertId);?>">

          <fieldset class="row pd-wrapper">
                                                <div class="col-md-6">
                                                    <div class="pd-input-wrapper">
                                                        <div id="personalDataTab">
                                                           
                                                            <!-- Form Name -->
                                                            <h4>Personal Information</h4>
                                                            <div class="col-md-12">
                                                            
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label" for="textinput">Name</label>  
                                                                    <div class="col-md-8">
                                                                        <input autofocus="true" id="expertName" name="expertName" type="text" placeholder="Name" required class="form-control input-md" value="<?php echo $expertPersonalDetails->expertName; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label" for="textinput">Email</label>  
                                                                    <div class="col-md-8">
                                                                        <input name="expertEmailId" id="expertEmailId" readonly type="email" required class="form-control input-md" onchange="checkEmailId(this.value)" value="<?php echo $expertPersonalDetails->expertEmailId; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label" for="prependedtext">Mobile</label>
                                                                    <div class="col-md-8">
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon">+91</span>
                                                                            <input name="expertMobileNumber" id="expertMobileNumber" class="form-control" placeholder="e.g 9999999999" type="text" pattern="[1-9]{1}[0-9]{9}" oninvalid="setCustomValidity(Mobile Number shoulid be 10 digit .')" value="<?php echo $expertPersonalDetails->expertMobileNumber; ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label" for="textinput">Gender</label>  
                                                                    <div class="col-md-8">
                                                                        <?php if ($expertPersonalDetails->expertGender == 1) { ?>
                                                                            <label class="radio-inline">
                                                                            <input id="expertGender" name="expertGender" type="radio" value="1" checked="true">Male
                                                                            </label>
                                                                            <label class="radio-inline">
                                                                            <input id="expertGender" name="expertGender" type="radio" value="2" >Female
                                                                            </label>
                                                                        <?php } else { ?>
                                                                            <label class="radio-inline">
                                                                            <input id="expertGender" name="expertGender" type="radio" value="1">Male
                                                                            </label>
                                                                            <label class="radio-inline">
                                                                            <input id="expertGender" name="expertGender" type="radio" value="2" checked="true" class="radio-inline">Female
                                                                            </label>

                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label" for="selectbasic">Date of Birth</label>
                                                                    <div class="col-md-8">
                                                                        
                                 <input type='text' name="expertDOB" id="expertDOB" class="form-control" value="<?php echo $expertPersonalDetails->expertDOB; ?>" />
                                                                            
                                                                        
                                                                    </div>
                                                                </div>
                                                                

                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label" for="textinput">PAN Number</label>  
                                                                    <div class="col-md-8">
                                                                        <input id="expertPanNumber" required name="expertPanNumber" type="text" placeholder=" e.g ABCDE1234F" class="form-control input-md" value="<?php echo $expertPersonalDetails->expertPanNumber; ?>">
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- MAILING ADDRESS-->
                                                <div class="col-md-6">
                                                    <div class="pd-input-wrapper">
                                                        <div class="col-md-12">
                                                            <h4>Mailing Address</h4>
                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label" for="textinput">Address Line 1</label>  
                                                                <div class="col-md-8">
                                                                    <input id="expertAddressLine1" name="expertAddressLine1" type="text" placeholder="e.g Area Name" required class="form-control input-md" value="<?php echo $expert_address_info->expertAddressLine1; ?>">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label" for="textinput">Address Line 2</label>  
                                                                <div class="col-md-8">
                                                                    <input id="expertAddressLine2" name="expertAddressLine2" type="text" placeholder="e.g Locality Name" required class="form-control input-md" value="<?php echo $expert_address_info->expertAddressLine2; ?>">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label" for="prependedtext">Location</label>
                                                                <div class="col-md-8">
                                                                    <div class="input-group">
                                                                      
                                                                        <select name="locationId" id="locationId" class="form-control" required>
                                                                        <option value="">Select Location</option>
                                                                        <?php foreach($location_list as $location){?>
                                                                         <option value="<?php echo $location->locationId;?>" <?php if($expertPersonalDetails->locationId == $location->locationId){echo "selected";}?>><?php echo $location->locationName;?></option>
                                                                        <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label" for="textinput">City</label>  
                                                                <div class="col-md-8">
                                                                    <input id="expertCity" name="expertCity" type="text" placeholder="e.g Gurgaon" required class="form-control input-md" value="<?php echo $expert_address_info->expertCity; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label" for="textinput">Country</label>  
                                                                <div class="col-md-8">
                                                                    <input id="expertCountry" name="expertCountry" type="text" placeholder="e.g India" required class="form-control input-md" value="<?php echo $expert_address_info->expertCountry; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label" for="textinput">Pincode</label>  
                                                                <div class="col-md-8">
                                                                    <input id="expertPincode" name="expertPincode" type="text" placeholder="e.g 111111" required class="form-control input-md" value="<?php echo $expert_address_info->expertPincode; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label" for="textinput">Profile Summary</label>  
                                                                <div class="col-md-8">
                                                                    <textarea id="expertProfileSummary" name="expertProfileSummary" required class="form-control input-md" cols="10" rows="5"><?php echo $expertPersonalDetails->expertProfileSummary; ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                  <div class="col-md-12">
                                                  <h4>Professional Detail</h4>
                                                  </div>
                                                  </div>

                                                <div class="row">
                                                  
                                                  <div class="col-md-12">
                                                    <div class="form-group">
                                                                <label class="col-md-4 control-label" for="textinput">Professional Qualification</label>  
                                                                <div class="col-md-8">
                                                                   <?php echo $expert_category_info->categoryName;?>
                                                                </div>
                                                            </div>
                                                  </div>

                                                </div>


                                                <div class="row">
                                                  
                                                  <div class="col-md-12">
                                                    <div class="form-group">
                                                                <label class="col-md-4 control-label" for="textinput">Service Offered</label>  
                                                                <table width="100%">
                                                                <tr>
                                                                   <?php 
                                                                   $counter = 1;

foreach($service_list as $service){?>
<td><input type="checkbox" name="services[]" value="<?php echo $service->subCategoryId;?>" <?php if(in_array($service->subCategoryId,$expert_services)){echo "checked";}?> />&nbsp;<?php echo $service->subCategoryName;?></td>
<?php if($counter%5==0){echo "</tr><tr>";} $counter++;} ?>
</tr>
</table>
                                                                   
                                                                
                                                            </div>
                                                  </div>

                                                </div>
                                              
                                                <div class="col-md-12 pd-submit">                
                                                    <button class="pd-btn pd-update">Update</button>                                            
                                                </div>

                                            </fieldset>
                                            </form>

          </div>

          </div>

        </div>

        <!-- /.col-lg-12 -->

      </div>

      <!-- /.row -->

    </div>

    <!-- /.container-fluid -->

  </div>

  <!-- /#page-wrapper -->

</div>

<!-- /#wrapper -->

<?php $this->load->view('manage/footer.php'); ?>

</body>

</html>

