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
                            <div class="page-breadcrumb">
                                <ol class="breadcrumb">
                                    <li><a href="<?php echo base_url();?>kpitb_panel/index">Dashboard</a></li>
                                    <li><a href="">Logs</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                    <?php
                    if(check_permission('log_note'))
                    {
                    ?>
                    <!-- Letters Ends Here -->
                    <div class="col-lg-4 col-md-4">
                        <div class="panel info-box panel-white">
                            <div class="panel-body">
                            <a href="<?php echo base_url();?>kpitb_panel/NoteLogs">
                                <div class="info-box-stats">
                                    <h3>Note Sheet</h3>
                                    <span class="info-box-title">View Notes Information Logs</span>
                                </div>
                                <div class="info-box-icon">
                                </div>
                            </a>
                            </div>
                        </div>
                    </div>
                    <?php 
                    }
                    if(check_permission('log_letter'))
                    {
                    ?>
                    <!-- End Of Notes -->
                    <div class="col-lg-4 col-md-6">
                    <div class="panel info-box panel-white">
                        <div class="panel-body">
                         <a href="<?php echo base_url();?>kpitb_panel/LetterLogs">
                                <div class="info-box-stats">
                                    <h3>Letters Information</h3>
                                    <span class="info-box-title">View Letter Information Logs</span>
                                </div>
                                <div class="info-box-icon">
                                </div>
                            </a>
                        </div>
                    </div>
                    </div>

                    <?php 
                    }
                    if(check_permission('log_login'))
                    {
                    ?>
                <!-- End This -->
                    <div class="col-lg-4 col-md-4">
                        <a href="<?php echo base_url();?>kpitb_panel/Login_logs">
                        <div class="panel info-box panel-white">
                            <div class="panel-body">
                                <div class="info-box-stats">
                                    <h3>Login Information</h3>
                                    <span class="info-box-title">View Login/Logout Logs</span>
                                </div>
                                <div class="info-box-icon">
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <?php 
                    }
                    ?>
                </div>
                <!-- Main Wrapper -->
                <div class="page-footer">
                    <p class="no-s">2015 &copy; Rights Reserved: Kyber PakhtunKhwa IT Board Peshawar</p>
                </div>
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
<?php $this->load->view('parts/footer');?>