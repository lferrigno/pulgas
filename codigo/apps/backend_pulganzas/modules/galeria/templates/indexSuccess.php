<a href="<?php echo url_for('galeria/new') ?>"
	class="btn btn-primary btn-nuevo">Nueva Galeria</a>

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
			<?php foreach ($galerias as $galeria): ?>

			<tr>
				<td><?php echo $galeria->getTitulo() ?></td>
				<td><?php echo $galeria->getFotos()->count() ?></td>
				<td><a
					href="<?php echo url_for('galeria/edit?id='.$galeria->getId()) ?>">Editar</a>

					<a
					href="<?php echo url_for('galeria/delete?id='.$galeria->getId()) ?>">Eliminar</a>
				</td>
			</tr>
			<?php endforeach; ?>
	
	</table>
</div>

<div style="clear: both;"></div>
