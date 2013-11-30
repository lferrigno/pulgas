<?php

/**
 * nota actions.
 *
 * @package    pulgas
 * @subpackage nota
 */
class notaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->notas = NotaTable::getInstance()->getAllNewest();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->nota = Doctrine_Core::getTable('Nota')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->nota);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new NotaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new NotaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($nota = Doctrine_Core::getTable('Nota')->find(array($request->getParameter('id'))), sprintf('Object nota does not exist (%s).', $request->getParameter('id')));
    $this->form = new NotaForm($nota);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($nota = Doctrine_Core::getTable('Nota')->find(array($request->getParameter('id'))), sprintf('Object nota does not exist (%s).', $request->getParameter('id')));
    $this->form = new NotaForm($nota);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($nota = Doctrine_Core::getTable('Nota')->find(array($request->getParameter('id'))), sprintf('Object nota does not exist (%s).', $request->getParameter('id')));
    $nota->delete();

    $this->redirect('nota/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $nota = $form->save();

      $this->redirect('nota/show?id='.$nota->getId());
    }
  }
}
