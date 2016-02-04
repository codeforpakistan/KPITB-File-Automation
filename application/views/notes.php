<?php 
$this->load->view('parts/header');
$this->load->view('parts/head_msgs');
$this->load->view('parts/sidemenu');
$ID = $this->uri->segment(3);      ?>
<script>
$(document).ready(function(){
    $.ajax({
        url:"<?php echo site_url('kpitb_notes/Note_details')?>",
        dataType: "html",
        data: {id:<?php echo $ID;?>},
        method: "post",
        success:function(ajaxresult){
            $("#Posts").html(ajaxresult);
        },
        });
    });
    function ApproveNote(id)
    {
      $.ajax({
        url:"<?php echo base_url();?>kpitb_notes/ApproveNote",
        data: {ID:id},
        method: "post",
        success:function(ajaxresult){
            $('#approve').html('<i class="fa fa-check"> </i> Approved');
            $('#disapprove').hide();
        },
      });  
    }
    function DisapproveNote(id)
    {
        $.ajax({
        url:"<?php echo site_url('kpitb_notes/DisapproveNote')?>",
        data: {ID:id},
        method: "post",
        success:function(ajaxresult){
            $('#disapprove').html('<i class="fa fa-check"> </i> Rejected');
            $('#approve').hide();
        },
      }); 
    }
    function Archieve(id)
    {
        $.ajax({
        url:"<?php echo site_url('kpitb_notes/Archieve')?>",
        data: {ID:id},
        method: "post",
        success:function(ajaxresult){
           $('#AR').hide();
           $('#Ar').show();
           window.location="<?php echo site_url('kpitb_notes/index');?>";
        },
      }); 
    }
    function load () {
        $.ajax({
            url:"<?php echo site_url('kpitb_notes/Note_details')?>",
            dataType: "html",
            data: {id:<?php echo $ID;?>},
            method: "post",
            success:function(ajaxresult){
                $("#Posts").html(ajaxresult);
            },
            });
    }
    function Comment(id,document,Comment){
        var comment = Comment;
        var Userid = id;
        var Document = document;
        var Check=1;
        console.log(comment+' '+Document+' '+id);
        $.ajax({
            url: "<?php echo site_url('kpitb_notes/AddComment')?>",
            type: 'POST',
            data: {comment: comment, userid: Userid , check : Check,Document:Document},
            complete: function() {
             load();
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
             window.location="<?php echo site_url('kpitb_notes/index');?>";
            }
        });
        }
    }
</script>
<div class="page-inner">
    <div id="main-wrapper">
        <div class="col-md-12"  id="Posts" style=" background:#fff;"></div>
    </div>
    <div class="page-footer print">
        <p class="no-s print">2015 &copy; Rights Reserved: Kyber PakhtunKhwa IT Board Peshawar</p>
    </div>
</div>
</main>
