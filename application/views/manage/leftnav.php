<div class="navbar-default sidebar" role="navigation">
  <div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu">
    <li> <a href="<?php echo base_url('manage/admin');?>"><i class="fa fa-database"></i> Dashboard</a></li>
    <li> <a href="javascript:void(0)"><i class="fa fa-database"></i> Manage Master Table</a>
        <ul class="nav nav-second-level collapse">
          <li> <a href="<?php echo base_url('manage/admin/profession_list');?>"><i class="fa fa-angle-right"></i> View Profession</a> </li>
          <li> <a href="<?php echo base_url('manage/admin/profession');?>"><i class="fa fa-angle-right"></i> Add Profession</a> </li>

          <li> <a href="<?php echo base_url('manage/admin/location_list');?>"><i class="fa fa-angle-right"></i> View Location</a> </li>
          <li> <a href="<?php echo base_url('manage/admin/location');?>"><i class="fa fa-angle-right"></i> Add Location</a> </li>

        </ul>
      </li>

      <li> <a href="javascript:void(0)"><i class="fa fa-database"></i> Manage Client</a>
        <ul class="nav nav-second-level collapse">
          <li> <a href="<?php echo base_url('manage/admin/client_list');?>"><i class="fa fa-angle-right"></i> View Client</a> </li>
        </ul>
      </li>
    
        <li> <a href="javascript:void(0)"><i class="fa fa-database"></i> Manage Expert</a>
        <ul class="nav nav-second-level collapse">
          <li> <a href="<?php echo base_url('manage/admin/ca_list');?>"><i class="fa fa-angle-right"></i> View CA</a> </li>
          <li> <a href="<?php echo base_url('manage/admin/cs_list');?>"><i class="fa fa-angle-right"></i> View CS</a> </li>
        <li> <a href="<?php echo base_url('manage/admin/cma_list');?>"><i class="fa fa-angle-right"></i> View CMA</a> </li>
        <li> <a href="<?php echo base_url('manage/admin/lawyer_list');?>"><i class="fa fa-angle-right"></i> View Lawyer</a> </li>
        </ul>
      </li>

      <li> <a href="javascript:void(0)"><i class="fa fa-database"></i> Manage Appointment</a>
        <ul class="nav nav-second-level collapse">
          <li> <a href="<?php echo base_url('manage/admin/book_appointment');?>"><i class="fa fa-angle-right"></i> Book Appointment</a> </li>
         </ul>
      </li>
	  
	   
    </ul>
  </div>
  <!-- /.sidebar-collapse --> 
</div>
