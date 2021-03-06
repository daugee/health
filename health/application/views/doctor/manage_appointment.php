


<?php include("includes/header.php") ?>
<body>
    <!-- navbar -->
    <?php include("includes/navbar.php"); ?>
    <!-- end navbar -->

    <!-- sidebar -->
    <?php include("includes/docs/docs_sidebar.php"); ?>
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
                        <h1>Manage Appointment</h1>
                    </div>
                    <?php
                    //flash messages
                    if (isset($flash_message)) {
                        if ($flash_message == TRUE) {
                            echo '<div class="alert alert-success">';
                            echo '<a class="close" data-dismiss="alert">×</a>';
                            echo '<strong>Well done!</strong> the appointment has been booked successful.';
                            echo '</div>';
                        } else {
                            echo '<div class="alert alert-error">';
                            echo '<a class="close" data-dismiss="alert">×</a>';
                            echo '<strong>Oh snap!</strong> Sorry The doctor wont be available then.';
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
                            echo '<strong>Well done!</strong> The prescription Has been updated.';
                            echo '</div>';
                        } else {
                            echo '<div class="alert alert-error">';
                            echo '<a class="close" data-dismiss="alert">×</a>';
                            echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
                            echo '</div>';
                        }
                    }
                    ?>
                    <div class="row">
                        <div class="tabbable span12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tabs1-pane1" data-toggle="tab">Appointment list</a></li>
                                <li><a href="#tabs1-pane2" data-toggle="tab">+Add Appointment</a></li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs1-pane1">
                                    <div>
                                        <a href="javascript:demoFromHTML()" class="button" style="alignment-adjust:middle" target=" " ><button>Print report</button></a>
                                    </div>
                                    <table class="table table-striped table-bordered table-condensed" id="table">
                                        <thead>
                                            <tr>
                                                <th class="header">#</th>
                                                <th class="yellow header headerSortDown">Date</th>
                                                <th class="green header">Patient</th>
                                                <th class="green header">Doctor</th>
                                                <th class="red header">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($query as $row) {
                                                echo '<tr>';
                                                echo '<td>' . $i . '</td>';
                                                $i++;
                                                echo '<td>' . $row['date'] . '</td>';
                                                echo '<td>' . $row['name'] . '&nbsp' . $row['lname'] . '</td>';
                                                echo '<td>' . $name . '</td>';
                                                echo '<td class="crud-actions">
                  <a href="' . site_url("doctor") . '/edit_appointment/' . $row['id'] . '" class="btn btn-info">view & edit</a>  
                 
                </td>';
                                                echo '</tr>';
                                                echo '<input type="hidden" name="id" value="' . $row['id'] . '" /> ';
                                            }
                                            ?>


                                        </tbody>
                                    </table>
                                    <?php echo '<div class="pagination">' . $this->pagination->create_links() . '</div>'; ?>
                                </div>
                                <div class="tab-pane" id="tabs1-pane2">
                                    <div classs="row">
                                        <div class="span6">
                                            <?php
//form validation
                                            echo validation_errors();
                                            ?>
                                            <form method="post" action="<?php echo site_url('doctor/add_appointment'); ?>" id="formID" class="form-horizontal" >
                                                <fieldset>

                                                    <!-- Form Name -->
                                                    <legend>Add Appointment</legend>

                                                    <!-- Select Basic -->
                                                    <div class="control-group">
                                                        <label class="control-label" for="Doctor">Doctor</label>
                                                        <div class="controls">
                                                            <select id="doctor" name="doctor" class="input-medium">
                                                                <?php
                                                                foreach ($doctor as $row) {
                                                                    echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
                                                                }
                                                                ?>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Select Basic -->
                                                    <div class="control-group">
                                                        <label class="control-label" for="Patient">patient</label>
                                                        <div class="controls">
                                                            <select id="Patient" name="patient" class="input-medium">
                                                                <?php
                                                                foreach ($result as $row) {
                                                                    echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Textarea -->
                                                    <div class="control-group">
                                                        <label class="control-label" for="description">Description</label>
                                                        <div class="controls">                     
                                                            <textarea id="description" name="description" value="<?php echo set_value('description'); ?>"></textarea>
                                                        </div>
                                                    </div>
                                                    
                                                     <div class="control-group">
                                                        <div id="datetimepicker2" class="input-append">
                                                             <label class="control-label" for="appointment date">appointment date</label>
                                                             <div class="controls">
                                                            <input data-format="yyyy/MM/dd HH:mm:ss PP"  name="appointmentdate" type="text"></input>
                                                            <span class="add-on">
                                                                <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                                                                </i>
                                                            </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                      
                                                    <!-- Text input-->
<!--                                                    <div class="control-group">
                                                        <label class="control-label" for="appointment date">appointment date</label>
                                                        <div class="controls">
                                                            <input type="text" name="appointmentdate" value="appointment date" class="input-medium datepicker"  data-date-format="yyyy/mm/dd" />
                                                        </div>
                                                    </div>-->
                                                   






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
                                        <div class="span6">
                                            <?php
//form validation
                                            echo validation_errors();
                                            ?>
                                            <form class="" class="form-horizontal">
                                                <fieldset>

                                                    <!-- Form Name -->
                                                    <legend>Booked Dates</legend>

                                                    <table class="table table-striped table-bordered table-condensed" id="table">
                                                        <caption>Date booked</caption>
                                                        <thead>
                                                            <tr>
                                                                <th class="header">#</th>
                                                                <th class="yellow header headerSortDown">Date</th>
                                                                <th class="green header">Doctor</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $i = 1;
                                                            foreach ($appointment as $row) {
                                                                echo '<tr>';
                                                                echo '<td>' . $i . '</td>';
                                                                $i++;
                                                                echo '<td>' . $row['date'] . '</td>';
                                                                echo '<td>' . $row['name'] . '</td>';

                                                                echo '<input type="hidden" name="id" value="' . $row['id'] . '" /> ';
                                                            }
                                                            ?>


                                                        </tbody>
                                                    </table>
                                                </fieldset>



                                            </form>

                                        </div>
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


        // datepicker plugin
        $('.datepicker').datepicker().on('changeDate', function(ev) {
            $(this).datepicker('hide');
        });

    });
</script>

<script type="text/javascript">
    $(function() {
        $('#datetimepicker2').datetimepicker({
            language: 'en',
            pick12HourFormat: true
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
