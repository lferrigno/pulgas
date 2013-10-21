<div style="margin: 10px;">

<div class="span9">

<div class="encabezadoNovedad">
<?php echo image_tag("../uploads/novedades/".$sorteo->getFilename(),array('class'=>'imgNovedad')) ?>
<div class="tituloNovedad" >
<?php echo $sorteo->getTitulo() ?>
</div>
<div class="fechaNovedad" >
<?php echo $sorteo->getCreatedAt() ?>
</div>
</div>
<div class="textoNovedad">
<?php echo html_entity_decode($sorteo->getTexto()) ?>
</div>
<div style="clear: both;"></div>

<a style="margin-bottom: 15px;" href="<?php echo url_for('sorteo/index') ?>" class="btn">Volver</a>
</div>
<div style="clear: both;"></div>

</div>
<div style="clear: both;"></div>
