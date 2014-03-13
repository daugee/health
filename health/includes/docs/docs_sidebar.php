<div id="sidebar-nav">
        <ul id="dashboard-menu">
            <li class="active">
                <div class="pointer">
                    <div class="arrow"></div>
                    <div class="arrow_border"></div>
                </div>
                <a href="<?php echo site_url('doctor/index');?>">
                    <i class="icon-home"></i>
                    <span>Home</span>
                </a>
            </li>            
             <li>
                <a class="dropdown-toggle" href="<?php site_url('doctor/patient_list');?>">
                    <i class="icon-group"></i>
                    <span>Patients</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="<?php echo site_url('doctor/patient_list');?>">Patient list</a></li>
                    <li><a href="<?php echo site_url('doctor/new_patient');?>">New Patient form</a></li>
                    <li><a href="<?php echo site_url('doctor/patient_profile');?>">Inpatient</a></li>
                    <li><a href="<?php echo site_url('doctor/patient_profile');?>">outpatient</a></li>
                </ul>
            </li>
            <li>
                <a href="<?php echo site_url('doctor/appointment'); ?>">
                    <i class="icon-edit"></i>
                    <span>Manage Appointment</span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('doctor/prescription'); ?>">
                    <i class="icon-edit"></i>
                    <span>Manage Prescription</span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('doctor/bed_allotment'); ?>">
                    <i class="icon-edit"></i>
                    <span>Bed Allotment</span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('doctor/blood_bank'); ?>">
                    <i class="icon-edit"></i>
                    <span>manage Blood Bank</span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('doctor/report'); ?>">
                    <i class="icon-edit"></i>
                    <span>Report</span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('doctor/profile'); ?>">
                    <i class="icon-calendar-empty"></i>
                    <span>Profile</span>
                </a>
            </li>
            
        </ul>
    </div>