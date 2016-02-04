<div class="mailbox-content">
<table class="table">
    <?php if (!empty($AllLetters)) {
	$i = 1;
	foreach ($AllLetters as $EachLetter) {
        if (!empty($EachLetter)) {
		foreach ($EachLetter as $one) {
			# code...
			?>

    <tr style="border-bottom:1px solid rgba(0,0,0,0.05);">
        <td width="40" class="hidden-xs">
            <i class="fa  icon-state-info"> <?php echo $i; ?></i>
        </td>
        <th  width="200">
           <a class="text-success" href="<?php echo base_url(); ?>kpitb_letters/details/<?php echo $one->id; ?>">
                <?php echo $one->subject; ?>
           </a>
        </th>
        <td width="400">
            <?php echo substr($one->detail, 0, 40) . '.....'; ?>
        </td>
        <td width="">
            <?php echo date("d-M-Y H:i a", strtotime($one->time_stamp)); ?>
        </td>
    </tr>

    <?php }
		$i++;}}} else {?>
        No New Incoming Letters
    <?php }
?>
</div>