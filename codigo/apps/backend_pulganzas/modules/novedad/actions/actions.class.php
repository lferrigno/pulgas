<?php

/**
 * novedad actions.
 *
 * @package    pulgas
 * @subpackage novedad
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class novedadActions extends sfActions
{
	public function executeIndex(sfWebRequest $request)
	{
		$this->novedads = Doctrine_Core::getTable('Novedad')
		->createQuery('a')
		->execute();
	}

	public function executeListadoRecetas(sfWebRequest $request)
	{
		$this->novedades = RecetaTable::getInstance()->findAll();
		$this->urlNuevo = $this->generateUrl('newReceta');
		$this->setTemplate('index');
	}
	public function executeListadoSorteos(sfWebRequest $request)
	{
		$this->novedades = SorteoTable::getInstance()->findAll();
		$this->urlNuevo = $this->generateUrl('newSorteo');
		$this->setTemplate('index');
	}
	public function executeListadoPulguitas(sfWebRequest $request)
	{
		$this->novedades = PulguitaTable::getInstance()->findAll();
		$this->urlNuevo = $this->generateUrl('newPulguita');
		$this->setTemplate('index');
	}

	public function executeShow(sfWebRequest $request)
	{
		$this->novedad = Doctrine_Core::getTable('Novedad')->find(array($request->getParameter('id')));
		$this->forward404Unless($this->novedad);
	}

	public function executeNew(sfWebRequest $request)
	{
		$this->form = new NovedadForm();
	}

	public function executeNewSorteo(sfWebRequest $request)
	{
		$this->form = new SorteoForm();
		$this->setTemplate('new');
	}
	
	public function executeNewReceta(sfWebRequest $request)
	{
		$this->form = new RecetaForm();
		$this->setTemplate('new');
	}
	public function executeNewPulguita(sfWebRequest $request)
	{
		$this->form = new PulguitaForm();
		$this->setTemplate('new');
	}
	
	public function executeCreate(sfWebRequest $request)
	{
		$this->forward404Unless($request->isMethod(sfRequest::POST));

		$this->form = new NovedadForm();

		$this->processForm($request, $this->form);

		$this->setTemplate('new');
	}

	public function executeEdit(sfWebRequest $request)
	{
		$this->forward404Unless($novedad = Doctrine_Core::getTable('Novedad')->find(array($request->getParameter('id'))), sprintf('Object novedad does not exist (%s).', $request->getParameter('id')));
		$this->form = new NovedadForm($novedad);
	}

	public function executeUpdate(sfWebRequest $request)
	{
		$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
		$this->forward404Unless($novedad = Doctrine_Core::getTable('Novedad')->find(array($request->getParameter('id'))), sprintf('Object novedad does not exist (%s).', $request->getParameter('id')));
		$this->form = new NovedadForm($novedad);

		$this->processForm($request, $this->form);

		$this->setTemplate('edit');
	}

	public function executeDelete(sfWebRequest $request)
	{
		$request->checkCSRFProtection();

		$this->forward404Unless($novedad = Doctrine_Core::getTable('Novedad')->find(array($request->getParameter('id'))), sprintf('Object novedad does not exist (%s).', $request->getParameter('id')));
		$novedad->delete();

		$this->redirect('novedad/index');
	}

	protected function processForm(sfWebRequest $request, sfForm $form)
	{
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid())
		{
			$novedad = $form->save();

			$this->redirect('novedad/edit?id='.$novedad->getId());
		}
	}
}
