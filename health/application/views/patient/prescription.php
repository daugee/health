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

                                    <table class="table table-striped table-bordered table-condensed">
                                        <thead>
                                            <tr>
                                                <th class="header">#</th>
                                                <th class="yellow header headerSortDown">Date</th>
                                                <th class="green header">Doctor</th>
                                                <th class="red header">Actions</th>
                                            </tr>
                                        </thead>
                           //<?php
//                           
//                                            foreach ($query as $row) {
//                                                echo '<tr>';
//                                                echo '<td>' . $row['id'] . '</td>';
//                                                echo '<td>' . $row['date'] . '</td>';
//                                                echo '<td>' . $row['name'] .'&nbsp'.$row['lname']. '</td>';
//                                                echo '<td>' . $row['dname'] . '</td>';
//                                                echo '<td class="crud-actions">
//                  <a href="' . site_url("pharmacy") . '/edit_prescription/' . $row['id'] . '" class="btn btn-info">view & edit</a>  
//                 
//                </td>';
//                                                echo '</tr>';
//                                                echo      '<input type="hidden" name="id" value="'.$row['id'].'" /> ';    
//                                            }
//                                            ?>      
                                    </table>


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
