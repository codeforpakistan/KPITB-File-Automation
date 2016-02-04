<?php 
$this->load->view('parts/header');
$this->load->view('parts/head_msgs');
$this->load->view('parts/sidemenu');?>
<link rel="stylesheet" href="<?php echo base_url();?>assets/jquery.fancybox.css">
<div class="page-inner">
    <div id="main-wrapper" class="print no">

        <div class="col-md-12" id="mail" style="background:#fff;">
     
<?php
		$row = array();
		$WhereCondition = array('id'=> $id);
		$Notes = $this->kpitb_model->SelectOneRowDataDB('intial_note',$WhereCondition);
		// Selected the letter 
		$SelectFields = ['id','first_name','designation','last_name','picture'];
		$Staff = $this->kpitb_model->SelectRowsDataDB('staff',$SelectFields);
		// Now Selecting the person details
		$RequiredFields = ['staff_id','text','time_stamp','document_id','signature'];
		$Comments = $this->kpitb_model->SelectRowsDataDB('comment_notes',$RequiredFields);
		// Also Selecting The Comments on this post
		 if (!empty($Notes)) {
		     foreach ($Notes as $EachPost) {
		    if (!empty($Staff)) {
		        foreach ($Staff as $EachPerson) {
		        	$Note = $EachPost->id;
		        	// Extracting the letter id for saving the comments on
		            $StaffID = $EachPerson->id;
		        	// Staff id
		            if ($StaffID == $EachPost->staff_id) {?> 
			<div class="col-md-9">
		        <table class="table table-striped">
		        <tr>
		        	<td><b>Send To: </b> <?php 
                     if (!empty($Staff)) {
        				foreach ($Staff as $EachMember) {
                    	if ($EachPost->sendto == $EachMember->id) {
                    		echo $EachMember->first_name.' '.$EachMember->last_name;
                    	}
                    }}
                    ?></td>
		        </tr>
		            <tr>
		                <td>
		                    <b>Subject: </b>  <?php echo $EachPost->subject;?>
		                </td>
		            </tr>
		            <tr>
		                <td>
		                    <b>Details:</b><br>
		                    <?php echo $EachPost->detail;?>
		                </td>
		            </tr>
		           <?php if (!empty($EachPost->attachment)) { ?>
		             <tr>
		                <td>
			                <a class="fancybox" href="<?php echo base_url();?>assets/Attachments/<?php echo $EachPost->attachment;?>" data-fancybox-group="gallery" title="<?php echo $EachPost->attachment;?>">
			                	<img width="200" class="img img-responsive img-thumbnail" src="<?php echo base_url();?>assets/Attachments/<?php echo $EachPost->attachment;?>" alt="">
			                </a>
		                </td>
		            </tr>
		            <?php }?>
		        </table>
		    </div>
    <div class="col-md-3">
        <table class="table table-striped table-condensed">
            <tr>
                <th>Note Initiated By:</th>
            </tr>
            <tr>
                <td><?php echo $EachPerson->first_name.' '.$EachPerson->last_name;?></td>
            </tr>
            <tr>
                <th>Designation:</th>
            </tr>
            <tr>
                <td><?php echo $EachPerson->designation?></td>
            </tr>
            <tr>
                <th>Time Stamp:</th>
            </tr>
            <tr>
                <td> <?php $Databasetime = $EachPost->time_stamp;?>
		    <?php echo date("d-M-Y H:i a", strtotime($Databasetime));?></td>
            </tr>
            <tr>
				<td><input type="button" value="Print This Page" id="print" class="btn btn-info"></td>
			</tr>
        </table>
    </div>
	<div class="col-md-9" style="min-height:100px;">
		<table class="table table-condensed">
        	<?php if (!empty($Comments)) {
		        foreach ($Comments as $EachComment) {
		        	if (!empty($Staff)) {
		        		foreach ($Staff as $Each) {
		        			$Stamp = $Each->id;
		            if ($Stamp == $EachComment->staff_id) {
		            	if ($Note == $EachComment->document_id) {?>
	        	<tr>
		        	<td>
		        		<?php $Database = $EachComment->time_stamp;?>
		        		<b><?php echo $EachPerson->first_name.' '.$EachPerson->last_name;?></b>
		        		<small><?php echo date("d-M-Y H:i a", strtotime($Database));?></small>
					    	
					        <p></p>
					        <?php if($EachComment->signature == '1'){ ?>
					       	 <span class="pull-right"><input checked type="checkbox" disabled>Signature Included</span>
					        <?php }?>
					    <p class="timeline-comment-text"><?php echo $EachComment->text;?></p>
		        	</td>
			    </tr>
			<?php }}}}}}?>
			  </table>
	</div>	
<?php }}}}} ?>
</div>
</div>
<!-- Note Print Starts here-->
<div id="main-wrapper" class="toprint" style="display:none;">
  <div class="col-md-12" id="mail" style="background:#fff;">
    	<img class="logo" src="<?php echo base_url();?>assets/VisualData/logo.png" width="50" height="45" alt="">
        <p class="logo-text">Kyber Pakhtunkhwa IT Board</p>
        <div class="clearfix"></div>
        <hr>
