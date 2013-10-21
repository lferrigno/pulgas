<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>


<form class="form-horizontal"
	action="<?php echo url_for('galeria/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>"
	method="post"
	<?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
	<?php if (!$form->getObject()->isNew()): ?>
	<input type="hidden" name="sf_method" value="put" />
	<?php endif; ?>
	<?php echo $form->renderHiddenFields()?>

	<div
		class="control-group <?php if ($form['titulo']->hasError()){echo "error";};?>">
		<label class="control-label" for="titulo"> <?php echo $form['titulo']->renderLabel()?>
		</label>
		<div class="controls">
			<?php echo $form['titulo']->render()?>
			<span class="help-inline"> <?php echo $form['titulo']->renderError()?>
			</span>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn">Guardar</button>
			<a href="<?php echo url_for('galeria/index') ?>" class="btn">Volver</a>
			<?php if (!$form->getObject()->isNew()): ?>
<a href="<?php echo url_for('galeria/agregarImagen?galeriaId='.$form->getObject()->getId()) ?>" class="btn">Agregar Foto</a>
<?php endif;?>
		</div>
	</div>
</form>
	<div class="span3 offset1">
		<?php if(!$form->getObject()->isNew()):?>
		<?php if ($form->getObject()->getFotos()->count() >0):?>
		Listado de imagenes ya cargadas
		<?php foreach ($form->getObject()->getFotos() as $foto):?>
		<?php echo image_tag("../uploads/galeria/".$foto->getFilename(),array()) ?>
		<?php endforeach;?>
		<?php else :?>
		Todav&iacute;a no se han cargado im&aacute;genes
		<?php endif;?>
		<?php endif;?>
	</div>
<div style="clear: both;"></div>
	