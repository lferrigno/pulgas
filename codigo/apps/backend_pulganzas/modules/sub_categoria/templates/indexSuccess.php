
<div class="row-fluid innerContent">
	<form class="form-horizontal formBusqueda" id="form_filter"
		action="<?php echo url_for('sub_categoria/index'); ?>" method="post">
		<input type="hidden" id="page" value="0" name="page" />
		<?php echo $filtro->renderHiddenFields()?>
		<div class="row-fluid">
			<div class="span5">
				<?php echo $filtro['nombre']->renderLabel()?>
				<?php echo $filtro['nombre']->render(array("class"=>"span12"))?>
			</div>
						<div class="span5">
				<?php echo $filtro['categoria']->renderLabel()?>
				<?php echo $filtro['categoria']->render(array("class"=>"span12"))?>
			</div>
		</div>
		<!--/row-->
		<div class="row-fluid">

			<!--/span-->
			<div class="span5">
				<button type="submit" class="btn btn-success btnFiltro">Buscar</button>
			</div>
			<!--/span-->
		</div>
		<!--/row-->

	</form>
</div>


<a href="<?php echo url_for('sub_categoria/new') ?>"
	class="btn btn-primary btn-nuevo">Nueva Sub Categoria</a>

<div class="span9">
	<table class="lista table table-hover table-bordered">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Categor&iacute;a</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($sub_categorias as $sub_categoria): ?>

			<tr>
				<td><?php echo $sub_categoria->getNombre() ?></td>
				<td><?php echo $sub_categoria->getCategoria() ?></td>

				<td><a
					href="<?php echo url_for('sub_categoria/edit?id='.$sub_categoria->getId()) ?>">Editar</a>

					<a
					href="<?php echo url_for('sub_categoria/delete?id='.$sub_categoria->getId()) ?>">Eliminar</a>
				</td>
			</tr>
			<?php endforeach; ?>
	
	</table>
</div>

<div style="clear: both;"></div>
