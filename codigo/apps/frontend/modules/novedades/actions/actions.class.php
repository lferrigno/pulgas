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
		$this->ultimaPulguita = PulguitaTable::getInstance()->obtenerUltimo();
	}

	public function executeSorteo(sfWebRequest $request)
	{
		$this->forward404Unless($sorteo = Doctrine_Core::getTable('Sorteo')->find(array($request->getParameter('id'))), sprintf('Object sorteo does not exist (%s).', $request->getParameter('id')));
		$this->novedad = $sorteo;
		$this->ultimosMsg = "Últimos Sorteos";
		$this->tituloNovedad = "SORTEOS";
		$limit = 7;
		$this->novedades = SorteoTable::getInstance()->getAllNewest($limit);
		$this->urlShowNovedad = 'novedades_show_sorteo'; 
		$this->setTemplate('novedad');
		
	}

	public function executeReceta(sfWebRequest $request)
	{
		$this->forward404Unless($receta = Doctrine_Core::getTable('Receta')->find(array($request->getParameter('id'))), sprintf('Object sorteo does not exist (%s).', $request->getParameter('id')));
		$this->novedad = $receta;
		$this->ultimosMsg = "Últimas Recetas";
		$this->tituloNovedad = "RECETAS";
		$limit = 7;
		$this->novedades = RecetaTable::getInstance()->getAllNewest($limit);
		$this->urlShowNovedad = 'novedades_show_receta';
		$this->setTemplate('novedad');
	
	}
	
	
	public function executeShowSorteo(sfWebRequest $request)
	{
		$this->forward404Unless($sorteo = Doctrine_Core::getTable('Sorteo')->find(array($request->getParameter('id'))), sprintf('Object sorteo does not exist (%s).', $request->getParameter('id')));
		$this->novedad = $sorteo;
		$this->urlVolver = $this->generateUrl('novedades_sorteo',array('id'=>$sorteo->getId()));
		$this->setTemplate('show');
	}
	
	public function executeShowReceta(sfWebRequest $request)
	{
		$this->forward404Unless($receta = Doctrine_Core::getTable('Receta')->find(array($request->getParameter('id'))), sprintf('Object sorteo does not exist (%s).', $request->getParameter('id')));
		$this->novedad = $receta;
		$this->urlVolver = $this->generateUrl('novedades_receta',array('id'=>$receta->getId()));
		$this->setTemplate('show');
	}
	
	public function executePulguita(sfWebRequest $request)
	{
		$this->forward404Unless($pulguita = Doctrine_Core::getTable('Pulguita')->find(array($request->getParameter('id'))), sprintf('Object pulguita does not exist (%s).', $request->getParameter('id')));
		$this->novedad = $pulguita;
		$this->ultimosMsg = "Últimas Pulguitas";
		$this->tituloNovedad = "GALERIA";
		$limit = 7;
		$this->novedades = PulguitaTable::getInstance()->getAllNewest($limit);
		
		$this->urlShowNovedad = 'novedades_show_pulguita';
		$this->setTemplate('novedad');
	}

	public function executeShowPulguita(sfWebRequest $request)
	{
		$this->forward404Unless($pulguita = Doctrine_Core::getTable('Pulguita')->find(array($request->getParameter('id'))), sprintf('Object sorteo does not exist (%s).', $request->getParameter('id')));
		$this->novedad = $pulguita;
		$this->urlVolver = $this->generateUrl('novedades_pulguita',array('id'=>$pulguita->getId()));
		$this->setTemplate('show');
	}
	
}
