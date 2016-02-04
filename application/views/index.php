<?php 
$this->load->view('parts/header');
$this->load->view('parts/head_msgs');
$this->load->view('parts/sidemenu');?>
<!-- Page Sidebar -->
<div class="page-inner">
    <div id="main-wrapper">
    <div class="col-lg-12 col-md-12">
            <div class="panel info-box panel-white">
                <div class="panel-body bread">
                <h2 class="NoPadTop">Dashboard</h2>
            </div>
        </div>
    </div>
    <!-- End This -->
        <div class="col-lg-6 col-md-6">
            <div class="panel info-box panel-white">
                <div class="panel-body">
                <a href="<?php echo base_url();?>kpitb_letters/index">
                    <div class="info-box-stats">
                        <p>Letters</p>
                        <span class="info-box-title">Create & View Letters</span>
                    </div>
                    <div class="info-box-icon">
                        <!-- <label for="" class="pull-left">New </label><span class="pull-right badge badge-warning"></span><br> -->
                        <label for=""  class="pull-left">New Letters </label><span class="pull-right badge badge-success" id="letter">14</span><br>
                        <!-- <label for=""  class="pull-left">Pending </label><span class="pull-right badge">14</span><br> -->
                        <!-- <label for=""  class="pull-left">Rejected </label><span class="pull-right badge badge-danger">14</span> -->
                    </div>
                </a>
                </div>
            </div>
        </div>
        <!-- Letters Ends Here -->
        <div class="col-lg-6 col-md-6">
            <div class="panel info-box panel-white">
                <div class="panel-body">
                <a href="<?php echo base_url();?>kpitb_notes/index">
                    <div class="info-box-stats">
                        <p>Notes</p>
                        <span class="info-box-title">Initiate & View Letters</span>
                    </div>
                    <div class="info-box-icon">
                        <!-- <label for="" class="pull-left">New </label><span class="pull-right badge badge-warning">19</span><br> -->
                        <label for=""  class="pull-left">New Notes </label><span class="pull-right badge badge-success" id="note"></span><br>
                        <!-- <label for=""  class="pull-left">Pending </label><span class="pull-right badge">54</span><br> -->
                        <!-- <label for=""  class="pull-left">Rejected </label><span class="pull-right badge badge-danger">22</span> -->
                    </div>
                </a>
                </div>
            </div>
        </div>
        <!-- Manage Users -->
        <div class="col-lg-4 col-md-6">
            <div class="panel info-box panel-white">
                <div class="panel-body">
                <a href="<?php echo base_url();?>staff">
                    <div class="info-box-stats">
                        <p style=" margin-top: 1em;">Manage Users</p>
                        <span class="info-box-title">Manage All Users</span>
                    </div>
                    <div class="info-box-icon">
                </a>
                </div>
            </div>
        </div>
        <!-- End Of Manage Users -->
    </div>
    <!-- Main Wrapper -->
    <div class="page-footer">
        <p class="no-s">2015 &copy; Rights Reserved: Kyber PakhtunKhwa IT Board Peshawar</p>
    </div>
</main><!-- Page Content -->
<?php $this->load->view('parts/footer');?>