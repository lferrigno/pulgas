
<script type="text/javascript">
$(function() {
	setTimeout(function(){
		$("#imagenRevistaActual img").wheelzoom();
		}, 300);
});

/*$(function() {
	$(".botoneraRevista").hide();
	setTimeout(function(){
		$("#imagenRevistaActual img").wheelzoom();
		$(".botoneraRevista").show();
		}, 1000);
});*/

function abrirRevista(id,pag){
	$(".botoneraRevista").hide();
    $('#unicaRevistaOnlineContent').load(
            "<?php echo url_for('revista/asyncCargarRevista')?>",
            "revistaId=" + id+"&actual="+pag,function() {
            	$('#unicaRevistaOnline').modal();
            });
}

function abrirRevistaDirecto(id,pag){
	var pag = $('#revista_irA').val() -1;
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
<?php if ($actual !=0):?>
<a href="javascript:abrirRevista(<?php echo $revista->getId()?>,<?php echo $actual-1?>)"><?php echo image_tag("revAnterior.png")?></a>
<?php endif;?>
<?php if ($actual+1 !=$revista->getFotos()->count()):?>
<a href="javascript:abrirRevista(<?php echo $revista->getId()?>,<?php echo $actual+1?>)"><?php echo image_tag("revSiguiente.png")?></a>
<?php endif;?>
Ir a p&aacute;gina:
<input id="revista_irA" value=""/>
<a class="lupa" href="javascript:abrirRevistaDirecto(<?php echo $revista->getId()?>)"><?php echo image_tag("lupa_revista.png")?></a>
Pagina <?php echo $actual+1?> de <?php echo $revista->getFotos()->count()?>
</div>
	<div id="imagenRevistaActual">
		<?php echo image_tag("../uploads/revista/".$imagenActual->getFilename(),array()) ?>
	</div>
</div>
