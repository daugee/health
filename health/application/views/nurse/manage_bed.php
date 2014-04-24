<?php include("includes/header.php")?>
<body>
<!-- navbar -->
<?php include("includes/navbar.php");?>
    <!-- end navbar -->

    <!-- sidebar -->
    <?php include("includes/sidebar.php"); ?>
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
			    <h1>Manage bed</h1>
		    </div>
		    
		    		<div class="row">
							<div class="tabbable span12">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tabs1-pane1" data-toggle="tab">Bed list</a></li>
									<li><a href="#tabs1-pane2" data-toggle="tab">add bed</a></li>
									
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tabs1-pane1">
                                                                            <?php
      //flash messages
      if(isset($flash_message)){
        if($flash_message == TRUE)
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> update was successful.';
          echo '</div>';       
        }else{
          echo '<div class="alert alert-error">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
          echo '</div>';          
        }
      }
      ?>
                    <?php   
      //form validation
      echo validation_errors();?> 
                                                                                                                 <div class="span2">
<a href="javascript:demoFromHTML()" class="button" style="alignment-adjust:middle" target=" " ><button>Print report</button></a>
</div>
        <table class="table table-striped table-bordered table-condensed" id="table">
            <thead>
              <tr>
                <th class="header">#</th>
                <th class="yellow header headerSortDown">Bed Number</th>
                <th class="green header">Type</th>
                <th class="red header">Actions</th>
              </tr>
            </thead>
             <tbody>
              <?php
              $i=1;
              foreach($query as $row)
              {
                echo '<tr>';
                echo '<td>'.$i.'</td>';$i++;
                echo '<td>'.$row['bedno'].'</td>';
                echo '<td>'.$row['bedtype'].'</td>';
                echo '<td class="crud-actions">
                  <a href="'.site_url("nurse").'/edit_bed/'.$row['id'].'" class="btn btn-info">view & edit</a>  
         
                </td>';
                echo '</tr>';
              }
              ?>      
            </tbody>
</table>
                <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>
							</div>
									<div class="tab-pane" id="tabs1-pane2">
	 <form method="post" action="<?php echo site_url('welcome/add_bed'); ?>" id="formID" class="form-horizontal" >					
                                                                            
<fieldset>

<!-- Form Name -->
<legend>Form Name</legend>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="bednumber">Bed Number</label>
  <div class="controls">
    <input id="bednumber" name="bedno" type="text" placeholder="Bed No" class="input-medium" required="" value="<?php echo set_value('bedno'); ?>">
    
  </div>
</div>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="type">Type</label>
  <div class="controls">
    <select id="type" name="bedtype" class="input-medium">
      <option value="ward">Ward</option>
      <option value="cabin">Cabin</option>
      <option value="icu">Icu</option>
      <option value="other">other</option>
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

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="add"></label>
  <div class="controls">
    <button id="add" name="add" class="btn btn-primary">Add Bed</button>
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
    <?php include("includes/scripts.php")?>

    <!-- call this page plugins -->
    <script type="text/javascript">
        $(function () {


            // datepicker plugin
            $('.datepicker').datepicker().on('changeDate', function (ev) {
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
