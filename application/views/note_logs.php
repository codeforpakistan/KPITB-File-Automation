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
                   <li><a href="<?php echo base_url();?>kpitb_panel/logs">Logs</a></li>
                   <li><a>Letter Logs</a></li>
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
                        <th>Initiated By</th>
                        <th>Subject</th>
                        <th>Date & Time</th>
                        <th>View History</th>
                        <th>Archieve</th>
                        <th>Approvals </th>
                    </tr>
                </thead> 
                <tfoot>
                    <tr>
                        <th>Initiated By</th>
                        <th>Subject</th>
                        <th>Date & Time</th>
                        <th>View History</th>
                        <th>Archieve</th>
                        <th>Approvals</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php if (!empty($NoteLogs)) {
                   foreach ($NoteLogs as $values) {?>
                    <tr> <td><?php
                             if (!empty($Staff)) {
                                 foreach ($Staff as $value) {
                                     if ($value->id==$values->staff_id) {
                                         echo $value->first_name;
                                     }
                                 }
                             }
                            ?>
                        </td>
                        <td><?php echo $values->subject;?></td>
                        <td><?php $Databasetime = $values->time_stamp;?>
                            <?php echo date("d-M-Y H:i a", strtotime($Databasetime));?></td>
                        <td><a href="<?php echo base_url();?>kpitb_panel/ViewHistoryNotes/<?php echo $values->id;?>" class="btn btn-success btn-xs"> <i class="fa fa-book"> </i> History</a></td>
                        <td>
                            <?php $AR =  $values->archieve;
                                if ($AR==1) {
                                    echo '<a href="" class="btn btn-info btn-xs"><i class="fa fa-dropbox"></i> Archieved</a>';
                                }
                                else
                                {
                                    echo '<a href="" class="btn btn-success btn-xs"><i class="fa fa-dropbox"></i> File Running</a>';
                                }
                            ?>
                        </td>
                        <td>
                            <?php $AP =  $values->approval;
                                if ($AP==1) {
                                    echo '<a href="" class="btn btn-info btn-xs"><i class="fa fa-dropbox"></i> Approved</a>';
                                }
                                elseif($AP==2)
                                {
                                    echo '<a href="" class="btn btn-danger btn-xs"><i class="fa fa-dropbox"></i> Rejected</a>';
                                }
                                else
                                {
                                    echo '<a href="" class="btn btn-primary btn-xs"><i class="fa fa-dropbox"></i> Under Process</a>';
                                }
                            ?>
                        </td>
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