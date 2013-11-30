<div class="tituloSeccion seccionNovedades coloresNovedades">Novedades</div>

<?php include_partial('novedadUltima', array('nombreEncabezado' => $tituloNovedad,"elemento"=>$novedad,"urlVer"=>url_for($urlShowNovedad,array('id'=>$novedad->getId())))) ?>
<div  style="clear:both;"></div>
<?php if ($novedades && $novedades->count()>0):?>
<div class="separador"></div>

<div style="margin: auto">
<div class="subtitulo"><?php echo $ultimosMsg?></div>

<?php foreach ($novedades as $proximaNovedad):?>
<?php include_partial('novedadAntigua', array('nombreEncabezado' => $tituloNovedad,"elemento"=>$proximaNovedad,"urlVer"=>url_for($urlShowNovedad,array('id'=>$proximaNovedad->getId())))) ?>


<?php endforeach;?>
<?php endif;?>
<div style="clear: both;"></div>

<a style="margin-bottom: 15px;" href="<?php echo url_for('novedades') ?>" class="btn">Volver</a>
</div>