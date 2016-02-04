<?php $this->load->view('parts/header');
     $this->load->view('parts/head_msgs');
    if (!empty($AdminInfo)) {
    foreach ($AdminInfo as $info) {?>
            <!-- Navbar -->
            <?php $this->load->view('parts/sidemenu')?>
            <!-- Page Sidebar -->
            <div class="page-inner">
                <div id="main-wrapper">
                <div class="col-lg-12 col-md-12">
                        <div class="panel info-box panel-white">
                            <div class="panel-body bread">
                            <h2 class="NoPadTop">Dashboard</h2>
                            <div class="page-breadcrumb">
                                <ol class="breadcrumb">
                                    <li><a href="kpitb_panel/index">Dashboard</a></li>
                                    <li><a href="#">Profile</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End This -->
                    <div class="col-lg-12 col-md-12">
                        <div class="panel info-box panel-white">
                            <div class="panel-body">
                                <div class="col-md-3 user-profile">
                            <div class="profile-image-container contain">
                                <img class="img img-responsive" src="<?php echo base_url();?>assets/VisualData/<?php echo $info->picture;?>" alt="">
                                <p id="Replace" class="replace"><a id="click" class="Click btn btn-default pull-right"><i class="fa fa-pencil"></i></a></p>
                            </div>
                            <div id="DisplayForm" style="display:none;">
                                <div class="col-sm-12" style="width:240px;">
                                <hr>
                                <?php echo form_open_multipart(base_url().'kpitb_panel/Profile_Image');?>
                                    <input type="file" class="form-control" name="Photo">
                                    <input type="hidden" name="AdminID" value="<?php echo $info->id;?>">
                                    <input type="submit" name="changepic" class="pull-right btn btn-success btn-xs" value="Upload">
                                <?php echo form_close();?>
                                </div>
                            </div>
                            <h3 class="text-center textCap"><?php echo $info->first_name.' '.$info->last_name;?></h3>
                            <p class="text-center"><?php echo $info->designation;?></p>
                            
                            <hr>
                            <ul class="list-unstyled text-center">
                                <li><p><i class="fa fa-envelope m-r-xs"></i><a href="#"><?php echo $info->email;?></a></p></li>
                                <li><p><i class="fa fa-link m-r-xs"></i><a href="#">www.kpitb.gov.pk</a></p></li>
                            </ul>
                            
                            <hr>
                        </div>
                                <div class="col-lg-offset-1 col-lg-7">
                                <table class="table table-striped MarginTop">
                                    <tr>
                                        <th>Name</th>
                                        <td class="textCap"><?php echo $info->first_name.' '.$info->last_name;?></td>
                                    </tr>
                                    <tr>
                                        <th>CNIC</th>
                                        <td><?php echo $info->cnic;?></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td><?php echo $info->email;?></td>
                                    </tr>
                                    <tr>
                                        <th>Father Name</th>
                                        <td><?php echo $info->father_name;?></td>
                                    </tr>
                                    <tr>
                                        <th>Designation</th>
                                        <td><?php echo $info->designation;?></td>
                                    </tr>
                                    <tr>
                                        <th>Signature</th>
                                        <td><img width="250" class="img img-thumbnail img-responsive" src="<?php echo base_url();?>assets/VisualData/Signatures/<?php echo $info->signature;?>" alt=""></td>
                                    </tr>
                                    <tr>
                                        <th>Account Created On</th>
                                        <td><?php echo $info->time_stamp;?></td>
                                    </tr>
                                </table>
                                </div>
                                <?php }}?>
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
<script>
    $(document).ready(function() {
          $('#click').click(function() {
          $('#DisplayForm').slideToggle("fast");
        });
    });
</script>
          