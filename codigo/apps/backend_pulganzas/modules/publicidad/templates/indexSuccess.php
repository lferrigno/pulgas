<a href="<?php echo url_for('publicidad/new') ?>"
	class="btn btn-primary btn-nuevo">Nueva Publicidad</a>

<div class="span9">
	<table class="lista table table-hover table-bordered">
		<thead>
			<tr>
				<th>Titulo</th>
				<th>Cantidad Imagenes</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($publicidades as $publicidad): ?>

			<tr>
				<td><?php echo $publicidad->getTitulo() ?></td>
				<td><?php echo $publicidad->getFotos()->count() ?></td>
				<td><a
					href="<?php echo url_for('publicidad/edit?id='.$publicidad->getId()) ?>">Editar</a>

					<a
					href="<?php echo url_for('publicidad/delete?id='.$publicidad->getId()) ?>">Eliminar</a>
				</td>
			</tr>
			<?php endforeach; ?>
	
	</table>
</div>

<div style="clear: both;"></div>
