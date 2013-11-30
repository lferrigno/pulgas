<div class="tituloSeccion seccionNovedades coloresNotas">Notas</div>
<div style="clear: both;"></div>

<div class="span9">

<div class="encabezadoNovedad">
<?php echo image_tag("../uploads/novedades/".$novedad->getFilename(),array('class'=>'imgNovedad')) ?>
<div class="tituloNovedad" >
<?php echo $novedad->getTitulo() ?>
</div>
<div class="fechaNovedad" >
<?php echo $novedad->getCreatedAt() ?>
</div>
<div class="textoNovedad">
<?php echo html_entity_decode($novedad->getTexto()) ?>
</div>
</div>

<div style="clear: both;"></div>

<a style="margin-bottom: 15px;" href="<?php echo $urlVolver ?>" class="btn">Volver</a>
</div>
<div style="clear: both;"></div>

<div style="clear: both;"></div>
