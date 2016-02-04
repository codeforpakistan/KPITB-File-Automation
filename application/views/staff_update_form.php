<?php 
    $this->load->view('parts/header');
    $this->load->view('parts/head_msgs');
    $this->load->view('parts/sidemenu');
    $cnic = $staff_records[0]->cnic;
    $cnic1 = substr($cnic,0,strpos($cnic,'-'));
    $cnic2 = substr($cnic,strpos($cnic,'-')+1,7);
    $cnic3 = substr($cnic,strrpos($cnic,'-')+1,1);
    // echo "<script>alert('". $cnic3 ."');</script>";
?>
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
                                <form method="post" enctype="multipart/form-data" action="<?php echo site_url(); ?>/staff/update/<?php echo $staff_records[0]->id; ?>">
                                    <div class="col-md-12 col-lg-6 NoPadding">
                                        <div class="form-group col-md-6">
                                            <label for="">First Name</label>
                                            <input name="first_name" value="<?php echo $staff_records[0]->first_name; ?>" type="text" class="form-control" placeholder="First Name">
                                        </div>
                                         <div class="form-group col-md-6">
                                            <label for="">Last Name</label>
                                            <input type="text" name="last_name" value="<?php echo $staff_records[0]->last_name; ?>" class="form-control" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                   <div class="col-md-12 col-lg-6 NoPadding">
                                        <div class="form-group col-md-3">
                                            <label for="">CNIC</label>
                                            <input type="text" name="cnic1" value="<?php echo $cnic1; ?>" maxlength="5" class="form-control" placeholder=" 12355">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">&nbsp;</label>
                                            <input type="text" name="cnic2" value="<?php echo $cnic2; ?>" maxlength="7" class="form-control" placeholder=" 5435123">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="">&nbsp;</label>
                                            <input type="text" name="cnic3"  value="<?php echo $cnic3; ?>"maxlength="1" class="form-control" placeholder=" 1">
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group col-md-8 col-lg-4">
                                        <label for="">Father Name</label>
                                        <input type="father_name" name="father_name"  value="<?php echo $staff_records[0]->father_name; ?>"class="form-control" placeholder="Father Name">
                                    </div>
                                   <div class="clearfix"></div>
                                    <div class="form-group col-md-8 col-lg-4">
                                        <label for="">Email</label>
                                        <input type="email" name="email" value="<?php echo $staff_records[0]->email; ?>" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group col-md-8 col-lg-4">
                                        <label for="">Designation</label>
                                        <input type="text" name="designation"  value="<?php echo $staff_records[0]->designation; ?>"class="form-control" placeholder="Designation">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group col-md-8 col-lg-4">
                                        <label for="">Password</label>
                                        <input type="password" name="password" value="<?php echo $staff_records[0]->password; ?>" class="form-control" placeholder="Password">
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
                                        <input type="submit" value="Update User" class="btn btn-success">
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