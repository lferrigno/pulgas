<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php include_http_metas() ?>
<?php include_metas() ?>
<?php include_title() ?>
<link rel="shortcut icon" href="/favicon.ico" />
<?php include_stylesheets() ?>
<?php include_javascripts() ?>
</head>
<body>
<script type="text/javascript">
function abrirRevista(id){
    $('#unicaRevistaOnlineContent').load(
            "<?php echo url_for('revista/asyncCargarRevista')?>",
            "revistaId=" + id+"&actual=0",function() {
            	$('#unicaRevistaOnline').modal();
            });
}
function abrirUltimaRevista(){
    $('#unicaRevistaOnlineContent').load(
            "<?php echo url_for('revista/asyncCargarUltimaRevista')?>",
            "actual=0",function() {
            	$('#unicaRevistaOnline').modal();
            });
}




</script>
<div ><a href="<?php echo url_for('@homepage')?>" ><div class="encabezado"></div></a></div>
	<div class="content">

		<?php include_partial("global/menu");?>
		<?php echo $sf_content ?>
	<div id="unicaRevistaOnline" class="modal hide fade" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div id="unicaRevistaOnlineContent"></div>
</div>
	</div>
	<div style="clear:both;"></div>
	<div id="footer">
		<ul style="clear:both;" id="footer-nav">
<li id="active"><a href="#" id="current">NOSOTROS</a></li>
<li><a href="#">ANUNCIANTES</a></li>
<li><a href="#">REVISTA ONLINE</a></li>
<li><a href="#">NOVEDADES</a></li>
<li><a href="#">NOTAS</a></li>
<li><a href="#">CONTACTO</a></li>
</ul>
	</div>

</body>
</html>
