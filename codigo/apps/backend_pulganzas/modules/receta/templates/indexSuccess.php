<a href="<?php echo url_for('receta/new') ?>"
	class="btn btn-primary btn-nuevo">Nueva receta</a>

<div class="span9">
	<table class="lista table table-hover table-bordered">
		<thead>
			<tr>
				<th>T&iacute;tulo</th>
				<th>Fecha</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($recetas as $receta): ?>

			<tr>
				<td><?php echo $receta->getTitulo() ?></td>
				<td><?php echo $receta->getCreatedAt()?></td>

				<td><a
					href="<?php echo url_for('receta/edit?id='.$receta->getId()) ?>">Editar</a>

					<a
					href="<?php echo url_for('receta/delete?id='.$receta->getId()) ?>">Eliminar</a>
					<a
					href="<?php echo url_for('receta/show?id='.$receta->getId()) ?>">Ver</a>
				</td>
			</tr>
			<?php endforeach; ?>
	
	</table>
</div>

<div style="clear: both;"></div>
