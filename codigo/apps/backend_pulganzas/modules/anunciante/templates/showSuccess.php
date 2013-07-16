<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $anunciante->getId() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $anunciante->getNombre() ?></td>
    </tr>
    <tr>
      <th>Direccion:</th>
      <td><?php echo $anunciante->getDireccion() ?></td>
    </tr>
    <tr>
      <th>Localidad:</th>
      <td><?php echo $anunciante->getLocalidad() ?></td>
    </tr>
    <tr>
      <th>Telefono:</th>
      <td><?php echo $anunciante->getTelefono() ?></td>
    </tr>
    <tr>
      <th>Email:</th>
      <td><?php echo $anunciante->getEmail() ?></td>
    </tr>
    <tr>
      <th>Web:</th>
      <td><?php echo $anunciante->getWeb() ?></td>
    </tr>
    <tr>
      <th>Anuncio:</th>
      <td><?php echo $anunciante->getAnuncio() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('anunciante/edit?id='.$anunciante->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('anunciante/index') ?>">List</a>
