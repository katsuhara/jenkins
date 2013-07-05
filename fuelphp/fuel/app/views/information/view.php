<h2>Viewing <span class='muted'>#<?php echo $information->id; ?></span></h2>

<p>
	<strong>Subject:</strong>
	<?php echo $information->subject; ?></p>
<p>
	<strong>Content:</strong>
	<?php echo $information->content; ?></p>

<?php echo Html::anchor('information/edit/'.$information->id, 'Edit'); ?> |
<?php echo Html::anchor('information', 'Back'); ?>