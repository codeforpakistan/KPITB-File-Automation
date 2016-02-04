<div class="mailbox-content">
<table class="table">
    <?php if (!empty($AllNotes)) {
	$i = 1;
	foreach ($AllNotes as $Eachnote) {
        if (!empty($Eachnote)) {
		foreach ($Eachnote as $NewNote) {
			?>

    <tr style="border-bottom:1px solid rgba(0,0,0,0.05);">
        <td width="40" class="hidden-xs">
            <i class="fa  icon-state-info"> <?php echo $i; ?></i>
        </td>
        <th  width="200">
           <a class="text-success" href="<?php echo base_url(); ?>kpitb_notes/details/<?php echo $NewNote->id; ?>">
                <?php echo $NewNote->subject; ?>
           </a>
        </th>
        <td width="400">
            <?php echo substr($NewNote->detail, 0, 40) . '.....'; ?>

        </td>
        <td width="">
            <?php echo date("d-M-Y H:i a", strtotime($NewNote->time_stamp)); ?>
        </td>
    </tr>
            
    <?php }
		$i++;}}} else {?>
        No New Note sheets
    <?php }
?>
</table>
</div>