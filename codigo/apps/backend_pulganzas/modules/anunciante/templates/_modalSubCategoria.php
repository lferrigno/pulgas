<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal"
			aria-hidden="true">×</button>
		<h3 id="myModalLabel">Modal header</h3>
	</div>
	<div class="modal-body">
<?php if (isset($categoriaAnuncianteForm) && $categoriaAnuncianteForm):?>
		<form class="form-horizontal"
			action="<?php echo url_for('anunciante/agregarSubCategoria?id='.$form->getObject()->getId() ) ?>"
			method="post"
			<?php $categoriaAnuncianteForm->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
			<?php if (!$categoriaAnuncianteForm->getObject()->isNew()): ?>
			<input type="hidden" name="sf_method" value="put" />
			<?php endif; ?>
						<?php echo $categoriaAnuncianteForm->renderHiddenFields()?>
			
			<?php include_partial("global/simpleFormField",array("form"=>$categoriaAnuncianteForm,"field"=>"categoria"));?>
						<?php include_partial("global/simpleFormField",array("form"=>$categoriaAnuncianteForm,"field"=>"sub_categoria_id"));?>
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
