<h1>Sub Categorias</h1>
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
