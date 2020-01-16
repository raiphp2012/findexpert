<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo base_url(); ?>Expert/mainexpertHome"><div class="logo"></div></a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right navigation">
				<?php if($this->session->userdata('parent_id')==0){ ?>
					<li><a href="<?php echo base_url(); ?>ExpertProfile/updateMyMember">My  Practice</a></li>
				<?php } ?>

				<?php if($this->session->userdata('parent_id')==0){?>
				<li><a href="#">My Office <span class="caret"></span></a>
		         <?php if($this->session->userdata('package_details')=="officeautomation"){
				   ?>
		            <ul class="dropdown-menu">
		                <li>
		                	<a href="#">CLIENT<span class="caret"></span></a>
		                	<ul class="dropdown-menu">
		                      	<li><a href="<?php echo base_url().'MyOffice';?>">Personal Details</a></li>
		                      	<li><a href="<?php echo base_url().'MyOffice/reminder_details'; ?>">Reminder</a></li>
		                    </ul>
		                  	<li><a href="<?php echo base_url().'MyOffice/getServicesDetails'; ?>">SRN</a></li>
							<li><a href="#">STAFF<span class="caret"></span></a>
			                    <ul class="dropdown-menu">
			                      	<li><a href="<?php echo base_url().'MyOffice/get_staff_personal_details';?>">Staff Details</a></li>
			                      	<li><a href="<?php echo base_url().'MyOffice/get_user_time_off'; ?>">Leave Details</a></li>
			                    </ul>
			                </li>
			                <!-- <li><a href="#">CALENDAR<span class="caret"></span></a>
			                    <ul class="dropdown-menu">
			                      	<li><a href="<?php echo base_url().'MyOffice/calender'; ?>">My</a></li>
			                      	<li><a href="#">Staff</a></li>
			                    </ul>
			                </li> -->
			            </li>
		            </ul>
		            <?php } ?>
		        </li>
				<?php } ?>
				<?php  if($this->session->userdata('parent_id')!= 0 ){ ?>
				<li><a href="#">My Office <span class="caret"></span></a>
		         <?php if($this->session->userdata('package_details')=="officeautomation"){
				   ?>
		            <ul class="dropdown-menu">
		                <li>
		                	<a href="<?php echo base_url().'MyOffice';?>">CLIENT Detail</a>
		                	</li>
		                  	<li><a href="<?php echo base_url().'MyOffice/getServicesDetails'; ?>">My Work</a></li>
							<li><a href="<?php echo base_url().'MyOffice/get_user_time_off'; ?>">Leave Details</a></li>
			                    
			                </li>
			                <!-- <li><a href="#">CALENDAR<span class="caret"></span></a>
			                    <ul class="dropdown-menu">
			                      	<li><a href="<?php echo base_url().'MyOffice/calender'; ?>">My</a></li>
			                      	<li><a href="#">Staff</a></li>
			                    </ul>
			                </li> -->
			            </li>
		            </ul>
		            <?php } ?>
		        </li>
				<?php } ?>
		        
				<li><a href ="<?php echo base_url().'ExpertAppointments'; ?>" >My Appointments</a></li>
				<li><a href="<?php echo base_url().'ExpertDocument'; ?>">E-Lockers</a></li>
				<li><a href="<?php echo base_url().'ExpertProfile';?>" >My Profile</a></li>
				<?php if($this->session->userdata('parent_id')!=0){
                    if($this->session->userdata('status')=="active")
                {?>
                    <li> <a href="<?php echo base_url() .'Ajaxcalls/updateExpertStatus'; ?>/inactive">Busy</a></li>
                <?php }
                    else{
                ?>
                    <li> <a href="<?php echo base_url() .'Ajaxcalls/updateExpertStatus'; ?>/active">Online</a></li>
				<?php } } ?>
				<li class="dropdown">
					<a class="btn dropdown-toggle profile-img" data-toggle="dropdown" href="#">
						<img src="<?php $profileImage=$this->session->userdata('profileImage');echo $profileImage;?>" class="img-responsive img-circle img-thumbnail" width="50px" height="10px;">
					</a>
					<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
						<li><a href="<?php echo base_url() ?>Logout" class="btn btn-danger btn-xs" role="button" data-toggle="modal">Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>   
	</div>
</nav>