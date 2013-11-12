<div class="section_header">
<div class="section_header_izq"></div>
<div class="section_header_text"><?php echo $nombreEncabezado?></div>
<div class="section_header_der"></div>
</div>
<?php if($galeria && $galeria->getFotos()->count() >0):?>
<div style="margin: 10px" class="section_content_title_ultima"><?php echo $galeria->getTitulo()?></div>
<div style="clear: both;"></div>
<div id="myCarouselGaleria" class="carousel slide">
		<ol class="carousel-indicators">
			<li data-target="#myCarouselGaleria" data-slide-to="0" class="active"></li>
			<li data-target="#myCarouselGaleria" data-slide-to="1"></li>
			<li data-target="#myCarouselGaleria" data-slide-to="2"></li>
		</ol>
		<!-- Carousel items -->
		<div class="carousel-inner">
		<?php $first = true;?>
		<?php foreach ($galeria->getFotos() as $elemento):?>
			<?php if ($first){
				$class = "item active";
				$first = false;
			}else {
				$class = "item";
				}?>
			<div class="<?php echo $class?>">
<?php echo image_tag("../uploads/galeria/".$elemento->getFilename(),array()) ?>			</div>
			<?php endforeach;?>
		</div>
		<!-- Carousel nav -->
		<a class="carousel-control left" href="#myCarouselGaleria" data-slide="prev">&lsaquo;</a>
		<a class="carousel-control right" href="#myCarouselGaleria" data-slide="next">&rsaquo;</a>
	</div>
	<?php endif;?>