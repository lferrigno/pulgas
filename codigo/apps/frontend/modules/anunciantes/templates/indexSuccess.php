<?php use_helper('Pagination')?>
<script>

function limpiarTodos(){
	$(".linkTrigger").each(function(index) {
		 $(this).css( "background-color", "white" ) ;
		});
	$(".listado_subCategorias").each(function(index) {
		$(this).hide();
		});
}

$(function() {

	limpiarTodos();
    $('.linkTrigger a').hover(function(e) {
        limpiarTodos();
     $(this).parent().css( "background-color", "#DB541F" );
	var selector_listado_subCategorias = "#listado_subCategorias_"+$(this).attr('id');
    $(selector_listado_subCategorias).show();
     }, function() {
        	   
        	 });
  });


function cargarlistado_subCategoriasAjax(tipo){
	
    $('#listado_subCategorias').load(
            "<?php echo url_for('anunciantes/asyncCargarlistado_subCategorias')?>",
            "tipo=" + tipo,function() {
            	$('#formulario').show();
            });
    
}

</script>

<div style="clear: both"></div>
<div class="titulo_buscador">Anunciantes
</div>
<div class="separador"></div>
Buscador de anunciantes
<form id="form_filter" 	action="<?php echo url_for('anunciantes/index'); ?>" method="post"><input
	type="hidden" id="page" value="0" name="page" />
<?php echo $filtro->renderHiddenFields()?> 

<div class="fila">
	<div class="floatLeft margenDerecho">
		<?php echo $filtro['nombre']->renderLabel() ?>
		<?php echo $filtro['nombre'] ?>
		<?php echo $filtro['nombre']->renderError() ?>
	</div>
<div class="floatLeft margenDerecho">
		<?php echo $filtro['rubro']->renderLabel() ?>
		<?php echo $filtro['rubro'] ?>
		<?php echo $filtro['rubro']->renderError() ?>
	</div>
	<div class="floatLeft margenDerecho">
		<?php echo $filtro['categoria']->renderLabel() ?>
		<?php echo $filtro['categoria'] ?>
		<?php echo $filtro['categoria']->renderError() ?>
	</div>
	</div>
	<div class="clear"></div>
	<div><input type="submit" value="Buscar" /></div>

</form>
<div style="clear: both"></div>
	<div id="menu_anunciantes_box_solo">
		<div id="menu_anunciantes_box_centro_solo">
			<ul>
				<li class="linkTrigger"><a id="itemFiestas" href="#" target="_blank"> <?php echo image_tag('botones/fiestas.png',array()) ?>
				</a> <div style="width:70px; text-align:center;">Fiestas</div></li>
				<li class="linkTrigger"><a id="itemNinos" href="#" target="_blank"> <?php echo image_tag('botones/ninos.png',array()) ?>
				</a> <div style="width:70px; text-align:center;">Ni&ntilde;os</div></li>
				<li class="linkTrigger" ><a  id="itemEducacion"  href="#" target="_blank"> <?php echo image_tag('botones/educacion.png',array()) ?>
				</a> <div style="width:70px; text-align:center;">Educaci&oacute;n</div></li>
				<li class="linkTrigger"><a id="itemSalud" href="#" target="_blank"> <?php echo image_tag('botones/estetica.png',array()) ?>
				</a> <div style="width:70px; text-align:center;">Salud</div></li>
				<li class="linkTrigger"><a id="itemOtros" href="#" target="_blank"> <?php echo image_tag('botones/estetica.png',array()) ?>
				</a> <div style="width:70px; text-align:center;">Otros Prof.</div></li>
				<li class="linkTrigger"><a id="itemEstetica" href="#" target="_blank"> <?php echo image_tag('botones/estetica.png',array()) ?>
				</a> <div style="width:70px; text-align:center;">Est&eacute;tica</div></li>
				<li class="linkTrigger"><a id="itemHogar" href="#" target="_blank"> <?php echo image_tag('botones/hogar.png',array()) ?>
				</a> <div style="width:70px; text-align:center;">Hogar</div></li>
			</ul>
		</div>

	</div>
	<div style="clear: both"></div>
	<div class="listado_subCategorias" id="listado_subCategorias_itemEducacion">
		<ul>
		<?php foreach($educacion as $item):?>
	  		<li><?php echo $item?></li>
	 	<?php endforeach;?>
		</ul>
	</div>
	<div class="listado_subCategorias" id="listado_subCategorias_itemHogar">
		<ul>
		<?php foreach($hogar as $item):?>
	  		<li><?php echo $item?></li>
	 	<?php endforeach;?>
		</ul>
	</div>

	<div class="listado_subCategorias" id="listado_subCategorias_itemNinos">
		<ul>
		<?php foreach($ninos as $item):?>
	  		<li><?php echo $item?></li>
	 	<?php endforeach;?>
		</ul>
	</div>

	<div class="listado_subCategorias" id="listado_subCategorias_itemOtros">
		<ul>
		<?php foreach($otros as $item):?>
	  		<li><?php echo $item?></li>
	 	<?php endforeach;?>
		</ul>
	</div>
	<div class="listado_subCategorias" id="listado_subCategorias_itemFiestas">
	<ul>
  	<?php foreach($fiestas as $item):?>
  <li><?php echo $item?></li>
  <?php endforeach;?>
</ul>
	</div>

	<div class="listado_subCategorias" id="listado_subCategorias_itemSalud">
		<ul>
		<?php foreach($salud as $item):?>
	  		<li><?php echo $item?></li>
	 	<?php endforeach;?>
		</ul>
	</div>

	<div class="listado_subCategorias" id="listado_subCategorias_itemEstetica">
		<ul>
		<?php foreach($estetica as $item):?>
	  		<li><?php echo $item?></li>
	 	<?php endforeach;?>
		</ul>
	</div>
	
	<div style="clear: both"></div>
<?php $anuncios = $pager->getResults();
if  ($anuncios->count() !=0) : ?>
<?php foreach ($anuncios as $anuncio):?>
<div class="section_content">
			<a href="#"><?php echo image_tag("../uploads/anunciantes/".$anuncio->getFotos()->getFirst()->getFilename()
					,array()) ?></a>
						<div class="section_content_title"><?php echo $anuncio->getNombre()?></div>
		</div>
<?php endforeach;?>
<div style="align: center;">
<?php  echo pager_navigation($pager, 'anunciantes/index') ?>
</div>
<?php elseif ($se_filtro):?>
No hay resultados
<?php endif;?>


<div style="clear: both"></div>