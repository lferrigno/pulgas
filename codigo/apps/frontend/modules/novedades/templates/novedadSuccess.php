<?php include_partial('novedad', array('nombreEncabezado' => $tituloNovedad,"elemento"=>$novedad,"urlVer"=>url_for($urlShowNovedad,array('id'=>$novedad->getId())))) ?>
<div class="separador"></div>

<h3><?php echo $ultimosMsg?></h3>

<?php foreach ($novedades as $proximaNovedad):?>
<?php include_partial('novedadAntigua', array('nombreEncabezado' => $tituloNovedad,"elemento"=>$proximaNovedad,"urlVer"=>url_for($urlShowNovedad,array('id'=>$proximaNovedad->getId())))) ?>

<?php endforeach;?>
<div style="clear: both;"></div>

<a style="margin-bottom: 15px;" href="<?php echo url_for('novedades') ?>" class="btn">Volver</a>