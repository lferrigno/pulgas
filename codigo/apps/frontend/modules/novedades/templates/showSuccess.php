<div class="tituloSeccion seccionNovedades coloresNovedades">Novedades</div>
<div class="section_header">
<div class="section_header_izq"></div>
<div class="section_header_text"><?php echo $nombreEncabezado ?></div>
<div class="section_header_der"></div>
</div>
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

</div>
<div style="clear: both;"></div>
<?php include_partial('global/publicidad',array());?>
<div style="clear: both;"></div>
