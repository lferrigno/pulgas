<?php use_helper('Pagination')?>
<script>

function abrirAnuncio(id){

    $('#modalAnuncio').load(
            "<?php echo url_for('anunciantes/asyncCargarAnuncio')?>",
            "anuncioId=" + id,function() {
            	$('#myModal').modal();
            });
	

}

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

<div class="tituloSeccion seccionAnunciantes">Anunciantes</div>

<div class="tituloBuscador">Buscador de anunciantes</div>
<div class="row">
	<div class="span5">
		<form class="form-horizontal" id="form_filter" 	action="<?php echo url_for('anunciantes/index'); ?>" method="post"><input
	type="hidden" id="page" value="0" name="page" />
<?php echo $filtro->renderHiddenFields()?> 

<?php include_partial("global/simpleFormField",array("form"=>$filtro,"field"=>"nombre"));?>
	<?php include_partial("global/simpleFormField",array("form"=>$filtro,"field"=>"rubro"));?>
	<?php include_partial("global/simpleFormField",array("form"=>$filtro,"field"=>"categoria"));?>
	<div class="control-group">
				<div class="controls">
					<button type="submit" class="btn">Buscar</button>
				</div>
			</div>

</form>
</div>
</div>

<div style="clear: both" class="tituloSeccion seccionAnunciantes"></div>
<div class="seccionCategorias ">Categor&iacute;as</div>

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
	 <?php include_partial('listadoAnunciantes', array('nombreItem' => "listado_subCategorias_itemEducacion","group"=>$educacion)) ?>
	 <?php include_partial('listadoAnunciantes', array('nombreItem' => "listado_subCategorias_itemHogar","group"=>$hogar)) ?>
	 <?php include_partial('listadoAnunciantes', array('nombreItem' => "listado_subCategorias_itemNinos","group"=>$ninos)) ?>
	 <?php include_partial('listadoAnunciantes', array('nombreItem' => "listado_subCategorias_itemOtros","group"=>$otros)) ?>
	 <?php include_partial('listadoAnunciantes', array('nombreItem' => "listado_subCategorias_itemFiestas","group"=>$fiestas)) ?>
	 <?php include_partial('listadoAnunciantes', array('nombreItem' => "listado_subCategorias_itemSalud","group"=>$salud)) ?>
	 <?php include_partial('listadoAnunciantes', array('nombreItem' => "listado_subCategorias_itemEstetica","group"=>$estetica)) ?>
	
	
	<div style="clear: both" ></div>
<?php $anuncios = $pager->getResults();
if  ($anuncios->count() !=0) : ?>
	<div style="clear: both" class="tituloSeccion seccionAnunciantes"></div>

<div class="seccionCategorias ">Resultados</div>

<?php foreach ($anuncios as $anuncio):?>
<div class="section_content">
			<a href="javascript:abrirAnuncio('<?php echo $anuncio->getId()?>')"><?php echo image_tag("../uploads/anunciantes/".$anuncio->getFotos()->getFirst()->getFilename()
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


<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div id="modalAnuncio"></div>
</div>

<div style="clear: both"></div>