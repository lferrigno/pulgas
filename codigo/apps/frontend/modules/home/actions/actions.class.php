<?php

/**
 * home actions.
 *
 * @package    pulgas
 * @subpackage home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  	
  	$this->ultimaRevista = RevistaTable::getInstance()->obtenerUltimo();
  	$this->ultimaReceta = RecetaTable::getInstance()->obtenerUltimo();
  	$this->ultimaGaleria = GaleriaTable::getInstance()->obtenerUltimo();
  	$this->ultimaNota= NotaTable::getInstance()->obtenerUltimo();
  	$this->cargarPublicidad();
  	$this->filtro = new AnuncianteFormFilter();
  	 
  }
  
  private function cargarPublicidad(){
  	$this->publicidades = PublicidadTable::getInstance()->getByCodigo( sfConfig::get('app_publicidad_home',1));
  }
  
  public function executeNosotros(sfWebRequest $request)
  {
  	 
  	$this->ultimaRevista = RevistaTable::getInstance()->obtenerUltimo();
  }
  
  public function executeContacto(sfWebRequest $request)
  {
  
  	$this->ultimaRevista = RevistaTable::getInstance()->obtenerUltimo();
  }
}
