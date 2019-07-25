<?php

echo $this->session->flashdata('saved');

$iconbar = iconbar(array(
	array('holidays/add', 'Add Holiday', 'add.gif'),
));

echo $iconbar;

?>

<table class='ui celled padded table'>
	<col /><col /><col /><col />
	<thead>
	<tr class="heading">
		<th title="Name">Name</td>
		<th title="StartDate">Start Date</td>
		<th title="EndDate">End Date</td>
		<th title="Duration">Duration</td>
		<th title="X"></td>
	</tr>
	</thead>
	<tbody>
	<?php
	$i=0;
	if($holidays){
	foreach( $holidays as $holiday ){
	?>
	<tr class="tr<?php echo ($i & 1) ?>">
		<td><?php echo html_escape($holiday->name) ?></td>
		<td><?php echo date("d/m/Y", strtotime($holiday->date_start)); ?></td>
		<td><?php echo date("d/m/Y", strtotime($holiday->date_end)) ?></td>
		<td><?php
		if(strtotime($holiday->date_start) != strtotime($holiday->date_end)){
			echo timespan(strtotime($holiday->date_start), strtotime($holiday->date_end) + (3600*24));
		} else {
			echo "1 Day";
		}
		?></td>
		<td width="45" class="n"><?php
			$actions['edit'] = 'holidays/edit/'.$holiday->holiday_id;
			$actions['delete'] = 'holidays/delete/'.$holiday->holiday_id;
			$this->load->view('partials/editdelete', $actions);
			?>
		</td>
	</tr>
	<?php $i++; }
	} else {
		echo '<td colspan="4" align="center">No holidays defined!</td>';
	}
	?>
	</tbody>
</table>

<?php

echo $iconbar;

$jsst['name'] = 'st1';
$jsst['id'] = 'jsst-holidays';
$jsst['cols'] = array("Name", "StartDate", "EndDate", "None");
$this->load->view('partials/js-sorttable', $jsst);
