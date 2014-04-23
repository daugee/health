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
 <div>
<a href="javascript:demoFromHTML()" class="button" style="alignment-adjust:middle" target=" " ><button>Print report</button></a>
</div>
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
                                        if (isset($flash_message)) {
                                            if ($flash_message == TRUE) {
                                                $i = 1;
                                                foreach ($query as $row) {
                                                    echo '<tr>';
                                                    echo '<td>' . $i . '</td>';
                                                    $i++;
                                                    echo '<td>' . $row['date'] . '</td>';
                                                    echo '<td>' . $row['name'] . '</td>';
                                                    echo '<td>' . $row['casehistory'] . '</td>';
                                                    echo '<td>' . $row['medication'] . '</td>';
                                                    echo '<td>' . $row['description'] . '</td>';
                                                    echo '</tr>';
                                                    echo '<input type="hidden" name="id" value="' . $row['id'] . '" /> ';
                                                }
                                            } else {
                                                echo '<div class="alert alert-error">';
                                                echo '<a class="close" data-dismiss="alert">×</a>';
                                                echo '<strong>You dont have any prescription</strong>';
                                                echo '</div>';
                                            }
                                        }
                                        ?>


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

<script type="text/javascript">
            function demoFromHTML() {
                var pdf = new jsPDF('p','pt','letter'), source = $('#tabs1-pane1')[0]  // This is your HTML Div to generate pdf
                , specialElementHandlers = {
                    '#bypassme': function(element, renderer){
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
                    'width':500.5 // max width of content on PDF
                    , 'elementHandlers': specialElementHandlers
                }
            )
                pdf.output('dataurl')
            }
        </script>

</body>
