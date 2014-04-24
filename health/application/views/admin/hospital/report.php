
<?php include("includes/header.php") ?>
<body>
    <!-- navbar -->
    <?php include("includes/navbar.php"); ?>
    <!-- end navbar -->
    <?php include("includes/admin/sidebar.php"); ?>

    <style type="text/css" title="currentStyle">
        @import "<?php echo base_url(); ?>dt2/css/demo_page.css";
        @import "<?php echo base_url(); ?>dt2/css/demo_table.css";
    </style>
    <div class="content">

        <!-- settings changer -->
        <div class="container-fluid">
            <div id="pad-wrapper" class="form-page">

                <div class="row-fluid form-wrapper">
                    <!-- left column -->
                    <div class="page-header">
                        <h1>REPORT MODULE</h1>
                    </div>

                    <div class="row">

                        <div class="tabbable span12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tabs1-pane1" data-toggle="tab">Operation</a></li>
                                <li><a href="#tabs1-pane2" data-toggle="tab">Birth</a></li>
                                <li><a href="#tabs1-pane3" data-toggle="tab">Death</a></li>
                                <li><a href="#tabs1-pane4" data-toggle="tab">other</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs1-pane1">
                                    <div class="span2">
                                        <a href="javascript:demoFromHTML()" class="button" style="alignment-adjust:middle" target=" " ><button>Print report</button></a>
                                    </div>
                                    <table class="table table-striped table-bordered table-condensed" id="table">
                                        <thead>
                                            <tr>
                                                <th class="header">#</th>
                                                <th class="yellow header headerSortDown">description</th>
                                                <th class="green header">date</th>
                                                <th class="red header">patient</th>
                                                <th class="red header">doctor</th>
                                                <th class="red header">Files</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($query as $row) {
                                                echo '<tr>';
                                                echo '<td>' . $row['id'] . '</td>';
                                                echo '<td>' . $row['description'] . '</td>';
                                                echo '<td>' . $row['date'] . '</td>';
                                                echo '<td>' . $row['patient'] . '</td>';
                                                echo '<td>' . $row['doctor'] . '</td>';
                                                echo '<td class="crud-actions">
                 <a href="' . base_url('') . 'img/projo/' . $row['file'] . '" class="btn btn-danger">file</a>
                       </td>';
                                                echo '</tr>';
                                            }
                                            ?>      
                                        </tbody>
                                    </table>



                                </div>
                                <div class="tab-pane" id="tabs1-pane2">
                                    <div class="span2">
                                        <a href="javascript:demo()" class="button" style="alignment-adjust:middle" target=" " ><button>Print report</button></a>
                                    </div>
                                    <table class="table table-striped table-bordered table-condensed" id="table1">
                                        <thead>
                                            <tr>
                                                <th class="header">#</th>
                                                <th class="yellow header headerSortDown">description</th>
                                                <th class="green header">date</th>
                                                <th class="red header">patient</th>
                                                <th class="red header">doctor</th>
                                                <th class="red header">Files</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($q as $row) {
                                                echo '<tr>';
                                                echo '<td>' . $row['id'] . '</td>';
                                                echo '<td>' . $row['description'] . '</td>';
                                                echo '<td>' . $row['date'] . '</td>';
                                                echo '<td>' . $row['patient'] . '</td>';
                                                echo '<td>' . $row['doctor'] . '</td>';
                                                echo '<td class="crud-actions">
                 <a href="' . base_url('') . 'img/projo/' . $row['file'] . '" class="btn btn-danger">file</a>
                       </td>';
                                                echo '</tr>';
                                            }
                                            ?>      
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="tabs1-pane3">
                                    <div class="span2">
                                        <a href="javascript:demoFrom()" class="button" style="alignment-adjust:middle" target=" " ><button>Print report</button></a>
                                    </div>
                                    <table class="table table-striped table-bordered table-condensed" id="table2">
                                        <thead>
                                            <tr>
                                                <th class="header">#</th>
                                                <th class="yellow header headerSortDown">description</th>
                                                <th class="green header">date</th>
                                                <th class="red header">patient</th>
                                                <th class="red header">doctor</th>
                                                <th class="red header">Files</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
foreach ($d as $row) {
    echo '<tr>';
    echo '<td>' . $row['id'] . '</td>';
    echo '<td>' . $row['description'] . '</td>';
    echo '<td>' . $row['date'] . '</td>';
    echo '<td>' . $row['patient'] . '</td>';
    echo '<td>' . $row['doctor'] . '</td>';
    echo '<td class="crud-actions">
                 <a href="' . base_url('') . 'img/projo/' . $row['file'] . '" class="btn btn-danger">file</a>
                       </td>';
    echo '</tr>';
}
?>      
                                        </tbody>
                                    </table>

                                </div>
                                <div class="tab-pane" id="tabs1-pane4">
                                    <div class="span2">
                                        <a href="javascript:demoFromHTML1()" class="button" style="alignment-adjust:middle" target=" " ><button>Print report</button></a>
                                    </div>
                                    <table class="table table-striped table-bordered table-condensed" id="table3">
                                        <thead>
                                            <tr>
                                                <th class="header">#</th>
                                                <th class="yellow header headerSortDown">description</th>
                                                <th class="green header">date</th>
                                                <th class="red header">patient</th>
                                                <th class="red header">doctor</th>
                                                <th class="red header">Files</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
foreach ($oth as $row) {
    echo '<tr>';
    echo '<td>' . $row['id'] . '</td>';
    echo '<td>' . $row['description'] . '</td>';
    echo '<td>' . $row['date'] . '</td>';
    echo '<td>' . $row['patient'] . '</td>';
    echo '<td>' . $row['doctor'] . '</td>';
    echo '<td class="crud-actions">
                 <a href="' . base_url('') . 'img/projo/' . $row['file'] . '" class="btn btn-danger">file</a>
                       </td>';
    echo '</tr>';
}
?>      
                                        </tbody>
                                    </table>

                                </div>

                            </div><!-- /.tab-content -->
                        </div><!-- /.tabbable -->
                    </div><!-- /.row -->


                    <!-- end blank state -->

                </div>

            </div>

            <!-- end main container -->


            <!-- this page scripts -->
<?php include("includes/scripts.php"); ?>
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
                    var pdf = new jsPDF('p', 'pt', 'letter'), source = $('#tabs1-pane1')[0]  // This is your HTML Div to generate pdf
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
            
            
            <script type="text/javascript">
                function demo() {
                    var pdf = new jsPDF('p', 'pt', 'letter'), source = $('#tabs1-pane2')[0]  // This is your HTML Div to generate pdf
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
            
            <script type="text/javascript">
                function demoFrom() {
                    var pdf = new jsPDF('p', 'pt', 'letter'), source = $('#tabs1-pane3')[0]  // This is your HTML Div to generate pdf
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
            <script type="text/javascript">
                function demoFromHTML1() {
                    var pdf = new jsPDF('p', 'pt', 'letter'), source = $('#tabs1-pane4')[0]  // This is your HTML Div to generate pdf
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
                    $('#table1').dataTable();
                    $('#table2').dataTable();
                    $('#table3').dataTable();
                });
            </script>

            </body>