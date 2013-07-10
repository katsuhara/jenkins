<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="control-group">
			<?php echo Form::label('お知らせ件名', 'subject', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::textarea('subject', Input::post('subject', isset($information) ? $information->subject : ''), array('class' => 'span9', 'placeholder'=>'お知らせ件名')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('お知らせ詳細', 'detail', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::textarea('detail', Input::post('detail', isset($information) ? $information->detail : ''), array('class' => 'span9', 'placeholder'=>'お知らせ詳細')); ?>

			</div>
		</div>
		<div class="control-group">
			<label class='control-label'>&nbsp;</label>
			<div class='controls'>
				<?php echo Form::submit('submit', '投稿', array('class' => 'btn btn-primary')); ?>			</div>
		</div>
	</fieldset>
<?php echo Form::close(); ?>