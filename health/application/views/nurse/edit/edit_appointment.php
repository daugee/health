<?php include("includes/header.php") ?>
<body>
    <!-- navbar -->
    <?php include("includes/navbar.php"); ?>
    <!-- end navbar -->

    <!-- sidebar -->
    <?php include("includes/docs/docs_sidebar.php"); ?>
    <!-- end sidebar -->


    <!-- main container -->
    <div class="content">

        <!-- settings changer -->


        <div class="container-fluid">
            <div id="pad-wrapper" class="form-page">
                <div class="row-fluid form-wrapper">
                    <!-- left column -->
                    <div class="page-header">
                        <h1>Manage Appointment</h1>
                    </div>

                    <div class="row">
                        <div class="tabbable span12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tabs1-pane1" data-toggle="tab">Edit Appointment</a></li>
                                

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
                                    <form method="post" action="<?php echo site_url('doctor/edit_patient_appointment/'.$query[0]['id'].''); ?>" id="formID" class="form-horizontal" >
                                        <fieldset>

                                            <!-- Form Name -->
                                            <legend>Edit Appointment</legend>

                                            <!-- Select Basic -->
                                            <div class="control-group">
                                                <label class="control-label" for="Doctor">Doctor</label>
                                                <div class="controls">
                                                    <input type="text" name="doctor" placeholder="<?php echo $name ?>" value='<?php echo $query[0]['doctor']; ?>' class="input-medium"   disabled/> 
                                                </div>
                                            </div>

                                            <!-- Select Basic -->
                                            <div class="control-group">
                                                <label class="control-label" for="Patient">patient</label>
                                                <div class="controls">
                                                    <input type="text" name="patient" placeholder="<?php echo $query[0]['name']; ?>" values='<?php echo $query[0]['patient']; ?>'class="input-medium"  disabled /> 
                                                </div>
                                            </div>

                                            <!-- Textarea -->
                                            <div class="control-group">
                                                <label class="control-label" for="description">Description</label>
                                                <div class="controls">                     
                                                    <textarea id="description" name="description" value=""><?php echo $query[0]['description']; ?></textarea>
                                                </div>
                                            </div>

                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="appointment date">appointment date</label>
                                                <div class="controls">
                                                    <input type="text" name="appointmentdate" value="<?php echo $query[0]['date']; ?>" class="input-medium datepicker"  data-date-format="yyyy/mm/dd" />
                                                </div>
                                            </div>
                                            <input type="hidden" name="id" value='<?php echo $query[0]['id']; ?>' class="input-medium"   disabled/> 
                                            <input type="hidden" name="patient" value='<?php echo $query[0]['patient']; ?>' class="input-medium"   disabled/> 
                                            <input type="hidden" name="doctor" value='<?php echo $query[0]['doctor']; ?>' class="input-medium"   disabled/> 



                                            <!-- Button -->
                                            <div class="control-group">
                                                <label class="control-label" for="Add Appointment"></label>
                                                <div class="controls">
                                                    <button id="Add bed allotment" name="Add appointment" class="btn btn-primary">add Appointment</button>
                                                </div>
                                            </div>

                                        </fieldset>
                                    </form>   
                                </div>
                                    
                              
                                </div>
                            </div>

                        </div><!-- /.tab-content -->
                    </div><!-- /.tabbable -->
                </div><!-- /.row -->


                <!-- right column -->

            </div>
        </div>
 
<!-- end main container -->

<!-- scripts for this page -->
<?php include("includes/scripts.php") ?>

<!-- call this page plugins -->
<script type="text/javascript">
    $(function() {

     

        // datepicker plugin
        $('.datepicker').datepicker().on('changeDate', function(ev) {
            $(this).datepicker('hide');
        });

    });
</script>
</body>
