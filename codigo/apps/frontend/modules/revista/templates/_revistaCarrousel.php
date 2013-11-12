<div class="section_header">
<div class="section_header_izq"></div>
<div class="section_header_text">Revista</div>
<div class="section_header_der"></div>
<script type="text/javascript">

function avanzar(){
	alert("Avanzar");
}
function volver(){
	alert("Volver");
}

//Returns object with values for background-position - http://snipplr.com/view/50791/
function getBackgroundPos(obj) {
  var pos = obj.css('background-position');
  if (pos == 'undefined' || pos == null) {
    // for IE, because it doesn`t know background-position
    pos = [obj.css('background-position-x'),obj.css('background-position-y')];
  }
  else {
    pos = pos.split(' ');
  }
  return {
    x: parseFloat(pos[0]),
    xUnit: pos[0].replace(/[0-9-.]/g, ''),
    y: parseFloat(pos[1]),
    yUnit: pos[1].replace(/[0-9-.]/g, '')
  };
}

function zoomImagen(img,mult){

	var width = img.width(),
	height = img.height(),
	bgWidth = width,
	bgHeight = height,
	nuevobgWidth = bgWidth+ bgWidth*0.1*mult;
	nuevobgHeight = bgHeight+ bgHeight*0.1*mult;
	var bgPos = getBackgroundPos(img);
	if (bgPos.x != 0){
	nuevobgPosX = bgPos.x+ bgPos.x*0.1*mult;
	nuevobgposY = bgPos.y+ bgPos.y*0.1*mult;
	}else{
		nuevobgPosX = -30;
		nuevobgposY = -30;
	}
	img[0].style.backgroundPosition =  nuevobgPosX + 'px ' + nuevobgposY + 'px';
	img[0].style.backgroundSize = nuevobgWidth + 'px ' + nuevobgHeight + 'px';
}

function zoomIn(){
	zoomImagen($("#imagenActual img"),1);
}
function zoomOut(){
	$("#imagenActual img").trigger("mousedown");
}
$(function() {

	$("#imagenActual img").wheelzoom();

	
});

</script>
</div>
<?php if($revista && $revista->getFotos()->count() >0):?>
<div id="botonera">
<a href="javascript:avanzar()">Avanzar</a>
<a href="javascript:volver()">Volver</a>
<a href="javascript:zoomIn()">Zoom In</a>
<a href="javascript:zoomOut()">Zoom Out</a>
</div>
<div id="imagenActual">
<?php echo image_tag("../uploads/revista/".$revista->getFotos()->getFirst()->getFilename(),array()) ?>			
</div>

	<?php endif;?>