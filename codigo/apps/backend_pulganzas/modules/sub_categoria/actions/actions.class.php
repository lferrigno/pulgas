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
		$this->sub_categorias = Doctrine_Core::getTable('SubCategoria')
		->createQuery('a')
		->execute();
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