<?php
		$row = array();
		$WhereCondition = array('id'=> $id);
		$Notes = $this->kpitb_model->SelectOneRowDataDB('intial_note',$WhereCondition);
		// Selected the letter 
		$SelectFields = ['id','first_name','signature','designation','last_name','picture'];
		$Staff = $this->kpitb_model->SelectRowsDataDB('staff',$SelectFields);
		// Now Selecting the person details
		$RequiredFields = ['staff_id','text','time_stamp','document_id','signature'];
		$Comments = $this->kpitb_model->SelectRowsDataDB('comment_notes',$RequiredFields);
		// Also Selecting The Comments on this post
		 if (!empty($Notes)) {
		     foreach ($Notes as $EachPost) {
		    if (!empty($Staff)) {
		        foreach ($Staff as $EachPerson) {
		        	$Note = $EachPost->id;
		        	// Extracting the letter id for saving the comments on
		            $StaffID = $EachPerson->id;
		        	// Staff id
		            if ($StaffID == $EachPost->staff_id) {?> 
			<div class="col-md-9">
		        	<!-- <b>Send To: </b> --> <?php 
                     if (!empty($Staff)) {
        				foreach ($Staff as $EachMember) {
                    	// if ($EachPost->sendto == $EachMember->id) {
                    		//echo $EachMember->first_name.' '.$EachMember->last_name;
                    	// }
                    }}?>
                    <br><br>
                    <b>Subject: </b>  <?php echo $EachPost->subject;?><br><br>
                    <b>Details:</b><br><br>
                    <?php echo $EachPost->detail;?><br><br>
		            <?php if (!empty($EachPost->attachment)) { ?>
		                <img width="200" class="img img-responsive img-thumbnail" src="<?php echo base_url();?>assets/Attachments/<?php echo $EachPost->attachment;?>" alt=""></td>
		            <?php }?>
		    </div>
		<div class="col-md-9" style="min-height:100px;">
        	<?php if (!empty($Comments)) {
		        foreach ($Comments as $EachComment) {
		        	if (!empty($Staff)) {
		        		foreach ($Staff as $Each) {
		        			$Stamp = $Each->id;
		            if ($Stamp == $EachComment->staff_id) {
		            	if ($Note == $EachComment->document_id) {?>
		        		<?php //$Database = $EachComment->time_stamp;?>
		        		<!-- <b><?php //echo $EachPerson->first_name.' '.$EachPerson->last_name;?></b> -->
					    <p style="float:left;"  class="timeline-comment-text"><?php echo $EachComment->text;?></p>
				    	<?php if(!empty($EachPerson->signature)){ ?>
				        <img style="padding-left:1em;" src="<?php echo base_url();?>assets/Attachments/<?php echo $EachPerson->signature;?>" alt="">
				        <?php }?>
			<?php }}}}}}?>
		</div>	
		<div class="col-md-3" style="color:#ccc;">
	        <b>Note Initiated By:</b>
	        <?php echo $EachPerson->first_name.' '.$EachPerson->last_name;?>
	        &nbsp;&nbsp;&nbsp;(<?php echo $EachPerson->designation?>)
	        &nbsp;&nbsp;&nbsp;&nbsp;<b>Date:</b>
	         <?php $Databasetime = $EachPost->time_stamp;?>
	    <?php echo date("d-M-Y", strtotime($Databasetime));?>
	    </div>
<?php }}}}} ?>
<!-- Note Print Ends Here -->
</div>
</div>

    <div class="page-footer print">
        <p class="no-s print">2015 &copy; Rights Reserved: Kyber PakhtunKhwa IT Board Peshawar</p>
    </div>
</div>
</main>
<?php $this->load->view('parts/footer');?>
<script type="text/javascript" src="<?php echo base_url();?>assets/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/jquery.fancybox.pack.js"></script>
<script>
$(document).ready(function() {
    $('.fancybox').fancybox();
});
</script>
<script>
	$('#print').click(function(){
		$('.no').hide();
		$('.toprint').show();
		window.print();
	});
</script>
