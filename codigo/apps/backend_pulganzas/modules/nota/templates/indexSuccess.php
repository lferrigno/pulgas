<a href="<?php echo url_for('nota/new') ?>"
	class="btn btn-primary btn-nuevo">Nueva nota</a>

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
			<?php foreach ($notas as $nota): ?>

			<tr>
				<td><?php echo $nota->getTitulo() ?></td>
				<td><?php echo $nota->getCreatedAt()?></td>

				<td><a
					href="<?php echo url_for('nota/edit?id='.$nota->getId()) ?>">Editar</a>

					<a
					href="<?php echo url_for('nota/delete?id='.$nota->getId()) ?>">Eliminar</a>
					<a
					href="<?php echo url_for('nota/show?id='.$nota->getId()) ?>">Ver</a>
				</td>
			</tr>
			<?php endforeach; ?>
	
	</table>
</div>

<div style="clear: both;"></div>
