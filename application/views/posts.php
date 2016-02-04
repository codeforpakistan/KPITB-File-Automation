<?php 
$WhereCondition = array('staff_id'=> $this->session->userdata('id'));
$Letters = $this->kpitb_model->SelectOneRowDataDB('letter',$WhereCondition);
$SelectFields = ['id','first_name','last_name','picture'];
$Staff = $this->kpitb_model->SelectRowsDataDB('staff',$SelectFields);
$RequiredFields = ['staff_id','text','time_stamp'];
$Comments = $this->kpitb_model->SelectRowsDataDB('comment',$RequiredFields);
 if (!empty($Letters)) {
     foreach ($Letters as $EachPost) {
    if (!empty($Staff)) {
        foreach ($Staff as $EachPerson) {
            $StaffID = $EachPerson->id;
            if ($StaffID == $EachPost->staff_id) {
?>

<div class="col-md-6">
<div class="panel panel-white">
<div class="panel-body">
<div class="timeline-item-header">
<img src="<?php echo base_url();?>assets/VisualData/<?php echo $EachPerson->picture?>" alt="">
<p><?php echo $EachPerson->first_name.' '.$EachPerson->last_name;?> <span> Posted a Letter</span></p>
<small>
<?php 
    $Databasetime = $EachPost->time_stamp;
    echo $newDate = date("d-m-Y H:i", strtotime($Databasetime));
?> hours ago</small>
</div>
<div class="timeline-item-post">
<img src="<?php echo base_url()?>assets/Attachments/<?php echo $EachPost->attachment;?>" alt="">
<p class="text-post"><?php echo $EachPost->detail;?></p>
<div class="timeline-options">
    <a href="#"><i class="icon-bubble"></i> Comment (2)</a>
</div>
<?php
    if (!empty($Comments)) {
        foreach ($Comments as $EachComment) {
            if ($StaffID == $EachComment->staff_id) {
?>
<div class="timeline-comment">
    <div class="timeline-comment-header">
        <img src="<?php echo base_url();?>assets/VisualData/<?php echo $EachPerson->picture;?>" alt="">
        <p><?php echo $EachPerson->first_name.' '.$EachPerson->last_name;?><small>1 hour ago</small></p>
        <span class="pull-right"><input checked type="checkbox" disabled></span>
    </div>
    <p class="timeline-comment-text"><?php echo $EachComment->text;?></p>
</div>
<?php  }}}?>
<textarea class="form-control" placeholder="Comments" id="comment"></textarea>
<input type="hidden" id="Doc_ID" value="<?php echo $EachPost->id;?>">
<button class="btn-xs btn btn-info pull-right" onclick="Comment('<?php echo $this->session->userdata('id');?>')">Comment</button>
</div>
</div>  
</div>
</div>
<?php
}}}}}
?>