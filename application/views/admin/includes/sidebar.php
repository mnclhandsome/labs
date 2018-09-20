<div class="page-container">
	<!-- start sidebar menu -->
	<div class="sidebar-container">
		<div class="sidemenu-container navbar-collapse collapse fixed-menu">
        <div id="remove-scroll">
            <ul class="sidemenu  page-header-fixed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                <li class="sidebar-toggler-wrapper hide">
                    <div class="sidebar-toggler">
                        <span></span>
                    </div>
                </li>
                <li class="sidebar-user-panel">
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url();?>assets/img/dp.jpg" class="img-circle user-img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p> Admin <?php echo $getAdminDetails['admin_name'];?></p>
                            <a href="#"><i class="fa fa-circle user-online"></i><span class="txtOnline"> Online</span></a>
                        </div>
                    </div>
                </li>
                <li class="nav-item start ">
                    <a href="<?php echo base_url();?>admins/dashboard" class="nav-link nav-toggle">
                        <i class="material-icons">dashboard</i>
                        <span class="title">Dashboard</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a  class="nav-link nav-toggle"> <i class="material-icons">person</i>
                        <span class="title">Seller Lab</span>  <span class="selected"></span>
                    	<span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="<?php echo base_url();?>admins/dashboard/addLab" class="nav-link "> <span class="title">Add</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="<?php echo base_url();?>admins/dashboard/allLabList" class="nav-link "> <span class="title">List</span>
                            </a>
                        </li> 
                    </ul>
                </li>
                <li class="nav-item ">
                    <a  class="nav-link nav-toggle"> <i class="material-icons">person</i>
                        <span class="title">Seller Pharmacy</span>  <span class="selected"></span>
                    	<span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="<?php echo base_url();?>admins/dashboard/addPharmacy" class="nav-link "> <span class="title">Add</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="<?php echo base_url();?>admins/dashboard/allPharmacyList" class="nav-link "> <span class="title">List</span>
                            </a>
                        </li> 
                    </ul>
                </li>
				<li class="nav-item  ">
                    <a href="<?php echo base_url();?>admin/logout" class="nav-link "> <i class="material-icons">person</i>
                        <span class="title">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- end sidebar menu --> 
			
			