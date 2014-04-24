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
                        <h1>Doctors</h1>
                    </div>
                    <?php
                    //flash messages
                    if (isset($flash_message)) {
                        if ($flash_message == TRUE) {
                            echo '<div class="alert alert-success">';
                            echo '<a class="close" data-dismiss="alert">×</a>';
                            echo '<strong>Well done!</strong> Doctor details has been added successfully.';
                            echo '</div>';
                        } else {
                            echo '<div class="alert alert-error">';
                            echo '<a class="close" data-dismiss="alert">×</a>';
                            echo '<strong>Oh snap!</strong> something went wrong check and try again';
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
                                <li class="active"><a href="#tabs1-pane1" data-toggle="tab">Update Doctors</a></li>
                                <li><a href="#tabs1-pane2" data-toggle="tab">Doctor List</a></li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs1-pane1">
                                     <form method="post" action="<?php echo site_url('admin/edit_doctor/'.$query[0]['id'].''); ?>" id="formID" class="form-horizontal" >					


                                        <fieldset>

                                            <!-- Form Name -->
                                            <legend>Doctor</legend>

                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="docsname">Doctor Name</label>
                                                <div class="controls">
                                                    <input id="docsname" name="docsname" type="text" value="<?php echo $query[0]['name']; ?>" class="input-medium" required="">

                                                </div>
                                            </div>

                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="email">Email</label>
                                                <div class="controls">
                                                    <input id="email" name="email" type="text"  value="<?php echo $query[0]['email']; ?>" class="input-medium" required="">

                                                </div>
                                            </div>

                                            <!-- Password input-->
                                            

                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="address">Address</label>
                                                <div class="controls">
                                                    <input id="address" name="address" type="text"  value="<?php echo $query[0]['address']; ?>" class="input-medium" required="">

                                                </div>
                                            </div>

                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="phone">Phone</label>
                                                <div class="controls">
                                                    <input id="phone" name="phone" type="text"  value="<?php echo $query[0]['phone']; ?>" class="input-medium" required="">

                                                </div>
                                            </div>

                                            <!-- Select Basic -->
                                            <div class="control-group">
                                                <label class="control-label" for="department">Department</label>
                                                <div class="controls">
                                                    <select id="department" name="department" class="input-medium">
                                                        <?php
                                                        foreach ($results as $row) {
                                                            echo "<option value=" . $row['dep_id'] . ">" . $row['dep_name'] . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Textarea -->
                                            <div class="control-group">
                                                <label class="control-label" for="profile">Profile Description</label>
                                                <div class="controls">                     
                                                    <textarea id="profile" name="profile"> <?php echo $query[0]['profile']; ?></textarea>
                                                </div>
                                            </div>
                                            <input  name="id" type="hidden"  value="<?php echo $query[0]['id']; ?>" >
                                            <!-- Button -->
                                            <div class="control-group">
                                                <label class="control-label" for="add"></label>
                                                <div class="controls">
                                                    <button id="add" name="edit" class="btn btn-primary">Edit Doctor</button>
                                                </div>
                                            </div>

                                        </fieldset>
                                    </form>
                                    

                                </div>
                                <div class="tab-pane" id="tabs1-pane2">
                                                                       <div class="span2">
<a href="javascript:demoFromHTML()" class="button" style="alignment-adjust:middle" target=" " ><button>Print report</button></a>
</div>
                                    <table class="table table-striped table-bordered table-condensed" id="table">
                                        <thead>
                                            <tr>
                                                <th class="header">#</th>
                                                <th class="yellow header headerSortDown">Doctor Name</th>
                                                <th class="green header">Department</th>
                                                <th class="red header">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            
                                            $i = 1;
                                            
                                            foreach ($query as $row) {
                                                
                                                echo '<tr>';
                                                echo '<td>' . $i . '</td>'; $i++;
                                                echo '<td>' . $row['name'] . '</td>';
                                                echo '<td>' . $row['dep_name'] . '</td>';

                                                echo '<td class="crud-actions">
                   <a href="' . site_url("admin") . '/doctor_update/' . $row['id'] . '" class="btn btn-info">view & edit</a>  
                  <a href="' . site_url("admin") . '/delete_doctor/' . $row['id'] . '" class="btn btn-danger">delete</a>
                </td>';
                                                echo '</tr>';
                                            }
                                            ?>      
                                        </tbody>
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

        
        // datepicker plugin
        $('.datepicker').datepicker().on('changeDate', function(ev) {
            $(this).datepicker('hide');
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
        <script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
                $('#table').dataTable();
            });
        </script>
</body>
