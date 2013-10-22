
<script>
function buscar(rubro,categoria){
	$("#anunciante_filters_rubro").val(rubro);
	$("#anunciante_filters_nombre").val("");
	$("#anunciante_filters_categoria").val(categoria);
	$("#form_filter").submit();
}
  </script>

<div class="listado_subCategorias" id="<?php echo $nombreItem?>">
	<ul>
		<?php foreach($group as $item):?>
		<li><a href="javascript:buscar('<?php echo $item->getNombre() ?>','<?php echo $item->getCategoria()->getId() ?>')"><?php echo $item?>
		</a></li>
		<?php endforeach;?>
	</ul>
</div>
