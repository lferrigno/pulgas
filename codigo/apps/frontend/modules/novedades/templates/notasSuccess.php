<div class="tituloSeccion seccionNovedades coloresNotas">Notas</div>

<div  style="clear:both;"></div>
<?php include_partial('notaAntigua', array('nombreEncabezado' => $tituloNovedad,"elemento"=>$novedad,"urlVer"=>url_for($urlShowNovedad,array('id'=>$novedad->getId())))) ?>
<div  style="clear:both;"></div>
<?php if ($novedades && $novedades->count()>0):?>
<div class="separador"></div>
<?php foreach ($novedades as $proximaNovedad):?>
<?php include_partial('notaAntigua', array('nombreEncabezado' => $tituloNovedad,"elemento"=>$proximaNovedad,"urlVer"=>url_for($urlShowNovedad,array('id'=>$proximaNovedad->getId())))) ?>


<?php endforeach;?>
<?php endif;?>
<div style="clear: both;"></div>
<?php include_partial('global/publicidad',array());?>
<div style="clear: both;"></div>