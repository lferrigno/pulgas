<?php

/**
 * revista actions.
 *
 * @package    pulgas
 * @subpackage revista
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class revistaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->revistas = Doctrine_Core::getTable('Revista')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->revista = Doctrine_Core::getTable('Revista')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->revista);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new RevistaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new RevistaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeAgregarImagen(sfWebRequest $request)
  {
  	$this->revistaId = $request->getParameter('revistaId');
  	$revistaFoto = new RevistaFoto();
  	$revistaFoto->setRevistaId($this->revistaId);
  	 
  	$this->form = new RevistaFotoForm($revistaFoto);
  }
  public function executeGuardarImagen(sfWebRequest $request)
  {
  	$this->forward404Unless($request->isMethod(sfRequest::POST));
  
  	$this->form = new RevistaFotoForm();
  
  	$this->processFotoForm($request, $this->form);
  
  	$this->setTemplate('agregarImagen');
  }
  
  protected function processFotoForm(sfWebRequest $request, sfForm $form)
  {
  	$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
  	if ($form->isValid())
  	{
  		$revistaFoto = $form->save();
  
  		$this->redirect('revista/edit?id='.$revistaFoto->getRevistaId());
  	}
  }
  
  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($revista = Doctrine_Core::getTable('Revista')->find(array($request->getParameter('id'))), sprintf('Object revista does not exist (%s).', $request->getParameter('id')));
    $this->form = new RevistaForm($revista);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($revista = Doctrine_Core::getTable('Revista')->find(array($request->getParameter('id'))), sprintf('Object revista does not exist (%s).', $request->getParameter('id')));
    $this->form = new RevistaForm($revista);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
//     $request->checkCSRFProtection();

    $this->forward404Unless($revista = Doctrine_Core::getTable('Revista')->find(array($request->getParameter('id'))), sprintf('Object revista does not exist (%s).', $request->getParameter('id')));
    $revista->delete();

    $this->redirect('revista/index');
  }

  public function executeDeleteFoto(sfWebRequest $request)
  {
  	$this->forward404Unless($revistaFoto = Doctrine_Core::getTable('RevistaFoto')->find(array($request->getParameter('id'))), sprintf('Object revistaFoto does not exist (%s).', $request->getParameter('id')));
  	$revistaId = $revistaFoto->getRevistaId();
  	$revistaFoto->delete();
  
$this->redirect('revista/edit?id='.$revistaId);
    }
  
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $revista = $form->save();

      $this->redirect('revista/edit?id='.$revista->getId());
    }
  }
}
