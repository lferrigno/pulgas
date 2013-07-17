<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="row">
	<div class="span5">
		<form class="form-horizontal"
			action="<?php echo url_for('anunciante/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>"
			method="post"
			<?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
			<?php if (!$form->getObject()->isNew()): ?>
			<input type="hidden" name="sf_method" value="put" />
			<?php endif; ?>
			<?php echo $form->renderHiddenFields()?>


			<?php include_partial("global/simpleFormField",array("form"=>$form,"field"=>"nombre"));?>
			<?php include_partial("global/simpleFormField",array("form"=>$form,"field"=>"sub_categorias_list"));?>
			<?php include_partial("global/simpleFormField",array("form"=>$form,"field"=>"direccion"));?>
			<?php include_partial("global/simpleFormField",array("form"=>$form,"field"=>"localidad"));?>
			<?php include_partial("global/simpleFormField",array("form"=>$form,"field"=>"telefono"));?>
			<?php include_partial("global/simpleFormField",array("form"=>$form,"field"=>"email"));?>
			<?php include_partial("global/simpleFormField",array("form"=>$form,"field"=>"web"));?>
			<?php include_partial("global/simpleFormField",array("form"=>$form,"field"=>"anuncio"));?>

			<div class="control-group">
				<div class="controls">
					<button type="submit" class="btn">Guardar</button>
									
									
												<?php if (!$form->getObject()->isNew()): ?>
			<a	class="btn" href="<?php echo url_for('anunciante/agregarFoto?id='.$form->getObject()->getId()) ?>">Agregar Foto</a>
			<?php endif; ?>
			
					<a href="<?php echo url_for('anunciante/index') ?>" class="btn">Volver</a>
					
				</div>
			</div>
		</form>
	</div>
	<div class="span3 offset1">
		<?php if(!$form->getObject()->isNew()):?>
		Listado de imagenes ya cargadas
		<?php foreach ($form->getObject()->getFotos() as $foto):?>
		<?php echo image_tag("../uploads/anunciantes/".$foto->getFilename(),array()) ?>
		<?php endforeach;?>
		<?php endif;?>
		<?php if ($fotoForm):?>
		<form class="form-horizontal"
			action="<?php echo url_for('anunciante/guardarNuevaFoto?id='.$form->getObject()->getId() ) ?>"
			method="post"
			<?php $fotoForm->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
			<?php if (!$fotoForm->getObject()->isNew()): ?>
			<input type="hidden" name="sf_method" value="put" />
			<?php endif; ?>
			<?php echo $fotoForm->renderHiddenFields()?>

<div class="<?php if ($fotoForm["anunciantesFotos"][0]["filename"]->hasError()){echo "error";};?>">
		<div class="">
			<?php echo $fotoForm["anunciantesFotos"][0]["filename"]->render()?>
						<span class="help-inline"> <?php echo $fotoForm["anunciantesFotos"][0]["filename"]->renderError()?>
			</span>
		</div>
	</div>
	
			<div class="">
				<div class="">
					<button type="submit" class="btn">Agregar</button>
				</div>
			</div>
		</form>
		<?php endif;?>
	</div>
</div>
<div style="clear: both;"></div>
