<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<script>

$(function() {
	$('#publicidad_foto_filename').change(function() {
		
		$('#publicidad_foto_nombre_original').val($(this).val());
	});
});

</script>

<form class="form-horizontal"
	action="<?php echo url_for('publicidad/guardarImagen') ?>"
	method="post"
	<?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
	<?php if (!$form->getObject()->isNew()): ?>
	<input type="hidden" name="sf_method" value="put" />
	<?php endif; ?>
	<?php echo $form->renderHiddenFields()?>

	<div
		class="control-group <?php if ($form['filename']->hasError()){echo "error";};?>">
		<label class="control-label" for="filename"> <?php echo $form['filename']->renderLabel()?>
		</label>
		<div class="controls">
			<?php echo $form['filename']->render()?>
			<span class="help-inline"> <?php echo $form['filename']->renderError()?>
			</span>
		</div>
</div>
		<div
		class="control-group <?php if ($form['nombre_original']->hasError()){echo "error";};?>">
	
				<label class="control-label" for="nombre_original"> <?php echo $form['nombre_original']->renderLabel()?>
		</label>
		<div class="controls">
			<?php echo $form['nombre_original']->render()?>
			<span class="help-inline"> <?php echo $form['nombre_original']->renderError()?>
			</span>
		</div>
		</div>
	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn">Guardar</button>
			<a href="<?php echo url_for('publicidad/index') ?>" class="btn">Volver</a>
		</div>
	</div>
</form>
<div style="clear: both;"></div>
	