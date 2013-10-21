<div >
<div class="section_header">
<div class="section_header_izq"></div>
<div class="section_header_text"><?php echo $nombreEncabezado?></div>
<div class="section_header_der"></div>


</div>
<?php if($elemento):?>
<div class="section_content">
			<?php echo image_tag("../uploads/novedades/".$elemento->getFileName(),array()) ?>
						<div class="section_content_title"><?php echo $elemento->getTitulo()?></div>
			<div class="section_content_text textoSeccionNovedad"><?php echo html_entity_decode($elemento->getResumen()) ?>
			</div>
			
			<div class="view_more_novedad">
				<a href="<?php echo $urlVer?>"> <?php echo image_tag('boton_verMas.png',array()) ?>
				</a>
			</div>
			
		</div>
	</div>
<?php else:?>
<h5>No existen <?php echo $nombreEncabezado?></h5>
<?php endif;?>