 <?php 
if($expertPersonalData[0]->expertId != ''){
 foreach ($expertPersonalData as $expertData) {
                           $expert_consultation_details = $this->common->select_all_where("expert_consultation_details_mapping",array("expertId"=>$expertData->expertId));
                           foreach($expert_consultation_details as $expert_consultation)
                           {
                                if($expert_consultation->consultationTypeId != '')
                                {
                                    if($expert_consultation->consultationTypeId == "1")
                                    {
                                       $expertData->Video = $expert_consultation->consultationFees;
                                    }
                                    if($expert_consultation->consultationTypeId == "2")
                                    {
                                       $expertData->Audio = $expert_consultation->consultationFees;
                                    }
                                    if($expert_consultation->consultationTypeId == "3")
                                    {
                                       $expertData->InPerson = $expert_consultation->consultationFees;
                                    }
                                }
                           }
                        ?>
                        <div class="expert-wrapper">
                            <div class="expert-block">
                                <div class="row">
                                    <div class="col-md-2 pad0">
                                        <img src="<?php
                                            if (trim($expertData->expertProfileImageName) == "") {
                                                echo base_url() . "assets/img/default.jpg";
                                            } else {
                                                echo base_url() . $expertData->expertProfileImageName;
                                            }
                                            ?>" class="img-expert"/>
                                    </div>
                                    <div class="col-md-10 pad0">
                                        <h1 class="exp-name"><?php echo $expertData->expertName; ?></h1>
                                        <span><img class="verified-img" src="<?php echo base_url(); ?>assets/img/verify.svg" alt="Verified Expert"></span>
                                        <h2 class="since"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Since, <?php
                                            $parts = explode('-', $expertData->expertProfessionalCareerStartYear);
                                              echo $parts[0];?>
                                        </h2>
                                        <div class="expertSkills">
                                           
                                            <?php echo $expertData->expertSearchText;?>
                                          
                                        </div>
                                        <!-- <div class="view-more" id="view-more">View more</div> -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="expertSummary">
                                            <p><?php echo $expertData->expertProfileSummary; ?></p>
                                        </div>
                                    </div>          
                                </div>
                                <div class="row fees">
                                    <div class="col-md-12 pad0">
                                         <div class="fee-wrapper">
                                            <div class="fee-icon-wrapper"><i class="material-icons">videocam</i><i class="fa fa-rupee" aria-hidden="true"></i><span>
                                                <?php 
                                                    if(!isset($expertData->Video)){
                                                        echo 'N/A'; 
                                                    }else{
                                                        echo $expertData->Video;
                                                    } 
                                                ?> 
                                            </span></div>
                                            <div class="fee-icon-wrapper"><i class="material-icons">phone</i><i class="fa fa-rupee" aria-hidden="true"></i><span>
                                                <?php 
                                                    if(!isset($expertData->Audio)){
                                                        echo 'N/A'; 
                                                    }else{
                                                        echo $expertData->Audio;
                                                    } 
                                                ?> 
                                            </span></div>
                                            <div class="fee-icon-wrapper"><i class="material-icons">people</i><i class="fa fa-rupee" aria-hidden="true"></i><span>
                                                <?php 
                                                    if(!isset($expertData->Audio)){
                                                        echo 'N/A'; 
                                                    }else{
                                                        echo $expertData->Audio;
                                                    } 
                                                ?> 
                                            </span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row btn-border-wrapper">
                                <div class="col-md-6 pr-app-btn-wrapper pr-btn">
                                    <a href="<?php echo base_url() ?>Expertdetails/viewProfile/<?php echo $expertData->expertId; ?>">View Profile</a>
                                </div>
                                <div class="col-md-6 pr-app-btn-wrapper app-btn">
                                   <a href="<?php echo base_url() . 'Searchexpertdetails/clientBookingAppointment/' . $expertData->expertId . '/' . $expertData->expertName . '/' . $expertData->expertCategoryId; ?>" role="button">Book Appointment</a>
                                </div>          
                            </div>
                        </div>
                        <?php } ?>
                        <?php } else{?>


                        <?php }?>
