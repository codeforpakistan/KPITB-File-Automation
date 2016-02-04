        <!-- Javascripts -->
        <script src="<?php echo base_url();?>assets/plugins/jquery/jquery-2.1.3.min.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/datatables/js/jquery.datatables.min.js"></script>
        <script>$('#example').DataTable({
            "order": [[ 2, 'asc' ]],
            "displayLength": 5,
        });
        </script><script src="<?php echo base_url();?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/pace-master/pace.min.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/switchery/switchery.min.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/uniform/jquery.uniform.min.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/waves/waves.min.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/3d-bold-navigation/js/main.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/toastr/toastr.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/modern.js"></script>
        <script src="<?php echo base_url();?>assets/js/pages/dashboard.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/classie/classie.js"></script>
        <script src="<?php echo base_url();?>hello/js/chat.js"></script> 
        <script src="<?php echo base_url();?>assets/plugins/offcanvasmenueffects/js/classie.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/offcanvasmenueffects/js/main.js"></script>
        <script>
            function Feedback(message)
            {
                if (message) {
                toastr.options = {
                  "closeButton": false,
                  "debug": false,
                  "newestOnTop": false,
                  "progressBar": false,
                  "positionClass": "toast-top-center",
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }
                    toastr.success(message);
                }
            };
        </script>
    </body>
</html>