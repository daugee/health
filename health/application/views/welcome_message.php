<?php include ("includes/header.php");?>
<body>

    <!-- navbar -->
    <?php include("includes/navbar.php");?>
    <!-- end navbar -->


    <!-- end sidebar -->
    <link href="<?php echo base_url();?>css/bayanno.css" media="screen" rel="stylesheet" type="text/css" />

	<!-- main container -->
    <div class="content">

        <!-- settings changer -->
       

        <div class="container-fluid">

            <!-- upper main stats -->
           
            <!-- end upper main stats -->

            <div id="pad-wrapper">

                <!-- statistics chart built with jQuery Flot -->
               
                <!-- end statistics chart -->
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
                        <script>
							function check_account_type()
							{
								var account_type	=	document.getElementById('account_type').value;
								if (account_type == "") {
									Growl.info({title:"Please select an account type first",text:" "})
									//alert();
									return false;
								}
								else
									return true;
							}
						</script>
                        	<form action="" method="post" accept-charset="utf-8" class="separate-sections" onsubmit="return check_account_type()">                                <div class="">
                                    
                                    <select id="account_type" class="validate[required]" name="login_type" style="width:100%;">
                                        <option value="">account type</option>
                                        <option value="admin">admin</option>
                                        <option value="doctor">doctor</option>
                                        <option value="patient">patient</option>
                                        <option value="nurse">nurse</option>
                                        <option value="pharmacist">pharmacist</option>
                                        <option value="laboratorist">laboratorist,eo</option>
                                        <option value="accountant">accountant</option>
                                    </select>
    
                                </div>
                                <div class="input-prepend">
                                    <span class="add-on" href="#">
                                    <i class="icon-envelope"></i>
                                    </span>
                                    <input name="email" type="text" placeholder="email">
                                </div>
                                <div class="input-prepend">
                                    <span class="add-on" href="#">
                                    <i class="icon-key"></i>
                                    </span>
                                    <input name="password" type="password" placeholder="password">
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


	<!-- scripts -->
    <?php include ("includes/scripts.php");?>