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
  	$this->useFields(array('nombre','direccion','localidad','telefono','email','web','facebook','anuncio'));
  }
}
