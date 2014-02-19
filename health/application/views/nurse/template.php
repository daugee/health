<?php include("includes/header.php")?>
<body>
<!-- navbar -->
<?php include("includes/navbar.php");?>

   <!-- end navbar -->

    <!-- sidebar -->
<?php include("includes/sidebar.php"); ?>
    <!-- end sidebar -->


	<!-- main container -->
<?php $this->load->view($main_content); ?>

<?php include("includes/scripts.php")?>
<script type="text/javascript">
        $(function () {

           
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