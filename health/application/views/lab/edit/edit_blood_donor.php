<?php include("includes/header.php") ?>
<body>
    <!-- navbar -->
    <?php include("includes/navbar.php"); ?>
    <!-- end navbar -->

    <!-- sidebar -->
     <?php include("includes/lab/sidebar.php"); ?>
    <!-- end sidebar -->


    <!-- main container -->
    <div class="content">

        <!-- settings changer -->


        <div class="container-fluid">
            <div id="pad-wrapper" class="form-page">
                <div class="row-fluid form-wrapper">
                    <!-- left column -->
                    <div class="page-header">
                        <h1>Manage Blood Donors</h1>
                    </div>

                    <div class="row">
                        <div class="tabbable span12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tabs1-pane1" data-toggle="tab"> Edit Blood Donor</a></li>
                                <li><a href="#tabs1-pane2" data-toggle="tab">blood donor list</a></li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs1-pane1">
                                    <?php
                                    //flash messages
                                    if (isset($flash_message)) {
                                        if ($flash_message == TRUE) {
                                            echo '<div class="alert alert-success">';
                                            echo '<a class="close" data-dismiss="alert">×</a>';
                                            echo '<strong>Well done!</strong> new patient created with success.';
                                            echo '</div>';
                                        } else {
                                            echo '<div class="alert alert-error">';
                                            echo '<a class="close" data-dismiss="alert">×</a>';
                                            echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
                                            echo '</div>';
                                        }
                                    }
                                    ?>
                                    <?php
                                    //form validation
                                    echo validation_errors();
                                    ?> 
                                    <form method="post" action="<?php echo site_url('lab/edit_donors/'.$results[0]['id'].''); ?>" id="formID" class="form-horizontal" >

                                        <fieldset>

                                            <!-- Form Name -->
                                            <legend>New Blood Donor</legend>

                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="Donor Name">Name</label>
                                                <div class="controls">
                                                    <input id="Patient Name" name="name" type="text"  class="input-medium" required="" value="<?php echo $results[0]['name']; ?>">

                                                </div>
                                            </div>

                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="Email">Email</label>
                                                <div class="controls">
                                                    <input id="Email" name="email" type="text"  class="input-medium" required="" value="<?php echo $results[0]['email']; ?>">

                                                </div>
                                            </div>

                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="address">Address</label>
                                                <div class="controls">
                                                    <input id="address" name="address" type="text"  class="input-medium" required="" value="<?php echo $results[0]['address']; ?>">

                                                </div>
                                            </div>

                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="phoneno">Phone</label>
                                                <div class="controls">
                                                    <input id="phoneno" name="phone" type="text"  class="input-medium" required=""value="<?php echo $results[0]['phone']; ?>">

                                                </div>
                                            </div>

                                            <!-- Select Basic -->
                                            <div class="control-group">
                                                <label class="control-label" for="Gender">Gender</label>
                                                <div class="controls">

                                                    <select id="Gender" name="gender" class="input-medium" >
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="age">Age</label>
                                                <div class="controls">
                                                    <input id="age" name="age" type="text" class="input-medium" required="" value="<?php echo $results[0]['age']; ?>">

                                                </div>
                                            </div>

                                            <!-- Select Basic -->
                                            <div class="control-group">
                                                <label class="control-label" for="bloodgroup">Blood Group</label>
                                                <div class="controls">
                                                    <select id="bloodgroup" name="bloodgroup" class="input-medium" >
                                                        <option value="A+">A+</option>
                                                        <option value="A-">A-</option>
                                                        <option value="B+">B+</option>
                                                        <option value="B-">B-</option>
                                                        <option value="AB+">AB+</option>
                                                        <option value="AB-">AB-</option>
                                                        <option value="O+">O+</option>
                                                        <option value="O-">O-</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="Birthdate">Last Donation Date</label>
                                                <div class="controls">
                                                    <input type="text" name="donationdate" value="<?php echo $results[0]['donationdate']; ?>" class="input-medium datepicker" data-date-format="yyyy/mm/dd" required="" />

                                                </div>
                                            </div>
                                            <input  name="id" type="hidden" value="<?php echo $results[0]['id']; ?>">
                                            <!-- Button -->
                                            <div class="control-group">
                                                <label class="control-label" for="Addblooddonor"></label>
                                                <div class="controls">
                                                    <button id="AddPatient" name="Addblooddonor" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>

                                        </fieldset>
                                    </form>
                                </div>
                                <div class="tab-pane" id="tabs1-pane2">
                                    <table class="table table-striped table-bordered table-condensed">
                                        <thead>
                                            <tr>
                                                <th class="header">#</th>
                                                <th class="yellow header headerSortDown">Name</th>
                                                <th class="green header">Age</th>
                                                <th class="green header">Sex</th>
                                                <th class="green header">Blood Group</th>
                                                <th class="green header">Last Donation Date</th>
                                                <th class="red header">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($results as $row) {
                                                echo '<tr>';
                                                echo '<td>' . $row['id'] . '</td>';
                                                echo '<td>' . $row['name'] . '</td>';
                                                echo '<td>' . $row['age'] . '</td>';
                                                echo '<td>' . $row['gender'] . '</td>';
                                                echo '<td>' . $row['bloodgroup'] . '</td>';
                                                echo '<td>' . $row['donationdate'] . '</td>';
                                                echo '<td class="crud-actions">
                  <a href="' . site_url("nurse") . '/donors_update/' . $row['id'] . '" class="btn btn-info">view & edit</a>  
                 
                </td>';
                                                echo '</tr>';
                                            }
                                            ?>      
                                        </tbody>
                                    </table>
                                    <?php echo '<div class="pagination">' . $this->pagination->create_links() . '</div>'; ?>


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

<!-- scripts for this page -->
<?php include("includes/scripts.php") ?>

<!-- call this page plugins -->
<script type="text/javascript">
    $(function() {


        // select2 plugin for select elements
        $(".select2").select2({
            placeholder: "Select a State"
        });

        // datepicker plugin
        $('.datepicker').datepicker().on('changeDate', function(ev) {
            $(this).datepicker('hide');
        });


    });
</script>
</body>
