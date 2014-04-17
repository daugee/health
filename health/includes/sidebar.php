<div id="sidebar-nav">
        <ul id="dashboard-menu">
            <li class="active">
                <div class="pointer">
                    <div class="arrow"></div>
                    <div class="arrow_border"></div>
                </div>
                <a href="<?php echo site_url('welcome/index');?>">
                    <i class="icon-home"></i>
                    <span>Home</span>
                </a>
            </li>            
             <li>
                <a class="dropdown-toggle" href="<?php site_url('welcome/patient_list');?>">
                    <i class="icon-group"></i>
                    <span>Patients</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="<?php echo site_url('welcome/patient_list');?>">Patient list</a></li>
                    <li><a href="<?php echo site_url('welcome/new_patient');?>">New Patient form</a></li>
                    <li><a href="<?php echo site_url('nurse/inpatient');?>">Inpatient</a></li>
                    <li><a href="<?php echo site_url('nurse/outpatient');?>">outpatient</a></li>
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="<?php site_url('welcome/manage_bed');?>">
                    <i class="icon-edit"></i>
                    <span>bed ward</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="<?php echo site_url('welcome/manage_bed');?>">manage bed</a></li>
                    <li><a href="<?php echo site_url('welcome/bed_allotment');?>">manage bed allotment</a></li>
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="">
                    <i class="icon-edit"></i>
                    <span>Blood Bank</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="<?php echo site_url('welcome/blood_bank');?>">Manage blood bank</a></li>
                    <li><a href="<?php echo site_url('welcome/blood_donors');?>">Manage blood bank donor</a></li>
                </ul>
            </li>
            <li>
                <a href="<?php echo site_url('welcome/nurse_report');?>">
                    <i class="icon-picture"></i>
                    <span>Report</span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('welcome/nurse_profile')?>">
                    <i class="icon-calendar-empty"></i>
                    <span>Profile</span>
                </a>
            </li>
            
        </ul>
    </div>