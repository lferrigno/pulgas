<?php

/**
 * receta actions.
 *
 * @package    pulgas
 * @subpackage receta
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class recetaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->recetas = RecetaTable::getInstance()->getAllNewest();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->receta = Doctrine_Core::getTable('Receta')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->receta);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new RecetaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new RecetaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($receta = Doctrine_Core::getTable('Receta')->find(array($request->getParameter('id'))), sprintf('Object receta does not exist (%s).', $request->getParameter('id')));
    $this->form = new RecetaForm($receta);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($receta = Doctrine_Core::getTable('Receta')->find(array($request->getParameter('id'))), sprintf('Object receta does not exist (%s).', $request->getParameter('id')));
    $this->form = new RecetaForm($receta);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
//     $request->checkCSRFProtection();

    $this->forward404Unless($receta = Doctrine_Core::getTable('Receta')->find(array($request->getParameter('id'))), sprintf('Object receta does not exist (%s).', $request->getParameter('id')));
    $receta->delete();

    $this->redirect('receta/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $receta = $form->save();

      $this->redirect('receta/show?id='.$receta->getId());
    }
  }
}
