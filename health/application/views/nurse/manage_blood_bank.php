<?php include ("includes/header.php");?>
<body>

    <!-- navbar -->
    <?php include("includes/navbar.php");?>
    <!-- end navbar -->

    <!-- sidebar -->
    <?php include("includes/sidebar.php");?>
    <!-- end sidebar -->


	<!-- main container -->
    <div class="content">

     <div class="container-fluid">
            <div id="pad-wrapper" class="form-page">
                <div class="row-fluid form-wrapper">

                <!-- statistics chart built with jQuery Flot -->
               
                <!-- end statistics chart -->
 <div class="row">
        <div class="span12 columns">
                         <div class="page-header">
			    <h1>Manage blood Bank</h1>
		    </div>

                <!-- UI Elements section -->
                
                <!-- end UI elements section -->
<table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
                <th class="header">#</th>
                <th class="yellow header headerSortDown">Blood Group</th>
                <th class="green header">Status</th>
                <th class="red header">Actions</th>
              </tr>
            </thead
             <tbody>
              <tr> 
             <td>1</td>
             <td>A+</td>
             <td><?php echo $a; ?> bags</td>
             <td class="crud-actions">
                  <a href="" class="btn btn-info">view & edit</a>  
                  <a href="" class="btn btn-danger">delete</a>
                </td>     
             </tr>
             <tr> 
             <td>2</td>
             <td>A-</td>
             <td><?php echo $a1; ?> bags</td>
             <td class="crud-actions">
                  <a href="" class="btn btn-info">view & edit</a>  
                  <a href="" class="btn btn-danger">delete</a>
                </td>
             </tr> 
             <tr> 
             <td>3</td>
             <td>B+</td>
              <td><?php echo $b; ?> bags</td>
             <td class="crud-actions">
                  <a href="" class="btn btn-info">view & edit</a>  
                  <a href="" class="btn btn-danger">delete</a>
                </td>
             </tr> 
             <tr> 
             <td>4</td>
             <td>B-</td>
              <td><?php echo $b1; ?> bags</td>
             <td class="crud-actions">
                  <a href="" class="btn btn-info">view & edit</a>  
                  <a href="" class="btn btn-danger">delete</a>
                </td>
             </tr> 
             <tr> 
             <td>5</td>
             <td>AB+</td>
              <td><?php echo $ab; ?> bags</td>
             <td class="crud-actions">
                  <a href="" class="btn btn-info">view & edit</a>  
                  <a href="" class="btn btn-danger">delete</a>
                </td>
             </tr> 
             <tr> 
             <td>6</td>
             <td>AB-</td>
              <td><?php echo $ab1; ?> bags</td>
             <td class="crud-actions">
                  <a href="" class="btn btn-info">view & edit</a>  
                  <a href="" class="btn btn-danger">delete</a>
                </td>
             </tr> 
                 <tr> 
             <td>7</td>
             <td>O+</td>
              <td><?php echo $o; ?> bags</td>
             <td class="crud-actions">
                  <a href="" class="btn btn-info">view & edit</a>  
                  <a href="" class="btn btn-danger">delete</a>
                </td>
             </tr> 
             <tr> 
             <td>8</td>
             <td>O-</td>
              <td><?php echo $o1; ?> bags</td>
             <td class="crud-actions">
                  <a href="" class="btn btn-info">view & edit</a>  
                  <a href="" class="btn btn-danger">delete</a>
                </td>
             </tr> 
              
            </tbody>
</table>
                <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>
                   </div>
        </div>
    </div>
            </div>
     </div>
    </div>


	<!-- scripts -->
    <?php include ("includes/scripts.php");?>