<?php

/**
 * anunciante actions.
 *
 * @package    pulgas
 * @subpackage anunciante
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class anuncianteActions extends sfActions
{
	public function executeIndex(sfWebRequest $request)
	{
		
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
		$this->anunciantes = $query->execute();
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
				$query = Doctrine::getTable('Anunciante')->getWhereQuery(array('1 = 2'));
			}
		}else{
			$query = Doctrine::getTable('Anunciante')->getWhereQuery(array('1 = 3'));
		}
		return $query;
	}

	public function executeNew(sfWebRequest $request)
	{
		$this->form = new AnuncianteForm();
	}

	public function executeCreate(sfWebRequest $request)
	{
		$this->forward404Unless($request->isMethod(sfRequest::POST));

		$this->form = new AnuncianteForm();

		$this->processForm($request, $this->form);

		$this->setTemplate('new');
	}

	public function executeEdit(sfWebRequest $request)
	{
		$this->forward404Unless($anunciante = Doctrine_Core::getTable('Anunciante')->find(array($request->getParameter('id'))), sprintf('Object anunciante does not exist (%s).', $request->getParameter('id')));
		$this->form = new AnuncianteForm($anunciante);
		$this->fotoForm =  new AnuncianteConFotoForm($anunciante);
		$this->categoriaAnuncianteForm = new SubCategoriaAnuncianteForm();
		//     $this->fotoForm =  new AnuncianteConFotoForm($anunciante);

	}

	public function executeGuardarNuevaFoto(sfWebRequest $request)
	{
		$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
		$this->forward404Unless($anunciante = Doctrine_Core::getTable('Anunciante')->find(array($request->getParameter('id'))), sprintf('Object anunciante does not exist (%s).', $request->getParameter('id')));
		$this->form = new AnuncianteForm($anunciante);
		$this->fotoForm = new AnuncianteConFotoForm($anunciante);
		$this->categoriaAnuncianteForm = new SubCategoriaAnuncianteForm();
		//   	$this->fotoForm = new AnuncianteConFotoForm($anunciante);

		$this->processForm($request, $this->fotoForm);

		$this->setTemplate('edit');
	}

	public function executeAgregarSubCategoria(sfWebRequest $request)
	{
		$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
		$this->forward404Unless($anunciante = Doctrine_Core::getTable('Anunciante')->find(array($request->getParameter('id'))), sprintf('Object anunciante does not exist (%s).', $request->getParameter('id')));
		$this->forward404Unless($anunciante = Doctrine_Core::getTable('Anunciante')->find(array($request->getParameter('id'))), sprintf('Object anunciante does not exist (%s).', $request->getParameter('id')));
		$subCategoriaAnunciante = $request->getPostParameter('sub_categoria_anunciante',null);
		$subCategoriaId = $subCategoriaAnunciante['sub_categoria_id'];
		$this->forward404Unless($subCategoriaId != null, sprintf('Object sub_categoria does not exist'));

		$this->form = new AnuncianteForm($anunciante);
		$this->fotoForm = new AnuncianteConFotoForm($anunciante);
		$this->categoriaAnuncianteForm = new SubCategoriaAnuncianteForm();
		//   	$this->fotoForm = new AnuncianteConFotoForm($anunciante);

		$this->saveSubCategoria($request,$subCategoriaId, $anunciante->getId(),$this->categoriaAnuncianteForm);

		$this->setTemplate('edit');
	}


	public function executeUpdate(sfWebRequest $request)
	{
		$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
		$this->forward404Unless($anunciante = Doctrine_Core::getTable('Anunciante')->find(array($request->getParameter('id'))), sprintf('Object anunciante does not exist (%s).', $request->getParameter('id')));
		$this->form = new AnuncianteForm($anunciante);
		$this->fotoForm = null;
		$this->categoriaAnuncianteForm = null;
		//     $this->subCategoriaForm = null;

		$this->processForm($request, $this->form);

		$this->setTemplate('edit');
	}

	public function executeDelete(sfWebRequest $request)
	{
		$request->checkCSRFProtection();

		$this->forward404Unless($anunciante = Doctrine_Core::getTable('Anunciante')->find(array($request->getParameter('id'))), sprintf('Object anunciante does not exist (%s).', $request->getParameter('id')));
		$anunciante->delete();

		$this->redirect('anunciante/index');
	}

	protected function processForm(sfWebRequest $request, sfForm $form)
	{
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid())
		{
			$anunciante = $form->save();

			$this->redirect('anunciante/edit?id='.$anunciante->getId());
		}
	}
	protected function saveSubCategoria(sfWebRequest $request,$subCategoriaId,$anuncianteId, sfForm $form)
	{
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid())
		{
			$subCategoriaAnunciante = $form->getObject();
			$subCategoriaAnunciante->setAnuncianteId($anuncianteId);
			$subCategoriaAnunciante->setSubCategoriaId($subCategoriaId);
			$subCategoriaAnunciante->save();
			$this->redirect('anunciante/edit?id='.$anuncianteId);
		}else{
		}
	}


	public function executeAsyncCargarSubCategorias(sfWebRequest $request) {

		$categoriaId = $request->getParameter('categoriaId');
		$subCategorias = SubCategoriaTable::getInstance()->getByCategoria($categoriaId);

		$subCategoriasAux = array();
		$i=0;

		if($subCategorias->count() > 0) {
			foreach ($subCategorias as $subCategoria)
			{
				$subCategoriasAux[$i]['id'] = $subCategoria->getId();
				$subCategoriasAux[$i]['descripcion'] = $subCategoria->getNombre();
				$i++;
			}

			// Se ordena
			foreach ($subCategoriasAux as $key => $row) {
				$id[$key]  = $row['id'];
				$descripcion[$key] = $row['descripcion'];
			}
			array_multisort($descripcion, SORT_ASC, $id, SORT_ASC, $subCategoriasAux);
		}

		return $this->renderText(json_encode($subCategoriasAux));
	}

	public function executeAsyncCargarCategorias(sfWebRequest $request) {
		$categorias = CategoriaTable::getInstance()->findAll();

		$categoriasAux = array();
		$i=0;

		if($categorias->count() > 0) {
			foreach ($categorias as $categoria)
			{
				$categoriasAux[$i]['id'] = $categoria->getId();
				$categoriasAux[$i]['descripcion'] = $categoria->getNombre();
				$i++;
			}

			// Se ordena
			foreach ($categoriasAux as $key => $row) {
				$id[$key]  = $row['id'];
				$descripcion[$key] = $row['descripcion'];
			}
			array_multisort($descripcion, SORT_ASC, $id, SORT_ASC, $categoriasAux);
		}

		return $this->renderText(json_encode($categoriasAux));
	}

	public function executeEliminarSubCategoria(sfWebRequest $request) {
		$id = $request->getParameter('id');
		$subCategoriaId = $request->getParameter('subcat');
		$sca = SubCategoriaAnuncianteTable::getInstance()->getByAnuncioAndSubCategoria($id,$subCategoriaId);
		$sca->delete();
		$this->redirect('anunciante/edit?id='.$id);
	}

	public function executeEliminarFoto(sfWebRequest $request) {
		$id = $request->getParameter('id');
		$foto = $request->getParameter('foto');
		$anuncioFoto = AnuncianteFotoTable::getInstance()->findOneBy('id',$foto);
		$anuncioFoto->delete();
		$this->redirect('anunciante/edit?id='.$id);
	}

}
