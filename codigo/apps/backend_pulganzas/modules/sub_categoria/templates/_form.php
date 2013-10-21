<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>


<form class="form-horizontal"
	action="<?php echo url_for('sub_categoria/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>"
	method="post"
	<?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
	<?php if (!$form->getObject()->isNew()): ?>
	<input type="hidden" name="sf_method" value="put" />
	<?php endif; ?>
	<?php echo $form->renderHiddenFields()?>
	<div class="control-group <?php if ($form['nombre']->hasError()){echo "error";};?>">
		<label class="control-label" for="nombre"> <?php echo $form['nombre']->renderLabel()?>
		</label>
		<div class="controls">
			<?php echo $form['nombre']->render()?>
						<span class="help-inline"> <?php echo $form['nombre']->renderError()?>
			</span>
		</div>
	</div>
	<div class="control-group <?php if ($form['categoria_id']->hasError()){echo "error";};?>">

		<label class="control-label" for="categoria"> <?php echo $form['categoria_id']->renderLabel()?>
		</label>
		<div class="controls">
			<?php echo $form['categoria_id']->render()?>
						<span class="help-inline"> <?php echo $form['categoria_id']->renderError()?>
			</span>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn">Guardar</button>
			<a href="<?php echo url_for('sub_categoria/index') ?>" class="btn">Volver</a>
		</div>
	</div>
</form>
<div style="clear: both;"></div>

