<?php
echo $this->session->flashdata('saved');
echo form_open_multipart('school/details_submit', array('id'=>'schooldetails', 'class'=>'cssform'));
?>


<fieldset>

	<legend accesskey="I" tabindex="<?php echo tab_index(); ?>">Informasi Instansi</legend>

	<p>
		<label for="schoolname" class="required">Nama Instansi</label>
		<?php
		$value = set_value('schoolname', element('name', $settings), FALSE);
		echo form_input(array(
			'name' => 'schoolname',
			'id' => 'schoolname',
			'size' => '30',
			'maxlength' => '255',
			'tabindex' => tab_index(),
			'value' => $value,
		));
		?>
	</p>
	<?php echo form_error('schoolname'); ?>

	<p>
		<label for="website">Alamat Website</label>
		<?php
		$value = set_value('website', element('website', $settings), FALSE);
		echo form_input(array(
			'name' => 'website',
			'id' => 'website',
			'size' => '40',
			'maxlength' => '255',
			'tabindex' => tab_index(),
			'value' => $value,
		));
		?>
	</p>
	<?php echo form_error('website'); ?>

</fieldset>



<fieldset>

	<legend accesskey="L" tabindex="<?php echo tab_index() ?>">Logo Instansi</legend>

	<div>Gunakan bagian ini untuk mengunggah logo instansi.</div>

	<p>
		<label>Logo saat ini</label>
		<?php
		$logo = element('logo', $settings);
		if ( ! empty($logo) && is_file(FCPATH . 'uploads/' . $logo)) {
			echo img('uploads/' . $logo, FALSE, "style='padding:1px; border:1px solid #ccc; max-width: 300px; width: auto; height: auto'");
		} else {
			echo "<span><em>Tidak ditemukan</em></span>";
		}
		?>
	</p>

	<p>
		<label for="userfile">Unggah file</label>
		<?php
		echo form_upload(array(
			'name' => 'userfile',
			'id' => 'userfile',
			'size' => '25',
			'maxlength' => '255',
			'tabindex' => tab_index(),
			'value' => '',
		));
		?>
		<p class="hint">Mengunggah logo baru akan <span>memperbaharui</span> yang lama.</p>
	</p>

	<?php
	if ($this->session->flashdata('image_error') != '' ) {
		echo "<p class='hint error'><span>" . $this->session->flashdata('image_error') . "</span></p>";
	}
	?>

	<p>
		<label for="logo_delete">Hapus logo?</label>
		<?php
		echo form_checkbox(array(
			'name' => 'logo_delete',
			'id' => 'logo_delete',
			'value' => '1',
			'tabindex' => tab_index(),
			'checked' => FALSE,
		));
		?>
		<p class="hint">Check box ini untuk <span>menghapus logo saat ini</span>. Apabila anda mengunggah logo baru, hal ini akan otomatis terjadi.</p>
	</p>

</fieldset>


<fieldset>

	<legend accesskey="S" tabindex="<?php echo tab_index() ?>">Pengaturan</legend>

	<?php
	/*
	<p>
		<label for="colour">Header colour</label>
		<?php
		$value = set_value('colour', element('colour', $settings, '468ED8'), FALSE);
		echo colour_widget(array(
			'name' => 'colour',
			'tabindex' => tab_index(),
			'value' => $value,
		));
		?>
		<p class="hint">In hexadecimal format. Leave blank to use default blue.</p>
	</p>
	<?php echo form_error('colour'); ?>
	*/
	?>

	<p>
		<label for="bia">Pemesanan lebih awal</label>
		<?php
		$value = (int) set_value('bia', element('bia', $settings), FALSE);
		echo form_input(array(
			'name' => 'bia',
			'id' => 'bia',
			'size' => '5',
			'maxlength' => '3',
			'tabindex' => tab_index(),
			'value' => $value,
		));
		?>
		<p class="hint">Berapa hari kedepan para pengguna bisa melakukan pemesanan ruangan. Masukkan 0 untuk tanpa batas.</p>
	</p>
	<?php echo form_error('bia') ?>

	<hr size="1" />

	<p>
		<label for="displaytype">Tampilan Tipe Pemesanan</label>
		<?php
		$displaytype = set_value('displaytype', element('displaytype', $settings), FALSE);
		$options = array(
			'day' => 'One day at a time',
			'room' => 'One room at a time',
		);
		echo form_dropdown(
			'displaytype',
			$options,
			$displaytype,
			' id="displaytype" tabindex="' . tab_index() . '"'
		);
		?>
		<p class="hint">Fokusan halaman pemesanan.<br />
			<strong><span>Satu hari</span></strong> - seluruh periode dan ruangan akan ditampilkan untuk tanggal terpilih.<br />
			<strong><span>Satu ruangan</span></strong> - seluruh periode dan hari dari pekan akan terlihat untuk ruangan terpilih.
		</p>
	</p>
	<?php echo form_error('displaytype'); ?>

	<p>
		<label for="columns">Kolom pemesanan</label>
		<?php
		$columns = set_value('d_columns', element('d_columns', $settings), FALSE);
		?>
		<select name="d_columns" id="d_columns" tabindex="<?php echo tab_index() ?>">
			<option value="periods" class="day room" <?= $columns == 'periods' ? 'selected="selected"' : '' ?>>Periode</option>
			<option value="rooms" class="day" <?= $columns == 'rooms' ? 'selected="selected"' : '' ?>>Ruang</option>
			<option value="days" class="room" <?= $columns == 'days' ? 'selected="selected"' : '' ?>>Hari</option>
		</select>
		<p class="hint">Tentukan detail mana yang ditampilkan bersamaan dengan halaman pemesanan.</p>
	</p>
	<?php echo form_error('d_columns') ?>

</fieldset>

<script type="text/javascript">
Q.push(function() {
	dynamicSelect('displaytype', 'd_columns');
});
</script>

<?php

$this->load->view('partials/submit', array(
	'submit' => array('Save', tab_index()),
	'cancel' => array('Cancel', tab_index(), 'controlpanel'),
));

echo form_close();
