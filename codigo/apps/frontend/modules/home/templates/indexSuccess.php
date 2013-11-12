<script type="text/javascript">
function abrirRevista(id){
    $('#unicaRevistaOnlineContent').load(
            "<?php echo url_for('revista/asyncCargarRevista')?>",
            "revistaId=" + id+"&actual=0",function() {
            	$('#unicaRevistaOnline').modal();
            });
}


</script>
	<div id="myCarousel" class="carousel slide">
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>
		<!-- Carousel items -->
		<div class="carousel-inner">
			<div class="item active">
				<?php echo image_tag('banners/banner1.png',array()) ?>
			</div>
			<div class="item">
				<?php echo image_tag('banners/banner2.png',array()) ?>
			</div>
			<div class="item">
				<?php echo image_tag('banners/banner3.png',array()) ?>
			</div>
		</div>
		<!-- Carousel nav -->
		<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
		<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
	</div>

	<div id="encontranos_box">
		<a href="#" target="_blank"> <?php echo image_tag('encontranos.png',array()) ?>
		</a>
	</div>
	<div id="buscador_anunciantes_box">
		<div class="box_header"></div>

		<div class="box_header_side"></div>
		<div class="box_header_label"></div>

		<div class="box_content">
			<input type="text" name="nombre_anunciante"
				placeholder="Ingrese aqu&iacute; el nombre del anunciante">
		</div>
	</div>
	<div style="clear: both"></div>
	<div id="menu_anunciantes_box">
		<div id="menu_anunciantes_box_izq"></div>
		<div id="menu_anunciantes_box_centro">
			<div id="menu_anunciantes_box_header_label"></div>
			<ul>
				<li><a href="#" target="_blank"> <?php echo image_tag('botones/educacion.png',array()) ?>
				</a> <span>Educaci&oacute;n</span></li>
				<li><a href="#" target="_blank"> <?php echo image_tag('botones/fiestas.png',array()) ?>
				</a> <span>Fiestas</span></li>
				<li><a href="#" target="_blank"> <?php echo image_tag('botones/hogar.png',array()) ?>
				</a> <span>Hogar</span></li>
				<li><a href="#" target="_blank"> <?php echo image_tag('botones/estetica.png',array()) ?>
				</a> <span>Est&eacute;tica</span></li>
				<li><a href="#" target="_blank"> <?php echo image_tag('botones/ninos.png',array()) ?>
				</a> <span>Ni&ntilde;os</span></li>
			</ul>
			<a id="menu_anunciantes_box_centro_mas" href="#">+ Ver mas
				anunciantes</a>
		</div>
		<div id="menu_anunciantes_box_der"></div>

	</div>
	<div style="clear: both"></div>

	<div class="section_container">
		<div class="section_header">
			<div class="section_header_izq"></div>
			<div class="section_header_text">NOTAS</div>
			<div class="section_header_der"></div>


		</div>
		<div class="section_content">
			<?php echo image_tag('imagenNotas.png',array()) ?>
			<div class="section_content_text">IMAGENNSLK sñldkañldkal IMAGENNSLK
				sñldkañldkal IMAGENNSLK sñldkañldkal IMAGENNSLK sñldkañldkal
				IMAGENNSLK sñldkañldkal</div>
			<div class="view_more">
				<a href="#"> <?php echo image_tag('boton_verMas.png',array()) ?>
				</a>
			</div>
		</div>
	</div>
	<div class="separador" style="margin-top: 270px;"></div>

	<div class="section_container_small">
		<div class="section_header">
			<div class="section_header_izq"></div>
			<div class="section_header_text">RECETAS</div>
			<div class="section_header_der"></div>


		</div>
		<div class="section_content">
			<?php echo image_tag('imagenNotas.png',array()) ?>
			<div class="section_content_text halfCol">IMAGENNSLK sñldkañldkal
				IMAGENNSLK sñldkañldkal IMAGENNSLK sñldkañldkal IMAGENNSLK
				sñldkañldkal IMAGENNSLK sñldkañldkal</div>
			<div class="view_more halfCol_more">
				<a href="#"> <?php echo image_tag('boton_verMas.png',array()) ?>
				</a>
			</div>
		</div>
	</div>

	<div id="revista_box_small">
		<div class="box_header"></div>

		<div class="box_header_side"></div>
		<div class="box_header_label"></div>

		<div class="box_content">
			<a class="view_more_left" href="javascript:abrirRevista(<?php echo $ultimaRevista->getId()?>)"> <?php echo image_tag('boton_verMas.png',array()) ?>
			</a>
			<?php echo image_tag('revista_online.png',array()) ?>
		</div>
	</div>

	<div class="separador" style="margin-top: 270px; width: 500px;"></div>

	<div class="section_container_small">
		<div class="section_header">
			<div class="section_header_izq"></div>
			<div class="section_header_text">Pulguitas</div>
			<div class="section_header_der"></div>


		</div>
		<div class="section_content">
			<?php echo image_tag('imagenNotas.png',array()) ?>
			<div class="section_content_text halfCol">IMAGENNSLK sñldkañldkal
				IMAGENNSLK sñldkañldkal IMAGENNSLK sñldkañldkal IMAGENNSLK
				sñldkañldkal IMAGENNSLK sñldkañldkal</div>
			<div class="view_more halfCol_more">
				<a href="#"> <?php echo image_tag('boton_verMas.png',array()) ?>
				</a>
			</div>
		</div>
	</div>

	<div id="publicidad_box_small">
		<div class="box_header"></div>

		<div class="box_header_side"></div>
		<div class="box_header_label"></div>

		<div class="box_content">
			<?php echo image_tag('pulbicidad.png',array()) ?>
		</div>
</div>
<div style="clear: both"></div>
