<?php include ("includes/header.php");?>
<body>

    <!-- navbar -->
    <?php include ("includes/navbar.php");?>
    <!-- end navbar -->

    <!-- sidebar -->
     <?php include ("includes/sidebar.php");?>
    <!-- end sidebar -->


	<!-- main container -->
    <div class="content">
        
        <!-- settings changer -->
        
        
        <div class="container-fluid">
            <div id="pad-wrapper" class="user-profile">
                <!-- header -->
                <div class="row-fluid header">
                    <div class="span8">
                        <img src="<?php echo base_url();?>img/projo/<?php echo $query[0]['image']; ?>" class="">
                        <h3 class="name"><?php echo $query[0]['name']; ?> &nbsp; <?php echo $query[0]['lname']; ?></h3>
                         <?php $id=$query[0]['id']?> 
                    </div>
                    <a href=" <?php echo  site_url("admin/delete_patient/").'/'. $id; ?>" class="btn-flat icon pull-right delete-user" data-toggle="tooltip" title="Delete user" data-placement="top">
                        <i class="icon-trash"></i>
                    </a>
                   
                     <a href=" <?php echo  site_url("admin/edit_hospital_patient/").'/'. $id; ?>" class="btn btn-info large pull-right edit" >
                        Edit this person
                    </a>
                    &nbsp;
                </div>
                

                <div class="row-fluid profile">
                    <!-- bio, new note & orders column -->
                      <div class="row">
                        <div class="tabbable span12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tabs1-pane1" data-toggle="tab">Prescription History</a></li>
                                <li><a href="#tabs1-pane2" data-toggle="tab">Prescription History list </a></li>
                                <li><a href="#tabs1-pane3" data-toggle="tab">Appointment History</a></li>
                                <li ><a href="#tabs1-pane4" data-toggle="tab">General Reports</a></li>
                                <li><a href="#tabs1-pane5" data-toggle="tab">Lab Report</a></li>
                                <li><a href="#tabs1-pane6" data-toggle="tab">Admission History</a></li>

                            </ul>
                            <div class="tab-content">
                                
                                <div class="tab-pane active" id="tabs1-pane1">
 <form method="post" action="<?php echo site_url('doctor/update_prescription'); ?>" id="formID" class="form-horizontal" >					
                                        <fieldset>

                                            <!-- Form Name -->
                                            <legend>View Prescription</legend>
                                            <input type="hidden" value="<?php echo $query1[0]['id']; ?>" name="id"/>
                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="doctor">Doctor</label>
                                                <div class="controls">
                                                    <input id="doctor" name="doctor" type="text" value="<?php echo $query1[0]['name']; ?>" class="input-medium" readonly>
                                                    
                                                </div>
                                            </div>

                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="patient">Patient</label>
                                                <div class="controls">
                                                    <input id="patient" name="patient" type="text" value="<?php echo $query[0]['lname']; ?>" class="input-medium" readonly>

                                                </div>
                                            </div>

                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="casehistory">Case History</label>
                                                <div class="controls">
                                                    <input id="casehistory" name="casehistory" type="text"value="<?php echo $query1[0]['casehistory']; ?>" class="input-medium" readonly>

                                                </div>
                                            </div>

                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="medication">Medication</label>
                                                <div class="controls">
                                                    <input id="medication" name="medication" type="text" value="<?php echo $query1[0]['medication']; ?>" class="input-medium" readonly>

                                                </div>
                                            </div>

                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="date">Date</label>
                                                <div class="controls">
                                                    <input id="date" name="date" type="text" value="<?php echo $query1[0]['date']; ?>" class="input-medium" readonly>
                                                    <input name="id" type="hidden" value="<?php echo $query1[0]['id']; ?>">
                                                </div>
                                            </div>

                                            <!-- Textarea -->
                                            <div class="control-group">
                                                <label class="control-label" for="description">Medication From Pharmacist</label>
                                                <div class="controls">                     
                                                    <textarea id="description" name="medicationpharmacist" ><?php echo $query1[0]['medicationpharmacist']; ?></textarea>
                                                </div>
                                            </div>

                                            <!-- Textarea -->
                                            <div class="control-group">
                                                <label class="control-label" for="description">Description</label>
                                                <div class="controls">                     
                                                    <textarea id="description" name="description"  ><?php echo $query1[0]['description']; ?></textarea>
                                                </div>
                                            </div>

                                            <!-- Button -->
                                            

                                        </fieldset>
                                    </form>
                                    
                                    <?php echo '<div class="pagination">' . $this->pagination->create_links() . '</div>'; ?>
                                </div>
                                <div class="tab-pane" id="tabs1-pane2">
                                   <table class="table table-striped table-bordered table-condensed">
                                        <thead>
                                            <tr>
                                                <th class="header">#</th>
                                                <th class="yellow header headerSortDown">Date</th>
                                                <th class="green header">Doctor</th>
                                                <th class="green header">Case History</th>
                                                <th class="green header">Medication</th>
                                                <th class="green header">Description</th>
                                                
                                            </tr>
                                        </thead>
                                        <?php
                                        //flash messages
                                       
                                                $i = 1;
                                                foreach ($query1 as $row) {
                                                    echo '<tr>';
                                                    echo '<td>' . $i . '</td>';
                                                    $i++;
                                                    echo '<td>' . $row['date'] . '</td>';
                                                    echo '<td>' . $row['name'] . '</td>';
                                                    echo '<td>' . $row['casehistory'] . '</td>';
                                                    echo '<td>' . $row['medication'] . '</td>';
                                                    echo '<td>' . $row['description'] . '</td>';
                                                    echo '<td class="crud-actions">
                <a href="' . site_url("admin") . '/view_prescription/' . $row['id'] . '" class="btn btn-info">view & edit</a>  
                </td>';
                                                    echo '</tr>';
                                                    echo '<input type="hidden" name="id" value="' . $row['id'] . '" /> ';
                                                }
                                            
                                       
                                        ?>


                                    </table> 
                                </div>
                                <div class="tab-pane" id="tabs1-pane3">
                                    <table class="table table-striped table-bordered table-condensed">
                                        <thead>
                                            <tr>
                                                <th class="header">#</th>
                                                <th class="yellow header headerSortDown">Date</th>
                                                <th class="green header">Description</th>
                                                <th class="green header">Doctor</th>
                                                <th class="green header">Department</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($query2 as $row) {
                                                echo '<tr>';
                                                echo '<td>' . $i . '</td>';
                                                $i++;
                                                echo '<td>' . $row['date'] . '</td>';
                                                echo '<td>' . $row['description'] . '</td>';
                                                echo '<td>' . $row['name'] . '</td>';
                                                echo '<td>' . $row['dep_id'] . '</td>';

                                                echo '</tr>';
                                            }
                                            ?>      
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="tabs1-pane4">
                                    <table class="table table-striped table-bordered table-condensed">
                                        <thead>
                                            <tr>
                                                <th class="header">#</th>
                                                <th class="yellow header headerSortDown">description</th>
                                                <th class="green header">date</th>
                                                <th class="red header">type</th>
                                                <th class="red header">doctor</th>
                                                <th class="red header">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i=1;
                                            foreach ($reports as $row) {
                                                echo '<tr>';
                                                echo '<td>' . $i. '</td>'; $i++;
                                                echo '<td>' . $row['description'] . '</td>';
                                                echo '<td>' . $row['date'] . '</td>';
                                                echo '<td>' . $row['type'] . ' </td>';
                                                echo '<td>' . $row['name'] . '</td>';
                                                echo '<td class="crud-actions">
                 
                  <a href="' . base_url('') . 'img/projo/' . $row['file'] . '" class="btn btn-danger"> download file</a>
                </td>';
                                                echo '</tr>';
                                            }
                                            ?>      
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="tabs1-pane5">
                                    <table class="table table-striped table-bordered table-condensed">
                                        <thead>
                                            <tr>
                                                <th class="header">#</th>
                                                <th class="yellow header headerSortDown">description</th>
                                                <th class="green header">date</th>
                                                <th class="red header">type</th>
                                                <th class="red header">Document Type</th>
                                                <th class="red header">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i=1;
                                            foreach ($reports as $row) {
                                                echo '<tr>';
                                                 echo '<td>' . $i. '</td>'; $i++;
                                                echo '<td>' . $row['lab_description'] . '</td>';
                                                echo '<td>' . $row['lab_date'] . '</td>';
                                                echo '<td>' .$row['lab_type'].' </td>';
                                                echo '<td>' . $row['document_type'] . '</td>';
                                                echo '<td class="crud-actions">
                       <a href="' . base_url('') . 'img/projo/' . $row['lab_document'] . '" class="btn btn-danger"> download file</a>
                </td>';
                                                echo '</tr>';
                                            }
                                            ?>      
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="tabs1-pane6">
                                    <table class="table table-striped table-bordered table-condensed">
                                        <thead>
                                            <tr>
                                                <th class="header">#</th>
                                                <th class="yellow header headerSortDown">Bed Number</th>
                                                <th class="green header">Bed Type</th>
                                               
                                                <th class="red header">Allotment Date</th>
                                                <th class="red header">Discharge Date</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i=1;
                                            foreach ($allotment as $row) {
                                                echo '<tr>';
                                                echo '<td>' . $i . '</td>';$i++;
                                                echo '<td>' . $row['bedno'] . '</td>';
                                                
                                                echo '<td>' . $row['bedtype'] . '</td>';
                                                echo '<td>' . $row['allotmentdate'] . '</td>';
                                                echo '<td>' . $row['dischargedate'] . '</td>';
                                                
                                                echo '</tr>';
                                            }
                                            ?>      
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="span3 address pull-right">
                        <h6>Address</h6>
                        <!--<iframe width="300" height="133" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.mx/?ie=UTF8&amp;t=m&amp;ll=19.715081,-155.071421&amp;spn=0.010746,0.025749&amp;z=14&amp;output=embed"></iframe>-->
                        <ul>
                            <li>P.O BOX  </li>
                            <?php echo $query[0]['address']; ?><br />
                            <?php echo $query[0]['city']; ?><br />
                            Zip Code, <?php echo $query[0]['pcode']; ?>.<br />
                            <?php echo $query[0]['country']; ?>
                            <li class="ico-li">
                                <img src="<?php echo base_url();?>img/ico-phone.png">
                                <?php echo $query[0]['phone']; ?>
                            </li>
                             <li class="ico-li">
                                <img src="<?php echo base_url();?>img/ico-mail.png">
                                <a href="user-profile.html#"><?php echo $query[0]['email']; ?></a>
                            </li>
                        </ul>
                    </div>

                            </div>
                        </div>

                    </div>
                    <!-- side address column -->
                    
                </div>
            </div>
        </div>
    </div>
    <!-- end main container -->


	<!-- scripts -->
    <?php include("includes/scripts.php")?>
</body>
</html>