<?php
$c1 = (isset($c1) ? $c1 : array());
$c2 = (isset($c2) ? $c2 : array());
?>

<div class='ui container'>
	<?php if ($c1): ?>
	<div class="ten wide column">
		<div class="c" id="c1"><?php echo $c1['content'] ?></div>
	</div>
	<?php endif; ?>

	<?php if ($c2): ?>
	<div class="six wide column">
		<div class="c" id="c2"><?php echo $c2['content'] ?></div>
	</div>
	<?php endif; ?>
</div>