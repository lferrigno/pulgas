<?php

/**
 * galeria actions.
 *
 * @package    pulgas
 * @subpackage galeria
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class galeriaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->galerias = Doctrine_Core::getTable('Galeria')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->galeria = Doctrine_Core::getTable('Galeria')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->galeria);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new GaleriaForm();
  }

  public function executeAgregarImagen(sfWebRequest $request)
  {
  	$this->galeriaId = $request->getParameter('galeriaId');
  	$galeriaFoto = new GaleriaFoto();
  	$galeriaFoto->setGaleriaId($this->galeriaId);
  	
  	$this->form = new GaleriaFotoForm($galeriaFoto);
  }
  
  
  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new GaleriaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }
  public function executeGuardarImagen(sfWebRequest $request)
  {
  	$this->forward404Unless($request->isMethod(sfRequest::POST));
  
  	$this->form = new GaleriaFotoForm();
  
  	$this->processFotoForm($request, $this->form);
  
  	$this->setTemplate('agregarImagen');
  }
  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($galeria = Doctrine_Core::getTable('Galeria')->find(array($request->getParameter('id'))), sprintf('Object galeria does not exist (%s).', $request->getParameter('id')));
    $this->form = new GaleriaForm($galeria);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($galeria = Doctrine_Core::getTable('Galeria')->find(array($request->getParameter('id'))), sprintf('Object galeria does not exist (%s).', $request->getParameter('id')));
    $this->form = new GaleriaForm($galeria);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
//     $request->checkCSRFProtection();

    $this->forward404Unless($galeria = Doctrine_Core::getTable('Galeria')->find(array($request->getParameter('id'))), sprintf('Object galeria does not exist (%s).', $request->getParameter('id')));
    $galeria->delete();

    $this->redirect('galeria/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $galeria = $form->save();

      $this->redirect('galeria/edit?id='.$galeria->getId());
    }
  }
  
  protected function processFotoForm(sfWebRequest $request, sfForm $form)
  {
  	$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
  	if ($form->isValid())
  	{
  		$galeriaFoto = $form->save();
  
  		$this->redirect('galeria/edit?id='.$galeriaFoto->getGaleriaId());
  	}
  }
}
