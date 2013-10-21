<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $galeria->getId() ?></td>
    </tr>
    <tr>
      <th>Titulo:</th>
      <td><?php echo $galeria->getTitulo() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $galeria->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $galeria->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('galeria/edit?id='.$galeria->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('galeria/index') ?>">List</a>
