<?php
echo $this->session->flashdata('saved');
echo isset($notice) ? $notice : '';
echo form_open_multipart(current_url(), array('class' => 'cssform', 'id' => 'user_import'));
echo form_hidden('action', 'import');
?>

<fieldset class="cssform-stacked">

	<legend accesskey="I" tabindex="<?= tab_index() ?>">Sumber Import</legend>

	<p>
		<label for="userfile" class="required">File CSV</label>
		<?php
		echo form_upload(array(
			'name' => 'userfile',
			'id' => 'userfile',
			'size' => '40',
			'maxlength' => '255',
			'tabindex' => tab_index(),
			'value' => '',
		));
		?>
		<p class="hint">Ukuran file maksimum <span><?php echo $max_size_human ?></span>.</p>
	</p>


</fieldset>



<fieldset>

	<legend accesskey="F">Nilai Default</legend>

	<div>Masukkan nilai default yang akan di aplikasikan ke semua pengguna apabila tidak disebutkan dalam file import.</div>

	<p>
		<label for="password">Password</label>
		<?php
		echo form_password(array(
			'name' => 'password',
			'id' => 'password',
			'size' => '20',
			'maxlength' => '40',
			'tabindex' => tab_index(),
			'value' => '',
		));
		?>
	</p>

	<p>
		<label for="authlevel" class="required">Tingkat</label>
		<?php
		$data = array('1' => 'Administrator', '2' => 'Teacher');
		echo form_dropdown(
			'authlevel',
			$data,
			'2',
			' id="authlevel" tabindex="'.tab_index().'"'
		);
		?>
	</p>


	<p>
		<label for="enabled">Aktif</label>
		<?php
		echo form_hidden('enabled', '0');
		echo form_checkbox(array(
			'name' => 'enabled',
			'id' => 'enabled',
			'value' => '1',
			'tabindex' => tab_index(),
			'checked' => true,
		));
		?>
	</p>


</fieldset>

<?php

$this->load->view('partials/submit', array(
	'submit' => array('Create Accounts', tab_index()),
	'cancel' => array('Cancel', tab_index(), 'users'),
));

echo form_close();
