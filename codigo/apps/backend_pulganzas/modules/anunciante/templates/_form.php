<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<script type="text/javascript">


function completarSelect(datos, input) {
    var sel = document.getElementById(input);
    var obj = jQuery.parseJSON(datos);
    //Si solo es un valor, lipio y lo selecciono.
    if (obj.length == 1)
    {sel.length=0;};
    if(obj != null) {
	    var i;
	    for(i=0; i < obj.length; i++ ) {
		    
	        opcion = document.createElement("OPTION");
	        opcion.innerHTML = obj[i].descripcion; 
	        opcion.value = obj[i].id;
        

		$("#"+input).removeAttr('disabled');
			
	        sel.appendChild(opcion);
	    }
    }
    if (obj.length == 1)
    {
       try{
        sel.onchange();
        }catch (e) {
			// Si no tiene onchange no hacer nada
		};
    }
}

function limpiarSelect(input, leyenda) {
    var sel = document.getElementById(input);
     sel.length = 0; 
     opcion = document.createElement("OPTION"); 
     opcion.innerHTML = leyenda; 
     opcion.value = ''; 
     sel.appendChild(opcion);
}


function cargarSubCategorias() {
	var categoriaId = $("#sub_categoria_anunciante_categoria").val();
	limpiarSelect("sub_categoria_anunciante_sub_categoria_id","Cargando...");
	$.ajax({
    	type: "POST",
		url: "<?php echo url_for('anunciante/asyncCargarSubCategorias')?>",
		data: "categoriaId=" + categoriaId,
		success: function(datos){
		    limpiarSelect("sub_categoria_anunciante_sub_categoria_id","Seleccione...");
			completarSelect(datos,"sub_categoria_anunciante_sub_categoria_id");
	    },
	    error: function(objeto, quepaso, otroobj){
	    	alert("Se ha producido un error. Por favor intente nuevamente.");
	    }
 	});}

function cargarCategorias() {
	var categoriaId = $("#sub_categoria_anunciante_categoria").val();
	
	limpiarSelect("sub_categoria_anunciante_categoria","Cargando...");
	$("#sub_categoria_anunciante_sub_categoria_id").attr('disabled', 'disabled');
	$.ajax({
    	type: "POST",
		url: "<?php echo url_for('anunciante/asyncCargarCategorias')?>",
		data: "categoriaId=" + categoriaId,
		success: function(datos){
		    limpiarSelect("sub_categoria_anunciante_categoria","Seleccione...");
			completarSelect(datos,"sub_categoria_anunciante_categoria");
	    },
	    error: function(objeto, quepaso, otroobj){
	    	alert("Se ha producido un error. Por favor intente nuevamente.");
	    }
 	});}

$(function() {
	cargarCategorias();
    limpiarSelect("sub_categoria_anunciante_categoria","Seleccione...");
    limpiarSelect("sub_categoria_anunciante_sub_categoria_id","Seleccione Categor&iacute;a");
	$("#sub_categoria_anunciante_sub_categoria_id").attr('disabled', 'disabled');
    
		
});
</script>
<div class="row">
	<div class="span5">
		<form class="form-horizontal"
			action="<?php echo url_for('anunciante/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>"
			method="post"
			<?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
			<?php if (!$form->getObject()->isNew()): ?>
			<input type="hidden" name="sf_method" value="put" />
			<?php endif; ?>
			<?php echo $form->renderHiddenFields()?>


			<?php include_partial("global/simpleFormField",array("form"=>$form,"field"=>"nombre"));?>
			<?php include_partial("global/simpleFormField",array("form"=>$form,"field"=>"direccion"));?>
			<?php include_partial("global/simpleFormField",array("form"=>$form,"field"=>"localidad"));?>
			<?php include_partial("global/simpleFormField",array("form"=>$form,"field"=>"telefono"));?>
			<?php include_partial("global/simpleFormField",array("form"=>$form,"field"=>"email"));?>
			<?php include_partial("global/simpleFormField",array("form"=>$form,"field"=>"web"));?>
			<?php include_partial("global/simpleFormField",array("form"=>$form,"field"=>"facebook"));?>
			<?php include_partial("global/simpleFormField",array("form"=>$form,"field"=>"anuncio"));?>

			<div class="control-group">
				<div class="controls">
					<button type="submit" class="btn">Guardar</button>


					<?php if (!$form->getObject()->isNew()): ?>
					<a href="#myFotoModal" role="button" class="btn"
						data-toggle="modal">Agregar Imagen</a> <a href="#myModal"
						role="button" class="btn" data-toggle="modal">Agregar Sub
						Categor&iacute;a</a>
					<?php endif; ?>
					<a href="<?php echo url_for('anunciante/index') ?>" class="btn">Volver</a>

				</div>
			</div>
		</form>
	</div>
	<div class="span3 offset1">
		<?php if(!$form->getObject()->isNew()):?>
		Listado de imagenes ya cargadas
		<?php foreach ($form->getObject()->getFotos() as $foto):?>
		<?php echo image_tag("../uploads/anunciantes/".$foto->getFilename(),array()) ?>
		<?php endforeach;?>
		<?php endif;?>

	</div>
</div>
<div style="clear: both;"></div>

			<?php include_partial("modalSubCategoria",array("form"=>$form,"categoriaAnuncianteForm"=>$categoriaAnuncianteForm));?>
			
			<?php include_partial("modalFotoAnunciante",array("form"=>$form,"fotoForm"=>$fotoForm));?>

