<?php

/**
 * home actions.
 *
 * @package    pulgas
 * @subpackage home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class RevistaActions extends sfActions
{

	public function executeVer(sfWebRequest $request)
	{
		$this->forward404Unless($revista = Doctrine_Core::getTable('Revista')->find(array($request->getParameter('id'))), sprintf('Object revista does not exist (%s).', $request->getParameter('id')));
		$this->revista = $revista;
	}

	public function executeAsyncCargarRevista(sfWebRequest $request)
	{
		$params = $request->getGetParameters();
		$revistaId = $params['revistaId'];
		$actual =  $params['actual'];
		$revista = RevistaTable::getInstance()->findOneBy('id',$revistaId);
		$imagenActual = RevistaFotoTable::getInstance()->buscarPaginaEnRevista($revistaId,$actual);
		return $this->renderPartial('revista', array('revista'  => $revista,'actual'=>$actual,'imagenActual' =>$imagenActual
		));
	}

	public function executeAsyncCargarUltimaRevista(sfWebRequest $request)
	{
		$params = $request->getGetParameters();
		$ultimaRevista = RevistaTable::getInstance()->obtenerUltimo();
		$revistaId = $ultimaRevista->getId();
		$actual =  $params['actual'];
		$revista = RevistaTable::getInstance()->findOneBy('id',$revistaId);
		$imagenActual = RevistaFotoTable::getInstance()->buscarPaginaEnRevista($revistaId,$actual);
		return $this->renderPartial('revista', array('revista'  => $revista,'actual'=>$actual,'imagenActual' =>$imagenActual
		));
	}


}
