<h1>Anunciantes</h1>
<a href="<?php echo url_for('anunciante/new') ?>"
	class="btn btn-primary btn-nuevo">Nuevo Anunciante</a>

<div class="span9">
	<table class="lista table table-hover table-bordered">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Categor&iacute;a</th>
				<th>Sub Categor&iacute;a</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($anunciantes as $anunciante): ?>

			<tr>
				<td><?php echo $anunciante->getNombre() ?></td>
				<td><?php echo $anunciante->getSubCategorias()->getFirst()->getCategoria()?></td>
				<td><?php echo $anunciante->getSubCategorias()->getFirst() ?></td>
				
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
