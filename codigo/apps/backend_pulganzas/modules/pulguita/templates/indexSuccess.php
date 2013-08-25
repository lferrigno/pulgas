<a href="<?php echo url_for('pulguita/new') ?>"
	class="btn btn-primary btn-nuevo">Nueva pulguita</a>

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
			<?php foreach ($pulguitas as $pulguita): ?>

			<tr>
				<td><?php echo $pulguita->getTitulo() ?></td>
				<td><?php echo $pulguita->getCreatedAt()?></td>

				<td><a
					href="<?php echo url_for('pulguita/edit?id='.$pulguita->getId()) ?>">Editar</a>

					<a
					href="<?php echo url_for('pulguita/delete?id='.$pulguita->getId()) ?>">Eliminar</a>
					<a
					href="<?php echo url_for('pulguita/show?id='.$pulguita->getId()) ?>">Ver</a>
				</td>
			</tr>
			<?php endforeach; ?>
	
	</table>
</div>

<div style="clear: both;"></div>
