<?php include("includes/header.php")?>
<body>
<!-- navbar -->
<?php include("includes/navbar.php");?>
    <!-- end navbar -->

    <!-- sidebar -->
<?php include("includes/docs/docs_sidebar.php"); ?>
    <!-- end sidebar -->

	<!-- main container -->
    <div class="content">
        
        <!-- settings changer -->
        
        
        <div class="container-fluid">
            <div id="pad-wrapper" class="new-user">
                <div class="row-fluid header">
                    <h3>Update profile</h3>
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
  <form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Update Details</legend>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="name">Name</label>
  <div class="controls">
    <input id="name" name="name" type="text" placeholder="" class="input-medium" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="email">Email</label>
  <div class="controls">
    <input id="email" name="email" type="text" placeholder="" class="input-medium" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="address">Address</label>
  <div class="controls">
    <input id="address" name="address" type="text" placeholder="" class="input-medium" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="phone">Phone</label>
  <div class="controls">
    <input id="phone" name="phone" type="text" placeholder="" class="input-medium" required="">
    
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="update"></label>
  <div class="controls">
    <button id="update" name="update" class="btn btn-primary">Update Profile</button>
  </div>
</div>

</fieldset>
</form>
                </div>
                <div class="row-fluid form-wrapper">
 <form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Update Password</legend>

<!-- Password input-->
<div class="control-group">
  <label class="control-label" for="password">Password </label>
  <div class="controls">
    <input id="password" name="password" type="password" placeholder="" class="input-medium" required="">
    
  </div>
</div>

<!-- Password input-->
<div class="control-group">
  <label class="control-label" for="newpassword">New Password</label>
  <div class="controls">
    <input id="newpassword" name="newpassword" type="password" placeholder="" class="input-medium" required="">
    
  </div>
</div>

<!-- Password input-->
<div class="control-group">
  <label class="control-label" for="password2">Confirm Password </label>
  <div class="controls">
    <input id="password2" name="password2" type="password" placeholder="" class="input-medium" required="">
    
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="update"></label>
  <div class="controls">
    <button id="update" name="update" class="btn btn-primary">Update Password</button>
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