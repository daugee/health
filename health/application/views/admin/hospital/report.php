
<?php include("includes/header.php")?>
<body>
<!-- navbar -->
<?php include("includes/navbar.php");?>
    <!-- end navbar -->
<?php include("includes/admin/sidebar.php"); ?>
<div class="content">
        
        <!-- settings changer -->
       <div class="container-fluid">
            <div id="pad-wrapper" class="form-page">
               
         <div class="row-fluid form-wrapper">
                    <!-- left column -->
                     <div class="page-header">
			    <h1>REPORT MODULE</h1>
		    </div>
		    
		    		<div class="row">
                                    
							<div class="tabbable span12">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tabs1-pane1" data-toggle="tab">Operation</a></li>
									<li><a href="#tabs1-pane2" data-toggle="tab">Birth</a></li>
                                                                        <li><a href="#tabs1-pane3" data-toggle="tab">Death</a></li>
                                                                        <li><a href="#tabs1-pane4" data-toggle="tab">other</a></li>
								</ul>
	<div class="tab-content">
<div class="tab-pane active" id="tabs1-pane1">
	<table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
                <th class="header">#</th>
                <th class="yellow header headerSortDown">description</th>
                <th class="green header">date</th>
                <th class="red header">patient</th>
                <th class="red header">doctor</th>
              </tr>
            </thead>
             <tbody>
              <?php
              foreach($query as $row)
              {
                echo '<tr>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['description'].'</td>';
                echo '<td>'.$row['date'].'</td>';
                echo '<td>'.$row['patient'].'</td>';
                echo '<td>'.$row['doctor'].'</td>';
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
                <th class="yellow header headerSortDown">description</th>
                <th class="green header">date</th>
                <th class="red header">patient</th>
                <th class="red header">doctor</th>
              </tr>
            </thead>
             <tbody>
              <?php
              foreach($q as $row)
              {
                echo '<tr>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['description'].'</td>';
                echo '<td>'.$row['date'].'</td>';
                echo '<td>'.$row['patient'].'</td>';
                echo '<td>'.$row['doctor'].'</td>';
                echo '</tr>';
              }
              ?>      
            </tbody>
</table>
    </div>
    <div class="tab-pane" id="tabs1-pane3">
		<table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
                <th class="header">#</th>
                <th class="yellow header headerSortDown">description</th>
                <th class="green header">date</th>
                <th class="red header">patient</th>
                <th class="red header">doctor</th>
              </tr>
            </thead>
             <tbody>
              <?php
              foreach($d as $row)
              {
                echo '<tr>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['description'].'</td>';
                echo '<td>'.$row['date'].'</td>';
                echo '<td>'.$row['patient'].'</td>';
                echo '<td>'.$row['doctor'].'</td>';
                echo '</tr>';
              }
              ?>      
            </tbody>
</table>
                           
    </div>
    <div class="tab-pane" id="tabs1-pane4">
		<table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
                <th class="header">#</th>
                <th class="yellow header headerSortDown">description</th>
                <th class="green header">date</th>
                <th class="red header">patient</th>
                <th class="red header">doctor</th>
              </tr>
            </thead>
             <tbody>
              <?php
              foreach($oth as $row)
              {
                echo '<tr>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['description'].'</td>';
                echo '<td>'.$row['date'].'</td>';
                echo '<td>'.$row['patient'].'</td>';
                echo '<td>'.$row['doctor'].'</td>';
                echo '</tr>';
              }
              ?>      
            </tbody>
</table>
                           
    </div>
                                                   
								</div><!-- /.tab-content -->
							</div><!-- /.tabbable -->
						</div><!-- /.row -->
                    
        
                <!-- end blank state -->
        
    </div>
       
</div>
    
    <!-- end main container -->


	<!-- this page scripts -->
  <?php include("includes/scripts.php");?>
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

           
        });
    </script>
</body>