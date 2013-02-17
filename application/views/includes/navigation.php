<div class="navbar-inner">
    <div class="container-fluid">
        <a class="brand" href="dashboard.html"><i class="icon-home icon-white"></i> VELKY System</a>
        <ul class="nav user_menu pull-right">
        	<!--<li class="hidden-phone hidden-tablet">
                                    <div class="nb_boxes clearfix">
                                        <a class="label ttip_b" href="#" data-backdrop="static"  oldtitle="New messages" title="" aria-describedby="ui-tooltip-0">25 <i class="splashy-map"></i></a>
                                        <a class="label ttip_b pop_over" data-placement="bottom" data-original-title="Entities Responses" data-content="rta - confirmed, police confirmed" href="#" data-backdrop="static" data-toggle="modal" oldtitle="New tasks" title="" aria-describedby="ui-tooltip-1">10 <i class="splashy-comments_reply"></i></a>
                                    </div>
                                </li>-->
                                <li class="hidden-phone hidden-tablet">
                                    <div class="nb_boxes clearfix velkyNotifications">
                                        <a data-toggle="modal" data-backdrop="static" href="#" class="label ttip_b" title="New Accident Reports">25 <i class="splashy-map"></i></a>
                                        <a data-toggle="modal" data-backdrop="static" href="#" class="label ttip_b" title="New Responses">10 <i class="splashy-comments_reply"></i></a>
                                    </div>
                                </li>
            <li class="divider-vertical hidden-phone hidden-tablet"></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo retrieveUserFullName();?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                <li><a class="ext_disabled" href="user_profile.html">My Profile</a></li>
                <li><a class="ext_disabled" href="javascrip:void(0)">System Settings</a></li>
                <li class="divider"></li>
                <li><a class="ext_disabled" href="<?php echo base_url('admin/loginad/admin_signout'); ?>">Log Out</a></li>
                </ul>
            </li>
        </ul>
        
    </div>
</div>


               
