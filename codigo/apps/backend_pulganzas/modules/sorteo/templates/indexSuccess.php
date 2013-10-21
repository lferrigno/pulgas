<a href="<?php echo url_for('sorteo/new') ?>"
	class="btn btn-primary btn-nuevo">Nuevo Sorteo</a>

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
			<?php foreach ($sorteos as $sorteo): ?>

			<tr>
				<td><?php echo $sorteo->getTitulo() ?></td>
				<td><?php echo $sorteo->getCreatedAt()?></td>

				<td><a
					href="<?php echo url_for('sorteo/edit?id='.$sorteo->getId()) ?>">Editar</a>

					<a
					href="<?php echo url_for('sorteo/delete?id='.$sorteo->getId()) ?>">Eliminar</a>
					<a
					href="<?php echo url_for('sorteo/show?id='.$sorteo->getId()) ?>">Ver</a>
				</td>
			</tr>
			<?php endforeach; ?>
	
	</table>
</div>

<div style="clear: both;"></div>
