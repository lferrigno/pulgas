<h1>Novedads List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Tipo</th>
      <th>Titulo</th>
      <th>Texto</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($novedades as $novedad): ?>
    <tr>
      <td><a href="<?php echo url_for('novedad/show?id='.$novedad->getId()) ?>"><?php echo $novedad->getId() ?></a></td>
      <td><?php echo $novedad->getTipo() ?></td>
      <td><?php echo $novedad->getTitulo() ?></td>
      <td><?php echo $novedad->getTexto() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo $urlNuevo ?>">Nuevo</a>
