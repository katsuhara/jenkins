<h2>Editing <span class='muted'>Information</span></h2>
<br>

<?php echo render('information/_form'); ?>
<p>
	<?php echo Html::anchor('information/view/'.$information->id, 'View'); ?> |
	<?php echo Html::anchor('information', 'Back'); ?></p>
