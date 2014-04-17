<?php include ("includes/header.php");?>
<body>

    <!-- navbar -->
    <?php include("includes/navbar.php");?>
    <!-- end navbar -->

    <!-- sidebar -->
    <?php include("includes/sidebar.php");?>
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
     <div class="row-fluid header">
        <div class="span12 columns">
            <label  class="btn-flat success pull-left">
                            <span></span>
                           OUTPATIENT
              </label>
        </div>
     </div>
                <!-- UI Elements section -->
                <div class="row-fluid table">      
                <!-- end UI elements section -->
<table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
                <th class="header">#</th>
                <th class="yellow header headerSortDown">Patient</th>
                <th class="green header">age</th>
                <th class="red header">gender</th>
                <th class="red header">Blood Group</th>
                <th class="red header">Birth Date</th>
                <th class="red header">Actions</th>
              </tr>
            </thead>
             <tbody>
              <?php
              $i=1;
              foreach($patient as $row)
              {
                echo '<tr>';
                echo '<td>'.$i.'</td>';$i++;
                echo '<td>'.$row['name'].'</td>';
                echo '<td>'.$row['age'].'</td>';
                echo '<td>'.$row['sex'].'</td>';
                echo '<td>'.$row['bloodgroup'].'</td>';
                echo '<td>'.$row['birthdate'].'</td>';
                echo '<td class="crud-actions">
                  <a href="' . site_url("nurse") . '/edit_hospital_patient/' . $row['id'] . '" class="btn btn-info">view & edit</a> 
                  
                </td>';
                echo '</tr>';
              }
              ?>      
            </tbody>
</table>
                <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>
                   </div>
     </div>
        </div>
    </div>


	<!-- scripts -->
    <?php include ("includes/scripts.php");?>