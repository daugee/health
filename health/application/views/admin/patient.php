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
			    <h1>Patients</h1>
		    </div>
		    
		    		<div class="row">
							<div class="tabbable span12">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tabs1-pane1" data-toggle="tab">Patient list</a></li>
									<li><a href="#tabs1-pane2" data-toggle="tab">add patient</a></li>
									
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
              foreach($query as $row)
              {
                echo '<tr>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['name'].'</td>';
                echo '<td>'.$row['age'].'</td>';
                echo '<td>'.$row['sex'].'</td>';
                echo '<td>'.$row['bloodgroup'].'</td>';
                echo '<td>'.$row['birthdate'].'</td>';
                echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/products/update/'.$row['id'].'" class="btn btn-info">view & edit</a>  
                  <a href="'.site_url("admin").'/products/delete/'.$row['id'].'" class="btn btn-danger">delete</a>
                </td>';
                echo '</tr>';
              }
              ?>      
            </tbody>
</table>
                <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>
							</div>
									<div class="tab-pane" id="tabs1-pane2">
	<form method="post" action="<?php echo site_url('admin/add_patient'); ?>" id="formID" class="form-horizontal" >
                    
<fieldset>

<!-- Form Name -->
<legend>New Patient</legend>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="Patient Name">Patient Name</label>
  <div class="controls">
    <input id="Patient Name" name="patientname" type="text" placeholder="name" class="input-medium" required="" value="<?php echo set_value('patientname'); ?>">
    
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

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="Gender">Gender</label>
  <div class="controls">
     
    <select id="Gender" name="gender" class="input-medium" >
      <option value="0">Male</option>
      <option value="1">Female</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="Birthdate">Birth Date</label>
  <div class="controls">
       <input type="text" name="birthdate" value="Birth date" class="input-medium datepicker" data-date-format="yyyy/mm/dd" required="" />
   
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="age">Age</label>
  <div class="controls">
    <input id="age" name="age" type="text" placeholder="age" class="input-medium" required="" value="<?php echo set_value('age'); ?>">
    
  </div>
</div>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="bloodgroup">Blood Group</label>
  <div class="controls">
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
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="AddPatient"></label>
  <div class="controls">
    <button id="AddPatient" name="AddPatient" class="btn btn-primary">Add Patient</button>
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
