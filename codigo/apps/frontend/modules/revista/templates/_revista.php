
<script type="text/javascript">
$(function() {
	$(".botoneraRevista").hide();
	setTimeout(function(){
		$("#imagenRevistaActual img").wheelzoom();
		$(".botoneraRevista").show();
		}, 1000);
});


function abrirRevista(id,pag){
	$(".botoneraRevista").hide();
    $('#unicaRevistaOnlineContent').load(
            "<?php echo url_for('revista/asyncCargarRevista')?>",
            "revistaId=" + id+"&actual="+pag,function() {
            	$('#unicaRevistaOnline').modal();
            });
}


</script>

<div class="modalRevista">
<div class="botoneraRevista">
<a href="javascript:abrirRevista(<?php echo $revista->getId()?>,0)">Primera</a>
<?php if ($actual !=0):?>
<a href="javascript:abrirRevista(<?php echo $revista->getId()?>,<?php echo $actual-1?>)">Anterio</a>
<?php endif;?>
<?php if ($actual+1 !=$revista->getFotos()->count()):?>
<a href="javascript:abrirRevista(<?php echo $revista->getId()?>,<?php echo $actual+1?>)">Siguiente</a>
<?php endif;?>
<a href="javascript:abrirRevista(<?php echo $revista->getId()?>,<?php echo $revista->getFotos()->count()-1?>)">Ultima</a>

<input type="button" value="Ir a pagina" />
<input id="revista_irA" value=""/>
Pagina <?php echo $actual+1?> de <?php echo $revista->getFotos()->count()?>
</div>
	<div id="imagenRevistaActual">
		<?php echo image_tag("../uploads/revista/".$imagenActual->getFilename(),array()) ?>
	</div>
</div>
