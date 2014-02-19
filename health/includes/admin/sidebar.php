<div id="sidebar-nav">
        <ul id="dashboard-menu">
            <li class="active">
                <div class="pointer">
                    <div class="arrow"></div>
                    <div class="arrow_border"></div>
                </div>
                <a href="<?php echo site_url('welcome/index');?>">
                    <i class="icon-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>            
             <li>
                <a  href="<?php echo site_url('admin/department');?>">
                    <i class="icon-group"></i>
                    <span>Department</span>
                    
                </a>
                
            </li>
            <li>
                <a  href="<?php echo site_url('admin/doctor');?>">
                    <i class="icon-edit"></i>
                    <span>Doctor</span>
               
                </a>
                
            </li>
            <li>
                <a  href="<?php echo site_url('admin/patient')?>">
                    <i class="icon-edit"></i>
                    <span>Patient</span>
                    
                </a>
                
            </li>
            <li>
                <a  href="<?php echo site_url('admin/nurse')?>">
                    <i class="icon-edit"></i>
                    <span>Nurse</span>
                    
                </a>
                
            </li>
            <li>
                <a  href="<?php echo site_url('admin/pharmacist')?>">
                    <i class="icon-edit"></i>
                    <span>Pharmacist</span>
                    
                </a>
                
            </li>
            <li>
                <a  href="<?php echo site_url('admin/laboratorist')?>">
                    <i class="icon-edit"></i>
                    <span>Laboratorist</span>
                    
                </a>
                
            </li>
             <li>
                <a class="dropdown-toggle" href="<?php site_url('admin/view_appointment');?>">
                    <i class="icon-group"></i>
                    <span>Monitor Hospital</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="<?php echo site_url('admin/view_appointment');?>">View Appointment</a></li>
                    <li><a href="<?php echo site_url('admin/view_bed_status');?>">View Bed status</a></li>
                    <li><a href="<?php echo site_url('admin/view_blood_bank');?>">view Blood Bank</a></li>
                    <li><a href="<?php echo site_url('admin/view_medicine');?>">View Medicine</a></li>
                    <li><a href="<?php echo site_url('admin/view_reports');?>">view Reports</a></li>
               </ul>
            </li>
            <li>
                <a href="<?php echo site_url('admin/admin_profile')?>">
                    <i class="icon-calendar-empty"></i>
                    <span>Profile</span>
                </a>                                                                                                                                                                                                                                                                                                                                                                                                                                                 
            </li>
            
        </ul>
    </div>