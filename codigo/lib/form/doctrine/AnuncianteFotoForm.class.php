<?php

/**
 * AnuncianteFoto form.
 *
 * @package    pulgas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AnuncianteFotoForm extends BaseAnuncianteFotoForm
{
  public function configure()
  {
  	$this->useFields(array('filename'));
  	
  	$this->setWidget('filename', new sfWidgetFormInputFile());
  	$this->setValidator('filename', new sfValidatorFile(array(
  			'mime_types' => 'web_images',
  			'path' => sfConfig::get('sf_upload_dir').'/anunciantes',
  	)));
  	
  }
}
