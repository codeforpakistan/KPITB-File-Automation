<div class="no">
<?php
$row = array();
$WhereCondition = array('id' => $id);
$Notes = $this->kpitb_model->SelectOneRowDataDB('intial_note', $WhereCondition);
// Selected the letter
$SelectFields = ['id', 'first_name', 'designation', 'last_name', 'picture'];
$Staff = $this->kpitb_model->SelectRowsDataDB('staff', $SelectFields);
// Also Selecting The Comments on this post
if (!empty($Notes)) {
	foreach ($Notes as $EachPost) {
		$Note = $EachPost->id;
		$Where = array('document_id' => $Note);
		$RequiredFields = ['staff_id', 'text', 'time_stamp', 'document_id', 'signature'];
		$Comments = $this->kpitb_model->SelectCommentsForNote('comment_notes', $RequiredFields, $Where);
		if (!empty($Staff)) {
			foreach ($Staff as $EachPerson) {
				// Extracting the letter id for saving the comments on
				$StaffID = $EachPerson->id;
				// Staff id
				if ($StaffID == $EachPost->staff_id) {
					?>
			<div class="col-md-9">
		        <table class="table table-striped">
		            <tr>
		                <td>
		                    <b>Subject: </b>  <?php echo $EachPost->subject; ?>
		                </td>
		            </tr>
		            <tr>
		                <td>
		                    <b>Details:</b><br>
		                    <?php echo $EachPost->detail; ?>
		                </td>
		            </tr>
		            <?php if (!empty($EachPost->attachment)) {?>
		             <tr>
		                <td><img width="200" class="img img-responsive img-thumbnail" src="<?php echo base_url(); ?>assets/Attachments/<?php echo $EachPost->attachment; ?>" alt=""></td>
		            </tr>
		            <?php }
					?>
		        </table>
		    </div>
    <div class="col-md-3">
        <table class="table table-striped table-condensed">
            <tr>
                <th>Note Initiated By:</th>
            </tr>
            <tr>
                <td><?php echo $EachPerson->first_name . ' ' . $EachPerson->last_name; ?></td>
            </tr>
            <tr>
                <th>Designation:</th>
            </tr>
            <tr>
                <td><?php echo $EachPerson->designation ?></td>
            </tr>
            <tr>
                <th>Time Stamp:</th>
            </tr>
            <tr>
                <td> <?php $Databasetime = $EachPost->time_stamp;?>
		    <?php echo date("d-M-Y H:i a", strtotime($Databasetime)); ?></td>
            </tr>
            <tr>
				<td>
				<?php 
				$Approval = $EachPost->approval;
				if ($Approval == 1) { ?>
					<a class="btn btn-success btn-xs"><i class="fa fa-check"> </i> Approved</a>
				<?php } elseif ($Approval == 2) { ?>
					<a class="btn btn-danger btn-xs"><i class="fa fa-close"> </i> Rejected</a>
				<?php } else{ ?> 
					
					<?php if(check_permission('approve_note')){ ?>
					<a class="btn btn-success btn-xs" id="approve" onclick="ApproveNote(<?php echo $Note;?>)"><i class="fa fa-check"> </i> Approve</a>
					<?php }if(check_permission('disapprove_note')){ ?>
					<a class="btn btn-danger btn-xs" id="disapprove" onclick="DisapproveNote(<?php echo $Note;?>)"><i class="fa fa-close"> </i> Disapprove</a>
					<?php }}?>
				</td>
			</tr>
            <tr>
				<td>
				<?php if(check_permission('print_note')){ ?>
					<button id="print" class="btn btn-info btn-xs"> <i class="fa fa-print"></i> Print</button>
				<?php
				} 
				$Archieve = $EachPost->archieve;
				if ($Archieve == 1) { ?>
					<a class="btn btn-primary btn-xs"><i class="fa fa-dropbox"> </i> Archieved</a>
				<?php }else{ ?>
					<?php if(check_permission('archieve_note')){ ?>
					<a class="btn btn-primary btn-xs" id="AR" onclick="Archieve(<?php echo $Note;?>)"><i class="fa fa-dropbox"> </i> Archieve</a>
				<?php }}?>
					<a class="btn btn-primary btn-xs" style="display:none;" id="Ar"><i class="fa fa-dropbox"> </i> Archieved</a>
				</td>
			</tr>
           
        </table>
    </div>
	<div class="col-md-9" style="min-height:100px;">
		<table class="table table-condensed">
		<?php
if (!empty($Comments)) {
						foreach ($Comments as $EachComment) {
							if (!empty($Staff)) {
								foreach ($Staff as $Each) {
									// staff id
									$Stamp = $Each->id;
									if ($Stamp == $EachComment->staff_id) {
										?>
	        	<tr>
		        	<td>
		        		<?php $Database = $EachComment->time_stamp;?>
		        		<b><?php echo $Each->first_name . ' ' . $Each->last_name; ?></b>
		        		<small><?php echo date("d-M-Y H:i a", strtotime($Database)); ?></small>

					        <p></p>
					        <?php if ($EachComment->signature == '1') {?>
					       	 <span class="pull-right"><input checked type="checkbox" disabled>Signature Included</span>
					        <?php }
										?>
					    <p class="timeline-comment-text"><?php echo $EachComment->text; ?></p>
		        	</td>
			    </tr>
			<?php }}}}}
					?>
			  </table>
	</div>
<?php }}}}}
?>
<div class="col-md-8">
<table class="table">
<tr>
<?php
$ThisUserID = $this->session->userdata('id');
if (!empty($Comments)) {
	foreach ($Comments as $Check) {
		if ($ThisUserID == $Check->staff_id) {
			$Data = true;
		} elseif ($ThisUserID != $Check->staff_id) {
			$Feta = true;
		}
	}
	if (!empty($Data) == true) {
		?>
		<td>
	    	<label>Send To:</label> <br/>
			    <div class="input-group pull-left"><select class="form-control" id="SendTo">
					<?php foreach ($Staff as $EachSendTo) {
			if ($ThisUserID != $EachSendTo->id) {?>
							<option value="<?php echo $EachSendTo->id; ?>"><?php echo $EachSendTo->first_name . ' ' . $EachSendTo->last_name; ?></option>
					<?php }}
		?>
					</select>
				</div>
			<button type="button" onclick="SendTo(<?php echo $ThisUserID . ',' . $Note ?>,document.getElementById('SendTo').value)" class="btn btn-info pull-right">Send to</button>
 	    </td>
	<?php } elseif (!empty($Feta) == true) {?>
	<?php if(check_permission('comment_note')){ ?>
		<td>
			<textarea class="form-control" placeholder="Comments1" id="comment"></textarea>
			<button class="btn-xs btn btn-info pull-right" onclick="Comment(<?php echo $ThisUserID . ',' . $Note; ?>,document.getElementById('comment').value)">Comment</button>
		</td>
	<?php }}} else {?>
	<?php if(check_permission('comment_note')){ ?>
	<td>
		<textarea class="form-control" placeholder="Comments" id="comment"></textarea>
		<button class="btn-xs btn btn-info pull-right" onclick="Comment(<?php echo $ThisUserID . ',' . $Note ?>,document.getElementById('comment').value)">Comment</button>
	</td>
	<?php } ?>
	    </tr>
<?php }
?>
</table>
</div>
</div>
<!-- For Page Print A Clean Page -->
<div class="toprint" style="display:none;">
<img class="logo" src="<?php echo base_url(); ?>assets/VisualData/logo.png" width="50" height="45" alt="">
        <p class="logo-text">Kyber Pakhtunkhwa IT Board</p>
        <div class="clearfix"></div>
        <hr>
