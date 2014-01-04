<div class="tituloSeccion seccionNovedades">Novedades</div>

<?php include_partial('galeriaCarrousel', array('nombreEncabezado' => $tituloNovedad,"galeria"=>$galeria,"urlVer"=>url_for('novedades/galeria?id='.$galeria->getId(),array()))) ?>
<div  style="clear:both;"></div>
<?php if($galerias && $galerias->count()>0):?>
<div class="separador"></div>

<div style="margin: 20px">
<div class="subtitulo"><?php echo $ultimosMsg?></div>

<?php foreach ($galerias as $proximaNovedad):?>
<?php include_partial('galeriaAntigua', array('nombreEncabezado' => $tituloNovedad,"elemento"=>$proximaNovedad,"urlVer"=>url_for('novedades/galeria?id='.$proximaNovedad->getId(),array()))) ?>


<?php endforeach;?>
<?php endif;?>
<div style="clear: both;"></div>
<?php include_partial('global/publicidad',array('publicidades'=>$publicidades));?>
</div>