<?php include("includes/header.php") ?>
<body>
    <!-- navbar -->
    <?php include("includes/navbar.php"); ?>
    <!-- end navbar -->

    <!-- sidebar -->
    <?php include("includes/patient/sidebar.php"); ?>
    <!-- end sidebar -->


    <!-- main container -->
    <div class="content">

        <!-- settings changer -->


        <div class="container-fluid">
            <div id="pad-wrapper" class="form-page">
                <div class="row-fluid form-wrapper">
                    <!-- left column -->
                    <div class="page-header">
                        <h1>View Appointment</h1>
                    </div>

                    <div class="row">
                        <div class="tabbable span12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tabs1-pane1" data-toggle="tab">Appointment list</a></li>
                               

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs1-pane1">
                                    
                                    <table class="table table-striped table-bordered table-condensed">
                                        <thead>
                                            <tr>
                                                <th class="header">#</th>
                                                <th class="yellow header headerSortDown">Date</th>
                                                <th class="green header">Doctor</th>
                                                <th class="green header">Department</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i=1;
                                            foreach ($query as $row) {
                                                echo '<tr>';
                                                echo '<td>' . $i. '</td>';$i++;
                                                echo '<td>' . $row['date'] . '</td>';
                                                echo '<td>' . $row['dname'] . '</td>';
                                                echo '<td>' . $row['dept'] . '</td>';
                                                
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
