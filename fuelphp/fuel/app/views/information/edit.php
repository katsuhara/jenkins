<h2><span class='muted'>お知らせ</span> 編集</h2>
<br>

<?php echo render('information/_form'); ?>
<p>
	<?php echo Html::anchor('information/view/'.$information->id, '閲覧する'); ?> |
	<?php echo Html::anchor('information', '戻る'); ?></p>
