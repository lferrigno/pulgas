<?php

/**
 * SubCategoriaAnunciante form.
 *
 * @package    pulgas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SubCategoriaAnuncianteForm extends BaseSubCategoriaAnuncianteForm
{
  public function configure()
  {
  	$this->useFields(array('sub_categoria_id'));
  	
  	$widgetCategoria = new sfWidgetFormDoctrineChoice(array('model' => $this->getModelName('Categoria'), 'add_empty' => false),array('onchange'=>"javascript:cargarSubCategorias()"));
  	$valCategoria = new sfValidatorPass();
  	 
  	$this->setWidget('categoria', $widgetCategoria);
  	$this->setValidator('categoria', $valCategoria);
  	 
  }
}