<?php
$row = array();
$WhereCondition = array('id' => $id);
$Notes = $this->kpitb_model->SelectOneRowDataDB('intial_note', $WhereCondition);
// Selected the letter
$SelectFields = ['id', 'first_name', 'designation', 'last_name', 'picture'];
$Staff = $this->kpitb_model->SelectRowsDataDB('staff', $SelectFields);
// Also Selecting The Comments on this post
if (!empty($Notes)) {
	foreach ($Notes as $EachPost) {
		$Note = $EachPost->id;
		$Where = array('document_id' => $Note);
		$RequiredFields = ['staff_id', 'text', 'time_stamp', 'document_id', 'signature'];
		$Comments = $this->kpitb_model->SelectCommentsForNote('comment_notes', $RequiredFields, $Where);
		if (!empty($Staff)) {
			foreach ($Staff as $EachPerson) {
				// Extracting the letter id for saving the comments on
				$StaffID = $EachPerson->id;
				// Staff id
				if ($StaffID == $EachPost->staff_id) {
					?>
			<div class="col-md-9">
                    <!-- <b>Send To: </b> --> <?php
if (!empty($Staff)) {
						foreach ($Staff as $EachMember) {
							// if ($EachPost->sendto == $EachMember->id) {
							//echo $EachMember->first_name.' '.$EachMember->last_name;
							// }
						}}
					?>
                    <br>
                    <br>
                    <b>Subject: </b>  <?php echo $EachPost->subject; ?><br>
                    <br>
                    <b>Details:</b><br>
                    <?php echo $EachPost->detail; ?><br>
                    <br>
                    <br>
		    </div>
		<div class="col-md-9" style="min-height:100px; overflow:hidden;">
        	<?php if (!empty($Comments)) {
						foreach ($Comments as $EachComment) {
							if (!empty($Staff)) {
								foreach ($Staff as $Each) {
									$Stamp = $Each->id;
									if ($Stamp == $EachComment->staff_id) {
										if ($Note == $EachComment->document_id) {
											?>
					    <p style="float:left;" class="timeline-comment-text"><?php echo $EachComment->text; ?></p>
				        <?php if (!empty($EachPerson->signature)) {?>
				        <img style="padding-left:1em; float:left;" src="<?php echo base_url(); ?>assets/Attachments/<?php echo $EachPerson->signature; ?>" alt="">
				        <?php }
											?>
				        <div class="clearfix"></div>
			<?php }}}}}}
					?>
		</div>
		<div class="col-md-3" style="color:#ccc;">
	        <b>Note Initiated By:</b>
	        <?php echo $EachPerson->first_name . ' ' . $EachPerson->last_name; ?>
	        &nbsp;&nbsp;&nbsp;(<?php echo $EachPerson->designation ?>)
	        &nbsp;&nbsp;&nbsp;&nbsp;<b>Date:</b>
	         <?php $Databasetime = $EachPost->time_stamp;?>
	    <?php echo date("d-M-Y", strtotime($Databasetime)); ?>
	    </div>
<?php }}}}}
?>
</div>
<script>
	$('#print').click(function(){
		$('.no').hide();
		$('.toprint').show();
		window.print();
	});
</script>
