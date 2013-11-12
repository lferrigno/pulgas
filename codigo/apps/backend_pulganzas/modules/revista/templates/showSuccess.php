<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $revista->getId() ?></td>
    </tr>
    <tr>
      <th>Titulo:</th>
      <td><?php echo $revista->getTitulo() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $revista->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $revista->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('revista/edit?id='.$revista->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('revista/index') ?>">List</a>
