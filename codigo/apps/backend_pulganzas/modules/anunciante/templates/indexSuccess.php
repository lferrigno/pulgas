<h1>Anunciantes List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Direccion</th>
      <th>Localidad</th>
      <th>Telefono</th>
      <th>Email</th>
      <th>Web</th>
      <th>Anuncio</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($anunciantes as $anunciante): ?>
    <tr>
      <td><a href="<?php echo url_for('anunciante/show?id='.$anunciante->getId()) ?>"><?php echo $anunciante->getId() ?></a></td>
      <td><?php echo $anunciante->getNombre() ?></td>
      <td><?php echo $anunciante->getDireccion() ?></td>
      <td><?php echo $anunciante->getLocalidad() ?></td>
      <td><?php echo $anunciante->getTelefono() ?></td>
      <td><?php echo $anunciante->getEmail() ?></td>
      <td><?php echo $anunciante->getWeb() ?></td>
      <td><?php echo $anunciante->getAnuncio() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('anunciante/new') ?>">New</a>
