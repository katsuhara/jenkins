<h2><span class='muted'>お知らせ</span> 一覧</h2>
<br>
<?php if ($information): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>お知らせ件名</th>
			<th>お知らせ詳細</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($information as $val): ?>		<tr>

			<td><?php echo $val->subject; ?></td>
			<td><?php echo $val->detail; ?></td>
			<td>
				<?php echo Html::anchor('information/view/'.$val->id, '<i class="icon-eye-open" title="閲覧する"></i>'); ?> |
				<?php echo Html::anchor('information/edit/'.$val->id, '<i class="icon-wrench" title="編集する"></i>'); ?> |
				<?php echo Html::anchor('information/delete/'.$val->id, '<i class="icon-trash" title="削除する"></i>', array('onclick' => "return confirm('削除してよろしいですか?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Information.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('information/create', '新しいお知らせを投稿する', array('class' => 'btn btn-success')); ?>

</p>
