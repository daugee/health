<html>

<head>	
    <title>HMS</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="<?php echo base_url();?>img/favicon.ico"/> 
 
	
    <!-- bootstrap -->
    <link href="<?php echo base_url();?>css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />
    
    <!-- libraries -->
    <link href="<?php echo base_url();?>css/lib/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>css/lib/font-awesome.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo base_url();?>css/lib/bootstrap.datepicker.css" type="text/css" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/elements.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/icons.css">
    <link href="<?php echo base_url();?>css/bayanno.css" media="screen" rel="stylesheet" type="text/css" />
</head>
<body>

    <!-- navbar -->

    <!-- end navbar -->


    <!-- end sidebar -->
    
    
      <div class="content">

<div class="container-fluid">
    <div class="navbar navbar-top navbar-inverse">
            <div class="navbar-inner">
                
                    <a class="brand" href="index.html">Hospital Management </a>
              
            </div>
        </div>
	<!-- main container -->
  
   

 

            <div id="pad-wrapper">

         
 <div class="row">
   <div class="span12 columns">
   

                <!-- UI Elements section -->
     <div class="span4 offset4">
           <div class="padded">
                    <center>
                        <img src="<?php echo base_url();?>img/hms.png" style="height:200px;" />
                    </center>
                    <div class="login box" style="margin-top: 10px;">
                        <div class="box-header">
                            <span class="title">login</span>
                        </div>
                        <div class="box-content padded">
                        <i class="m-icon-swapright m-icon-white"></i>
          
                    <?php   
      //form validation
      echo validation_errors();?> 
                        <?php if(! is_null($msg)) echo $msg;?>
                        	<form action="<?php echo site_url('welcome/login'); ?>" method="post" accept-charset="utf-8" class="separate-sections" onsubmit="return check_account_type()">                                <div class="">
                                    
                                    <select id="account_type" class="validate[required]" name="login_type" style="width:100%;">
                                        <option value="">account type</option>
                                        <option value="admin">admin</option>
                                        <option value="doctor">doctor</option>
                                        <option value="patient">patient</option>
                                        <option value="nurse">nurse</option>
                                        <option value="pharmacist">pharmacist</option>
                                        <option value="lab">laboratorist,eo</option>
                                    </select>
    
                                </div>
                                <div class="input-prepend">
                                    <span class="add-on" href="#">
                                    <i class="icon-envelope"></i>
                                    </span>
                                    <input name="email" type="text" placeholder="email" <?php echo set_value('email'); ?>>
                                </div>
                                <div class="input-prepend">
                                    <span class="add-on" href="#">
                                    <i class="icon-key"></i>
                                    </span>
                                    <input name="pass" type="password" placeholder="password" <?php echo set_value('pass'); ?>>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-blue btn-block" >
                                        login                                    </button>
                                </div>
                            </form>                            <div>
                                <a  data-toggle="modal" href="#modal-simple">
                                    forgot password?                                </a>
                            </div>
                        </div>
                    </div>
                        <div style="clear:both;color:#aaa; padding:20px;">
    	<hr />
    </div>                </div>

                <!-- end UI elements section -->
                   </div>
        </div>
    </div>
            </div>
      </div>
   
	<!-- scripts -->
   
<script type="text/javascript">
                            function check_account_type()
				{
				var account_type = document.getElementById('account_type').value;
				if (account_type ==""){
                        		Growl.info({title:"Please select an account type first",text:""})
					//alert('Please select an account type first');
					return false;
					}
					else
					return true;
				}
</script>
 <?php include ("includes/scripts.php");?>
</html