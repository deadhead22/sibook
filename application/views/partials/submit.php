<div class="ui container" style='margin-top: 10px;'>
	<?php
	if (isset($submit)) {
		echo form_submit(array(
			'value' => $submit[0], 
			'tabindex' => $submit[1],
			'class' => 'ui fluid blue button'
		));
	}
	if (isset($cancel)) {
		echo anchor($cancel[2], $cancel[0], array(
			'tabindex' => $cancel[1],
			'class' => 'ui fluid red button'
		));
	}
	?>
</div>
