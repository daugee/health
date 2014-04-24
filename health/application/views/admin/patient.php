<?php include("includes/header.php") ?>
<body>
    <!-- navbar -->
    <?php include("includes/navbar.php"); ?>
    <!-- end navbar -->

    <!-- sidebar -->
    <?php include("includes/admin/sidebar.php"); ?>
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
                        <h1>Patients</h1>
                    </div>

                    <div class="row">
                        <div class="tabbable span12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tabs1-pane1" data-toggle="tab">Patient list</a></li>
                                <li><a href="#tabs1-pane2" data-toggle="tab">Visualizer</a></li>
                                <li><a href="#tabs1-pane3" data-toggle="tab">add patient</a></li>

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
                                    //flash messages
                                    if (isset($flash)) {
                                        if ($flash == TRUE) {
                                            echo '<div class="alert alert-success">';
                                            echo '<a class="close" data-dismiss="alert">×</a>';
                                            echo '<strong>Well done!</strong> patient details has been updated successfull.';
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
                                    //flash messages
                                    if (isset($flash_msg)) {
                                        if ($flash_msg == TRUE) {
                                            echo '<div class="alert alert-success">';
                                            echo '<a class="close" data-dismiss="alert">×</a>';
                                            echo '<strong>Well done!</strong> patient has been removed from the system successfull.';
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
                                    <table class="table table-striped table-bordered table-condensed" id="table">
                                        <div class="span2">
                                            <a href="javascript:demoFromHTML()" class="button" style="alignment-adjust:middle" target=" " ><button>Print report</button></a>
                                        </div>
                                        <thead>
                                            <tr>
                                                <th class="header">#</th>
                                                <th class="yellow header headerSortDown">Patient</th>
                                                <th class="green header">age</th>
                                                <th class="red header">gender</th>
                                                <th class="red header">Blood Group</th>
                                                <th class="red header">Birth Date</th>
                                                <th class="red header">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $a = 0;
                                            $p = 0;
                                            foreach ($query as $row) {
                                                if ($row['sex'] == 'male') {
                                                    $a++;
                                                } else {
                                                    $p++;
                                                }
                                            }
                                            ?>
                                            
                                            <?php
                                            $i = 1;
                                            foreach ($query as $row) {
                                                echo '<tr>';
                                                echo '<td>' . $i . '</td>';
                                                $i++;
                                                echo '<td>' . $row['name'] . '</td>';
                                                echo '<td>' . $row['age'] . '</td>';
                                                echo '<td>' . $row['sex'] . '</td>';
                                                echo '<td>' . $row['bloodgroup'] . '</td>';
                                                echo '<td>' . $row['birthdate'] . '</td>';
                                                echo '<td class="crud-actions">
                 <a href="' . site_url("admin") . '/edit_hospital_patient/' . $row['id'] . '" class="btn btn-info">view & edit</a> 
                     <a href="' . site_url("admin") . '/patient_profile/' . $row['id'] . '" class="btn btn-success">Profile</a>
                 <a href="' . site_url("admin") . '/delete_patient/' . $row['id'] . '" class="btn btn-danger">delete</a>
                </td>';
                                                echo '</tr>';
                                            }
                                            ?>     

                                        </tbody>
                                    </table>
                                    <?php echo '<div class="pagination">' . $this->pagination->create_links() . '</div>'; ?>
                                </div>

                                <div class="tab-pane" id="tabs1-pane2">
                                    <div id="chart1" style="min-width: 700px; height: 400px; margin: 0 auto"></div>
                                    <!--<div id="chart" style="min-width: 310px; height: 400px; margin: 0 auto"></div>-->
                                </div>
                                <div class="tab-pane" id="tabs1-pane3">
                                    <div class="span12">
                                        <div id="fuelux-wizard" class="wizard row-fluid">
                                            <ul class="wizard-steps">
                                                <li data-target="#step1" class="active">
                                                    <span class="step">1</span>
                                                    <span class="title">General <br> information</span>
                                                </li>
                                                <li data-target="#step2">
                                                    <span class="step">2</span>
                                                    <span class="title">Address <br> information</span>
                                                </li>
                                                <li data-target="#step3">
                                                    <span class="step">3</span>
                                                    <span class="title">User <br> Details</span>
                                                </li>
                                                <li data-target="#step4">
                                                    <span class="step">4</span>
                                                    <span class="title">Health <br> info</span>
                                                </li>
                                            </ul>                            
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

                                        <form method="post" action="<?php echo site_url('admin/add_patient'); ?>" id="formID" enctype="multipart/form-data" >
                                            <div class="step-content">

                                                <div class="step-pane active" id="step1">
                                                    <div class="row-fluid form-wrapper">
                                                        <div class="span8">

                                                            <div class="field-box">
                                                                <label>First Name:</label>
                                                                <input name="fname" class="span8" required="" type="text" />
                                                            </div>
                                                            <div class="field-box">
                                                                <label>Last Name:</label>
                                                                <input class="span8" name="lname" type="text" />
                                                            </div>
                                                            <div class="field-box">
                                                                <label>Birth Date:</label>
                                                                <input type="text" name="birthdate" value="Birth date" class="span8 datepicker" data-date-format="yyyy/mm/dd" required="" />
                                                            </div>
                                                            <div class="field-box">
                                                                <label>Age:</label>
                                                                <input class="span8" name="age" type="text" />
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="step-pane" id="step2">
                                                    <div class="row-fluid form-wrapper">
                                                        <div class="span8">

                                                            <div class="field-box">
                                                                <label>phone:</label>
                                                                <input name="phone" class="span8" type="text" />
                                                            </div>
                                                            <div class="field-box">
                                                                <label>Email:</label>
                                                                <input name="email" class="span8" type="text" />
                                                            </div>

                                                            <div class="field-box">
                                                                <label>Address:</label>
                                                                <input name="address" class="span8" type="text" />
                                                            </div>
                                                            <div class="field-box">
                                                                <label>City:</label>
                                                                <input name="city" class="span8" type="text" />
                                                            </div>
                                                            <div class="field-box">
                                                                <label>Postal/ZIP code:</label>
                                                                <input name="pcode" class="span8" type="text" />
                                                            </div>
                                                            <div class="field-box">
                                                                <label>Country:</label>
                                                                <input name="country" class="span8" type="text" />
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="step-pane" id="step3">
                                                    <div class="row-fluid form-wrapper">
                                                        <div class="span8">

                                                            <div class="field-box">
                                                                <label>Gender:</label>
                                                                <select id="Gender" name="gender" class="span8" >
                                                                    <option value="male">Male</option>
                                                                    <option value="female">Female</option>
                                                                </select>
                                                            </div>
                                                            <div class="field-box">
                                                                <label>Blood Group:</label>
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
                                                            <div class="field-box">
                                                                <label>Photo:</label>
                                                                <input type="file" name="image" />
                                                            </div>
                                                            <div class="field-box">
                                                                <label>Password:</label>
                                                                <input name="password" type="text" />
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="step-pane" id="step4">
                                                    <div class="row-fluid form-wrapper payment-info">
                                                        <div class="span8">

                                                            <div class="field-box">
                                                                <label>Weight:</label>
                                                                <input name="weight" class="span5" type="text" />
                                                            </div>
                                                            <div class="field-box">
                                                                <label>Height:</label>
                                                                <input name="height" class="span5" type="text" />
                                                            </div>
                                                            <div class="field-box">
                                                                <label>Temperature:</label>
                                                                <input name="temperature" class="span5" type="text" />
                                                            </div>
                                                            <div class="field-box">
                                                                <label>Health History:</label>
                                                                <input name="history" class="span4" type="text" />
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="wizard-actions">
                                                <button type="button" disabled class="btn-glow primary btn-prev"> 
                                                    <i class="icon-chevron-left"></i> Prev
                                                </button>
                                                <button type="button" class="btn-glow primary btn-next" data-last="Finish">
                                                    Next <i class="icon-chevron-right"></i>
                                                </button>
                                                <button id="add" name="add" class="btn btn-primary btn-finish">
                                                    Add Patient
                                                </button>
                                            </div>
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
    </div>
</div>
<!-- end main container -->

<!-- scripts for this page -->
<?php include("includes/scripts.php") ?>
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>js/theme.js"></script>
<script src="<?php echo base_url(); ?>js/fuelux.wizard.js"></script>
<script type="text/javascript">
  $(function() {
        $('#chart1').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Hospital Departments'
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
                   
                        ['male', <?php echo $a;?>],
                        ['female', <?php echo $p;?>]
                                
                     
                     
                    ]
                }]
        });
    });
