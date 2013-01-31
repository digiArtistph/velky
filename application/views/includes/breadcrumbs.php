<nav>

<div id="jCrumbs" class="breadCrumb module">
<?php if(isSection('master', 1)): ?>
        <ul>
            <li>
                <a class="ext_disabled" href="<?php echo base_url(); ?>"><i class="icon-home"></i></a>
            </li>
            <li>
                <?php echo toggleBcrumbs('Hospitals', 'master/hospitals'); ?>
            </li>
            <li>
                 <?php echo toggleBcrumbs('Police', 'master/police'); ?>
            </li>
            <li>
                 <?php echo toggleBcrumbs('RTA', 'master/rta'); ?>
            </li>
            <li>
                <?php echo toggleBcrumbs('Barangay', 'master/barangay'); ?>
            </li>
            <li>
                <?php echo toggleBcrumbs('Accident Type', 'master/accident_type'); ?>
            </li>
            <li>
                <?php echo toggleBcrumbs('Users', 'master/users'); ?>
            </li>
                       
        </ul>
   
    
<?php elseif(isSection('accident', 1)): ?>
     <ul>
        <li>
            <a class="ext_disabled" href="<?php echo base_url(); ?>"><i class="icon-home"></i></a>
        </li>
        <li>
            <?php echo toggleBcrumbs('Dashboard', 'master/dashboard'); ?>
        </li>
        <li>
            <?php echo toggleBcrumbs('Accident Report', 'accident/accident'); ?>
        </li>
	</ul>
<?php elseif(isSection('reports', 1)): ?>
	<ul>
        <li>
            <a class="ext_disabled" href="<?php echo base_url(); ?>"><i class="icon-home"></i></a>
        </li>
        <li>
            <?php echo toggleBcrumbs('Accidents', 'reports/accidents'); ?>
        </li>
        <li>
            <?php echo toggleBcrumbs('Hospitals and Ambulances', 'reports/hospitalsambulances'); ?>
        </li>
        <li>
            <?php echo toggleBcrumbs('Nearest Respondents', 'reports/nearestrespondents'); ?>
        </li>
	</ul>
<?php endif; ?>
</div>
</nav>                              