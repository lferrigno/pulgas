
<!-- Modal -->
<div id="myFotoModal" class="modal hide fade" tabindex="-1"
	role="dialog" aria-labelledby="myFotoModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal"
			aria-hidden="true">×</button>
		<h3 id="myFotoModalLabel">Agregar Foto</h3>
	</div>
	<div class="modal-body">
		<?php if (isset($fotoForm) && $fotoForm):?>
		<form class="form-horizontal"
			action="<?php echo url_for('anunciante/guardarNuevaFoto?id='.$form->getObject()->getId() ) ?>"
			method="post"
			<?php $fotoForm->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
			<?php if (!$fotoForm->getObject()->isNew()): ?>
			<input type="hidden" name="sf_method" value="put" />
			<?php endif; ?>
			<?php echo $fotoForm->renderHiddenFields()?>

			<div
				class="<?php if ($fotoForm["anunciantesFotos"][0]["filename"]->hasError()){echo "error";};?>">
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
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	</div>
</div>