<?php
$this->load->view('parts/header');
$this->load->view('parts/head_msgs');
$this->load->view('parts/sidemenu');?>
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery-2.1.3.min.js"></script>
<!-- Page Sidebar -->
<script>
$(document).ready(function(){
    $.ajax({
    url:"<?php echo base_url(); ?>kpitb_notes/SenTNotes",
    dataType: "html",
    success:function(ajaxresult){
        $("#mail").html(ajaxresult);
    }
    });
});
</script>
<div class="page-inner">
    <div id="main-wrapper">
        <div class="col-md-12" id="mail">

        </div>
    </div>
    <div class="page-footer">
        <p class="no-s">2015 &copy; Rights Reserved: Kyber PakhtunKhwa IT Board Peshawar</p>
    </div>
</div>
</main>
<?php $this->load->view('parts/footer');?>