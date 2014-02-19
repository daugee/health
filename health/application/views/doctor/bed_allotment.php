


	<!-- main container -->
    <div class="content">
        
        <!-- settings changer -->
        
        
        <div class="container-fluid">
            <div id="pad-wrapper" class="form-page">
                <div class="row-fluid form-wrapper">
                    <!-- left column -->
                     <div class="page-header">
			    <h1>Manage bed</h1>
		    </div>
		    
		    		<div class="row">
							<div class="tabbable span12">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tabs1-pane1" data-toggle="tab">Bed allotment list</a></li>
									<li><a href="#tabs1-pane2" data-toggle="tab">add bed allotment</a></li>
									
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
                <th class="yellow header headerSortDown">Bed Number</th>
<!--                <th class="green header">Bed Type</th>-->
                <th class="red header">Patient</th>
                <th class="red header">Allotment Date</th>
                <th class="red header">Discgarge Date</th>
                <th class="red header">Actions</th>
              </tr>
            </thead>
           <tbody>
              <?php
              foreach($allotment as $row)
              {
                echo '<tr>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['bedno'].'</td>';
                //echo '<td>'.$row['bedtype'].'</td>';
                echo '<td>'.$row['patient'].'</td>';
                echo '<td>'.$row['allotmentdate'].'</td>';
                echo '<td>'.$row['dischargedate'].'</td>';
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
         <form method="post" action="<?php echo site_url('welcome/add_bedallotment'); ?>" id="formID" class="form-horizontal" >
<fieldset>

<!-- Form Name -->
<legend>Add bed Allotment</legend>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="Bed Number">bed number</label>
  <div class="controls">
    <select id="Bed Number" name="bedno" class="input-medium">
        <?php
              foreach($query as $row)
              {
                echo "<option value=".$row['bedno'].">".$row['bedno']."</option>";
              }
              ?>
      
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="Patient">patient</label>
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
  <label class="control-label" for="allotment date">allotment date</label>
  <div class="controls">
      <input type="text" name="allotmentdate" value="allotment date" class="input-medium datepicker"  data-date-format="yyyy/mm/dd" />
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="discharge date">discharge_date</label>
  <div class="controls">
    <input type="text" name="dischargedate"  value="discharge date" class="input-medium datepicker" data-date-format="yyyy/mm/dd" />
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="Add bed allotment"></label>
  <div class="controls">
    <button id="Add bed allotment" name="Add bed allotment" class="btn btn-primary">add Bed Allotment</button>
  </div>
</div>

</fieldset>
</form>                                                                      

        
      </div>
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
    
  


   
    
    <!-- call this page plugins -->
   
