<?php 
$this->load->view('parts/header');
$this->load->view('parts/head_msgs');
$this->load->view('parts/sidemenu');?>
<script src="<?php echo base_url();?>assets/plugins/jquery/jquery-2.1.3.min.js"></script>
<script>
$(document).ready(function(){
    $.ajax({
        url:"<?php echo site_url('kpitb_letters/postload')?>",
        dataType: "html",
        success:function(ajaxresult){
            $("#Posts").html(ajaxresult);
        },
        });
    });
    function load() {
        $.ajax({
        url:"<?php echo site_url('kpitb_letters/postload')?>",
        dataType: "html",
        success:function(ajaxresult){
            $("#Posts").html(ajaxresult);
        }
        });
    }
    function Comment(id,document,Comment){
        var comment = Comment;
        var Userid = id;
        var Document = document;
        var Check=1;
        console.log(comment+' '+Document+' '+id);
        $.ajax({
            url: "<?php echo site_url('kpitb_letters/AddComment')?>",
            type: 'POST',
            data: {comment: comment, userid: Userid , check : Check,Document:Document},
            complete: function() {
             load();
            }
        });
    }
</script>

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
                        <li><a href="">Notes</a></li>
                    </ol>
                </div>
                <span class="pull-right">
                    <button id="ShowLetter" class="btn btn-success">Initiate Letter</button>
                    <button id="Cancel" style="display:none;" class="btn btn-default">Cancel</button>
                </span>
            </div>
        </div>
    </div>
    <!-- Initiate Letter -->
    <div class="col-lg-12 col-md-12" id="showletter" style="display:none;">
        <div class="panel info-box panel-white">
            <div class="panel-body">
                <?php echo form_open_multipart(base_url().'kpitb_letters/Initiate')?>
                    <div class="form-group col-md-8 col-lg-4">
                        <label for="">Send To</label>
                        <br>
                        <select class="form-control" name="SendTo">
                           <?php if (!empty($Employee)) {
                                foreach ($Employee as $Person) {
                                    echo '<option value="'.$Person->id.'">'.$Person->first_name.' '.$Person->last_name.'</option>';
                                }
                            }?>
                        </select>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-md-8 col-lg-4">
                        <label for="">Subject</label>
                        <input type="text" name="Subject" class="form-control" placeholder="Subject">
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-md-8 col-lg-8">
                        <label for="">Details</label>
                        <textarea name="Details" class="form-control" id="" cols="60" rows="12"></textarea>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-md-8 col-lg-4">
                        <label for="">Attachments</label>
                        <input type="file" name="Files" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-md-8 col-lg-4">
                        <input type="hidden" name="From" value="<?php echo $this->session->userdata('id');?>">
                        <input type="submit" name="Letter" value="Send Letter" class="btn btn-success">
                    </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
    <!-- End This -->
       
    <!-- Letters Ends Here -->
    <div class="col-md-12">
    <div class="profile-timeline">
        <ul class="list-unstyled">
            <li class="timeline-item" id="Posts">
                
            </li>
        </ul>
    </div>
    </div>
    </div>
    <div class="page-footer print">
        <p class="no-s print">2015 &copy; Rights Reserved: Kyber PakhtunKhwa IT Board Peshawar</p>
    </div>
</div>
</main>
<?php $this->load->view('parts/footer');?>
<script>
$('#ShowLetter').click(function() {
    $('#showletter').delay(1000).slideDown(1000);
    $('#Cancel').show(1000);
    $('#Posts').hide(1000);
});
$('#Cancel').click(function() {
    $('#showletter').slideUp(1000);
    $('#Cancel').hide(2000);
    $('#Posts').delay(1000).show(1000);
});
</script>
<script src="<?php echo base_url();?>assets/js/bootstrap-multiselect.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#example-post').multiselect({
        includeSelectAllOption: true,
        enableFiltering: true
    });
});
</script>