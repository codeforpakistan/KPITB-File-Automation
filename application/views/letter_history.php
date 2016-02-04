<?php 
$this->load->view('parts/header');
$this->load->view('parts/head_msgs');
$this->load->view('parts/sidemenu');?>
<div class="page-inner">
<div id="main-wrapper">
<div class="col-lg-12 col-md-12">
    <div class="panel info-box panel-white">
        <div class="panel-body bread">
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                   <li><a href="<?php echo base_url();?>kpitb_panel/index">Dashboard</a></li>
                   <li><a href="<?php echo base_url();?>kpitb_panel/LetterLogs">Letter Logs</a></li>
                   <li><a>History</a></li>
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
                        <th>Subject</th>
                        <th>Sender ID</th>
                        <th>Reciver Id</th>
                        <th>Date & Time</th>
                    </tr>
                </thead> 
                <tfoot>
                    <tr>
                        <th>Subject</th>
                        <th>Sender ID</th>
                        <th>Reciver Id</th>
                        <th>Date & Time</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php if (!empty($History)) {
                   foreach ($History as $values) {?>
                    <tr>
                        <td>
                            <?php
                                if (!empty($Letter)) {
                                    foreach ($Letter as $Let) {
                                       echo $Let->subject;
                                    }
                                }
                            ?>
                        </td>
                        <td><?php
                             if (!empty($Staff)) {
                                 foreach ($Staff as $value) {
                                     if ($value->id==$values->sender_id) {
                                         echo $value->first_name;
                                     }
                                 }
                             }
                            ?>
                        </td>
                        <td><?php
                             if (!empty($Staff)) {
                                 foreach ($Staff as $value) {
                                     if ($value->id==$values->reciver_id) {
                                         echo $value->first_name;
                                     }
                                 }
                             }

                            ?></td>
                        <td><?php $Databasetime = $values->time_stamp;?>
                            <?php echo date("d-M-Y H:i a", strtotime($Databasetime));?></td>
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