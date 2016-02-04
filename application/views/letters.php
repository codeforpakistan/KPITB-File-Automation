<?php 
$this->load->view('parts/header');
$this->load->view('parts/head_msgs');
$this->load->view('parts/sidemenu');
$ID = $this->uri->segment(3);
?>
<script>
$(document).ready(function(){
    $.ajax({
        url:"<?php echo site_url('kpitb_letters/letter_details')?>",
        dataType: "html",
        data: {id:<?php echo $ID;?>},
        method: "post",
        success:function(ajaxresult){
            $("#Posts").html(ajaxresult);
        },
        });
    });
    function ApproveLetter(id)
    {
     if (confirm('Are You Sure To Approve ?')) {
      $.ajax({
        url:"<?php echo base_url();?>kpitb_letters/ApproveLetter",
        data: {ID:id},
        method: "post",
        success:function(){
            $('#approve').html('<i class="fa fa-check"> </i> Approved');
            $('#disapprove').hide();
        },
      });  
    }};
    function DisapproveLetter(id)
    {
     if (confirm('Are You Sure To Reject This Letter?')) {
        $.ajax({
        url:"<?php echo site_url('kpitb_letters/DisapproveLetter')?>",
        data: {ID:id},
        method: "post",
        success:function(){
            $('#disapprove').html('<i class="fa fa-check"> </i> Rejected');
            $('#approve').hide();
        },
      }); 
    }};
    function Archieve(id)
    {
     if (confirm('Are You Sure To Archieve This Letter?')) {
        $.ajax({
        url:"<?php echo site_url('kpitb_letters/Archieve')?>",
        data: {ID:id},
        method: "post",
        success:function(){
           $('#AR').hide();
           $('#Ar').show();
           window.location="<?php echo site_url('kpitb_letters/index');?>";
        },
      }); 
    }};
    function load () {
       $.ajax({
        url:"<?php echo site_url('kpitb_letters/letter_details')?>",
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
            url: "<?php echo site_url('kpitb_letters/AddComment')?>",
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
        url: "<?php echo base_url();?>kpitb_letters/SendTo",
            type: 'POST',
            data: {from: from, file: file , to : to},
            complete: function() {
             window.location="<?php echo site_url('kpitb_letters/index');?>";
            }
        });
        }
    }
</script>

<!-- Page Sidebar -->
<div class="page-inner">
    <div id="main-wrapper">
        <div class="col-md-12"  id="Posts" style=" background:#fff;"></div>
    </div>
    <div class="page-footer print">
        <p class="no-s print">2015 &copy; Rights Reserved: Kyber PakhtunKhwa IT Board Peshawar</p>
    </div>
</div>
</main>
