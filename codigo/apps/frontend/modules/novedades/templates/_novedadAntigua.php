

<?php if($elemento):?>
<div style="float:left;">
	<div class="section_content_old">
		<?php echo image_tag("../uploads/novedades/".$elemento->getFileName(),array()) ?>
		<div class="section_content_text_old textoSeccionNovedadAntigua">
			<?php echo html_entity_decode($elemento->getResumen()) ?>
		</div>
	</div>
</div>
<?php endif;?>