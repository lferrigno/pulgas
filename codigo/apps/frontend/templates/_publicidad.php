<script type="text/javascript">
  $(document).ready(function() {
    $('#myCarouselPublicidad').carousel({
      interval: 3000
    })
  });
</script>
<div class="publicidad">

	<div id="myCarouselPublicidad" class="carousel slide">
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>
		<!-- Carousel items -->
		<div class="carousel-inner">
			<?php $class = "active";?>
			<?php foreach ($publicidades->getFotos() as $foto):?>
			<div class="item <?php echo $class?>">
				<?php echo image_tag('../uploads/publicidad/'.$foto->getFilename(),array()) ?>
			</div>
			<?php 
			$class= "";
			endforeach;?>
		</div>
		<!-- Carousel nav -->
		<a style="display: none;" class="carousel-control left"
			href="#myCarouselPublicidad" data-slide="prev">&lsaquo;</a> <a
			style="display: none;" class="carousel-control right"
			href="#myCarouselPublicidad" data-slide="next">&rsaquo;</a>
	</div>
</div>
