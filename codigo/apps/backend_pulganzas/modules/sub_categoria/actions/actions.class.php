<?php

/**
 * sub_categoria actions.
 *
 * @package    pulgas
 * @subpackage sub_categoria
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sub_categoriaActions extends sfActions
{
	public function executeIndex(sfWebRequest $request)
	{
// 		$this->sub_categorias = Doctrine_Core::getTable('SubCategoria')
// 		->createQuery('a')
// 		->orderBy('id DESC')
// 		->execute();
		
		$this->filtro = new SubCategoriaFormFilter();
		
		$filters = $request->getParameter('sub_categoria_filters');
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
		$this->sub_categorias = $query->execute();
		// 		Doctrine_Core::getTable('Anunciante')
		// 		->createQuery('a')
		// 		->orderBy('id DESC')
		// 		->execute();
		
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
				$query = Doctrine::getTable('SubCategoria')->getWhereQuery(array('1 = 2'));
			}
		}else{
			$query = Doctrine::getTable('SubCategoria')->getWhereQuery(array('1 = 3'));
		}
		return $query;
	}
	


	public function executeNew(sfWebRequest $request)
	{
		$this->form = new SubCategoriaForm();
	}

	public function executeCreate(sfWebRequest $request)
	{
		$this->forward404Unless($request->isMethod(sfRequest::POST));

		$this->form = new SubCategoriaForm();

		$this->processForm($request, $this->form);

		$this->setTemplate('new');
	}

	public function executeEdit(sfWebRequest $request)
	{
		$this->forward404Unless($sub_categoria = Doctrine_Core::getTable('SubCategoria')->find(array($request->getParameter('id'))), sprintf('Object sub_categoria does not exist (%s).', $request->getParameter('id')));
		$this->form = new SubCategoriaForm($sub_categoria);
	}

	public function executeUpdate(sfWebRequest $request)
	{
		$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
		$this->forward404Unless($sub_categoria = Doctrine_Core::getTable('SubCategoria')->find(array($request->getParameter('id'))), sprintf('Object sub_categoria does not exist (%s).', $request->getParameter('id')));
		$this->form = new SubCategoriaForm($sub_categoria);

		$this->processForm($request, $this->form);

		$this->setTemplate('edit');
	}

	public function executeDelete(sfWebRequest $request)
	{

		$this->forward404Unless($sub_categoria = Doctrine_Core::getTable('SubCategoria')->find(array($request->getParameter('id'))), sprintf('Object sub_categoria does not exist (%s).', $request->getParameter('id')));
		$sub_categoria->delete();
		$this->getUser()->setFlash('notice', 'La sub categoría se eliminó correctamente', true);

		$this->redirect('sub_categoria/index');
	}

	protected function processForm(sfWebRequest $request, sfForm $form)
	{
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid())
		{
			$sub_categoria = $form->save();
			$this->getUser()->setFlash('notice', 'La sub categoría se guardó correctamente', true);

			$this->redirect('sub_categoria/index');
		}
	}
}
