<script src="<?php echo base_url();?>assets/plugins/jquery/jquery-2.1.3.min.js"></script>
<script>
function Notes(){
  $.get('<?php echo base_url();?>kpitb_notes/CountNotes', function(data) {
    var jdata = JSON.parse(data);
    $('#note').text(jdata.one);
  });
}
setInterval(Letters, 5000);

function Letters(){
  $.get('<?php echo base_url();?>kpitb_letters/CountLetter', function(data) {
    var jdata = JSON.parse(data);
    $('#letter').text(jdata.one);
  });
}
setInterval(Notes, 5000);
</script>
<div class="page-sidebar sidebar print">
<div class="page-sidebar-inner slimscroll">
    <div class="sidebar-header">
        <div class="sidebar-profile">
            <a href="javascript:void(0);">
                <div class="sidebar-profile-image">
                    <img src="<?php echo base_url();?>assets/VisualData/<?php echo $this->session->userdata('Picture');?>" class="img-circle img-responsive" alt="">
                    <div class="sidebar-profile-details" class="print">
                        <span><?php echo $this->session->userdata('FirstName').' '.$this->session->userdata('LastName');?><br><small> <?php echo $this->session->userdata('DGN');?></small></span>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <ul class="menu accordion-menu">
      <!--   <li class="active">
            <a href="<?php echo base_url();?>kpitb_panel/index" class="waves-effect waves-button">
                <span class="menu-icon glyphicon glyphicon-home"></span>
                <p>Dashboard</p>
            </a>
        </li> -->
        <li>
            <a href="<?php echo base_url();?>kpitb_letters/index" class="waves-effect waves-button">
                <span class="menu-icon fa fa-envelope-o"></span>
                <p>Incoming Letters <i class="badge badge-success pull-right" style="background:green;color:#fff; padding:0 0.7em;" id="letter"></i></p>

            </a>
        </li>
        <li>
            <a href="<?php echo base_url();?>kpitb_notes/index" class="waves-effect waves-button">
                <span class="menu-icon fa fa-file-word-o"></span>
                <p>Note Sheet <i class="badge badge-success pull-right" style="background:green;color:#fff; padding:0 0.7em;" id="note"></i></p>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url();?>kpitb_letters/Sendletter" class="waves-effect waves-button">
                <span class="menu-icon fa fa-file-o"></span>
                <p>Sent Letters</p>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url();?>kpitb_notes/SendNotes" class="waves-effect waves-button">
                <span class="menu-icon fa fa-file-o"></span>
                <p>Sent Note Sheet</p>
            </a>
        </li>
        <?php if($this->session->userdata('id')==1){ ?>
        <li>
            <a href="<?php echo base_url();?>staff/index" class="waves-effect waves-button">
                <span class="menu-icon fa fa-users fa-flip-horizontal"></span>
                <p>Staff</p>
            </a>
        </li>
        <?php }?>
        <li>
            <a href="<?php echo base_url();?>kpitb_panel/logs" class="waves-effect waves-button">
                <span class="menu-icon fa fa-lock fa-flip-horizontal"></span>
                <p>Logs</p>
            </a>
        </li>

    </ul>
</div><!-- Page Sidebar Inner -->
</div>