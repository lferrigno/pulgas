<?php

/**
 * SubCategoria form.
 *
 * @package    pulgas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SubCategoriaForm extends BaseSubCategoriaForm
{
  public function configure()
  {
  	$this->useFields(array('nombre','categoria_id'));
  	$this->getWidget('nombre')->setLabel('Sub Categor&iacute;a');
  	$this->setWidget('categoria_id', 
  			new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Categoria'), 'add_empty' => true))
  	 );
  	
  	$this->getWidget('categoria_id')->setLabel('Categor&iacute;a');
  	
  	 
  }
}
