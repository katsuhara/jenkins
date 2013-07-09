<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="control-group">
			<?php echo Form::label('Subject', 'subject', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('subject', Input::post('subject', isset($information) ? $information->subject : ''), array('class' => 'span4', 'placeholder'=>'Subject')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Detail', 'detail', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('detail', Input::post('detail', isset($information) ? $information->detail : ''), array('class' => 'span4', 'placeholder'=>'Detail')); ?>

			</div>
		</div>
		<div class="control-group">
			<label class='control-label'>&nbsp;</label>
			<div class='controls'>
				<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>			</div>
		</div>
	</fieldset>
<?php echo Form::close(); ?>