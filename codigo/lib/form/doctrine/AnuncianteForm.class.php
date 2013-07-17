<?php

/**
 * Anunciante form.
 *
 * @package    pulgas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AnuncianteForm extends BaseAnuncianteForm
{
  public function configure()
  {
  	$this->getWidget('sub_categorias_list')->setLabel('Sub Categor&iacute;as');
  	$this->setValidator("sub_categorias_list", 
  			new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'SubCategoria', 'required' => true)));
	
  	
  }
}
