<?php

/**
 * Anunciante form.
 *
 * @package    pulgas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AnuncianteConFotoForm extends BaseAnuncianteForm
{
  public function configure()
  {
  	$this->useFields(array());
	
  $form = new AnuncianteFotoCollectionForm(null, array(
    'anunciante' => $this->getObject(),
    'size'    => 1,
  ));
 
  $this->embedForm('anunciantesFotos', $form);
  }
}