</script>
<script type="text/javascript">

    $(function() {
        $('#chart').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Patient Attendance'
            },
            xAxis: {
                categories: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Patients'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                    name: 'male',
                    data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

                }, {
                    name: 'female',
                    data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

                } ]
        });
    });

</script>

<script type="text/javascript">
    $(function() {
        var $wizard = $('#fuelux-wizard'),
                $btnPrev = $('.wizard-actions .btn-prev'),
                $btnNext = $('.wizard-actions .btn-next'),
                $btnFinish = $(".wizard-actions .btn-finish");

        $wizard.wizard().on('finished', function(e) {
            // wizard complete code
        }).on("changed", function(e) {
            var step = $wizard.wizard("selectedItem");
            // reset states
            $btnNext.removeAttr("disabled");
            $btnPrev.removeAttr("disabled");
            $btnNext.show();
            $btnFinish.hide();

            if (step.step === 1) {
                $btnPrev.attr("disabled", "disabled");
            } else if (step.step === 4) {
                $btnNext.hide();
                $btnFinish.show();
            }
        });




        $btnPrev.on('click', function() {
            $wizard.wizard('previous');
        });
        $btnNext.on('click', function() {
            $wizard.wizard('next');
        });


    });

</script>
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
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('#table').dataTable();
    });
</script>



</body>
