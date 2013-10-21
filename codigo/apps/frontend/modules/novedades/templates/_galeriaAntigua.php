<div>
<?php if($elemento && $elemento->getFotos()->count()>0):?>
<div class="section_content">
			<a href="<?php echo $urlVer?>"><?php echo image_tag("../uploads/galeria/".$elemento->getFotos()->getFirst()->getFileName(),array()) ?>
			</a>
	</div>
<?php endif;?>
</div>