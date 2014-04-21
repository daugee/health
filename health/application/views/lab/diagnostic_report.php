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
                        <h1>Diagnostic Report</h1>
                    </div>
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
                    <div class="row">
                       
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tabs1-pane1" data-toggle="tab">Diagnostic Report</a></li>
                              

                            </ul>
                            

                                    <table class="table table-striped table-bordered table-condensed">
                                        <thead>
                                            <tr>
                                                <th class="header">#</th>
                                                <th class="yellow header headerSortDown">date</th>
                                                <th class="green header">Patient</th>
                                                <th class="green header">Doctor</th>
                                                <th class="green header">Report Status</th>
                                                <th class="red header">Options</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $i=1;
                                        foreach ($results as $row) {
                                            echo '<tr>';
                                            echo '<td>' . $i . '</td>';$i++;
                                            echo '<td>' . $row['date'] . '</td>';
                                            echo '<td>' . $row['lname'] .'</td>';
                                            echo '<td>' . $row['name'] . '</td>';
                                            echo '<td> <button id="add" name="add" class="btn btn-primary">0 Report</button></td>';
                                            echo '<td class="crud-actions">
                  <a href="' . site_url("lab") . '/edit_diagnostic_report/' . $row['id'] . '/' . $row['patientid'] . '" class="btn btn-info">view & edit</a>  
                 
                </td>';
                                            echo '</tr>';
                                            echo '<input type="hidden" name="id" value="' . $row['id'] . '" /> ';
                                            echo '<input type="hidden" name="patientid" value="' . $row['patientid'] . '" /> ';
                                        }
                                        ?>   
                                    </table>

                                
                           

                        
                   
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
        $('input[type=file]').bootstrapFileInput();
        $('.file-inputs').bootstrapFileInput();
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
