<?php include("includes/header.php")?>
<body>
<!-- navbar -->
<?php include("includes/navbar.php");?>
    <!-- end navbar -->

    <!-- sidebar -->
    <?php include("includes/admin/sidebar.php"); ?>
    <!-- end sidebar -->


	<!-- main container -->
    <div class="content">
        
        <!-- settings changer -->
        
        
        <div class="container-fluid">
            <div id="pad-wrapper" class="form-page">
                <div class="row-fluid form-wrapper">
                    <!-- left column -->
                     <div class="page-header">
			    <h1>Laboratorist</h1>
		    </div>
		    
		    		<div class="row">
							<div class="tabbable span12">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tabs1-pane1" data-toggle="tab">Laboratorist list</a></li>
									<li><a href="#tabs1-pane2" data-toggle="tab">add Laboratorist</a></li>
									
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
                <th class="yellow header headerSortDown">Laboratorist name</th>
                <th class="green header">Email</th>
                <th class="green header">Address</th>
                <th class="green header">Phone</th>
                <th class="red header">Actions</th>
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
                  <a href="'.site_url("admin").'/products/update/'.$row['id'].'" class="btn btn-info">view & edit</a>  
                  <a href="'.site_url("admin").'/products/delete/'.$row['id'].'" class="btn btn-danger">delete</a>
                </td>';
                echo '</tr>';
              }
              ?>      
            </tbody>-->
</table>
                
							</div>
									<div class="tab-pane" id="tabs1-pane2">
	 <form method="post" action="<?php echo site_url('welcome/add_bed'); ?>" id="formID" class="form-horizontal" >					
                                                                            
<fieldset>

<!-- Form Name -->
<legend>Laboratorist</legend>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="Laboratorist name">Laboratorist Name</label>
  <div class="controls">
    <input id="Patient Name" name="laboratoristname" type="text"  class="input-medium" required="" value="<?php echo set_value('Laboratorist'); ?>">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="Email">Email</label>
  <div class="controls">
    <input id="Email" name="email" type="text" placeholder="email" class="input-medium" required="" value="<?php echo set_value('email'); ?>">
    
  </div>
</div>

<!-- Password input-->
<div class="control-group">
  <label class="control-label" for="password">Password </label>
  <div class="controls">
    <input id="password" name="password" type="password" placeholder="password" class="input-medium" required="" value="<?php echo set_value('password'); ?>">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="address">Address</label>
  <div class="controls">
    <input id="address" name="address" type="text" placeholder="address" class="input-medium" required="" value="<?php echo set_value('address'); ?>">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="phoneno">Phone</label>
  <div class="controls">
    <input id="phoneno" name="phone" type="text" placeholder="phone" class="input-medium" required=""value="<?php echo set_value('phone'); ?>">
    
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="add"></label>
  <div class="controls">
    <button id="add" name="add" class="btn btn-primary">Add Laboratorist</button>
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
