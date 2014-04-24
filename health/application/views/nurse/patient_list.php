<?php include ("includes/header.php");?>
<body>

    <!-- navbar -->
    <?php include("includes/navbar.php");?>
    <!-- end navbar -->

    <!-- sidebar -->
    <?php include("includes/sidebar.php");?>
    <!-- end sidebar -->
 <style type="text/css" title="currentStyle">
       @import "<?php echo base_url(); ?>dt2/css/demo_page.css";
     @import "<?php echo base_url(); ?>dt2/css/demo_table.css";
        </style>

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
     <div class="row-fluid header">
        <div class="span12 columns">
            <a href="<?php echo site_url('welcome/new_patient');?>" class="btn-flat success pull-right">
                            <span>&#43;</span>
                           New Patient
              </a>
        </div>
     </div>
                                                               <div class="span2">
<a href="javascript:demoFromHTML()" class="button" style="alignment-adjust:middle" target=" " ><button>Print report</button></a>
</div>
                <!-- UI Elements section -->
                <div class="row-fluid table" id="report">    
 
                <!-- end UI elements section -->
<table class="table table-striped table-bordered table-condensed" id="table">
            <thead>
              <tr>
                <th class="header">#</th>
                <th class="yellow header headerSortDown">Patient</th>
                <th class="green header">age</th>
                <th class="red header">gender</th>
                <th class="red header">Blood Group</th>
                <th class="red header">Birth Date</th>
                <th class="red header">Actions</th>
              </tr>
            </thead>
             <tbody>
              <?php
              $i=1;
              foreach($query as $row)
              {
                echo '<tr>';
                echo '<td>'.$i.'</td>';$i++;
                echo '<td>'.$row['name'].'</td>';
                echo '<td>'.$row['age'].'</td>';
                echo '<td>'.$row['sex'].'</td>';
                echo '<td>'.$row['bloodgroup'].'</td>';
                echo '<td>'.$row['birthdate'].'</td>';
                echo '<td class="crud-actions">
                  <a href="' . site_url("nurse") . '/edit_hospital_patient/' . $row['id'] . '" class="btn btn-info">view & edit</a> 
                      <a href="' . site_url("nurse") . '/patient_profile/' . $row['id'] . '" class="btn btn-success">Profile</a>
                  
                </td>';
                echo '</tr>';
              }
              ?>      
            </tbody>
</table>
                <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>
                   </div>
     </div>
        </div>
    </div>


	<!-- scripts -->
    <?php include ("includes/scripts.php");?>

         <script type="text/javascript">
            function demoFromHTML() {
                var pdf = new jsPDF('p','pt','letter'), source = $('#report')[0]  // This is your HTML Div to generate pdf
                , specialElementHandlers = {
                    '#bypassme': function(element, renderer){
                        return true
                    }
                }
                
              
                pdf.setProperties({
                    title: 'Title',
                    subject: 'This is the subject',		
                    author: 'James Hall'
                   // keywords: 'generated, javascript, web 2.0, ajax',
                    //creator: 'MEEE'
                });
              
                pdf.fromHTML(
                source // HTML string or DOM elem ref.
                , 50 // x coord
                , 10 // y coord
                , {
                    'width':500.5 // max width of content on PDF
                    , 'elementHandlers': specialElementHandlers
                }
            )
                pdf.output('dataurl')
            }
        </script>
         <script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
                $('#table').dataTable();
            });
        </script>