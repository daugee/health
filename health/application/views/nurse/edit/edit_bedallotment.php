
<?php include("includes/header.php") ?>
<body>
    <!-- navbar -->
    <?php include("includes/navbar.php"); ?>

    <!-- end navbar -->

    <!-- sidebar -->
    <?php include("includes/sidebar.php"); ?>

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
                        <h1>Bed Allotment</h1>
                    </div>

                    <div class="row">
                        <div class="tabbable span12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tabs1-pane1" data-toggle="tab">Bed allotment list</a></li>
                                <li><a href="#tabs1-pane2" data-toggle="tab">add bed allotment</a></li>

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
                                    //form validation
                                    echo validation_errors();
                                    ?>
                                    <form method="post" action="<?php echo site_url('nurse/edit_nurse_bedallotment/'.$allotment[0]['id'].''); ?>" id="formID" class="form-horizontal" >
                                        <fieldset>

                                            <!-- Form Name -->
                                            <legend>Add bed Allotment</legend>

                                            <!-- Select Basic -->
                                            <div class="control-group">
                                                <label class="control-label" for="Bed Number">bed number</label>
                                                <div class="controls">
                                                   <input type="text" name="bedno" value="<?php echo $allotment[0]['bedno']; ?>" class="input-medium"  readonly/>
                                                </div>
                                            </div>

                                            <!-- Select Basic -->
                                            <div class="control-group">
                                                <label class="control-label" for="Patient">patient</label>
                                                <div class="controls">
                                                     <input type="text" name="patient" value="<?php echo $allotment[0]['name']; ?>" class="input-medium"  readonly/>
                                                </div>
                                            </div>

                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="allotment date">allotment date</label>
                                                <div class="controls">
                                                    <input type="text" name="allotmentdate" value="<?php echo $allotment[0]['allotmentdate']; ?>" class="input-medium datepicker"  data-date-format="yyyy/mm/dd" readonly/>
                                                </div>
                                            </div>

                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="discharge date">discharge_date</label>
                                                <div class="controls">
                                                    <input type="text" name="dischargedate"  value="<?php echo $allotment[0]['dischargedate']; ?>" class="input-medium datepicker" data-date-format="yyyy/mm/dd" />
                                                </div>
                                            </div>
                                            <input type="hidden" name="id" value="<?php echo $allotment[0]['id']; ?>" class="input-medium" />
                                            <!-- Button -->
                                            <div class="control-group">
                                                <label class="control-label" for="Add bed allotment"></label>
                                                <div class="controls">
                                                    <button id="Add bed allotment" name="Update bed allotment" class="btn btn-primary">Update Bed Allotment</button>
                                                </div>
                                            </div>

                                        </fieldset>
                                    </form> 
                                </div>


                                <div class="tab-pane" id="tabs1-pane2">

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
                                     <div class="span2">
<a href="javascript:demoFromHTML()" class="button" style="alignment-adjust:middle" target=" " ><button>Print report</button></a>
</div>
                                    <table class="table table-striped table-bordered table-condensed" id="table">
                                        <thead>
                                            <tr>
                                                <th class="header">#</th>
                                                <th class="yellow header headerSortDown">Bed Number</th>
                                <!--                <th class="green header">Bed Type</th>-->
                                                <th class="red header">Patient</th>
                                                <th class="red header">Allotment Date</th>
                                                <th class="red header">Discharge Date</th>
                                                <th class="red header">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
foreach ($allotment as $row) {
    echo '<tr>';
    echo '<td>' . $row['id'] . '</td>';
    echo '<td>' . $row['bedno'] . '</td>';
    //echo '<td>'.$row['bedtype'].'</td>';
    echo '<td>' . $row['patient'] . '</td>';
    echo '<td>' . $row['allotmentdate'] . '</td>';
    echo '<td>' . $row['dischargedate'] . '</td>';
    echo '<td class="crud-actions">
                  <a href="' . site_url("admin") . '/products/update/' . $row['id'] . '" class="btn btn-info">view & edit</a>  
                 
                </td>';
    echo '</tr>';
}
?>      
                                        </tbody>
                                    </table>
                                            <?php echo '<div class="pagination">' . $this->pagination->create_links() . '</div>'; ?>
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
                var pdf = new jsPDF('p','pt','letter'), source = $('#tabs1-pane2')[0]  // This is your HTML Div to generate pdf
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



<!-- call this page plugins -->

