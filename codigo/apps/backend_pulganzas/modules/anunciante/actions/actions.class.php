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
		$this->anunciantes = Doctrine_Core::getTable('Anunciante')
		->createQuery('a')
		->execute();
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


}
