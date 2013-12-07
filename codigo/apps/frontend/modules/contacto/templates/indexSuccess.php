<div class="tituloSeccion coloresContactos">Contacto</div>
<div class="texto_generico">Contactate con la revista pulganzas</div>
<div class="section_header">
<div class="section_header_izq"></div>
<div class="section_header_text">Correo</div>
<div class="section_header_der"></div>
</div>

<div class=" span4 innerContent">
	<form action="<?php echo url_for('contacto/submit') ?>" method="POST">
  <table>
    <?php echo $form ?>
    <tr>
      <td colspan="2">
        <button type="submit" class="btn btn-success btnFiltro">Enviar</button>
      </td>
    </tr>
  </table>
</form>
</div>
<div class=" span5 innerContent">
	<div class="coloresContactos tituloSeccion no-border left-align">Nosotros</div>
	<div class="margin-box">
	<p><a href="http://www.facebook.com/Revista-Pulganzas">http://www.facebook.com/Revista-Pulganzas</a></p> 
	<p>TE: 4-222-1111</p> 
	<p><a href="mailto:info@revistapulganzas.com.ar" target="_top">
info@revistapulganzas.com.ar</a>
</p> 
	</div>
</div>
<div style="clear:both;"></div>
