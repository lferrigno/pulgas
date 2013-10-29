<?php

/**
 * home actions.
 *
 * @package    pulgas
 * @subpackage home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class anunciantesActions extends sfActions
{
	/**
	 * Executes index action
	 *
	 * @param sfRequest $request A request object
	 */
	public function executeIndex(sfWebRequest $request)
	{
		$this->fiestas = SubCategoriaTable::getInstance()->getByCodigoCategoria("Fiestas");
		$this->hogar = SubCategoriaTable::getInstance()->getByCodigoCategoria("Hogar");
		$this->ninos = SubCategoriaTable::getInstance()->getByCodigoCategoria("Ninos");
		$this->educacion = SubCategoriaTable::getInstance()->getByCodigoCategoria("Educacion");
		$this->estetica = SubCategoriaTable::getInstance()->getByCodigoCategoria("Estetica");
		$this->otros = SubCategoriaTable::getInstance()->getByCodigoCategoria("Otros");
		$this->salud = SubCategoriaTable::getInstance()->getByCodigoCategoria("Salud");
		
		$this->filtro = new AnuncianteFormFilter();
		
		$filters = $request->getParameter('anunciante_filters');
		$this->se_filtro = false;
		// Si no existe la pagina tomo los filtros desde cero
		if (!$request->getParameter('page') ) {
			$query = $this->getQueryBusqueda($filters);
		}
		else{
			// Si estoy en alguna pagina, tengo q recuperar los filtros
			$filters = $this->getUser()->getAttribute('filtro');
			$query = $this->getQueryBusqueda($filters);
		}
		$this->pager = new sfDoctrinePager('Anunciante', 1);
		$this->pager->setQuery($query);
		$this->pager->setPage($request->getParameter('page', 0));
		$this->pager->init();
		
	}

	private function getQueryBusqueda(&$filters){
		// Si se filtro hago la query en base al filtro
		if($filters != null){
			$this->se_filtro = true;
			$this->filtro->bind($filters);
			if($this->filtro->isValid() ){
				// I store the filter parameters in the session variable
				$this->getUser()->setAttribute('filtro', $filters);
				$query = $this->filtro->getOwnQuery($filters);
			}else{
				$query = Doctrine::getTable('Anunciante')->getWhereQuery(array('1 = 2'));
			}
		}else{
			$query = Doctrine::getTable('Anunciante')->getWhereQuery(array('1 = 3'));
		}
		return $query;
	}
	
	
	public function executeAsyncCargarListado(sfWebRequest $request)
	{
		$params = $request->getGetParameters();
		$tipo = $params['tipo'];
		return $this->renderPartial('listadoAnunciantes', array('nombreEncabezado'  	=> $tipo,
		));
	}
	
	public function executeAsyncCargarAnuncio(sfWebRequest $request)
	{
		$params = $request->getGetParameters();
		$anuncioId = $params['anuncioId'];
		$anunciante = AnuncianteTable::getInstance()->findOneBy('id',$anuncioId);
		return $this->renderPartial('anunciante', array('anunciante'  	=> $anunciante
		));
	}
}
