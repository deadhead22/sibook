<?php

echo $this->session->flashdata('saved');

$iconbar = iconbar(array(
	array('departments/add', 'Tambah Instansi', 'add.gif'),
));

echo $iconbar;

?>

<table class='ui celled padded table'>
	<col /><col /><col />
	<thead>
	<tr class="heading">
		<th title="Name">Name</th>
		<th title="Description">Description</th>
		<th title="X"></th>
	</tr>
	</thead>
	<tbody>
	<?php
	$i=0;
	if ($departments) {
	foreach ($departments as $department) {
	?>
	<tr class="tr<?php echo ($i & 1) ?>">
		<td><?php echo html_escape($department->name) ?></td>
		<td><?php echo html_escape($department->description) ?></td>
		<td width="45" class="n"><?php
			$actions['edit'] = 'departments/edit/'.$department->department_id;
			$actions['delete'] = 'departments/delete/'.$department->department_id;
			$this->load->view('partials/editdelete', $actions);
			?>
		</td>
	</tr>
	<?php $i++; }
	} else {
		echo '<td>No departments exist!</td>';
	}
	?>
	</tbody>
</table>

<?php echo $pagelinks ?>

<?php
$jsst['name'] = 'st1';
$jsst['id'] = 'jsst-departments';
$jsst['cols'] = array("Name", "Description", "None");
$this->load->view('partials/js-sorttable', $jsst);
