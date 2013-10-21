<?php if ($ultimoSorteo):?>
<?php include_partial('novedad', array('nombreEncabezado' => "SORTEOS","elemento"=>$ultimoSorteo,"urlVer"=>url_for('novedades/sorteo?id='.$ultimoSorteo->getId()))) ?>
<?php endif;?>

<?php if ($ultimaReceta):?>
<div class="separador"></div>
<?php include_partial('novedad', array('nombreEncabezado' => "RECETAS","elemento"=>$ultimaReceta,"urlVer"=>url_for('novedades/receta?id='.$ultimaReceta->getId()))) ?>
<?php endif;?>

<?php if ($ultimaGaleria):?>
<div  class="separador"></div>
 <?php include_partial('galeria', array('nombreEncabezado' => "GALERIA","elemento"=>$ultimaGaleria,"urlVer"=>url_for('novedades/galeria?id='.$ultimaGaleria->getId()))) ?>
<?php endif;?>
