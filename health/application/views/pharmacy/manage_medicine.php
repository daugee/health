<?php include("includes/header.php")?>
<body>
<!-- navbar -->
<?php include("includes/navbar.php");?>
    <!-- end navbar -->

    <!-- sidebar -->
    <?php include("includes/pharmacy/sidebar.php"); ?>
    <!-- end sidebar -->


	<!-- main container -->
    <div class="content">
        
        <!-- settings changer -->
        
        
        <div class="container-fluid">
            <div id="pad-wrapper" class="form-page">
                <div class="row-fluid form-wrapper">
                    <!-- left column -->
                     <div class="page-header">
			    <h1>Manage Medicines</h1>
		    </div>
		    
		    		<div class="row">
							<div class="tabbable span12">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tabs1-pane1" data-toggle="tab">Medicine  List</a></li>
									<li><a href="#tabs1-pane2" data-toggle="tab">+add Medicine </a></li>
									
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
                <th class="yellow header headerSortDown">Medicine Name</th>
                <th class="yellow header headerSortDown">Medicine Category</th>
                <th class="green header">Description</th>
                <th class="yellow header headerSortDown">Price</th>
                <th class="yellow header headerSortDown">Manufacturing Company</th>
                <th class="yellow header headerSortDown">Status</th>
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
<legend>Add Medicine</legend>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="name">Name</label>
  <div class="controls">
    <input id="name" name="name" type="text" placeholder="" class="input-medium" required="">
    
  </div>
</div>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="medcategory">Medicine Category</label>
  <div class="controls">
    <select id="medcategory" name="medcategory" class="input-medium">
      <option>Gastric</option>
      <option>Cold</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="price">Price</label>
  <div class="controls">
    <input id="price" name="price" type="text" placeholder="" class="input-medium" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="Mancompany">Manufacturing Company</label>
  <div class="controls">
    <input id="Mancompany" name="Mancompany" type="text" placeholder="" class="input-medium" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="status">Status</label>
  <div class="controls">
    <input id="status" name="status" type="text" placeholder="" class="input-medium" required="">
    
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
  <label class="control-label" for="addmed"></label>
  <div class="controls">
    <button id="addmed" name="addmed" class="btn btn-primary">Add Medicine</button>
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
