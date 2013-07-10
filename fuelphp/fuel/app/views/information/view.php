<h2>Viewing <span class='muted'>#<?php echo $information->id; ?></span></h2>

<p>
	<strong>Subject:</strong>
	<?php echo $information->subject; ?></p>
<p>
	<strong>Detail:</strong>
	<?php echo $information->detail; ?></p>

<?php echo Html::anchor('information/edit/'.$information->id, 'Edit'); ?> |
<?php echo Html::anchor('information', 'Back'); ?>