<?php

/**
 * GaleriaFoto form.
 *
 * @package    pulgas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class GaleriaFotoForm extends BaseGaleriaFotoForm
{
  public function configure()
  {
  	$this->useFields(array('filename','galeria_id'));
  	 
  	$this->setWidget('galeria_id', new sfWidgetFormInputHidden());
  	$this->setWidget('filename', new sfWidgetFormInputFile());
  	$this->setValidator('filename', new sfValidatorFile(array(
  			'mime_types' => 'web_images',
  			'path' => sfConfig::get('sf_upload_dir').'/galeria',
  	)));
  }
}
