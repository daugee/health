<?php include("includes/header.php")?>
<body>
<!-- navbar -->
<?php include("includes/navbar.php");?>
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
			    <h1>Diagnostic Report</h1>
		    </div>
		    
		    		<div class="row">
							<div class="tabbable span12">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tabs1-pane1" data-toggle="tab">Diagnostic Report</a></li>
									<li><a href="#tabs1-pane2" data-toggle="tab">edit Diagnostic Report</a></li>
									
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
            echo '<strong>Well done!</strong> new patient created with success.';
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
        <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
                <th class="header">#</th>
                <th class="yellow header headerSortDown">date</th>
                <th class="green header">Patient</th>
                <th class="green header">Doctor</th>
                <th class="green header">Report Status</th>
                <th class="red header">Options</th>
              </tr>
            </thead>
<!--             <tbody>
              <?php
              foreach($query as $row)
              {
                echo '<tr>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['bedno'].'</td>';
                echo '<td>'.$row['bedtype'].'</td>';
                echo '<td class="crud-actions">
                    <a href="'.site_url("admin").'/products/delete/'.$row['id'].'" class="btn btn-danger">+add diagnostic report</a>
                </td>';
                echo '</tr>';
              }
              ?>      
            </tbody>-->
</table>
              
							</div>
									<div class="tab-pane" id="tabs1-pane2">
                                                                            <form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Details</legend>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="doctor">Doctor</label>
  <div class="controls">
    <input id="doctor" name="doctor" type="text" placeholder="e.g valasu" class="input-medium" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="patient">Patient</label>
  <div class="controls">
    <input id="patient" name="patient" type="text" placeholder="e.g dau" class="input-medium">
    
  </div>
</div>

<!-- Textarea -->
<div class="control-group">
  <label class="control-label" for="casehistory">Case History</label>
  <div class="controls">                     
    <textarea id="casehistory" name="casehistory">fever from last 2 daysfever from last 2 days</textarea>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="medication">Medication</label>
  <div class="controls">
    <input id="medication" name="medication" type="text" placeholder="paracetamol" class="input-medium">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="medication">Medication From Pharmacist</label>
  <div class="controls">
    <input id="medication" name="medication" type="text" placeholder="nap extra 2 days" class="input-medium">
    
  </div>
</div>

<!-- Textarea -->
<div class="control-group">
  <label class="control-label" for="description">Description</label>
  <div class="controls">                     
    <textarea id="description" name="description">take rest</textarea>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="date">Date</label>
  <div class="controls">
    <input id="date" name="date" type="text" placeholder="11/11/14" class="input-medium" required="">
    
  </div>
</div>

</fieldset>

</form>

	 <form method="post" action="<?php echo site_url('welcome/add_bed'); ?>" id="formID" class="form-horizontal" >					
          <fieldset>Diagnostic Report</fieldset>
             <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
                <th class="header">#</th>
                <th class="yellow header headerSortDown">Report Type</th>
                <th class="green header">Document Type</th>
                <th class="green header">Download</th>
                <th class="green header">Description</th>
                <th class="green header">Date</th>
                <th class="green header">laboratorist</th>
                <th class="red header">Options</th>
              </tr>
            </thead>
<!--             <tbody>
              <?php
              foreach($query as $row)
              {
                echo '<tr>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['bedno'].'</td>';
                echo '<td>'.$row['bedtype'].'</td>';
                echo '<td class="crud-actions">
                    <a href="'.site_url("admin").'/products/delete/'.$row['id'].'" class="btn btn-danger">delete</a>
                </td>';
                echo '</tr>';
              }
              ?>      
            </tbody>-->
</table>                                                                  
         </form>
                                                                                <form method="post" action="<?php echo site_url('welcome/add_bed'); ?>" id="formID" class="form-horizontal" >	
     
<fieldset>

<!-- Form Name -->
<legend>Add diagnosis Report</legend>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="reporttype">Report Type</label>
  <div class="controls">
    <input id="reporttype" name="reporttype" type="text" placeholder="" class="input-medium" required="">
    <p class="help-block">report type can be x-ray,blood-test e.t.c</p>
  </div>
</div>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="documenttype">Document Type</label>
  <div class="controls">
    <select id="documenttype" name="documenttype" class="input-medium">
      <option>image</option>
      <option>doc</option>
      <option>pdf</option>
      <option>excel</option>
      <option>other</option>
    </select>
  </div>
</div>

<!-- file input-->
<div class="control-group">
  <label class="control-label" for="upload doc">Upload Document</label>
  <div class="controls">
    <input id="uploaddoc" name="uploaddoc" type="file"  class="input-medium" >
  </div>
</div>


<!-- Textarea -->
<div class="control-group">
  <label class="control-label" for="description">Description</label>
  <div class="controls">                     
    <textarea id="description" name="description"></textarea>
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="add"></label>
  <div class="controls">
    <button id="add" name="add" class="btn btn-primary">Add Diagnosis Report</button>
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
               $('input[type=file]').bootstrapFileInput();
                $('.file-inputs').bootstrapFileInput();
            // add uniform plugin styles to html elements
            $("input:checkbox, input:radio").uniform();

            // select2 plugin for select elements
            $(".select2").select2({
                placeholder: "Select a State"
            });

            // datepicker plugin
            $('.datepicker').datepicker().on('changeDate', function (ev) {
                $(this).datepicker('hide');
            });

            // wysihtml5 plugin on textarea
            $(".wysihtml5").wysihtml5({
                "font-styles": false
            });
        });
    </script>
</body>
