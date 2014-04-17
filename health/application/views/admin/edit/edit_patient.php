<!DOCTYPE html>
<html>
<head>
	
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!-- bootstrap -->
    <link href="<?php echo base_url();?>css/bootstrap/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/bootstrap/bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet">

    <!-- libraries -->
    <link href="<?php echo base_url();?>css/lib/bootstrap-wysihtml5.css" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/lib/uniform.default.css" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/lib/select2.css" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/lib/bootstrap.datepicker.css" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/lib/font-awesome.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/layout.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/elements.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/icons.css">
   
    <!-- this page specific styles -->
    <link rel="stylesheet" href="<?php echo base_url();?>css/compiled/form-wizard.css" type="text/css" media="screen" />

    <!-- open sans font -->
    <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>-->

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
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
            <div id="pad-wrapper">
                <!-- <div class="row-fluid head">
                    <div class="span12">
                        <h4>Form wizard</h4>
                    </div>
                </div> -->

                <div class="row-fluid">
                    <div class="span12">
                        <div id="fuelux-wizard" class="wizard row-fluid">
                            <ul class="wizard-steps">
                                <li data-target="#step1" class="active">
                                    <span class="step">1</span>
                                    <span class="title">General <br> information</span>
                                </li>
                                <li data-target="#step2">
                                    <span class="step">2</span>
                                    <span class="title">Address <br> information</span>
                                </li>
                                <li data-target="#step3">
                                    <span class="step">3</span>
                                    <span class="title">User <br> Details</span>
                                </li>
                                <li data-target="#step4">
                                    <span class="step">4</span>
                                    <span class="title">Health <br> info</span>
                                </li>
                            </ul>                            
                        </div>
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
                        
                        <form method="post" action="<?php echo site_url('admin/edit_patient'); ?>" id="formID" enctype="multipart/form-data" >
                        <div class="step-content">
                            
                            <div class="step-pane active" id="step1">
                                <div class="row-fluid form-wrapper">
                                    <div class="span8">
                                       
                                            <div class="field-box">
                                                <label>First Name:</label>
                                                <input name="fname" class="span8"  value="<?php echo $query[0]['name']; ?>" type="text" />
                                            </div>
                                            <div class="field-box">
                                                <label>Last Name:</label>
                                                <input class="span8" name="lname"  value="<?php echo $query[0]['lname']; ?>" type="text" />
                                            </div>
                                            <div class="field-box">
                                                <label>Birth Date:</label>
                                                  <input type="text" name="birthdate" value="<?php echo $query[0]['birthdate']; ?>" class="span8 datepicker" data-date-format="yyyy/mm/dd" required="" />
                                            </div>
                                            <div class="field-box">
                                                <label>Age:</label>
                                                <input class="span8" name="age" value="<?php echo $query[0]['age']; ?>" type="text" />
                                            </div>
                                    
                                    </div>
                                </div>
                            </div>
                            <div class="step-pane" id="step2">
                                <div class="row-fluid form-wrapper">
                                    <div class="span8">
                                      
                                            <div class="field-box">
                                                <label>phone:</label>
                                                <input name="phone" class="span8"  value="<?php echo $query[0]['phone']; ?>" type="text" />
                                            </div>
                                            <div class="field-box">
                                                <label>Email:</label>
                                                <input name="email" class="span8" value="<?php echo $query[0]['email']; ?>" type="text" />
                                            </div>
                                        
                                            <div class="field-box">
                                                <label>Address:</label>
                                                <input name="address" class="span8"  value="<?php echo $query[0]['address']; ?>" type="text" />
                                            </div>
                                            <div class="field-box">
                                                <label>City:</label>
                                                <input name="city" class="span8" value="<?php echo $query[0]['city']; ?>" type="text" />
                                            </div>
                                            <div class="field-box">
                                                <label>Postal/ZIP code:</label>
                                                <input name="pcode" class="span8" value="<?php echo $query[0]['pcode']; ?>" type="text" />
                                            </div>
                                            <div class="field-box">
                                                <label>Country:</label>
                                                <input name="country" class="span8" value="<?php echo $query[0]['country']; ?>" type="text" />
                                            </div>
                                      
                                    </div>
                                </div>
                            </div>
                            <div class="step-pane" id="step3">
                                <div class="row-fluid form-wrapper">
                                    <div class="span8">
                                     
                                            <div class="field-box">
                                                <label>Gender:</label>
                                                    <select id="Gender" name="gender" class="span8" >
                                                            <option value="male">Male</option>
                                                            <option value="female">Female</option>
                                                         </select>
                                            </div>
                                            <div class="field-box">
                                                <label>Blood Group:</label>
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
                                </div>
                            </div>
                            <div class="step-pane" id="step4">
                                <div class="row-fluid form-wrapper payment-info">
                                    <div class="span8">
                                       
                                            <div class="field-box">
                                                <label>Weight:</label>
                                                <input name="weight" class="span5" value="<?php echo $query[0]['weight']; ?>" type="text" />
                                            </div>
                                            <div class="field-box">
                                                <label>Height:</label>
                                                <input name="height" class="span5" value="<?php echo $query[0]['height']; ?>" type="text" />
                                            </div>
                                            <div class="field-box">
                                                <label>Temperature:</label>
                                                <input name="temperature" class="span5" value="<?php echo $query[0]['temperature']; ?>" type="text" />
                                            </div>
                                            <div class="field-box">
                                                <label>Health History:</label>
                                                <input name="history" class="span4" value="<?php echo $query[0]['history']; ?>" type="text" />
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                             <input type="hidden" name="id" value="<?php echo $query[0]['id']; ?>" class="input-medium" />
                        <div class="wizard-actions">
                            <button type="button" disabled class="btn-glow primary btn-prev"> 
                                <i class="icon-chevron-left"></i> Prev
                            </button>
                            <button type="button" class="btn-glow primary btn-next" data-last="Finish">
                                Next <i class="icon-chevron-right"></i>
                            </button>
                            <button id="add" name="add" class="btn btn-primary btn-finish">
                                Update Patient
                            </button>
                        </div>
                         </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end main container -->

	<!-- scripts for this page -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>js/theme.js"></script>
    <script src="<?php echo base_url();?>js/fuelux.wizard.js"></script>

    <script type="text/javascript">
        $(function () {
            var $wizard = $('#fuelux-wizard'),
                $btnPrev = $('.wizard-actions .btn-prev'),
                $btnNext = $('.wizard-actions .btn-next'),
                $btnFinish = $(".wizard-actions .btn-finish");

            $wizard.wizard().on('finished', function(e) {
                // wizard complete code
            }).on("changed", function(e) {
                var step = $wizard.wizard("selectedItem");
                // reset states
                $btnNext.removeAttr("disabled");
                $btnPrev.removeAttr("disabled");
                $btnNext.show();
                $btnFinish.hide();

                if (step.step === 1) {
                    $btnPrev.attr("disabled", "disabled");
                } else if (step.step === 4) {
                    $btnNext.hide();
                    $btnFinish.show();
                }
            });
            
       
          

            $btnPrev.on('click', function() {
                $wizard.wizard('previous');
            });
            $btnNext.on('click', function() {
                $wizard.wizard('next');
            });
            
                  $('.datepicker').datepicker().on('changeDate', function (ev) {
                $(this).datepicker('hide');
                  });
        });
        
    </script>
</body>
</html>