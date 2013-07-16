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

  public function executeShow(sfWebRequest $request)
  {
    $this->anunciante = Doctrine_Core::getTable('Anunciante')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->anunciante);
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
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($anunciante = Doctrine_Core::getTable('Anunciante')->find(array($request->getParameter('id'))), sprintf('Object anunciante does not exist (%s).', $request->getParameter('id')));
    $this->form = new AnuncianteForm($anunciante);

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
}
