<div class="control-group <?php if ($form[$field]->hasError()){echo "error";};?>">
		<label class="control-label" for="<?php echo $field?>"> <?php echo $form[$field]->renderLabel()?>
		</label>
		<div class="controls">
			<?php echo $form[$field]->render()?>
						<span class="help-inline"> <?php echo $form[$field]->renderError()?>
			</span>
		</div>
	</div>