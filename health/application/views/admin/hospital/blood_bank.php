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
			    <h1>View Blood Bank</h1>
		    </div>
		    
		    		<div class="row">
							<div class="tabbable span12">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tabs1-pane1" data-toggle="tab">Blood donor list</a></li>
									<li><a href="#tabs1-pane2" data-toggle="tab">blood bank</a></li>
									
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tabs1-pane1">
                                                                            
        <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
                <th class="header">#</th>
                <th class="yellow header headerSortDown">Name</th>
                <th class="green header">Age</th>
                <th class="green header">Sex</th>
                <th class="green header">Blood Group</th>
                <th class="green header">Last Donation Date</th>
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
                echo '<td>'.$row['gender'].'</td>';
                echo '<td>'.$row['bloodgroup'].'</td>';
                echo '<td>'.$row['donationdate'].'</td>';
                echo '</tr>';
              }
              ?>      
            </tbody>
</table>
                		</div>
									<div class="tab-pane" id="tabs1-pane2">
	 <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
                <th class="header">#</th>
                <th class="yellow header headerSortDown">Blood Group</th>
                <th class="green header">Status</th>
              </tr>
            </thead
             <tbody>
              <tr> 
             <td>1</td>
             <td>A+</td>
             <td><?php echo $a; ?> bags</td>
             </tr>
             <tr> 
             <td>2</td>
             <td>A-</td>
             <td><?php echo $a1; ?> bags</td>
             </tr> 
             <tr> 
             <td>3</td>
             <td>B+</td>
              <td><?php echo $b; ?> bags</td>
             </tr> 
             <tr> 
             <td>4</td>
             <td>B-</td>
              <td><?php echo $b1; ?> bags</td>
             </tr> 
             <tr> 
             <td>5</td>
             <td>AB+</td>
              <td><?php echo $ab; ?> bags</td>
             </tr> 
             <tr> 
             <td>6</td>
             <td>AB-</td>
              <td><?php echo $ab1; ?> bags</td>
             </tr> 
                 <tr> 
             <td>7</td>
             <td>O+</td>
              <td><?php echo $o; ?> bags</td>
             </tr> 
             <tr> 
             <td>8</td>
             <td>O-</td>
              <td><?php echo $o1; ?> bags</td>
             </tr> 
              
            </tbody>
</table>
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
