
<?php include("includes/header.php")?>
<body>
<!-- navbar -->
<?php include("includes/navbar.php");?>
    <!-- end navbar -->

    <!-- sidebar -->
    <?php include("includes/sidebar.php"); ?>
    <!-- end sidebar -->


<!-- main container -->
<div class="content">

    <!-- settings changer -->


    <div class="container-fluid">
        <div id="pad-wrapper" class="form-page">
            <div class="row-fluid form-wrapper">
                <!-- left column -->
                <div class="page-header">
                    <h1>INPATIENT MODULE</h1>
                </div>
                   <?php if(isset($flash_message)){
        if($flash_message == TRUE)
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> patient has been discharged ';
          echo '</div>';       
        }else{
          echo '<div class="alert alert-error">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Oh snap!</strong> The patient has not been discharged.';
          echo '</div>';          
        }
      }
      ?>
                <div class="row">
                    <div class="tabbable span12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tabs1-pane1" data-toggle="tab">Admitted Patient list</a></li>
                            <li><a href="#tabs1-pane2" data-toggle="tab">Discharge Patient</a></li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs1-pane1">

                               
                                <table class="table table-striped table-bordered table-condensed">
                                    <thead>
                                        <tr>
                                            <th class="header">#</th>
                                            <th class="yellow header headerSortDown">Bed Number</th>
                                            <th class="red header">Ward</th>
                                            <th class="red header">Patient</th>
                                            <th class="red header">Allotment Date</th>
                                            <th class="red header">Discharge Date</th>
                                            <th class="red header">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        foreach ($allotment as $row) {
                                            echo '<tr>';
                                            echo '<td>' . $i . '</td>';$i++;
                                            echo '<td>' . $row['bedno'] . '</td>';
                                            echo '<td>'.$row['bedtype'].'</td>';
                                            echo '<td>' . $row['name'] . '</td>';
                                            echo '<td>' . $row['allotmentdate'] . '</td>';
                                            echo '<td>' . $row['dischargedate'] . '</td>';
                                            echo '<td class="crud-actions">
                   <a href="' . site_url("nurse") . '/edit_bedallotment/' . $row['id'] . '" class="btn btn-info">view & edit</a>  
                </td>';
                                            echo '</tr>';
                                        }
                                        ?>      
                                    </tbody>
                                </table>
                                <?php echo '<div class="pagination">' . $this->pagination->create_links() . '</div>'; ?>
                            </div>
                            <div class="tab-pane" id="tabs1-pane2">
                                  <table class="table table-striped table-bordered table-condensed">
                                    <thead>
                                        <tr>
                                            <th class="header">#</th>
                                            <th class="yellow header headerSortDown">Bed Number</th>
                                            <th class="red header">Ward</th>
                                            <th class="red header">Patient</th>
                                            <th class="red header">Allotment Date</th>
                                            <th class="red header">Discharge Date</th>
                                            <th class="red header">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        foreach ($allotment as $row) {
                                            echo '<tr>';
                                            echo '<td>' . $i . '</td>';$i++;
                                            echo '<td>' . $row['bedno'] . '</td>';
                                            echo '<td>'.$row['bedtype'].'</td>';
                                            echo '<td>' . $row['name'] . '</td>';
                                            echo '<td>' . $row['allotmentdate'] . '</td>';
                                            echo '<td>' . $row['dischargedate'] . '</td>';
                                            echo '<td class="crud-actions">
                   <a href="' . site_url("nurse") . '/discharge/' . $row['id'] . '" class="btn btn-info">Discharge</a>  
                </td>';
                                            echo '</tr>';
                                        }
                                        ?>      
                                    </tbody>
                                </table>
                                <?php echo '<div class="pagination">' . $this->pagination->create_links() . '</div>'; ?>

                            </div>
                        </div>
                    </div>

                </div><!-- /.tab-content -->
            </div><!-- /.tabbable -->
        </div><!-- /.row -->


        <!-- right column -->

    </div>
</div>
</div>
</div>
<!-- end main container -->
    <?php include("includes/scripts.php")?>
<!-- scripts for this page -->






<!-- call this page plugins -->

