<?php

echo $this->session->flashdata('saved');

$iconbar = iconbar(array(
	array('rooms/add', 'Add Room', 'add.gif'),
	array('rooms/fields', 'Custom Fields', 'room_fields.gif'),
));

echo $iconbar;

$jscript = 'var messages = [];';

?>

<table class='ui celled padded table'>
	<col /><col /><col />
	<thead>
	<tr class="heading">
		<th title="Name">Name</td>
		<th title="Location">Location</td>
		<th title="Teacher">Teacher</td>
		<th title="Photo">Photo</td>
		<th title="X"></td>
	</tr>
	</thead>
	<tbody>
	<?php
	$i=0;
	if( $rooms ){
	foreach( $rooms as $room ){ ?>
	<tr class="tr<?php echo ($i & 1) ?>">
		<td><?php echo html_escape($room->name) ?></td>
		<td><?php echo html_escape($room->location) ?></td>
		<td>
			<?php
			if ($room->displayname == '' ) {
				$room->displayname = $room->username;
			}
			echo html_escape($room->displayname);
			?>
		</td>
		<td width="60" align="center">
			<?php
			if ($room->photo != '' ) {
				$photo_path = "uploads/{$room->photo}";
				$jscript .= "messages[{$room->room_id}] = ['{$photo_path}', '{$room->name}'];\n";
				if (file_exists(FCPATH . $photo_path)) {
					$url = base_url($photo_path);
					echo '<a href="'.$url.'" title="Lihat Foto">';
					echo '<img src="' . base_url('assets/images/ui/picture.gif') . '" width="16" height="16" alt="Lihat Foto" />';
					echo '</a>'."\n";
				}
			}
			?>
		</td>
		<td width="45" class="n"><?php
			$actions['edit'] = 'rooms/edit/'.$room->room_id;
			$actions['delete'] = 'rooms/delete/'.$room->room_id;
			$this->load->view('partials/editdelete', $actions);
			?>
		</td>
	</tr>
	<?php $i++; }
	} else {
		echo '<td>No rooms exist!</td>';
	}
	?>
	</tbody>
</table>

<script type="text/javascript">
<?php echo $jscript ?>
</script>

<?php

echo $iconbar;

$jsst['name'] = 'st1';
$jsst['id'] = 'jsst-rooms';
$jsst['cols'] = array("Name", "Location", "Teacher", "Notes", "Photo", "None");
$this->load->view('partials/js-sorttable', $jsst);
