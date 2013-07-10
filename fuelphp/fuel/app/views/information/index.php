<h2>Listing <span class='muted'>Information</span></h2>
<br>
<?php if ($information): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Subject</th>
			<th>Detail</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($information as $information): ?>		<tr>

			<td><?php echo $information->subject; ?></td>
			<td><?php echo $information->detail; ?></td>
			<td>
				<?php echo Html::anchor('information/view/'.$information->id, '<i class="icon-eye-open" title="View"></i>'); ?> |
				<?php echo Html::anchor('information/edit/'.$information->id, '<i class="icon-wrench" title="Edit"></i>'); ?> |
				<?php echo Html::anchor('information/delete/'.$information->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Information.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('information/create', 'Add new Information', array('class' => 'btn btn-success')); ?>

</p>
