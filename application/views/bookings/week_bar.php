<div class="bookings_week" style="<?php echo $style ?>">
	<table class='ui celled padded table'>
		<tr>

			<td width="20%" align="left">
				<a href="<?php echo site_url($back_link) ?>"><< Back</a>
			</td>

			<td align="center"><?php echo $longdate . ' - ' . html_escape($week_name) ?></td>

			<td width="20%" align="right">
				<a href="<?php echo site_url($next_link) ?>">Next >></a>
			</td>
		</tr>
	</table>
</div>

<br />
