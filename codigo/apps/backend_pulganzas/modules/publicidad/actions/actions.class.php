<?php

/**
 * publicidad actions.
 *
 * @package    pulgas
 * @subpackage publicidad
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class publicidadActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->publicidades = Doctrine_Core::getTable('Publicidad')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->publicidad = Doctrine_Core::getTable('Publicidad')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->publicidad);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PublicidadForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PublicidadForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeAgregarImagen(sfWebRequest $request)
  {
  	$this->publicidadId = $request->getParameter('publicidadId');
  	$publicidadFoto = new PublicidadFoto();
  	$publicidadFoto->setPublicidadId($this->publicidadId);
  	 
  	$this->form = new PublicidadFotoForm($publicidadFoto);
  }
  public function executeGuardarImagen(sfWebRequest $request)
  {
  	$this->forward404Unless($request->isMethod(sfRequest::POST));
  
  	$this->form = new PublicidadFotoForm();
  
  	$this->processFotoForm($request, $this->form);
  
  	$this->setTemplate('agregarImagen');
  }
  
  protected function processFotoForm(sfWebRequest $request, sfForm $form)
  {
  	$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
  	if ($form->isValid())
  	{
  		$publicidadFoto = $form->save();
  
  		$this->redirect('publicidad/edit?id='.$publicidadFoto->getPublicidadId());
  	}
  }
  
  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($publicidad = Doctrine_Core::getTable('Publicidad')->find(array($request->getParameter('id'))), sprintf('Object publicidad does not exist (%s).', $request->getParameter('id')));
    $this->form = new PublicidadForm($publicidad);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($publicidad = Doctrine_Core::getTable('Publicidad')->find(array($request->getParameter('id'))), sprintf('Object publicidad does not exist (%s).', $request->getParameter('id')));
    $this->form = new PublicidadForm($publicidad);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
//     $request->checkCSRFProtection();

    $this->forward404Unless($publicidad = Doctrine_Core::getTable('Publicidad')->find(array($request->getParameter('id'))), sprintf('Object publicidad does not exist (%s).', $request->getParameter('id')));
    $publicidad->delete();

    $this->redirect('publicidad/index');
  }

  public function executeDeleteFoto(sfWebRequest $request)
  {
  	$this->forward404Unless($publicidadFoto = Doctrine_Core::getTable('PublicidadFoto')->find(array($request->getParameter('id'))), sprintf('Object publicidadFoto does not exist (%s).', $request->getParameter('id')));
  	$publicidadId = $publicidadFoto->getPublicidadId();
  	$publicidadFoto->delete();
  
$this->redirect('publicidad/edit?id='.$publicidadId);
    }
  
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $publicidad = $form->save();

      $this->redirect('publicidad/edit?id='.$publicidad->getId());
    }
  }
}
