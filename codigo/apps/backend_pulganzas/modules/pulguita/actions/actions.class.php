<?php

/**
 * pulguita actions.
 *
 * @package    pulgas
 * @subpackage pulguita
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pulguitaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->pulguitas = PulguitaTable::getInstance()->getAllNewest();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->pulguita = Doctrine_Core::getTable('Pulguita')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->pulguita);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PulguitaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PulguitaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($pulguita = Doctrine_Core::getTable('Pulguita')->find(array($request->getParameter('id'))), sprintf('Object pulguita does not exist (%s).', $request->getParameter('id')));
    $this->form = new PulguitaForm($pulguita);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($pulguita = Doctrine_Core::getTable('Pulguita')->find(array($request->getParameter('id'))), sprintf('Object pulguita does not exist (%s).', $request->getParameter('id')));
    $this->form = new PulguitaForm($pulguita);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($pulguita = Doctrine_Core::getTable('Pulguita')->find(array($request->getParameter('id'))), sprintf('Object pulguita does not exist (%s).', $request->getParameter('id')));
    $pulguita->delete();

    $this->redirect('pulguita/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $pulguita = $form->save();

      $this->redirect('pulguita/show?id='.$pulguita->getId());
    }
  }
}
