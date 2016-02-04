<?php 
$this->load->view('parts/header');
$this->load->view('parts/head_msgs');
$this->load->view('parts/sidemenu');?>
            <div class="page-inner"> 
                <div id="main-wrapper"> 
                    <div class="col-lg-12 col-md-12">
                        <div class="panel info-box panel-white">
                            <div class="panel-body bread">
                            <h2 class="NoPadTop">New User</h2>
                            <div class="page-breadcrumb">
                                <ol class="breadcrumb">
                                    <li><a href="index.html">Dashboard</a></li>
                                    <li>New User</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                 <!-- Bread Crumb -->
                    <!-- Letters Ends Here -->
                    <div class="col-lg-12 col-md-12">
                        <div class="panel info-box panel-white">
                            <div class="panel-body">
                                <form method="post" enctype="multipart/form-data" action="<?php echo site_url(); ?>/staff/insert">
                                    <div class="col-md-12 col-lg-6 NoPadding">
                                        <div class="form-group col-md-6">
                                            <label for="">First Name</label>
                                            <input name="first_name" type="text" class="form-control" placeholder="First Name">
                                        </div>
                                         <div class="form-group col-md-6">
                                            <label for="">Last Name</label>
                                            <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                   <div class="col-md-12 col-lg-6 NoPadding">
                                        <div class="form-group col-md-3">
                                            <label for="">CNIC</label>
                                            <input type="text" name="cnic1" maxlength="5" class="form-control" placeholder=" 12355">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">&nbsp;</label>
                                            <input type="text" name="cnic2" maxlength="7" class="form-control" placeholder=" 5435123">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="">&nbsp;</label>
                                            <input type="text" name="cnic3" maxlength="1" class="form-control" placeholder=" 1">
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group col-md-8 col-lg-4">
                                        <label for="">Father Name</label>
                                        <input type="father_name" name="father_name" class="form-control" placeholder="Father Name">
                                    </div>
                                   <div class="clearfix"></div>
                                    <div class="form-group col-md-8 col-lg-4">
                                        <label for="">Official Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group col-md-8 col-lg-4">
                                        <label for="">Designation</label>
                                        <input type="text" name="designation" class="form-control" placeholder="Designation">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group col-md-8 col-lg-4">
                                        <label for="">Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group col-md-8 col-lg-4">
                                        <label for="">Signature</label>
                                        <input type="file" name="signature" class="form-control" placeholder="Signature">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group col-md-8 col-lg-4">
                                        <label for="">Picture</label>
                                        <input type="file" name="profilepicture" class="form-control">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group col-md-8 col-lg-4">
                                        <input type="submit" value="Save User" class="btn btn-success">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Main Wrapper -->
                <div class="page-footer">
                    <p class="no-s">2015 &copy; Rights Reserved: Kyber PakhtunKhwa IT Board Peshawar</p>
                </div>
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
	

<?php $this->load->view('parts/footer');?>