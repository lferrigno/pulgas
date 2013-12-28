
<div class="row-fluid innerContent">
	<form class="form-horizontal formBusqueda" id="form_filter"
		action="<?php echo url_for('anunciante/index'); ?>" method="post">
		<input type="hidden" id="page" value="0" name="page" />
		<?php echo $filtro->renderHiddenFields()?>
		<div class="row-fluid">
			<div class="span5">
				<?php echo $filtro['nombre']->renderLabel()?>
				<?php echo $filtro['nombre']->render(array("class"=>"span12"))?>
			</div>
			<!--/span-->
			<div class="span5">
				<?php echo $filtro['rubro']->renderLabel()?>
				<?php echo $filtro['rubro']->render(array("class"=>"span12"))?>
			</div>
			<!--/span-->
		</div>
		<!--/row-->
		<div class="row-fluid">
			<div class="span5">
				<?php echo $filtro['categoria']->renderLabel()?>
				<?php echo $filtro['categoria']->render(array("class"=>"span12"))?>
			</div>
			<!--/span-->
			<div class="span5">
				<button type="submit" class="btn btn-success btnFiltro">Buscar</button>
			</div>
			<!--/span-->
		</div>
		<!--/row-->

	</form>
</div>

<a href="<?php echo url_for('anunciante/new') ?>"
	class="btn btn-primary btn-nuevo">Nuevo Anunciante</a>

<div class="span9">
	<table class="lista table table-hover table-bordered">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Sub Categor&iacute;a</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($anunciantes as $anunciante): ?>

			<tr>
				<td><?php echo $anunciante->getNombre() ?></td>
				<td>
				<?php foreach ($anunciante->getSubCategorias() as $sub):?>
				<?php echo $sub." (".$sub->getCategoria().")"?>
				<?php endforeach;?>
				</td>
				
				<td><a
					href="<?php echo url_for('anunciante/edit?id='.$anunciante->getId()) ?>">Editar</a>

					<a
					href="<?php echo url_for('anunciante/delete?id='.$anunciante->getId()) ?>">Eliminar</a>
				</td>
			</tr>
			<?php endforeach; ?>
	
	</table>
</div>

<div style="clear: both;"></div>
