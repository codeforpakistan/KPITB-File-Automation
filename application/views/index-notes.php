<?php 
$this->load->view('parts/header');
$this->load->view('parts/head_msgs');
$this->load->view('parts/sidemenu');?>
<script src="<?php echo base_url();?>assets/plugins/jquery/jquery-2.1.3.min.js"></script>
<!-- Page Sidebar -->
<script>
$(document).ready(function(){
    $.ajax({
    url:"<?php echo base_url();?>kpitb_notes/Loadnotes",
    dataType: "html",
    success:function(ajaxresult){
        $("#mail").html(ajaxresult);
     }
    });
});
</script>
<div class="page-inner">
    <div id="main-wrapper" style="background:#fff important;">
        <?php 
            if(check_permission('create_note'))
            {
        ?>
        <span class="pull-left" style="padding:1em">
            <button id="ShowNote" class="btn btn-success">New Note Sheet</button>
            <button id="Cancel" style="display:none;" class="btn btn-default">Cancel</button>
        </span>
        <?php } ?>
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
                                    if ($Person->id != $this->session->userdata('id')) {
                                        echo '<option value="'.$Person->id.'">'.$Person->first_name.' '.$Person->last_name.'</option>';
                                    }
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
                        <textarea name="text" class="summernote" id="contents" title="Contents">
                            
                        </textarea>
                    <div class="clearfix"></div>
                    <div class="form-group col-md-12">
                        <label for="">Attachments If Any:</label>
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
        <div class="col-md-12" id="mail">
            
        </div>
    </div>
    <div class="page-footer">
        <p class="no-s">2015 &copy; Rights Reserved: Kyber PakhtunKhwa IT Board Peshawar</p>
    </div>
</div>
</main>
<?php $this->load->view('parts/footer');?>
<script>
Feedback('<?php if(!empty($Message)){echo $Message;}?>');
$('#ShowNote').click(function() {
    $('#Shownote').delay(1000).slideDown(1000);
    $('#Cancel').show(1000);
    $('#mail').hide(1000);
});
$('#Cancel').click(function() {
    $('#Shownote').slideUp(1000);
    $('#Cancel').hide(2000);
    $('#mail').delay(1000).show(1000);
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