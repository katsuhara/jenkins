<h2>閲覧 <span class='muted'>#<?php echo $information->id; ?></span></h2>

<p>
	<strong>お知らせ件名:</strong>
	<?php echo $information->subject; ?></p>
<p>
	<strong>お知らせ詳細:</strong>
	<?php echo $information->detail; ?></p>

<?php echo Html::anchor('information/edit/'.$information->id, '編集する'); ?> |
<?php echo Html::anchor('information', '戻る'); ?>