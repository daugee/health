<?php include("includes/header.php") ?>
<body>
    <!-- navbar -->
    <?php include("includes/navbar.php"); ?>
    <!-- end navbar -->

    <!-- sidebar -->
    <?php include("includes/pharmacy/sidebar.php"); ?>
    <!-- end sidebar -->


    <!-- main container -->
    <div class="content">

        <!-- settings changer -->


        <div class="container-fluid">
            <div id="pad-wrapper" class="form-page">
                <div class="row-fluid form-wrapper">
                    <!-- left column -->
                    <div class="page-header">
                        <h1>Medicine Category</h1>
                    </div>
                    <?php
                    //flash messages
                    if (isset($flash_message) ){
                        if ($flash_message == TRUE) {
                            echo '<div class="alert alert-success">';
                            echo '<a class="close" data-dismiss="alert">×</a>';
                            echo '<strong>Well done!</strong> medicine category created with success.';
                            echo '</div>';
                        } else {
                            echo '<div class="alert alert-error">';
                            echo '<a class="close" data-dismiss="alert">×</a>';
                            echo '<strong>Oh snap!</strong> something was wrong check and re submit.';
                            echo '</div>';
                        }
                    }
                    ?>
                    <?php
                    //flash messages
                    if (isset($flash_msg) ){
                        if ($flash_msg == TRUE) {
                            echo '<div class="alert alert-success">';
                            echo '<a class="close" data-dismiss="alert">×</a>';
                            echo '<strong>Well done!</strong> medicine category updated successfully.';
                            echo '</div>';
                        } else {
                            echo '<div class="alert alert-error">';
                            echo '<a class="close" data-dismiss="alert">×</a>';
                            echo '<strong>Oh snap!</strong> something was wrong check and re submit.';
                            echo '</div>';
                        }
                    }
                    ?>
                    <?php
                    //form validation
                    echo validation_errors();
                    ?> 
                    <div class="row">
                        <div class="tabbable span12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tabs1-pane1" data-toggle="tab">Medicine Category List</a></li>
                                <li><a href="#tabs1-pane2" data-toggle="tab">Visualizer</a></li>
                                <li><a href="#tabs1-pane3" data-toggle="tab">+add Medicine Category</a></li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs1-pane1">

                                    <table class="table table-striped table-bordered table-condensed">
                                        <thead>
                                            <tr>
                                                <th class="header">#</th>
                                                <th class="yellow header headerSortDown">Medicine Category Name</th>
                                                <th class="green header">Description</th>
                                                <th class="red header">Actions</th>
                                            </tr>
                                        </thead>
                          <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($results as $row) {
                                            echo '<tr>';
                                            echo '<td>' . $i . '</td>';
                                            $i++;
                                            echo '<td>' . $row['med_cat_name'] . '</td>';
                                            echo '<td>' . $row['med_cat_description'] . '</td>';
                                            echo '<td class="crud-actions">
                  <a href="' . site_url("pharmacy") . '/medicine_category_update/' . $row['med_cat_id'] . '" class="btn btn-info">view & edit</a>  
                  
                </td>';
                                            echo '</tr>';
                                        }
                                        ?>      
                                        </tbody>
                                    </table>

                                </div>
                                <div class="tab-pane" id="tabs1-pane2"></div>
                                <div class="tab-pane" id="tabs1-pane3">
                                    <form method="post" action="<?php echo site_url('pharmacy/add_medicine_category'); ?>" id="formID" class="form-horizontal" >					

                                        <fieldset>

                                            <!-- Form Name -->
                                            <legend>Medicine Category</legend>

                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="category">Medicine Category Name</label>
                                                <div class="controls">
                                                    <input id="bednumber" name="medicinecategory" type="text" placeholder="category name" class="input-medium" required="" value="<?php echo set_value('bedno'); ?>">

                                                </div>
                                            </div>



                                            <!-- Textarea -->
                                            <div class="control-group">
                                                <label class="control-label" for="description">Medicine Category Description</label>
                                                <div class="controls">                     
                                                    <textarea id="description" name="description" value="<?php echo set_value('description'); ?>"></textarea>
                                                </div>
                                            </div>

                                            <!-- Button -->
                                            <div class="control-group">
                                                <label class="control-label" for="add"></label>
                                                <div class="controls">
                                                    <button id="add" name="add" class="btn btn-primary">Add Medicine Category</button>
                                                </div>
                                            </div>

                                        </fieldset>
                                    </form>
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
