<?php

/**
 * categoria actions.
 *
 * @package    pulgas
 * @subpackage categoria
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class categoriaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->categorias = Doctrine_Core::getTable('Categoria')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CategoriaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CategoriaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($categoria = Doctrine_Core::getTable('Categoria')->find(array($request->getParameter('id'))), sprintf('Object categoria does not exist (%s).', $request->getParameter('id')));
    $this->form = new CategoriaForm($categoria);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($categoria = Doctrine_Core::getTable('Categoria')->find(array($request->getParameter('id'))), sprintf('Object categoria does not exist (%s).', $request->getParameter('id')));
    $this->form = new CategoriaForm($categoria);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $this->forward404Unless($categoria = Doctrine_Core::getTable('Categoria')->find(array($request->getParameter('id'))), sprintf('Object categoria does not exist (%s).', $request->getParameter('id')));
    $categoria->delete();
    $this->getUser()->setFlash('notice', 'La categoría se eliminó correctamente', true);
    
    $this->redirect('categoria/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $categoria = $form->save();
      $this->getUser()->setFlash('notice', 'La categoría se guardó correctamente', true);
    $this->redirect('categoria/index');
          }
  }
}
