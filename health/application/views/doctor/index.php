<?php include ("includes/header.php");?>
<body>

    <!-- navbar -->
    <?php include("includes/navbar.php");?>
    <!-- end navbar -->

    <!-- sidebar -->
    <?php include("includes/docs/docs_sidebar.php");?>
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
              foreach($query as $row)
              {
                echo '<tr>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['name'].'</td>';
                echo '<td>'.$row['age'].'</td>';
                echo '<td>'.$row['sex'].'</td>';
                echo '<td>'.$row['bloodgroup'].'</td>';
                echo '<td>'.$row['birthdate'].'</td>';
                echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/products/update/'.$row['id'].'" class="btn btn-info">view & edit</a>  
                  <a href="'.site_url("admin").'/products/delete/'.$row['id'].'" class="btn btn-danger">delete</a>
                </td>';
                echo '</tr>';
              }
              ?>      
            </tbody>
</table>
     
                   </div>
        </div>
    </div>


	<!-- scripts -->
    <?php include ("includes/scripts.php");?>