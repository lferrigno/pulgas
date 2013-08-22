<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $novedad->getId() ?></td>
    </tr>
    <tr>
      <th>Tipo:</th>
      <td><?php echo $novedad->getTipo() ?></td>
    </tr>
    <tr>
      <th>Titulo:</th>
      <td><?php echo $novedad->getTitulo() ?></td>
    </tr>
    <tr>
      <th>Texto:</th>
      <td><?php echo $novedad->getTexto() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('novedad/edit?id='.$novedad->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('novedad/index') ?>">List</a>
