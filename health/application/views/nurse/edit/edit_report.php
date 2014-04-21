
<?php include("includes/header.php") ?>
<body>
    <!-- navbar -->
    <?php include("includes/navbar.php"); ?>
    <!-- end navbar -->
    <?php include("includes/sidebar.php"); ?>
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

                        <div class="tabbable span12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tabs1-pane1" data-toggle="tab">Edit Report</a></li>
                                <li><a href="#tabs1-pane2" data-toggle="tab">Report</a></li>
                              

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs1-pane1">
                                   
                                    <form method="post" action="<?php echo site_url('nurse/edit_nurse_report'); ?>" id="formID" class="form-horizontal" enctype="multipart/form-data" >
                                        <fieldset>

                                            <!-- Form Name -->
                                            <legend>REPORT</legend>

                                            <!-- Select Basic -->
                                            <div class="control-group">
                                                <label class="control-label" for="type">Type</label>
                                                <div class="controls">
                                                    <select id="type" name="type" class="input-medium">
                                                        <option value="operation">Operation</option>
                                                        <option value="birth">Birth</option>
                                                        <option value="death">Death</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Search input-->
                                            <div class="control-group">
                                                <label class="control-label" for="Doctor">Doctor</label>
                                                <div class="controls">
                                                   
                                                       <input type="text" name="doctor" value="<?php echo $this->session->userdata('name'); ?>" class="input-medium" readonly />

                                                  
                                                </div>
                                            </div>

                                            <!-- Search input-->
                                            <div class="control-group">
                                                <label class="control-label" for="Patient">Patient</label>
                                                <div class="controls">
                                                     <input type="text" name="patient" value="<?php echo $query[0]['lname']; ?>" class="input-medium" readonly />

                                                      <input type="hidden" value="<?php echo $query[0]['id']; ?>" name="id"/>
                                                </div>
                                            </div>

                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="date">Date</label>
                                                <div class="controls">
                                                    <input type="text" name="date" value="<?php echo $query[0]['date']; ?>" class="input-medium datepicker" required="" data-date-format="yyyy/mm/dd" />
                                                </div>
                                            </div>


                                            <!-- Textarea -->
                                            <div class="control-group">
                                                <label class="control-label" for="description">Description</label>
                                                <div class="controls">                     
                                                    <textarea id="description" name="description"><?php echo $query[0]['description']; ?></textarea>
                                                </div>
                                            </div>

<!--                                             File input 
                                            <div class="control-group">
                                                <label class="control-label" for="file">File</label>
                                                <div class="controls">                     
                                                    <input type="file" name="file" />
                                                </div>
                                            </div>-->

                                            <!-- Button -->
                                            <div class="control-group">
                                                <label class="control-label" for="add"></label>
                                                <div class="controls">
                                                    <button id="add" name="add" class="btn btn-primary">Edit Report</button>
                                                </div>
                                            </div>

                                        </fieldset>
                                    </form>

                                </div>
                                <div class="tab-pane" id="tabs1-pane2">
                             
                                    
                                    <table class="table table-striped table-bordered table-condensed">
                                        <thead>
                                            <tr>
                                                <th class="header">#</th>
                                                <th class="yellow header headerSortDown">description</th>
                                                <th class="green header">date</th>
                                                <th class="red header">patient</th>
                                                <th class="red header">doctor</th>
                                                <th class="red header">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($query as $row) {
                                                echo '<tr>';
                                                echo '<td>' . $row['id'] . '</td>';
                                                echo '<td>' . $row['description'] . '</td>';
                                                echo '<td>' . $row['date'] . '</td>';
                                                echo '<td>' .$row['lname'].' </td>';
                                                echo '<td>' . $row['name'] . '</td>';
                                                echo '<td class="crud-actions">
                   <a href="' . site_url("doctor") . '/edit_report/' . $row['id'] . '" class="btn btn-info">view & edit</a>  
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


                });
            </script>
            </body>