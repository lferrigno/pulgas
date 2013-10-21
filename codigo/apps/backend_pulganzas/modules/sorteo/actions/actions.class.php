<?php

/**
 * sorteo actions.
 *
 * @package    pulgas
 * @subpackage sorteo
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sorteoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->sorteos = SorteoTable::getInstance()->getAllNewest();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->sorteo = Doctrine_Core::getTable('Sorteo')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->sorteo);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new SorteoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new SorteoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($sorteo = Doctrine_Core::getTable('Sorteo')->find(array($request->getParameter('id'))), sprintf('Object sorteo does not exist (%s).', $request->getParameter('id')));
    $this->form = new SorteoForm($sorteo);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($sorteo = Doctrine_Core::getTable('Sorteo')->find(array($request->getParameter('id'))), sprintf('Object sorteo does not exist (%s).', $request->getParameter('id')));
    $this->form = new SorteoForm($sorteo);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($sorteo = Doctrine_Core::getTable('Sorteo')->find(array($request->getParameter('id'))), sprintf('Object sorteo does not exist (%s).', $request->getParameter('id')));
    $sorteo->delete();

    $this->redirect('sorteo/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $sorteo = $form->save();

      $this->redirect('sorteo/show?id='.$sorteo->getId());
    }
  }
}
