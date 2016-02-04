<div class="mailbox-content">
<table class="table">
    <tr>
        <th>#</th>
        <th>Subject</th>
        <th>Detail</th>
        <th>Sendto</th>
        <th>Time Stamp</th>
    </tr>
    <?php if (!empty($AllLetters)) {
	$i = 1;
	foreach ($AllLetters as $Eachnote) {
		foreach ($Eachnote as $Eachmore) {
			?>
    <tr style="border-bottom:1px solid rgba(0,0,0,0.05);">
        <td width="40">
            <i class="fa  icon-state-info"> <?php echo $i; ?></i>
        </td>
        <th  width="200">
           <a class="text-success" href="<?php echo base_url(); ?>kpitb_letters/sent_letterdetails/<?php echo $Eachmore->id; ?>">
                <?php echo $Eachmore->subject; ?>
            </a>
        </th>
        <td width="240">
           <a class="text-success" href="<?php echo base_url(); ?>kpitb_letters/sent_letterdetails/<?php echo $Eachmore->id; ?>">
            <?php echo substr($Eachmore->detail, 0, 40) . '.....'; ?>
           </a>
        </td>
        <td>
            <?php
if (!empty($Employee)) {
				foreach ($Employee as $Name) {
					if ($Eachmore->sendto == $Name->id) {
						echo '<b>' . $Name->first_name . ' ' . $Name->last_name . '</b>';
					}
				}
			}
			?>
        </td>
        <td width="">
            <?php echo date("d-M-Y H:i a", strtotime($Eachmore->time_stamp)); ?>
        </td>
    </tr>
    <?php }
		$i++;}} else {?>
        No New Note sheets
    <?php }
?>
</table>
</div>