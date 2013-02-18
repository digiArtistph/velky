<div class="navbar-inner">
    <div class="container-fluid">
        <a class="brand" href="dashboard.html"><i class="icon-home icon-white"></i> VELKY System</a>
        <ul class="nav user_menu pull-right">
                                <li class="hidden-phone hidden-tablet">
                                    <div class="nb_boxes clearfix velkyNotifications">
                                        <a id="sticky_a" data-toggle="modal" data-backdrop="static" href="#accidentNewMsgs" class="label ttip_b caller" title="New Accident Reports">0 <i class="splashy-map"></i></a>
                                        <a data-toggle="modal" data-backdrop="static" href="#entitiesResponses" class="label ttip_b entity" title="New Responses">0 <i class="splashy-comments_reply"></i></a>
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


               
