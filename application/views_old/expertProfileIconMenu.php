<?php
/*
 * @author Visheshagya
 */
?>
<li>
    <div class="dropdown">
        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
            <span class="login-icon pull-left"></span>
        </a>
        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
            <li role="presentation" class="dropdown-header">Action</li>
            <li> </li>
		<li> </li>
		<li><a href="<?php echo base_url() ?>ClientProfile" class="btn btn-primary btn-xs" role="button" data-toggle="modal">My Profile</a></li>
		<li><a href="" class="btn btn-primary btn-xs" role="button" data-toggle="modal" id="ChangePassword">Change Password1</a></li>
		<li><a href="clientHome/clientLogout" class="btn btn-danger btn-xs" role="button" data-toggle="modal">Logout</a></li>                                   
        </ul>
    </div>
</li>
