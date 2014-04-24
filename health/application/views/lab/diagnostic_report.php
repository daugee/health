<?php include("includes/header.php") ?>
<body>
    <!-- navbar -->
    <?php include("includes/navbar.php"); ?>
    <!-- end navbar -->

    <!-- sidebar -->
    <?php include("includes/lab/sidebar.php"); ?>
    <!-- end sidebar -->
<style type="text/css" title="currentStyle">
        @import "<?php echo base_url(); ?>dt2/css/demo_page.css";
        @import "<?php echo base_url(); ?>dt2/css/demo_table.css";
    </style>


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
                    <div class="row" id="report">
                       
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tabs1-pane1" data-toggle="tab">Diagnostic Report</a></li>
                              

                            </ul>
                            
<div class="span2">
                                        <a href="javascript:demoFromHTML()" class="button" style="alignment-adjust:middle" target=" " ><button>Print report</button></a>
                                    </div>
                                    <table class="table table-striped table-bordered table-condensed" id="table">
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


        // datepicker plugin
        $('.datepicker').datepicker().on('changeDate', function(ev) {
            $(this).datepicker('hide');
        });

    });
</script>




<script type="text/javascript">
    function demoFromHTML() {
        var pdf = new jsPDF('p', 'pt', 'letter'), source = $('#report')[0]  // This is your HTML Div to generate pdf
                , specialElementHandlers = {
            '#bypassme': function(element, renderer) {
                return true
            }
        }


        pdf.setProperties({
            title: 'Title',
            subject: 'This is the subject',
            author: 'James Hall'
                    // keywords: 'generated, javascript, web 2.0, ajax',
                    //creator: 'MEEE'
        });

        pdf.fromHTML(
                source // HTML string or DOM elem ref.
                , 50 // x coord
                , 10 // y coord
                , {
            'width': 500.5 // max width of content on PDF
                    , 'elementHandlers': specialElementHandlers
        }
        )
        pdf.output('dataurl')
    }
</script>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('#table').dataTable();
    });
</script>
</body>
