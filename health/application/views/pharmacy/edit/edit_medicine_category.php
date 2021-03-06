<?php include("includes/header.php") ?>
<body>
    <!-- navbar -->
    <?php include("includes/navbar.php"); ?>
    <!-- end navbar -->

    <!-- sidebar -->
    <?php include("includes/pharmacy/sidebar.php"); ?>
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
                        <h1>Medicine Category</h1>
                    </div>
                   
                    <?php
                    //form validation
                    echo validation_errors();
                    ?> 
                    <div class="row">
                        <div class="tabbable span12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tabs1-pane1" data-toggle="tab">Edit Medicine Category </a></li>
                                <li><a href="#tabs1-pane2" data-toggle="tab"> Medicine Category List</a></li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs1-pane1">
                                    <form method="post" action="<?php echo site_url('pharmacy/edit_medicine_category/'.$query[0]['med_cat_id'].''); ?>" id="formID" class="form-horizontal" >					

                                        <fieldset>

                                            <!-- Form Name -->
                                            <legend>Medicine Category</legend>

                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="category">Medicine Category Name</label>
                                                <div class="controls">
                                                    <input id="bednumber" name="medicinecategory" type="text"  class="input-medium" required="" value="<?php echo $query[0]['med_cat_name']; ?>">

                                                </div>
                                            </div>



                                            <!-- Textarea -->
                                            <div class="control-group">
                                                <label class="control-label" for="description">Medicine Category Description</label>
                                                <div class="controls">                     
                                                    <textarea id="description" name="description" value="<?php echo set_value('description'); ?>"> <?php echo $query[0]['med_cat_description']; ?></textarea>
                                                </div>
                                            </div>
                                            <input  name="id" type="hidden" value="<?php echo $query[0]['med_cat_id']; ?>">
                                            <!-- Button -->
                                            <div class="control-group">
                                                <label class="control-label" for="add"></label>
                                                <div class="controls">
                                                    <button id="add" name="add" class="btn btn-primary">update</button>
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
                  <a href="' . site_url("pharmacy") . '/edit_prescription/' . $row['med_cat_id'] . '" class="btn btn-info">view & edit</a>  
                  
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
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('#table').dataTable();
    });
</script>
</body>
