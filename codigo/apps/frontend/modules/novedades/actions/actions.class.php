<?php

/**
 * home actions.
 *
 * @package    pulgas
 * @subpackage home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class novedadesActions extends sfActions
{
	/**
	 * Executes index action
	 *
	 * @param sfRequest $request A request object
	 */
	public function executeIndex(sfWebRequest $request)
	{
		$this->ultimaReceta = RecetaTable::getInstance()->obtenerUltimo();
		$this->ultimoSorteo =SorteoTable::getInstance()->obtenerUltimo();
		$this->ultimaGaleria = GaleriaTable::getInstance()->obtenerUltimo();
		$this->cargarPublicidad();
	}

	private function cargarPublicidad(){
		$this->publicidades = PublicidadTable::getInstance()->getByCodigo( sfConfig::get('app_publicidad_resto',2));
	}
	
	public function executeSorteo(sfWebRequest $request)
	{
		$this->forward404Unless($sorteo = Doctrine_Core::getTable('Sorteo')->find(array($request->getParameter('id'))), sprintf('Object sorteo does not exist (%s).', $request->getParameter('id')));
		$this->novedad = $sorteo;
		$this->ultimosMsg = "Últimos Sorteos";
		$this->tituloNovedad = "SORTEOS";
		$limit = 10;
		$this->novedades = SorteoTable::getInstance()->getAllNewest($limit);
		$this->urlShowNovedad = 'novedades_show_sorteo'; 
		$this->cargarPublicidad();
		$this->setTemplate('novedad');
		
	}

	public function executeReceta(sfWebRequest $request)
	{
		$this->forward404Unless($receta = Doctrine_Core::getTable('Receta')->find(array($request->getParameter('id'))), sprintf('Object sorteo does not exist (%s).', $request->getParameter('id')));
		$this->novedad = $receta;
		$this->ultimosMsg = "Últimas Recetas";
		$this->tituloNovedad = "RECETAS";
		$limit = 10;
		$this->novedades = RecetaTable::getInstance()->getAllNewest($limit);
		$this->urlShowNovedad = 'novedades_show_receta';
		$this->cargarPublicidad();
		$this->setTemplate('novedad');
	}
	
	public function executeNotas(sfWebRequest $request)
	{
		$nota= NotaTable::getInstance()->obtenerUltimo();
		
		$this->novedad = $nota;
		$this->ultimosMsg = "Últimas Notas";
		$this->tituloNovedad = "Notas";
		$limit = 10;
		$this->novedades = NotaTable::getInstance()->getAllNewest($limit);
		$this->urlShowNovedad = 'novedades_show_nota';
		$this->cargarPublicidad();
	}
	
	
	public function executeShowSorteo(sfWebRequest $request)
	{
		$this->forward404Unless($sorteo = Doctrine_Core::getTable('Sorteo')->find(array($request->getParameter('id'))), sprintf('Object sorteo does not exist (%s).', $request->getParameter('id')));
		$this->novedad = $sorteo;
		$this->urlVolver = $this->generateUrl('novedades_sorteo',array('id'=>$sorteo->getId()));
		$this->nombreEncabezado = "Sorteo";
		$this->cargarPublicidad();
		$this->setTemplate('show');
	}
	
	public function executeShowReceta(sfWebRequest $request)
	{
		$this->forward404Unless($receta = Doctrine_Core::getTable('Receta')->find(array($request->getParameter('id'))), sprintf('Object sorteo does not exist (%s).', $request->getParameter('id')));
		$this->novedad = $receta;
		$this->urlVolver = $this->generateUrl('novedades_receta',array('id'=>$receta->getId()));
		$this->nombreEncabezado = "Receta";
		$this->cargarPublicidad();
		$this->setTemplate('show');
	}
	

	public function executeShowNota(sfWebRequest $request)
	{
		$this->forward404Unless($nota = Doctrine_Core::getTable('Nota')->find(array($request->getParameter('id'))), sprintf('Object nota does not exist (%s).', $request->getParameter('id')));
		$this->novedad = $nota;
		$this->urlVolver = $this->generateUrl('notas');
		$this->nombreEncabezado = "Nota";
		$this->cargarPublicidad();
		$this->setTemplate('showNota');
	}
	
	public function executePulguita(sfWebRequest $request)
	{
		$this->forward404Unless($pulguita = Doctrine_Core::getTable('Pulguita')->find(array($request->getParameter('id'))), sprintf('Object pulguita does not exist (%s).', $request->getParameter('id')));
		$this->novedad = $pulguita;
		$this->ultimosMsg = "Últimas Pulguitas";
		$this->tituloNovedad = "GALERIA";
		$limit = 10;
		$this->novedades = PulguitaTable::getInstance()->getAllNewest($limit);
		
		$this->urlShowNovedad = 'novedades_show_pulguita';
		$this->cargarPublicidad();
		$this->setTemplate('novedad');
	}
	public function executeGaleria(sfWebRequest $request)
	{
		$this->forward404Unless($galeria = Doctrine_Core::getTable('Galeria')->find(array($request->getParameter('id'))), sprintf('Object galeria does not exist (%s).', $request->getParameter('id')));
		$this->galeria = $galeria;
		$this->ultimosMsg = "Galería anterior";
		$this->tituloNovedad = "GALERIA";
		$limit = 1;
		$this->galerias = GaleriaTable::getInstance()->getAllNewest($limit,$this->galeria->getCreatedAt());
	
		$this->urlShowNovedad = 'novedades_show_pulguita';
		$this->cargarPublicidad();
	}

	public function executeShowPulguita(sfWebRequest $request)
	{
		$this->forward404Unless($pulguita = Doctrine_Core::getTable('Pulguita')->find(array($request->getParameter('id'))), sprintf('Object sorteo does not exist (%s).', $request->getParameter('id')));
		$this->novedad = $pulguita;
		$this->urlVolver = $this->generateUrl('novedades_pulguita',array('id'=>$pulguita->getId()));
		$this->cargarPublicidad();
		$this->setTemplate('show');
	}
	
}
