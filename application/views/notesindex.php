<?php 
$this->load->view('parts/header');
$this->load->view('parts/head_msgs');
$this->load->view('parts/sidemenu');?>
<link rel="stylesheet" href="<?php echo base_url();?>assets/summernote.css">
<script src="<?php echo base_url();?>assets/plugins/jquery/jquery-2.1.3.min.js"></script>
<script>
$(document).ready(function(){
    $.ajax({
        url:"<?php echo base_url();?>kpitb_notes/postload",
        dataType: "html",
        success:function(ajaxresult){
            $("#Posts").html(ajaxresult);
        },
        });
    });
    function load() {
        $.ajax({
        url:"<?php echo base_url();?>kpitb_notes/postload",
        dataType: "html",
        success:function(ajaxresult){
            $("#Posts").delay(4000).html(ajaxresult);
        }
        });
    }
    function SendTo(from,file,to) {
        if(confirm('Are You Sure')){
        $.ajax({
        url: "<?php echo base_url();?>kpitb_notes/SendTo",
            type: 'POST',
            data: {from: from, file: file , to : to},
            complete: function() {
             load();
            }
        });
        }
    }
    function Comment(id,document,Comment){
        var comment = Comment;
        var Userid = id;
        var Document = document;
        var Check=1;
        $.ajax({
            url: "<?php echo site_url('kpitb_notes/AddComment')?>",
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
                <h2 class="NoPadTop">Notes</h2>
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url();?>kpitb_panel/index">Dashboard</a></li>
                        <li><a href="">Notes</a></li>
                    </ol>
                </div>
                <span class="pull-right">
                    <button id="ShowNote" class="btn btn-success">Initiate Note</button>
                    <button id="Cancel" style="display:none;" class="btn btn-default">Cancel</button>
                </span>
            </div>
        </div>
    </div>
    <!-- Initiate Notes Here -->
    <div class="col-lg-12 col-md-12" id="Shownote" style="display:none;">
        <div class="panel info-box panel-white">
            <div class="panel-body">
                <?php echo form_open_multipart(base_url().'kpitb_notes/Initiate')?>
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
                        <textarea name="text" class="summernote" id="contents" title="Contents"></textarea>
                    <div class="clearfix"></div>
                    <div class="form-group col-md-12">
                        <label for="">Attachments</label>
                        <input type="file" name="Files" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-md-8 col-lg-4">
                        <input type="hidden" name="From" value="<?php echo $this->session->userdata('id');?>">
                        <input type="submit" name="Notes" value="Send Note" class="btn btn-success">
                    </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
    </div>

    <!-- End This -->
    <div class="col-md-12">
    <div class="profile-timeline">
        <ul class="list-unstyled">
            <li class="timeline-item" id="Posts">
                
            </li>
        </ul>
    </div>
    </div>
        <!-- <div class="col-lg-4 col-md-6">
            <div class="panel info-box panel-white">
                <div class="panel-body">
                <a href="<?php //echo base_url();?>kpitb_notes/Newnotes">
                    <div class="info-box-stats">
                        <p style="margin-top:0.5em;">Notes</p>
                        <span class="info-box-title">See New notes</span>
                    </div>
                    <div class="info-box-icon">
                        <label for="" class="pull-left">New </label><span class="pull-right badge badge-warning" id="New"></span><br>
                    </div>
                </a>
                </div>
            </div>
        </div> -->
        <!-- <div class="col-lg-4 col-md-6">
            <div class="panel info-box panel-white">
                <div class="panel-body">
                <a href="<?php //echo base_url();?>kpitb_notes/Initiatenote">
                    <div
                 class="info-box-stats">
                        <p style="margin-top:0.5em;">Initiate Notes</p>
                        <span class="info-box-title">Initiate Notes</span>
                    </div>
                    <div class="info-box-icon">
                        <label for=""  class="pull-left">Approved </label><span class="pull-right badge badge-success">14</span><br>
                        <label for=""  class="pull-left">Pending </label><span class="pull-right badge">14</span><br>
                        <label for=""  class="pull-left">Rejected </label><span class="pull-right badge badge-danger">14</span>
                    </div>
                </a>
                </div>
            </div>
        </div> -->
        <!-- notes Ends Here -->
        
    </div>
    <div class="page-footer">
        <p class="no-s">2015 &copy; Rights Reserved: Kyber PakhtunKhwa IT Board Peshawar</p>
    </div>
</div>
</main>
<script>
$('#ShowNote').click(function() {
    $('#Shownote').delay(1000).slideDown(1000);
    $('#Cancel').show(1000);
    $('#Posts').hide(1000);
});
$('#Cancel').click(function() {
    $('#Shownote').slideUp(1000);
    $('#Cancel').hide(2000);
    $('#Posts').delay(1000).show(1000);
});
</script>
<?php $this->load->view('parts/footer');?>
<script src="<?php echo base_url();?>assets/js/bootstrap-multiselect.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#example-post').multiselect({
        includeSelectAllOption: true,
        enableFiltering: true
    });
});
</script>
<script src="<?php echo base_url();?>assets/summernote.js"></script>
<script>
    $('.summernote').summernote({
      height: 150,   
      codemirror: { 
        theme: 'monokai'
      }
    });
</script>