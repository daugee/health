<?php include("includes/header.php")?>
<body>
<!-- navbar -->
<?php include("includes/navbar.php");?>
    <!-- end navbar -->

    <!-- sidebar -->
<?php include("includes/sidebar.php"); ?>
    <!-- end sidebar -->

	<!-- main container -->
    <div class="content">
        
        <!-- settings changer -->
        
        
        <div class="container-fluid">
            <div id="pad-wrapper" class="new-user">
                <div class="row-fluid header">
                    <h3>Create a new Patient</h3>
                </div>

                <div class="row-fluid form-wrapper">
                    <!-- left column -->
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
                    
                    <form method="post" action="<?php echo site_url('welcome/add'); ?>" id="formID" class="form-horizontal" >
                    
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

                    <!-- side right column -->
                    
                </div>
            </div>
        </div>
    </div>
    <!-- end main container -->


	<!-- scripts -->
    <?php include("includes/scripts.php");?>

       <script type="text/javascript">
        $(function () {

            

            // select2 plugin for select elements
            $(".select2").select2({
                placeholder: "Select a State"
            });

            // datepicker plugin
            $('.datepicker').datepicker().on('changeDate', function (ev) {
                $(this).datepicker('hide');
                
            });

           
        });
    </script>
</body>
</html>