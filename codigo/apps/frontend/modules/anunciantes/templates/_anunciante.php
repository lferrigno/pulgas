<?php if($anunciante && $anunciante->getFotos()->count() >0):?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal"
			aria-hidden="true">×</button>
		<h3 id="myModalLabel"><?php echo $anunciante->getNombre()?></h3>
	</div>
	<div class="modal-body modalAnuncio">



<div id="myCarouselAnuncio" class="carousel slide">
		<ol class="carousel-indicators">
			<li data-target="#myCarouselAnuncio" data-slide-to="0" class="active"></li>
			<li data-target="#myCarouselAnuncio" data-slide-to="1"></li>
			<li data-target="#myCarouselAnuncio" data-slide-to="2"></li>
		</ol>
		<!-- Carousel items -->
		<div class="carousel-inner">
		<?php $first = true;?>
		<?php foreach ($anunciante->getFotos() as $elemento):?>
			<?php if ($first){
				$class = "item active";
				$first = false;
			}else {
				$class = "item";
				}?>
			<div class="<?php echo $class?>">
				<?php echo image_tag("../uploads/anunciantes/".$elemento->getFilename(),array("class"=>"imgCarouselAnuncio")) ?>
			</div>
			<?php endforeach;?>
		</div>
		<!-- Carousel nav -->
		<a class="carousel-control left" href="#myCarouselAnuncio" data-slide="prev">&lsaquo;</a>
		<a class="carousel-control right" href="#myCarouselAnuncio" data-slide="next">&rsaquo;</a>
	</div>
	<?php endif;?>
	</div>
	