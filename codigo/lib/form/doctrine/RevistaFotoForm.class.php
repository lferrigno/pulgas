<?php

/**
 * RevistaFoto form.
 *
 * @package    pulgas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class RevistaFotoForm extends BaseRevistaFotoForm
{
  public function configure()
    {
  	$this->useFields(array('filename','revista_id','nombre_original','orden'));
  	 
  	$this->setWidget('revista_id', new sfWidgetFormInputHidden());
  	$this->setWidget('filename', new sfWidgetFormInputFile());
  	$this->setValidator('filename', new sfValidatorFile(array(
  			'mime_types' => 'web_images',
  			'path' => sfConfig::get('sf_upload_dir').'/revista',
  	)));
  	
  	
  }
}
