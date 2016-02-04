<?php 
$this->load->view('parts/header');
$this->load->view('parts/head_msgs');
$this->load->view('parts/sidemenu');?>
<div class="page-inner">
<div id="main-wrapper">
<div class="col-lg-12 col-md-12">
        <div class="panel info-box panel-white">
            <div class="panel-body bread">
            <h2 class="NoPadTop">Dashboard</h2>
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>kpitb_panel/index">Dashboard</a></li>
                    <li><a href="<?php echo base_url();?>kpitb_panel/logs">Logs</a></li>
                    <li><a>Login Logs</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- End This -->
<div class="col-lg-12 col-md-12">
    <div class="panel panel-white">
        <div class="panel-body">
        <table id="example" class="display table" >
                <thead>
                    <tr>
                        <th>Member</th>
                        <th>IP Address</th>
                        <th>Time In</th>
                        <th>Time Out</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($LoginLogs)) {
                   foreach ($LoginLogs as $values) {?>
                    <tr>
                        <td><?php
                             if (!empty($Staff)) {
                                 foreach ($Staff as $value) {
                                     if ($value->id==$values->staff_id) {
                                         echo $value->first_name;
                                     }
                                 }
                             }
                            ?>
                        </td>
                        <td><?php echo $values->ip_address;?></td>
                        <td><?php echo $values->time_in;?></td>
                        <td><?php echo $values->time_out;?></td>
                        <td><?php echo $values->date;?></td>
                        <td><?php $Status = $values->status;
                                if ($Status==1) {
                                    echo '<span class="text-success">Logged Out</span>';                        
                                }
                                else
                                {
                                    echo '<span class="text-danger">Not Logged Out</span>';
                                }
                            ?></td>
                    </tr>
                    <?php }}?>
                </tbody>
               </table>  
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