<h1>Anunciantes</h1>
<a href="<?php echo url_for('revista/new') ?>"
	class="btn btn-primary btn-nuevo">Nueva Revista</a>

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
			<?php foreach ($revistas as $revista): ?>

			<tr>
				<td><?php echo $revista->getTitulo() ?></td>
				<td><?php echo $revista->getFotos()->count() ?></td>
				<td><a
					href="<?php echo url_for('revista/edit?id='.$revista->getId()) ?>">Editar</a>

					<a
					href="<?php echo url_for('revista/delete?id='.$revista->getId()) ?>">Eliminar</a>
				</td>
			</tr>
			<?php endforeach; ?>
	
	</table>
</div>

<div style="clear: both;"></div>
