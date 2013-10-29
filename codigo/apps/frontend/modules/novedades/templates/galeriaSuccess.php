<div class="tituloSeccion seccionNovedades">Novedades</div>

<?php include_partial('galeriaCarrousel', array('nombreEncabezado' => $tituloNovedad,"galeria"=>$galeria,"urlVer"=>url_for('novedades/galeria?id='.$galeria->getId(),array()))) ?>
<div class="separador"></div>

<div style="margin: 20px">
<div class="subtitulo"><?php echo $ultimosMsg?></div>

<?php foreach ($galerias as $proximaNovedad):?>
<?php include_partial('galeriaAntigua', array('nombreEncabezado' => $tituloNovedad,"elemento"=>$proximaNovedad,"urlVer"=>url_for('novedades/galeria?id='.$proximaNovedad->getId(),array()))) ?>


<?php endforeach;?>
<div style="clear: both;"></div>

<a style="margin-bottom: 15px;" href="<?php echo url_for('novedades') ?>" class="btn">Volver</a>
</div>