<h1>Categorias</h1>


 <div class="span9">
    <table class="lista table table-hover table-bordered">
         <thead>
    <tr>
      <th>Nombre</th>
       <th>Acciones</th>
    </tr>
  </thead>
  <tbody> 
      <?php foreach ($categorias as $categoria): ?>
  
     <tr> 
      <td><?php echo $categoria->getNombre() ?></td>
     
      <td>
      <a href="<?php echo url_for('categoria/edit?id='.$categoria->getId()) ?>">Editar</a>
      
      <a href="<?php echo url_for('categoria/delete?id='.$categoria->getId()) ?>">Eliminar</a>
      </td>
        </tr>
    <?php endforeach; ?>
    </table>
</div>

<div style="clear:both;"></div>
