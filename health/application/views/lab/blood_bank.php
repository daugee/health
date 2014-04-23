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
                        <h1>View Blood Bank</h1>
                    </div>

                    <div class="row">
                        <div class="tabbable span12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tabs1-pane1" data-toggle="tab">View blood bank</a></li>
                                <li><a href="#tabs1-pane2" data-toggle="tab">Visualizer</a></li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs1-pane1">

                                    <table class="table table-striped table-bordered table-condensed">
                                        <thead>
                                            <tr>
                                                <th class="header">#</th>
                                                <th class="yellow header headerSortDown">Blood Group</th>
                                                <th class="green header">Status</th>

                                            </tr>
                                        </thead
                                        <tbody>
                                            <tr> 
                                                <td>1</td>
                                                <td>A+</td>
                                                <td><?php echo $a; ?> bags</td>

                                            </tr>
                                            <tr> 
                                                <td>2</td>
                                                <td>A-</td>
                                                <td><?php echo $a1; ?> bags</td>

                                            </tr> 
                                            <tr> 
                                                <td>3</td>
                                                <td>B+</td>
                                                <td><?php echo $b; ?> bags</td>

                                            </tr> 
                                            <tr> 
                                                <td>4</td>
                                                <td>B-</td>
                                                <td><?php echo $b1; ?> bags</td>

                                            </tr> 
                                            <tr> 
                                                <td>5</td>
                                                <td>AB+</td>
                                                <td><?php echo $ab; ?> bags</td>

                                            </tr> 
                                            <tr> 
                                                <td>6</td>
                                                <td>AB-</td>
                                                <td><?php echo $ab1; ?> bags</td>

                                            </tr> 
                                            <tr> 
                                                <td>7</td>
                                                <td>O+</td>
                                                <td><?php echo $o; ?> bags</td>

                                            </tr> 
                                            <tr> 
                                                <td>8</td>
                                                <td>O-</td>
                                                <td><?php echo $o1; ?> bags</td>

                                            </tr> 

                                        </tbody>
                                    </table>


                                </div>
                                <div class="tab-pane" id="tabs1-pane2">
                                    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>		
                                   
                                    <script type="text/javascript">

                                        $(function() {
                                            $('#high').highcharts({
                                                chart: {
                                                    plotBackgroundColor: null,
                                                    plotBorderWidth: null,
                                                    plotShadow: false
                                                },
                                                title: {
                                                    text: 'Browser market shares at a specific website, 2014'
                                                },
                                                tooltip: {
                                                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                                                },
                                                plotOptions: {
                                                    pie: {
                                                        allowPointSelect: true,
                                                        cursor: 'pointer',
                                                        dataLabels: {
                                                            enabled: true,
                                                            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                                            style: {
                                                                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                                            }
                                                        }
                                                    }
                                                },
                                                series: [{
                                                        type: 'pie',
                                                        name: 'Browser share',
                                                        data: [
                                                            ['Firefox', 45.0],
                                                            ['IE', 26.8],
                                                            {
                                                                name: 'Chrome',
                                                                y: 12.8,
                                                                sliced: true,
                                                                selected: true
                                                            },
                                                            ['Safari', 8.5],
                                                            ['Opera', 6.2],
                                                            ['Others', 0.7]
                                                        ]
                                                    }]
                                            });
                                        });


                                    </script>
                                    </head>
                                    <body>


                                        <div id="high" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
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
