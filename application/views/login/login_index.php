<?php echo $this->session->flashdata('auth') ?>

<?= validation_errors() ?>

<?php
echo form_open('login/submit', array('id'=>'login','class'=>'cssform'), array('page' => $this->uri->uri_string()) );
?>


<div class="ui container">
    <form class="ui large form">
		<div class="ui stacked segment">
			<div class="field">
				<span>Username</span>
				<div class="ui input" style='width: 100%; margin-top: 10px; margin-bottom: 10px'>
					<input type="text" name="username" placeholder="Username">
				</div>
			</div>
			<div class="field">
				<span>Password</span>
				<div class="ui input" style='width: 100%; margin-top: 10px; margin-bottom: 10px'>
					<input type="password" name="password" placeholder="Password">
				</div>
			</div>
			<?php

				$this->load->view('partials/submit', array(
					'submit' => array('Login', tab_index()),
				));

				echo form_close();
			?>
		</div>
    </form>
</div>
