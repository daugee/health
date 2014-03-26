<?php include("includes/header.php") ?>
<body>
    <!-- navbar -->
    <?php include("includes/navbar.php"); ?>
    <!-- end navbar -->

    <!-- sidebar -->
    <?php include("includes/pharmacy/sidebar.php"); ?>
    <!-- end sidebar -->


    <!-- main container -->
    <div class="content">

        <!-- settings changer -->


        <div class="container-fluid">
            <div id="pad-wrapper" class="form-page">
                <div class="row-fluid form-wrapper">
                    <!-- left column -->
                    <div class="page-header">
                        <h1>Manage Prescription</h1>
                    </div>

                    <div class="row">
                        <div class="tabbable span12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tabs1-pane1" data-toggle="tab">Prescription List</a></li>
                                <!--									<li><a href="#tabs1-pane2" data-toggle="tab">+add Medicine </a></li>-->

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs1-pane1">
                                    <form method="post" action="<?php echo site_url('pharmacy/update_prescription'); ?>" id="formID" class="form-horizontal" >					
                                        <fieldset>

                                            <!-- Form Name -->
                                            <legend>Edit Patient Prescription</legend>
                                            <input type="hidden" value="<?php echo $query[0]['id']; ?>" name="id"/>
                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="doctor">Doctor</label>
                                                <div class="controls">
                                                    <input id="doctor" name="doctor" type="text" value="<?php echo $query[0]['dname']; ?>" class="input-medium" readonly>
                                                    
                                                </div>
                                            </div>

                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="patient">Patient</label>
                                                <div class="controls">
                                                    <input id="patient" name="patient" type="text" value="<?php echo $query[0]['name']; ?>" class="input-medium" readonly>

                                                </div>
                                            </div>

                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="casehistory">Case History</label>
                                                <div class="controls">
                                                    <input id="casehistory" name="casehistory" type="text"value="<?php echo $query[0]['casehistory']; ?>" class="input-medium" readonly>

                                                </div>
                                            </div>

                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="medication">Medication</label>
                                                <div class="controls">
                                                    <input id="medication" name="medication" type="text" value="<?php echo $query[0]['medication']; ?>" class="input-medium" readonly>

                                                </div>
                                            </div>

                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="date">Date</label>
                                                <div class="controls">
                                                    <input id="date" name="date" type="text" value="<?php echo $query[0]['date']; ?>" class="input-medium" readonly>

                                                </div>
                                            </div>

                                            <!-- Textarea -->
                                            <div class="control-group">
                                                <label class="control-label" for="description">Medication From Pharmacist</label>
                                                <div class="controls">                     
                                                    <textarea id="description" name="medicationpharmacist" ><?php echo $query[0]['medicationpharmacist']; ?></textarea>
                                                </div>
                                            </div>

                                            <!-- Textarea -->
                                            <div class="control-group">
                                                <label class="control-label" for="description">Description</label>
                                                <div class="controls">                     
                                                    <textarea id="description" name="description"  ><?php echo $query[0]['description']; ?></textarea>
                                                </div>
                                            </div>

                                            <!-- Button -->
                                            <div class="control-group">
                                                <label class="control-label" for="addmed"></label>
                                                <div class="controls">
                                                    <button id="addmed" name="addmed" class="btn btn-primary">Edit Prescription</button>
                                                </div>
                                            </div>

                                        </fieldset>
                                    </form>


                                </div>
                                <div class="tab-pane" id="tabs1-pane2">
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
                                    <table class="table table-striped table-bordered table-condensed">
                                        <thead>
                                            <tr>
                                                <th class="header">#</th>
                                                <th class="yellow header headerSortDown">Date</th>
                                                <th class="yellow header headerSortDown">Patient</th>
                                                <th class="green header">Doctor</th>
                                                <th class="red header">Actions</th>
                                            </tr>
                                        </thead>
                            <!--             <tbody>
                                        <?php
                                        foreach ($query as $row) {
                                            echo '<tr>';
                                            echo '<td>' . $row['id'] . '</td>';
                                            echo '<td>' . $row['bedno'] . '</td>';
                                            echo '<td>' . $row['bedtype'] . '</td>';
                                            echo '<td class="crud-actions">
                  <a href="' . site_url("admin") . '/products/update/' . $row['id'] . '" class="btn btn-info">view & edit</a>  
                  <a href="' . site_url("admin") . '/products/delete/' . $row['id'] . '" class="btn btn-danger">delete</a>
                </td>';
                                            echo '</tr>';
                                        }
                                        ?>      
                                        </tbody>-->
                                    </table>


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

            // add uniform plugin styles to html elements
            $("input:checkbox, input:radio").uniform();

            // select2 plugin for select elements
            $(".select2").select2({
                placeholder: "Select a State"
            });

            // datepicker plugin
            $('.datepicker').datepicker().on('changeDate', function(ev) {
                $(this).datepicker('hide');
            });

            // wysihtml5 plugin on textarea
            $(".wysihtml5").wysihtml5({
                "font-styles": false
            });
        });
    </script>
</body>



