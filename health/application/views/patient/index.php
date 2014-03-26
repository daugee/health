<?php include ("includes/header.php");?>
<body>

    <!-- navbar -->
    <?php include("includes/navbar.php");?>
    <!-- end navbar -->

    <!-- sidebar -->
<div id="sidebar-nav">
        <ul id="dashboard-menu">
            <li class="active">
                <div class="pointer">
                    <div class="arrow"></div>
                    <div class="arrow_border"></div>
                </div>
                <a href="<?php echo site_url('patient/index');?>">
                    <i class="icon-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>            
             <li>
                <a  href="<?php echo site_url('welcome/view_appointment');?>">
                    <i class="icon-group"></i>
                    <span>View Appointment</span>
                    
                </a>
                
            </li>
            <li>
                <a  href="<?php echo site_url('patient/view_prescription');?>">
                    <i class="icon-edit"></i>
                    <span>View Prescription</span>
               
                </a>
                
            </li>
            <li>
                <a  href="<?php echo site_url('patient/view_doctors')?>">
                    <i class="icon-edit"></i>
                    <span>View Doctors</span>
                    
                </a>
                
            </li>
            
            <li>
                <a  href="<?php echo site_url('patient/view_blood_bank')?>">
                    <i class="icon-edit"></i>
                    <span>View Blood Bank</span>
                    
                </a>
                
            </li>
             <li>
                <a  href="<?php echo site_url('patient/admit_history')?>">
                    <i class="icon-edit"></i>
                    <span>Admit History</span>
                    
                </a>
                
            </li>
             <li>
                <a  href="<?php echo site_url('patient/operation_history')?>">
                    <i class="icon-edit"></i>
                    <span>Operation History</span>
                    
                </a>
                
            </li>
            
            <li>
                <a href="<?php echo site_url('patient/patient_profile')?>">
                    <i class="icon-calendar-empty"></i>
                    <span>Profile</span>
                </a>                                                                                                                                                                                                                                                                                                                                                                                                                                                 
            </li>
            
        </ul>
    </div>
    <!-- end sidebar -->


	<!-- main container -->
    <div class="content">

        <!-- settings changer -->
       

        <div class="container-fluid">

            <!-- upper main stats -->
           
            <!-- end upper main stats -->

            <div id="pad-wrapper">

                <!-- statistics chart built with jQuery Flot -->
               
                <!-- end statistics chart -->
 <div class="row">
        <div class="span12 columns">
   

                <!-- UI Elements section -->
                
                <!-- end UI elements section -->

     
                   </div>
        </div>
    </div>


	<!-- scripts -->
    <?php include ("includes/scripts.php");?>