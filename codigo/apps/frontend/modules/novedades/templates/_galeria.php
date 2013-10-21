<div >
<div class="section_header">
<div class="section_header_izq"></div>
<div class="section_header_text"><?php echo $nombreEncabezado?></div>
<div class="section_header_der"></div>


</div>
<?php if($elemento):?>
<div class="section_content">
			<a href="<?php echo $urlVer?>"><?php echo image_tag("../uploads/galeria/".$elemento->getFotos()->getFirst()->getFilename()
					,array()) ?></a>
						<div class="section_content_title"><?php echo $elemento->getTitulo()?></div>
		</div>
	</div>
<?php else:?>
<h5>No existen <?php echo $nombreEncabezado?></h5>
<?php endif;?>