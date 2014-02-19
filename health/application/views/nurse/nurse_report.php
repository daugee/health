
<?php include("includes/header.php")?>
<body>
<!-- navbar -->
<?php include("includes/navbar.php");?>
    <!-- end navbar -->
<?php include("includes/sidebar.php"); ?>
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
                                                                        <li><a href="#tabs1-pane5" data-toggle="tab">+add report</a></li>
									
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
                <th class="red header">Actions</th>
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
       	<table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
                <th class="header">#</th>
                <th class="yellow header headerSortDown">description</th>
                <th class="green header">date</th>
                <th class="red header">patient</th>
                <th class="red header">doctor</th>
                <th class="red header">Actions</th>
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
                echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/products/update/'.$row['id'].'" class="btn btn-info">view & edit</a>  
                  <a href="'.site_url("admin").'/products/delete/'.$row['id'].'" class="btn btn-danger">delete</a>
                </td>';
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
                <th class="red header">Actions</th>
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
                echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/products/update/'.$row['id'].'" class="btn btn-info">view & edit</a>  
                  <a href="'.site_url("admin").'/products/delete/'.$row['id'].'" class="btn btn-danger">delete</a>
                </td>';
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
                <th class="red header">Actions</th>
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
                echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/products/update/'.$row['id'].'" class="btn btn-info">view & edit</a>  
                  <a href="'.site_url("admin").'/products/delete/'.$row['id'].'" class="btn btn-danger">delete</a>
                </td>';
                echo '</tr>';
              }
              ?>      
            </tbody>
</table>
                           
    </div>
    <div class="tab-pane" id="tabs1-pane5">
	<form method="post" action="<?php echo site_url('welcome/add_nurse_report'); ?>" id="formID" class="form-horizontal" >
<fieldset>

<!-- Form Name -->
<legend>REPORT</legend>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="type">Type</label>
  <div class="controls">
    <select id="type" name="type" class="input-medium">
      <option value="operation">Operation</option>
      <option value="birth">Birth</option>
      <option value="death">Death</option>
      <option value="other">Other</option>
    </select>
  </div>
</div>
<!-- Search input-->
<div class="control-group">
  <label class="control-label" for="doctor">Doctor</label>
  <div class="controls">
    <input id="doctor" name="doctor" type="text" placeholder="doctor" class="input-medium search-query" required="">
    
  </div>
</div>

<!-- Search input-->
<div class="control-group">
  <label class="control-label" for="Patient">Patient</label>
  <div class="controls">
      <select id="Patient" name="patient" class="input-medium">
      <?php
              foreach($result as $row)
              {
                echo "<option value=".$row['name'].">".$row['name']."</option>";
              }
              ?>
    </select>
     
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="date">Date</label>
  <div class="controls">
         <input type="text" name="date" value="date" class="input-medium datepicker" required="" data-date-format="yyyy/mm/dd" />
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
  <label class="control-label" for="add"></label>
  <div class="controls">
    <button id="add" name="add" class="btn btn-primary">Add Report</button>
  </div>
</div>

</fieldset>
</form>
                           
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