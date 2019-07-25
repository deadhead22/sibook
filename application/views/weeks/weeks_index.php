<?php

echo $this->session->flashdata('saved');

$iconbar = iconbar(array(
	array('weeks/add', 'Add Week', 'add.gif'),
	array('weeks/academicyear', 'Academic Year', 'school_manage_weeks_academicyear.gif'),
));

echo $iconbar;

?>

<table class='ui celled padded table'>
	<col /><col /><col />
	<thead>
		<tr class="heading">
			<th title="Name">Name</td>
			<th title="Colour">Colour</td>
			<th title="X">&nbsp;</td>
		</tr>
	</thead>
	<tbody>
		<?php
		$i=0;
		if ($weeks) {
		foreach ($weeks as $week) {
		?>
		<tr class="tr<?php echo ($i & 1) ?>">
			<td><?php echo html_escape($week->name) ?></td>
			<td>
			<?php echo sprintf('<span style="padding:2px;background:#%s;color:#%s">%s</span>', $week->bgcol, $week->fgcol, html_escape($week->name)); ?></td>
			<td width="45" class="n"><?php
				$actions['edit'] = 'weeks/edit/'.$week->week_id;
				$actions['delete'] = 'weeks/delete/'.$week->week_id;
				$this->load->view('partials/editdelete', $actions);
				?>
			</td>
		</tr>
		<?php $i++; }
		} else {
			echo '<td>No weeks defined!</td>';
		}
		?>
	</tbody>
</table>

<?php
echo $iconbar;

$jsst['name'] = 'st1';
$jsst['id'] = 'jsst-weeks';
$jsst['cols'] = array("Name", "Colour", "None");
$this->load->view('partials/js-sorttable', $jsst);
