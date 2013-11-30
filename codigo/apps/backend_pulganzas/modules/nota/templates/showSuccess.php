<div style="margin: 10px;">

<div class="span9">

<div class="encabezadoNovedad">
<?php echo image_tag("../uploads/novedades/".$nota->getFilename(),array('class'=>'imgNovedad')) ?>
<div class="tituloNovedad" >
<?php echo $nota->getTitulo() ?>
</div>
<div class="fechaNovedad" >
<?php echo $nota->getCreatedAt() ?>
</div>
</div>
<div class="textoNovedad">
<?php echo html_entity_decode($nota->getTexto()) ?>
</div>
<div style="clear: both;"></div>

<a style="margin-bottom: 15px;" href="<?php echo url_for('nota/index') ?>" class="btn">Volver</a>
</div>
<div style="clear: both;"></div>

</div>
<div style="clear: both;"></div>
