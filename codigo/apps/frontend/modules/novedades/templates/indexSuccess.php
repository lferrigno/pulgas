<div class="tituloSeccion seccionNovedades">Novedades</div>

<?php if ($ultimoSorteo):?>
<?php include_partial('novedad', array('nombreEncabezado' => "SORTEOS","elemento"=>$ultimoSorteo,"urlVer"=>url_for('novedades/sorteo?id='.$ultimoSorteo->getId()))) ?>
<?php endif;?>
<div  style="clear:both;"></div>
<?php if ($ultimaReceta):?>
<div class="separador"></div>
<?php include_partial('novedad', array('nombreEncabezado' => "RECETAS","elemento"=>$ultimaReceta,"urlVer"=>url_for('novedades/receta?id='.$ultimaReceta->getId()))) ?>
<?php endif;?>

<div  style="clear:both;"></div>
<?php if ($ultimaGaleria):?>
<div  class="separador"></div>
 <?php include_partial('galeria', array('nombreEncabezado' => "GALERIA","elemento"=>$ultimaGaleria,"urlVer"=>url_for('novedades/galeria?id='.$ultimaGaleria->getId()))) ?>
<?php endif;?>
<div style="clear: both;"></div>
<?php include_partial('global/publicidad',array('publicidades'=>$publicidades));?>
<div style="clear: both;"></div>
